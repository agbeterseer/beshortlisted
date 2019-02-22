<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Paystack;
use DB;
use Auth;
use Carbon\Carbon;
use App\EmployerPackage;
use App\Planpackage;
use App\Menu;
class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
 public function displayMenu(){

     return $menus = Menu::where('status', 1)->orderBy('menu_order', 'ASC')->get();
   }

public function displayUnit()
{
  $user = Auth::user();
  return $units = EmployerPackage::where('status', 1)->where('userfkp', $user->id)->first();
}
    public function redirectToGateway()
    {
      try {

          return Paystack::getAuthorizationUrl()->redirectNow();

      } catch (\Exception $e) { 
        Session::flash('error', 'something went wrong'); 
        return redirect()->back();
      }
      
    }

    public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
      $user = Auth::user();
    $paymentDetails = Paystack::getPaymentData();

  //dd($paymentDetails['data']);
  //$paymentDetails['data']['amount']
  //$paymentDetails['data']['email']
  //$paymentDetails['data']['amount']
  //$paymentDetails['data']['customer']['email'])
//$paymentDetails['data']['status']
    //$paymentDetails['data']['paid_at']

  if ($paymentDetails['data']['status'] === 'success') {

  $planpackages = DB::table('planpackages')->where('price', $paymentDetails['data']['amount'])->first();
  //dd($planpackages);
        $user = Auth::user();
        $employer_package = EmployerPackage::firstOrNew(['userfkp'=>$user->id, 'package_id' => $planpackages->id]);
        $employer_package->jobs_remaining = 0;
        $employer_package->features_remaining = $planpackages->featured_jobs;
        $employer_package->renew_remaining = 0;
        $employer_package->job_duration = $planpackages->job_duration;
        $employer_package->status = 1;
        $employer_package->units = $planpackages->jobs_posting;
        $employer_package->created_at = $this->returnCurrentTime();
        $employer_package->amount = $paymentDetails['data']['amount'];
        $employer_package->save();


        // $employer_packages = DB::table('employer_packages')->insert(['userfkp' => $user->id, 'package_id' => $planpackages->id, 'jobs_remaining' => 0, 'features_remaining' => $planpackages->featured_jobs, 'renew_remaining' => 0, 'job_duration' => $planpackages->job_duration, 'status' => 1, 'units' => $planpackages->jobs_posting, 'created_at' => $this->returnCurrentTime(), 'amount' => $paymentDetails['data']['amount']]);
        // Now you have the payment,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
    $menus = $this->displayMenu();
   // return Redirect::intended();
    return view('success_payment', compact('menus'));
    }

    public function employerPayment(Request $request)
    {
       //dd($request->all());
  
        $package_id = $request->package_id;
        $job_duration = $request->job_duration;
        $units = $request->units;
        $amount = $request->amount;
        $units = $request->quantity;

        $user = Auth::user();
        $employer_packages = DB::table('employer_packages')->insert(['userfkp' => $user->id, 'package_id' => $package_id, 'jobs_remaining' => 0, 'features_remaining' => 0, 'renew_remaining' => 0, 'job_duration' => $job_duration, 'status' => 1, 'units' => $units, 'created_at' => $this->returnCurrentTime(), 'amount' => $amount ]);
        return redirect()->back();
    }


public function makeUpgrade(Request $request){

$user = Auth::user();
//dd($request->all());
$sum = 0;

$id = $request->id;
$employer_package = $request->employer_package;
$employer_package_units = $request->employer_package_units;
try {
    
 $package = Planpackage::findOrFail($id);
 $package->jobs_posting;
 $package->id;
 $package->price;

$sum = $employer_package_units + $package->jobs_posting;

//dd($sum);
// set the old or previous Plan to in-active
$employer_packages = DB::table('employer_packages')->where(['userfkp' => $user->id, 'package_id' => $employer_package])->update([ 'status' => 0 ]);

$employer_packages = DB::table('employer_packages')->insert(['userfkp' => $user->id, 'package_id' => $package->id, 'jobs_remaining' => $sum, 'features_remaining' => $package->featured_jobs, 'renew_remaining' => 0, 'job_duration' => 0, 'status' => 1, 'units' => $sum, 'created_at' => $this->returnCurrentTime(), 'amount' => $package->price ]);

  
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Done successfully!');

    return redirect()->route('employer.packages');

    } catch (\Exception $e) {
    $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'Can create record!'); 
}
   return redirect()->back();
}



}
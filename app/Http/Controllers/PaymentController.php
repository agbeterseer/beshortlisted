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
class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
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
        $paymentDetails = Paystack::getPaymentData();

  dd($paymentDetails['data']);
  //$paymentDetails['data']['amount']
  //$paymentDetails['data']['email']
  //$paymentDetails['data']['amount']
  //$paymentDetails['data']['customer']['email'])
//$paymentDetails['data']['status']
  if ($paymentDetails['data']['status'] === 'success') {

  $planpackages = DB::table('planpackages')->where('price', $paymentDetails['data']['amount'])->first();
  //dd($planpackages);
        $user = Auth::user();
        $employer_packages = DB::table('employer_packages')->insert(['userfkp' => $user->id, 'package_id' => $planpackages->id, 'jobs_remaining' => 0, 'features_remaining' => $planpackages->featured_jobs, 'renew_remaining' => 0, 'job_duration' => $planpackages->job_duration, 'status' => 1, 'units' => $planpackages->jobs_posting, 'created_at' => $paymentDetails['data']['paid_at'], 'amount' => $paymentDetails['data']['amount']]);
        // Now you have the payment,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

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
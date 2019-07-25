<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
use Input;
use App\Planpackage;
use Auth;
use App\PlanProperty;
use App\EmployerPackage;
use App\Menu;
 
class PackagesController extends Controller
{
     public function __construct()
    {
     $this->middleware('auth');
    }

  public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }

  public function displayMenu(){

     return $menus = Menu::where('status', 1)->orderBy('menu_order', 'ASC')->get();
   }
   public function displayUnit()
   {
     $user = Auth::user();
     return $units = EmployerPackage::where('status', 1)->where('userfkp', $user->id)->first();
   }


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages  = Planpackage::where('status',1)->get();
        return view('admin.plans.index', compact('packages'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         return view('admin.plans.create', array('user' => Auth::user()));
    
    }

    public function store(Request $request)
    {
     
   	$title = $request->title;
    $price = $request->price;
    $jobs_posting = $request->jobs_posting;
    $featured_jobs = $request->featured_jobs;
    $renew_jobs = $request->renew_jobs;
    $job_duration = $request->job_duration;
    $most_popular = $request->most_popular;
     $rules = [
                'title' => 'required|string',
                'jobs_posting' => 'required',
                'renew_jobs'=> 'required',
        ];
        $input = Input::only(
        'title',
        'jobs_posting',
        'renew_jobs'
    );
       
    $this->validate($request, $rules); 
try {
        if ($title !=null && $title !='' && $price !=null && $price !='' && $jobs_posting !=null && $jobs_posting !='') {
       
        $package = Planpackage::firstOrNew(['title' =>$title]);
        $package->price = $price;
        $package->status = 1;
        $package->jobs_posting = $jobs_posting;
        $package->featured_jobs = $featured_jobs;
        $package->renew_jobs = $renew_jobs;
        $package->job_duration = $job_duration;
        $package->created_at = $this->returnCurrentTime();
        $package->make_active = $most_popular;
        $package->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'done successfully!'); 
    }
  return redirect()->route('plans.index');
} catch (\Exception $e) {
     return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']);
                  $request->session()->flash('message.level', 'error');
        $request->session()->flash('message.content', 'cannot creat records!'); 
}

return redirect()->back();
    	# code...
    }

    public function edit($id)
    {
    	//dd($id);
    	 $package = Planpackage::findOrFail($id);
    	  return view('admin.plans.edit', compact('package'), array('user' => Auth::user()));
    }

    public function update(Request $request, $id)
    {
       //dd($request->all());
   	$title = $request->title;
    $price = $request->price;
    $jobs_posting = $request->jobs_posting;
    $featured_jobs = $request->featured_jobs;
    $renew_jobs = $request->renew_jobs;
    $job_duration = $request->job_duration;
   $most_popular = $request->most_popular;

     $rules = [
                'title' => 'required|string',
                'jobs_posting' => 'required|integer',
                'renew_jobs'=> 'required|integer',
           
        ];
 
        $input = Input::only(
        'title',
        'jobs_posting',
        'renew_jobs' 
    );
      //dd($request->all());
    $this->validate($request, $rules); 
try {
        if ($id !=null && $id !='' && $title !=null && $title !='' && $price !=null && $price !='' && $jobs_posting !=null && $jobs_posting !='') {
       
        $package = Planpackage::findOrFail($id);
        $package->title = $title;
        $package->price = $price; 
        $package->jobs_posting = $jobs_posting;
        $package->featured_jobs = $featured_jobs;
        $package->renew_jobs = $renew_jobs;
        $package->job_duration = $job_duration;
        $package->make_active = $most_popular;
        $package->created_at = $this->returnCurrentTime();
        $package->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'done successfully!'); 
    }
  return redirect()->route('plans.index');
} catch (\Exception $e) {
     return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']);
                  $request->session()->flash('message.level', 'error');
        $request->session()->flash('message.content', 'cannot creat records!'); 
}

return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("planpackages")->where('id',$id)->update(['status'=> 0]);
        Session::flash('success','Document has been deleted successfully');
       return redirect()->route('plans.index')->withMessage('Plan Deleted');
    }
    public function show($id)
    {
    	//dd($id);
    	 $package = Planpackage::findOrFail($id);
    	  return view('admin.plans.show', compact('package'), array('user' => Auth::user()));
    }

    public function showPropertyForm($id)
    {
        

  			$package = Planpackage::findOrFail($id);
       // $property_list = DB::table('plan_properties')->where('status', 1)->get();
        $property_list = Planpackage::find($id)->properties;
        //$get_applicants_profile = Document::find($id)->applicaitons;
        //dd($packagess);
    	  return view('admin.plans.properties', compact('package', 'property_list'), array('user' => Auth::user()));
    }

public function AddProperty(Request $request)
{
	//dd($request->all());
	$property_list = $request->group_b;
	$package_id = $request->package_id;
   
    $rules = [
         'package_id' => 'required|string',
        ];
 
    $input = Input::only(
        'package_id'
      ); 
    $this->validate($request, $rules);


 // dd($package_id);
try {
        if ($package_id !=null && $package_id !='') {

        	foreach ($property_list as $key => $value) {
        	$name = $value['job_property'];
        		//dd($value['job_property']);
          $plan = new PlanProperty;
          $plan->property = $value['job_property'];
          $plan->planpackage_id = $package_id; 
					$plan->status = 1;
					$plan->created_at = $this->returnCurrentTime();
					$plan->save();
					$request->session()->flash('message.level', 'success');
					$request->session()->flash('message.content', 'done successfully!'); 
        	}

    }
  
} catch (\Exception $e) {
     return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']);
        $request->session()->flash('message.level', 'error');
        $request->session()->flash('message.content', 'cannot create records!'); 
        Session::flash('error', $e->getMessage());
        //dd($e->getMessage());
}

return redirect()->back();
}

public function UpdateProperty(Request $request)
{

  $jobproperty = $request->jobproperty;
  $property_id = $request->property_id;
  //dd($request->all());

  
    $rules = [
         'property_id' => 'required|string',
        ];
 
    $input = Input::only(
        'property_id'
      ); 
    $this->validate($request, $rules);

 // dd($package_id);
try {
        if ($property_id !=null && $property_id !='') {
          $plan = PlanProperty::findOrFail($property_id);
          $plan->property = $jobproperty;
          $plan->updated_at = $this->returnCurrentTime();
          $plan->save();
          $request->session()->flash('message.level', 'success');
          $request->session()->flash('message.content', 'done successfully!'); 
    }
  
} catch (\Exception $e) {
     return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']);
        $request->session()->flash('message.level', 'error');
        $request->session()->flash('message.content', 'cannot create records!'); 
        Session::flash('error', $e->getMessage());
        //dd($e->getMessage());
}

return redirect()->back();
}
public function deleteProperty(Request $request)
    {
      $package_id = $request->package_id;
       //dd($package_id);
        DB::table("plan_properties")->where('id',$package_id)->delete();
        Session::flash('success','Record has been deleted successfully');
       return redirect()->back()->withMessage('Deleted');
    }
    public function UpgradePackageInfo($id)
    {
    $info = "Upgrading to another plan will discontinue with the previous plan and left over units";
      $user = Auth::user();
      if ($user->account_type === 'employer') {
          $menus = $this->displayMenu();
          $units = $this->displayUnit();
      $employer_package = EmployerPackage::where('userfkp', $user->id)->where('status',1)->first();
      $packages = Planpackage::all();
      $plan = DB::table('planpackages')->where('id', $id)->first(); 
     // dd($plan);
      return view('employer.upgrade_package_info', compact('employer_package', 'menus', 'packages', 'id', 'units', 'plan') );
      }
 return redirect()->back();

    }



}

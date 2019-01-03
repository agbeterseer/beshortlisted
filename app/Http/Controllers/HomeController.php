<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Document;
use App\Role;
use App\User;
use App\RecruitResume;
use App\Industry;
use App\IndustryProfession;
use DB;
use App\CareerSummary;
use App\JobSkill;
use App\RecruitYear;
use App\Qualification;
use App\Country;
use App\JobEducation; 
use Carbon\Carbon;
use App\JobcareerLevel;
use App\WorkExperience;
use App\ResumeBuilder;
use App\Tag;
use App\Email;
use App\City;
use App\Menu;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

        public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function displayMenu(){

     return $menus = Menu::where('status', 1)->orderBy('menu_order', 'ASC')->get();
   }

   public function displayUnits(){
    $units = null;
    
     return $units;
   }

    public function index()
    {
        $job_post = \App\Tag::job_post();
        $documents = Document::all()->count();
        $roles = Role::all()->count();
        $users = User::all()->count();
        $resumes = RecruitResume::all();
        $resume_count = RecruitResume::all()->count();
        $jobs_count = Tag::all()->count();
        $resume_builder_list = ResumeBuilder::all();
        $employement_terms = DB::table('employement_terms')->get();
        $industry_professions = DB::table('industry_professions')->where('status',1)->get();
        //$industries = Industry::all();
        $industries = DB::table('industries')->where('status',1)->orderBy('created_at', 'DESC')->get();

       // $query = IndustryProfession::all();
        $industries_paginage = DB::table('industry_professions')->where('status',1)->orderBy('created_at', 'DESC')->paginate(8);
        $jobs_8 = DB::table('tags')->where('status',1)->where('active', 1)->orderBy('created_at', 'DESC')->paginate(8);
        $jobs = DB::table('tags')->where('status',1)->where('active', 1)->orderBy('created_at', 'DESC')->paginate(4);
        $employement_term_list = DB::table('employement_terms')->get();
        $cities = DB::table('cities')->get();
        // 
        $query_count = DB::table('tags')
             ->select('industry', DB::raw('count(*) as total'))
             ->groupBy('industry');

        $industry_count = $query_count->paginate(8);
      // dd($industry_count);
        $tag_cities = DB::table('tags')
             ->select('city', DB::raw('count(*) as total'))
             ->groupBy('city')->get();
      // dd($tag_city);
        $job_function_count = DB::table('tags')
             ->select('job_category', DB::raw('count(*) as total'))
             ->groupBy('job_category')->get();
      
        $menus = $this->displayMenu();

        return view('index', compact('documents', 'roles', 'users', 'resumes','industries', 'resume_builder_list', 'industries', 'jobs', 'resume_count', 'jobs_count', 'industry_professions', 'employement_term_list', 'cities','industry_count', 'industries_paginage', 'job_function_count', 'jobs_8', 'job_post', 'tag_cities', 'employement_terms', 'menus'), array('user' => Auth::user()));
    }


  public function employee(Request $request)
  {
 
    return view('employee', compact('resumes') );
  }
  public function employer(Request $request)
  {
    $plans = DB::table('planpackages')->orderBy('created_at', 'ASC')->get();
    // dd($get_plans);
    $menus = $this->displayMenu();
    return view('employer_info', compact('plans', 'get_plans', 'menus'));
  }
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('admin.log.logActivity',compact('logs'), array('user' => Auth::user()));
 
    }
    public function GetQualificationLevels()
{
    $qualifications = DB::table('qualification_levels')->get();
 return $qualifications;
}


    public function ShowJobFilterForm(Request $request){
      $s = $request->input('s');
    $countries = DB::table('countries')->get();
    $cities = DB::table('cities')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = $this->GetQualificationLevels(); 
    $industries = DB::table('industries')->get();
      $industry_professions = DB::table('industry_professions')->get();
          $city_count = DB::table('tags')
             ->select('city', DB::raw('count(*) as total'))
             ->groupBy('city')->get();
    $employement_term_list = DB::table('employement_terms')->get();

    $job_type_count = DB::table('tags')
             ->select('job_type', DB::raw('count(*) as total'))
             ->groupBy('job_type')->get();

$tags = Tag::where('status',1)->where('active',1)->paginate(20);  
$menus = $this->displayMenu();
     return view('jobs.job_listing_form', compact('industry_professions', 'industries', 'cities', 'city_count', 'employement_term_list','job_type_count', 'tags', 's', 'menus') );
    }

    public function JobListing(Request $request){
  

        $s = $request->input('s');
        $location = $request->input('location');
        $job_function = $request->input('job_function');
        $location = City::findOrFail($location);

        if ($s && isset($location) ) {
            $tags = Tag::where(function($query) use ($location, $s){
            $query->orWhere('city', $location->name)->search(strtolower($s))->where('status',1)->where('active',1);
            })->paginate(20);

        }
        if ($s && $location && $job_function) {
            //dd('here');
        $tags = DB::table('tags')
          ->where('status', 1)
          ->where('active',1)
          ->where('industry',$s)
          ->where('city', $location->name)
          ->where('job_category', $job_function)
          ->orderby('created_at', 'DESC')
          ->paginate(20);
  //dd($tags);
        }
        if($location) {
           $tags = DB::table('tags')
          ->where('status', 1)
          ->where('active',1) 
          ->where('city', $location->name) 
          ->orderby('created_at', 'DESC')
          ->paginate(20);
 
        }else{
         $tags = Tag::where('status',1)->where('active',1)->paginate(20);     
        }
 $tags = Tag::where('status',1)->where('active',1)->paginate(20);   
           //dd('here');
        $industry_professions = DB::table('industry_professions')->get();
        $employement_term_list = DB::table('employement_terms')->get();
        $cities = DB::table('cities')->get();

    $job_type_count = DB::table('tags')
             ->select('job_type', DB::raw('count(*) as total'))
             ->groupBy('job_type')->get();

    $city_count = DB::table('tags')
             ->select('city', DB::raw('count(*) as total'))
             ->groupBy('city')->get();

    $query = Industry::all();
        $industries = $query->where('status',1);
  //dd($tags);
$menus = $this->displayMenu();
  return view('jobs.job_listing', compact('tags', 'industry_professions', 'employement_term_list', 's', 'cities', 'job_type_count', 'city_count', 'industries', 's', 'location', 'job_function', 'menus'), array('user' => Auth::user()));
}

public function AllJobs(Request $request){
            $s = $request->input('s');
            $tags = Tag::where('status',1)->where('active',1)->paginate(20); 
            $query = Industry::all();
            $industries = $query->where('status',1);
            $industry_professions = DB::table('industry_professions')->get();
            $employement_term_list = DB::table('employement_terms')->get();
            $cities = DB::table('cities')->get();
            $location = City::findOrFail(7);
            $menus = $this->displayMenu();
  return view('jobs.job_listing', compact('tags', 'industry_professions', 'employement_term_list', 's', 'cities', 'job_type_count', 'city_count', 'industries', 's', 'location', 'job_function', 'menus'));
}

public function JobFilter(Request $request)
{
    $s = $request->input('s');
    $location = $request->location;
    $profession = $request->profession;
    $job_type = $request->job_type;

    $jobs = Tag::where(function ($query) use($location, $job_type){
        if (isset($location)) {

           foreach ($location as $loca) {
           $location_id = City::findOrFail($loca);
            $query->orWhere('city', $location_id->name); 
           }
        }
        if (isset($job_type)) {
           foreach ($job_type as $key => $value) {
            $query->orWhere('job_type', $value);
           }
        }
        if (isset($profession)) {
           foreach ($profession as $key => $prof) {
               $query->orWhere('job_category',$prof);
           }
        }
    })->paginate(10);

        $industry_professions = DB::table('industry_professions')->get();
        $employement_term_list = DB::table('employement_terms')->get();
        $cities = DB::table('cities')->get();

   $response = array( 'status' => 'success', 'msg' => 'Setting created successfully',  'jobs'=>$jobs, 'industry_professions'=>$industry_professions, 'employement_term_list'=>$employement_term_list, 's'=>$s);
return response()->json($response);
}

public function DisplayTemplates()
    {
        $resumelist = ResumeBuilder::all();
        $menus = $this->displayMenu();
        return view('candidate.template_home', compact('resumelist', 'menus'), array('user' => Auth::user()));
    }

    public function JobDetails($id){
//$id = 28;
 
      //  $user = Auth::user();
      $tag = Tag::findOrFail($id);
      //$tag = Tag::findOrFail($id);
      $employement_terms = DB::table('employement_terms')->get();
      $jobcareer_levels = DB::table('jobcareer_levels')->get();
      $industries = DB::table('industries')->get();
      $educational_levels = $this->GetQualificationLevels(); 
      $skillsets = DB::table('skillsets')->where('tagid', $id)->get();
      $cities = DB::table('cities')->get();

      $industry_professions = DB::table('industry_professions')->get();

      // view assessement Questions

      $job_assessments = DB::table('job_assessments')->where('job_id', $id)->get();

      $job_requirements = DB::table('job_requirements')->where('job_id', $id)->get();

      $get_Job_by_common_industries = DB::table('tags')->where('industry',$tag->industry)->orWhere('job_category',$tag->job_category)->orWhere('salary_range', $tag->salary_range)->get();
      $get_Job_by_common_industries_similler = DB::table('tags')->where('industry',$tag->industry)->where('job_category',$tag->job_category)->where('salary_range', $tag->salary_range)->get();
      $get_all_user_list = User::all();
      $menus = $this->displayMenu();
     return view('employer.job_details', compact('tag','employement_terms', 'jobcareer_levels', 'industries', 'educational_levels', 'skillsets', 'job_assessments', 'job_requirements', 'get_Job_by_common_industries', 'get_Job_by_common_industries_similler', 'cities', 'get_all_user_list', 'industry_professions', 'menus'), array('user' => Auth::user()));
    }

    public function AllIndustries(Request $request)
    {
      $s = $request->input('s');
      $industries = DB::table('industries')->where('status', 1)->paginate(8);
      $menus = $this->displayMenu();
     return view('jobs.industry_list',  compact('industries', 's', 'menus'));
    }

    public function SubscribeToNewsletter(Request $request)
    {
     //dd($request->all());
      $email = $request->email;
      $email_user = $request->email_user;
      $all = '110';
      $em = Email::firstOrNew(['email' => $email, 'industry' => $all]);
      $em->email = $request->email;
      $em->industry = $all;
      $em->created_at = $this->returnCurrentTime();
      $em->account_type = $email_user;
      $em->save(); 
      Session::flash('success', 'you have been added to the mailing list');
     return redirect()->back()->withMessage('success', 'Done successfully');
    }


}

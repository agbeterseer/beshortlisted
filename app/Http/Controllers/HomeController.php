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
use App\Policy;
use App\Post;
use App\ReachUs;
use Mail;
use Alert;
use App\EmployerPackage;
use App\Http\Requests\UpdateContactRequest;
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
     return $menus = Menu::where('status', 1)->orderBy('menu_order', 'ASC')->paginate(5);
   }
     public function displayUnits()
    {
      $user = Auth::user();
      //dd($user);
      if ($user === null) {
         return $units = 0;
      }else{
       return $units = EmployerPackage::where('status', 1)->where('userfkp', $user->id)->first();   
      }
      return back();
    }
   public function listPages()
   {
    $posts = DB::table('posts')->where('status',1)->get();
    return $posts;
   }
   public function vieSinglePage($id)
   {
    $posts = $this->listPages();
     return view('single_page' , compact('posts'));
   }
 
   public function welcome()
   {
    //dd('home');
    return redirect()->route('home');
   }

    public function home()
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
        $featured_jobs = DB::table('tags')->where('status',1)->where('active', 1)->where('featured',1)->orderBy('created_at', 'DESC')->paginate(8);
        //dd($featured_jobs);
        $jobs = DB::table('tags')->where('status',1)->where('active', 1)->orderBy('created_at', 'DESC')->paginate(4);
        $all_jobs = DB::table('tags')->where('active', 1)->orderBy('created_at', 'DESC')->get(); 
        $employement_term_list = DB::table('employement_terms')->get();
        $cities = DB::table('cities')->get();
        // 
        $query_count = DB::table('tags')
             ->select('industry', DB::raw('count(*) as total'))
             ->groupBy('industry');
        $industry_count = $query_count->paginate(8);
      // dd($industry_count);function_count
        $tag_cities = DB::table('tags')
             ->select('city', DB::raw('count(*) as total'))
             ->groupBy('city')->get();
      // dd($tag_city);
        // $job_function_count = DB::table('tags')
        //      ->select('job_category', DB::raw('count(*) as total'))
        //      ->groupBy('job_category')->get(); 
      $job_function_count = DB::table('tags')->where('status', 1)->where('active',1)->where('awaiting_aproval', 0)
             ->select('industry', DB::raw('count(*) as total'))
             ->groupBy('industry')->get();  
             //dd($job_function_count);   
        $menus = $this->displayMenu();
        $posts = $this->listPages();
        $job_match_count = DB::table('job_matches')->where('rate', '>', 2)->count(); 
       $page_information = DB::table('page_informations')->where('category', 'index')->first();
      return view('home', compact('documents', 'roles', 'users', 'resumes','industries', 'resume_builder_list', 'industries', 'jobs', 'resume_count', 'jobs_count', 'industry_professions', 'employement_term_list', 'cities','industry_count', 'industries_paginage', 'job_function_count', 'jobs_8', 'job_post', 'tag_cities', 'employement_terms', 'menus', 'job_match_count', 'posts', 'page_information', 'all_jobs', 'featured_jobs'), array('user' => Auth::user()));
    }
    public function employement_terms()
    {
      $employement_terms = DB::table('employement_terms')->get();
      return $employement_terms;
    }
    public function industry_professions()
    {
     $industry_professions = DB::table('industry_professions')->where('status',1)->get();
      return $industry_professions;
    }
public function industries()
{
  $industries = DB::table('industries')->where('status',1)->orderBy('created_at', 'DESC')->get();
  $industries;
}
public function employement_term_list()
{
  $employement_term_list = DB::table('employement_terms')->get();
  $employement_term_list;
}
  public function employee(Request $request){ 
       $menus = $this->displayMenu();
       $posts = DB::table('posts')->where('status', 1)->paginate(3);
       $featured_tags = DB::table('tags')->where('featured', 1)->paginate(6);
       $employement_terms = $this->employement_terms();
       $industry_professions = $this->industry_professions(); 
        //$industries = Industry::all();
       $industries = $this->industries();
       $employement_term_list = $this->employement_term_list();
       $page_information = DB::table('page_informations')->where('category', 'employee')->first();
    return view('employee', compact('menus', 'posts', 'featured_tags', 'industries', 'industry_professions', 'employement_terms', 'employement_term_list', 'page_information'));
  }
  public function employer(Request $request)
  {
    $plans = DB::table('planpackages')->orderBy('created_at', 'ASC')->get();
    $menus = $this->displayMenu();
    $posts = $this->listPages();
    $units = $this->displayUnits();
    return view('employer_info', compact('plans', 'menus', 'posts', 'units'));
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
    public function ShowJobFilterForm(Request $request, $code){
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
          $posts = $this->listPages();
          // $page = Post::where('display_name', $code)->where('status',1)->first();
         
     return view('jobs.job_listing_form', compact('industry_professions', 'industries', 'cities', 'city_count', 'employement_term_list','job_type_count', 'tags', 's', 'menus', 'posts') );
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
        $tags = DB::table('tags')
          ->where('status', 1)
          ->where('active',1)
          ->where('industry',$s)
          ->where('city', $location->name)
          ->where('job_category', $job_function)
          ->orderby('created_at', 'DESC')
          ->paginate(20); 
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
$menus = $this->displayMenu();
$posts = $this->listPages();
  return view('jobs.job_listing', compact('tags', 'industry_professions', 'employement_term_list', 's', 'cities', 'job_type_count', 'city_count', 'industries', 's', 'location', 'job_function', 'menus', 'posts'), array('user' => Auth::user()));
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
            $posts = $this->listPages();
  return view('jobs.job_listing', compact('tags', 'industry_professions', 'employement_term_list', 's', 'cities', 'industries', 's', 'menus', 'posts'));
}
public function JobFilter(Request $request)
{
    $s = $request->input('s');
    $location = $request->location;
    $profession = $request->profession;
    $job_type = $request->job_type;
    $industry = $request->industry;
    if($industry !=null || $location !=null || $profession !=null || $job_type !=null){

    $jobs = Tag::where(function ($query) use($location, $job_type, $profession, $industry){
        if (isset($location)) {
           foreach ($location as $loca) {
           $location_id = City::findOrFail($loca);
            $query->orWhere('city', $location_id->name); 
           }
        }elseif (isset($location) && isset($industry)) {
            foreach ($location as $loca) {
           $location_id = City::findOrFail($loca);
            $query->orWhere('city', $location_id->name); 
           }
        foreach ($industry as $key => $indus) {
               $query->orWhere('industry',$indus);
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
          if (isset($industry)) {
           foreach ($industry as $key => $indus) {
               $query->orWhere('industry',$indus);
           }
        }elseif (isset($industry) && isset($profession)) {
         foreach ($industry as $key => $indus) {
               $query->orWhere('industry',$indus);
           }
        }elseif (isset($industry) && isset($profession) && isset($job_type)) {
         foreach ($industry as $key => $indus) {
               $query->orWhere('industry',$indus);
           }
        }
    })->where('status',1)->where('active',1)->paginate(10);
}else{

  $jobs = Tag::where('status',1)->where('active',1)->paginate(10);
}
    //$jobs= Tag::all();
        $industry_professions = DB::table('industry_professions')->get();
        $employement_term_list = DB::table('employement_terms')->get();
        $industries = DB::table('industries')->get();
        $cities = DB::table('cities')->get(); 
   $response = array( 'status' => 'success', 'msg' => 'Setting created successfully',  'jobs'=>$jobs, 'industry_professions'=>$industry_professions, 'employement_term_list'=>$employement_term_list, 's'=>$s, 'industries' => $industries);
return response()->json($response);
}
public function DisplayTemplates()
    {
        $resumelist = ResumeBuilder::all();
        $menus = $this->displayMenu();
        $posts = $this->listPages();
        return view('candidate.template_home', compact('resumelist', 'menus', 'posts'), array('user' => Auth::user()));
    }
    public function JobDetails($id){ 
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
      $posts = $this->listPages();
     return view('employer.job_details', compact('tag','employement_terms', 'jobcareer_levels', 'industries', 'educational_levels', 'skillsets', 'job_assessments', 'job_requirements', 'get_Job_by_common_industries', 'get_Job_by_common_industries_similler', 'cities', 'get_all_user_list', 'industry_professions', 'menus', 'posts'), array('user' => Auth::user()));
    }
    public function AllIndustries(Request $request)
    {
      $s = $request->input('s'); 
    $industries = DB::table('industries')->where('status',1)->orderBy('created_at', 'DESC')->get();
      $menus = $this->displayMenu();
         $job_function_count = DB::table('tags')
             ->select('job_category', DB::raw('count(*) as total'))
             ->groupBy('job_category')->get();   
     return view('jobs.industry_list',  compact('industries', 's', 'menus', 'job_function_count'));
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
      Alert::success('Success Message', 'you have been added to the mailing list');
      Session::flash('sub-success', 'you have been added to the mailing list');
     return redirect()->back()->withMessage('success', 'Done successfully');
    }
    public function guidelines()
    {
      $menus = $this->displayMenu();
      $posts = $this->listPages();
     return view('guidelines', compact('menus', 'posts'), array('user' => Auth::user()));
    }
    public function helpcenter()
    {
    $menus = $this->displayMenu();
    $posts = $this->listPages();
     return view('helpcenter', compact('menus', 'posts'), array('user' => Auth::user()));
    }
    public function PreivewPolicy($id)
    {
    $policy = Policy::findOrFail($id);
    $posts = $this->listPages(); 
    return view('admin.policies.preview_policy', compact('policy', 'posts'), array('user' => Auth::user())); 
    }
    public function DisplayPolicy()
    {
     $menus = $this->displayMenu();
     $policy = Policy::where('status', 1)->orderBy('created_at', 'DESC')->first(); 

      return view('policy_document', compact('policy', 'menus'), array('user' => Auth::user())); 
    }
    public function DisplayJobListing()
    {
      $menus = $this->displayMenu();
      $posts = $this->listPages();
      return view('jobs.job_listing', compact( 'menus', 'posts'), array('user' => Auth::user())); 
    }
        public function TermsOfUse()
    {
      $menus = $this->displayMenu();
      $posts = $this->listPages();
      return view('jobs.terms_of_use', compact( 'menus', 'posts'), array('user' => Auth::user())); 
    }
    public function showSinglePage($code)
    {
      $menus = $this->displayMenu();
      $posts = $this->listPages();
      $page = Post::where('display_name', $code)->where('status',1)->first();
      if ($code == 'job-list') {
        
        return $this->ShowJobFilterForm($code);
        # code...
      }
       return view('single_page', compact('page', 'menus'), array('user' => Auth::user()));
    }
    public function contact()
    {
    $menus = $this->displayMenu();
    $posts = $this->listPages();
    $contact = DB::table('contacts')->where('status',1)->get();
    $countries = DB::table('countries')->get();
    return view('contactus', compact('posts', 'menus', 'contact', 'countries'), array('user' => Auth::user()));
    }
public function addContactUs (Request $request)
{ 
    try {
      if ($request->name !=null && $request->name !='' && $request->email !=null && $request->email !='') {
           $contact = new ReachUs; 
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message; 
            $contact->created_at = $this->returnCurrentTime();
            $contact->save();
            Session::flash('success','Thank you for contacting us. your email has been sent successfully');
            return redirect()->back();#
          }
    } catch (Exception $e) {
            return redirect()->back()->withErrors(['error'=> 'something went wrong']); 
    } 
 
       return  redirect()->back();
}

public function getJobsByIndustries($code)
{ 

  $menus = $this->displayMenu();
  $posts = $this->listPages();
  $jobs_by_industries = DB::table('tags')->where('industry',$code)->where('status', 1)->get(); 
  $industry_professions = DB::table('industry_professions')->where('status',1)->get();
  $employement_term_list = DB::table('employement_terms')->get();
 //dd($jobs_by_industries);
 return view('jobs.view_jobs_by_industries', compact('jobs_by_industries', 'menus', 'posts', 'industry_professions', 'employement_term_list', 'code'), array('user' => Auth::user()));
}

}
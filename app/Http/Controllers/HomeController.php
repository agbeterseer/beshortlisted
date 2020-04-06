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
use App\ResumeBuilder;
use App\Tag;
use App\Email;
use App\City;
use App\Menu;
use App\Policy;
use App\Post;
use App\ReachUs;
use App\Client;
use App\Section;
use Mail;
use Alert; 
use App\Notifications\AccountVerification;
use App\EmployerPackage;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Requests\EmailJObToAFriendRequest;
use App\WorkExperience;
use App\AboutUs;
use App\Mail\EmailAFriend;
use App\Services\ApplicationService;
use App\Services\UserService;
use App\Services\MenuService;
use App\Services\EmployerPackageService;
use App\Services\PostService;
use App\Services\PlanPackageService;
use App\Services\RecruitResumeService;
use App\Services\ResumeBuilderService;
use App\Services\TagService;
use App\Services\EmployementTermService;
use App\Services\IndustryProfessionService;
use App\Services\IndustryService;
use App\Services\JobMatchService;
use App\Services\PageInformationService;
use App\Services\BannerService;
use App\Services\CityService;
use App\Services\CountryService;
use App\Services\RegionService;
use App\Services\JobAssessmentService;
use App\Services\JobRequirementService;
use App\Services\SendEmailService;
use App\Services\AboutUSService;
use App\Services\ContactUsService;
use App\Services\PersonalInformationService;

class HomeController extends Controller
{
  protected $applicationService;
  protected $userService;
  protected $menuService;
  protected $employerPackageService;
  protected $postService;
  protected $planPackageService;
  protected $recruitResumeService;
  protected $resumeBuilderService;
  protected $tagService;
  protected $employementTermService;
  protected $industryProfessionService;
  protected $industryService;
  protected $jobMatchService;
  protected $pageInformationService;
  protected $bannerService;
  protected $cityService;
  protected $countryService;
  protected $regionService;
  protected $jobAssessmentService;
  protected $requirementService;
  protected $sendEmailService;
  protected $aboutUSService;
  protected $contactusService;
  protected $personalInformationService;


  public function __construct(ApplicationService $applicationService, UserService $userService, MenuService $menuService, EmployerPackageService $employerPackageService, PostService $postService, PlanPackageService $planPackageService, RecruitResumeService $recruitResumeService, ResumeBuilderService $resumeBuilderService, TagService $tagService, EmployementTermService $employementTermService, IndustryProfessionService $industryProfessionService, IndustryService $industryService, JobMatchService $jobMatchService, PageInformationService $pageInformationService, BannerService $bannerService, CityService $cityService, CountryService $countryService, RegionService $regionService, JobAssessmentService $jobAssessmentService, JobRequirementService $jobRequirementService, SendEmailService $sendEmailService, AboutUSService $aboutUSService, ContactUsService $contactusService, PersonalInformationService $personalInformationService)
  {
    $this->applicationService = $applicationService;
    $this->userService = $userService;
    $this->menuService = $menuService;
    $this->employerPackageService = $employerPackageService;
    $this->postService = $postService;
    $this->planPackageService = $planPackageService;
    $this->recruitResumeService = $recruitResumeService;
    $this->resumeBuilderService = $resumeBuilderService;
    $this->tagService = $tagService;
    $this->employementTermService = $employementTermService;
    $this->industryProfessionService = $industryProfessionService;
    $this->industryService = $industryService;
    $this->jobMatchService = $jobMatchService;
    $this->pageInformationService = $pageInformationService;
    $this->bannerService = $bannerService;
    $this->cityService = $cityService;
    $this->countryService = $countryService;
    $this->regionService = $regionService;
    $this->jobAssessmentService = $jobAssessmentService;
    $this->jobRequirementService = $jobRequirementService;
    $this->sendEmailService = $sendEmailService;
    $this->aboutUSService = $aboutUSService;
    $this->contactusService = $contactusService;
    $this->personalInformationService = $personalInformationService;

  }
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

    public function indexapi()
    {
      // $users = User::orderBy('created_at', 'ASC')->paginate(5);
      $users = $this->userService->getUserByCreatedAt();
      $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'users' => $users);
      return response()->json($response);
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayMenu(){
     return $menus = $this->menuService->getActiveMenu();

   }

     public function displayUnits()
    {
      $user = Auth::user();
      //dd($user);
      if ($user === null) {
         return $units = 0;
      }else{
       return $units = $this->employerPackageService->getUserActivePackage($user);
       // EmployerPackage::where('status', 1)->where('userfkp', $user->id)->first();   
      }
      return back();
    }


   public function listPages()
   {
    $posts = DB::table('posts')->where('status',1)->get();
    return $posts = $this->postService->getActivePost();
   }


   public function vieSinglePage($id)
   {
    $posts = $this->listPages();
     return view('single_page' , compact('posts'));
   }
 
   public function welcome()
   { 
    return redirect()->route('home');
   }

   public function getAllPlanPackage()
   {
     return $plans = $this->planPackageService->getPlanPackage();
   }

   public function show_price()
  {
    // $plans = DB::table('planpackages')->orderBy('created_at', 'ASC')->where('status', 1)->get();
    $plans = $this->getAllPlanPackage();
    $menus = $this->displayMenu();
    $posts = $this->listPages();
    $units = $this->displayUnits();

return view('employerpricing', compact('plans', 'menus', 'posts', 'units'), array('user' => Auth::user()));
  }

   public function JobFunctions()
{
   // $plans = DB::table('planpackages')->orderBy('created_at', 'ASC')->where('status', 1)->get();
    $menus = $this->displayMenu();
    $posts = $this->listPages();
    $units = $this->displayUnits();
return view('jobs.job_functions', compact('menus', 'posts', 'units'), array('user' => Auth::user()));
}


    public function home()
    {
        $job_post = Tag::get();
        //\App\Tag::job_post();
        // $documents = Document::all()->count();
        // $roles = Role::all()->count();
        // $users = User::all()->count();

        $company_count = $this->userService->company_count(); // count with account type employer
         // User::where('account_type', 'employer')->count(); 
        $resumes = $this->recruitResumeService->all();  //RecruitResume::all();
        $resume_count = $this->recruitResumeService->all()->count(); 

        $jobs_count =  $this->tagService->getActiveTag()->count();  //Tag::where('status',1)->where('active', 1)->count();
        $resume_builder_list = $this->recruitResumeService->all();

        $employement_terms = $this->employementTermService->getemployementTermsOrderByName();   //DB::table('employement_terms')->orderBy('name')->get();

        $industry_professions = $this->industryProfessionService->getActiveIndustryProfessionByName();
        //DB::table('industry_professions')->orderBy('name')->where('status',1)->get();
        //$industries = Industry::all();
        $industries = $this->industryService->getActiveIndustryByName();
        // DB::table('industries')->where('status',1)->orderBy('name')->orderBy('created_at', 'DESC')->get();
     
       // $query = IndustryProfession::all();
        $industries_paginage = $this->industryProfessionService->getActiveIndustryProfessionPagination();
        //DB::table('industry_professions')->where('status',1)->orderBy('created_at', 'DESC')->paginate(8);

        $jobs_8 = $this->tagService->getActiveTagsPaginate();
        // DB::table('tags')->where('status',1)->where('active', 1)->orderBy('created_at', 'DESC')->paginate(8);


        $featured_jobs = $this->tagService->getFeaturedJobs()->paginate(8);
        // DB::table('tags')->where('status',1)->where('active', 1)->where('featured',1)->orderBy('created_at', 'DESC')->paginate(8);
        //dd($featured_jobs);

        $jobs = $this->tagService->getJobByPagination();
        // DB::table('tags')->where('status',1)->where('active', 1)->orderBy('created_at', 'DESC')->paginate(4);
        
        $all_jobs = $this->tagService->getAllJobs();
        //DB::table('tags')->where('active', 1)->orderBy('created_at', 'DESC')->get(); 

        $employement_term_list = $this->employementTermService->all();
        // DB::table('employement_terms')->get();

        $cities = $this->GetCities();
        // 
        $query_count = $this->tagService->getGroupTagsByIndustry();
        $industry_count = $query_count->paginate(8);

      // dd($industry_count);function_count
        $tag_cities = $this->tagService->getGroupTagsByCity();
       
        $job_function_count = $this->tagService->getJobFunctionCount();
        
        $menus = $this->displayMenu();
        $posts = $this->listPages();

        $job_match_count = $this->jobMatchService->getJobMatchGreaterThanTwo();
        // DB::table('job_matches')->where('rate', '>', 2)->count(); 
        //getJobMatchGreaterThanTwo

        $page_information = $this->pageInformationService->getPageInformation();
        // DB::table('page_informations')->where('category', 'index')->first();

       // get banner file
        $banner = $this->bannerService->getFirstBanner();
       // DB::table('banners')->orderBy('created_at', 'DESC')->first();
      
      return view('home', compact( 'resumes','industries', 'resume_builder_list', 'industries', 'jobs', 'resume_count', 'jobs_count', 'industry_professions', 'employement_term_list', 'cities','industry_count', 'industries_paginage', 'job_function_count', 'jobs_8', 'job_post', 'tag_cities', 'employement_terms', 'menus', 'job_match_count', 'posts', 'page_information', 'all_jobs', 'featured_jobs', 'company_count', 'banner'), array('user' => Auth::user()));
    }


    public function employement_terms()
    {
      // $employement_terms = DB::table('employement_terms')->get();
      return $this->employementTermService->all();
    }

    public function industry_professions()
    {
     $industry_professions = $this->industryProfessionService->getActiveIndustryProfessionByName();
     //DB::table('industry_professions')->where('status',1)->get();
      return $industry_professions;
    }

  public function industries()
  {
    $industries = $this->industryService->getActiveIndustryByName();
    // DB::table('industries')->where('status',1)->orderBy('created_at', 'DESC')->get();
    return $industries;
  }

  public function allCountries()
  {
    return $countries = $this->countryService->getCountries();
  }
     public function GetQualificationLevels()
    {
    $qualifications = DB::table('qualification_levels')->orderBy('name')->get();
     return $qualifications;
    }
    public function GetCities()
    {
    $cities = $this->cityService->getCitiesOrderByName();
    // DB::table('cities')->orderBy('name')->get();
    return $cities;
    }

  public function employement_term_list()
  {
    $employement_term_list = $this->employementTermService->all();
   
    return $employement_term_list;
  }

  public function employee(Request $request){ 
       $menus = $this->displayMenu();

       $posts = $this->postService->getActivePostPagination()->paginate(6);
       // DB::table('posts')->where('status', 1)->paginate(3);
       $featured_tags = $this->tagService->getFeaturedJobs()->paginate(6);   //DB::table('tags')->where('featured', 1)->where('active', 1)->paginate(6)
       $employement_terms = $this->employement_terms();
       $industry_professions = $this->industry_professions(); 
        //$industries = Industry::all();
       $industries = $this->industries();
       $employement_term_list = $this->employement_term_list();
       $page_information = $this->pageInformationService->getPageInformationInput('employee');
       //DB::table('page_informations')->where('category', 'employee')->first();
    
    return view('employee', compact('menus', 'posts', 'featured_tags', 'industries', 'industry_professions', 'employement_terms', 'employement_term_list', 'page_information'));
  }

  public function employer(Request $request)
  {
    $user = Auth::user();
    if ($user) {
    $is_empty = DB::table('employer_packages')->where('userfkp', $user->id)->get();
    }
    //dd($is_empty);
    $plans = $this->getAllPlanPackage();
    // DB::table('planpackages')->orderBy('created_at', 'ASC')->where('status', 1)->get(); 
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
 

        public function Jobs(Request $request)
        {
            $menus = $this->displayMenu();
            $posts = $this->listPages();
            $tags = Tag::paginate(15);

        if ($request->ajax()) {
              return view('jobs.load', ['tags' => $tags])->render();  
          }

           return view('jobslist', compact('tags','menus', 'post' ));
        }

    
        public function ShowJobFilterForm(Request $request){ 

        $s = $request->input('s');

        $countries = $this->allCountries();
        
        $cities = $this->GetCities();
        
        $regions = $this->regionService->all();
        // DB::table('regions')->get();
        
        $educational_levels = $this->GetQualificationLevels(); 
        
        $industries = $this->industries();
        // DB::table('industries')->where('status', 1)->orderBy('name')->get();
        
        $industry_professions = $this->industry_professions();
        //DB::table('industry_professions')->orderBy('name')->get();

        $employement_term_list = $this->employementTermService->getemployementTermsOrderByName();
        // DB::table('employement_terms')->orderBy('name')->where('status',1)->get();
        //DB::table('employement_terms')->orderBy('name')->where('status',1)->get();

        $employement_term_Unorderedlist = DB::table('employement_terms')->where('status',1)->get();
        
        $city_count = $this->countTagByCity();
        
        $job_type_count = $this->jobTypeCount();
        
        $industry_count = $this->industryCount();
        
        $industry_professions_count = $this->industryProfessionsCount();
        
        $tags = $this->getActiveTags();
        
        $tags_count = $this->getActiveTagsCount(); 
        
        $menus = $this->displayMenu();
        
        $posts = $this->listPages();
              // $page = Post::where('display_name', $code)->where('status',1)->first();
        if ($request->ajax()) {

            return view('jobs.load', ['tags' => $tags, 'industry_professions' => $industry_professions, 'employement_term_list' => $employement_term_list, 'industries' => $industries, ])->render();  
        }   
     return view('jobs.job_listing_form', compact('industry_professions', 'industries', 'cities', 'city_count', 'employement_term_list','job_type_count', 'tags', 's', 'menus', 'posts', 'employement_term_Unorderedlist', 'industry_count', 'industry_professions_count', 'tags_count'));
    }

    public function countTagByCity()
    {
      $city_count = $this->tagService->cityCount();
    return $city_count;
    }
// cityCount//
    // public function cityCount()
    // {
    //         $city_count = DB::table('tags')
    //              ->select('city', DB::raw('count(*) as total'))
    //              ->groupBy('city')->where('status',1)->where('active',1)->get();
    // return $city_count;
    // }

    public function getActiveTags()
    {
     $tags = $this->tagService->getActiveTag()->paginate(20); 
     // Tag::where('status',1)->where('active',1)
     return $tags;
    }

    public function getActiveTagsCount()
    {
     $tags = $this->tagService->getActiveTag()->count(); 
     return $tags;
    }

    public function jobTypeCount()
    {
       $job_type_count =  $this->tagService->jobTypeCount();
      return $job_type_count;
    }

    public function industryCount()
    {
      $industry_count = $this->tagService->industryCount();
      return $industry_count;
    }

    public function industryProfessionsCount()
    {
      $industry_professions_count = $this->tagService->industryProfessionsCount();
      return $industry_professions_count;
    }

    public function ShowJobFilterForm2(Request $request, $code){

        $s = $request->input('s');
        $countries = DB::table('countries')->get();

        $cities = $this->GetCities();

        $regions = $this->regionService->all();

        $educational_levels = $this->GetQualificationLevels();

        $industries = $this->industries();
        // DB::table('industries')->where('status', 1)->orderBy('name')->get();
        
        $industry_professions = $this->industry_professions();

        $city_count = $this->tagService->getGroupTagsByCity();

        $employement_term_list = $this->employementTermService->getemployementTermsOrderByName();
        
        $job_type_count = $this->tagService->jobTypeCount();
 
        $tags = $this->getActiveTags();   
              
        $menus = $this->displayMenu();
              
        $posts = $this->listPages();
              // $page = Post::where('display_name', $code)->where('status',1)->first();
         
     return view('jobs.job_listing_form-2', compact('industry_professions', 'industries', 'cities', 'city_count', 'employement_term_list','job_type_count', 'tags', 's', 'menus', 'posts') );
    }


    public function JobListing(Request $request){
    //dd('here');
        $s = $request->input('s');
        $location = $request->input('location');
        $job_function = $request->input('job_function');

        $industry_professions = $this->industry_professions();
        $employement_term_list = $this->employementTermService->getemployementTermsOrderByName(); 
        $employement_term_Unorderedlist = $this->employementTermService->employement_term_Unorderedlist();

        $cities = $this->GetCities();
        $city_count = $this->countTagByCity();
        $job_type_count = $this->jobTypeCount(); 
        $industry_count = $this->industryCount();
        $industry_professions_count = $this->industryProfessionsCount();
        $query = Industry::all();
        $industries = $query->where('status',1); 
        $menus = $this->displayMenu();
        $posts = $this->listPages();

        $location = City::findOrFail($location);
 
        if ($s && $location && $job_function) {


        $tags = DB::table('tags')
          ->where('status', 1)
          ->where('active',1)
          ->where('industry',$s)
          ->where('city', $location->name)
          ->where('job_category', $job_function)
          ->orderby('created_at', 'DESC')
          ->paginate(20); 

          //dd($tags);
           if ($request->ajax()) {
              return view('jobs.load', ['tags' => $tags, 'industry_professions' => $industry_professions, 'employement_term_list' => $employement_term_list, 'industries' => $industries, 'employement_term_Unorderedlist' => $employement_term_Unorderedlist ])->render();  
          }  
        }
    

      if ($request->ajax()) {
          return view('jobs.load', ['tags' => $tags, 'industry_professions' => $industry_professions, 'employement_term_list' => $employement_term_list, 'industries' => $industries, 'employement_term_Unorderedlist' => $employement_term_Unorderedlist ])->render();  
      }  

  return view('jobs.job_listing_form', compact('tags', 'industry_professions', 'employement_term_list', 's', 'cities', 'job_type_count', 'city_count', 'industries', 's', 'location', 'job_function', 'menus', 'posts', 'employement_term_Unorderedlist', 'industry_count', 'industry_professions_count'), array('user' => Auth::user()));
}

public function DisplayTemplates()
    {
        $resumelist = ResumeBuilder::all();
        $menus = $this->displayMenu();
        $posts = $this->listPages();
        return view('candidate.template_home', compact('resumelist', 'menus', 'posts'), array('user' => Auth::user()));
    }


    public function JobDetails($id){ 
      $tag = $this->tagService->readOrFail($id);
      //$tag = Tag::findOrFail($id);
      $employement_terms = $this->employementTermService->getemployementTermsOrderByName();
      $jobcareer_levels = DB::table('jobcareer_levels')->get();
      $industries = $this->industries();
      $educational_levels = $this->GetQualificationLevels(); 
      $skillsets = DB::table('skillsets')->where('tagid', $id)->get();
      $cities = $this->GetCities();
      $industry_professions = $this->industry_professions();
      // view assessement Questions
      $job_assessments = $this->jobAssessmentService->getJobAssessmentsByJobID($id);
      //DB::table('job_assessments')->where('job_id', $id)->get();
      
      $job_requirements = $this->jobRequirementService->getJobRequirementsByJobID($id);
      // DB::table('job_requirements')->where('job_id', $id)->get();

      $get_Job_by_common_industries = $this->tagService->findByIndustryIDAndJobCategoryAndSalaryRang($tag)->paginate(3);
      // Tag::latest()->where('industry',$tag->industry)->orWhere('job_category',$tag->job_category)->orWhere('salary_range', $tag->salary_range)->paginate(3);

      $get_Job_by_common_industries_similler = $this->tagService->findByIndustryIDAndJobCategoryAndSalaryRang($tag)->paginate(3);
      
      $get_all_user_list = User::all();
      
      $menus = $this->displayMenu();
      
      $posts = $this->listPages();

      // if ($success) {
      //   Session::flash('Job link sent successfully');
      // }

     return view('employer.job_details', compact('tag','employement_terms', 'jobcareer_levels', 'industries', 'educational_levels', 'skillsets', 'job_assessments', 'job_requirements', 'get_Job_by_common_industries', 'get_Job_by_common_industries_similler', 'cities', 'get_all_user_list', 'industry_professions', 'menus', 'posts'), array('user' => Auth::user()));
    }


    public function EmailJobToAFriend(EmailJObToAFriendRequest $request){

      $semail = $this->sendEmailService->EmailJobToAFriendService($request);
 
     return redirect()->back();
    }


    public function AllIndustries(Request $request)
    {
    $s = $request->input('s'); 
    $industries = $this->industries();
    $menus = $this->displayMenu();
    $job_function_count = $this->tagService->getTagsGroupByIndustry();
    return view('jobs.industry_list',  compact('industries', 's', 'menus', 'job_function_count'));
    }

    public function SubscribeToNewsletter(Request $request)
    {
     //dd($request->all());

      $this->sendEmailService->SubscribeToNewsletterService($request); 

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
    $countries = $this->allCountries(); //DB::table('countries')->get();
    return view('contactus', compact('posts', 'menus', 'contact', 'countries'), array('user' => Auth::user()));
    }

    public function aboutus()
    {
    $menus = $this->displayMenu();
    $posts = $this->listPages();
    $contact = DB::table('contacts')->where('status',1)->get();
    $countries = $this->allCountries();
    // $page = Post::where('display_name', 'about-us')->where('status',1)->first();  
    $about = $this->aboutUSService->getAboutUSOrderByCreatedAt(); //DB::table('aboutuses')->orderBy('created_at', 'DESC')->first();
    //getAboutUSOrderByCreatedAt
    $resume_count = RecruitResume::all()->count();
    $jobs_count = $this->tagService->getActiveTag()->count();
    $job_match_count = $this->jobMatchService->getJobMatchGreaterThanTwo();
    // DB::table('job_matches')->where('rate', '>', 2)->count();

    $page = Post::where('display_name', 'terms-of-use')->where('status',1)->first();
    return view('aboutus', compact('posts', 'menus', 'contact', 'countries', 'about', 'job_match_count', 'resume_count', 'jobs_count', 'page'), array('user' => Auth::user()));
    }
public function addContactUs (Request $request)
{

  $this->contactusService->SaveContact($request);
 
  return  redirect()->back();
}

public function getJobsByIndustries($code)
{ 

  $menus = $this->displayMenu();
  $posts = $this->listPages();

  $jobs_by_industries = $this->tagService->getJobByIndustry($code);
   // DB::table('tags')->where('industry',$code)->where('status', 1)->get(); 
  $industry_professions = $this->industry_professions();       //DB::table('industry_professions')->where('status',1)->get();
  $employement_term_list = $this->employementTermService->getemployementTermsOrderByName();
 //dd($jobs_by_industries);
 return view('jobs.view_jobs_by_industries', compact('jobs_by_industries', 'menus', 'posts', 'industry_professions', 'employement_term_list', 'code'), array('user' => Auth::user()));
}

public function listPageInfo(Request $request)
{
  $menus = $this->displayMenu();
  $posts = $this->listPages();
  $all_pages = $this->personalInformationService->all();
  // DB::table('personal_informations')->get();
return view('pages.page_infor_list', compact('menus', 'posts', 'all_pages'), array('user' => Auth::user()));
}

public function SingUp()
{
  $menus = $this->displayMenu();
  $posts = $this->listPages();
  $all_pages =  DB::table('personal_informations')->get();
return view('auth.select_registration', compact('menus', 'posts', 'all_pages'), array('user' => Auth::user()));
}

public function EmployerSignUp()
{
  $menus = $this->displayMenu();
  $posts = $this->listPages();
  $all_pages = $this->personalInformationService->all(); //DB::table('personal_informations')->get();
  $countries = $this->allCountries(); //DB::table('countries')->orderBy('name_en')->get();
  $industries = $this->industries(); //DB::table('industries')->orderBy('name')->where('status',1)->get();
return view('auth.employer_registration', compact('menus', 'posts', 'all_pages', 'countries', 'industries'), array('user' => Auth::user()));
}

public function EmployeeSignUp()
{
  $menus = $this->displayMenu();
  $posts = $this->listPages();
  $all_pages = DB::table('personal_informations')->get();
  $countries = DB::table('countries')->orderBy('name_en')->get();
  $industries = DB::table('industries')->orderBy('name')->where('status',1)->get();
   $recruityear_list = RecruitYear::orderBy('name', 'DESC')->get();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->orderBy('name')->get(); 
       $industry_profession = DB::table('industry_professions')->orderBy('name')->get();
        //employement_terms employement_terms
return view('auth.employee_registration', compact('menus', 'posts', 'all_pages', 'countries', 'industries', 'recruityear_list', 'job_career_levelList', 'educationallevels', 'employementterms', 'industry_profession'), array('user' => Auth::user()));
}




public function RegisterEmployer(Request $request)
{
// dd($request->all());

  $account_type = $request->account_type;
  $email = $request->email;
  $password = $request->password;
  $password_confirmation = $request->password_confirmation;
  $phone = $request->code . $request->phone;
  $name = $request->name;
  $lastname = $request->lastname;
  $comany_name = $request->comany_name;
  $number_of_employees = $request->number_of_employees;
  $industry = $request->industry;
  $type_of_employer = $request->type_of_employer;
  $website = $request->website;

  $contact_address = $request->contact_address;
  $contact_phone_number = $request->code . $request->contact_phone_number;
  $email_notificaiton = $request->email_notificaiton;
  $contact_person = $request->contact_person;
  $country = $request->country; 

  //check user
  $user = DB::table('users')->where('email', $email)->first();
  if ($user) {
   Session::flash('error-email', 'email address already taken');
  return redirect()->back();
  }

  $confirmation_code = str_random(30);
//dd($request->all());
if ($contact_person !=null && $contact_person !="" && $lastname !=null && $lastname !="") {

  $user = User::firstOrNew(['email'=>$email]); 
  $user->name = $comany_name;
  $user->password = bcrypt($password);
  $user->account_type = $account_type;
  $user->active = 0;
  $user->confirmation_code = $confirmation_code;
  $user->confirmed = 0;
  $user->save();

 $recruit_profile_pix = DB::table('recruit_profile_pixs')->insert(['user_id' => $user->id, 'order' => 1, 'status' => 1, 'created_at' => $this->returnCurrentTime()]);

  $client = Client::firstOrNew(['name' => $comany_name]);
  $client->name = $comany_name; 
  $client->phone_number = $phone;
  $client->website = $website;
  $client->country = $country; 
  $client->full_address = $contact_address;
  $client->number_of_employees = $number_of_employees;
  $client->type_of_employment = $type_of_employer;
  $client->industry = $industry;
  $client->contact_person_name = $contact_person;
  $client->contact_person_email = $email_notificaiton; 
  $client->contact_person_number = $contact_phone_number; 
  $client->user_id = $user->id;
  $client->created_at = $this->returnCurrentTime();
  $client->save(); 

  $this->SendEmployerVerificaionEmail2($contact_person, $email, $confirmation_code, $user, $account_type);
// redirect to employer_email_info_page

}else{
  return redirect()->back()->withErrors(['error', 'cannot create account']);
}
return redirect()->route('create_account.success');
}


  public function uploadIsValid($request)
    {
        if ($request->file('upload-cv')) {
            // dd($request->all());
        foreach ($request->file('upload-cv') as $file) {
 
            if (!$file->isValid()) {
                return false;
            }
        }
    }
    return true;
}



public function RegisterEmployee(Request $request)
{
  $account_type = $request->account_type;
  $email = $request->email;
  $password = $request->password;
  $password_confirmation = $request->password_confirmation;
  $phone = $request->code . $request->phone;
  $firstname = $request->firstname;
  $lastname = $request->lastname;
  $work_from_year = $request->work_from_year;
  $work_from_month = $request->work_from_month;
  $end_year = $request->end_year;
  $end_month = $request->end_month;
  $present = $request->current;
  $country = $request->country;
  $industry = $request->industry;
  $profession = $request->profession;
  $newsletter = $request->newsletter;
  $availability = $request->availability;
  $position_title = $request->position_title;
  $company_name = $request->company_name;
  $gender = $request->gender; 
  $educational_level = $request->educational_level;
 // dd($phone);
   // check if user exist

  $user = DB::table('users')->where('email', $email)->first();
  if ($user) {
    Session::flash('error-email', 'email address already taken');
  return redirect()->back();
  }

    if ($end_year !=null && $end_month !=null) {

        $present = 0;
        }else{

        $present = $request->current;
      }

  $date_of_birth = new Carbon($request->date_of_birth);
if ($end_year !=null && $end_month !=null) {
    if ($work_from_year > $end_year ) { 

  Session::flash('error-year', 'The Year you started working must be greater than the later.');
    return redirect()->back()->withErrors(['error', 'cannot create account']);
  }

}

  $confirmation_code = str_random(30); 

if ($email !=null && $email !="" && $firstname !=null && $firstname !="") {

 //Save user
 $user = $this->SaveUser($email, $firstname, $lastname, $password, $account_type, $confirmation_code);
  // initialise candidates resume
 $resume_record = $this->SaveCaption($position_title, $user); 

 $profession = DB::table('professions')->where('id',$profession)->first();
 // save docment

 if ($this->uploadIsValid($request)) {
 
        // set document types
         $allowedFileTypes = config('app.allowedFileTypes');
         $maxFileSize = config('app.maxFileSize');
         $rules = [
            'upload_cv' => 'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
        ];

        $this->validate($request, $rules);

        $upload_cv = $request->upload_cv;
        // $this->uploadCV($request->upload_cv);
  
  }

 $this->SaveDocument($firstname, $lastname, $user, $resume_record, $gender, $date_of_birth, $country, $email, $phone, $availability, $educational_level, $upload_cv);


 $recruit_profile_pix = DB::table('recruit_profile_pixs')->insert(['user_id' => $user->id, 'order' => 1, 'status' => 1, 'created_at' => $this->returnCurrentTime()]);

// save candidate work experience
$this->SaveWorkExperience($work_from_year, $work_from_month, $end_year, $end_month, $position_title, $company_name, $country, $user, $resume_record, $present);
 
  if ($newsletter !=null && $newsletter === 'on') {
   $subemail = new Email();
   $subemail->email = $email;
   $subemail->user = $user->id;
   $subemail->industry = $industry;
   $subemail->account_type = $account_type;
   $subemail->save();
  }



  $this->SendEmployerVerificaionEmail($email, $confirmation_code, $user, $account_type);
// redirect to employer_email_info_page  show.resume
 
}else{
  return redirect()->back()->withErrors(['error', 'cannot create account']);
}
return redirect()->route('create_account.success');
}

public function SaveWorkExperience($work_from_year, $work_from_month, $end_year, $end_month, $position_title, $company_name, $country, $user, $resume_record, $present) {

  $work_experience = new WorkExperience;
  $work_experience->start_year =  $work_from_year;
  $work_experience->start_month = $work_from_month;
  $work_experience->end_year = $end_year;
  $work_experience->end_month = $end_month;
  $work_experience->position_title = $position_title; 
  $work_experience->company_name = $company_name;
  $work_experience->country = $country;
  $work_experience->created_at = $this->returnCurrentTime();
  $work_experience->userfk = $user->id;
  $work_experience->resumefk = $resume_record->id;
  $work_experience->present = $present; 
  $work_experience->save();

  $section = 'workhistory';

  $this->AddSection($section, $user->id, $resume_record->id);
  return redirect()->back();
}

public function AddSection($name, $user_id, $resume){
 //dd($name);

    // get the resume ID
    //$resume = $resume->id;
    $resume = RecruitResume::findOrFail($resume);
     
         // $count = 0;
  
        if ($name !=null && $user_id !=null && $resume->id !=null) {       
           //dd($user_id);
        $section = Section::firstOrNew(['resume_code' => $resume->id, 'user_code' => $user_id, 'name' => $name]);
        $section->name = $name;
        $section->user_code = $user_id;
        $section->resume_code = $resume->id;
        $section->status = 1;
        $section->created_at = $this->returnCurrentTime();
        $section->save();


        $section_id = Section::findOrFail($section->id);
        $getid = Section::findOrFail($section_id->id);
        $getid->order = $section->id;
        $getid->updated_at = $this->returnCurrentTime();
        $getid->save();
}
 
        
  return redirect()->back();
}

// add document
public function SaveDocument($firstname, $lastname, $user, $resume_record, $gender, $date_of_birth, $country, $email, $phone, $availability, $educational_level, $upload_cv)
{
 

  $document = new Document;
  $document->candidates_name = $firstname . ' ' . $lastname;
  $document->user_id = $user->id;
  $document->resume_id = $resume_record->id;
  $document->gender = $gender;
  $document->date_of_birth = new Carbon($date_of_birth);
  $document->nationality = $country;
  $document->email = $email;
  $document->phonenumber = $phone; 
  $document->availability = $availability;  
  $document->educational_level = $educational_level;
  $document->save();

$this->uploadCV($upload_cv, $document);

$section = 'job_profile';

$this->AddSection($section, $user->id, $resume_record->id);
return redirect()->back();
}

public function uploadCV($file, $document)
{ 

      if ($file) {
      
              $fileName = $file->getClientOriginalName();
              $file->move(public_path('uploads'), $fileName);

              $doc = Document::findOrFail($document->id);
              $doc->cv_file = $fileName;
              $doc->save();
    
          return redirect()->back();
    }

  
}


// add user
 public function SaveUser($email, $firstname, $lastname, $password, $account_type, $confirmation_code)
 {
  $user = User::firstOrNew(['email'=>$email]); 
  $user->name = $firstname;
  $user->firstname = $firstname;
  $user->lastname = $lastname;
  $user->password = bcrypt($password);
  $user->account_type = $account_type;
  $user->active = 0;
  $user->confirmation_code = $confirmation_code;
  $user->confirmed = 0;
  $user->save();
  return $user;
 }

 public function SaveCaption($position_title, $user)
 {
  $resume_record = new RecruitResume;
  $resume_record->pr_caption = $position_title;
  $resume_record->user_id = $user->id;
  $resume_record->status = 1;
  $resume_record->order = 1;
  $resume_record->created_at = $this->returnCurrentTime();
  $resume_record->save();
  return $resume_record;
 }

public function SendEmployerVerificaionEmail2($contact_person, $email, $confirmation_code, $user, $account_type){
 
  $content = [
     'email' => $email,
     'confirmation_code' => $confirmation_code,
     'contact_person' => $contact_person,
     'account_type' => $account_type,
  ];
 
  try {

    // Mail::to($email)->queue(new EmailAccountCreation($content));
     $user->notify(new AccountVerification($content));

    } catch (Exception $e) {
       return redirect()->back()->withErrors(['error'=> 'something went wrong']); 
    } 
   
}

public function SendEmployerVerificaionEmail($email, $confirmation_code, $user, $account_type)
{
 
  $content = [
     'email' => $email,
     'confirmation_code' => $confirmation_code,
     'contact_person' => $user->name,
     'account_type' => $account_type,
 
  ];
 
  try {
    // Mail::to($email)->queue(new EmailAccountCreation($content));
     $user->notify(new AccountVerification($content));

    } catch (Exception $e) {
       return redirect()->back()->withErrors(['error'=> 'something went wrong']); 
    } 
   
}

    public function confirm($confirmation_code, $account_type){

 
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        } 

        $user = User::where('confirmation_code',$confirmation_code)->update(['confirmed' => 1, 'confirmation_code' => '' , 'active' => 1]);

        if ( !$user)
        { 
           // throw new InvalidConfirmationCodeException;
             abort(404, 'Unauthorized action.');
        } 
        Session::flash('success','You have successfully verified your account.');

        return redirect()->route('employer.activeted', $account_type);
    }


  public function activeted($account_type)
  {
    $menus = $this->displayMenu();
    $posts = $this->listPages();
  return view('activate_account', compact('menus','posts', 'account_type'),array('user' => Auth::user()));
  }

  public function account_creation_success()
  {
    $menus = $this->displayMenu();
    $posts = $this->listPages();
   return view('employer_email_information', compact('menus','posts'), array('user' => Auth::user()));
  }


  public function ViewMailTemplate()
  {
     $menus = $this->displayMenu();
    $posts = $this->listPages();
   return view('email_template', compact('menus','posts'), array('user' => Auth::user()));
  }




}
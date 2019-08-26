<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag; 
use App\Email;
use App\City;
use App\Menu;
use App\Industry;
use App\Post;
use App\ReachUs;
use App\Client;
use App\Application;
use App\WorkExperience;
use App\JobEducation;
use App\CareerSummary;
use App\Document;
use App\PersonalInformation;
use App\User;
use App\Award;
use App\IndustryProfession;
use DB;
use Auth;
use Mail;
use Carbon\Carbon;
use App\Http\Resources\TagResource;
use App\Http\Resources\ApplicationResource;



class JobController extends Controller
{

        public function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }
    public function displayMenu(){
     return $menus = Menu::where('status', 1)->orderBy('menu_order', 'ASC')->get();
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get tags
        $tags = Tag::orderBy('created_at', 'DESC')->paginate(5);

        // Return collection of tags as a resource
        return TagResource::collection($tags);
    }

        public function SearchBar()
        {
            // $users = User::orderBy('created_at', 'ASC')->paginate(5);
            $industries = DB::table('industries')->orderBy('name')->where('status',1)->get(); 
            $cities = DB::table('cities')->get();
            $industry_professions = DB::table('industry_professions')->get();
            $response = array('cities' => $cities,
                                'industries' => $industries,
                                'industry_professions' => $industry_professions
                                );
           
          return response()->json($response);
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
        }elseif(isset($profession) && isset($location)){
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
               foreach ($profession as $key => $prof) {
               $query->orWhere('job_category',$prof);
           }
        }elseif (isset($location) && isset($industry) && isset($profession) && isset($job_type)) {
               foreach ($location as $loca) {
           $location_id = City::findOrFail($loca);
            $query->orWhere('city', $location_id->name); 
           }

         foreach ($industry as $key => $indus) {
               $query->orWhere('industry',$indus);
           }
          foreach ($profession as $key => $prof) {
               $query->orWhere('job_category',$prof);
           }
            foreach ($job_type as $key => $value) {
            $query->orWhere('job_type', $value);
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

    if ($request->ajax()) {
      
        return view('jobs.load', ['tags' => $jobs, 'industry_professions' => $industry_professions, 'employement_term_list' => $employement_term_list, 'industries' => $industries, ])->render();  
    } 

    return view('jobs.job_listing_form', compact('industry_professions', 'industries', 'cities', 'city_count', 'employement_term_list','job_type_count', 'tags', 's', 'menus', 'posts', 'employement_term_Unorderedlist'));
    }



        public function getCities()
        {
            $cities = DB::table('cities')->orderBy('name')->get();
            $response = array('cities' => $cities);
             return response()->json($response);
        }
        public function getIndustryProfessions()
        {
            $industry_professions = DB::table('industry_professions')->orderBy('name')->get();
            $response = array(  'industry_professions' => $industry_professions);
             return response()->json($response);
        }
        public function getIndustries()
        {
            $industries = DB::table('industries')->where('status',1)->orderBy('name')->get();
            $response = array('industries' => $industries);
             return response()->json($response);
        }
        public function getVacancyTypes()
        {
            $employement_term_list = DB::table('employement_terms')->where('status',1)->orderBy('name')->get();
            $response = array('employement_term_list' => $employement_term_list);
             return response()->json($response);
        }

        public function getJobs()
        {
        $tags = Tag::where('status',1)->where('active',1)->orderBy('created_at', 'DESC')->paginate(5);
           // $tags = Tag::where('status',1)->where('active',1)->paginate(20); 
         return TagResource::collection($tags); 
        }


   

        public function getApplicantsByJobID($code)
        {
          $user = User::all();

          $job_id = $code; 
            $List_applicants_by_job_id = Application::where('tag_id', $job_id)->where('delete', 0)->where('sorted', 0)->orderBy('created_at', 'desc')->paginate(10);
   
             return ApplicationResource::collection($List_applicants_by_job_id);
        }


        public function getRejectedApplicants($code)
        {
            $job_id = $code;
           $rejected_list = Application::where('tag_id',$job_id)->where('rejected', 1)->where('sorted', 1)->where('delete', 0)->orderBy('created_at', 'desc')->paginate(10);
            
            return ApplicationResource::collection($rejected_list);
        }

// get new rejected CV after a shortlist
// These methods were writting for the ajax implementation
           public function getNewUnsortedApplicant($code)
        {
            $job_id = $code;
           $List_applicants_by_job_id = Application::where('tag_id',$job_id)->where('sorted', 0)->where('delete', 0)->orderby('candidates_name')->paginate(10);

            return view('sortapplicants.load_unsorted', [ 'List_applicants_by_job_id' => $List_applicants_by_job_id ])->render();
        }


           public function getNewRejectedApplicant($code)
        {
            $job_id = $code;
           $rejected_list = Application::where('tag_id',$job_id)->where('rejected', 1)->where('sorted', 1)->where('delete', 0)->orderby('candidates_name')->paginate(10);
            
            return view('sortapplicants.load_rejected', [ 'rejected_list' => $rejected_list ])->render();
        }
           public function getNewReviewApplicant($code)
        {
            $job_id = $code;
            $review_list = Application::where('tag_id',$job_id)->where('in_review', 1)->where('sorted', 1)->where('delete', 0)->orderby('candidates_name')->paginate(10);
            
            return view('sortapplicants.load_reviewed', [ 'review_list' => $review_list ])->render();
        }

      public function getNewShortlistApplicants($code)
        {
            $job_id = $code;
          
               $shortlisted_list = Application::where('tag_id',$job_id)->where('shortlisted', 1)->where('sorted', 1)->where('delete', 0)->orderBy('candidates_name')->get();
            
            return view('sortapplicants.load_shortlist', [ 'shortlisted_list' => $shortlisted_list ])->render();
        }

       public function getNewOfferApplicants($code)
        {
            $job_id = $code;
          
               $offered_list = Application::where('tag_id',$job_id)->where('offered', 1)->where('sorted', 1)->where('delete', 0)->orderBy('candidates_name')->get();
            
            return view('sortapplicants.load_offerlist', [ 'offered_list' => $offered_list ])->render();
        }

           public function getNewHiredApplicants($code)
        {
            $job_id = $code;
           
               $hired_list = Application::where('tag_id',$job_id)->where('hired', 1)->where('sorted', 1)->where('delete', 0)->orderBy('candidates_name')->get();
            
            return view('sortapplicants.load_hiredlist', [ 'hired_list' => $hired_list ])->render();
        }

public function GetCandidatesByJobApplication2(Request $request, $id)
{
    // method displays candidates cv by viewing all the sections 
    // then comparing the resume_id from the job post with the candidates resume_id of the selected profile
    // an alternative way is to view each section by the resume_id on request this will be considered when optimizing this method
$dt = Carbon::now();
$ddt = Carbon::now();
// get the job ID
$job_id = $id; 
$job_record = Tag::findOrFail($job_id);


 $List_applicants_by_job_id = Application::where('tag_id', $job_id)->where('delete', 0)->where('sorted', 0)->orderBy('created_at', 'desc')->get();

//$get_applicants_profile = Document::find(3741)->applications;
// get all applicants by job code 
// get the resume of each candidate that applied for a job
// $get_applicants_by_jobRevers = Application::find(12)->document->document_id;
        $location = $request->location;
        $s = $request->input('s');
        $c = $request->input('c');

        // use this to sort
        $documentList = Document::all();
        $documents = Document::latest()->paginate(20); 
        $industries = Industry::all();
        $professions = IndustryProfession::all();
        $cities = City::all();
        $educationallevels = $this->GetQualificationLevels(); 
        // dd($educational_levels);
        $countries = DB::table('countries')->get();
        // get all records
        $sort_categories_list = DB::table('sort_categories')->get(); 
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();
        $educationaList = JobEducation::all();
        $careerlist = CareerSummary::all();
        $skillsets = DB::table('skillsets')->where('tagid', $id)->get();
        $jobskills = DB::table('job_skills')->get();
        $work_histories = WorkExperience::all();
        $jobcertifications = DB::table('job_certifications')->get();
        $person_info_list = PersonalInformation::all();
        $awards = Award::all();
        $users = User::all();

        $user_info_application = DB::table('documents')
             ->select('tag_fk', DB::raw('count(*) as total'))
             ->groupBy('tag_fk')->get();
       $user_industry_count = DB::table('user_industries')
             ->select('industry_id', DB::raw('count(*) as total'))
             ->groupBy('industry_id')->get();
        $user_profession_count = DB::table('user_professions')
             ->select('industry_profession_id', DB::raw('count(*) as total'))
             ->groupBy('industry_profession_id')->get();
            //get candidates Position 
            //work_experience's
             $work_experiences = DB::table('work_experiences')->get();
            // find by location
            $documents_location = DB::table('documents')->where('city_id', $location)->get();
            $sorted_count = $this->GetSortedCount($job_id);  
            $rejected_count = $this->GetRejectedCount($job_id); 
            $review_count = $this->GetReivewCount($job_id); 
            $offered_count = $this->GetOfferedCount($job_id); 
            $shortlisted_count = $this->GetShortlistedCount($job_id); 
            $hired_count = $this->GetHiredCount($job_id); 
            $offered_list = $this->GetOfferApplicationList($job_id); //Application::where('tag_id',$job_id)->where('offered', 1)->where('delete', 0)->get(); 
            $hired_list = Application::where('tag_id',$job_id)->where('hired', 1)->where('delete', 0)->get();
            $applications = Application::where('tag_id',$job_id)->get();
            $rejected_list = Application::where('tag_id',$job_id)->where('rejected', 1)->where('delete', 0)->get();
            $shortlisted_list = Application::where('tag_id',$job_id)->where('shortlisted', 1)->where('delete', 0)->get();
            $review_list = Application::where('tag_id',$job_id)->where('in_review', 1)->where('sorted', 1)->where('delete', 0)->orderby('candidates_name')->paginate(10);        
       
          $menus = $this->displayMenu(); 
            $units = $this->displayUnit();
               $response = array('documents' => $documents, 'industries' => $industries, 'employement_terms' => $employement_terms, 'educationallevels' => $educationallevels, 'jobcareer_levels' => $jobcareer_levels, 'professions' => $professions, 's' => $s, 'cities' => $cities, 'c' => $c, 'work_experiences' => $work_experiences, 'users' => $users, 'educationallevels' => $educationallevels, 'List_applicants_by_job_id' => $List_applicants_by_job_id, 'documentList' => $documentList, 'countries' => $countries, 'careerlist' => $careerlist, 'jobskills' => $jobskills, 'educationaList' => $educationaList, 'dt' => $dt, 'ddt' => $ddt, 'work_histories' => $work_histories, 'jobcertifications' => $jobcertifications, 'person_info_list' => $person_info_list, 'rejected_count' => $rejected_count, 'sorted_count' => $sorted_count, 'review_count' => $review_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hired_count' => $hired_count, 'review_list' => $review_list, 'rejected_list' => $rejected_list, 'shortlisted_list' => $shortlisted_list, 'offered_list' => $offered_list, 'hired_list' => $hired_list, 'job_id' => $job_id, 'job_record' => $job_record, 'menus' => $menus, 'units' => $units, 'applications' => $applications
                                );
           
          return response()->json($response);
            
          // return view('sortapplicants.load_unsortedCV', ['documents' => $documents, 'industries' => $industries, 'employement_terms' => $employement_terms, 'educationallevels' => $educationallevels, 'jobcareer_levels' => $jobcareer_levels, 'professions' => $professions, 's' => $s, 'cities' => $cities, 'c' => $c, 'work_experiences' => $work_experiences, 'users' => $users, 'educationallevels' => $educationallevels, 'List_applicants_by_job_id' => $List_applicants_by_job_id, 'documentList' => $documentList, 'countries' => $countries, 'careerlist' => $careerlist, 'jobskills' => $jobskills, 'educationaList' => $educationaList, 'dt' => $dt, 'ddt' => $ddt, 'work_histories' => $work_histories, 'jobcertifications' => $jobcertifications, 'person_info_list' => $person_info_list, 'review_list' => $review_list, 'rejected_list' => $rejected_list, 'shortlisted_list' => $shortlisted_list, 'hired_list' => $hired_list, 'job_id' => $job_id, 'job_record' => $job_record, 'applications' => $applications, 'offered_list' => $offered_list, 'menus' => $menus, 'units' => $units])->render();

}


public function GetContent(Request $request, $id)
{
  $dt = Carbon::now();
$ddt = Carbon::now();
$job_id = $id; 
$job_record = Tag::findOrFail($job_id);
 $List_applicants_by_job_id = Application::where('tag_id', $job_id)->where('delete', 0)->where('sorted', 0)->orderBy('candidates_name')->paginate(10);
  
//$get_applicants_profile = Document::find(3741)->applications;
// get all applicants by job code 
// get the resume of each candidate that applied for a job
// $get_applicants_by_jobRevers = Application::find(12)->document->document_id;
        //$user =  Application::find(12)->document;
        $location = $request->location;
        $s = $request->input('s');
        $c = $request->input('c');

        // use this to sort
        $documentList = Document::all();
        $documents = Document::latest()->paginate(20); 
        $industries = Industry::all();
        $professions = IndustryProfession::all();
        $cities = City::all();
        $educationallevels = $this->GetQualificationLevels(); 
        // dd($educational_levels);
        $countries = DB::table('countries')->get();
        // get all records
        $sort_categories_list = DB::table('sort_categories')->get(); 
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();
        $educationaList = JobEducation::all();
        $careerlist = CareerSummary::all();
        $skillsets = DB::table('skillsets')->where('tagid', $id)->get();
        $jobskills = DB::table('job_skills')->get();
        $work_histories = WorkExperience::all();
        $jobcertifications = DB::table('job_certifications')->get();
        $person_info_list = PersonalInformation::all();
        $awards = Award::all();
        $users = User::all();

        $user_info_application = DB::table('documents')
             ->select('tag_fk', DB::raw('count(*) as total'))
             ->groupBy('tag_fk')->get();
       $user_industry_count = DB::table('user_industries')
             ->select('industry_id', DB::raw('count(*) as total'))
             ->groupBy('industry_id')->get();
        $user_profession_count = DB::table('user_professions')
             ->select('industry_profession_id', DB::raw('count(*) as total'))
             ->groupBy('industry_profession_id')->get();
            //get candidates Position 
            //work_experience's
             $work_experiences = DB::table('work_experiences')->get();
            // find by location
            $documents_location = DB::table('documents')->where('city_id', $location)->get();
            $sorted_count = $this->GetSortedCount($job_id);  
            $rejected_count = $this->GetRejectedCount($job_id); 
            $review_count = $this->GetReivewCount($job_id); 
            $offered_count = $this->GetOfferedCount($job_id); 
            $shortlisted_count = $this->GetShortlistedCount($job_id); 
            $hired_count = $this->GetHiredCount($job_id); 
            $offered_list = $this->GetOfferApplicationList($job_id); //Application::where('tag_id',$job_id)->where('offered', 1)->where('delete', 0)->get(); 
            $hired_list = Application::where('tag_id',$job_id)->where('hired', 1)->where('delete', 0)->orderby('candidates_name')->get();
            $applications = Application::where('tag_id',$job_id)->orderby('candidates_name')->get();
            $rejected_list = Application::where('tag_id',$job_id)->where('rejected', 1)->where('delete', 0)->orderBy('candidates_name')->get();
            $shortlisted_list = Application::where('tag_id',$job_id)->where('shortlisted', 1)->where('delete', 0)->orderby('candidates_name')->get();
            $review_list = $this->GetReviewNewApplicationList($job_id);          

               $menus = $this->displayMenu(); 
            $units = $this->displayUnit();

return view('employer.candidates_listing',  ['documents' => $documents, 'industries' => $industries, 'employement_terms' => $employement_terms, 'educationallevels' => $educationallevels, 'jobcareer_levels' => $jobcareer_levels, 'professions' => $professions, 's' => $s, 'cities' => $cities, 'c' => $c, 'work_experiences' => $work_experiences, 'users' => $users, 'educationallevels' => $educationallevels, 'List_applicants_by_job_id' => $List_applicants_by_job_id, 'documentList' => $documentList, 'countries' => $countries, 'careerlist' => $careerlist, 'jobskills' => $jobskills, 'educationaList' => $educationaList, 'dt' => $dt, 'ddt' => $ddt, 'work_histories' => $work_histories, 'jobcertifications' => $jobcertifications, 'person_info_list' => $person_info_list, 'rejected_count' => $rejected_count, 'sorted_count' => $sorted_count, 'review_count' =>$review_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hired_count' => $hired_count, 'review_list' => $review_list, 'rejected_list' => $rejected_list, 'shortlisted_list' => $shortlisted_list, 'offered_list' => $offered_list, 'hired_list' => $hired_list, 'offered_list' => $offered_list, 'job_id' => $job_id, 'job_record' => $job_record, 'applications' => $applications, 'menus' => $menus, 'units' => $units,])->render();
}
 
 
 
     public function displayUnit()
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
public function GetReviewNewApplicationList($job_id)
{
 $new_reivew_list = Application::where('tag_id',$job_id)->where('in_review', 1)->where('sorted', 1)->where('delete', 0)->orderBy('candidates_name')->get();
 return $new_reivew_list;
}

public function GetOfferApplicationList($job_id)
{
 $offer_list = Application::where('tag_id',$job_id)->where('offered', 1)->where('sorted', 1)->where('delete', 0)->orderBy('candidates_name')->get();
 return $offer_list;
}


// methods for Vue js implementation 24/08/2019 
        public function getReviewApplicants($code)
        {
            $job_id = $code;
           $review_list = Application::where('tag_id',$job_id)->where('in_review', 1)->where('sorted', 1)->where('delete', 0)->orderBy('created_at', 'desc')->orderby('candidates_name')->paginate(10);
            
            return ApplicationResource::collection($review_list);
        }

        public function getShortlistedApplicants($code)
        {
            $job_id = $code;
           $shortlist = Application::where('tag_id',$job_id)->where('shortlisted', 1)->where('sorted', 1)->where('delete', 0)->orderBy('created_at', 'desc')->paginate(10);
            
            return ApplicationResource::collection($shortlist);
        }

          public function getOfferedApplicants($code)
        {
            $job_id = $code;
           $offered_list = Application::where('tag_id',$job_id)->where('offered', 1)->where('sorted', 1)->where('delete', 0)->orderBy('created_at', 'desc')->paginate(10);
            
            return ApplicationResource::collection($offered_list);
        }

         public function getHireApplicants($code)
        {
            $job_id = $code;
           $hire_list = Application::where('tag_id',$job_id)->where('hired', 1)->where('sorted', 1)->where('delete', 0)->orderBy('created_at', 'desc')->orderby('candidates_name')->paginate(10);
            
            return ApplicationResource::collection($hire_list);
        }      

        public function GetCandidateCV($code)
        {
      
           $get_single_cv = Application::findOrFail($code);

               $response = array('get_single_cv' => $get_single_cv);
             return response()->json($response);
        }

        public function getWorkExperienceByJobID($code)
        {

        
        $response = array('work_histories' => $work_histories);
             return response()->json($response);
        }


        public function UnsortedCount($job_id)
        {
            $sorted_count = $this->GetSortedCount($job_id);   

             $response = array('sorted_count' => $sorted_count);
             return response()->json($response); 
        }

        public function RejectedCount($job_id)
        {   
            $rejected_count = $this->GetRejectedCount($job_id);  

             $response = array('rejected_count' => $rejected_count);
             return response()->json($response); 
        }

        public function ReviewCount($job_id)
        {
  
            $review_count = $this->GetReivewCount($job_id);  

             $response = array('review_count' => $review_count);
             return response()->json($response); 
        }

        public function OfferedCount($job_id)
        { 
            $offered_count = $this->GetOfferedCount($job_id);  

             $response = array('offered_count' => $offered_count);
             return response()->json($response); 
        }

        public function ShortlistedCount($job_id)
        { 
            $shortlisted_count = $this->GetShortlistedCount($job_id);

             $response = array('shortlisted_count' => $shortlisted_count);
             return response()->json($response); 
        }

        public function HiredCount($job_id)
        { 
            $hired_count = $this->GetHiredCount($job_id);

             $response = array('hired_count' => $hired_count);
             return response()->json($response); 
        }

      public function GetSortedCount($job_id)
      {
        $sorted_count = Application::where('tag_id',$job_id)->where('sorted', 0)->where('delete', 0)->count();
        return $sorted_count;
      }

      public function GetRejectedCount($job_id)
      {
        $reject_count = Application::where('tag_id',$job_id)->where('rejected', 1)->where('delete', 0)->count();
        return $reject_count;
      }

      public function GetReivewCount($job_id)
      {
          $review_count = Application::where('tag_id',$job_id)->where('in_review', 1)->where('sorted',1)->where('delete', 0)->count();
       return $review_count;
      }

      public function GetOfferedCount($job_id)
      {
           $offered_count = Application::where('tag_id',$job_id)->where('offered', 1)->where('sorted',1)->where('delete', 0)->count();
           return $offered_count;
      }

      public function GetShortlistedCount($job_id)
      {
          $shortlisted_count = Application::where('tag_id',$job_id)->where('shortlisted', 1)->where('sorted',1)->where('delete', 0)->count();
          return $shortlisted_count;
      }

      public function GetHiredCount($job_id)
      {
         $hired_count = Application::where('tag_id',$job_id)->where('hired', 1)->where('sorted',1)->where('delete', 0)->count();
         return $hired_count;
      }



      public function GetObjective($code)
      {
       $application = Application::findOrFail($code);

       // find Objectives by resume_id

       $objective = CareerSummary::where('userid', $application->user_id)->where('resume_id', $application->resume_id)->first();

      $jobskills = DB::table('job_skills')->where('userid', $application->user_id)->where('resumeid', $application->resume_id)->get();
       

      $educationaList = JobEducation::where('userid', $application->user_id)->where('resume_id', $application->resume_id)->get();


      $work_histories = WorkExperience::where('userfk', $application->user_id)->where('resumefk', $application->resume_id)->get();

      $jobcertifications = DB::table('job_certifications')->where('user_id', $application->user_id)->get();

       $person_info_list = PersonalInformation::where('user_id', $application->user_id)->get();

        $employement_terms = DB::table('employement_terms')->get();

        $jobcareer_levels = DB::table('jobcareer_levels')->get();

        $educationallevels = $this->GetQualificationLevels(); 
        $countries = DB::table('countries')->get();


        $response = array('objective' => $objective, 'jobskills' => $jobskills, 'educationaList' => $educationaList, 'work_histories' => $work_histories, 'jobcertifications' => $jobcertifications, 'person_info_list' => $person_info_list, 'educationallevels' => $educationallevels, 'jobcareer_levels' => $jobcareer_levels, 'employement_terms' => $employement_terms, 'countries' => $countries, 'application' => $application);

             return response()->json($response);

      }

      public function EmailCandidates(Request $request)
{
    //dd($request->all());
   $email_address = $request->email_address;
   
        $application_id = $request->input('application_id');
        $title = $request->input('title');
        $body = $request->input('body');
    try {
        $content = [
        'candidate_name' => $candidate_name,
        'body' => $body,
        'subject' => $subject, 
        ];
  Mail::to($email_address)->queue(new EmailCandidate($content));
   $response = array('status' => 'success', 'msg' => 'Email sent successfully');
    return response()->json($response);
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Done successfully!');
} catch (Exception $e) {
    $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'something is not right!');
}
  $response = array('status' => 'error', 'msg' => 'something is not right!');
    return response()->json($response);
}


        public function GetQualificationLevels()
        {
            $qualifications = DB::table('qualification_levels')->where('status', 1)->get();
         return $qualifications;
        }

        public function CreateRejectApplicant($code)
        {
     
        $application = Application::findOrFail($code);
        $application->delete = 0;
        $application->in_review = 0;
        $application->shortlisted = 0;
        $application->rejected = 1;
        $application->offered = 0;
        $application->hired = 0;
        $application->sorted = 1;
        $application->save();

      $response = array('application' => $application );
    return response()->json($response);

    }

    public function CreateReviewApplicant($code)
    { 
        $application = Application::findOrFail($code);
        $application->delete = 0;
        $application->in_review = 1;
        $application->shortlisted = 0;
        $application->rejected = 0;
        $application->offered = 0;
        $application->hired = 0;
        $application->sorted = 1;
        $application->save();

        $response = array('reviewapplication' => $application );
        
        return response()->json($response);
        }

    public function CreateShortlistApplicant($code)
    { 
        $application = Application::findOrFail($code);
        $application->delete = 0;
        $application->in_review = 0;
        $application->shortlisted = 1;
        $application->rejected = 0;
        $application->offered = 0;
        $application->hired = 0;
        $application->sorted = 1;
        $application->save();

        $response = array('shortlistapplication' => $application );
        
        return response()->json($response);
        }
    public function CreateHireApplicant($code)
    { 
        $application = Application::findOrFail($code);
        $application->delete = 0;
        $application->in_review = 0;
        $application->shortlisted = 0;
        $application->rejected = 0;
        $application->offered = 0;
        $application->hired = 1;
        $application->sorted = 1;
        $application->save();

        $response = array('hiredapplication' => $application );
        
        return response()->json($response);
        }

    public function CreateOfferedApplicant($code)
    { 
        $application = Application::findOrFail($code);
        $application->delete = 0;
        $application->in_review = 0;
        $application->shortlisted = 0;
        $application->rejected = 0;
        $application->offered = 1;
        $application->hired = 0;
        $application->sorted = 1;
        $application->save();

        $response = array('hiredapplication' => $application );
        
        return response()->json($response);
        }

      public function GetSkillByApplication($code)
      {
          $application = Application::findOrFail($code);

          $jobskills = DB::table('job_skills')->where('userid', $application->user_id)->where('resumeid', $application->resume_id)->get();

      $response = array('jobskills' => $jobskills);
             return response()->json($response);
      }

      public function GetEducationalExperience($code)
      {
          $application = Application::findOrFail($code); 

          $educationaList = JobEducation::where('userid', $application->user_id)->where('resume_id', $application->resume_id)->get();

      $response = array('educationaList' => $educationaList);
             return response()->json($response);
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
        $industries = $query->where('status',1)->get(); 
$menus = $this->displayMenu();
$posts = $this->listPages();
  return view('jobs.job_listing', compact('tags', 'industry_professions', 'employement_term_list', 's', 'cities', 'job_type_count', 'city_count', 'industries', 's', 'location', 'job_function', 'menus', 'posts'), array('user' => Auth::user()));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Tag::findOrFail($request->job_id) : new Tag;

        $article->id = $request->input('job_id');
        $article->job_title = $request->input('job_title');
        $article->description = $request->input('description');

        if($article->save()) {
            return new TagResource($article);
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $article = Tag::findOrFail($id);

        // Return single article as a resource
        return new TagResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get article
        $article = Tag::findOrFail($id);

        if($article->delete()) {
            return new TagResource($article);
        }    
    }
}

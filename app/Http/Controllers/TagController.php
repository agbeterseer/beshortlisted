<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Region;
use App\City;
use App\Profession;
use App\IndustryProfession;
use App\DocumentProfession;
use App\Client;
use App\Tag;
use Auth;
use Input;
use Validator;
use \Storage;
use Response;
use App\Mail\JobAlert;
use App\Mail\ApproveJobPost;
use App\Mail\AwaitingApproval;
use App\Mail\JobPostOffLine;
use App\Mail\BlacklistJobPost;
use App\Mail\EmailCandidate;
use PDF; 
use Carbon\Carbon;
use App\RecruitResume;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Application;
use App\JobAssessmentAnswer;
use App\Industry;
use App\CareerSummary;
use App\JobEducation;
use App\WorkExperience;
use App\jobcertifications;
use App\PersonalInformation;
use App\EducationalLevel;
use App\Award;
use App\Menu;
use App\EmployerPackage;
class TagController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $tags = DB::table('tags')->where('delete', 0)->orderBy('created_at', 'DESC')->get();
        $users = DB::table('clients')->get();
        //
        return view('admin.tags.index', compact('tags', 'users'), array('user' => Auth::user()));
    }


    public function findJob(Request $request)
    {
       return view();
    }
    public function displayMenu(){

     return $menus = Menu::where('status', 1)->orderBy('menu_order', 'ASC')->get();
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
   public function listPages()
   {
    $posts = DB::table('posts')->where('status',1)->get();
    return $posts;
   }

// public function viewCVByTag($id) {
//   if ($id) {
//     $tag_record = Tag::find($id);
//   }
//   return view('');
// }

// return a single Profile instance of an application
// find by applicaiton Primary Key
public function GetDetailsOfSingleApplicant($id)
{
    //dd($id);
        // $jobap = Application::find($applicant->id)->document;
        $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'documents_location' => 'jobap', 's' =>$s);
 return response()->json($response);
}

public function findApplicantsByJobID($id)
{
    $id = 28;
    $List_applicants_by_job_id = Tag::find($id)->applicaitons;
 $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'jobs' => $List_applicants_by_job_id, 's' =>$s);
 return response()->json($response);
}


public function findDocumentWithManyApplication($id)
{
    $id = 3741;
    $get_applicants_profile = Document::find($id)->applicaitons;
    $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'jobs' => $List_applicants_by_job_id, 's' =>$s);
 return response()->json($response);
}


public function GetCandidatesByJobApplication(Request $request, $id)
{
    // method displays candidates cv by viewing all the sections 
    // then comparing the resume_id from the job post with the candidates resume_id of the selected profile
    // alternative way is to view each section by the resume_id on request this will be considered when optimizing this method
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
            $review_list = $this->GetReviewNewApplicationList($job_id);         
            $shortlisted_list = Application::where('tag_id',$job_id)->where('shortlisted', 1)->where('delete', 0)->get();
             $menus = $this->displayMenu(); 
            $units = $this->displayUnit();

return view('employer.candidates_listing',  compact('documents', 'industries', 'employement_terms', 'educationallevels', 'jobcareer_levels', 'professions', 's', 'cities', 'c', 'work_experiences', 'users', 'educationallevels', 'List_applicants_by_job_id', 'documentList', 'countries', 'careerlist', 'jobskills', 'educationaList', 'dt', 'ddt', 'work_histories', 'jobcertifications', 'person_info_list', 'rejected_count', 'sorted_count', 'review_count', 'shortlisted_count', 'offered_count', 'hired_count', 'review_list', 'rejected_list', 'shortlisted_list', 'offered_list', 'hired_list', 'offered_list', 'job_id', 'job_record', 'menus', 'units', 'applications'), array('user' => Auth::user()));
}


// this method displays all Jobs by Emplyer ID
 public function DisplayRecordsForSorting($id)
 {
        $user = Auth::user();
        $tag = Tag::findOrFail($id);
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();
        $industries = DB::table('industries')->get();
        $educational_levels = $this->GetQualificationLevels(); 
       // dd($educational_levels);
        $skillsets = DB::table('skillsets')->where('tagid', $id)->get();
        $jobskills = DB::table('job_skills')->get();
        $countries = DB::table('countries')->get();
        // $industries = Industry::all();
        $applicants = Application::where('job_id', $id)->where('delete',0)->get();
        $applicants_count = Application::where('job_id', $id)->where('delete',0)->count();
        // dd($applicants_count);
        $professions = IndustryProfession::all();
        $cities = City::all();
        // // get all records
        $resume = RecruitResume::where('user_id',$user->id)->where('status', 1)->first();
        $menus = $this->displayMenu();
        $units = $this->displayUnit();
       return view('employer.display_job_detail_sort', compact('tag','employement_terms', 'jobcareer_levels', 'industries', 'educational_levels', 'skillsets', 'professions', 'cities', 'applicants', 'applicants', 'applicants_count', 'resume', 'jobskills', 'countries', 'menus', 'units'), array('user' => Auth::user()));
 }
public function OfferedFilter(Request $request)
 {
    $s = $request->input('s');
    $job_id = $request->job_id;
    $jobs_list = $request->job;
    $career_level = $request->career_level;
 
    $gender_list = $request->gender;
    $years_of_experience = $request->years_of_experience;

    $locations = $request->location;
    $age = $request->age;
    $qualifications = $request->qualification;
    $employement_terms = $request->job_terms;
    $gender = $request->gender;
    $check_section = $request->check_section;
    $career_level = $request->career_level;
    $ages = null;
    $job_terms = $request->job_terms;
    $availability = $request->availability;
    $salary_unsorted = $request->salary;
    $profession = $request->profession;
    $default_unsorted_list = null; 
    $gender_list = Input::has('gender') ? Input::get('gender') : [];
    $gender_unsortedlist = Input::has('gender_unsorted') ? Input::get('gender_unsorted') : [];

if($profession || $salary_unsorted || $availability || $job_terms || $career_level || $gender || $gender_list|| $years_of_experience || $locations || $age || $qualifications || $employement_terms){
     
    $applications = Application::where(function($query) use ($gender_list, $years_of_experience, $locations, $age, $qualifications,$employement_terms, $gender, $check_section, $ages, $career_level, $job_terms, $availability, $salary_unsorted){
 
                if (isset($gender)) {
                                 foreach ($gender as $gend) {
                                    $query->orWhere('delete', 0)
                                            ->where('gender', '=', $gend)->where('offered', 1)->where('sorted', 1);
                                    }
                 }
                if (isset($locations)) {
                            foreach ($locations as $key => $location) {
                                $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('offered', 1)->where('sorted', 1);
                            }
                }
                if (isset($qualifications) ) {
                        foreach ($qualifications as $key => $qualification) { 
                        $query->orWhere('delete', 0)
                        ->where('educational_level', $qualification)->where('offered', 1)->where('sorted', 1);
                        }

                }

             if($check_section === 'offered'){
                       if (isset($years_of_experience)) {
                foreach ($years_of_experience as $key => $yeo) {

                $years_of_experience = explode("-", $yeo);
                $start_year = $years_of_experience[0];
                $end_year = $years_of_experience[1]; 
            $query->orWhere('delete', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year)->where('offered', 1)->where('sorted', 1);
                } 
                } 
                        if (isset($qualifications) ) {
                foreach ($qualifications as $key => $qualification) { 
                $query->orWhere('delete', 0)
                ->where('educational_level', $qualification)->where('offered', 1)->where('sorted', 1);
                }

                }
                 if (isset($gender_unsorted)) {
                                    foreach ($gender_unsorted as $gender) {
                            $query->orWhere('delete', 0)
                                    ->where('gender', '=', $gender)->where('offered', 1)->where('sorted', 1);
                            }
                 }
                 if (isset($age)) {

                $ages = explode("-", $age);
                $start_age = $ages[0];
                $end_age = $ages[1]; 
                                      
             $query->orWhere('delete', 0)->where('age', '>=', $start_age)->where('age', '<=', $end_age)->where('shortlisted', 1)->where('sorted', 1); 
                 }
                 if (isset($locations)) {
                                        foreach ($locations as $location) {
                            $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('offered', 1)->where('sorted', 1);
                                }
                 }
                 if (isset($career_level)) {
                                        foreach ($career_level as $career) {
                                $query->orWhere('delete', 0)->where('career_level', '=', $career)->where('offered', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($job_terms)) {
                                        foreach ($job_terms as $job_term) {
                                $query->orWhere('delete', 0)->where('d_employment_term', '=', $job_term)->where('offered', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($availability)) {
                                        foreach ($availability as $avail) {
                                $query->orWhere('delete', 0)->where('availability', '=', $avail)->where('offered', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($salary_unsorted)) {
                                        foreach ($salary_unsorted as $salary) {
                                $query->orWhere('delete', 0)->where('minimum_salary', '=', $salary)->where('offered', 1)->where('sorted', 1);
                                    }
                 } 
                    if (isset($employement_terms)) {   
                   foreach ($employement_terms as $employement_term) {
                     $query->orWhere('delete', 0)->where('d_employment_term', '=', $employement_term)->where('offered', 1)->where('sorted', 1);
                   }
                        foreach ($gender_unsorted as $gender) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gender)->where('offered', 1)->where('sorted', 1);
                    } 
                }
 
        }
 
 
 })->paginate(10);


}else{
    $applications = Application::where('offered', 1)->where('sorted', 1)->where('delete',0)->where('tag_id',$job_id)->paginate(10);
}
$work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
   $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'applications' => $applications,  's' =>$s, 'locations' => $locations, 'qualifications' => $qualifications, 'employement_terms' => $employement_terms, 'work_experiences'=>$work_experiences, 'documents' => $documents, 'jobs_list'=>$jobs_list, 'job_id'=>$job_id, 'ages'=>$ages, 'career_level'=>$career_level, 'default_unsorted_list'=>$default_unsorted_list);
return response()->json($response);
 }

public function ShortListFilter(Request $request)
 {
    $s = $request->input('s');
    $job_id = $request->job_id;
    $jobs_list = $request->job;
    $career_level = $request->career_level;
    $gender_list = $request->gender;
    $years_of_experience = $request->years_of_experience;
    $locations = $request->location;
    $age = $request->age;
    $qualifications = $request->qualification;
    $employement_terms = $request->job_terms;
    $gender = $request->gender;
    $check_section = $request->check_section;
    $career_level = $request->career_level;
    $ages = null;
    $job_terms = $request->job_terms;
    $availability = $request->availability;
    $salary_unsorted = $request->salary;
    $profession = $request->profession;
    $default_unsorted_list = null;       
    $gender_list = Input::has('gender') ? Input::get('gender') : [];
    $gender_unsortedlist = Input::has('gender') ? Input::get('gender') : [];
if($profession || $salary_unsorted || $availability || $job_terms || $career_level || $gender || $gender_list|| $years_of_experience || $locations || $age || $qualifications || $employement_terms){
     
    $applications = Application::where(function($query) use ($gender_list, $years_of_experience, $locations, $age, $qualifications,$employement_terms, $gender, $check_section, $ages, $career_level, $job_terms, $availability, $salary_unsorted){
 
  if (isset($gender)) {
                 foreach ($gender as $gend) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gend)->where('shortlisted', 1)->where('sorted', 1);
                    }
 }
                if (isset($locations)) {
                            foreach ($locations as $key => $location) {
                                $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('shortlisted', 1)->where('sorted', 1);
                            }
                }
                if (isset($qualifications) ) {
                        foreach ($qualifications as $key => $qualification) { 
                        $query->orWhere('delete', 0)
                        ->where('educational_level', $qualification)->where('shortlisted', 1)->where('sorted', 1);
                        }

                }

             if($check_section === 'shortlist'){
                       if (isset($years_of_experience)) {
                foreach ($years_of_experience as $key => $yeo) {

                $years_of_experience = explode("-", $yeo);
                $start_year = $years_of_experience[0];
                $end_year = $years_of_experience[1]; 
            $query->orWhere('delete', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year)->where('shortlisted', 1)->where('sorted', 1);
                } 
                } 
                        if (isset($qualifications) ) {
                foreach ($qualifications as $key => $qualification) { 
                $query->orWhere('delete', 0)
                ->where('educational_level', $qualification)->where('shortlisted', 1)->where('sorted', 1);
                }

                }
                 if (isset($gender)) {
                                    foreach ($gender as $gend) {
                            $query->orWhere('delete', 0)
                                    ->where('gender', '=', $gend)->where('shortlisted', 1)->where('sorted', 1);
                            }
                 }
                 if (isset($age)) {
                $ages = explode("-", $age);
                $start_age = $ages[0];
                $end_age = $ages[1]; 
                                      
             $query->orWhere('delete', 0)->where('age', '>=', $start_age)->where('age', '<=', $end_age)->where('shortlisted', 1)->where('sorted', 1); 
                 }
                 if (isset($locations)) {
                                        foreach ($locations as $location) {
                            $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('shortlisted', 1)->where('sorted', 1);
                                }
                 }
                 if (isset($career_level)) {
                                        foreach ($career_level as $career) {
                                $query->orWhere('delete', 0)->where('career_level', '=', $career)->where('shortlisted', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($job_terms)) {
                                        foreach ($job_terms as $job_term) {
                                $query->orWhere('delete', 0)->where('d_employment_term', '=', $job_term)->where('shortlisted', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($availability)) {
                                        foreach ($availability as $avail) {
                                $query->orWhere('delete', 0)->where('availability', '=', $avail)->where('shortlisted', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($salary_unsorted)) {
                                        foreach ($salary_unsorted as $salary) {
                                $query->orWhere('delete', 0)->where('minimum_salary', '=', $salary)->where('shortlisted', 1)->where('sorted', 1);
                                    }
                 } 
                    if (isset($employement_terms)) {   
                   foreach ($employement_terms as $employement_term) {
                     $query->orWhere('delete', 0)->where('d_employment_term', '=', $employement_term)->where('shortlisted', 1)->where('sorted', 1);
                   }
                        foreach ($gender as $gend) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gend)->where('shortlisted', 1)->where('sorted', 1);
                    } 
                }
        }
 })->paginate(10);
}else{
    $applications = Application::where('shortlisted', 1)->where('sorted', 1)->where('delete',0)->where('tag_id',$job_id)->paginate(10);
}
$work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
$response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'applications' => $applications,  's' =>$s, 'locations' => $locations, 'qualifications' => $qualifications, 'employement_terms' => $employement_terms, 'work_experiences'=>$work_experiences, 'documents' => $documents, 'jobs_list'=>$jobs_list, 'job_id'=>$job_id, 'ages'=>$ages, 'career_level'=>$career_level, 'default_unsorted_list'=>$default_unsorted_list);
return response()->json($response);
 }

 public function InReviewFilter(Request $request)
 {
    $s = $request->input('s');
    $job_id = $request->job_id;
    $jobs_list = $request->job;
    $career_level = $request->career_level;
    $gender_list = $request->gender;
    $years_of_experience = $request->years_of_experience;
    $locations = $request->location;
    $age = $request->age;
    $qualifications = $request->qualification;
    $employement_terms = $request->job_terms;
    $gender = $request->gender;
    $check_section = $request->check_section;
    $career_level = $request->career_level;
    $ages = null;
    $job_terms = $request->job_terms;
    $availability = $request->availability;
    $salary_unsorted = $request->salary;
    $profession = $request->profession;
    $default_unsorted_list = null;        
    $gender_list = Input::has('gender') ? Input::get('gender') : [];
    $gender_unsortedlist = Input::has('gender_unsorted') ? Input::get('gender_unsorted') : [];
if($profession || $salary_unsorted || $availability || $job_terms || $career_level || $gender || $gender_list|| $years_of_experience || $locations || $age || $qualifications || $employement_terms){
    $applications = Application::where(function($query) use ($gender_list, $years_of_experience, $locations, $age, $qualifications,$employement_terms, $gender, $check_section, $ages, $career_level, $job_terms, $availability, $salary_unsorted){
 
  if (isset($gender)) {
                 foreach ($gender as $gend) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gend)->where('in_review', 1)->where('sorted', 1);
                    }
 }
                if (isset($locations)) {
                            foreach ($locations as $key => $location) {
                                $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('in_review', 1)->where('sorted', 1);
                            }
                }
                if (isset($qualifications) ) {
                        foreach ($qualifications as $key => $qualification) { 
                        $query->orWhere('delete', 0)
                        ->where('educational_level', $qualification)->where('in_review', 1)->where('sorted', 1);
                        }
                }
             if($check_section === 'inreview'){
                       if (isset($years_of_experience)) {
                foreach ($years_of_experience as $key => $yeo) {

                $years_of_experience = explode("-", $yeo);
                $start_year = $years_of_experience[0];
                $end_year = $years_of_experience[1]; 
            $query->orWhere('delete', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year)->where('in_review', 1)->where('sorted', 1);
                } 
                } 
                        if (isset($qualifications) ) {
                foreach ($qualifications as $key => $qualification) { 
                $query->orWhere('delete', 0)
                ->where('educational_level', $qualification)->where('in_review', 1)->where('sorted', 1);
                }

                }
                 if (isset($gender)) {
                                    foreach ($gender as $gend) {
                            $query->orWhere('delete', 0)
                                    ->where('gender', '=', $gend)->where('in_review', 1)->where('sorted', 1);
                            }
                 }
                 if (isset($age)) {
                $ages = explode("-", $age);
                $start_age = $ages[0];
                $end_age = $ages[1]; 
                                      
             $query->orWhere('delete', 0)->where('age', '>=', $start_age)->where('age', '<=', $end_age)->where('in_review', 1)->where('sorted', 1); 
                 }
                 if (isset($locations)) {
                                        foreach ($locations as $location) {
                            $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('in_review', 1)->where('sorted', 1);
                                }
                 }
                 if (isset($career_level)) {
                                        foreach ($career_level as $career) {
                                $query->orWhere('delete', 0)->where('career_level', '=', $career)->where('in_review', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($job_terms)) {
                                        foreach ($job_terms as $job_term) {
                                $query->orWhere('delete', 0)->where('d_employment_term', '=', $job_term)->where('in_review', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($availability)) {
                                        foreach ($availability as $avail) {
                                $query->orWhere('delete', 0)->where('availability', '=', $avail)->where('in_review', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($salary_unsorted)) {
                                        foreach ($salary_unsorted as $salary) {
                                $query->orWhere('delete', 0)->where('minimum_salary', '=', $salary)->where('in_review', 1)->where('sorted', 1);
                                    }
                 } 
                    if (isset($employement_terms)) {   
                   foreach ($employement_terms as $employement_term) {
                     $query->orWhere('delete', 0)->where('d_employment_term', '=', $employement_term)->where('in_review', 1)->where('sorted', 1);
                   }
                        foreach ($gender as $gend) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gend)->where('in_review', 1)->where('sorted', 1);
                    } 
                }
        }
 })->paginate(10);
}else{
    $applications = Application::where('in_review', 1)->where('sorted', 1)->where('delete',0)->where('tag_id',$job_id)->paginate(10);
}
$work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
   $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'applications' => $applications,  's' =>$s, 'locations' => $locations, 'qualifications' => $qualifications, 'employement_terms' => $employement_terms, 'work_experiences'=>$work_experiences, 'documents' => $documents, 'jobs_list'=>$jobs_list, 'job_id'=>$job_id, 'ages'=>$ages, 'career_level'=>$career_level, 'default_unsorted_list'=>$default_unsorted_list);
return response()->json($response);
 }
public function RejectedFilter(Request $request)
 {
    $s = $request->input('s');
    $job_id = $request->job_id;
    $jobs_list = $request->job;
    $career_level = $request->career_level;
 
    $gender_list = $request->gender;
    $years_of_experience = $request->years_of_experience;

    $locations = $request->location;
    $age = $request->age;
    $qualifications = $request->qualification;
    $employement_terms = $request->job_terms;
    $gender_unsorted = $request->gender_unsorted;
    $check_section = $request->check_section;
    $career_level = $request->career_level;
    $ages = null;
    $job_terms = $request->job_terms;
    $availability = $request->availability;
    $salary_unsorted = $request->salary;
    $profession = $request->profession;
    $default_unsorted_list = null;       
    $gender_list = Input::has('gender') ? Input::get('gender') : [];
    $gender_unsortedlist = Input::has('gender_unsorted') ? Input::get('gender_unsorted') : [];
if($profession || $salary_unsorted || $availability || $job_terms || $career_level || $gender_unsorted || $gender_list|| $years_of_experience || $locations || $age || $qualifications || $employement_terms){   
    $applications = Application::where(function($query) use ($gender_list, $years_of_experience, $locations, $age, $qualifications,$employement_terms, $gender_unsorted, $check_section, $ages, $career_level, $job_terms, $availability, $salary_unsorted){
  if (isset($gender_unsorted)) {
                 foreach ($gender_unsorted as $gender) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gender)->where('rejected', 1)->where('sorted', 1);
                    }
 }
                if (isset($locations)) {
                            foreach ($locations as $key => $location) {
                                $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('rejected', 1)->where('sorted', 1);
                            }
                }
                if (isset($qualifications) ) {
                        foreach ($qualifications as $key => $qualification) { 
                        $query->orWhere('delete', 0)
                        ->where('educational_level', $qualification)->where('rejected', 1)->where('sorted', 1);
                        }

                }

             if($check_section === 'rejected'){
                       if (isset($years_of_experience)) {
                foreach ($years_of_experience as $key => $yeo) {

                $years_of_experience = explode("-", $yeo);
                $start_year = $years_of_experience[0];
                $end_year = $years_of_experience[1]; 
            $query->orWhere('delete', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year)->where('rejected', 1)->where('sorted', 1);
                } 
                } 
                        if (isset($qualifications) ) {
                foreach ($qualifications as $key => $qualification) { 
                $query->orWhere('delete', 0)
                ->where('educational_level', $qualification)->where('rejected', 1)->where('sorted', 1);
                }

                }
                 if (isset($gender_unsorted)) {
                                    foreach ($gender_unsorted as $gender) {
                            $query->orWhere('delete', 0)
                                    ->where('gender', '=', $gender)->where('rejected', 1)->where('sorted', 1);
                            }
                 }
                 if (isset($age)) {
                $ages = explode("-", $age);
                $start_age = $ages[0];
                $end_age = $ages[1]; 
                                      
             $query->orWhere('delete', 0)->where('age', '>=', $start_age)->where('age', '<=', $end_age)->where('rejected', 1)->where('sorted', 1); 
                 }
                 if (isset($locations)) {
                                        foreach ($locations as $location) {
                            $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name)->where('rejected', 1)->where('sorted', 1);
                                }
                 }
                 if (isset($career_level)) {
                                        foreach ($career_level as $career) {
                                $query->orWhere('delete', 0)->where('career_level', '=', $career)->where('rejected', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($job_terms)) {
                                        foreach ($job_terms as $job_term) {
                                $query->orWhere('delete', 0)->where('d_employment_term', '=', $job_term)->where('rejected', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($availability)) {
                                        foreach ($availability as $avail) {
                                $query->orWhere('delete', 0)->where('availability', '=', $avail)->where('rejected', 1)->where('sorted', 1);
                                    }
                 }
                 if (isset($salary_unsorted)) {
                                        foreach ($salary_unsorted as $salary) {
                                $query->orWhere('delete', 0)->where('minimum_salary', '=', $salary)->where('rejected', 1)->where('sorted', 1);
                                    }
                 } 
                    if (isset($employement_terms)) {   
                   foreach ($employement_terms as $employement_term) {
                     $query->orWhere('delete', 0)->where('d_employment_term', '=', $employement_term)->where('rejected', 1)->where('sorted', 1);
                   }
                        foreach ($gender_unsorted as $gender) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gender)->where('rejected', 1)->where('sorted', 1);
                    } 
                }
        } 
 })->paginate(10);
}else{
    $applications = Application::where('rejected', 1)->where('sorted', 1)->where('delete',0)->where('tag_id',$job_id)->paginate(10);
}
$work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
   $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'applications' => $applications,  's' =>$s, 'locations' => $locations, 'qualifications' => $qualifications, 'employement_terms' => $employement_terms, 'work_experiences'=>$work_experiences, 'documents' => $documents, 'jobs_list'=>$jobs_list, 'job_id'=>$job_id, 'ages'=>$ages, 'career_level'=>$career_level, 'default_unsorted_list'=>$default_unsorted_list);
return response()->json($response);
 }
 public function UnsortedFilter(Request $request)
 {
    $s = $request->input('s');
    $job_id = $request->job_id;
    $jobs_list = $request->job;
    $career_level = $request->career_level;
    $gender_list = $request->gender;
    $years_of_experience = $request->years_of_experience;
    $locations = $request->location;
    $age = $request->age;
    $qualifications = $request->qualification;
    $employement_terms = $request->job_terms;
    $gender_unsorted = $request->gender_unsorted;
    $check_section = $request->check_section;
    $career_level = $request->career_level;
    $ages = null;
    $job_terms = $request->job_terms;
    $availability = $request->availability;
    $salary_unsorted = $request->salary;
    $profession = $request->profession;
    $default_unsorted_list = null;       
    $gender_list = Input::has('gender') ? Input::get('gender') : [];
    $gender_unsortedlist = Input::has('gender_unsorted') ? Input::get('gender_unsorted') : [];
if($profession || $salary_unsorted || $availability || $job_terms || $career_level || $gender_unsorted || $gender_list|| $years_of_experience || $locations || $age || $qualifications || $employement_terms){
    $applications = Application::where(function($query) use ($gender_list, $years_of_experience, $locations, $age, $qualifications,$employement_terms, $gender_unsorted, $check_section, $ages, $career_level, $job_terms, $availability, $salary_unsorted){
 
  if (isset($gender_unsorted)) {
                 foreach ($gender_unsorted as $gender) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gender);
                    }
 }
                if (isset($locations)) {
                            foreach ($locations as $key => $location) {
                                $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name);
                            }
                }
                if (isset($qualifications) ) {
                        foreach ($qualifications as $key => $qualification) { 
                        $query->orWhere('delete', 0)
                        ->where('educational_level', $qualification);
                        }

                }

             if($check_section === 'hired' || $check_section === 'unsorted'){
                       if (isset($years_of_experience)) {
                foreach ($years_of_experience as $key => $yeo) {

                $years_of_experience = explode("-", $yeo);
                $start_year = $years_of_experience[0];
                $end_year = $years_of_experience[1]; 
            $query->orWhere('delete', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year);
                } 
                } 
                        if (isset($qualifications) ) {
                foreach ($qualifications as $key => $qualification) { 
                $query->orWhere('delete', 0)
                ->where('educational_level', $qualification);
                }

                }
                 if (isset($gender_unsorted)) {
                                    foreach ($gender_unsorted as $gender) {
                            $query->orWhere('delete', 0)
                                    ->where('gender', '=', $gender);
                            }
                 }
                 if (isset($age)) {
                $ages = explode("-", $age);
                $start_age = $ages[0];
                $end_age = $ages[1]; 
                                      
             $query->orWhere('delete', 0)->where('age', '>=', $start_age)->where('age', '<=', $end_age); 
                 }
                 if (isset($locations)) {
                                        foreach ($locations as $location) {
                            $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name);
                                }
                 }
                 if (isset($career_level)) {
                                        foreach ($career_level as $career) {
                                $query->orWhere('delete', 0)->where('career_level', '=', $career);
                                    }
                 }
                 if (isset($job_terms)) {
                                        foreach ($job_terms as $job_term) {
                                $query->orWhere('delete', 0)->where('d_employment_term', '=', $job_term);
                                    }
                 }
                 if (isset($availability)) {
                                        foreach ($availability as $avail) {
                                $query->orWhere('delete', 0)->where('availability', '=', $avail);
                                    }
                 }
                 if (isset($salary_unsorted)) {
                                        foreach ($salary_unsorted as $salary) {
                                $query->orWhere('delete', 0)->where('minimum_salary', '=', $salary);
                                    }
                 } 
                    if (isset($employement_terms)) {   
                   foreach ($employement_terms as $employement_term) {
                     $query->orWhere('delete', 0)->where('d_employment_term', '=', $employement_term);
                   }
                        foreach ($gender_unsorted as $gender) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gender);
                    } 
                }
 
        }
 })->paginate(10);
}else{
    $applications = Application::where('sorted', 0)->where('delete',0)->where('tag_id',$job_id)->paginate(10);
}
$work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
   $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'applications' => $applications,  's' =>$s, 'locations' => $locations, 'qualifications' => $qualifications, 'employement_terms' => $employement_terms, 'work_experiences'=>$work_experiences, 'documents' => $documents, 'jobs_list'=>$jobs_list, 'job_id'=>$job_id, 'ages'=>$ages, 'career_level'=>$career_level, 'default_unsorted_list'=>$default_unsorted_list);
return response()->json($response);
 }
 public function searchConditions(Request $request){
    $s = $request->input('s');
    $job_id = $request->job_id;
    $jobs_list = $request->job;
    $career_level = $request->career_level;
    $gender_list = $request->gender;
    $years_of_experience = $request->years_of_experience;
    $locations = $request->location;
    $age = $request->age;
    $qualifications = $request->qualification;
    $employement_terms = $request->job_terms;
    $gender_hired = $request->gender_hired;
    $check_section = $request->check_section;
    $career_level = $request->career_level;
    $ages = null;
    $job_terms = $request->job_terms;
    $availability = $request->availability;
    $salary_hired = $request->salary;
    $profession = $request->profession;
    $default_unsorted_list = null;       
    $gender_list = Input::has('gender') ? Input::get('gender') : [];
    $gender_hiredList = Input::has('gender_hired') ? Input::get('gender_hired') : [];
if($profession || $salary_hired || $availability || $job_terms || $career_level || $gender_hired || $gender_list|| $years_of_experience || $locations || $age || $qualifications || $employement_terms){
    $applications = Application::where(function($query) use ($gender_list, $years_of_experience, $locations, $age, $qualifications,$employement_terms, $gender_hiredList, $check_section, $ages, $career_level, $job_terms, $availability, $salary_hired){
              if (isset($years_of_experience)) {
                foreach ($years_of_experience as $key => $yeo) {
                $years_of_experience = explode("-", $yeo);
                $start_year = $years_of_experience[0];
                $end_year = $years_of_experience[1]; 
            $query->orWhere('delete', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year);
                }
             
                } 
                if (isset($locations)) {
                            foreach ($locations as $key => $location) {
                                $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name);
                            }
                }
                if (isset($qualifications) ) {
                        foreach ($qualifications as $key => $qualification) { 
                        $query->orWhere('delete', 0)
                        ->where('educational_level', $qualification);
                        }

                }

             if($check_section === 'hired' || 'unsorted'){
                        if (isset($qualifications) ) {
                foreach ($qualifications as $key => $qualification) { 
                $query->orWhere('delete', 0)
                ->where('educational_level', $qualification);
                }

                }
                 if (isset($gender_hiredList)) {
                                    foreach ($gender_hiredList as $gender) {
                            $query->orWhere('delete', 0)
                                    ->where('gender', '=', $gender);
                            }
                 }
                 if (isset($age)) {
                $ages = explode("-", $age);
                $start_age = $ages[0];
                $end_age = $ages[1]; 
                                      
             $query->orWhere('delete', 0)->where('age', '>=', $start_age)->where('age', '<=', $end_age); 
                 }
                 if (isset($locations)) {
                                        foreach ($locations as $location) {
                            $location_id = City::findOrFail($location);
                            $query->orWhere('delete', 0)
                                    ->where('city_id', $location_id->name);
                                }
                 }
                 if (isset($career_level)) {
                                        foreach ($career_level as $career) {
                                $query->orWhere('delete', 0)->where('career_level', '=', $career);
                                    }
                 }
                 if (isset($job_terms)) {
                                        foreach ($job_terms as $job_term) {
                                $query->orWhere('delete', 0)->where('d_employment_term', '=', $job_term);
                                    }
                 }
                 if (isset($availability)) {
                                        foreach ($availability as $avail) {
                                $query->orWhere('delete', 0)->where('availability', '=', $avail);
                                    }
                 }
                 if (isset($salary_hired)) {
                                        foreach ($salary_hired as $salary) {
                                $query->orWhere('delete', 0)->where('minimum_salary', '=', $salary);
                                    }
                 } 

                }

                 if (isset($gender_list)) {
                                     foreach ($gender_list as $gender) {
                                $query->orWhere('delete', 0)
                                        ->where('gender', '=', $gender);
                                }
                 }
 

                if (isset($employement_terms)) {   
                   foreach ($employement_terms as $employement_term) {
                     $query->orWhere('delete', 0)->where('d_employment_term', '=', $employement_term);
                   }
                        foreach ($gender_list as $gender) {
                    $query->orWhere('delete', 0)
                            ->where('gender', '=', $gender);
                    }
                        if (isset($qualifications) ) {
                        foreach ($qualifications as $key => $qualification) { 
                        $query->orWhere('delete', 0)
                        ->where('educational_level', $qualification);
                        }

                }
 
                }
 
 })->paginate(10);

}else{
$applications = Application::where('sorted', 1)->where('delete',0)->paginate(10);
$default_unsorted_list = Application::where('sorted', 0)->where('tag_id', $job_id)->where('delete',0)->paginate(10);
}
$applications = Application::where('sorted', 1)->where('delete',0)->paginate(10);
$work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
            // dd($work_experiences);
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
$query = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id');
$sorted_applications = $query->where('delete', 0)->get();
$gouped_hired = DB::table('applications')
             ->select('hired', DB::raw('count(*) as total'))
             ->groupBy('hired')->get();
$gouped_offered = DB::table('applications')
             ->select('hired', DB::raw('count(*) as total'))
             ->groupBy('hired')->get();
$response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'applications' => $applications,  's' =>$s, 'locations' => $locations, 'qualifications' => $qualifications, 'employement_terms' => $employement_terms, 'work_experiences'=>$work_experiences, 'documents' => $documents, 'jobs_list'=>$jobs_list, 'job_id'=>$job_id, 'ages'=>$ages, 'career_level'=>$career_level, 'default_unsorted_list'=>$default_unsorted_list);
return response()->json($response);
}
// automatch method
/*  
    1. get the applicants by job_id from the application table
    2. get the Job post from the Job table
    3. get the job requirements from the job_requirements table
    4. 
*/
 
  
 public function AutoMatchApplicantWithJobs($job_id){  
    //get the applicants by job_id from the application table
    $applicant_list = $this->GetUnsortedNewApplicationList($job_id);
    // get the job record 
    $get_job = Tag::findOrFail($job_id);
    $industry_profession_list = DB::table('industry_professions')->get();
    // get years of experience
    // Job location industry
    // qualification 
    // profession
    // gender
    // age
    // job_level
    // salary_range
    // region
    // city
    foreach ($applicant_list as $key => $applicant) {
        if ($get_job->gender === 'All') {
                       if ($gat_job->experience === $applicant->years_of_experience && $get_job->job_level === $applicant->career_level &&  $applicant->d_employment_term === $get_job->job_type &&  $get_job->salary_range === $applicant->minimum_salary && $get_job->qualification === $applicant->educational_level){

                        // do something
        }
         
        }else{
           if ($get_job->gender === $applicant->gender && $gat_job->experience === $applicant->years_of_experience && $get_job->job_level === $applicant->career_level &&  $applicant->d_employment_term === $get_job->job_type &&  $get_job->salary_range === $applicant->minimum_salary && $get_job->qualification === $applicant->educational_level){

            // do someting
        }

     
    }

 }

// 3 ways to automatch

 // when creating a Job Post
 // when applying for a job
 // when building resume
 $jobs = Tag::where('status', 1)->where('active', 1)->get();
 // get the job assessment
 $job_assessment_list = DB::table('job_assessments')->where('client_id', $get_job->id)->get();
 return $applications;
 }

public function EmailCandidates(Request $request)
{
    //dd($request->all());
   $email_address = $request->email_address;
   $candidate_name = $request->name;
   $subject = $request->title;
   $body = $request->body_of_email;
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


public function RejectApplicant(Request $request)
{
    $application_id = $request->get('application_id');
    $rejected = $request->get('rejected');
    $user_id = $request->get('user_id');
    $job_id = $request->get('job_id');

    $application = Application::findOrFail($application_id);
    $application->delete = 0;
    $application->in_review = 0;
    $application->shortlisted = 0;
    $application->rejected = 1;
    $application->offered = 0;
    $application->hired = 0;
    $application->sorted = 1;
    $application->save();
    $sorted_count = $this->GetSortedCount($job_id); //Application::where('tag_id',$job_id)->where('sorted', 0)->where('delete', 0)->count();
    $reject_count = $this->GetRejectedCount($job_id);//Application::where('tag_id',$job_id)->where('rejected', 1)->where('delete', 0)->count();  
    $review_count = $this->GetReivewCount($job_id);//Application::where('tag_id',$job_id)->where('in_review', 1)->where('delete', 0)->count();
    $offered_count = $this->GetOfferedCount($job_id); //Application::where('tag_id',$job_id)->where('offered', 1)->where('delete', 0)->count();
    $shortlisted_count = $this->GetShortlistedCount($job_id); //Application::where('tag_id',$job_id)->where('shortlisted', 1)->count();
    $hired_count = $this->GetHiredCount($job_id); //Application::where('tag_id',$job_id)->where('hired', 1)->count();
    $newapplication_list = $this->GetUnsortedNewApplicationList($job_id);
    $new_reject_list = $this->GetRejectedNewApplicationList($job_id); //Application::where('tag_id',$job_id)->where('rejected', 1)->where('delete', 0)->get();
    $new_shortlisted = $this->GetShortlistedApplicationList($job_id);
    $review_list = $this->GetReviewNewApplicationList($job_id);
    $hired_list = $this->GetHiredApplicationList($job_id);
    $user = User::findOrFail($user_id);
    // $work_experiences = DB::table('work_experiences')->get();
$work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
           ->get();
 $response = array('status' => 'success', 'msg' => 'Setting created successfully',  'application' => $application, 'request'=> $request->all(), 'reject_count' => $reject_count, 'sorted_count' =>$sorted_count, 'review_count' => $review_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hired_count' => $hired_count, 'newapplication_list' => $newapplication_list, 'work_experiences'=>$work_experiences, 'new_reject_list' => $new_reject_list, 'review_list' => $review_list, 'new_shortlisted' =>$new_shortlisted, 'hired_list' => $hired_list, 'user' =>$user_id);
    return response()->json($response);
}

public function GetUnsortedNewApplicationList($job_id)
{
$newapplication_list = Application::where('tag_id', $job_id)->where('sorted', 0)->where('delete', 0)->get();
       return $newapplication_list;
}

public function GetRejectedNewApplicationList($job_id)
{
 $new_reject_list = Application::where('tag_id',$job_id)->where('rejected', 1)->where('delete', 0)->get();
 return $new_reject_list;
}

public function GetReviewNewApplicationList($job_id)
{
 $new_reivew_list = Application::where('tag_id',$job_id)->where('in_review', 1)->where('sorted', 1)->where('delete', 0)->get();
 return $new_reivew_list;
}

public function GetShortlistedApplicationList($job_id)
{
 $shortlisted_list = Application::where('tag_id',$job_id)->where('shortlisted', 1)->where('sorted', 1)->where('delete', 0)->get();
 return $shortlisted_list;
}

public function GetOfferApplicationList($job_id)
{
 $offer_list = Application::where('tag_id',$job_id)->where('offered', 1)->where('sorted', 1)->where('delete', 0)->get();
 return $offer_list;
}

public function GetHiredApplicationList($job_id)
{
 $hired_list = Application::where('tag_id',$job_id)->where('hired', 1)->where('sorted', 1)->where('delete', 0)->get();
 return $hired_list;
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

public function GetQualificationLevels()
{
    $qualifications = DB::table('qualification_levels')->where('status', 1)->get();
 return $qualifications;
}

public function ReviewApplicant(Request $request)
{
    $application_id = $request->get('application_id');
    $in_review = $request->get('in_review');
    $user_id = $request->get('user_id');
    $job_id = $request->get('job_id');
    $application = Application::findOrFail($application_id);
    $application->delete = 0;
    $application->in_review = 1;
    $application->shortlisted = 0;
    $application->rejected = 0;
    $application->offered = 0;
    $application->hired = 0;
    $application->sorted = 1;
    $application->save();
    $sorted_count = $this->GetSortedCount($job_id); 
    $reject_count = $this->GetRejectedCount($job_id);
    $review_count = $this->GetReivewCount($job_id);
    $offered_count = $this->GetOfferedCount($job_id); 
    $shortlisted_count = $this->GetShortlistedCount($job_id); 
    $hired_count = $this->GetHiredCount($job_id);
    $newapplication_list = $this->GetUnsortedNewApplicationList($job_id);
    $new_reject_list = $this->GetRejectedNewApplicationList($job_id);
    $review_list = $this->GetReviewNewApplicationList($job_id);
     $shortlisted_list = $this->GetShortlistedApplicationList($job_id);
    $work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
$documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
$group_application = DB::table('applications')
             ->select('in_review', 'tag_id', DB::raw('count(*) as total'))
             ->groupBy('in_review', 'tag_id')->get();
             $user = User::findOrFail($user_id);
 //$response = array( 'status' => 'success', 'msg' => 'Setting created successfully',  'application' => $application, 'request'=> $request->all(), 'review_count' => $review_count, 'group_application' => $group_application, 'sorted_count' => $sorted_count, 'reject_count'=>$reject_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hire_count' => $hire_count);
$response = array( 'status' => 'success', 'msg' => 'Setting created successfully',  'application' => $application, 'request'=> $request->all(), 'reject_count' => $reject_count, 'sorted_count' =>$sorted_count, 'review_count' => $review_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hired_count' => $hired_count, 'newapplication_list' => $newapplication_list, 'work_experiences'=>$work_experiences, 'new_reject_list' => $new_reject_list, 'review_list'=>$review_list, 'shortlisted_list' => $shortlisted_list, 'user' => $user);
    return response()->json($response);
 
}

public function GetUserRecords(Request $request)
{
    $user_id = $request->user_id;
    $user = User::findOrFail($user_id);
    $response = ['user_record' => $user];
    return response()->json($response);
}

public function ShortlistApplicant(Request $request)
{
    $application_id = $request->get('application_id');
    $shortlist = $request->get('shortlist');
    $user_id = $request->get('user_id');
    $job_id = $request->get('job_id');
    $application = Application::findOrFail($application_id);
    $application->delete = 0;
    $application->in_review = 0;
    $application->shortlisted = 1;
    $application->rejected = 0;
    $application->offered = 0;
    $application->hired = 0;
    $application->sorted = 1;
    $application->save();
    $sorted_count = $this->GetSortedCount($job_id); 
    $reject_count = $this->GetRejectedCount($job_id);
    $review_count = $this->GetReivewCount($job_id);
    $offered_count = $this->GetOfferedCount($job_id); 
    $shortlisted_count = $this->GetShortlistedCount($job_id);
    $hired_count = $this->GetHiredCount($job_id);
    $newapplication_list = $this->GetUnsortedNewApplicationList($job_id);
    $new_reject_list = $this->GetRejectedNewApplicationList($job_id);
    $new_review_list = $this->GetReviewNewApplicationList($job_id);
    $shortlisted_list = $this->GetShortlistedApplicationList($job_id);
    $work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
    $documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
    $group_application = DB::table('applications')
             ->select('in_review', 'tag_id', DB::raw('count(*) as total'))
             ->groupBy('in_review', 'tag_id')->get();
$response = array( 'status' => 'success', 'msg' => 'Setting created successfully',  'application' => $application, 'request'=> $request->all(), 'reject_count' => $reject_count, 'sorted_count' =>$sorted_count, 'review_count' => $review_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hired_count' => $hired_count, 'newapplication_list' => $newapplication_list, 'work_experiences'=>$work_experiences, 'new_reject_list' => $new_reject_list, 'new_review_list'=>$new_review_list, 'shortlisted_list'=>$shortlisted_list);
    return response()->json($response);
 
}

public function OfferApplicant(Request $request)
{
    $application_id = $request->get('application_id');
    $shortlist = $request->get('shortlist');
    $user_id = $request->get('user_id');
    $job_id = $request->get('job_id');

    $application = Application::findOrFail($application_id);
    $application->delete = 0;
    $application->in_review = 0;
    $application->shortlisted = 0;
    $application->rejected = 0;
    $application->offered = 1;
    $application->hired = 0;
    $application->sorted = 1;
    $application->save();
    $sorted_count = $this->GetSortedCount($job_id); 
    $reject_count = $this->GetRejectedCount($job_id);
    $review_count = $this->GetReivewCount($job_id);
    $offered_count = $this->GetOfferedCount($job_id); 
    $shortlisted_count = $this->GetShortlistedCount($job_id);
    $hired_count = $this->GetHiredCount($job_id);
     $new_review_list = $this->GetReviewNewApplicationList($job_id);
    $new_offered_list = $this->GetOfferApplicationList($job_id);
    $shortlisted_list = $this->GetShortlistedApplicationList($job_id);
    $work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
            // dd($work_experiences);
    $documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
   $group_application = DB::table('applications')
             ->select('in_review', 'tag_id', DB::raw('count(*) as total'))
             ->groupBy('in_review', 'tag_id')->get();
$response = array( 'status' => 'success', 'msg' => 'Setting created successfully',  'application' => $application, 'request'=> $request->all(), 'reject_count' => $reject_count, 'sorted_count' =>$sorted_count, 'review_count' => $review_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hired_count' => $hired_count, 'work_experiences'=>$work_experiences, 'new_offered_list' => $new_offered_list, 'new_review_list' => $new_review_list, 'shortlisted_list' => $shortlisted_list);
    return response()->json($response);
 
}

public function HireApplicant(Request $request)
{
    $application_id = $request->get('application_id');
    $shortlist = $request->get('shortlist');
    $user_id = $request->get('user_id');
    $job_id = $request->get('job_id');

    $application = Application::findOrFail($application_id);
    $application->delete = 0;
    $application->in_review = 0;
    $application->shortlisted = 0;
    $application->rejected = 0;
    $application->offered = 0;
    $application->hired = 1;
    $application->sorted = 1;
    $application->save();

    $sorted_count = $this->GetSortedCount($job_id); //Application::where('tag_id',$job_id)->where('sorted', 0)->where('delete', 0)->count();

    $reject_count = $this->GetRejectedCount($job_id);//Application::where('tag_id',$job_id)->where('rejected', 1)->where('delete', 0)->count();
    
    $review_count = $this->GetReivewCount($job_id);//Application::where('tag_id',$job_id)->where('in_review', 1)->where('delete', 0)->count();
    $offered_count = $this->GetOfferedCount($job_id); //Application::where('tag_id',$job_id)->where('offered', 1)->where('delete', 0)->count();
    $shortlisted_count = $this->GetShortlistedCount($job_id); //Application::where('tag_id',$job_id)->where('shortlisted', 1)->count();
    $hired_count = $this->GetHiredCount($job_id); //Application::where('tag_id',$job_id)->where('hired', 1)->count();
    $newapplication_list = $this->GetUnsortedNewApplicationList($job_id);
    $new_review_list = $this->GetReviewNewApplicationList($job_id);
    $hired_list = $this->GetHiredApplicationList($job_id);
    // $shortlisted_list = $this->GetShortlistedApplicationList($job_id);
    $newoffered_list = $this->GetOfferApplicationList($job_id);
    // $work_experiences = DB::table('work_experiences')->get();
    $work_experiences = DB::table('work_experiences')
            ->join('applications', 'work_experiences.resumefk', '=', 'applications.resume_id')
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->get();
            // dd($work_experiences);
    $documents = DB::table('applications')
            ->join('documents', 'documents.id', '=', 'applications.document_id') 
            ->get();
$group_application = DB::table('applications')
             ->select('in_review', 'tag_id', DB::raw('count(*) as total'))
             ->groupBy('in_review', 'tag_id')->get();
$response = array( 'status' => 'success', 'msg' => 'Setting created successfully',  'application' => $application, 'request'=> $request->all(), 'reject_count' => $reject_count, 'sorted_count' =>$sorted_count, 'review_count' => $review_count, 'shortlisted_count' => $shortlisted_count, 'offered_count' => $offered_count, 'hired_count' => $hired_count, 'newapplication_list' => $newapplication_list, 'work_experiences'=>$work_experiences, 'hired_list'=>$hired_list,  'newoffered_list' =>$newoffered_list, 'new_review_list' => $new_review_list);
    return response()->json($response); 
}
    // this method displays list of job post
    public function ShowManageJobs(Request $request){
         $s = $request->input('s');
      $resumes = RecruitResume::all();
      $user = Auth::user();
      $industry_professions = DB::table('industry_professions')->get();
      $tags = DB::table('tags')->where('client', $user->id)->orderby('created_at', 'DESC')->paginate(20); 
        $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
            $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     // $applications_by_user  = Application::where('clientfk', $user->id)->get();
$group_application = DB::table('applications')
             ->select('in_review', 'tag_id', DB::raw('count(*) as total'))
             ->groupBy('in_review', 'tag_id')->get();
           //dd($tags);
$menus = $this->displayMenu();
$units = $this->displayUnit();
      return view('employer.manage_jobs', compact('resumes','tags','industry_professions', 'recruit_profile_pix', 'recruit_profile_pix_list', 'group_application', 's', 'menus', 'units'), array('user' => Auth::user()));
    }
    public function FilterJobs(Request $request)
    {
        $s = $request->input('s');
        $location = $request->location;
        $job_type = $request->job_type;
        $availability = $request->availability;
        $date_posted = $request->date_posted;
        $job_category = $request->job_category;
        $professions = IndustryProfession::where('status',1)->get();
        $employement_terms = DB::table('employement_terms')->get();
        $tags = Tag::where(function($query) use ($job_type, $location, $job_category){
        if (isset($location)) {
    foreach ($location as $city) {
        $city_record = City::findOrFail($city);
        $query->orWhere('delete', 0)->where('city', $city_record->name);
    }         
 }
 if (isset($job_category)) {
    foreach ($job_category as $key => $job_cat) {
 
    $query->orWhere('delete', 0)->where('job_category', $job_cat);
 
    }
 }

 if (isset($job_type)) {
    foreach ($job_type as $key => $job_type) {
      $query->orWhere('delete', 0)->where('job_type', $job_category);
    }
 }
    })->paginate(20);
        $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => $employement_terms,
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' =>  $professions,
        'cities' => 'cities',
         'users' => 'users',
        'educational_levels' => 'educational_levels',
        'tags' => $tags,
        'job_type' => $job_type,
        'location' =>$location
    );
        return response()->json($response);
    }

    public function PostJobs(){
 
    $user = Auth::user();   
    if ($user->account_type === 'employer') {
      // check if employer has units to post a job
      ///employer_packages
      $employer_packages = DB::table('employer_packages')->where('userfkp' , $user->id)->where('status', 1)->first();
    //dd($employer_packages);
    if ($employer_packages !=null  && $employer_packages->units != 0) {
    //dd('NO');
    $resumes = RecruitResume::all(); 
    $countries = DB::table('countries')->orderBy('name_en')->get();
    $cities = DB::table('cities')->orderBy('name')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = $this->GetQualificationLevels(); 
    $industries = DB::table('industries')->where('status',1)->orderBy('name')->get();
    $employement_terms = DB::table('employement_terms')->orderBy('name')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->where('status',1)->get();
    $industry_professions = DB::table('industry_professions')->where('status',1)->orderBy('name')->get();
    $fields_of_study_list = DB::table('fields_of_studies')->get();
    $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();

    $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
    $menus = $this->displayMenu();
    $units = $this->displayUnit();

    return view('employer.create_job', compact('resumes','countries','cities', 'regions', 'educational_levels', 'industries', 'employement_terms', 'jobcareer_levels', 'industry_professions', 'recruit_profile_pix_list', 'recruit_profile_pix', 'fields_of_study_list', 'menus', 'units') ,array('user' => Auth::user()));
      }else{
        //dd('YES'); subscribe for units employer_infor
            Session::flash('no_unit_infor', 'Choose a plan below to begin posting Jobs');
          return redirect()->route('pricing');  
      }
 
    }else{
//
          return redirect()->back()->withMessage('sorry you are not allowed to take this action');
    }
        
    return redirect()->back();

    }

    
    public function JobDetail($id)
    {

        if (Auth::check()) {
            $user = Auth::user();
        // $tag = Tag::findOrFail($id);
        // $employement_terms = DB::table('employement_terms')->get();
        // $jobcareer_levels = DB::table('jobcareer_levels')->get();
        // $job_requirements = DB::table('job_requirements')->get();
        // $job_assessments = DB=::table('job_assessments')->get();
        // $industries = DB::table('industries')->get();
        // $educational_levels = $this->GetQualificationLevels();
        // $skillsets = DB::table('skillsets')->where('tagid', $id)->get();
        $resume = RecruitResume::where('user_id',$user->id)->where('status', 1)->first(); 
      //          $user = Auth::user();
      // $tag = Tag::findOrFail($id);
      $tag = Tag::findOrFail($id);
      $employement_terms = DB::table('employement_terms')->get();
      $jobcareer_levels = DB::table('jobcareer_levels')->get();
      $industries = DB::table('industries')->get();
      $educational_levels = $this->GetQualificationLevels(); 
      $skillsets = DB::table('skillsets')->where('tagid', $id)->get();
      $cities = DB::table('cities')->get();

      // view assessement Questions

      $job_assessments = DB::table('job_assessments')->where('job_id', $id)->get();

      $job_requirements = DB::table('job_requirements')->where('job_id', $id)->get();
   //  dd($skillsets);

      $get_Job_by_common_industries = DB::table('tags')->where('industry',$tag->industry)->orWhere('job_category',$tag->job_category)->orWhere('salary_range', $tag->salary_range)->get();
      $get_Job_by_common_industries_similler = DB::table('tags')->where('industry',$tag->industry)->where('job_category',$tag->job_category)->where('salary_range', $tag->salary_range)->get();
      
      // dd($get_Job_by_common_industries);
      // get employer that posted this job
 $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->where('status', 1)->first();
 $resume_list = RecruitResume::where('user_id', $user->id)->get();
      // $get_job_poster_list = Tag::where('client', $tag->client)->get();
      $get_all_user_list = User::all();

//dd($resume_list);
        
        }else{
            
           return url('/login?redirect_to=' . urlencode(request()->url()));
        }
      $menus = $this->displayMenu();
      $units = $this->displayUnit();
    return view('jobs.job_details', compact('tag','employement_terms', 'jobcareer_levels', 'industries', 'educational_levels', 'skillsets', 'job_assessments', 'job_requirements', 'get_Job_by_common_industries', 'get_Job_by_common_industries_similler', 'cities', 'get_all_user_list', 'user_single_resume_by_date', 'resume_list','menus', 'units'), array('user' => Auth::user()));
       // return view('employer.job_details', compact('tag','employement_terms', 'jobcareer_levels', 'industries', 'educational_levels', 'skillsets', 'resume', 'job_requirements'), array('user' => Auth::user()));
    }

    
    public function tagUtilities($id)
    {
    $tag = Tag::findOrFail($id);
    $countries = DB::table('countries')->get();
    $cities = DB::table('cities')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = $this->GetQualificationLevels();
    $industries = DB::table('industries')->get();
    $employement_terms = DB::table('employement_terms')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->get();
    $industry_professions = DB::table('industry_professions')->get();
    $job_requirements = DB::table('job_requirements')->where('job_id',$id)->get();
    $job_assessments = DB::table('job_assessments')->where('job_id',$id)->get();

$content = [
'countries' => $countries,
'cities' => $cities,
'regions' => $regions,
'educational_levels' => $educational_levels,
'industries' => $industries,
'employement_terms' => $employement_terms,
'jobcareer_levels' => $jobcareer_levels,
'industry_professions' => $industry_professions,
'job_requirements' => $job_requirements,
'job_assessments' => $job_assessments,

];
    return $content;
    }


 
        public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function showSaveToDraft($id)
{
    if ($id) {
      $tag = Tag::findOrFail($id);
    }
      $menus = $this->displayMenu();
  return view('employer.save_as_draft', compact('tag', 'menus'), array('user' => Auth::user()));
}

public function SaveDraft(Request $request){
// dd($id);
  $draft = $request->draft;
  $tag_id = $request->tag_id;
  if ($tag_id) {
    try {
    $tag = Tag::findOrFail($tag_id);
   $tag->draft = 1;
   $tag->active = 0;
   $tag->awaiting_aproval = 0;
   $tag->save();   
    } catch (Exception $e) {
      
     $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'something is not right!');
    return redirect()->back()->withErrors(['error', 'something is not right!']);
    }
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Done successfully!');
  }else{

     $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'something is not right!');
  }

return redirect()->back();
}

    public function getCitiesByRegioinAjax($region_id) {

    $cities = DB::table("cities")->where("region_id", $region_id)->get(['name']);
 
    return json_encode($cities);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    $professions = Profession::all();
    $clients = Client::all();
    $sort_categories_list = DB::table('sort_categories')->get();
    $cities = City::all();
    $documents = Document::all();
          $s = null;
            $resumes = RecruitResume::all(); 
    $countries = DB::table('countries')->get();
    $cities = DB::table('cities')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = $this->GetQualificationLevels(); 
    $industries = DB::table('industries')->get();
    $employement_terms = DB::table('employement_terms')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->get();
    $industry_professions = DB::table('industry_professions')->get();
 
    $menus = $this->displayMenu();
    $units = $this->displayUnit();
          return view('admin.tags.create', compact(['clients', 'professions', 'sort_categories_list', 'cities', 'documents', 's','resumes','countries','cities', 'regions', 'educational_levels', 'industries', 'employement_terms', 'jobcareer_levels', 'industry_professions', 'menus', 'units']), array('user' => Auth::user()));
    }


public function SaveJob(Request $request)
{
   
  // After Job is posted
      // 1. status is set to 0
      // active is set to 0
      // admin to publish only Job Post with status 1 and active 1
      // waiting approval status = 2
      // draft status 3
      // blacklist status = 4 
        $user = Auth::user();
        $returnCurrentTime = $this->returnCurrentTime();
        $end_date = $request->end_date;
        $job_code = $request->job_code;
        $name = $request->name;
        $job_title = $request->job_title;
        $client = $request->client;
        $profession = $request->profession;
        $display_name = $request->display_name;
        $description = $request->description; 
        
        $experience = $request->p_experience;
        $job_level = $request->p_job_level;
        $salary_range = $request->salary_range;
        $industry = $request->p_industry;
        $qualification = $request->p_qualification; 
        $country = $request->p_country;
        $region = $request->region;
        $city = $request->location;
        $full_address = $request->full_address;
        $email_address = $request->email_address;
        $job_category = $request->job_category;
        $job_type = $request->job_type;
        $gender = $request->p_gender;
 
        $reqirements = $request->group_a;
        $assessments = $request->group_b;
        $skillist = $request->group_c;
        $job_summary = $request->job_summary;
        $job_roles = $request->job_roles;

     $rules = [
        'job_title'=>'required|string',
        'description' =>'required|string',
        'full_address'=>'required|string',
        'gender' => 'required|string',
        'job_type' => 'required', 
        'salary_range' => 'required|string',
        'deadline_submission' => 'required|string',
        'region' => 'required',
        'experience' => 'required',
        'country' =>'required',
        'job_summary' => 'required', 
        ];

        $input = Input::only(
        'job_title',
        'description', 
        'full_address',
        'gender',
        'job_type',
        'salary_range',
        'deadline_submission',
        'region',
        'experience',
        'country',
        'job_summary'

    );
 
        $validator = Validator::make($input, $rules);

         if(!$validator)
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        //  
        if ($job_category) {
       $profession = IndustryProfession::findOrFail($job_category);
          }
     
        if ($client) {
           $client_name = Client::findOrFail($client);
        }else{
           $client_name = $user->name . '' .$user->username .'' .$user->lastname;
        }
      
       //job_requirements
        
     // if($end_date !=null && $job_title !=null && $job_level !=null && $industry !=null){
//dd($request->all());
       
            DB::transaction(function () use ($job_title, $display_name, $client, $profession, $client_name, $end_date, $job_code, $request, $user, $reqirements, $assessments, $skillist)  {
// .'-'. str_limit(strtoupper($client_name),3)

          $tag = Tag::firstOrNew(['job_title' => $request->input('job_title')]);
          $tag->display_name = $display_name;
          $tag->code = $job_code;
          $tag->client = $user->id;
          $tag->created_at = $this->returnCurrentTime();
          $tag->status = 0; 
          $tag->end_date = $request->input('end_date');
          $tag->experience = $request->input('p_experience');
          $tag->job_level = $request->input('p_job_level');
          $tag->job_type = $request->input('job_type');
          $tag->salary_range = $request->input('p_salary_range');
          $tag->industry = $request->input('p_industry');
          $tag->qualification = $request->input('p_qualification'); 
          $tag->country = $request->input('p_country');
          $tag->region = $request->input('region');
          $tag->city = $request->input('location');
          $tag->full_address = $request->input('full_address');
          $tag->email_address = $request->input('email_address');
          $tag->job_category = $request->input('job_category');
          $tag->description = $request->input('description');
          $tag->gender = $request->input('p_gender');
          $tag->draft = 0;
          $tag->active = 0;
          $tag->delete = 0;
          $tag->awaiting_aproval = 1;
          $tag->job_summary = $request->input('job_summary');
          $tag->job_role = $request->input('job_roles'); 
          $tag->save(); 
    
   foreach ($assessments as $key => $value) {
       DB::table('job_assessments')->insert(['question' => $value['assessment'], 'client_id' => $user->id, 'job_id' =>$tag->id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
    }
         

        // foreach ($field_of_study as $key => $value) {
        //   DB::table('job_field_of_studies')->insert(['fostudy' => $value, 'tag_id' =>$tag->id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
        // }

           });
    
 
    $tagid = DB::table('tags')->orderby('created_at', 'DESC')->first();
   // redirect to payment Packages
 
    $new_unit = 0;

   // get employers abailable units
  // subtract one from the abailable units
  // update employer with new unite
// $employer_package = EmployerPackage::where('userfkp', $user->id)->where('status',1)->first();

// if ($employer_package->jobs_remaining !=0 ) {
//  $new_unit = $employer_package->jobs_remaining - 1;
// $employer_packages = DB::table('employer_packages')->where(['userfkp' => $user->id, 'package_id' => $employer_package->package_id, 'status'=> 1])->update([ 'jobs_remaining' => $new_unit ]);
// }else{
//   Session::flash('you have no availabile unit');
// }
    try {
     
  $this->SendJobAlert($tagid->id, $job_type, $city, $country, $email_address, $industry, $job_category);

  $this->SendJobPostAlertToAdmin($tagid->id);
        } catch (\Exception $e) {
      Session::flash('error', $e->getMessage());
        // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
 

    $admin = $request->admin;

if ($admin) {
  Session::flash('success','Job created successfuly');
    return redirect()->back();
}else{
  Session::flash('success','Job created successfuly');
  return redirect()->route('jp.success', $tagid->id);
    // $success_image = url('/') . 'img/employer-confirmation-icon.png';
//     // $dashboard = url('/') .'/employer/dashboard';
//     // $job_detail = url('/') . '/job/job-detail/';
//   $response = array('status' => 'success', 'msg' => 'Setting created successfully', 'tagid' => $tagid->id, 'success_image' => $success_image, 'dashboard' => $dashboard , 'job_detail' => $job_detail);
// return response()->json($response);
 }
   // insert into ProfessionMeta of candidates to im     
  
  
//dd('here');
        return back()->with(['error' => 'somthing went wrong']);
}

     public function store(Request $request){
      // After Job is posted
      // 1. status is set to 0
      // active is set to 0
      // admin to publish only Job Post with status 1 and active 1
      // waiting approval status = 2
      // draft status 3
      // blacklist status = 4 
        $user = Auth::user();
        $returnCurrentTime = $this->returnCurrentTime();
        $end_date = $request->end_date;
        $job_code = $request->job_code;
        $name = $request->name;
        $job_title = $request->job_title;
        $client = $request->client;
        $profession = $request->profession;
        $display_name = $request->display_name;
        $description = $request->description;
        $field_of_study = $request->fieldsos;
        
        $experience = $request->p_experience;
        $job_level = $request->p_job_level;
        $salary_range = $request->salary_range;
        $industry = $request->p_industry;
        $qualification = $request->p_qualification;
        $deadline_submission = $request->deadline_submission;
        $country = $request->p_country;
        $region = $request->region;
        $city = $request->location;
        $full_address = $request->full_address;
        $email_address = $request->email_address;
        $job_category = $request->job_category;
        $job_type = $request->job_type;
        $gender = $request->p_gender;
 
        $reqirements = $request->group_a;
        $assessments = $request->group_b;
        $skillist = $request->group_c;
        $job_roles = $request->job_roles;        

     $rules = [
        'job_title'=>'required|string',
        'description' =>'required|string',
        'full_address'=>'required|string',
        'gender' => 'required|string',
        'job_type' => 'required', 
        'salary_range' => 'required|string',
        'deadline_submission' => 'required|string',
        'region' => 'required',
        'experience' => 'required',
        'country' =>'required',
        ];

        $input = Input::only(
        'job_title',
        'description', 
        'full_address',
        'gender',
        'job_type',
        'salary_range',
        'deadline_submission',
        'region',
        'experience',
        'country'

    );
 
        $validator = Validator::make($input, $rules);

         if(!$validator)
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        //  
        if ($job_category) {
       $profession = IndustryProfession::findOrFail($job_category);
          }
     
        if ($client) {
           $client_name = Client::findOrFail($client);
        }else{
           $client_name = $user->name . '' .$user->username .'' .$user->lastname;
        }
      
       //job_requirements
    //dd($profession->id);
        
      if($end_date !=null && $job_title !=null && $job_level !=null && $industry !=null){
 
        try {
            DB::transaction(function () use ($job_title, $display_name, $client, $profession, $client_name, $end_date, $job_code, $request, $user, $reqirements, $assessments, $skillist, $field_of_study)  {
// .'-'. str_limit(strtoupper($client_name),3)

          $tag = Tag::firstOrNew(['job_title' => ucwords($request->input('job_title'))]);
          $tag->display_name = ucwords($display_name);
          $tag->code = $job_code;
          $tag->client = $user->id;
          $tag->created_at = $this->returnCurrentTime();
          $tag->status = 0; 
          $tag->end_date = $request->input('end_date');
          $tag->experience = $request->input('p_experience');
          $tag->job_level = $request->input('p_job_level');
          $tag->job_type = $request->input('job_type');
          $tag->salary_range = $request->input('p_salary_range');
          $tag->industry = $request->input('p_industry');
          $tag->qualification = $request->input('p_qualification');
          $tag->deadline_submission = $request->input('deadline_submission');
          $tag->country = $request->input('p_country');
          $tag->region = $request->input('region');
          $tag->city = $request->input('location');
          $tag->full_address = $request->input('full_address');
          $tag->email_address = $request->input('email_address');
          $tag->job_category = $request->input('job_category');
          $tag->description = $request->input('description');
          $tag->gender = $request->input('p_gender');
          $tag->draft = 0;
          $tag->active = 0;
          $tag->delete = 0;
          $tag->awaiting_aproval = 1;
          $tag->job_summary = $request->input('job_summary');
          $tag->Job_roles = $request->input('job_roles');
          $tag->save();
 

       foreach ($assessments as $key => $value) {
        //dd($value['assessment']);
             DB::table('job_assessments')->insert(['question' => $value['assessment'], 'client_id' => $user->id, 'job_id' =>$tag->id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
        }

        foreach ($field_of_study as $key => $value) {
          DB::table('job_field_of_studies')->insert(['fostudy' => $value, 'tag_id' =>$tag->id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
        }

           });
       
 
    $tagid = DB::table('tags')->orderby('created_at', 'DESC')->first();
   // redirect to payment Packages
 
    $new_unit = 0;

   // get employers abailable units
  // subtract one from the abailable units
  // update employer with new unite
$employer_package = EmployerPackage::where('userfkp', $user->id)->where('status',1)->first();

if ($employer_package->jobs_remaining !=0 ) {
 $new_unit = $employer_package->jobs_remaining - 1;
$employer_packages = DB::table('employer_packages')->where(['userfkp' => $user->id, 'package_id' => $employer_package->package_id, 'status'=> 1])->update([ 'jobs_remaining' => $new_unit ]);
}else{
  Session::flash('you have no availabile unit');
}

        
    $this->SendJobAlert($tagid->id, $job_type, $city, $country, $email_address, $industry, $job_category);

    $this->SendJobPostAlertToAdmin($tagid->id);

    $admin = $request->admin;

if ($admin) {
  Session::flash('success','Job created successfuly');
    return redirect()->back();
}else{
  Session::flash('success','Job created successfuly');
  return redirect()->route('jp.success', $tagid->id);
//     $success_image = url('/') . 'img/employer-confirmation-icon.png';
//   $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'tagid' => $tagid->id, 'success_image' => $success_image);
// return response()->json($response);
 }
   // insert into ProfessionMeta of candidates to im     
        } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'somthing went wrong']);
        }
  }
//dd('here');
        return back()->with(['error' => 'somthing went wrong']);
    }

  public function PaymentPackage(Request $request){



  return redirect()->back();
  }

    public function Payment($tag_id){
      $user = Auth::user();
    $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
    $menus = $this->displayMenu();
    $units = $this->displayUnit();
      return view('employer.kpgpayment', compact('recruit_profile_pix', 'recruit_profile_pix_list', 'menus' ,'units') ,array('user' => Auth::user()));
    }
    public function Packages(){
            $user = Auth::user();
    $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
    
    $menus = $this->displayMenu();
    $units = $this->displayUnit();
      return view('employer.employer_dashboard_packages', compact('recruit_profile_pix', 'recruit_profile_pix_list', 'menus', 'units') ,array('user' => Auth::user()));
    }

  public function SendJobPostAlertToAdmin($job_id){

  $job_id = Tag::findOrFail($job_id);
   $users = DB::table('users')->where('admin',1)->get();
  //   $job_type = DB::table('employement_terms')->where('id', $job_type)->first();
  // get the city
    // $industry_record = DB::table('industries')->where('id', $industry)->first();
      $JOBALERT = 'JOB ALERT';
        $content = [
        'title'=> $JOBALERT, 
        'body'=> 'The body of your message.',
        'button' => 'Click Here', 
 
        'job_title' =>$job_id->job_title,
        'apply' => url('/') . '/candidates/job-details/'.$job_id->id,
        ];    
      
 
  if ($job_id) {
    $when = Carbon::now()->addSeconds(15); 
    foreach ($users as $key => $user) {
        
        Mail::to($user)->later($when, new AwaitingApproval($content));
    }

  }else{
    return redirect()->back();
  }

 return redirect()->back();
}

public function SendJobAlert($job_id, $job_type, $city, $country, $email_address, $industry, $job_category){

if ($job_id !=null && $job_type !=null && $city !=null && $country !=null && $email_address !=null && $industry !=null && $job_category !=null) {
  $tag_id = Tag::findOrFail($job_id);
 
  // get job_type Freelance etc.
  $job_type = DB::table('employement_terms')->where('id', $job_type)->first();
  // get the city
 

  $industry_record = DB::table('industries')->where('id', $industry)->first();
  // get profession of position 
  $job_category = DB::table('industry_professions')->where('id', $job_category)->first();
//dd($job_category);
      $JOBALERT = 'JOB ALERT';
        $content = [
        'title'=> $JOBALERT, 
        'body'=> 'The body of your message.',
        'button' => 'Click Here',
        'email_address' => $email_address,
        'industry' => $industry_record->id,
        'tag' =>$tag_id,
        'city' => $city,
        'job_type' => $job_type->name,
        'job_category' => $job_category->name,
        'country' =>$country,
        'apply' => url('/') . '/candidates/job-application-form/'.$tag_id->id,
        ];    
      
 // dd($content);
$emails = DB::table('emails')->where('industry', $industry_record->id)->get();

try{
   $when = Carbon::now()->addSeconds(15); 
  foreach ($emails as $key => $value) {
   
    Mail::to($value->email)->later($when, new JobAlert($content));

  }

  } catch (\Exception $e) {
      return redirect()->back()
          ->withErrors(['error' => $e->getMessage()]);
    }

}else{

  return redirect()->back();
}
 
}
public function GetAvailableJobs()
{
    $user = Auth::user();
    if ($user) {
        // get job that are active and live
   $jobs_by_candidates_industry = Tag::latest()->paginate(3);
        }
    return $jobs_by_candidates_industry;
}
function cutText($str, $limit, $brChar = ' ', $pad = '...') 
{
    if (empty($str) || strlen($str) <= $limit) {
        return $str;
    }
    $output = substr($str, 0, ($limit+1));
    $brCharPos = strrpos($output, $brChar);
    $output = substr($output, 0, $brCharPos);
    $output = preg_replace('#\W+$#', '', $output);
    $output .= $pad;
    return $output;
}

    public function ApplicationHistoryPage(Request $request)
    {
      $s = $request->input('s');
      $user = Auth::user();
      // $resumes = RecruitResume
      $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
      $job_by_candidate_list = $this->GetAvailableJobs();
      $job_category_list = $this->GetJobcategory();
      $cities = DB::table('cities')->get();
      $tags = DB::table('tags')->where('status',1)->where('active', 1)->get();
      $countries = DB::table('countries')->get();
   $job_applied_by_candidate = DB::table('applications')->where('user_id', $user->id)
            ->join('tags', 'tags.id', '=', 'applications.tag_id')
            ->select('applications.id', 'applications.resume_id', 'applications.user_id', 'tags.email_address', 'tags.job_title', 'applications.created_at', 'applications.updated_at', 'tags.id')
            ->paginate(8);
     //dd($job_applied_by_candidate);
   // check for candidates current resume
   $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
    $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
    $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
    $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
      $pr_caption= RecruitResume::where('user_id', $user->id)->where('status',1)->first();
    $menus = $this->displayMenu();
     return view('candidate.applied_jobs', compact('job_applied_by_candidate', 'resumes', 'job_by_candidate_list', 'cities', 'tags','s', 'job_category_list', 'section_candidatelist', 'section_candidatelist', 'section_candidatelist_count','countries', 'menus', 'profile_pix', 'pr_caption'), array('user' => Auth::user()));
    }

public function GetCandidateSection($code){

   if (Auth::check()) {
     $user = Auth::user();
    // dd($user);
  $section_candidate = DB::table('sections')->where('user_code', $user->id)->where('resume_code', $code)->get();
// dd($section_candidate);
   }
   return $section_candidate;
}


public function GetJobcategory(){

    $job_category = DB::table('employement_terms')->get();
    return $job_category;
}

//show job post success page 
public function JPSuccess($id)
{
  $tag = Tag::findOrFail($id);
       $user = Auth::user();
    $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
    $menus = $this->displayMenu();
    $units = $this->displayUnit();
return view('employer.job_post_confirmation', compact('tag', 'recruit_profile_pix_list', 'recruit_profile_pix', 'menus', 'units'), array('user' => Auth::user()));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('tags.show',compact('tag')); 
    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tag = Tag::find($id);
          $professions = Profession::all();
          $clients = Client::all();
          $sort_categories_list = DB::table('sort_categories')->get();
          $cities = City::all();
          $documents = Document::all();
          $s = null;
            $resumes = RecruitResume::all(); 
    $countries = DB::table('countries')->get();
    $cities = DB::table('cities')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = $this->GetQualificationLevels(); 
    $industries = DB::table('industries')->get();
    $employement_terms = DB::table('employement_terms')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->get();
    $industry_professions = DB::table('industry_professions')->get();
     $job_requirements = DB::table('job_requirements')->where('job_id',$id)->get();
    $job_assessments = DB::table('job_assessments')->where('job_id',$id)->get();
    //dd($job_assessments);
          return view('admin.tags.edit', compact(['tag','clients', 'professions', 'sort_categories_list', 'cities', 'documents', 's','resumes','countries','cities', 'regions', 'educational_levels', 'industries', 'employement_terms', 'jobcareer_levels', 'industry_professions', 'recruit_profile_pix_list', 'recruit_profile_pix', 'job_requirements', 'job_assessments']), array('user' => Auth::user()));

        
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
        //dd($request->all());
        //
      //  dd($id);
       // dd($request->all());
          $user = Auth::user();
        $returnCurrentTime = $this->returnCurrentTime();
        $end_date = $request->end_date;
        $job_code = $request->job_code;
        $name = $request->name;
        $job_title = $request->job_title;
        $client = $request->client;
        $profession = $request->profession;
        $display_name = $request->display_name;
        $description = $request->description;
        $job_title = $request->job_title;
        
        $experience = $request->p_experience;
        $job_level = $request->p_salary_range;
        $salary_range = $request->salary_range;
        $industry = $request->p_industry;
        $qualification = $request->p_qualification;
        $deadline_submission = $request->deadline_submission;
        $country = $request->p_country;
        $region = $request->region;
        $city = $request->location;
        $full_address = $request->full_address;
        $email_address = $request->email_address;
        $job_category = $request->job_category;
        $job_type = $request->job_type;
        $gender = $request->p_gender;
        $featured = $request->feature;

        $reqirements = $request->group_a;
        $assessments = $request->group_b;

           $rules = [
        'job_title'=>'required|string|max:55',
        'description' =>'required',
        'full_address'=>'required',
        'gender' => 'required',
        ];

        $input = Input::only(
        'job_title',
        'description',
        'description',
        'full_address',
        'gender'
    );
     
        $validator = Validator::make($input, $rules);

         if(!$validator)
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    if ($id) {
  
          $tag = Tag::findOrFail($id);
          $tag->job_title = $job_title;
          $tag->display_name = $display_name;
          $tag->code = $job_code;
          $tag->client = $user->id;
          $tag->created_at = $this->returnCurrentTime();
          $tag->status = 0;
          $tag->end_date = $request->input('end_date');
          $tag->experience = $request->input('p_experience');
          $tag->job_level = $request->input('p_job_level');
          $tag->job_type = $request->input('job_type');
          $tag->salary_range = $request->input('p_salary_range');
          $tag->industry = $request->input('p_industry');
          $tag->qualification = $request->input('p_qualification');
          $tag->deadline_submission = $request->input('deadline_submission');
          $tag->country = $request->input('p_country');
          $tag->region = $request->input('p_region');
          $tag->city = $request->input('p_city');
          $tag->full_address = $request->input('full_address');
          $tag->email_address = $request->input('email_address');
          $tag->job_category = $request->input('job_category');
          $tag->description = $request->input('description');
          $tag->gender = $request->input('p_gender');
         // $tag->featured = $request->feature;
          $tag->save();

        if ($request->feature === '1') {
             $featu = Tag::findOrFail($id);
             $featu->status = 1;
             $featu->active = 1;
             $featu->featured = 1;
             $featu->awaiting_aproval = 0;
            $featu->save();

        }

if ($reqirements) {
  # code...

       foreach ($reqirements as $key => $value) {
 
           DB::table('job_requirements')->where('id',$id)->update(['title' => $value['jrequirement'], 'client_id' => $user->id, 'job_id' =>$tag->id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
        }
}
if ($assessments) {
  # code...

       foreach ($assessments as $key => $value) {
 
            DB::table('job_assessments')->where('id',$id)->update(['question' => $value['assessment'], 'client_id' => $user->id, 'job_id' =>$tag->id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
        }
      }
Session::flash('success', 'done successfully'); 
}else{

Session::flash('error', 'something went wrong');
}
   return redirect()->back();
    }

    public function ReivewJob($id)
    {
        $professions = Profession::all();
        $clients = Client::all();
        $tag = Tag::find($id);
        $jobrequirements = DB::table('job_requirements')->where('job_id', $id)->get();
        $jobskills = DB::table('skillsets')->where('tagid', $id)->get();
        $jobassessments = DB::table('job_assessments')->where('job_id', $id)->get();
        return view('admin.tags.review_jobs', compact(['clients', 'professions', 'tag', 'jobrequirements','jobskills', 'jobassessments']), array('user' => Auth::user()));
    }


  
  public function GetfeaturedJobs(Request $request){
   $s = $request->input('s');
        // $documents = Document::all()->count();
        $user = Auth::User();    
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        //employement_terms employement_terms
        $job_by_candidate_list = $this->GetAvailableJobs();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
        $job_category_list = $this->GetJobcategory();
        $featured_jobs = DB::table('tags')->where('status', 1)->where('active', 1)->where('featured', 1)->paginate(8);
        $tags = DB::table('tags')->where('status', 1)->where('active', 1)->paginate(8);
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
        $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
        $menus = $this->displayMenu();
        $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
      $pr_caption= RecruitResume::where('user_id', $user->id)->where('status',1)->first();
    // $units = $this->displayUnit();
    return view('candidate.list_featured_jobs', compact('featured_jobs', 'resumes', 'job_by_candidate_list', 'cities', 'countries', 'tags', 'job_category_list', 'section_candidatelist', 'section_candidatelist_count','s', 'menus', 'profile_pix', 'pr_caption') ,array('user' => Auth::user()));
  }


  public function ShowEditJobsForm($id){
    #code...
    $user = Auth::user();
    $tag = Tag::findOrFail($id);
    $countries = DB::table('countries')->get();
    $cities = DB::table('cities')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = $this->GetQualificationLevels(); 
    $industries = DB::table('industries')->get();
    $employement_terms = DB::table('employement_terms')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->get();
    $industry_professions = DB::table('industry_professions')->get();
    $job_requirements = DB::table('job_requirements')->where('job_id',$id)->get();
    $job_assessments = DB::table('job_assessments')->where('job_id',$id)->get();
     $fields_of_study_list = DB::table('fields_of_studies')->get();
     //dd($job_assessments);
    $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
            $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();

      $job_field_of_studies = DB::table('job_field_of_studies')->get();
    $menus = $this->displayMenu();
    $units = $this->displayUnit();
    return view('employer.edit_job_post', compact('fields_of_study_list','recruit_profile_pix_list', 'recruit_profile_pix','tag','countries','cities', 'regions', 'educational_levels', 'industries', 'employement_terms', 'jobcareer_levels', 'industry_professions','job_requirements', 'job_assessments', 'job_field_of_studies', 'menus', 'units'), array('user' => Auth::user()));
    }

    public function UpdateJobPost(Request $request){
    //dd($request->all());
        $tag_id = $request->tag_id;
        
        $user = Auth::user();
        $returnCurrentTime = $this->returnCurrentTime();
        $end_date = $request->end_date;
        $job_code = $request->job_code;
        $name = $request->name;
        $job_title = $request->job_title;
        $client = $request->client;
        $profession = $request->profession;
        $display_name = $request->display_name;
        $description = $request->description;
        $job_title = $request->job_title;
        
        $experience = $request->p_experience;
        $job_level = $request->p_salary_range;
        $salary_range = $request->salary_range;
        $industry = $request->p_industry;
        $qualification = $request->p_qualification;
        $deadline_submission = $request->deadline_submission;
        $country = $request->p_country;
        $region = $request->p_region;
        $city = $request->p_city;
        $full_address = $request->full_address;
        $email_address = $request->email_address;
        $job_category = $request->job_category;
        $job_type = $request->job_type;
        $gender = $request->p_gender;
        $job_summary = $request->job_summary;
        $job_roles = $request->job_roles;

        //$reqirements = $request->group_a;
        $assessments = $request->group_b;

       // dd($assessments);

           $rules = [
        'job_title'=>'required|string|max:55',
        'description' =>'required',
        'full_address'=>'required',
        'gender' => 'required',
        ];

        $input = Input::only(
        'job_title',
        'description',
        'description',
        'full_address',
        'gender'
    );
     
        $validator = Validator::make($input, $rules);

         if(!$validator)
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    if ($tag_id) {
  
          $tag = Tag::findOrFail($tag_id);
          $tag->job_title = $job_title;
          $tag->display_name = $display_name;
          $tag->code = $job_code;
          $tag->client = $user->id;
          $tag->created_at = $this->returnCurrentTime();
          $tag->status = 0;
          $tag->end_date = $request->input('end_date');
          $tag->experience = $request->input('p_experience');
          $tag->job_level = $request->input('p_job_level');
          $tag->job_type = $request->input('job_type');
          $tag->salary_range = $request->input('p_salary_range');
          $tag->industry = $request->input('p_industry');
          $tag->qualification = $request->input('p_qualification');
          $tag->deadline_submission = $request->input('deadline_submission');
          $tag->country = $request->input('p_country');
          $tag->region = $request->input('p_region');
          $tag->city = $request->input('p_city');
          $tag->full_address = $request->input('full_address');
          $tag->email_address = $request->input('email_address');
          $tag->job_category = $request->input('job_category');
          $tag->description = $request->input('description');
          $tag->gender = $request->input('p_gender');
          $tag->job_summary = $request->input('job_summary');
          $tag->Job_roles  = $request->input('Job_roles');
          // $tag->delete = 0;
          // $tag->status = 0;
          // $tag->active = 0;
          // $tag->awaiting_aproval = 1;
          // $tag->draft = 0;
    
          $tag->save();


       // foreach ($reqirements as $key => $value) {
 
       //     DB::table('job_requirements')->where('id',$tag_id)->update(['title' => $value['jrequirement'], 'client_id' => $user->id, 'job_id' =>$tag->id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
       //  }

       foreach ($assessments as $key => $value) {
 
            DB::table('job_assessments')->where('id', $value['requirement_id'])->update(['question' => $value['assessment'], 'client_id' => $user->id, 'job_id' =>$tag_id, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
        }

Session::flash('success', 'done successfully'); 
}else{

Session::flash('error', 'something went wrong');
}
   return redirect()->back();
}


public function changeStatus(Request $request, $id){
  
  if($id){

  $tag = Tag::find($id);
  $tag->delete = 1;
  $tag->save();
    Session::flash('success','Tag has been deleted successfully');
    }else{

            return 'ID is required';
        }
  return redirect()->route('tag.index')->withMessage('Tag Deleted');
  }


public function BlackListJobPost($id){
// dd($id);
  if ($id) {
  $tag = Tag::find($id);
  $tag->delete = 1;
  $tag->status = 3;
  $tag->active = 0;
  $tag->awaiting_aproval = 0;
  $tag->draft = 0;
  $tag->save();
  ///$tag->active === 0 && $tag->status === 3 && $tag->awaiting_aproval === 0 && $tag->draft === 0
//status 3 Active 0 awaiting 0 draft 0
  $tag->save();

 $content = [
  'tag' => $tag,
  'email_address' => $tag->email_address,
  'job_title' => $tag->job_title,
  ];

  $employer_email = $tag->email_address;

  $when = Carbon::now()->addSeconds(15); 
  try {
     Mail::to($employer_email)->later($when, new BlacklistJobPost($content));
  } catch (\Exception $e) {
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

      Session::flash('success','Tag has been deleted successfully');
    }else{
      return 'ID is required';
 }
 return redirect()->back();
 
}

public function approvejobpost($id){
  //dd($id);
  if ($id) {
  $tag = Tag::find($id);
  $tag->delete = 0;
  $tag->status = 1;
  $tag->active = 1;
  $tag->awaiting_aproval = 0;
  $tag->draft = 0;
  $tag->save();

  // go to employee units and subtract from the available units
    $employer_package = DB::table('employer_packages')->where('status', 1)->where('userfkp', $tag->client)->first();
   
    if ($employer_package !=null) {
        return back()->withErrors(['error' => 'something went wrong']);

    }else{
          $remaining_units = $employer_package->units - 1;
    $remaining_jobs = $employer_package->jobs_remaining - 1;

    $employer_packages = DB::table('employer_packages')->where(['userfkp' => $tag->client, 'package_id' => $employer_package->package_id])->update([ 'jobs_remaining' => $remaining_jobs, 'units' => $remaining_units ]);  
    }



// Send  Email to Employer  
  $content = [
  'tag' => $tag,
  'email_address' => $tag->email_address,
  'job_title' => $tag->job_title,
  ];

  $employer_email = $tag->email_address;

  $when = Carbon::now()->addSeconds(15); 
  try {
     Mail::to($employer_email)->later($when, new ApproveJobPost($content));
  } catch (\Exception $e) {
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

    Session::flash('success','Done successfully');
    }else{
      return 'ID is required';
 }

 return redirect()->back();
 
}

public function TurnOfJob($id){
 // dd($id);
  if ($id) {
  $tag = Tag::find($id);
  $tag->delete = 0;
  $tag->status = 1;
  $tag->active = 1;
  $tag->awaiting_aproval = 0;
  $tag->draft = 0;
  $tag->save();
  }
 $content = [
  'tag' => $tag,
  'email_address' => $tag->email_address,
  'job_title' => $tag->job_title,
  ];

  $employer_email = $tag->email_address;

  $when = Carbon::now()->addSeconds(15); 
  try {
     Mail::to($employer_email)->later($when, new JobPostOffLine($content));
  } catch (\Exception $e) {
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

    Session::flash('success','Done successfully');
 return redirect()->back(); 
}

public function ExpireJob($id)
{
    if ($id) {
  $tag = Tag::find($id);
  $tag->delete = 0;
  $tag->status = 1;
  $tag->active = 2;
  $tag->awaiting_aproval = 0;
  $tag->draft = 0;
  }

 return redirect()->back(); 
}
public function MakeFeaturedJob($id)
{
 
    if ($id) {
  $tag = Tag::find($id);
  $tag->delete = 0;
  $tag->status = 1;
  $tag->active = 1;
  $tag->awaiting_aproval = 0;
  $tag->featured = 1;
  $tag->draft = 0;
$tag->save();
  }
Session::flash('success','Done successfully');
 return redirect()->back(); 
}

  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    {
    if ($id) {
    $tag = Tag::find($id);
    $tag->status = 3;
    $tag->delete = 1;
    $tag->save();
    Session::flash('success','Tag has been deleted successfully');
    }else{
    return 'ID is required';
    }
    return redirect()->route('tag.index')->withMessage('Tag Deleted'); #
    }



 
      // DB::table("tags")->where('id',$id)->delete();


       // DB::table('profession_metas')->insert([
       //          'name' => $profession->name,
       //          'display_name' => $profession->name,
       //          'status' => 1,
       //          'tag_id' => $id,
       //          'profession_id' => $profession->id,
       //          ]);


  // $profession_meta = ProfessionMeta::firstorNew(['name'=>$profession->name]);
  //       $profession_meta->staus = 1;
  //       $profession_meta->tag_id = $id;
  //       $profession_meta->$profession->id;
  //       $profession_meta->save();

}

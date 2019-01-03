<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Region;
use App\City;
use App\Profession;
use App\IndustryProfession;
use App\SortCategory;
use App\JobcareerLevel;
use App\WorkExperience;
use App\Industry;
use App\Tag;
use App\DocumentProfession;
use Auth;
use \Storage;
use Response;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Menu;
use App\EmployerPackage;
class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:admin');
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

 
public function allCandidates(Request $request){

       $dt = Carbon::now();
            $ddt = Carbon::now();

        $location = $request->location;
        $s = $request->input('s');
        $c = $request->input('c');
       // $users = 
        // $documents = Document::latest()
        // ->search($s)
        // ->paginate(20);

        //job_educations
     $documents = DB::table('documents')->where('black_list', 0)
            ->join('job_educations', 'job_educations.userid', '=', 'documents.user_id') 
             ->select('start_year', 'start_month', 'end_year', 'end_month', 'qualification', 'school_name', 'feild_of_study', 'country', 'userid', 'candidates_name', 'years_of_experience', 'city_id', 'region_id', 'nationality', 'gender', 'date_of_birth', 'age', 'email', 'phonenumber', 'availability', 'd_employment_term', 'educational_level','career_level', 'relocate_nationaly', 'minimum_salary','red', 'black', 'blue', 'green', 'yellow', 'documents.id', 'documents.user_id', 'documents.resume_id') 
             ->paginate(20);

     $documents3 = DB::table('documents')->where('black_list', 0)  
            ->join('work_experiences', 'work_experiences.userfk' , '=', 'documents.user_id')
            ->select('candidates_name', 'years_of_experience', 'city_id', 'region_id', 'nationality', 'gender', 'date_of_birth', 'age', 'email', 'phonenumber', 'availability', 'd_employment_term', 'educational_level',  'relocate_nationaly', 'minimum_salary','red', 'black', 'blue', 'green', 'yellow', 'documents.id', 'documents.user_id', 'start_year', 'start_month', 'end_year', 'end_month', 'position_title','company_name', 'country', 'responsibilities', 'userfk', 'resumefk', 'present', 'yoe', 'documents.id') 
                ->paginate(20);
        $industries = Industry::all();
        $professions = IndustryProfession::all();
        $countries = DB::table('countries')->get();
        $cities = City::all();
        $educational_levels = DB::table('qualification_levels')->get();
        // get all records
        $sort_categories_list = DB::table('sort_categories')->get();
        $educational_qualifications = DB::table('qualification_levels')->get();
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();
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
            $menus = $this->displayMenu();
            $units = $this->displayUnit();
   return view('candidate.all_candidates', compact('documents', 'industries', 'employement_terms', 'educational_qualifications', 'jobcareer_levels', 'professions', 's', 'cities', 'c', 'work_experiences', 'users', 'educational_levels', 'dt', 'ddt', 'countries', 'documents3', 'menus', 'units'), array('user' => Auth::user()));
}
public function filterbyCategory(Request $request){
    
        $s = $request->input('s');
        $users = User::all();
        $gender = $request->gender;
        $age = $request->age;
        $profession = $request->profession;
        $industry = $request->industry;
        $locations = $request->location;
        $job_type = $request->job_type; 
        $qualifications = $request->qualification;
        $availability = $request->availability;
        $salary = $request->salary;
        $career_level = $request->career_level;
        $yoe = $request->yoe;
        $employement_terms = $request->employement_terms;
        $job_terms = $request->job_terms;
        $check_section = 'check_section';
        $countries = DB::table('countries')->get();
        $resume_url = '/employer/candidate/resume/';
         //get age to be grouped
 $work_experiences = DB::table('work_experiences')
            ->join('documents', 'documents.resume_id', '=', 'work_experiences.resumefk')
            ->get();
$job_educations = DB::table('job_educations')
            ->join('documents', 'documents.resume_id', '=', 'job_educations.resume_id')
            ->select('job_educations.start_year', 'job_educations.end_month', 'job_educations.start_month', 'job_educations.end_month', 'job_educations.qualification', 'job_educations.school_name', 'job_educations.feild_of_study', 'job_educations.country', 'job_educations.userid', 'job_educations.resume_id')
            ->get();
 if ($request->has('gender') || $request->has('salary') || $request->has('availability') || $request->has('age') || $request->has('yoe')) {
  $documents_location = Document::where(function($query) use ($gender, $yoe, $locations, $qualifications,$employement_terms, $check_section, $age, $career_level, $job_terms, $availability, $salary, $industry){                                
                            if ($gender) {
                                    foreach ($gender as $gend) {
                                    $query->orWhere('black_list', 0)
                                    ->where('gender', '=', $gend);
                                    }
                            }

                                if (isset($salary)) {
                                                foreach ($salary as $key => $value) {
                                    $query->orWhere('black_list', 0)
                                            ->where('minimum_salary', '=', $value);
                                        }
                                }
                                if (isset($availability)) {
                                                foreach ($availability as $key => $value) {
                                    $query->orWhere('black_list', 0)
                                            ->where('availability', '=', $value);
                                        }
                                }
                                if (isset($yoe) &&  isset($salary)) {

                              //  foreach ($yoe as $key => $yeo) {

                                $split = explode("-", $yoe);
                                $start_year = $split[0];
                                $end_year = $split[1]; 
                                $query->orWhere('black_list', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year);
                                //} 
                                         foreach ($salary as $key => $value) {
                                    $query->orWhere('black_list', 0)
                                            ->where('minimum_salary', '=', $value);
                                        }
                              }elseif (isset($yoe)) {
                                  # code...
                            
                                $split = explode("-", $yoe);
                                $start_year = $split[0];
                                $end_year = $split[1]; 
                                $query->orWhere('black_list', 0)->where('years_of_experience', '>=', $start_year)->where('years_of_experience', '<=', $end_year);
                                //} 

                              }
                              if (isset($qualifications)) {
                                foreach ($qualifications as $key => $qualification) {
                                     $query->orWhere('black_list', 0)->where('educational_level', $qualification);
                                }
                              }

                 if (isset($age)) {
                $ages = explode("-", $age);
                $start_age = $ages[0];
                $end_age = $ages[1];    
             $query->orWhere('black_list', 0)->where('age', '>=', $start_age)->where('age', '<=', $end_age); 
                 }
      
  })->paginate(20);

       $documents = DB::table('documents')->where('black_list', 0)
            ->join('job_educations', 'job_educations.userid', '=', 'documents.user_id') 
             ->select('start_year', 'start_month', 'end_year', 'end_month', 'qualification', 'school_name', 'feild_of_study', 'country', 'userid', 'candidates_name', 'years_of_experience', 'city_id', 'region_id', 'nationality', 'gender', 'date_of_birth', 'age', 'email', 'phonenumber', 'availability', 'd_employment_term', 'educational_level','career_level', 'relocate_nationaly', 'minimum_salary','red', 'black', 'blue', 'green', 'yellow', 'documents.id', 'documents.user_id', 'documents.resume_id') 
             ->paginate(20);

//$documents_location = datatables()->query($documents_location)->toJson();
        $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'documents_location' => $documents_location, 's' =>$s, 'work_experiences' => $work_experiences, 'countries'=>$countries, 'job_educations' => $job_educations, 'resume_url' => $resume_url);
        return response()->json($response);
       }
       if ($request->has('gender')) {
        $documents_location = Document::where('gender', $gender)->paginate(20);
        $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'documents_location' => $documents_location, 's' =>$s, 'countries'=>$countries, 'job_educations' => $job_educations, 'resume_url' => $resume_url);
        return response()->json($response);
       }

    $cities = City::all();
        $educational_levels = DB::table('qualification_levels')->get();
        // get all records
        $sort_categories_list = DB::table('sort_categories')->get();
        $educational_qualifications = DB::table('qualification_levels')->get();
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();

$documents_location = Document::where('black_list', 0)->paginate(20);
         $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location,
        'work_experiences' => $work_experiences,
        'jobcareer_levels' => $jobcareer_levels,
        'employement_terms' => $employement_terms,
        'countries'=>$countries,
        'resume_url' => $resume_url,    
    );
return response()->json($response);
}

 public function index(Request $request)
    {
        $location = $request->location;
        $s = $request->input('s');
        $c = $request->input('c');
        $users = 
        $documents = Document::latest()
        ->search($s)
        ->paginate(20);

        $industries = Industry::all();
        $professions = IndustryProfession::all();
        $cities = City::all();
        $educational_levels = DB::table('educational_levels')->get();
        // get all records
        $sort_categories_list = DB::table('sort_categories')->get();
        $educational_qualifications = DB::table('educational_levels')->get();
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();
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
//dd($location);
            //get age from employees
            //get employee by Qualification
            //get employee by Experience
            // get employee by  location
            // get employee by Profession
            // get employee by job type

       return view('admin.document.index', compact('documents', 'industries', 'employement_terms', 'educational_qualifications', 'jobcareer_levels', 'professions', 's', 'cities', 'c', 'work_experiences', 'users', 'educational_levels'), array('user' => Auth::user()));
    }


    public function filterbyJobTitle(Request $request, Document $documents){
        $search_fields = ['position_title', 'company_name', 'responsibilities'];
        $search_terms = explode(' ', $request->get('job_title'));
        if ($request->get('job_title') && $request->get('candidate_city') && $request->get('profession')) {
          
        }

    $query = WorkExperience::query();

        foreach ($search_terms as $term) {
            $query->orWhere(function ($query) use ($search_fields, $term) {

                foreach ($search_fields as $field) {
                    $query->orWhere($field, 'LIKE', '%' . $term . '%');
                }
            });
        }
  $filtered = $query->get();

$q = Document::query();

$document_search_fields = ['candidates_name', 'city_id', 'nationality'];
        $terms = explode(" ", request('candidate_city'));
        foreach ($terms as $term) {
            $q->orWhere(function ($q) use ($document_search_fields, $term) {

                foreach ($document_search_fields as $field) {
                    $q->orWhere($field, 'LIKE', '%' . $term . '%');
                }
            });
        }  
    $documents = $q->get();
        $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',  
        'work_experiences' => $filtered,
        'documents' => $documents,
        // 'document_join_workexperience' =>$document_join_workexperience
    );
return response()->json($response);
}

    public function filter(Request $request, Document $user)
    {
        // 
      $user = $user->newQuery();
      if ($request->has('name')) {
        return $user->where('name', $request->input('name'))->get();
    }

    if ($request->has('managers')) {
    $user->whereHas('managers', function ($query) use ($request) {
        $query->whereIn('managers.name', $request->input('managers'));
    });
}
    }

    public function FindAge($age)
    {
          $age_group = DB::tabel('age_group')->get();

        foreach ($age_group as $key => $value) {
            if ($age === $value->age_range) { 
               $age = $value->age;
            } 
        }
        return $age;
    }

public function filterbyLocation(Request $request)
{
 
        $educational_levels = DB::table('educational_levels')->get();
        // get all records
        $sort_categories_list = DB::table('sort_categories')->get();
        $educational_qualifications = DB::table('educational_levels')->get();
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();
        $work_experiences = DB::table('work_experiences')->get();
        $location = $request->location;
        $job_type = $request->job_type;
        $age = $request->age;
        $availability = $request->availability;
        $salary = $request->salary;
        $gender = $request->gender;
 
 $documents_location = Document::where('city_id', $location)->orWhere('gender', $gender)->paginate(20); 
  
 if ($location !=null && $job_type !=null && $gender !=null && $salary !=null && $age !=null && $availability !=null) {
    $age = $this->FindAge($age);
 $documents_location = Document::where('city_id', $location)->orWhere('job_type',$job_type)->orWhere('gender', $gender)->paginate(20); 
 }else{

     //$documents_location = Document::where('city_id', $location)->paginate(20); 
 }
 
        
        $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => $work_experiences,
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location,
        'job_type' => $job_type
    );
return response()->json($response);
 
}

public function filterbyJobType(Request $request)
{
        $users = User::all();
        $location = $request->location;
        $job_type = $request->job_type;
        $availability = $request->availability;
         //get age to be grouped
        $age = $this->FindAge($age);
 if ($location !=null && $job_type !=null && $gender !=null && $salary !=null && $age !=null && $availability !=null) {
        $documents_location = Document::where('city_id', $location)->orWhere('job_type',$job_type)->paginate(20); 
    }

         $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location

    );
return response()->json($response);
    # code...
}

public function filterbyGenderAndOthers(Request $request)
{
        $users = User::all();
        $location = $request->location;
        $job_type = $request->job_type;
        $gender = $request->gender;
        $availability = $request->availability;
        $age = $request->age;
         //get age to be grouped
        if ($age !=null) {
          $age = $this->FindAge($age);
        }
        if ($location !=null && $job_type !=null && $gender !=null && $salary !=null && $age !=null && $availability !=null) {

        $documents_location = DB::table('documents')->where('city_id', $location)->where('job_type', $job_type)->get();
    }
        $documents_location = Document::where('gender', $gender)->paginate(20);
         
         $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location

    );
return response()->json($response);
    # code...
}
public function getcandidatesByIndustryAndOthers(Request $request)
{
        $users = User::all();
        $gender = $request->gender;
        $age = $request->age;
        $job_function = $request->job_function;
        $industry = $request->industry;
        $location = $request->location;
        $job_type = $request->job_type;
        $years_of_experience = $request->years_of_experience;
        $qualification = $request->qualification;
        $salary = $request->salary;
        $availability = $request->availability;

         //get age to be grouped
             if ($age !=null) {
          $age = $this->FindAge($age);
        }
        // get candidates by industry 
        $user_industry = DB::table('user_industryies')->where('industry_id', $industry)->get();
         if ($location !=null && $job_type !=null && $gender !=null && $salary !=null && $age !=null && $availability !=null) {
        $documents_location = Document::where('city_id', $location)->orWhere('gender', $gender)->orWhere('job_type',$job_type)->paginate(20);
    }
 
        $response = array(
        'status' => 'success',
        'msg' => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location,
        'user_industry' => $user_industry
    );
return response()->json($response);
}

//getcandidatesByAvalilabilityAndOthers
public function getcandidatesBySalaryAndOthers(Request $request)
{
        $users = User::all();
        $gender = $request->gender;
        $age = $request->age;
        $job_function = $request->job_function;
        $industry = $request->industry;
        $location = $request->location;
        $job_type = $request->job_type;
        $years_of_experience = $request->years_of_experience;
        $qualification = $request->qualification;
        $salary = $request->salary;
        $availability = $request->availability;

         //get age to be grouped
        if ($age !=null) {
          $age = $this->FindAge($age);
        }
       
    if ($location !=null && $job_type !=null && $gender !=null && $salary !=null && $age !=null && $availability !=null && $industry !=null && $job_function !=null && $years_of_experience !=null && $qualification !=null ) {
$documents_location = Document::where('city_id', $location)->orWhere('job_type', $job_type)->orWhere('availability', $availability)->orWhere('gender', $gender)->orWhere('minimum_salary', $salary)->paginate(20);
        }elseif ($location !=null && $job_type !=null && $gender !=null && $salary !=null && $age !=null && $availability !=null  && $years_of_experience !=null && $qualification !=null) {
$documents_location = Document::where('city_id', $location)->orWhere('job_type', $job_type)->orWhere('gender', $gender)->orWhere('availability', $availability)->orWhere('years_of_experience', $years_of_experience)->orWhere('minimum_salary', $salary)->paginate(20);
        }else{

            $documents_location = Document::where('minimum_salary', $salary)->paginate(20);
        }

        $response = array(
        'status' => 'success',
        'msg' => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location
    );
return response()->json($response);
}

public function getcandidatesByAgeAndOthers(Request $request)
{
        $users = User::all();
        $gender = $request->gender;
        $age = $request->age;
        $job_function = $request->job_function;
        $industry = $request->industry;
        $location = $request->location;
        $job_type = $request->job_type;
        $years_of_experience = $request->years_of_experience;
        $qualification = $request->qualification;
        $salary = $request->salary;
        $availability = $request->availability;

         //get age to be grouped
         if ($age !=null) {
          $age = $this->FindAge($age);
        }

        // get age_group table
        $documents_location = Document::where('city_id', $location)->orWhere('gender', $gender)->orWhere('minimum_salary', $salary)->orWhere('age', $age)->orWhere('job_type', $job_type)->orWhere('availability', $availability)->paginate(20);
 
        $response = array(
        'status' => 'success',
        'msg' => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location,
        'user_industry' => $user_industry
    );
return response()->json($response);
}

public function getcandidatesByAvalilabilityAndOthers(Request $request)
{
        $users = User::all();
        $gender = $request->gender;
        $age = $request->age;
        $job_function = $request->job_function;
        $industry = $request->industry;
        $location = $request->location;
        $job_type = $request->job_type;
        $years_of_experience = $request->years_of_experience;
        $qualification = $request->qualification;
        $salary = $request->salary;
        $availability = $request->availability;

         //get age to be grouped
               if ($age !=null) {
          $age = $this->FindAge($age);
        }
        $documents_location = Document::where('city_id', $location)->orWhere('gender', $gender)->orWhere('minimum_salary', $salary)->orWhere('age', $age)->orWhere('job_type', $job_type)->orWhere('availability', $availability)->paginate(20);
         $response = array(
        'status' => 'success',
        'msg' => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location,
        'user_industry' => $user_industry
    );
return response()->json($response);
}

public function getcandidatesByYearsOfExperience(Request $request)
{
        $users = User::all();
        $gender = $request->gender;
        $age = $request->age;
        $job_function = $request->job_function;
        $industry = $request->industry;
        $location = $request->location;
        $job_type = $request->job_type;
        $years_of_experience = $request->years_of_experience;
        $qualification = $request->qualification;
        $salary = $request->salary;
        $availability = $request->availability;
        $yearsofexperience = $request->yearsofexperience;

         //get age to be grouped
           if ($age !=null) {
          $age = $this->FindAge($age);
        }
        $documents_location = Document::where('city_id', $location)->orWhere('gender', $gender)->orWhere('minimum_salary', $salary)->orWhere('age', $age)->orWhere('job_type', $job_type)->orWhere('availability', $availability)->orWhere('years_of_experience', $yearsofexperience)->paginate(20);
 
        $response = array(
        'status' => 'success',
        'msg' => 'Setting created successfully',
        'documents' => 'documents',
        'industries' => 'industries',
        'employement_terms' => 'employement_terms',
        'educational_qualifications' => 'educational_qualifications',
        'jobcareer_levels' => 'jobcareer_levels',
        'professions' => 'professions',
        'cities' => 'cities',
        'work_experiences' => 'work_experiences',
        'users' => 'users',
        'educational_levels' => 'educational_levels',
        'documents_location' => $documents_location,
        'user_industry' => $user_industry
    );
return response()->json($response);
}
//
public function ViewSingleDocument($id)
    {
            if ($id) {
                $document = Document::find($id);
            }
        
     return view('admin.document.viewSingleDocument', compact(['document', 's', 'professions', 'cities']), array('user' => Auth::user()));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        $cities = City::all();
        $aop = Profession::all();
    return view('admin.document.create', compact(['regions', 'cities', 'aop']), array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// now job applications will be done inside ResumeController
// the reason is applicants now have thier profile on the platform
// so all they need to do is login and click on apply to 

// the platform will get the ID of the selected Resume
// 

 if (Auth::check()) {
  $user = Auth::user();
    // The user is logged in...
}else{
return redirect()->reoute('/login');

}
if ($this->uploadIsValid($request)) {
         // validate
        $this->validate($request, [
                'candidates_name' => 'required',
                'years_of_experience' => 'required',
                'location' => 'required',
                'region' => 'required',
            ]);
       //access to the file
        $file = $request->file('file');
   
        // set document types
         $allowedFileTypes = config('app.allowedFileTypes');
         $maxFileSize = config('app.maxFileSize');
         $rules = [
            'file' => 'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
        ];
        $this->validate($request, $rules);

        $fileName = $file->getClientOriginalName();
        $uploaded = Storage::cloud()->put($fileName, file_get_contents($file->getRealPath()));
   
        if ($uploaded) {
        $indocument = new Document;
        $indocument->candidates_name = $request->candidates_name;
        $indocument->years_of_experience = $request->years_of_experience;
        $indocument->city_id = $request->location;
        $indocument->region_id = $request->region;
        $profession=$request->profession;
try{
        DB::transaction(function () use ($indocument, $fileName, $profession)  {
 
            $indocument->save();
 
       if ($indocument) {
             // DB::table("documents")->where('id',$id)
        $indocument = Document::find($indocument->id);
        $indocument->cv_file=$fileName;
        $indocument->save();
 
        // map profession to candidate
        foreach ($profession as $key => $value) {
          
            $indocument->professions()->attach($value);
        }
    }

     });

     } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Can not locate Drive!');
       return redirect()->back()
          ->withErrors(['error' => $e->getMessage()]);
     
    }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', $fileName .'CV Uploaded successfully!');
        }else{
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'There was an error Error!');

            return 'There was an error Error!';
        }
    }
    else{
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'There was an error Error!');
    }  
        return redirect()->route('document.index');
    }



    public function getFile(Request $request)
    {
        // dd($request->all());

    $filename = $request->cv_file;
    if ($filename) {

    $dir = '/';
    $recursive = false; // Get subdirectories also?
     try{

    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); 

        if ($file) {
          $rawData = Storage::cloud()->get($file['path']);
        }else{
            return 'File Dose not Exist on Google Drive';
        }
     
     } catch (\Exception $e) {
       return redirect()->back()
          ->withErrors(['error' => $e->getMessage()]);
    }
        
    // there can be duplicate file names! 
 return Response::make($rawData, 200)
    ->header('ContentType', $file['mimetype'])  
    ->header('Content-Disposition', "attachment; filename='$filename'");
            }
    return view('document.index');
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
         $value = $request->session()->get('key');

        return view('document.show',compact('document') , array('user' => Auth::user())); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id){
        $document=Document::find($id);
        $regions = Region::all();
        $cities = City::all();
        $aop = Profession::all();
    }else{
      return 'ID MUST BE AVAILABLE';
    }
      return view('admin.document.edit',compact(['document', 'aop', 'regions', 'cities']), array('user' => Auth::user())); 
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
                   // dd($request->all());
        $this->validate($request, [
                'candidates_name' => 'required',
                'years_of_experience' => 'required',
                'location' => 'required',
                'region' => 'required',
            ]);

            $file = $request->file('file');
    if ($file) {

    if ($this->uploadIsValid($request)) {

        $allowedFileTypes = config('app.allowedFileTypes');
         $maxFileSize = config('app.maxFileSize');
         $rules = [
            'file' => 'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
        ];
        $this->validate($request, $rules);

        $fileName = $file->getClientOriginalName();
        $uploaded = Storage::cloud()->put($fileName, file_get_contents($file->getRealPath()));
   try{ 
        if ($id) {
            $updocument = Document::find($id);

            $updocument->candidates_name=$request->candidates_name;
            $updocument->years_of_experience=$request->years_of_experience;
            $updocument->city_id=$request->location;
            $updocument->region_id=$request->region;
            $updocument->save();
             $dds =  $request->profession;
        
        DB::transaction(function () use ($updocument, $fileName, $dds, $id)  {
        //add cv metadata to database 

       if ($updocument) {
             // find the instance of the record you want to modify
        $updocument = Document::find($updocument->id);
        $updocument->cv_file=$fileName;
        $updocument->save();
 
        // map profession to candidate
        DB::table('document_profession')->where('document_id',$id)->delete();
        // add Update
          
        // dd($dds);
        foreach ($dds as $key => $value) {
 
             $updocument->professions()->attach($value);
             
            }
    }

     });
    }

     } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Can not locate Drive!');
       return redirect()->back()
          ->withErrors(['error' => $e->getMessage()]);
     
    }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', $fileName .'CV Uploaded successfully!');
        }else{
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'There was an error Error!');

            return 'There was an error Error!';
        }
    }else{
        
 
        if ($id) {
            $document = Document::find($id);

            $document->candidates_name=$request->candidates_name;
            $document->years_of_experience=$request->years_of_experience;
            $document->city_id=$request->location;
            $document->region_id=$request->region;
 
            $document->save(); 
            DB::table('document_profession')->where('document_id',$id)->delete();
 
           $dds =  $request->profession;
      
        foreach ($dds as $key => $value) {
 
             $document->professions()->attach($value);
             
            }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'CV Updated successfully!');

    }
 
}
    return redirect()->route('document.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("documents")->where('id',$id)->delete();
        Session::flash('success','Document has been deleted successfully');
       return redirect()->route('document.index')->withMessage('Document Deleted');
    }

    // view for upload cv
    public function show_upload(Request $request)
    {
        $directory = config('app.fileDestinationPath');
        $files = Storage::files($directory);

        return view('admin.document.uploadcv', array('user' => Auth::user()))->with(array('files' => $files));
    }

    public function uploadIsValid($request)
    {
        if ($request->file('file')) {
            // dd($request->all());
        foreach ($request->file('file') as $file) {
 
            if (!$file->isValid()) {
                return false;
            }
        }
    }
    return true;
}
    // upload files here
    public function handleUploadcv(Request $request, $id){
        
        // dd($request->all());
    // if ($this->uploadIsValid($request)) {
    if ($request->file('file')) {
    //access to the file
    $file = $request->file('file');

    // set document types
     $allowedFileTypes = config('app.allowedFileTypes');
     $maxFileSize = config('app.maxFileSize');
     $rules = [
        'file' => 'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
    ];
    $this->validate($request, $rules);
    // dd($request->file('file'));
    //get the file name getClientOriginalName

    $fileName = $file->getClientOriginalName();
    $destinationPath = config('app.fileDestinationPath').'/'.$fileName;

    // get the content of the file and store in destinationPath
   // $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

    $uploaded = Storage::disk('google')->put($fileName, file_get_contents($file->getRealPath()));

    if ($uploaded) {
        $document=Document::find($id);
        $document->cv_file=$fileName;
        $document->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'File Uploaded successfully!');

   } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'There was an error Error!');
    }
}
    return redirect()->route('document.uploadcv');
   }

public function search(Request $request) {
  // dd($request->all());
        $locations= $request;
        $documents = Document::all();
        $regions = Region::all();
        $cities = City::all();
        $aop = Profession::all();

        return view('admin.document.search', compact(['regions', 'cities', 'aop', 'documents', 'locations']), array('user' => Auth::user()));
   }

public function custom_search(Request $request) {
        $regions = Region::all();
        $cities = City::all();
        $aop = Profession::all();
        $documents = Document::latest()->paginate(20)->search($s);
        return view('admin.document.custom_search', compact(['regions', 'cities', 'aop', 's']), array('user' => Auth::user()));
   }

public function post_search(Request $request) {
        // dd($request->all());
        $s = $request->input('s');
        $cities = City::all();
        $regions = Region::all();
        $aop = Profession::all();
        $documents = Document::latest()->search($s)->paginate(20);

        return redirect()->route('document.search_category', compact(['documents','regions', 'cities', 'aop', 's']), array('user' => Auth::user()));
   }

    public function searchDocumentByRegionAndProfessionAndYearsOfExperience(Request $request) {
    
    /*
    setp 1: get city, years of experience and profession the from request
    setp 2: goto document_professions table to find the candidates with the following profession
    step 3: 
    user can search by Employee
    */  
        $city= $request->city;
        $region = $request->region;
        $location = $request->location;
        $professionsList = $request->profession;
        $years_of_experience = $request->years_of_experience;
        $tag = $request->tag;
       

       if ($request->tag) {
        // get records from Tag Table
        $tag_record = Tag::find($tag);
       // dd($tag_record);

        // get record from ProfessionMeta Table
      $get_profession_meta = DB::table('profession_metas')->where('tag_id',$tag)->get();
         foreach ($get_profession_meta as $key => $value) {  
               $profession_name = Profession::find($value->profession_id)->name;

         } 

         // get default city

           $locations = DB::table('cities')->where('name', 'Others')->get();
          // dd($locations);

        foreach ($locations as $key => $location) {
          $location_id = $location->id;
      
        }

        $city_name = City::find($location_id)->name;

        // dd($newProfession);
        $documents = DB::table('documents')->where('tag_fk', $tag)->get();

        $document_profession = DB::table('document_profession')->get();

        $cities = City::all();
        $regions = Region::all();
        $professionsList = Profession::all();
        $tags = Tag::all();


    return view('admin.document.search', compact(['documents','city', 'regions', 'cities', 'professionsList', 's' , 'years_of_experience', 'document_profession','tags' , 'profession_name', 'city_name']), array('user' => Auth::user()));
        dd('tag');
       
        }elseif ($city || $region || $location || $professionsList || $years_of_experience) {
            # code...
         
        foreach ($professionsList as $key => $profession) {
           $profession = $profession;
               
        }

        $profession_name = Profession::find($profession)->name;

        $locations = DB::table('cities')->where('name', $location)->get();

        foreach ($locations as $key => $location) {
          $location_id = $location->id;
      
        }
        $city_name = City::find($location_id)->name;
            $s = '';
         // $documents = Document::search($s)->paginate(20);
            // $documents = Document::all();
        $documents = DB::table('documents')->where('years_of_experience', $years_of_experience)
                                        ->where('region_id', $region)->where('city_id', $location_id)->get();
        $document_profession = DB::table('document_profession')->get();
        $cities = City::all();
        $regions = Region::all();
        $professionsList = Profession::all();
       }else{     
        return redirect()->back();
       }
       // dd($documents);
    return view('admin.document.search', compact(['documents','city', 'regions', 'cities', 'professionsList', 's' , 'years_of_experience', 'document_profession', 'profession_name', 'city_name']), array('user' => Auth::user()));
   }
/*
this method displays the search at first time
*/
    public function show_search(Request $request) {      
        $years_of_experience = '';
        $s = $request->input('s');
        $cities = City::all();
        $regions = Region::all();
        $aop = Profession::all();
        $documents = Document::latest()->search($s)->paginate(20);
        // add search by TAG here
        $tags = Tag::all();
    return view('admin.document.search_category', compact(['documents','city', 'tags' ,'regions', 'cities', 'aop', 's', 'years_of_experience']), array('user' => Auth::user()));
   }

   // filter by city; get all candidates that belongs to a city
    public function view_filter_by_city(Request $request)
    {
        if ($request) {
         $location = $request->locations;      
    // It has valid data
        $location = City::find($location);
        $cities = City::all();
        }else{
        return redirect()->back()->withErrors(['error' => 'canot find city']);
        }
         //find candidates by city
        return view('admin.document.filter_by_city', compact(['location', 'cities']), array('user' => Auth::user()));
    }

    public function searchCandidatesByCity(Request $request)
    {
         $location = $request->location;
          // get a specific Loaction by ID
         $locations = City::find($location);
      return redirect()->route('document.filter_by_city', compact('locations'));
    }
    public function search_category()
    {
        return view('admin.document.search_category');
    }


     public function document_search(Request $request) {
          $location = $request->location;
          // get a specific Loaction by ID
          $locations = City::find($location);
          return redirect()->route('document.search_category', compact('locations'));
       }
    public function show_profession()
    {
    return view('admin.document.filter_by_professions',   array('user' => Auth::user()));
    }
    public function view_filter_by_professions(Request $request)
    {
       $aop = $request->aop;
        // get the size of the array
        $max = sizeof($aop);
        // loop through and find each item
        for ($i=0; $i < $max ; $i++) {         
         $professions = Profession::find($aop); 
    }
    return view('admin.document.filter_by_professions', compact(['aop', 'professions', 'documents']), array('user' => Auth::user()));
    }

    public function searchCandidatesByProfession(Request $request)
    {   
        $aop = $request->profession;  
      return redirect()->route('document.filter_by_professions', compact(['aop']));
    }

    // filter by Years of Experience

    public function searchCandidatesByYearsOfExperience(Request $request)
    {
         
        $location = $request->location;
          // get a specific Loaction by ID
        $yoe = $request->yoe;
        $documents = Document::where('years_of_experience', '=', $yoe);

      return redirect()->route('document.filter_by_yoe', array('documents' =>$documents));
    }

   public function view_filter_by_years(Request $request)
    {
        dd($request->all());
          $yoe = $request->yoe;
        // dd($yoe);
        $documents = Document::where('years_of_experience', '=', $yoe);
         //find candidates by city
        return view('admin.document.filter_by_yoe', compact(['documents']), array('user' => Auth::user()));
    }

    public function view_filter_by_region(Request $request)
    {
    // dd($request->region);
       return view('admin.document.filter_by_region');
    }

    public function search_filter_by_region(Request $request)
    {    
         $region = $request->region;
       return redirect()->route('document.filter_by_region', compact('region'));
    }

     public function showFormCSV()
    {
        # code...
        return view('admin.document.uploadfromcsv',  array('user' => Auth::user()));
    }

    public function importFromCSV(Request $request)
    {

        $this->validate($request, [
            'upload-file' => 'required']);
        //get file
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        $header= fgetcsv($file);
          $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[ ]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        // dd($header);
        //looping through othe columns
        while($columns=fgetcsv($file))
        {

            if($columns[0]=="")
            {
                continue;
            } 
        // dd($columns);

            //trim data
            foreach ($columns as $key => &$value) {
                $value=preg_replace('//','',$value);
            }   
           $data= array_combine($escapedHeader, $columns);
            $candidates_name=title_case($data['candidates_name']);

            $years_of_experience=$data['years_of_experience'];
            $cv_file=$data['cv_file'];
            $city_id=$data['city_id'];
            $region_id=$data['region_id'];
            $profession_id=$data['profession_id'];
    try{
        DB::transaction(function () use ($request, $candidates_name, $years_of_experience, $cv_file, $city_id, $region_id, $profession_id)  {
  // Table update
           $document = Document::firstOrNew(['candidates_name'=>$candidates_name]);
           $document->years_of_experience=$years_of_experience;
           $document->cv_file=$cv_file;
           $document->city_id=$city_id;
           $document->region_id=$region_id;
           $document->save();
           // $findDoc = Document::find($document->id);
           $profession = (int)$profession_id;
           // dd($profession_id);
      DB::table('document_profession')->where('document_id',$document)->delete();
        // dd($done); 
        $document->professions()->attach($profession);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Records Uploaded successfully!');
          
     });

     } catch (\Exception $e) {
       // return redirect()->back()
       //    ->withErrors(['error' => $e->getMessage()]);
    }
    }

 return redirect()->route('document.index');
    }
   public function importCandidatesFromCSV(Request $request)
    {
        $this->validate($request, [
            'upload-file' => 'required']);
        //get file
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        $header= fgetcsv($file);
          $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[ ]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        // dd($header);
        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            } 
        // dd($columns);
            //trim data
            foreach ($columns as $key => &$value) {
                $value=preg_replace('//','',$value);
            }   
           $data= array_combine($escapedHeader, $columns);
            $candidates_name=title_case($data['candidates_name']);

            $years_of_experience=$data['years_of_experience'];
            $cv_file=$data['cv_file'];
            $city_id=$data['city_id'];
            $region_id=$data['region_id'];
            $profession_id=$data['profession_id'];
    try{
        DB::transaction(function () use ($request, $candidates_name, $years_of_experience, $cv_file, $city_id, $region_id, $profession_id)  {
  // Table update
           $document = Document::firstOrNew(['candidates_name'=>$candidates_name]);
           $document->years_of_experience=$years_of_experience;
           $document->cv_file=$cv_file;
           $document->city_id=$city_id;
           $document->region_id=$region_id;
           $document->save();
           // $findDoc = Document::find($document->id);
           $profession = (int)$profession_id;
           // dd($profession_id);
      DB::table('document_profession')->where('document_id',$document)->delete();
        // dd($done); 
        $document->professions()->attach($profession);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Records Uploaded successfully!');
          
     });

     } catch (\Exception $e) {
       // return redirect()->back()
       //    ->withErrors(['error' => $e->getMessage()]);
    }
    }

 return redirect()->route('document.index');
    }
    public function BlackListCV($id) {
        try {
            if ($id) {
                $document = Document::find($id);
                $document->black_list = 1;
                $document->save();
                # code...
            }

        } catch (Exception $e) {
              return redirect()->back()
          ->withErrors(['error' => $e->getMessage()]);
        }
         return redirect()->back()->with(['success' => 'CV Blacklisted successfully']);
    }
}

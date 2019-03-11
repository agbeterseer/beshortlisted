<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecruitResume;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Input;
use Validator;
use App\Document;
use App\CareerSummary;
use App\JobSkill;
use App\Country;
use App\JobEducation;
use App\RecruitYear;
use App\Qualification;
use App\JobcareerLevel;
use App\WorkExperience;
use App\Industry;
use App\User;
use App\JobCertification;
use App\PersonalInformation;
use App\ResumeBuilder;
use App\Award;
use App\Section;
use App\UserIndustry;
use App\UserProfession;
use App\Tag;
use App\City;
use App\Region;
use App\Application;
use App\JobAssessmentAnswer;
use App\IndustryProfession;
use App\QualificationLevel;
use PDF;
use App\Referee;
use App\Menu;
use App\EmployerPackage;
use App\JobMatch;
use App\RecruitProfilePix;
use App\ControlApplication;
class ResumeController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:superuser')->only('create');
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
    public function displayUnits()
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
        $resume_templates = DB::table('resume_builders')->get();
        $menus = $this->displayMenu();
    return view('admin.resume.index', compact('resume_templates', 'menus'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $menus = $this->displayMenu();
        return view('admin.resume.create' , compact('menus'), array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
        $name = $request->name;
        $display_name = $request->display_name;
        $description = $request->description;
        $resume_template = $request->resume_template;
        $category = $request->category;
        $url_link = $request->url_link;

        $resume_template = $request->file('resume_template');
  try {
    //  $rules = [
    //     'name'=>'required|string|max:55',
    //     'display_name' =>'required|string|max:55',
    //     ];

    //     $input = Input::only(
    //     'resume_template',
    //     'display_name',
    //     'description',
    //     'name',
    //     'category'
    // );
     
    //     $validator = Validator::make($input, $rules);

    //      if(!$validator)
    //     {
    //         return Redirect::back()->withInput()->withErrors($validator);
    //     }


        if ($request->hasFile('resume_template')) {
        $resume_template = $request->file('resume_template');
        $rules = [
        '_token'=>'required',
        'resume_template' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'resume_template',
        'display_name',
        'description',
        'name',
        'category'

        );
        $validator = Validator::make($input, $rules);
   
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
            // $fileName = $file->getClientOriginalName();
            // $file->move(public_path('hivPolicy'), $fileName);

            //$avatar = $request->file('avatar');
            $filename = time() . '.' . $resume_template->getClientOriginalExtension();
            $resume_template->move(public_path('/uploads/ResumeTemplates/'), $filename);

            $rbuilder = new ResumeBuilder;
            $rbuilder->name = $name;
            $rbuilder->display_name = $display_name;
            $rbuilder->description = $description;
            $rbuilder->status = 1; 
            $rbuilder->created_at = $this->returnCurrentTime();
            $rbuilder->category = $category;
            $rbuilder->template_link = $filename;
            $rbuilder->url = $url_link;
            $rbuilder->save();
             Session::flash('success', 'Done successfully');

    return redirect()->back()->with('done', 'Done successfully');
    }
      } catch (\Exception $e) {
        Session::flash('error-avatar', $e->getMessage());
      }
 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  
        $resume_builder = ResumeBuilder::findOrFail($id);
        $menus = $this->displayMenu();


        return view('admin.resume.show', compact('resume_builder', 'menus'), array('user' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd($id);
        $resume_builder = ResumeBuilder::findOrFail($id);

        return view('admin.resume.edit', compact('resume_builder'), array('user' => Auth::user()));
    }

    public function showImageForm(){
      $user = Auth::user();
            if (Auth::check()) {
      
       $profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
            } 

        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        $pr_caption= RecruitResume::where('user_id', $user->id)->where('status',1)->first();
        // fresh user test pass
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
       $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count(); 
          $job_category_list = $this->GetJobcategory();
          $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
               $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();  
               $menus = $this->displayMenu(); 
        return view('candidate.display_profile_pix', compact('user', 'profile_pix_list', 'profile_pix', 'resumes', 'job_by_candidate_list', 'cities', 'tags', 'job_category_list','section_candidatelist_count', 'section_candidatelist', 'menus', 'pr_caption'), array('user' => Auth::user()));
    }

 public function UpdateCandidatesLogo(Request $request){
         $user_id = $request->id;
         $user = Auth::user();
        try {

        $avatar = $request->file('avatar');
        $rules = [
        '_token'=>'required',
        'avatar' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'avatar'
        );
      
        $validator = Validator::make($input, $rules);

         
     
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
      } catch (\Exception $e) {
        Session::flash('error-avatar', $e->getMessage());
      }
    //dd($request->all());
    if ($request->hasFile('avatar')) {

      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
  
   $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('user_id', $user->id)->get();
    foreach ($recruit_profile_pix as $key => $value) {
    $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('user_id', $user->id)->update(['status'=> 0, 'order'=> 0]);
           }
    $recruit_profile_pix = DB::table('recruit_profile_pixs')->insert(['user_id' => $user_id, 'pix' => $filename, 'order' => 1, 'status' => 1, 'created_at'=>$this->returnCurrentTime()]);

         Session::flash('success-avatar','Image Change successfully');
     \LogActivity::addToLog(Auth::user()->firstname .' Has Changed Picture.');
           return redirect()->back();
    }

 
        return redirect()->back();
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
    
        $name = $request->name;
        $display_name = $request->display_name;
        $description = $request->description;
        $resume_template = $request->resume_template;
        $category = $request->category;
        $url_link = $request->url_link;

        $resume_template = $request->file('resume_template');
  try {
     $rules = [
        'name'=>'required|string|max:55',
        'display_name' =>'required|string|max:55',
        'description'=> 'required|string|max:55',
        'category' => 'required|string|max:55',
        'url_link' => 'required',
        ];

        $input = Input::only( 
        'description',
        'name',
        'category',
        'display_name',
        'url_link'
    );
        $validator = Validator::make($input, $rules);
         if(!$validator)
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if ($request->hasFile('resume_template') ) {
        $resume_template = $request->file('resume_template');
        $rules = [
        '_token'=>'required',
        'resume_template' =>'required|jpg,jpeg,png,gif|max:381872',
        ];
        $input = Input::only(
        '_token',
        'resume_template'
        );
        $validator = Validator::make($input, $rules);
        if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
           $filename = time() . '.' . $resume_template->getClientOriginalExtension();
            $resume_template->move(public_path('/uploads/ResumeTemplates/'), $filename);
  if ($id) {
             $rbuilder = ResumeBuilder::findOrFail($id);
            $rbuilder->name = $name;
            $rbuilder->display_name = $display_name;
            $rbuilder->description = $description;
            $rbuilder->status = 1; 
            $rbuilder->updated_at = $this->returnCurrentTime();
            $rbuilder->category = $category;
            $rbuilder->template_link = $filename;
            $rbuilder->url = $url_link;
            $rbuilder->save();
             Session::flash('success', 'Done successfully');
  }
return redirect()->back()->with('done', 'Done successfully');
    }else{

    if ($id) {
             $rbuilder = ResumeBuilder::findOrFail($id);
               
            $rbuilder->name = $name;
            $rbuilder->display_name = $display_name;
            $rbuilder->description = $description;
            $rbuilder->status = 1; 
            $rbuilder->updated_at = $this->returnCurrentTime();
            $rbuilder->category = $category; 
            $rbuilder->save();
  
  Session::flash('success', 'Done successfully');
              //dd($rbuilder);
  }
return redirect()->back()->with('done', 'Done successfully');
    }

      } catch (\Exception $e) {
        Session::flash('error-avatar', $e->getMessage());
      }
        // dd($request->all());
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
        if ($id) {
       DB::table("resume_builders")->where('id',$id)->delete();
       Session::flash('success','deleted successfully');
         }else{
            return 'ID is required';
        }
    return redirect()->back(); 
    }
    public function AllResume()
    {
       $all = RecruitResume::all();
       return $all;
    }

    public function GetResumeByID()
    {
 
        $user = Auth::user();
        $resume_by_user = DB::table('recruit_resumes')->where('user_id', $user->id)->get();
        return $resume_by_user;
    }
    public function ShowCaptionForm(){

    $user = Auth::user();
    $recruit_resume = RecruitResume::where('user_id', $user->id)->first();
     
    // check if user has default avatar.


    //dd($recruit_resume);
    if ($recruit_resume === null) {
        $recruit_resume = 'default';
    }else{
        $recruit_resume = $recruit_resume;
    }

 // check if resume id exist 
 // return a des
    $menus = $this->displayMenu();
    return view('candidate.create_resume', compact('recruit_resume', 'menus'), array('user' => Auth::user()));
    }
    public function AddCaption(Request $request)
    {
        /*
            This method is writen to save resume plus caption
            Test case: check for null values,  bbbcc  vb 
        */
        //GET current user
        $user = Auth::user();
        $name = $request->name;
        $old_id = $request->old_name;

        // dd($old_id);
        try {

        if ($name !=null && $name !='') {

        //      //change resume status to 0 by user ID
            if ($this->GetResumeByID()) {
       
            foreach ($this->GetResumeByID() as  $value) {
                $recruit_resumes = DB::table('recruit_resumes')->where('id',$value->id)->update(['status' => 0]);
                # code...
            }
        }
            // dd($request->all());
            // create a new instance / new record of a resume
            // set this new record to be the latest and active for selection
            // $recruit_resumes = RecruitResume::where('id', $old_id)->where('user_id', $user->id)->where('status', 1)->update(['status' => 0]);

            $resume_record = new RecruitResume;
            $resume_record->pr_caption = $name;
            $resume_record->user_id = Auth::user()->id;
            $resume_record->status = 1;
            $resume_record->order = 1;
            $resume_record->created_at = $this->returnCurrentTime();
            $resume_record->save();
   
            if ($old_id != 'default') {
                    $get_previous_rec = Document::where('user_id',$user->id)->where('resume_id', $old_id->id)->first();
                 //dd($get_previous_rec);
                    if ($get_previous_rec) {

                    $document = new Document;
                    $document->candidates_name = $get_previous_rec->candidates_name;
                    $document->user_id = $user->id;
                    $document->resume_id = $resume_record->id;
                    $document->gender = $get_previous_rec->gender;
                    $document->date_of_birth = $get_previous_rec->date_of_birth;
                    $document->nationality = $get_previous_rec->nationality;
                    $document->email = $get_previous_rec->email;
                    $document->educational_level = $get_previous_rec->educational_level;
                    $document->career_level = $get_previous_rec->career_level;
                    $document->minimum_salary = $get_previous_rec->minimum_salary;
                    $document->availability = $get_previous_rec->availability;
                    $document->d_employment_term = $get_previous_rec->d_employment_term;
                    $document->relocate_nationaly = $get_previous_rec->relocate_nationaly;
                    $document->age = $get_previous_rec->age;
                    $document->yoe_range = $get_previous_rec->yoe_range;
                    $document->save();

                    } 
            } 
    $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->first();
    //dd($user_single_resume_by_date);
    return redirect()->route('get.resume', $user_single_resume_by_date->id);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
        }
        } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', $e->getMessage());
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
        return redirect()->back();
    }
    
    public function UpdateCaption(Request $request)
    {
        /*
            This method is writen to save resume plus caption
            Test case: check for null values,  bbbcc  vb 
        */
        //recruit_resumes

            $resume_id = $request->resume;
        $name = $request->name;

        try {
        //dd($request->all());
        if ($resume_id !=null && $resume_id !='') {

            $resume = RecruitResume::findOrFail($resume_id);
            $resume->pr_caption = $name;
            $resume->user_id = Auth::user()->id;
            $resume->status = 1;
            $resume->order = 1;
            $resume->updated_at = $this->returnCurrentTime();
            $resume->save(); 
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
        }
        } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Can not locate Drive!');
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
        return redirect()->back();
    }
public function DeleteResume($id)
{
 return redirect()->back();
}
    // this method creates the Candidates profile to the Document database
    public function AddProfile(Request $request)
    {
       // dd($request->all());
        // get the current user
        $user = Auth::user(); 
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $date_of_birth = $request->date_of_birth;
        $gender = $request->gender;
        $nationality = $request->nationality;
        $email = $request->email;
        $eucational_level = $request->eucational_level;
        $career_level = $request->career_level;
        $minimum_salary = $request->minimum_salary;
        $availability = $request->availability;
        $employment_terms = $request->employment_terms;
        $relocate = $request->relocate;
        $region = $request->region;
        $city = $request->location;
        $full_adress = $request->full_adress;
        $phonenumber = $request->phonenumber;
        // get section value sent from request
        $section = $request->jobprofile;
        // get current resume ID
        $resume = $request->resume;
    $validation = Validator::make($request->all(), [
       'firstname' => 'required',
        'lastname' => 'required|string',
        'date_of_birth' => 'required',
        'email' => 'required|email',
        'eucational_level' => 'required',
        'career_level' => 'required'
    ]);
  
    // redirect on validation error
    if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
// new Carbon($date_of_birth)->diffInYears(Carbon\Carbon::now());/
  $date =  new Carbon($date_of_birth);
  $now = Carbon::now();
       // add candidates first and last name to user table
    $user =User::findOrFail($user->id);
    $user->firstname = $firstname;
    $user->lastname = $lastname;
    $user->contact_address = $full_adress;
    $user->save();
    try {
        // adding candidates job profile to Documents table
        $document = Document::firstOrNew(['candidates_name'=> $firstname. ' ' . $lastname]);
        $document->candidates_name = $firstname. ' ' . $lastname;
        $document->user_id = $user->id;
        $document->resume_id = $resume;
        $document->gender = $gender;
        $document->date_of_birth = new Carbon($date_of_birth);
        $document->nationality = $nationality;
        $document->email = $email;
        $document->educational_level = $eucational_level;
        $document->career_level = $career_level;
        $document->minimum_salary = $minimum_salary;
        $document->availability = $availability;
        $document->city_id = $city;
        $document->region_id = $region;
        $document->d_employment_term = $employment_terms;
        $document->relocate_nationaly = $relocate;
        $document->age = $date->diffInYears($now);
        $document->phonenumber = $phonenumber;
        $document->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
      // $this->AddSection($section, $user->id, $resume);
    } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
           return redirect()->back()->withErrors($e->getMessage());
      // Session::flash('error', $e->getMessage()); 
    }
        return redirect()->back();
    }
       public function showAccountSettings(Request $request){
            // set email alerts
            $industries = DB::table('industries')->where('status', 1)->get();
       return view('candidate.candidate-profile-seting', compact('industries')  ,array('user' => Auth::user()));
    }
   public function getCitiesByRegioinAjax($region_id) {
    $cities = DB::table("cities")->where("region_id", $region_id)->get(['name']);
     return json_encode($cities);
    }
    public function EditProfileForm($id,$resume_id)
    {
        $document = Document::findOrFail($id);
        $educationallevels = $this->GetQualificationLevels(); 
        $job_career_levelList = JobcareerLevel::all();
        $employementterms = DB::table('employement_terms')->get();
        $regions = Region::all();
        $cities = $this->GetCities();
        $countries = $this->GetCountries();
        $menus = $this->displayMenu();
       return view('candidate.edit_profile', compact('document', 'educationallevels','job_career_levelList', 'employementterms', 'regions', 'cities', 'countries', 'resume_id', 'menus'), array('user' => Auth::user()));
    }

    public function UpdateCandidateProfile(Request $request)
    {
      //  dd($request->all());
        $user = Auth::user();
        $document_id = $request->document_id;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $date_of_birth = $request->date_of_birth;
        $gender = $request->gender;
        $nationality = $request->nationality;
        $email = $request->email;
        $eucational_level = $request->eucational_level;
        $career_level = $request->career_level;
        $minimum_salary = $request->minimum_salary;
        $availability = $request->availability;
        $employment_terms = $request->employment_terms;
        $relocate = $request->relocate;
        $region = $request->region;
        $city = $request->location;
        $full_adress = $request->full_adress;
        $phonenumber = $request->phonenumber;
        // get section value sent from request
        $section = $request->jobprofile;
        // get current resume ID
        $resume = $request->resume;
    $validation = Validator::make($request->all(), [
       'firstname' => 'required',
        'lastname' => 'required|string',
        'date_of_birth' => 'required',
        'email' => 'required|email',
        'eucational_level' => 'required',
        'career_level' => 'required'
    ]);
      // redirect on validation error
    if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
  $date =  new Carbon($date_of_birth);
  $now = Carbon::now();
    // add candidates first and last name to user table
    $user =User::findOrFail($user->id);
    $user->firstname = $firstname;
    $user->lastname = $lastname;
    $user->contact_address = $full_adress;
    $user->save();
    try {
        // adding candidates job profile to Documents table
        $document = Document::findOrFail($document_id);
        $document->candidates_name = $firstname. ' ' . $lastname;
        $document->user_id = $user->id;
        $document->resume_id = $resume;
        $document->gender = $gender;
        $document->date_of_birth = new Carbon($date_of_birth);
        $document->nationality = $nationality;
        $document->email = $email;
        $document->educational_level = $eucational_level;
        $document->career_level = $career_level;
        $document->minimum_salary = $minimum_salary;
        $document->availability = $availability;
        $document->city_id = $city;
        $document->region_id = $region;
        $document->d_employment_term = $employment_terms;
        $document->relocate_nationaly = $relocate;
        $document->age = $date->diffInYears($now);
        $document->phonenumber = $phonenumber;
        $document->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
    //$this->AddSection($section, $user->id, $resume);
    } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
           return redirect()->back()->withErrors($e->getMessage());
      // Session::flash('error', $e->getMessage()); 
    }
        return redirect()->back();
    }
    public function AddCareer(Request $request)
    {
       
        $career_summary = $request->career_summary;
        $section = $request->careersummary;
        $resume = $request->resume;
        $resume = RecruitResume::findOrFail($resume);
        $user = Auth::user();

try{
        if ($career_summary !=null && $career_summary !='') {
            
            //create Career Summary for one Resume at a time
            $career_ = CareerSummary::firstOrNew(['resume_id'=> $resume->id]);
            $career_->userid = $user->id;
            $career_->resume_id = $resume->id;
            $career_->summary = $career_summary;
            $career_->status = 1;
            $career_->created_at = new Carbon($this->returnCurrentTime());
            $career_->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Done successfully!');
            // this method registers the career summary for this user
        $this->AddSection($section, $user, $resume->id);
        }
    } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
           return redirect()->back()->withErrors($e->getMessage());
      // Session::flash('error', $e->getMessage()); 
    }
        return redirect()->back();
    }
    public function UpdateCareer(Request $request)
    {
       // dd($request->all());
        $resume = $request->resume;
        $career_summary = $request->career_summary;
        $career = $request->career;
try{
        if ($career_summary !=null && $career_summary !='') {
            
            $career_ = CareerSummary::findOrFail($career);
            $career_->userid = Auth::user()->id;
            $career_->resume_id = $resume;
            $career_->summary = $career_summary;
            $career_->status = 1;
            $career_->updated_at = $this->returnCurrentTime();
            $career_->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Done successfully!');
        }
    } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
           return redirect()->back()->withErrors($e->getMessage());
       Session::flash('error', $e->getMessage()); 
    }
        return redirect()->back();
    }

     public function ShowCareerForm($code, $id)
    {
        //dd($id);
      $career = CareerSummary::findOrFail($id);
      $menus = $this->displayMenu();
        return view('candidate.career_summary', compact('career', 'code', 'menus'), array('user' => Auth::user()));
    }

public function AddCertificate(Request $request)
{
     // get current user ID
   $user =  Auth::user();
   $certification_name = $request->certification_name;
    //dd($request->all());
     $name = $request->name;
     $date_received = $request->date_received;
     $section = $request->certificate_section;
     $resume = $request->resume;

try {
        $job_certifications = DB::table('job_certifications')->insert(['name' =>$certification_name, 'date_received' =>$date_received, 'user_id' => $user->id ]);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
         $this->AddSection($section, $user, $resume->id);
} catch (\Exception $e) {
    
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
}
    return redirect()->back();
}

public function ShowUpdateCertificateForm($id)
{
        $certificate_record = JobCertification::findOrFail($id);
        $menus = $this->displayMenu();
        return view('candidate.update_certificates', compact('certificate_record', 'menus') ,array('user' => Auth::user()));
}


public function UpdateCertificate(Request $request)
{
     // get current user ID
   $user =  Auth::user();
   $certification_name = $request->certification_name;
   $certificate_id = $request->certificate_id;
   $date_received = $request->date_received;

     // $job_certifications 

try {
        $update_certificate = JobCertification::findOrFail($certificate_id);
        $update_certificate->name = $certification_name;
        $update_certificate->date_received;
        $update_certificate->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
} catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
}
    return redirect()->back();
}



public function ShowAddCertificateForm()
{
  
   $menus = $this->displayMenu();
    return view('candidate.job_certificate', compact('menus'), array('user' => Auth::user()));

}

public function DeleteCertification($id)
{    # code...
   // dd($id);
   $user = Auth::user();
    DB::table('job_certifications')->where('user_id', $user->id)->where('id', $id)->delete();
    Session::flash('success', 'Deleting Certification');
    return redirect('/index/resume');
}
// this method handels Section Placement
// this method is implemented in every other section method
// bringing value as a result of request from those methods
// i am also tring to auto increment the order value so that it increase everytime there is an action
public function AddSection($name, $user_id, $resume){
 //dd($name);
    $user = Auth::user();
    // get the resume ID
    //$resume = $resume->id;
    $resume = RecruitResume::findOrFail($resume);
         // $count = 0;
        if ($name !=null && $user->id !=null && $resume !=null) {       
        $section = Section::firstOrNew(['resume_code' => $resume->id, 'user_code' => $user->id, 'name' => $name]);
        $section->name = $name;
        $section->user_code = $user->id;
        $section->resume_code = $resume->id;
        $section->status = 1;
        $section->created_at = $this->returnCurrentTime();
        $section->save();

try {
        $section_id = Section::findOrFail($section->id);
        $getid = Section::findOrFail($section_id->id);
        $getid->order = $section->id;
        $getid->save();
} catch (\Exception $e) {
    return redirect()->withErrors('error' . $e->getMessage());
}
        }
  return redirect()->back();
}
    public function AddSkills(Request $request)
    {
        // get current user ID
       $user =  Auth::user();
        // collect values from the client
        $skills = $request->multi;
        $resume = $request->resume;
        $group_b = $request->group_b;
        $section = $request->section;
       $resume = RecruitResume::findOrFail($resume);

        if ($resume) {      
            foreach ($group_b as $key => $value) {
                $skill = DB::table('job_skills')->insert(['userid' => $user->id, 'resumeid' => $resume->id, 'job_skill' => $value['skill'], 'percentage' => $value['percentage'], 'status' => 1, 'created_at' => $this->returnCurrentTime()]);
        }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');

        }else{
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
        }
        return redirect()->back();
    }

public function UpdateslskillForm($id)
{
    $user = Auth::user();
    $skill_list = JobSkill::where('userid', $user->id)->where('resumeid', $id)->get();
    //dd($skill_list);
    $resume = RecruitResume::findOrFail($id);
       $menus = $this->displayMenu();

    return view('candidate.edit_skill', compact('skill_list', 'resume', 'menus'), array('user' => Auth::user()));
}
public function deleteSkill(Request $request, $code, $id){    
    // get the current user
    //dd($id);
    $resume = $request->resume;
    $user = Auth::user();
    if ($id !=null && $id !='') {
     $skill_list = JobSkill::where('userid', $user->id)->where('id', $id)->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
    }else{

        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');     
    }
return redirect()->back();
}

    public function UpdateSkill(Request $request, $id)
    {
       // dd($request->all());
           // get current user ID
       $user =  Auth::user();
        // collect values from the client
        $skills = $request->multi;
        $resume = $request->resume;
        if ($skills) {
            $resume = RecruitResume::findOrFail($resume);
            // dd($request->all());
             foreach ($skills as $key => $value) {
                $skill = DB::table('job_skills')->insert(['userid' => $user->id, 'resumeid' => $resume->id, 'job_skill' => $value, 'status' => 1, 'created_at' => $this->returnCurrentTime()]);
            }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
        }else{
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
        }
     
        return redirect()->back();
    }
public function GetQualificationLevels()
{
    $qualifications = DB::table('qualification_levels')->get();
 return $qualifications;
}
    public function CreateEducationForm($id)
    { 
    $countries = Country::all();
    $recruityear_list = RecruitYear::all();
    // $education = JobEducation::findOrFail($code);
    $qualifications = Qualification::all(); 
   $user_single_resume_by_id = RecruitResume::where('id', $id)->first();
      $menus = $this->displayMenu();
        return view('candidate.create_education', compact('user_single_resume_by_id', 'countries', 'recruityear_list', 'qualifications', 'menus') ,array('user' => Auth::user()));
    }

    public function AddEducation(Request $request)
    {
        //dd($request->all());
        $user = Auth::user();
        $education_start_date = $request->education_start_date;
        $start_month = $request->start_month;
        $educationend_year = $request->educationend_year;
        $end_month = $request->end_month;
        $qualification = $request->qualification;
        $feild_of_study = $request->feild_of_study;
        $school_name = $request->school_name;
        $country = $request->country;
        $resume = $request->resume;
        $section = $request->education_section;
        $resume = RecruitResume::findOrFail($resume);
      //  dd($section);
        $validation = Validator::make( $request->all(), [
       'education_start_date' => 'required',
        'start_month' => 'required|string',
        'qualification' => 'required',
        'feild_of_study' => 'required|string',
        'school_name' => 'required',
        'country' => 'required'
    ]);
  
    // redirect on validation error
    if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
try {
        $education = new JobEducation;
        $education->start_year = $education_start_date;
        $education->start_month = $start_month;
        $education->end_year = $educationend_year;
        $education->end_month = $end_month;
        $education->qualification = $qualification;
        $education->school_name = $school_name;
        $education->feild_of_study = $feild_of_study;
        $education->country = $country;
        $education->userid = $user->id;
        $education->resume_id = $resume->id;
        $education->created_at = $this->returnCurrentTime();
        $education->save();
        $this->AddSection($section, $user->id, $resume->id);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
} catch (\Exception $e) {
    
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');

          return redirect()->back()->withErrors($e->getMessage());
       Session::flash('error', $e->getMessage()); 
}
 return redirect()->route('show.resume');

}
public function ShowEditEducation($code,$id)
{
    $user = Auth::user();
    //dd($code);
    $countries = Country::all();
    $recruityear_list = RecruitYear::all();
    $education = JobEducation::findOrFail($code);
    $qualifications = Qualification::all(); 
   $user_single_resume_by_id = RecruitResume::where('id', $id)->first();
      $menus = $this->displayMenu();
     return view('candidate.edit_education', compact('countries', 'recruityear_list', 'education', 'user', 'qualifications', 'user_single_resume_by_id', 'menus'), array('user' => Auth::user()));
}
public function UpdateEducation(Request $request)
{
        $resume = $request->resume;
        $education_id = $request->education;
        $user = Auth::user();
        $education_start_date = $request->education_start_date;
        $start_month = $request->start_month;
        $educationend_year = $request->educationend_year;
        $end_month = $request->end_month;
        $qualification = $request->qualification;
        $feild_of_study = $request->feild_of_study;
        $school_name = $request->school_name;
        $country = $request->country;
        $resume = $request->resume;

        $validation = Validator::make( $request->all(), [
       'education_start_date' => 'required',
        'start_month' => 'required|string',
        'qualification' => 'required',
        'feild_of_study' => 'required|string',
        'school_name' => 'required',
        'country' => 'required'
    ]);
  
    // redirect on validation error
    if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
     //dd($request->all());
    try {
        $education = JobEducation::findOrFail($education_id);
        $education->start_year = $education_start_date;
        $education->start_month = $start_month;
        $education->end_year = $educationend_year;
        $education->end_month = $end_month;
        $education->qualification = $qualification;
        $education->school_name = $school_name;
        $education->feild_of_study = $feild_of_study;
        $education->country = $country;
        $education->userid = $user->id;
        $education->resume_id = $resume;
        $education->updated_at = $this->returnCurrentTime();
        $education->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
//dd($request->all());

        // return ();
        return redirect()->route('show.resume');
} catch (\Exception $e) {
    
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');

          return redirect()->back()->withErrors($e->getMessage());
       Session::flash('error', $e->getMessage()); 
}
 return redirect()->back();
}

// this method is to be used in the future
public function ShowWorkExperienceForm()
{
     $user = Auth::user();
    //dd($code);
    $countries = Country::all();
    $recruityear_list = RecruitYear::all();
    $education = JobEducation::findOrFail($code);
    $qualifications = Qualification::all(); 
   $user_single_resume_by_id = RecruitResume::where('id', $id)->first();
      $menus = $this->displayMenu();

     return view('candidate.create_work_experience', compact('countries', 'recruityear_list', 'education', 'user', 'qualifications', 'user_single_resume_by_id', 'menus'), array('user' => Auth::user()));
}
   public function DeleteEducation($id)
   {
 //   dd($id);
    if ($id) {
      DB::table('job_educations')->where('id', $id)->delete();
       Session::flash('success', 'deleting work experience'); 
    }else{

        Session::flash('error', 'something went wrong');
    }
    return redirect()->route('show.resume');
   }

    public function AddWorkExperience(Request $request)
    {
 //dd($request->all());
        $resume = $request->resume;
        //dd($resume);
        $section = $request->work_history;
        $user = Auth::user();
        $work_from_year = $request->work_from_year;
        $work_from_month = $request->work_from_month;
        $end_year = $request->end_year;
        $end_month = $request->end_month;
        $position_title = $request->position_title;
        $career_level = $request->career_level;
        $company_name = $request->company_name;
        $country = $request->country;
        $work_industries = $request->work_industries;
        $professions_ = $request->professions_;
        $responsibilities = $request->responsibilities;
        $present = $request->present;

        if ($end_year !=null && $end_month !=null) {
        # code...

        $present = 0;
        }else{

        $present = $request->current;

        $getwork_ex = DB::table('work_experiences')->where('userfk', $user->id)->get();
        foreach ($getwork_ex as $key => $value) {

            $updateme = WorkExperience::findOrFail($value->id);

            if ($updateme->present === 1) {
                 $updateme->present = 2;
            }else{
              $updateme->present = 0;  
            }
            
            $updateme->save();
        }
        } 

        $validation = Validator::make( $request->all(), [
       'work_from_year' => 'required',
        'work_from_month' => 'required|string',
        'position_title' => 'required',
        'career_level' => 'required|string',
        'company_name' => 'required',
        'country' => 'required',
        'responsibilities'=>'required',
    ]);
  
    // redirect on validation error
    if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
     try {
  $candidate_work_experience = DB::table('work_experiences')->insertGetId(['start_year'=>$work_from_year, 'start_month'=>$work_from_month, 'end_year'=>$end_year, 'end_month'=>$end_month, 'position_title'=>$position_title, 'career_level'=>$career_level, 'company_name'=>$company_name, 'country'=>$country, 'responsibilities'=>$responsibilities, 'status'=>1, 'userfk'=>$user->id, 'resumefk'=>$resume, 'present'=> $present]); 

 // dd($candidate_work_experience);

// // // // //$candidate_work_experience
// 1. get the current Years of Experience by user iD and resume ID
// 2. find the users record in Document table with [user_id and resume_id]
// 3. update the column 'years_of_experience' with the value gotten from no: 1
$dt = Carbon::now();
$ddt = Carbon::now();
$ddt->year = $work_from_year;
if ($end_year === null) {
    $end_year = Carbon::now();

    $end_yeard = $end_year->year;
    $dt->year = $end_yeard;
}else{
 $dt->year = $end_year;
} 
$yer = $ddt->diffInYears($dt);
$work_e = WorkExperience::findOrFail($candidate_work_experience);

$work_e->yoe +=$yer;
$work_e->save();
//dd($work_e);
try {
  $user_yoe = Document::where('user_id', $user->id)->where('resume_id', $resume)->first();
$user_yoe->years_of_experience +=$yer;
$user_yoe->save();
} catch (Exception $e) {
  
}

// $years_sum = 0;
// $years_sum +=$yer;
  // dd($work_e);
// $updateDocument = DB::table('documents')->where('user_id', $user->id)->where('resume_id', $resume)->update(['years_of_experience'=>$years_sum]);
//  dd($user_yoe->id);
$get_user_for_Yoe_update = Document::findOrFail($user_yoe->id);

$testcalue = $get_user_for_Yoe_update->years_of_experience;


$salary_range = config('constants.salary_range'); 

switch ($testcalue) {
    case 1: 
$get_user_for_Yoe_update->yoe_range =$salary_range[1]; 
$get_user_for_Yoe_update->save(); 
        break;
           case 2:
$get_user_for_Yoe_update->yoe_range =$salary_range[2]; 
$get_user_for_Yoe_update->save();
        break;
           case 3:
$get_user_for_Yoe_update->yoe_range =$salary_range[3]; 
$get_user_for_Yoe_update->save();
        break;
           case 4:
$get_user_for_Yoe_update->yoe_range =$salary_range[4]; 
$get_user_for_Yoe_update->save();
        break;
           case 5:
$get_user_for_Yoe_update->yoe_range =$salary_range[5]; 
$get_user_for_Yoe_update->save();
        break;
           case 6:
$get_user_for_Yoe_update->yoe_range =$salary_range[6]; 
$get_user_for_Yoe_update->save();
        break;
           case 7:
$get_user_for_Yoe_update->yoe_range =$salary_range[7]; 
$get_user_for_Yoe_update->save();
        break;
            case 8:
$get_user_for_Yoe_update->yoe_range =$salary_range[8]; 
$get_user_for_Yoe_update->save();
        break;
            case 9:
$get_user_for_Yoe_update->yoe_range =$salary_range[9]; 
$get_user_for_Yoe_update->save();
        break;
            case 10:
$get_user_for_Yoe_update->yoe_range =$salary_range[10]; 
$get_user_for_Yoe_update->save();
        break;
            case 11:
$get_user_for_Yoe_update->yoe_range =$salary_range[11]; 
$get_user_for_Yoe_update->save();
        break;
            case 12:
$get_user_for_Yoe_update->yoe_range =$salary_range[12]; 
$get_user_for_Yoe_update->save();
        break;
            case 13:
$get_user_for_Yoe_update->yoe_range =$salary_range[13]; 
$get_user_for_Yoe_update->save();
        break;
            case 14:
$get_user_for_Yoe_update->yoe_range =$salary_range[14]; 
$get_user_for_Yoe_update->save();
        break;
            case 15:
$get_user_for_Yoe_update->yoe_range =$salary_range[15]; 
$get_user_for_Yoe_update->save();
        break;
            case 16:
$get_user_for_Yoe_update->yoe_range =$salary_range[16]; 
$get_user_for_Yoe_update->save();
        break;
            case 17:
$get_user_for_Yoe_update->yoe_range =$salary_range[17]; 
$get_user_for_Yoe_update->save();
        break;
            case 18:
$get_user_for_Yoe_update->yoe_range =$salary_range[18]; 
$get_user_for_Yoe_update->save();
        break;
            case 19:
$get_user_for_Yoe_update->yoe_range =$salary_range[19]; 
$get_user_for_Yoe_update->save();
        break;
            case 20:
$get_user_for_Yoe_update->yoe_range =$salary_range[20]; 
$get_user_for_Yoe_update->save();
        break;

    default:  
 
$get_user_for_Yoe_update->yoe_range ='20 Above';  
$get_user_for_Yoe_update->save();
        break;
}
//dd('here');
//  dd($salary_range);
// dd($user_yoe); 
 
foreach ($work_industries as $key => $industry) {
// dd($work_e->id);
$userindustry = UserIndustry::firstOrNew(['industry_id' => $industry, 'work_experience_id' => $work_e->id]);

$userindustry->user_id = $user->id;
$userindustry->industry_id = $industry;
$userindustry->resume_id = $resume;
$userindustry->created_at = $this->returnCurrentTime();
$userindustry->save();

$this->RegisterEmailAlert($industry, $user->id, $user->email, $career_level);
$work_e->industries()->attach($industry); 

        }

foreach ($professions_ as $key => $profession) {
       //dd($profession);
    $userprofession = UserProfession::firstOrNew(['industry_profession_id' => $profession, 'work_experience_id' => $work_e->id]);
    $userprofession->industry_profession_id = $profession;
    $userprofession->user_id = $user->id;
    $userprofession->resume_id = $resume;
    $userprofession->created_at = $this->returnCurrentTime();

    $work_e->industryprofessions()->attach($profession);

}
$request->session()->flash('message.level', 'success');
$request->session()->flash('message.content', 'Done successfully!');

// register work expeirence to section table
//$resume = RecruitResume::findOrFail($resume);
 
$this->AddSection($section, $user->id, $resume);
 
    } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');
        return redirect()->back()->withErrors($e->getMessage());
        Session::flash('error', $e->getMessage()); 
    }
     return redirect()->back();
      }
public function RegisterEmailAlert($industry, $user_id, $email, $job_level)
{
    # code..
    DB::table('emails')->insert(['user' => $user_id, 'industry' => $industry, 'email' => $email, 'job_level' => $job_level, 'status' => 1, 'created_at' =>$this->returnCurrentTime()]);
    return back();
}
public function SowUpdateWorkHistoryForm($code,$id)
{
 //dd($code);

        $user = Auth::user();
        $countries = Country::all();
        $recruityear_list = RecruitYear::all(); 
        $qualifications = Qualification::all(); 
        $user_single_resume_by_id = RecruitResume::where('id', $id)->first();
        $work_history = WorkExperience::findOrFail($code);
        $job_career_levelList = JobcareerLevel::all();
        $industries = Industry::all();
        $industry_profession = DB::table('industry_professions')->get();

         $work_industry_single = DB::table('work_industry')->where('work_experience_id', $code)->distinct()->first();
         //dd($work_industry_single);
   $menus = $this->displayMenu();
    return view('candidate.edit_work_history', compact('countries', 'recruityear_list', 'qualifications', 'user_single_resume_by_id', 'work_history', 'job_career_levelList', 'industries', 'industry_profession', 'work_industry_single', 'menus'), array('user' => Auth::user()));
 
}
public function UpdateWorkHistory(Request $request)
{
  //dd($request->all());

        $resume = $request->resume;
        $work_history = $request->work_history;
        $education_id = $request->education;
        $user = Auth::user();

        $work_from_year = $request->work_from_year;
        $work_from_month = $request->work_from_month;
        $end_year = $request->end_year;
        $end_month = $request->end_month;
        $position_title = $request->position_title;
        $career_level = $request->career_level;
        $company_name = $request->company_name;
        $country = $request->country;
        $work_industries = $request->work_industries;
        $professions_ = $request->professions_;
        $responsibilities = $request->responsibilities;
        

        if ($end_year !=null && $end_month !=null) {
            # code...
          $present = 0;
        }else{

            $present = $request->current;
        }
 //dd($resume);


        $validation = Validator::make( $request->all(), [
       'work_from_year' => 'required',
        'work_from_month' => 'required|string',
        'position_title' => 'required',
        'career_level' => 'required|string',
        'company_name' => 'required',
        'country' => 'required',
        'responsibilities'=>'required',
    ]);
  
    // redirect on validation error
    if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
 try {
 
    $candidate_work_experience = WorkExperience::findOrFail($work_history);
    $candidate_work_experience->start_year = $work_from_year;
    $candidate_work_experience->start_month = $work_from_month;
    $candidate_work_experience->end_year = $end_year;
    $candidate_work_experience->end_month = $end_month;
    $candidate_work_experience->position_title = $position_title;
    $candidate_work_experience->career_level = $career_level;
    $candidate_work_experience->company_name = $company_name;
    $candidate_work_experience->country = $country;
    $candidate_work_experience->responsibilities = $responsibilities;
    $candidate_work_experience->userfk = $user->id;
    $candidate_work_experience->resumefk =$resume;
    $candidate_work_experience->present = $present;
    $candidate_work_experience->status = 1;
    $candidate_work_experience->save();


      //  dd($work_e); chech this method very well
    $work_industrylist = DB::table('work_industry')->where('work_experience_id',$candidate_work_experience->id)->get();
    foreach ($work_industrylist as $key => $value) { 
    DB::table('work_industry')->where('work_experience_id',$candidate_work_experience->id)->delete();
    } 
foreach ($work_industries as $key => $industry) { 
        $candidate_work_experience->industries()->attach($industry);
        }
foreach ($professions_ as $key => $profession) {
    //experience_profession
    DB::table('experience_profession')->where('industry_profession_id',$profession)->delete();  
     $candidate_work_experience->industryprofessions()->attach($profession);
}
$request->session()->flash('message.level', 'success');
$request->session()->flash('message.content', 'Done successfully!'); 
// return redirect()->route('get.resume',$resume);
return redirect()->route('show.resume');

    } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record');

        return redirect()->back()->withErrors($e->getMessage());
        Session::flash('error', $e->getMessage()); 
    }
  return redirect()->back();
}

public function DeleteWorkExperience($id, $section)
{
    $user = Auth::user();

    // remove work_experience instance
    // remove work_industry instance
    // remove work_profession instance
    // remove instance form section 

    if ($id) {
        // get the instance of the record to be deleted from work_experience table
         $work_experience = DB::table('work_experiences')->where('id',$id)->first();
        // get the years_of_experience 
 
        //  get the user's profile and return the years_of_experience
        $user_profile =  DB::table('documents')->where('user_id', $user->id)->first();

      //  $user_profile->years_of_experience;
if ($user_profile->years_of_experience === 0) {
       DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => 0]);
}else{
        // subtract the deleting years_of_experience from the current years_of_experience  
        $new_years_of_experience = $user_profile->years_of_experience - $work_experience->yoe;
//$get_user_for_Yoe_update = Document::findOrFail($user_yoe->id);
//$testcalue = $get_user_for_Yoe_update->years_of_experience;

 ///dd($testcalue);
$salary_range = config('constants.salary_range'); 

switch ($new_years_of_experience) {
        case 0: 
// $get_user_for_Yoe_update->yoe_range =$salary_range[1]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[1]]);
        break;
    case 1: 
// $get_user_for_Yoe_update->yoe_range =$salary_range[1]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[1]]);
        break;
           case 2:
// $get_user_for_Yoe_update->yoe_range =$salary_range[2]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[2]]);
        break;
           case 3:
// $get_user_for_Yoe_update->yoe_range =$salary_range[3]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[3]]);
        break;
           case 4:
// $get_user_for_Yoe_update->yoe_range =$salary_range[4]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[4]]);
        break;
           case 5:
// $get_user_for_Yoe_update->yoe_range =$salary_range[5]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[5]]);
        break;
           case 6:
// $get_user_for_Yoe_update->yoe_range =$salary_range[6]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[6]]);
        break;
           case 7:
// $get_user_for_Yoe_update->yoe_range =$salary_range[7]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[7]]);
        break;
            case 8:
// $get_user_for_Yoe_update->yoe_range =$salary_range[8]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[8]]);
        break;
            case 9:
// $get_user_for_Yoe_update->yoe_range =$salary_range[9]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[9]]);
        break;
            case 10:
// $get_user_for_Yoe_update->yoe_range =$salary_range[10]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[10]]);
        break;
            case 11:
// $get_user_for_Yoe_update->yoe_range =$salary_range[11]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[11]]);
        break;
            case 12:
// $get_user_for_Yoe_update->yoe_range =$salary_range[12]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[12]]);
        break;
            case 13:
// $get_user_for_Yoe_update->yoe_range =$salary_range[13]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[13]]);
        break;
            case 14:
// $get_user_for_Yoe_update->yoe_range =$salary_range[14]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[14]]);
        break;
            case 15:
// $get_user_for_Yoe_update->yoe_range =$salary_range[15]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[15]]);
        break;
            case 16:
// $get_user_for_Yoe_update->yoe_range =$salary_range[16]; 
$get_user_for_Yoe_update->save();
        break;
            case 17:
// $get_user_for_Yoe_update->yoe_range =$salary_range[17]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[17]]);
        break;
            case 18:
// $get_user_for_Yoe_update->yoe_range =$salary_range[18]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[18]]);
        break;
            case 19:
// $get_user_for_Yoe_update->yoe_range =$salary_range[19]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[19]]);
        break;
            case 20:
// $get_user_for_Yoe_update->yoe_range =$salary_range[20]; 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>$salary_range[20]]);
        break;

    default:
 
DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience, 'yoe_range' =>'20 Above']);
 
        break;
}
       // update the user_profile with the new years of experience
      // DB::table('documents')->where('user_id', $user->id)->update(['years_of_experience' => $new_years_of_experience]);
    }
   $work_industry = DB::table('work_industry')->where('work_experience_id',$id)->delete();
   $experience_professionList = DB::table('experience_profession')->where('work_experience_id',$id)->delete();
    //delete work experience 
    DB::table('work_experiences')->where('id',$id)->delete();
    DB::table('sections')->where('user_code', Auth::user()->id)->where('name',$section)->get();
    Session::flash('success', 'deleting work experience'); 
    }else{
    Session::flash('error', 'something went wrong');    
    }
       
    return redirect()->route('show.resume');
}


    public function ResumeProperties()
    {
        $user = Auth::user();
       // dd('it is our work  ooo');
        $documents = Document::all()->count();
        $users = User::all()->count();
        $resumes = RecruitResume::all();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->first();
     // dd($user_single_resume_by_date);
        $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
      //  $industries = Industry::all();
        $industries =  DB::table('industries')->get();
        // get all year
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        // get Educational History
        $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        // get Work History
        $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->get();
        //get educational_levels
        $educationallevels = $this->GetQualificationLevels();  
        $employementterms = DB::table('employement_terms')->get();
            $dt = Carbon::now();
            $ddt = Carbon::now();
  
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();

        return ['documents', 'roles', 'users', 'resumes_by_user', 'resumes','industries', 'industry_profession', 'industry_group', 'get_industry_child', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'dtwork', 'ddtwork', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms'];
    }


    // this method gets the 
    public function SelectResume($id)
    {
       // dd($id);
        try {
             $user = Auth::user();
        // take id to GetSelected to make active 
        $this->GetSelected($id);

         $resume_record = DB::table('recruit_resumes')->where('id', $id)->where('user_id', $user->id)->first();
        //dd($resume_record);
         // get the selected resume and make active
         $resume_record = RecruitResume::findOrFail($resume_record->id);
         $resume_record->status = 1;
         $resume_record->save();
           //dd($resume_record);
         return $this->ShowResumeById($resume_record);
        } catch (Exception $e) {
            
        }
        //change the order
       
    }
        // this method is tailured to making resume active
        public function GetSelected($id) {
        $user = Auth::user();
     
        $resume_records = DB::table('recruit_resumes')->where('id', $id)->where('user_id', $user->id)->get();
        foreach ($resume_records as $key => $value) {
        DB::table('recruit_resumes')->where('user_id', $user->id)->update(['status'=>0]);
     
      }
        // return back to SelectResume and set the selected resume Active
         return back();
    }

    // this method was writen to display resume by Resume Code
    public function ShowResumeById($resume_id)
    {
        $user = Auth::user();     
        $dt = Carbon::now();
        $ddt = Carbon::now();
        $documents = Document::all()->count();
        $users = User::all()->count();
         // get all year
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        //get educational_levels
        $educationallevels = $this->GetQualificationLevels(); 
        $employementterms = DB::table('employement_terms')->get();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        //$resumes = RecruitResume::all();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get(); // fresh user pass this test 20/10/2018
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
         //dd($resumes);
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->where('id', $resume_id->id)->first();
       // dd($user_single_resume_by_date);
        $career = CareerSummary::where('userid', $user->id)->where('resume_id', $resume_id->id)->first();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
      //  $industries = Industry::all();
        $industries =  DB::table('industries')->get();
        // get Educational History
        $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $resume_id->id)->get();
        ///dd($educationaList);
        // get Work History
        $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $resume_id->id)->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        $awards = Award::where('user_id', $user->id)->get();
               // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
         $regions = DB::table('regions')->get();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
        $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();


        $job_category_list = $this->GetJobcategory();
        $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
         $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
$pr_caption= RecruitResume::where('user_id', $user->id)->where('status',1)->first();
        $menus = $this->displayMenu();
        $units = $this->displayUnits();
            return view('candidate.resume', compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt','job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'regions', 'referee_list', 'profile_pix', 'menus', 'units', 'pr_caption'), array('user' => Auth::user()));
    }

 public function AdminResumeById($resume_id, $candidate_id)
    {
 
        $document = Document::where('resume_id', $resume_id)->where('black_list',0)->first();
        $candidate = User::findOrFail($document->user_id);
        $user = Auth::user();     
        $dt = Carbon::now();
        $ddt = Carbon::now();
        $documents = Document::all()->count();
        $users = User::all()->count();
         // get all year
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        //get educational_levels
        $educationallevels = $this->GetQualificationLevels(); 
        $employementterms = DB::table('employement_terms')->get();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        //$resumes = RecruitResume::all();
       $resumes = RecruitResume::where('user_id', $document->user_id)->orderBy('status','DESC')->get(); // fresh user pass this test 20/10/2018
        $user_resume_list = RecruitResume::where('user_id', $document->user_id)->orderBy('created_at','DESC')->get();
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $document->user_id)->where('id', $resume_id)->first();
        $career = CareerSummary::where('userid', $document->user_id)->where('resume_id', $resume_id)->first();
        $jobskills = JobSkill::where('userid', $document->user_id)->get();
        $document = Document::Where('user_id', $document->user_id)->first();
        $industries =  DB::table('industries')->get();
        // get Educational History
        $educationaList = JobEducation::where('userid', $document->user_id)->where('resume_id', $resume_id)->get();
       // get Work History
        $work_histories = WorkExperience::where('userfk', $document->user_id)->where('resumefk', $resume_id)->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $document->user_id)->get();
        $person_info = PersonalInformation::where('user_id', $document->user_id)->first();
        $awards = Award::where('user_id', $document->user_id)->get();
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
        $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
        $job_category_list = $this->GetJobcategory();
        $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
        $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $candidate_id)->orderBy('created_at', 'DESC')->first();
       $menus = $this->displayMenu();
       $units = $this->displayUnits();
       return view('employer.view_candidate_resume', compact('documents', 'roles', 'users', 'resumes_by_user', 'resumes','industries', 'industry_profession', 'industry_group', 'get_industry_child', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'dtwork', 'ddtwork', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'regions', 'referee_list', 'profile_pix', 'user','recruit_profile_pix', 'recruit_profile_pix_list', 'candidate', 'menus', 'units'), array('user' => Auth::user()));
    }

// get all resume by default first time
      public function ShowResume() { 
       $user = Auth::user();
       $check_pix = RecruitProfilePix::where('user_id', $user->id)->first();
    if ($check_pix == null) {
      DB::table('recruit_profile_pixs')->insert(['user_id'=> $user->id, 'pix' => 'default.png', 'order' => 1, 'status' => 1, 'created_at' => $this->returnCurrentTime()]);
    }
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $pr_caption = RecruitResume::where('user_id', $user->id)->where('status',1)->first();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
        //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
        $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
        $job_category_list = $this->GetJobcategory();
        $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
        $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first(); 
        $menus = $this->displayMenu(); 
        return view('candidate.resume', compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'regions', 'referee_list', 'profile_pix', 'menus', 'pr_caption'), array('user' => Auth::user()));
        }

        public function PrintResume($id){
        $user = Auth::user(); 
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass

       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        ///dd($educationaList);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
        $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
        $job_category_list = $this->GetJobcategory();
        $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
        //get educational_levels
        $menus = $this->displayMenu(); 
            return view('candidate.print_resume', compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'regions', 'referee_list', 'menus'), array('user' => Auth::user()));
        }
       public function AddPersonalInformation(Request $request)
        {
            $user = Auth::user();
            $interest = $request->interest;
            $associations = $request->associations;
            $award = $request->award;
            $personal_page = $request->personal_page;
            $training = $request->training;
            $section = $request->pinfor;
            $resume = $request->resume;
            try {
            $pinformation = new PersonalInformation;
            $pinformation->user_id = $user->id;
            $pinformation->interest = $interest;
            $pinformation->association = $associations;
            $pinformation->award = $award;
            $pinformation->personal_page = $personal_page;
            $pinformation->status = 1;
            $pinformation->created_at =  $this->returnCurrentTime();
            $pinformation->training = $training;
            $pinformation->save();
            //dd($pinformation);
            $this->AddSection($section, $user->id, $resume);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Done successfully!'); 
            } catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Cannot create record'); 
        Session::flash('error', $e->getMessage());
            }
            return redirect()->back();
        }

        public function ShowUpdatePersonalInformationForm($id)
        {
            if ($id) {

            $person_info = PersonalInformation::findOrFail($id);
$menus = $this->displayMenu();
            }else{   
            Session::flash('error', 'something went wrong');
            return redirect()->back();
            }

            return view('candidate.update_personal_information', compact('person_info', 'menus'), array('user' => Auth::user()));
        }
        /// forms 
        public function EducationFormBuilder(FormBuilder $formBuilder){
        $form = $formBuilder->create(\App\Forms\SongForm::class, [
                        [
                            'name' => 'name',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'lyrics',
                            'type' => 'textarea',
                        ], 
                        [
                            'name' => 'publish',
                            'type' => 'checkbox'
                        ],

            'method' => 'POST',
            'url' => route('song.store')
        ]);
        return view('candidate.create_resume', compact('form'));
      }

public function AddAward(Request $request){

  $title = $request->title;
  $yeaofaward = $request->yeaofaward;
  $company_name = $request->company_name;
  $description = $request->description;
  $resume = $request->resume;
    $user = Auth::user();
    // validate the input
    $validation = Validator::make( $request->all(), [
        'title'=>'required|string|max:50',
        'yeaofaward' =>'required|string|max:50',
        'company_name' => 'required',
        'description' => 'required|string|max:50', 
    ]);

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}

          //dd($request->all());

    try {

        $award = new Award;
        $award->user_id = $user->id;
        $award->resume_id =$resume;
        $award->title = $title;
        $award->body = $company_name;
        $award->description = $description;
        $award->date_awarded = $yeaofaward;
        $award->created_at = $this->returnCurrentTime();
        $award->save();
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Done successfully!'); 
    
    } catch (\Exception $e) {
    $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'Cannot create record');  
    }
  return redirect()->back();
}
public function ShowUpdateAward($id)
{
    $award = Award::findOrFail($id);
    return view('candidate.edit_award',  compact('award'), array('user' => Auth::user()));
}

public function UpdateAward(Request $request) {
    $title = $request->title;
    $yeaofaward = $request->yeaofaward;
    $company_name = $request->company_name;
    $description = $request->description;
    $resume = $request->resume;
    $user = Auth::user();
    // validate the input
    $validation = Validator::make( $request->all(), [
        'title'=>'required|string|max:50',
        'yeaofaward' =>'required|string|max:50',
        'company_name' => 'required',
        'description' => 'required|string|max:50', 
    ]);

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
          //dd($request->all());

    try {
        $award = Award::findOrFail();
        $award->user_id = $user->id;
        $award->resume_id =$resume;
        $award->title = $title;
        $award->body = $company_name;
        $award->description = $description;
        $award->date_awarded = $yeaofaward;
        $award->created_at = $this->returnCurrentTime();
        $award->save();
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Done successfully!');      
    } catch (\Exception $e) {
    $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'Cannot create record');  
    }
    return redirect()->back();
}

/// Utilities Section 
public function GetAvailableJobs()
{
    $user = Auth::user();
    if ($user) {
        // get job that are active and live
   $jobs_by_candidates_industry = Tag::latest()->paginate(3);
        }
    return $jobs_by_candidates_industry;
}

public function GetUsers(){
  return User::all();
}
public function GetCities(){
   return City::all();
}
public function GetCountries(){
    return Country::all();
}
public function Tags()
{
   return Tag::where('status', 1)->where('active',1)->get();
} 
public function GetSections()
{
    # code...
    return Section::all();
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
public function GetAssessment($job){
    $assessements = DB::table('job_assessments')->where('job_id', $job)->get(); 
    return $assessements;
}
public function GetRequirements($job)
{
    $requirements = DB::table('job_requirements')->where('job_id', $job)->get();
    return $requirements;
}
public function JobCommonByIndustries($id)
{
    $tag = Tag::findOrFail($id);
    $get_Job_by_common_industries = DB::table('tags')->where('industry',$tag->industry)->orWhere('job_category',$tag->job_category)->orWhere('salary_range', $tag->salary_range)->get();
return $get_Job_by_common_industries;
}
// Job Application 
    public function JobApplicationForm($id){
    //$id = 28;
    if (Auth::user()->account_type === 'employee') {
 
      $user = Auth::user();
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
      // get employer that posted this job
    $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->where('status', 1)->first();
    $resume_list = RecruitResume::where('user_id', $user->id)->get();
    $get_all_user_list = User::all();
    $menus = $this->displayMenu();
     return view('jobs.details', compact('tag','employement_terms', 'jobcareer_levels', 'industries', 'educational_levels', 'skillsets', 'job_assessments', 'job_requirements', 'get_Job_by_common_industries', 'get_Job_by_common_industries_similler', 'cities', 'get_all_user_list', 'user_single_resume_by_date', 'resume_list', 'industry_professions', 'menus'), array('user' => Auth::user()));
      }else{
  return redirect()->back()->withErrors(['is_not_employee' => 'You cannot view this information']);
     // return url('/login?redirect_to=' . urlencode(request()->url()));
      }
    return redirect()->back();
    }
// extra note ::::::logic for the Apply link on candidates profile page
// mvoe candidates to job_details application page once this link is clicked
// this method allows the applicant to select the resume for the job application
    public function CompareRequirments($code, $id)
    {
    $user = Auth::user();
    // selection 
    // gold silver bronze
    // "qualification" => 4
    $gold = 5;
    $silver = 3;
    $bronze = 2;
    $rating = 0;
    $user_profile = Document::where('user_id', $user->id)->where('resume_id', $code)->first();
    $requirements = $this->GetRequirements($id);
    $tag = Tag::findOrFail($id);
   //dd($tag);
    $job_skills = JobSkill::where('userid',$user->id)->get();

    if ($tag->experience === $user_profile->yoe_range && $tag->salary_range === $user_profile->minimum_salary && $tag->job_type == $user_profile->d_employment_term && $tag->job_level == $user_profile->career_level && $tag->region == $user_profile->region_id && $tag->city === $user_profile->city_id && $tag->qualification === $user_profile->educational_level) {
     $this->saveJobMatch($user->id, $id, $gold);
     return $rating = $gold;
    }elseif ($tag->job_type == $user_profile->d_employment_term && $tag->job_level == $user_profile->career_level && $tag->region == $user_profile->region_id && $tag->city === $user_profile->city_id && $tag->qualification === $user_profile->educational_level) {
      $this->saveJobMatch($user->id, $id, $silver);
    }else{
      $this->saveJobMatch($user->id, $id, $bronze);
      return $rating = $bronze;
   }
      return redirect()->back();
    }
public function saveJobMatch($user_id, $id, $rate)
    {
     $save_job_match = JobMatch::firstOrNew(['user_id'=> $user_id, 'job_id'=> $id]);
    $save_job_match->user_id = $user_id;
    $save_job_match->job_id = $id;
    $save_job_match->rate = $rate;
    $save_job_match->created_at = $this->returnCurrentTime();
    $save_job_match->save();
    }
public function StageOneJobApplication($code, $id, $check){
//dd($id);
  $comparerequirements = $this->CompareRequirments($code, $id);
  $user = Auth::user();
  // allow candidate to select the Resume they want to apply with
   // get assesment questions
    $assessements = $this->GetAssessment($id);
    // get applicants resume
    $resume = RecruitResume::findOrFail($code);
    // get applicants profile
    $user_profile = Document::where('resume_id', $code)->first();
    // compare requirements for rating
    // loop through 
 // dd('here');
return redirect()->route('apply.job', $id);
}
public function ApplyForAJob(Request $request)
{
  $user = Auth::user();
try{
  $resume_selected_id = $request->resume_name;
  $tag_id = $request->tag_id;
  $job_assessment_id = $request->job_assessment_id;
  $job_assessment_answer = $request->job_assessment_answer;
  $check = $request->check;
  $resume = $request->resume;

  $tag_record = Tag::findOrFail($tag_id);
  if ($resume_selected_id === null) {
  $resume_name = RecruitResume::where('id', $resume)->where('user_id',$user->id)->where('status', 1)->first();
  }else{
$resume_name = RecruitResume::where('id', $resume_selected_id)->where('user_id',$user->id)->where('status', 1)->first();
     // persist the jo  job_assessment_answers
  }
$document = Document::where('user_id', $user->id)->where('resume_id', $resume)->first();
// get educational Qualification name for display purposes 
$education = QualificationLevel::findOrFail($document->educational_level);
 
// fetch experience  
    $jobapplication = Application::firstOrNew(['user_id'=>$user->id, 'resume_id'=>$resume, 'tag_id'=>$tag_id]);
    $jobapplication->user_id = $user->id;
    $jobapplication->document_id = $document->id;
    $jobapplication->resume_id = $resume;
    $jobapplication->tag_id = $tag_id;
    $jobapplication->status = 1;
    $jobapplication->sorted = 0;
    $jobapplication->sort_by_category = 0;
    $jobapplication->created_at = $this->returnCurrentTime();
    $jobapplication->delete = 0;
    $jobapplication->years_of_experience = $document->years_of_experience;
    $jobapplication->city_id = $document->city_id;
    $jobapplication->region_id = $document->region_id;
    $jobapplication->gender = $document->gender;
    $jobapplication->age = $document->age;
    $jobapplication->nationality = $document->nationality;
    $jobapplication->d_employment_term = $document->d_employment_term;
    $jobapplication->educational_level = $document->educational_level;
    $jobapplication->qualification = $education->name;
    $jobapplication->career_level = $document->career_level;
    $jobapplication->relocate_nationaly = $document->relocate_nationaly;
    $jobapplication->availability = $document->availability;
    $jobapplication->minimum_salary = $document->minimum_salary;
    $jobapplication->yoe_range = $document->yoe_range;
    $jobapplication->candidates_name = $document->candidates_name;
    $jobapplication->email = $document->email;
    $jobapplication->clientfk = $tag_record->client;
    $jobapplication->save();
    $count = 0;

  foreach ($job_assessment_id as $key => $question) {
$answer = new JobAssessmentAnswer;
$answer->quesion_id = $question;
$answer->job_id = $tag_id;
$answer->job_application_id = $jobapplication->id;
$answer->answer = $job_assessment_answer[$count++];
$answer->created_at = $this->returnCurrentTime();
$answer->save();
}

$this->CompareRequirments($resume, $tag_id);

$this->CheckNumberOfApplicationPerJob($tag_id, $jobapplication);

return redirect()->route('application.success', $tag_id);
} catch (\Exception $e) {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'something went wrong');
   return redirect()->back()->withErrors($e->getMessage());
       Session::flash('error', $e->getMessage()); 
}
 return redirect()->back();
}



public function CheckNumberOfApplicationPerJob($job,$application)
{
  // dd($application);
 $check_job_application = new ControlApplication;
 $check_job_application->job_id = $job;
 $check_job_application->application_id = $application->id;
 $check_job_application->status = 1;
 $check_job_application->save();

return $application;
}

public function ApplicationSuccess($id)
{
   $get_Job_by_common_industries = $this->JobCommonByIndustries($id);
   $industry_professions = DB::table('industry_professions')->get();
   $employement_terms = DB::table('employement_terms')->get();
   $menus = $this->displayMenu();
  return view('candidate.application_success_page', compact('get_Job_by_common_industries', 'employement_terms', 'industry_professions', 'menus') , array('user' => Auth::user()));
}


  public function employer(Request $request)
  {
      $documents = Document::all();
      $industries = Industry::all(); 
      $allapplicants = Application::all();
  $users = DB::table('applications')->distinct()->get(); 
  $distinct_job_applications = Application::distinct('tag_id')->pluck('tag_id');
  $user = Auth::user();
    // get candidate by educational qualification  jobs_count
    $s = $request->input('s');
    $user = Auth::user();
    $tag_fk_record = DB::table('documents')
             ->select('tag_fk', DB::raw('count(*) as total'))
             ->groupBy('tag_fk')->get();
    $educational_level = DB::table('documents')
             ->select('educational_level', DB::raw('count(*) as total'))
             ->groupBy('educational_level')->get();
    $unsorted = DB::table('documents')
             ->select('educational_level', DB::raw('count(*) as total'))
             ->groupBy('educational_level')->get();
     $jobs_byemployer = Tag::where('delete',0)->latest()->paginate(10);

    $jobs_count = Tag::where('client', $user->id)->count(); 
  
  
    $job_draft_count = Tag::where('client', $user->id)->where('draft', 1)->where('delete',0)->where('active', 0)->where('status',0)->count();
    $jobs_draft_list = Tag::where('client', $user->id)->where('draft', 1)->where('delete',0)->where('active', 0)->where('status',0)->latest()->paginate(10);
    $job_awaiting_approval_count = Tag::where('client', $user->id)->where('awaiting_aproval',1)->where('active', 0)->where('status', 0)->where('delete',0)->count();
    $jobs_awaiting_approval_list = Tag::where('client', $user->id)->where('awaiting_aproval', 1)->where('active', 0)->where('status', 0)->where('delete',0)->latest()->paginate(10);
    $job_blacklist_count = Tag::where('client', $user->id)->where('status',3)->where('delete', 1)->count();
    $job_black_list = Tag::where('client', $user->id)->where('status', 3)->where('delete', 1)->latest()->paginate(10);
    $job_active_list = Tag::where('client', $user->id)->where('status', 1)->where('active', 1)->where('awaiting_aproval', 0)->where('delete',0)->latest()->paginate(10);
    $job_activelist_count = Tag::where('client', $user->id)->where('status', 1)->where('active', 1)->where('awaiting_aproval', 0)->where('delete',0)->count();
    $job_not_active_list = Tag::where('client', $user->id)->where('status', 2)->where('active', 2)->where('awaiting_aproval', 0)->where('delete', 0)->latest()->paginate(10);
    $job_not_activelist_count = Tag::where('client', $user->id)->where('status', 2)->where('active', 2)->where('awaiting_aproval', 0)->where('delete', 0)->count();
    $dt = Carbon::now();
    $unsorted_count = DB::table('applications')
             ->select('tag_id', DB::raw('count(*) as total'))
             ->groupBy('tag_id')->get();
  //$tagss = Tag::find(20)->applications;
  // $number_of_applicants_per_job = DB::table('tags')->join('applications', 'applications.tag_id', '=', 'tags.id') ->get();
          //  dd($number_of_applicants_per_job);
   // find by job get the total count
 // get all applications by a user
   // $usersss = User::find(75)->applications;

    //$application_count = DB::table('control_applications')->get();
//$applications = Application::where('in_review', 0)->where('tag_id',$tag_id)->count();

 $app_count= DB::table('control_applications')
             ->select('job_id', DB::raw('count(*) as total'))
             ->groupBy('job_id')->get();
    //dd($app_count);
    $tag_record= DB::table('applications')
             ->select('tag_id', 'in_review', DB::raw('count(*) as total'))
             ->groupBy('tag_id', 'in_review')->get();

// dd($tag_record); 
    $tags = Tag::where('client', $user->id)->get();
$applications = Application::where('clientfk', $user->id)->get();
$applications_employer = DB::table('applications')->where('clientfk', $user->id)->get(); 
    $sorted = $applications->where('sorted', 0);
    $in_review = $applications->where('in_review', 1);
    $hired = $applications->where('hired', 1);
    $rejected = $applications->where('rejected', 1);
    $offered = $applications->where('offered', 1);
    $shortlisted = $applications->where('shortlisted', 1);
    $applications_employer_job_id_sorted = DB::table('applications')->where('tag_id', 20)->where('clientfk', $user->id)->where('sorted', 0)->count(); 
    $applications_employer_job_id_hired = DB::table('applications')->where('tag_id', 20)->where('clientfk', $user->id)->where('hired', 1)->count(); 
    $applications_employer_job_id_rejected = DB::table('applications')->where('tag_id', 20)->where('clientfk', $user->id)->where('rejected', 1)->count();
    $applications_employer_job_id_offered = DB::table('applications')->where('tag_id', 20)->where('clientfk', $user->id)->where('offered', 1)->count();
    $applications_employer_job_id_inreview = DB::table('applications')->where('tag_id', 20)->where('clientfk', $user->id)->where('in_review', 1)->count();    
    $usersss = Application::find(20)->tag;
    //get 
   $groups_count = DB::table('applications')->where('clientfk', $user->id)
             ->select('in_review', 'tag_id', 'hired', 'rejected', 'offered', 'shortlisted', 'sorted', DB::raw('count(*) as total'))
             ->groupBy('tag_id','in_review', 'hired', 'rejected', 'offered', 'shortlisted', 'sorted')->get(); 
  // dd($data);
    $hired_count = DB::table('applications')->where('hired', 1)->where('clientfk', $user->id)->sum('hired');
    $hired_ = DB::table('applications')->where('hired', 1)->where('clientfk', $user->id)->get();
    $offered_count = DB::table('applications')->where('sorted',1)->where('offered', 1)->where('clientfk', $user->id)->count();
    $rejected_count = DB::table('applications')->where('rejected', 1)->where('clientfk', $user->id)->count();
    $shortlisted_count = DB::table('applications')->where('shortlisted', 1)->where('clientfk', $user->id)->count();
    // $unsorted_count = DB::table('applications')->where('sorted', 0)->where('clientfk', $user->id)->count();
    $in_review_count = DB::table('applications')->where('in_review', 0)->where('clientfk', $user->id)->count();
    $unsorted_count = DB::table('applications')->where('sorted', 0)->where('clientfk', $user->id)->count();
    $employement_terms = DB::table('employement_terms')->get();

    $industries = Industry::all();
    $professions = IndustryProfession::all();
    $cities = City::all();
    $educational_levels = $this->GetQualificationLevels(); 
    // get all records
    $sort_categories_list = DB::table('sort_categories')->get();
    $educational_qualifications = $this->GetQualificationLevels();
    $employement_terms = DB::table('employement_terms')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->get();
    $users = User::all();
    // get candidates Resume
    $menus = $this->displayMenu();
    $units = $this->displayUnits();
    return view('employer',compact('tag_fk_record', 'educational_level', 'unsorted', 'jobs_byemployer', 'employement_terms', 'jobs_count', 'professions', 'cities', 'employement_terms', 's', 'jobs_draft_list', 'job_draft_count', 'job_awaiting_approval_count', 'jobs_awaiting_approval_list', 'job_blacklist_count', 'job_black_list', 'job_activelist_count', 'job_active_list', 'job_not_active_list', 'job_not_activelist_count', 'groups_count', 'allapplicants', 'unsorted_count', 'dt', 'hired_count', 'offered_count', 'rejected_count', 'shortlisted_count', 'in_review_count', 'groups_count', 'hired_', 'tag_record', 'applications_employer', 'distinct_job_applications', 'sorted', 'menus', 'units', 'app_count', 'tags'), array('user' => Auth::user()));
  }

  public function ShowCandidateCV($id)
  {
          ///dd($resume_id->id);
        $user = Auth::user();
            
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now();
        $documents = Document::all()->count();
        $users = User::all()->count();
         // get all year
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        //get educational_levels
        $educationallevels = $this->GetQualificationLevels(); 
        $employementterms = DB::table('employement_terms')->get();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        //$resumes = RecruitResume::all();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get(); // fresh user pass this test 20/10/2018
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
         //dd($resumes);
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->where('id', $resume_id->id)->first();
       // dd($user_single_resume_by_date);
        $career = CareerSummary::where('userid', $user->id)->where('resume_id', $resume_id->id)->first();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
      //  $industries = Industry::all();
        $industries =  DB::table('industries')->get();
        // get Educational History
        $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $resume_id->id)->get();
        ///dd($educationaList);
        // get Work History
        $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $resume_id->id)->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        $awards = Award::where('user_id', $user->id)->get();
               // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
        $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
        $job_category_list = $this->GetJobcategory();
    
        $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
        'documents' => $documents,
        'resumes_by_user' => $resumes_by_user,
        'industries' => $industries,
        'employement_terms' => $employementterms,
        'educationallevels' => $educationallevels,
        'jobskills' => $jobskills,
        'job_by_candidate_list' => $job_by_candidate_list,
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
 

    public function TabularResume()
    {
        $user = Auth::user();
        if ($user) {
            
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();

        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
        $document = Document::Where('user_id', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        ///dd($educationaList);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
          $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
   // dd($referee_list);
     $profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
            return view('candidate.freshertemplates.tabular_resume', compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'referee_list', 'profile_pix'), array('user' => Auth::user()));
               // return view('candidate.freshertemplates.tabular_resume', array('user' => Auth::user()));
        }else{
                return redirect('/login');
        }
        
       return redirect()->back();
    }

    public function TabularPDF()
    {
         $user = Auth::user();
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();

        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
        $document = Document::Where('user_id', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        ///dd($educationaList);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();
        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
          $referee_list = $this->GetRefereers($user_single_resume_by_date->id);

     $pdf = PDF::loadView('candidate.PDF.tabular_pdf',  compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'regions', 'referee_list')); 
      return $pdf->download('tabular_resume.pdf');  
    }

// classic Template
    public function Classic()
    {
        $user = Auth::user();
        if ($user) { 
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();

        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
        $document = Document::Where('user_id', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        ///dd($educationaList);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);
        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();

        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
          $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
          return view('candidate.freshertemplates.classic', compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'referee_list'), array('user' => Auth::user()));
           // return view('candidate.freshertemplates.classic', array('user' => Auth::user()));
        }else{

          return redirect('/login');

        }
        return redirect()->back();
    }

public function GetRefereers($resume_id)
{
    $user = Auth::user();
    $referee_list = Referee::where('user_id', $user->id)->where('resume_id', $resume_id)->get();
    return $referee_list;
}
public function AddReferees(Request $request)
{
   
    // get current user
    $user = Auth::user();
    // get request values 

    $resume = $request->resume;
    $referee_name = $request->referee_name;
    $position = $request->position;
    $office_address = $request->office_address;
    $phonenumber_re = $request->phonenumber_re;
    $refereer_email = $request->refereer_email;

    if ($referee_name !=null && $position !=null && $office_address !=null && $phonenumber_re !=null) {
       // dd($request->all());
        $referee_record = Referee::firstOrNew(['name'=>$referee_name]);
        $referee_record->name =  $referee_name;
        $referee_record->user_id = $user->id;
        $referee_record->office_address = $office_address;
        $referee_record->phone_number = $phonenumber_re;
        $referee_record->position = $position;
        $referee_record->resume_id = $resume;
         $referee_record->email = $refereer_email;
        $referee_record->created_at = $this->returnCurrentTime();
        $referee_record->save();
            Session::flash('success', 'Done successfully'); 
    }else{

       Session::flash('error', 'something went wrong'); 
    }
 
  return redirect()->back();
}

public function EditReferees($id)
{
$referee = Referee::findOrFail($id);

  return view('candidate.edit_refereers', compact('referee') , array('user' => Auth::user()));
}


public function DeleteReferee($id)
{
   if ($id) {

    $referee = Referee::findOrFail($id);
    $referee->remove();
       # code...
   }else{
    Session::flash('error', 'something went wrong');
   }
   return redirect()->back();
}

public function UpdateReferees(Request $request)
{ 

    // get current user
    $user = Auth::user();
    // get request values 
    $referee_id = $request->referee_id;
    $resume = $request->resume;
    $referee_name = $request->referee_name;
    $position = $request->position;
    $office_address = $request->office_address;
    $phone_number = $request->phone_number;
    $refereer_email = $request->refereer_email;

    if ($referee_id !=null && $referee_name !=null && $position !=null && $office_address !=null && $phone_number !=null && $refereer_email !=null) {
         // dd($request->all());
        $referee_record = Referee::findOrFail($referee_id);
        $referee_record->name =  $referee_name;
        $referee_record->user_id = $user->id;
        $referee_record->office_address = $office_address;
        $referee_record->phone_number = $phone_number;
        $referee_record->position = $position;
        $referee_record->resume_id = $resume;
        $referee_record->email = $refereer_email;
        $referee_record->updated_at = $this->returnCurrentTime();
        $referee_record->save();
        Session::flash('success', 'Done successfully'); 
    }else{

       Session::flash('error', 'something went wrong'); 
    }
 
  return redirect()->back();
}


    public function ClassicPDF(Request $request)
    {
         $user = Auth::user();
         $resume_id = $request->resume_id;
            
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass

       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
      // dd($career);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);

        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();

        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
  // dd($job_category_list);
   $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
        //get educational_levels


      
    $pdf = PDF::loadView('candidate.PDF.classic_pdf',  compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'regions', 'referee_list')); 
      return $pdf->download('classic_resume.pdf');  
    }
// End Classic Template

    public function IIT()
    {
        
        return view('candidate.freshertemplates.iit', array('user' => Auth::user()));
    }

    public function StandardPDF(Request $request)
    {
          $user = Auth::user();
         $resume_id = $request->resume_id;
            
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass

       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
      // dd($career);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);

        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();

        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
  // dd($job_category_list);
   $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
        //get educational_levels


      
    $pdf = PDF::loadView('candidate.PDF.standard_pdf',  compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'regions', 'referee_list')); 
      return $pdf->download('standard_resume.pdf');  
         
    }

    public function Standard(){
        $user = Auth::user();
        if ($user) { 
            
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();

        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
        $document = Document::Where('user_id', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        ///dd($educationaList);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);

        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();

        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
          $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
        //get educational_levels 
        return view('candidate.freshertemplates.standard', compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'referee_list'), array('user' => Auth::user()));
           // return view('candidate.freshertemplates.classic', array('user' => Auth::user()));
        }else{
          return redirect('/login');
        }
        return redirect()->back(); 
    }

    public function Professional()
    {
        
        return view('candidate.freshertemplates.professional', array('user' => Auth::user()));
    }

    public function Professional2()
    {
        
        return view('candidate.freshertemplates.professional2', array('user' => Auth::user()));
    }

    public function TwoColumns()
    {
        
        return view('candidate.freshertemplates.two_columns', array('user' => Auth::user()));
    }
    public function LefPhoto()
    {
        
        return view('candidate.freshertemplates.left_photo', array('user' => Auth::user()));
    }

    public function RightPhoto()
    {
        
        return view('candidate.freshertemplates.right_photo', array('user' => Auth::user()));
    }
       public function Traditional()
    {
        
        return view('candidate.experienced.traditional', array('user' => Auth::user()));
    }
     
       public function ClassicExperiencedPDF(Request $request)
    {
              $user = Auth::user();
         $resume_id = $request->resume_id;
            
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();
        $document = Document::Where('user_id', $user->id)->first();
        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass

       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
      // dd($career);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);

        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();

        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
  // dd($job_category_list);
   $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
        //get educational_levels
      
    $pdf = PDF::loadView('candidate.PDF.classic_experienced_pdf',  compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 'job_category_list', 'regions', 'referee_list')); 
      return $pdf->download('classic_experienced_resume.pdf');  
       
    }

           public function ClassicExperienced()
    {
          $user = Auth::user();
        if ($user) { 
            
       // dd('it is our work  ooo');
        $dt = Carbon::now();
        $ddt = Carbon::now(); 
        $documents = Document::all()->count();
        $users = User::all()->count();
        $jobskills = JobSkill::where('userid', $user->id)->get();

        $industries =  DB::table('industries')->get();
        $recruityear_list = RecruitYear::all();
        $qualifications = Qualification::all();
        // $countries = Country::all();
        $job_career_levelList = JobcareerLevel::all();
        $educationallevels = $this->GetQualificationLevels();
        $employementterms = DB::table('employement_terms')->get();
        $jobcertifications = DB::table('job_certifications')->where('user_id', $user->id)->get();
        $person_info = PersonalInformation::where('user_id', $user->id)->first();
        //employement_terms employement_terms
        $industry_profession = DB::table('industry_professions')->get();
        // get Awards
        $awards = Award::where('user_id', $user->id)->get();
        $resumes = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->get();
        // fresh user test pass
        //$resumes = RecruitResume::where('user_id', $user->id)->having('status', '=', 1)->orderBy('status','DESC')->get();
        $user_resume_list = RecruitResume::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
       // fresh user test pass
        // check for candidates current resume
        $user_single_resume_by_date = RecruitResume::where('user_id', $user->id)->orderBy('status','DESC')->first();
        // fresh user test pass
        $document = Document::Where('user_id', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // dd($user_single_resume_by_date);
        try {
    $career = CareerSummary::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->first();
       // get Educational History
    $educationaList = JobEducation::where('userid', $user->id)->where('resume_id', $user_single_resume_by_date->id)->get();
        ///dd($educationaList);
        // get Work History
    $work_histories = WorkExperience::where('userfk', $user->id)->where('resumefk', $user_single_resume_by_date->id)->orderBy('present','DESC')->get();
           
        } catch (\Exception $e) { 
                return redirect()->route('show.cation');
            //dd('redirect to create caption page.');
        }
        // get 
        $job_by_candidate_list = $this->GetAvailableJobs();
        // dd($job_by_candidate_list);



        $users = $this->GetUsers();
        $countries = $this->GetCountries();
        $cities = $this->GetCities();
        $regions = DB::table('regions')->get();

        $tags = $this->Tags();
        $section_candidatelist = $this->GetCandidateSection($user_single_resume_by_date->id);
          $section_candidatelist_count = $this->GetCandidateSection($user_single_resume_by_date->id)->count();
 // dd($section_candidatelist_count);
          $job_category_list = $this->GetJobcategory();
          $referee_list = $this->GetRefereers($user_single_resume_by_date->id);
   // dd($referee_list);

        //get educational_levels 
 
            return view('candidate.experienced.expirenced_classic', compact('documents', 'users', 'resumes','industries', 'industry_profession', 'user_single_resume_by_date', 'document', 'career', 'jobskills', 'recruityear_list', 'qualifications', 'countries', 'educationaList', 'dt', 'ddt', 'job_career_levelList', 'work_histories', 'educationallevels', 'employementterms', 'jobcertifications', 'person_info', 'awards', 'job_by_candidate_list', 'tags', 'cities', 'section_candidatelist', 'section_candidatelist_count', 
                'job_category_list', 'referee_list'), array('user' => Auth::user()));
           // return view('candidate.freshertemplates.classic', array('user' => Auth::user()));
        }else{

          return redirect('/login');

        }
        return redirect()->back();
       
    }

        public function TwoColumns2()
    {
        
        return view('candidate.experienced.two_columns2', array('user' => Auth::user()));
    }

        public function Standard2()
    {
        
        return view('candidate.experienced.standard2', array('user' => Auth::user()));
    }
        public function Iconic()
    {
        
        return view('candidate.experienced.iconic', array('user' => Auth::user()));
    }

    public function Elegant()
    {

       return view('candidate.experienced.elegant', array('user' => Auth::user()));
    }

        public function BoldHeader()
    {

       return view('candidate.experienced.bold_header', array('user' => Auth::user()));
    }
    
    public function LeftSide()
    {

       return view('candidate.experienced.left_side', array('user' => Auth::user()));
    }

    public function RightSide()
    {
        return view('candidate.experienced.right_side', array('user' => Auth::user()));
    }

    public function StylishRed()
    {
    return view('candidate.experienced.stylish_red', array('user' => Auth::user()));
    }

    public function Hexagonal()
    {

     return view('candidate.creative.hexagon', array('user' => Auth::user()));

    }

    public function CreativeRed()
    {
    
    return view('candidate.creative.creative_red', array('user' => Auth::user()));
    }


    public function BlueArc()
    {
        # code...
        return view('candidate.creative.blue_arc', array('user' => Auth::user()));
    }
    public function Cards()
    {
        # code...
        return view('candidate.creative.cards', array('user' => Auth::user()));
    }
    public function BlueYellow()
    {
       
        return view('candidate.creative.blue_yellow', array('user' => Auth::user()));
    }


        public function RightPane()
    {
        # code...
        return view('candidate.creative.right_pane', array('user' => Auth::user()));
    }



}

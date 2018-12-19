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
use App\Region;
use App\City;
use App\JobCertification;
use App\PersonalInformation;
use App\ResumeBuilder;
use App\Award;
use App\Section;
use App\Profession;
use App\Tag;
use App\Client;
use App\IndustryProfession;
use App\Application;
use App\Planpackage;
use App\Menu;
use App\EmployerPackage; 
class EmployerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        // $this->middleware('role:superuser')->only('create');
    }
     

  public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function getCandidatesResume($id)
{
    if ($id) {
        $resume = RecruitResume::findOrFail($id);
        # code...
    }
    return $resume;
}
    public function index()
    {

        return view('employer.index');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response  $menus = $this->displayMenu();
     */
    public function create(){

    // $user = Auth::user();
    // $countries = DB::table('countries')->get();
    // $cities = DB::table('cities')->get();
    // $regions = DB::table('regions')->get();
    // $educational_levels = DB::table('educational_levels')->get();
    // $industries = DB::table('industries')->get();
    // $employement_terms = DB::table('employement_terms')->get();
    // $jobcareer_levels = DB::table('jobcareer_levels')->get();
    // $industry_professions = DB::table('industry_professions')->get();

    // $client = DB::table('clients')->where('user_id', $user->id)->first();

    // //dd($client);
 
    //       return view('employer.create', compact('tag','resumes','countries','cities', 'regions', 'educational_levels', 'industries', 'employement_terms', 'jobcareer_levels', 'industry_professions','job_requirements', 'job_assessments', 'client'), array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $name = $request->name;
        $phone_number = $request->phone_number;
        $website = $request->website;
        $category = $request->category;
        $description = $request->description;
        $p_country = $request->p_country;
        $p_region = $request->p_city;
        $p_city = $request->full_address;
        $full_address = $request->full_address;
        $founded_date = $request->founded_date;
        $facebook = $request->facebook;
        $twiiter = $request->twiiter;
        $googleplus = $request->googleplus;
        $youtube =  $request->youtube;
        $vimeo = $request->vimeo;
        $linkedin =  $request->linkedin;
      

        $rules = [
        'phone_number'=>'required|string',
        'website' =>'required|string',
        'category'=>'required|string',
        'description' => 'required|string',
        'p_country' => 'required', 
        'p_region' => 'required|string',
        'p_city' => 'required|string',
        'full_address' => 'required',
        'email' => 'required',
        'founded_date' => 'required',
     

        ];

        $input = Input::only(
        'phone_number',
        'website',
        'category',
        'description',
        'p_country', 
        'p_region',
        'p_city',
        'full_address',
        'email',
        'founded_date'
    );
       /// dd($request->all());
        $validator = Validator::make($input, $rules);

         if(!$validator)
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

try {

    $client = Client::firstOrNew(['name' => $request->input('name'), 'user_id' => $user->id]);
    $client->email = $request->input('email');
    $client->phone_number = $request->input('phone_number');
    $client->website = $request->input('website');
    $client->category = $request->input('category');
    $client->description = $request->input('description');
    $client->country = $request->input('p_country');
    $client->region = $request->input('p_region');
    $client->city= $request->input('p_city');
    $client->founded_date = $request->input('founded_date');
    $client->full_address = $request->input('full_address');
    $client->facebook = $request->input('facebook');
    $client->twitter = $request->input('twiiter');
    $client->googleplus= $request->input('googleplus');
    $client->vimeo= $request->input('vimeo');
    $client->linkedin = $request->input('linkedin');
    $client->user_id = $user->id;
    $client->created_at = $this->returnCurrentTime();
    $client->save();

 
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Done successfully!');
} catch (Exception $e) {
    $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'something is not right!');
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
 
    $countries = DB::table('countries')->get();
    $cities = DB::table('cities')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = DB::table('educational_levels')->get();
    $industries = DB::table('industries')->get();
    $employement_terms = DB::table('employement_terms')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->get();
    $industry_professions = DB::table('industry_professions')->get();
 
    $menus = $this->displayMenu();
    $units = $this->displayUnits();
 
    return view('employer.employer-dashboard-profile-setting', compact('tag','resumes','countries','cities', 'regions', 'educational_levels', 'industries', 'employement_terms', 'jobcareer_levels', 'industry_professions','job_requirements', 'job_assessments', 'menus', 'units'), array('user' => Auth::user()));
     
    }
//Our custom function.
function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
  
    public function Payment($id){

        $user = Auth::user();
        $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
        $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();

        $package_record = Planpackage::findOrFail($id);
 
      //If I want a 6-digit PIN code.
        $orderID = $this->generatePIN(4);
        $menus = $this->displayMenu();
        $units = $this->displayUnits();

        $employer_package = EmployerPackage::where('userfkp', $user->id)->where('status',1)->first();
        
        //dd($employer_package); s
        if ($employer_package->status === 1) {
        return redirect()->route('upgrade.package', $employer_package);
     
        } 

      return view('employer.kpgpayment', compact('package_record','recruit_profile_pix', 'recruit_profile_pix_list', 'menus', 'orderID', 'units') ,array('user' => Auth::user()));
    }

    // get Employers packages
    public function Packages(){
    
    $user = Auth::user();
    $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();

    // $plans = DB::table('employer_packages')->orderBy('created_at', 'ASC')->get();
     $employer_packages = EmployerPackage::where('userfkp', $user->id)->get();
    $menus = $this->displayMenu();
    $units = $this->displayUnits();
  
    return view('employer.employer_dashboard_packages', compact('recruit_profile_pix', 'recruit_profile_pix_list', 'employer_packages', 'menus', 'units') ,array('user' => Auth::user()));
    }


    public function showImageForm($id){
            if ($id) {
                        $user = User::findOrFail($id);
       $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
            } 

        //dd($recruit_profile_pix_list);
    $menus = $this->displayMenu();
    $units = $this->displayUnits();
        return view('employer.image_upload_form', compact('user', 'recruit_profile_pix_list', 'recruit_profile_pix', 'menus', 'units'), array('user' => Auth::user()));
    }

    public function UpdateProfilePix(Request $request){
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


public function SelectionImage(Request $request){

    $user = Auth::user();
    $image_id = $request->id;
 
      // $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('user_id', $user->id)->update(['status'=> 0, 'order'=> 0]);
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('user_id', $user->id)->get();
    // $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('id', $id)->first();

    foreach ($recruit_profile_pix as $key => $value) {
            //dd($value);
    // $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('user_id', $id)->first();
    $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('user_id', $user->id)->update(['status'=> 0, 'order'=> 0]);

           }
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('id', $image_id)->update(['status'=> 1, 'order'=> 1]);
    // dd($recruit_profile_pix);
    // $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('id', $id)->first();
    $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->where('id',$image_id)->orderBy('created_at', 'DESC')->first();
   // dd($recruit_profile_pix_list);
        // $response = array('status' => 'success', 'recruit_profile_pix_list' => $recruit_profile_pix_list);
        // return response()->json($response);
    return redirect()->back();
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
    $user = Auth::user();
    $countries = DB::table('countries')->get();
    $cities = DB::table('cities')->get();
    $regions = DB::table('regions')->get();
    $educational_levels = DB::table('qualification_levels')->get();
    $industries = DB::table('industries')->get();
    $employement_terms = DB::table('employement_terms')->get();
    $jobcareer_levels = DB::table('jobcareer_levels')->get();
    $industry_professions = DB::table('industry_professions')->get();

    $client = DB::table('clients')->where('user_id', $user->id)->first();
$recruit_profile_pix  = $this->showImageForm($id);
    //dd($client);
        $recruit_profile_pix_list = DB::table('recruit_profile_pixs')->where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
     $recruit_profile_pix = DB::table('recruit_profile_pixs')->where('status', 1)->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();

         $menus = $this->displayMenu();
    $units = $this->displayUnits();
          return view('employer.edit', compact('tag','resumes','countries','cities', 'regions', 'educational_levels', 'industries', 'employement_terms', 'jobcareer_levels', 'industry_professions','job_requirements', 'job_assessments', 'client', 'recruit_profile_pix', 'recruit_profile_pix_list', 'menus', 'units'), array('user' => Auth::user()));
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
        //

    $user = Auth::user();
        $phone_number = $request->phone_number;
        $website = $request->website;
        $category = $request->category;
        $description = $request->description;
        $p_country = $request->p_country;
        $p_region = $request->p_city;
        $p_city = $request->full_address;
        $full_address = $request->full_address;
        $founded_date = $request->founded_date;
        $facebook = $request->facebook;
        $twiiter = $request->twiiter;
        $googleplus = $request->googleplus;
        $youtube =  $request->youtube;
        $vimeo = $request->vimeo;
        $linkedin =  $request->linkedin;
        $email = $request->email;
      

        $rules = [
        'phone_number'=>'required|string',
        'website' =>'required|string',
        'category'=>'required|string',
        'description' => 'required|string',
        'p_country' => 'required', 
        'p_region' => 'required|string',
        'p_city' => 'required|string',
        'full_address' => 'required',
        'email' => 'required',
        'founded_date' => 'required',
     

        ];

        $input = Input::only(
        'phone_number',
        'website',
        'category',
        'description',
        'p_country', 
        'p_region',
        'p_city',
        'full_address',
        'email',
        'founded_date'
    );
       /// dd($request->all());
        $validator = Validator::make($input, $rules);

         if(!$validator)
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

try {

    $client = Client::findOrFail($id);
    $client->email = $request->input('email');
    $client->phone_number = $request->input('phone_number');
    $client->website = $request->input('website');
    $client->category = $request->input('category');
    $client->description = $request->input('description');
    $client->country = $request->input('p_country');
    $client->region = $request->input('p_region');
    $client->city= $request->input('p_city');
    $client->founded_date = $request->input('founded_date');
    $client->full_address = $request->input('full_address');
    $client->facebook = $request->input('facebook');
    $client->twitter = $request->input('twiiter');
    $client->googleplus= $request->input('googleplus');
    $client->vimeo= $request->input('vimeo');
    $client->linkedin = $request->input('linkedin');
    $client->user_id = $user->id;
    $client->updated_at = $this->returnCurrentTime();
    $client->save();

    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Done successfully!');
} catch (Exception $e) {
    $request->session()->flash('message.level', 'danger');
    $request->session()->flash('message.content', 'Can not locate Drive!');
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
        //
    }

    
//     public function ListCandidates(Request $request)
//     {
//         $s = $request->input('s');
//         $c = $request->input('c');
//         $documents = Document::latest()
//         ->search($s)
//         ->paginate(20);
        
//         $industries = Industry::latest()->search($s)->paginate(10);
//         $professions = Profession::latest()->search($s)->paginate(10);
//         $cities = City::latest()->search($c)->paginate(10);
//         // get all records
//         $sort_categories_list = DB::table('sort_categories')->get();
//         $educational_qualifications = DB::table('educational_levels')->get();
//         $employement_terms = DB::table('employement_terms')->get();
//         $jobcareer_levels = DB::table('jobcareer_levels')->get();


//         $user_info_application = DB::table('documents')
//              ->select('tag_fk', DB::raw('count(*) as total'))
//              ->groupBy('tag_fk')->get();
//             // dd($user_info);

// //  foreach ($documents as $key => $value) {
// //      # code...
// // // new Carbon($date_of_birth)->diffInYears(\Carbon::now());
// //     dd(new Carbon($value->date_of_birth)->diff(\Carbon::now());
// //  }
//         //get age from employees
//         //get employee by Qualification
//         //get employee by Experience
//         // get employee by  location
//         // get employee by Profession
//         // get employee by job type

//        return view('employer.candidates_listing', compact('documents', 'industries', 'employement_terms', 'educational_qualifications', 'jobcareer_levels', 'professions', 's', 'cities', 'c'), array('user' => Auth::user()));
//     }
}

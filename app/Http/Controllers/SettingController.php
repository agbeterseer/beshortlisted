<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Session;
use App\Setting;
use Validator;
use App\EmailTemplate;
use Auth;
use App\Industry;
use Carbon\Carbon;
use App\Profession;
use App\DocumentProfession;
use App\Client;
use App\IndustryProfession;
use DB;
use App\Qualification;
use App\FieldsOfStudy;
use App\Contact;
use Input;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Requests\CreateCardRequest;
use App\EmployerCard;
use App\Menu;

class SettingController extends Controller
{
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        $emails = EmailTemplate::all(); 
        return view('admin.settings', compact('settings', 'emails'), array('user' => Auth::user()));
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
        //
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
        //dd($id);
        $setting = Setting::findOrFail($id);

        // $request->validate([
        //   'logo' => 'image|mimes:jpeg,png,jpg',
        //   'favicon' => 'mimes:ico'
        // ]);
        // validate the input
$validation = Validator::make( $request->all(), [
        'logo' => 'image|mimes:jpeg,png,jpg',
          'favicon' => 'mimes:ico'
]);

// redirect on validation error
        if ( $validation->fails() ) {
            // change below as required
            return \Redirect::back()->withInput()->withErrors( $validation->messages() );
        } 
        $input = $request->all(); 
        if ($file = $request->file('logo')) {

          $name = 'logo_'.time().$file->getClientOriginalName();
          unlink(public_path().'/images/logo/'.$setting->logo);
          $file->move('images/logo/', $name);
          $input['logo'] = $name; 
        } 
        if ($file2 = $request->file('favicon')) { 
            $name2 = $file2->getClientOriginalName();
            unlink(public_path().'/images/logo/'.$setting->favicon.'.ico');
            $file2->move('images/logo/', $name2);
            $input['favicon'] = $name2; 
        }

        $setting->update($input);
        return back()->with('updated', 'Settings have been saved');

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

public function createFeildsOfStudy()
{
    return view('admin.feildsofstudy.addfields',array('user' => Auth::user()));
}

public function showFeildsOfStudyList()
{
    return view('admin.feildsofstudy.addfields',array('user' => Auth::user()));
}

public function AddFieldsOfStudy(Request $request)
{
   //dd($request->all());
    $title = $request->title;
    $displayname = $request->displayname; 
    $rules = [
                'title' => 'required|string',
                'displayname' => 'required|string', 
        ];
 
        $input = Input::only(
        'title',
        'displayname' 
    );
    // dd($request->all());
    $this->validate($request, $rules); 
    //dd($request->all());
try {
        if ($title !=null && $title !='' && $displayname !=null && $displayname !='' ) {
       
        $study = FieldsOfStudy::firstOrNew(['fields' =>$title]); 
        $study->fields = $title;
        $study->status = 0;
        $study->display_name = $displayname;
        $study->created_at = $this->returnCurrentTime();
        $study->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'done successfully!'); 
    }
  
} catch (\Exception $e) {
     return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']);
    $request->session()->flash('message.level', 'error');
    $request->session()->flash('message.content', 'cannot creat records!'); 
}

return redirect()->back();
        # code...
}
public function UpdateFieldsOfStudy($value='')
{
    # code...
}

public function RemoveFieldsOfStudy($value='')
{
    # code...
}


    public function showIndustrySettings()
    {
        $industries = Industry::orderBy('created_at', 'DESC')->get();
        $industry_count = Industry::count();
        $professions = Profession::all();
        $professions_count = Profession::count();
        $qualifications = Qualification::count();
        return view('admin.tags.job_post_settings', compact('industries', 'industry_count', 'professions', 'professions_count', 'qualifications'), array('user' => Auth::user()));
    }


public function AddIndustry(Request $request)
    {
  //dd($request->all());

    $name = $request->name;

    if ($name !=null && $name !="") {
        # code...
        $industry = Industry::firstOrNew(['name' => $request->name]);
        $industry->name = $name;
        $industry->status = 1;
        $industry->created_at = $this->returnCurrentTime();
        $industry->save();
       // Session::flash('success', 'Done Successfully');
    }
    # code...
    return back()->with('added', 'Industry added Successfully');
}

public function UpdateIndustry(Request $request)
{
   //dd($request->all());
    $industry = $request->industry;
    $id = $request->id;

        $name = $request->name;

    if ($name !=null && $name !="") {
        # code...
        $industry = Industry::findOrFail($id);
        $industry->name = $name;
        $industry->status = 1;
        $industry->updated_at = $this->returnCurrentTime();
        $industry->save();
    }
    # code...
    return back()->with('added', 'Industry Added Successfully');
    # code...
}

public function AssignProfessionToIndustry(Request $request)
{
  
    $profession = $request->groupa;
    $industry = $request->industry;

    if ($industry !=null && $profession !=null) {
        
        $industry = Industry::findOrFail($industry);

        //$industry->profession = $industry->id;
       // $industry->name = 
 
        foreach ($profession as $key => $value) {
          $industry->name = $value['profession'];
           // dd($industry->id);

      
           $industryprofessions = DB::table('industry_professions')->insert(['name' => $value['profession'], 'industry_id' => $industry->id, 'status' => 1, 'created_at' => $this->returnCurrentTime()]);

            // $industry = IndustryProfession::firstOrNew(['name' => $value['profession']]);
            // $industry->name = $value['profession'];
            // $industry->industry_id = $industry;
            // $industry->created_at = $this->returnCurrentTime();
            // $industry->save(); 
        }
 
    }
    //$user->attachRole($role);


    return back()->with('added', 'Industry updated Successfully');
}

public function AddQaulification(Request $request)
{   
//dd($request->all());
    $name = $request->name;
try {

    if($name !=null && $name !=''){
    $qualify = new Qualification;
    $qualify->qualification = $name;
    $qualify->status = 1;
    $qualify->save();
    
    return back()->with('added', ' Added Successfully');
    }

    
} catch (Exception $e) {
     return back()->with('error', 'Cannot create records');
}
return redirect()->back();
  
}

public function previewForm($id)
{
  $countries = DB::table('countries')->get();
    $contacts = DB::table('contacts')->where('status',1)->get();
    return view('admin.contact.index', compact('countries', 'contacts'), array('user' => Auth::user()));
}
public function showContactForm(Request $request)
{
    $countries = DB::table('countries')->get();
    $contacts = DB::table('contacts')->get();
    return view('admin.contact.create', compact('countries', 'contacts'), array('user' => Auth::user()));
}

public function listContactForms(Request $request)
{
    $countries = DB::table('countries')->get();
    $contacts = DB::table('contacts')->get();
    return view('admin.contact.index', compact('countries', 'contacts'), array('user' => Auth::user()));
}

public function editContact($id)
{
        $countries = DB::table('countries')->get();
        $contact = Contact::findOrFail($id); 
        // dd($countries);
    return view('admin.contact.edit', compact('countries', 'contact'), array('user' => Auth::user()));
 
}
public function addContact (CreateContactRequest $request)
{ 
    try {
  DB::table('contacts')->where('status',1)->update(['status'=> 0]);
           $contact = new Contact; 
            $contact->fulladdress = $request->description;
            $contact->street_name = $request->street_name;
            $contact->state = $request->state;
            $contact->city = $request->city;
            $contact->country = $request->country;
            $contact->postalcode = $request->postal_code;
            $contact->phonenumber = $request->official_number;
            $contact->email = $request->email;
            $contact->status = 1;
            $contact->del = 0;
            $contact->created_at = $this->returnCurrentTime();
            $contact->save();
            Session::flash('success','Done successfully');
            return redirect()->route('show.contacts');
    } catch (Exception $e) {
            return redirect()->back()->withErrors(['error'=> 'something went wrong']); 
    } 
            return redirect()->back();
       return  redirect()->back();
}

public function updateContact(Request $request)
{
  //dd($request->all());
  $id = $request->id;
   // dd($id);
    try {
        if ($id) {
            $contact = Contact::findOrFail($id); 
            $contact->fulladdress = $request->description;
            $contact->street_name = $request->street_name;
            $contact->state = $request->state;
            $contact->city = $request->city;
            $contact->country = $request->country;
            $contact->postalcode = $request->postal_code;
            $contact->phonenumber = $request->official_number;
            $contact->email = $request->email; 
            $contact->updated_at = $this->returnCurrentTime();
            $contact->save();
            Session::flash('success','Done successfully');
            return redirect()->route('show.contacts');
        }

    } catch (Exception $e) {
            return redirect()->back()->withErrors(['error'=> 'something went wrong']); 
    } 
            return redirect()->back();
 
       return  redirect()->back();
}




public function deleteContact(Request $request)
{
  $id = $request->delete;
      if ($id) {
    $contact = Contact::findOrFail($id);
    $contact->status = 3;
    $contact->save();
    Session::flash('success','Contact has been deleted successfully');
    }else{
    return  redirect()->back()->with('message','ID is required');
    }
      return  redirect()->back();
}

public function PublishContactForm($id)
{
    //dd($id);
    if ($id) {
        $contacts = Contact::where('status',1)->get();
        foreach ($contacts as $key => $value) { 
            DB::table('contacts')->update(['status'=> 0]);
            }
 $contact = Contact::findOrFail($id);
 $contact->status = 1;
 $contact->save(); 
  Session::flash('success','contact published successfully');
  return  redirect()->back();
    } 
  return  redirect()->back();
}



public function AddCard(CreateCardRequest $request)
{
//dd($request->all());
  $user = Auth::user();
  $addcard = EmployerCard::firstOrNew(['card_number'=>$request->card_number]);
  $addcard->card_number = $request->card_number;
  $addcard->expiration_date = $request->expiration_date;
  $addcard->card_holder_name = $request->card_holder_name;
  $addcard->cvv = $request->cvv;
  $addcard->status = 1;
  $addcard->user_fk = $user->id;
  $addcard->save(); 
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Done successfully!');
  return  redirect()->back();
}

public function UpdateCard(UpdateCardRequest $request)
{
  //dd($request->all());
  $id = $request->id;
  $user = Auth::user();
  $addcard = EmployerCard::findOrFail($id);
  $addcard->card_number = $request->card_number;
  $addcard->expiration_date = $request->expiration_date;
  $addcard->card_holder_name = $request->card_holder_name;
  $addcard->cvv = $request->cvv;
  $addcard->status = 1;
  $addcard->user_fk = $user->id;
  $addcard->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Done successfully!');
  return  redirect()->back();
}

public function CreateCard(Request $request, $id)
{ 
  return view('employer.create_card');
}

public function viewAllCards(Request $request, $id)
{ 
  return view('employer.create_card');
}

public function UploadIndexbanner(Request $request)
{
  # code...extra-images/banner-bg.jpg
  return view('');
}


}
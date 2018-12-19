<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Input;
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
        $industries = Industry::all();
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




}

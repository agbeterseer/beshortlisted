<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use Auth;
use Input;
use Validator;
use App\AboutUs;
use Carbon\Carbon;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $user = Auth::user(); 
        $about_us = DB::table('aboutuses')->get();
        return view('admin.aboutus.index', compact('user', 'about_us'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.aboutus.create', array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $history = $request->history;
        $mission = $request->mission;
        $vision = $request->vision;
        $philosophy = $request->philosophy;
        $core_values = $request->core_values;

        if ($history !=null && $history !="") {
          $about = new AboutUs;
          $about->history = $history;
          $about->values = $core_values;
          $about->philosophy = $philosophy;
          $about->vision = $vision;
          $about->mission = $mission;
          $about->created_at = $this->returnCurrentTime();
          $about->save();
          Session::flash('success', 'Done successfully!');
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
            $user = Auth::user(); 
            $about = AboutUs::findOrFail($id);
         return view('admin.aboutus.show', compact('user', 'about'), array('user' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user(); 
        $about = AboutUs::findOrFail($id);
         return view('admin.aboutus.edit', compact('user', 'about'), array('user' => Auth::user()));
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
        $history = $request->history;
        $mission = $request->mission;
        $vision = $request->vision;
        $philosophy = $request->philosophy;
        $core_values = $request->core_values;


            $about = AboutUs::findOrFail($id);
          $about->history = $history;
          $about->values = $core_values;
          $about->philosophy = $philosophy;
          $about->vision = $vision;
          $about->mission = $mission;
          $about->updated_at = $this->returnCurrentTime();


        if ($request->hasFile('top_banner')) {
       $banner = $request->file('top_banner');
       $rules = [
        '_token'=>'required',
        'banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];
        $input = Input::only(
        '_token',
        'banner'
        );
          $validator = Validator::make($input, $rules);
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $filename = time() . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('/uploads/banners/'), $filename);

          $about->banner = $filename;
        }else{

            $about->save();
          Session::flash('success', 'Done successfully!');

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
        if ($id) { 
       DB::table("aboutus")->where('id',$id)->delete();
       Session::flash('success','Aboutus has been deleted successfully');
        } 
      return redirect()->back()->withMessage('ID not found');
    }
}

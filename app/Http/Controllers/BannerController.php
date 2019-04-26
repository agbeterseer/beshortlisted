<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use Auth;
use Input;
use Validator;
use App\Banner;
use Carbon\Carbon;

class BannerController extends Controller
{
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
        //
        $user = Auth::user(); 
        $banners = DB::table('banners')->get();
         return view('admin.banner.index', compact('user', 'banners'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create', array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get data
        //dd($request->all());
        $name = $request->name;
        $caption = $request->caption;
        $caption2 = $request->caption2; 
        try {
        // get the file from request
        $banner = $request->file('banner');
        // set the rules 
        $rules = [
        '_token'=>'required',
        'banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'banner'
        );
        // check if matches the required size and file type
        $validator = Validator::make($input, $rules); 
         if(!$validator)
        {
        Session::flash('error-banner', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
      } catch (\Exception $e) {
        Session::flash('error-banner', $e->getMessage());
      }
      // check if the file in the request is actually a file
    if ($request->hasFile('banner')) {
        $filename = time() . '.' . $banner->getClientOriginalExtension();

        Image::make($banner)->save(public_path('/uploads/banners/' . $filename));
        // create the banner
        $save_banner = new Banner;
        $save_banner->name = $name;
        $save_banner->caption_one = $caption;
        $save_banner->caption_two = $caption2;
        $save_banner->banner = $filename; 
        $save_banner->created_at = $this->returnCurrentTime();
        $save_banner->status = 1;
        $save_banner->save();

        Session::flash('success', 'Done successfully');
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
        //get single instance of Banner model

        $banner = Banner::findOrFail($id);
        return view('admin.banner.show', compact('banner'), array('user', Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get single instance for record update
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'), array('user', Auth::user()));
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
        //($request->all());
         $name = $request->name;
        $caption = $request->caption;
        $caption2 = $request->caption2; 
        try {
        // get the file from request
        $banner = $request->file('banner');
        // set the rules 
        $rules = [
        '_token'=>'required',
        'banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'banner'
        );
        // check if matches the required size and file type
        $validator = Validator::make($input, $rules); 
         if(!$validator)
        {
        Session::flash('error-banner', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
      } catch (\Exception $e) {
        Session::flash('error-banner', $e->getMessage());
      }
      // check if the file in the request is actually a file
    if ($request->hasFile('banner')) {
        $filename = time() . '.' . $banner->getClientOriginalExtension();

        Image::make($banner)->save(public_path('/uploads/banners/' . $filename));
        // create the banner
        $save_banner = Banner::findOrFail($id);
        $save_banner->name = $name;
        $save_banner->caption_one = $caption;
        $save_banner->caption_two = $caption2;
        $save_banner->banner = $filename; 
        $save_banner->created_at = $this->returnCurrentTime();
        $save_banner->save();

        Session::flash('success', 'Done successfully');
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
       DB::table("banners")->where('id',$id)->delete();
       Session::flash('success','Banner has been deleted successfully');
        } 
      return redirect()->back()->withMessage('ID not found');
    }
}

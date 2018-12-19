<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Region;
use App\City;
use App\Profession;
use App\DocumentProfession;
use App\SortCategory;
use Auth;
use \Storage;
use Response;
use PDF;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ShortlistController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $s = $request->input('s');
//dd($request->all());
        $documents = Document::latest()
        ->search($s)
        ->paginate(20);
        // $shortlist = DB::table('documents')->get();
        // $documents = Document::all();

        $professions = Profession::all();
        $cities = City::all();

        return view('admin.shortlist.index', compact('documents', 's', 'cities', 'professions' ), array('user' => Auth::user()));
    }


    public function EmployerShortlistPage()
    {
      # code...
      return view('employer.candidates_listing', array('user' => Auth::user()));
    }


    public function FilterByRedOrBlueOrGreenOrYellow(Request $request, $id)
    {
        // $s = $request->input('red');
        // if ($s === 'red') {
        //     # code...
        // }
        # code...
         //$shortlist = DB::table('documents')->where()get();
        return view('admin.shortlist.filter_shortlist', array('user' => Auth::user()));
    }
  // $city= $request->city;
  //       $region = $request->region;
  //       $location = $request->location;
  //       $professionsList = $request->profession;
  //       $years_of_experience = $request->years_of_experience;


  //       foreach ($professionsList as $key => $profession) {
  //          $profession = $profession;
               
  //       }

  //       $profession_name = Profession::find($profession)->name;

  //       $locations = DB::table('cities')->where('name', $location)->get();

  //       foreach ($locations as $key => $location) {
  //         $location_id = $location->id;
      
  //       }
  //       $city_name = City::find($location_id)->name;
  //           $s = '';
  //        // $documents = Document::search($s)->paginate(20);
  //           // $documents = Document::all();
  //    $documents = DB::table('documents')->where('years_of_experience', $years_of_experience)
  //                                       ->where('region_id', $region)->where('city_id', $location_id)->get();

  //   $document_profession = DB::table('document_profession')->get();
  
    
  //       $cities = City::all();
  //       $regions = Region::all();
  //       $professionsList = Profession::all();


    public function FilterByRed(Request $request)
    {
        //dd($request->all());
        $s = $request->input('red');
        // $documents = Document::latest()
        // ->search($s)
        // ->paginate(20);
        $professions = Profession::all();
        $cities = City::all();
        $red = $request->red;
        $shortlist = DB::table('documents')->where('red', $s)->paginate(20);
      //  dd($shortlist);
         return view('admin.shortlist.filter_shortlist', compact(['shortlist', 's', 'red','cities', 'professions']), array('user' => Auth::user()));
    }

    public function FilterByBlue(Request $request)
    {
       
        $s = $request->input('blue');
         //dd($s);
        // $documents = Document::latest()
        // ->search($s)
        // ->paginate(20);
        $professions = Profession::all();
        $cities = City::all();
        $blue = $request->blue;
        $shortlist = DB::table('documents')->where('blue', $s)->paginate(20);
          return view('admin.shortlist.filter_shortlist', compact(['shortlist', 's', 'red','cities', 'professions']), array('user' => Auth::user()));
    }


    public function FilterByGreen(Request $request)
    {
      //  dd($request->all());
        $s = $request->input('green');
        // $documents = Document::latest()
        // ->search($s)
        // ->paginate(20);
        $professions = Profession::all();
        $cities = City::all();
        $green = $request->green;
        $shortlist = DB::table('documents')->where('green', $s)->paginate(20);
          return view('admin.shortlist.filter_shortlist', compact(['shortlist', 's', 'red','cities', 'professions']), array('user' => Auth::user()));
    }

    public function FilterByYellow(Request $request)
    {
     // dd($request->all());
           //dd($request->all());
        $s = $request->input('yellow');
        // $documents = Document::latest()
        // ->search($s)
        // ->paginate(20);
        $professions = Profession::all();
        $cities = City::all();
        $yellow = $request->yellow;
        $shortlist = DB::table('documents')->where('yellow', $s)->paginate(20);
        return view('admin.shortlist.filter_shortlist', compact(['shortlist', 's', 'red','cities', 'professions']), array('user' => Auth::user()));
    }

    public function FilterByUnsorted(Request $request)
    {
        $s = $request->input('sorted');
  //dd($request->all());
        $shortlist = DB::table('documents')->where('sorted',$s)->paginate(20)->appends(request()->query());
      //dd($shortlist->all());>where('red', '=', $s)->where('green', '=', $s)->where('yellow', '=', $s)->where('blue', '=', $s)
   // $shortlist = DB::table('documents')->get();
    
    return view('admin.shortlist.filter_shortlist', compact(['shortlist', 's', 'red','cities', 'professions']), array('user' => Auth::user()));
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
        dd($request->all());
        return redirect()->back();
    }


    public function SortByCategory($id, $document_id)
    {
 //   dd($id);
      # code...
 try {
        if ($document_id) {

        $document = Document::find($document_id);
        $document->sort_by_cat  = $id;
        $document->save();

       // dd($document);
        Session::flash('success', $id);
        }else{
           return redirect()->back()->withErrors(['error' => 'something went wrong']); 
        }
     
       } catch (Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           
       }

return redirect()->back();
    }



// method nolonger in use
    public function RedCV(Request $request, $id)
    {
      // dd($id);
       try {
        if ($id) {
        $document = Document::find($id);
        $document->red = 1;
        $document->blue = 0;
        $document->green = 0;
        $document->yellow = 0;
        $document->black = 0;
        $document->sorted =1;
        $document->save();
        Session::flash('success','CV marked Red');

      $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'document' => $document);
      return response()->json($response);

        }else{
           return redirect()->back()->withErrors(['error' => 'something went wrong']); 
        }
     
       } catch (Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           
       }

        return redirect()->back();
    }

        // method nolonger in use
        public function BlueCV(Request $request, $id) { 
       // dd($id);
       try {
        if ($id) {
        $document = Document::find($id);
        $document->red = 0;
        $document->blue = 1;
        $document->green = 0;
        $document->yellow = 0;
        $document->black = 0;
        $document->sorted =1;
        $document->save();
          Session::flash('success','CV marked Blue');

       $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'document' => $document);
      return response()->json($response);

        }else{
           return redirect()->back()->withErrors(['error' => 'something went wrong']); 
        }

     
       } catch (Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           
       }

        return redirect()->back();
    }

      // method nolonger in use
        public function GreenCV(Request $request, $id) {
        //dd($request->all());
        try {
        if ($id) {
        $document = Document::find($id);
        $document->red = 0;
        $document->blue = 0;
        $document->green = 1;
        $document->yellow = 0;
        $document->black = 0;
        $document->sorted =1;
        $document->save();

        Session::flash('success','CV marked Green');
       $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'document' => $document);
      return response()->json($response);

        }else{
           return redirect()->back()->withErrors(['error' => 'something went wrong']); 
        }
     
       } catch (Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           
       }
         return redirect()->back();
    }

    // method nolonger in use
    public function YellowCV(Request $request, $id)
    {
    // dd($id);
   try {
        if ($id) {
        $document = Document::find($id);
        $document->red = 0;
        $document->blue = 0;
        $document->green = 0;
        $document->yellow = 1;
        $document->black = 0;
        $document->sorted =1;
        $document->save();

          Session::flash('success','CV marked Yellow');
       $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'document' => $document);
      return response()->json($response);

        }else{
           return redirect()->back()->withErrors(['error' => 'something went wrong']); 
        }
     
       } catch (Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           
       }
        return redirect()->back();
    }


    public function BlackCV(Request $request, $id){
       dd($id);
    try {
        if ($id) {
        $document = Document::find($id);
        $document->red = 0;
        $document->blue = 0;
        $document->green = 0;
        $document->yellow = 0;
        $document->black = 1;
        $document->sorted =1;
        $document->save();

          Session::flash('success','CV marked Black');
       $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'document' => $document);
      return response()->json($response);

        }else{
           return redirect()->back()->withErrors(['error' => 'something went wrong']); 
        }
     
       } catch (Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           
       }

        return redirect()->back();
    }

    public function filterByColor(Request $request)
    {
      $filtercolor = $request->filtercolor;
      $filter_option = ['red', 'yellow', 'blue', 'green', 'black'];

      $documents = Document::where(function ($query) use ($filtercolor, $filter_option){
       if (isset($filtercolor)) {

        foreach ($filter_option as $key => $value) {
       
       if ($filtercolor === 'red') {
         $query->where('red', '=', 1);
       }

     if ($filtercolor === 'red') {
         $query->where('red', '=', 1);
       }
            if ($filtercolor === 'yellow') {
         $query->where('yellow', '=', 1);
       }
            if ($filtercolor === 'blue') {
         $query->where('blue', '=', 1);
       }
            if ($filtercolor === 'green') {
         $query->where('green', '=', 1);
       }
            if ($filtercolor === 'black') {
         $query->where('black', '=', 1);
       }


        }
        
    }             
        
      })->paginate(20);

$work_experiences = DB::table('work_experiences')
            ->join('documents', 'documents.resume_id', '=', 'work_experiences.resumefk')
            ->get();
$job_educations = DB::table('job_educations')
            ->join('documents', 'documents.resume_id', '=', 'job_educations.resume_id')
            ->select('job_educations.start_year', 'job_educations.end_month', 'job_educations.start_month', 'job_educations.end_month', 'job_educations.qualification', 'job_educations.school_name', 'job_educations.feild_of_study', 'job_educations.country', 'job_educations.userid', 'job_educations.resume_id')
            ->get();

        $cities = City::all();
        $countries = DB::table('countries')->get();
        $educational_levels = DB::table('qualification_levels')->get();
        // get all records
        $sort_categories_list = DB::table('sort_categories')->get();
        $educational_qualifications = DB::table('qualification_levels')->get();
        $employement_terms = DB::table('employement_terms')->get();
        $jobcareer_levels = DB::table('jobcareer_levels')->get();
        $image_url =url('/') . '/uploads/avatars/';
        


        $response = array( 'status' => 'success', 'msg' => 'Setting created successfully', 'documents' => $documents, 'work_experiences' => $work_experiences, 'countries'=>$countries, 'job_educations' => $job_educations, 'educational_levels' =>$educational_levels, 'educational_qualifications' => $educational_qualifications, 'employement_terms' => $employement_terms, 'jobcareer_levels' => $jobcareer_levels, 'cities' => $cities, 'image_url' => $image_url);
        return response()->json($response);
 
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
}

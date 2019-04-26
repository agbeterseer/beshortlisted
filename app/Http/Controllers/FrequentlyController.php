<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Auth;
use Input;
use Validator;
use App\AboutUs;
use App\Frequently;
use Carbon\Carbon;
class FrequentlyController extends Controller
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
        $frequents = DB::table('frequentlies')->get();
        return view('admin.frequently.index', compact('user', 'frequents'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user = Auth::user();  
        return view('admin.frequently.create', compact('user'), array('user' => Auth::user()));
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
    //dd($request->all());
    $question = $request->question;
    $answer = $request->answer;

    if ($question !=null && $answer !=null) {
       $frequent  = new Frequently;
       $frequent->question = $question;
       $frequent->answer = $answer;
       $frequent->created_at = $this->returnCurrentTime();
       $frequent->save();

       Session::flash('success', 'Done successfuly');
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
        $user = Auth::user();  
        $frequent  = Frequently::findOrFail($id);
        return view('admin.frequently.show', compact('user', 'frequent'), array('user' => Auth::user()));
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
        $frequent  = Frequently::findOrFail($id);
        return view('admin.frequently.edit', compact('user', 'frequent'), array('user' => Auth::user()));
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
    $question = $request->question;
    $answer = $request->answer;

    if ($question !=null && $answer !=null) {
       $frequent  = Frequently::findOrFail($id);
       $frequent->question = $question;
       $frequent->answer = $answer;
       $frequent->created_at = $this->returnCurrentTime();
       $frequent->save();

       Session::flash('success', 'Done successfuly');
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

       DB::table("frequentlies")->where('id',$id)->delete();
       Session::flash('success','deleted successfully');
 
        }else{

            return 'ID is required';
        }
      return redirect()->back()->withMessage('FAQ Deleted');
    }
}

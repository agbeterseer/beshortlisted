<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Region;
use App\City;
use App\Profession;
use App\DocumentProfession;
use Auth;
use \Storage;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class AdvanceSearchController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $s = $request->input('s');
        $documents = Document::latest()
        ->search($s)
        ->paginate(20);
        $professions = Profession::all();
        $cities = City::all();
        // dd($s);

     return view('admin.advance.index', compact('documents', 's', 'professions', 'cities'), array('user' => Auth::user()));
    }


    public function SearchBy($value='')
    {
        # code...
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
        //
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

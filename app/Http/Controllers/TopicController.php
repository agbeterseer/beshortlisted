<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Validator;
use DB;
class TopicController extends Controller
{
        public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $users = DB::table('users')->where('test', 1)->get();
        return view('admin.quiz.index', compact(['topics', 'users']));
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

        // validate the input
$validation = Validator::make( $request->all(), [
              'title' => 'required|string',
          'per_q_mark' => 'required',
]);

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
    
        $input = $request->all();
        Topic::create($input);
        return back()->with('added', 'Topic has been added');
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

    // validate the input
    $validation = Validator::make( $request->all(), [
              'title' => 'required|string',
            'per_q_mark' => 'required',
    ]);

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
 
        $topic = Topic::findOrFail($id);
        $input = $request->all();
        $topic->update($input);
        return back()->with('updated', 'Topic has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return back()->with('deleted', 'Topic has been deleted');
    }
}

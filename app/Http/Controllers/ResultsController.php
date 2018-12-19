<?php

namespace App\Http\Controllers;

use Auth;
use App\Test;
use App\TestAnswer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

class ResultsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index', 'show');
    // }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Test::all()->load('user');

        if (!Auth::user()->is_admin()) {
            $results = $results->where('user_id', '=', Auth::id());
        }

        return view('results.index', compact('results'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->load('user');

        //dd($id);
 
        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get();
        }
    //dd($results);
    foreach ($results as $key => $result) {
        # code...
          $questions = Question::find($result->question_id)->count();
  
    }
      //dd($question_id);
 
 
 
        return view('results.show', compact('test', 'results', 'questions'));
    }
}

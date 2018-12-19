<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Test;
use App\TestAnswer;
use App\Topic;
use App\Question;
use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use jpmurray\LaravelCountdown\Countdown;
use Carbon\Carbon;
use App\User;

class TestsController extends Controller
{

        public function testInfoPage($id, $user_id)
    {
       $topic = Topic::findOrFail($id);
       $user = User::findOrFail($user_id);
 
        //dd($topic);
        // $questions = Question::inRandomOrder()->limit(34)->get();
        $questions = DB::table('questions')->inRandomOrder()->where('topic_id', $topic->id)->get();

        foreach ($questions as &$question) {
            //    dd($question->id);
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }

        # code...
    return view('tests.create', compact(['questions', 'topic', 'user']));
    //return back()->with('updated', 'Topic has been updated');
    }


    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //dd('here');
        //$topics = Topic::inRandomOrder()->limit(10)->get()
        $topic = Topic::find(3);
        //dd($topic);

        // $questions = Question::inRandomOrder()->limit(34)->get();
        $questions = DB::table('questions')->inRandomOrder()->where('topic_id', $topic->id)->get();

        foreach ($questions as &$question) {
            //    dd($question->id);
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }

        /*
        foreach ($topics as $topic) {
            if ($topic->questions->count()) {
                $questions[$topic->id]['topic'] = $topic->title;
                $questions[$topic->id]['questions'] = $topic->questions()->inRandomOrder()->first()->load('options')->toArray();
                shuffle($questions[$topic->id]['questions']['options']);
            }
        }
        */

        return view('tests.create', compact(['questions', 'topic']));
    }

    /**
     * Store a newly solved Test in storage with results.
     *
     * @param  \App\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $topic = Topic::findOrFail($request->topic_id);
        $user_id = User::findOrFail($request->user_id);
 
        $result = 0;

        $test = Test::firstOrNew(['user_id' => $user_id->id,'topic_id' => $topic->id]);
        $test->result = $result;
        $test->topic_id = $topic->id;
        $test->save();
        //dd($request->topic_id);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuestionsOption::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('results.show', [$test->id]);
    }


    public function returnCurrentTime()
    {
// To get time from 5 years ago until now, you can do the following.
// Note that you can send a string to the from and to methods, we will
// try to parse it with Carbon behind the scene

    
$now = Carbon::now();

$countdown = Countdown::from($now->copy()->subYears(5))
                        ->to($now)->get();

// The above will return the Countdown class where you can access the following values.
// Those mean that from 5 years ago to now, there is 5 years, 1 week, 1 day, 2 hours 15 minutes and 23 seconds

$countdown->years; // 5
$countdown->weeks; // 1
$countdown->days; // 1
$countdown->hours; // 2
$countdown->minutes; // 15
$countdown->seconds; // 23

// It will of course, also work in reverse order of time.
// This will get the time between now and some future date
$countdown = Countdown::from($now)
             ->to($now->copy()->addYears(5))
             ->get();
dd($countdown);

             
// To return to humans string
$countdown->toHuman(); // 18 years, 33 weeks, 2 days, 18 hours, 4 minutes and 35 seconds

// You to can pass custom string to parse in method toHuman, like this:
$countdown->toHuman('{days} days, {hours} hours and {minutes} minutes'); // 2 days, 18 hours, 4 minutes
        return $currentTime;
    }


}

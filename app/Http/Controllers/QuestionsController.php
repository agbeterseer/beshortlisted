<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Topic; 
use Validator;
use App\User;
use App\EmailTemplate;


class QuestionsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of Question.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $questions = Question::all();

    //     return view('questions.index', compact('questions'));
    // }

       public function index()
    {
        $topics = Topic::all();
        $questions = Question::all();
     
        return view('admin.questions.index', compact('questions', 'topics'));
    }


    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $relations = [
    //         'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
    //     ];

    //     $correct_options = [
    //         'option1' => 'Option #1',
    //         'option2' => 'Option #2',
    //         'option3' => 'Option #3',
    //         'option4' => 'Option #4',
    //         'option5' => 'Option #5'
    //     ];

    //     return view('questions.create', compact('correct_options') + $relations);
    // }

  public function importExcelToDB(Request $request)
    {
      $request->validate([
        'question_file' => 'required|mimes:xlsx'
      ]);
      if($request->hasFile('question_file')){
          $path = $request->file('question_file')->getRealPath();
          $data = \Excel::load($path)->get();
          if($data->count()){
              foreach ($data as $key => $value) {
                  $arr[] = ['topic_id' => $request->topic_id, 'question' => $value->question, 'a' => $value->a, 'b' => $value->b, 'c' => $value->c, 'd' => $value->d, 'answer' => $value->answer, 'code_snippet' => $value->code_snippet != '' ? $value->code_snippet : '-', 'answer_exp' => $value->answer_exp != '' ? $value->answer_exp : '-'];
              }
              if(!empty($arr)){
                  \DB::table('questions')->insert($arr);
                  return back()->with('added', 'Question Imported Successfully');
              }
              return back()->with('deleted', 'Your excel file is empty or its headers are not matched to question table fields');
          }
      }
        return back()->with('deleted', 'Request data does not have any files to import');
    }



function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
 
 



       public function importCandidatesExcelToDB(Request $request)
    {

    
        $validation = Validator::make( $request->all(), [
       'candidate_file' => 'required|mimes:xlsx'
       
        ]);

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
 
      // Application Code

      // ANA/08/E0099/
 // dd($request->all());
  $topic_id = $request->topic_id;

      if($request->hasFile('candidate_file')){
          $path = $request->file('candidate_file')->getRealPath();
          $data = \Excel::load($path)->get();
          if($data->count()){
             
              foreach ($data as $key => $value) {
             $application_code = $this->generatePIN();
             //$random_code = rand();   "topic_id" => "3"

             // generate 15 digit Pin
            $pin = $this->generatePIN(15);
       
            $arr[] = ['name' => $value->name, 'password' => bcrypt($pin), 'admin' => 0, 'email' => $value->email, 'candidate' => 1, 'test_id' => $topic_id, 'application_code' => 'ANA/18/E0099/'. $application_code, 'count_pin' =>0, 'pin' => $pin];
             
              }
              if(!empty($arr)){
                 \DB::table('users')->insert($arr);
                  return back()->with('added', 'Candidates Imported Successfully');
              }
              return back()->with('deleted', 'Your excel file is empty or its headers are not matched to question table fields');
          }
      }
        return back()->with('deleted', 'Request data does not have any files to import');
    }



     
   
    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreQuestionsRequest $request)
    // {

    //     $question = Question::create($request->all());

    //     foreach ($request->input() as $key => $value) {
    //         if(strpos($key, 'option') !== false && $value != '') {
    //             $status = $request->input('correct') == $key ? 1 : 0;
    //             QuestionsOption::create([
    //                 'question_id' => $question->id,
    //                 'option'      => $value,
    //                 'correct'     => $status
    //             ]);
    //         }
    //     }

    //     return redirect()->route('admin.questions.index');
    // }


    public function store(Request $request)
    {
      
      $validation = Validator::make( $request->all(), [
       'topic_id' => 'required',
        'question_text' => 'required',
        'correct' => 'required',
        'question_img' => 'image'
]);

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
 
  
        //$input = $request->all();

        if ($file = $request->file('question_img')) {

            $name = 'question_'.time().$file->getClientOriginalName();
            $file->move('images/questions/', $name);
            $input['question_img'] = $name;

        }


       // Question::create($input);
        //
    if ($request->all() !=null) {
        # code...
        $question = Question::create($request->all());

        foreach ($request->input() as $key => $value) {
     

   //  print_r(strpos($key, 'option'));
            if(strpos($key, 'option') !== false && $value != '') {
               

                $status = $request->input('correct') == $key ? 1 : 0;
                // dd($value);
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }
     
      return back()->with('added', 'Question has been added');
  }
    }


    /**
     * Show the form for editing Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question') + $relations);
    }

    /**
     * Update Question in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        // $question->update($request->all());
        // $question = Question::findOrFail($id);
      $validation = Validator::make( $request->all(), [
       'topic_id' => 'required',
        'question_text' => 'required',
        'correct' => 'required',
        'question_img' => 'image'
]);

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
         
        $question = Question::findOrFail($id);
        $input = $request->all();
//dd($input);

        if ($file = $request->file('question_img')) {

            $name = 'question_'.time().$file->getClientOriginalName();

            if($question->question_img != null) {
                unlink(public_path().'/images/questions/'.$question->question_img);
            }

            $file->move('images/questions/', $name);
            $input['question_img'] = $name;

        }

        $question->update($input);


        foreach ($request->input() as $key => $value) { 
        //print_r(strpos($key, 'option'));
            if(strpos($key, 'option') !== false && $value != '') {
               

                $status = $request->input('correct') == $key ? 1 : 0;
                // dd($value);
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }
     

        return back()->with('updated', 'Question has been updated');

        //return redirect()->route('questions.index');
    }


    /**
     * Display Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        $questions = Question::where('topic_id', $topic->id)->get();
           $correct_options = [
            'option1' => 'Option #A',
            'option2' => 'Option #B',
            'option3' => 'Option #C',
            'option4' => 'Option #D',
            'option5' => 'Option #E'
        ];

        return view('admin.questions.show', compact('topic', 'questions', 'correct_options'));
    }




    /**
     * Remove Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        if ($question->question_img != null) {
            unlink(public_path().'/images/questions/'.$question->question_img);
        }

    # code...
        $question->delete();
        return back()->with('deleted', 'Question has been deleted');
  
    }
      /**
     * Delete all selected Question at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Question::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}

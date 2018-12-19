<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Document;
use App\Region;
use App\City;
use App\Profession;
use App\ProfessionMeta;
use App\Tag;
use \DB;
use \Storage;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Date;
use Auth;
use Mail;
use App\Mail\UploadCV;
use Carbon\Carbon;
use App\Candidate; 
use App\Topic;
use App\Question;
use App\QuestionsOption;
use App\CandidateEmployment;
use App\User;
use Hash;
use Image;
class IndexController extends Controller
{

    public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }



public function beginTest($id, $user_id)
{
    $topic = Topic::findOrFail($id);
    $questions = Question::all();
    $user = User::findOrFail($user_id);
    //dd($questions);
    # code...
      return view('testhome', compact('topic', 'questions', 'user'));
}



 //   public function addItem(Request $request)
 //    {
 
 //        $rules =[
 //            'candidates_name' => 'required',
 //            'years_of_experience' => 'required',
 //            'region_id' => 'required',
 //            'city_id' => 'required',
 //            'profession'=>'required',
    
 //        ];
    
     
 //        $validator = Validator::make(Input::all(), $rules);
 //        if ($validator->fails()) {
 //            return Response::json(array(

 //                    'errors' => $validator->getMessageBag()->toArray(),
 //            ));
 //        } else {

 //        $file = $request->file;
       
 //         $allowedFileTypes = config('app.allowedFileTypes');

 //         $maxFileSize = config('app.maxFileSize');

 //         $rules = [
 //            'file' => 'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
 //        ];
 //  		dd($rules);

 //       $check = $this->validate($request, $rules);
    
       
 //        $fileName = $file->getClientOriginalName();
 //        $uploaded = Storage::cloud()->put($fileName, file_get_contents($file->getRealPath()));

 //        if ($uploaded) {
 //            $data = new Document;
 //            $data->candidates_name = $request->candidates_name;
 //            $data->years_of_experience = $request->years_of_experience;
 //            $data->city_id = $request->city_id;
 //            $data->region_id = $request->region_id;
 //            $data->save();

 //            if ($data) {
 //     		$data = Document::find($indocument->id);
 //        	$data->cv_file=$fileName;
 //        	$data->save();


	// 	       foreach ($request->profession as $key => $value) {
		      
	// 	        $data->professions()->attach($value);
	// 	    }
 //        }

	// }
  //          return response()->json($data);
 //        }
//    }

    //   public function show(Request $request, User $user)
    // {
    //      $value = $request->session()->get('key');

    //     return view('candidate.show',  array('user' => Auth::user())); 
    // }


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


    public function PostJobApplication(Request $request)
    {
 

        $candidates_name = $request->candidates_name;
        $gender = $request->gender;
        $ethnicity = $request->ethnicity;
        $date_of_birth = $request->date_of_birth;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
        $job_type = $request->job_type;
        $relocate_nationaly = $request->relocate_nationaly;
        $relocate_internationaly = $request->relocate_internationaly;
        $availability = $request->availability;
        $availability_date = $request->availability_date;
        $career_highlights = $request->career_highlights;
        $annual_salary = $request->annual_salary;
        $location = $request->location;
        $profession =7;
        $educational_level = $request->educational_level;
        $career_level = $request->career_level;
        $d_employment_term = $request->d_employment_term;
        $years_of_experience = $request->years_of_experience;
        $group_a = $request->group_a;

        //dd($profession);
        // generate pin for each candidate
       // $pin = $this->generatePIN(15);


 
        //$city_id = City::find(9001);
         $city_id = DB::table('cities')->where('name',$location)->first();
         $city_id = $city_id->id;

    if ($request->hasFile('file')) {
  
        $file = $request->file('file'); 

        $allowedFileTypess = config('app.allowedFileTypess');

        $maxFileSize = config('app.maxFileSize');

        $rules = [
            'file' => 'required|mimes:'.$allowedFileTypess.'|max:'.$maxFileSize
        ];
     
         $this->validate($request, $rules); 
         
        try {
                $fileName = $file->getClientOriginalName();
                $uploaded = Storage::cloud()->put($fileName, file_get_contents($file->getRealPath()));
   //dd($request->all());  
        } catch (\Exception $e) {
        Session::flash('no-connection','Please check your network connectivity');
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content',  $e->getMessage());

            return redirect()->back();
        }
        //dd($request->all());  

        DB::transaction(function() use ($city_id, $request, $rules, $profession, $fileName) {
      //dd($request->career_level);
       // $indocument = new Document;
       //get input and store into variables set all input to insert to db
        
        try {
        // $indocument = Document::firstOrNew(['email' => $request->email], ['candidates_name'=> title_case($request->candidates_name)]);
        $indocument = new Document;
        $indocument->candidates_name = title_case($request->candidates_name);
        $indocument->years_of_experience = $request->years_of_experience;1
        $indocument->city_id = $city_id;
        $indocument->region_id = $request->region;
        $indocument->gender = $request->gender;
        //$indocument->ethnicity = $request->ethnicity;
        $indocument->date_of_birth = new Date($request->date_of_birth);
        $indocument->email = $request->email;
        $indocument->phonenumber = $request->phonenumber;
        $indocument->job_type = $request->job_type;
        $indocument->years_of_experience = $request->years_of_experience;
        //$indocument->relocate_nationaly = $request->relocate_nationaly;
        //$indocument->relocate_internationaly = $request->relocate_internationaly;
        $indocument->availability = $request->availability;
        $indocument->career_highlights = $request->career_highlights;
        //$indocument->annual_salary = $request->annual_salary;
        $indocument->availability_date = new Date($request->date_of_birth);
        $indocument->educational_level = $request->educational_level;
        $indocument->career_level = $request->career_level;
        $indocument->d_employment_term = $request->d_employment_term;
        $indocument->black_list = 1;
        $indocument->tag_fk = 7;
        $indocument->save();

            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                 return redirect()->back()->withErrors('error' . $e->getMessage());
            }

    try {
    
       foreach ($request->group_a as $key => $group) {

        $candidate_employment = new CandidateEmployment;
        $candidate_employment->candidate_id = $indocument->id;
        $candidate_employment->start_date = $group['date_joined'];
        $candidate_employment->end_date = $group['date_out'];
        $candidate_employment->position = $group['position'];
        $candidate_employment->organisation = $group['organisation'];
        $candidate_employment->save();

       }

    // get the real profession ID to link with the Document
          $get_profession_meta = DB::table('profession_metas')->where('tag_id',$profession)->get();
         foreach ($get_profession_meta as $key => $value) {  
               $newProfession = Profession::find($value->profession_id)->id;

         }

    $indocument->professions()->attach($newProfession);
 
    } catch (\Exception $e) {
               Session::flash('error', $e->getMessage());
           return redirect()->back()->withErrors('error' . $e->getMessage());
    }
 
    $indocument = Document::where('id', $indocument->id)->update(['cv_file' => $fileName]);
 

 
});
       \LogActivity::addToLog($request->candidates_name .' Has Applied for a Job.');


        //  dd('log insert successfully.');
   
        $request->session()->flash('message.level', 'success');
      $request->session()->flash('message.content', $fileName .'CV Uploaded successfully!');
  }
      return redirect()->back();
        //return $this->show_success($request->candidates_name);
    }






/*
 public function JobApplication(Request $request)
    {
        // generate application number
        // generate application pin
        // create applicatant to user table
        // make application


 

        $candidates_name = $request->candidates_name;
        $gender = $request->gender;
        $ethnicity = $request->ethnicity;
        $date_of_birth = $request->date_of_birth;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
        $job_type = $request->job_type;
        $relocate_nationaly = $request->relocate_nationaly;
        $relocate_internationaly = $request->relocate_internationaly;
        $availability = $request->availability;
        $career_highlights = $request->career_highlights;
        $annual_salary = $request->annual_salary;
        $location = $request->location;
        $profession =$request->profession;
        $educational_level = $request->educational_level;
        $career_level = $request->career_level;
        $demployment_terms = $request->demployment_terms;

        // generate pin for each candidate
        $pin = $this->generatePIN(15);
     dd($request->all());
        $user = User::firstOrNew(['email' => $email]);
        $user->name = $candidates_name;
        $user->email =$email;
        $user->password = bcrypt($pin);
        $user->save();
 
        //$city_id = City::find(9001);
         $city_id = DB::table('cities')->where('name',$location)->first();
         $city_id = $city_id->id;
 
    if ($request->hasFile('file')) {

    }else{
         // validate $this->uploadIsValid($request)
            //access to the file
        $file = $request->file('file'); 

        $allowedFileTypess = config('app.allowedFileTypess');

        $maxFileSize = config('app.maxFileSize');

        $rules = [
            'file' => 'required|mimes:'.$allowedFileTypess.'|max:'.$maxFileSize
        ];
        
         $this->validate($request, $rules); 
           
        try {
                $fileName = $file->getClientOriginalName();
                $uploaded = Storage::cloud()->put($fileName, file_get_contents($file->getRealPath()));

        } catch (\Exception $e) {
            Session::flash('no-connection','Please check your network connectivity');
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content',  $e->getMessage());

            return redirect()->back();
        }
     
        //dd($request->all());  

        DB::transaction(function() use ($city_id, $request, $rules, $profession, $fileName) {
        // dd($request->all());
       // $indocument = new Document;
       //get input and store into variables set all input to insert to db
        try {
        $indocument = Document::firstOrNew(['email' => $request->email], ['candidates_name'=> title_case($request->candidates_name)]);
        //$indocument->candidates_name = title_case($request->candidates_name);
        $indocument->years_of_experience = $request->years_of_experience;
        $indocument->city_id = $city_id;
        $indocument->region_id = $request->region;
        $indocument->gender = $request->gender;
        $indocument->ethnicity = $request->ethnicity;
        $indocument->date_of_birth = new Date($request->date_of_birth);
        $indocument->email = $request->email;
        $indocument->phonenumber = $request->phonenumber;
        $indocument->job_type = $request->job_type;
        $indocument->relocate_nationaly = $request->relocate_nationaly;
        $indocument->relocate_internationaly = $request->relocate_internationaly;
        $indocument->availability = $request->availability;
        $indocument->career_highlights = $request->career_highlights;
        $indocument->annual_salary = $request->annual_salary;
        $indocument->black_list = 1;
        $indocument->tag_id = $profession;
        $indocument->save();
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                 return redirect()->back()->withErrors('error' . $e->getMessage());
            }

    try {
    // get the real profession ID to link with the Document
          $get_profession_meta = DB::table('profession_metas')->where('tag_id',$profession)->get();
         foreach ($get_profession_meta as $key => $value) {  
               $newProfession = Profession::find($value->profession_id)->id;

         } 

    $indocument->professions()->attach($newProfession);
 
    } catch (\Exception $e) {
               Session::flash('error', $e->getMessage());
           return redirect()->back()->withErrors('error' . $e->getMessage());
    }
 
    $indocument = Document::where('id', $indocument->id)->update(['cv_file' => $fileName]);
 
});
       \LogActivity::addToLog($request->candidates_name .' Has Send CV.');
  }

  
      //  dd('log insert successfully.');
   
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', $fileName .'CV Uploaded successfully!');
  
        // return redirect()->route('candidate.index');
        return $this->show_success($request->candidates_name);
    }
*/

 public function addCandidate(Request $request)
    {
      
        $gender = $request->gender;
        $ethnicity = $request->ethnicity;
        $date_of_birth = $request->date_of_birth;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
        $job_type = $request->job_type;
        $relocate_nationaly = $request->relocate_nationaly;
        $relocate_internationaly = $request->relocate_internationaly;
        $availability = $request->availability;
        $career_highlights = $request->career_highlights;
        $annual_salary = $request->annual_salary;
        $location = $request->location;

        $city_id = DB::table('cities')->where('name',$location)->first();
        $city_id = $city_id->id;
 
    if ($request->hasFile('file')) {
         // validate $this->uploadIsValid($request)
            //access to the file
        $file = $request->file('file'); 

        $allowedFileTypess = config('app.allowedFileTypess');

        $maxFileSize = config('app.maxFileSize');

        $rules = [
            'file' => 'required|mimes:'.$allowedFileTypess.'|max:'.$maxFileSize
        ];

           $this->validate($request, $rules); 
           
        try {
                $fileName = $file->getClientOriginalName();
                $uploaded = Storage::cloud()->put($fileName, file_get_contents($file->getRealPath()));

        } catch (\Exception $e) {
            Session::flash('no-connection','Please check your network connectivity');
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content',  $e->getMessage());

            return redirect()->back();
        }
    //dd($request->all());  

        DB::transaction(function() use ($city_id, $request, $fileName) {
   // dd($request->all());
       // $indocument = new Document;
       //get input and store into variables set all input to insert to db
            try {
         $indocument = Document::firstOrNew(['email' => $request->email], ['candidates_name'=> title_case($request->candidates_name)]);
    //    $indocument->candidates_name = title_case($request->candidates_name);
        $indocument->years_of_experience = $request->years_of_experience;
        $indocument->city_id = $city_id;
        $indocument->region_id = $request->region;
        $indocument->gender = $request->gender;
        $indocument->ethnicity = $request->ethnicity;
        $indocument->date_of_birth = new Date($request->date_of_birth);
        $indocument->email = $request->email;
        $indocument->phonenumber = $request->phonenumber;
        $indocument->job_type = $request->job_type;
        $indocument->relocate_nationaly = $request->relocate_nationaly;
        $indocument->relocate_internationaly = $request->relocate_internationaly;
        $indocument->availability = $request->availability;
        $indocument->career_highlights = $request->career_highlights;
        $indocument->annual_salary = $request->annual_salary;
        $indocument->black_list = 1;
        $indocument->save();
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                 return redirect()->back()->withErrors('error' . $e->getMessage());
            }

try {
    
    $indocument->professions()->attach($request->profession);
} catch (\Exception $e) {
           Session::flash('error', $e->getMessage());
       return redirect()->back()->withErrors('error' . $e->getMessage());
}
     
      
    $indocument = Document::where('id', $indocument->id)->update(['cv_file' => $fileName]);
 
});
  
  }
       \LogActivity::addToLog($request->candidates_name .' Has Send CV.');
      //  dd('log insert successfully.');
   
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', $fileName .'CV Uploaded successfully!');
  
        // return redirect()->route('candidate.index');
        return $this->show_success($request->candidates_name);
    }




        public function uploadIsValid($request)
    {

        if ($request->file('file')) {
            
        foreach ($request->file('file') as $file) {
 
            if (!$file->isValid()) {
                return false;
            }
        }
    }

    return true;
}

    public function showUpdateApplicantForm(Request $req)
    {
        $regions = Region::all();
        $cities = City::all();
        $aop = Profession::all();

        return view('candidate.index', compact(['regions', 'cities', 'aop' ]));
    }
    
    public function showApplicantForm(Request $req) {
        $regions = Region::all();
        $cities = City::all();
        $aop = Profession::all();
        $profession_metas = DB::table('profession_metas')->where('status', 1)->get();

       // $document job_application

        return view('candidate.jobapplication', compact(['regions', 'cities', 'aop', 'profession_metas' ]));
    }

        public function showApplicantFormID(Request $req, $id) {
        $regions = Region::all();
        $cities = City::all();
        $aop = Profession::all();
        
        $profession_metas = DB::table('profession_metas')->where('status', 1)->where('tag_id', $id)->get();
        $tags_rec = DB::table('tags')->where('status', 1)->where('id', $id)->get();
        
        $tag = Tag::find($id);
        
        return view('candidate.job_application', compact(['regions', 'cities', 'aop', 'profession_metas' , 'id', 'tags_rec', 'tag']));
    }


    public function readManual()
    {
        return view('manual');
    }

    public function showDatatable()
    {
        # code...
        return view('datatable');
    }


    public function getCitiesByRegioinAjax($region_id) {

    $cities = DB::table("cities")->where("region_id", $region_id)->get(['name']);
 
    return json_encode($cities);
    }

    public function show_success()
    {

        return view('candidate.upload_cv_success' , compact('candidates_name'));
    }


    public function Testpage()
    {

        return view('test_page' );
    }

        public function Testpage2()
    {

        return view('sett');
    }



   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


public function SendEmailToCandidates(){

//dd('here');
  //4539
 // $user = Candidate::find(4004);olalekanadegbolaa@gmail.com
  
        Mail::to('terseer@rhizomeng.com')->queue(new UploadCV()); 
       
            // $userd = Candidate::find($user->id);
            // $userd->status = 3;
            // $userd->save();
 // try {
 //  $users = DB::table('candidates')->where('status', 0)->get();
 // //dd($users);
 //  foreach ($users as $key => $user) {
 
 //         Mail::to($user)->queue(new UploadCV()); 
 //            $userd = Candidate::find($user->id);
 //            $userd->status = 3;
 //            $userd->save();

 //   } 
 //         Session::flash('success','Email Sent'); 
   
 //   } catch (\Exception $e) {
 //      return redirect()->back()
 //          ->withErrors(['error' => $e->getMessage()]);
 //    }
      // Session::flash('success','Email Sent'); 
   return 'Email Sent';

}

    public function UploadEmailsFromCSV(Request $request)
    {

     $this->validate($request, [
            'upload-file' => 'required']);
        //get file
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        $header= fgetcsv($file);
        $escapedHeader=[];
        //validate
        //dd($header);
          try {
         foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[ ]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
          } catch (Exception $e) {

        $request->session()->flash('message.level', 'error');
        $request->session()->flash('message.content', $e->getMessage());
            return redirect()->back()
          ->withErrors(['error' => $e->getMessage()]);
          }
      // dd($header);
        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            } 
        // dd($columns);
            //trim data
            foreach ($columns as $key => &$value) {
                $value=preg_replace('//','',$value);
            }   
          $data = array_combine($escapedHeader, $columns);
          $email=$data['email'];
          $status=$data['status']; 
              // dd($email);
    //  try {
    //   // if ($email === $email) {
    //     Mail::to($email)->queue(new UploadCV()); 
    //   // }
    //      // $when = Carbon::now()->addSeconds(2);
    //       // $this->info('messages sent successfully!'); 
    // } catch (\Exception $e) {
    //     // print_r('Birthday messages not sent');
    //   return redirect()->back()
    //       ->withErrors(['error' => $e->getMessage()]);
    // }
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Records Uploaded successfully!');

    try{
            DB::transaction(function () use ($request, $email, $status)  {
            $currentTime = $this->returnCurrentTime();
  // Table update
              $candidate = Candidate::firstOrNew(['email'=>$email]);
              $candidate->status = $status;
              $candidate->created_at = $currentTime;
              $candidate->save();


             // DB::table('candidates')->insert(['email'=>$email, 'status' => 1, 'created_at' => $currentTime]);
        
     });

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Records Uploaded successfully!');

     } catch (\Exception $e) {
       return redirect()->back()
          ->withErrors(['error' => $e->getMessage()]);
    }


    }
  $candidates = DB::table('candidates')->orderBy('created_at','DESC')->get();

return $this->showEmails();
 // return view('admin.extra.candidates', compact('candidates'), array('user' => Auth::user()));
    }


public function showUploadPage() {

  $candidates = DB::table('candidates')->orderBy('created_at','DESC')->get();
 
 return view('admin.extra.uploadEmailFromCSV', compact('candidates'), array('user' => Auth::user()));
}


public function showEmails() {

 $candidates = DB::table('candidates')->orderBy('created_at','DESC')->get();
 
 return view('admin.extra.candidates', compact('candidates'), array('user' => Auth::user()));
}


public function Image(Request $request)
{
    dd($request->all());
    # code...
}


 
}

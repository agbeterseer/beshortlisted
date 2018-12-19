<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DocumentProfession;
use App\Topic;
use App\EmailTemplate;
use Auth;
use \Storage;
use Response;
use PDF;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; 
use App\Notifications\OnlineTest; 
use App\Mail\CBTVerification;
use Carbon\Carbon;
class SendLinkController extends Controller
{

 public function __construct() {
      $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

       
        $topic = Topic::findOrFail($request->id);
            //dd($topic);

        $users = DB::table('users')->where('test', 1)->get();

       // dd($users);
 
        return view('admin.sendlink.index', compact(['users', 'topic']), array('user' => Auth::user()));
    }


    public function sendTestLink(Request $request)
    {
        $staff = $request->staff;
        
        $topic = Topic::findOrFail($request->id);
        $user = User::findOrFail($staff);
        $user->test_id = $topic->id;
        $user->save();

      //       $PAYSLIP = 'PAYSLIP';
      $content = [
        'title'=> 'Online Test', 
        'body'=> 'The body of your message.',
        'button' => 'Click Here',
        'topic' => $topic,
        'user' =>$user, 
        ]; 
   
try {

    $user->notify(new OnlineTest($user));

     $user = User::findOrFail($staff);
        $user->candidate = 1;
        $user->save();
    
} catch (Exception $e) {
    return redirect()->back()->withErrors($e->getMessage() . 'some thing went wrong');
}
 
    return back()->with('updated', 'Test Link Sent');
    }

public function SendLinkToMultipleCandidates(Request $request)
{
    # code...
   
    $check_user = $request->check_user;
    if ($check_user) {
        # code...
    // dd($check_user);
    foreach ($check_user as $key => $value) {

        $user = User::findOrFail($value);

        $user->notify(new OnlineTest($user));
        # code...
        $user->candidate = 1;
        $user->save();
    }
}
     return back()->with('updated', 'Test Link Sent'); 
}

public function SendVerificaitonLinkToMultipleCandidates(Request $request)
{

    # code...
    // get the email template
    $email_template = $request->email_template;
    $email_template = EmailTemplate::findOrFail($email_template);

 
   
    $check_user = $request->check_user;
    if ($check_user) {
        # code...
    // dd($check_user);
    foreach ($check_user as $key => $value) {

        $user = User::findOrFail($value);
      // dd($request->all());
        // $user->notify(new TestVerification($user));
        // # code...
        // $user->candidate = 1;
        // $user->save();/login
         
      $content = [
        'title'=> $user->job_code, 
        'body'=> $email_template->body,
        'user' =>$user,
        'url' => url('/login'),
        'logo' => url('/logo/nsia-logo.png'),
        ]; 
      $receiverAddress = $user->email;
      
      try {
    $when = Carbon::now()->addSeconds(15);

      Mail::to($receiverAddress)->later($when, new CBTVerification($content));

            $user->candidate = 1;
             $user->save(); 

      } catch(\Exception $e){
        
        Session::flash('error','No Network Connection at the Momemnt. Try again later ');

      return redirect()->back()->withErrors($e->getMessage() . 'No Network Connection at the Momemnt');

      }

}
 

}
     return back()->with('updated', 'Test Link Sent'); 
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

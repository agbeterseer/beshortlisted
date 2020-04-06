<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request; 
use App\Http\Requests\EmailJObToAFriend;
use DB;
use Carbon\Carbon;
use Mail;
use App\Mail\EmailAFriend;
use App\Email;
use Alert; 
 
class SendEmailService
{
 
 public function EmailJobToAFriendService(Request $request)
 {
 	  $job_title = $request->job_title;
      $to = $request->to;
      $from = $request->from;
      $link = $request->link;
      $job_description = $request->job_description;

 	    $JOBALERT = 'JOB ALERT';
        $content = [
        'title'=> $job_title, 
        'body'=> $job_description,
        'from' => $from, 
        'link' => $link,
        'to' => $to
        // 'apply' => url('/') . '/candidates/job-details/'.$job_id->id,
        ];    
      
 
  if ($job_title) {
    $when = Carbon::now()->addSeconds(15); 
   try{
        
        Mail::to($to)->later($when, new EmailAFriend($content));
        
        return redirect()->back()->withMessage('success', 'Job link sent successfully');
     } catch (Exception $e) {
            return redirect()->back()->withErrors(['error'=> 'something went wrong']); 
    } 
  } 
return redirect()->back();
 }


	 public function SubscribeToNewsletterService(Request $request)
	 {
	  $email = $request->email;
      $email_user = $request->email_user;
      $all = '110';
      $em = Email::firstOrNew(['email' => $email, 'industry' => $all]);
      $em->email = $request->email;
      $em->industry = $all;
      $em->created_at = $this->returnCurrentTime();
      $em->account_type = $email_user;
      $em->save(); 
        Alert::success('Success Message', 'you have been added to the mailing list');
      Session::flash('sub-success', 'you have been added to the mailing list');

      return back();
	 }

 

}
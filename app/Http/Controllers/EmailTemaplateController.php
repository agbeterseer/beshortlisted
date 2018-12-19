<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\EmailTemplate;
use Mail;
use Carbon\Carbon;
use App\Mail\JobAlert;
use DB;
class EmailTemaplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
//dd($request->all());
      $validation = Validator::make( $request->all(), [
        'body_of_email' =>'required|string',
        'title' =>'required|string|max:255'
        ]);
        //

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
    //dd($request->all());
if($request->title !=null && $request->body_of_email !=null && $request->body_of_email !=''){
   // dd($request->all());
    $input = $request->all();
    $emails_temp = new EmailTemplate;
    $emails_temp->title = $request->title;
    $emails_temp->body = $request->body_of_email; 
    $emails_temp->save();
}

    return back()->with('updated', 'Email have been saved');
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
    
        //dd($id);
 
        $validation = Validator::make( $request->all(), [
        'body_of_email' =>'required|string',
        'title' =>'required|string|max:255'
        ]);
        //

// redirect on validation error
if ( $validation->fails() ) {
    // change below as required
    return \Redirect::back()->withInput()->withErrors( $validation->messages() );
}
    //dd($request->all());
    $input = $request->all();
    $emails_temp = EmailTemplate::findOrFail($id);
    $emails_temp->title = $request->title;
    $emails_temp->body = $request->body_of_email; 
    $emails_temp->save();
  
   return back()->with('updated', 'Email have been saved');
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
            $emails = EmailTemplate::findOrFail($id);
             $emails->delete();
               return back()->with('deleted', 'EmailTemplate has been deleted');
        }
            return redirect()->back();
 
    }

    public function PreviewEmail()
    {
             $content = 'Lunen';
            // $when = Carbon::now()->addSeconds(15); 
            // $email = 'agbe.terseer@gmail.com';
            // Mail::to($email)->later($when, new JobAlert($content)); 
          $emails = DB::table('emails')->where('industry', 106)->get();
 


    foreach ($emails as $key => $value) {
   // $when = Carbon::now()->addSeconds(15); 
  //dd($value->email);
    Mail::to($value->email)->queue(new JobAlert($content)); 
      // Mail::to($request->user())->send(new OrderShipped($order));
  }


 
            return view('emails.jobalerts');
    }


   

}

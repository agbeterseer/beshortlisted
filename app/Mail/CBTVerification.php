<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CBTVerification extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $user;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
public function __construct($content){
       //  dd($content);
  $this->content = $content;



}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

  
        // dd($this->user->confirmation_code);
        //$url = url('/login'); 

return $this->markdown('emails.cbt_verification')->with('content',$this->content)->subject( 'NSIA CBT Verification');
 
          
    }

}

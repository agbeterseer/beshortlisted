<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
class EmailCandidate extends Mailable
{
    use Queueable, SerializesModels;
    public $content; 
    public $subject;
    public $body;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
public function __construct($content){ 
  $this->content = $content;
}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
              return $this->markdown('emails.email_candidate')->subject( 'beShortlisted '. ' ' . date('M d, Y', strtotime(Carbon::now())))->with('content',$this->content);
    }
}

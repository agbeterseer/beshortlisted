<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
class BlacklistJobPost extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $tag;
    public $email_address;
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
            return $this->markdown('emails.blacklist_job_post')->subject( 'beShortlisted Job Post Blacklist '. ' ' . date('M d, Y', strtotime(Carbon::now())))->with('content',$this->content);
    }
}

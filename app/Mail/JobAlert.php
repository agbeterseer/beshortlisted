<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
class JobAlert extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $tag;
    public $email_address;
    public $city;
    public $country;
    public $job_category; 
    public $apply;
    /**
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
        return $this->markdown('emails.jobalerts')->subject( 'beShortlist Jobmail'. ' ' . date('M d, Y', strtotime(Carbon::now())))->with('content',$this->content);
    }
}

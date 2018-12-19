<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OnlineTest extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $netpay;
    public $employee_salary;
    public $newtotalDeductions;
    public $totalDeductions;
    public $employee_deductions_amounts_List;
    public $employee_description_amounts_List;
    public $currentTime;
    public $firstname;
    public $middelname;
    public $employee;
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
   //dd($content);
        // dd($this->user->confirmation_code);
        $url = url('/onlinetest_link/link/');
       // $logo = url(public_path(). 'css/assets/layouts/layout4/img/rhizome.jpg');
        
        return (new MailMessage)
        ->subject( 'Rhizome Consulting Verification Email'. ' ' . $this->user->firstname)
        ->markdown('mail.onlinetest', ['url' => $url, 'firstname' => $this->user->firstname, 'logo' => $logo])->with('content',$this->content); 
          
    }

}

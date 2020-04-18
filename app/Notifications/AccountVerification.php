<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;
class AccountVerification extends Notification implements ShouldQueue {
    use Queueable;
    public $content; 
    public $messg;
      
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($content)
    {
         $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    { 
       // dd($this->user->confirmation_code);
        $url = url('/employer/verify-account/'. $this->content['confirmation_code'] . '/' . $this->content['account_type']); 
        if ($this->content['account_type'] === 'employee') {
           $messg = 'apply for jobs';
        }else{
            $messg = 'posting jobs';
        }
        return (new MailMessage) 
        ->subject( 'beShortlisted Account Activation Notification '.   date('M d, Y', strtotime(Carbon::now())))
        ->markdown('emails.employer_verify_email', ['url' => $url, 'content' => $this->content]); 
    }

 
    /**
    * Get the Slack representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return SlackMessage
    */
    public function toSlack($notifiable)
    {
    return (new SlackMessage)
                ->content('');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

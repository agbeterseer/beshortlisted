<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OnlineTest extends Notification implements ShouldQueue
{
    use Queueable;
    public $content;
    public $user;
    public $topic; 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
public function __construct($user){
   
  $this->user = $user;

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
        $url = url('/onlinetest_link/link/'. $this->user->test_id . '/candidate/'. $this->user->id);
        $logo = url('/logo/rhizome.jpg');

     //
        
        return (new MailMessage)
        ->subject( 'Rhizome Consulting OnlineTest'. ' ' . $this->user->name)
        ->markdown('mail.onlinetest', ['url' => $url, 'name' => $this->user->name, 'logo' => $logo, 'pin' => $this->user->pin, 'email' => $this->user->email]);
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

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyUser extends Notification
{
    use Queueable;
    public $message;

   
    public function __construct($message)
    {
        $this->message = $message;
    }

 
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

  
    public function toDatabase($notifiable)
    {
        return[
            'message' => $this->message,
        ]; 
    }

    public function toBroadcast($notifiable)
    {
        return[
            'data' => [
                'message' => $this->message,
            ]
        ]; 
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

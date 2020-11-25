<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class CompleteNotification extends Notification
{
    use Queueable;
    public $data;

    public function __construct($data)
    {
        $this->data = (object) $data;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {   
        $project = $this->data;
        $seeker_name = $project->user->full_name;
        $message = "$seeker_name has been completed project";
        $link = $project->urlTracking();
        
        return [
            'type' => 'completed',
            'title' => 'Project Completed',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RequestMilestoneNotification extends Notification
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

        $link = $project->urlTracking();
        
        return [
            'type' => 'milestone_request',
            'title' => 'Milestone request!',
            'sub_title' => 'New request milestone',
            'link' => $link,
        ];
    }
}

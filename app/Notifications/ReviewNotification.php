<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class ReviewNotification extends Notification
{
    use Queueable;
    public $data;

    public function __construct($data, $from)
    {
        $this->data = (object) $data;
        $this->from = $from;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {   
        $project = $this->data;
        $user_name = $this->from->full_name;
        $message = "$user_name has been reviewed project";
        $link = $project->urlTracking();
        
        return [
            'type' => 'reviewd',
            'title' => 'Project Reviewd',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

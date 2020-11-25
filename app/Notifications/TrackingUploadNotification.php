<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TrackingUploadNotification extends Notification
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
        $ms = $this->data;
        $alchemist = $ms->bid->user->full_name;
        $message = $alchemist .' just upload file';
        $link = $ms->project->urlTracking();
        return [
            'type' => 'tracking_upload',
            'title' => 'New Upload File!',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

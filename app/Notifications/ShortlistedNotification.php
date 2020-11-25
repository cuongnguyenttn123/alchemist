<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ShortlistedNotification extends Notification
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
        
        $bid = $this->data;
        $price = $bid->price;
        $work_time = $bid->work_time;
        $seeker_name = $bid->project->user->full_name;

        $message = "$seeker_name just add you to shortlist";
        $link = $bid->project->urlProjectBids();
        
        return [
            'type' => 'shortlisted',
            'title' => 'Shordlisted',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

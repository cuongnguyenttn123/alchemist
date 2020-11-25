<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class AwardBidNotification extends Notification
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
        $date = Carbon::now()->format('d/m/Y');
        $message = "$seeker_name has accepted your Bid of $$price USD in $work_time Days.";
        $link = $bid->project->urlProjectBids();
        
        return [
            'type' => 'project_awarded',
            'title' => 'Project Awarded!',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class NewBidNotification extends Notification
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

        $date = Carbon::now()->format('d/m/Y');
        $message = "Your project has new bid";
        $link = $project->urlProjectBids();
        
        return [
            'type' => 'new_bid',
            'title' => 'Project New Bid!',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

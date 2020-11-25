<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class DisputeAccept extends Notification
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
        $dispute = $this->data;
        $message = "Your dispute Accepted";
        $link = $dispute->permalink();
        
        return [
            'type' => 'dispute_accept',
            'title' => 'Dispute Accepted',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

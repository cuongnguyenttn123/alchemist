<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class DisputeCancel extends Notification
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
        $from = $dispute->plaintiff->full_name;
        $message = $from." just calcelled dispute";
        $link = $dispute->milestone->project->urlTracking();
        
        return [
            'type' => 'dispute_cancel',
            'title' => 'Dispute Cancelled',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

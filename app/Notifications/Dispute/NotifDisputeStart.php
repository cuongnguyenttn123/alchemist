<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class NotifDisputeStart extends Notification
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

        $date = Carbon::now()->format('d/m/Y');
        $message = "All Arbiters Accepted";
        $description = "";
        // $link = $dispute->permalink();
        $link = $dispute->permalink();
        
        return [
            'type' => 'dispute_start',
            'title' => 'Dispute start',
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

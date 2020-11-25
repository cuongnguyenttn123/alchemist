<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class NotifAfterVoted extends Notification
{
    use Queueable;
    public $data;

    public function __construct($data, $tkn)
    {
        $this->data = (object) $data;
        $this->tkn = $tkn;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {   
        $dispute = $this->data;
        $tkn = $this->tkn;

        $date = Carbon::now()->format('d/m/Y');
        $message = "Dispute voted";
        $description = "Vote done. You gain $tkn CRT";
        // $link = $dispute->permalink();
        $link = $dispute->permalink();
        
        return [
            'type' => 'dispute_donevote',
            'title' => 'Dispute Vote Done',
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class NotifUser extends Notification
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
        $message = "Please Sent Case";
        $description = "";
        // $link = $dispute->permalink();
        $link = $dispute->permalink();
        
        return [
            'type' => 'dispute_user',
            'title' => 'Dispute Send Case',
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

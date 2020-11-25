<?php

namespace App\Notifications\Contest;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class NewEntry extends Notification
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
        $contest = $this->data;

        $description = "Your contest has new entry";

        $message = "";
        $link = $contest->permalink();
        // dd($description);
        
        return [
            'type' => "contest_entry",
            'title' => 'New Entry',
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

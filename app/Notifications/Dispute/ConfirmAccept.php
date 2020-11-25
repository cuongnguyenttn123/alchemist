<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class ConfirmAccept extends Notification
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
        $add_text = '';
        if($dispute->project->_status == 6) {
            $add_text = "accepted continue project";
        }
        if($dispute->cancel_project == 9) {
            $add_text = "cancelled project";
        }
        $amount = $dispute->amount;

        $message = "";
        $link = $dispute->permalink();
        

        $type = 'dispute_complete';
        $text = 'Dispute Complete!';
        $description = $dispute->alchemist->fullname." just had ".$add_text;

        return [
            'type' => $type,
            'title' => $text,
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

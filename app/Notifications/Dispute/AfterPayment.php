<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class AfterPayment extends Notification
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
        if($dispute->cancel_project == 2) {
            $add_text = "and want to continue project";
        }
        if($dispute->cancel_project == 1) {
            $add_text = "and cancel project";
        }
        $amount = $dispute->amount;

        $message = "";
        $link = $dispute->permalink();
        

        $type = 'dispute_payment';
        $text = 'Dispute Payment!';
        $description = $dispute->seeker->fullname." just had payment dispute ".$add_text;

        return [
            'type' => $type,
            'title' => $text,
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class InviteArbiter extends Notification
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
        $arbitration_fee = $dispute->arbitration_fee;
        $win_hightest = $dispute->win_hightest;
        $win_lowest = $dispute->win_lowest;
        $message = "Required Stake: $arbitration_fee CRT (4%)";
        $description = "Highest Take: $win_hightest CRT <br>Lowest Take: $win_lowest CRT";
        // $link = $dispute->permalink();
        $link = route('profile.myprojects');
        
        return [
            'type' => 'dispute_invite',
            'title' => 'Arbiter Invitation',
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

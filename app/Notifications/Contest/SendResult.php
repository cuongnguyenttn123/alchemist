<?php

namespace App\Notifications\Contest;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class SendResult extends Notification
{
    use Queueable;
    public $data;

    public function __construct($data, $rank)
    {
        $this->data = (object) $data;
        $this->rank = $rank;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {   
        $position = addOrdinalNumberSuffix($this->rank);
        $contest = $this->data;
        $seeker_name = $contest->user->full_name;
        $name = $contest->name_contest;
        $price = '';
        $point = $contest->earnpoint($this->rank);

        if($this->rank == 1){
            $title = 'Winner';
            $text = 'won';
            $text2 = 'Prize';
            $price = "$".$contest->total_prize." | ";
        }else {
            $text = 'came';
            $text2 = 'place';
            $title = 'Runner up';
            if($this->rank > 2)
                $title = addOrdinalNumberSuffix($this->rank-1) .' Runner up';
        }
            $gain = $price."$point SBP";
            $description = "You $text $position $text2 for $seeker_name's contest: $name. You gain: $gain";

        $message = "";
        $link = $contest->permalink();
        // dd($description,$title);
        
        return [
            'type' => "contest_$position",
            'title' => 'Contest ' .$title,
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

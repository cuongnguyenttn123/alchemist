<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class SendResult extends Notification
{
    use Queueable;
    public $data;

    public function __construct($data, $type)
    {
        $this->data = (object) $data;
        $this->type = $type;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {   
        $dispute = $this->data;

        $arbitration_fee = $dispute->arbitration_fee;
        $win_hightest = $dispute->win_hightest;
        $win_lowest = $dispute->win_lowest;
        $credit_win = $dispute->credit_win;

        $position = $dispute->milestone->position;
        $percent_payment = $dispute->milestone->percent_payment;
        $price = $dispute->milestone->price;
        $vote_win = $dispute->total_vote_win();
        $vote_lose = $dispute->total_vote_lose();
        $percent_win = $vote_win/5*100;
        $percent_lose = $vote_lose/5*100;

        $payment_amount = $dispute->amount_payment;
        $txt = $this->type[1];

        if($this->type[0] == 'win'){
            $type = 'dispute_win';
            $text = 'Dispute Winner!';
            $description = "Milestone $position ($percent_payment%) | $$price <br>
                            $vote_win/5 Votes ($percent_win%) | $txt $$payment_amount 
                            Receive $credit_win CRT(5%) Back ";
        }else {
            $type = 'dispute_lose';
            $text = 'Dispute Loser!';
            $description = "Milestone $position ($percent_payment%) | $$price <br>
                            $vote_lose/5 Votes ($percent_lose%) | $txt $$payment_amount <br>
                            Receive 0 CRT(0%) Back ";

        }

        $message = "";
        $link = $dispute->permalink();
        
        return [
            'type' => $type,
            'title' => $text,
            'sub_title' => $message,
            'description' => $description,
            'link' => $link,
        ];
    }
}

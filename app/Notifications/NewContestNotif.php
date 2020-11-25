<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Str;

use App\Mail\MailNewContest;

class NewContestNotif extends Notification /*implements ShouldQueue*/
{
    use Queueable;
    
    public $tries = 1;
    public $timeout = 60;

    public $user;
    public $contest;

    public function __construct($contest)
    {
        $this->contest = $contest;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {   
        $data_out = [
                        'message' => 'New contest match your level',
                        'name_job'=> $this->contest->name_contest,
                        'budget' => $this->contest->total_prize,
                        'link_job' => $this->contest->permalink(),
                    ];
        $description = strip_tags(Str::limit($this->contest->rules ?? $n->data->target->rules, 60, ' ...'));
        $name = $this->contest->name_contest;
        $price = $this->contest->total_prize;
        $day_left = $this->contest->day_left;
        return [
            'type' => 'newcontest',
            'title' => 'New Contest Alert!',
            'sub_title' => "$name | $$price | $day_left days left",
            'description' => $description,
            'link' => $this->contest->permalink(),
        ];
    }

    public function toMail($notifiable)
    {   

    }
}

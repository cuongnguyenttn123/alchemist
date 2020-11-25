<?php

namespace App\Notifications\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class DisputeRequest extends Notification
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
        $ms = $this->data;
        $price = $ms->price_bid;
        $position = $ms->position;
        $seeker_name = $ms->project->user->full_name;
        $date = Carbon::now()->format('d/m/Y');
        $message = "You have new dispute";
        $link = $ms->project->urlTracking();
        
        return [
            'type' => 'dispute',
            'title' => 'Dispute request',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

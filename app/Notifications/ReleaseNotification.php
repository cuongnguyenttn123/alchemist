<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon\Carbon;

class ReleaseNotification extends Notification
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
        $text = ($ms->is_last) ? ' final' : '';
        $price = $ms->price_bid;
        $position = $ms->position;
        $seeker_name = $ms->project->user->full_name;
        $date = Carbon::now()->format('d/m/Y');
        $message = "$seeker_name has paid Milestone $position, $$price USD on $date: ";
        $link = $ms->project->urlTracking();
        
        return [
            'type' => 'release',
            'title' => 'Milestone Paid',
            'sub_title' => $message,
            'link' => $link,
        ];
    }
}

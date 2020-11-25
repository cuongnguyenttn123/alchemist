<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostStatusNotification extends Notification
{
    use Queueable;
    public $data;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
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
      $post = $this->data;
      $date = Carbon::now()->format('d/m/Y');
      $message = "Friend your new status";


      return [
        'type' => 'new_status',
        'title' => 'Post New status!',
        'sub_title' => $message,
      ];
    }
}

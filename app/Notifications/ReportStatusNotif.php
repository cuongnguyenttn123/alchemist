<?php


namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class ReportStatusNotif extends Notification
{
  use Queueable;

  public $tries = 1;
  public $timeout = 60;

  public $post;
  public $text;
  public $user_report;

  public function __construct($post, $user_report, $text)
  {
    $this->post = $post;
    $this->text = $text;
    $this->user_report = $user_report;
  }


  public function via($notifiable)
  {
    return ['database'];
  }
  public function toDatabase($notifiable)
  {
    $name = $this->post->caption;
    $text = $this->text;
    $user_report = $this->user_report->id;
    return [
      'type' => $text['type'],
      'title' => $text['title'],
      'sub_title' => $name ,
      'user_report' => $user_report ,
      'description' => $text['description'] ,
      'link' => $text['link'],
    ];
  }

}

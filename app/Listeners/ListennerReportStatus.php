<?php


namespace App\Listeners;

use App\Jobs\NotifReportStatus;
use Notification;
use App\Events\NewReportStatus;
use App\Models\User;
use App\Notifications\ReportStatusNotif;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListennerReportStatus
{
  public $event;
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  NewReportStatus  $event
   * @return void
   */
  public function handle(NewReportStatus $event)
  {
    // sleep(15);

    $post = $event->post;
    //get all users has title project require
    $user_post = $post->user;
    $user_report = $event->user_report;
    $text = $event->text;
    Notification::send($user_post, new ReportStatusNotif($post, $user_report, $text));
    if ($text['type'] === 'reportStatus'){
      dispatch(new NotifReportStatus($user_post,$post));
    }


    return true;
  }
}

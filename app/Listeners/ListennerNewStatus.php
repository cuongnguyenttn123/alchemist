<?php

namespace App\Listeners;

use App\Events\NewsStatus;
use App\Mail\Project\Alchemist\ProjectsNew;
use App\Notifications\PostStatusNotification;
use Mail;
use Notification;
use App\Mail\MailNewProject;

use App\Events\NewProject;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\TaskNotification;
use App\Notifications\NewProjectNotif;
use App\Notifications\NewContestNotif;

use App\Models\User;

class ListennerNewStatus implements ShouldQueue
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
   * @param NewsStatus $event
   * @return void
   */
  public function handle(NewsStatus $event)
  {
    // sleep(15);

    $post = $event->post;
    //get all users has title project require
    $list_user = [143, 176, 175];

    Notification::send($list_user, new PostStatusNotification($post));

    return true;
  }
}

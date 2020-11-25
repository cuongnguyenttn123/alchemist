<?php

namespace App\Listeners;

use App\Mail\Project\Alchemist\ProjectsNew;
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

class ListenerNewProject  implements ShouldQueue
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
     * @param  NewProject  $event
     * @return void
     */
    public function handle(NewProject $event)
    {
        // sleep(15);

        $project = $event->project;
        //get all users has title project require
        $list_title = $project->user_title->pluck('name')->toArray();
        $list_user = User::getListUserByTitle($list_title, $project->user->id)/*->take(50)*/;

        Notification::send($list_user, new NewProjectNotif($project));
//         dispatch(new \App\Jobs\NotifNewProject($list_user,$project));
        dispatch(new \App\Jobs\SendEmailNewProject($list_user,$project));

        return true;
    }
}

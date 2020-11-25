<?php

namespace App\Listeners;

use Mail;
use App\Mail\MailNewProject;

use App\Events\AcceptProject;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\TaskNotification;

use App\Models\User;

class SendEmailAfterAcceptProject /*implements ShouldQueue*/
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
    public function handle(AcceptProject $event)
    {
        // sleep(15);
        $project = $event->project;
        $user_of_project  = $project->user;
        $link_job = $project->urlTracking();
        $data_out = array(
                    'type' => 'acceptjob',
                    'title' => 'Project accepted',
                    'sub_title' => '',
                    'description' => 'Your job was accept working by alchemist',
                    'link' => $link_job,
                );
        $user_of_project -> notify((new TaskNotification($data_out)));

        return true;
    }
}

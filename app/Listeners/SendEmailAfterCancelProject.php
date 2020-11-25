<?php

namespace App\Listeners;

use Mail;
use App\Mail\MailNewProject;

use App\Events\CancelProject;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\TaskNotification;

use App\Models\User;

class SendEmailAfterCancelProject /*implements ShouldQueue*/
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
    public function handle(CancelProject $event)
    {
        // sleep(15);
        $project = $event->project;
        $user_of_project  = $project->user;
        $link_job = $project->urlProjectBids();
        $data_out = array(
                    'type' => 'cancel_award',
                    'title' => 'Alchemist Calcelled',
                    'sub_title' => '',
                    'description' => 'Alchemist has been cancelled your project',
                    'link' => $link_job,
                );
        $user_of_project -> notify((new TaskNotification($data_out)));

        return true;
    }
}

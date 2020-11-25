<?php

namespace App\Listeners;

use Mail;
use App\Mail\MailNewProject;

use App\Events\NewBid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\NewBidNotification;

use App\Models\User;

class ListenerNewBid /*implements ShouldQueue*/
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
    public function handle(NewBid $event)
    {
        // sleep(15);
        $project = $event->project;
        $user_of_project  = $project->user;
        $link_job = $project->permalink();
        $data_out = array(
                    'type' => 'newbid',
                    'data'=>[
                        // 'user_id' => $user_id,
                        'message' => 'Your job has new bid',
                        'name_job'=> $project->name,
                        'short_description' => $project->short_description,
                        'budget' => $project->budget,
                        'link_job' => $link_job,
                    ],
                );
        $user_of_project -> notify((new NewBidNotification($project)));

        return true;
    }
}

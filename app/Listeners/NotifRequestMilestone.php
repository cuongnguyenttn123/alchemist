<?php

namespace App\Listeners;

use Mail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\RequestMilestoneNotification;

class NotifRequestMilestone/* implements ShouldQueue*/
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
    public function handle($event)
    {
        $project = $event->project;
        $seeker = $project->user;
        $link = $project->urlTracking();

        $seeker->notify((new RequestMilestoneNotification($project)));

        return true;
    }
}

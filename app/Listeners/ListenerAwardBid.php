<?php

namespace App\Listeners;

use App\Mail\Project\Alchemist\BidAwardedAction;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNewProject;

use App\Events\AwardBid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\AwardBidNotification;

use App\Models\User;

class ListenerAwardBid implements ShouldQueue
{
    public $tries = 1;
    public $timeout = 60;

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
    public function handle(AwardBid $event)
    {
        // sleep(15);
        $bid = $event->bid;
        $user_of_bid  = $bid->user;
        /*$project = $bid->project;
        $link_job = $project->permalink();
        $data_out = array(
                    'type' => 'awardbid',
                    'data'=>[
                        // 'user_id' => $user_id,
                        'message' => 'Your bid has been won project',
                        'name_job'=> $project->name,
                        'short_description' => $project->short_description,
                        'budget' => $project->budget,
                        'link_job' => $link_job,
                    ],
                );*/
        $user_of_bid->notify((new AwardBidNotification($bid)));


        Mail::to($user_of_bid)->send(new BidAwardedAction($user_of_bid, $bid->project->user, $bid, $bid->project));


        return true;
    }
}

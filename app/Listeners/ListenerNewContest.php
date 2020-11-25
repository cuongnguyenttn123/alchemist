<?php

namespace App\Listeners;

use Mail;
use Notification;
use App\Mail\MailNewProject;

use App\Events\NewContest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\User;
use App\Notifications\NewContestNotif;
use App\Mail\MailNewContest;

class ListenerNewContest /*implements ShouldQueue*/
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
    public function handle(NewContest $event)
    {
        // sleep(15);

        $contest = $event->contest;
        //get all users has title contest require
        $list_title = $contest->user_title->pluck('name')->toArray();
        $list_user = User::getListUserByTitle($list_title, $contest->user->id)/*->take(100)*/;

        dispatch(new \App\Jobs\NotifNewContest($list_user,$contest));
        dispatch(new \App\Jobs\SendMailNewContest($list_user,$contest));

        return true;
    }
}

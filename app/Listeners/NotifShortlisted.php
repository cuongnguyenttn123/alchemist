<?php

namespace App\Listeners;

use Mail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\ShortlistedNotification;

class NotifShortlisted/* implements ShouldQueue*/
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
        $bid = $event->bid;
        $seeker = $bid->user;
        $link = $bid->project->urlProjectBids();

        $data_out = [
                        'title' => 'Seeker just add you to shortlist',
                        'message' => '',
                        'link' => $link,
                    ];
        $seeker->notify((new ShortlistedNotification($bid)));

        return true;
    }
}

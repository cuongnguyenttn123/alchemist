<?php

namespace App\Listeners;

use App\Models\Contest;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSentListener
{
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        if (property_exists($event->message, 'mailable') && $event->message->mailable === "App\Mail\Contest\Seeker\SelectPodium") {
            $event->message->contest->status = Contest::SELECT_PODIUM_MAIL_STATUS;
            $event->message->contest->save();
        }
    }
}

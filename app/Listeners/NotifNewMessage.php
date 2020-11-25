<?php

namespace App\Listeners;

use Mail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\MessageNotification;

class NotifNewMessage/* implements ShouldQueue*/
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
        $model = $event->model;
        $type = $event->type;

        $auth_user = $model->partner;
        $user_fullname = $model->user->full_name;
        $avatar = $model->user->avatar;
        if($type == 'bid'){
            $link = $model->bid->project->urlProjectBids();
        }elseif($type == 'project') {
            $link = $model->project->urlTracking();
        }
        $data = [
                        'title' => 'New message',
                        'message' => $model->message,
                        'from' => $user_fullname,
                        'avatar' => $avatar,
                        'link' => $link,
                    ];
        $auth_user->notify((new MessageNotification($data)));

        return true;
    }
}

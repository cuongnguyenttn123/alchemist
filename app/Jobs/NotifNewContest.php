<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Notification;

use App\Models\User;
use App\Models\Contest;
use App\Mail\MailNewContest;
use App\Notifications\NewContestNotif;

class NotifNewContest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;
    public $timeout = 60;

    /**
     * Create a new job instance.
     *
     * @return void
     * @param $user
     */

    public $users;
    public $contest;
    public function __construct($users, Contest $contest)
    {
        $this->users = $users;
        $this->contest = $contest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // sleep(10);

        Notification::send($this->users, new NewContestNotif($this->contest));
    }
}

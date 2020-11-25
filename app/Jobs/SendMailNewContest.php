<?php

namespace App\Jobs;

use App\Mail\Contest\Alchemist\ContestsNew;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Notification;

use App\Models\Contest;
use App\Mail\MailNewContest;
use App\Notifications\NewContestNotif;

class SendMailNewContest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;
    public $timeout = 60;

    /**
     * Create a new job instance.
     *
     * @return void
     * @param $users
     * @param $contest
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
        $collection = Contest::where('id', $this->contest->id)->get();

        foreach ($this->users as $user) {
            //            $data = array(
            //                'link' => $this->contest->permalink(),
            //            );
            //            $email = new MailNewContest($data);
            Mail::send(new ContestsNew($collection, $user));
            // dd($user->email);
        }
    }
}

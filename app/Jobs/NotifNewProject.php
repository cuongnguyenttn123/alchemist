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
use App\Models\Project;
use App\Mail\MailNewContest;
use App\Notifications\NewProjectNotif;

class NotifNewProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;
    public $timeout = 60;

    /**
     * Create a new job instance.
     *
     * @return void
     * @param $user
     */

    public $users;
    public $project;
    public function __construct($users, Project $project)
    {
        $this->users = $users;
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // sleep(10);

        Notification::send($this->users, new NewProjectNotif($this->project));
    }
}

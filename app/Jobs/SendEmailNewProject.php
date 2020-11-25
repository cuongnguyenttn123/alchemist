<?php

namespace App\Jobs;

use App\Mail\Project\Alchemist\ProjectsNew;
use App\Mail\Site\VerifyAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

use App\Models\Project;
use App\Mail\MailNewProject;
use App\Notifications\NewProjectNotif;

class SendEmailNewProject implements ShouldQueue
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
    $collection = Project::where('id', $this->project->id)->get();
    foreach ($this->users as $user) {
      Mail::send(new ProjectsNew($user, $collection));
    }
  }
}

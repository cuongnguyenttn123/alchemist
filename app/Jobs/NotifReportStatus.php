<?php


namespace App\Jobs;


use App\Mail\Report\MailReportStatus;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifReportStatus
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
  public $post;
  public function __construct($users, Post $post)
  {
    $this->users = $users;
    $this->post = $post;
  }
  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $collection = Post::where('id', $this->post->id)->get();
    Mail::send(new MailReportStatus($this->users, $collection));
  }

}

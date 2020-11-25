<?php


namespace App\Mail\Report;


use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailReportStatus extends Mailable
{
  use Queueable, SerializesModels;

  public $user;
  public $post;

  /**
   * Create a new message instance.
   *
   * @param App\Models\User $user
   * @param \Illuminate\Database\Eloquent\Collection $post Collection of projects
   * @return void
   */
  public function __construct(User $user, \Illuminate\Database\Eloquent\Collection $post)
  {
    $this->user = $user;
    $this->post = $post;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this
      ->to("minhhuongk57tha@gmail.com")
      ->subject('Report Status')
      ->view('emails.newsfeed.report');
  }

}

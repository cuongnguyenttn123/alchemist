<?php

namespace App\Mail\Contest\Alchemist;

use App\Models\User;
use App\Models\Contest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;

class ContestsNew extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  private $user;
  private $contests;

  /**
   * Create a new message instance.
   *
   * @param Illuminate\Database\Eloquent\Collection $contests Collection of contests
   * @param App\Models\User $user
   * @return void
   */
  public function __construct($contests, User $user)
  {
    $this->user = $user;
    $this->contests = $contests;

    $this->contests->load('categories', 'skill', 'attachments');
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this
      ->subject('New Contest')
      ->to($this->user->email)
      ->view('emails.contest.alchemist.contests-new')
      ->with([
        'user' => $this->user,
        'contests' => $this->contests,
      ]);
  }
}

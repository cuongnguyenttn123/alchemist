<?php

namespace App\Mail\Site;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyAccount extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  private $user;
  private $link;

  /**
   * Create a new message instance.
   *
   * @param App\Models\User $user
   * @return void
   */
  public function __construct(User $user, $activationCode)
  {
    $this->user = $user;
    $this->link = route('activation.url', $activationCode);
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this
      ->subject('Verify Account')
      ->to($this->user->email)
      ->view('emails.site.verify-account')
      ->with([
        'user' => $this->user,
        'link' => $this->link
      ]);
  }
}

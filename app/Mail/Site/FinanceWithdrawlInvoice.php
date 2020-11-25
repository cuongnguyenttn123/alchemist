<?php

namespace App\Mail\Site;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceWithdrawlInvoice extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  public $user;
  public $withdrawal;
  public $wallet;
  public $withdrawn;

  /**
   * Create a new message instance.
   *
   * @param App\Models\User $user
   * @return void
   */
  public function __construct(User $user, Withdrawal $withdrawal, int $wallet, int $withdrawn)
  {
    $this->user = $user;
    $this->withdrawal = $withdrawal;
    $this->wallet = $wallet;
    $this->withdrawn = $withdrawn;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {


    return $this
      ->subject('Withdraw Invoice')
      ->to($this->user->email)
      ->view('emails.site.finance-withdrawl-invoice');
  }
}

<?php

namespace App\Mail\Site;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceDepositMadeReceipt extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  private $user;
  private $deposit;
  private $deposited_amount;
  private $wallet;

  /**
   * Create a new message instance.
   *
   * @param App\Models\User $user
   * @param array $deposit Contans: merchant, time, date, amount
   * @param int $deposited_amount
   * @param int $wallet
   * @return void
   */
  public function __construct(User $user, $deposit, int $deposited_amount, int $wallet)
  {
    $this->user = $user;
    $this->deposit = $deposit;
    $this->deposited_amount = $deposited_amount;
    $this->wallet = $wallet;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this
      ->subject('Deposit Receipt')
      ->to($this->user->email)
      ->view('emails.site.finance-deposit-made-receipt')
      ->with([
        'user' => $this->user,
        'deposit' => $this->deposit,
        'deposited_amount' => $this->deposited_amount,
        'wallet' => $this->wallet
      ]);
  }
}

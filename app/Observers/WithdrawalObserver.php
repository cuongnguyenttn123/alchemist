<?php

namespace App\Observers;

use App\Models\Withdrawal;

class WithdrawalObserver
{
  public function updated(Withdrawal $withdrawal)
  {
    if ($withdrawal->status == "Rejected" && $withdrawal->payment_method == "Bank Payment") {
      $withdrawal->user->increment('wallet', $withdrawal->amount);
    }

    if ($withdrawal->status == "approved" && $withdrawal->payment_method == "Bank Payment") {
      $withdrawal->user->decrement('wallet', $withdrawal->amount);
    }
  }

  public function deleted(Withdrawal $withdrawal)
  {
    if ($withdrawal->status == "Pending" && $withdrawal->payment_method == "Bank Payment") {
      $withdrawal->user->decrement('wallet', $withdrawal->amount);
    }
  }
}

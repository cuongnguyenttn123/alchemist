<?php

namespace App\Observers;

use App\Models\Deposit;

class DepositObserver
{
  public function updated(Deposit $deposit)
  {
    if ($deposit->status == "approved" && $deposit->payment_method == "Bank Payment") {
      $deposit->updateUserWallet((float)$deposit->value);
    }
  }
}


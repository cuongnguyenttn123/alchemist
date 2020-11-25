<?php

namespace App\Observers;

use App\Models\ChargeCredit;

class ChargeCreditObserver
{
  public function updated(ChargeCredit $chargeCredit)
  {
    if ($chargeCredit->status == "approved" && $chargeCredit->payment_method == "Bank") {
      $chargeCredit->user->increment('credit', $chargeCredit->exchange_value);
      $chargeCredit->user->decrement('wallet', $chargeCredit->value);
    }
  }
}

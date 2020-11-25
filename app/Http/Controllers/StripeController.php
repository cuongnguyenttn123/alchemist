<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Mail\Site\FinanceDepositMadeReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Stripe\{Charge, Stripe, Customer};

/** All Paypal Details class **/

use App\Models\Deposit;

class StripeController extends HomeController
{

  public function postStripeDeposit(Request $request)
  {
    $user = Auth::user();
    $total_amount = $request->amount * 100;

    Stripe::setApiKey(config('services.stripe.secret'));
    $stripeCharge = Charge::create ([
      "amount" => $total_amount,
      "currency" => "usd",
      "source" => $request->stripeToken,
      "description" => "Payment with Stripe"
    ]);

    $total_amount /= 100;

    if($stripeCharge->values()[43] == "succeeded") {
      $deposit = new Deposit();
      $deposit->_user = $user->id;
      $deposit->currency = 'USD';
      $deposit->value = $total_amount;
      $deposit->payer_email = $request->stripeEmail;
      $deposit->payment_method = "Stripe";
      $deposit->transaction_id = $stripeCharge->values()[0];
      $deposit->status = "approved";
      $deposit->save();
      $deposit->updateUserWallet($total_amount);

      Mail::send(new FinanceDepositMadeReceipt($this->user,[
        'merchant' => 'Stripe',
        'time' => $deposit->created_at,
        'date' => $deposit->created_at,
        'amount' => $deposit->value
      ],$total_amount,$user->wallet + ($total_amount)));
    }

    return Redirect::route('profile.thefinancemanager');
  }
}

<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Mail\Site\FinanceDepositMadeReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Redirect;
use Illuminate\Support\Facades\Auth;

use App\Models\Deposit;

class BankController extends HomeController
{

  public function postBankDeposit(Request $request)
  {
    $user = Auth::user();
    $total_amount = $request->amount;

    $currency = $request->currency;
    $deposit = new Deposit();
    $deposit->_user = $user->id;
    $deposit->currency = 'USD';
    $deposit->value = $total_amount;
    $deposit->payer_email = $user->email;
    $deposit->payment_method = "Bank Payment";
    $deposit->transaction_id = $user->id . "_" . time();
    $deposit->status = "pending";
    $deposit->save();
    Mail::send(new FinanceDepositMadeReceipt($user,[
      'merchant' => 'Bank',
      'time' => $deposit->created_at,
      'date' => $deposit->created_at,
      'amount' => $deposit->value
    ],$total_amount,$user->wallet + ($total_amount)));

    return response()->json(['message' => 'Your deposit has been created.']);
  }
}


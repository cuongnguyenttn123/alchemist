<?php

namespace App\Http\Controllers;

use URL;
use Auth;
use Input;
use Session;
use Redirect;
use Validator;
use App\Myconst;
use PayPal\Api\Item;
use PayPal\Api\Plan;

/** All Paypal Details class **/

use PayPal\Api\Patch;
use PayPal\Api\Payer;
use App\Http\Requests;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use App\Libs\Calculator;
use App\Mail\Site\FinanceWithdrawlInvoice;
use PayPal\Api\Currency;
use PayPal\Api\ItemList;
use PayPal\Api\Agreement;
use App\Models\Withdrawal;
use PayPal\Api\ChargeModel;

use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use App\Models\ChargeCredit;
use Illuminate\Http\Request;
use PayPal\Api\PatchRequest;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Common\PayPalModel;

use PayPal\Api\ShippingAddress;
use PayPal\Api\PaymentExecution;

use PayPal\Api\PaymentDefinition;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\OverrideChargeModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use PayPal\Auth\OAuthTokenCredential;

class withdrawalController extends HomeController
{
    private $_api_context;
    // Đơn vị tiền thanh toán
    private $paymentCurrency;
    //giá
    private $exchange_rates;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $user = Auth::user();
        View::share('user', $user);

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);

        // Set mặc định đơn vị tiền để thanh toán
        $this->paymentCurrency = "USD";
        //quy đổi usd => credit
        $this->exchange_rates = 5;
    }
    /*list withdraw admin*/
    public function admin_list_withdraw()
    {
        $list_withdraws = Withdrawal::select('withdrawals.*')->paginate(Myconst::PAGINATE_ADMIN);
        return View('admin.withdraw.list_withdraw', compact('list_withdraws'));
    }
    /*end list withdraw admin*/
    /*post withdraw*/
    public function post_withdrawal(Request $request)
    {
        $user = Auth::user();
        //return $request;
        if ($user->wallet >= $request->amount) {
            $decrement_wallet = $user->decrement('wallet', $request->amount);
            $withdraw = new Withdrawal;
            $withdraw->update_withdraw($request, $user);
        } else {
            \Session::put('SweetAlert', 'Your wallet does not have enough money');
            return redirect()->back();
        }

        Mail::to($user->email)->send(new FinanceWithdrawlInvoice(
            $user,
            $withdraw,
            $user->wallet,
            $withdraw->amount
        ));

        \Session::put('SweetAlert', 'Send request successfully');
        return redirect()->back();
    }

  public function post_withdrawal_bank(Request $request)
  {
    $user = Auth::user();
    if ($user->wallet >= $request->amount) {
      $withdraw = new Withdrawal;
      $withdraw->update_withdraw_bank($request, $user);
    } else {
      \Session::put('SweetAlert', 'Your wallet does not have enough money');
      return redirect()->back();
    }

    Mail::to($user->email)->send(new FinanceWithdrawlInvoice(
      $user,
      $withdraw,
      $user->wallet,
      $withdraw->amount
    ));

    \Session::put('SweetAlert', 'Send request successfully');
    return redirect()->back();
  }
    /*end post withdraw*/
    /*accept withdraw*/
    public function accept_withdraw(Request $request)
    {
        $status = "Success";
        $accept_withdraw = Withdrawal::find($request->id);
        $check_status = $accept_withdraw->check_status();
        if ($check_status) {
            $check = $accept_withdraw->processes_withdraw($status);
            $this->CreateSinglePayout($accept_withdraw);
            if ($check) {
                if ($accept_withdraw->user->wallet < $accept_withdraw->amount) {
                    \Session::put('SweetAlert', 'error');
                    return redirect()->back();
                }
            } else {
                \Session::put('SweetAlert', 'error');
                return redirect()->back();
            }
        }

        return redirect()->back();
    }
    /*cancel withdraw*/
    public function cancel_withdraw(Request $request)
    {
        $status = "Rejected";
        $cancel_withdraw = Withdrawal::find($request->id);
        $check_status = $cancel_withdraw->check_status();
        if ($check_status) {
            $decrement_wallet = $cancel_withdraw->user->increment('wallet', $cancel_withdraw->amount);
            $cancel_withdraw->processes_withdraw($status);
        }

        return redirect()->back();
    }
    /*CreateSinglePayout*/
    public function CreateSinglePayout($data)
    {
        $set_amount = '{
                            "value":"' . $data->amount . '",
                            "currency":"USD"
                        }';
        // # Create Single Synchronous Payout Sample
        // Create a new instance of Payout object
        $payouts = new \PayPal\Api\Payout();

        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
        // ### NOTE:
        // You can prevent duplicate batches from being processed. If you specify a `sender_batch_id` that was used in the last 30 days, the batch will not be processed. For items, you can specify a `sender_item_id`. If the value for the `sender_item_id` is a duplicate of a payout item that was processed in the last 30 days, the item will not be processed.
        // #### Batch Header Instance
        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Payout!");
        // #### Sender Item
        // Please note that if you are using single payout with sync mode, you can only pass one Item in the request
        $senderItem = new \PayPal\Api\PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for your patronage!')
            ->setReceiver($data->withdraw_email)
            ->setSenderItemId("2014031400023")
            ->setAmount(new \PayPal\Api\Currency($set_amount));
        $payouts->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem);
        // For Sample Purposes Only.
        $request = clone $payouts;
        // ### Create Payout
        try {
            $output = $payouts->create(null, $this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Single Synchronous Payout", "Payout", null, $request, $ex);
            exit(1);
        }
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        // ResultPrinter::printResult("Created Single Synchronous Payout", "Payout", $output->getBatchHeader()->getPayoutBatchId(), $request, $output);
        return $output;
    }
}

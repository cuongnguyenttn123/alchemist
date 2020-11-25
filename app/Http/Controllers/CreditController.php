<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use URL;
use Auth;
use Input;
use Session;
use Redirect;
use Validator;
use PayPal\Api\Item;
use PayPal\Api\Plan;
use PayPal\Api\Patch;

/** All Paypal Details class **/

use PayPal\Api\Payer;
use App\Http\Requests;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use App\Libs\Calculator;
use PayPal\Api\Currency;
use PayPal\Api\ItemList;
use PayPal\Api\Agreement;
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
use App\Mail\Site\FinanceCreditPurchasedReceipt;

class CreditController extends HomeController
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

    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChargeCredit()
    {
        return view('phongtestmail.form_send_mail');
    }

    public function HandlingCredit(Request $request)
    {
        if ($request->type == 'paypal') {
            return $this->postChargeCredit($request);
        } elseif ($request->type == 'wallet') {
            $amount_value = $request->amount;
            //tỷ giá sau quy đổi
            $value_conversion = $amount_value * $this->exchange_rates;
            $wallet = $this->user->wallet;
            if ($wallet >= $amount_value) {
                //trừ tiền từ wallet
                $decrement_wallet = $this->user->decrement('wallet', $amount_value);
                //cộng tiền vào credit

                $increment_credit = $this->user->increment('credit', $value_conversion);
                //lưu lại dao dich vào bảng charge credit
                $charge_credit = new ChargeCredit();
                $charge_credit->_user = $this->user->id;
                $charge_credit->value = $amount_value;
                $charge_credit->exchange_value =  $value_conversion;
                $charge_credit->payment_method = $request->type;
                $charge_credit->status = 'approved';
                $charge_credit->save();
                \Session::put('SweetAlert', 'Payment success');

                Mail::to($this->user->email)->send(new FinanceCreditPurchasedReceipt(
                    $this->user,
                    $charge_credit,
                    $charge_credit->value,
                    $charge_credit->exchange_value,
                    $this->user->totalCredit
                ));

                return Redirect::route('profile.thefinancemanager');
            } else {
                \Session::put('SweetAlert', 'Your wallet is not enough to make payment, please add money to your wallet to make payment');
                return Redirect::route('profile.thefinancemanager');
            }
        }
    }

    public function postChargeCredit($request)
    {
        $amount_value = $request->amount;
        //$currency = $request->currency;
        //$deposit = $request->deposit;
        // dd($request->toArray());

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Credit Money')
            /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($amount_value);
        /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amount_value);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('getPaymentStatus'))
            /** Specify return URL **/
            ->setCancelUrl(URL::route('getPaymentStatus'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        // dd($payment);
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('SweetAlert', 'Connection timeout');

                return Redirect::route('profile.thefinancemanager');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('SweetAlert', 'Some error occur, sorry for inconvenient');
                return Redirect::route('profile.thefinancemanager');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('SweetAlert', 'Unknown error occurred');
        return Redirect::route('profile.thefinancemanager');
    }

    public function getPaymentStatus()
    {
        // dd(Session::all());
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('SweetAlert', 'Payment failed');
            return Redirect::route('profile.thefinancemanager');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/

        // dd($result);
        if ($result->getState() == 'approved') {
            $payer = $result->getPayer();
            $payment_method = $payer->getPaymentMethod();
            $payerinfo = $payer->getPayerInfo();
            $payer_email = $payerinfo->getEmail();
            $transactions = $result->getTransactions()[0];

            $amount = $transactions->getAmount();
            $total_amout = $amount->getTotal();
            $currency = $amount->getCurrency();
            // dd($transactions);
            //tỷ giá sau quy đổi
            $value_conversion = $total_amout * $this->exchange_rates;
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            $charge_credit = new ChargeCredit();
            $charge_credit->_user = $this->user->id;
            $charge_credit->value = $total_amout;
            $charge_credit->exchange_value =  $value_conversion;
            $charge_credit->payer_email = $payer_email;
            $charge_credit->payment_method = $payment_method;
            $charge_credit->transaction_id = $result->getId();
            $charge_credit->status = $result->getState();
            $charge_credit->save();
            $charge_credit->updateUserCredit($value_conversion);

            Mail::to($charge_credit->user)->send(new FinanceCreditPurchasedReceipt(
                $charge_credit->user,
                $charge_credit,
                $charge_credit->value,
                $charge_credit->exchange_value,
                $charge_credit->user->totalCredit
            ));

            \Session::put('SweetAlert', 'Payment success');
            return Redirect::route('profile.thefinancemanager');
        }
        \Session::put('SweetAlert', 'Payment failed');

        return Redirect::route('profile.thefinancemanager');
    }

  public function HandlingCreditStripe(Request $request)
  {

      $amount_value = $request->credit_amount * 100;
      Stripe::setApiKey(config('services.stripe.secret'));
      $stripeCharge = Charge::create ([
        "amount" => $amount_value,
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Payment with Stripe"
      ]);
      $amount_value /= 100;
      //tỷ giá sau quy đổi
      $value_conversion = $amount_value * $this->exchange_rates;
      $wallet = $this->user->wallet;
      if ($wallet >= $amount_value && $stripeCharge->values()[43] == "succeeded") {
        //trừ tiền từ wallet
        $decrement_wallet = $this->user->decrement('wallet', $amount_value);
        //cộng tiền vào credit

        $increment_credit = $this->user->increment('credit', $value_conversion);
        //lưu lại dao dich vào bảng charge credit
        $charge_credit = new ChargeCredit();
        $charge_credit->_user = $this->user->id;
        $charge_credit->value = $amount_value;
        $charge_credit->exchange_value =  $value_conversion;
        $charge_credit->payment_method = "Stripe";
        $charge_credit->payer_email = $request->stripeEmail;
        $charge_credit->transaction_id = $stripeCharge->values()[0];
        $charge_credit->status = "approved";
        $charge_credit->save();
        \Session::put('SweetAlert', 'Payment success');

        Mail::to($this->user->email)->send(new FinanceCreditPurchasedReceipt(
          $this->user,
          $charge_credit,
          $charge_credit->value,
          $charge_credit->exchange_value,
          $this->user->totalCredit
        ));

        return Redirect::route('profile.thefinancemanager');
      } else {
        \Session::put('SweetAlert', 'Your wallet is not enough to make payment, please add money to your wallet to make payment');
        return Redirect::route('profile.thefinancemanager');
      }
    }
  public function HandlingCreditBank(Request $request)
  {

    $amount_value = $request->credit_amount;
    $value_conversion = $amount_value * $this->exchange_rates;
    $wallet = $this->user->wallet;
    if ($wallet >= $amount_value) {
      //trừ tiền từ wallet
      //$decrement_wallet = $this->user->decrement('wallet', $amount_value);
      //cộng tiền vào credit

      //$increment_credit = $this->user->increment('credit', $value_conversion);
      //lưu lại dao dich vào bảng charge credit
      $charge_credit = new ChargeCredit();
      $charge_credit->_user = $this->user->id;
      $charge_credit->value = $amount_value;
      $charge_credit->exchange_value =  $value_conversion;
      $charge_credit->payment_method = "Bank";
      $charge_credit->status = 'pending';
      $charge_credit->payer_email = $this->user->email;
      $charge_credit->transaction_id = $this->user->id . "_" . time();
      $charge_credit->save();
      \Session::put('SweetAlert', 'Payment success');

      Mail::to($this->user->email)->send(new FinanceCreditPurchasedReceipt(
        $this->user,
        $charge_credit,
        $charge_credit->value,
        $charge_credit->exchange_value,
        $this->user->totalCredit
      ));

      return Redirect::route('profile.thefinancemanager');
    } else {
      \Session::put('SweetAlert', 'Your wallet is not enough to make payment, please add money to your wallet to make payment');
      return Redirect::route('profile.thefinancemanager');
    }
  }
}


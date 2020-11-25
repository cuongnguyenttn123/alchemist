<?php

namespace App\Mail\Site;

use App\Models\User;
use App\Models\ChargeCredit;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceCreditPurchasedReceipt extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $credit;
    public $paid_amount;
    public $purchased_credit;
    public $total_credit;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $user
     * @param App\Models\ChargeCredit $credit
     * @param int $paid_amount
     * @param int $purchased_credit
     * @param int $total_credit
     * @return void
     */
    public function __construct(User $user, ChargeCredit $credit, int $paid_amount, int $purchased_credit, int $total_credit)
    {
        $this->user = $user;
        $this->credit = $credit;
        $this->paid_amount = $paid_amount;
        $this->purchased_credit = $purchased_credit;
        $this->total_credit = $total_credit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Purchased Receipt')
            ->to($this->user->email)
            ->view('emails.site.finance-credit-purchased-receipt');
    }
}

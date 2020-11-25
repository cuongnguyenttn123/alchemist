<?php

namespace App\Mail\Site;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountPasswordReset extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $user;
    private $resetToken;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $user
     * @return void
     */
    public function __construct(User $user, $resetToken)
    {
        $this->user = $user;
        $this->resetToken = $resetToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Reset Password')
            ->to($this->user->email)
            ->view('emails.site.account-password-reset')
            ->with([
                'user' => $this->user,
                'link' => route('password.customReset', $this->resetToken)
            ]);
    }
}

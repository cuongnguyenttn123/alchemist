<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
  /**
   * Build the mail representation of the notification.
   *
   * @param mixed $notifiable
   * @return MailMessage
   */
  public function toMail($notifiable)
  {
    if (static::$toMailCallback) {
      return call_user_func(static::$toMailCallback, $notifiable, $this->token);
    }

    return (new MailMessage)
      ->view(
        'emails.site.account-password-reset', [
          'user' => $notifiable,
          'link' => route('password.customReset', $this->token)
        ]
      )
      ->subject('Reset Password');
  }
}

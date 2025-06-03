<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable)
    {
        $expireTime = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        
        return (new MailMessage)
            ->subject('🔐 Password Reset Request - RTEMS')
            ->greeting('Dear ' . $notifiable->name)
            ->line('We received a request to reset the password for your RTEMS account.')
            ->line('To ensure the security of your account, please click the button below to reset your password:')
            ->action('Reset My Password', url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false)))
            ->line('This password reset link will expire in ' . $expireTime . ' minutes.')
            ->line('For security reasons:')
            ->line('• If you did not request this password reset, please ignore this email or contact support if you have concerns.')
            ->line('• Your password will remain unchanged until you click the link above and create a new one.')
            ->salutation('Best regards, RTEMS Security Team')
            ->line('📧 support@rtems.com')
            ->line('📞 +250 788 123 456');
    }
}

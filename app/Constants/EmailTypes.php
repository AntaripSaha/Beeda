<?php

namespace App\Constants;

abstract class EmailTypes
{
    const WELCOME_MAIL = 'welcome_mail';
    const EMAIL_VERIFY_MAIL = 'email_verify_mail';
    const PASSWORD_RESET_MAIL = 'password_reset_mail';
    const PASSWORD_CHANGE_MAIL = 'password_change_mail';
    const EMAIL_CHANGE_MAIL = 'email_change_mail';
    const FORGOT_PASSWORD_MAIL = 'forgot_password_mail';
    const OTP_MAIL = 'otp_mail';
    const ORDER_CONFIRMATION_MAIL = 'order_confirmation_mail';
}

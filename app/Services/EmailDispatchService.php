<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Constants\EmailTypes;
use App\Jobs\SendEmailJob;
use App\Mail\ForgotPasswordMail;
use App\Mail\OrderConfirmationMail;
use App\Mail\OtpMail;

class EmailDispatchService
{
    public function send($type,$email,$data)
    {
        if(env('SEND_EMAIL'))
        {
            switch($type) {
                case(EmailTypes::WELCOME_MAIL):
                    Mail::send(new WelcomeMail($email,$data));
                    break;
     
                case(EmailTypes::FORGOT_PASSWORD_MAIL):
                    Mail::send(new ForgotPasswordMail($email,$data));
                    break;
    
                case(EmailTypes::OTP_MAIL):
                    Mail::send(new OtpMail($email,$data));
                    break;
    
                case(EmailTypes::ORDER_CONFIRMATION_MAIL):
                    Mail::send(new OrderConfirmationMail($email,$data));
                    break;
            }
        }   
    }
}

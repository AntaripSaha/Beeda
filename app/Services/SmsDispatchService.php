<?php

namespace App\Services;

use App\Constants\SmsTypes;
use Twilio\Rest\Client;

class SmsDispatchService
{
    public function __construct()
    {
        $this->account_sid = env("TWILIO_SID");
        $this->auth_token = env("TWILIO_AUTH_TOKEN");
        $this->twilio_number = env("TWILIO_NUMBER");
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function send($type,$phone,$data)
    {
        switch($type) {
            case(SmsTypes::OTP):
                $this->otpSMS($phone,$data);
                break;

            case(SmsTypes::NOTIFICATION):
                //
                break;
        }
    }

    private function otpSMS($phone,$data)
    {
        if(env('SEND_SMS')){
            $client = new Client($this->account_sid, $this->auth_token);
            $client->messages->create($phone, 
                [
                    'from' => $this->twilio_number,
                    'body' => 'Your Beeda OTP is ' . $data->verification_code . '.'
                ] 
            );
        }
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $email;

    public function __construct($email,$data)
    {
        $this->email = $email;
        $this->data = $data;
    }

    public function build()
    {
        return $this->to($this->email)
            ->subject('Order Confirmation')
            ->from(env('MAIL_FROM_ADDRESS'),'Beeda')
            ->view('emails.order_confirmation',['data'=>$this->data]);
    }
}

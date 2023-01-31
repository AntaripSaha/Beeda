<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Constants\EmailTypes;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $type;
    protected $email;
    protected $data;

    public function __construct($type,$email,$data)
    {
        $this->type = $type;
        $this->email = $email;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch($this->type) {
            case(EmailTypes::WELCOME_MAIL):
                Mail::queue(new WelcomeMail($this->email,$this->data));
                break;
 
            case(EmailTypes::FORGOT_PASSWORD_MAIL):
                 
                //
                break;
        }
    }
}

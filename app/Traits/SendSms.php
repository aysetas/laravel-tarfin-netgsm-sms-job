<?php

namespace App\Traits;

use App\Jobs\SmsJob;

trait SendSms
{
    public function smsMessage(string $phone , string $message){

        dispatch(new SmsJob($phone,$message));

    }
}


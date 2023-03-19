<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use TarfinLabs\Netgsm\Sms\NetgsmSmsMessage;

class SmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    protected string $phone_number;

    /**
     * @var string
     */
    protected string $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $phone_number , string $message)
    {
        $this->phone_number = $phone_number;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $msg = new NetgsmSmsMessage($this->message);
        $msg->setRecipients($this->phone_number);
        \Netgsm::sendSms($msg);
    }
}

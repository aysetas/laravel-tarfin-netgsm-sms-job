<?php

namespace App\Console\Commands;

use App\Models\Option;
use App\Traits\SendSms;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;



class RemainingBalanceSms extends Command
{
    use SendSms;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:remaining-balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Finding out the remaining balance in the Netgsm account';

    /**
     * Execute the console command
     * @return void
     */
    public function handle(): void
    {
        $phone = '534xxxxxxx';
        try {
            $netGsmRemaining = \Netgsm::getCredit();
            $msg = 'Kalan SMS Bakiyesi:'.' '. $netGsmRemaining . '\n\n';
            $msg.= date('d.m.Y', strtotime(now())).' - '.date('H:i:s', strtotime(now())).'\n\n';

            Option::whereActive(1)
                ->where('key', 'remaning-balance-sms')
                ->whereNull('deleted_at')
                ->update([
                    'value' => $netGsmRemaining
                ]);

            if ($netGsmRemaining <= 100) {
                $this->smsMessage($phone, $msg);
            }


        } catch (\Exception $exception) {
            Log::error('NETGSM Hata mesajı : ' . $exception->getMessage());
        }
    }
}

<?php

namespace App\Jobs\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Payment;

class MobileMoneyPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Array $request)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
         * Persist mobile money transaction
         * and set status to pending
         */
        $payment = new Payment;
        if(!empty($request['company_id']))
        {
            $payment->company_id = $request['company_id'];
        }
        if(!empty($request['user_id']))
        {
            $payment->user_id = $request['user_id'];
        }
        else{
            if(!empty($request['doneBy'])){
                $payment->doneBy = $request['doneBy'];
            }
            $payment->customer_phone = $request['subscriber_number'];
        }
        $payment->status = 'Pending';
        $payment->amount = $request['amount'];
        $payment->method = 'Mobile Money';
        $payment->transactional_id = $request['transactional_id'];
        $payment->app = $request['app'];
        $payment->save();
    }
}

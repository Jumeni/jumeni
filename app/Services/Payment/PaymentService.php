<?php

namespace App\Services\Payment;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as HttpRequest;
use Illuminate\Support\Facades\Log;
use App\Services\Payment\PaySwitchPayment;
use App\Models\Payment;
use Illuminate\Http\Request;


class PaymentService {

    protected $http;

    /**
     * Create a new Pyment Service instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = new Client();
    }

    public function handleCallback(array $array)
    {
        $payment = Payment::where('transaction_id', $array['transaction_id'])
                            ->first();
        $payment;
    }

    /**
     * Mobile money processing
     *
     * @param Request $request
     * @return void
     */
    public function payWithMobileMoney(Array $request)
    {
        $pay = new PaySwitchPayment();
        $pay->amount = $request['amount'];
        $pay->subscriber_number = $request['subscriber_number'];
        $pay->r_switch = $request['r_switch'];
        $pay->desc = "Mobile Money Test";
        $pay->processing_code = "000200";
        if(!empty($request['voucher_code'])){
            $pay->voucher_code = $request['voucher_code'];
        }

        return $pay->momoPay();

    }
    /**
     * Card processing
     *
     * @param Array $request
     * @return array
     */
    public function payWithCard(Array $request)
    {
        $pay = new PaySwitchPayment();
        $pay->amount = $request['amount'];
        $pay->pan = $request['pan'];
        $pay->desc = "Card Payment Test";
        $pay->processing_code = "000000";
        $pay->exp_month = $request['exp_month'];
        $pay->exp_year = $request['exp_year'];
        $pay->cvv = $request['cvv'];
        $pay->currency = $request['currency'];
        $pay->card_holder = $request['card_holder'];
        $pay->customer_email = $request['customer_email'];
        $pay->r_switch = $request['r_switch'];

        return $pay->cardPay();
    }


}

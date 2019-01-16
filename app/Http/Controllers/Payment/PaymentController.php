<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Payment\PaymentService;
use Validator;
use App\Jobs\Payment\MobileMoneyPayment;
use App\Jobs\Payment\CardPayment;

class PaymentController extends Controller
{

    /**
     * Pay with mobile money
     *
     * @param Request $request
     * @param PaymentService $pay
     * @return json
     */
    public function momo_pay(Request $request, PaymentService $pay)
    {
        $validateData = Validator::make($request->all(),[
                'amount' => 'required|numeric',
                'subscriber_number' => 'required|numeric',
                'r_switch' => 'required|string',
                'voucher_code' => 'nullable',
                'company_id' => 'numeric|nullable',
                'user_id' => 'numeric|nullable',
                'app' => 'string|nulllable',
                'doneBy' => 'string|nullaable'
            ])->validate();

        MobileMoneyPayment::dispatch($request->all());

        $response = $pay->payWithMobileMoney($request->all());

        return response()->json($response);
    }

    public function card_pay(Request $request, PaymentService $pay)
    {
        $validateData = Validator::make($request->all(),[
                'amount' => 'required|numeric',
                'pan' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvv' => 'required|numeric',
                'currency' => 'required|string',
                'card_holder' => 'required|string',
                'customer_email' => 'required|email',
                'customer_phone' => 'numeric|nullable',
                'r_switch' => 'required|string',
                'company_id' => 'numeric|nullable',
                'user_id' => 'numeric|nullable',
                'app' => 'string|nulllable',
            ])->validate();

        $response = $pay->payWithCard($request->all());

        CardPayment::dispatch($request->all());

        return response()->json($response);
    }


}

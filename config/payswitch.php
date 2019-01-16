<?php



return [
    /**
     * Base url
     *
     * @var string
     * @property required
     */
    'base_uri' => env('PAYSWITCH_BASE_URI'),

     /**
     * Your API key provided when you create an account.
     *
     * @var string
     * @property required
     */
    'api_key' => env('PAYSWITCH_API_KEY'),

    /**
     * Your username provided used to create an account.
     *
     * @var string
     * @property required
     */
    'username' => env('PAYSWITCH_USERNAME'),

    /**
     * Your merchant API key provided when you create an account.
     *
     * @var string
     * @property required
     */
    'merchant_id' => env('PAYSWITCH_MERCHANT_ID'),

    /**
     * Unique pass code generated when you create a float account.
     *
     * @var string
     * @property required
     */
    'pass_code' => env('PAYSWITCH_PASSCODE'),

    /**
     * PaySwitch test transfer url
     *
     * @var string
     * @link https://test.theteller.net/v1.1/transaction/process
     */
    'transfer_url' => env('PAYSWITCH_TRANSFER_URL', 'v1.1/transaction/process'),

    /**
     * PySwitch test bank tranfer authorization check url
     *
     * @var string
     * @link https://test.theteller.net/v1.1/transaction/bank/ftc/authorize
     */
    'bank_tranfer_authorize' => env('PAYSWITCH_TRANSFER_AUTH_URL', 'v1.1/transaction/bank/ftc/authorize'),

     /**
     * PaySwitch test payment url
     *
     * @var string
     * @link https://test.theteller.net/v1.1/transaction/process
     */
    'payment_url' => env('PAYSWITCH_PAYMENT_URL', 'v1.1/transaction/process'),

    /**
     * PaySwitch Card Payment Reversal
     *
     * @var string
     * @link https://prod.theteller.net/rest/resources/card/reversal
     */
    'reversal_url' => env('PAYSWITCH_PAYMENT_REVERSAL_URL', 'rest/resources/card/reversal'),


    /**
     * Application redirect url handler
     *
     * @var string
     * @link your_app_url/payswitch/payment/callback
     */
    'redirect_url' => env('PAYSWITCH_REDIRECT_URL')


];


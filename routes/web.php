<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/pay/momo', 'Payment\PaymentController@momo_pay');
Route::post('/pay/card', 'Payment\PaymentController@card_pay');
Route::get('/payswitch/callback', 'Payment\PaymentController@callbaack');


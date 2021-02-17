<?php
use Illuminate\Support\Facades\Route;

/** Payment Routes *************************************/

//checkout
Route::get('payment-checkout' , 'PaymentController@payment_checkout')->name('payment_checkout');
Route::get('payment-success' , 'PaymentController@payment_success')->name('payment_success');
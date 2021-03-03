<?php
use Illuminate\Support\Facades\Route;

/** Website Routes *************************************/

Route::get('/', 'WebsiteController@home_page')->name('website.home');


/** Payment Routes *************************************/

Route::get('payment-checkout', 'PaymentController@payment_checkout')->name('payment_checkout');
Route::get('payment-success', 'PaymentController@payment_success')->name('payment_success');
<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	
    
/** Website Routes *************************************/

Route::get('/', 'WebsiteController@home_page')->name('website.home');
Route::get('/institutes', 'WebsiteController@institutes_page')->name('website.institutes');
Route::get('/institute/{institute_id?}/{institute_slug?}/{course_slug?}', 'WebsiteController@institute_page')->name('website.institute');
Route::get('/student-requests/confirm-reservation','WebsiteController@confirm_reservation')->name('student_requests.confirm_reservation');   

// invoice pdf route
Route::get('student-invoice', 'WebsiteController@student_invoice')->name('student_invoice');
// create student request route
Route::post('create-student-request', 'WebsiteController@create_student_request')->name('create_student_request');


/** Payment Routes *************************************/

Route::get('payment-checkout', 'PaymentController@payment_checkout')->name('payment_checkout');
Route::get('payment-success', 'PaymentController@payment_success')->name('payment_success');


Route::get('student-path', function(){
    return 'student path';
})->middleware('AuthStudent:student');

Route::get('student/profile', function(){
    return 'student profile';
})->middleware('AuthStudent:student')->name('student.profile');

Route::get('student/login', 'WebsiteController@student_login_page')->name('student.login');
Route::post('student/login', 'WebsiteController@student_login_auth')->name('student.login');
Route::get('student/register', 'WebsiteController@student_register_page')->name('student.register');
Route::post('student/register', 'WebsiteController@student_register_auth')->name('student.register');






});

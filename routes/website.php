<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	
    
/** Website Routes *************************************/

Route::get('/', 'WebsiteController@home_page')->name('website.home');
Route::get('/institutes', 'WebsiteController@institutes_page')->name('website.institutes');
Route::get('/institute/{institute_id?}/{institute_slug?}/{course_slug?}', 'WebsiteController@institute_page')->name('website.institute');


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

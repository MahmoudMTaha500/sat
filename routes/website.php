<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	
    
/** Website Routes *************************************/
Route::get('/', 'WebsiteController@home_page')->name('website.home');
Route::get('/about-us', 'WebsiteController@about_us')->name('website.about.us');
Route::get('/contact-us', 'WebsiteController@contact_us')->name('website.contact.us');
Route::post('/send-contact-us-mail', 'WebsiteController@send_contact_us_mail')->name('send.contact.us.mail');
Route::get('/offers', 'WebsiteController@offers')->name('website.offers');
Route::get('/terms-conditions', 'WebsiteController@terms_conditions')->name('website.terms_conditions');
Route::get('/refund-policy', 'WebsiteController@refund_policy')->name('website.refund_policy');


/** institute Routes *************************************/
Route::get('/institutes', 'WebsiteController@institutes_page')->name('website.institutes');
Route::get('/institute/{institute_id?}/{institute_slug?}/{course_slug?}', 'WebsiteController@institute_page')->name('website.institute');
Route::post('institute/add-review', 'WebsiteController@add_review')->name('institutes.add.review');


/** articles Routes *************************************/
Route::get('/articles','WebsiteController@articles')->name('website.articles');
Route::get('/article/{id}','WebsiteController@article')->name('website.article');


/** Student Routes *************************************/
Route::get('student/profile', 'WebsiteController@student_profile')->middleware('AuthStudent:student')->name('student.profile');
Route::get('student/reservation', 'WebsiteController@student_reservation')->middleware('AuthStudent:student')->name('student.reservation');
Route::get('student/favourite', 'WebsiteController@student_favourite')->middleware('AuthStudent:student')->name('student.favourite');
Route::get('student/notification', 'WebsiteController@student_notification')->middleware('AuthStudent:student')->name('student.notification');
Route::get('student/success-story', 'WebsiteController@student_success_story')->middleware('AuthStudent:student')->name('student.success.story');
Route::post('student/update-success-story', 'WebsiteController@update_success_story')->middleware('AuthStudent:student')->name('student.update.success.story');
Route::get('student/login', 'WebsiteController@student_login_page')->name('student.login');
Route::post('student/login', 'WebsiteController@student_login_auth')->name('student.login');
Route::get('student/register', 'WebsiteController@student_register_page')->name('student.register');
Route::post('student/register', 'WebsiteController@student_register_auth')->name('student.register');
Route::post('update-student-profile','WebsiteController@update_student_profile')->name('update.student.profile');
Route::get('/student-requests/confirm-reservation','WebsiteController@confirm_reservation')->name('student_requests.confirm_reservation');   
Route::post('create-student-request', 'WebsiteController@create_student_request')->name('create_student_request');
Route::get('/student-requests/payment-method','WebsiteController@chose_payment_method')->name('student_requests.chose_payment_method');   
Route::get('/update-student-favorit', 'WebsiteController@update_student_favorit')->name('update.student.favorit');

Route::get('student/reset-password', 'WebsiteController@student_reset_password')->name('student.reset_password');
Route::post('student/reset-password', 'WebsiteController@student_send_mail_reset_password')->name('student.reset_password');
// invoice pdf route
Route::get('student-price-offer', 'WebsiteController@student_invoice')->name('student_invoice');


/** Payment Routes *************************************/
Route::get('pay-now/{request_id}', 'WebsiteController@pay_now')->name('pay_now');
Route::post('checkout', 'WebsiteController@checkout')->name('checkout');
Route::get('payment-confirmation', 'WebsiteController@payment_confirmation')->name('payment_confirmation');
Route::get('student-path', function(){
    return 'student path';
})->middleware('AuthStudent:student');



Route::resource('order-visa', "simpleVisaController");
Route::post('order-visa-checkout', "simpleVisaController@order_visa_checkout")->name('order-visa-checkout');






});




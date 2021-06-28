<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-countries', 'VueRequestsController@get_countries')->name('vue.get.countries');
Route::get('/get-cities', 'VueRequestsController@get_cities')->name('vue.get.cities');
Route::get('/get-courses', 'VueRequestsController@get_courses')->name('vue.get.courses');
Route::get('/get-course-for-institute-page', 'VueRequestsController@get_course_for_institute_page')->name('vue.get.course.for.institute.page');
Route::get('/get-course-price-per-week', 'VueRequestsController@get_course_price_per_week')->name('vue.get.course.price.per.week');
Route::get('/get-insurance-price-per-week', 'VueRequestsController@get_insurance_price_per_week')->name('vue.get.insurance.price.per.week');
Route::get('/get-student-favourite-courses', 'VueRequestsController@get_student_favourite_courses')->name('vue.get.student.favourite.courses');



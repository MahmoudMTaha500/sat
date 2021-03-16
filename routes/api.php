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



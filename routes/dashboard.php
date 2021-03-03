<?php
use Illuminate\Support\Facades\Route;

Route::get('getinstitues', 'InstituteController@getInstitues');
Route::post('update-institute-aprovement', 'InstituteController@updateAprovement');
Route::post('filter', 'InstituteController@filter');

Route::get('institute/restor/{id}', 'InstituteController@restor');
Route::get('institute/archive', 'InstituteController@archive');
Route::resource('institute', 'InstituteController');
Route::get('getcomment', 'CommentController@getcomment');
Route::post('comment/updateAprovement', 'CommentController@updateAprovement');


Route::resource('comment', 'CommentController');

Route::get('getrate', 'InstituteRateController@getrates');
Route::post('updaterate', 'InstituteRateController@updaterate');
Route::resource('rate', 'InstituteRateController');

/**********************************Axios Route city ************************************************************************************** */
Route::get("getcities", "CityController@getCities");
Route::post("addCity", "CityController@addCity");

// Institute Route
Route::resource('institute', 'InstituteController');
// Country Route
Route::resource('countries', 'CountryController');
// City Route
Route::resource('cities', 'CityController');
// Course Route

Route::get('filtercourses', 'CourseController@filtercourses');
Route::get('getcourses', 'CourseController@getCourses');
Route::post('update-course-aprovement', 'CourseController@updateAprovement');

Route::get('courses/restor/{id}', 'CourseController@restor');
Route::get('courses/archive', 'CourseController@archive');
Route::resource('courses', 'CourseController');
// Visa Route
Route::resource('visas', 'VisaController');
// Visa Category Route
Route::resource('visa_categories', 'VisaCategoryController');
// Blog Route

Route::post('update-blog-aprovement', 'BlogController@updateAprovement');
Route::get('blog/filter', 'BlogController@filter');
Route::get('blogs/comment', 'CommentController@blog');
Route::get('blogs/getcomment', 'CommentController@getcommentBlog');
Route::get('blogs/archive', 'BlogController@archive');
Route::get('blogs/restor/{id}', 'BlogController@restor');

Route::resource('blogs', 'BlogController');
Route::get('get_blogs_by_vue', 'BlogController@get_blogs_by_vue')->name('get_blogs_by_vue');
// Blog Category Route
Route::resource('blog_categories', 'BlogCategoryController');
// Student Route
Route::resource('students', 'StudentController');

Route::get('/insurances/get','InsurancesController@getInsurances');
Route::get('/insurances/edit/{id}','InsurancesController@editInsuarnce');
Route::get('/insurances/delete/{id}','InsurancesController@destroy');
Route::get('/insurances/filter/','InsurancesController@filter');
Route::resource('insurances','InsurancesController');

Route::get('/airports/get','AirportsController@getAirports');
Route::get('/airports/edit/{id}','AirportsController@editAirports');
Route::get('/airports/delete/{id}','AirportsController@destroy');
Route::get('/airports/filter/','AirportsController@filter');
Route::resource('airports','AirportsController');

Route::get('/residences/get','ResidencesController@getResidences');
Route::get('/residences/edit/{id}','ResidencesController@editResidences');
Route::get('/residences/delete/{id}','ResidencesController@destroy');
Route::get('/residences/filter/','ResidencesController@filter');
Route::resource('residences','ResidencesController');

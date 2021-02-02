<?php
use Illuminate\Support\Facades\Route;




/*********************************************  start Country Routs **************************************************************************************************** */

// Route::get("/country","countryController@index");
// Route::get('/getcountries',"countryController@show");
// Route::get('/addcountry',"countryController@create");
// Route::post('/addcountry',"countryController@store");
// Route::get('/updateCountry/{id}',"countryController@edit");
// Route::post('/updateCountry',"countryController@update");
// Route::get('/deleteCountry/{id}',"countryController@delete");
/*********************************************  end Country Routs **************************************************************************************************** */


/*********************************************  start City Routs **************************************************************************************************** */
  
/**********************************Axios Route city ************************************************************************************** */
Route::get("getcities","CityController@getCities");
Route::post("addCity","CityController@addCity");


// Institute Route
Route::resource('institute', 'InstituteController');
// Country Route
Route::resource('countries', 'CountryController');
// City Route
Route::resource('cities', 'CityController');
// Course Route
Route::resource('courses', 'CourseController');
// Visa Route
Route::resource('visas', 'VisaController');
// Visa Category Route
Route::resource('visa_categories', 'VisaCategoryController');
// Blog Route
Route::resource('blogs', 'BlogController');
// Blog Category Route
Route::resource('blog_categories', 'BlogCategoryController');


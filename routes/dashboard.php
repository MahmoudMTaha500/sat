<?php
use Illuminate\Support\Facades\Route;


Route::resource('institute', 'InstituteController');


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

Route::resource('countries', 'CountryController');
Route::resource('cities', 'CityController');
Route::resource('courses', 'CourseController');
Route::resource('visas', 'VisaController');
Route::resource('visa_categories', 'VisaCategoryController');




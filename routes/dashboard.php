<?php
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    $department_name='dashboard';
    $page_name='dashboard';
    return view('/admin/dashboard' , compact('department_name' , 'page_name'));
})->name('dashboard');



Route::group(['prefix' => 'dashboard'], function() {

  

    // Route::get('/add-institute', function () {
    //     $department_name='institutes';
    //     $page_name='add-institute';
    //     return view('/admin/institutes.create' , compact('department_name' , 'page_name'));
    // })->name('dashboard.add-institute');
Route::resource('institute', 'InstituteController');


    /*********************************************  start Country Routs **************************************************************************************************** */
    
    Route::get("/country","countryController@index");
    Route::get('/getcountries',"countryController@show");
    Route::get('/addcountry',"countryController@create");
    Route::post('/addcountry',"countryController@store");
    Route::get('/updateCountry/{id}',"countryController@edit");
    Route::post('/updateCountry',"countryController@update");
    Route::get('/deleteCountry/{id}',"countryController@delete");
    /*********************************************  end Country Routs **************************************************************************************************** */


    /*********************************************  start City Routs **************************************************************************************************** */
  
  /**********************************Axios Route city ************************************************************************************** */
    Route::get("getcities","CityController@getCities");
    Route::post("addCity","CityController@addCity");

    Route::resource('city', 'CityController');
});



<?php
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    $department_name='dashboard';
    $page_name='dashboard';
    return view('/admin/dashboard' , compact('department_name' , 'page_name'));
})->name('dashboard');



Route::group(['prefix' => 'dashboard'], function() {

  


    Route::get('/add-institute', function () {
        $department_name='institutes';
        $page_name='add-institute';
        return view('/admin/institutes.create' , compact('department_name' , 'page_name'));
    })->name('dashboard.add-institute');

    
    Route::get("/country","countryController@index");
    Route::get('/getcountries',"countryController@show");


});


Route::get("/test-controller","TestController@index");
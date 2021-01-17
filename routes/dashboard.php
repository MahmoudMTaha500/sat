<?php
use Illuminate\Support\Facades\Route;


Route::get('/sssss-ssss-ssss', function () {
    $department_name='dashboard';
    $page_name='dashboard';
    return view('/admin/dashboard' , compact('department_name' , 'page_name'));
})->name('dashboard');



Route::get('/add-institute', function () {
    $department_name='institutes';
    $page_name='add-institute';
    return view('/admin/institutes.create' , compact('department_name' , 'page_name'));
})->name('dashboard.add-institute');


Route::get("/country","countryController@index");
Route::get("/test-controller","TestController@index");


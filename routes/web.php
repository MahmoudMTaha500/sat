<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// mahmoud samy

// mahmoud taha

// mahmoud taha2


Route::get('/', function () {
    return view('welcome');
});

// dashboard
Route::get('/dashboard', function () {
    $department_name='dashboard';
    $page_name='dashboard';
    return view('/admin/dashboard' , compact('department_name' , 'page_name'));
})->name('dashboard');


// institutes department
Route::group(['prefix' => 'dashboard'], function() {


    Route::get('/institutes', function () {
        $department_name='institutes';
        $page_name='institutes';
        return view('/admin/institutes.index' , compact('department_name' , 'page_name'));
    })->name('dashboard.institutes');


    Route::get('/add-institutes', function () {
        $department_name='institutes';
        $page_name='add-institute';
        return view('/admin/institutes.create' , compact('department_name' , 'page_name'));
    })->name('dashboard.add-institute');
});




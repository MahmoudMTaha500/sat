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




Route::get('/', function () {
    return view('welcome');
});



// dashboard routes
// ===================================================================================================================



// dashboard
Route::get('/dashboard', function () {
    $department_name='dashboard';
    $page_name='dashboard';
    return view('/admin/dashboard' , compact('department_name' , 'page_name'));
})->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/visa-archive', function () {
    $department_name='dashboard';
    $page_name='dashboard';
    return view('admin.visa.archives' , compact('department_name' , 'page_name'));
})->name('dashboard');


Route::get('/edit-ins', function(){
    return view('admin.institutes.edit');
});
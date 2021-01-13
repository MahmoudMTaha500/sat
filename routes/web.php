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



Route::group(['prefix' => 'dashboard'], function() {

    // Institutes Department
    // Route::get('/institutes', function () {
    //     $department_name='institutes';
    //     $page_name='institutes';
    //     return view('/admin/institutes.index' , compact('department_name' , 'page_name'));
    // })->name('dashboard.institutes');


   




    // Courses Department
    Route::get('/courses', function () {
        $department_name='courses';
        $page_name='courses';
        return view('/admin/courses.index' , compact('department_name' , 'page_name'));
    })->name('dashboard.courses');


    Route::get('/add-course', function () {
        $department_name='courses';
        $page_name='add-course';
        return view('/admin/institutes.create' , compact('department_name' , 'page_name'));
    })->name('dashboard.add-course');


});




// website routes
// ===================================================================================================================


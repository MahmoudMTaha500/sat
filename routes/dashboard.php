<?php
use Illuminate\Support\Facades\Route;




Route::resource('login', "AdminController");



Route::group(['middleware' => 'admins'] ,function(){


    
Route::get('/', function () {
    $department_name='dashboard';
    $page_name='dashboard';
    return view('/admin/dashboard' , compact('department_name' , 'page_name'));
})->name('dashboard');



// Route::get("admin_login" , function(){
//  return view('admin.login.login');

// });

Route::get('logout',function(){

    \Auth::logout();
  return redirect()->route('login.index');

});

Route::get('getinstitues', 'InstituteController@getInstitues');
Route::post('update-institute-aprovement', 'InstituteController@updateAprovement');
Route::get('filter', 'InstituteController@filter');

Route::get('institute/restor/{id}', 'InstituteController@restor');
Route::get('institute/archive', 'InstituteController@archive');
Route::resource('institute', 'InstituteController');
Route::get('getcomment', 'CommentController@getcomment');
Route::post('comment/updateAprovement', 'CommentController@updateAprovement');


Route::resource('comment', 'CommentController');

Route::get('getrate', 'InstituteRateController@getrates');
Route::post('updaterate', 'InstituteRateController@updaterate');
Route::post('delete-rate', 'InstituteRateController@destroy')->name('delete.rate');
Route::resource('rate', 'InstituteRateController');

/**********************************Axios Route city ************************************************************************************** */
Route::get("getcities", "CityController@getCities")->name('getcities');
Route::post("addCity", "CityController@addCity");

// Institute Route
Route::get('/institute/forceDelete/{id}', 'InstituteController@force_Delete');
Route::resource('institute', 'InstituteController');
/**********************************   ************************************************************************************** */

// Country Route
Route::resource('countries', 'countryController');

// City Route
/**********************************   ************************************************************************************** */

Route::resource('cities', 'CityController');
/**********************************   ************************************************************************************** */

// Course Route

Route::get('filtercourses', 'CourseController@filtercourses');
Route::get('getcourses', 'CourseController@getCourses');
Route::post('update-course-aprovement', 'CourseController@updateAprovement');

Route::get('courses/restor/{id}', 'CourseController@restor');
Route::get('courses/archive', 'CourseController@archive');
Route::resource('courses', 'CourseController');
/**********************************   ************************************************************************************** */

// Visa Route
Route::resource('visas', 'VisaController');
/**********************************   ************************************************************************************** */

// Visa Category Route

Route::resource('visa_categories', 'VisaCategoryController');
/**********************************   ************************************************************************************** */

// Blog Route

Route::post('update-blog-aprovement', 'BlogController@updateAprovement');
Route::get('blog/filter', 'BlogController@filter');
Route::get('blogs/comment', 'CommentController@blog');
Route::get('blogs/getcomment', 'CommentController@getcommentBlog');
Route::get('blogs/archive', 'BlogController@archive');
Route::get('blogs/restor/{id}', 'BlogController@restor');
Route::get('blogs/forceDelete/{id}', 'BlogController@forceDelete');

Route::resource('blogs', 'BlogController');
Route::get('blog/get_institutes_vue', 'BlogController@get_institutes_vue')->name('blog.get.institutes.vue');
Route::get('blog/get_courses_vue', 'BlogController@get_courses_vue')->name('blog.get.courses.vue');
Route::get('get_blogs_by_vue', 'BlogController@get_blogs_by_vue')->name('get_blogs_by_vue');
// Blog Category Route
Route::resource('blog_categories', 'BlogCategoryController');
/**********************************   ************************************************************************************** */

// Student Route
Route::get('/students/get','StudentController@getStudents');
Route::get('/students/filter','StudentController@filter');
Route::resource('students', 'StudentController');
// success story students Route
Route::get('success-story/get', 'StudentSuccessStoryController@getstories');
Route::post('success-story/approve', 'StudentSuccessStoryController@updateAprovement');
Route::resource('success-story', 'StudentSuccessStoryController');
/**********************************   ************************************************************************************** */


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

/**********************************   ************************************************************************************** */
// Student Route  
Route::get('/student-requests/getStudentRequests','StudentRequestsController@getStudentsRequest');   
Route::get('/student-requests/getprice','StudentRequestsController@get_price_per_week');   
Route::get('/student-requests/getinsurance','StudentRequestsController@get_price_insurance');   
Route::get('/student-requests/calc_total','StudentRequestsController@calc_total');   
Route::post('/student-requests/update-status','StudentRequestsController@updateStatus');   
Route::post('/student-requests/update-classat-note','StudentRequestsController@update_classat_note')->name('update_classat_note');   
Route::get('/student-requests/filterstudentsRequests','StudentRequestsController@filter');   

Route::resource('student-requests', "StudentRequestsController");
Route::resource('employees', "EmployeesController");
Route::get('simple-visa/get', "SimpleVisaController@get_simple_visa")->name('simple-visa.get');
Route::post("simple-visa/update-status", "SimpleVisaController@update_status");
Route::post("simple-visa/update-note", "SimpleVisaController@update_note");
Route::get('simple-visa/filter', 'SimpleVisaController@filter');

Route::resource('simple-visa', "SimpleVisaController");


});


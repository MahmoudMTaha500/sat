<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\institute;
use App\Models\StudentRequest;

class StudentRequestsController extends Controller
{

    public function index()
    {
        $institutes = institute::get();
        $courses = Course::get();
        $countercourse = Course::get();
        $countries = Country::get();
        $department_name = 'student-request';
        $page_name = 'student-request';
        $useVue = true;

        return view("admin.students_requests.index", compact('useVue', 'department_name', 'page_name', 'courses', 'institutes', 'countries'));

    }

     public function getStudentsRequest(){
     $students_requets = StudentRequest::with('student','course.institute','course','airport','residence','insurance')->paginate(10);
     return response()->json(['studentsRequests'=>$students_requets]);
     }

    public function updateStatus(Request $request){
        $request_student = StudentRequest::find($request->request_id);
        $request_student->status = $request->status;
        $request_student->save();

    }

    


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
    }
   


    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\institute;
use App\Models\StudentRequest;
use App\Models\Insurances;

class StudentRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function getStudentsRequest(){
     $students_requets = StudentRequest::with('student','course.institute','course','airport','residence','insurance')->paginate(10);
     return response()->json(['studentsRequests'=>$students_requets]);
     }

public function updateStatus(Request $request){
    // dd($request->all());
    $request_student = StudentRequest::find($request->request_id);
    $request_student->status = $request->status;
    $request_student->save();

}


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $request_student = StudentRequest::with('student','course.institute.residence','course.institute.insurancePrice','course','airport','residence','insurance','course.coursesPrice')->find($id);
    $department_name = 'student-request';
    $page_name = 'student-request';
    $useVue = true;
    $residence_obj = $request_student->residence;
    $airport_obj = $request_student->airport;
    $insurance_obj = $request_student->insurance;
        return view("admin.students_requests.edit", compact('useVue', 'department_name', 'page_name', "request_student",'residence_obj','airport_obj','insurance_obj'));
           

    }

    public function get_price_per_week(Request $request)
    {
        $course = Course::where('id',$request->id)->with('coursesPrice')->first();
           $weeks = $request->weeks;
           $price =   price_per_week($course->coursesPrice, $weeks); 
           return response()->json(['total_price'=>$price]);
    }

    public function get_price_insurance(Request $request)
    {
        $Insurances = Insurances::select('weeks','price')->where('institute_id',$request->id)->get();
           $weeks = $request->weeks;
           $price =   price_per_week($Insurances, $weeks); 
           return response()->json(['total_price'=>$price]);
    }
public function calc_total(Request $request){
    dd($request->all());
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Course;
use App\Models\institute;
use App\Models\Insurances;
use App\Models\StudentRequest;
use Illuminate\Http\Request;

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
    public function getStudentsRequest()
    {
        $students_requets = StudentRequest::with('student', 'course.institute', 'course', 'airport', 'residence', 'insurance')->paginate(10);
        return response()->json(['studentsRequests' => $students_requets]);
    }
    public function updateStatus(Request $request)
    {
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
        $student_request = StudentRequest::with('student', 'course.institute.residence' , 'course.institute.airport')->find($id);
        $department_name = 'student-request';
        $page_name = 'student-request';
        $useVue = true;
        return view("admin.students_requests.edit", compact('useVue', 'department_name', 'page_name', "student_request"));
    }
    public function get_price_per_week(Request $request)
    {
        $course = Course::where('id', $request->id)->with('coursesPrice')->first();
        $weeks = $request->weeks;
        $price = price_per_week($course->coursesPrice, $weeks);
        return response()->json(['total_price' => $price]);
    }
    public function get_price_insurance(Request $request)
    {
        $Insurances = Insurances::select('weeks', 'price')->where('institute_id', $request->id)->get();
        $weeks = $request->weeks;
        $price = price_per_week($Insurances, $weeks);
        return response()->json(['total_price' => $price]);
    }
    public function calc_total(Request $request)
    {
        dd($request->all());
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'weeks' => 'required|numeric',
            'started_date' => 'required',
            'institute_message' => 'required',
            'paid_price' => 'required',
        ]);
        $residence = json_decode($request->residence , true);
        $airport = json_decode($request->airport , true);
        $data = [];
        $data['institute_message'] = $request->institute_message;
        $data['status'] = $request->status;
        $data['weeks'] = $request->weeks;
        $data['price_per_week'] = $request->price_per_week;
        $data['residence_id'] = $residence['id'];
        $data['residence_price'] = $residence['price'];
        $data['airport_id'] = $airport['id'];
        $data['airport_price'] = $airport['price'];
        $data['insurance_price'] = $request->insurance_price;
        $data['total_price'] = $request->total_price;
        $data['paid_price'] = $request->paid_price;
        $data['remaining_price'] = $request->total_price - $request->paid_price;
        $data['started_date'] = $request->started_date;
        $data['note'] = $request->note;
        StudentRequest::where('id' , $id)->update($data);
        session()->flash('alert_message', ['message' => 'تم تعديل الطلب بنجاح', 'icon' => 'success']);
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}

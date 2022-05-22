<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Course;
use App\Models\Institute;
use App\Models\Insurances;
use App\Models\StudentRequest;
use Illuminate\Http\Request;
use Mail;

class StudentRequestsController extends Controller
{

    public function index()
    {
        $institutes = Institute::latest('id')->with('city')->get();
        $countries = Country::latest('id')->get();
        $courses = Course::latest('id')->get();
        $countercourse = Course::latest('id')->get();
        $department_name = 'student-request';
        $page_name = 'student-request';
        $page_title = 'الطلبات';

        $useVue = true;
        return view("admin.students_requests.index", compact('useVue', 'department_name', 'page_name', 'courses', 'institutes', 'countries'));
    }
    public function getStudentsRequest()
    {
        $students_requets = StudentRequest::with('student','course.institute.city', 'course.institute.country', 'course', 'airport', 'residence', 'insurance',)->latest('id')->paginate(10);
        return response()->json(['studentsRequests' => $students_requets]);
    }
    public function updateStatus(Request $request)
    {
        $request_student = StudentRequest::find($request->request_id);
        $request_student->status = $request->status;
        $request_student->save();
        if($request->status == 'جديد'){return 'new';}

        $data = array(
            'course_name' => $request_student->course->name_ar,
            'institute_name' => $request_student->course->institute->name_ar,
            'country_name' => $request_student->course->institute->country->name_ar,
            'city_name' => $request_student->course->institute->city->name_ar,
        );

        
        if($request->status == 'حصل علي قبول'){$data['request_status'] = '<span style="color:#4caf50">تم قبولك بنجاح</span>';}
        if($request->status == 'بداء الدراسة'){$data['request_status'] = '<span style="color:#4caf50">لقد تم بداء دراستك</span>';}
        if($request->status == 'مرفوض'){$data['request_status'] = '<span style="color:#f44336">تم رفضك</span> ';}


        $subject = 'حالة الطلب الخاص بكم في موقع كلاسات';
        Mail::send('mail.student_request_status', $data, function ($message) use ($request_student, $subject) {
            $message->to($request_student->student->email, $request_student->student->name)
            ->subject($subject);
            $message->from('no-reply@sat-edu.com', 'Classat');
        });

    }
    public function update_classat_note(Request $request)
    {
        $request_student = StudentRequest::find($request->request_id);
        $request_student->classat_note = $request->classat_notes;
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
        $student_request = StudentRequest::with('student', 'course.institute.residence' , 'course.institute.airport' , 'course.institute.city', 'course.institute.country')->find($id);
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
            'residence_weeks' => 'required|numeric',
            'from_date' => 'required',
            'to_date' => 'required',
            'institute_message' => 'required',
            'paid_price' => 'required',
        ]);
        $residence = json_decode($request->residence , true);
        $airport = json_decode($request->airport , true);
        $data = [];
        $data['institute_message'] = $request->institute_message;
        $data['payment_status'] = $request->payment_status;
        $data['status'] = $request->status;
        $data['weeks'] = $request->weeks;
        $data['price_per_week'] = $request->price_per_week;
        if(!empty($residence)){
            $data['residence_weeks'] = $request->residence_weeks;
            $data['residence_id'] = $residence['id'];
            $data['residence_price'] = $residence['price'];
        }
        if(!empty($airport)){
            $data['airport_id'] = $airport['id'];
            $data['airport_price'] = $airport['price'];
        }
        $data['insurance_price'] = $request->insurance_price;
        $data['total_price'] = $request->total_price;
        $data['paid_price'] = $request->paid_price;
        $data['remaining_price'] = $request->total_price - $request->paid_price;
        $data['from_date'] = $request->from_date;
        $data['to_date'] = $request->to_date;
        $data['note'] = $request->note;
        StudentRequest::where('id' , $id)->update($data);
        session()->flash('alert_message', ['message' => 'تم تعديل الطلب بنجاح', 'icon' => 'success']);
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }

    public function filter(Request $request){
        // dd($request->all());

        $institute_id = $request->institute_id;
        $country_id = $request->country_id;
        $city_id = $request->city_id;
        $course_id = $request->course_id;
        $name_ar = $request->name_ar;

        $new = $request->new;
        $got_accepted = $request->got_accepted;
        $study_started = $request->study_started;
        $rejected = $request->rejected;
 
        $student_request = new StudentRequest();

        if ($institute_id != null) {
            // $student_request = $student_request->where("institute_id", $institute_id);
            $student_request = $student_request->with('course')->whereHas('course', function ($query) use ($institute_id) {
                $query->where('institute_id', $institute_id);
            });
        }
        if ($country_id != null) {
            $student_request = $student_request->with('course')->whereHas('course', function ($query) use ($institute_id ,$country_id)   {
                $query->whereHas('institute',function($query2) use ($country_id) {
                    $query2->where('country_id',$country_id);
                });
            });
        }
        if ($city_id != null) {
            $student_request = $student_request->with('course')->whereHas('course', function ($query) use ($institute_id ,$city_id)   {
                $query->whereHas('institute',function($query2) use ($city_id) {
                    $query2->where('city_id',$city_id);
                });
          
            });
        }
        if ($course_id != null) {
            $student_request = $student_request->where("course_id", $course_id);
        
        }
    
        
        if ($new == 'true') {
            $student_request = $student_request->orWhere("status", "جديد");
        }
        if ($got_accepted == 'true' ) {
            $student_request = $student_request->orWhere("status", "حصل علي قبول");
        }
        if ($study_started == 'true' ) {
            $student_request = $student_request->orWhere("status", 'LIKE', "%بداء الدراسة%");
        }
        if ($rejected == 'true' ) {
            $student_request = $student_request->orWhere("status", 'LIKE',"%مرفوض%");
        }

      


        $student_request = $student_request->with('student', 'course.institute', 'course', 'airport', 'residence', 'insurance')->latest('id')->paginate(10);
        return response()->json(['studentsRequests' => $student_request]);

    }
}

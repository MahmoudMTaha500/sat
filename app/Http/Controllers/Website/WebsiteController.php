<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\RegisterStudentRequest;
use App\Models\Airports;
use App\Models\residences;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Institute;
use App\Models\Partner;
use App\Models\Student;
use App\Models\StudentSuccessStory;
use App\Models\StudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use PDF;

class WebsiteController extends Controller
{
    public function home_page()
    {
        $useVue = true;
        $best_offers = Course::orderBy('discount', 'DESC')->take(10)->get();
        $success_stories = StudentSuccessStory::inRandomOrder()->take(10)->get();
        $two_blogs = Blog::inRandomOrder()->take(2)->get();
        $blogs = Blog::inRandomOrder()->take(8)->get();
        $partners = Partner::inRandomOrder()->take(8)->get();
        return view('website.home', compact('useVue', 'best_offers', 'success_stories', 'two_blogs', 'blogs', 'partners'));
    }
    // institutes page method : show all institutes with filter
    public function institutes_page()
    {
        $useVue = true;
        return view('website.institute.institutes', compact('useVue'));
    }
    // institute page method : show the course info through institute profile
    public function institute_page($institute_id, $institute_slug, $course_slug)
    {
        $course = Course::with('coursesPrice', 'coursesPricePerWeek')->where(['institute_id' => $institute_id, 'slug' => $course_slug])->get();

        $institute = Institute::where(['id' => $institute_id, 'slug' => $institute_slug])->get();
        if (empty($course[0])) {return redirect()->route('website.home');}
        $course = $course[0];
        $institute = $institute[0];

        $useVue = true;
        return view('website.institute.institute-profile', compact('useVue', 'course', 'institute'));
    }
    // confirm reservation page
    public function confirm_reservation(Request $request , $pay_checker = null)
    {
        // dd($pay_checker);
        $validated = $request->validate([
            'weeks' => 'required|numeric',
            'started_date' => 'required',
        ], [
            'started_date.required' => 'تاريخ البداية مطلوب',
            'required.required' => 'عدد الاسابيع مطلوب',
            'required.numeric' => 'عدد الاسابيع يجب ان يكون رقما',
        ]);

        $useVue = true;
        $course_details = [];
        $weeks = $request->weeks;
        $started_date = $request->started_date;
        $residence = json_decode($request->residence, true);
        $airport = json_decode($request->airport, true);
        $insurance = $request->insurance;
        $course_id = $request->course_id;
        $course = Course::where('id', $course_id)->get()[0];
        $insurance_price = price_per_week($course->institute->insurancePrice, $weeks);
        $course_price_per_week = price_per_week($course->coursesPrice, $weeks);
        $course_discount = $course->discount;
        $totalPrice = ($insurance_price + $course_price_per_week * (1 - $course_discount)) * $weeks;
        if ($airport != 0) {$totalPrice += $airport['price'];}
        if ($residence != 0) {$totalPrice += $residence['price'] * $weeks;}
        if ($insurance == 0) {$insurance_price = 0;}

        $course_details['course_id'] = $course_id;
        $course_details['price_per_week'] = $course_price_per_week;
        $course_details['total_price'] = $totalPrice;
        $course_details['institute_name'] = $course->institute->name_ar;
        $course_details['course_name'] = $course->name_ar;
        $course_details['country'] = $course->institute->country->name_ar;
        $course_details['city'] = $course->institute->city->name_ar;
        $course_details['started_date'] = $started_date;
        $course_details['weeks'] = $weeks;
        $course_details['lessons_per_week'] = $course->lessons_per_week;
        $course_details['hours_per_week'] = $course->hours_per_week;
        $course_details['insurance_price'] = $insurance_price;
        $course_details['airport'] = $airport;
        $course_details['residence'] = $residence;
        return view('website.institute.confirm-reservation', compact('course_details', 'useVue'));

    }
    // student login page : show login page of type student
    public function student_login_page()
    {
        return view('website.students.login');
    }
    // student login request : make login of type student
    public function student_login_auth(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('student.profile');
        } else {
            return back();
        }
    }
    // student register page  : show student register page of type student
    public function student_register_page(Request $request)
    {
        $useVue = true;
        return view('website.students.register', compact('useVue'));
    }
    // student register request : create new user of type student
    public function student_register_auth(RegisterStudentRequest $request)
    {
        // return $request->all();
        $remember = $request->has('remember') ? true : false;
        $data = $request->except('_token', 'password', 'password_confirmation');
        $data['password'] = bcrypt($request->password);
        Student::create($data);
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('student.profile');
        } else {
            return back();
        }
    }



    /*******************************/
    public function articles(){


        $blogs = Blog::paginate(8);
        return view('website.blog.articals',compact('blogs'));
        // dd($blogs); 
    } 

    public function article($id){

// dd($id);
$blog = Blog::find($id);

        // $blogs = Blog::paginate(8);
        return view('website.blog.artical',compact('blog'));
        // dd($blogs); 
    } 
    // student register request : create new user of type student
    public function student_invoice(Request $request)
    {
        $data = [
            // 'foo' => 'bar'
        ];
        $pdf = PDF::loadView('website.institute.student-pdf', $data);
        // $pdf->autoScriptToLang = true;
        // $pdf->autoLangToFont = true;
        // $pdf->autoLangToFont = true;
        // $pdf->useAdobeCJK = true;
        return $pdf->stream('admin.pdf');
        //     $pdf = PDF::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');
    }

    // create student request and account if the student was new student
    public function create_student_request(Request $request)
    {

        // configuer basic variables
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $nationality = $request->nationality;
        $country = $request->country;
        $city = $request->city;
        $note = $request->city;
        $course_details = json_decode($request->course_details, true);


        // form validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'nationality' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'يجب الا يتجاوز الاسم ال 255 حرف',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'برجاء ادخال بريد إلكتروني صحيح',
            'email.max' => 'يجب الا يتجاوز البريد الإلكتروني ال 255 حرف',
            'email.unique' => 'هذا البريد الإلكتروني موجود بالفعل',
            'phone.required' => 'رقم الجوال مطلوب',
            'phone.max' => 'يجب الا يتجاوز رقم الجوال 255 حرف',
            'address.required' => 'العنوان  مطلوب',
            'nationality.required' => 'الجنسية مطلوبة',
            'nationality.max' => 'يجب الا تتجاوز الجنسية  255 حرف',
            'country.required' => 'الدولة مطلوبة',
            'country.max' => 'يجب الا تتجاوز الدولة  255 حرف',
            'city.required' => 'المدينة مطلوبة',
            'city.max' => 'يجب الا تتجاوز المدينة  255 حرف',
        ]);
        

        // configure student data
        $unbcrypt_password = random_password();
        $student_data = $request->except('_token', 'note' , 'course_details');
        $student_data['password'] = bcrypt($unbcrypt_password);

        // create student
        $student = Student::create($student_data);
        

        // configure student request data
        $student_request_data = [];
        $student_request_data['student_id'] = $student->id;
        $student_request_data['course_id'] = $course_details['course_id'];
        $student_request_data['institute_message'] = Course::where('id' , $course_details['course_id'])->get()[0]->institute->institute_questions;
        $student_request_data['status'] = 'جديد';
        $student_request_data['weeks'] = $course_details['weeks'];
        $student_request_data['price_per_week'] = $course_details['price_per_week'];
        if($course_details['residence'] != 0){
            $student_request_data['residence_id'] = $course_details['residence']['id'];
            $student_request_data['residence_price'] = $course_details['residence']['price'];
        }
        if($course_details['airport'] != 0){
            $student_request_data['airport_id'] = $course_details['airport']['id'];
            $student_request_data['airport_price'] = $course_details['airport']['price'];
        }
        $student_request_data['insurance_price'] = $course_details['insurance_price'];
        $student_request_data['total_price'] = $course_details['total_price'];
        $student_request_data['paid_price'] = 0;
        $student_request_data['remaining_price'] = $course_details['total_price'];
        $student_request_data['started_date'] = $course_details['started_date'];
        $student_request_data['note'] = $note;


        // create student request
        $student_request = StudentRequest::create($student_request_data);
        $subject = 'Classat Request Confirmation';
        $data = array(
            'student_email' => $email,
            'student_password' => $unbcrypt_password,
        );


        // send confirmation mail to student includes username and password
        Mail::send('mail.student_request_registration', $data, function ($message) use ($name, $email, $subject) {
            $message->to($email, $name)
                ->subject($subject);
            $message->from('no-reply@sat-edu.com', 'Classat');
        });

        $notification_body = '<p>لقد تم استلام طلبك بنجاح و سوف يقوم طاقم الموقع بالاتصال بك لمراجعة طلبك و تأكيد الحجز <a target="_blank" href="'.route('student_invoice').'" class="text-secondary-color"> عرض السعر</a></p>
        <a href="'.route('pay_now' , $student_request->id).'"  class="btn w-100 bg-secondary-color text-white rounded-10 ml-3 px-3 mb-4">دفع الان</a>';
        session()->flash('alert_message', ['title' => 'تم التسجيل بنجاح',  'body' => $notification_body,  'type' => 'success']);
        return redirect()->back();

    }

    public function pay_now($request_id){
        $student_request = StudentRequest::find($request_id);
        $course = Course::find($student_request->course_id);
        $course_details= [];
        $course_details['price_per_week'] = $student_request->price_per_week;
        $course_details['total_price'] = $student_request->total_price;
        $course_details['institute_name'] = $course->institute->name_ar;
        $course_details['course_name'] = $course->name_ar;
        $course_details['country'] = $course->institute->country->name_ar;
        $course_details['city'] = $course->institute->city->name_ar;
        $course_details['started_date'] = $student_request->started_date;
        $course_details['weeks'] = $student_request->weeks;
        $course_details['lessons_per_week'] = $course->lessons_per_week;
        $course_details['hours_per_week'] = $course->hours_per_week;
        $course_details['insurance_price'] = $student_request->insurance_price;
        $course_details['airport'] = Airports::find($student_request->airport_id);
        $course_details['residence'] = residences::find($student_request->residence_id);

        return view('website.payment.pay-now', compact('course_details' , 'request_id'));
    }

    public function checkout(Request $request){
         $validated = $request->validate([
            'paid_price' => ['required'],
            'refund_policy' => ['required'],
        ], [
            'paid_price.required' => 'يجب تحديد المبلغ المراد دفعه',
            'refund_policy.required' => 'يجب الموافقة علي على الشروط والأحكام و سياسة الاسترداد',
        ]);


        

        $student_request =  StudentRequest::find($request->request_id);

        $student_request_data = [];
        $student_request_data['total_price'] = $student_request->total_price;
        $student_request_data['paid_price'] = $student_request->paid_price + $request->paid_price;
        $student_request_data['remaining_price'] = $student_request_data['total_price'] - $student_request_data['paid_price'] ;


        StudentRequest::where('id' , $request->request_id)->update($student_request_data);
        return redirect()->back();

    }
    public function payment_confirmation(Request $request){
        
        return view('website.payment.payment-confirmation');
    }
}

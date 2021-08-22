<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\RegisterStudentRequest;
use App\Models\Airports;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Course;
use App\Models\Institute;
use App\Models\Partner;
use App\Models\residences;
use App\Models\Student;
use App\Models\StudentRequest;
use App\Models\StudentSuccessStory;
use App\Models\InstituteRate;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mail;
use PDF;
use Hash;
use Tap\TapPayment\Facade\TapPayment;
use App\Models\WebsiteSettings;



class WebsiteController extends Controller
{
    public function home_page()
    {
        $useVue = true;
        $best_offers = Course::orderBy('discount', 'DESC')->take(10)->where('discount' , '!=' , 0)->get();
        $success_stories = StudentSuccessStory::where('approvement' , 1)->inRandomOrder()->take(10)->get();
        $two_blogs = Blog::inRandomOrder()->take(2)->get();
        $blogs = Blog::inRandomOrder()->take(8)->get();
        $partners = Partner::inRandomOrder()->take(8)->get();
        $page_identity = [
            'title_tag' => 'كلاسات Classat للدراسة بالخارج',
            'meta_keywords' => 'تعلم اللغة في أكبر المعاهد، الدراسة بالخارج، دورة اللغة المناسبة لك، معاهد بريطانيا، مدينة برايتون، كلاسات، Studying abroad',
            'meta_description' => 'أبدا رحلتك و تعلم اللغة في أكبر المعاهد و أمهر المعلمين حول العالم نسعى في كلاسات (Classat)  من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية لرفع مستوى التعاون',
            'page_name' => 'home',
        ];
        return view('website.home', compact('useVue', 'best_offers', 'success_stories', 'two_blogs', 'blogs', 'partners' , 'page_identity'));
    }
    // institutes page method : show all institutes with filter
    public function institutes_page(Request $request)
    {
        $useVue = true;
        $search = $request->all();
        $page_identity = [
            'title_tag' => 'كلاسات Classat جميع المعاهد الخاصة بدراسة اللغة حول العالم',
            'meta_keywords' => 'معهد "برايتون كوليدج" Brighton Language College، معهد (كاسل) Castle School Brighton، معهد (إل إس آي) LSI Language Studies International، تعلم اللغة في، أكبر المعاهد، الدراسة بالخارج ، دورة اللغة المناسبة لك ، معاهد بريطانيا ، مدينة برايتون، كلاسات       ,Studying abroad',
            'meta_description' => 'كلاسات (Classat) منصة إلكترونية رائدة في تقديم الخدمات الأكاديمية والتعليمية بأفضل المعاهد والمؤسسات الدولية للطلبة الدوليين، و توفير دورات اللغة الإنجليزية الأكاديمية المتخصصة',
            'page_name' => 'institutes',
        ];
        return view('website.institute.institutes', compact('useVue' , 'search' , 'page_identity'));
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
        $page_identity = [
            'title_tag' => $institute->title_tag.' | '.$course->title_tag,
            'meta_keywords' => $institute->meta_keywords.','.$course->meta_keywords,
            'meta_description' => $institute->meta_description.','.$course->meta_description,
            'page_name' => 'institutes',
        ];
        return view('website.institute.institute-profile', compact('useVue', 'course', 'institute' , 'page_identity'));
    }
    // confirm reservation page
    public function confirm_reservation(Request $request, $pay_checker = null)
    {

        
        $validated = $request->validate([
            'weeks' => 'required|numeric',
            'from_date' => 'required',
        ], [
            'from_date.required' => 'تاريخ البداية مطلوب',
            'weeks.required' => 'عدد الاسابيع مطلوب',
            'weeks.numeric' => 'عدد الاسابيع يجب ان يكون رقما',
        ]);


        $course_details = [];
        $weeks = $request->weeks;
        $from_date = $request->from_date;
        $to_date = to_date($from_date , $weeks);
        $residence = json_decode($request->residence, true);
        $airport = json_decode($request->airport, true);
        $insurance = $request->insurance;
        $course_id = $request->course_id;
        $course = Course::where('id', $course_id)->get()[0];
        $insurance_price = price_per_week($course->institute->insurancePrice, $weeks);
        $course_price_per_week = price_per_week($course->coursesPrice, $weeks);
        $course_discount = $course->discount;
        $totalPrice = ($course_price_per_week * (1 - $course_discount)) * $weeks;
        if ($airport != 0) {$totalPrice += $airport['price'];}
        if ($residence != 0) {$totalPrice += $residence['price'] * $weeks;}
        if ($insurance == 1) {$totalPrice += $insurance_price*$weeks;}else{
            $insurance_price = 0;
        }


        $course_details['course_id'] = $course_id;
        $course_details['price_per_week'] = $course_price_per_week;
        $course_details['total_price'] = $totalPrice;
        $course_details['institute_name'] = $course->institute->name_ar;
        $course_details['course_name'] = $course->name_ar;
        $course_details['country'] = $course->institute->country->name_ar;
        $course_details['city'] = $course->institute->city->name_ar;
        $course_details['from_date'] = $from_date;
        $course_details['to_date'] = $to_date;
        $course_details['weeks'] = $weeks;
        $course_details['lessons_per_week'] = $course->lessons_per_week;
        $course_details['hours_per_week'] = $course->hours_per_week;
        $course_details['insurance_price'] = $insurance_price;
        $course_details['airport'] = $airport;
        $course_details['residence'] = $residence;

        $page_identity = [
            'title_tag' => 'تاكيد الحجز',
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => '',
        ];
        return view('website.institute.confirm-reservation', compact('course_details' , 'page_identity'));

    }
    // student login page : show login page of type student
    public function student_login_page()
    {
        $page_identity = [
            'title_tag' => 'تسجيل دخول',
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => '',
        ];
        if(Auth::guard('student')->check()){
            return redirect()->route('student.profile');
        }
        return view('website.students.login' , compact('page_identity') );
    }


    // student login request : make login of type student
    public function student_login_auth(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $remember = $request->has('remember') ? true : false;
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return back();
        } else {
            return back()->withErrors(['login_error' =>'البريد الالكتروني او كلمة المرور غير صحيحين']);
        }
    }
    // student register page  : show student register page of type student
    public function student_register_page(Request $request)
    {
        $useVue = true;
        $page_identity = [
            'title_tag' => 'انشاء حساب جديد',
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => '',
        ];
        if(Auth::guard('student')->check()){
            return redirect()->route('student.profile');
        }
        return view('website.students.register', compact('useVue' , 'page_identity'));
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


    public function student_reset_password(){
        $page_identity = [
            'title_tag' => 'اعادة تعيين كلمة المرور',
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => '',
        ];
        return view('website.students.reset_password' , compact('page_identity'));

    }



    public function student_send_mail_reset_password(Request $request){

    $email = $request->email;


    $student_mail = Student::where('email',$email)->first();
if($student_mail){
    $name = $student_mail->name;
    
    $new_password =  random_password();
    $student_mail->password =  bcrypt($new_password) ;
    $student_mail->save();


    $subject = 'Classat  Reset Password!';
    $data = array(
        'email' => $email,
        'password' => $new_password,
        'name'=>$name
    );

   Mail::send('mail.reset_password', $data, function ($message) use ($name, $email, $subject) {
            $message->to($email, $name)
            ->subject($subject);
            $message->from('no-reply@sat-edu.com', 'Classat');
        });
        session()->flash('alert_message', 'تم ارسال كلمه المرور اللي البريد الاليكتروني الخاص بك .');
        return back();
   

}else{
    return back()->withErrors(['email' =>'البريد الالكتروني  غير موجود']);
}


    
    // dd(1236);
    
    
    
        // Mail::send('mail.student_request_registration', $data, function ($message) use ($name, $email, $subject) {
        //     $message->to($email, $name)
        //     ->subject($subject);
        //     $message->from('no-reply@sat-edu.com', 'Classat');
        // });
    }

    /*******************************/
    public function articles()
    {

        if(request('cat_id')){
            $blogs = Blog::where('category_id',request('cat_id'))->paginate(8);
        } else{
            $blogs = Blog::paginate(8);

        }
        $page_identity = [
            'title_tag' => 'المقالات',
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => 'articles',
        ];
        return view('website.blog.articles', compact('blogs'  , 'page_identity'));
    }


    public function article($id)
    {
        $blog = Blog::find($id);
        $category_id =$blog->category_id;
        $country_id= $blog->country_id;
        $city_id= $blog->city_id;
        $institute_id= $blog->institute_id;
        $course_id= $blog->course_id;

        $categories_spiesific_blog= Blog::where('category_id',$category_id)->orderBy('id', 'DESC')->take(5)->get();
        $countries_spiesific_blog= Blog::where('country_id',$country_id)->orderBy('id', 'DESC')->take(5)->get();
        $cities_spiesific_blog= Blog::where('city_id',$city_id)->orderBy('id', 'DESC')->take(5)->get();
        $institutes_spiesific_blog= Blog::where('institute_id',$institute_id)->orderBy('id', 'DESC')->take(5)->get();
        $courses_spiesific_blog= Blog::where('institute_id',$institute_id)->orderBy('id', 'DESC')->take(5)->get();

        $categories = BlogCategory::orderBy('id', 'DESC')->take(5)->get();
        // dd($cities_spiesific_blog);

        $page_identity = [
            'title_tag' => $blog->title_tag,
            'meta_keywords' => $blog->meta_keywords,
            'meta_description' => $blog->meta_description,
            'page_name' => '',
        ];
        return view('website.blog.article', compact('blog' , 'page_identity','categories','categories_spiesific_blog','countries_spiesific_blog','cities_spiesific_blog','institutes_spiesific_blog','courses_spiesific_blog'));
    }



    // student register request : create new user of type student
    public function student_invoice(Request $request)
    {
        $student_request = StudentRequest::find($request->request_id);
        $course = $student_request->course;
        $institute = $student_request->course->institute;
        $student = $student_request->student;

        $data = [];
        $data['date'] = $student_request->created_at;
        $data['request_id'] = $student_request->id;
        $data['paid_price'] = $student_request->paid_price;
        $data['remaining_price'] = $student_request->remaining_price;
        $data['student_id'] = $student->id;
        $data['student_name'] = $student->name;
        $data['institute_name'] = $institute->name_ar;
        $data['institute_logo'] = $institute->name_ar;
        $data['country'] = $institute->country->name_ar;
        $data['city'] = $institute->city->name_ar;
        $data['course_name'] = $course->name_ar;
        $data['from_date'] = $student_request->from_date;
        $data['to_date'] = $student_request->to_date;
        $data['weeks'] = $student_request->weeks;
        $data['total_price'] = $student_request->total_price;
        $data['course_price'] = $student_request->price_per_week;
        $data['insurance_price'] = $student_request->insurance_price;
        $data['airport'] = Airports::find($student_request->airport_id);
        $data['residence'] = residences::find($student_request->residence_id);
        $data['base_url'] = url('/');

        if($request->has('student_id')){
            if($student_request->student_id == $request->student_id){
                $data['show_paid_price'] = true;
            }
        }

        $pdf = PDF::loadView('website.institute.student-price-offer-pdf', compact('data'));
        return $pdf->stream('student-id-'.$data['student_id'].'.pdf');
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

        if(!auth()->guard('student')->check()){
            // form validation
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|string|max:255|unique:students,email',
                'phone' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string'],
                'nationality' => ['required', 'string', 'max:255'],
            ], [
                'name.required' => 'الاسم مطلوب',
                'name.max' => 'يجب الا يتجاوز الاسم ال 255 حرف',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'برجاء ادخال بريد إلكتروني صحيح',
                'email.max' => 'يجب الا يتجاوز البريد الإلكتروني ال 255 حرف',
                'email.unique' => 'هذا البريد الإلكتروني موجود بالفعل <a data-toggle="modal" data-target="#student_login" href="">قم بتسجيل الدخول لاكمال الطلب</a> او قم بادخال بريد إلكتروني جديد ',
                'phone.required' => 'رقم الجوال مطلوب',
                'phone.max' => 'يجب الا يتجاوز رقم الجوال 255 حرف',
                'address.required' => 'العنوان  مطلوب',
                'nationality.required' => 'الجنسية مطلوبة',
                'nationality.max' => 'يجب الا تتجاوز الجنسية  255 حرف',
            ]);
        }
        

        // configure student data
        $unbcrypt_password = random_password();
        $student_data = $request->except('_token', 'note', 'course_details');
        $student_data['password'] = bcrypt($unbcrypt_password);

        if(auth()->guard('student')->check()){
            $student = Student::find(auth()->guard('student')->user()->id);
        }else{
            $student = Student::create($student_data);
        }

        

        // configure student request data

        $course = Course::where('id', $course_details['course_id'])->get()[0];
        $student_request_data = [];
        $student_request_data['student_id'] = $student->id;
        $student_request_data['course_id'] = $course_details['course_id'];
        $student_request_data['institute_message'] = $course->institute->institute_questions;
        $student_request_data['status'] = 'جديد';
        $student_request_data['weeks'] = $course_details['weeks'];
        $student_request_data['price_per_week'] = $course_details['price_per_week']*(1-$course->discount);
        $student_request_data['course_discount'] = $course->discount;
        if ($course_details['residence'] != 0) {
            $student_request_data['residence_id'] = $course_details['residence']['id'];
            $student_request_data['residence_price'] = $course_details['residence']['price'];
        }
        if ($course_details['airport'] != 0) {
            $student_request_data['airport_id'] = $course_details['airport']['id'];
            $student_request_data['airport_price'] = $course_details['airport']['price'];
        }
        $student_request_data['insurance_price'] = $course_details['insurance_price'];
        $student_request_data['total_price'] = $course_details['total_price'];
        $student_request_data['paid_price'] = 0;
        $student_request_data['remaining_price'] = $course_details['total_price'];
        $student_request_data['from_date'] = $course_details['from_date'];
        $student_request_data['to_date'] = $course_details['to_date'];
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
        
        // $notification_body = '<p>لقد تم استلام طلبك بنجاح و سوف يقوم طاقم الموقع بالاتصال بك لمراجعة طلبك و تأكيد الحجز <a target="_blank" href="' . route('student_invoice' , ['request_id' => $student_request->id]) . '" class="text-secondary-color"> عرض السعر</a></p>
        // <a href="' . route('pay_now', $student_request->id) . '"  class="btn w-100 bg-secondary-color text-white rounded-10 ml-3 px-3 mb-4">دفع الان</a>';
        session()->put('course_payment_session', ['course_details' => $course_details ,'request_id' => $student_request->id]);
        return redirect()->route('student_requests.chose_payment_method');

    }

    public function chose_payment_method(Request $request){
        $course_details = session()->get('course_payment_session')['course_details'];
        $request_id = session()->get('course_payment_session')['request_id'];

        $page_identity = [
            'title_tag' => 'تم استلام طلبكم بنجاح',
            'meta_keywords' => 'كلاسات',
            'meta_description' => 'كلاسات لدراسة اللغة بالخارج',
            'page_name' => '',
        ];
        $refund_policy = WebsiteSettings::find(1)->get()[0]->refund_policy_ar;
        return view('website.payment.chose-payment-method', compact('course_details', 'request_id' , 'page_identity' , 'refund_policy'));
    }

    public function pay_now($request_id)
    {
        $student_request = StudentRequest::find($request_id);
        $course = Course::find($student_request->course_id);
        $course_details = [];
        $course_details['price_per_week'] = $student_request->price_per_week;
        $course_details['total_price'] = $student_request->total_price;
        $course_details['institute_name'] = $course->institute->name_ar;
        $course_details['course_name'] = $course->name_ar;
        $course_details['country'] = $course->institute->country->name_ar;
        $course_details['city'] = $course->institute->city->name_ar;
        $course_details['from_date'] = $student_request->from_date;
        $course_details['to_date'] = $student_request->to_date;
        $course_details['weeks'] = $student_request->weeks;
        $course_details['lessons_per_week'] = $course->lessons_per_week;
        $course_details['hours_per_week'] = $course->hours_per_week;
        $course_details['insurance_price'] = $student_request->insurance_price;
        $course_details['airport'] = Airports::find($student_request->airport_id);
        $course_details['residence'] = residences::find($student_request->residence_id);

        $notUseVue = true;

        $page_identity = [
            'title_tag' => 'ادفع الان',
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => '',
        ];

        return view('website.payment.pay-now', compact('course_details', 'request_id' , 'notUseVue' , 'page_identity'));
    }

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'paid_price' => ['required'],
            'refund_policy' => ['required'],
        ], [
            'paid_price.required' => 'يجب تحديد المبلغ المراد دفعه',
            'refund_policy.required' => 'يجب الموافقة علي على الشروط والأحكام و سياسة الاسترداد',
        ]);

        $student_request = StudentRequest::find($request->request_id);

        $student_request_data = [];
        $student_request_data['total_price'] = $student_request->total_price;
        $student_request_data['paid_price'] = $student_request->paid_price + $request->paid_price;
        $student_request_data['remaining_price'] = $student_request_data['total_price'] - $student_request_data['paid_price'];

        $subject = 'Classat Request Payment Confirmation';
        $data = [
            'request_id' => $student_request->id,
            'student_id' => $student_request->student_id
        ];
        $charge_data = [
            "amount"=> $request->paid_price ,
            "currency"=>"SAR",
            "customer"=>[
                "first_name"=>$student_request->student->name,
                "email"=>$student_request->student->email,
                "phone"=>[
                        "country_code"=>"965",
                        "number"=>$student_request->student->phone,
                    ]
                ],
            "source"=>["id"=>$request->token_id],
            "redirect" => [
                "url" => "http://your_website.com/redirect_url"
                ]
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.tap.company/v2/charges",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($charge_data),
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer sk_test_GMqKXx6FZoambuvwASV8r4yp",
            "content-type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return  "cURL Error #:" . $err;
        }

        $data = [
            'request_id' => $student_request->id,
            'student_id' => $student_request->student_id
        ];
        Mail::send('mail.student_request_payment_confirmation', $data, function ($message) use ($student_request, $subject) {
            $message->to($student_request->student->email, $student_request->student->name)
                ->subject($subject);
            $message->from('no-reply@sat-edu.com', 'Classat');
        });
        StudentRequest::where('id', $request->request_id)->update($student_request_data);
        return redirect()->route('payment_confirmation' , ['request_id' => $request->request_id , 'student_id' => $student_request->student_id]);

    }

    public function payment_confirmation(Request $request)
    {
        $request_id = $request->request_id;
        $student_id = $request->student_id;
        $page_identity = [
            'title_tag' => 'تم الدفع بنجاح' ,
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => '',
        ];
        return view('website.payment.payment-confirmation' , compact('request_id' , 'student_id' , 'page_identity'));
    }
    public function student_profile()
    {
        $student = auth()->guard('student')->user();
        $useVue = true;
        $page_identity = [
            'title_tag' => 'الصفحة الشخصية | '.$student->name ,
            'meta_keywords' => '',
            'meta_description' => '',
            'page_name' => 'student-profile',
        ];



        return view('website.students.profile' , compact('student' , 'useVue' , 'page_identity' ));
    }
    public function update_student_profile(Request $request)
    {
        $student= Student::find($request->student_id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|max:255|unique:students,email,'.$student->id,
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'nationality' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
           
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
            'profile_image.image' => 'يجب لا يسمح برفع ملفات غير الصور',
            'profile_image.mimes' => 'يجب ان تكون الصورة الشخصية لها احد الامتدات الاتية jpeg,png,jpg,gif,svg',
            ]);

            
            
            $data = $request->except('_token' , 'profile_image' , 'student_id' , 'password_confirmation' , 'password');

            if($request->password != null){
                $request->validate([ 'password' => ['string', 'min:8', 'confirmed']]);
                $data['password'] = bcrypt($request->password);
            }
            
            if ($request->profile_image) {
                $image_name = time() . $request->profile_image->getClientOriginalName();
                $image_path = "storage/students/profile-images" . '/' . $image_name;
                $data['profile_image'] = $image_path;
                File::delete($student->profile_image);
                $request->profile_image->move(public_path("\storage\students\profile-images"), $image_name);
            }
            Student::find($request->student_id)->update($data);
            session()->flash('alert_message', 'تم تحديث بياناتك بنجاح');
            return redirect()->back();
            
            
            
        }

        public function student_reservation()
        {
            $student = auth()->guard('student')->user();
            $requests = $student->all_courses_requests;
            $page_identity = [
                'title_tag' => 'الحجوزات' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => '',
            ];
            return view('website.students.reservation' , compact('student' , 'page_identity' , 'requests' ));
        }
        public function student_favourite()
        {
            $student = auth()->guard('student')->user();
            $favourites = $student->favourite_courses;
            $page_identity = [
                'title_tag' => 'المفضلة' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => '',
            ];
            return view('website.students.favourite' , compact('student' , 'page_identity' , 'favourites'));
        }
        public function student_notification()
        {
            $student = auth()->guard('student')->user();
            $page_identity = [
                'title_tag' => 'الاشعارات' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => '',
            ];
            return view('website.students.notification' , compact('student' , 'page_identity' ));
        }
        public function student_success_story()
        {
            $student = auth()->guard('student')->user();
            $page_title = 'success-story';
            $page_identity = [
                'title_tag' => 'قصة النجاح' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => '',
            ];
            return view('website.students.success-story' , compact('student' , 'page_identity' ));
        }
        public function update_success_story(Request $request)
        {
           
            $validated = $request->validate([
                'story' => ['required', 'string', 'max:500'],
               
            ], [
                'story.required' => 'يجب عليك كتابة قصتك',
                'story.max' => 'يجب الا تتجاوز القصة  ال 500 حرف',
            ]);
            $student = auth()->guard('student')->user();
            
            $student_success_story = StudentSuccessStory::where('student_id' , $student->id)->get();
            if(empty($student_success_story[0])){
                StudentSuccessStory::create(['story' => $request->story , 'student_id' => $student->id , 'approvement' => 0]);
            }else{
                StudentSuccessStory::where('student_id' , $student->id)->update(['story' => $request->story , 'approvement' => 0]);
            }

            session()->flash('alert_message', 'تم حفظ قصتك بنجاح و جاري مراجعتها من قبل فريق العمل');
            return redirect()->back();
        }



        public function update_student_favorit(Request $request)
        {
             
            $student =  auth()->guard('student')->user();
            $favourite = Favourite::where(['student_id' => $student->id , 'course_id' => $request->course_id])->get();
            if(empty($favourite[0])){
                Favourite::create(['student_id' => $student->id , 'course_id' => $request->course_id]);
                return 'added';
            }else{
                Favourite::where(['student_id' => $student->id , 'course_id' => $request->course_id])->delete();
                return 'removed';
            }
        }
        public function about_us()
        {
            $page_identity = [
                'title_tag' => 'من نحن' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => 'about-us',
            ];
            return view('website.about-us' , compact('page_identity'));
        }
        public function contact_us()
        {
            $page_identity = [
                'title_tag' => 'تواصل معنا' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => 'contact-us',
            ];
            return view('website.contact-us' , compact('page_identity') );
        }
        public function terms_conditions()
        {
            $page_identity = [
                'title_tag' => 'الشروط و الاحكام' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => 'terms-conditions',
            ];
            $terms_conditions = WebsiteSettings::get()[0]->terms_conditions_ar;
            return view('website.terms-conditions' , compact('page_identity' , 'terms_conditions') );
        }
        public function refund_policy()
        {
            $page_identity = [
                'title_tag' => 'شروط الاستردات' ,
                'meta_keywords' => '',
                'meta_description' => '',
                'page_name' => 'refund policy',
            ];
            $refund_policy = WebsiteSettings::get()[0]->refund_policy_ar;
            return view('website.refund-policy' , compact('page_identity' , 'refund_policy') );
        }
        public function send_contact_us_mail(Request $request)
        {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|string|max:255|email',
                'message' => 'required|string',
                
            ], [
                'name.required' => 'الاسم مطلوب',
                'name.max' => 'يجب الا يتجاوز الاسم ال 255 حرف',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'برجاء ادخال بريد إلكتروني صحيح',
                'email.max' => 'يجب الا يتجاوز البريد الإلكتروني ال 255 حرف',
                'message.required' => 'برجاء ادخال رسالتك',
                ]);
                
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'body' => $request->message,
                ];
                Mail::send('mail.contact-us', $data, function ($message) use ($data) {
                    $message->to('no-reply@sat-edu.com', 'Classat')
                    ->subject('رسالة من عميل علي موقع كلاسات');
                    $message->from($data['email'], $data['name']);
                });
                session()->flash('alert_message', 'تم ارسال رسالتك بنجاح , و سنقوم بالتواصل معكم قريبا');
                return redirect()->back();
                
            }
            public function offers()
            {
                $offers = Course::where('discount' , '!=' , 0)->paginate(12);
                $page_identity = [
                    'title_tag' => 'كلاسات | العروض',
                    'meta_keywords' => '',
                    'meta_description' => '',
                    'page_name' => 'offers',
                ];
                return view('website.offers' , compact('offers' , 'page_identity'));
            }
            public function add_review(Request $request)
            {
                $student = auth()->guard('student')->user();
                if(auth()->guard('student')->check()){

                $any_student_request = StudentRequest::where(['student_id' => $student->id])
                ->whereHas('course', function ($query) use ($request) { $query->where(['institute_id' => $request->institute_id]); })
                ->get();

                if(empty($any_student_request[0])){
                    return back()->withErrors(['have_no_course' =>'يجب عليك ان تكون مسجل في دورة تابعة لهذا المعهد بالفعل']);
                }


                    $validated = $request->validate([
                        'rate' => ['required', 'numeric' , 'min:0' , 'max:5'],
                        'review' => 'max:500',
                        
                    ], [
                        'rate.required' => 'التقييم مطلوب',
                        'review.max' => 'يجب الا يتجاوز عدد الحروف 500 حرف',
                    ]);
                    $data=[];
                    $data['student_id']=$student->id;
                    $data['institute_id']=$request->institute_id;
                    $data['rate']=$request->rate;
                    $data['review']=$request->review;
                    $data['approvement']=0;
                    InstituteRate::where(['student_id' =>$student->id , 'institute_id' => $request->institute_id])->forceDelete();
                    InstituteRate::create($data);
                    session()->flash('alert_message', 'تم اضافة تقييمك بنجاح و سيتم مراجعته من قبل فريق العمل.');
                    return back();
                        
                }
                else{
                    return back()->withErrors(['login_error' =>'يجب عليك تسجيل الدخول اولا']);
                }


                
                
                    // InstituteRate
            }
            
            
            
            
            
            

        }

       

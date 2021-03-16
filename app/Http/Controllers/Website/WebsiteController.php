<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\RegisterStudentRequest;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Institute;
use App\Models\Partner;
use App\Models\Student;
use App\Models\StudentSuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('website.institutes', compact('useVue'));
    }
    // institute page method : show the course info through institute profile
    public function institute_page($institute_id, $institute_slug, $course_slug)
    {
        $course = Course::with('coursesPrice' , 'coursesPricePerWeek')->where(['institute_id' => $institute_id , 'slug' => $course_slug])->get();
        
        $institute = Institute::where(['id' => $institute_id , 'slug' => $institute_slug])->get();
        if(empty($course[0])){ return redirect()->route('website.home');}
        $course = $course[0];
        $institute = $institute[0];

        $useVue = true;
        return view('website.institute-profile', compact('useVue' , 'course' , 'institute'));
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
}

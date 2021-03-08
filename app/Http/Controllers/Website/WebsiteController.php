<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Student\RegisterStudentRequest;


use App\Models\Country;
use App\Models\Course;
use App\Models\StudentSuccessStory;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;



class WebsiteController extends Controller
{
    public function home_page()
    {
        $useVue = true;
        $best_offers = Course::orderBy('discount' , 'DESC')->take(10)->get();
        $success_stories = StudentSuccessStory::inRandomOrder()->take(10)->get();
        $two_blogs = Blog::inRandomOrder()->take(2)->get();
        $blogs = Blog::inRandomOrder()->take(8)->get();
        $partners = Partner::inRandomOrder()->take(8)->get();
        return view('website.home' , compact(
                                                'useVue', 
                                                'best_offers', 
                                                'success_stories',
                                                'two_blogs',
                                                'blogs',
                                                'partners',
                                            ));
    }

    public function institutes_page()
    {
        $useVue = true;
        return view('website.institutes' , compact('useVue'));
    }

    public function student_login_page()
    {
        return view('website.students.login');
    }
    public function student_login_auth(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if(Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password] , $remember)){
            return redirect()->route('student.profile');
        }else{
            return back();
        }
    }
    public function student_register_page(Request $request)
    {
        $useVue = true;
        return view('website.students.register' , compact('useVue') );
    }
    public function student_register_auth(RegisterStudentRequest $request)
    {
        // return $request->all();
        $remember = $request->has('remember') ? true : false;
        $data=$request->except('_token' , 'password' , 'password_confirmation');
        $data['password'] =  bcrypt($request->password);
        Student::create($data);
        if(Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password] , $remember)){
            return redirect()->route('student.profile');
        }else{
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\StoreCoursesRequest;
use App\Models\Country;
use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\Institute;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $institutes = Institute::get();
        $courses = Course::get();
        $countercourse = Course::get();
        $countries = Country::get();
        $count_courses = count($countercourse);
        $department_name = 'courses';
        $page_name = 'courses';
        $page_title = 'الدورات';
        $useVue = true;

        return view("admin.courses.index", compact('useVue', 'department_name', 'page_name', 'courses', 'institutes', 'count_courses', 'countries','page_title'));
    }
    /************************************************************** */
    public function getCourses()
    {
        $courses = Course::with('institute', 'institute.city')->paginate(10);
        return response()->json(['courses' => $courses]);

    }
    /************************************************************** */
    public function create()
    {
<<<<<<< HEAD
        $institutes = Institute::with('city')->get();
        // dd($institutes);
=======
        $institutes = Institute::get();
>>>>>>> 50658f85d8460d53c376139464b81d3ca4150f0f
        $department_name = 'courses';
        $page_name = 'add-course';
        $page_title = 'الدورات';

        return view("admin.courses.create", compact('department_name', 'page_name', 'institutes','page_title'));
    }
    /************************************************************** */
    public function store(StoreCoursesRequest $request)
    {
        $validate = $request->validated();
        $name_ar = $request->name_ar;
        $name_ar = $request->name_ar;
        $getcourse = Course::where(['institute_id' => $request->institute_id, 'name_ar' => $name_ar])->first();
        if ($getcourse == []) {
            $course = Course::create([
                'name_ar' => $request->name_ar,
                'slug' => str_replace(' ', '-', $request->name_ar),
                'about_ar' => $request->desc,
                'institute_id' => $request->institute_id,
                'creator_id' => 1,
                'min_age' => $request->min_age,
                'start_day' => date('Y-m-d H:i:s'),
                'study_period' => $request->study_period,
                'lessons_per_week' => $request->lessons_per_week,
                'hours_per_week' => $request->hours_per_week,
                'required_level' => $request->required_level,
                'discount' => $request->discount/100,
                'approvment' => 0,

            ]);
            $coures_price = $request->coures_price;
            foreach ($coures_price as $price) {
                CoursePrice::create([
                    'weeks' => $price["num_of_weeks"],
                    'price' => $price["preice_per_week"],
                    'course_id' => $course->id,
                    'approvement' => 1,
                ]);
            }
            session()->flash('alert_message', ['message' => 'تم اضافه الدورة بنجاح', 'icon' => 'success']);
            return redirect()->route('courses.index');

        } else {
            session()->flash("alert_message", ['message' => 'هذه الدورة موجوده بالفعل', 'icon' => "error"]);
            return back();
        }

    }
    /************************************************************** */
    public function show(Course $course)
    {
        //
    }
    /************************************************************** */
    public function edit(Course $course)
    {
        $institutes = Institute::get();
        $course = Course::find($course->id);
        $course_prices = CoursePrice::where(["course_id" => $course->id])->get();
        $department_name = 'courses';
        $page_name = 'courses';
        $page_title = 'الدورات';

        return view("admin.courses.edit", compact('course', 'institutes', 'department_name', 'page_name', 'course_prices','page_title'));
        // dd($course);
    }
    /************************************************************** */
    public function update(StoreCoursesRequest $request, Course $course)
    {
        $validate = $request->validated();

        $updateCourse = Course::find($course->id);
        $updateCourse->name_ar = $request->name_ar;
        $updateCourse->about_ar = $request->desc;
        $updateCourse->institute_id = $request->institute_id;
        $updateCourse->creator_id = 1;
        $updateCourse->min_age = $request->min_age;
        $updateCourse->study_period = $request->study_period;
        $updateCourse->lessons_per_week = $request->lessons_per_week;
        $updateCourse->hours_per_week = $request->hours_per_week;
        $updateCourse->required_level = $request->required_level;
        $updateCourse->discount = $request->discount/100;
        $updateCourse->save();

        CoursePrice::where(["course_id" => $course->id])->delete();
        $coures_price = $request->coures_price;
        foreach ($coures_price as $price) {

            CoursePrice::create([
                'weeks' => $price["num_of_weeks"],
                'price' => $price["preice_per_week"],
                'course_id' => $course->id,
            ]);

        }
        session()->flash('alert_message', ['message' => 'تم تعديل الدورة بنجاح', 'icon' => 'success']);

        return back();

    }
    /************************************************************** */
    public function destroy(Course $course)
    {
        CoursePrice::where(['course_id' => $course->id])->delete();
        Course::find($course->id)->delete();

        session()->flash("alert_message", ["message" => 'تم حذف الدورة', "icon" => "error"]);

        return back()->with("success", 'تم الحذف الدورة');

    }
    /************************************************************** */
    public function filtercourses(Request $request)
    {

        $institute_id = $request->institute_id;
        $country_id = $request->country_id;
        $city_id = $request->city_id;
        $name_ar = $request->name_ar;
        $discount_offers = $request->discount_offers;
        $non_discount_offers = $request->non_discount_offers;

        $courses = new Course();

        if ($institute_id != null) {
            $courses = $courses->where("institute_id", $institute_id);
        }
        if ($country_id != null) {
            $courses = $courses->with('institute')->whereHas('institute', function ($query) use ($country_id) {
                $query->where('country_id', $country_id);
            });
        }
        if ($city_id != null) {
            $courses = $courses->with('institute')->whereHas('institute', function ($query) use ($country_id, $city_id) {
                $query->where('country_id', $country_id)->where('city_id', $city_id);
            });
        }
        if ($name_ar != null) {
            $courses = $courses->where("name_ar", 'LIKE', "%{$request->name_ar}%");
        }

        if ($discount_offers == 'false') {
            
            $courses = $courses->where("discount" , 0);
        }
        if ($non_discount_offers == 'false') {
            $courses = $courses->where("discount" , '!=' , 0);
        }

        $courses = $courses->with('institute', 'institute.city')->paginate(10);
        return response()->json(['courses' => $courses]);

    }
    /************************************************************** */
    public function updateAprovement(Request $request)
    {
        $institute = Course::find($request->course_id);
        $institute->approvment = $request->approvment;
        $institute->save();
    }
    /************************************************************** */
    public function archive(Request $request)
    {

        $courses = Course::onlyTrashed()->get();
        // dd($courses);
        $page_name = 'archive_course';
        return view('admin.courses.archives', ['page_name' => $page_name, 'courses' => $courses]);

    }
    /************************************************************** */
    public function restor(Request $request, $id)
    {
        $restor = CoursePrice::where(['course_id' => $id])->restore();
        $restor = Course::where(['id' => $id])->restore();
        session()->flash('alert_message', ['message' => 'تم ارجاع الدورة بنجاح', 'icon' => 'success']);
        return back();

    }

    
    

}

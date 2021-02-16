<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\institute;
use App\Models\CoursePrice;
use App\Http\Requests\Courses\StoreCoursesRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutes = institute::get();
        $courses = Course::paginate(10);
        $countercourse = Course::get(); 
        $countries = Country::get();
        // $countercourse->count();
        $count_courses = count($countercourse);
        $department_name = 'courses';
        $page_name = 'courses';
        $useVue = true ;

        return view("admin.courses.index" , compact( 'useVue','department_name' , 'page_name', 'courses' ,'institutes','count_courses','countries'));
    }


    public function getCourses(){
        $courses = Course::with('institute','institute.city')->paginate(10);
        return response()->json(['courses'=>$courses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutes = institute::get();
        $department_name = 'courses';
        $page_name = 'add-course';
        return view("admin.courses.create" , compact('department_name' , 'page_name','institutes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesRequest $request)
    {
    // dd($request->all());
    $validate =$request->validated();
// dd($validate);
        $name_ar = $request->name_ar;
        $getcourse = Course::where([ 'institute_id'=>$request->institute_id ,'name_ar'=>$name_ar ])->first();
        if($getcourse == []){
            $course =   Course::create([
                'name_ar'=> $request->name_ar,
                'about_ar'=> $request->desc,
                'institute_id'=> $request->institute_id,
                'creator_id'=> 1,
                'min_age'=> $request->min_age,
                'start_day'=> date('Y-m-d H:i:s') ,
                'study_period'=> $request->study_period,
                'lessons_per_week'=> $request->lessons_per_week,
                'hours_per_week'=> $request->hours_per_week,
                'required_level'=> $request->required_level,
                'discount'=> $request->discount,
                'approvment'=> 0,
        
                ]);
               $coures_price = $request->coures_price;
               foreach($coures_price as   $price){
                        CoursePrice::create([
                        'weeks'=>$price["num_of_weeks"],  
                        'price'=>$price["preice_per_week"],  
                        'course_id'=>$course->id,  
                        'approvement'=>1,  
                        ]);
               }
            session()->flash('alert_message',['message'=>'تم اضافه الدورة بنجاح','icon'=>'success']);
            return redirect()->route('courses.index');
           
        }else{
            session()->flash("alert_message",['message'=>'هذه الدورة موجوده بالفعل','icon'=>"error"]);
               return back(); 
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $institutes = institute::get();
        $course = Course::find($course->id  );
        $course_prices = CoursePrice::where(["course_id"=>$course->id])->get();
        $department_name = 'courses';
        $page_name = 'courses';
        return view("admin.courses.edit",compact('course','institutes','department_name','page_name','course_prices'));
        // dd($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCoursesRequest $request, Course $course)
    {
    $validate =$request->validated();

        // dd($course->id);


        // $name_ar = $request->name_ar;
        // $getcourse = Course::where([ 'institute_id'=>$request->institute_id ,'name_ar'=>$name_ar ])->first();
        // if($getcourse == []){
          
                $updateCourse =  Course::find($course->id);
                $updateCourse->name_ar = $request->name_ar;
                $updateCourse->about_ar = $request->desc;
                $updateCourse->institute_id = $request->institute_id;
                $updateCourse->creator_id = 1;
                $updateCourse->min_age = $request->min_age;
                $updateCourse->study_period = $request->study_period;
                $updateCourse->lessons_per_week = $request->lessons_per_week;
                $updateCourse->hours_per_week = $request->hours_per_week;
                $updateCourse->required_level = $request->required_level;
                $updateCourse->discount = $request->discount;
                $updateCourse->save();
        


        
               CoursePrice::where(["course_id"=>$course->id])->delete();    
               $coures_price = $request->coures_price;
               foreach($coures_price as $price){
                   
                        CoursePrice::create([
                        'weeks'=>$price["num_of_weeks"],  
                        'price'=>$price["preice_per_week"],  
                        'course_id'=>$course->id,  
                        ]);


               }
               return back()->with("success", 'تم تعديل الدورة');
        // }else{
            //    return back()->with("error",'هذه الدورة موجوده بالفعل'); 
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        // dd($course->id);
        CoursePrice::where(['course_id'=>$course->id])->delete();
        Course::find($course->id)->delete();

        // CoursePrice::where(["course_id"=>$course->id])->delete();    
        session()->flash("alert_message",["message"=>'تم حذف الدورة',"icon"=>"error"]);

        return back()->with("success", 'تم الحذف الدورة');


    }


   public function filtercourses(Request $request){
    //    dd($request->all());

       $institute_id=$request->institute_id;
       $country_id=$request->country_id;
       $city_id=$request->city_id;
       $name_ar=$request->name_ar;
       $courses = new Course();
       
       if($institute_id != null){
            $courses = $courses->where("institute_id" , $institute_id);
       }
       if($country_id != null){
        $courses =   $courses->with('institute')->whereHas('institute', function($query) use($country_id) {
            $query->where('country_id', $country_id);
        });
    }
    if ($city_id != null) {
        $courses =   $courses->with('institute')->whereHas('institute', function ($query) use ($country_id, $city_id) {
            $query->where('country_id', $country_id)->where('city_id', $city_id);
        });
    }
    if($name_ar != null){
        $courses= $courses->where("name_ar",'LIKE',"%{$request->name_ar}%" );

    }
    $courses = $courses->with('institute','institute.city')->paginate(10);
    return response()->json(['courses'=>$courses]);


   }

     /************************* */ 
     public function updateAprovement(Request $request){
        $institute = Course::find($request->course_id);
        $institute->approvment = $request->approvment;
        $institute->save();
  }


  /************************************************************** */ 


  public function archive(Request $request){

    $courses = Course::onlyTrashed()->get();
    // dd($courses);
    $page_name='archive_course';
    return  view('admin.courses.archives',['page_name'=>$page_name,'courses'=>$courses]);
  
    }
/************************************************************** */ 

    public function restor(Request $request,$id){
    $restor = CoursePrice::where(['course_id'=>$id])->restore();
    $restor = Course::where(['id'=>$id])->restore();
    session()->flash('alert_message', ['message' => 'تم ارجاع الدورة بنجاح', 'icon' => 'success']);
    return back();

    }


}

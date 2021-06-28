<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Course;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class VueRequestsController extends Controller
{
    public function get_countries()
    {
        $countries = Country::get(['name_ar as name' , 'id']);
        return response()->json($countries);
    }
    public function get_cities(Request $request)
    {
        $cities = new City();
        if($request->has('country_id')){
            if( $request->country_id != 'all'){
                $cities = $cities->where('country_id' , $request->country_id);
            }
        }
        $cities = $cities->get(['name_ar as name' , 'id']);
        return response()->json($cities);
    }

    // get course
    public function get_courses(Request $request)
    {
        $courses = Course::where('approvement' , 1);

        if(!empty($request->country_id)){
            $courses = $courses->whereHas('institute', function ($query) use ($request) {
                $query->where('country_id', $request->country_id);
            });
        }
        if(!empty($request->city_id)){
            $courses = $courses->whereHas('institute', function ($query) use ($request) {
                $query->where('city_id', $request->city_id);
            });
        }
        if(!empty($request->keyword)){
            $courses = $courses
                        ->whereHas('institute', function ($query) use ($request) { $query->where('name_ar', $request->keyword); })
                        ->orWhere("name_ar", 'LIKE', "%{$request->keyword}%")
                        ->orWhereHas('institute', function ($query) use ($request) { $query->whereHas('country', function ($query) use ($request) { $query->where('name_ar', $request->keyword);});})
                        ->orWhereHas('institute', function ($query) use ($request) { $query->whereHas('city', function ($query) use ($request) { $query->where('name_ar', $request->keyword);});});
        }
        if($request->best_offers == true){
            $courses = $courses->orderBy('discount' , 'DESC');
        }
        if(!empty($request->course_level)){
            $courses = $courses->where('required_level', $request->course_level);
        }
       
 



                $weeks = [];
                $selected_weeks = DB::select('(SELECT MAX(weeks) as weeks FROM course_prices WHERE weeks < 23 OR weeks = 23 GROUP BY course_id)');
                foreach($selected_weeks as $index => $selected_week){
                    $weeks[$index]=$selected_week->weeks;
                }
                
               $courses = DB::table('courses')
                        ->join('course_prices', 'courses.id', '=', 'course_prices.course_id')
                        ->join('institutes', 'institutes.id', '=', 'courses.institute_id')
                        ->join('countries', 'institutes.country_id', '=', 'countries.id')
                        ->join('cities', 'institutes.city_id', '=', 'cities.id')
                        ->leftJoin(DB::raw('(SELECT * , AVG(rate) AS student_rates FROM institute_rates GROUP BY institute_id) AS institute_rates'), 'institute_rates.institute_id', '=', 'institutes.id')
                        ->leftJoin(DB::raw('(SELECT *  FROM favourites WHERE student_id = '.$request->student_id.') AS student_favourites'), 'student_favourites.course_id', '=', 'courses.id')
                        ->select(
                                'courses.id AS course_id' ,  
                                'courses.slug AS course_sulg' ,  
                                'institutes.id AS institute_id' ,  
                                'institutes.slug AS institute_sulg' ,  
                                'courses.discount AS discount' ,  
                                'institutes.banner AS institute_banner' , 
                                'institutes.name_ar AS institute_name' , 
                                DB::raw("IF(institutes.rate_switch = 1, institutes.sat_rate, institute_rates.student_rates) AS institute_rate"),
                                'countries.name_ar AS country_name' ,  
                                'cities.name_ar AS city_name' ,  
                                'courses.name_ar AS courses_name' ,  
                                'courses.study_period AS courses_study_period' ,  
                                'courses.required_level AS courses_required_level' ,  
                                'course_prices.weeks' , 
                                'course_prices.price AS real_price' , 
                                DB::raw("course_prices.price*(1-courses.discount) as discounted_price"),
                                'student_favourites.course_id AS favourite_course_id' , 
                                )
                        ->WhereIn('course_prices.weeks' , $weeks)
                        ->Where('courses.approvement' , 1)
                        ->orderBy('discounted_price' , 'DESC')
                        ->paginate(9);


        // $courses = $courses->latest()->with('institute', 'institute.city' , 'institute.country' , 'institute.rats' , 'coursesPrice' , 'student_favourite')->paginate(9);
        return response()->json(['status' => 'success' , 'courses' => $courses]);
    }

    // get course details in institute profile
    public function get_course_for_institute_page(Request $request)
    {
        return $request->course_id;
        $courses = new Course();
        
        if(!empty($request->keyword)){
            $courses = $courses->where("name_ar", 'LIKE', "%{$request->keyword}%");
        }
        if(!empty($request->country_id)){
            $courses = $courses->whereHas('institute', function ($query) use ($request) {
                $query->where('country_id', $request->country_id);
            });
        }
        if(!empty($request->city_id)){
            $courses = $courses->whereHas('institute', function ($query) use ($request) {
                $query->where('city_id', $request->city_id);
            });
        }

        $courses = $courses->latest()->with('institute', 'institute.city' , 'institute.country' , 'institute.rats' , 'coursesPricePerWeek')->paginate(9);
        return response()->json(['status' => 'success' , 'courses' => $courses]);
    }

    // get price per week in institute profile
    public function get_course_price_per_week(Request $request)
    {
        $course = Course::where(['id' => $request->course_id])->get()[0];
        $price_per_week = price_per_week($course->coursesPrice, $request->weeks);
        return response()->json(['status' => 'success' , 'price_per_week' => $price_per_week]);

    }
    // get price per week in institute profile
    public function get_insurance_price_per_week(Request $request)
    {
        $institute = Course::where(['id' => $request->course_id])->get()[0]->institute;
        $price_per_week = price_per_week($institute->insurancePrice, $request->weeks);
        return response()->json(['status' => 'success' , 'insurance_price' => $price_per_week]);

    }

    // get price per week in institute profile
    public function get_student_favourite_courses(Request $request)
    {
        $student_favourite_courses = Favourite::where(['course_id' => $request->course_id])->get();
        return response()->json(['status' => 'success' , 'student_favourite_courses' => $student_favourite_courses] );

    }
    
}

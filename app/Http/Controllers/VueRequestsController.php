<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Favourite;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VueRequestsController extends Controller
{
    public function get_countries()
    {
        $countries = Country::get(['name_ar as name', 'id']);
        return response()->json($countries);
    }
    public function get_cities(Request $request)
    {
        $cities = new City();
        if ($request->has('country_id')) {
            if ($request->country_id != 'all') {
                $cities = $cities->where('country_id', $request->country_id);
            }
        }
        $cities = $cities->get(['name_ar as name', 'id']);
        return response()->json($cities);
    }

    // get course
    public function get_courses(Request $request)
    {
        $student_id = $request->student_id;
        if (empty($student_id)) {$student_id = 0;}

        $course_prices_ids = [];
        $course_ids = [];

        if ($request->weeks == 1) {
            $selected_weeks_query = DB::select('(SELECT course_prices.id AS course_prices_id , course_prices.course_id , joined_course_prices.selected_weeks FROM course_prices Join (SELECT  course_id , MIN(weeks) as selected_weeks FROM course_prices WHERE deleted_at IS NULL   GROUP BY course_id) AS joined_course_prices ON joined_course_prices.selected_weeks = course_prices.weeks AND joined_course_prices.course_id = course_prices.course_id)');
            foreach ($selected_weeks_query as $selected_week) {
                array_push($course_prices_ids, $selected_week->course_prices_id);
                array_push($course_ids, $selected_week->course_id);
            }
        } else {
            $selected_weeks_query = DB::select('(SELECT course_prices.id AS course_prices_id , course_prices.course_id , joined_course_prices.selected_weeks FROM course_prices Join (SELECT  course_id , MAX(weeks) as selected_weeks FROM course_prices WHERE deleted_at IS NULL AND   weeks < ' . $request->weeks . ' OR weeks = ' . $request->weeks . ' GROUP BY course_id) AS joined_course_prices ON joined_course_prices.selected_weeks = course_prices.weeks AND joined_course_prices.course_id = course_prices.course_id)');
            if(empty($selected_weeks_query)){
                $selected_weeks_query = DB::select('(SELECT course_prices.id AS course_prices_id , course_prices.course_id , joined_course_prices.selected_weeks FROM course_prices Join (SELECT  course_id , MIN(weeks) as selected_weeks FROM course_prices WHERE deleted_at IS NULL  GROUP BY course_id) AS joined_course_prices ON joined_course_prices.selected_weeks = course_prices.weeks AND joined_course_prices.course_id = course_prices.course_id)');
                foreach ($selected_weeks_query as $selected_week) {
                    array_push($course_prices_ids, $selected_week->course_prices_id);
                    array_push($course_ids, $selected_week->course_id);
                }
            }else{
                foreach ($selected_weeks_query as $selected_week) {
                    array_push($course_prices_ids, $selected_week->course_prices_id);
                    array_push($course_ids, $selected_week->course_id);
                }
    
                $selected_weeks_query = DB::select('(SELECT course_prices.id AS course_prices_id , course_prices.course_id , joined_course_prices.selected_weeks FROM course_prices Join (SELECT  course_id , MIN(weeks) as selected_weeks FROM course_prices WHERE deleted_at IS NULL AND  course_id NOT IN (' . implode(",", $course_ids) . ') GROUP BY course_id) AS joined_course_prices ON joined_course_prices.selected_weeks = course_prices.weeks AND joined_course_prices.course_id = course_prices.course_id)');
                foreach ($selected_weeks_query as $selected_week) {
                    array_push($course_prices_ids, $selected_week->course_prices_id);
                    array_push($course_ids, $selected_week->course_id);
                }
            }
            
        }
        $courses = DB::table('courses')
            ->join('course_prices', 'courses.id', '=', 'course_prices.course_id')
            ->join('institutes', 'institutes.id', '=', 'courses.institute_id')
            ->join('countries', 'institutes.country_id', '=', 'countries.id')
            ->join('cities', 'institutes.city_id', '=', 'cities.id')
            ->leftJoin(DB::raw('(SELECT * , AVG(rate) AS student_rates FROM institute_rates WHERE deleted_at = NULL GROUP BY institute_id) AS institute_rates'), 'institute_rates.institute_id', '=', 'institutes.id')
            ->leftJoin(DB::raw('(SELECT *  FROM favourites WHERE student_id = ' . $student_id . ' )  AS student_favourites'), 'student_favourites.course_id', '=', 'courses.id')
            ->select(
                'courses.id AS course_id',
                'courses.name_ar AS course_name',
                'courses.slug AS course_sulg',
                'courses.discount AS discount',
                'courses.name_ar AS courses_name',
                'courses.study_period AS courses_study_period',
                'courses.required_level AS courses_required_level',
                'institutes.id AS institute_id',
                'institutes.slug AS institute_sulg',
                'institutes.banner AS institute_banner',
                'institutes.name_ar AS institute_name',
                DB::raw("IF(institutes.rate_switch = 1, institutes.sat_rate, institute_rates.student_rates) AS institute_rate"),
                'countries.name_ar AS country_name',
                'cities.name_ar AS city_name',
                'course_prices.weeks',
                'course_prices.price AS real_price',
                DB::raw("course_prices.price*(1-courses.discount) as discounted_price"),
                'student_favourites.course_id AS favourite_course_id',
                'countries.id AS country_id',
                'cities.id AS city_id',
            )
            ->WhereIn('course_prices.id', $course_prices_ids)
            ->Where([
                    'courses.approvement' => 1 , 
                    'courses.deleted_at' => NULL , 
                    'course_prices.deleted_at' => NULL,
                    'institutes.deleted_at' => NULL,
                ]);

        if(!empty($request->country_id)){
            $courses = $courses->where('countries.id' , $request->country_id);
        }
        if(!empty($request->city_id)){
            $courses = $courses->where('cities.id' , $request->city_id);
        }
        if(!empty($request->keyword)){
            $courses =  $courses->where('institutes.name_ar' , 'LIKE' , "%{$request->keyword}%");
        }
        if($request->best_offers == 'true'){
            $courses = $courses->orderBy('courses.discount' , 'DESC');
        }
        if(!empty($request->course_level)){
            $courses = $courses->where('courses.required_level', $request->course_level);
        }

        if(!empty($request->arrange_as)){
            if($request->arrange_as == 'highest_rates'){ $courses = $courses->orderBy('institute_rate', 'DESC'); }
            if($request->arrange_as == 'lowest_rates'){ $courses = $courses->orderBy('institute_rate', 'ASC'); }
            if($request->arrange_as == 'highest_prices'){ $courses = $courses->orderBy('discounted_price', 'DESC'); }
            if($request->arrange_as == 'lowest_prices'){ $courses = $courses->orderBy('discounted_price', 'ASC'); }
        }

        return response()->json(['status' => 'success', 'courses' => $courses->paginate(9)]);
    }

    // get course details in institute profile
    public function get_course_for_institute_page(Request $request)
    {
        return $request->course_id;
        $courses = new Course();

        if (!empty($request->keyword)) {
            $courses = $courses->where("name_ar", 'LIKE', "%{$request->keyword}%");
        }
        if (!empty($request->country_id)) {
            $courses = $courses->whereHas('institute', function ($query) use ($request) {
                $query->where('country_id', $request->country_id);
            });
        }
        if (!empty($request->city_id)) {
            $courses = $courses->whereHas('institute', function ($query) use ($request) {
                $query->where('city_id', $request->city_id);
            });
        }

        $courses = $courses->latest()->with('institute', 'institute.city', 'institute.country', 'institute.rats', 'coursesPricePerWeek')->paginate(9);
        return response()->json(['status' => 'success', 'courses' => $courses]);
    }

    // get price per week in institute profile
    public function get_course_price_per_week(Request $request)
    {
        $course = Course::where(['id' => $request->course_id])->get()[0];
        $price_per_week = price_per_week($course->coursesPrice, $request->weeks);
        return response()->json(['status' => 'success', 'price_per_week' => $price_per_week]);

    }
    // get price per week in institute profile
    public function get_insurance_price_per_week(Request $request)
    {
        $institute = Course::where(['id' => $request->course_id])->get()[0]->institute;
        $price_per_week = price_per_week($institute->insurancePrice, $request->weeks);
        return response()->json(['status' => 'success', 'insurance_price' => $price_per_week]);

    }

    // get price per week in institute profile
    public function get_student_favourite_courses(Request $request)
    {
        $student_favourite_courses = Favourite::where(['course_id' => $request->course_id])->get();
        return response()->json(['status' => 'success', 'student_favourite_courses' => $student_favourite_courses]);

    }

}

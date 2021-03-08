<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Course;


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
            $cities = $cities->where('country_id' , $request->country_id);
        }
        $cities = $cities->get(['name_ar as name' , 'id']);
        return response()->json($cities);
    }
    public function get_courses(Request $request)
    {
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

        $courses = $courses->with('institute', 'institute.city' , 'institute.country' , 'institute.rats' , 'coursesPricePerWeek')->paginate(10);
        return response()->json(['status' => 'success' , 'courses' => $courses]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;


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
}

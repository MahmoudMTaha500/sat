<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::get();
        $department_name = 'country';
        $page_name = 'getcountries';
        return view("admin.cities.index", compact('cities', 'department_name', 'page_name'));
    }

    public function create(Request $request)
    {
        $countries = Country::get();
        $department_name = 'country';
        $page_name = 'addcountry';
        return view("admin.cities.create", compact('countries' , 'department_name' , 'page_name'));
    }

    public function store(Request $request)
    {
        //   dd($request->all());

        $country_id = $request->country_id;
        $city_name = $request->name_ar;
        $city = City::create([
            'country_id' => $country_id,
            'name_ar' => $city_name,
        ]);
        return back()->with("success", 'تم اضافه المدينه');

    }

    public function show(City $city)
    {
        //
    }

    public function edit(City $city)
    {
        $countries = Country::get();
        $cities = City::find($city->id);
        $department_name = 'country';
        $page_name = 'addcountry';
        return view("admin.cities.edit", compact('countries' , 'cities' , 'department_name' , 'page_name'));
    }

    public function update(Request $request, city $city)
    {
        $city = City::find($city->id);
        $country_id = $request->country_id;
        $city_name = $request->name_ar;
        $city->country_id = $country_id;
        $city->name_ar = $city_name;
        $city->save();
        return back()->with("success", "تم تعديل المدينه");
        // dd($request->all());
    }

    public function destroy(city $city)
    {
        $city_delete = City::find($city->id);
        $city_delete->delete();
        return back()->with("success", "تم مسح المدينه");
    }

/****************************************************************************** */
    public function getCities(Request $request)
    {
        $country_id = $request->countryID;
        $cities = City::where("country_id", $country_id)->get();
        return response()->json(['cities' => $cities]);
// dd($cities);
    }
/****************************************************************************** */
    public function addCity(Request $request)
    {
        //   dd($request->all());
        $country_id = $request->country_id;
        $city_name = $request->name_ar;
        $get_city = City::where(['name_ar' => "$city_name"])->first();
        // dd($get_city);
        // var_dump($get_city);
        if ($get_city == array()) {
            $city = City::create([
                'country_id' => $country_id,
                'name_ar' => $city_name,
            ]);
            return response()->json(["success" => 'تم اضافه المدينه']);
        } else {
            return response()->json(["success" => '  هذه المدينه موجوده بالفعل']);

        }

        // dd($get_city);

    }

}

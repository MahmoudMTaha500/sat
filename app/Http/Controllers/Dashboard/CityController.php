<?php

namespace App\Http\Controllers\Dashboard;
use App\city;
use App\country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = city::get();
        return view("admin.countryandcity.city.index",['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $countries = country::get();
        return view("admin.countryandcity.city.create",['countrties'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   dd($request->all());

      $country_id = $request->country_id;
      $city_name =  $request->name_ar;
      $city  = city::create([
          'country_id'=>$country_id,
          'name_ar'=>$city_name,
              ]);
              return back()->with("success",'تم اضافه المدينه');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city)
    {
    $countries = country::get();

        $cities = city::find($city->id);
        // dd($city);
        return view("admin.countryandcity.city.edit",['cities'=>$cities,'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, city $city)
    {
        $city = city::find($city->id);
         $country_id = $request->country_id;
         $city_name = $request->name_ar;
         $city->country_id = $country_id;
         $city->name_ar=$city_name;
         $city->save();
         return back()->with("success","تم تعديل المدينه");
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(city $city)
    {
        $city_delete = city::find($city->id);
        $city_delete->delete();
        return back()->with("success", "تم مسح المدينه");
    }


/****************************************************************************** */
public function getCities(Request $request){
$country_id = $request->countryID;
$cities = city::where("country_id" , $country_id)->get();
return response()->json(['cities'=>$cities]);
// dd($cities);
}
/****************************************************************************** */
public function addCity(Request $request){
    //   dd($request->all());
      $country_id = $request->country_id;
      $city_name =  $request->name_ar;
    $get_city= city::where(['name_ar'=>"$city_name"])->first();
    // dd($get_city);
    // var_dump($get_city);
    if($get_city ==array() ){
        $city  = city::create([
            'country_id'=>$country_id,
            'name_ar'=>$city_name,
                ]);
                return response()->json(["success"=>'تم اضافه المدينه']);
    }else{
        return response()->json(["success"=>'  هذه المدينه موجوده بالفعل']);
        
    }

    // dd($get_city);
     
}

}

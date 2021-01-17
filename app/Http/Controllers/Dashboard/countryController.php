<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class countryController extends Controller
{
    
public function index(Request $request){

    $country =  Country::get() ;

    // $country_id  =  $country->id;
    // $countryname  =  $country->name_ar;
    // echo "<pre>"; dd($country); echo"</pre>";
    return response()->json(['country'=>$country]);
    
}

public function show(Request $request){

    $country =  Country::get() ;

    // $country_id  =  $country->id;
    // $countryname  =  $country->name_ar;
    // echo "<pre>"; dd($country); echo"</pre>";
    return view("admin.countryandcity.index", ['country'=>$country]);
    
}

public function create(Request $request){

    // $name_ar = $request->name_ar;

    // $country =  country::create(['name'=>$name_ar]) ;


    // $country_id  =  $country->id;
    // $countryname  =  $country->name_ar;
    // echo "<pre>"; dd($country); echo"</pre>";
    return view("admin.countryandcity.create");
    
}
public function store(Request $request){
    // dd($request->all());
    $name_ar = $request->name_ar;

    $country =  country::create(['name_ar'=>$name_ar]) ;

    return back()->with('success','تم اضافة الدولة!');
    // $country_id  =  $country->id;
    // $countryname  =  $country->name_ar;
    // echo "<pre>"; dd($country); echo"</pre>";
    
}

public function edit($id){

    $country = Country::find($id);
    // dd($country);
    return view("admin.countryandcity.edit",['country'=>$country]);

}

public function update(Request $request){

    $countryname = $request->name_ar;
    $id= $request->id;
    $country = Country::find($id);

    $country->name_ar=$countryname;
    $country->save();
    return back()->with('success','تم تعديل  الدولة!');

}

public function delete($id){

    $country = Country::find($id);
    $country->delete();
    // dd($country);
    return redirect("/dashboard/getcountries");

}



}

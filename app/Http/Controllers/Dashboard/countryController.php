<?php

namespace App\Http\Controllers\Dashboard;
use App\country;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class countryController extends Controller
{
    
public function index(Request $request){

    $country =  country::get() ;

    // $country_id  =  $country->id;
    // $countryname  =  $country->name_ar;
    // echo "<pre>"; dd($country); echo"</pre>";
    return response()->json(['country'=>$country]);
    
}

public function show(Request $request){

    $country =  country::get() ;

    // $country_id  =  $country->id;
    // $countryname  =  $country->name_ar;
    // echo "<pre>"; dd($country); echo"</pre>";
    return view("admin.countryandcity.index", ['country'=>$country]);
    
}



}

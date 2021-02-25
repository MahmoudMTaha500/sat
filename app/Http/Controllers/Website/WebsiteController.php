<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class WebsiteController extends Controller
{
    public function home_page()
    {
        $useVue = true;
        $countries = Country::get(['name_ar as name' , 'id']);
        return view('website.home_page' , compact('countries' , 'useVue'));
    }
}

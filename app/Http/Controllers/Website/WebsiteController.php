<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Course;
use App\Models\StudentSuccessStory;
use App\Models\Blog;
use App\Models\Partner;


class WebsiteController extends Controller
{
    public function home_page()
    {
        $useVue = true;
        $best_offers = Course::orderBy('discount' , 'DESC')->take(10)->get();
        $success_stories = StudentSuccessStory::inRandomOrder()->take(10)->get();
        $two_blogs = Blog::inRandomOrder()->take(2)->get();
        $blogs = Blog::inRandomOrder()->take(8)->get();
        $partners = Partner::inRandomOrder()->take(8)->get();
        return view('website.home' , compact(
                                                'useVue', 
                                                'best_offers', 
                                                'success_stories',
                                                'two_blogs',
                                                'blogs',
                                                'partners',
                                            ));
    }

    public function institutes_page()
    {
        $useVue = true;
        return view('website.institutes' , compact(
                                                'useVue'
                                            ));
    }
}

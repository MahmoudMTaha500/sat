<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\InstituteQuestion;

use function GuzzleHttp\Promise\inspect;

class InstituteController extends Controller
{

    public function index()
    {

        return view('admin.institutes.index');
        
    }


    public function create(Request $request)
    {
        $department_name='institutes';
        $page_name='add-institute';
        $countries = Country::all();
        return view('admin.institutes.create' , compact('department_name' , 'page_name' , 'countries'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
      $institute =  Institute::create([
            "name_ar"=>$request->name_ar,  
            "about_ar"=>$request->about_ar,  
            "country_id"=>$request->country_id,  
            "city_id"=>$request->city_id,  
          
  
          ]);
  
          $institute_id = $institute->id;
          $questions = $request->questionList;

           foreach($questions as $question){
            //    dump( $question['questions']);
            InstituteQuestion::create([
                   'institute_id'=>  $institute_id,
                   'question'=>  $question['questions'],
                   'answer'=>  $question['answer'],
               ]);
           }
           return back()->with('success','تم اضافة المعهد '); 
           
    }


    public function show(Institute $institute)
    {
        //
    }


    public function edit(Institute $institute)
    {
        //
    }

    public function update(Request $request, Institute $institute)
    {
        //
    }

 
    public function destroy(Institute $institute)
    {
        //
    }
}

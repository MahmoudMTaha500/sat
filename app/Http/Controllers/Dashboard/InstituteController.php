<?php

namespace App\Http\Controllers\Dashboard;
use App\city;
use App\country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\institute;
use App\institute_questions;

use function GuzzleHttp\Promise\inspect;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.institutes.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

        return view('admin.institutes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
      $institute =  institute::create([
            "name_ar"=>$request->name_ar,  
            "about_ar"=>$request->about_ar,  
            "country_id"=>$request->country_id,  
            "city_id"=>$request->city_id,  
          
  
          ]);
  
          $institute_id = $institute->id;
          $questions = $request->questionList;

           foreach($questions as $question){
            //    dump( $question['questions']);
               institute_questions::create([
                   'institute_id'=>  $institute_id,
                   'question'=>  $question['questions'],
                   'answer'=>  $question['answer'],
               ]);
           }
           return back()->with('success','تم اضافة المعهد '); 
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function show(institute $institute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function edit(institute $institute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, institute $institute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function destroy(institute $institute)
    {
        //
    }
}

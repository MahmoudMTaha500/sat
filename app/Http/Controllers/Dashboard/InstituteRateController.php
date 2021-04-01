<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\InstituteRate;
use Illuminate\Http\Request;

class InstituteRateController extends Controller
{
    public function index()
    {
    $rates  = InstituteRate::with('institute','student')->get();
          
    $department_name = 'institutes';
    $page_name = 'rate';
    $page_title = 'التقيمات';
    $useVue = true;
    return  view("admin.institutes.rates.index", compact( 'useVue','rates','department_name','page_name'));
    
}

   public function getrates(){
    $rates  = InstituteRate::with('institute','student')->get();

    return response()->json(['rates'=>$rates]);

   }


public function updaterate(Request $request){
// dd($request->all());
$rate = InstituteRate::find($request->rate_id);
$rate->rate = $request->rate;
$rate->save();
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstituteRate  $instituteRate
     * @return \Illuminate\Http\Response
     */
    public function show(InstituteRate $instituteRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstituteRate  $instituteRate
     * @return \Illuminate\Http\Response
     */
    public function edit(InstituteRate $instituteRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InstituteRate  $instituteRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstituteRate $instituteRate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstituteRate  $instituteRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstituteRate $instituteRate)
    {
        //
    }
}

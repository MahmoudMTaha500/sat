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

   public function getrates(Request $request){
       if($request->has('approvement')){
           if($request->approvement == '1'){
                $rates  = InstituteRate::with('institute','student')->where('approvement' , 1)->paginate(10);
            }
            elseif($request->approvement == '0'){
               $rates  = InstituteRate::with('institute','student')->where('approvement' , 0)->paginate(10);
            }
            else{
                $rates  = InstituteRate::with('institute','student')->paginate(10);
            }
       }else{
            $rates  = InstituteRate::with('institute','student')->paginate(10);
       }
   

    return response()->json(['rates'=>$rates]);

   }


    public function updaterate(Request $request){

        $request->id;
        $data = [];
        if($request->approvement == true){
            $data['approvement'] = 1;
        }else{
            $data['approvement'] = 0;
        }
        $data['review'] = $request->review;
        InstituteRate::where('id' , $request->id)->update($data);
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
    public function destroy(InstituteRate $instituteRate , Request $request)
    {
        InstituteRate::find($request->rate_id)->delete();
    }
}

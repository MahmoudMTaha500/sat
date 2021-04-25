<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SempleVisa;
use Illuminate\Http\Request;

class SimpleVisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department_name = 'visa';
        $page_name = 'visa';
        $page_title = 'الفيزا';
        $useVue = true;

        $visas= SempleVisa::paginate(10);
        return view('admin.visas.simple_visa' , compact('department_name','page_name','page_title','useVue'));
    }

    public function get_simple_visa(){
        $visas= SempleVisa::paginate(10);
        return response()->json(['visas'=>$visas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department_name = 'visa';
        $page_name = 'create-visa';
        $page_title = 'الفيزا';
        return view('admin.visas.create_simple_visa' , compact('department_name','page_name','page_title'));

    }

    /**************************************************************************************************************** */
        public function update_status(Request $request){
        // dd($request->all());
        if($request->type == 'price'){
        $visa = SempleVisa::find($request->visa_id);
        $visa->price_status = $request->status;
        //   dd($visa);
        $visa->save();
        }
        if($request->type == 'document'){
        $visa = SempleVisa::find($request->visa_id);
        $visa->document_status = $request->status;
        $visa->save();

        }
        if($request->type == 'request'){
        $visa = SempleVisa::find($request->visa_id);
        $visa->request_status = $request->status;
        $visa->save();

        }

        }
    /**************************************************************************************************************** */

    public function filter(Request $request)
    {
        // dd($request->all());

        $price_status = $request->price_status;
        $document_status = $request->document_status;
        $request_status = $request->request_status;
        $name_ar = $request->name_ar;
        $visa = new SempleVisa;

        if ($price_status != '') {
          
            $visa = $visa->where("price_status", $price_status);
        }
        if ($document_status != '') {
          
            $visa = $visa->where("document_status", $document_status);
        }
        if ($request_status != '') {
          
            $visa = $visa->where("request_status", $request_status);
        }

        if ($request->name_ar != '') {
            $visa = $visa->where('title_ar', 'LIKE', '%' . $request->name_ar . '%');
        }
        $visa = $visa->paginate(10);
        return response()->json(['visas'=>$visa]);
    }


    /**************************************************************************************************************** */


    public function update_note(Request $request){
    // dd($request->all());
    $visa = SempleVisa::find($request->visa_note_id);
    $visa->note = $request->note;
    //   dd($visa);
    $visa->save();
    return "success";
    

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
     * @param  \App\SimpleVisa  $simpleVisa
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SimpleVisa  $simpleVisa
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpleVisa $simpleVisa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SimpleVisa  $simpleVisa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpleVisa $simpleVisa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SimpleVisa  $simpleVisa
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpleVisa $simpleVisa)
    {
        //
    }
}

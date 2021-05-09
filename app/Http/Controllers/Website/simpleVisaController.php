<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SempleVisa;
class simpleVisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('website.visa.simple_visa');
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|max:255|unique:students,email',
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'visatype' => ['required'],
            'notes' => ['required'],
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'يجب الا يتجاوز الاسم ال 255 حرف',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'برجاء ادخال بريد إلكتروني صحيح',
            'email.max' => 'يجب الا يتجاوز البريد الإلكتروني ال 255 حرف',
            'email.unique' => 'هذا البريد الإلكتروني موجود بالفعل',
            'phone.required' => 'رقم الجوال مطلوب',
            'phone.max' => 'يجب الا يتجاوز رقم الجوال 255 حرف',
            'country.required' => 'الدولة مطلوبة',
            'notes.required' => ' الملاحظات مطلوبه',
        ]);
   
        SempleVisa::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'visa_type'=>$request->visatype,
            'price'=>$request->price,
            'note'=>$request->notes,
            'price_status'=>'لم يتم الدفع',
            'document_status'=>'لم يتم الارسال',
            'request_status'=>'جديد',
            
            ]);
            session()->flash('alert_message', ' تم ارسال بياناتك بنجاح و سنقوم بالتواصل معك قريبا');
            return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

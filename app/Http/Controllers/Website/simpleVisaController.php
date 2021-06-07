<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SempleVisa;
class simpleVisaController extends Controller
{

    public function index()
    {
        //
    }
    public function create()
    {

      return view('website.visa.simple_visa');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|max:255|unique:students,email',
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'visatype' => ['required'],
            'payment_method' => ['required'],
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
            'payment_method.required' => ' برجاء اختيار وسيلة الدفع المناسبة لك',
        ]);

        $data = [
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
                'payment_method'=>$request->payment_method,
        ];
        $visa = SempleVisa::create($data);
        if($request->payment_method == 'online'){
            session()->flash('alert_message', ' تم ارسال بياناتك بنجاح , يرجى استكمال الدفع الالكتروني');
            session()->flash('visa_id', $visa->id);
            return redirect()->back();
        }else{
            session()->flash('alert_message', ' تم ارسال بياناتك بنجاح و سنقوم بالتواصل معك قريبا');
            return redirect()->back();
        }
            


    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        SempleVisa::find($id)->delete();
        session()->flash("alert_message", ['message' => "تم حذف طلب التاشيرة بنجاح", 'icon' => 'success']);
        return back();
    }

    public function order_visa_checkout(Request $request)
    {
        $visa = SempleVisa::find($request->visa_id);

        $charge_data = [
            "amount"=> $visa->price ,
            "currency"=>"SAR",
            "customer"=>[
                "first_name"=>$visa->name,
                "email"=>$visa->email,
                "phone"=>[
                        "country_code"=>"965",
                        "number"=>$visa->phone,
                    ]
                ],
            "source"=>["id"=>$request->token_id],
            "redirect" => [
                "url" => "http://your_website.com/redirect_url"
                ]
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.tap.company/v2/charges",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($charge_data),
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer sk_test_GMqKXx6FZoambuvwASV8r4yp",
            "content-type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return  "cURL Error #:" . $err;
        }

       
        session()->flash('alert_message', ' تم دفع المبلغ بنجاح و سوف نقوم بالتواصل معكم قريبا');
        return redirect()->back();
    }


}

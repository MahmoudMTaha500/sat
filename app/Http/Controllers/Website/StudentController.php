<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentRequest;


class StudentController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function student_upload_payment_bill(Request $request , $request_id)
    {
        $validated = $request->validate([
            'payment_bill_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,docx,xlsx|max:5120',
        ],
        [
            'payment_bill_file.required' => 'برجاء رفع فاتورة حوالتك للاستمرار',
            'payment_bill_file.mimes' => 'يجب ان يكون الملف المرفوع بالصيغ الاتية (jpeg,png,jpg,gif,svg,pdf,docx,xlsx)',
            'payment_bill_file.max' => 'يجب الا يتجاوز حجم الملف 5 ميجا بايت',
        ]);

        $student_request = StudentRequest::where('id' , $request_id)->get()[0];
        if(!empty($student_request->getFirstMedia('student_request_payment_bill_file'))){
            $student_request->getFirstMedia('student_request_payment_bill_file')->delete();
        }
        $student_request->addMediaFromRequest('payment_bill_file')->toMediaCollection('student_request_payment_bill_file');
        return redirect()->route('payment_confirmation' , ['request_id' => $request_id , 'student_id' => $student_request->student_id]);
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
        //
    }
}

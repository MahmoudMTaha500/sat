<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoursesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name_ar' => 'required',
            'institute_id' => 'required',
            'desc' => 'required',
            'coures_price' => array(
                "num_of_weeks"=>"required",
                "preice_per_week"=>"required"
            ),

           
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required' => 'اسم الدورة مطلوب',
            'institute_id.required' => '  المعهد مطلوب',
            'desc.required' => ' وصف الدورة مطلوب',
            'coures_price.required' => ' سعر الدورة مطلوب',
            // 'coures_price.numeric' => ' سعر الدورة يجب ان يكون رقم ',
        ];
    }
}

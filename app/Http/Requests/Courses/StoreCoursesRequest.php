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
            'min_age' => 'required',
            'study_period' => 'required',
            'lessons_per_week' => 'required',
            'desc' => 'required',
            'required_level' => 'required',
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
            'min_age.required' => '   الحد الادني للعمر مطلوب  ',
            'study_period.required' => ' وقت الدورة مطلوب',
            'lessons_per_week.required' => '  درس كل اسبوع مطلوب',
            'desc.required' => ' وصف الدورة مطلوب',
            'required_level.required' => ' المستوي مطلوب',
            'coures_price.required' => ' سعر الدورة مطلوب',
            // 'coures_price.numeric' => ' سعر الدورة يجب ان يكون رقم ',
        ];
    }
}

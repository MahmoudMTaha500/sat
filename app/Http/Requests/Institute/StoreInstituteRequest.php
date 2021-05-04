<?php

namespace App\Http\Requests\Institute;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstituteRequest extends FormRequest
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
            'map' => 'required',
            'about_ar' => 'required',
            'institute_questions' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'panner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    
    public function messages()
    {
        return [
            'name_ar.required' => 'اسم المعهد مطلوب',
            'map.required' => '  موقع المعهد مطلوب ',
            'about_ar.required' => 'برجاء ادخال نبذة مختصرة عن المعهد',
            'institute_questions.required' => 'برجاء ادخال اسئله المعهد  ',
            'country_id.required' => 'برجاء تحديد الدولة',
            'city_id.required' => 'برجاء تحديد المدينة',
            'logo.required' => 'لوجو المعهد مطلوب',
            'logo.image' => 'لوجو المعهد يجب ان يكون صورة',
            'logo.mimes' => 'لوجو المعهد يجب ان يكون بالصيغ الاتية (jpeg , png , jpg , gif , svg)',
            'panner.required' => 'صورة المعهد مطلوبة',
            'panner.image' => 'صورة المعهد يجب ان يكون صورة',
            'panner.mimes' => 'صورة المعهد يجب ان يكون بالصيغ الاتية (jpeg , png , jpg , gif , svg)',
        ];
    }
}

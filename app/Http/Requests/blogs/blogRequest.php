<?php

namespace App\Http\Requests\blogs;

use Illuminate\Foundation\Http\FormRequest;

class blogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
<<<<<<< HEAD
            'title_ar'=>'required',
            'content_ar'=>'required',
            // 'category_id'=>'required',
            // 'country_id'=>'required',
            // 'city_id'=>'required',
            // 'institute_id'=>'required',
=======
            'title_ar' => 'required',
            'content_ar' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'institute_id' => 'required',
>>>>>>> 50658f85d8460d53c376139464b81d3ca4150f0f
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ];
    }
    public function messages()
    {
        return [
<<<<<<< HEAD
            'title_ar.required'=>" عنوان المقال مطلوب",
            'content_ar.required'=>"محتوي المقال مطلوب",
            // 'category_id.required'=>"تصنيف المقال مطلوب",
            // 'country_id.required'=>" الدوله مطلوب",
            // 'city_id.required'=>"المدينه مطلوبه",
            // 'institute_id.required'=>"المعهد مطلوب",
=======
            'title_ar.required' => " عنوان المقال مطلوب",
            'content_ar.required' => "محتوي المقال مطلوب",
            'category_id.required' => "تصنيف المقال مطلوب",
            'country_id.required' => " الدوله مطلوب",
            'city_id.required' => "المدينه مطلوبه",
            'institute_id.required' => "المعهد مطلوب",
>>>>>>> 50658f85d8460d53c376139464b81d3ca4150f0f
            'banner.required' => 'صورة المقال مطلوبة',
            'banner.image' => 'صورة المقال يجب ان يكون صورة',
            'banner.mimes' => 'صورة المقال يجب ان يكون بالصيغ الاتية (jpeg , png , jpg , gif , svg)',
        ];
    }
}

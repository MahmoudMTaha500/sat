<?php

namespace App\Http\Requests\blogs;

use Illuminate\Foundation\Http\FormRequest;

class blogEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_ar'=>'required',
            'content_ar'=>'required',
            'category_id'=>'required',
            'country_id'=>'required',
            'city_id'=>'required',
            'institute_id'=>'required',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ];
    }

    public function messages()
    {
        return [
            'title_ar.required'=>" عنوان المقال مطلوب",
            'content_ar.required'=>"محتوي المقال مطلوب",
            'category_id.required'=>"تصنيف المقال مطلوب",
            'country_id.required'=>" الدوله مطلوب",
            'city_id.required'=>"المدينه مطلوبه",
            'institute_id.required'=>"المعهد مطلوب",
            'banner.image' => 'صورة المقال يجب ان يكون صورة',
            'banner.mimes' => 'صورة المقال يجب ان يكون بالصيغ الاتية (jpeg , png , jpg , gif , svg)',
      

        ];
    }
}

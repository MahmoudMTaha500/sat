<?php

namespace App\Http\Requests\blogs;

use Illuminate\Foundation\Http\FormRequest;

class blogEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title_ar' => 'required',
            'content_ar' => 'required',
            'category_id' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ];
    }
    public function messages()
    {
        return [
            'title_ar.required' => " عنوان المقال مطلوب",
            'content_ar.required' => "محتوي المقال مطلوب",
            'category_id.required' => "تصنيف المقال مطلوب",
            'banner.image' => 'صورة المقال يجب ان يكون صورة',
            'banner.mimes' => 'صورة المقال يجب ان يكون بالصيغ الاتية (jpeg , png , jpg , gif , svg)',

        ];
    }
}

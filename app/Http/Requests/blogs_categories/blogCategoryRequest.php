<?php

namespace App\Http\Requests\blogs_categories;

use Illuminate\Foundation\Http\FormRequest;

class blogCategoryRequest extends FormRequest
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
            "name_ar"=>"required"
        ];
    }

    public function messages()
    {
        return [
            "name_ar.required"=>"يرجي ادخل اسم التصنيف"
            
        ];
    }
}

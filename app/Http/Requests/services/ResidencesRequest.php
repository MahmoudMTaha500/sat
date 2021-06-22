<?php

namespace App\Http\Requests\services;

use Illuminate\Foundation\Http\FormRequest;

class ResidencesRequest extends FormRequest
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
            "name_ar"=>'required',
            "institute_id"=>'required',
            "price"=>'required',
        ];
    }


    public function messages()
    {
        return[
            "name_ar.required"=>'اسم السكن مطلوب',
            "institute_id.required"=>'المعهد  مطلوب',
            "price.required"=>' السعر مطلوب',

        ];
    }
}

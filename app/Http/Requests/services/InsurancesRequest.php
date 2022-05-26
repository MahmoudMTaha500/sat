<?php

namespace App\Http\Requests\services;

use Illuminate\Foundation\Http\FormRequest;

class InsurancesRequest extends FormRequest
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
            "institute_id"=>'required|unique:insurances,institute_id,' . app('request')->id,
            "price"=>'required',
        ];
    }


    public function messages()
    {
        return[
            "institute_id.required"=>'المعهد  مطلوب',
            "institute_id.unique"=>'تم اضافة تامين لهذا المعهد من قبل',
            "price.required"=>' السعر مطلوب',
        ];
    }
}

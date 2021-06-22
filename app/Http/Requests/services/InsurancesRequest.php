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
            "weeks"=>'required',
            "institute_id"=>'required',
            "price"=>'required',
        ];
    }


    public function messages()
    {
        return[
            "weeks.required"=>'عدد الاسابيع مطلوب',
            "institute_id.required"=>'المعهد  مطلوب',
            "price.required"=>' السعر مطلوب',

        ];
    }
}

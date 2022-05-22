<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>" اسم الموظف مطلوب",
          'email.required'=>"البريد الإلكتروني مطلوب",
          'password.required'=>"كلمه المرور مطلوبه",

        ];
    }
}

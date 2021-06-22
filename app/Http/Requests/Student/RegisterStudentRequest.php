<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'nationality' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => trans('website_lang.your name'),
            'nationality' => trans('website_lang.nationality'),
        ];
    }

    public function messages()
    {
        return [
            'name.max' => trans('website_lang.your name must not exceed 255 letter'),       
            'email.max' => trans('website_lang.your email must not exceed 255 letter'),       
        ];
    }
}

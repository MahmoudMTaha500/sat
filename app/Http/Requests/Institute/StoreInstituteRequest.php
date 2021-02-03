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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'panner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    
    public function messages()
    {
        return [
            'name_ar.required' => 'اسم المعهد مطلوب',
            'logo.required' => 'لوجو المعهد مطلوب',
            'logo.image' => 'لوجو المعهد يجب ان يكون صورة',
            'logo.mimes' => 'لوجو المعهد يجب ان يكون بالصيغ الاتية (jpeg , png , jpg , gif , svg)',
            'panner.required' => 'صورة المعهد مطلوبة',
            'panner.image' => 'صورة المعهد يجب ان يكون صورة',
            'panner.mimes' => 'صورة المعهد يجب ان يكون بالصيغ الاتية (jpeg , png , jpg , gif , svg)',
        ];
    }
}

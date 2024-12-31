<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSections extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'name_en' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
        ];
    }
}
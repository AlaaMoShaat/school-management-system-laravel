<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotions extends FormRequest
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
            'academic_year' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'academic_year_new' => 'required',
            'grade_id_new' => 'required',
            'classroom_id_new' => 'required',
            'section_id_new' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'academic_year.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'academic_year_new.required' => trans('validation.required'),
            'grade_id_new.required' => trans('validation.required'),
            'classroom_id_new.required' => trans('validation.required'),
            'section_id_new.required' => trans('validation.required'),
        ];
    }
}

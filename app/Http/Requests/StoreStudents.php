<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudents extends FormRequest
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
            'Name_ar' => 'required',
            'Name_en' => 'required',
            'email' => 'required|unique:students,email,'.$this->id,
            'password' => 'required',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'blood_id' => 'required',
            'religion_id' => 'required',
            'date_birth' => 'required|date|date_format:Y-m-d',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'Name_ar.required' => trans('validation.required'),
            'Name_en.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'nationality_id.required' => trans('validation.required'),
            'blood_id.required' => trans('validation.required'),
            'religion_id.required' => trans('validation.required'),
            'date_birth.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'parent_id.required' => trans('validation.required'),
            'academic_year.required' => trans('validation.required'),
        ];
    }
}
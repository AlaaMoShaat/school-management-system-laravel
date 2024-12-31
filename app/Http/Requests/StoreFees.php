<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFees extends FormRequest
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
            'amount' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'type_id' => 'required',
            'year' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'amount.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'type_id.required' => trans('validation.required'),
            'year.required' => trans('validation.required'),
        ];
    }
}
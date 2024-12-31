<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassrooms extends FormRequest
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
            'List_Classes.*.name' => 'required|unique:classrooms,name->ar,'.$this->id,
            'List_Classes.*.name_en' => 'required|unique:classrooms,name->en,'.$this->id,
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name_en.unique' => trans('validation.unique'),
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctor extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required||unique:doctors,email,'.$id.',id,deleted_at,NULL',
            'phone' => 'required||unique:doctors',
            'gender' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name of Article is required'),
            'subject.required' => __('Subject of Article is required'),

        ];
    }
    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'name' => 'trim|lowercase',
            'description' => 'trim|capitalize|escape'
        ];
    }
}

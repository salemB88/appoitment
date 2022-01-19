<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartment extends FormRequest
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
            'name' => 'required',
            'description' => 'required||min:5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name of Department is required'),
            'description.required' => __('description of Department is required'),

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

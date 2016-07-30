<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReportDateRequest extends Request
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
            'petsa' => 'required|integer|min:1900|max:2999|unique:report_dates',
            'user_id' => 'exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'petsa.required' => 'Please enter a reporting schedule.',
            'petsa.unique' => 'The reporting schedule already exist.',
            'petsa.integer' => 'The reporting schedule must be integer.',
            'petsa.min' => 'The reporting schedule must be at least 1900.',
            'petsa.max' => 'The reporting schedule may not be greater than 2999.'
        ];
    }
}

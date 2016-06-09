<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DropoutRequest extends Request
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
            'report_date_id'        => 'exists:report_dates,id',
            'institution_id'        => 'exists:institutions,id',
            'occupation_id'         => 'exists:occupations,id',
            'department'            => 'required|integer|min:0',
            'completed_level'       => 'required',
            'regular_male'          => 'required|integer|min:0',
            'regular_female'        => 'required|integer|min:0',
            'extension_male'        => 'required|integer|min:0',
            'extension_female'      => 'required|integer|min:0',
            'short_term_male'       => 'required|integer|min:0',
            'short_term_female'     => 'required|integer|min:0'
        ];
    }
}

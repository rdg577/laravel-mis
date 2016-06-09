<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndustryExtension4Request extends Request
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
            'subsector_id'          => 'exists:subsectors,id',
            'short_term_male'       => 'required|integer|min:0',
            'short_term_female'     => 'required|integer|min:0',
            'level1n2_male'         => 'required|integer|min:0',
            'level1n2_female'       => 'required|integer|min:0',
            'level3n4_male'         => 'required|integer|min:0',
            'level3n4_female'       => 'required|integer|min:0',
            'operator_male'         => 'required|integer|min:0',
            'operator_female'       => 'required|integer|min:0',
            'mse'                   => 'required|integer|min:0'
        ];
    }
}

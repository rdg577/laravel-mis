<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndustryExtension1Request extends Request
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
            'report_date_id'            => 'exists:report_dates,id',
            'institution_id'            => 'exists:institutions,id',
            'subsector_id'              => 'exists:subsectors,id',
            'identified_technologies'   => 'required|integer|min:0',
            'benchmarked_technologies'  => 'required|integer|min:0',
            'proper_documentation'      => 'required|integer|min:0',
            'prototype'                 => 'required|integer|min:0',
            'competent_entrepreneurs'   => 'required|integer|min:0',
            'transferred'               => 'required|integer|min:0',
            'capital'                   => 'required|integer|min:0'
        ];
    }
}

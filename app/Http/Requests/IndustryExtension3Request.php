<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndustryExtension3Request extends Request
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
            'report_date_id'    => 'required',
            'institution_id'    => 'required',
            'subsector_id'      => 'required|integer|min:1',
            'high_level'        => 'required|integer|min:0',
            'mid_level'         => 'required|integer|min:0',
            'low_level'         => 'required|integer|min:0'
        ];
    }
}

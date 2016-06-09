<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndustryExtension5Request extends Request
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
            'report_date_id'    => 'exists:report_dates,id',
            'institution_id'    => 'exists:institutions,id',
            'subsector_id'      => 'exists:subsectors,id',
            'micro'             => 'required|integer|min:0',
            'small'             => 'required|integer|min:0',
            'medium'            => 'required|integer|min:0',
            'ie_field'          => 'required',
            'level_c_male'      => 'required|integer|min:0',
            'level_c_female'    => 'required|integer|min:0',
            'level_b_male'      => 'required|integer|min:0',
            'level_b_female'    => 'required|integer|min:0',
            'level_a_male'      => 'required|integer|min:0',
            'level_a_female'    => 'required|integer|min:0',
        ];
    }
}

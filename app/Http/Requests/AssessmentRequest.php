<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AssessmentRequest extends Request
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
            'report_date_id'                => 'required',
            'institution_id'                => 'required',
            'occupation_id'                 => 'required|integer|min:1',
            'assessed_regular_male'         => 'required|integer|min:0',
            'assessed_regular_female'       => 'required|integer|min:0',
            'assessed_extension_male'       => 'required|integer|min:0',
            'assessed_extension_female'     => 'required|integer|min:0',
            'assessed_short_term_male'      => 'required|integer|min:0',
            'assessed_short_term_female'    => 'required|integer|min:0',
            'competent_regular_male'        => 'required|integer|min:0',
            'competent_regular_female'      => 'required|integer|min:0',
            'competent_extension_male'      => 'required|integer|min:0',
            'competent_extension_female'    => 'required|integer|min:0',
            'competent_short_term_male'     => 'required|integer|min:0',
            'competent_short_term_female'   => 'required|integer|min:0'
        ];
    }
}

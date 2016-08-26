<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DropoutShortTermTraineeRequest extends Request
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
            'report_date_id'            => 'required|exists:report_dates,id',
            'institution_id'            => 'required|exists:institutions,id',
            'occupation_id'             => 'required|exists:occupations,id',
            'regular_level1_male'       => 'required|integer|min:0',
            'regular_level1_female'     => 'required|integer|min:0',
            'regular_level2_male'       => 'required|integer|min:0',
            'regular_level2_female'     => 'required|integer|min:0',
            'regular_level3_male'       => 'required|integer|min:0',
            'regular_level3_female'     => 'required|integer|min:0',
            'regular_level4_male'       => 'required|integer|min:0',
            'regular_level4_female'     => 'required|integer|min:0',
            'regular_level5_male'       => 'required|integer|min:0',
            'regular_level5_female'     => 'required|integer|min:0',
            'extension_level1_male'     => 'required|integer|min:0',
            'extension_level1_female'   => 'required|integer|min:0',
            'extension_level2_male'     => 'required|integer|min:0',
            'extension_level2_female'   => 'required|integer|min:0',
            'extension_level3_male'     => 'required|integer|min:0',
            'extension_level3_female'   => 'required|integer|min:0',
            'extension_level4_male'     => 'required|integer|min:0',
            'extension_level4_female'   => 'required|integer|min:0',
            'extension_level5_male'     => 'required|integer|min:0',
            'extension_level5_female'   => 'required|integer|min:0'
        ];
    }
}

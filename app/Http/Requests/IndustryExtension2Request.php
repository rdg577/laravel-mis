<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndustryExtension2Request extends Request
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
            'report_date_id'                            => 'required',
            'institution_id'                            => 'required',
            'occupation_id'                             => 'required',
            'starter_enterprise'                        => 'required|integer|min:0',
            'starter_mse_operator_male'                 => 'required|integer|min:0',
            'starter_mse_operator_female'               => 'required|integer|min:0',
            'starter_mse_operator_supported_male'       => 'required|integer|min:0',
            'starter_mse_operator_supported_female'     => 'required|integer|min:0',
            'advance_enterprise'                        => 'required|integer|min:0',
            'advance_mse_operator_male'                 => 'required|integer|min:0',
            'advance_mse_operator_female'               => 'required|integer|min:0',
            'advance_mse_operator_supported_male'       => 'required|integer|min:0',
            'advance_mse_operator_supported_female'     => 'required|integer|min:0',
            'competent_enterprise'                      => 'required|integer|min:0',
            'competent_mse_operator_male'               => 'required|integer|min:0',
            'competent_mse_operator_female'             => 'required|integer|min:0',
            'competent_mse_operator_supported_male'     => 'required|integer|min:0',
            'competent_mse_operator_supported_female'   => 'required|integer|min:0'
        ];
    }
}

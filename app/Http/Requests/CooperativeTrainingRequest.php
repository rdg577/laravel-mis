<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CooperativeTrainingRequest extends Request
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
            'occupation_id'     => 'required',
            'mse_list'          => 'required|integer|min:0',
            'mse_mou'           => 'required|integer|min:0',
            'mse_joint_plan'    => 'required|integer|min:0',
            'mse_training'      => 'required|integer|min:0',
            'mse_trainers'      => 'required|integer|min:0',
            'ml_list'           => 'required|integer|min:0',
            'ml_mou'            => 'required|integer|min:0',
            'ml_joint_plan'     => 'required|integer|min:0',
            'ml_training'       => 'required|integer|min:0',
            'ml_trainers'       => 'required|integer|min:0'
        ];
    }
}

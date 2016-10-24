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
            'report_date_id'    => 'exists:report_dates,id',
            'institution_id'    => 'exists:institutions,id',
            'occupation_id'     => 'exists:occupations,id',
            'mse_list'          => 'required',
            'mse_mou'           => 'required|boolean',
            'mse_joint_plan'    => 'required|boolean',
            'mse_training'      => 'required|boolean',
            'mse_trainers'      => 'required|boolean',
            'ml_list'           => 'required',
            'ml_mou'            => 'required|boolean',
            'ml_joint_plan'     => 'required|boolean',
            'ml_training'       => 'required|boolean',
            'ml_trainers'       => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'mse_list.required' => 'The name of MSEs is required.',
            'ml_list.required' => 'The name of MLEs is required.'
        ];
    }
}

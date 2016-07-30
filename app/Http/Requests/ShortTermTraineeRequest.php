<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShortTermTraineeRequest extends Request
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
            'report_date_id'                => 'required|exists:report_dates,id',
            'institution_id'                => 'required|exists:institutions,id',
            'occupation_id'                 => 'required|exists:occupations,id',
            'registered_male'               => 'required|integer|min:0',
            'registered_female'             => 'required|integer|min:0',
            'started_training_male'         => 'required|integer|min:0',
            'started_training_female'       => 'required|integer|min:0',
            'completed_training_male'       => 'required|integer|min:0',
            'completed_training_female'     => 'required|integer|min:0',
            'sent_assessment_male'          => 'required|integer|min:0',
            'sent_assessment_female'        => 'required|integer|min:0',
            'assessed_male'                 => 'required|integer|min:0',
            'assessed_female'               => 'required|integer|min:0',
            'competent_male'                => 'required|integer|min:0',
            'competent_female'              => 'required|integer|min:0'
        ];
    }
}

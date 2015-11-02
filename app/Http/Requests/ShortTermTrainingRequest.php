<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShortTermTrainingRequest extends Request
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
            'report_date_id'            => 'required',
            'institution_id'            => 'required',
            'occupation_id'             => 'required',
            'course_started'            => 'required|date|before:today',
            'course_ended'              => 'required|date|after:course_started',
            'below17_male'              => 'required|integer|min:0',
            'below17_female'            => 'required|integer|min:0',
            'from17to19_male'           => 'required|integer|min:0',
            'from17to19_female'         => 'required|integer|min:0',
            'above19_male'              => 'required|integer|min:0',
            'above19_female'            => 'required|integer|min:0',
            'no_education_male'         => 'required|integer|min:0',
            'no_education_female'       => 'required|integer|min:0',
            'elementary_male'           => 'required|integer|min:0',
            'elementary_female'         => 'required|integer|min:0',
            'high_school_male'          => 'required|integer|min:0',
            'high_school_female'        => 'required|integer|min:0',
            'preparatory_male'          => 'required|integer|min:0',
            'preparatory_female'        => 'required|integer|min:0',
            'higher_education_male'     => 'required|integer|min:0',
            'higher_education_female'   => 'required|integer|min:0',
            'mental_male'               => 'required|integer|min:0',
            'mental_female'             => 'required|integer|min:0',
            'visual_male'               => 'required|integer|min:0',
            'visual_female'             => 'required|integer|min:0',
            'hearing_male'              => 'required|integer|min:0',
            'hearing_female'            => 'required|integer|min:0',
            'physical_male'             => 'required|integer|min:0',
            'physical_female'           => 'required|integer|min:0',
            'cooperative'               => 'required|integer|min:0',
            'non_cooperative'           => 'required|integer|min:0'
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormalTrainingRequest extends Request
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
            'occupation_id'             => 'required|integer|min:1',
            'course_started'            => 'required|date|before:today',
            'course_ended'              => 'required|date|after:course_started',
            'below17_male'              => 'required|integer|min:0',
            'below17_female'            => 'required|integer|min:0',
            'from17to19_male'           => 'required|integer|min:0',
            'from17to19_female'         => 'required|integer|min:0',
            'above19_male'              => 'required|integer|min:0',
            'above19_female'            => 'required|integer|min:0',
            'regular_male'              => 'required|integer|min:0',
            'regular_female'            => 'required|integer|min:0',
            'extension_male'            => 'required|integer|min:0',
            'extension_female'          => 'required|integer|min:0',
            'from_grade10_male'         => 'required|integer|min:0',
            'from_grade10_female'       => 'required|integer|min:0',
            'from_grade11_male'         => 'required|integer|min:0',
            'from_grade11_female'       => 'required|integer|min:0',
            'from_grade12_male'         => 'required|integer|min:0',
            'from_grade12_female'       => 'required|integer|min:0',
            'beyond_grade12_male'       => 'required|integer|min:0',
            'beyond_grade12_female'     => 'required|integer|min:0',
            'mental_male'               => 'required|integer|min:0',
            'mental_female'             => 'required|integer|min:0',
            'visual_male'               => 'required|integer|min:0',
            'visual_female'             => 'required|integer|min:0',
            'hearing_male'              => 'required|integer|min:0',
            'hearing_female'            => 'required|integer|min:0',
            'physical_male'             => 'required|integer|min:0',
            'physical_female'           => 'required|integer|min:0',
            'cooperative_male'          => 'required|integer|min:0',
            'cooperative_female'        => 'required|integer|min:0',
            'noncooperative_male'       => 'required|integer|min:0',
            'noncooperative_female'     => 'required|integer|min:0'
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrainerRequest extends Request
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
            'report_date_id'        => 'required',
            'institution_id'        => 'required',
            'occupation_id'         => 'required',
            'full_time_male'        => 'required|integer|min:0',
            'full_time_female'      => 'required|integer|min:0',
            'part_time_male'        => 'required|integer|min:0',
            'part_time_female'      => 'required|integer|min:0',
            'ethiopian_male'        => 'required|integer|min:0',
            'ethiopian_female'      => 'required|integer|min:0',
            'non_ethiopian_male'    => 'required|integer|min:0',
            'non_ethiopian_female'  => 'required|integer|min:0',
            'core_male'             => 'required|integer|min:0',
            'core_female'           => 'required|integer|min:0',
            'took_tm_male'          => 'required|integer|min:0',
            'took_tm_female'        => 'required|integer|min:0'
        ];
    }
}

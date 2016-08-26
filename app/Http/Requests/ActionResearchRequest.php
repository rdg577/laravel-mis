<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActionResearchRequest extends Request
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
            'proposal'                  => 'required|integer|min:0',
            'completed'                 => 'required|integer|min:0'
        ];
    }
}

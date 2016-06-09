<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OccupationRequest extends Request
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
            'name' => 'required|min:6|max:255',
            'code' => 'required|max:50',
            'level' => 'required',
            'active' => 'boolean',
            'subsector_id' => 'exists:subsectors,id'
        ];
    }
}

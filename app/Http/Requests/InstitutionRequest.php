<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstitutionRequest extends Request
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
            'name'              => 'required|min:6|max:255',
            'year_establish'  => 'required',
            'status'            => 'required',
            'ownership'         => 'required',
            'urban_rural'       => 'required',
            'dean_name'         => 'required',
            'city'              => 'required',
            'woreda_zone'       => 'required',
            'region_id'         => 'required'
        ];
    }
}

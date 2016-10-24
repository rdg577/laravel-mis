<?php

namespace App\Http\Requests;

use App\ActionResearch;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Route;

class ActionResearchTitlesRequest extends Request
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
        $id = Route::input('id');
        // get action research record
        $action_research = ActionResearch::findOrFail($id);

        for($i = 1; $i <= $action_research->proposal; $i++)
        {
            $rules[sprintf('proposal.%d', $i)] = 'required';
        }

        for($i = 1; $i <= $action_research->completed; $i++)
        {
            $rules[sprintf('completed.%d', $i)] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        $id = Route::input('id');
        // get action research record
        $action_research = ActionResearch::findOrFail($id);

        for($i = 1; $i <= $action_research->proposal; $i++)
        {
            $messages[sprintf('proposal.%d.required', $i)] = sprintf('The action research proposed title # %d is required.', $i);
        }

        for($i = 1; $i <= $action_research->completed; $i++)
        {
            $messages[sprintf('completed.%d.required', $i)] = sprintf('The completed action research title # %d is required.', $i);
        }

        return $messages;
    }
}

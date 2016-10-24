<?php

namespace App\Http\Controllers\TVI;

use App\ActionResearch;
use App\ActionResearchTitle;
use App\Http\Requests\ActionResearchRequest;
use App\Http\Requests\ActionResearchTitlesRequest;
use App\ReportDate;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ActionResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->paginate(10);
        return view('tviadmin.action_researches.index', compact('report_dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $institution_id = $user->institution_id;
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('tviadmin.action_researches.create', compact('report_dates', 'institution_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionResearchRequest $request)
    {
        ActionResearch::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('action-research/' . $request->get('report_date_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $id, 'institution_id' => $user->institution->id);
        $action_researches = ActionResearch::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);

        return view('tviadmin.action_researches.index2', array('action_researches' => $action_researches,
            'report_date' => $report_date));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        $action_research = ActionResearch::findOrFail($id);

        return view('tviadmin.action_researches.edit', compact('action_research', 'report_dates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $action_research = ActionResearch::findOrFail($id);
        $action_research->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('action-research/' . $action_research->report_date->id);
    }

    public function addTitles($id)
    {
        $action_research = ActionResearch::findOrFail($id);

        return view('tviadmin.action_researches.titles', compact('action_research'));
    }

    public function saveTitles(ActionResearchTitlesRequest $request, $id)
    {
        $action_research = ActionResearch::findOrFail($id);

        try
        {

            foreach($request->get('proposal') as $title)
            {
                $title_entry = [
                    'action_research_id' => $action_research->id,
                    'title' => $title,
                    'type' => 'proposal'
                ];

                ActionResearchTitle::create($title_entry);
            }

            foreach($request->get('completed') as $title)
            {
                $title_entry = [
                    'action_research_id' => $action_research->id,
                    'title' => $title,
                    'type' => 'completed'
                ];

                ActionResearchTitle::create($title_entry);
            }

        } catch (\Exception $e)
        {
            $request->session()->flash('alert-warning', 'Encountered error(s) while save action research titles.');
            return redirect('/action-research/' . $action_research->report_date_id);
        }


        $request->session()->flash('alert-success', 'Saving action research titles is successful.');
        return redirect('/action-research/' . $action_research->report_date_id);
    }

    public function deleteTitles(Request $request, $id)
    {
        // get action research title
        $action_research_title = ActionResearchTitle::findOrFail($id);
        // get action research
        $action_research = $action_research_title->action_research;
        // check title type
        $is_proposal = $action_research_title->type == 'proposal' ? true:false;
        // delete action research title
        $action_research_title->delete();
        // update action research
        if($is_proposal)
        {
            $action_research->proposal = $action_research->proposal - 1;
            $action_research->update();
        }
        else
        {
            $action_research->completed = $action_research->completed - 1;
            $action_research->update();
        }

        $request->session()->flash('alert-success', 'Research title was removed successfully.');

        return redirect('/action-research/' . $action_research->id . '/edit');
    }

    public function delete($id)
    {
        $action_research = ActionResearch::findOrFail($id);
        return view('tviadmin.action_researches.delete', compact('action_research'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $action_research = ActionResearch::findOrFail($id);
        $report_id = $action_research->report_date->id;
        $action_research->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('action-research/' . $report_id);
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.action_researches.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $request->report_date_id_target, 'institution_id' => $user->institution->id);
        $target_report_id_exist = ActionResearch::where($criteria)->get();

        if(count($target_report_id_exist) > 0) {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save-as report operation failed. Target report already exists.');

            return redirect('action-research');
        }


        // retrieve all records as collection
        $records = ActionResearch::select(
            'report_date_id'            ,
            'institution_id'            ,
            'proposal'                  ,
            'completed'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            ActionResearch::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found.');
        }

        return redirect('action-research');
    }
}

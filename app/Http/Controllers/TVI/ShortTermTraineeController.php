<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\ShortTermTraineeRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\ShortTermTrainee;
use App\Subsector;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShortTermTraineeController extends Controller
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
        return view('tviadmin.short_term_trainees.index', compact('report_dates'));
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
        $sectors = Sector::all()->lists('name', 'id');

        return view('tviadmin.short_term_trainees.create', compact('report_dates', 'sectors', 'institution_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShortTermTraineeRequest $request)
    {
        ShortTermTrainee::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('short-term-trainees/' . $request->get('report_date_id'));
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
        $short_term_trainees = ShortTermTrainee::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);

        return view('tviadmin.short_term_trainees.index2', array('short_term_trainees' => $short_term_trainees,
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

        $short_term_trainee = ShortTermTrainee::findOrFail($id);

        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($short_term_trainee->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($short_term_trainee->occupation->id)->lists('name', 'id');

        return view('tviadmin.short_term_trainees.edit', compact('short_term_trainee', 'sectors', 'subsectors', 'occupations', 'report_dates'));
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
        $short_term_trainee = ShortTermTrainee::findOrFail($id);
        $short_term_trainee->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('short-term-trainees/' . $short_term_trainee->report_date->id);
    }

    public function delete($id)
    {
        $short_term_trainee = ShortTermTrainee::findOrFail($id);
        return view('tviadmin.short_term_trainees.delete', compact('short_term_trainee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $short_term_trainee = ShortTermTrainee::findOrFail($id);
        $report_id = $short_term_trainee->report_date->id;
        $short_term_trainee->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('short-term-trainees/' . $report_id);
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.short_term_trainees.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = ShortTermTrainee::select(
            'report_date_id',
            'institution_id',
            'occupation_id',
            'registered_male',
            'registered_female',
            'started_training_male',
            'started_training_female',
            'completed_training_male',
            'completed_training_female',
            'sent_assessment_male',
            'sent_assessment_female',
            'assessed_male',
            'assessed_female',
            'competent_male',
            'competent_female'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            ShortTermTrainee::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found.');
        }

        return redirect('short-term-trainees');
    }
}

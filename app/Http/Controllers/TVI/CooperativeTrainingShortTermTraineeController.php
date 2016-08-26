<?php

namespace App\Http\Controllers\TVI;

use App\CooperativeTrainingShortTermTrainee;
use App\Http\Requests\CooperativeTrainingShortTermTraineeRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CooperativeTrainingShortTermTraineeController extends Controller
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
        return view('tviadmin.cooperative_training_short_term.index', compact('report_dates'));
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
        $sectors = Sector::all()->lists('name', 'id');
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('tviadmin.cooperative_training_short_term.create', compact('report_dates', 'sectors', 'institution_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CooperativeTrainingShortTermTraineeRequest $request)
    {
        CooperativeTrainingShortTermTrainee::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('cooperative-training-short-term/' . $request->get('report_date_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $id, 'institution_id' => $user->institution->id);
        $cooperative_training_short_term = CooperativeTrainingShortTermTrainee::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);

        return view('tviadmin.cooperative_training_short_term.index2', array('cooperative_training_short_term' => $cooperative_training_short_term,
            'report_date' => $report_date));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report_dates = ReportDate::lists('petsa', 'id');
        $cooperative_training_shortterm = CooperativeTrainingShortTermTrainee::findOrFail($id);

        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($cooperative_training_shortterm->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($cooperative_training_shortterm->occupation->id)->lists('name', 'id');

        return view('tviadmin.cooperative_training_short_term.edit', compact('cooperative_training_shortterm', 'sectors', 'subsectors', 'occupations', 'report_dates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cooperative_training_short_term = CooperativeTrainingShortTermTrainee::findOrFail($id);
        $cooperative_training_short_term->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('cooperative-training-short-term/' . $cooperative_training_short_term->report_date->id);
    }

    public function delete($id)
    {
        $cooperative_training_shortterm = CooperativeTrainingShortTermTrainee::findOrFail($id);
        return view('tviadmin.cooperative_training_short_term.delete', compact('cooperative_training_shortterm'));
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
        $cooperative_training_shortterm = CooperativeTrainingShortTermTrainee::findOrFail($id);
        $report_id = $cooperative_training_shortterm->report_date->id;
        $cooperative_training_shortterm->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('cooperative-training-short-term/' . $report_id);
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.cooperative_training_short_term.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $request->report_date_id_target, 'institution_id' => $user->institution->id);
        $target_report_id_exist = CooperativeTrainingShortTermTrainee::where($criteria)->get();

        if (count($target_report_id_exist) > 0) {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save-as report operation failed. Target report already exists.');

            return redirect('cooperative-training-short-term');
        }


        // retrieve all records as collection
        $records = CooperativeTrainingShortTermTrainee::select(
            'report_date_id',
            'institution_id',
            'occupation_id',
            'regular_level1_male',
            'regular_level1_female',
            'regular_level2_male',
            'regular_level2_female',
            'regular_level3_male',
            'regular_level3_female',
            'regular_level4_male',
            'regular_level4_female',
            'regular_level5_male',
            'regular_level5_female',
            'extension_level1_male',
            'extension_level1_female',
            'extension_level2_male',
            'extension_level2_female',
            'extension_level3_male',
            'extension_level3_female',
            'extension_level4_male',
            'extension_level4_female',
            'extension_level5_male',
            'extension_level5_female'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if (count($records) > 0) {
            // update report date id to target report date id
            foreach ($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            CooperativeTrainingShortTermTrainee::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found.');
        }

        return redirect('cooperative-training-short-term');
    }
}
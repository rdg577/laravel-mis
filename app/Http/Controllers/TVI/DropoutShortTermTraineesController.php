<?php

namespace App\Http\Controllers\TVI;

use App\DropoutShortTermTrainee;
use App\Http\Requests\DropoutShortTermTraineeRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DropoutShortTermTraineesController extends Controller
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
        return view('tviadmin.dropout_short_term.index', compact('report_dates'));
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

        return view('tviadmin.dropout_short_term.create', compact('report_dates', 'sectors', 'institution_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DropoutShortTermTraineeRequest $request)
    {
        DropoutShortTermTrainee::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('dropout-short-term/' . $request->get('report_date_id'));
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
        $dropout_short_term = DropoutShortTermTrainee::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);

        return view('tviadmin.dropout_short_term.index2', array('dropout_short_term' => $dropout_short_term,
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

        $dropout_shortterm = DropoutShortTermTrainee::findOrFail($id);

        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($dropout_shortterm->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($dropout_shortterm->occupation->id)->lists('name', 'id');

        return view('tviadmin.dropout_short_term.edit', compact('dropout_shortterm', 'sectors', 'subsectors', 'occupations', 'report_dates'));
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
        $dropout_short_term = DropoutShortTermTrainee::findOrFail($id);
        $dropout_short_term->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('dropout-short-term/' . $dropout_short_term->report_date->id);
    }

    public function delete($id)
    {
        $dropout_shortterm = DropoutShortTermTrainee::findOrFail($id);
        return view('tviadmin.dropout_short_term.delete', compact('dropout_shortterm'));
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
        $dropout_shortterm = DropoutShortTermTrainee::findOrFail($id);
        $report_id = $dropout_shortterm->report_date->id;
        $dropout_shortterm->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('dropout-short-term/' . $report_id);
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
        return view('tviadmin.dropout_short_term.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $request->report_date_id_target, 'institution_id' => $user->institution->id);
        $target_report_id_exist = DropoutShortTermTrainee::where($criteria)->get();

        if(count($target_report_id_exist) > 0) {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save-as report operation failed. Target report already exists.');

            return redirect('dropout-short-term');
        }


        // retrieve all records as collection
        $records = DropoutShortTermTrainee::select(
            'report_date_id'            ,
            'institution_id'            ,
            'occupation_id'             ,
            'regular_level1_male'       ,
            'regular_level1_female'     ,
            'regular_level2_male'       ,
            'regular_level2_female'     ,
            'regular_level3_male'       ,
            'regular_level3_female'     ,
            'regular_level4_male'       ,
            'regular_level4_female'     ,
            'regular_level5_male'       ,
            'regular_level5_female'     ,
            'extension_level1_male'     ,
            'extension_level1_female'   ,
            'extension_level2_male'     ,
            'extension_level2_female'   ,
            'extension_level3_male'     ,
            'extension_level3_female'   ,
            'extension_level4_male'     ,
            'extension_level4_female'   ,
            'extension_level5_male'     ,
            'extension_level5_female'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            DropoutShortTermTrainee::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found.');
        }

        return redirect('dropout-short-term');
    }
}

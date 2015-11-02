<?php

namespace App\Http\Controllers\TVI;

use App\CooperativeTraining;
use App\Http\Requests\TrainerRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use App\Trainer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $report_dates = ReportDate::where('user_id', '=', $user->id)
                                    ->orderBy('petsa', 'desc')
                                    ->paginate(10);
        return view('tviadmin.trainers.index', compact('report_dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        $report_dates = ReportDate::where('user_id', '=', $user->id)->lists('petsa', 'id');
        $sectors = Sector::all()->lists('name', 'id');

        return view('tviadmin.trainers.create', array('report_dates' => $report_dates,
                                                                    'report_date_id' => Input::get('id'),
                                                                    'sectors' => $sectors,
                                                                    'institution_id' => $user->institution->id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TrainerRequest $request)
    {
        Trainer::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('trainers/' . $request->get('report_date_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $id, 'institution_id' => $user->institution->id);
        $trainers = Trainer::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.trainers.index2', array('trainers' => $trainers,
                                                        'report_date' => $report_date));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::where('user_id', '=', $user->id)->lists('petsa', 'id');
        $trainer = Trainer::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($trainer->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($trainer->occupation->id)->lists('name', 'id');

        return view('tviadmin.trainers.edit', array('trainer' => $trainer,
                                                        'report_dates' => $report_dates,
                                                        'sectors' => $sectors,
                                                        'subsectors' => $subsectors,
                                                        'occupations' => $occupations));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TrainerRequest $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('trainers/' . $trainer->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        $report_id = $trainer->report_date->id;
        $trainer->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('trainers/' . $report_id);
    }

    public function delete($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('tviadmin.trainers.delete', array('trainer' => $trainer));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::where('user_id', '=', $user->id)
                                        ->orderBy('petsa', 'desc')
                                        ->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.trainers.save_as', array('report_dates' => $report_dates,
                                                        'report_date' => $report_date,
                                                        'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = Trainer::select(
            'report_date_id',
            'institution_id',
            'occupation_id',
            'full_time_male',
            'full_time_female',
            'part_time_male',
            'part_time_female',
            'ethiopian_male',
            'ethiopian_female',
            'non_ethiopian_male',
            'non_ethiopian_female',
            'core_male',
            'core_female',
            'took_tm_male',
            'took_tm_female',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            Trainer::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found from source.');
        }

        return redirect('trainers');
    }
}

<?php

namespace App\Http\Controllers\TVI;

use App\CooperativeTraining;
use App\Http\Requests\CooperativeTrainingRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CooperativeTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')
            ->paginate(10);
        return view('tviadmin.cooperative_trainings.index', compact('report_dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        $report_dates = ReportDate::lists('petsa', 'id');
        $sectors = Sector::all()->lists('name', 'id');

        return view('tviadmin.cooperative_trainings.create', array('report_dates' => $report_dates,
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
    public function store(CooperativeTrainingRequest $request)
    {
        CooperativeTraining::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('cooperative-trainings/' . $request->get('report_date_id'));
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
        $cooperative_trainings = CooperativeTraining::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.cooperative_trainings.index2', array('cooperative_trainings' => $cooperative_trainings,
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
        $report_dates = ReportDate::lists('petsa', 'id');
        $cooperative_training = CooperativeTraining::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($cooperative_training->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($cooperative_training->occupation->id)->lists('name', 'id');

        return view('tviadmin.cooperative_trainings.edit', array('cooperative_training' => $cooperative_training,
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
    public function update(CooperativeTrainingRequest $request, $id)
    {
        $cooperative_training = CooperativeTraining::findOrFail($id);
        $cooperative_training->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('cooperative-trainings/' . $cooperative_training->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $cooperative_training = CooperativeTraining::findOrFail($id);
        $report_id = $cooperative_training->report_date->id;
        $cooperative_training->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('cooperative-trainings/' . $report_id);
    }

    public function delete($id)
    {
        $cooperative_training = CooperativeTraining::findOrFail($id);
        return view('tviadmin.cooperative_trainings.delete', array('cooperative_training' => $cooperative_training));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.cooperative_trainings.save_as', array('report_dates' => $report_dates,
                                                                    'report_date' => $report_date,
                                                                    'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = CooperativeTraining::select(
            'report_date_id',
            'institution_id',
            'occupation_id',
            'mse_list',
            'mse_mou',
            'mse_joint_plan',
            'mse_training',
            'mse_trainers',
            'ml_list',
            'ml_mou',
            'ml_joint_plan',
            'ml_training',
            'ml_trainers',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            CooperativeTraining::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found from source.');
        }

        return redirect('cooperative-trainings');
    }
}

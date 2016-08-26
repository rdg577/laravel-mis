<?php

namespace App\Http\Controllers\TVI;

use App\FormalTraining;
use App\Http\Requests\FormalTrainingRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class FormalTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->paginate(10);
        return view('tviadmin.formal_trainings.index', compact('report_dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');
        $sectors = Sector::all()->lists('name', 'id');

        return view('tviadmin.formal_trainings.create', array('report_dates' => $report_dates,
                                                              'sectors' => $sectors,
                                                              'institution_id' => $user->institution->id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(FormalTrainingRequest $request)
    {
        FormalTraining::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('/formal-trainings/' . $request->get('report_date_id'));
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
        $formal_trainings = FormalTraining::where($criteria)->paginate(10);
        /*$formal_trainings = FormalTraining::where('report_date_id', $id)->where('institution_id', $user->institution->id)->paginate(7);*/
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.formal_trainings.index2', array('formal_trainings' => $formal_trainings,
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
        $formal_training = FormalTraining::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($formal_training->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($formal_training->occupation->id)->lists('name', 'id');

        return view('tviadmin.formal_trainings.edit', array('formal_training' => $formal_training,
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
    public function update(FormalTrainingRequest $request, $id)
    {
        $formal_training = FormalTraining::findOrFail($id);
        $formal_training->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('formal-trainings/' . $formal_training->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $formal_training = FormalTraining::findOrFail($id);
        $report_id = $formal_training->report_date->id;
        $formal_training->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/formal-trainings/' . $report_id);
    }

    public function delete($id)
    {
        $formal_training = FormalTraining::findOrFail($id);

        return view('tviadmin.formal_trainings.delete', array('formal_training' => $formal_training));
    }

    /**
     * Display the save as form
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.formal_trainings.save_as', array('report_dates' => $report_dates,
                                                                'report_date' => $report_date,
                                                                'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = FormalTraining::select(
            'report_date_id',
            'institution_id',
            'occupation_id',
            'course_started',
            'course_ended',
            'below17_male',
            'below17_female',
            'from17to19_male',
            'from17to19_female',
            'above19_male',
            'above19_female',
            'regular_male',
            'regular_female',
            'extension_male',
            'extension_female',
            'from_grade10_male',
            'from_grade10_female',
            'from_grade11_male',
            'from_grade11_female',
            'from_grade12_male',
            'from_grade12_female',
            'beyond_grade12_male',
            'beyond_grade12_female',
            'mental_male',
            'mental_female',
            'visual_male',
            'visual_female',
            'hearing_male',
            'hearing_female',
            'physical_male',
            'physical_female',
            'cooperative_male',
            'cooperative_female',
            'noncooperative_male',
            'noncooperative_female',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            FormalTraining::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found.');
        }

        return redirect('formal-trainings');
    }
}

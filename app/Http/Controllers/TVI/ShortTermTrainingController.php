<?php

namespace App\Http\Controllers\TVI;

use App\Competency;
use App\Http\Requests\ShortTermTrainingRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\ShortTermTraining;
use App\Subsector;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ShortTermTrainingController extends Controller
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
        return view('tviadmin.short_term_trainings.index', compact('report_dates'));
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

        return view('tviadmin.short_term_trainings.create', array('report_dates' => $report_dates,
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
    public function store(ShortTermTrainingRequest $request)
    {
        ShortTermTraining::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('/short-term-trainings/' . $request->get('report_date_id'));
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
        $short_term_trainings = ShortTermTraining::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.short_term_trainings.index2', array('short_term_trainings' => $short_term_trainings,
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
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();

        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        $short_term_training = ShortTermTraining::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($short_term_training->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($short_term_training->occupation->id)->lists('name', 'id');
        $competencies = Occupation::findOrFail($short_term_training->occupation->id)->competencies()->lists('name', 'id');

        return view('tviadmin.short_term_trainings.edit', array('short_term_training' => $short_term_training,
                                                                'report_dates' => $report_dates,
                                                                'sectors' => $sectors,
                                                                'subsectors' => $subsectors,
                                                                'occupations' => $occupations,
                                                                'competencies' => $competencies));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ShortTermTrainingRequest $request, $id)
    {
        $short_term_training = ShortTermTraining::findOrFail($id);
        $short_term_training->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('short-term-trainings/' . $short_term_training->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $short_term_training = ShortTermTraining::findOrFail($id);
        $report_id = $short_term_training->report_date->id;
        $short_term_training->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/short-term-trainings/' . $report_id);
    }

    public function delete($id)
    {
        $short_term_training = ShortTermTraining::findOrFail($id);
        return view('tviadmin.short_term_trainings.delete', array('short_term_training' => $short_term_training));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.short_term_trainings.save_as', array('report_dates' => $report_dates,
                                                                    'report_date' => $report_date,
                                                                    'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = ShortTermTraining::select(
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
            'no_education_male',
            'no_education_female',
            'elementary_male',
            'elementary_female',
            'high_school_male',
            'high_school_female',
            'preparatory_male',
            'preparatory_female',
            'higher_education_male',
            'higher_education_female',
            'mental_male',
            'mental_female',
            'visual_male',
            'visual_female',
            'hearing_male',
            'hearing_female',
            'physical_male',
            'physical_female',
            'cooperative',
            'non_cooperative',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            ShortTermTraining::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found.');
        }

        return redirect('short-term-trainings');
    }
}

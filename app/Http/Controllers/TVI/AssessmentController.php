<?php

namespace App\Http\Controllers\TVI;

use App\Assessment;
use App\Http\Requests\AssessmentRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AssessmentController extends Controller
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
        return view('tviadmin.assessments.index', compact('report_dates'));
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

        return view('tviadmin.assessments.create', array('report_dates' => $report_dates,
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
    public function store(AssessmentRequest $request)
    {
        Assessment::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('assessments/' . $request->get('report_date_id'));
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
        $assessments = Assessment::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.assessments.index2', array('assessments' => $assessments,
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
        $assessment = Assessment::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($assessment->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($assessment->occupation->id)->lists('name', 'id');

        return view('tviadmin.assessments.edit', array('assessment' => $assessment,
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
    public function update(AssessmentRequest $request, $id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('assessments/' . $assessment->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $assessment = Assessment::findOrFail($id);
        $report_id = $assessment->report_date->id;
        $assessment->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('assessments/' . $report_id);
    }

    public function delete($id)
    {
        $assessment = Assessment::findOrFail($id);
        return view('tviadmin.assessments.delete', array('assessment' => $assessment));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.assessments.save_as', array('report_dates' => $report_dates,
                                                            'report_date' => $report_date,
                                                            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = Assessment::select(
            'report_date_id',
            'institution_id',
            'occupation_id',
            'assessed_regular_male',
            'assessed_regular_female',
            'assessed_extension_male',
            'assessed_extension_female',
            'assessed_short_term_male',
            'assessed_short_term_female',
            'competent_regular_male',
            'competent_regular_female',
            'competent_extension_male',
            'competent_extension_female',
            'competent_short_term_male',
            'competent_short_term_female'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            Assessment::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found from source.');
        }

        return redirect('assessments');
    }
}

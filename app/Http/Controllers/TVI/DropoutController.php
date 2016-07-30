<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\DropoutRequest;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use App\Dropout;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DropoutController extends Controller
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
        return view('tviadmin.dropouts.index', compact('report_dates'));
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

        return view('tviadmin.dropouts.create', array('report_dates' => $report_dates,
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
    public function store(DropoutRequest $request)
    {
        Dropout::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('dropouts/' . $request->get('report_date_id'));
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
        $dropouts = Dropout::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.dropouts.index2', array('dropouts' => $dropouts,
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
        $dropout = Dropout::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($dropout->occupation->subsector->id)->lists('name', 'id');
        $occupations = Occupation::findOrFail($dropout->occupation->id)->lists('name', 'id');

        return view('tviadmin.dropouts.edit', array('dropout' => $dropout,
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
    public function update(DropoutRequest $request, $id)
    {
        $dropout = Dropout::findOrFail($id);
        $dropout->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('dropouts/' . $dropout->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $dropout = Dropout::findOrFail($id);
        $report_id = $dropout->report_date->id;
        $dropout->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('dropouts/' . $report_id);
    }

    public function delete($id)
    {
        $dropout = Dropout::findOrFail($id);
        return view('tviadmin.dropouts.delete', array('dropout' => $dropout));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')
            ->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.dropouts.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = Dropout::select(
            'report_date_id',
            'institution_id',
            'occupation_id',
            'department',
            'completed_level',
            'regular_male',
            'regular_female',
            'extension_male',
            'extension_female',
            'short_term_male',
            'short_term_female',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            Dropout::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found from source.');
        }

        return redirect('dropouts');
    }
}

<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\IndustryExtension5Request;
use App\IndustryExtension5;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class IndustryExtension5Controller extends Controller
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
        return view('tviadmin.industry_extension5s.index', compact('report_dates'));
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

        return view('tviadmin.industry_extension5s.create', array('report_dates' => $report_dates,
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
    public function store(IndustryExtension5Request $request)
    {
        IndustryExtension5::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('industry-extension-5/' . $request->get('report_date_id'));
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
        $industry_extension5s = IndustryExtension5::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.industry_extension5s.index2', array('industry_extension5s' => $industry_extension5s,
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
        $industry_extension5 = IndustryExtension5::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($industry_extension5->subsector->id)->lists('name', 'id');

        return view('tviadmin.industry_extension5s.edit',
            array('industry_extension5' => $industry_extension5,
                'report_dates' => $report_dates,
                'sectors' => $sectors,
                'subsectors' => $subsectors));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(IndustryExtension5Request $request, $id)
    {
        $industry_extension5 = IndustryExtension5::findOrFail($id);
        $industry_extension5->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('industry-extension-5/' . $industry_extension5->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $industry_extension5 = IndustryExtension5::findOrFail($id);
        $report_id = $industry_extension5->report_date->id;
        $industry_extension5->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('industry-extension-5/' . $report_id);
    }

    public function delete($id)
    {
        $industry_extension5 = IndustryExtension5::findOrFail($id);
        return view('tviadmin.industry_extension5s.delete', array('industry_extension5' => $industry_extension5));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::where('user_id', '=', $user->id)
            ->orderBy('petsa', 'desc')
            ->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.industry_extension5s.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = IndustryExtension5::select(
            'report_date_id',
            'institution_id',
            'subsector_id',
            'micro',
            'small',
            'medium',
            'ie_field',
            'level_c_male',
            'level_c_female',
            'level_b_male',
            'level_b_female',
            'level_a_male',
            'level_a_female',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            IndustryExtension5::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found from source.');
        }

        return redirect('industry-extension-5');
    }
}

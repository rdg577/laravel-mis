<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\IndustryExtension2Request;
use App\IndustryExtension2;
use App\Occupation;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class IndustryExtension2Controller extends Controller
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
        return view('tviadmin.industry_extension2s.index', compact('report_dates'));
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

        return view('tviadmin.industry_extension2s.create', array('report_dates' => $report_dates,
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
    public function store(IndustryExtension2Request $request)
    {
        IndustryExtension2::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('industry-extension-2/' . $request->get('report_date_id'));
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
        $industry_extension2s = IndustryExtension2::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);

        return view('tviadmin.industry_extension2s.index2',
                    array('industry_extension2s' => $industry_extension2s,
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
        $industry_extension2 = IndustryExtension2::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($industry_extension2->subsector->id)->lists('name', 'id');

        return view('tviadmin.industry_extension2s.edit', array('industry_extension2' => $industry_extension2,
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
    public function update(IndustryExtension2Request $request, $id)
    {
        $industry_extension2 = IndustryExtension2::findOrFail($id);
        $industry_extension2->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('industry-extension-2/' . $industry_extension2->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $industry_extension2 = IndustryExtension2::findOrFail($id);
        $report_id = $industry_extension2->report_date->id;
        $industry_extension2->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('industry-extension-2/' . $report_id);
    }

    public function delete($id)
    {
        $industry_extension2 = IndustryExtension2::findOrFail($id);
        return view('tviadmin.industry_extension2s.delete', array('industry_extension2' => $industry_extension2));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::where('user_id', '=', $user->id)
            ->orderBy('petsa', 'desc')
            ->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.industry_extension2s.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = IndustryExtension2::select(
            'report_date_id',
            'institution_id',
            'subsector_id',
            'starter_enterprise',
            'starter_mse_operator_male',
            'starter_mse_operator_female',
            'starter_mse_operator_supported_male',
            'starter_mse_operator_supported_female',
            'advance_enterprise',
            'advance_mse_operator_male',
            'advance_mse_operator_female',
            'advance_mse_operator_supported_male',
            'advance_mse_operator_supported_female',
            'competent_enterprise',
            'competent_mse_operator_male',
            'competent_mse_operator_female',
            'competent_mse_operator_supported_male',
            'competent_mse_operator_supported_female',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            IndustryExtension2::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found from source.');
        }

        return redirect('industry-extension-2');
    }
}

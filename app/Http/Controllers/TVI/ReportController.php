<?php

namespace App\Http\Controllers\TVI;

use App\DataSummaryCooperativeTrainings;
use App\DataSummaryIndustryExtension;
use App\DataSummaryTrainees;
use App\DataSummaryTrainers;
use App\Institution;
use App\ReportDate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $institution_id = Auth::user()->institution->id;
        $report_dates = ReportDate::where('user_id', Auth::user()->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');
        return view('tviadmin.report.index', array('institution_id' => $institution_id, 'report_dates' => $report_dates));
    }

    public function tvi_show(Request $request)
    {
        $institution = Institution::findOrFail($request->get('institution_id'));
        $data_summary_trainers = new DataSummaryTrainers($request->get('institution_id'), $request->get('report_date_id'));
        $data_summary_trainees = new DataSummaryTrainees($request->get('institution_id'), $request->get('report_date_id'));
        $data_summary_cooperative_trainings = new DataSummaryCooperativeTrainings($request->get('institution_id'), $request->get('report_date_id'));
        $data_summary_industry_extension = new DataSummaryIndustryExtension($request->get('institution_id'), $request->get('report_date_id'));

        /*dd('micro -' . $data_summary_industry_extension->micro(9));*/

        return view('tviadmin.report.show', array('data_summary_trainers' => $data_summary_trainers,
                                                    'data_summary_trainees' => $data_summary_trainees,
                                                    'data_summary_cooperative_trainings' => $data_summary_cooperative_trainings,
                                                    'data_summary_industry_extension' => $data_summary_industry_extension,
                                                    'institution' => $institution));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly crreated resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

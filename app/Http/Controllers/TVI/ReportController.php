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
        $report_dates = ReportDate::orderBy('petsa', 'desc')->lists('petsa', 'id');
        return view('tviadmin.report.index', array('institution_id' => $institution_id, 'report_dates' => $report_dates));
    }

    public function show(Request $request)
    {
        $report_date = ReportDate::findOrFail($request->get('report_date_id'));

        $institution = Institution::findOrFail($request->get('institution_id'));
        $data_summary_trainers = new DataSummaryTrainers($request->get('institution_id'), $request->get('report_date_id'));
        $data_summary_trainees = new DataSummaryTrainees($request->get('institution_id'), $request->get('report_date_id'));
        $data_summary_cooperative_trainings = new DataSummaryCooperativeTrainings($request->get('institution_id'), $request->get('report_date_id'));
        $data_summary_industry_extension = new DataSummaryIndustryExtension($request->get('institution_id'), $request->get('report_date_id'));

        return view('tviadmin.report.show', array('data_summary_trainers' => $data_summary_trainers,
                                                    'data_summary_trainees' => $data_summary_trainees,
                                                    'data_summary_cooperative_trainings' => $data_summary_cooperative_trainings,
                                                    'data_summary_industry_extension' => $data_summary_industry_extension,
                                                    'institution' => $institution,
                                                    'report_date' => $report_date));
    }

}

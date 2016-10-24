<?php

namespace App\Http\Controllers\TVI;

use App\DataSummaryCooperativeTrainings;
use App\DataSummaryIndustryExtension;
use App\DataSummaryTrainees;
use App\DataSummaryTrainers;
use App\Institution;
use App\ReportDate;
use App\RTAInstitutionalSummaryReport;
use App\User;
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
        $user = Auth::user();
        $institution_id = $user->institution->id;
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');
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


    public function institutional_summary_report()
    {
        $user = Auth::user();
        $institution = Institution::findOrFail($user->institution_id);

        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();

        // get report dates
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('tviadmin.report.summary_rpt', compact('report_dates', 'institution'));
    }

    public function institutional_summary_report2(Request $request)
    {

        $user = Auth::user();
        $institution = Institution::findOrFail($user->institution_id);
        $report_date = ReportDate::findOrFail($request->get("petsa"));
        $isr = new RTAInstitutionalSummaryReport($report_date->id, $institution->id);
        $target_report = $request->get("target_report");

        switch($target_report)
        {
            case 0:
                return view('tviadmin.report.isr_new_enrollees', compact('institution', 'report_date', 'isr'));
                break;
            case 1:
                return view('tviadmin.report.isr_re_enrollees', compact('institution', 'report_date', 'isr'));
                break;
            case 2:
                return view('tviadmin.report.isr_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 3:
                return view('tviadmin.report.isr_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 4:
                return view('tviadmin.report.isr_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 5:
                return view('tviadmin.report.isr_dropout_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 6:
                return view('tviadmin.report.isr_dropout_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 7:
                return view('tviadmin.report.isr_dropout_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 8:
                return view('tviadmin.report.isr_assessment_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 9:
                return view('tviadmin.report.isr_assessment_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 10:
                return view('tviadmin.report.isr_assessment_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 11:
                return view('tviadmin.report.isr_cooperative_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 12:
                return view('tviadmin.report.isr_cooperative_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 13:
                return view('tviadmin.report.isr_cooperative_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 14:
                return view('tviadmin.report.isr_saving_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 15:
                return view('tviadmin.report.isr_saving_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 16:
                return view('tviadmin.report.isr_job_placement_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 17:
                return view('tviadmin.report.isr_action_researches', compact('institution', 'report_date', 'isr'));
                break;
            case 18:
                return view('tviadmin.report.isr_tracer_study', compact('institution', 'report_date', 'isr'));
                break;
            case 19:
                return view('tviadmin.report.isr_cooperative_industry_partners', compact('institution', 'report_date', 'isr'));
                break;
            default:
                $request->session()->flash('alert-info', 'Target Report Not Available');
                return back()->withInput();
        }

    }

}

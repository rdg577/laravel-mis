<?php

namespace App\Http\Controllers\RTA;

use App\DropoutGraduate;
use App\DropoutShortTermTrainee;
use App\DropoutTransferee;
use App\Graduate;
use App\Institution;
use App\NewEnrollee;
use App\Occupation;
use App\ReEnrollee;
use App\Region;
use App\ReportDate;
use App\RTAIndicatorIndustryExtension;
use App\RTAIndicatorStudentRatio;
use App\RTAIndicatorTrainerRatio;
use App\RTAInstitutionalSummaryReport;
use App\RTAReport1Government;
use App\RTAReport1NonGovernment;
use App\RTAReport2Government;
use App\RTAReport2NonGovernment;
use App\Sector;
use App\ShortTermTrainee;
use App\Subsector;
use App\Transferee;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RTAController extends Controller
{
    public function institutions()
    {
        $user = Auth::user();

        $institutions = Institution::where('region_id', $user->region_id)->orderBy('name')->get();
        $region = Region::find($user->region_id);

        return view('rtaadmin.institutions', compact('institutions', 'region'));
    }

    public function school_profile($id)
    {
        $institution = Institution::findOrFail($id);

        return view('rtaadmin.school_profile', compact('institution'));
    }

    public function indicators()
    {
        $user = Auth::user();

        // get report dates
        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('rtaadmin.indicators', compact('report_dates'));
    }

    public function show_indicators(Request $request)
    {
        $user = Auth::user();

        $region = Region::findOrFail($user->region_id);

        $trainer_ratio = new RTAIndicatorTrainerRatio($request->get('petsa'), $user->region_id);

        $student_ratio = new RTAIndicatorStudentRatio($request->get('petsa'), $user->region_id);

        $industry_extension = new RTAIndicatorIndustryExtension($request->get('petsa'), $user->region_id);

        $report_date = ReportDate::findOrFail($request->get('petsa'));

        return view('rtaadmin.show', compact('trainer_ratio', 'student_ratio', 'industry_extension', 'region', 'report_date'));
    }

    public function institutional_summary_report($id)
    {
        $user = Auth::user();
        $institution = Institution::findOrFail($id);
        // get report dates
        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('rtaadmin.summary_rpt', compact('id', 'report_dates', 'institution'));
    }

    public function institutional_summary_report2($id, Request $request)
    {
        $institution = Institution::findOrFail($id);
        $report_date = ReportDate::findOrFail($request->get("petsa"));
        $isr = new RTAInstitutionalSummaryReport($report_date->id, $institution->id);
        $target_report = $request->get("target_report");

//        return json_encode($isr->getSubsectorsFromSavingTransferees(3));
//        return view('rtaadmin.summary_rpt2', compact('institution', 'report_date', 'isr', 'target_report'));
        switch($target_report)
        {
            case 0:
                return view('rtaadmin.isr_new_enrollees', compact('institution', 'report_date', 'isr'));
                break;
            case 1:
                return view('rtaadmin.isr_re_enrollees', compact('institution', 'report_date', 'isr'));
                break;
            case 2:
                return view('rtaadmin.isr_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 3:
                return view('rtaadmin.isr_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 4:
                return view('rtaadmin.isr_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 5:
                return view('rtaadmin.isr_dropout_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 6:
                return view('rtaadmin.isr_dropout_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 7:
                return view('rtaadmin.isr_dropout_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 8:
                return view('rtaadmin.isr_assessment_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 9:
                return view('rtaadmin.isr_assessment_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 10:
                return view('rtaadmin.isr_assessment_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 11:
                return view('rtaadmin.isr_cooperative_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 12:
                return view('rtaadmin.isr_cooperative_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 13:
                return view('rtaadmin.isr_cooperative_short_term_trainees', compact('institution', 'report_date', 'isr'));
                break;
            case 14:
                return view('rtaadmin.isr_saving_transferees', compact('institution', 'report_date', 'isr'));
                break;
            case 15:
                return view('rtaadmin.isr_saving_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 16:
                return view('rtaadmin.isr_job_placement_graduates', compact('institution', 'report_date', 'isr'));
                break;
            case 17:
                return view('rtaadmin.isr_action_researches', compact('institution', 'report_date', 'isr'));
                break;
            case 18:
                return view('rtaadmin.isr_tracer_study', compact('institution', 'report_date', 'isr'));
                break;
            case 19:
                return view('rtaadmin.isr_cooperative_industry_partners', compact('institution', 'report_date', 'isr'));
                break;
            default:
                $request->session()->flash('alert-info', 'Target Report Not Available');
                return back()->withInput();
        }

    }
}

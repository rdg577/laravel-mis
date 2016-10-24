<?php

namespace App\Http\Controllers\RTA;

use App\AssessmentGraduate;
use App\AssessmentShortTermTrainee;
use App\AssessmentTransferee;
use App\CooperativeTrainingGraduate;
use App\CooperativeTrainingShortTermTrainee;
use App\CooperativeTrainingTransferee;
use App\DropoutGraduate;
use App\DropoutShortTermTrainee;
use App\DropoutTransferee;
use App\Graduate;
use App\Institution;
use App\JobPlacementGraduate;
use App\NewEnrollee;
use App\ReEnrollee;
use App\Region;
use App\ReportDate;
use App\RTAReport2NonGovernment;
use App\SavingGraduate;
use App\SavingTransferee;
use App\ShortTermTrainee;
use App\Transferee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Report2NonGovController extends Controller
{


    public function report2_non_government()
    {
        $user = Auth::user();

        // get report dates
        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('rtaadmin.rpt2nongov', compact('report_dates'));
    }

    public function show_report2_non_government(Request $request)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($request->get('petsa'));

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        switch($request->get('report')){
            case 0:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', NewEnrollee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_1', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 1:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', ReEnrollee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_2', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 2:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', Transferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_3', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 3:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', Graduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_4', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 4:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', ShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_5', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 5:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', DropoutTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_6', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 6:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', DropoutGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_7', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 7:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', DropoutShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_8', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 8:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', AssessmentTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_9', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 9:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', AssessmentGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_10', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 10:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_11', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 11:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', CooperativeTrainingTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_12', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 12:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', CooperativeTrainingGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_13', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 13:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', CooperativeTrainingShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_14', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 14:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', SavingTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_15', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 15:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', SavingGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_16', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 16:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', JobPlacementGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_nongov.show_rpt2nongov_17', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
        }


    }

    public function for_print_rpt2_gov_new($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', NewEnrollee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_1', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_re($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', ReEnrollee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_2', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', Transferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_3', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', Graduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_4', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', ShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_5', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_drop_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', DropoutTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_6', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_drop_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', DropoutGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_7', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_drop_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', DropoutShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_8', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_ass_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', AssessmentTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_9', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_ass_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', AssessmentGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_10', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_ass_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_11', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_coop_trng_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', CooperativeTrainingTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_12', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_coop_trng_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', CooperativeTrainingGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_13', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_coop_trng_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_14', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_saving_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', SavingTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_15', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_saving_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', SavingGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_16', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_job_placement_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2NonGovernment($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', '!=', 'Public')
            ->whereIn('id', JobPlacementGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_nongov.print_rpt2nongov_17', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

}

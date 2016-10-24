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
use App\RTAReport2Government;
use App\SavingGraduate;
use App\SavingTransferee;
use App\ShortTermTrainee;
use App\Transferee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Report2GovController extends Controller
{
    public function report2_government()
    {
        $user = Auth::user();

        // get report dates
        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('rtaadmin.rpt2gov', compact('report_dates'));
    }

    public function show_report2_government(Request $request)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($request->get('petsa'));

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        switch($request->get('report')){
            case 0:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', NewEnrollee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_1', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 1:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', ReEnrollee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_2', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 2:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', Transferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_3', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 3:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', Graduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_4', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 4:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', ShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_5', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 5:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', DropoutTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_6', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 6:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', DropoutGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_7', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 7:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', DropoutShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_8', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 8:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', AssessmentTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_9', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 9:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', AssessmentGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_10', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 10:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_11', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 11:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', CooperativeTrainingTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_12', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 12:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', CooperativeTrainingGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_13', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 13:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', CooperativeTrainingShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_14', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 14:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', SavingTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_15', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 15:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', SavingGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_16', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 16:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', JobPlacementGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.rpt2_gov.show_rpt2gov_17', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
        }


    }

    public function for_print_rpt2_gov_new($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', NewEnrollee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_re($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', ReEnrollee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_2', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', Transferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_3', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', Graduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_4', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', ShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_5', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_drop_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', DropoutTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_6', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_drop_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', DropoutGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_7', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_drop_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', DropoutShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_8', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_ass_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', AssessmentTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_9', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_ass_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', AssessmentGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_10', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_ass_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_11', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_coop_trng_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', CooperativeTrainingTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_12', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_coop_trng_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', CooperativeTrainingGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_13', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_coop_trng_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_14', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_saving_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', SavingTransferee::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_15', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_saving_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', SavingGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_16', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

    public function for_print_rpt2_gov_job_placement_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt2 = new RTAReport2Government($report_date->id, $user->region_id);

        $institutions = Institution::where('region_id', $region->id)
            ->where('ownership', 'Public')
            ->whereIn('id', JobPlacementGraduate::where('report_date_id', $report_date->id)->lists('institution_id'))
            ->orderBy('name')
            ->get();

        return view('rtaadmin.rpt2_gov.print_rpt2gov_17', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

}

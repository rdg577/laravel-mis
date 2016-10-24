<?php

namespace App\Http\Controllers\RTA;

use App\ActionResearch;
use App\AssessmentGraduate;
use App\AssessmentShortTermTrainee;
use App\AssessmentTransferee;
use App\CooperativeTraining;
use App\CooperativeTrainingGraduate;
use App\CooperativeTrainingShortTermTrainee;
use App\CooperativeTrainingTransferee;
use App\DropoutGraduate;
use App\DropoutShortTermTrainee;
use App\DropoutTransferee;
use App\Graduate;
use App\IndustryExtension1;
use App\IndustryExtension2;
use App\IndustryExtension3;
use App\IndustryExtension4;
use App\IndustryExtension5;
use App\Institution;
use App\JobPlacementGraduate;
use App\NewEnrollee;
use App\Occupation;
use App\ReEnrollee;
use App\Region;
use App\ReportDate;
use App\RTAReport1Government;
use App\RTAReport1NonGovernment;
use App\SavingGraduate;
use App\SavingTransferee;
use App\Sector;
use App\ShortTermTrainee;
use App\Subsector;
use App\TracerStudy;
use App\Trainer;
use App\Transferee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Report1NonGovController extends Controller
{

    public function report1_non_government()
    {
        $user = Auth::user();

        // get report dates
        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('rtaadmin.rpt1nongov', compact('report_dates'));
    }

    public function show_report1_non_government(Request $request)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($request->get('petsa'));

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        switch($request->get('report')){
            case 0:
                //NewEnrollee
                $occupations = Occupation::whereIn('id', NewEnrollee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_1', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 1:
                // ReEnrollee
                $occupations = Occupation::whereIn('id', ReEnrollee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_2', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 2:
                // Transferee
                $occupations = Occupation::whereIn('id', Transferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_3', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 3:
                // Graduate
                $occupations = Occupation::whereIn('id', Graduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_4', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 4:
                // ShorttermTrainee
                $occupations = Occupation::whereIn('id', ShortTermTrainee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_5', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 5:
                // DropoutTransferee
                $occupations = Occupation::whereIn('id', DropoutTransferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_6', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 6:
                // DropoutGraduate
                $occupations = Occupation::whereIn('id', DropoutGraduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_7', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 7:
                // Dropouts [Short-Term Trainees]
                $occupations = Occupation::whereIn('id', DropoutShortTermTrainee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_8', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 8:
                // Assessment [Transferees]
                $occupations = Occupation::whereIn('id', AssessmentTransferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_9', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 9:
                // Assessment [Graduates]
                $occupations = Occupation::whereIn('id', AssessmentGraduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_10', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 10:
                // Assessment [Short-Term Trainees]
                $occupations = Occupation::whereIn('id', AssessmentShortTermTrainee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_11', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 11:
                // Cooperative Training [With Partner Industries]
                $occupations = Occupation::whereIn('id', CooperativeTraining::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_12', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 12:
                // Cooperative Training [Transferees]
                $occupations = Occupation::whereIn('id', CooperativeTrainingTransferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_13', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 13:
                // Cooperative Training [Graduates]
                $occupations = Occupation::whereIn('id', CooperativeTrainingGraduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_14', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 14:
                // Cooperative Training [Short-Term Trainees]
                $occupations = Occupation::whereIn('id', CooperativeTrainingShortTermTrainee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_15', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 15:
                // Saving [Transferees]
                $occupations = Occupation::whereIn('id', SavingTransferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_16', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 16:
                // Saving [Graduates]
                $occupations = Occupation::whereIn('id', SavingGraduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_17', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 17:
                // Job Placement [Graduates]
                $occupations = Occupation::whereIn('id', JobPlacementGraduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_18', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 18:
                // Action Research
                $action_researches = ActionResearch::where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_19', compact('rpt1nongov', 'region', 'report_date', 'action_researches'));

                break;
            case 19:
                // Tracer Study
                $tracer_studies = TracerStudy::select(DB::raw('sum(proposal) As proposal, sum(completed) As completed'))
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->get();

                return view('rtaadmin.rpt1_nongov.show_rpt1nongov_20', compact('rpt1nongov', 'region', 'report_date', 'tracer_studies'));

                break;
        }


    }

    public function for_print_rpt1_nongov_new($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', NewEnrollee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();
        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_re($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', ReEnrollee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_2', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', Transferee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_3', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', Graduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_4', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', ShortTermTrainee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_5', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_drop_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', DropoutTransferee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_6', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_drop_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', DropoutGraduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_7', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_drop_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', DropoutShortTermTrainee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_8', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_ass_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', AssessmentTransferee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_9', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_ass_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', AssessmentGraduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_10', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_ass_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', AssessmentShortTermTrainee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_11', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_coop_trng_industry_partner($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', CooperativeTraining::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_12', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_coop_trng_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', CooperativeTrainingTransferee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_13', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_coop_trng_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', CooperativeTrainingGraduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_14', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_coop_trng_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', CooperativeTrainingShortTermTrainee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_15', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_saving_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', SavingTransferee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_16', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_saving_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', SavingGraduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_17', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_job_placement_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', JobPlacementGraduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_18', compact('rpt1nongov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_nongov_action_research($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        $action_researches = ActionResearch::where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
            ->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_19', compact('rpt1nongov', 'region', 'report_date', 'action_researches'));
    }

    public function for_print_rpt1_nongov_tracer_study($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1nongov = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        $tracer_studies = TracerStudy::select(DB::raw('sum(proposal) As proposal, sum(completed) As completed'))
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
            ->get();

        return view('rtaadmin.rpt1_nongov.print_rpt1nongov_20', compact('rpt1nongov', 'region', 'report_date', 'tracer_studies'));
    }

}

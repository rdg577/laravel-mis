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

    public function report1_government()
    {
        $user = Auth::user();

        // get report dates
        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('rtaadmin.rpt1gov', compact('report_dates'));
    }

    public function show_report1_government(Request $request)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($request->get('petsa'));

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        switch($request->get('report')){
            case 0:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', NewEnrollee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1gov_1', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 1:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', ReEnrollee::select('occupation_id')
                                                            ->where('report_date_id', $request->get('petsa'))
                                                            ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', 'Public')->lists('id'))
                                                            ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                                                    ->whereIn('id', $occupations->lists('subsector_id'))
                                                    ->get())
                    ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1gov_2', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 2:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', Transferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1gov_3', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 3:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', Graduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1gov_4', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 4:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', ShortTermTrainee::select('occupation_id')
                                                                ->where('report_date_id', $request->get('petsa'))
                                                                ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', 'Public')->lists('id'))
                                                                ->lists('occupation_id'))
                                    ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1gov_5', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 5:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', DropoutTransferee::select('occupation_id')
                                                                    ->where('report_date_id', $request->get('petsa'))
                                                                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', 'Public')->lists('id'))
                                                                    ->lists('occupation_id'))
                                ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                                ->whereIn('id', $occupations->lists('subsector_id'))
                                ->get())
                                ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                                ->get();

                return view('rtaadmin.show_rpt1gov_6', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 6:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', DropoutGraduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1gov_7', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
        }


    }

    public function for_print_rpt1_gov_new($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', NewEnrollee::select('occupation_id')
                                                            ->where('report_date_id', $id)
                                                            ->whereIn('institution_id', Institution::select('id')
                                                                                                ->where('region_id', $region->id)
                                                                                                ->where('ownership', 'Public')
                                                                                                ->lists('id'))
                                                            ->lists('occupation_id'))
                                ->orderBy('name')->get();
        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.print_rpt1gov', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_gov_re($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', ReEnrollee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.print_rpt1gov_2', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_gov_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', Transferee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.print_rpt1gov_3', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_gov_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', Graduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.print_rpt1gov_4', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_gov_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', ShortTermTrainee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.print_rpt1gov_5', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_gov_drop_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', DropoutTransferee::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.print_rpt1gov_6', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_gov_drop_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1gov = new RTAReport1Government($report_date->id, $user->region_id);

        // get occupations
        $occupations = Occupation::whereIn('id', DropoutGraduate::select('occupation_id')
            ->where('report_date_id', $id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $region->id)
                ->where('ownership', 'Public')
                ->lists('id'))
            ->lists('occupation_id'))
            ->orderBy('name')->get();

        // get sectors
        $sectors = Sector::whereIn('id', Subsector::select('sector_id')->whereIn('id', $occupations->lists('subsector_id'))->get())->get();

        // get subsectors
        $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))->get();

        return view('rtaadmin.print_rpt1gov_7', compact('rpt1gov', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

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

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

        switch($request->get('report')){
            case 0:
                // get occupations for new enrollees
                $occupations = Occupation::whereIn('id', NewEnrollee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for new enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for new enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1nongov_1', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 1:
                // get occupations for re-enrollees
                $occupations = Occupation::whereIn('id', ReEnrollee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for re-enrollees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for re-enrollees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1nongov_2', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 2:
                // get occupations for transferees
                $occupations = Occupation::whereIn('id', Transferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for transferees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for transferees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1nongov_3', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 3:
                // get occupations for graduates
                $occupations = Occupation::whereIn('id', Graduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for graduates
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for graduates
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1nongov_4', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 4:
                // get occupations for short-term-trainees
                $occupations = Occupation::whereIn('id', ShortTermTrainee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for short-term-trainees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for short-term-trainees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1nongov_5', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 5:
                // get occupations for Dropout Transferees
                $occupations = Occupation::whereIn('id', DropoutTransferee::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for Dropout Transferees
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for Dropout Transferees
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1nongov_6', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
            case 6:
                // get occupations for Dropout Graduates
                $occupations = Occupation::whereIn('id', DropoutGraduate::select('occupation_id')
                    ->where('report_date_id', $request->get('petsa'))
                    ->whereIn('institution_id', Institution::select('id')->where('region_id', $region->id)->where('ownership', '!=', 'Public')->lists('id'))
                    ->lists('occupation_id'))
                    ->orderBy('name')->get();

                // get sectors for Dropout Graduates
                $sectors = Sector::whereIn('id', Subsector::select('sector_id')
                    ->whereIn('id', $occupations->lists('subsector_id'))
                    ->get())
                    ->get();

                // get subsectors for Dropout Graduates
                $subsectors = Subsector::whereIn('id', $occupations->lists('subsector_id'))
                    ->get();

                return view('rtaadmin.show_rpt1nongov_7', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));

                break;
        }


    }

    public function for_print_rpt1_non_gov_new($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

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

        return view('rtaadmin.print_rpt1nongov', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_non_gov_re($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

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

        return view('rtaadmin.print_rpt1nongov_2', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_non_gov_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

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

        return view('rtaadmin.print_rpt1nongov_3', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_non_gov_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

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

        return view('rtaadmin.print_rpt1nongov_4', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_non_gov_short($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

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

        return view('rtaadmin.print_rpt1nongov_5', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_non_gov_drop_trans($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

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

        return view('rtaadmin.print_rpt1nongov_6', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

    public function for_print_rpt1_non_gov_drop_grad($id)
    {
        $user = Auth::user();
        $region = Region::findOrFail($user->region_id);
        $report_date = ReportDate::findOrFail($id);

        $rpt1 = new RTAReport1NonGovernment($report_date->id, $user->region_id);

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

        return view('rtaadmin.print_rpt1nongov_7', compact('rpt1', 'region', 'report_date', 'sectors', 'subsectors', 'occupations'));
    }

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

                return view('rtaadmin.show_rpt2gov_1', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 1:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', ReEnrollee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2gov_2', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 2:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', Transferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2gov_3', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 3:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', Graduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2gov_4', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 4:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', ShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2gov_5', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 5:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', DropoutTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2gov_6', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 6:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', 'Public')
                    ->whereIn('id', DropoutGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2gov_7', compact('rpt2', 'region', 'report_date', 'institutions'));

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

        return view('rtaadmin.print_rpt2gov', compact('rpt2', 'region', 'report_date', 'institutions'));
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

        return view('rtaadmin.print_rpt2gov_2', compact('rpt2', 'region', 'report_date', 'institutions'));
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

        return view('rtaadmin.print_rpt2gov_3', compact('rpt2', 'region', 'report_date', 'institutions'));
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

        return view('rtaadmin.print_rpt2gov_4', compact('rpt2', 'region', 'report_date', 'institutions'));
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

        return view('rtaadmin.print_rpt2gov_5', compact('rpt2', 'region', 'report_date', 'institutions'));
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

        return view('rtaadmin.print_rpt2gov_6', compact('rpt2', 'region', 'report_date', 'institutions'));
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

        return view('rtaadmin.print_rpt2gov_7', compact('rpt2', 'region', 'report_date', 'institutions'));
    }

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

                return view('rtaadmin.show_rpt2nongov_1', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 1:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', ReEnrollee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2nongov_2', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 2:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', Transferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2nongov_3', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 3:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', Graduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2nongov_4', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 4:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', ShortTermTrainee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2nongov_5', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 5:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', DropoutTransferee::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2nongov_6', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
            case 6:
                $institutions = Institution::where('region_id', $region->id)
                    ->where('ownership', '!=', 'Public')
                    ->whereIn('id', DropoutGraduate::where('report_date_id', $request->get('petsa'))->lists('institution_id'))
                    ->orderBy('name')
                    ->get();

                return view('rtaadmin.show_rpt2nongov_7', compact('rpt2', 'region', 'report_date', 'institutions'));

                break;
        }


    }
}

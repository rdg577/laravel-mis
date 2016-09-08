<?php
/**
 * Created by PhpStorm.
 * User: tata
 * Date: 9/3/2016
 * Time: 7:27 PM
 */

namespace App;
use Illuminate\Support\Facades\DB;

class RTAInstitutionalSummaryReport {

    protected $report_date_id;
    protected $institution_id;

    public function __construct($param_report_date_id, $param_institution_id)
    {
        $this->report_date_id = $param_report_date_id;
        $this->institution_id = $param_institution_id;
    }

    // *******************************************************************
    public function getSumOccupationsFromNewEnrollees($subsector_id)
    {
        $result = NewEnrollee::select(
                DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
                )
            )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromNewEnrollees($subsector_id)
    {
        $result = NewEnrollee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                                                ->lists('id'))
                    ->get();

        return $result;
    }

    public function getSubsectorsFromNewEnrollees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
                    ->whereIn('id', Occupation::select('subsector_id')
                                    ->whereIn('id', NewEnrollee::where('report_date_id', $this->report_date_id)
                                        ->where('institution_id', $this->institution_id)
                                        ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromNewEnrollees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', NewEnrollee::where('report_date_id', $this->report_date_id)
                                                                                                ->where('institution_id', $this->institution_id)
                                                                                                ->lists('occupation_id'))
                                                                    ->distinct()->lists('subsector_id'))
                                            ->distinct()->lists('sector_id'))
                    ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromReEnrollees($subsector_id)
    {
        $result = ReEnrollee::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromReEnrollees($subsector_id)
    {
        $result = ReEnrollee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromReEnrollees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', ReEnrollee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromReEnrollees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', ReEnrollee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromTransferees($subsector_id)
    {
        $result = Transferee::select(
            DB::Raw('
                    sum(regular_level1_to_level2_male) as reg_l1_m,
                    sum(regular_level1_to_level2_female) as reg_l1_f,
                    sum(regular_level2_to_level3_male) as reg_l2_m,
                    sum(regular_level2_to_level3_female) as reg_l2_f,
                    sum(regular_level3_to_level4_male) as reg_l3_m,
                    sum(regular_level3_to_level4_female) as reg_l3_f,
                    sum(regular_level4_to_level5_male) as reg_l4_m,
                    sum(regular_level4_to_level5_female) as reg_l4_f,
                    sum(regular_level1_to_level2_male+regular_level2_to_level3_male+regular_level3_to_level4_male+regular_level4_to_level5_male) as reg_total_m,
                    sum(regular_level1_to_level2_female+regular_level2_to_level3_female+regular_level3_to_level4_female+regular_level4_to_level5_female) as reg_total_f,
                    sum(extension_level1_to_level2_male) as ext_l1_m,
                    sum(extension_level1_to_level2_female) as ext_l1_f,
                    sum(extension_level2_to_level3_male) as ext_l2_m,
                    sum(extension_level2_to_level3_female) as ext_l2_f,
                    sum(extension_level3_to_level4_male) as ext_l3_m,
                    sum(extension_level3_to_level4_female) as ext_l3_f,
                    sum(extension_level4_to_level5_male) as ext_l4_m,
                    sum(extension_level4_to_level5_female) as ext_l4_f,
                    sum(extension_level1_to_level2_male+extension_level2_to_level3_male+extension_level3_to_level4_male+extension_level4_to_level5_male) as ext_total_m,
                    sum(extension_level1_to_level2_female+extension_level2_to_level3_female+extension_level3_to_level4_female+extension_level4_to_level5_female) as ext_total_f
                    '
                )
            )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromTransferees($subsector_id)
    {
        $result = Transferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromTransferees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', Transferee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromTransferees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', Transferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromGraduates($subsector_id)
    {
        $result = Graduate::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromGraduates($subsector_id)
    {
        $result = Graduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromGraduates($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', Graduate::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromGraduates()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', Graduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromShortTermTrainees($subsector_id)
    {
        $result = ShortTermTrainee::select(
            DB::Raw('
                    sum(registered_male) as registered_male,
                    sum(registered_female) as registered_female,
                    sum(started_training_male) as started_training_male,
                    sum(started_training_female) as started_training_female,
                    sum(completed_training_male) as completed_training_male,
                    sum(completed_training_female) as completed_training_female,
                    sum(sent_assessment_male) as sent_assessment_male,
                    sum(sent_assessment_female) as sent_assessment_female,
                    sum(assessed_male) as assessed_male,
                    sum(assessed_female) as assessed_female,
                    sum(competent_male) as competent_male,
                    sum(competent_female) as competent_female
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromShortTermTrainees($subsector_id)
    {
        $result = ShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromShortTermTrainees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', ShortTermTrainee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromShortTermTrainees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', ShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromDropoutTransferees($subsector_id)
    {
        $result = DropoutTransferee::select(
            DB::Raw('
                    sum(regular_level1_to_level2_male) as reg_l1_m,
                    sum(regular_level1_to_level2_female) as reg_l1_f,
                    sum(regular_level2_to_level3_male) as reg_l2_m,
                    sum(regular_level2_to_level3_female) as reg_l2_f,
                    sum(regular_level3_to_level4_male) as reg_l3_m,
                    sum(regular_level3_to_level4_female) as reg_l3_f,
                    sum(regular_level4_to_level5_male) as reg_l4_m,
                    sum(regular_level4_to_level5_female) as reg_l4_f,
                    sum(regular_level1_to_level2_male+regular_level2_to_level3_male+regular_level3_to_level4_male+regular_level4_to_level5_male) as reg_total_m,
                    sum(regular_level1_to_level2_female+regular_level2_to_level3_female+regular_level3_to_level4_female+regular_level4_to_level5_female) as reg_total_f,
                    sum(extension_level1_to_level2_male) as ext_l1_m,
                    sum(extension_level1_to_level2_female) as ext_l1_f,
                    sum(extension_level2_to_level3_male) as ext_l2_m,
                    sum(extension_level2_to_level3_female) as ext_l2_f,
                    sum(extension_level3_to_level4_male) as ext_l3_m,
                    sum(extension_level3_to_level4_female) as ext_l3_f,
                    sum(extension_level4_to_level5_male) as ext_l4_m,
                    sum(extension_level4_to_level5_female) as ext_l4_f,
                    sum(extension_level1_to_level2_male+extension_level2_to_level3_male+extension_level3_to_level4_male+extension_level4_to_level5_male) as ext_total_m,
                    sum(extension_level1_to_level2_female+extension_level2_to_level3_female+extension_level3_to_level4_female+extension_level4_to_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromDropoutTransferees($subsector_id)
    {
        $result = DropoutTransferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromDropoutTransferees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', DropoutTransferee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromDropoutTransferees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', DropoutTransferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromDropoutGraduates($subsector_id)
    {
        $result = DropoutGraduate::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromDropoutGraduates($subsector_id)
    {
        $result = DropoutGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromDropoutGraduates($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', DropoutGraduate::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromDropoutGraduates()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', DropoutGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromDropoutShortTermTrainees($subsector_id)
    {
        $result = DropoutShortTermTrainee::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromDropoutShortTermTrainees($subsector_id)
    {
        $result = DropoutShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromDropoutShortTermTrainees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', DropoutShortTermTrainee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromDropoutShortTermTrainees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', DropoutShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromAssessmentTransferees($subsector_id)
    {
        $result = AssessmentTransferee::select(
            DB::Raw('
                    sum(regular_level1_to_level2_male) as reg_l1_m,
                    sum(regular_level1_to_level2_female) as reg_l1_f,
                    sum(regular_level2_to_level3_male) as reg_l2_m,
                    sum(regular_level2_to_level3_female) as reg_l2_f,
                    sum(regular_level3_to_level4_male) as reg_l3_m,
                    sum(regular_level3_to_level4_female) as reg_l3_f,
                    sum(regular_level4_to_level5_male) as reg_l4_m,
                    sum(regular_level4_to_level5_female) as reg_l4_f,
                    sum(regular_level1_to_level2_male+regular_level2_to_level3_male+regular_level3_to_level4_male+regular_level4_to_level5_male) as reg_total_m,
                    sum(regular_level1_to_level2_female+regular_level2_to_level3_female+regular_level3_to_level4_female+regular_level4_to_level5_female) as reg_total_f,
                    sum(extension_level1_to_level2_male) as ext_l1_m,
                    sum(extension_level1_to_level2_female) as ext_l1_f,
                    sum(extension_level2_to_level3_male) as ext_l2_m,
                    sum(extension_level2_to_level3_female) as ext_l2_f,
                    sum(extension_level3_to_level4_male) as ext_l3_m,
                    sum(extension_level3_to_level4_female) as ext_l3_f,
                    sum(extension_level4_to_level5_male) as ext_l4_m,
                    sum(extension_level4_to_level5_female) as ext_l4_f,
                    sum(extension_level1_to_level2_male+extension_level2_to_level3_male+extension_level3_to_level4_male+extension_level4_to_level5_male) as ext_total_m,
                    sum(extension_level1_to_level2_female+extension_level2_to_level3_female+extension_level3_to_level4_female+extension_level4_to_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromAssessmentTransferees($subsector_id)
    {
        $result = AssessmentTransferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromAssessmentTransferees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', AssessmentTransferee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromAssessmentTransferees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', AssessmentTransferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromAssessmentGraduates($subsector_id)
    {
        $result = AssessmentGraduate::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromAssessmentGraduates($subsector_id)
    {
        $result = AssessmentGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromAssessmentGraduates($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', AssessmentGraduate::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromAssessmentGraduates()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', AssessmentGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromAssessmentShortTermTrainees($subsector_id)
    {
        $result = AssessmentShortTermTrainee::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromAssessmentShortTermTrainees($subsector_id)
    {
        $result = AssessmentShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromAssessmentShortTermTrainees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromAssessmentShortTermTrainees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', AssessmentShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromCooperativeTrainingTransferees($subsector_id)
    {
        $result = CooperativeTrainingTransferee::select(
            DB::Raw('
                    sum(regular_level1_to_level2_male) as reg_l1_m,
                    sum(regular_level1_to_level2_female) as reg_l1_f,
                    sum(regular_level2_to_level3_male) as reg_l2_m,
                    sum(regular_level2_to_level3_female) as reg_l2_f,
                    sum(regular_level3_to_level4_male) as reg_l3_m,
                    sum(regular_level3_to_level4_female) as reg_l3_f,
                    sum(regular_level4_to_level5_male) as reg_l4_m,
                    sum(regular_level4_to_level5_female) as reg_l4_f,
                    sum(regular_level1_to_level2_male+regular_level2_to_level3_male+regular_level3_to_level4_male+regular_level4_to_level5_male) as reg_total_m,
                    sum(regular_level1_to_level2_female+regular_level2_to_level3_female+regular_level3_to_level4_female+regular_level4_to_level5_female) as reg_total_f,
                    sum(extension_level1_to_level2_male) as ext_l1_m,
                    sum(extension_level1_to_level2_female) as ext_l1_f,
                    sum(extension_level2_to_level3_male) as ext_l2_m,
                    sum(extension_level2_to_level3_female) as ext_l2_f,
                    sum(extension_level3_to_level4_male) as ext_l3_m,
                    sum(extension_level3_to_level4_female) as ext_l3_f,
                    sum(extension_level4_to_level5_male) as ext_l4_m,
                    sum(extension_level4_to_level5_female) as ext_l4_f,
                    sum(extension_level1_to_level2_male+extension_level2_to_level3_male+extension_level3_to_level4_male+extension_level4_to_level5_male) as ext_total_m,
                    sum(extension_level1_to_level2_female+extension_level2_to_level3_female+extension_level3_to_level4_female+extension_level4_to_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromCooperativeTrainingTransferees($subsector_id)
    {
        $result = CooperativeTrainingTransferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromCooperativeTrainingTransferees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', CooperativeTrainingTransferee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromCooperativeTrainingTransferees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', CooperativeTrainingTransferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromCooperativeTrainingGraduates($subsector_id)
    {
        $result = CooperativeTrainingGraduate::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromCooperativeTrainingGraduates($subsector_id)
    {
        $result = CooperativeTrainingGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromCooperativeTrainingGraduates($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', CooperativeTrainingGraduate::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromCooperativeTrainingGraduates()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', CooperativeTrainingGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromCooperativeTrainingShortTermTrainees($subsector_id)
    {
        $result = CooperativeTrainingShortTermTrainee::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromCooperativeTrainingShortTermTrainees($subsector_id)
    {
        $result = CooperativeTrainingShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromCooperativeTrainingShortTermTrainees($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', CooperativeTrainingShortTermTrainee::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromCooperativeTrainingShortTermTrainees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', CooperativeTrainingShortTermTrainee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumSubsectorsFromSavingTransferees($sector_id)
    {
        $result = SavingTransferee::select(
            DB::Raw('
                    sum(regular_level1_to_level2_male) as reg_l1_m,
                    sum(regular_level1_to_level2_female) as reg_l1_f,
                    sum(regular_level2_to_level3_male) as reg_l2_m,
                    sum(regular_level2_to_level3_female) as reg_l2_f,
                    sum(regular_level3_to_level4_male) as reg_l3_m,
                    sum(regular_level3_to_level4_female) as reg_l3_f,
                    sum(regular_level4_to_level5_male) as reg_l4_m,
                    sum(regular_level4_to_level5_female) as reg_l4_f,
                    sum(regular_level1_to_level2_male+regular_level2_to_level3_male+regular_level3_to_level4_male+regular_level4_to_level5_male) as reg_total_m,
                    sum(regular_level1_to_level2_female+regular_level2_to_level3_female+regular_level3_to_level4_female+regular_level4_to_level5_female) as reg_total_f,
                    sum(extension_level1_to_level2_male) as ext_l1_m,
                    sum(extension_level1_to_level2_female) as ext_l1_f,
                    sum(extension_level2_to_level3_male) as ext_l2_m,
                    sum(extension_level2_to_level3_female) as ext_l2_f,
                    sum(extension_level3_to_level4_male) as ext_l3_m,
                    sum(extension_level3_to_level4_female) as ext_l3_f,
                    sum(extension_level4_to_level5_male) as ext_l4_m,
                    sum(extension_level4_to_level5_female) as ext_l4_f,
                    sum(extension_level1_to_level2_male+extension_level2_to_level3_male+extension_level3_to_level4_male+extension_level4_to_level5_male) as ext_total_m,
                    sum(extension_level1_to_level2_female+extension_level2_to_level3_female+extension_level3_to_level4_female+extension_level4_to_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('subsector_id', Subsector::where('sector_id', $sector_id)->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromSavingTransferees($sector_id)
    {
        $result = SavingTransferee::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('subsector_id', Subsector::where('sector_id', $sector_id)->lists('id'))
            ->get();

        return $result;
    }

    public function getSectorsFromSavingTransferees()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', SavingTransferee::where('report_date_id', $this->report_date_id)
                                                                    ->where('institution_id', $this->institution_id)
                                                                    ->distinct()->lists('subsector_id'))
                                        ->distinct()->lists('sector_id'))
                    ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumSubsectorsFromSavingGraduates($sector_id)
    {
        $result = SavingGraduate::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('subsector_id', Subsector::where('sector_id', $sector_id)->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromSavingGraduates($sector_id)
    {
        $result = SavingGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('subsector_id', Subsector::where('sector_id', $sector_id)->lists('id'))
            ->get();

        return $result;
    }

    public function getSectorsFromSavingGraduates()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', SavingGraduate::where('report_date_id', $this->report_date_id)
                                                                           ->where('institution_id', $this->institution_id)
                                                                           ->lists('subsector_id'))
                                            ->distinct()->lists('sector_id'))
                    ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getSumOccupationsFromJobPlacementGraduates($subsector_id)
    {
        $result = JobPlacementGraduate::select(
            DB::Raw('
                    sum(regular_level1_male) as reg_l1_m,
                    sum(regular_level1_female) as reg_l1_f,
                    sum(regular_level2_male) as reg_l2_m,
                    sum(regular_level2_female) as reg_l2_f,
                    sum(regular_level3_male) as reg_l3_m,
                    sum(regular_level3_female) as reg_l3_f,
                    sum(regular_level4_male) as reg_l4_m,
                    sum(regular_level4_female) as reg_l4_f,
                    sum(regular_level5_male) as reg_l5_m,
                    sum(regular_level5_female) as reg_l5_f,
                    sum(regular_level1_male+regular_level2_male+regular_level3_male+regular_level4_male+regular_level5_male) as reg_total_m,
                    sum(regular_level1_female+regular_level2_female+regular_level3_female+regular_level4_female+regular_level5_female) as reg_total_f,
                    sum(extension_level1_male) as ext_l1_m,
                    sum(extension_level1_female) as ext_l1_f,
                    sum(extension_level2_male) as ext_l2_m,
                    sum(extension_level2_female) as ext_l2_f,
                    sum(extension_level3_male) as ext_l3_m,
                    sum(extension_level3_female) as ext_l3_f,
                    sum(extension_level4_male) as ext_l4_m,
                    sum(extension_level4_female) as ext_l4_f,
                    sum(extension_level5_male) as ext_l5_m,
                    sum(extension_level5_female) as ext_l5_f,
                    sum(extension_level1_male+extension_level2_male+extension_level3_male+extension_level4_male+extension_level5_male) as ext_total_m,
                    sum(extension_level1_female+extension_level2_female+extension_level3_female+extension_level4_female+extension_level5_female) as ext_total_f
                    '
            )
        )
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getOccupationsFromJobPlacementGraduates($subsector_id)
    {
        $result = JobPlacementGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', Occupation::where('subsector_id', $subsector_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function getSubsectorsFromJobPlacementGraduates($sector_id)
    {
        $result = Subsector::where('sector_id', $sector_id)
            ->whereIn('id', Occupation::select('subsector_id')
                ->whereIn('id', JobPlacementGraduate::where('report_date_id', $this->report_date_id)
                    ->where('institution_id', $this->institution_id)
                    ->lists('occupation_id'))->distinct()->lists('subsector_id'))
            ->get();

        return $result;
    }

    public function getSectorsFromJobPlacementGraduates()
    {
        $result = Sector::whereIn('id', Subsector::whereIn('id', Occupation::whereIn('id', JobPlacementGraduate::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->lists('occupation_id'))
            ->distinct()->lists('subsector_id'))
            ->distinct()->lists('sector_id'))
            ->distinct()->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getEntriesFromActionResearches()
    {
        $result = ActionResearch::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }
    // *******************************************************************

    // *******************************************************************
    public function getEntriesFromTracerStudies()
    {
        $result = TracerStudy::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }
    // *******************************************************************

}
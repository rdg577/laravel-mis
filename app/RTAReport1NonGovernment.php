<?php
/**
 * Created by PhpStorm.
 * User: tata
 * Date: 7/22/2016
 * Time: 9:34 AM
 */

namespace App;

use Illuminate\Support\Facades\DB;

class RTAReport1NonGovernment {
    protected $report_date_id;
    protected $region_id;

    public function __construct($param_report_date_id, $param_region_id)
    {
        $this->report_date_id = $param_report_date_id;
        $this->region_id = $param_region_id;
    }

    /* New Enrollees */
    public function getRegularNewEnrolleesByOccupation($occupation_id)
    {

        $result = NewEnrollee::select(
                    DB::raw('
                        sum(regular_level1_male) as reg_level1_male,
                        sum(regular_level1_female) as reg_level1_female,
                        sum(regular_level1_male) + sum(regular_level1_female) as reg_level1_total,
                        sum(regular_level2_male) as reg_level2_male,
                        sum(regular_level2_female) as reg_level2_female,
                        sum(regular_level2_male) + sum(regular_level2_female) as reg_level2_total,
                        sum(regular_level3_male) as reg_level3_male,
                        sum(regular_level3_female) as reg_level3_female,
                        sum(regular_level3_male) + sum(regular_level3_female) as reg_level3_total,
                        sum(regular_level4_male) as reg_level4_male,
                        sum(regular_level4_female) as reg_level4_female,
                        sum(regular_level4_male) + sum(regular_level4_female) as reg_level4_total,
                        sum(regular_level5_male) as reg_level5_male,
                        sum(regular_level5_female) as reg_level5_female,
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getExtensionNewEnrolleesByOccupation($occupation_id)
    {

        $result = NewEnrollee::select(
            DB::raw('
                        sum(extension_level1_male) as ext_level1_male,
                        sum(extension_level1_female) as ext_level1_female,
                        sum(extension_level1_male) + sum(extension_level1_female) as ext_level1_total,
                        sum(extension_level2_male) as ext_level2_male,
                        sum(extension_level2_female) as ext_level2_female,
                        sum(extension_level2_male) + sum(extension_level2_female) as ext_level2_total,
                        sum(extension_level3_male) as ext_level3_male,
                        sum(extension_level3_female) as ext_level3_female,
                        sum(extension_level3_male) + sum(extension_level3_female) as ext_level3_total,
                        sum(extension_level4_male) as ext_level4_male,
                        sum(extension_level4_female) as ext_level4_female,
                        sum(extension_level4_male) + sum(extension_level4_female) as ext_level4_total,
                        sum(extension_level5_male) as ext_level5_male,
                        sum(extension_level5_female) as ext_level5_female,
                        sum(extension_level5_male) + sum(extension_level5_female) as ext_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* Re-Enrollees */
    public function getRegularReEnrolleesByOccupation($occupation_id)
    {

        $result = ReEnrollee::select(
            DB::raw('
                        sum(regular_level1_male) as reg_level1_male,
                        sum(regular_level1_female) as reg_level1_female,
                        sum(regular_level1_male) + sum(regular_level1_female) as reg_level1_total,
                        sum(regular_level2_male) as reg_level2_male,
                        sum(regular_level2_female) as reg_level2_female,
                        sum(regular_level2_male) + sum(regular_level2_female) as reg_level2_total,
                        sum(regular_level3_male) as reg_level3_male,
                        sum(regular_level3_female) as reg_level3_female,
                        sum(regular_level3_male) + sum(regular_level3_female) as reg_level3_total,
                        sum(regular_level4_male) as reg_level4_male,
                        sum(regular_level4_female) as reg_level4_female,
                        sum(regular_level4_male) + sum(regular_level4_female) as reg_level4_total,
                        sum(regular_level5_male) as reg_level5_male,
                        sum(regular_level5_female) as reg_level5_female,
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getExtensionReEnrolleesByOccupation($occupation_id)
    {

        $result = ReEnrollee::select(
            DB::raw('
                        sum(extension_level1_male) as ext_level1_male,
                        sum(extension_level1_female) as ext_level1_female,
                        sum(extension_level1_male) + sum(extension_level1_female) as ext_level1_total,
                        sum(extension_level2_male) as ext_level2_male,
                        sum(extension_level2_female) as ext_level2_female,
                        sum(extension_level2_male) + sum(extension_level2_female) as ext_level2_total,
                        sum(extension_level3_male) as ext_level3_male,
                        sum(extension_level3_female) as ext_level3_female,
                        sum(extension_level3_male) + sum(extension_level3_female) as ext_level3_total,
                        sum(extension_level4_male) as ext_level4_male,
                        sum(extension_level4_female) as ext_level4_female,
                        sum(extension_level4_male) + sum(extension_level4_female) as ext_level4_total,
                        sum(extension_level5_male) as ext_level5_male,
                        sum(extension_level5_female) as ext_level5_female,
                        sum(extension_level5_male) + sum(extension_level5_female) as ext_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* Transferees */
    public function getRegularTransfereesByOccupation($occupation_id)
    {

        $result = Transferee::select(
            DB::raw('
                        sum(regular_level1_to_level2_male) as reg_level1_to_level2_male,
                        sum(regular_level1_to_level2_female) as reg_level1_to_level2_female,
                        sum(regular_level1_to_level2_male) + sum(regular_level1_to_level2_female) as reg_level1_to_level2_total,
                        sum(regular_level2_to_level3_male) as reg_level2_to_level3_male,
                        sum(regular_level2_to_level3_female) as reg_level2_to_level3_female,
                        sum(regular_level2_to_level3_male) + sum(regular_level2_to_level3_female) as reg_level2_to_level3_total,
                        sum(regular_level3_to_level4_male) as reg_level3_to_level4_male,
                        sum(regular_level3_to_level4_female) as reg_level3_to_level4_female,
                        sum(regular_level3_to_level4_male) + sum(regular_level3_to_level4_female) as reg_level3_to_level4_total,
                        sum(regular_level4_to_level5_male) as reg_level4_to_level5_male,
                        sum(regular_level4_to_level5_female) as reg_level4_to_level5_female,
                        sum(regular_level4_to_level5_male) + sum(regular_level4_to_level5_female) as reg_level4_to_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getExtensionTransfereesByOccupation($occupation_id)
    {

        $result = Transferee::select(
            DB::raw('
                        sum(extension_level1_to_level2_male) as ext_level1_to_level2_male,
                        sum(extension_level1_to_level2_female) as ext_level1_to_level2_female,
                        sum(extension_level1_to_level2_male) + sum(extension_level1_to_level2_female) as ext_level1_to_level2_total,
                        sum(extension_level2_to_level3_male) as ext_level2_to_level3_male,
                        sum(extension_level2_to_level3_female) as ext_level2_to_level3_female,
                        sum(extension_level2_to_level3_male) + sum(extension_level2_to_level3_female) as ext_level2_to_level3_total,
                        sum(extension_level3_to_level4_male) as ext_level3_to_level4_male,
                        sum(extension_level3_to_level4_female) as ext_level3_to_level4_female,
                        sum(extension_level3_to_level4_male) + sum(extension_level3_to_level4_female) as ext_level3_to_level4_total,
                        sum(extension_level4_to_level5_male) as ext_level4_to_level5_male,
                        sum(extension_level4_to_level5_female) as ext_level4_to_level5_female,
                        sum(extension_level4_to_level5_male) + sum(extension_level4_to_level5_female) as ext_level4_to_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* Graduates */
    public function getRegularGraduatesByOccupation($occupation_id)
    {

        $result = Graduate::select(
            DB::raw('
                        sum(regular_level1_male) as reg_level1_male,
                        sum(regular_level1_female) as reg_level1_female,
                        sum(regular_level1_male) + sum(regular_level1_female) as reg_level1_total,
                        sum(regular_level2_male) as reg_level2_male,
                        sum(regular_level2_female) as reg_level2_female,
                        sum(regular_level2_male) + sum(regular_level2_female) as reg_level2_total,
                        sum(regular_level3_male) as reg_level3_male,
                        sum(regular_level3_female) as reg_level3_female,
                        sum(regular_level3_male) + sum(regular_level3_female) as reg_level3_total,
                        sum(regular_level4_male) as reg_level4_male,
                        sum(regular_level4_female) as reg_level4_female,
                        sum(regular_level4_male) + sum(regular_level4_female) as reg_level4_total,
                        sum(regular_level5_male) as reg_level5_male,
                        sum(regular_level5_female) as reg_level5_female,
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getExtensionGraduatesByOccupation($occupation_id)
    {

        $result = Graduate::select(
            DB::raw('
                        sum(extension_level1_male) as ext_level1_male,
                        sum(extension_level1_female) as ext_level1_female,
                        sum(extension_level1_male) + sum(extension_level1_female) as ext_level1_total,
                        sum(extension_level2_male) as ext_level2_male,
                        sum(extension_level2_female) as ext_level2_female,
                        sum(extension_level2_male) + sum(extension_level2_female) as ext_level2_total,
                        sum(extension_level3_male) as ext_level3_male,
                        sum(extension_level3_female) as ext_level3_female,
                        sum(extension_level3_male) + sum(extension_level3_female) as ext_level3_total,
                        sum(extension_level4_male) as ext_level4_male,
                        sum(extension_level4_female) as ext_level4_female,
                        sum(extension_level4_male) + sum(extension_level4_female) as ext_level4_total,
                        sum(extension_level5_male) as ext_level5_male,
                        sum(extension_level5_female) as ext_level5_female,
                        sum(extension_level5_male) + sum(extension_level5_female) as ext_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* ShortTermTrainees */
    public function getShortTermTraineesByOccupation($occupation_id)
    {

        $result = ShortTermTrainee::select(
            DB::raw('
                        sum(registered_male) as registered_male,
                        sum(registered_female) as registered_female,
                        sum(registered_male) + sum(registered_female) as registered_total,
                        sum(started_training_male) as started_training_male,
                        sum(started_training_female) as started_training_female,
                        sum(started_training_male) + sum(started_training_female) as started_training_total,
                        sum(completed_training_male) as completed_training_male,
                        sum(completed_training_female) as completed_training_female,
                        sum(completed_training_male) + sum(completed_training_female) as completed_training_total,
                        sum(sent_assessment_male) as sent_assessment_male,
                        sum(sent_assessment_female) as sent_assessment_female,
                        sum(sent_assessment_male) + sum(sent_assessment_female) as sent_assessment_total,
                        sum(assessed_male) as assessed_male,
                        sum(assessed_female) as assessed_female,
                        sum(assessed_male) + sum(assessed_female) as assessed_total,
                        sum(competent_male) as competent_male,
                        sum(competent_female) as competent_female,
                        sum(competent_male) + sum(competent_female) as competent_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* Dropout Transferees */
    public function getRegularDropoutTransfereesByOccupation($occupation_id)
    {
        $result = DropoutTransferee::select(
            DB::raw('
                        sum(regular_level1_to_level2_male) as reg_level1_to_level2_male,
                        sum(regular_level1_to_level2_female) as reg_level1_to_level2_female,
                        sum(regular_level1_to_level2_male) + sum(regular_level1_to_level2_female) as reg_level1_to_level2_total,
                        sum(regular_level2_to_level3_male) as reg_level2_to_level3_male,
                        sum(regular_level2_to_level3_female) as reg_level2_to_level3_female,
                        sum(regular_level2_to_level3_male) + sum(regular_level2_to_level3_female) as reg_level2_to_level3_total,
                        sum(regular_level3_to_level4_male) as reg_level3_to_level4_male,
                        sum(regular_level3_to_level4_female) as reg_level3_to_level4_female,
                        sum(regular_level3_to_level4_male) + sum(regular_level3_to_level4_female) as reg_level3_to_level4_total,
                        sum(regular_level4_to_level5_male) as reg_level4_to_level5_male,
                        sum(regular_level4_to_level5_female) as reg_level4_to_level5_female,
                        sum(regular_level4_to_level5_male) + sum(regular_level4_to_level5_female) as reg_level4_to_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getExtensionDropoutTransfereesByOccupation($occupation_id)
    {
        $result = DropoutTransferee::select(
            DB::raw('
                        sum(extension_level1_to_level2_male) as ext_level1_to_level2_male,
                        sum(extension_level1_to_level2_female) as ext_level1_to_level2_female,
                        sum(extension_level1_to_level2_male) + sum(extension_level1_to_level2_female) as ext_level1_to_level2_total,
                        sum(extension_level2_to_level3_male) as ext_level2_to_level3_male,
                        sum(extension_level2_to_level3_female) as ext_level2_to_level3_female,
                        sum(extension_level2_to_level3_male) + sum(extension_level2_to_level3_female) as ext_level2_to_level3_total,
                        sum(extension_level3_to_level4_male) as ext_level3_to_level4_male,
                        sum(extension_level3_to_level4_female) as ext_level3_to_level4_female,
                        sum(extension_level3_to_level4_male) + sum(extension_level3_to_level4_female) as ext_level3_to_level4_total,
                        sum(extension_level4_to_level5_male) as ext_level4_to_level5_male,
                        sum(extension_level4_to_level5_female) as ext_level4_to_level5_female,
                        sum(extension_level4_to_level5_male) + sum(extension_level4_to_level5_female) as ext_level4_to_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* Dropout Graduates */
    public function getRegularDropoutGraduatesByOccupation($occupation_id)
    {

        $result = DropoutGraduate::select(
            DB::raw('
                        sum(regular_level1_male) as reg_level1_male,
                        sum(regular_level1_female) as reg_level1_female,
                        sum(regular_level1_male) + sum(regular_level1_female) as reg_level1_total,
                        sum(regular_level2_male) as reg_level2_male,
                        sum(regular_level2_female) as reg_level2_female,
                        sum(regular_level2_male) + sum(regular_level2_female) as reg_level2_total,
                        sum(regular_level3_male) as reg_level3_male,
                        sum(regular_level3_female) as reg_level3_female,
                        sum(regular_level3_male) + sum(regular_level3_female) as reg_level3_total,
                        sum(regular_level4_male) as reg_level4_male,
                        sum(regular_level4_female) as reg_level4_female,
                        sum(regular_level4_male) + sum(regular_level4_female) as reg_level4_total,
                        sum(regular_level5_male) as reg_level5_male,
                        sum(regular_level5_female) as reg_level5_female,
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getExtensionDropoutGraduatesByOccupation($occupation_id)
    {

        $result = DropoutGraduate::select(
            DB::raw('
                        sum(extension_level1_male) as ext_level1_male,
                        sum(extension_level1_female) as ext_level1_female,
                        sum(extension_level1_male) + sum(extension_level1_female) as ext_level1_total,
                        sum(extension_level2_male) as ext_level2_male,
                        sum(extension_level2_female) as ext_level2_female,
                        sum(extension_level2_male) + sum(extension_level2_female) as ext_level2_total,
                        sum(extension_level3_male) as ext_level3_male,
                        sum(extension_level3_female) as ext_level3_female,
                        sum(extension_level3_male) + sum(extension_level3_female) as ext_level3_total,
                        sum(extension_level4_male) as ext_level4_male,
                        sum(extension_level4_female) as ext_level4_female,
                        sum(extension_level4_male) + sum(extension_level4_female) as ext_level4_total,
                        sum(extension_level5_male) as ext_level5_male,
                        sum(extension_level5_female) as ext_level5_female,
                        sum(extension_level5_male) + sum(extension_level5_female) as ext_level5_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
} 
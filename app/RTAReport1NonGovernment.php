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

    /* Dropout Short-term Trainees */
    public function getRegularDropoutShortTermTraineesByOccupation($occupation_id)
    {

        $result = DropoutShortTermTrainee::select(
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
    public function getExtensionDropoutShortTermTraineesByOccupation($occupation_id)
    {

        $result = DropoutShortTermTrainee::select(
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

    /* Assessment Transferees */
    public function getRegularAssessmentTransfereesByOccupation($occupation_id)
    {
        $result = AssessmentTransferee::select(
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
    public function getExtensionAssessmentTransfereesByOccupation($occupation_id)
    {
        $result = AssessmentTransferee::select(
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

    /* Assessment Graduates */
    public function getRegularAssessmentGraduatesByOccupation($occupation_id)
    {

        $result = AssessmentGraduate::select(
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
    public function getExtensionAssessmentGraduatesByOccupation($occupation_id)
    {

        $result = AssessmentGraduate::select(
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

    /* Assessment Short-term Trainees */
    public function getRegularAssessmentShortTermTraineesByOccupation($occupation_id)
    {

        $result = AssessmentShortTermTrainee::select(
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
    public function getExtensionAssessmentShortTermTraineesByOccupation($occupation_id)
    {

        $result = AssessmentShortTermTrainee::select(
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

    /* Cooperative Training with Industry Partners */
    public function getCooperativeTrainingWithIndustryPartnersByOccupation($occupation_id)
    {

        $result = CooperativeTraining::where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* CooperativeTraining Transferees */
    public function getRegularCooperativeTrainingTransfereesByOccupation($occupation_id)
    {
        $result = CooperativeTrainingTransferee::select(
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
    public function getExtensionCooperativeTrainingTransfereesByOccupation($occupation_id)
    {
        $result = CooperativeTrainingTransferee::select(
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

    /* CooperativeTraining Graduates */
    public function getRegularCooperativeTrainingGraduatesByOccupation($occupation_id)
    {

        $result = CooperativeTrainingGraduate::select(
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
    public function getExtensionCooperativeTrainingGraduatesByOccupation($occupation_id)
    {

        $result = CooperativeTrainingGraduate::select(
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

    /* CooperativeTraining Short-term Trainees */
    public function getRegularCooperativeTrainingShortTermTraineesByOccupation($occupation_id)
    {

        $result = CooperativeTrainingShortTermTrainee::select(
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
    public function getExtensionCooperativeTrainingShortTermTraineesByOccupation($occupation_id)
    {

        $result = CooperativeTrainingShortTermTrainee::select(
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

    /* Saving Transferees */
    public function getRegularSavingTransfereesByOccupation($occupation_id)
    {
        $result = SavingTransferee::select(
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
    public function getExtensionSavingTransfereesByOccupation($occupation_id)
    {
        $result = SavingTransferee::select(
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
    public function getRegExtSavingTransfereesByOccupation($occupation_id)
    {
        $result = SavingTransferee::select(
            DB::raw('
                        sum(regular_level1_to_level2_saving) as reg_level1_to_level2_saving,
                        sum(regular_level2_to_level3_saving) as reg_level2_to_level3_saving,
                        sum(regular_level3_to_level4_saving) as reg_level3_to_level4_saving,
                        sum(regular_level4_to_level5_saving) as reg_level4_to_level5_saving,
                        sum(extension_level1_to_level2_saving) as ext_level1_to_level2_saving,
                        sum(extension_level2_to_level3_saving) as ext_level2_to_level3_saving,
                        sum(extension_level3_to_level4_saving) as ext_level3_to_level4_saving,
                        sum(extension_level4_to_level5_saving) as ext_level4_to_level5_saving'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* Saving Graduates */
    public function getRegularSavingGraduatesByOccupation($occupation_id)
    {

        $result = SavingGraduate::select(
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
    public function getExtensionSavingGraduatesByOccupation($occupation_id)
    {

        $result = SavingGraduate::select(
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
    public function getRegExtSavingGraduatesByOccupation($occupation_id)
    {
        $result = SavingGraduate::select(
            DB::raw('
                        sum(regular_level1_saving) as reg_l1_saving,
                        sum(regular_level2_saving) as reg_l2_saving,
                        sum(regular_level3_saving) as reg_l3_saving,
                        sum(regular_level4_saving) as reg_l4_saving,
                        sum(regular_level5_saving) as reg_l5_saving,
                        sum(extension_level1_saving) as ext_l1_saving,
                        sum(extension_level2_saving) as ext_l2_saving,
                        sum(extension_level3_saving) as ext_l3_saving,
                        sum(extension_level4_saving) as ext_l4_saving,
                        sum(extension_level5_saving) as ext_l5_saving'))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* JobPlacement Graduates */
    public function getRegularJobPlacementGraduatesByOccupation($occupation_id)
    {

        $result = JobPlacementGraduate::select(
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total
                    '))
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getExtensionJobPlacementGraduatesByOccupation($occupation_id)
    {

        $result = JobPlacementGraduate::select(
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

    /* Trainers */
    public function getTrainersLevelAByOccupation($occupation_id)
    {
        $result = Trainer::where('level', 'Level A')
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->distinct()->get();

        return $result;
    }
    public function getTrainersLevelBByOccupation($occupation_id)
    {
        $result = Trainer::where('level', 'Level B')
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }
    public function getTrainersLevelCByOccupation($occupation_id)
    {
        $result = Trainer::where('level', 'Level C')
            ->where('report_date_id', $this->report_date_id)
            ->where('occupation_id', $occupation_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* IndustryExtension 1 */
    public function getIndustryExtension1BySubsector($subsector_id)
    {
        $result = IndustryExtension1::where('report_date_id', $this->report_date_id)
            ->where('subsector_id', $subsector_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* IndustryExtension 2 */
    public function getIndustryExtension2BySubsector($subsector_id)
    {
        $result = IndustryExtension2::where('report_date_id', $this->report_date_id)
            ->where('subsector_id', $subsector_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* IndustryExtension 3 */
    public function getIndustryExtension3BySubsector($subsector_id)
    {
        $result = IndustryExtension3::where('report_date_id', $this->report_date_id)
            ->where('subsector_id', $subsector_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* IndustryExtension 4 */
    public function getIndustryExtension4BySubsector($subsector_id)
    {
        $result = IndustryExtension4::where('report_date_id', $this->report_date_id)
            ->where('subsector_id', $subsector_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

    /* IndustryExtension 5 */
    public function getIndustryExtension5BySubsector($subsector_id, $ie_field)
    {
        $result = IndustryExtension5::where('ie_field', $ie_field)->where('report_date_id', $this->report_date_id)
            ->where('subsector_id', $subsector_id)
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->where('ownership', '!=', 'Public')
                ->lists('id'))
            ->get();

        return $result;
    }

} 
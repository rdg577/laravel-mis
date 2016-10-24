<?php
/**
 * Created by PhpStorm.
 * User: tata
 * Date: 7/22/2016
 * Time: 9:34 AM
 */

namespace App;

use Illuminate\Support\Facades\DB;

class RTAReport2NonGovernment {
    protected $report_date_id;
    protected $region_id;

    public function __construct($param_report_date_id, $param_region_id)
    {
        $this->report_date_id = $param_report_date_id;
        $this->region_id = $param_region_id;
    }

    /* New Enrollees */
    public function getNewEnrolleesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;

    }

    /* Re-Enrollees */
    public function getReEnrolleesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* Transferees */
    public function getTransfereesByInstitutionID($institution_id)
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
                        sum(regular_level4_to_level5_male) + sum(regular_level4_to_level5_female) as reg_level4_to_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* Graduates */
    public function getGraduatesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* ShortTermTrainees */
    public function getShortTermTraineesByInstitutionID($institution_id)
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* Dropout Transferees */
    public function getDropoutTransfereesByInstitutionID($institution_id)
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
                        sum(regular_level4_to_level5_male) + sum(regular_level4_to_level5_female) as reg_level4_to_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* Dropout Graduates */
    public function getDropoutGraduatesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* DropoutShortTermTrainee */
    public function getDropoutShortTermTraineesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* AssessmentTransferee */
    public function getAssessmentTransfereesByInstitutionID($institution_id)
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
                        sum(regular_level4_to_level5_male) + sum(regular_level4_to_level5_female) as reg_level4_to_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* AssessmentGraduate */
    public function getAssessmentGraduatesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* AssessmentShortTermTrainee */
    public function getAssessmentShortTermTraineesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* CooperativeTrainingTransferee */
    public function getCooperativeTrainingTransfereesByInstitutionID($institution_id)
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
                        sum(regular_level4_to_level5_male) + sum(regular_level4_to_level5_female) as reg_level4_to_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* CooperativeTrainingGraduate */
    public function getCooperativeTrainingGraduatesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* CooperativeTrainingShortTermTrainee */
    public function getCooperativeTrainingShortTermTraineesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* SavingTransferee */
    public function getSavingTransfereesByInstitutionID($institution_id)
    {

        $result = SavingTransferee::select(
            DB::raw('
                        sum(regular_level1_to_level2_male) as reg_level1_to_level2_male,
                        sum(regular_level1_to_level2_female) as reg_level1_to_level2_female,
                        sum(regular_level1_to_level2_male) + sum(regular_level1_to_level2_female) as reg_level1_to_level2_total,
                        sum(regular_level1_to_level2_saving) as reg_level1_to_level2_saving,
                        sum(regular_level2_to_level3_male) as reg_level2_to_level3_male,
                        sum(regular_level2_to_level3_female) as reg_level2_to_level3_female,
                        sum(regular_level2_to_level3_male) + sum(regular_level2_to_level3_female) as reg_level2_to_level3_total,
                        sum(regular_level2_to_level3_saving) as reg_level2_to_level3_saving,
                        sum(regular_level3_to_level4_male) as reg_level3_to_level4_male,
                        sum(regular_level3_to_level4_female) as reg_level3_to_level4_female,
                        sum(regular_level3_to_level4_male) + sum(regular_level3_to_level4_female) as reg_level3_to_level4_total,
                        sum(regular_level3_to_level4_saving) as reg_level3_to_level4_saving,
                        sum(regular_level4_to_level5_male) as reg_level4_to_level5_male,
                        sum(regular_level4_to_level5_female) as reg_level4_to_level5_female,
                        sum(regular_level4_to_level5_male) + sum(regular_level4_to_level5_female) as reg_level4_to_level5_total,
                        sum(regular_level4_to_level5_saving) as reg_level4_to_level5_saving,
                        sum(extension_level1_to_level2_male) as ext_level1_to_level2_male,
                        sum(extension_level1_to_level2_female) as ext_level1_to_level2_female,
                        sum(extension_level1_to_level2_male) + sum(extension_level1_to_level2_female) as ext_level1_to_level2_total,
                        sum(extension_level1_to_level2_saving) as ext_level1_to_level2_saving,
                        sum(extension_level2_to_level3_male) as ext_level2_to_level3_male,
                        sum(extension_level2_to_level3_female) as ext_level2_to_level3_female,
                        sum(extension_level2_to_level3_male) + sum(extension_level2_to_level3_female) as ext_level2_to_level3_total,
                        sum(extension_level2_to_level3_saving) as ext_level2_to_level3_saving,
                        sum(extension_level3_to_level4_male) as ext_level3_to_level4_male,
                        sum(extension_level3_to_level4_female) as ext_level3_to_level4_female,
                        sum(extension_level3_to_level4_male) + sum(extension_level3_to_level4_female) as ext_level3_to_level4_total,
                        sum(extension_level3_to_level4_saving) as ext_level3_to_level4_saving,
                        sum(extension_level4_to_level5_male) as ext_level4_to_level5_male,
                        sum(extension_level4_to_level5_female) as ext_level4_to_level5_female,
                        sum(extension_level4_to_level5_male) + sum(extension_level4_to_level5_female) as ext_level4_to_level5_total,
                        sum(extension_level4_to_level5_saving) as ext_level4_to_level5_saving'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* SavingGraduate */
    public function getSavingGraduatesByInstitutionID($institution_id)
    {

        $result = SavingGraduate::select(
            DB::raw('
                        sum(regular_level1_male) as reg_level1_male,
                        sum(regular_level1_female) as reg_level1_female,
                        sum(regular_level1_male) + sum(regular_level1_female) as reg_level1_total,
                        sum(regular_level1_saving) as reg_level1_saving,

                        sum(regular_level2_male) as reg_level2_male,
                        sum(regular_level2_female) as reg_level2_female,
                        sum(regular_level2_male) + sum(regular_level2_female) as reg_level2_total,
                        sum(regular_level2_saving) as reg_level2_saving,

                        sum(regular_level3_male) as reg_level3_male,
                        sum(regular_level3_female) as reg_level3_female,
                        sum(regular_level3_male) + sum(regular_level3_female) as reg_level3_total,
                        sum(regular_level3_saving) as reg_level3_saving,

                        sum(regular_level4_male) as reg_level4_male,
                        sum(regular_level4_female) as reg_level4_female,
                        sum(regular_level4_male) + sum(regular_level4_female) as reg_level4_total,
                        sum(regular_level4_saving) as reg_level4_saving,

                        sum(regular_level5_male) as reg_level5_male,
                        sum(regular_level5_female) as reg_level5_female,
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
                        sum(regular_level5_saving) as reg_level5_saving,

                        sum(extension_level1_male) as ext_level1_male,
                        sum(extension_level1_female) as ext_level1_female,
                        sum(extension_level1_male) + sum(extension_level1_female) as ext_level1_total,
                        sum(extension_level1_saving) as ext_level1_saving,

                        sum(extension_level2_male) as ext_level2_male,
                        sum(extension_level2_female) as ext_level2_female,
                        sum(extension_level2_male) + sum(extension_level2_female) as ext_level2_total,
                        sum(extension_level2_saving) as ext_level2_saving,

                        sum(extension_level3_male) as ext_level3_male,
                        sum(extension_level3_female) as ext_level3_female,
                        sum(extension_level3_male) + sum(extension_level3_female) as ext_level3_total,
                        sum(extension_level3_saving) as ext_level3_saving,

                        sum(extension_level4_male) as ext_level4_male,
                        sum(extension_level4_female) as ext_level4_female,
                        sum(extension_level4_male) + sum(extension_level4_female) as ext_level4_total,
                        sum(extension_level4_saving) as ext_level4_saving,

                        sum(extension_level5_male) as ext_level5_male,
                        sum(extension_level5_female) as ext_level5_female,
                        sum(extension_level5_male) + sum(extension_level5_female) as ext_level5_total,
                        sum(extension_level5_saving) as ext_level5_saving'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

    /* JobPlacementGraduate */
    public function getJobPlacementGraduatesByInstitutionID($institution_id)
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
                        sum(regular_level5_male) + sum(regular_level5_female) as reg_level5_total,
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
            ->where('institution_id', $institution_id)
            ->get();

        return $result;
    }

} 
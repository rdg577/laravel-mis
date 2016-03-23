<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/7/15
 * Time: 4:45 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class TVIIndicatorIndustryExtension {

    protected $institution_id;
    protected $report_date_id;

    public function __construct($param1, $param2)
    {
        $this->institution_id = $param1;
        $this->report_date_id = $param2;
    }

    /*
     * No. of Trainers Capacitated - Kaizen
     */
    public function ie_capacitated_trainers_kaizen()
    {
        $result = IndustryExtension5::select(DB::raw(
                    'sum(level_c_male) as levelC_male,
                    sum(level_c_female) as levelC_female,
                    sum(level_b_male) as levelB_male,
                    sum(level_b_female) as levelB_female,
                    sum(level_a_male) as levelA_male,
                    sum(level_a_female) as levelA_female'))
                ->where('ie_field', 'Kaizen')
                ->where('report_date_id', $this->report_date_id)
                ->where('institution_id', $this->institution_id)
                ->get();

        return $result;
    }

    /*
     * No. of Trainers Capacitated - Entrepreneurship
     */
    public function ie_capacitated_trainers_entrepreneurship()
    {
        $result = IndustryExtension5::select(DB::raw(
            'sum(level_c_male) as levelC_male,
                    sum(level_c_female) as levelC_female,
                    sum(level_b_male) as levelB_male,
                    sum(level_b_female) as levelB_female,
                    sum(level_a_male) as levelA_male,
                    sum(level_a_female) as levelA_female'))
            ->where('ie_field', 'Entrepreneurship')
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * No. of Trainers Capacitated - Technical Skill
     */
    public function ie_capacitated_trainers_technical_skill()
    {
        $result = IndustryExtension5::select(DB::raw(
            'sum(level_c_male) as levelC_male,
                    sum(level_c_female) as levelC_female,
                    sum(level_b_male) as levelB_male,
                    sum(level_b_female) as levelB_female,
                    sum(level_a_male) as levelA_male,
                    sum(level_a_female) as levelA_female'))
            ->where('ie_field', 'Technical Skill')
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * No. of Trainers Capacitated - Technology Transfer
     */
    public function ie_capacitated_trainers_technology_transfer()
    {
        $result = IndustryExtension5::select(DB::raw(
            'sum(level_c_male) as levelC_male,
                    sum(level_c_female) as levelC_female,
                    sum(level_b_male) as levelB_male,
                    sum(level_b_female) as levelB_female,
                    sum(level_a_male) as levelA_male,
                    sum(level_a_female) as levelA_female'))
            ->where('ie_field', 'Technology Transfer')
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * No. of companies supported in IE
     */
    public function ie_companies_supported()
    {
        $result = IndustryExtension5::select(DB::raw(
                'sum(micro) as micro_companies,
                sum(small) as small_companies,
                sum(medium) as medium_companies'
            ))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * Technologies identified
     */
    public function ie_technologies_identified()
    {
        $result = IndustryExtension1::select(DB::raw(
                'sum(identified_technologies) as identified_technologies,
                sum(transferred) as transferred_technologies'
            ))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;

    }

    /*
     * MSE operators
     */
    public function ie_mse_operators()
    {
        $result = IndustryExtension2::select(DB::raw(
                'sum(starter_enterprise) as starter_enterprise,
                sum(starter_mse_operator_male) as starter_mse_operator_male,
                sum(starter_mse_operator_female) as starter_mse_operator_female,
                sum(starter_mse_operator_supported_male) as starter_mse_operator_supported_male,
                sum(starter_mse_operator_supported_female) as starter_mse_operator_supported_female,
                sum(advance_enterprise) as advance_enterprise,
                sum(advance_mse_operator_male) as advance_mse_operator_male,
                sum(advance_mse_operator_female) as advance_mse_operator_female,
                sum(advance_mse_operator_supported_male) as advance_mse_operator_supported_male,
                sum(advance_mse_operator_supported_female) as advance_mse_operator_supported_female,
                sum(competent_enterprise) as competent_enterprise,
                sum(competent_mse_operator_male) as competent_mse_operator_male,
                sum(competent_mse_operator_female) as competent_mse_operator_female,
                sum(competent_mse_operator_supported_male) as competent_mse_operator_supported_male,
                sum(competent_mse_operator_supported_female) as competent_mse_operator_supported_female'
            ))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/5/15
 * Time: 3:48 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class DataSummaryCooperativeTrainings {

    protected $institution_id;
    protected $report_date_id;

    public function __construct($param1, $param2)
    {
        $this->institution_id = $param1;
        $this->report_date_id = $param2;
    }

    public function subsectors()
    {
        $sub_sectors = Subsector::whereIn('id', Occupation::select('subsector_id')
                                                    ->whereIn('id', Trainer::select('occupation_id')
                                                                        ->where('report_date_id', $this->report_date_id)
                                                                        ->where('institution_id', $this->institution_id)
                                                                        ->distinct()
                                                                        ->lists('occupation_id'))
                                                    ->distinct()
                                                    ->lists('subsector_id'))
            ->get();

        return $sub_sectors;
    }

    public function mses($subsector_id)
    {
        $result = CooperativeTraining::where('report_date_id', $this->report_date_id)
                                    ->where('institution_id', $this->institution_id)
                                    ->whereIn('occupation_id', DB::table('occupations')
                                        ->select('id')
                                        ->where(array('subsector_id' => $subsector_id))->lists('id'))
                                    ->sum('mse_training');
        return $result;
    }

    public function mls($subsector_id)
    {
        $result = CooperativeTraining::where('report_date_id', $this->report_date_id)
                                    ->where('institution_id', $this->institution_id)
                                    ->whereIn('occupation_id', DB::table('occupations')
                                        ->select('id')
                                        ->where(array('subsector_id' => $subsector_id))->lists('id'))
                                    ->sum('ml_training');
        return $result;
    }

}
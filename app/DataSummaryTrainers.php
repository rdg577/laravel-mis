<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/3/15
 * Time: 10:50 AM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class DataSummaryTrainers {

    protected $institution_id;
    protected $report_date_id;

    public function __construct($param1, $param2)
    {
        $this->institution_id = $param1;
        $this->report_date_id = $param2;
    }

    public function subsectors()
    {
        $sub_sectors = Occupation::select('subsector_id')
                                ->whereIn('id', function ($query) {
                                        $query->select('occupation_id')
                                            ->from('trainers')
                                            ->where('report_date_id', $this->report_date_id)
                                            ->where('institution_id', $this->institution_id)
                                            ->distinct();
                                    })
                                ->distinct()
                                ->lists('subsector_id');
        return $sub_sectors;
    }

    public function levelA($subsector_id)
    {
        $occupation_ids = Occupation::select('id')
                                ->where(array('subsector_id' => $subsector_id))
                                ->lists('id');

        $level_A = Trainer::select(DB::raw('occupation_id,
                                                          SUM(full_time_male) as male,
                                                          SUM(full_time_female) as female,
                                                         (SUM(full_time_male) + SUM(full_time_female)) as total'))
                                        ->where('level', 'Level A')
                                        ->where('report_date_id', $this->report_date_id)
                                        ->where('institution_id', $this->institution_id)
                                        ->whereIn('occupation_id', $occupation_ids)
                                        ->get();
        return $level_A;
    }

    public function levelB($subsector_id)
    {
        $occupation_ids = Occupation::select('id')
                                ->where(array('subsector_id' => $subsector_id))
                                ->lists('id');

        $level_B = Trainer::select(DB::raw('occupation_id,
                                                          SUM(full_time_male) as male,
                                                          SUM(full_time_female) as female,
                                                         (SUM(full_time_male) + SUM(full_time_female)) as total'))
                                        ->where('level', 'Level B')
                                        ->where('report_date_id', $this->report_date_id)
                                        ->where('institution_id', $this->institution_id)
                                        ->whereIn('occupation_id', $occupation_ids)
                                        ->get();

        return $level_B;
    }

    public function levelC($subsector_id)
    {
        $occupation_ids = Occupation::select('id')
                                ->where(array('subsector_id' => $subsector_id))
                                ->lists('id');

        $level_C = Trainer::select(DB::raw('occupation_id,
                                                          SUM(full_time_male) as male,
                                                          SUM(full_time_female) as female,
                                                         (SUM(full_time_male) + SUM(full_time_female)) as total'))
                                        ->where('level', 'Level C')
                                        ->where('report_date_id', $this->report_date_id)
                                        ->where('institution_id', $this->institution_id)
                                        ->whereIn('occupation_id', $occupation_ids)
                                        ->get();

        return $level_C;
    }
}
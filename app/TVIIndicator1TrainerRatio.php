<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/7/15
 * Time: 8:56 AM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class TVIIndicator1TrainerRatio {

    protected $institution_id;
    protected $report_date_id;

    public function __construct($param1, $param2)
    {
        $this->institution_id = $param1;
        $this->report_date_id = $param2;
    }

    public function levelA()
    {
        $result = Trainer::select(DB::raw('sum(full_time_male) as male,
                                            sum(full_time_female) as female,
                                            sum(full_time_male) + sum(full_time_female) as total'))
            ->where('level', 'Level A')
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    public function levelB()
    {
        $result = Trainer::select(DB::raw('sum(full_time_male) as male,
                                            sum(full_time_female) as female,
                                            sum(full_time_male) + sum(full_time_female) as total'))
            ->where('level', 'Level B')
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    public function levelC()
    {
        $result = Trainer::select(DB::raw('sum(full_time_male) as male,
                                            sum(full_time_female) as female,
                                            sum(full_time_male) + sum(full_time_female) as total'))
            ->where('level', 'Level C')
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/12/15
 * Time: 4:27 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class RTAIndicatorTrainerRatio {
    protected $report_date_id;
    protected $region_id;

    public function __construct($param_report_date_id, $param_region_id)
    {
        $this->report_date_id = $param_report_date_id;
        $this->region_id = $param_region_id;
    }

    public function levelA()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = Trainer::select(DB::raw('sum(full_time_male) as male,
                                            sum(full_time_female) as female,
                                            sum(full_time_male) + sum(full_time_female) as total'))
            ->where('level', 'Level A')
            ->whereIn('report_date_id', ReportDate::select('id')
                                                    ->where('petsa', $report_date->petsa)
                                                    ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                                                    ->where('region_id', $this->region_id)
                                                    ->lists('id'))
            ->get();

        return $result;
    }

    public function levelB()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = Trainer::select(DB::raw('sum(full_time_male) as male,
                                            sum(full_time_female) as female,
                                            sum(full_time_male) + sum(full_time_female) as total'))
            ->where('level', 'Level B')
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function levelC()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = Trainer::select(DB::raw('sum(full_time_male) as male,
                                            sum(full_time_female) as female,
                                            sum(full_time_male) + sum(full_time_female) as total'))
            ->where('level', 'Level C')
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function total()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = Trainer::select(DB::raw('sum(full_time_male) as male,
                                            sum(full_time_female) as female,
                                            sum(full_time_male) + sum(full_time_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }
}
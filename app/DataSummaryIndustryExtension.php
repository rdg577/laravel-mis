<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/5/15
 * Time: 5:18 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class DataSummaryIndustryExtension {

    protected $institution_id;
    protected $report_date_id;

    public function __construct($param1, $param2)
    {
        $this->institution_id = $param1;
        $this->report_date_id = $param2;
    }

    public function subsectors()
    {
        $sub_sectors = IndustryExtension5::select('subsector_id')
                        ->where('report_date_id', $this->report_date_id)
                        ->where('institution_id', $this->institution_id)
                        ->distinct()
                        ->lists('subsector_id');

        return $sub_sectors;
    }

    public function micro($subsector_id)
    {
        $result = IndustryExtension5::where('report_date_id', $this->report_date_id)
                        ->where('institution_id', $this->institution_id)
                        ->where('subsector_id', $subsector_id)
                        ->sum('micro');

        return $result;
    }

    public function small($subsector_id)
    {
        $result = IndustryExtension5::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->where('subsector_id', $subsector_id)
            ->sum('small');

        return $result;
    }

    public function medium($subsector_id)
    {
        $result = IndustryExtension5::where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->where('subsector_id', $subsector_id)
            ->sum('medium');

        return $result;
    }
}
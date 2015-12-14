<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/5/15
 * Time: 10:27 AM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class DataSummaryTrainees {

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

    public function level1($subsector_id)
    {

        $result = FormalTraining::select(DB::raw('SUM(regular_male) as regular_male,
                                                  SUM(regular_female) as regular_female,
                                                 (SUM(regular_male) + SUM(regular_female)) as regular_total,
                                                  SUM(extension_male) as extension_male,
                                                  SUM(extension_female) as extension_female,
                                                 (SUM(extension_male) + SUM(extension_female)) as extension_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', DB::table('occupations')
                                            ->select('id')
                                            ->where(array('level' => 'Level I', 'subsector_id' => $subsector_id))->lists('id'))
            ->get();

        return $result;
    }

    public function level2($subsector_id)
    {

        $result = FormalTraining::select(DB::raw('SUM(regular_male) as regular_male,
                                                  SUM(regular_female) as regular_female,
                                                 (SUM(regular_male) + SUM(regular_female)) as regular_total,
                                                  SUM(extension_male) as extension_male,
                                                  SUM(extension_female) as extension_female,
                                                 (SUM(extension_male) + SUM(extension_female)) as extension_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', DB::table('occupations')
                ->select('id')
                ->where(array('level' => 'Level II', 'subsector_id' => $subsector_id))->lists('id'))
            ->get();

        return $result;
    }

    public function level3($subsector_id)
    {

        $result = FormalTraining::select(DB::raw('SUM(regular_male) as regular_male,
                                                  SUM(regular_female) as regular_female,
                                                 (SUM(regular_male) + SUM(regular_female)) as regular_total,
                                                  SUM(extension_male) as extension_male,
                                                  SUM(extension_female) as extension_female,
                                                 (SUM(extension_male) + SUM(extension_female)) as extension_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', DB::table('occupations')
                ->select('id')
                ->where(array('level' => 'Level III', 'subsector_id' => $subsector_id))->lists('id'))
            ->get();

        return $result;
    }

    public function level4($subsector_id)
    {

        $result = FormalTraining::select(DB::raw('SUM(regular_male) as regular_male,
                                                  SUM(regular_female) as regular_female,
                                                 (SUM(regular_male) + SUM(regular_female)) as regular_total,
                                                  SUM(extension_male) as extension_male,
                                                  SUM(extension_female) as extension_female,
                                                 (SUM(extension_male) + SUM(extension_female)) as extension_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', DB::table('occupations')
                ->select('id')
                ->where(array('level' => 'Level IV', 'subsector_id' => $subsector_id))->lists('id'))
            ->get();

        return $result;
    }

    public function level5($subsector_id)
    {

        $result = FormalTraining::select(DB::raw('SUM(regular_male) as regular_male,
                                                  SUM(regular_female) as regular_female,
                                                 (SUM(regular_male) + SUM(regular_female)) as regular_total,
                                                  SUM(extension_male) as extension_male,
                                                  SUM(extension_female) as extension_female,
                                                 (SUM(extension_male) + SUM(extension_female)) as extension_total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->whereIn('occupation_id', DB::table('occupations')
                ->select('id')
                ->where(array('level' => 'Level V', 'subsector_id' => $subsector_id))->lists('id'))
            ->get();

        return $result;
    }

}
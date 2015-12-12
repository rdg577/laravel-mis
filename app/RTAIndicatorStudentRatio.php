<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/12/15
 * Time: 5:17 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class RTAIndicatorStudentRatio {
    protected $report_date_id;
    protected $region_id;

    public function __construct($param_report_date_id, $param_region_id)
    {
        $this->report_date_id = $param_report_date_id;
        $this->region_id = $param_region_id;
    }

    /*
     * Total regular and extension trainees
     */

    public function regular()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                                                ->where('petsa', $report_date->petsa)
                                                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                                                ->where('region_id', $this->region_id)
                                                ->lists('id'))
            ->get();

        return $result;
    }

    public function extension()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
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

        $result = FormalTraining::select(DB::raw('sum(regular_male) + sum(regular_female) +
                                                sum(extension_male) + sum(extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                                                ->where('petsa', $report_date->petsa)
                                                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                                                ->where('region_id', $this->region_id)
                                                ->lists('id'))
            ->get();

        return $result;
    }

    /*
     * Short-term trainees
     */

    public function short_term()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = ShortTermTraining::select(DB::raw('sum(below17_male) + sum(from17to19_male) + sum(above19_male) as male,
                                                sum(below17_female) + sum(from17to19_female) + sum(above19_female) as female,
                                                sum(below17_male) + sum(from17to19_male) + sum(above19_male) +
                                                sum(below17_female) + sum(from17to19_female) + sum(above19_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    /*
     * Regular trainees per level
     */

    public function level1n2_regular()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->whereIn('occupation_id', function ($query) {
                $query->select('id')
                    ->from('occupations')
                    ->whereIn('level', ['Level I', 'Level II']);
            })
            ->get();

        return $result;
    }

    public function level3n4_regular()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->whereIn('occupation_id', function ($query) {
                $query->select('id')
                    ->from('occupations')
                    ->whereIn('level', ['Level III', 'Level IV']);
            })
            ->get();

        return $result;
    }

    public function level5_regular()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->whereIn('occupation_id', function ($query) {
                $query->select('id')
                    ->from('occupations')
                    ->whereIn('level', ['Level V']);
            })
            ->get();

        return $result;
    }

    /*
     * Extension trainees per level
     */
    public function level1n2_extension()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->whereIn('occupation_id', function ($query) {
                $query->select('id')
                    ->from('occupations')
                    ->whereIn('level', ['Level I', 'Level II']);
            })
            ->get();

        return $result;
    }

    public function level3n4_extension()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->whereIn('occupation_id', function ($query) {
                $query->select('id')
                    ->from('occupations')
                    ->whereIn('level', ['Level III', 'Level IV']);
            })
            ->get();

        return $result;
    }

    public function level5_extension()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->whereIn('occupation_id', function ($query) {
                $query->select('id')
                    ->from('occupations')
                    ->whereIn('level', ['Level V']);
            })
            ->get();

        return $result;
    }

    /*
     * CoC Assessed and Competent trainees
     */
    public function assessed()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = Assessment::select(DB::raw('sum(assessed_regular_male) as regular_male,
                                        sum(assessed_regular_female) as regular_female,
                                        sum(assessed_extension_male) as extension_male,
                                        sum(assessed_extension_female) as extension_female,

                                        sum(assessed_regular_male) + sum(assessed_regular_female) as regular_total,
                                        sum(assessed_extension_male) + sum(assessed_extension_female) as extension_total,

                                        sum(assessed_regular_male) + sum(assessed_regular_female) +
                                        sum(assessed_extension_male) + sum(assessed_extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;

    }

    public function competent()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = Assessment::select(DB::raw('sum(competent_regular_male) as regular_male,
                                        sum(competent_regular_female) as regular_female,
                                        sum(competent_extension_male) as extension_male,
                                        sum(competent_extension_female) as extension_female,

                                        sum(competent_regular_male) + sum(competent_regular_female) as regular_total,
                                        sum(competent_extension_male) + sum(competent_extension_female) as extension_total,

                                        sum(competent_regular_male) + sum(competent_regular_female) +
                                        sum(competent_extension_male) + sum(competent_extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;

    }

    /*
     * Top 3 Occupations
     */
    public function top3_occupations_regular()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(regular_male) + sum(regular_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_extension()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(extension_male) + sum(extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    /*
     * Top 3 Occupations per Mode per gender
     */
    public function top3_occupations_regular_male()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(regular_male) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_regular_female()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(regular_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_extension_male()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(extension_male) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_extension_female()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(extension_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    /*
     * Companies that provides/participated cooperative training
     * and total registered companies
     */
    public function cooperative_trainings()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = CooperativeTraining::select(DB::raw('sum(mse_training) as mse,
                    sum(ml_training) as medium_large,
                    sum(mse_training) + sum(ml_training) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    public function registered_companies()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = CooperativeTraining::select(DB::raw('sum(mse_list) as mse,
                    sum(ml_list) as medium_large,
                    sum(mse_list) + sum(ml_list) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    /*
     * Young people in the training system
     */
    public function ages()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = FormalTraining::select(DB::raw('sum(below17_male) + sum(below17_female) as below17,
                    sum(from17to19_male) + sum(from17to19_female) as from17to19,
                    sum(above19_male) + sum(above19_female) as above19,

                    sum(below17_male) + sum(below17_female) +
                    sum(from17to19_male) + sum(from17to19_female) +
                    sum(above19_male) + sum(above19_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    /*
     * Dropouts
     */
    public function dropouts()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = Dropout::select(DB::raw('sum(regular_male) + sum(regular_female) as regular,
                    sum(extension_male) + sum(extension_female) as extension,
                    sum(short_term_male) + sum(short_term_female) as short_term,

                    sum(regular_male) + sum(regular_female) +
                    sum(extension_male) + sum(extension_female) +
                    sum(short_term_male) + sum(short_term_female) as total'))
            ->whereIn('report_date_id', ReportDate::select('id')
                ->where('petsa', $report_date->petsa)
                ->lists('id'))
            ->whereIn('institution_id', Institution::select('id')
                ->where('region_id', $this->region_id)
                ->lists('id'))
            ->get();

        return $result;
    }

    /*
     * MSEs supported by IE
     */
    public function ie_supported_mse()
    {
        $report_date = ReportDate::findOrFail($this->report_date_id);

        $result = IndustryExtension5::select(DB::raw('sum(micro) as micro,
                    sum(small) as small,
                    sum(micro) + sum(small) as total'))
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
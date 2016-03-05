<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/7/15
 * Time: 4:45 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class TVIIndicator2StudentRatio {

    protected $institution_id;
    protected $report_date_id;

    public function __construct($param1, $param2)
    {
        $this->institution_id = $param1;
        $this->report_date_id = $param2;
    }

    /*
     * Total regular and extension trainees
     */

    public function regular()
    {
        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    public function extension()
    {
        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    public function total()
    {
        $result = FormalTraining::select(DB::raw('sum(regular_male) + sum(regular_female) +
                                                sum(extension_male) + sum(extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * Short-term trainees
     */

    public function short_term()
    {
        $result = ShortTermTraining::select(DB::raw('sum(below17_male) + sum(from17to19_male) + sum(above19_male) as male,
                                                sum(below17_female) + sum(from17to19_female) + sum(above19_female) as female,
                                                sum(below17_male) + sum(from17to19_male) + sum(above19_male) +
                                                sum(below17_female) + sum(from17to19_female) + sum(above19_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * Regular trainees per level
     */

    public function level1n2_regular()
    {
        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = FormalTraining::select(DB::raw('sum(regular_male) as male,
                                            sum(regular_female) as female,
                                            sum(regular_male) + sum(regular_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = FormalTraining::select(DB::raw('sum(extension_male) as male,
                                            sum(extension_female) as female,
                                            sum(extension_male) + sum(extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = Assessment::select(DB::raw('sum(assessed_regular_male) as regular_male,
                                        sum(assessed_regular_female) as regular_female,
                                        sum(assessed_extension_male) as extension_male,
                                        sum(assessed_extension_female) as extension_female,

                                        sum(assessed_regular_male) + sum(assessed_regular_female) as regular_total,
                                        sum(assessed_extension_male) + sum(assessed_extension_female) as extension_total,

                                        sum(assessed_regular_male) + sum(assessed_regular_female) +
                                        sum(assessed_extension_male) + sum(assessed_extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;

    }

    public function competent()
    {
        $result = Assessment::select(DB::raw('sum(competent_regular_male) as regular_male,
                                        sum(competent_regular_female) as regular_female,
                                        sum(competent_extension_male) as extension_male,
                                        sum(competent_extension_female) as extension_female,

                                        sum(competent_regular_male) + sum(competent_regular_female) as regular_total,
                                        sum(competent_extension_male) + sum(competent_extension_female) as extension_total,

                                        sum(competent_regular_male) + sum(competent_regular_female) +
                                        sum(competent_extension_male) + sum(competent_extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;

    }

    /*
     * Top 3 Occupations
     */
    public function top3_occupations_regular()
    {
        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(regular_male) + sum(regular_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_extension()
    {
        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(extension_male) + sum(extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(regular_male) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_regular_female()
    {
        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(regular_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_extension_male()
    {
        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(extension_male) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->groupBy('occupation_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        return $result;
    }

    public function top3_occupations_extension_female()
    {
        $result = FormalTraining::select(DB::raw('occupation_id,
                            sum(extension_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
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
        $result = CooperativeTraining::select(DB::raw('sum(mse_training) as mse,
                    sum(ml_training) as medium_large,
                    sum(mse_training) + sum(ml_training) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    public function registered_companies()
    {
        $result = CooperativeTraining::select(DB::raw('sum(mse_list) as mse,
                    sum(ml_list) as medium_large,
                    sum(mse_list) + sum(ml_list) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * Young people in the training system
     */
    public function ages()
    {
        $result = FormalTraining::select(DB::raw('sum(below17_male) + sum(below17_female) as below17,
                    sum(from17to19_male) + sum(from17to19_female) as from17to19,
                    sum(above19_male) + sum(above19_female) as above19,

                    sum(below17_male) + sum(below17_female) +
                    sum(from17to19_male) + sum(from17to19_female) +
                    sum(above19_male) + sum(above19_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * Dropouts
     */
    public function dropouts()
    {
        $result = Dropout::select(DB::raw('sum(regular_male) + sum(regular_female) as regular,
                    sum(extension_male) + sum(extension_female) as extension,
                    sum(short_term_male) + sum(short_term_female) as short_term,

                    sum(regular_male) + sum(regular_female) +
                    sum(extension_male) + sum(extension_female) +
                    sum(short_term_male) + sum(short_term_female) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

    /*
     * MSEs supported by IE
     */
    public function ie_supported_mse()
    {
        $result = IndustryExtension5::select(DB::raw('sum(micro) as micro,
                    sum(small) as small,
                    sum(micro) + sum(small) as total'))
            ->where('report_date_id', $this->report_date_id)
            ->where('institution_id', $this->institution_id)
            ->get();

        return $result;
    }

}
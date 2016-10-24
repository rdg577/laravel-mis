<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavingGraduate extends Model
{
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'subsector_id',
        'occupation_id',
        'regular_level1_male',
        'regular_level1_female',
        'regular_level1_saving',
        'regular_level2_male',
        'regular_level2_female',
        'regular_level2_saving',
        'regular_level3_male',
        'regular_level3_female',
        'regular_level3_saving',
        'regular_level4_male',
        'regular_level4_female',
        'regular_level4_saving',
        'regular_level5_male',
        'regular_level5_female',
        'regular_level5_saving',
        'extension_level1_male',
        'extension_level1_female',
        'extension_level1_saving',
        'extension_level2_male',
        'extension_level2_female',
        'extension_level2_saving',
        'extension_level3_male',
        'extension_level3_female',
        'extension_level3_saving',
        'extension_level4_male',
        'extension_level4_female',
        'extension_level4_saving',
        'extension_level5_male',
        'extension_level5_female',
        'extension_level5_saving'
    ];

    public function report_date()
    {
        return $this->belongsTo('App\ReportDate', 'report_date_id');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution', 'institution_id');
    }

    public function subsector()
    {
        return $this->belongsTo('App\Subsector', 'subsector_id');
    }

    public function occupation()
    {
        return $this->belongsTo('App\Occupation', 'occupation_id');
    }

}

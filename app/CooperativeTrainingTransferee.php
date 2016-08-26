<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CooperativeTrainingTransferee extends Model
{
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'regular_level1_to_level2_male',
        'regular_level1_to_level2_female',
        'regular_level2_to_level3_male',
        'regular_level2_to_level3_female',
        'regular_level3_to_level4_male',
        'regular_level3_to_level4_female',
        'regular_level4_to_level5_male',
        'regular_level4_to_level5_female',
        'extension_level1_to_level2_male',
        'extension_level1_to_level2_female',
        'extension_level2_to_level3_male',
        'extension_level2_to_level3_female',
        'extension_level3_to_level4_male',
        'extension_level3_to_level4_female',
        'extension_level4_to_level5_male',
        'extension_level4_to_level5_female'
    ];

    public function report_date()
    {
        return $this->belongsTo('App\ReportDate', 'report_date_id');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution', 'institution_id');
    }

    public function occupation()
    {
        return $this->belongsTo('App\Occupation', 'occupation_id');
    }
}

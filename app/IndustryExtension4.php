<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryExtension4 extends Model
{
    protected $table = 'industry_extension4s';

    protected $fillable = [
        'report_date_id',
        'institution_id',
        'subsector_id',
        'short_term_male',
        'short_term_female',
        'level1n2_male',
        'level1n2_female',
        'level3n4_male',
        'level3n4_female',
        'operator_male',
        'operator_female',
        'mse',
        'remarks'
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
}

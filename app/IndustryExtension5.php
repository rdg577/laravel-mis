<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryExtension5 extends Model
{
    protected $table = 'industry_extension5s';
    
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'subsector_id',
        'micro',
        'small',
        'medium',
        'ie_field',
        'level_c_male',
        'level_c_female',
        'level_b_male',
        'level_b_female',
        'level_a_male',
        'level_a_female',
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

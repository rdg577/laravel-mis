<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryExtension3 extends Model
{
    protected $table = 'industry_extension3s';

    protected $fillable = [
        'report_date_id',
        'institution_id',
        'subsector_id',
        'high_level',
        'mid_level',
        'low_level',
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

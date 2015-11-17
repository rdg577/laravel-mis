<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryExtension1 extends Model
{
    protected $table = 'industry_extension1s';
    
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'identified_technologies',
        'benchmarked_technologies',
        'proper_documentation',
        'prototype',
        'competent_entrepreneurs',
        'transferred',
        'capital',
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

    public function occupation()
    {
        return $this->belongsTo('App\Occupation', 'occupation_id');
    }
}

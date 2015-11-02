<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';

    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'full_time_male',
        'full_time_female',
        'part_time_male',
        'part_time_female',
        'ethiopian_male',
        'ethiopian_female',
        'non_ethiopian_male',
        'non_ethiopian_female',
        'core_male',
        'core_female',
        'took_tm_male',
        'took_tm_female',
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormalTraining extends Model
{
    protected $table = 'formal_trainings';
    
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'course_started',
        'course_ended',
        'below17_male',
        'below17_female',
        'from17to19_male',
        'from17to19_female',
        'above19_male',
        'above19_female',
        'regular_male',
        'regular_female',
        'extension_male',
        'extension_female',
        'from_grade10_male',
        'from_grade10_female',
        'from_grade11_male',
        'from_grade11_female',
        'from_grade12_male',
        'from_grade12_female',
        'beyond_grade12_male',
        'beyond_grade12_female',
        'mental_male',
        'mental_female',
        'visual_male',
        'visual_female',
        'hearing_male',
        'hearing_female',
        'physical_male',
        'physical_female',
        'cooperative_male',
        'cooperative_female',
        'noncooperative_male',
        'noncooperative_female',
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

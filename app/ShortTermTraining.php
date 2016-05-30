<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortTermTraining extends Model
{
    protected $table = 'short_term_trainings';

    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'competency_id',
        'course_started',
        'course_ended',
        'below17_male',
        'below17_female',
        'from17to19_male',
        'from17to19_female',
        'above19_male',
        'above19_female',
        'no_education_male',
        'no_education_female',
        'elementary_male',
        'elementary_female',
        'high_school_male',
        'high_school_female',
        'preparatory_male',
        'preparatory_female',
        'higher_education_male',
        'higher_education_female',
        'mental_male',
        'mental_female',
        'visual_male',
        'visual_female',
        'hearing_male',
        'hearing_female',
        'physical_male',
        'physical_female',
        'cooperative',
        'non_cooperative',
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

    public function competency()
    {
        return $this->belongsTo('App\Competency', 'competency_id');
    }
}

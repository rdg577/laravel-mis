<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortTermTrainee extends Model
{
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'registered_male',
        'registered_female',
        'started_training_male',
        'started_training_female',
        'completed_training_male',
        'completed_training_female',
        'sent_assessment_male',
        'sent_assessment_female',
        'assessed_male',
        'assessed_female',
        'competent_male',
        'competent_female'
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

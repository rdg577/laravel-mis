<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CooperativeTraining extends Model
{
    protected $table = 'cooperative_trainings';
    
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'mse_list',
        'mse_mou',
        'mse_joint_plan',
        'mse_training',
        'mse_trainers',
        'ml_list',
        'ml_mou',
        'ml_joint_plan',
        'ml_training',
        'ml_trainers',
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

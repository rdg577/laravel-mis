<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryExtension2 extends Model
{
    protected $table = 'industry_extension2s';

    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'starter_enterprise',
        'starter_mse_operator_male',
        'starter_mse_operator_female',
        'starter_mse_operator_supported_male',
        'starter_mse_operator_supported_female',
        'advance_enterprise',
        'advance_mse_operator_male',
        'advance_mse_operator_female',
        'advance_mse_operator_supported_male',
        'advance_mse_operator_supported_female',
        'competent_enterprise',
        'competent_mse_operator_male',
        'competent_mse_operator_female',
        'competent_mse_operator_supported_male',
        'competent_mse_operator_supported_female',
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dropout extends Model
{
    protected $table = 'dropouts';
    
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'occupation_id',
        'department',
        'completed_level',
        'regular_male',
        'regular_female',
        'extension_male',
        'extension_female',
        'short_term_male',
        'short_term_female',
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

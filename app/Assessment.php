<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
	protected $table = 'assessments';
	
    protected $fillable = [    	           
            'report_date_id',
            'institution_id',
            'occupation_id',
            'assessed_regular_male',
            'assessed_regular_female',
            'assessed_extension_male',
            'assessed_extension_female',
            'assessed_short_term_male',
            'assessed_short_term_female',
            'competent_regular_male',
            'competent_regular_female',
            'competent_extension_male',
            'competent_extension_female',
            'competent_short_term_male',
            'competent_short_term_female'
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

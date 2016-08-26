<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionResearch extends Model
{
    protected $fillable = [
        'report_date_id',
        'institution_id',
        'proposal',
        'completed'
    ];

    public function report_date()
    {
        return $this->belongsTo('App\ReportDate', 'report_date_id');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution', 'institution_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportDate extends Model
{
    protected $table = 'report_dates';

    protected $fillable = [
        'petsa',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

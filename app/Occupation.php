<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'occupations';
    protected $fillable = [
        'name',
        'code',
        'level',
        'active',
        'subsector_id'
    ];

    public function subsector()
    {
        return $this->belongsTo('App\Subsector', 'subsector_id');
    }

    public function competencies()
    {
        return $this->hasMany('App\Competency');
    }
}

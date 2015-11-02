<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsector extends Model
{
    protected $table = 'subsectors';
    protected $fillable = [
        'name',
        'sector_id',
        'active'
    ];

    public function sector()
    {
        return $this->belongsTo('App\Sector', 'sector_id');
    }

    public function occupations()
    {
        return $this->hasMany('App\Occupation');
    }
}

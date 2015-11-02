<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectors';
    protected $fillable = [
        'name',
        'active'
    ];

    public function subsectors()
    {
        return $this->hasMany('App\Subsector');
    }
}

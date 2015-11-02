<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    protected $table = 'competencies';
    protected $fillable = [
        'name',
        'code',
        'active',
        'occupation_id'
    ];

    public function occupation()
    {
        return $this->belongsTo('App\Occupation', 'occupation_id');
    }
}

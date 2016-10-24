<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionResearchTitle extends Model
{
    protected $fillable = ['action_research_id', 'title', 'type'];

    public function action_research()
    {
        return $this->belongsTo('App\ActionResearch', 'action_research_id');
    }
}

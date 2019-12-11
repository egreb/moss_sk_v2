<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentYear extends Model
{
    protected $guarded = [];

    public function tournaments()
    {
        return $this->hasMany('App\Tournament', 'tournament_year_id');
    }
}

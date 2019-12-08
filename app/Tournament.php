<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $appends = [
        'groups_array'
    ];

    public function getGroupsArrayAttribute()
    {
        return explode(",", $this->groups);
    }
}

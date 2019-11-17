<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'title',
        'active'
    ];

    public function events()
    {
        return $this->hasMany(ScheduleEvent::class);
    }
}

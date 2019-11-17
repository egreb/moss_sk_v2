<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleEvent extends Model
{
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}

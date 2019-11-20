<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ScheduleEvent extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}

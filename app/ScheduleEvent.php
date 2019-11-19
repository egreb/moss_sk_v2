<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ScheduleEvent extends Model
{
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function format_date()
    {
        return Carbon::parse($this->date)->format('d-m-Y');
    }
}

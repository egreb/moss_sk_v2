<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'title',
        'active',
        'date',
        'created_at',
        'updated_at'
    ];

    public function events()
    {
        return $this->hasMany(ScheduleEvent::class);
    }

    public function nextEvent()
    {
        return $this->events()->where('date', '>', Carbon::now()->addHours(5)->format('Y-m-d'))->first();
    }
}

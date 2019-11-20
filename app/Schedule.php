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
        foreach ($this->events as $event) {
            $interval[] = abs(strtotime($event->date) - strtotime(Carbon::now()));
        }
        asort($interval);
        return $this->events[key($interval)];
    }
}

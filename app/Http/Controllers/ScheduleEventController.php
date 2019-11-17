<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\ScheduleEvent;
use Illuminate\Http\Request;

class ScheduleEventController extends Controller
{
    public function store(Request $request, string $scheduleId)
    {
        $schedule = Schedule::find($scheduleId);

        if (is_null($schedule)) {
            abort(404);
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required'
        ]);

        $event = new ScheduleEvent();
        $event->title = $request->title;
        $event->date = $request->date;
        $event->schedule_id = $schedule->id;

        return back();
    }
}

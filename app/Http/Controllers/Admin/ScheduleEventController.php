<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ScheduleEvent;
use Illuminate\Http\Request;

class ScheduleEventController extends Controller
{
    public function destroy(string $id)
    {
        $event = ScheduleEvent::find($id);

        if (is_null($event)) {
            abort(404);
        }

        $event->delete();

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $event = new ScheduleEvent();

        $schedule_id = $request->input('schedule_id');
        if (is_null($schedule_id)) {
            return response()->json(['success' => false, 'message' => 'Missing schedule id']);
        }

        $title = $request->input('event');
        $date = $request->input('date');

        $event->title = $title;
        $event->date = $date;
        $event->schedule_id = $schedule_id;
        $event->save();

        $events = ScheduleEvent::where('schedule_id', $schedule_id)->sortBy('date')->get();

        return response()->json(['success' => true, 'events' => $events]);
    }
}

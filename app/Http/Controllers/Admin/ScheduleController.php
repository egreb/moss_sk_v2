<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Schedule;
use App\ScheduleEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('updated_at', 'desc')->get();

        return view('admin.schedule.index', ['schedules' => $schedules]);
    }

    public function show(string $id)
    {
        $schedule = Schedule::find($id);

        if (is_null($schedule)) {
            abort(404);
        }

        return view('admin.schedule.show', ['schedule' => $schedule]);
    }

    public function create()
    {
        return view('admin.schedule.create', ['title' => 'Opprett terminliste']);
    }

    public function edit(string $id)
    {
        $schedule = Schedule::find($id);

        if (is_null($schedule)) {
            abort(404);
        }

        return view('admin.schedule.edit', ['schedule' => $schedule]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $schedule = new Schedule();
        $schedule->title = $request->title;
        $schedule->active = $request->has('active') ? true : false;
        $schedule->touch();
        $schedule->save();

        return redirect()->route('admin.schedule.edit', ['id' => $schedule->id]);
    }

    public function update(Request $request, string $id)
    {
        $schedule = Schedule::find($id);
        if (is_null($schedule)) {
            abort(404);
        }

        $validatedData = $request->validate([
            'schedule_title' => 'required|max:255'
        ]);

        $active = $request->has('active') ? true : false;

        $schedule->title = $request->schedule_title;
        $schedule->active = $active;
        $schedule->touch();

        if ($active) {
            $schedules = Schedule::where('id', '!=', intval($id));
            foreach ($schedules as $s) {
                $s->active = false;
                $s->touch();
                $s->save();
            }
        }

        $schedule->save();

        foreach ($request->title as $index => $title) {
            $date = $request->date[$index];
            $eventId = $request->event_id[$index];

            if (empty($eventId)) {
                $event = new ScheduleEvent;
            } else {
                $event = ScheduleEvent::find($eventId);
            }
            if (!empty($title) && !empty($date)) {
                $event->title = $title;
                $event->date = $date;
                $event->schedule_id = intval($id);
                $event->save();
            }
        }

        $schedule = Schedule::find(intval($id));

        return back();
    }

    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        if (is_null($schedule)) {
            abort(404);
        }

        $schedule->delete();

        return view('admin.schedules.index');
    }

    public function alter(Request $request)
    {
        if ($request->has('delete')) {
            $schedule = Schedule::find($request->delete);
            if (is_null($schedule)) {
                abort(404);
            }

            $schedule->delete();
        }

        if ($request->has('active')) {
            $id = $request->active;
            $schedule = Schedule::find($id);
            if (is_null($schedule)) {
                abort(404);
            }

            $schedules = Schedule::where('id', '!=', $id)->get();
            foreach ($schedules as $s) {
                $s->active = false;
                $s->save();
            }

            $schedule->active = true;
            $schedule->save();
        }
        return back();
    }
}

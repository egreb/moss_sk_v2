<?php

namespace App\Http\Middleware;

use App\Schedule;
use App\TournamentYear;
use Closure;
use Illuminate\Support\Facades\View;

class SharedData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $results = TournamentYear::with('tournaments')->get();
        $schedule = Schedule::where('active', true)->first();
        $event = !is_null($schedule) ? $schedule->nextEvent() : null;

        View::share('results', $results);
        View::share('event', $event);

        return $next($request);
    }
}

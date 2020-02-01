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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $results = TournamentYear::with('tournaments')->get();
        $schedule = Schedule::where('active', true)->first();
        $event = !is_null($schedule) ? $schedule->nextEvent() : null;
        $about_club_header_routes = [
            'Klubbinformasjon' => route('about'),
            'Vedtekter' => route('laws'),
            'Regler' => route('rules'),
            'Æresmedlemmer' => route('honored')
        ];

        View::share('results', $results);
        View::share('event', $event);
        View::share('about_routes', $about_club_header_routes);

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Http\Controllers\RelevantLinksController;
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
        $results = TournamentYear::with('tournaments:tournament_year_id,title,url')->get();
        $schedule = Schedule::where('active', true)->first();
        $event = !is_null($schedule) ? $schedule->nextEvent() : null;
        $about_club_header_routes = [
            'Klubbinformasjon' => route('about'),
            'Vedtekter' => route('laws'),
            'Regler' => route('rules'),
            'Æresmedlemmer' => route('honored')
        ];
        $online_sites = [
            'chess.com' => 'https://www.chess.com/club/moss-schakklub',
            'lichess.org' => 'https://lichess.org/team/moss-schakklub'
        ];
        $relevant_links = RelevantLinksController::active();

        $tournaments = [];
        foreach ($results as $t) {
            $tournaments[$t->title] = [];
            foreach ($t->tournaments as $tt) {
                $tournaments[$t->title][] = [
                    'title' => $tt->title,
                    'url' => $tt->url
                ];
            }
        }

        View::share('online_sites', $online_sites);
        View::share('tournaments', $tournaments);
        View::share('event', $event);
        View::share('about_routes', $about_club_header_routes);
        View::share('relevant_links', $relevant_links);
        return $next($request);
    }
}

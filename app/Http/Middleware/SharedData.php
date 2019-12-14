<?php

namespace App\Http\Middleware;

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
        View::share('results', $results);
        return $next($request);
    }
}

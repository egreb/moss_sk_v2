<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class AdminRoutes
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
        $routes = [
            $this->newRoute('Hjem', route('admin.index')),
            $this->newRoute('Nettsiden', route('home')),
            $this->newRoute('Nyheter', route('admin.post.index'), route('admin.post.create')),
            $this->newRoute('Terminlister', route('admin.schedule.index'), route('admin.schedule.create')),
            $this->newRoute('Resultater', route('admin.tournament.index'), route('admin.tournament.create')),
            $this->newRoute('Aktuelle lenker', route('admin.relevant_links.index')),
            $this->newRoute('Medlemmer', route('admin.member.home'), route('admin.member.create')),
        ];

        View::share('routes', $routes);
        return $next($request);
    }

    private function newRoute($title, $route, $create_route = null)
    {
        return [
            'title' => $title,
            'route' => $route,
            'btn_route' => $create_route
        ];
    }
}

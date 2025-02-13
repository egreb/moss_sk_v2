<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\BoardMember;
use App\Http\Controllers\Controller;
use App\Post;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $posts = Post::where('draft', false)
            ->where('published_at', '<=', Carbon::now('Europe/Oslo'))
            ->get()
            ->sortByDesc('published_at')
            ->sortByDesc('created_at');

        return view('app.index', ['posts' => $posts]);
    }

    public function about()
    {
        $leader = BoardMember::Create('Paal Tveiten', 'Leder', 'paal@keysmarineservice.no', 98080464);
        $secondleader = BoardMember::Create('Rune Harald Kristiansen', 'Nestleder', '');
        $secretary = BoardMember::Create('Inge Christian Nagelhus', 'Sekretær', '');
        $youthleader = BoardMember::Create('Hans I. Kongevold', 'Ungdomsleder', '');
        $tournamentdirector = BoardMember::Create(
            'Cedrik Sannerud',
            'Turneringsleder',
            '',
        );
        $cashier = BoardMember::Create('Arnstein Johansen', 'Kasserer', '');


        $boardmembers = [
            $leader,
            $secondleader,
            $secretary,
            $youthleader,
            $tournamentdirector,
            $cashier
        ];

        $teams = [
            ['name' => 'Lag 1', 'leader' => $leader->name, 'phone' => $leader->phone],
            ['name' => 'Lag 2', 'leader' => $tournamentdirector->name, 'phone' => $tournamentdirector->phone],
        ];

        return view('app.about', ['boardmembers' => $boardmembers, 'teams' => $teams]);
    }

    public function schedule()
    {
        $schedule = Schedule::where('active', true)->first();
        if (is_null($schedule)) {
            $schedule = Schedule::first();
        }

        return view('app.schedule', ['active_schedule' => $schedule]);
    }

    public function rules()
    {
        return view('app.rules');
    }

    public function laws()
    {
        return view('app.laws');
    }

    public function honored()
    {
        return view('app.honorary_members');
    }

    /**
     * The old website had /main.
     * Redirect from this to avoid any confusion for new users.
     * @return Request
     */
    public function redirectFromOldMainRoute()
    {
        return redirect('/');
    }
}

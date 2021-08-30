<?php

namespace App\Http\Controllers\App;

use App\BoardMember;
use App\Http\Controllers\Controller;
use App\Post;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('draft', false)->where('published_at', '<=', Carbon::now('Europe/Oslo'))->get()->sortByDesc('published_at');

        return view('app.index', ['posts' => $posts]);
    }

    public function about()
    {
        $leader = BoardMember::Create('Paal Tveiten', 'Leder', 'paal@keysmarineservice.no', 90229514);
        $secondleader = BoardMember::Create('Torbjørn Bakke Henriksen', 'Nestleder', 'tbh@getmail.no', 40247353);
        $secretary = BoardMember::Create('Simen Berge', 'Sekretær', 'bergesimen@gmail.com', 94816322);
        $youthleader = BoardMember::Create('Jonathan M. Andersen', 'Ungdomsleder', 'sjakkjonis@hotmail.com', 95976686);
        $tournamentdirector = BoardMember::Create(
            'Arnstein Johansen',
            'Turneringsleder',
            'arnstein.joh@gmail.com',
            48095594
        );
        $cashier = BoardMember::Create('Helge Antonsen', 'Kasserer', 'helge.antonsen@coop.no');


        $boardmembers = [
            $leader,
            $secondleader,
            $secretary,
            $youthleader,
            $tournamentdirector,
            $cashier
        ];

        $teams = [
            ['name' => 'Lag 1', 'leader' => 'Svein Rishovd', 'phone' => 94816322],
            ['name' => 'Lag 2', 'leader' => 'Svein Rishovd', 'phone' => 94816322],
            ['name' => 'Lag 3', 'leader' => 'Svein Rishovd', 'phone' => 94816322],
            ['name' => 'Lag 4', 'leader' => 'Svein Rishovd', 'phone' => 94816322]
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

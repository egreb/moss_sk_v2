<?php

namespace App\Http\Controllers\App;

use App\BoardMember;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ScheduleController;
use App\Post;
use App\Schedule;
use App\TournamentYear;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('draft', false)->get()->sortByDesc('created_at');
        $schedule = Schedule::where('active', true)->first();
        $event = !is_null($schedule) ? $schedule->nextEvent() : null;

        return view('app.index', ['posts' => $posts, 'event' => $event]);
    }

    public function about()
    {
        $leader = BoardMember::Create('Thomas Wasenius', 'Leder', 'thomas.wasenius21@gmail.com', 90229514);
        $secondleader = BoardMember::Create('Torbjørn Bakke Henriksen', 'Nestleder', 'tbh@getmail.no', 40247353);
        $secretary = BoardMember::Create('Svein Rishovd', 'Sekretær', 'svein@flexipharma.no', 94816322);
        $youthleader = BoardMember::Create('Jonathan M. Andersen', 'Ungdomsleder', 'sjakkjonis@hotmail.com', 95976686);
        $tournamentdirector = BoardMember::Create('Arnstein Johansen', 'Turneringsleder', 'arnstein.joh@gmail.com', 48095594);
        $firstvara = BoardMember::Create('Lasse Dahl', '1.vara', 'lasseda@hotmail.com', 97961957);
        $secondvara = BoardMember::Create('Håvard Gunnerud', '2.vara', 'gunneru@online.no', 91347644);

        $boardmembers = [$leader, $secondleader, $secretary, $youthleader, $tournamentdirector, $firstvara, $secondvara];

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

        return view('app.schedule', ['schedule' => $schedule]);
    }
}

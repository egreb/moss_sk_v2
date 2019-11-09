<?php

namespace App\Http\Controllers\App;

use App\BoardMember;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post1 = new Post();
        $post1->title = 'Min første tittel';
        $post1->ingress = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

        $post2 = new Post();
        $post2->title = 'Min andre tittel';
        $post2->ingress = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $posts = [
            $post1, $post2
        ];

        return view('app.index', ['posts' => $posts]);
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
}

<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\TournamentYear;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function create()
    {
        $tournament_years = TournamentYear::all();

        return view('admin.tournament.create', ['tournament_years' => $tournament_years]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required',
            'tournament_year_id' => 'required'
        ]);

        (new Tournament([
           'title' => $request->title,
           'url' => $request->url,
           'tournament_year_id' => $request->tournament_year_id
        ]))->firstOrCreate();


    }
}

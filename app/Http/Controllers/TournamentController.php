<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\TournamentYear;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $results = Tournament::all();

        return view('admin.tournament.index', ['results' => $results]);
    }

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

        Tournament::firstOrCreate([
            'title' => $request->title,
            'url' => $request->url,
            'tournament_year_id' => $request->tournament_year_id
        ]);

        return back();
    }
}

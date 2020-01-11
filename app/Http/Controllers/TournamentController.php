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

        return view('admin.tournament.index', ['results' => $results, 'title' => 'Resultater']);
    }

    public function create()
    {
        $tournament_years = TournamentYear::all();

        return view('admin.tournament.create', ['tournament_years' => $tournament_years]);
    }

    public function edit(Tournament $tournament)
    {
        $tournament_years = TournamentYear::all();

        return view('admin.tournament.create', ['tournament' => $tournament, 'tournament_years' => $tournament_years]);
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

    public function update(Request $request, Tournament $tournament)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'title' => 'required|max:255',
            'url' => 'required',
            'tournament_year_id' => 'required'
        ]);

        if ($request->submit === 'delete') {
            $tournament->delete();

            return redirect(route('admin.tournament.index'));
        }

        $tournament->update([
            'title' => $request->title,
            'url' => $request->url,
            'tournament_year_id' => $request->tournament_year_id
        ]);

        return redirect(route('admin.tournament.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\TournamentYear;
use Illuminate\Http\Request;

class TournamentYearController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $tournamentYear = (new TournamentYear([
            'title' => $request->title
        ]))->firstOrCreate();

        return back()->with('tournament_year', $tournamentYear);
    }
}

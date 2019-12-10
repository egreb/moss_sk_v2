@extends('layouts.admin')

@section('content')
    @sect()
    <h2 class="text-3xl">Legg til resultat</h2>

    <form method="POST" action="{{ route('admin.tournament_year.store') }}">
        @csrf
        <div class="flex flex-col items-start">
            <label for="title">Opprett resultat fane</label>
            <input type="text" name="title" id="title" placeholder="Fanenavn f.eks '2019'" />
            <button class="btn btn-success mt-1">Opprett</button>
        </div>
    </form>

    <form method="POST" action="{{ route('admin.tournament.store') }}">
        @csrf
        <label for="tournament_year_id">Fane</label>
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="tournament_year_id" id="tournament_year_id">
            @isset($tournament_years)
                @foreach($tournament_years as $years)
                    <option value="{{ $years->id }}">{{ $years->title }}</option>
                @endforeach
            @endisset
        </select>
    </form>
    @endsect
@endsection

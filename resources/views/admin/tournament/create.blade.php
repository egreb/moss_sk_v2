@extends('admin.admin')

@section('content')
    <h2 class="text-3xl">
        @isset($tournmanet)
            Rediger resultat
        @else
            Legg til resultat
        @endisset
    </h2>

    <form method="POST" action="{{ route('admin.tournament_year.store') }}">
        @csrf
        <div class="flex flex-col items-start">
            <label for="title">Opprett resultat fane</label>
            <input type="text" name="title" id="title" placeholder="Fanenavn f.eks '2019'"/>
            <button class="btn btn-success mt-1">Opprett</button>
        </div>
    </form>

    <form class="mt-3" method="POST"
          action="{{ isset($tournament) ? route('admin.tournament.update', ['tournament' => $tournament->id]) : route('admin.tournament.store') }}">
        @csrf
        <div class="flex flex-col items-start">
            <label for="tournament_year_id">Fane</label>
            <select
                class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                name="tournament_year_id" id="tournament_year_id">
                @isset($tournament_years)
                    @foreach($tournament_years as $year)
                        <option
                            value="{{ $year->id }}" {{ isset($tournament) && $year->id === $tournament->tournament_year_id ? 'selected' : null }}>{{ $year->title }}</option>
                    @endforeach
                @endisset
            </select>

            @include('components.input', ['class' => 'w-full', 'id' => 'title', 'name' => 'title', 'placeholder' => 'Tittel', 'label' => 'Tittel', 'value' => isset($tournament) ? $tournament->title : ''])
            @include('components.input', ['class' => 'w-full', 'id' => 'url', 'name' => 'url', 'placeholder' => 'Turneringsservice', 'label' => 'Lenke', 'value' => isset($tournament) ? $tournament->url : ''])

            <div class="flex mt-6">
                <button class="btn btn-success" name="submit" value="store">
                    @isset($tournament)
                        Oppdater
                    @else
                        Legg til
                    @endisset
                </button>

                @isset($tournament)
                    <button type="submit" name="submit" value="delete" class="btn btn-danger ml-1">Slett</button>
                @endisset
            </div>
        </div>

        @isset($tournament)
            <input type="hidden" name="id" value="{{ $tournament->id }}">
        @endisset
    </form>
@endsection

@extends('layouts.admin')

@section('content')
<section class="p-2">
    <header class="flex items-center justify-between">
        <h2 class="text-3xl">Resultater</h2>

        <a href="{{ route('admin.tournament.create') }}" class="btn btn-success">Opprett ny</a>
    </header>

    @isset($results)
    <ul class="flex flex-col w-full sm:w-10/12">
        @foreach($results as $result)
        <a class="text-2xl border-b p-2 mt-2 rounded flex" href="{{ route('admin.tournament.edit', ['tournament' => $result->id]) }}">{{ $result->title }}</a>
        @endforeach
    </ul>
    @endisset
</section>
@endsection
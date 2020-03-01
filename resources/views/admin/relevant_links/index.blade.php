@extends('layouts.admin')

@section('content')
    @isset($relevant_links)
        @if($relevant_links->isEmpty())
            <p class="text-blue-500 text-lg my-3">Det er ikke opprettet noen lenker.</p>
        @else
            <h3 class="my-2 text-2xl">Aktuelle Lenker</h3>
            <relevant-links :list="{{ $relevant_links }}"></relevant-links>
        @endif
    @endisset
    <h2 class="my-2 text-2xl">Opprett lenke</h2>
    <form class="flex flex-col lg:flex-row w-full" method="POST" action="{{ route('admin.relevant_links.store') }}">
        @csrf
        <input class="lg:w-5/12" type="text" name="description" value="{{ old('description') }}"
               placeholder="Beskrivelse" required/>
        <input class="lg:w-5/12" type="text" name="url" value="{{ old('url') }}" placeholder="Link" required/>
        <input class="w-1/2 lg:w-2/12" type="date" name="expires" value="{{ old('expires') }}"
               placeholder="Utløper (Ikke påkrevd)"/>
        <button class="btn btn-success mt-3 lg:mt-2 lg:mb-1 lg:ml-1">Lagre</button>
    </form>
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
    @endforeach
@endsection

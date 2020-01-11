@extends('layouts.admin')

@section('content')
    @isset($results)
        <ul class="flex flex-col w-full sm:w-10/12">
            @foreach($results as $result)
                <a class="page-list-element"
                   href="{{ route('admin.tournament.edit', ['tournament' => $result->id]) }}">{{ $result->title }}</a>
            @endforeach
        </ul>
    @endisset
@endsection

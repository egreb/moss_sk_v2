@extends('layouts.admin')

@section('content')
    @sect(['customClasses' => 'mt-3'])
    <h2 class="text-3xl">Resultater</h2>

    @isset($results)
        <ul class="flex flex-col w-full">
            @foreach($results as $result)
                @component('components.admin.page_list_element')
                    <a href="{{ route('admin.tournament.edit', ['tournament' => $result->id]) }}">{{ $result->title }}</a>
                @endcomponent
            @endforeach
        </ul>
    @endisset
    @endsect
@endsection

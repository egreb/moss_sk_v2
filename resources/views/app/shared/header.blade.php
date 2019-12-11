@extends('shared.nav')

@section('urls')
    <a href="{{ route('about') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 lg:px-5">
        Om klubben
    </a>
    <a href="{{ route('schedule') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 lg:px-5">
        Terminliste
    </a>

    @isset($results)
        <a href="#responsive-header" class="block mt-4 lg:mt-0 text-teal-200 hover:text-white relative lg:px-5 text-center">
            Resultater

            <ul class="flex flex-col bg-gray-200 rounded rounded absolute top-0 mt-8 w-full left-0">
                @foreach($results as $res)
                    <li class="text-gray-800 flex justify-center py-2">{{ $res->title }}</li>
                @endforeach
            </ul>
        </a>
    @endisset
    @if(Auth::check())
        <a href="{{ route('admin.index') }}"
           class="block mt-4 lg:inline-block lg:ml-4 lg:mt-0 text-teal-200 hover:text-white lg:px-5">
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}"
           class="block mt-4 lg:inline-block lg:ml-4 lg:mt-0 text-teal-200 hover:text-white lg:px-5">
            Logg inn
        </a>
    @endif
@endsection

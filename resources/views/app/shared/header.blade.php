@extends('shared.nav')

@section('menu')
    <a href="{{ route('about') }}" class="menu-item">
        Om klubben
    </a>

    <a href="{{ route('schedule') }}" class="menu-item">
        Terminliste
    </a>

    @isset($results)
        @component('components.header.menu_item', ['route' => '#toggle-menu', 'icon' => true])
            <div class="menu-item flex justify-end list-none">
                <span class="text-white mr-2">+</span>Resultater
            </div>

            <ul class="flex flex-col rounded relative lg:absolute hidden submenu">
                @foreach($results as $res)
                    @if(!$res->tournaments->isEmpty())
                        <li class="menu-item lg:absolute right-0 toggle-menu">
                            <div class="flex items-center w-full justify-end pr-2">
                                <span class="text-white mr-2">+</span>{{ $res->title }}
                            </div>

                            <ul class="flex flex-col w-full items-end hidden mx-1">
                                @foreach($res->tournaments as $tournament)
                                    <a href="{{ $tournament->url }}"
                                       class="menu-item mr-4"
                                       onclick="event.stopPropagation()"
                                       target="_blank">
                                        {{ $tournament->title }}
                                    </a>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endcomponent
    @endisset
@endsection

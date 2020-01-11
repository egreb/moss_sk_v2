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
            <div class="menu-item flex justify-end list-none lg:flex-row-reverse">
                <span class="text-white mr-2 lg:ml-1 lg:mr-0">+</span>Resultater
            </div>

            <ul class="flex flex-col rounded relative lg:absolute hidden submenu">
                @foreach($results as $res)
                    @if(!$res->tournaments->isEmpty())
                        <li class="menu-item lg:absolute toggle-menu lg:bg-gray-800 lg:pt-4 lg:pb-2 lg:px-4 relative w-full lg:mr-0">
                            <div class="flex items-center w-full justify-end lg:justify-center pr-2 lg:pr-0">
                                <span class="text-white mr-1 lg:hidden">+</span>{{ $res->title }}
                            </div>

                            <ul class="flex flex-col w-full items-end hidden mx-1">
                                @foreach($res->tournaments as $tournament)
                                    <a href="{{ $tournament->url }}"
                                       class="menu-item mr-4 lg:mr-0 lg:text-center"
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

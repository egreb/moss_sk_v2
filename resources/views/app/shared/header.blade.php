@extends('shared.nav')

@section('menu')
    @component('components.header.menu_item', ['route' =>  route('about')])
        Om klubben
    @endcomponent

    @component('components.header.menu_item', ['route' => route('schedule')])
        Terminliste
    @endcomponent

    @isset($results)
        @component('components.header.menu_item', ['route' => '#toggle-menu', 'icon' => true])
            Resultater

            <ul class="flex flex-col bg-gray-200 rounded absolute mt-2 hidden" style="width:200px; left: 50%; transform: translateX(-50%);">
                @foreach($results as $res)
                    @if(!$res->tournaments->isEmpty())
                    <li class="text-gray-800 flex justify-center py-2 text-xl items-center relative flex-col submenu">
                        <div class="flex items-center">
                            <span class="mr-2">{{ $res->title }}</span>
                            <svg class="text-gray-800 inline-block h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path class="heroicon-ui"
                                      d="M11 18.59V3a1 1 0 0 1 2 0v15.59l5.3-5.3a1 1 0 0 1 1.4 1.42l-7 7a1 1 0 0 1-1.4 0l-7-7a1 1 0 0 1 1.4-1.42l5.3 5.3z"/>
                            </svg>
                        </div>

                        <ul class="flex flex-col bg-gray-200 rounded w-full hidden">
                            @foreach($res->tournaments as $tournament)
                                <a href="{{ $tournament->url }}" class="block text-gray-800 flex justify-center py-2 text-xl items-center relative w-full text-center" onclick="event.stopPropagation()">
{{--                                    <a class="block" href="{{ $tournament->url }}">{{ $tournament->title }}</a>--}}
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

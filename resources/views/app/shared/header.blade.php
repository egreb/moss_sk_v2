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
            <div class="flex items-center justify-center">
                Resultater
            </div>

            <ul class="flex flex-col bg-gray-200 rounded absolute mt-2 relative hidden submenu">
                @foreach($results as $res)
                    @if(!$res->tournaments->isEmpty())
                        <li class="text-gray-200 bg-gray-800 flex justify-center text-xl items-center relative flex-col submenu border border-gray-800">
                            <div class="flex items-center w-full py-2 justify-center">
                                <span class="mr-2">{{ $res->title }}</span>
                            </div>

                            <ul class="flex flex-col w-full hidden mx-1 bg-gray-200">
                                @foreach($res->tournaments as $tournament)
                                    <a href="{{ $tournament->url }}"
                                       class="text-gray-800 flex justify-center py-2 text-xl items-center relative w-full text-center"
                                       onclick="event.stopPropagation()">
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

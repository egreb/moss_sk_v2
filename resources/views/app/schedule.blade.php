@extends('layouts.app')

@section('content')
    @page()
    <section class="p-1 sm:p-2 w-full">
        <h1 class="text-3xl">{{ isset($schedule) ? $schedule->title : '' }}</h1>

        @if(isset($schedule))
            <ul class="flex flex-col">
                @foreach($schedule->events->sortBy('date') as $event)
                    <li class="flex border border-gray-800">
                        <div
                            class="w-2/5 sm:w-1/4 border-r bg-gray-300 border-gray-800 border-r text-gray-800 p-2 flex justify-center">
                        <span
                            class="mr-1"><strong>{{ $event->date->format('d-m-Y') }}</strong></span>
                        </div>

                        <div class="w-3/5  sm:w-3/4 p-2 flex items-center bg-white">
                            <span class="ml-1">{{ $event->title }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-red-500">Det er ikke opprettet noe terminliste.</p>
        @endif
    </section>
    @endpage
@endsection

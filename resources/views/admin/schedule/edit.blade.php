@extends('layouts.admin')

@section('content')
    <section class="p-2 pb-32">
        <div class="flex items-end">
            <h3 class="text-xl mr-1">Rediger terminliste</h3>
            <h2 class="text-2xl text-blue-600">{{ $schedule->title }}</h2>
        </div>

        <form class="mt-3" method="POST" action="{{ route('admin.schedule.update', ['id' => $schedule->id]) }}">
            @csrf
            <label class="block text-gray-700 text-sm font-bold mb-2" for="schedule_title">
                Tittel
            </label>
            <input id="schedule_title" type="text" placeholder="Tittel" name="schedule_title" class="w-64"
                   value="{{ $schedule->title }}">

            <h3 class="text-2xl text-gray-800 mt-3">Events</h3>

            <ul class="block">
                @foreach($schedule->events->sortBy('date') as $event)
                    <li class="flex w-full mt-2">
                        <input type="text" value="{{ $event->title }}" name="title[]" class="w-full"/>
                        <input type="date" value="{{ $event->date->format('Y-m-d') }}" name="date[]"
                               class=""/>
                        <input type="hidden" value="{{ $event->id }}" name="event_id[]"/>
                    </li>
                @endforeach
            </ul>

            <div class="flex mt-3">
                <input type="text" placeholder="Event" name="title[]" value="" class="w-full" id="event"/>
                <input type="date" placeholder="Dato" name="date[]" value="[]" id="date"/>
                <input type="hidden" value="" name="event_id[]"/>
            </div>
            <div class="mt-1">
                <button class="btn btn-teal" name="create-event" id="create-event">Legg til</button>
            </div>

            <label class="custom-label flex my-6 bg-gray-600 p-2 text-white w-32 justify-center" for="active">
                <span class="select-none mr-3">Aktiv</span>

                <div class="bg-white shadow w-6 h-6 p-1 flex justify-center items-center mr-2">
                    <input type="checkbox" class="hidden" name="active"
                           id="active" {{ $schedule->active ? 'checked' : '' }}>
                    <svg class="hidden w-4 h-4 text-green-600 pointer-events-none" viewBox="0 0 172 172">
                        <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none"
                           font-size="none" text-anchor="none" style="mix-blend-mode:normal">
                            <path d="M0 172V0h172v172z"/>
                            <path
                                d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z"
                                fill="currentColor" stroke-width="1"/>
                        </g>
                    </svg>
                </div>
            </label>


            <div class="flex max-w-2xl w-full">
                <button class="btn btn-blue">Lagre</button>
                <a href="{{ route('admin.schedule.index') }}" class="btn">Avbryt</a>
                <a class="btn btn-danger ml-auto">Slett</a>
            </div>


        </form>
    </section>
@endsection

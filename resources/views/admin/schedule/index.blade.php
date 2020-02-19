@extends('layouts.admin')

@section('content')
    <section class="p-2">
        <header class="flex items-center justify-between">
            <h2 class="text-3xl">Terminlister</h2>

            <a href="{{ route('admin.schedule.create') }}" class="btn btn-blue">Opprett ny</a>
        </header>

        @if(!$schedules->isEmpty())
            <form method="POST" action="{{ route('admin.schedule.alter') }}">
                @csrf
                <ul class="flex flex-col">
                    @foreach($schedules as $schedule)
                        <li class="text-2xl border-b p-2 mt-2 rounded flex">
                            <div class="w-3/4">
                                <a href="{{ route('admin.schedule.edit', ['id' => $schedule->id ]) }}">{{ $schedule->title }}</a>
                            </div>

                            <div class="w-1/4 flex justify-end items-center text-base text-green-500 pr-2">
                                <button class="btn" name="active"
                                        value="{{ $schedule->id }}" {{ $schedule->active ? 'disabled' : '' }}>
                                    <svg class="w-4 h-4 {{ $schedule->active ? 'text-green-600' : 'text-gray-600' }}"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/>
                                    </svg>
                                </button>
                                <button class="btn" name="delete" value="{{ $schedule->id }}">
                                    <svg class="w-4 h-5 text-red-500" fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                        <path
                                            d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/>
                                    </svg>
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </form>
        @else
            <p class="text-red-500">Det er ikke opprettet noen terminliste.</p>
        @endif
    </section>
@endsection

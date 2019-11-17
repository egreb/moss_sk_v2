@extends('layouts.admin')

@section('content')
    <section class="p-2 w-full flex flex-col justify-center">
        <header class="flex justify-between md:w-10/12 lg:w-8/12 items-center">
            <a href="{{ route('admin.post.index') }}">
                <h2 class="text-3xl">Nyheter</h2>
            </a>
        </header>
        @if(isset($posts) && !$posts->isEmpty())
            <ul class="flex flex-col">
                @foreach($posts as $post)
                    <li class="flex justify-between border mt-2 p-2 md:w-10/12 lg:w-8/12">
                        <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"><h3>{{ $post->title }}</h3></a>
                        <span class="text-gray-500">Oppdatert {{ $post->updated_at->format('h:t d-m-y') }}</span>
                    </li>
                @endforeach

            </ul>
        @else
            <p class="text-blue-500">Det er ikke opprettet noen nyheter.</p>
        @endif
    </section>

    <section class="p-2 w-full flex flex-col justify-center">
        <h2 class="text-3xl">Terminlister</h2>
        @if(isset($posts))
            <ul class="flex flex-col">
                @foreach($schedules as $schedule)
                    <a class="flex justify-between border mt-2 p-2 md:w-10/12 lg:w-8/12"
                       href="{{ route('admin.schedule.edit', ['id' => $schedule->id]) }}">
                        <h2>{{ $schedule->title }}</h2>

                        @if($schedule->active)
                            <span class="text-green-500">Aktiv</span>
                        @endif
                    </a>
                @endforeach

            </ul>
        @endif
    </section>

    <section class="p-2 w-full flex flex-col justify-center">
        <h2 class="text-3xl">Medlemmer</h2>
        @if(isset($members) && !$members->isEmpty())
            <ul class="flex flex-col">
                @foreach($members as $member)
                    <a class="flex justify-between border mt-2 p-2 md:w-10/12 lg:w-8/12"
                       href="{{ route('admin.schedule.edit', ['id' => $member->id]) }}">
                        <h3>{{ $member->full_name() }}</h3>
                    </a>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Det er ikke opprettet noen medlemmer enda</p>
        @endif
    </section>
@endsection

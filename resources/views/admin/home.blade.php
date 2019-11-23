@extends('layouts.admin')

@section('content')
    <div class="flex flex-col bg-white">
        @component('admin.shared.info_section')
            <header class="flex justify-between md:w-10/12 lg:w-8/12 items-center">
                <h2 class="text-3xl">Nyheter</h2>
            </header>
            @if(isset($posts) && !$posts->isEmpty())
                <ul class="flex flex-col w-full">
                    @foreach($posts as $post)
                        <li class="flex justify-between border mt-2 p-2 md:w-10/12 lg:w-8/12">
                            <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"><h3>{{ $post->title }}</h3>
                            </a>
                            <span class="text-gray-500">Oppdatert {{ $post->updated_at->format('h:t d-m-y') }}</span>
                        </li>
                    @endforeach
                </ul>

                <footer class="mt-3">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-success">Ny</a>
                    <a href="{{ route('admin.post.index') }}" class="btn btn-blue mt-3">Se alle</a>
                </footer>
            @else
                <p class="text-blue-500">Det er ikke opprettet noen nyheter.</p>
            @endif
        @endcomponent

        @component('admin.shared.info_section')
            <h2 class="text-3xl">Terminlister</h2>
            @if(isset($posts))
                <ul class="flex flex-col w-full">
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

                <footer class="mt-3">
                    <a href="{{ route('admin.schedule.create') }}" class="btn btn-success">Ny</a>
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-blue mt-3">Se alle</a>
                </footer>
            @endif
        @endcomponent

        @component('admin.shared.info_section')
            <h2 class="text-3xl">Medlemmer</h2>
            @if(isset($members) && !$members->isEmpty())
                <ul class="flex flex-col w-full">
                    @foreach($members as $member)
                        <a class="flex justify-between border mt-2 p-2 md:w-10/12 lg:w-8/12"
                           href="{{ route('admin.schedule.edit', ['id' => $member->id]) }}">
                            <h3>{{ $member->full_name() }}</h3>
                        </a>
                    @endforeach
                </ul>

                <footer class="mt-3">
                    <a href="{{ route('admin.member.create') }}" class="btn btn-success">Ny</a>
                    <a href="{{ route('admin.member.index') }}" class="btn btn-blue mt-3"><small>Se alle</small></a>
                </footer>
            @else
                <p class="text-gray-500">Det er ikke opprettet noen medlemmer enda</p>
            @endif
        @endcomponent
    </div>
@endsection

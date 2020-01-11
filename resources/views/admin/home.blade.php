@extends('layouts.admin')

@section('content')
    <div class="flex flex-col">
        @component('admin.shared.info_section')
            <header class="flex justify-between md:w-10/12 lg:w-8/12 items-center">
                <h2 class="text-3xl">Nyheter</h2>
            </header>
            @if(isset($posts) && !$posts->isEmpty())
                <ul class="flex flex-col w-full">
                    @foreach($posts as $post)
                        <a class="page-list-element" href="{{ route('admin.post.edit', ['id' => $post->id]) }}">
                            <span class="text-xl">{{ $post->title }}</span>
                            <span class="text-gray-500">Oppdatert {{ $post->updated_at->format('h:t d-m-y') }}</span>
                        </a>

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
                        <a class="page-list-element" href="{{ route('admin.schedule.edit', ['id' => $schedule->id]) }}">
                            <span class="text-xl">{{ $schedule->title }}</span>
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
                        @component('components.admin.page_list_element')
                            href="{{ route('admin.schedule.edit', ['id' => $member->id]) }}">
                            <h3>{{ $member->full_name() }}</h3>
                        @endcomponent
                    @endforeach
                </ul>
            @else
                <p class="text-red-500 p-2">Det er ikke opprettet noen medlemmer enda</p>
            @endif
            <footer class="mt-3">
                <a href="{{ route('admin.member.create') }}" class="btn btn-success">Ny</a>
                <a href="{{ route('admin.member.home') }}" class="btn btn-blue mt-3"><small>Se alle</small></a>
            </footer>
        @endcomponent
        @component('admin.shared.info_section')
            <h2 class="text-3xl">Resultater</h2>

            <a class="btn btn-success" href="{{ route('admin.tournament.create') }}">Ny</a>
        @endcomponent
    </div>
@endsection

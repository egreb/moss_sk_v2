@extends('layouts.admin')

@section('content')
    <ul class="list-none flex flex-col">
        @foreach($posts as $post)
            <a class="border-gray-800 text-gray-800 rounded p-2 mt-1 border flex items-center"
               href="{{ route('admin.post.edit', ['id' => $post->id]) }}">
                <div class="w-full">
                    <h3 class="text-2xl">{{ $post->title }}</h3>
                    @if (!$post->draft)
                        <small>Opprettet {{ $post->created_at }}</small>

                        <br/>
                    @else
                        <small class="text-red-500">Ikke publisert</small>
                    @endif
                </div>
            </a>
        @endforeach
    </ul>
@endsection

@extends('layouts.admin')

@section('content')
    <ul class="list-none flex flex-col">
        @foreach($posts as $post)
            <li class="text-gray-800 rounded p-2 mt-1 border-b">
                <div class="w-full flex flex-col justify-center px-1">
                    <div class="flex items-center">
                        <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                           class="text-2xl">{{ $post->title }}</a>
                        @if (!$post->draft)
                            <small class="ml-auto">Opprettet {{ $post->created_at->format('d-m-yy') }}</small>
                            <br/>
                        @else
                            <small class="text-red-500">Upublisertt</small>
                        @endif
                    </div>

                    <div class="text-gray-500">
                        Publisert av {{ $post->author_string() }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

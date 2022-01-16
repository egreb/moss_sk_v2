@extends('admin.admin')

@section('content')
    <header class="p-2">
        <header class="flex items-center justify-between">
            <h1 class="text-3xl">Nyheter</h1>

            <a href="{{ route('admin.post.create') }}" class="btn btn-success">Opprett nyhet</a>
        </header>
    </header>
    <ul class="list-none flex flex-col">
        @foreach($posts as $post)
            <li class="text-gray-800 rounded p-2 mt-1 border-b">
                <div class="w-full flex flex-col justify-center px-1">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                               class="text-2xl">{{ $post->title }}</a>
                            <div class="text-gray-500">
                                Publisert av {{ $post->author_string() }}
                            </div>
                        </div>

                        <div class="flex flex-col justify-center">
                            @if($post->draft)
                                <div class="text-red-500 border-red-500 border py-1 px-2 text-center">Upublisert</div>
                            @else
                                <span class="text-blue-500 border border-blue-500 py-1 px-2 rounded">Publisert
                                    @if (!is_null($post->published_at))
                                        <time>{{ $post->published_at->format('d-m-y') }}</time>
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

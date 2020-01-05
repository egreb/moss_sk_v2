{{--<article class="mb-4 p-2 w-full max-w-3xl text-gray-800 post">--}}
{{--    <header class="text-teal-200">--}}
{{--        <a href="{{ route('post', ['slug' => $post->slug]) }}">--}}
{{--            <h2 class="text-3xl">{{ $post->title }}</h2>--}}
{{--        </a>--}}
{{--        @if(!is_null($post->image))--}}
{{--            <div class="relative pb-2/3 overflow-hidden">--}}
{{--                <img class="absolute h-full w-full object-cover" src="{{ $post->image->url }}"--}}
{{--                     alt="{{ $post->title }}"/>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <p class="text-gray-600">--}}
{{--            <small>Publisert av {{ implode(", ", $post->published_by()) }}--}}
{{--                <time>{{ $post->updated_at->format('d-m-Y') }}</time>--}}
{{--            </small>--}}
{{--        </p>--}}
{{--    </header>--}}
{{--    <section class="ingress">--}}
{{--        @if(!empty($post->ingress))--}}
{{--            {!! parsedown($post->ingress) !!}--}}
{{--        @endif--}}
{{--    </section>--}}
{{--</article>--}}

<article class="flex flex-col bg-white overflow-hidden w-full py-2 px-4 mb-6 border-b">
    @if(!is_null($post->image))
        <div class="bg-red-500 pb-2/3">
            <img class="object-cover h-64 w-full" src="{{ $post->image->url }}" alt="{{ $post->title }}">
        </div>
    @endif
    <a href="{{ route('post', ['slug' => $post->slug]) }}">
        <h2 class="text-3xl">{{ $post->title }}</h2>
    </a>

    @if(!is_null($post->ingress))
        <footer class="flex flex-col">
            <p>
                {!! parsedown($post->ingress) !!}
            </p>
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-blue ml-auto">Les mer</a>
        </footer>
    @endif
</article>

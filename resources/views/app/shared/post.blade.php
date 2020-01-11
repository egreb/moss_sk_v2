<article class="flex flex-col bg-white overflow-hidden w-full py-2 px-5 lg:px-10 mb-6 border-b">
    @if(!is_null($post->image))
        <div class="bg-red-500 pb-2/3">
            <img class="object-cover h-64 w-full" src="{{ $post->image->url }}" alt="{{ $post->title }}">
        </div>
    @endif
    <a href="{{ route('post', ['slug' => $post->slug]) }}">
        <h2 class="text-3xl">{{ $post->title }}</h2>
    </a>
    <span class="text-gray-600 text-sm">
        Publisert av {{ $post->author_string() }}
    </span>

    @if(!is_null($post->ingress))
        <section class="mt-3">
            <p>
                {!! parsedown($post->ingress) !!}
            </p>
        </section>
        <footer class="flex flex-col mt-3">
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-blue ml-auto">Les mer</a>
        </footer>
    @endif
</article>

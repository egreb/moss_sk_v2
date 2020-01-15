<article class="flex flex-col bg-white overflow-hidden w-full py-2 px-5 lg:px-16 mb-6 border-b">
    @if(!is_null($post->image))
        <div class="bg-red-500 pb-2/3">
            <img class="object-cover h-64 w-full" src="{{ $post->image->url }}" alt="{{ $post->title }}">
        </div>
    @endif
    <a href="{{ route('post', ['slug' => $post->slug]) }}">
        <h2 class="text-3xl">{{ $post->title }}</h2>
    </a>
    <section class="text-gray-800 text-sm flex justify-between">
        <span>Publisert av {{ $post->author_string() }}</span>
        <span>{{ $post->updated_at->format('d-m-Y h:m') }}</span>
    </section>

    @if(!is_null($post->ingress))
        <section class="mt-3">
            <p class="text-3xl">
                {!! parsedown($post->ingress) !!}
            </p>
        </section>
        <footer class="flex flex-col mt-6">
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn ml-auto">Les mer</a>
        </footer>
    @endif
</article>

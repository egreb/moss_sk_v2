<article class="flex flex-col items-center justify-center w-full mb-4 px-2 lg:px-0">
    <div class="w-full lg:w-10/12 bg-white p-2 lg:p-4 rounded-md">
        @if(!is_null($post->image))
        <div class="p-2">
            <a href="{{ route('post', ['slug' => $post->slug]) }}">
                <img class="object-contain w-full rounded" src="{{ $post->image->url('small') }}" srcset="{{ $post->image->srcset() }}" alt="{{ $post->title }}" sizes="70vmin">
            </a>
        </div>
        @endif

        <section class="mb-2 p-2">
            <h2 class="text-2xl text-gray-800 mb-0 {{ !is_null($post->image) ? 'mt-3' : '' }}">
                {{ $post->title }}
            </h2>
            <small class="text-gray-900">Publisert {{ !is_null($post->published_at) ? $post->published_at->format('d.m.Y') : $post->updated_at->format('d.m.Y') }} av {{ $post->author_string() }}</small>
        </section>
        @if(!is_null($post->ingress))
        <section class="p-2">
            <p class="text-3xl">
                {!! parsedown($post->ingress) !!}
            </p>
        </section>
        @endif
        <footer class="flex mt-6 justify-end p-2">
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-blue">Les mer</a>
        </footer>
    </div>
</article>
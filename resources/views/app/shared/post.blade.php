<article class="flex flex-col bg-white overflow-hidden w-full py-2 px-5 lg:px-16 mb-6 border-b pb-8">
    @if(!is_null($post->image))
        <div class="pb-2/3">
            <img class="object-cover w-full rounded" src="{{ $post->image->url() }}"
                 srcset="{{ $post->image->srcset() }}"
                 alt="{{ $post->title }}">
        </div>
    @endif

    <section class="mb-2">
        <h2 class="text-2xl text-gray-800 mb-0 {{ !is_null($post->image) ? 'mt-3' : '' }}">
            {{ $post->title }}
        </h2>
        <p class="text-gray-700">Publisert {{ $post->updated_at->format('h:m d-m-Y') }}</p>
    </section>
    @if(!is_null($post->ingress))
        <section>
            <p class="text-3xl">
                {!! parsedown($post->ingress) !!}
            </p>
        </section>
    @endif
    <footer class="flex mt-6">
        <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-blue">Les mer</a>
    </footer>
</article>

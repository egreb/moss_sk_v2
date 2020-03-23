<article class="flex flex-col bg-white overflow-hidden w-full py-2 px-5 lg:px-16 mb-6 border-b pb-8">
    @if(!is_null($post->image))
        <div class="pb-2/3">
            <a href="{{ route('post', ['slug' => $post->slug]) }}">
                <img class="object-contain w-full rounded" style="max-height:400px;" src="{{ $post->image->url() }}"
                    srcset="{{ $post->image->srcset() }}"
                    alt="{{ $post->title }}">
            </a>
        </div>
    @endif

    <section class="mb-2">
        <h2 class="text-2xl text-gray-800 mb-0 {{ !is_null($post->image) ? 'mt-3' : '' }}">
            {{ $post->title }}
        </h2>
    </section>
    @if(!is_null($post->ingress))
        <section>
            <p class="text-3xl">
                {!! parsedown($post->ingress) !!}
            </p>
        </section>
    @endif
    <footer class="flex mt-6 justify-between items-center">
        <p class="text-gray-700">Publisert {{ !is_null($post->published_at) ? $post->published_at->format('d.m.Y') : $post->updated_at->format('d.m.Y') }}</p>
        <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-blue">Les mer</a>
    </footer>
</article>

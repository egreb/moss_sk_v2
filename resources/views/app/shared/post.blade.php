<article class="flex flex-col bg-white overflow-hidden w-full py-2 px-5 lg:px-16 mb-6 border-b">
    @if(!is_null($post->image))
        <div class="pb-2/3">
            <img class="object-cover w-full" src="{{ $post->image->url() }}" srcset="{{ $post->image->srcset() }}"
                 alt="{{ $post->title }}">
        </div>
    @endif

    <h2 class="text-3xl text-blue-800 {{ !empty($post->ingress) ? 'my-2' : 'mb-2' }}">{{ $post->title }}</h2>

    @if(!is_null($post->ingress))
        <section>
            <p class="text-3xl">
                {!! parsedown($post->ingress) !!}
            </p>
        </section>
        <footer class="flex mt-6">
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-blue">Les mer</a>
        </footer>
    @endif
</article>

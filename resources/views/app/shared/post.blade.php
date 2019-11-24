<article class="rounded mb-4 p-2 w-full max-w-3xl text-gray-800 post">
    <header class="text-teal-200">
        @if(!is_null($post->image))
            <a href="{{ route('post', ['slug' => $post->slug]) }}">
                <div class="relative" style="padding-bottom: 60%;">
                    <img class="absolute top-0 w-full object-cover h-full w-full rounded" src="{{ $post->image->url }}"
                         alt="{{ $post->title }}"/>
                </div>
            </a>
        @endif

        <a href="{{ route('post', ['slug' => $post->slug]) }}">
            <h2 class="text-3xl">{{ $post->title }}</h2>
        </a>
        <p class="text-gray-600">
            <small>Publisert av {{ implode(", ", $post->published_by()) }} <time>{{ $post->updated_at->format('d-m-Y') }}</time></small>
        </p>
    </header>
    <section class="ingress">
        <a href="{{ route('post', ['slug' => $post->slug]) }}">
            @if(!empty($post->ingress))
                {!! parsedown($post->ingress) !!}
            @else
                {!! parsedown($post->content) !!}
            @endif
        </a>
    </section>
</article>

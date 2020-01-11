<article class="flex p-2 flex-col items-center relative bg-white m-3 min-h-screen rounded w-full">
    @isset($title)
        <header class="w-full flex justify-start mb-1 justify-between">
            <h2 class="text-3xl text-gray-800">{{ $title }}</h2>
            @isset($link)
                <a class="btn btn-success" href="{{ $link }}">Ny</a>
            @endisset
        </header>
    @endisset

    <section class="w-full">
        {{ $slot }}
    </section>
</article>

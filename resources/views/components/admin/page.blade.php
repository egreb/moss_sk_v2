<article class="flex flex-col items-center relative bg-white min-h-screen rounded w-full p-4">
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
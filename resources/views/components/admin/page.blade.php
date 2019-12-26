<section class="flex p-2 flex-col items-start relative pb-32 bg-white m-3 min-h-screen rounded w-10/12">
    <section class="w-10/12">
    @isset($title)
        <header class="w-full flex justify-start mb-3 justify-between">
            <h2 class="text-3xl text-gray-800">{{ $title }}</h2>
            @isset($link)
                <a class="btn btn-success" href="{{ $link }}">Ny</a>
            @endisset
        </header>
    @endisset

        {{ $slot }}
    </section>
</section>

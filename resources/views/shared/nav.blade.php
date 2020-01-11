<header class="bg-gray-800 w-full p-6">
    @container(['class' => 'w-full'])
    <nav class="flex items-center flex-wrap justify-between w-full">
        <a href="/" class="flex items-center flex-shrink-0 text-white mr-6">
            @include('components.header.logo')
        </a>

        @include('components.header.toggle_menu')

        <section class="w-full hidden flex flex-grow flex-col items-end lg:flex lg:items-center lg:w-auto" id="menu">
            @yield('menu')
        </section>
    </nav>
    @endcontainer
</header>

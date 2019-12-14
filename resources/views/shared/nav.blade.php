<header class="bg-gray-800 w-full p-6">
    @container(['class' => 'w-full'])
        <nav class="flex items-center flex-wrap justify-between w-full">
            <a href="/" class="flex items-center flex-shrink-0 text-white mr-6">
                @include('components.header.logo')
            </a>

            @include('components.header.toggle_menu')

            <div class="w-full hidden flex flex-grow justify-center lg:flex lg:items-center lg:w-auto" id="menu">
                <div class="flex text-sm lg:flex-grow flex-col lg:flex-row w-1/2">
                    @yield('menu')
                </div>
            </div>
        </nav>
    @endcontainer
</header>

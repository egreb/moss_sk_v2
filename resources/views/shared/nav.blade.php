<header class="bg-gray-800 w-full p-6">
    <div class="container">
        <nav class="flex items-center flex-wrap">
            <a href="/" class="flex items-center flex-shrink-0 text-white mr-6">
                @include('components.header.logo')
            </a>

            @include('components.header.toggle_menu')

            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow hidden lg:flex" id="menu">
                    @yield('menu')
                </div>
            </div>
        </nav>
    </div>
</header>

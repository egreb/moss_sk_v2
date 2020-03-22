<header class="bg-gray-800 w-full p-6 absolute top-0 z-50">
    <div class="{{ isset($class) ? $class : 'container flex mx-auto' }}">
        <nav class="flex items-center flex-wrap justify-between w-full">
            <a href="/" class="flex items-center flex-shrink-0 text-white mr-6">
                @include('components.header.logo')
            </a>

            @include('components.header.toggle_menu')

            <section class="{{ isset($section_class) ? $section_class : 'w-full hidden flex flex-grow flex-col lg:justify-end items-end lg:flex lg:flex-row lg:items-center lg:w-auto lg:justify-between' }}" id="menu">
                @yield('menu')
            </section>
        </nav>
    </div>
</header>
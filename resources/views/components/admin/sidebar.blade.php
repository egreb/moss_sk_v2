<aside class="hidden sm:block sm:w-3/12 bg-gray-800 p-2 text-white">
    <div class="flex flex-col min-h-full">
        @foreach ($routes as $route)
            @include('components.admin.sidebar_section', $route)
        @endforeach
    </div>
</aside>
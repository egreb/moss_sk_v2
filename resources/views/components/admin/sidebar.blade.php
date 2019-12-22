<aside class="w-2/12 bg-gray-800 p-2 text-white min-h-screen mb-3">
    @include('components.admin.sidebar_section', ['title' => 'Hjem', 'route' => route('admin.index')])
    @include('components.admin.sidebar_section', ['title' => 'Nyheter', 'route' => route('admin.post.index'), 'btn_route' => route('admin.post.create')])
    @include('components.admin.sidebar_section', ['title' => 'Terminlister', 'route' => route('admin.schedule.index'), 'btn_route' => route('admin.schedule.create')])
    @include('components.admin.sidebar_section', ['title' => 'Resultater', 'route' => route('admin.tournament.index'), 'btn_route' => route('admin.tournament.create')])
</aside>

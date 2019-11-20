<aside class="sidebar hidden lg:flex flex-col lg:w-3/12 px-2 py-4">
    @if(isset($event))
        <section class="flex flex-col items-center bg-white rounded px-4 py-2 shadow">
            <h3 class="text-gray-800">Neste event:</h3>
            <h2 class="text-xl">{{ $event->title  }}</h2>
            <span>{{ $event->date->format('d-m-Y') }}</span>
        </section>
    @endif
</aside>

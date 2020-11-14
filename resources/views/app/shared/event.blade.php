@isset($event)
    <section class="flex flex-col bg-white rounded px-4 py-2 w-full">
        <div class="{{ $class }} flex-col items-center">
            <h3>Neste event:</h3>
            <h2 class="text-xl text-center">{{ $event->title  }}</h2>
            <span>{{ $event->date->format('d-m-Y') }}</span>
        </div>
    </section>
@endisset

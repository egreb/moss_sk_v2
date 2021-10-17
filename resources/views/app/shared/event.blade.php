@isset($event)
<section class="flex flex-col px-4 pb-4 w-full">
    <div class="{{ $class }} flex-col items-center">
        <h3 class="font-semibold text-lg">Neste event</h3>
        <h2 class="text-2xl mb-2 text-center">{{ $event->title  }}</h2>
        <span class="text-xl">{{ $event->date->format('d-m-Y') }}</span>
    </div>
</section>
@endisset
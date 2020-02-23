@isset($event)
    @sect(['width' => 'w-12/12'])
    <div class="{{ $class }} flex-col items-center">
        <h3>Neste event:</h3>
        <h2 class="text-xl text-center">{{ $event->title  }}</h2>
        <span>{{ $event->date->format('d-m-Y') }}</span>
    </div>
    @endsect
@endisset

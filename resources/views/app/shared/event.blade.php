@isset($event)
@sect(['width' => 'w-12/12'])
    <div class="{{ $class }} flex-col items-center">
        <h3 class="text-gray-800">Neste event:</h3>
        <h2 class="text-xl">{{ $event->title  }}</h2>
        <span>{{ $event->date->format('d-m-Y') }}</span>
    </div>
@endsect
@endisset

@extends('layouts.admin')

@section('content')
    <div class="flex flex-col p-2 bg-white">
        <header class="w-full my-2">
            <h2 class="text-2xl">Galleri</h2>
        </header>

        <section class="w-full flex">
            @foreach($images as $image)
                <div class="w-1/3 relative" style="padding-bottom: 60%;">
                    <a href="{{ $image->url }}" target="_blank">
                        <img class="absolute top-0 w-full object-cover h-full w-full rounded" src="{{ $image->url }}"/>
                    </a>
                </div>
            @endforeach
        </section>
    </div>
@endsection

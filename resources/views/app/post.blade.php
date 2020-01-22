@extends('layouts.app')

@section('content')
    @page()
    <header class="flex flex-col text-gray-800">
        @if(!is_null($post->image))
            <img src="{{ $post->image->url }}" alt="{{ $post->title }}"/>
        @endif
        <h1 class="text-3xl mb-0 {{ !is_null($post->image) ? 'mt-3' : '' }}">
            {{ $post->title }}
        </h1>
        <small>Oppdatert {{ $post->updated_at->format('d-m-Y h:m') }}</small>
    </header>

    <section class="mt-3">
        <p class="font-bold">{!! parsedown($post->ingress) !!}</p>
    </section>

    <section class="mt-3">
        <p>{!! parsedown($post->content) !!}</p>
    </section>

    <footer class="mt-3">
        <small>Publisert av {{ $post->author_string() }}</small>
    </footer>
    @endpage
@endsection

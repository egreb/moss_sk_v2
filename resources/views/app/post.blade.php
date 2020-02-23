@extends('layouts.app')

@section('content')
    @page()
    <article class="post">
        <header class="flex flex-col text-gray-800">
            @if(!is_null($post->image))
                <img src="{{ $post->image->url }}" alt="{{ $post->title }}"/>
            @endif
            <h1 class="text-3xl mb-0 {{ !is_null($post->image) ? 'mt-3' : '' }}">
                {{ $post->title }}
            </h1>
            <small>Oppdatert {{ $post->updated_at->format('d-m-Y h:m') }}</small>
        </header>

        <section class="ingress mt-3">
            {!! parsedown($post->ingress) !!}
        </section>

        <section class="content mt-3">
            {!! parsedown($post->content) !!}
        </section>

        <footer class="mt-3">
            <small>Publisert av {{ $post->author_string() }}</small>
        </footer>
    </article>
    @endpage
@endsection

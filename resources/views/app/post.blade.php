@extends('layouts.app')

@section('content')
    @page()
    <article class="post">
        <header class="flex flex-col text-gray-800">
            @if($post->image)
                <img src="{{ $post->image->url() }}" alt="{{ $post->title }}"/>
            @endisset
            <h1 class="text-2xl text-gray-800 mb-0 {{ !is_null($post->image) ? 'mt-3' : '' }}">
                {{ $post->title }}
            </h1>
            <p class="text-gray-700">Publisert {{ $post->updated_at->format('h:m d-m-Y') }}
                av {{ $post->author_string() }}</p>
        </header>

        <section class="ingress mt-3">
            {!! parsedown($post->ingress) !!}
        </section>

        <section class="content mt-3">
            {!! parsedown($post->content) !!}
        </section>
    </article>
    @endpage
@endsection

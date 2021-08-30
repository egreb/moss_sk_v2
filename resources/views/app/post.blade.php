@extends('layouts.app')

@section('content')
<x-page>
    <article class="post px-1 lg:px-16">
        <header class="flex flex-col text-gray-800">
            @if($post->image)
            <img class="rounded object-contain" style="max-height:400px;" src="{{ $post->image->url() }}" alt="{{ $post->title }}" />
            @endisset
            <h1 class="text-2xl text-gray-800 mb-0 {{ !is_null($post->image) ? 'mt-3' : '' }}">
                {{ $post->title }}
            </h1>
            <p class="text-gray-700">Publisert {{ !is_null($post->published_at) ? $post->published_at->format('d.m.Y') : $post->updated_at->format('d.m.Y') }}
                av {{ $post->author_string() }}</p>
        </header>

        <section class="ingress mt-3">
            {!! parsedown($post->ingress) !!}
        </section>

        <section class="content mt-3">
            {!! parsedown($post->story) !!}
        </section>
    </article>
</x-page>
@endsection
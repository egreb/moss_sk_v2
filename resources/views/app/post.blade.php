@extends('layouts.app')

@section('content')
<article class="article">
	<header class="flex flex-col">
		@if(!is_null($post->image))
			<img src="{{ $post->image->url }}" alt="{{ $post->title }}" />
		@endif
		<h1 class="text-3xl mb-0">
			{{ $post->title }}
		</h1>

		<small>Oppdatert {{ $post->updated_at->toDateTimeString() }}</small>
	</header>

	<p class="mt-3">
		<strong>{!! parsedown($post->ingress) !!}</strong>
	</p>

	<p class="mt-3">{!! parsedown($post->content) !!}</p>

	<p class="mt-3">
		<small>
			av
			@php
			$author_string = '';

			foreach($post->authors as $author) {
				$author_string .= $author->name . ', ';
			}
			@endphp

			{{ rtrim($author_string, ', ') }}
		</small>
	</p>
</article>
@endsection

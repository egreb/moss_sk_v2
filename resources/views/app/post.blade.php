@extends('layouts.app')

@section('content')

<header class="flex flex-col">
	<h1 class="text-3xl mb-0">
		{{ $post->title }}
	</h1>
	<small>Oppdatert {{ $post->updated_at->toDateTimeString() }}</small>
</header>

<p class="mt-3">
	{{ $post->ingress }}
</p>

<p class="mt-3">{{ $post->content }}</p>

<p class="mt-3">
	<small>
		Publisert av
		@php
		$author_string = '';

		foreach($post->authors as $author) {
			$author_string .= $author->name . ', ';
		}
		@endphp

		{{ rtrim($author_string, ', ') }}
	</small>
</p>
@endsection

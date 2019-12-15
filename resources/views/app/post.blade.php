@extends('layouts.app')

@section('content')
@page()
	<header class="flex flex-col text-gray-800">
		@if(!is_null($post->image))
			<img src="{{ $post->image->url }}" alt="{{ $post->title }}" />
		@endif
		<h1 class="text-3xl mb-0">
			{{ $post->title }}
		</h1>

		<small>Oppdatert {{ $post->updated_at->toDateTimeString() }} av {{ $post->author_string() }}</small>
	</header>

	<p class="mt-3">
		<strong>{!! parsedown($post->ingress) !!}</strong>
	</p>

	<p class="mt-3">{!! parsedown($post->content) !!}</p>
@endpage
@endsection

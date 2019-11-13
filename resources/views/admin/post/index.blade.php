@extends('layouts.admin')

@section('content')
<header class="flex">
	<h2 class="text-3xl">Poster</h2>
	<a class="ml-auto bg-teal-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('admin.post.create')}}">
		Ny Post
	</a>
</header>
<ul class="list-none flex flex-col">
	@foreach($posts as $post)
	<a class="bg-gray-200 border-gray-800 text-gray-800 rounded p-2 mt-1 border flex items-center" href="{{ route('admin.post.edit', ['id' => $post->id]) }}">
		<div class="w-full">
			<h3 class="text-2xl">{{ $post->title }}</h3>
			@if (!$post->draft)
				<small>Opprettet {{ $post->created_at }}</small>

				<br />

				<small>
					Publisert av
					@php
						$author_string = '';
						foreach($post->authors as $author) {
							$author_string .= $author->name . ', ';
						}
					@endphp

					{{ rtrim($author_string, ', ')}}
				</small>
			@else
				<small class="text-red-500">Ikke publisert</small>
			@endif
		</div>
	</a>
	@endforeach
</ul>
@endsection

@extends('layouts.app')

@section('content')
	@include('app.shared.hero')

	<h2 class="text-gray-800 text-4xl text-center mb-6 border-b">Nyheter</h2>
	@foreach($posts as $post)
		@include('app.shared.post', ['post' => $post])
	@endforeach
@endsection

@extends('layouts.app')

@section('content')
		<h2 class="text-gray-800 text-3xl">Nyheter</h2>
		@foreach($posts as $post)
			@include('app.shared.post', ['post' => $post])
		@endforeach
@endsection

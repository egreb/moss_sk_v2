<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Moss Schakklub</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<link href="/css/app.css" rel="stylesheet">
</head>

<body>
	<main class="min-h-screen flex flex-col bg-gray-100">
		@include('app.shared.header')

	<div class="container">
		@yield('content')
	</div>

		@include('app.shared.footer')
	</main>
	<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>

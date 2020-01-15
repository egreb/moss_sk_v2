<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Moss Schakklub</title>

    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200">
<div class="min-h-screen relative">
    @include('app.shared.header')

    @container(['class' => 'mt-4 flex-col lg:flex-row'])
    <main class="w-full justify-center mb-3 lg:pb-40 {{ isset($width) ? $width : 'lg:w-8/12' }}">
        @yield('content')
    </main>
    @if (!isset($sidebar) || $sidebar)
        @include('app.shared.sidebar')
    @endif
    @endcontainer

    @include('app.shared.footer')
</div>

<script src="{{ asset('js/main.js')}}"></script>
</body>
</html>

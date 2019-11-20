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
<div class="min-h-screen">
    @include('app.shared.header')

    <div class="container flex">
        @include('app.shared.sidebar')

        <main class="w-12/12 lg:w-9/12">
            @yield('content')
        </main>
    </div>

    @include('app.shared.footer')
</div>
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>

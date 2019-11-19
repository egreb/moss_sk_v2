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
        <aside class="sidebar hidden lg:flex flex-col lg:w-3/12 px-2 py-4">
            @if(isset($event))
                <section class="flex flex-col items-center bg-white rounded px-4 py-2">
                    <h3 class="text-gray-800">Neste event:</h3>
                    <h2 class="text-xl">{{ $event->title  }}</h2>
                    <span>{{ $event->format_date() }}</span>
                </section>
            @endif
        </aside>

        <main class="w-12/12 lg:w-9/12">
            @yield('content')
        </main>
    </div>

    @include('app.shared.footer')
</div>
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>

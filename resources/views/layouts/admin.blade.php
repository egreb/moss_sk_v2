<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - Moss Schakklub</title>

    <!-- Fonts -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">

</head>

<body class="bg-gray-200">
<div class="min-h-screen relative">
    @include('admin.shared.header')

    <div class="flex">
        @include('components.admin.sidebar')

        <main class="w-9/12">
            @yield('content')
        </main>
    </div>

    @include('app.shared.footer')
</div>

<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>

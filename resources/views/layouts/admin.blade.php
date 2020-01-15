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

<body class="bg-gray-200 min-h-screen relative">

@include('admin.shared.header')

<main class="flex" id="admin">
    @include('components.admin.sidebar')

    <section class="w-full sm:w-9/12 m-1 min-h-full pb-32 flex justify-center">
        @component('components.admin.page', ['title' => isset($title) ? $title : null])
            @yield('content')
        @endcomponent
    </section>
</main>

@include('app.shared.footer')

<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>

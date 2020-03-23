<!DOCTYPE html>
<html lang="nb">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161547446-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-161547446-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('meta::manager', [
        'title'         => isset($ogTitle) ? sprintf("%s - Moss Schakklub", $ogTitle) : 'Moss Schakklub',
        'description'   => isset($ogDescription) ? $ogDescription : 'Velkommen til Moss Schakklub!',
        'image'         => isset($ogImage) ? $ogImage : 'https://unsplash.com/photos/fzOITuS1DIQ',
    ])

    <title>Moss Schakklub</title>
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200 relative">
<main class="min-h-screen pt-20">
    @include('app.shared.header')

    @container(['class' => 'mt-4 flex-col lg:flex-row'])
    <article class="w-full justify-center mb-3 lg:pb-40 {{ isset($width) ? $width : 'lg:w-8/12' }}">
        @yield('content')
    </article>
    @if (!isset($sidebar) || $sidebar)
        @include('app.shared.sidebar')
    @endif
    @endcontainer
</main>
@include('app.shared.footer')
<script src="{{ asset('js/main.js')}}"></script>
</body>
</html>

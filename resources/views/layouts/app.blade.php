<!DOCTYPE html>
<html lang="nb">
<head>
    @production
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161547446-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-161547446-1');
        </script>
    @endproduction

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

<body class="bg-gray-100">
<main class="min-h-screen relative">
    @include('app.shared.header')

    <section class="container max-w-4xl mx-auto">
        <section class="grid grid-cols-3 gap-x-3 py-4">
            <article class="w-full mb-3 md:pb-40 col-span-3 lg:col-span-2">
                @yield('content')
            </article>

            @if (!isset($sidebar) || $sidebar)
                @include('app.shared.sidebar')
            @endif
        </section>
    </section>
    @include('app.shared.footer')
</main>
<script src="{{ asset('js/main.js')}}"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
</body>
</html>

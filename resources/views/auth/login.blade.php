<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet"/>
    <title>Moss Schakklub - Login</title>
</head>
<body>
<main class="h-screen grid place-items-center">
    <div class="w-full max-w-xs">
        <div class="flex flex-col items-center gap-y-2 pb-4">
            <h2 class="text-3xl text-gray-800">Logg inn</h2>
            <h3 class="text-2xl text-gray-800">Moss Schakklub - Dashboard</h3>
        </div>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="username">
                    Brukernavn
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" placeholder="Brukernavn" name="email">
                @error('email')
                <p class="text-red-400">{{ $message }}</p class="text-red-400">
                @enderror
            </div>
            <div class="mb-6">
                <label for="password">
                    Passord
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" placeholder="******************" name="password">
                @error('password')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Logg inn
                </button>
            </div>
        </form>
    </div>
</main>
</body>
</html>

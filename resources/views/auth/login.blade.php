@extends('layouts.app', ['sidebar' => false, 'width' => 'lg:w-12/12'])

@section('content')
    <section class="flex justify-center items-center pt-20">
        <div class="w-full max-w-xs">
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
    </section>
@endsection

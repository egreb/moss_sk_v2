@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('admin.schedule.store') }}">
        @csrf

        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Tittel
        </label>
        <input id="title" type="text" placeholder="Tittel" name="title" class="w-64">
        @error('title')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="mt-6 flex sm:flex-end">
            <button class="btn btn-blue">Lagre</button>
            <a class="btn" href="{{ route('admin.schedule.index') }}">Avbryt</a>
        </div>

    </form>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('app.shared.hero')

        <div class="flex justify-center w-full bg-white rounded shadow">
            <section class="articles p-2 flex flex-col justify-center items-center w-full">
                <h2 class="text-gray-800 text-4xl text-center mb-6 border-b w-64">Nyheter</h2>
                @foreach($posts as $post)
                    @include('app.shared.post', ['post' => $post])
                @endforeach
            </section>
        </div>
    </div>
@endsection

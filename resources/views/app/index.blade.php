@extends('layouts.app')

@section('content')
    @include('app.shared.hero')

    <div class="flex justify-center w-full">
        <section class="articles p-0 sm:p-2 flex flex-col justify-center items-center w-full">
            <h2 class="text-gray-800 text-4xl text-center border-b w-64 pb-4 pt-6">Nyheter</h2>
            <section class="flex flex-col space-y-2 px-1">
                @foreach($posts as $post)
                    @include('app.shared.post', ['post' => $post])
                @endforeach
            </section>
        </section>
    </div>
@endsection

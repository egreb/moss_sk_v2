@extends('layouts.app')

@section('content')
<div class="container">
    @include('app.shared.hero')

    <div class="flex justify-center w-full">
        <section class="articles p-0 sm:p-2 flex flex-col justify-center items-center w-full">
            <h2 class="text-gray-800 text-4xl text-center mb-0 border-b w-64 py-6 border-none">Nyheter</h2>
            @foreach($posts as $post)
            @include('app.shared.post', ['post' => $post])
            @endforeach
        </section>
    </div>
</div>
@endsection
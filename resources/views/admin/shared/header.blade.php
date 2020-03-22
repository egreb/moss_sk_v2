@extends('shared.nav', ['class' => 'mx-0', 'section_class' => 'w-full hidden flex flex-grow flex-col lg:justify-end items-end lg:flex lg:flex-row lg:items-center lg:w-auto justify-between'])

@section('menu')
@foreach ($routes as $route)
    <a href="{{ $route['route'] }}" class="menu-item lg:hidden">{{ $route['title']}}</a>
@endforeach

<form class="hidden lg:block" method="POST" action="/logout">
    @csrf
    <button class="menu-item">
        Logg ut
    </button>
</form>
@endsection
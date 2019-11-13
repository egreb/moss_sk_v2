@extends('shared.nav')

@section('urls')
  <a href="/about" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
    Om klubben
  </a>
  <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
    Terminliste
  </a>
  <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
    Resultater
  </a>

  @if(Auth::check())
    <a href="/admin" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
      Dashboard
    </a>
  @else
    <a href="/login" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
    Logg inn
  </a>
  @endif
@endsection

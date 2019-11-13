@extends('shared.nav')

@section('urls')
<a href="{{ route('admin.post.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
  Poster
</a>

<a href="{{ route('home') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
  Se nettsiden
</a>


<form method="POST" action="/logout">
  @csrf
  <button class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
    Logg ut
  </button>
</form>
@endsection

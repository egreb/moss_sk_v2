@extends('shared.nav')

@section('menu')
    <a href="{{ route('admin.member.home') }}"
       class="menu-item">
        Medlemmer
    </a>
    <a href="{{ route('admin.post.index') }}"
       class="menu-item">
        Nyheter
    </a>

    <a href="{{ route('admin.schedule.index') }}"
       class="menu-item">
        Terminlister
    </a>

    <a href="{{ route('home') }}" class="menu-item">
        Se nettsiden
    </a>


    <form method="POST" action="/logout">
        @csrf
        <button class="menu-item">
            Logg ut
        </button>
    </form>
@endsection

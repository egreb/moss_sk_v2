@extends('shared.nav')

@section('menu')
@isset($about_routes)
@component('components.header.menu_item', ['route' => '#toggle-menu', 'icon' => true])
<div class="menu-item flex justify-end list-none lg:flex-row-reverse">
    <span class="text-white mr-2 lg:ml-1 lg:mr-0">+</span>Om klubben
</div>

<ul class="flex flex-col rounded relative lg:absolute hidden submenu">
    @foreach($about_routes as $name => $url)
    <a class="menu-item toggle-menu lg:bg-gray-800 lg:pt-4 lg:p-2 lg:px-4 relative w-full lg:mr-0" href="{{ $url }}" onclick="event.stopPropagation();">
        <div class="flex items-center w-full justify-end lg:justify-center pr-2 lg:pr-0">
            {{ $name }}
        </div>
    </a>
    @endforeach
</ul>
@endcomponent
@endisset

<a href="{{ route('schedule') }}" class="menu-item">
    Terminliste
</a>

@includeIf('app.shared.results-menu-item', ['results' => $results])

@component('components.header.menu_item', ['route' => '#toggle-menu', 'icon' => true])
<div class="menu-item flex justify-end list-none lg:flex-row-reverse">
    <span class="text-white mr-2 lg:ml-1 lg:mr-0">+</span>Online
</div>

<ul class="flex flex-col rounded relative lg:absolute hidden submenu">
    <a class="menu-item toggle-menu lg:bg-gray-800 lg:pt-4 lg:pb-2 lg:px-4 relative w-full lg:mr-0" href="https://www.chess.com/club/moss-schakklub" onclick="event.stopPropagation();">
        <div class="flex items-center w-full justify-end lg:justify-center pr-2 lg:pr-0">
            chess.com
        </div>
    </a>
    <a class="menu-item toggle-menu lg:bg-gray-800 lg:pt-4 lg:pb-2 lg:px-4 relative w-full pr-2 lg:mr-0" href="https://lichess.org/team/moss-schakklub" onclick="event.stopPropagation();">
        <div class="flex items-center w-full justify-end lg:justify-center lg:pr-0">
            lichess.org
        </div>
    </a>
</ul>
@endcomponent

<section class="flex ml-auto mt-6 lg:mt-0 items-center">
    <a href="https://www.facebook.com/pages/category/Sports-Team/Moss-Schakklub-1543400812547928/" target="_blank">
        <svg class="text-teal-200 hover:text-white fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M17 1H3c-1.1 0-2 .9-2 2v14c0 1.101.9 2 2 2h7v-7H8V9.525h2v-2.05c0-2.164 1.212-3.684 3.766-3.684l1.803.002v2.605h-1.197c-.994 0-1.372.746-1.372 1.438v1.69h2.568L15 12h-2v7h4c1.1 0 2-.899 2-2V3c0-1.1-.9-2-2-2z" />
        </svg>
    </a>

    <a href="mailto:post@sjakknet.no" class="ml-6 lg:ml-3">
        <svg class="text-teal-200 hover:text-white fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M14.608 12.172c0 .84.239 1.175.864 1.175 1.393 0 2.28-1.775 2.28-4.727 0-4.512-3.288-6.672-7.393-6.672-4.223 0-8.064 2.832-8.064 8.184 0 5.112 3.36 7.896 8.52 7.896 1.752 0 2.928-.192 4.727-.792l.386 1.607c-1.776.577-3.674.744-5.137.744-6.768 0-10.393-3.72-10.393-9.456 0-5.784 4.201-9.72 9.985-9.72 6.024 0 9.215 3.6 9.215 8.016 0 3.744-1.175 6.6-4.871 6.6-1.681 0-2.784-.672-2.928-2.161-.432 1.656-1.584 2.161-3.145 2.161-2.088 0-3.84-1.609-3.84-4.848 0-3.264 1.537-5.28 4.297-5.28 1.464 0 2.376.576 2.782 1.488l.697-1.272h2.016v7.057h.002zm-2.951-3.168c0-1.319-.985-1.872-1.801-1.872-.888 0-1.871.719-1.871 2.832 0 1.68.744 2.616 1.871 2.616.792 0 1.801-.504 1.801-1.896v-1.68z" />
        </svg>
    </a>
</section>
@endsection
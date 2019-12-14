@php
$class = 'flex justify-center bg-gray-200 text-gray-800 p-2 text-xl rounded lg:block lg:inline-block lg:mt-0 lg:text-teal-200 lg:hover:text-white lg:mr-4 lg:px-5 relative more mt-2';
@endphp

@if(isset($icon) && $icon)
    <li class="{{ $class }} flex-col submenu">
        {{ $slot }}
    </li>
@else
    <a href="{{ $route }}"
       class="{{ $class }}" onclick="stopPropagation()">
        {{ $slot }}
    </a>
@endif


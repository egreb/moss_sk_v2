@php
    $class = 'more list-none';
@endphp

@if(isset($icon) && $icon)
    <li class="{{ $class }} flex-col toggle-menu lg:relative">
        {{ $slot }}
    </li>
@else
    <a href="{{ $route }}"
       class="{{ $class }}" onclick="stopPropagation()">
        {{ $slot }}
    </a>
@endif


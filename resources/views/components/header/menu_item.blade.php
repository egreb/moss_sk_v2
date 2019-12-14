@if(isset($icon) && $icon)
    <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 lg:px-5 relative more submenu">
        {{ $slot }}

        <svg class="fill-current text-teal-500 inline-block h-3 w-3" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 24 24">
            <path class="heroicon-ui"
                  d="M11 18.59V3a1 1 0 0 1 2 0v15.59l5.3-5.3a1 1 0 0 1 1.4 1.42l-7 7a1 1 0 0 1-1.4 0l-7-7a1 1 0 0 1 1.4-1.42l5.3 5.3z"/>
        </svg>
    </li>
@else
    <a href="{{ $route }}"
       class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 lg:px-5 relative more" onclick="stopPropagation()">
        {{ $slot }}
    </a>
@endif


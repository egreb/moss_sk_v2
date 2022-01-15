<button id="{{ $id }}" data-dropdown-toggle="{{ $dropdown }}" type="button" class="nav-button">
    {{ $title }}
    <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</button>
<div id="{{$dropdown}}" class="hidden nav-dropdown">
    <ul class="py-1" aria-labelledby="{{ $id }}">
        @foreach($routes as $title => $data)
            @if(is_array($data))
                <li class="text-right md:text-left pt-2 px-4">
                    <span class="text-gray-400">{{ $title }}</span>
                </li>
                @foreach ($data as $d)
                    <li>
                        <a href="{{ $d['url'] }}"
                           class="nav-link">{{ $d['title'] }}</a>
                    </li>
                @endforeach
            @else
                <li>
                    <a href="{{ $data }}"
                       class="nav-link">{{ $title }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>

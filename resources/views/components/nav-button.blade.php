<button id="{{ $id }}" data-dropdown-toggle="{{ $dropdown }}" type="button" class="nav-button">{{ $title }}</button>
<div id="{{$dropdown}}" class="hidden nav-dropdown">
    <ul class="py-1" aria-labelledby="{{ $id }}">
        @foreach($routes as $title => $data)
            @if(is_array($data))
                <li class="text-right md:text-left py-2 px-4 md:px-6">
                    <span class="text-gray-400 text-center">{{ $title }}</span>
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

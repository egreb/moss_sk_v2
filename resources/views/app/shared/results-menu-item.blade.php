<div class="nav-item">
    <span class="nav-item__label">
        Resultater
    </span>

    <ul class="hidden nav-item__menu">
        @foreach($results as $res)
            @if(!$res->tournaments->isEmpty())
                <li class="nav-item">
                    <span class="nav-item__label">
                        {{ $res->title }}
                    </span>

                    <ul class="hidden nav-item__menu">
                        @foreach($res->tournaments as $tournament)
                            <a href="{{ $tournament->url }}" class="nav-link" target="_blank">
                                <span class="nav-link__label">
                                    {{ $tournament->title }}
                                </span>
                            </a>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</div>

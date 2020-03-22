<section class="flex justify-between items-center p-1 mt-2">
    <a class="text-white hover:text-blue-200 text-2xl p-2" href="{{ $route }}">{{ $title }}</a>
    @isset($btn_route)
    <a class="btn btn-success" href="{{ $btn_route }}" onclick="event.stopPropagation()">
        <span class="mb-1">&#43;</span>
    </a>
    @endisset
</section>
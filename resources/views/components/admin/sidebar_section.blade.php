<section class="flex justify-between items-center p-1 mt-2">
    <a class="text-white hover:text-blue-200" href="{{ $route }}">{{ $title }}</a>
    @isset($btn_route)
        <a class="btn btn-success sm flex justify-center items-center" href="{{ $btn_route }}">
            <span class="mb-1">&#43;</span>
        </a>
    @endisset
</section>

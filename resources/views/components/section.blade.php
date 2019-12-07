<section class="flex flex-col items-center bg-white rounded px-4 py-2 {{ isset($width) ? $width : 'w-12/12' }} {{ isset($customClasses) ? $customClasses : '' }}">
    {{ $slot }}
</section>

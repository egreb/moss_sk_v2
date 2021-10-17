<aside class="sidebar flex lg:justify-center px-0 lg:px-2 pt-4 pb-40 lg:pb-0 w-full lg:w-2/12 lg:relative">
    <div class="flex flex-col items-center rounded pb-6 lg:pb-0 w-full lg:sticky lg:top-10">
        @include('app.shared.event', ['class' => 'hidden lg:flex'])

        @if(isset($relevant_links) && !$relevant_links->isEmpty())
        <section class="flex flex-col rounded px-4 pb-4 w-full lg:10/12">
            <h3 class="text-gray-800 font-semibold text-lg text-center">Aktuelle lenker</h3>
            @foreach($relevant_links as $link)
            <a class="text-base lg:text-lg text-center" href="{{ $link->url }}" target="_blank">
                {{ $link->description }}
            </a>
            @endforeach
        </section>
        @endif

        <section class="flex flex-col px-4 pb-4 w-full lg:10/12 items-center justify-center">
            <h3 class="text-gray-800 text-lg font-semibold">Sponsorer</h3>

            <a href="https://www.norsk-tipping.no/grasrotandelen#search=983764886" class="flex justify-center mt-3">
                <img src="/img/grasrot.png" class="block" style="width: 150px;height: 400px;">
            </a>

        </section>
    </div>
</aside>
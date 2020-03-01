<aside class="sidebar flex lg:justify-center px-0 lg:px-2 pb-40 lg:pb-0 w-full lg:w-4/12">
    <div class="flex flex-col items-center bg-white rounded shadow pb-6 lg:pb-0 w-full">
        @include('app.shared.event', ['class' => 'hidden lg:flex'])

        @sect(['width' => 'w-12/12 lg:10/12'])
        @if(isset($relevant_links) && !$relevant_links->isEmpty())
            <h3 class="text-gray-800 text-lg text-center">Aktuelle lenker</h3>
            @foreach($relevant_links as $link)
                <a class="text-base lg:text-lg text-center mt-6 lg:mt-3"
                   href="{{ $link->url }}" target="_blank">
                    {{ $link->description }}
                </a>
            @endforeach
        @endif
        @endsect

        @sect(['width' => 'w-12/12 lg:10/12'])
        <h3 class="text-gray-800 text-lg text-center">Sponsorer</h3>

        <a href="https://www.norsk-tipping.no/grasrotandelen#search=983764886" class="flex justify-center mt-3">
            <img src="/img/grasrot.png" class="block" style="width: 150px;height: 400px;">
        </a>

        @endsect
    </div>
</aside>

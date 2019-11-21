<aside class="sidebar hidden lg:flex flex-col lg:w-4/12 px-2">
    @if(isset($event))
        <section class="flex flex-col items-center bg-white rounded px-4 py-2 shadow w-10/12">
            <h3 class="text-gray-800">Neste event:</h3>
            <h2 class="text-xl">{{ $event->title  }}</h2>
            <span>{{ $event->date->format('d-m-Y') }}</span>
        </section>
    @endif
    <section class="shadow bg-white rounded w-10/12 flex flex-col items-center px-4 py-2">
        <h3 class="text-gray-800 text-lg">Aktuelle lenker</h3>
        <a class="text-sm text-center mt-3"
           href="http://turneringsservice.sjakklubb.no/invitation.aspx?TID=KMhurtigsjakk2019-FredriksstadSchakselskap">
            ØM i hurtigsjakk for lag 2019 Fredrikstad / Lisleby
        </a>
        <a class="text-sm text-center mt-3"
           href="http://turneringsservice.sjakklubb.no/standings.aspx?TID=Ostlandsserien2019-20201og2div-NorgesSjakkforbund">
            Østlandsserien 2019 - 20 1. og 2. divisjon B
        </a>
        <a class="text-sm text-center mt-3"
           href="http://turneringsservice.sjakklubb.no/standings.aspx?TID=Ostlandsserien201920203div-NorgesSjakkforbund">Østlandsserien
            2019 - 20 3. divisjon avd D</a>

    </section>
</aside>

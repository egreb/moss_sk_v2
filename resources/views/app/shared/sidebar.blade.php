<aside class="sidebar flex lg:justify-center px-2 pb-32 lg:pb-0 w-full lg:w-4/12">
    <div class="flex flex-col items-center bg-white rounded shadow pb-6 lg:pb-0 w-full">
        @include('app.shared.event', ['class' => 'hidden lg:flex'])

        @sect(['width' => 'w-10/12'])
            <h3 class="text-gray-800 text-lg text-center">Aktuelle lenker</h3>
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
        @endsect
    </div>
</aside>

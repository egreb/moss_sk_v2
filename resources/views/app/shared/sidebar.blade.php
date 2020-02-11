<aside class="sidebar flex lg:justify-center px-0 lg:px-2 pb-40 lg:pb-0 w-full lg:w-4/12">
    <div class="flex flex-col items-center bg-white rounded shadow pb-6 lg:pb-0 w-full">
        @include('app.shared.event', ['class' => 'hidden lg:flex'])

        @sect(['width' => 'w-12/12 lg:10/12'])
        <h3 class="text-gray-800 text-lg text-center">Aktuelle lenker</h3>
        <a class="text-base md:text-sm text-center mt-6 lg:mt-3"
           href="http://turneringsservice.sjakklubb.no/invitation.aspx?TID=KMhurtigsjakk2019-FredriksstadSchakselskap">
            ØM i hurtigsjakk for lag 2019 Fredrikstad / Lisleby
        </a>
        <a class="text-base md:text-sm text-center mt-6 lg:mt-3"
           href="http://turneringsservice.sjakklubb.no/standings.aspx?TID=Ostlandsserien2019-20201og2div-NorgesSjakkforbund">
            Østlandsserien 2019 - 20 1. og 2. divisjon B
        </a>
        <a class="text-base md:text-sm text-center mt-6 lg:mt-3"
           href="http://turneringsservice.sjakklubb.no/standings.aspx?TID=Ostlandsserien201920203div-NorgesSjakkforbund">Østlandsserien
            2019 - 20 3. divisjon avd D</a>
        @endsect

        @sect(['width' => 'w-12/12 lg:10/12'])
        <h3 class="text-gray-800 text-lg text-center">Sponsorer</h3>

        <a href="https://www.norsk-tipping.no/grasrotandelen#search=983764886" class="flex justify-center mt-3">
            <img src="/img/grasrot.png" class="block" style="width: 150px;height: 400px;">
        </a>

        @endsect
    </div>
</aside>

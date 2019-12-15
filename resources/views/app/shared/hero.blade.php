@sect(['customClasses' => 'mb-3 shadow'])
    <div class="px-4 py-4 sm:flex">
        <div class="w-4/4 sm:w-3/4">
            <h1 class="text-3xl border-b text-center sm:text-left">Velkommen til Moss Schakklub</h1>
            <p class="mt-1 text-justify sm:text-left">
                I Moss Schakklub har vi åpent for alle som vil spille sjakk. <br/>
                Klubben ble stiftet i 1918, og har siden den gang fostret frem mange gode spillere. <br/>
                Vi treffes i lokalene til <a
                    href="https://www.google.no/maps/place/Vansj%C3%B8+B%C3%A5tforening/@59.426515,10.684193,17z/data=%213m1%214b1%214m2%213m1%211s0x464152bd79f93cd1:0xeb8af9eebe8d7cf3">Vansjø
                    Båtforening</a> i Øreveien 38, 1533 Moss. <br/>
                <br/>
            </p>

            <p class="text-center"><strong>Vi har åpent fra kl. 18:00 - 23:00 hver torsdag.</strong></p>

            @include('app.shared.event', ['class' => 'flex lg:hidden shadow px-6 py-2 bg-gray-200 rounded mt-3'])
        </div>

        <div class="hidden sm:w-1/4 sm:flex sm:ml-4 items-center justify-end">
            <img class="mb-auto"
                src="https://images.unsplash.com/photo-1545927088-dab09318f32e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=80">
        </div>
    </div>
@endsect

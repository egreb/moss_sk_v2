@extends('layouts.app')

@section('content')
<x-page>
    <h2 class="text-gray-800 text-3xl">Klubbinformasjon</h2>

    <section class="bg-2 mt-2">
        <header>
            <h3 class="text-2xl">Medlemskategorier</h3>
        </header>

        <ul class="member-categories">
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Hovedmedlem, inkl. startavgifter, voksne</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.1650</div>
            <li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Hovedmedlem, inkl. startavgifter, junior</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.900</div>
            <li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Hovedmedlem, uten startavgifter, voksne</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.1100</div>
            <li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Bimedlemskap, uten startavgifter, voksne</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.500</div>
            <li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Bimedlemskap, uten startavgifter, junior</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.250</div>
            <li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Pensjonister/trygdede, inkl. startavgifter</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.1350</div>
            <li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Studenter under 30 år, inkl startavgifter</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.1350</div>
            <li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Førstegangsmedlemmer som er med i MSU</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">kr.200</div>
            <li>

        </ul>
    </section>

    <section class="bg-2 mt-2">
        <header>
            <h3 class="text-2xl">Turneringspriser</h3>
        </header>
        <ul class="member-categories">
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Klubbmesterskap Langsjakk <br /> Hurtig <br />
                    Lyn
                </div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800"> 250 kr <br /> 150 kr <br /> 150 kr
                </div>
            </li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-3/4 p-4 bg-gray-200">Høstmesterskap langsjakk</div>
                <div class="flex items-center w-1/4 bg-gray-400 p-4 text-gray-800">250 kr</div>
            </li>
            </li>
        </ul>
    </section>

    <section class="bg-2 mt-2">
        <header>
            <h3 class="text-2xl">Styret</h3>
        </header>
        <ul class="member-categories">
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-4/12 p-4 bg-gray-200">Verv</div>
                <div class="flex items-center w-4/12 bg-gray-200 p-4 text-gray-800">Navn</div>
                <div class="flex items-center w-4/12 bg-gray-200 p-4 text-gray-800">Telefon</div>
            </li>

            @foreach($boardmembers as $boardmember)
            @include('app.misc.board-member', ['boardmember' => $boardmember])
            @endforeach
        </ul>
    </section>

    <section class="bg-2 mt-2">
        <header>
            <h3 class="text-2xl">Lag</h3>
        </header>
        <ul class="member-categories">
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-4/12 p-4 bg-gray-200">Lag</div>
                <div class="flex items-center w-4/12 bg-gray-200 p-4 text-gray-800">Leder</div>
                <div class="flex items-center w-4/12 bg-gray-200 p-4 text-gray-800">Telefon</div>
            </li>

            @foreach($teams as $team)
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-4/12 p-4">{{ $team['name'] }}</div>
                <div class="flex items-center w-4/12 p-4">{{ $team['leader'] }}</div>
                <div class="flex items-center w-4/12 p-4">{{ $team['phone'] }}</div>
            </li>
            @endforeach
        </ul>
    </section>

    <section class="bg-2 mt-2">
        <header>
            <h3 class="text-2xl">Kontaktinformasjon</h3>
        </header>

        <ul class="member-categories">
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-4/12 p-4 bg-gray-200 border-gray-800 border-r">Adresse</div>
                <div class="flex items-center w-8/12 p-4">Øreveien 38 1533 Moss</div>
            </li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-4/12 p-4 bg-gray-200 border-gray-800 border-r">Epost</div>
                <div class="flex items-center w-8/12 p-4"><a href="mailto:post@sjakknet.no">post@sjakknet.no</a>
                </div>
            </li>
            <li class="flex flex-wrap border-gray-800 border-b">
                <div class="flex items-center w-4/12 p-4 bg-gray-200 border-gray-800 border-r">Bankkonto</div>
                <div class="flex items-center w-8/12 p-4"><a href="mailto:post@sjakknet.no">1061.21.35202</a></div>
            </li>
        </ul>
    </section>
    <div> kr.1650</div>
</x-page>
@endsection
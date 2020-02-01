@extends('layouts.app')

@section('content')
    @page
    <h1 class="page-title">Regler</h1>

    <h2 class="page-subtitle">§ 1 Regelverk</h2>
    <p>Moss Schakklub spiller etter FIDEs regler for sjakk slik de er oversatt av NSF: <a
            href="http://www.sjakk.no/lover-og-reglementer/sjakkreglene/">http://www.sjakk.no/lover-og-reglementer/sjakkreglene/</a>
    </p>

    <p>Fra FIDE-reglene gjøres det her unntak for mobilreglene i § 6, og presisering i forhold til fremmøtetidspunkter i
        § 4.</p>

    <h2 class="page-subtitle">§ 2 Turneringsform</h2>

    <p>Styret bestemmer turneringsform, klasseinndeling, betenkningstid, kvalitetsberegning og premiering i henhold til
        det som til enhver tid anses best for klubbens medlemmer. Det bør arrangeres klubbmesterskap i lynsjakk,
        hurtigsjakk og langsjakk årlig.</p>

    <h2 class="page-subtitle">§ 3 Regelbrudd</h2>

    <p class="p-1 mb-2">Ved brudd på spillereglene skal turneringsleder tilkalles og treffe en avgjørelse basert på
        gjeldende regler.</p>

    <p class="p-1 mb-2">Turneringsleders avgjørelse kan innklages til en turneringskomité bestående av leder, nestleder
        og turneringsleder. Dersom en av disse er inhabil, eller av andre grunner ikke bør behandle saken, utnevner
        styret en erstatter. Klage skal meddeles komitéen innen 48 timer etter partislutt, og skal leveres skriftlig
        innen 1 uke fra partislutt.</p>

    <h2 class="page-subtitle">§ 4 Fremmøte</h2>

    <p class="p-1 mb-2">I de fleste turneringer i Moss Schakklub settes rundene opp på spilledagen. Spillere som ikke er
        tilstede ved oppsett av runden får ikke spille, med mindre turneringsleder er informert om deltagelse på
        forhånd. Turneringsleder kan sette tidligere tidspunkter for oppmøte dersom dette opplyses på forhånd.</p>
    <p class="p-1 mb-2">I turneringer hvor runden er satt opp på forhånd starter klokkene ved oppsatt starttidspunkt.
        Dersom en av spillerne ikke møter innen 30 min. etter oppsatt starttidspunkt dømmes vedkommende til tap, med
        mindre turneringsleder er informert om forsinkelsen på forhånd.</p>



    <h2 class="page-subtitle">§ 5 Utsatte partier</h2>
    <p class="p-1 mb-2">Enkelte turneringer gjennomføres med mulighet for å utsette partier. For å utsette et parti skal
        motstander informeres så tidlig som mulig, senest kl. 16.00 på spilledagen. Turneringsleder skal også
        informeres.</p>

    <p class="p-1 mb-2">Utsatte partier bør spilles så raskt som mulig, helst på første mulige avsatte dag for utsatte
        partier. Det er spillernes eget ansvar å få gjennomført partiene. Partier kan også spilles på forhånd av oppsatt
        dato. Hvis ikke turneringsleder har oppsatt en annen frist må partier være gjennomført før siste runde.</p>

    <p class="p-1 mb-2">Partier som ikke blir spilt dømmes som tap for begge spillere, med mindre turneringsleder finner
        at en av spillerne har gjort tilstrekkelig innsats for å få gjennomført partiet. Vedkommende skal i så fall
        idømmes seier på WO. Ved forfall i siste runde dømmes seier på WO til den fremmøtte spiller.</p>

    <h2 class="page-subtitle">§ 6 Mobiltelefon</h2>

    <p class="p-1 mb-2">Med mindre annet er opplyst av turneringsleder skal mobiltelefoner være fullstendig avslått når
        det spilles langsjakk, mens den i turneringer i lyn- og hurtigsjakk minimum skal være lydløs. Gir telefonen lyd
        dømmes spilleren til tap.</p>

    <p class="p-1 mb-2">Dersom en spiller har behov for mobilbruk i strid med dette må dette godkjennes av
        turneringsleder før partistart.</p>

    <p class="p-1 mb-2">Moss Schakklub fraviker med dette FIDEs totalforbud mot mobil i spillelokalet. Turneringsleder
        kan stille strengere eller mildere krav dersom dette opplyses før partistart.</p>

    <h2 class="page-subtitle">§ 7 Premieklasser</h2>

    <p class="p-1 mb-2">For turneringer hvor alle spiller i samme gruppe, men skal premieres i ulike klasser, benyttes i
        utgangspunktet følgende ratingklasser: Mester (1800+), A (1400-1799) og B (Under 1400). Aktuell FIDE-rating
        (lyn/hurtig/lang) ved turneringens start legges til grunn. For klubbmesterskapet i langsjakk følger annen
        klasseinndeling. Dersom en spiller ikke har aktuell rating plasseres vedkommende av turneringsleder med
        utgangspunkt i spillerens andre ratingtall eller kjente prestasjoner.</p>

    <p class="p-1 mb-2">Styret bestemmer hvilke turneringer som skal premieres og antall premier i hver klasse. Styret
        står fritt til å benytte andre premieklasser dersom spesielle forhold (f.eks. høyt eller lavt deltagerantall)
        tilsier at en annen klasseinndeling er bedre egnet.</p>

    <h2 class="page-subtitle">§ 8 Klubbmesterskapet</h2>

    <p class="p-1 mb-2">Klubbmesterskapet i langsjakk arrangeres årlig. Styret bestemmer turneringsform. Dersom det
        spilles i adskilte grupper benyttes følgende regler for opprykk og klasseinndeling:</p>
    <ul>
        <li>- De to best plasserte i hver klasse rykker opp.</li>
        <li>- Kvalifisert for en klasse er også de tre første fra forrige års klubbmesterskap.</li>
        <li>- Øvrige plasser besettes etter aktuell ratingliste ved starttidspunktet.</li>
        <li>- Spillere uten rating plasseres av turneringsleder. Dersom særlige grunner tilsier det kan turneringsleder
            gi en spiller tillatelse til å delta i en annen klasse enn det ratingen tilsier.
        </li>
    </ul>

    <h2 class="page-subtitle">§ 9 Poenglikhet</h2>

    <p class="p-1 mb-2">Ved poenglikhet mellom spillere benyttes turneringens kvalitetsberegning for å rangere spillerne
        og kåre en vinner.</p>

    <p class="p-1 mb-2">Det spilles kun stikkamp dersom spillerne i kampen om en klubbmestertittel ikke kan skilles med
        turneringens kvalitetsberegning. I en slik situasjon bestemmer turneringsleder gjennomføringsmåte og
        betenkningstid for stikkampen.</p>
    @endpage
@endsection

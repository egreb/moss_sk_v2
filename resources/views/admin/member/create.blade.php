@extends('layouts.admin')

@section('content')
    <section class="p-1">
        <header class="flex">
            <h1 class="text-2xl">Opprett medlem</h1>
        </header>
        <form method="POST" action="{{ route('admin.member.store') }}">
            @csrf

            @include('components.input', ['name' => 'first_name', 'label' => 'Fornavn', 'class' => 'w-full'])
            @include('components.input', ['name' => 'last_name', 'label' => 'Etternavn', 'class' => 'w-full'])
            @include('components.input', ['name' => 'address', 'label' => 'Adresse', 'class' => 'w-full'])
            @include('components.input', ['name' => 'zip_code', 'label' => 'Postnummer'])
            @include('components.input', ['name' => 'phone_number', 'label' => 'Telefonnummer', 'type' => 'number'])
            @include('components.input', ['name' => 'email', 'label' => 'Epost', 'class' => 'w-full', 'type' => 'email'])

            <footer class="flex mt-6 justify-center sm:justify-start">
                <button class="btn btn-blue">Lagre</button>
                <a class="btn" href="{{ route('admin.member.home') }}">Avbryt</a>
            </footer>
        </form>

    </section>
@endsection

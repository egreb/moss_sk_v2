@extends('admin.admin')

@section('content')
    <section class="p-1">
        <header class="flex">
            <h1 class="text-2xl">Rediger medlem {{ $member->full_name() }}</h1>
        </header>

        <form method="POST" action="{{ route('admin.member.store') }}">
            @csrf

            @include('components.input', ['name' => 'first_name', 'label' => 'Fornavn', 'class' => 'w-full', 'value' => $member->first_name])
            @include('components.input', ['name' => 'last_name', 'label' => 'Etternavn', 'class' => 'w-full', 'value' => $member->last_name])
            @include('components.input', ['name' => 'address', 'label' => 'Adresse', 'class' => 'w-full', 'value' => $member->address])
            @include('components.input', ['name' => 'zip_code', 'label' => 'Postnummer', 'value' => $member->zip_code])
            @include('components.input', ['name' => 'phone_number', 'label' => 'Telefonnummer', 'type' => 'number', 'value' => $member->phone_number])
            @include('components.input', ['name' => 'email', 'label' => 'Epost', 'class' => 'w-full', 'type' => 'email', 'value' => $member->email])

            <input type="hidden" name="id" value="{{ $member->id }}">

            <footer class="flex mt-6 justify-center sm:justify-start">
                <button class="btn btn-blue">Lagre</button>
                <a class="btn" href="{{ route('admin.member.home') }}">Avbryt</a>
            </footer>
        </form>

    </section>
@endsection

@extends('layouts.admin')

@section('content')
    <section class="p-1">
        <header class="flex items-center justify-between mb-3">
            <h1 class="text-3xl">Medlemmer</h1>
            <a class="btn btn-success" href="{{ route('admin.member.create') }}">Legg til</a>
        </header>

        @if(!$members->isEmpty())
            <ul class="flex flex-col">
                @foreach($members as $member)
                    <li class="flex p-2 border rounded">
                        <div class="w-3/5 sm:w-4/12">
                            <a href="{{ route('admin.member.edit', ['id' => $member->id]) }}">
                                <strong>{{ $member->full_name() }}</strong>
                            </a>
                        </div>
                        <div class="w-1/5 sm:w-4/12 flex justify-center px-1">
                            @if(!is_null($member->email))
                                <a href="mailto:{{ $member->email }}">
                                    <span class="block sm:hidden">Epost</span>
                                    <span class="hidden sm:block">{{ $member->email }}</span>
                                </a>
                            @endif
                        </div>
                        <div class="w-1/5 sm:w-1/12 flex justify-center px-1">
                            @if(!is_null($member->phone_number))
                                <a href="tel:{{ $member->phone_number }}">
                                    <span class="block sm:hidden">Tlf</span>
                                    <span class="hidden sm:block">{{ $member->phone_number }}</span>
                                </a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-red-500">Det er ikke registrert noen medlemmer enda.</p>
        @endif
    </section>
@endsection

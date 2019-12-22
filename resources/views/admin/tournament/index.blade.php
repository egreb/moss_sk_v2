@extends('layouts.admin')

@section('content')
    @sect(['customClasses' => 'mt-3'])
    <h2 class="text-3xl">Resultater</h2>

    @isset($results)
        <ul class="flex flex-col w-full">
            @foreach($results as $result)
                @component('components.admin.page_list_element')
                    {{ $result->title }}
                @endcomponent
            @endforeach
        </ul>
    @endisset
    @endsect
@endsection

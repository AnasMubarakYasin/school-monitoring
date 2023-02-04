@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', 'Dashboard')

@section('content')
    <div class="grid gap-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-resource.infobox></x-resource.infobox>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            @foreach ($stats as $stat)
                <x-resource.stat :resource="$stat"></x-resource.stat>
            @endforeach
        </div>
        <x-school-year.stat></x-school-year.stat>
    </div>
@endsection

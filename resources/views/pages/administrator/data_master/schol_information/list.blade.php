@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('school identity'))

@section('content')
    <x-identitas-sekolah.view :resource={{ $resource }}></x-identitas-sekolah.view>
@endsection

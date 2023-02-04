@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('list of administrator'))

@section('content')
        <x-administrator.index></x-administrator.index>
@endsection
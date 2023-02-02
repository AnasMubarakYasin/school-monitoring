@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('update of major'))

@section('content')
    <x-resource.form :resource="$resource"></x-resource.form>
@endsection

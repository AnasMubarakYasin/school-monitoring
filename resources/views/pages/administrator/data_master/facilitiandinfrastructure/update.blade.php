@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('update facility and infrastructure'))

@section('content')
    <x-resource.form :resource="$resource"></x-resource.form>
@endsection
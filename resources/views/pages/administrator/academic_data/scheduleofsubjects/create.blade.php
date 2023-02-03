@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('create schedule of subjects'))

@section('content')
    <x-resource.form :resource="$resource"></x-resource.form>
@endsection

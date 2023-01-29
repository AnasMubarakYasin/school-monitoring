@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('create school year'))

@section('content')
    <x-school-year.create :action="route('web.resource.school_year.create')"></x-school-year.create>
@endsection

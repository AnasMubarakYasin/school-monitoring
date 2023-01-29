@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('list of school year'))

@section('content')
        <x-school-year.view-any :create="route('web.administrator.school_year.create')"></x-school-year.view-any>
@endsection
@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', __('list of subjects'))

@section('content')
    <x-resource.table :resource="$resource"></x-resource.table>
@endsection

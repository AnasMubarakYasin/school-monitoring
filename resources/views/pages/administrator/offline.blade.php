@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', 'offline')

@section('content')
    <div class="text-center text-gray-600 text-lg dark:text-gray-400">
        {{ trans('you are offline') }}
    </div>
@endsection

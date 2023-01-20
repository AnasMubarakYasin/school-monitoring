@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', 'Dashboard')

@section('content')
    <div class="grid gap-4">
        <div class="grid grid-cols-3 gap-4">
            <div
                class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                    {{ trans('stats') }}</div>
                <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">{{ 1000 }}</div>
            </div>
        </div>
    </div>
@endsection

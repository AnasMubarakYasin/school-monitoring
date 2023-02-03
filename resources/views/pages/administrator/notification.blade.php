@extends('layouts.administrator.panel', ['content_card' => false])

@section('title', 'Notification')
@section('head')
@endsection

@section('content')
    <div class="grid grid-flow-col grid-cols-2 gap-4">
        <div class="h-fit p-4 bg-white border rounded-lg shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    {{ trans('unread') }}
                </h5>
                <form class="contents" action="{{ route('web.notification.mark_all') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        {{ trans_choice('mark', 2) }}
                    </button>
                </form>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($user->unreadNotifications as $notification)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ $notification->data['badge'] }}"
                                        alt="">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $notification->data['message'] }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $notification->created_at->timespan() }}
                                    </p>
                                </div>
                                <a class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
                                    href="{{ route('web.notification.read', ['notification' => $notification]) }}">
                                    {{ trans('read') }}
                                </a>
                            </div>
                        </li>
                    @empty
                        <div class="text-center pt-4 text-gray-500 text-lg dark:text-gray-400">
                            {{ trans('empty') }}
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="h-fit p-4 bg-white border rounded-lg shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    {{ trans('readed') }}
                </h5>
                <form class="contents" action="{{ route('web.notification.delete_all') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                        {{ trans_choice('delete', 2) }}
                    </button>
                </form>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($user->readnotifications as $notification)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ $notification->data['badge'] }}"
                                        alt="">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $notification->data['message'] }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $notification->created_at->timespan() }}
                                    </p>
                                </div>
                                <form class="contents"
                                    action="{{ route('web.notification.delete', ['notification' => $notification]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        {{ trans('delete') }}
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <div class="text-center pt-4 text-gray-500 text-lg dark:text-gray-400">
                            {{ trans('empty') }}
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection

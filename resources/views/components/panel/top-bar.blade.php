@aware([
    'panel' => null,
    'user' => null,
])
<header id="header"
    class="flex items-center h-[56px] sticky top-0 bg-white dark:bg-gray-800 shadow transition-colors z-10">
    <div class="flex-grow flex gap-4 items-center px-4">
        <button id="drawer-btn"
            class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
            </svg>
        </button>
        <h1 class="text-base font-medium capitalize">
            {{ trans($panel->title) }}
        </h1>
    </div>
    <div class="flex relative gap-2 items-center pr-4">
        <button id="notif-btn" data-dropdown-toggle="notif-ddw"
            class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
            @empty($user->unreadNotifications->all())
            @else
                <div class="flex absolute">
                    <div class="inline-flex relative w-3 h-3 left-3 bg-blue-500 rounded-full">
                    </div>
                </div>
            @endempty
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
        </button>
        <div id="notif-ddw"
            class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
            aria-labelledby="notif-btn">
            <div
                class="capitalize block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-t-md">
                {{ trans('notifications') }}
            </div>
            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($user->unreadNotifications as $notification)
                    <a href="{{ route($notification->data['route'], ['notification' => $notification]) }}"
                        class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex-shrink-0">
                            <img class="w-11 h-11 rounded-full" src="{{ asset('logo.svg') }}" alt="">
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                                {{ $notification->data['message'] }}
                            </div>
                            <div class="text-xs text-blue-600 dark:text-blue-500">
                                {{ $notification->created_at->timespan() }}
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-4 text-gray-500 text-lg dark:text-gray-400">
                        {{ trans('empty') }}
                    </div>
                @endforelse
            </div>
            {{-- @empty($user->unreadNotifications->all())
        @else
            <a href="{{ route('admin.dashboard.show') }}"
                class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                <div class="inline-flex items-center">
                    {{ trans('view all') }}
                </div>
            </a>
        @endempty --}}
        </div>

        <button id="theme-btn"
            class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
            </svg>
        </button>

        <button id="lang-btn" data-dropdown-toggle="lang-dropdown"
            class="grid place-content-center gap-2 h-10 aspect-square text-sm text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-600 hover:text-blue-600 dark:hover:text-blue-500 rounded-lg">
            <span class="sr-only">Open language menu</span>
            <div class="p-2.5">
                <div class="font-medium uppercase">{{ $panel->locale }}</div>
            </div>
        </button>
        <div id="lang-dropdown"
            class="hidden z-10 w-auto bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="lang-dropdown">
                @foreach (config('app.locales') as $key => $value)
                    <li>
                        <a href="{{ route('web.locale.set', ['locale' => $key]) }}" @class([
                            'block py-2 px-4 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white',
                            'text-white bg-blue-500 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' =>
                                $key == $panel->locale,
                        ])>
                            {{ $value }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <button id="ProfileButton" data-dropdown-toggle="Profile"
            class="flex items-center gap-2 text-sm font-medium text-gray-900 rounded-lg hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white">
            <span class="sr-only">Open user menu</span>
            <div class="bg-gray-100 p-2 rounded-lg dark:bg-gray-600">
                @if ($user->photo)
                    <img class="w-6 h-6 rounded" src="{{ $user->photo }}" alt="{{ $user->name }}">
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                @endif
            </div>
            <div class="text-left font-medium dark:text-white">
                <div class="text-base">{{ $user->name }}</div>
                <div class="text-xs opacity-70">{{ $user->email }}</div>
            </div>
            <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div id="Profile"
            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
            {{-- <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                        <div class="font-medium ">{{ $user->name }}</div>
                        <div class="truncate">{{ $user->readable_role }}</div>
                    </div> --}}
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownInformProfileButtonationButton">
                <li>
                    <a href="{{ route('web.administrator.profile') }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ trans('profile') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('web.administrator.notification') }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ trans('notifications') }}
                    </a>
                </li>
                <li>
                    <button id="theme_menu_btn" data-dropdown-toggle="theme_menu"
                        data-dropdown-placement="right-start" type="button"
                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ trans('thema') }}
                        <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="theme_menu"
                        class="z-10 w-auto hidden bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700">
                        <ul id="theme-list" class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="theme_menu_btn">
                            <li>
                                <button data-theme="light"
                                    class='block w-full py-2 px-4 hover:text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white'>
                                    {{ trans('light') }}

                                </button>
                            </li>
                            <li>
                                <button data-theme="dark"
                                    class='block w-full py-2 px-4 hover:text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white'>
                                    {{ trans('dark') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button id="lang_menu_btn" data-dropdown-toggle="lang-dropdown"
                        data-dropdown-placement="right-start" type="button"
                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ trans('language') }}
                        <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </li>
                <li>
                    <a href="{{ route('web.administrator.empty') }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ trans('settings') }}
                    </a>
                </li>
            </ul>
            <div class="py-1">
                <a href="{{ route('web.administrator.logout_perfom') }}"
                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', App::getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>@yield('title', 'Panel')</title>

    <link rel="manifest" href="{{ asset('build/site.webmanifest') }}">

    @vite('resources/js/progress.js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/regis-sw.js')
    @vite('resources/js/layouts/panel/index.js')

    @yield('head')
</head>

<body
    class="grid w-max-[100vw] min-h-screen overflow-hidden text-black bg-gray-100 dark:text-white dark:bg-gray-900 transition-colors content-start">
    <div class="flex min-h-screen">
        <aside id="drawer-main" class="bg-white dark:bg-gray-800 shadow transition-colors" tabindex="-1">
            <header
                class="flex gap-4 items-center justify-center sticky top-0 bg-white dark:bg-gray-800 text-xl font-semibold h-[56px] shadow transition-colors">
                <div><img src="{{ asset('logo.svg') }}" alt="Bladerlaiga" class="w-8 h-8 rounded-md"></div>
                <div class="text-green-700 dark:text-green-500">{{ env('APP_NAME') }}</div>
            </header>
            <nav
                class="flex flex-col h-[calc(100vh_-_56px)] p-4 overflow-auto bg-white dark:bg-gray-800 shadow transition-colors">
                <ul class="space-y-2 capitalize">
                    <li>
                        @php
                            $link = route('web.administrator.dashboard');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => request()->url() != $link,
                                '' => request()->url() == $link,
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.school_year.list');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => request()->url() != $link,
                                '' => request()->url() == $link,
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-3">
                                {{ trans('school year') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.semester.list');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => request()->url() != $link,
                                '' => request()->url() == $link,
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-3">
                                {{ trans('semester') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.major.list');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => request()->url() != $link,
                                '' => request()->url() == $link,
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-3">
                                {{ trans('major') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.classroom.list');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => request()->url() != $link,
                                '' => request()->url() == $link,
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-3">
                                {{ trans('classroom') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.users');
                        @endphp
                        <button type="button"
                            data-collapse="{{ str(request()->url())->startsWith(route('web.administrator.users')) ? 'show' : 'hide' }}"
                            data-accordion-trigger="hover" data-collapse-toggle="menu_user"
                            @class([
                                'sidebar-menus flex items-center w-full p-2 text-base font-normal rounded-lg',
                                'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                    request()->url())->startsWith($link),
                                'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                    request()->url())->startsWith($link),
                            ]) aria-controls="menu_user">
                            <svg xmlns="http://www.w3.org/2000/svg" @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    $link),
                                '' => str_starts_with(request()->url(), $link),
                            ]) fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span
                                class="flex-1 ml-3 text-left whitespace-nowrap capitalize">{{ __('users') }}</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="menu_user" class="hidden py-2 space-y-2">
                            @foreach (App\Models\UserType::to_array() as $key => $value)
                                <li>
                                    @php
                                        $link = route("web.administrator.users.$key.list");
                                    @endphp
                                    <a href="{{ $link }}" @class([
                                        'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                        'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                            request()->url() != $link,
                                        'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                            request()->url() == $link,
                                    ])>
                                        {{ __($value) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.data_master');
                        @endphp
                        <button type="button"
                            data-collapse="{{ str(request()->url())->startsWith(route('web.administrator.data_master')) ? 'show' : 'hide' }}"
                            data-accordion-trigger="hover" data-collapse-toggle="menu_information"
                            @class([
                                'sidebar-menus flex items-center w-full p-2 text-base font-normal rounded-lg',
                                'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                    request()->url())->startsWith($link),
                                'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                    request()->url())->startsWith($link),
                            ]) aria-controls="menu_information">
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    $link),
                                '' => str_starts_with(request()->url(), $link),
                            ]) xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                            </svg>
                            <span
                                class="flex-1 ml-3 text-left whitespace-nowrap capitalize">{{ __('masterdata') }}</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="menu_information" class="hidden py-2 space-y-2">
                            <li>
                                @php
                                    $link = route('web.administrator.data_master.school_information.list');
                                @endphp
                                <a href="{{ $link }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != $link,
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == $link,
                                ])>
                                    {{ __('school information') }}
                                </a>
                            </li>
                            <li>
                                @php
                                    $link = route('web.administrator.data_master.facilityandinfrastructure.list');
                                @endphp
                                <a href="{{ $link }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != $link,
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == $link,
                                ])>
                                    {{ __('data sarana dan prasarana') }}
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        @php
                            $link = route('web.administrator.academic_data');
                        @endphp
                        <button type="button"
                            data-collapse="{{ str(request()->url())->startsWith(route('web.administrator.academic_data')) ? 'show' : 'hide' }}"
                            data-accordion-trigger="hover" data-collapse-toggle="menu_academic"
                            @class([
                                'sidebar-menus flex items-center w-full p-2 text-base font-normal rounded-lg',
                                'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                    request()->url())->startsWith($link),
                                'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                    request()->url())->startsWith($link),
                            ]) aria-controls="menu_academic">
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    $link),
                                '' => str(request()->url())->startsWith($link),
                            ]) xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>

                            <span
                                class="flex-1 ml-3 text-left whitespace-nowrap capitalize">{{ __('academic data') }}</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="menu_academic" class="hidden py-2 space-y-2">
                            <li>
                                @php
                                    $link = route('web.administrator.academic_data.subjects.list');
                                @endphp
                                <a href="{{ $link }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != $link,
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == $link,
                                ])>
                                    {{ __('subject data') }}
                                </a>
                            </li>
                            <li>
                                @php
                                    $link = route('web.administrator.academic_data.scheduleofsubjects.list');
                                @endphp
                                <a href="{{ $link }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != $link,
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == $link,
                                ])>
                                    {{ __('lesson schedule data') }}
                                </a>
                            </li>
                            <li>
                                @php
                                    $link = route('web.administrator.academic_data.materialandassignment.list');
                                @endphp
                                <a href="{{ $link }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != $link,
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == $link,
                                ])>
                                    {{ __('material and assignment') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700 capitalize">
                    <li>
                        @php
                            $link = route('web.administrator.empty');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => request()->url() != $link,
                                '' => request()->url() == $link,
                            ]) xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            <span class="ml-3">{{ __('archive') }}</span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.empty');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" @class([
                                    'w-6 h-6 transition',
                                    'text-gray-700 dark:text-white' => request()->url() != $link,
                                    '' => request()->url() == $link,
                                ])>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <span class="ml-3">{{ __('trash') }}</span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('web.administrator.empty');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" @class([
                                    'w-6 h-6 transition',
                                    'text-gray-700 dark:text-white' => request()->url() != $link,
                                    '' => request()->url() == $link,
                                ])>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span class="ml-3">{{ __('files') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.administrator.logout_perfom') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700',
                        ])>
                            <svg @class(['w-6 h-6 transition text-gray-700 dark:text-white']) xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            <span class="ml-3">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <div id="content" class="flex-grow grid h-screen grid-rows-[56px,auto,56px]">
            <header id="header"
                class="flex items-center h-[56px] sticky top-0 bg-white dark:bg-gray-800 shadow transition-colors z-10">
                <div class="flex-grow flex gap-4 items-center px-4">
                    <button id="drawer-btn"
                        class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                        </svg>
                    </button>
                    <h1 class="text-base font-medium capitalize">@yield('title', 'Panel')</h1>
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
                                        <img class="w-11 h-11 rounded-full" src="{{ asset('logo.svg') }}"
                                            alt="">
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
                    @empty($user->unreadNotifications->all())
                    @else
                        <a href="{{ route('admin.dashboard.show') }}"
                            class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                            <div class="inline-flex items-center">
                                {{ trans('view all') }}
                            </div>
                        </a>
                    @endempty
                </div>

                <button id="theme-btn"
                    class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                    </svg>
                </button>

                <button id="lang-btn" data-dropdown-toggle="lang-dropdown"
                    class="grid place-content-center gap-2 h-10 aspect-square text-sm text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-600 hover:text-blue-600 dark:hover:text-blue-500 rounded-lg">
                    <span class="sr-only">Open language menu</span>
                    <div class="p-2.5">
                        <div class="font-medium uppercase">{{ App::getLocale() }}</div>
                    </div>
                </button>
                <div id="lang-dropdown"
                    class="hidden z-10 w-auto bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="lang-dropdown">
                        @foreach (config('app.locales') as $key => $value)
                            <li>
                                <a href="{{ route('web.locale.set', ['locale' => $key]) }}"
                                    @class([
                                        'block py-2 px-4 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white',
                                        'text-white bg-blue-500 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' =>
                                            $key == App::getLocale(),
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
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
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
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('web.administrator.notification') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Notifications</a>
                        </li>
                        <li>
                            <button id="theme_menu_btn" data-dropdown-toggle="theme_menu"
                                data-dropdown-placement="right-start" type="button"
                                class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Theme
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
                                            Light
                                        </button>
                                    </li>
                                    <li>
                                        <button data-theme="dark"
                                            class='block w-full py-2 px-4 hover:text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white'>
                                            Dark
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button id="lang_menu_btn" data-dropdown-toggle="lang-dropdown"
                                data-dropdown-placement="right-start" type="button"
                                class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Language
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
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
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
        <main class="overflow-auto">
            <div id="progress-bar" class="sticky top-0 max-w-full h-0 bg-gray-200 rounded-full transition-all dark:bg-gray-700">
                <div class="bg-blue-600 max-w-full h-full rounded-full dark:bg-blue-500" style="width: 100%"></div>
            </div>
            <div class="flex-grow p-4 overflow-auto">
                @if (isset($content_card) && $content_card)
                    <div class="grid gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow transition-colors">
                        @yield('content')
                    </div>
                @else
                    @yield('content')
                @endif
            </div>
        </main>
        <footer
            class="flex items-center justify-center h-[56px] bg-white dark:bg-gray-800 shadow transition-colors">
            <div class="text-sm">Copyright &copy; 2023 Bladerlaiga, All Right Reserved.</div>
        </footer>
    </div>
</div>
@yield('body')
</body>

</html>

@props([
    'landing' => null,

    'title' => 'Landing',
    'logo' => '/logo.png',
    'favicon' => '/favicon.ico',

    'head' => '',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $landing->locale) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{ $head }}
</head>

<body
    class="flex flex-col w-max-[100vw] min-h-screen overflow-auto text-black bg-gray-100 dark:text-white dark:bg-gray-900 transition-colors content-start">
    <header
        class="flex gap-4 items-center p-4 sm:px-20 bg-gray-100 dark:bg-gray-800 text-3xl font-semibold transition-colors">
        <div>
            <img src="{{ $landing->vendor_logo }}" alt="Bladerlaiga" class="w-8 h-8 rounded-md">
        </div>
        <div class="text-green-700 dark:text-green-500">
            {{ $landing->vendor_name }}
        </div>
        <div class="text-sm self-end text-gray-700 dark:text-gray-500">
            v{{ $landing->vendor_version }}
        </div>
    </header>
    <main class="overflow-auto grid p-4 sm:py-8 sm:px-20">
        <section class="grid gap-8">
            <section class="flex flex-col gap-4">
                <div class="text-xl font-semibold text-gray-800">
                    Info
                </div>
                <div class="p-4 flex flex-col gap-2 bg-white dark:bg-gray-800 rounded-lg shadow transition-colors">
                    <div class="flex flex-col gap-1">
                        <div class="text-base font-medium text-gray-600">
                            App Name
                        </div>
                        <div class="text-base font-normal text-black">
                            {{ config('dynamic.application.name') }}
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col gap-1">
                        <div class="text-base font-medium text-gray-600">
                            App Version
                        </div>
                        <div class="text-base font-normal text-black">
                            {{ config('dynamic.application.version') }}
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col gap-2">
                        <div class="text-base font-medium text-gray-600">
                            App Date
                        </div>
                        <div class="w-max text-base font-normal text-black">
                            <div class="grid grid-cols-[min-content_auto] grid-rows-2 gap-x-2">
                                <div>Inited:</div>
                                <div>{{ $updates->date_inited }}</div>
                                <div>Updated:</div>
                                <div>{{ $updates->date_updated }}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col gap-2">
                        <div class="text-base font-medium text-gray-600">
                            App Deployment
                        </div>
                        <div class="text-base font-normal text-black">
                            <a href="https://github.com/AnasMubarakYasin/school-monitoring/actions/workflows/cd.yml"
                                class="inline">
                                <img src="https://github.com/AnasMubarakYasin/school-monitoring/actions/workflows/cd.yml/badge.svg"
                                    alt="">
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col gap-2">
                        <div class="text-base font-medium text-gray-600">
                            App Changelog
                        </div>
                        <div class="text-base font-normal text-black">
                            <details>
                                <summary>Show</summary>
                                <pre class="text-sm">
                                    {{ "\n" . $updates->changes }}
                                </pre>
                            </details>
                        </div>
                    </div>
                </div>
            </section>
            <section class="flex flex-col gap-4">
                <div class="text-xl font-semibold text-gray-800">
                    Users
                </div>
                <div class="flex flex-wrap gap-4">
                    @foreach ($landing->get_users() as $user)
                        @isset($user['user'])
                            <a href="{{ $user['login'] . ($user['demo'] ? '?demo=true' : '') }}"
                                class="grid content-start w-[200px] gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-50 transition-colors">
                                <div class="grid place-content-center aspect-square bg-gray-200 p-2 rounded-lg">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="text-base font-medium text-gray-900">
                                    {{ $user['name'] }}
                                </div>
                            </a>
                        @else
                            <div
                                class="grid w-[200px] gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-50 transition-colors">
                                <div class="grid place-content-center aspect-square bg-gray-200 p-2 rounded-lg">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="grid gap-4">
                                    <div class="text-base font-medium text-gray-900">
                                        {{ $user['name'] }}
                                    </div>
                                    <div class="grid gap-2">
                                        @foreach ($user['users'] as $item)
                                            <a href="{{ $user['login'] . ($user['demo'] ? '?demo=true&role=' . $item['role'] : '?role=' . $item['role']) }}"
                                                class="text-sm font-medium text-gray-700 hover:text-gray-800">
                                                {{ $item['role'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endisset
                    @endforeach
                </div>
            </section>
        </section>
        {{ $slot }}
    </main>
    <div class="flex-grow"></div>
    <footer
        class="sticky bottom-0 flex items-center justify-center h-[56px] bg-white dark:bg-gray-800 shadow transition-colors">
        <div class="text-sm">
            Copyright &copy; {{ $landing->vendor_name }}
            {{ $landing->vendor_year }}, All Right Reserved.
        </div>
    </footer>

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', App::getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <link rel="shortcut icon" href="@yield('favicon', $context->account->favicon)" type="image/x-icon">

    <title>@yield('title', "Panel $context->vendor_year")</title>

    {{-- <link rel="manifest" href="{{ asset('build/site.webmanifest') }}"> --}}

    @vite('resources/js/layouts/panel/progress.js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/layouts/panel/index.js')
    {{-- @vite('resources/js/regis-sw.js') --}}

    @yield('head')
</head>

<body
    class="grid w-max-[100vw] min-h-screen overflow-hidden text-black bg-gray-100 dark:text-white dark:bg-gray-900 transition-colors content-start">
    <div class="flex min-h-screen">
        @sectionMissing('side-bar')
            @include('layouts.panel.side-bar')
        @endif
        <div id="content" class="flex-grow grid h-screen grid-rows-[56px,auto,56px]">
            @sectionMissing('top-bar')
                @include('layouts.panel.top-bar')
            @endif
            <main class="overflow-auto">
                <div id="progress-bar"
                    class="sticky top-0 max-w-full h-0 bg-gray-200 rounded-full transition-all dark:bg-gray-700">
                    <div class="bg-blue-600 max-w-full h-full rounded-full dark:bg-blue-500" style="width: 100%">
                    </div>
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
            @sectionMissing('bottom-bar')
                @include('layouts.panel.bottom-bar')
            @endif
        </div>
    </div>
    @yield('body')
</body>

</html>

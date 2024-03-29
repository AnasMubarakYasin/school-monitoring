@props([
    'panel' => null,
    'user' => null,
    'locale' => null,

    'title' => 'Panel',
    'logo' => '/logo.png',
    'favicon' => '/favicon.ico',

    'head' => '',
    'body' => '',
    'top_bar' => '',
    'side_bar' => '',
    'content' => '',
    'bottom_bar' => '',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <title>{{ trans($title) }}</title>

    <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">

    <script>
        var panel = @json($panel);
    </script>

    @vite('resources/js/layouts/panel/progress.js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/layouts/panel/index.js')

    @if ($panel->webmanifest)
        <link rel="manifest" href="{{ $panel->get_webmanifest() }}">
    @endif
    @if ($panel->service_worker)
        <script type="module" src="{{ $panel->get_service_worker() }}"></script>
    @endif

    {{ $head }}
</head>

<body
    class="grid w-max-[100vw] min-h-screen overflow-hidden text-black bg-gray-100 dark:text-white dark:bg-gray-900 transition-colors content-start">
    <div class="flex min-h-screen">
        {{ $side_bar }}
        <div id="content" class="flex-grow grid h-screen grid-rows-[56px,auto]">
            {{ $top_bar }}
            <main class="overflow-auto flex flex-col">
                <div id="progress-bar"
                    class="sticky top-0 w-full h-1 bg-gray-200 dark:bg-gray-700 rounded-full transition-all">
                    <div class="w-0 h-1 bg-blue-600 dark:bg-blue-500 rounded-full ">
                    </div>
                </div>
                <div id="main" class="flex-grow overflow-auto">
                    {{ $slot }}
                </div>
            </main>
            {{ $bottom_bar }}
        </div>
    </div>
    {{ $body }}
</body>

</html>

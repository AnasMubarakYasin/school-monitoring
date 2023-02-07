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
    class="flex flex-col w-max-[100vw] min-h-screen overflow-hidden text-black bg-gray-100 dark:text-white dark:bg-gray-900 transition-colors content-start">
    <header
        class="flex gap-4 items-center px-20 py-10 bg-gray-100 dark:bg-gray-800 text-3xl font-semibold transition-colors">
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
    <main class="overflow-auto grid py-8 px-20">
        <section class="grid gap-8">
            <section class="flex flex-col gap-4">
                <div class="text-xl text-center font-semibold text-gray-800">
                    Users
                </div>
                <div class="p-2 flex gap-4 place-content-center">
                    @foreach ($landing->get_users() as $user)
                        <a href="{{ $user['login'] . ($user['demo'] ? '?demo=true' : '') }}"
                            class="grid w-[200px] gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-50 transition-colors">
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

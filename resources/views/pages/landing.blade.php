<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="@container flex flex-col w-screen h-screen">
        {{-- <img src="{{ asset('images/hero.svg') }}" alt="hero" class="absolute right-0 h-screen"> --}}
        <div class="@container">
            <div class="flex @xs:px-4 @xl:px-8 py-4 justify-center @2xl:justify-start relative">
                <button id="sidebar_toggle" class="absolute left-4 grid place-content-center p-2 @2xl:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                {{-- <div class="@2xl:hidden flex-grow"></div> --}}
                <div class="flex gap-4 items-center">
                    <img src="{{ config('dynamic.application.logo') }}" alt="Bladerlaiga" class="w-8 h-8 rounded-md">
                    <div class="font-medium text-xl text-green-700 dark:text-green-500">
                        {{ config('dynamic.application.name') }}
                    </div>
                </div>
                <div class="hidden @2xl:block @2xl:flex-grow"></div>
                <nav class="hidden @2xl:block">
                    <ul class="flex gap-8 items-center justify-center">
                        <li class="relative">
                            <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>Home</a>
                            <div @class([
                                'w-full h-1.5',
                                'bg-[#4652F6] opacity-70 peer-hover:opacity-100 rounded' =>
                                    url()->full() == route('landing') || url()->full() == route('welcome'),
                            ])></div>
                        </li>
                        <li class="relative">
                            <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>About Us</a>
                            <div @class([
                                'w-full h-1.5',
                                'bg-[#4652F6] opacity-70 peer-hover:opacity-100 rounded' =>
                                    url()->full() == route('entry'),
                            ])></div>
                        </li>
                        <li class="relative">
                            <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>Blog</a>
                            <div @class([
                                'w-full h-1.5',
                                'bg-[#4652F6] opacity-70 peer-hover:opacity-100 rounded' =>
                                    url()->full() == route('entry'),
                            ])></div>
                        </li>
                        <li class="relative">
                            <a href="{{ route('entry') }}" @class([
                                'peer px-4 py-2 font-medium text-base text-white bg-[#4652F6] opacity-70 hover:opacity-100 rounded-full',
                            ])>Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="@container relative flex flex-col @2xl:flex-row">
            <div
                class="@2xl:absolute top-0 pt-10 @xs:px-4 @xl:px-8 @4xl:px-16 @6xl:px-32 @7xl:px-40 grid @2xl:grid-cols-2 @2xl:grid-rows-2">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#4652F6] text-5xl font-bold">
                        SI
                        <br>
                        MOKA
                    </h1>
                    <p class="text-lg">
                        Sistem Layanan Monitoring Kegiatan Akademik
                        Sekolah dengan Menggunakan
                        Progressive Web Apps
                    </p>
                    <a href="{{ route('landing') }}" @class([
                        'w-fit px-8 py-2 font-medium text-base text-black bg-[#61cb89] hover:opacity-70 opacity-100 rounded-full',
                    ])>Get Start</a>
                </div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <img src="{{ asset('images/hero.svg') }}" alt="hero"
                class="w-screen aspect-square @2xl:w-full @2xl:aspect-[0] object-cover object-right">
        </div>
    </header>
    <div id="backdrop" class="hidden fixed top-0 w-screen h-screen transition-all"></div>
    <aside id="sidebar" class="fixed top-0 left-[-100%] w-4/5 h-screen bg-white transition-all">
        <nav class="px-8 py-4">
            <ul class="flex flex-col gap-4">
                <li class="relative">
                    <a href="{{ route('landing') }}" @class([
                        'peer font-medium text-base opacity-70 hover:opacity-100',
                        'text-[#4652F6]' =>
                            url()->full() == route('landing') || url()->full() == route('welcome'),
                    ])>Home</a>
                </li>
                <li class="relative">
                    <a href="{{ route('landing') }}" @class([
                        'peer font-medium text-base opacity-70 hover:opacity-100',
                        'text-[#4652F6]' => url()->full() == route('entry'),
                    ])>About Us</a>
                </li>
                <li class="relative">
                    <a href="{{ route('landing') }}" @class([
                        'peer font-medium text-base opacity-70 hover:opacity-100',
                        'text-[#4652F6]' => url()->full() == route('entry'),
                    ])>Blog</a>
                </li>
                <li class="relative">
                    <a href="{{ route('entry') }}" @class([
                        'peer px-4 py-2 font-medium text-base text-white bg-[#4652F6] opacity-70 hover:opacity-100 rounded-full',
                    ])>Login</a>
                </li>
            </ul>
        </nav>
    </aside>
    <script>
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('backdrop');
        document.getElementById('sidebar_toggle').addEventListener('click', (e) => {
            sidebar.style.left = '0'
            backdrop.style.display = 'block'
            requestAnimationFrame(() => {
                backdrop.style['backdrop-filter'] = 'brightness(.5)';
            })
            requestAnimationFrame(() => {
                addEventListener('click', close_handler, {
                    once: true
                })
            })

            function close_handler(e) {
                if (!sidebar.contains(e.target)) {
                    sidebar.style.left = '-100%'
                    backdrop.style['backdrop-filter'] = 'brightness(1)';
                    requestAnimationFrame(() => {
                        backdrop.style.display = 'none'
                    })
                } else {
                    addEventListener('click', close_handler, {
                        once: true
                    })
                }
            }
        })
    </script>
</body>

</html>

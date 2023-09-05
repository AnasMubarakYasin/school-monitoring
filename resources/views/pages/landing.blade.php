<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="@container flex flex-col">
    <img src="{{ asset('images/background.svg') }}" alt="background" class="absolute top-[390px] @sm:top-[260px] @2xl:top-16 z-0 w-full">
    <header class="@container flex flex-col w-full">
        <div class="@container">
            <div class="flex @xs:px-4 @xl:px-8 py-4 items-center justify-center @2xl:justify-start relative">
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
                                'bg-primary opacity-70 peer-hover:opacity-100 rounded' =>
                                    url()->full() == route('landing') || url()->full() == route('welcome'),
                            ])></div>
                        </li>
                        <li class="relative">
                            <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>About Us</a>
                            <div @class([
                                'w-full h-1.5',
                                'bg-primary opacity-70 peer-hover:opacity-100 rounded' =>
                                    url()->full() == route('entry'),
                            ])></div>
                        </li>
                        <li class="relative">
                            <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>Blog</a>
                            <div @class([
                                'w-full h-1.5',
                                'bg-primary opacity-70 peer-hover:opacity-100 rounded' =>
                                    url()->full() == route('entry'),
                            ])></div>
                        </li>
                        <li class="relative">
                            <a href="{{ route('entry') }}" @class([
                                'peer px-4 py-2 font-medium text-base text-white bg-primary opacity-70 hover:opacity-100 rounded-full',
                            ])>Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="@container flex flex-col @2xl:flex-row">
            {{--  @xs:px-4 @xl:px-8 @4xl:px-16 @6xl:px-32 @7xl:px-40 --}}
            <div
                class="h-[520px] @2xl:h-auto py-10 grid grid-cols-12 grid-rows-1 @4xl:grid-rows-2 @6xl:grid-rows-3">
                <div class="flex flex-col gap-4 col-start-2 @2xl:col-end-6 col-end-11">
                    <h1 class="text-primary text-5xl font-bold font-outline">
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
                        'w-fit px-8 py-2 font-medium text-base text-black bg-secondary hover:opacity-70 opacity-100 rounded-full',
                    ])>Get Start</a>
                </div>
                <div></div>
            </div>
            {{-- <img src="{{ asset('images/hero.svg') }}" alt="hero" class="w-full"> --}}
        </div>
    </header>
    <main class="@container relative flex flex-col gap-10 w-full py-10">
        <section class="flex flex-col gap-4 px-2 @xs:px-4 @xl:px-8 @4xl:px-16 @6xl:px-32 @7xl:px-96">
            <h2 class="text-primary text-center text-4xl font-bold">
                SI MOKA
            </h2>
            <p class="text-justify text-lg">
                SI MOKA adalah platform terintegrasi yang dirancang khusus untuk sekolah-sekolah modern. Kami
                menghadirkan kemudahan dalam memantau, mencatat, dan menganalisis berbagai kegiatan akademik. Dari
                catatan nilai hingga absensi, semua informasi penting dapat diakses dalam satu tempat.
            </p>
        </section>
        <section class="flex flex-col gap-4 px-2 @xs:px-4 @xl:px-8 @4xl:px-16 @6xl:px-32 @7xl:px-64">
            <h2 class="text-primary text-center text-4xl font-bold">
                Kenapa Memilih Kami
            </h2>
            <div class="flex flex-col @2xl:flex-row gap-4">
                <div class="flex flex-col gap-2 p-4 bg-primary/10 rounded-lg">
                    <img src="{{ asset('images/easily_accessible.svg') }}" alt="" class="w-16 h-16 self-center">
                    <h3 class="text-center text-xl font-bold">Mudah Diakses</h3>
                    <p>
                        SI MOKA memberikan akses yang mudah serta dapat diakses dimanapun tanpa batasan
                    </p>
                </div>
                <div class="flex flex-col gap-2 p-4 bg-primary/10 rounded-lg">
                    <img src="{{ asset('images/realtime.svg') }}" alt="" class="w-16 h-16 self-center">
                    <h3 class="text-center text-xl font-bold">Realtime</h3>
                    <p>
                        Dapatkan Pembaruan secara real-time mengenai proses serta kegiatan akademik sekolah
                    </p>
                </div>
                <div class="flex flex-col gap-2 p-4 bg-primary/10 rounded-lg">
                    <img src="{{ asset('images/pwa.svg') }}" alt="" class="w-16 h-16 self-center">
                    <h3 class="text-center text-xl font-bold">Progressive Web Apps</h3>
                    <p>
                        Didukung dengan teknologi terkini yang memberikan pengalaman seperti menggunakan aplikasi
                    </p>
                </div>
            </div>
        </section>
        {{-- <img src="{{ asset('images/main.svg') }}" alt="main" class="absolute top-0 w-full -z-10"> --}}
        {{-- <img src="{{ asset('images/background.svg') }}" alt="background" class="absolute top-0 w-full -z-10"> --}}
        <section class="h-[20vh]"></section>
    </main>
    {{-- <img src="{{ asset('images/hero.svg') }}" alt="hero"
        class="absolute w-screen aspect-square @2xl:w-full @2xl:aspect-[0] object-cover object-right"> --}}
    <div id="backdrop" class="hidden fixed top-0 w-screen h-screen transition-all"></div>
    <aside id="sidebar" class="fixed top-0 left-[-100%] w-4/5 h-screen bg-white transition-all">
        <nav class="px-8 py-4">
            <ul class="flex flex-col gap-4">
                <li class="relative">
                    <a href="{{ route('landing') }}" @class([
                        'peer font-medium text-base opacity-70 hover:opacity-100',
                        'text-primary' =>
                            url()->full() == route('landing') || url()->full() == route('welcome'),
                    ])>Home</a>
                </li>
                <li class="relative">
                    <a href="{{ route('landing') }}" @class([
                        'peer font-medium text-base opacity-70 hover:opacity-100',
                        'text-primary' => url()->full() == route('entry'),
                    ])>About Us</a>
                </li>
                <li class="relative">
                    <a href="{{ route('landing') }}" @class([
                        'peer font-medium text-base opacity-70 hover:opacity-100',
                        'text-primary' => url()->full() == route('entry'),
                    ])>Blog</a>
                </li>
                <li class="relative">
                    <a href="{{ route('entry') }}" @class([
                        'peer px-4 py-2 font-medium text-base text-white bg-primary opacity-70 hover:opacity-100 rounded-full',
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

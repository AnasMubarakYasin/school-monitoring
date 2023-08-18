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
    <header class="flex flex-col h-screen">
        {{-- <img src="{{ asset('images/hero.svg') }}" alt="hero" class="absolute right-0 h-screen"> --}}
        <div class="flex px-6 py-4">
            <div class="flex gap-4 items-center justify-center">
                <img src="{{ config('dynamic.application.logo') }}" alt="Bladerlaiga" class="w-8 h-8 rounded-md">
                <div class="font-medium text-xl text-green-700 dark:text-green-500">
                    {{ config('dynamic.application.name') }}
                </div>
            </div>
            <div class="flex-grow"></div>
            <nav class="">
                <ul class="flex gap-4 items-center justify-center">
                    <li class="relative">
                        <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>Home</a>
                        <div @class([
                            'w-full h-1.5',
                            'bg-[#4652F6] opacity-70 peer-hover:opacity-100 rounded' =>
                                url()->full() == route('landing'),
                        ])></div>
                    </li>
                    <li class="relative">
                        <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>About Us</a>
                        <div @class([
                            'w-full h-1.5',
                            'bg-[#4652F6] opacity-70 peer-hover:opacity-100 rounded' =>
                                url()->full() == route('welcome'),
                        ])></div>
                    </li>
                    <li class="relative">
                        <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>Blog</a>
                        <div @class([
                            'w-full h-1.5',
                            'bg-[#4652F6] opacity-70 peer-hover:opacity-100 rounded' =>
                                url()->full() == route('welcome'),
                        ])></div>
                    </li>
                    <li class="relative">
                        <a href="{{ route('landing') }}" @class(['peer font-medium text-base opacity-70 hover:opacity-100'])>Administrator</a>
                        <div @class([
                            'w-full h-1.5',
                            'bg-[#4652F6] opacity-70 peer-hover:opacity-100 rounded' =>
                                url()->full() == route('welcome'),
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
        <div class="relative flex">
            <div class="absolute top-0 px-40 py-10 grid grid-cols-2 grid-rows-2">
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
            <img src="{{ asset('images/hero.svg') }}" alt="hero" class="w-full">
        </div>
    </header>
</body>

</html>

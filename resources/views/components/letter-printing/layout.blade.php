@props([
    'logo' => '/letter/logo sulsel.png',
    'favicon' => '/favicon.ico',
    'locale' => null,
    'title' => 'Panel',

    'head' => '',
    'body' => '',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans($title) }}</title>
    <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body onload="window.print()">

    <div class="py-7 px-10">
        <header class="grid justify-center justify-items-center">
            <img class="w-20" src="{{ $logo }}" alt="logo surat">
            <span class="font-bold text-base">PEMERINTAH PROVINSI SULAWESI SELATAN</span>
            <span class="font-bold text-base">DINAS PENDIDIKAN</span>
            <span class="font-bold text-base">UPT SMAN 11 BULUKUMBA</span>
            <span class="font-bold text-xs">Alamat : Jalan Hasan Sulaeman No. 7 Bontotangnga Kecamatan Bontotiro</span>
            <span class="font-bold text-xs underline decoration-double underline-offset-4">Email : <a
                    href="smanegeri11bulukumba@gmail.com"
                    class="text-blue-800 underline">smanegeri11bulukumba@gmail.com</a> Website:
                <a href="http://www.sman11bulukumba.sch.id"
                    class="text-blue-800 underline">http://www.sman11bulukumba.sch.id</a> NPSN : 40313883</span>
        </header>
        @yield('content')
        <footer class="mt-10">
            <div class="flex justify-center gap-5 border-b-2 border-black pb-1.5">
                <img src="/letter/sipakatau.png" class="w-[400px]" alt="logo sipakatau">
                <img src="/letter/disdik.png" class="w-[93px]" alt="logo disdik">
            </div>
            <div class="font-bold text-[10px] text-center">SETULUS HATI - SEGENAP JIWA - SEKUAT RAGA MENCERDASKAN
                SULAWESI SELATAN
                |
                #CERDASKI</div>
        </footer>
    </div>

</body>

</html>

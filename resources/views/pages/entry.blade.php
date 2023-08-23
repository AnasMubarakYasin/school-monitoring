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
    <nav class="@container grid place-content-center min-h-screen p-8 bg-gray-100">
        <ul class="grid @xs:grid-cols-1 @md:grid-cols-2 @xl:grid-cols-3 @4xl:grid-cols-4 gap-4">
            <li>
                <a href="{{ route('web.administrator.login_show') }}"
                    class="grid w-[200px] gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:bg-gray-50 overflow-hidden cursor-pointer transition-colors">
                    <div class="grid place-content-center aspect-square bg-gray-200 p-2 rounded-lg">
                        <svg class="w-16 h-1w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-base text-center font-semibold text-gray-900">
                        Administrator
                    </div>
                </a>
            </li>
            <li>
                <div
                    class="panel relative w-[200px] h-[240px] bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:bg-gray-50 overflow-hidden transition-colors">
                    <div class="absolute grid w-full h-full gap-4 p-4 transition-all left-0 cursor-pointer">
                        <div class="grid place-content-center aspect-square bg-gray-200 p-2 rounded-lg">
                            <svg class="w-16 h-1w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-base text-center font-semibold text-gray-900">
                            Pegawai
                        </div>
                    </div>
                    <div class="absolute grid w-full h-full gap-4 p-4 transition-all left-[100%] place-content-center">
                        <div class="back absolute left-4 top-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </div>
                        <a href="{{ route('web.employee.login_show', ['role' => 'staff']) }}"
                            class="text-base text-center font-semibold text-gray-900 hover:text-gray-800">
                            Staff
                        </a>
                        <a href="{{ route('web.employee.login_show', ['role' => 'teacher']) }}"
                            class="text-base text-center font-semibold text-gray-900 hover:text-gray-800">
                            Guru
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('web.student.login_show') }}"
                    class="grid w-[200px] gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:bg-gray-50 overflow-hidden transition-colors">
                    <div class="grid place-content-center aspect-square bg-gray-200 p-2 rounded-lg">
                        <svg class="w-16 h-1w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-base text-center font-semibold text-gray-900">
                        Siswa
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('web.student_parent.login_show') }}"
                    class="grid w-[200px] gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:bg-gray-50 overflow-hidden transition-colors">
                    <div class="grid place-content-center aspect-square bg-gray-200 p-2 rounded-lg">
                        <svg class="w-16 h-1w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-base text-center font-semibold text-gray-900">
                        Orang Tua Siswa
                    </div>
                </a>
            </li>
        </ul>
    </nav>
    <script>
        document.querySelectorAll('.panel').forEach((elm) => {
            elm.addEventListener('click', panel_handler)

            function panel_handler(e) {
                const [c1, c2] = elm.children;
                const bg = elm.style['background-color']
                elm.style['background-color'] = 'white'
                c1.style.left = '-100%'
                c2.style.left = '0'

                elm.removeEventListener('click', panel_handler)

                c2.querySelector('.back').addEventListener('click', (e) => {
                    elm.style['background-color'] = bg
                    c1.style.left = '0'
                    c2.style.left = '100%'

                    requestAnimationFrame(() => {
                        elm.addEventListener('click', panel_handler)
                    });
                }, {
                    once: true,
                })
            }
        })
    </script>
</body>

</html>

@props([
    'academicactivity' => 0,
    'scheduleofsubject' => 0,
    'materialandassignment' => 0,
])
<a href=""
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#e7d5b8] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around capitalize">
        <span class="font-bold text-[30px]">{{ $academicactivity }}</span>
        <div>
            <small>{{ trans('academic activity') }}</small>
        </div>
    </div>
</a>
<a href=""
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#e98e8e9c] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around capitalize">
        <span class="font-bold text-[30px]">{{ $scheduleofsubject }}</span>
        <div>
            <small>{{ trans('schedule of subjects') }}</small>
        </div>
    </div>
</a>
<a href=""
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#8dcf5793] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around capitalize">
        <span class="font-bold text-[30px]">{{ $materialandassignment }}</span>
        <div>
            <small>{{ trans('material and assignment') }}</small>
        </div>
    </div>
</a>

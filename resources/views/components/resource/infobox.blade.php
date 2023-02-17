@props([
    'visitors' => 0,
    'student' => 0,
    'academicactivity' => 0,
    'teacher' => 0,
])
@aware([
    'user' => null,
])
<a href=""
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#F9A620] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around">
        <span class="capitalize">{{ trans('students') }}</span>
        <div>
            <span class="font-bold">{{ $student }}</span>
            <small>{{ trans('person') }}</small>
        </div>
    </div>
</a>
<a href=""
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#92BCEA] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around">
        <span class="capitalize">{{ trans('academic activities') }}</span>
        <div>
            <span class="font-bold">{{ $academicactivity }}</span>
            <small>{{ trans('person') }}</small>
        </div>
    </div>
</a>
<a href=""
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-gray-400 grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around">
        <span class="capitalize">{{ trans('educators and employees') }}</span>
        <div>
            <span class="font-bold">{{ $teacher }}</span>
            <small>{{ trans('person') }}</small>
        </div>
    </div>
</a>
<a href=""
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="grid place-content-center p-3.5 bg-gray-400 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-11 h-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
        </svg>
    </div>
    <div class="flex flex-col place-content-evenly">
        <span class="capitalize font-medium text-gray-800 dark:text-gray-100">{{ trans('visitors today') }}</span>
        <div>
            <span class="font-bold">{{ $visitors }}</span>
            <small class="text-gray-900 dark:text-gray-100 font-medium">{{ trans('user') }}</small>
        </div>
    </div>
</a>

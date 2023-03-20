@props([
    'item' => new \stdClass(),
])
<a id="edt_btn" href="{{ route('web.employee.teacher.presence.view', ['presence' => $item]) }}"
    class="p-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span class="sr-only">Attendance Button</span>
</a>

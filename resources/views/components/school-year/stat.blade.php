<div class="grid grid-cols-3 gap-4">
    <div
        class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
        <div class="text-lg text-gray-900 dark:text-gray-50 font-medium capitalize">
            {{ trans('school year') }}
        </div>
        <div class="text-2xl text-gray-900 dark:text-gray-50 font-medium">{{ $name }}</div>
        <div class="text-xl text-gray-900 dark:text-gray-50 font-normal">{{ trans(':d days left', ['d' => $days]) }}
        </div>
    </div>
</div>

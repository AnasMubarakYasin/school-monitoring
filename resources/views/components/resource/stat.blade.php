@props([])
<a href="{{ $resource->route_view_any($model) }}"
    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="capitalize text-base font-medium text-gray-500 dark:text-gray-400">
        {{ trans($model::$caption) }}
    </div>
    <div class="text-3xl font-medium text-gray-900 dark:text-gray-50">
        {{ $resource->total }}
    </div>
</a>

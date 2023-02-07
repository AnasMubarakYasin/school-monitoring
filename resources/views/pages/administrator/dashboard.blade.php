<x-panel.layout :title="'dashboard'">
    <x-slot:top_bar>
        <x-panel.top-bar>

        </x-panel.top-bar>
    </x-slot>
    <x-slot:side_bar>
        <x-panel.side-bar>

        </x-panel.side-bar>
    </x-slot>
    <x-slot:bottom_bar>
        <x-panel.bottom-bar>

        </x-panel.bottom-bar>
    </x-slot>
    <div class="grid gap-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-resource.infobox></x-resource.infobox>
        </div>
        <div class="grid gap-2">
            <div class="text-gray-800 dark:text-gray-300">{{ trans('Resources') }}</div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @foreach ($stats as $stat)
                    <x-resource.stat :resource="$stat"></x-resource.stat>
                @endforeach
            </div>
        </div>
    </div>
</x-panel.layout>

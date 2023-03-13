<x-panel.layout :title="'offline'">
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
    <div class="text-center text-gray-600 text-lg dark:text-gray-400">
        {{ trans('you are offline') }}
    </div>
</x-panel.layout>

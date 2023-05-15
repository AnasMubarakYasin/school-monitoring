<x-panel.layout :title="'profile'">
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
    <x-panel.profile :resource="$resource"></x-panel.profile>
</x-panel.layout>


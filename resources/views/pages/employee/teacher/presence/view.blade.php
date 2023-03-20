<x-panel.layout :title="'view presence'">
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
    <x-presence.attendance :presence="$presence"></x-presence.attendance>
</x-panel.layout>

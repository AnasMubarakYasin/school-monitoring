<x-panel.layout :title="'list of semester'">
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
    <x-resource.table :resource="$resource"></x-resource.table>
</x-panel.layout>

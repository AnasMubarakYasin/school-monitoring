<x-panel.layout :title="'list of presence'">
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
                <x-resource.table :resource="$resource" :selection="false" :actions="['action.attendance']"></x-resource.table>
</x-panel.layout>

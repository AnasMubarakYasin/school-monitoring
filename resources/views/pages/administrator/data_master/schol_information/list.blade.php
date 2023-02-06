<x-panel.layout :title="'school identity'">
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
                <x-identitas-sekolah.view :resource={{ $resource }}></x-identitas-sekolah.view>
</x-panel.layout>
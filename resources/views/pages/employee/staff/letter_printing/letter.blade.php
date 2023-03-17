<x-panel.layout :title="'letter'">
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
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <x-employee.letter-box></x-employee.letter-box>
                </div>
</x-panel.layout>

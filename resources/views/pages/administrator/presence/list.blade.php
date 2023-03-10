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
                <x-resource.table :resource="$resource">
                    <x-slot:top>
                        <a href="{{ route('web.resource.presence.generate') }}"
                            class="capitalize text-sm px-4 py-2 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                            {{ trans('generate') }}
                        </a>
                        </x-slot>
                </x-resource.table>
</x-panel.layout>

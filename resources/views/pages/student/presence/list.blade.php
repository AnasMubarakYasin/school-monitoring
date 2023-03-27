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
                    <x-slot:actions>
                        <a id="edt_btn" href="{{ '' }}"
                            class="p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span class="sr-only">Attendance Button</span>
                        </a>
                        </x-slot>
                </x-resource.table>
</x-panel.layout>

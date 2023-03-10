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
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                    <x-student.info-box :academicactivity="$academicactivity" :scheduleofsubject="$scheduleofsubject" :materialandassignment="$materialandassignment"></x-student.info-box>
                </div>
                <x-employee.schedule-of-subjects-table></x-employee.schedule-of-subjects-table>
                <x-student.presence :presences="$presences"></x-student.presence>
</x-panel.layout>

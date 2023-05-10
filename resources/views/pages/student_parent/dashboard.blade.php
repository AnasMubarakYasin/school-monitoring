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
    <div class="grid gap-4">
        <x-employee.schedule-of-subjects-table></x-employee.schedule-of-subjects-table>
        <x-student.presence :presences="$presences"></x-student.presence>
        <x-student.material_assignment :material-assignments="$material_assignments"></x-student.presence>
    </div>
</x-panel.layout>

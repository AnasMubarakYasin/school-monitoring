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
    <x-employee.schedule-of-subjects-table></x-employee.schedule-of-subjects-table>
    {{-- @dd($presences) --}}
    {{-- @foreach ($presences as $presence)
        <x-student.presence :presence="$presence"></x-student.presence>
    @endforeach --}}
    <x-student.presence :presences="$presences"></x-student.presence>
</x-panel.layout>

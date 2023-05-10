@props([
    'materialAssignments' => null,
])
@php
    $groups = collect($materialAssignments)->groupBy('subjects_id');
@endphp
<div class="overflow-x-auto pb-2 rounded-lg">
    <table id="table"
        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 border border-separate border-spacing-0.5 dark:border-gray-700 shadow-md dark:shadow-none">
        <caption
            class="px-4 py-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            <div>Assignments</div>
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                List of Assignments Student
            </p>
        </caption>
        <thead>
            <tr class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th rowspan="2" scope="col" class="p-2 text-base text-center capitalize">
                    no
                </th>
                <th rowspan="2" scope="col" class="p-2 text-base text-center capitalize">
                    subjects
                </th>
                <th colspan="16" scope="col" class="p-2 text-base text-center capitalize">
                    meeting
                </th>
            </tr>
            <tr class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                @foreach (range(1, 16) as $item)
                    <td scope="col" class="p-2 text-base text-center capitalize">
                        {{ $item }}
                    </td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($groups as $materialAssignments)
                <tr @class([
                    'bg-white capitalize text-center dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 dark:border-gray-700',
                    'border-b',
                ])>
                    <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $materialAssignments[0]->subjects()->first()->name }}
                    </td>
                    @foreach ($materialAssignments as $material_assignment)
                        <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                            @if ($material_assignment->answer()->first()->status == 'have been checked')
                                ✅
                            @elseif ($material_assignment->answer()->first()->status == 'not checked yet')
                                ❌
                            @else
                                -
                            @endif
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td class="p-4 text-center text-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-b-lg capitalize"
                        colspan="18">
                        {{ __('empty') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

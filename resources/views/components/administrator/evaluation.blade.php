@props([
    'evaluations' => null,
])
<ul class="grid gap-4">
    @foreach ($evaluations as $evaluation)
        <li
            class="grid gap-1 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
            <div class="capitalize text-2xl font-medium text-gray-900 dark:text-gray-50">
                {{ $evaluation->fullname }}
            </div>
            <div class="text-base font-normal text-gray-800 dark:text-gray-100">
                {{ $evaluation->classroom->name }}
            </div>
            <hr>
            <div class="flex flex-col gap-2">

                <div class="flex flex-col gap-1">
                    <div class="text-base font-normal text-gray-800 dark:text-gray-100">
                        {{ $evaluation->classroom->name }}
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>

                {{-- @foreach ($evaluation->material_and_assignments as $material_and_assignment)
                    {{ $material_and_assignment->classroom_id }}
                @endforeach --}}

            </div>
        </li>
    @endforeach
</ul>

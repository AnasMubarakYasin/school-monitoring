@props([
    'evaluations' => null,
])
@inject('ScheduleOfSubjects', '\App\Models\ScheduleOfSubjects')
@inject('MaterialAndAssignment', '\App\Models\MaterialAndAssignment')
<ul class="grid gap-4">
    @foreach ($evaluations as $student)
        <li
            class="grid gap-1 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
            <div class="flex items-center gap-4">
                <img src="{{ $student->photo }}" alt="" class="w-10 h-10 aspect-square rounded-md">
                <div>
                    <div class="capitalize text-xl font-medium text-gray-900 dark:text-gray-50">
                        {{ $student->fullname }}
                    </div>
                    <div class="text-base font-normal text-gray-800 dark:text-gray-100">
                        {{ $student->classroom->name }}
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2">
                @php
                    $total = 16;
                @endphp
                @foreach ($ScheduleOfSubjects::get_by_classroom($student->classroom->id) as $schedule_of_subjects)
                    @php
                        $subjects = $schedule_of_subjects->subjects()->first();
                        $material_and_assignments = $MaterialAndAssignment::where('classroom_id', $student->classroom->id)->where('subjects_id', $subjects->id)->get();
                        $answers = 0;
                        foreach ($material_and_assignments as $material_and_assignment) {
                            $answer = $material_and_assignment
                                ->answer()
                                ->where('student_id', $student->id)
                                ->first();
                            if ($answer) $answers++;
                        }
                    @endphp
                    <div class="flex flex-col gap-1">
                        <div class="text-base font-normal text-gray-800 dark:text-gray-100">
                            {{ $subjects->name }}
                            {{ $answers }}:{{ $material_and_assignments->count() }}/{{ $total }}
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full"
                                style="width: {{ ($answers / $total) * 100 }}%">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </li>
    @endforeach
</ul>

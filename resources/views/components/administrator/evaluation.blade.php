@props([
    'evaluations' => null,
])
@inject('ScheduleOfSubjects', '\App\Models\ScheduleOfSubjects')
@inject('MaterialAndAssignment', '\App\Models\MaterialAndAssignment')
@inject('Presence', '\App\Models\Presence')

{{-- <ol class="flex items-center w-full bg-white">
    <li
        class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-500 after:border-4 after:inline-block dark:after:border-blue-800">
    </li>
    @foreach (range(1, 16) as $item)
        <li
            class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-red-500 after:border-4 after:inline-block dark:after:border-red-800">
            <span
                class="flex items-center justify-center w-6 h-6 text-sm text-gray-900 dark:text-gray-500 bg-gray-200 dark:bg-gray-800 shrink-0 rounded-full">
                {{ $item }}
            </span>
        </li>
    @endforeach
</ol> --}}

<ul class="grid gap-4">
    @foreach ($evaluations as $student)
        <li
            class="grid gap-1 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
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
            <hr class="border-gray-200 dark:border-gray-500">
            <div class="flex flex-col gap-2">
                @php
                    $total = 16;
                @endphp
                @foreach ($ScheduleOfSubjects::get_by_classroom($student->classroom->id) as $schedule_of_subjects)
                    @php
                        $subjects = $schedule_of_subjects->subjects()->first();
                        $material_and_assignments = $MaterialAndAssignment
                            ::where('classroom_id', $student->classroom->id)
                            ->where('subjects_id', $subjects->id)
                            ->get();
                        $answers = 0;
                        foreach ($material_and_assignments as $material_and_assignment) {
                            $answer = $material_and_assignment
                                ->answer()
                                ->where('student_id', $student->id)
                                ->first();
                            if ($answer && $answer->status == 'have been checked') {
                                $answers++;
                            }
                        }
                        $presences = $Presence
                            ::where('classroom_id', $student->classroom->id)
                            ->where('subjects_id', $subjects->id)
                            ->first();
                        $attendances = 0;
                        $meet = 0;
                        if ($presences) {
                            $meet = $presences->meet;
                            $attendance = $presences
                                ->attendances()
                                ->where('student_id', $student->id)
                                ->get();
                            foreach ($attendance as $data) {
                                if ($data && $data->state == 'present') {
                                    $attendances++;
                                }
                            }
                        }
                    @endphp
                    <div class="flex flex-col gap-1">
                        <div class="text-base font-medium">
                            {{ $subjects->name }}
                            @if ($meet == 16)
                                @if ($attendances > 16 - 3)
                                    <span class="opacity-70">(lulus)</span>
                                @else
                                    <span class="opacity-70">(tidak lulus)</span>
                                @endif
                            @endif
                        </div>
                        <div
                            class="flex flex-col gap-2 pl-2 py-1 text-base font-normal text-gray-800 dark:text-gray-100 border-l-4 hover:border-l-blue-400 dark:hover:border-l-blue-600">
                            <div class="flex flex-col gap-1">
                                <div><span>{{ trans('assignment') }}</span> <span
                                        class="text-base font-medium">({{ $answers }})</span> -
                                    <span>{{ $material_and_assignments->count() }}/{{ $total }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-blue-600 h-2.5 rounded-full"
                                        style="width: {{ ($answers / $total) * 100 }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <div class="text-base font-normal text-gray-800 dark:text-gray-100">
                                    <div><span>{{ trans('attendance') }}</span> <span
                                            class="text-base font-medium">({{ $attendances }})</span> -
                                        <span>{{ $meet }}/{{ $total }}</span>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-blue-600 h-2.5 rounded-full"
                                        style="width: {{ ($attendances / $total) * 100 }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </li>
    @endforeach
</ul>

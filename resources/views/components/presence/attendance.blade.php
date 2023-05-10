@props([
    'presence' => null,
])
<x-slot:head>
    @vite('resources/js/components/attendance.js')
    </x-slot>
    <div class="overflow-x-auto pb-2 rounded-lg">
        <form action="{{ route('web.resource.presence.attendance', ['presence' => $presence]) }}" method="post"
            enctype="multipart/form-data" class="form grid gap-4 justify-items-center">
            @csrf
            @method('PATCH')
            <table id="table"
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 border border-separate border-spacing-0.5 dark:border-gray-700 shadow-md dark:shadow-none">
                <caption
                    class="px-4 py-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div>Presence</div>
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        {{ $presence->classroom->name }} : {{ $presence->subjects->name }}
                    </p>
                    <div class="mt-1">
                        <label for="meet" class="capitalize block text-sm font-medium text-gray-900 dark:text-white">
                            {{ trans("meet") }}
                        </label>
                        <input type="number" id="meet" name="meet" value="{{ $presence->meet }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 pl-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            min="1"
                            max="16"
                            required>
                    </div>
                </caption>
                <thead>
                    <tr class="text-gray-800 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th rowspan="2" scope="col" class="p-2 text-base text-center capitalize">
                            no
                        </th>
                        <th rowspan="2" scope="col" class="p-2 text-base text-center capitalize">
                            student
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
                    {{-- // NOTE - Not Efficiency --}}
                    @forelse ($presence->students() as $student)
                        <tr @class([
                            'bg-white capitalize text-center dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 dark:border-gray-700',
                            'border-b',
                        ])>
                            <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $loop->iteration }}
                            </td>
                            <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $student->fullname }}
                            </td>
                            @foreach ($presence->attendances()->where('student_id', $student->id)->get()->sortBy('number') as $attendance)
                                <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                                    <input type="hidden" name="attendances[{{ $attendance->id }}]">
                                    <input type="checkbox" data-id="{{ $attendance->id }}"
                                        data-value="{{ $attendance->state }}"
                                        class="checkbox w-4 h-4 cursor-pointer text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 indeterminate:bg-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:hover:ring dark:hover:ring-blue-600 dark:indeterminate:bg-gray-500">
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td class="p-4 text-center text-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-b-lg capitalize"
                                colspan="20">
                                {{ __('empty') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <button
                class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                {{ __('update') }}
            </button>
        </form>
    </div>
    {{-- <script>
    document.querySelectorAll("[indeterminate]").forEach(element => {
        element.indeterminate = true
    });
</script> --}}

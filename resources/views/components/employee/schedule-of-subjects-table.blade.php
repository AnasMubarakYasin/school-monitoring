<div class="overflow-x-auto pb-2 rounded-lg">
    <table id="table"
        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 border border-separate border-spacing-0.5 dark:border-gray-700 rounded-lg shadow-md dark:shadow-none">
        <thead>
            <tr class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th rowspan="2" scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>no</span>
                    </div>
                </th>

                @if ($authUser == App\Models\Employee::class)
                    <th rowspan="2" scope="col" class="p-3 text-base capitalize">
                        <div class="flex items-center w-full h-full">
                            <span>classrooms</span>

                        </div>
                    </th>
                @endif

                <th colspan="2" scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center justify-center w-full h-full">
                        <span>subjects</span>
                    </div>
                </th>
                <th colspan="6" scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center justify-center w-full h-full">
                        <span>schedule</span>
                    </div>
                </th>
            </tr>
            <tr class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>code</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>name</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>monday</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>tuesday</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>wednesday</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>thursday</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>friday</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>saturday</span>
                    </div>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($resource as $data)
                <tr @class([
                    'bg-white capitalize text-center dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 dark:border-gray-700',
                    'border-b',
                ])>
                    <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    @if ($authUser == App\Models\Employee::class)
                        <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $data->classrooms->name }}
                        </td>
                    @endif
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $data->subjects->code }}
                    </td>
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $data->subjects->name }}
                    </td>
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        @if ($data->day == 'senin')
                            {{ $data->start_at . ' - ' . $data->end_at }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        @if ($data->day == 'selasa')
                            {{ $data->start_at . ' - ' . $data->end_at }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        @if ($data->day == 'rabu')
                            {{ $data->start_at . ' - ' . $data->end_at }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        @if ($data->day == 'kamis')
                            {{ $data->start_at . ' - ' . $data->end_at }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        @if ($data->day == 'jumat')
                            {{ $data->start_at . ' - ' . $data->end_at }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                        @if ($data->day == 'sabtu')
                            {{ $data->start_at . ' - ' . $data->end_at }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

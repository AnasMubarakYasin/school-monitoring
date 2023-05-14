<div class="overflow-x-auto pb-2 rounded-lg">
    <table id="table"
        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 border border-separate border-spacing-0.5 dark:border-gray-700 rounded-lg shadow-md dark:shadow-none">
        <caption
            class="px-4 py-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800 capitalize">
            <div>{{ trans('schedule of subjects') }}</div>
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400 capitalize">
                {{ trans('list of schedule of subjects') }}
            </p>
        </caption>
        <thead>
            <tr class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th rowspan="2" scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>no</span>
                    </div>
                </th>

                @if ($authUser == App\Models\Employee::class)
                    <th rowspan="2" scope="col" class="p-3 text-base capitalize">
                        <div class="flex items-center w-full h-full justify-center">
                            <span>{{ trans('classrooms') }}</span>

                        </div>
                    </th>
                @endif

                <th colspan="2" scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center justify-center w-full h-full">
                        <span>{{ trans('subjects') }}</span>
                    </div>
                </th>
                <th colspan="6" scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center justify-center w-full h-full">
                        <span>{{ trans('schedule') }}</span>
                    </div>
                </th>
            </tr>
            <tr class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('code') }}</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('name') }}</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('monday') }}</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('tuesday') }}</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('wednesday') }}</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('thursday') }}</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('friday') }}</span>
                    </div>
                </td>
                <td scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full justify-center">
                        <span>{{ trans('saturday') }}</span>
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

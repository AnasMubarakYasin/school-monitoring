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
                <th rowspan="2" scope="col" class="p-3 text-base capitalize">
                    <div class="flex items-center w-full h-full">
                        <span>classrooms</span>
                        
                    </div>
                </th>
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
            <tr @class([
                'bg-white capitalize text-center dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 dark:border-gray-700',
                'border-b',
            ])>
                <td class="p-3  text-gray-900 dark:text-white whitespace-nowrap">
                    1
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    XXI IPA 2
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    Fis
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    fisika
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    12:30 WIB
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    12:30 WIB
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    12:30 WIB
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    12:30 WIB
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    12:30 WIB
                </td>
                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                    12:30 WIB
                </td>
            </tr>
            {{-- <tr>
                <td class="p-4 text-center text-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-b-lg capitalize"
                    colspan="">
                    {{ __('empty') }}
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>

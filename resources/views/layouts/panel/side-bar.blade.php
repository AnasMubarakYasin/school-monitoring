<aside id="drawer-main" class="bg-white dark:bg-gray-800 shadow transition-colors" tabindex="-1">
    <header
        class="flex gap-4 items-center justify-center sticky top-0 bg-white dark:bg-gray-800 text-xl font-semibold h-[56px] shadow transition-colors">
        <div>
            <img src="{{ $context->app_logo }}" alt="Bladerlaiga" class="w-8 h-8 rounded-md">
        </div>
        <div class="text-green-700 dark:text-green-500">
            {{ $context->app_name }}
        </div>
    </header>
    <nav
        class="flex flex-col h-[calc(100vh_-_56px)] p-4 overflow-auto bg-white dark:bg-gray-800 shadow transition-colors">
        <ul class="space-y-2 capitalize">
            <li>
                @php
                    $link = $context->account->dashboard;
                @endphp
                <a href="{{ $link }}" @class([
                    'flex items-center p-2 text-base font-normal rounded-lg',
                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                        request()->url() != $link,
                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                        request()->url() == $link,
                ])>
                    <svg @class([
                        'w-6 h-6 transition',
                        'text-gray-700 dark:text-white' => request()->url() != $link,
                        '' => request()->url() == $link,
                    ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700 capitalize">
            <li>
                @php
                    $link = route('web.administrator.empty');
                @endphp
                <a href="{{ $link }}" @class([
                    'flex items-center p-2 text-base font-normal rounded-lg',
                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                        request()->url() != $link,
                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                        request()->url() == $link,
                ])>
                    <svg @class([
                        'w-6 h-6 transition',
                        'text-gray-700 dark:text-white' => request()->url() != $link,
                        '' => request()->url() == $link,
                    ]) xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                    <span class="ml-3">{{ __('archive') }}</span>
                </a>
            </li>
            <li>
                @php
                    $link = route('web.administrator.empty');
                @endphp
                <a href="{{ $link }}" @class([
                    'flex items-center p-2 text-base font-normal rounded-lg',
                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                        request()->url() != $link,
                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                        request()->url() == $link,
                ])>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" @class([
                            'w-6 h-6 transition',
                            'text-gray-700 dark:text-white' => request()->url() != $link,
                            '' => request()->url() == $link,
                        ])>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    <span class="ml-3">{{ __('trash') }}</span>
                </a>
            </li>
            <li>
                @php
                    $link = route('web.administrator.empty');
                @endphp
                <a href="{{ $link }}" @class([
                    'flex items-center p-2 text-base font-normal rounded-lg',
                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                        request()->url() != $link,
                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                        request()->url() == $link,
                ])>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" @class([
                            'w-6 h-6 transition',
                            'text-gray-700 dark:text-white' => request()->url() != $link,
                            '' => request()->url() == $link,
                        ])>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span class="ml-3">{{ __('files') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('web.administrator.logout_perfom') }}" @class([
                    'flex items-center p-2 text-base font-normal rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700',
                ])>
                    <svg @class(['w-6 h-6 transition text-gray-700 dark:text-white']) xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                    <span class="ml-3">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

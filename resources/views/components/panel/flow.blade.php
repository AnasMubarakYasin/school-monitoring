@php
    $first = false;
@endphp
<div class="grid gap-2">
    <div class="grid gap-2">
        <div class="text-gray-900 font-medium dark:text-gray-300">{{ trans('Flow') }}</div>
        @if ($flow->meet_maximum_requirement())
            <div class="flex p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <strong>Info</strong> congratulations everything is set.
                </div>
            </div>
        @elseif ($flow->meet_minimum_requirement())
            <div class="flex p-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <strong>Warning!</strong> some features of the app may not work, keep follow the
                    <strong>steps</strong> below.
                </div>
            </div>
        @else
            <div class="flex p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <strong>Danger!</strong> application business flow has not been set, follow the
                    <strong>steps</strong> below.
                </div>
            </div>
        @endif
    </div>
    <div class="grid gap-2">
        <div class="text-gray-900 font-medium dark:text-gray-300">{{ trans('Steps') }}</div>
        <ol class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
            {{-- @dd($requirements) --}}
            @foreach ($requirements as $key => $requirement)
                @if ($requirement['pass'])
                    <li>
                        <div class="w-full p-4 text-green-700 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:border-green-800 dark:text-green-400"
                            role="alert">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Info</span>
                                <h3 class="font-medium">{{ $loop->iteration }}. {{ $requirement['name'] }}</h3>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </li>
                @else
                    @if (!$first)
                        @php
                            if (!$first) {
                                $first = true;
                            }
                        @endphp
                        <li>
                            <a href="{{ $requirement['route'] }}"
                                class="block w-full p-4 text-blue-700 bg-blue-100 border border-blue-300 rounded-lg dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400 hover:bg-blue-50"
                                role="alert">
                                <div class="flex items-center justify-between">
                                    <span class="sr-only">Info</span>
                                    <h3 class="font-medium">{{ $loop->iteration }}. {{ $requirement['name'] }}</h3>
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </a>
                        </li>
                    @else
                        <li>
                            <div class="w-full p-4 text-gray-900 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                role="alert">
                                <div class="flex items-center justify-between">
                                    <span class="sr-only">Info</span>
                                    <h3 class="font-medium">{{ $loop->iteration }}. {{ $requirement['name'] }}</h3>
                                </div>
                            </div>
                        </li>
                    @endif
                @endif
            @endforeach
        </ol>
    </div>
</div>

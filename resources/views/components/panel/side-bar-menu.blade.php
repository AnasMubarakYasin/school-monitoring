@props([
    'for' => '',
    'name' => '',
    'link' => '',
    'icon' => '',
    'button' => false,
    'pname' => '',
    'pclass' => '',
    'indent' => 0,
    'index' => '',
    'alink' => '',
])
@if ($button)
    @if ($index)
        <a href="{{ $index }}">
    @endif
    <button type="button" data-collapse-toggle="{{ $for }}" aria-controls="{{ $for }}"
        @class([
            'sidebar-menus flex items-center w-full p-2 text-base font-normal rounded-lg',
            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                request()->url())->startsWith($link),
            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                request()->url())->startsWith($link),
        ])>
        @if ($icon)
            <div
                {{ $icon->attributes->class([
                    'w-6 h-6 transition',
                    'text-gray-700 dark:text-white' => !str(request()->url())->startsWith($link),
                    '' => str_starts_with(request()->url(), $link),
                ]) }}>
                {!! $icon !!}
            </div>
        @endif
        <span class="flex-1 text-left whitespace-nowrap capitalize" style="margin-left: {{ $indent * (3 * 4) }}px">
            {{ trans($name) }}
        </span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    @if ($index)
        </a>
    @endif
@else
    @if ($pname)
        @can($pname, $pclass)
            <li>
                <a href="{{ $link }}" @class([
                    'flex items-center p-2 text-base font-normal rounded-lg',
                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                        request()->url())->startsWith($link),
                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                        request()->url())->startsWith($link),
                ])>
                    @if ($icon)
                        <div
                            {{ $icon->attributes->class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith($link),
                                '' => str(request()->url())->startsWith($link),
                            ]) }}>
                            {!! $icon !!}
                        </div>
                    @endif
                    <span class="capitalize" style="margin-left: {{ $indent * (3 * 4) }}px">{{ trans($name) }}</span>
                </a>
            </li>
        @endcan
    @else
        <li>
            <a href="{{ $link }}" @class([
                'flex items-center p-2 text-base font-normal rounded-lg',
                'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                    request()->url())->startsWith($link),
                'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                    request()->url())->startsWith($link),
            ])>
                @if ($icon)
                    <div
                        {{ $icon->attributes->class([
                            'w-6 h-6 transition',
                            'text-gray-700 dark:text-white' => !str(request()->url())->startsWith($link),
                            '' => str(request()->url())->startsWith($link),
                        ]) }}>
                        {!! $icon !!}
                    </div>
                @endif
                <span class="capitalize" style="margin-left: {{ $indent * (3 * 4) }}px">{{ trans($name) }}</span>
            </a>
        </li>
    @endif

@endif

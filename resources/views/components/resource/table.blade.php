@props([
    'menu' => true,
    'selection' => true,
    'action' => true,
])
@section('head')
    @vite('resources/js/components/resource/table.js')
@endsection
<div class="grid gap-4">
    @if ($menu)
        <div class="flex gap-2 items-center">
            @can('create', App\Models\SchoolYear::class)
                <a href="{{ $resource->create }}"
                    class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>
                </a>
            @endcan
            <button id="filter_btn" data-dropdown-toggle="filter" data-dropdown-placement="bottom-start"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                    </path>
                </svg>
            </button>
            <button id="columns_btn" data-dropdown-toggle="columns" data-dropdown-placement="bottom-start"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                </svg>
            </button>
            @if (request()->query('sort') || request()->query('filter') || request()->query('column'))
                <a href="/{{ request()->path() }}"
                    class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </a>
            @endcan
            @can('delete_any', App\Models\SchoolYear::class)
                <form class="contents" id="delete_any" action="{{ $resource->delete_any }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    @if ($paginator)
                        <input type="hidden" name="all" value="{{ $paginator->count() == $paginator->total() }}">
                    @else
                        <input type="hidden" name="all" value="1">
                    @endif
                    <button id="delete_any_btn"
                        class="hidden items-center p-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        <span class="sr-only">Delete Item</span>
                    </button>
                </form>
            @endcan
            <form id="filter" action="" class="z-10 w-auto hidden bg-white rounded shadow dark:bg-gray-700">
                <input type="hidden" name="filter" value="on">
                <ul class="overflow-auto max-h-[50vh] p-3 space-y-2 text-sm text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600"
                    aria-labelledby="filter_btn">
                    @foreach ($resource->columns as $column)
                        <li>
                            @switch($resource->fields[$column]['type'])
                                @case('string')
                                    <div class="flex flex-col gap-1">
                                        <label for="filter_{{ $column }}"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($resource->fields[$column]['name']) }}
                                        </label>
                                        <input id="filter_{{ $column }}" name="filter_{{ $column }}"
                                            type="text" value="{{ request()->query("filter_$column") }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="{{ __('search ' . $resource->fields[$column]['name']) }}...">
                                    </div>
                                @break

                                @case('enum')
                                    <div class="flex flex-col gap-1">
                                        <label for="filter_{{ $column }}"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($resource->fields[$column]['name']) }}
                                        </label>
                                        <select id="filter_{{ $column }}" name="filter_{{ $column }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>{{ __('choose a ' . $resource->fields[$column]['name']) }}
                                            </option>
                                            @foreach ($resource->fields[$column]['enums'] as $key => $val)
                                                <option @selected(request()->query("filter_$column") == $key) value="{{ $val }}">
                                                    {{ $val }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @break

                                @case('date')
                                    <div class="flex flex-col gap-1">
                                        <label for="filter_{{ $column }}"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($resource->fields[$column]['name']) }}
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <input id="filter_{{ $column }}" name="filter_{{ $column }}"
                                                datepicker datepicker-autohide type="text"
                                                value="{{ request()->query("filter_$column") }}"
                                                class="block w-full pl-10 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="{{ __('search ' . $resource->fields[$column]['name']) }}...">
                                        </div>
                                    </div>
                                @break

                                @default
                                    <div>{{ $column }}</div>
                            @endswitch
                        </li>
                    @endforeach
                </ul>
                <div class="grid px-4 py-2 w-full">
                    <button
                        class="px-4 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize">
                        {{ __('filter') }}
                    </button>
                </div>
            </form>
            <form id="columns" action=""
                class="z-10 w-auto hidden bg-white rounded shadow dark:bg-gray-700">
                <input type="hidden" name="column" value="on">
                <ul class="overflow-auto max-h-[50vh] p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600"
                    aria-labelledby="columns_btn">
                    @foreach ($resource->fields as $key => $field)
                        <li>
                            <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <label class="relative inline-flex items-center w-full cursor-pointer">
                                    <input type="checkbox" name="columns[]" value="{{ $key }}"
                                        @checked(in_array($key, $resource->columns)) class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-blue-600">
                                    </div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 capitalize">
                                        {{ __($field['name']) }}
                                    </span>
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="grid px-4 py-2 w-full">
                    <button
                        class="px-4 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize">
                        {{ __('apply') }}
                    </button>
                </div>
            </form>
    </div>
@endif
<div class="overflow-x-auto pb-2">
    <table id="table"
        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 dark:border dark:border-separate dark:border-spacing-0 dark:border-gray-700 rounded-lg shadow-md dark:shadow-none">
        <thead>
            <tr class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                @if ($selection)
                    <th scope="col" class="p-3 text-center align-middle rounded-tl-lg">
                        <input id="checkbox-all" type="checkbox"
                            class="text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                        <label for="checkbox-all" class="sr-only">checkbox</label>
                    </th>
                @endif
                @foreach ($resource->columns as $column)
                    <th scope="col" class="p-3 text-base capitalize">
                        <div class="flex items-center w-full h-full">
                            <span>{{ __($resource->fields[$column]['name']) }}</span>
                            <a
                                href="{{ request()->fullUrlWithQuery(['sort' => 'on', 'sort_name' => $column, 'sort_dir' => request()->query('sort_dir', 'desc') == 'desc' ? 'asc' : 'desc']) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3.5 h-3.5"
                                    aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path
                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                @endforeach
                <th scope="col" class="text-base text-center py-3 px-6 rounded-tr-lg capitalize">
                    {{ __('action') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($paginator ?? $data as $item)
                <tr @class([
                    'bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 dark:border-gray-700',
                    'border-b' => !$loop->last,
                ])>
                    @if ($selection)
                        <td class="p-3 text-center align-middle {{ $loop->last ? 'rounded-bl-lg' : '' }}">
                            <input id="" type="checkbox" name="id[]" form="delete_any"
                                value="{{ $item->id }}"
                                class="text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="" class="sr-only">checkbox</label>
                        </td>
                    @endif

                    @foreach ($resource->columns as $column)
                        @switch($resource->fields[$column]['type'])
                            @case('model')
                                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                                    @php
                                        $query = '?ref=on&id[]=' . $item->{$column}->id;
                                    @endphp
                                    <a href="{{ $resource->model($resource->fields[$column], $item->{$column}) . $query }}"
                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ $resource->fields[$column]['name'] }}
                                    </a>
                                </td>
                            @break

                            @case('models')
                                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                                    @php
                                        $query = $item->{$column}->reduce(function ($result, $item, $index) {
                                            $result .= '&id[]=' . $item->id;
                                            return $result;
                                        }, '?ref=on');
                                    @endphp
                                    <a href="{{ $resource->model($resource->fields[$column], $item->{$column}) . $query }}"
                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ count($item->{$column}) }} {{ $resource->fields[$column]['name'] }}
                                    </a>
                                </td>
                            @break

                            @default
                                <td class="p-3 text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $item->{$column} }}
                                </td>
                        @endswitch
                    @endforeach

                    <td class="flex justify-center gap-2 p-3 capitalize {{ $loop->last ? 'rounded-br-lg' : '' }}">
                        @can('update', $item)
                            <a id="edt_btn" href="{{ $resource->update($item) }}"
                                class="p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                <span class="sr-only">Edit Item</span>
                            </a>
                        @endcan
                        @can('delete', $item)
                            <form class="contents" action="{{ $resource->delete($item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button id="del_btn"
                                    class="p-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4"></path>
                                    </svg>
                                    <span class="sr-only">Delete Item</span>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @empty
                    <tr>
                        <td class="p-4 text-center text-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-b-lg capitalize"
                            colspan="{{ count($resource->columns) + 2 }}">
                            {{ __('empty') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if ($resource->pagination)
        <nav class="flex flex-col gap-2 md:flex-row justify-between items-center" aria-label="Table navigation">
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700 dark:text-gray-400">
                <div>
                    <span class="capitalize">{{ __('view') }}</span>
                    @if ($paginator->onFirstPage())
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $paginator->firstItem() ?? 0 }}
                        </span>
                        <span> {{ __('to') }} </span>
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $paginator->lastItem() ?? 0 }}
                        </span>
                    @else
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $paginator->count() }}
                        </span>
                    @endif
                    <span>{{ __('of') }}</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
                    <span>{{ __('results') }}</span>.
                </div>
                <form id="fperpage">
                    <label for="perpage" class="capitalize">
                        {{ __('perpage') }}:
                    </label>
                    <select id="perpage" name="perpage"
                        class="text-gray-700 bg-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize">
                        @foreach (range(1, 3) as $per)
                            <option @selected($paginator->perPage() == $per * 5) value="{{ $per * 5 }}">{{ $per * 5 }}
                            </option>
                        @endforeach
                        <option @selected($paginator->perPage() == $paginator->total()) value="{{ $paginator->total() }}">{{ __('all') }}
                        </option>
                    </select>
                </form>
            </div>
            <ul class="flex items-center -space-x-px">
                <li>
                    @if ($paginator->previousPageUrl())
                        <a href="{{ $paginator->previousPageUrl() }}"
                            class="block py-2 px-2 text-gray-700 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @else
                        <button disabled
                            class="cursor-not-allowed py-2 px-2 rounded-l-lg border border-gray-300 bg-gray-200 text-gray-700 dark:bg-gray-600 dark:border-gray-700 dark:text-gray-400">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    @endif
                </li>
                @php
                    $count = (int) floor($paginator->total() / $paginator->perPage());
                @endphp
                @if ($count && $count > 1)
                    @foreach (range(0, $count) as $item)
                        <li>
                            <a href="{{ $paginator->url($loop->iteration) }}" @class([
                                'grid place-content-center p-2 w-5 h-5 aspect-square box-content text-base',
                                'text-gray-700 bg-white border border-gray-300 hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' =>
                                    $paginator->currentPage() != $loop->iteration,
                                'text-blue-600 border border-blue-300 bg-blue-100 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' =>
                                    $paginator->currentPage() == $loop->iteration,
                            ])>
                                {{ $loop->iteration }}
                            </a>
                        </li>
                    @endforeach
                @endif
                <li>
                    @if ($paginator->nextPageUrl())
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="block py-2 px-2 text-gray-700 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @else
                        <button disabled
                            class="cursor-not-allowed py-2 px-2 rounded-r-lg border border-gray-300 bg-gray-200 text-gray-700 dark:bg-gray-600 dark:border-gray-700 dark:text-gray-400">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    @endif
                </li>
            </ul>
        </nav>
    @endif
</div>

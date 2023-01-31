@props([
    'fields' => [],
])
@section('head')
    @vite('resources/js/components/resource/form.js')
@endsection
<form
    class="grid gap-4 px-5 py-3 lg:w-1/2 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
    action="{{ $resource->is_create() ? $resource->create : $resource->update($model) }}" method="post"
    enctype="multipart/form-data">
    @csrf
    @if ($resource->is_update())
        @method('PATCH')
    @endif
    <input type="hidden" name="_view_any" value="{{ $resource->view_any }}">
    <div class="grid gap-4">

        @foreach ($resource->fields as $key => $field)
            @continue(in_array('hide_' . $resource->mode(), $field))
            @switch($field['type'])
                @case('string')
                    <div class="flex flex-col gap-2">
                        <label for="{{ $key }}"
                            class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                            {{ trans($field['name']) }}
                        </label>
                        <input type="text" id="{{ $key }}" name="{{ $key }}"
                            value="{{ old($key) ?? $model->{$key} }}"
                            class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="">
                        @error($key)
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @break

                @case('boolean')
                    <div class="flex flex-col gap-2">
                        <label class="relative flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="{{ $key }}" name="{{ $key }}" class="sr-only peer"
                                @checked(old($key))>
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="capitalize text-sm font-medium text-gray-900 dark:text-gray-300">
                                {{ trans($field['name']) }}
                            </span>
                        </label>
                        @error($key)
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @break

                @case('enum')
                    <div class="flex flex-col gap-2">
                        <label for="{{ $key }}"
                            class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                            {{ trans($field['name']) }}
                        </label>
                        <select id="{{ $key }}" name="{{ $key }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected></option>
                            @foreach ($field['enums'] as $e_key => $e_val)
                                <option @selected(old($key) ?? $model->{$key} == $e_key) value="{{ $e_key }}">{{ $e_val }}</option>
                            @endforeach
                        </select>
                        @error($key)
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @break

                @case('date')
                    <div class="flex flex-col gap-2">
                        <label for="{{ $key }}"
                            class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                            {{ trans($field['name']) }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="{{ $key }}" name="{{ $key }}" type="text" datepicker data-autohide
                                data-format={{ $field['format_js'] }}
                                value="{{ old($key) ?? Illuminate\Support\Carbon::parse()->format($field['format']) }}"
                                class="block w-full pl-10 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </div>
                        @error($key)
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @break

                @case('model')
                    <div class="flex flex-col gap-2">
                        <label for="{{ $field['as'] }}" class="capitalize text-sm font-medium text-gray-900 dark:text-white">
                            {{ trans($field['name']) }}
                        </label>
                        <input type="text" list="{{ $field['as'] }}_list" id="{{ $field['as'] }}"
                            name="{{ $field['as'] }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ trans($field['name']) }}"
                            value="{{ old($field['as']) ?? $model->{$field['as']} }}">
                        <datalist id="{{ $field['as'] }}_list">
                            @foreach ($resource->model($field) as $model)
                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @endforeach
                        </datalist>
                        @error($field['as'])
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @break

                @default
                    <div> {{ trans($field['name']) }} </div>
            @endswitch
        @endforeach
    </div>
    <div class="grid place-items-center">
        <button
            class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            {{ __($resource->mode()) }}
        </button>
    </div>
    @env('local')
    @forelse ($errors->all() as $error)
        <div>{{ $error }}</div>
    @empty
    @endforelse
    @endenv
</form>

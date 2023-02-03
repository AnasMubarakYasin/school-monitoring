@inject('carbon', 'Illuminate\Support\Carbon')
@foreach ($fields as $field)
    @if (is_array($field))
        <div class="grid grid-flow-col gap-2 w-full">
            @include('components.resource.fields', [
                'fields' => $field,
                'resource' => $resource,
                'model' => $model,
            ])
        </div>
    @else
        @switch($model->definition($field)->type)
            @case('string')
                <div class="flex flex-col gap-2">
                    <label for="{{ $field }}" class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                        {{ trans($model->definition($field)->name) }}
                    </label>
                    <input type="text" id="{{ $field }}" name="{{ $field }}"
                        value="{{ old($field) ?? $model->{$field} }}"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="">
                    @error($field)
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @break

            @case('number')
                <div class="flex flex-col gap-2">
                    <label for="{{ $field }}" class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                        {{ trans($model->definition($field)->name) }}
                    </label>
                    <input type="number" id="{{ $field }}" name="{{ $field }}"
                        value="{{ old($field) ?? $model->{$field} }}"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="">
                    @error($field)
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @break

            @case('boolean')
                <div class="flex flex-col gap-2">
                    <label class="relative flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="{{ $field }}" name="{{ $field }}" class="sr-only peer"
                            @checked(old($field))>
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="capitalize text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ trans($model->definition($field)->name) }}
                        </span>
                    </label>
                    @error($field)
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @break

            @case('enum')
                <div class="flex flex-col gap-2">
                    <label for="{{ $field }}"
                        class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                        {{ trans($model->definition($field)->name) }}
                    </label>
                    <select id="{{ $field }}" name="{{ $field }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected></option>
                        @foreach ($model->definition($field)->enums as $e_key => $e_val)
                            <option @selected(old($field) ?? $model->{$field} == $e_key) value="{{ $e_key }}">{{ $e_val }}</option>
                        @endforeach
                    </select>
                    @error($field)
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @break

            @case('date')
                <div class="flex flex-col gap-2">
                    <label for="{{ $field }}"
                        class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                        {{ trans($model->definition($field)->name) }}
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
                        <input id="{{ $field }}" name="{{ $field }}" type="date"
                            value="{{ old($field) ?? $carbon::parse($model->{$field})->format("Y-m-d") }}"
                            class="block w-full pl-10 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="">
                    </div>
                    @error($field)
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @break

            @case('time')
                <div class="flex flex-col gap-2">
                    <label for="{{ $field }}"
                        class="block capitalize text-sm font-medium text-gray-900 dark:text-white">
                        {{ trans($model->definition($field)->name) }}
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
                        <input id="{{ $field }}" name="{{ $field }}" type="time"
                            value="{{ old($field) ?? $carbon::parse($model->{$field})->format("Y-m-d") }}"
                            class="block w-full pl-10 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="">
                    </div>
                    @error($field)
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @break

            @case('model')
                <div class="flex flex-col gap-2">
                    <label for="{{ $model->definition($field)->alias }}"
                        class="capitalize text-sm font-medium text-gray-900 dark:text-white">
                        {{ trans($model->definition($field)->name) }}
                    </label>
                    <input type="text" list="{{ $model->definition($field)->alias }}_list"
                        id="{{ $model->definition($field)->alias }}" name="{{ $model->definition($field)->alias }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ trans($model->definition($field)->name) }}"
                        value="{{ old($model->definition($field)->alias) ?? $model->{$model->definition($field)->alias} }}">
                    <datalist id="{{ $model->definition($field)->alias }}_list">
                        @foreach ($resource->fetch_model($model->definition($field)) as $relation)
                            <option value="{{ $relation->id }}">{{ $relation->name }}</option>
                        @endforeach
                    </datalist>
                    @error($model->definition($field)->alias)
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @break

            @default
                <div> {{ trans($model->definition($field)->name) }} </div>
        @endswitch
    @endif
@endforeach
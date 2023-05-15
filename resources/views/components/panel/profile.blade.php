@aware([
    'user' => null,
    'panel' => null,
])
<div class="flex gap-4 p-4 flex-col lg:flex-row">
    <form
        class="grid gap-4 p-4 w-full h-fit text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
        action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-flow-row gap-4">
            @include('components.resource.fields', [
                'fields' => $resource->fields,
                'resource' => $resource,
                'model' => $resource->model,
            ])
        </div>
        <div class="grid place-items-center">
            <button
                class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                {{ __($resource->mode) }}
            </button>
        </div>
    </form>
    <form
        class="grid gap-4 p-4 w-full h-fit text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
        action="{{ $panel->change_password() }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="text-lg font-bold capitalize">{{ trans('change password') }}</div>
        <div>
            <label for="password_current" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ trans('current password') }}
            </label>
            <input type="password" id="password_current" name="password_current"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" required value="{{ old('password_current') }}">
            @error('password_current')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ trans('new password') }}
            </label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" required value="{{ old('password') }}">
            @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ trans('password confirmation') }}
            </label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" required value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid place-items-center">
            <button
                class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                {{ trans('change') }}
            </button>
        </div>
    </form>
</div>

<form
    class="grid gap-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
    action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div class="grid gap-4">
            <div class="flex flex-col gap-2">
                <label for="name"
                    class="text-sm font-medium text-gray-900 dark:text-white capitalize">{{ __('name') }}</label>
                <output id="name" name="name"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $model->name }}</output>
            </div>
        </div>            
    </div>
    <div class="flex gap-2 place-content-center">
        <button
            class="w-full capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            {{ __('update') }}
        </button>
    </div>
</form>

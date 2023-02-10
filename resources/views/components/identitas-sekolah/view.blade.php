<div class="grid text-gray-900 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 p-5">
    <h1 class="font-bold dark:text-white capitalize">{{ trans("school identity") }}</h1>
    <hr class="border-2 rounded-full border-gray-600 dark:border-gray-300 shadow-2xl">
    <div class="ml-8 mt-2 grid gap-y-2.5">
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="name" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("school name") }}
            </label>
            <input disabled type="text" id="name" name="name" value="{{ $resource->name }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="name" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
                npsn
            </label>
            <input disabled type="text" id="name" name="name" value="{{ $resource->npsn }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="name" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
                nss
            </label>
            <input disabled type="text" id="name" name="name" value="{{ $resource->nss }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="name" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("school status") }}
            </label>
            <input disabled type="text" id="name" name="name" value="{{ $resource->status }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
    </div>

    <h1 class="font-bold dark:text-white capitalize">{{ trans("address") }}</h1>
    <hr class="border-2 rounded-full border-gray-600 dark:border-gray-300 shadow-2xl">
    <div class="ml-8 mt-2 grid gap-y-2.5">
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="address" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("address") }}
            </label>
            <input disabled type="text" id="address" name="address" value="{{ $resource->address }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="village" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("village") }}
            </label>
            <input disabled type="text" id="village" name="village" value="{{ $resource->village }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="sub_district" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("sub district") }}
            </label>
            <input disabled type="text" id="sub_district" name="sub_district" value="{{ $resource->sub_district }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="district" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("district") }}
            </label>
            <input disabled type="text" id="district" name="district" value="{{ $resource->district }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="province" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("province") }}
            </label>
            <input disabled type="text" id="province" name="province" value="{{ $resource->province }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="postal_code" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
            {{ trans("postal code") }}
            </label>
            <input disabled type="text" id="postal_code" name="postal_code" value="{{ $resource->postal_code }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
    </div>

    <h1 class="font-bold dark:text-white capitalize">{{ trans("contact") }}</h1>
    <hr class="border-2 rounded-full border-gray-600 dark:border-gray-300 shadow-2xl">
    <div class="ml-8 mt-2 grid gap-y-2.5">
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="telp" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
                telp
            </label>
            <input disabled type="text" id="telp" name="telp" value="{{ $resource->telp }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
        <div class="grid grid-cols-5 items-center gap-12">
            <label for="website" class="col-span-1 capitalize text-sm font-medium text-gray-900 dark:text-white">
                website
            </label>
            <input disabled type="text" id="website" name="website" value="{{ $resource->website }}"
                class="col-span-4 shadow-md w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
    </div>
    <div class="mt-6 text-center">
        <a href="update/{{ $resource->id }}"
            class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ trans("edit identity") }} </a>
    </div>
</div>

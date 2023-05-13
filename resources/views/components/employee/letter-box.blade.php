<div
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#F9A620] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around capitalize">
        <div>
            <small>{{ trans('letter of information') }}</small>
        </div>
        <button data-modal-target="modal-surat-keterangan" data-modal-toggle="modal-surat-keterangan"
            class="w-max block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize"
            type="button">
            {{ trans('add letter') }}
        </button>
    </div>
</div>
<div
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#3842a09c] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around capitalize">
        <div>
            <small>{{ trans('letter of recommendation') }}</small>
        </div>
        <button data-modal-target="modal-surat-rekomendasi" data-modal-toggle="modal-surat-rekomendasi"
            class="w-max block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize"
            type="button">
            {{ trans('add letter') }}
        </button>
    </div>
</div>
<div
    class="flex gap-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
    <div class="bg-[#5aca859c] grid place-content-center p-3.5 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>
    </div>
    <div class="col-span-2 grid content-around capitalize">
        <div>
            <small>{{ trans('student return letter') }}</small>
        </div>
        {{-- <a href="{{ route('surat_pengembalian') }}"
            class="w-max p-1 px-2 font-normal rounded-lg bg-blue-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">add
            letter</a> --}}
        <button data-modal-target="modal-surat-pengembalian" data-modal-toggle="modal-surat-pengembalian"
            class="w-max block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize"
            type="button">
            {{ trans('add letter') }}
        </button>
    </div>
</div>


<!-- Main surat keterangan -->
<div id="modal-surat-keterangan" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="modal-surat-keterangan">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="capitalize mb-4 text-xl font-medium text-gray-900 dark:text-white">masukkan data surat</h3>
                <form class="space-y-6" action="{{ route('surat_keterangan') }}" target="_blank" method="GET">
                    <div>
                        <label for="no"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            nomor surat</label>
                        <input type="text" name="no" id="no"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="" required>
                    </div>
                    <div>
                        <label for="name"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            nama yang bertanda tangan</label>
                        <input type="text" name="name" id="name" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nip</label>
                        <input type="text" name="nip" id="nip" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="jabatan"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="name_tenaga"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            nama yang tersebut</label>
                        <input type="text" name="name_tenaga" id="name_tenaga" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="tgllahir"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            tempat tanggal lahir</label>
                        <input type="text" name="tgllahir" id="tgllahir" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="pendidikan"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            pendidikan - jurusan</label>
                        <input type="text" name="pendidikan" id="pendidikan" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="alamat"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            alamat tempat kerja</label>
                        <input type="text" name="alamat" id="alamat" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="notelp"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            no telp</label>
                        <input type="text" name="notelp" id="notelp" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="tenagaadministrasi"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            lama tenaga administrasi</label>
                        <input type="text" name="tenagaadministrasi" id="tenagaadministrasi" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="mulai"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            mulai</label>
                        <input type="text" name="mulai" id="mulai" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="tglpembuatan"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            tgl pembuatan</label>
                        <input type="text" name="tglpembuatan" id="tglpembuatan" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="capitalize w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        print</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Main surat rekomendasi -->
<div id="modal-surat-rekomendasi" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="modal-surat-rekomendasi">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="capitalize mb-4 text-xl font-medium text-gray-900 dark:text-white">masukkan data surat</h3>
                <form class="space-y-6" action="{{ route('surat_rekomendasi') }}" target="_blank" method="GET">
                    <div>
                        <label for="no"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            nomor surat</label>
                        <input type="text" name="no" id="no"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="" required>
                    </div>
                    <div>
                        <label for="name_tenaga"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            nama yang tersebut</label>
                        <input type="text" name="name_tenaga" id="name_tenaga" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="tgllahir"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            tempat tanggal lahir</label>
                        <input type="text" name="tgllahir" id="tgllahir" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="nisn"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NISN</label>
                        <input type="text" name="nisn" id="nisn" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="jenis_kelamin"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            jenis kelamin</label>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="kelas"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            kelas</label>
                        <input type="text" name="kelas" id="kelas" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="tglpembuatan"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            tgl pembuatan</label>
                        <input type="text" name="tglpembuatan" id="tglpembuatan" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="capitalize w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        print</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Main surat pengembalian -->
<div id="modal-surat-pengembalian" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="modal-surat-pengembalian">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="capitalize mb-4 text-xl font-medium text-gray-900 dark:text-white">masukkan data surat</h3>
                <form class="space-y-6" action="{{ route('surat_pengembalian') }}" target="_blank" method="GET">
                    <div>
                        <label for="no"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            nomor surat</label>
                        <input type="text" name="no" id="no"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="" required>
                    </div>
                    <div>
                        <label for="hari"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            hari</label>
                        <input type="text" name="hari" id="hari" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="tanggal"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            tanggal</label>
                        <input type="text" name="tanggal" id="tanggal" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="nama"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            nama</label>
                        <input type="text" name="nama" id="nama" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="kelas"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            kelas</label>
                        <input type="text" name="kelas" id="kelas" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="alamat"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="tglpembuatan"
                            class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            tgl pembuatan</label>
                        <input type="text" name="tglpembuatan" id="tglpembuatan" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="capitalize w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        print</button>
                </form>
            </div>
        </div>
    </div>
</div>

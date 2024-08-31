<x-app-layout>
    <x-slot name="header">
        {{ __('Cuti Mahasiswa') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <!-- Alert section -->
        @if (session('success'))
            <div id="alert-success" class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-blue-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                        </path>
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-blue-500">Success</span>
                        <p class="text-sm text-gray-600">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @elseif(session('error'))
            <div id="alert-error" class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-red-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                        </path>
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-red-500">Error</span>
                        <p class="text-sm text-gray-600">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <!-- End of alert section -->

        <div class="flex space-x-2 justify-end mb-4">
            <a href="{{ route('cuti-mahasiswa.create') }}"
                class="flex items-center px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="{{ route('cuti-mahasiswa.report') }}" target="_blank"
                class="flex items-center px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-center text-gray-700 uppercase bg-blue-50 border-b">
                            <th class="px-4 py-3">Nomor Surat</th>
                            <th class="px-4 py-3">Tanggal Mulai</th>
                            <th class="px-4 py-3">Tanggal Selesai</th>
                            <th class="px-4 py-3">Jumlah Hari</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse ($cutiMahasiswas as $data)
                            <tr class="text-gray-700 text-center">
                                <td class="px-4 py-3 text-sm">
                                    {{ $data->nomor_surat }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ \Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $data->jumlah_hari }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @if ($data->status == 'pending')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                            Pending
                                        </span>
                                    @elseif ($data->status == 'approved')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                            Accepted
                                        </span>
                                    @elseif ($data->status == 'rejected')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                            Rejected
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm flex justify-center space-x-2 items-center">
                                    <a href="{{ route('cuti-mahasiswa.show', $data->id) }}"
                                        class="px-1 py-2 text-sm font-medium leading-5 text-blue-500 transition-colors duration-150 border border-transparent rounded-lg active:text-blue-600 hover:text-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('cuti-mahasiswa.edit', $data->id) }}"
                                        class="px-1 py-2 text-sm font-medium leading-5 text-blue-500 transition-colors duration-150 border border-transparent rounded-lg active:text-blue-600 hover:text-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path
                                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('cuti-mahasiswa.report-by-id', $data->id) }}" target="_blank"
                                        class="px-1 py-2 text-sm font-medium leading-5 text-blue-500 transition-colors duration-150 border border-transparent rounded-lg active:text-blue-600 hover:text-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <path fill-rule="evenodd"
                                                d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm5.845 17.03a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V12a.75.75 0 0 0-1.5 0v4.19l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3Z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                        </svg>
                                    </a>

                                    <!-- Modal Trigger DELETE -->
                                    <div x-data="{ openDelete: false }" class="inline">
                                        <!-- DELETE BTN -->
                                        <button @click="openDelete = true"
                                            class="px-1 py-2 text-sm font-medium leading-5 text-blue-500 transition-colors duration-150 border border-transparent rounded-lg active:text-blue-600 hover:text-blue-700 focus:outline-none focus:shadow-outline-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div x-show="openDelete" x-transition:enter="transition ease-out duration-150"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="fixed inset-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                            <div x-show="openDelete"
                                                x-transition:enter="transition ease-out duration-150"
                                                x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                                x-transition:leave="transition ease-in duration-150"
                                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                                x-transition:leave-end="opacity-0 transform translate-y-1/2"
                                                @click.away="openDelete = false" @keydown.escape="openDelete = false"
                                                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl"
                                                role="dialog" id="modal">
                                                <!-- Modal body -->
                                                <div class="mt-4 mb-6">
                                                    <!-- Modal title -->
                                                    <p class="mb-2 text-lg font-semibold text-gray-700">
                                                        Hapus Data
                                                    </p>
                                                    <!-- Modal description -->
                                                    <p class="text-sm text-gray-700">
                                                        Apakah Anda yakin ingin menghapus data <span
                                                            class="font-semibold">{{ $data->nomor_surat }}</span>?
                                                    </p>
                                                </div>
                                                <footer
                                                    class="flex flex-col items-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
                                                    <button @click="openDelete = false"
                                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                                        Batal
                                                    </button>
                                                    <form action="{{ route('cuti-mahasiswa.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Trigger VERIFY -->
                                    <div x-data="{ openVerify: false }" class="inline">
                                        <!-- VERIFY BTN -->
                                        <button @click="openVerify = true"
                                            class="px-2 py-2 text-sm font-medium leading-5 text-blue-500 hover:text-white transition-colors duration-150 border border-transparent rounded-lg active:bg-blue-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <!-- Verify Modal -->
                                        <div x-show="openVerify" x-transition:enter="transition ease-out duration-150"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="fixed inset-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                            <div x-show="openVerify"
                                                x-transition:enter="transition ease-out duration-150"
                                                x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                                x-transition:leave="transition ease-in duration-150"
                                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                                x-transition:leave-end="opacity-0 transform translate-y-1/2"
                                                @click.away="openVerify = false" @keydown.escape="openVerify = false"
                                                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl"
                                                role="dialog" id="modal">
                                                <!-- Modal body -->
                                                <div class="mt-4 mb-6">
                                                    <!-- Modal title -->
                                                    <p class="mb-2 text-lg font-semibold text-gray-700">
                                                        Verifikasi Data Mahasiswa Aktif
                                                    </p>
                                                    <!-- Modal description -->
                                                    <p class="text-sm text-gray-700">
                                                        Apakah Anda yakin ingin memverifikasi data <span
                                                            class="font-semibold">{{ $data->nomor_surat }}</span>?
                                                    </p>
                                                </div>
                                                <footer
                                                    class="flex flex-col items-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
                                                    <button @click="openVerify = false"
                                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                                        Batal
                                                    </button>
                                                    <form action="{{ route('cuti-mahasiswa.verify', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                                            Verifikasi
                                                        </button>
                                                    </form>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Trigger REJECT -->
                                    <div x-data="{ openReject: false }" class="inline">
                                        <!-- REJECT BTN -->
                                        <button @click="openReject = true"
                                            class="px-2 py-2 text-sm font-medium leading-5 text-blue-500 hover:text-white transition-colors duration-150 border border-transparent rounded-lg active:bg-blue-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <!-- Reject Modal -->
                                        <div x-show="openReject" x-transition:enter="transition ease-out duration-150"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="fixed inset-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                            <div x-show="openReject"
                                                x-transition:enter="transition ease-out duration-150"
                                                x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                                x-transition:leave="transition ease-in duration-150"
                                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                                x-transition:leave-end="opacity-0 transform translate-y-1/2"
                                                @click.away="openReject = false" @keydown.escape="openReject = false"
                                                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl"
                                                role="dialog" id="modal">
                                                <!-- Modal body -->
                                                <div class="mt-4 mb-6">
                                                    <!-- Modal title -->
                                                    <p class="mb-2 text-lg font-semibold text-gray-700">
                                                        Tolak Data Mahasiswa Aktif
                                                    </p>
                                                    <!-- Modal description -->
                                                    <p class="text-sm text-gray-700">
                                                        Apakah Anda yakin ingin menolak data <span
                                                            class="font-semibold">{{ $data->nomor_surat }}</span>?
                                                    </p>
                                                </div>
                                                <footer
                                                    class="flex flex-col items-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
                                                    <button @click="openReject = false"
                                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                                        Batal
                                                    </button>
                                                    <form action="{{ route('cuti-mahasiswa.reject', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                                            Tolak
                                                        </button>
                                                    </form>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-3 text-sm text-center text-gray-700">
                                    Data tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t">
                {{ $cutiMahasiswas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Add this script block to hide the alert after 3 seconds -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var alertSuccess = document.getElementById('alert-success');
            var alertError = document.getElementById('alert-error');
            if (alertSuccess) {
                alertSuccess.style.display = 'none';
            }
            if (alertError) {
                alertError.style.display = 'none';
            }
        }, 3000);
    });
</script>

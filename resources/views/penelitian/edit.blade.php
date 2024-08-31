<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Data Pengajuan Izin Penelitian') }}
    </x-slot>

    <div class="p-2 bg-white rounded-lg shadow-xs">
        <form action="{{ route('penelitian.update', $penelitian->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-2">

                {{--  Nomor Surat --}}
                <div class="sm:col-span-2">
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-700">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat"
                        class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100"
                        value="{{ $penelitian->nomor_surat }}" readonly>
                </div>

                {{-- Tempat Penelitian --}}
                <div class="sm:col-span-1">
                    <label for="tempat_penelitian" class="block text-sm font-semibold text-gray-700">Tempat
                        Penelitian</label>
                    <textarea name="tempat_penelitian" id="tempat_penelitian" rows="3"
                        class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Tempat Penelitian">{{ old('tempat_penelitian', $penelitian->tempat_penelitian) }}</textarea>
                    @error('tempat_penelitian')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Judul Penelitian --}}
                <div class="sm:col-span-1">
                    <label for="judul" class="block text-sm font-semibold text-gray-700">Judul Penelitian</label>
                    <textarea name="judul" id="judul" rows="3"
                        class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Judul Penelitian">{{ old('judul', $penelitian->judul) }}</textarea>
                    @error('judul')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Mulai --}}
                <div class="sm:col-span-1">
                    <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                        class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('tanggal_mulai', $penelitian->tanggal_mulai) }}">
                    @error('tanggal_mulai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Selesai --}}
                <div class="sm:col-span-1">
                    <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                        class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('tanggal_selesai', $penelitian->tanggal_selesai) }}">
                    @error('tanggal_selesai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex space-x-2 justify-end mt-4">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
                    Update
                </button>
                <a href="{{ route('penelitian.index') }}"
                    class="px-4 py-2 ml-4 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

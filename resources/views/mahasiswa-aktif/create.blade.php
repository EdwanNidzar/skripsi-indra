<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Pengajuan Surat Mahasiswa Aktif') }}
    </x-slot>

    <div class="p-2 bg-white rounded-lg shadow-xs">
        <form action="{{ route('mahasiswa-aktif.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-1">

                <div>
                    <label for="tujuan_surat" class="block text-sm font-semibold text-gray-700">Tujuan Surat</label>
                    <textarea name="tujuan_surat" id="tujuan_surat" cols="30"
                        rows="3"class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Tujuan Surat"></textarea>

                    @error('tujuan_surat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="surat_pendamping" class="block text-sm font-semibold text-gray-700">Lampiran</label>
                    <input type="file" name="surat_pendamping" id="surat_pendamping"
                        class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                    @error('surat_pendamping')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="flex space-x-2 justify-end mt-4">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
                    Simpan
                </button>
                <a href="{{ route('mahasiswa-aktif.index') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

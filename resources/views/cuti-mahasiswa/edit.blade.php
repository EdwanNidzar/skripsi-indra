<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Data Pengajuan Cuti Mahasiswa') }}
    </x-slot>

    <div class="p-2 bg-white rounded-lg shadow-xs">
        <form action="{{ route('cuti-mahasiswa.update', $cutiMahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-2">

                {{--  Nomor Surat --}}
                <div class="sm:col-span-2">
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-700">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat"
                        class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100"
                        value="{{ $cutiMahasiswa->nomor_surat }}" readonly>
                </div>

                {{-- alasan_cuti --}}
                <div class="sm:col-span-2">
                    <label for="alasan_cuti" class="block text-sm font-semibold text-gray-700">Alasan Cuti</label>
                    <textarea name="alasan_cuti" id="alasan_cuti" rows="4"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('alasan_cuti', $cutiMahasiswa->alasan_cuti) }}</textarea>
                    @error('alasan_cuti')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Mulai --}}
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $cutiMahasiswa->tanggal_mulai) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('tanggal_mulai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Selesai --}}
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $cutiMahasiswa->tanggal_selesai) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
                <a href="{{ route('cuti-mahasiswa.index') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

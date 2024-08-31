<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Data Pengajuan Peminjaman Aula') }}
    </x-slot>

    <div class="p-2 bg-white rounded-lg shadow-xs">
        <form action="{{ route('peminjaman-aula.update', $peminjaman_aula->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-2">

                {{--  Nomor Surat --}}
                <div class="sm:col-span-2">
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-700">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat"
                        class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100"
                        value="{{ $peminjaman_aula->nomor_surat }}" readonly>
                </div>

                {{-- Tanggal Mulai --}}
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $peminjaman_aula->tanggal_mulai) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                    @error('tanggal_mulai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Selesai --}}
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $peminjaman_aula->tanggal_selesai) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                    @error('tanggal_selesai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Penanggung Jawab --}}
                <div>
                    <label for="nama_penanggung_jawab" class="block text-sm font-semibold text-gray-700">Nama Penanggung
                        Jawab</label>
                    <input type="text" name="nama_penanggung_jawab" id="nama_penanggung_jawab"
                        value="{{ old('nama_penanggung_jawab', $peminjaman_aula->nama_pj) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                    @error('nama_penanggung_jawab')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Organisasi --}}
                <div>
                    <label for="organisasi" class="block text-sm font-semibold text-gray-700">Organisasi</label>
                    <input type="text" name="organisasi" id="organisasi"
                        value="{{ old('organisasi', $peminjaman_aula->organisasi) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                    @error('organisasi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jabatan --}}
                <div>
                    <label for="jabatan" class="block text-sm font-semibold text-gray-700">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan"
                        value="{{ old('jabatan', $peminjaman_aula->jabatan) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                    @error('jabatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Prodi --}}
                <div>
                    <label for="prodi" class="block text-sm font-semibold text-gray-700">Program Studi</label>
                    <input type="text" name="prodi" id="prodi"
                        value="{{ old('prodi', $peminjaman_aula->prodi) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                    @error('prodi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No HP --}}
                <div>
                    <label for="no_hp" class="block text-sm font-semibold text-gray-700">No HP</label>
                    <input type="text" name="no_hp" id="no_hp"
                        value="{{ old('no_hp', $peminjaman_aula->no_hp) }}"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                    @error('no_hp')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Keperluan --}}
                <div>
                    <label for="keperluan" class="block text-sm font-semibold text-gray-700">Keperluan</label>
                    <textarea name="keperluan" id="keperluan" rows="4"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>{{ old('keperluan', $peminjaman_aula->keperluan) }}</textarea>
                    @error('keperluan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex space-x-2 justify-end mt-4">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
                    Update
                </button>
                <a href="{{ route('peminjaman-aula.index') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

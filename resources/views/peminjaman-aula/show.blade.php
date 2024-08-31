<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Pengajuan Peminjaman Aula') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

            {{-- nomor surat --}}
            <div>
                <label for="nomor_surat" class="block text-sm font-semibold text-gray-700">Nomor Surat</label>
                <p class="mt-1 text-sm text-gray-900">{{ $peminjaman_aula->nomor_surat }}</p>
            </div>
            {{-- Tanggal Mulai --}}
            <div>
                <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
                <p class="mt-1 text-sm text-gray-900">
                    {{ \Carbon\Carbon::parse($peminjaman_aula->tanggal_mulai)->format('d M Y') }}
                </p>
            </div>

            {{-- Tanggal Selesai --}}
            <div>
                <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                <p class="mt-1 text-sm text-gray-900">
                    {{ \Carbon\Carbon::parse($peminjaman_aula->tanggal_selesai)->format('d M Y') }}
                </p>
            </div>

            {{-- Nama Penanggung Jawab --}}
            <div>
                <label for="nama_penanggung_jawab" class="block text-sm font-semibold text-gray-700">Nama Penanggung
                    Jawab</label>
                <p class="mt-1 text-sm text-gray-900">{{ $peminjaman_aula->nama_pj }}</p>
            </div>

            {{-- Organisasi --}}
            <div>
                <label for="organisasi" class="block text-sm font-semibold text-gray-700">Organisasi</label>
                <p class="mt-1 text-sm text-gray-900">{{ $peminjaman_aula->organisasi }}</p>
            </div>

            {{-- Jabatan --}}
            <div>
                <label for="jabatan" class="block text-sm font-semibold text-gray-700">Jabatan</label>
                <p class="mt-1 text-sm text-gray-900">{{ $peminjaman_aula->jabatan }}</p>
            </div>

            {{-- Prodi --}}
            <div>
                <label for="prodi" class="block text-sm font-semibold text-gray-700">Program Studi</label>
                <p class="mt-1 text-sm text-gray-900">{{ $peminjaman_aula->prodi }}</p>
            </div>

            {{-- No HP --}}
            <div>
                <label for="no_hp" class="block text-sm font-semibold text-gray-700">No HP</label>
                <p class="mt-1 text-sm text-gray-900">{{ $peminjaman_aula->no_hp }}</p>
            </div>

            {{-- Keperluan --}}
            <div>
                <label for="keperluan" class="block text-sm font-semibold text-gray-700">Keperluan</label>
                <p class="mt-1 text-sm text-gray-900">{{ $peminjaman_aula->keperluan }}</p>
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700">Status</label>
                <p class="mt-1 text-sm text-gray-900">
                    @if ($peminjaman_aula->status == 'pending')
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                            Pending
                        </span>
                    @elseif ($peminjaman_aula->status == 'approved')
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                            Accepted
                        </span>
                    @elseif ($peminjaman_aula->status == 'rejected')
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                            Rejected
                        </span>
                    @endif
                </p>
            </div>

        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('peminjaman-aula.index') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                Kembali
            </a>
        </div>
    </div>
</x-app-layout>

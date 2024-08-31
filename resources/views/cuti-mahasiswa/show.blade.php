<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Pengajuan Cuti Mahasiswa') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

            {{-- Nomor Surat --}}
            <div>
                <label for="nomor_surat" class="block text-sm font-semibold text-gray-700">Nomor Surat</label>
                <p class="mt-1 text-sm text-gray-900">{{ $cutiMahasiswa->nomor_surat }}</p>
            </div>

            {{-- Alasan Cuti --}}
            <div>
                <label for="alasan_cuti" class="block text-sm font-semibold text-gray-700">Alasan Cuti</label>
                <p class="mt-1 text-sm text-gray-900">{{ $cutiMahasiswa->alasan_cuti }}</p>
            </div>

            {{-- Tanggal Mulai --}}
            <div>
                <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
                <p class="mt-1 text-sm text-gray-900">
                    {{ \Carbon\Carbon::parse($cutiMahasiswa->tanggal_mulai)->format('d M Y') }}
                </p>
            </div>

            {{-- Tanggal Selesai --}}
            <div>
                <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                <p class="mt-1 text-sm text-gray-900">
                    {{ \Carbon\Carbon::parse($cutiMahasiswa->tanggal_selesai)->format('d M Y') }}
                </p>
            </div>

            {{-- jumlah hari --}}
            <div>
                <label for="jumlah_hari" class="block text-sm font-semibold text-gray-700">Jumlah Hari</label>
                <p class="mt-1 text-sm text-gray-900">{{ $cutiMahasiswa->jumlah_hari }} Hari</p>
            </div>

            {{-- status --}}
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700">Status</label>
                <p class="mt-1 text-sm text-gray-900">
                    @if ($cutiMahasiswa->status == 'pending')
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                            Pending
                        </span>
                    @elseif ($cutiMahasiswa->status == 'approved')
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                            Accepted
                        </span>
                    @elseif ($cutiMahasiswa->status == 'rejected')
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                            Rejected
                        </span>
                    @endif
                </p>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('cuti-mahasiswa.index') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                Kembali
            </a>
        </div>
    </div>
</x-app-layout>

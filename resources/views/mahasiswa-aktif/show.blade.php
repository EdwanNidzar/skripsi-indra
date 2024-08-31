<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Surat Mahasiswa Aktif') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('mahasiswa-aktif.update', $mahasiswaAktif->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                <div>
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-700">Nomor Surat</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $mahasiswaAktif->nomor_surat }}</p>
                </div>

                <div>
                    <label for="tujuan_surat" class="block text-sm font-semibold text-gray-700">Tujuan Surat</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $mahasiswaAktif->tujuan_surat }}</p>
                </div>

                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700">Status</label>
                    <p class="mt-1 text-sm text-gray-900">
                        @if ($mahasiswaAktif->status == 'pending')
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                Pending
                            </span>
                        @elseif ($mahasiswaAktif->status == 'approve')
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                Accepted
                            </span>
                        @elseif ($mahasiswaAktif->status == 'reject')
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                Rejected
                            </span>
                        @endif
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Lampiran</label>
                    @if ($mahasiswaAktif->file_surat)
                        <p class="mt-1 text-sm text-gray-900">
                            <a href="{{ asset('storage/surat_pendamping/' . $mahasiswaAktif->file_surat) }}"
                                target="_blank" class="text-blue-500 hover:underline">Lihat Lampiran</a>
                        </p>
                    @else
                        <p class="mt-1 text-sm text-gray-900">Tidak ada lampiran</p>
                    @endif
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('mahasiswa-aktif.index') }}"
                    class="px-4 py-2 ml-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

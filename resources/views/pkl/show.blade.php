<x-app-layout>
  <x-slot name="header">
    {{ __('Detail Pengajuan PKL') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
      {{-- Nomor Surat --}}
      <div class="sm:col-span-1">
        <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
        <p class="mt-1 text-sm text-gray-900">{{ $pkl->nomor_surat }}</p>
      </div>

      {{-- Nama PKL --}}
      <div class="sm:col-span-1">
        <label for="tempat_pkl" class="block text-sm font-medium text-gray-700">Tempat PKL</label>
        <p class="mt-1 text-sm text-gray-900">{{ $pkl->tempat_pkl }}</p>
      </div>

      {{-- Lama PKL --}}
      <div class="sm:col-span-1">
        <label for="lama_pkl" class="block text-sm font-medium text-gray-700">Lama PKL</label>
        <p class="mt-1 text-sm text-gray-900">{{ $pkl->lama_pkl }}</p>
      </div>

      {{-- Tanggal Mulai --}}
      <div class="sm:col-span-1">
        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
        <p class="mt-1 text-sm text-gray-900">{{ $pkl->tanggal_mulai }}</p>
      </div>

      {{-- Tanggal Selesai --}}
      <div class="sm:col-span-1">
        <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
        <p class="mt-1 text-sm text-gray-900">{{ $pkl->tanggal_selesai }}</p>
      </div>

      {{-- Bukti Pembayaran --}}
      <div class="sm:col-span-1">
        <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700">Bukti Pembayaran</label>
        @if ($pkl->bukti_pembayaran)
          <p class="mt-1 text-sm text-gray-900">
            <a href="{{ asset('storage/pkl/bukti_pembayaran/' . $pkl->bukti_pembayaran) }}" target="_blank"
              class="text-blue-500 hover:underline">Lihat Bukti Pembayaran</a>
          </p>
        @else
          <p class="mt-1 text-sm text-gray-900">Tidak ada bukti pembayaran</p>
        @endif
      </div>

      {{-- Surat Pernyataan --}}
      <div class="sm:col-span-1">
        <label for="surat_pernyataan" class="block text-sm font-medium text-gray-700">Surat Pernyataan</label>
        @if ($pkl->surat_pernyataan)
          <p class="mt-1 text-sm text-gray-900">
            <a href="{{ asset('storage/pkl/surat_pernyataan/' . $pkl->surat_pernyataan) }}" target="_blank"
              class="text-blue-500 hover:underline">Lihat Surat Pernyataan</a>
          </p>
        @else
          <p class="mt-1 text-sm text-gray-900">Tidak ada surat pernyataan</p>
        @endif
      </div>
    </div>

    <div class="flex justify-end mt-4">
      <a href="{{ route('pkl.index') }}"
        class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
        Kembali
      </a>
    </div>
  </div>
</x-app-layout>

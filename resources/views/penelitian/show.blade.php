<x-app-layout>
  <x-slot name="header">
    {{ __('Detail Pengajuan Penelitian') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

      {{-- Nomor Surat --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Nomor Surat</label>
        <p class="mt-1 text-sm text-gray-900">{{ $penelitian->nomor_surat }}</p>
      </div>

      {{-- Nama mahasiswa --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
        <p class="mt-1 text-sm text-gray-900">{{ $penelitian->mahasiswa->name }}</p>
      </div>

      {{-- Tempat Penelitian --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Tempat Penelitian</label>
        <p class="mt-1 text-sm text-gray-900">{{ $penelitian->tempat_penelitian }}</p>
      </div>

      {{-- Judul Penelitian --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Judul Penelitian</label>
        <p class="mt-1 text-sm text-gray-900">{{ $penelitian->judul }}</p>
      </div>

      {{-- Tanggal Mulai --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
        <p class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($penelitian->tanggal_mulai)->format('d M Y') }}
        </p>
      </div>

      {{-- Tanggal Selesai --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
        <p class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($penelitian->tanggal_selesai)->format('d M Y') }}
        </p>
      </div>

      {{-- Status --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <p class="mt-1 text-sm text-gray-900">{{ $penelitian->status }}</p>
      </div>

      {{-- Verifikator --}}
      <div class="sm:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Verifikator</label>
        <p class="mt-1 text-sm text-gray-900">{{ $penelitian->verifier ? $penelitian->verifier->name : 'BELUM DISETUJUI' }}</p>
      </div>

    </div>

    <div class="flex justify-end mt-6">
      <a href="{{ route('penelitian.edit', $penelitian->id) }}"
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
        Edit
      </a>
      <a href="{{ route('penelitian.index') }}"
        class="px-4 py-2 ml-4 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
        Kembali
      </a>
    </div>
  </div>
</x-app-layout>

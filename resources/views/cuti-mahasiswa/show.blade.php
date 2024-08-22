<x-app-layout>
  <x-slot name="header">
    {{ __('Detail Pengajuan Cuti Mahasiswa') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

      {{-- Nomor Surat --}}
      <div class="sm:col-span-2">
        <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
        <p id="nomor_surat" class="mt-1 p-2">
          {{ $cutiMahasiswa->nomor_surat }}
        </p>
      </div>

      {{-- Alasan Cuti --}}
      <div class="sm:col-span-2">
        <label for="alasan_cuti" class="block text-sm font-medium text-gray-700">Alasan Cuti</label>
        <p id="alasan_cuti" class="mt-1 p-2">
          {{ $cutiMahasiswa->alasan_cuti }}
        </p>
      </div>

      {{-- Tanggal Mulai --}}
      <div>
        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
        <p id="tanggal_mulai" class="mt-1 p-2">
          {{ $cutiMahasiswa->tanggal_mulai }}
        </p>
      </div>

      {{-- Tanggal Selesai --}}
      <div>
        <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
        <p id="tanggal_selesai" class="mt-1 p-2">
          {{ $cutiMahasiswa->tanggal_selesai }}
        </p>
      </div>

      {{-- jumlah hari --}}
      <div class="sm:col-span-2">
        <label for="jumlah_hari" class="block text-sm font-medium text-gray-700">Jumlah Hari</label>
        <p id="jumlah_hari" class="mt-1 p-2">
          {{ $cutiMahasiswa->jumlah_hari }} Hari
        </p>
      </div>

      {{-- status --}}
      <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <p id="status" class="mt-1 p-2">
          {{ $cutiMahasiswa->status }}
        </p>
      </div>

      {{-- verifikator --}}
      <div>
        <label for="verifikator" class="block text-sm font-medium text-gray-700">Verifikator</label>
        <p id="verifikator" class="mt-1 p-2">
          {{ $cutiMahasiswa->verifier ? $cutiMahasiswa->verifier->name : 'BELUM DISETUJUI' }}
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

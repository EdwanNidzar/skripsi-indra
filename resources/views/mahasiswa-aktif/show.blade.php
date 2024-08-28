<x-app-layout>
  <x-slot name="header">
    {{ __('Detail Surat Mahasiswa Aktif') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <form action="{{ route('mahasiswa-aktif.update', $mahasiswaAktif->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">

        <div>
          <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
          <input type="text" name="nomor_surat" id="nomor_surat"
            class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100"
            value="{{ $mahasiswaAktif->nomor_surat }}" readonly>
        </div>

        <div>
          <label for="tujuan_surat" class="block text-sm font-medium text-gray-700">Tujuan Surat</label>
          <textarea name="tujuan_surat" id="tujuan_surat" cols="30" rows="10" readonly
            class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $mahasiswaAktif->tujuan_surat }}</textarea>
          @error('tujuan_surat')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
          <input type="text" name="status" id="status" readonly
            class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ $mahasiswaAktif->status }}">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Surat Pendamping</label>
          @if ($mahasiswaAktif->file_surat)
            <iframe src="{{ asset('storage/surat_pendamping/' . $mahasiswaAktif->file_surat) }}" width="100%"
              height="600px" frameborder="0"></iframe>
          @else
            <p class="text-sm text-gray-500">Tidak ada surat pendamping yang diunggah.</p>
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

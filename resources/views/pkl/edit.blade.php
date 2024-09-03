<x-app-layout>
  <x-slot name="header">
    {{ __('Edit Data Pengajuan PKL') }}
  </x-slot>

  <div class="p-2 bg-white rounded-lg shadow-xs">
    <form action="{{ route('pkl.update', $pkl->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-2">

        {{--  Nomor Surat --}}
        <div class="sm:col-span-2">
          <label for="nomor_surat" class="block text-sm font-semibold text-gray-700">Nomor Surat</label>
          <input type="text" name="nomor_surat" id="nomor_surat"
            class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100"
            value="{{ $pkl->nomor_surat }}" readonly>
        </div>

        {{-- Tempat PKL --}}
        <div class="sm:col-span-1">
          <label for="tempat_pkl" class="block text-sm font-semibold text-gray-700">Tempat PKL</label>
          <input type="text" name="tempat_pkl" id="tempat_pkl"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            placeholder="Tempat PKL" value="{{ old('tempat_pkl', $pkl->tempat_pkl) }}">
          @error('tempat_pkl')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Lama PKL --}}
        <div class="sm:col-span-1">
          <label for="lama_pkl" class="block text-sm font-semibold text-gray-700">Lama PKL</label>
          <select name="lama_pkl" id="lama_pkl"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="2 bulan" {{ old('lama_pkl', $pkl->lama_pkl) == '2 bulan' ? 'selected' : '' }}>2 Bulan
            </option>
            <option value="3 bulan" {{ old('lama_pkl', $pkl->lama_pkl) == '3 bulan' ? 'selected' : '' }}>3 Bulan
            </option>
          </select>
          @error('lama_pkl')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Tanggal Mulai --}}
        <div class="sm:col-span-1">
          <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ old('tanggal_mulai', $pkl->tanggal_mulai) }}">
          @error('tanggal_mulai')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Upload Bukti Transfer --}}
        <div class="sm:col-span-1">
          <label for="bukti_pembayaran" class="block text-sm font-semibold text-gray-700">Upload Bukti Transfer
            (JPEG/PNG/JPG)</label>
          <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @error('bukti_pembayaran')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
          @if ($pkl->bukti_pembayaran)
            <p class="mt-2 text-sm text-gray-500">Bukti saat ini : <a
                href="{{ asset('storage/pkl/bukti_pembayaran/' . $pkl->bukti_pembayaran) }}" target="_blank"
                class="text-blue-500 hover:underline">Lihat Bukti Pembayaran</a></p>
          @endif
        </div>

        {{-- Upload Surat Pernyataan --}}
        <div class="sm:col-span-1">
          <label for="surat_pernyataan" class="block text-sm font-semibold text-gray-700">Upload Surat
            Pernyataan
            (PDF)</label>
          <input type="file" name="surat_pernyataan" id="surat_pernyataan"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @error('surat_pernyataan')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
          @if ($pkl->surat_pernyataan)
            <p class="mt-2 text-sm text-gray-500">Surat saat ini : <a
                href="{{ asset('storage/pkl/surat_pernyataan/' . $pkl->surat_pernyataan) }}" target="_blank"
                class="text-blue-500 hover:underline">Lihat Surat Pernyataan</a></p>
          @endif
        </div>

      </div>

      <div class="flex space-x-2 justify-end mt-4">
        <button type="submit"
          class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
          Update
        </button>
        <a href="{{ route('pkl.index') }}"
          class="px-4 py-2 ml-4 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
          Kembali
        </a>
      </div>
    </form>
  </div>
</x-app-layout>

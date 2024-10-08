<x-app-layout>
  <x-slot name="header">
    {{ __('Tambah Pengajuan PKL') }}
  </x-slot>

  <div class="p-2 bg-white rounded-lg shadow-xs">
    <form action="{{ route('pkl.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      {{-- Nama PKL --}}
      <div class="sm:col-span-1">
        <label for="tempat_pkl" class="block text-sm font-semibold text-gray-700">Tempat PKL</label>
        <textarea name="tempat_pkl" id="tempat_pkl" rows="3"
          class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          placeholder="Tempat PKL"></textarea>
        @error('tempat_pkl')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Lama PKL --}}
      <div class="sm:col-span-1 mt-2">
        <label for="lama_pkl" class="block text-sm font-semibold text-gray-700">Lama PKL</label>
        <select name="lama_pkl" id="lama_pkl"
          class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          onchange="updateTanggalSelesai()">
          <option value="">Pilih Lama PKL</option>
          <option value="2 bulan">2 Bulan</option>
          <option value="3 bulan">3 Bulan</option>
        </select>
        @error('lama_pkl')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-2">

        {{-- Tanggal Mulai --}}
        <div class="sm:col-span-1">
          <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            onchange="updateTanggalSelesai()">
          @error('tanggal_mulai')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Tanggal Selesai --}}
        <div class="sm:col-span-1">
          <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" id="tanggal_selesai"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            readonly>
          @error('tanggal_selesai')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Upload Bukti Transfer --}}
        <div class="sm:col-span-1">
          <label for="bukti_pembayaran" class="block text-sm font-semibold text-gray-700">Upload Bukti
            Transfer
            (JPEG/PNG/JPG)</label>
          <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @error('bukti_pembayaran')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Upload Surat Pernyataan --}}
        <div class="sm:col-span-1">
          <label for="surat_pernyataan" class="block text-sm font-semibold text-gray-700">Upload Surat
            Pernyataan
            (PDF)</label>
          <input type="file" name="surat_pernyataan" id="surat_pernyataan"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('surat_pernyataan')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex space-x-2 justify-end mt-4">
        <button type="submit"
          class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
          Simpan
        </button>
        <a href="{{ route('pkl.index') }}"
          class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
          Kembali
        </a>
      </div>
    </form>
  </div>

  <script>
    function updateTanggalSelesai() {
      const lamaPKL = document.getElementById('lama_pkl').value;
      const tanggalMulai = document.getElementById('tanggal_mulai').value;

      if (lamaPKL && tanggalMulai) {
        let tanggalSelesai = new Date(tanggalMulai);

        if (lamaPKL === '2 bulan') {
          tanggalSelesai.setMonth(tanggalSelesai.getMonth() + 2);
        } else if (lamaPKL === '3 bulan') {
          tanggalSelesai.setMonth(tanggalSelesai.getMonth() + 3);
        }

        const formattedDate = tanggalSelesai.toISOString().split('T')[0];
        document.getElementById('tanggal_selesai').value = formattedDate;
      }
    }
  </script>
</x-app-layout>

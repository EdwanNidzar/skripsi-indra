<x-app-layout>
  <x-slot name="header">
    {{ __('Tambah Pengajuan Izin Penelitian') }}
  </x-slot>

  <div class="p-2 bg-white rounded-lg shadow-xs">
    <form action="{{ route('penelitian.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      {{-- Tempat Penelitian --}}
      <div class="sm:col-span-1">
        <label for="tempat_penelitian" class="block text-sm font-semibold text-gray-700">Tempat Penelitian</label>
        <textarea name="tempat_penelitian" id="tempat_penelitian" rows="3"
          class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          placeholder="Tempat Penelitian">{{ old('tempat_penelitian') }}</textarea>
        @error('tempat_penelitian')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Judul Penelitian --}}
      <div class="sm:col-span-1 mt-2">
        <label for="judul" class="block text-sm font-semibold text-gray-700">Judul Penelitian</label>
        <input type="text" name="judul" id="judul"
          class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          placeholder="Judul Penelitian" value="{{ old('judul') }}">
        @error('judul')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3">
        {{-- Lama Penelitian --}}
        <div class="sm:col-span-1">
          <label for="lama_penelitian" class="block text-sm font-semibold text-gray-700">Lama Penelitian</label>
          <select name="lama_penelitian" id="lama_penelitian"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            onchange="updateTanggalSelesai()">
            <option value="">Pilih Lama Penelitian</option>
            <option value="2 bulan" {{ old('lama_penelitian') == '2 bulan' ? 'selected' : '' }}>2 Bulan</option>
            <option value="3 bulan" {{ old('lama_penelitian') == '3 bulan' ? 'selected' : '' }}>3 Bulan</option>
            <option value="4 bulan" {{ old('lama_penelitian') == '4 bulan' ? 'selected' : '' }}>4 Bulan</option>
            <option value="5 bulan" {{ old('lama_penelitian') == '5 bulan' ? 'selected' : '' }}>5 Bulan</option>
            <option value="6 bulan" {{ old('lama_penelitian') == '6 bulan' ? 'selected' : '' }}>6 Bulan</option>
          </select>
          @error('lama_penelitian')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Tanggal Mulai --}}
        <div class="sm:col-span-1">
          <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700">Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ old('tanggal_mulai') }}">
          @error('tanggal_mulai')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Tanggal Selesai --}}
        <div class="sm:col-span-1">
          <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" id="tanggal_selesai"
            class="block w-full px-3 py-2 mt-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ old('tanggal_selesai') }}">
          @error('tanggal_selesai')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="flex space-x-2 justify-end mt-4">
        <button type="submit"
          class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue">
          Simpan
        </button>
        <a href="{{ route('penelitian.index') }}"
          class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
          Kembali
        </a>
      </div>
    </form>
  </div>

  <script>
    function updateTanggalSelesai() {
      const lamaPenelitian = document.getElementById('lama_penelitian').value;
      const tanggalMulai = document.getElementById('tanggal_mulai').value;
      const tanggalSelesaiInput = document.getElementById('tanggal_selesai');

      if (lamaPenelitian && tanggalMulai) {
        const date = new Date(tanggalMulai);
        let monthsToAdd = 0;

        switch (lamaPenelitian) {
          case '2 bulan':
            monthsToAdd = 2;
            break;
          case '3 bulan':
            monthsToAdd = 3;
            break;
          case '4 bulan':
            monthsToAdd = 4;
            break;
          case '5 bulan':
            monthsToAdd = 5;
            break;
          case '6 bulan':
            monthsToAdd = 6;
            break;
        }

        // Ensure the date is valid
        if (!isNaN(date.getTime())) {
          date.setMonth(date.getMonth() + monthsToAdd);
          tanggalSelesaiInput.value = date.toISOString().split('T')[0];
        } else {
          tanggalSelesaiInput.value = '';
        }
      } else {
        tanggalSelesaiInput.value = '';
      }
    }
  </script>
</x-app-layout>

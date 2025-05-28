<div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-cyan-50 min-h-screen py-8">
  <div class="max-w-4xl mx-auto px-4">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-t-xl shadow-lg p-6 text-white">
      <div class="flex items-center space-x-4">
        <div class="p-3 bg-white/20 rounded-lg">
          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <div>
          <h2 class="text-2xl font-bold">Tambah Laporan PKL</h2>
          <p class="text-blue-100 text-sm mt-1">Lengkapi form di bawah untuk membuat laporan baru</p>
        </div>
      </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-b-xl shadow-lg border-t-4 border-blue-500">
      <div class="p-8">
        <form wire:submit.prevent="create" class="space-y-6">

          <!-- Nama Siswa -->
          <div>
            <label for="siswa_id" class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
              Nama Siswa
            </label>
            <div class="relative">
              <select wire:model="siswa_id" disabled id="siswa_id" name="siswa_id"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-blue-200 rounded-xl bg-blue-50
                       focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-200
                       disabled:bg-gray-100 disabled:border-gray-200 disabled:text-gray-500"
                required>
                <option value="">-- Pilih Nama Siswa --</option>
                <option value="{{ $siswa_id }}" selected>{{ $nama_siswa }}</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </div>
            <p class="text-xs text-blue-600 mt-1 flex items-center">
              <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                  clip-rule="evenodd" />
              </svg>
              Siswa sudah ditentukan berdasarkan login
            </p>
          </div>

          <!-- Nama Industri -->
          <div>
            <label for="industri_id" class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
              Nama Industri
            </label>
            <div class="relative">
              <select wire:model="industri_id" id="industri_id" name="industri_id"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-gray-200 rounded-xl bg-white
                       focus:ring-4 focus:ring-indigo-100 focus:border-indigo-400 transition-all duration-200
                       hover:border-indigo-300"
                required>
                <option value="">-- Pilih Industri --</option>
                @foreach ($industris as $industri)
                  <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                @endforeach
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </div>
            @error('industri_id')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Guru Pembimbing -->
          <div>
            <label for="guru_id" class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-cyan-500 rounded-full mr-2"></div>
              Guru Pembimbing
            </label>
            <div class="relative">
              <select wire:model="guru_id" id="guru_id" name="guru_id"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-gray-200 rounded-xl bg-white
                       focus:ring-4 focus:ring-cyan-100 focus:border-cyan-400 transition-all duration-200
                       hover:border-cyan-300"
                required>
                <option value="">-- Pilih Guru Pembimbing --</option>
                @foreach ($gurus as $guru)
                  <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </div>
            @error('guru_id')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Tanggal Mulai & Selesai -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="mulai" class="flex items-center mb-2 text-sm font-semibold text-gray-700">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                Tanggal Mulai
              </label>
              <div class="relative">
                <input type="date" wire:model="mulai" id="mulai" name="mulai"
                  class="w-full p-3 pl-4 pr-10 text-sm border-2 border-gray-200 rounded-xl bg-white
                         focus:ring-4 focus:ring-green-100 focus:border-green-400 transition-all duration-200
                         hover:border-green-300"
                  required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
              </div>
              @error('mulai')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="selesai" class="flex items-center mb-2 text-sm font-semibold text-gray-700">
                <div class="w-2 h-2 bg-red-500 rounded-full mr-2"></div>
                Tanggal Selesai
              </label>
              <div class="relative">
                <input type="date" wire:model="selesai" id="selesai" name="selesai"
                  class="w-full p-3 pl-4 pr-10 text-sm border-2 border-gray-200 rounded-xl bg-white
                         focus:ring-4 focus:ring-red-100 focus:border-red-400 transition-all duration-200
                         hover:border-red-300"
                  required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
              </div>
              @error('selesai')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <!-- Buttons -->
          <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
            <a href="{{ route('pkl') }}"
            class="flex-1 px-6 py-3 text-sm font-medium text-gray-700 bg-white border-2 border-gray-300 
                    rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:ring-4 focus:ring-gray-100 
                    flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>Batal</span>
            </a>

            <button type="submit"
              class="flex-1 px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-blue-600 to-blue-700 
                     rounded-xl hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:ring-blue-200 
                     shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 
                     flex items-center justify-center space-x-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7" />
              </svg>
              <span>Simpan</span>
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
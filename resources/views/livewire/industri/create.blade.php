<div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-cyan-50 min-h-screen py-8">
  <div class="max-w-4xl mx-auto px-4">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-t-xl shadow-lg p-6 text-white">
      <div class="flex items-center space-x-4">
        <div class="p-3 bg-white/20 rounded-lg">
          <svg class="w-6 h-6 text-white-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
        </div>
        <div>
          <h2 class="text-2xl font-bold">Tambah Industri PKL</h2>
          <p class="text-blue-100 text-sm mt-1">Lengkapi form di bawah untuk membuat tempat PKL</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-b-xl shadow-lg border-t-4 border-blue-500">
      <div class="p-8">
        <form wire:submit.prevent="create" class="space-y-6">

        <!-- nama industri -->
        <div>
            <label class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
              Nama Industri
            </label>
            <input type="text" wire:model="nama"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-blue-200 rounded-xl bg-blue-50
                       focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-200
                       disabled:bg-gray-100 disabled:border-gray-200 disabled:text-gray-500">
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- nama industri -->
        <div>
            <label class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
              Bidang Usaha
            </label>
            <input type="text" wire:model="bidang_usaha"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-blue-200 rounded-xl bg-blue-50
                       focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-200
                       disabled:bg-gray-100 disabled:border-gray-200 disabled:text-gray-500">
            @error('bidang_usaha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- website -->
        <div>
            <label class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
              Website
            </label>
            <input type="url" wire:model="website"
                placeholder="ex. https://industri.com"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-blue-200 rounded-xl bg-blue-50
                       focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-200
                       disabled:bg-gray-100 disabled:border-gray-200 disabled:text-gray-500">
            @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- alamat -->
        <div>
            <label class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
              Alamat
            </label>
            <textarea wire:model="alamat"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-blue-200 rounded-xl bg-blue-50
                       focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-200
                       disabled:bg-gray-100 disabled:border-gray-200 disabled:text-gray-500"
                rows="3"></textarea>
            @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- kontak -->
        <div>
            <label class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
              Kontak
            </label>
            <input type="text" wire:model="kontak"
                placeholder="ex. 081234567890"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-blue-200 rounded-xl bg-blue-50
                       focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-200
                       disabled:bg-gray-100 disabled:border-gray-200 disabled:text-gray-500">
            @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- email -->
        <div>
            <label class="flex items-center mb-2 text-sm font-semibold text-gray-700">
              <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
              Email
            </label>
            <input type="email" wire:model="email"
                class="w-full p-3 pl-4 pr-10 text-sm border-2 border-blue-200 rounded-xl bg-blue-50
                       focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-200
                       disabled:bg-gray-100 disabled:border-gray-200 disabled:text-gray-500">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Buttons -->
          <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
            <a href="{{ route('industri') }}"
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
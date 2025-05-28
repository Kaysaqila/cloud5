    <div class="px-8 py-6 bg-blue-50">
        <!-- Header Controls -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
            <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center justify-between">
                <!-- Sorting Controls -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="flex flex-col">
                        <label for="sortAbjad" class="text-sm font-medium text-gray-700 mb-1">Urutkan Nama</label>
                        <select id="sortAbjad" wire:model.live="selected_abjad"
                            class="block w-48 p-2 text-sm border border-blue-300 rounded-lg bg-white text-blue-900
                                focus:ring-2 focus:ring-blue-500 focus:border-blue-600 transition duration-150">
                            <option value="">Pilih Urutan</option>
                            <option value="Abjad : A-Z">A - Z</option>
                            <option value="Abjad : Z-A">Z - A</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="sortRombel" class="text-sm font-medium text-gray-700 mb-1">Filter Rombel</label>
                        <select id="sortRombel" wire:model.live="selected_rombel"
                            class="block w-48 p-2 text-sm border border-blue-300 rounded-lg bg-white text-blue-900
                                focus:ring-2 focus:ring-blue-500 focus:border-blue-600 transition duration-150">
                            <option value="">Semua Rombel</option>
                            <option value="SIJA A">SIJA A</option>
                            <option value="SIJA B">SIJA B</option>
                        </select>
                    </div>
                </div>

                <!-- Search Form -->
                <form class="flex items-center">
                    <label for="default-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search" wire:model.live="search"
                            class="block w-64 p-2 pl-10 text-sm border rounded-lg bg-blue-50 border-blue-300 placeholder-blue-500
                                focus:ring-2 focus:ring-blue-500 focus:border-blue-600 transition duration-150"
                            placeholder="Cari Data Siswa" />
                    </div>
                </form>
            </div>
        </div>

        <!-- Alert Messages -->
        @if($search && $siswas->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-md mb-4 border border-yellow-300">
                Data tidak ditemukan untuk pencarian "{{ $search }}"
            </div>
        @endif

        <!-- Students Table -->
        <div class="px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm">
                    <thead class="text-xs uppercase bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">No</th>
                            <th class="px-6 py-4 text-left font-semibold">Nama Lengkap</th>
                            <th class="px-6 py-4 text-left font-semibold">NIS</th>
                            <th class="px-6 py-4 text-left font-semibold">Jenis Kelamin</th>
                            <th class="px-6 py-4 text-left font-semibold">Rombel</th>
                            <th class="px-6 py-4 text-left font-semibold">No. Kontak</th>
                            <th class="px-6 py-4 text-left font-semibold">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $key => $siswa)
                            <tr class="border-b hover:bg-blue-50 transition-colors duration-150">
                                <td class="px-6 py-4 font-medium text-blue-900">{{ $key + 1 }}</td>
                                <td class="px-6 py-4">{{ $siswa->nama }}</td>
                                <td class="px-6 py-4">{{ $siswa->nis }}</td>
                                <td class="px-6 py-4">{{ $siswa->gender }}</td>
                                <td class="px-6 py-4">{{ $siswa->rombel }}</td>
                                <td class="px-6 py-4">{{ $siswa->kontak }}</td>
                                <td class="px-6 py-4">{{ $siswa->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">
                                    @if($search)
                                        Data tidak ditemukan
                                    @else
                                        Tidak ada data guru terdaftar
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="hidden">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data siswa</h3>
                <p class="mt-1 text-sm text-gray-500">Belum ada data siswa yang terdaftar dalam sistem.</p>
            </div>
        </div>
    </div>
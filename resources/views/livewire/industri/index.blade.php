<div class="px-8 bg-blue-50 min-h-screen text-gray-800">
    <!-- Header Aksi: Tambah & Cari -->
    <div class="flex justify-between items-center mb-6 pt-6">
        <!-- Tombol Tambah -->
        <a href="{{ route('industriCreate') }}" type="button"
           class="text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
            Tambahkan Data Industri
        </a>

        <!-- Form Search -->
        <form class="flex items-center">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="search" name="search" wire:model.live="search"
                       class="block w-64 p-2 ps-10 text-sm border rounded-lg bg-blue-50 border-blue-300 placeholder-blue-500 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Cari Data Industri"/>
            </div>
        </form>
    </div>

    <!-- Flash Message -->
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded-md mb-4 border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    @if($search && $industris->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-md mb-4 border border-yellow-300">
            Data tidak ditemukan untuk pencarian "{{ $search }}"
        </div>
    @endif

    <!-- Tabel Data Industri -->
    <div class="px-8">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-3 font-semibold">No</th>
                    <th class="px-6 py-3 font-semibold">Nama</th>
                    <th class="px-6 py-3 font-semibold">Bidang Usaha</th>
                    <th class="px-6 py-3 font-semibold">Alamat</th>
                    <th class="px-6 py-3 font-semibold">Kontak</th>
                    <th class="px-6 py-3 font-semibold">Email</th>
                    <th class="px-6 py-3 font-semibold">Website</th>
                    <!-- <th class="px-6 py-3 font-semibold">Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse ($industris as $key => $industri)
                    <tr class="bg-white border-b hover:bg-blue-50 transition-colors duration-150">
                        <td class="px-6 py-4">{{ $key + 1 }}</td>
                        <td class="px-6 py-4">{{ $industri->nama }}</td>
                        <td class="px-6 py-4">{{ $industri->bidang_usaha }}</td>
                        <td class="px-6 py-4">{{ $industri->alamat }}</td>
                        <td class="px-6 py-4">{{ $industri->kontak }}</td>
                        <td class="px-6 py-4">{{ $industri->email }}</td>
                        <td class="px-6 py-4">{{ $industri->website }}</td>
                        <!-- <td class="px-6 py-4">
                            <a href="{{ route('industriEdit', ['id' => $industri->id]) }}"
                               class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                                Edit
                            </a>
                        </td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">
                            Tidak ada data industri ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
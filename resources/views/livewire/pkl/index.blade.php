<div class="px-8 bg-blue-50 min-h-screen text-gray-800">
    <!-- Header: Tombol Tambah + Form Search -->
    <div class="flex justify-between items-center mb-6 pt-6">
        <!-- Tombol Tambah Data -->
        <a href="{{ route('pklCreate') }}" type="button"
            class="text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
            Tambahkan Data PKL
        </a>

        <!-- Form Search -->
        <form class="flex items-center">
            <label for="default-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-blue-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="search"
                    wire:model.live="search"
                    class="block w-64 p-2 ps-10 text-sm border rounded-lg bg-blue-50 border-blue-300 placeholder-blue-500 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari siswa PKL" />
            </div>
        </form>
    </div>

    <!-- Alerts -->
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded-md mb-4 border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    @if($search && $pkls->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-md mb-4 border border-yellow-300">
            Data tidak ditemukan untuk pencarian "{{ $search }}"
        </div>
    @endif

    <!-- Table PKL -->
    <div class="px-8">
    <div class="border border-blue-300 rounded-lg overflow-hidden shadow-lg bg-white">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-3 font-semibold">No</th>
                    <th class="px-6 py-3 font-semibold">NIS</th>
                    <th class="px-6 py-3 font-semibold">Nama</th>
                    <th class="px-6 py-3 font-semibold">Guru Pembimbing</th>
                    <th class="px-6 py-3 font-semibold">Industri</th>
                    <th class="px-6 py-3 font-semibold">Bidang Usaha</th>
                    <th class="px-6 py-3 font-semibold">Mulai</th>
                    <th class="px-6 py-3 font-semibold">Selesai</th>
                    <th class="px-6 py-3 font-semibold">Durasi</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pkls as $key => $pkl)
                    <tr class="border-b hover:bg-blue-50 transition-colors duration-150">
                        <td class="px-6 py-4 font-medium text-blue-900">{{ $key + 1 }}</td>
                        <td class="px-6 py-4">{{ $pkl->siswa->nis }}</td>
                        <td class="px-6 py-4">{{ $pkl->siswa->nama }}</td>
                        <td class="px-6 py-4">{{ $pkl->guru->nama }}</td>
                        <td class="px-6 py-4">{{ $pkl->industri->nama }}</td>
                        <td class="px-6 py-4">{{ $pkl->industri->bidang_usaha }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pkl->mulai)->format('d M Y') }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pkl->selesai)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays(\Carbon\Carbon::parse($pkl->selesai)) }} hari
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-x-2 justify-center">
                                <a href="{{ route('pklView', ['id' => $pkl->id ]) }}"
                                   class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-sm transition-colors duration-200">
                                    View
                                </a>
                                @php 
                                    $user = Auth::user();
                                @endphp
                                @if ($user && $user->email === $pkl->siswa->email)
                                    <a href="{{ route('pklEdit', ['id' => $pkl->id ]) }}"
                                       class="text-white bg-purple-600 hover:bg-purple-700 px-3 py-1 rounded text-sm transition-colors duration-200">
                                        Edit
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">
                            @if($search)
                                Data tidak ditemukan
                            @else
                                Tidak ada siswa terdaftar
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
</div>
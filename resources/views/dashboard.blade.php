<x-app-layout>
    <div class="bg-blue-50 mx-auto max-w-7xl px-4">
            <!-- Welcome Section -->
            <main class="p-6">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white rounded-full"></div>
                        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white rounded-full"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold mb-3">Selamat Datang, {{ Auth::user()->name }}!</h1>
                        <p class="text-blue-100 text-lg">Selamat datang di Sistem Monitoring PKL SMK Negeri 2 Depok</p>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Total Siswa Card -->
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-blue-500 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($totalSiswa) }}</h3>
                            </div>
                            <div class="p-4 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Industri Card -->
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-indigo-500 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Industri</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($totalIndustri) }}</h3>
                            </div>
                            <div class="p-4 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- PKL Aktif Card -->
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-cyan-500 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">PKL Aktif</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($totalPkl) }}</h3>
                            </div>
                            <div class="p-4 rounded-xl bg-gradient-to-br from-cyan-500 to-cyan-600 text-white shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <div class="w-1 h-6 bg-blue-500 rounded-full mr-3"></div>
                        Aksi Cepat
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('pklCreate') }}">
                            <div class="flex flex-col items-center p-4 rounded-lg border-2 border-blue-100 hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                                <div class="p-3 rounded-full bg-blue-100 group-hover:bg-blue-200 mb-2">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-700">Lapor PKL</span>
                            </div>
                        </a>

                        <a href="{{ route('industriCreate') }}">
                            <div class="flex flex-col items-center p-4 rounded-lg border-2 border-cyan-100 hover:border-cyan-300 hover:bg-cyan-50 transition-all duration-200 group">
                                <div class="p-3 rounded-full bg-cyan-100 group-hover:bg-cyan-200 mb-2">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-700">Tambah Industri</span>
                            </div>
                        </a>

                        <a href="{{ route('industri') }}">
                            <div class="flex flex-col items-center p-4 rounded-lg border-2 border-indigo-100 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-200 group">
                                <div class="p-3 rounded-full bg-indigo-100 group-hover:bg-indigo-200 mb-2">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-700">Daftar Industri</span>
                            </div>
                        </a>

                        <a href="{{ route('pkl') }}">
                            <div class="flex flex-col items-center p-4 rounded-lg border-2 border-cyan-100 hover:border-cyan-300 hover:bg-cyan-50 transition-all duration-200 group">
                                <div class="p-3 rounded-full bg-cyan-100 group-hover:bg-cyan-200 mb-2">
                                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V9a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-700">Laporan PKL</span>
                            </div>
                        </a>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>

</x-app-layout>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail PKL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
        }
        .card-shadow {
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.1);
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.15);
        }
        .icon-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        .title-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen">
    <div class="px-8 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold title-gradient mb-2">Detail PKL</h1>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-blue-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 mt-4">Informasi lengkap mengenai praktik kerja lapangan</p>
        </div>

        <div class="max-w-6xl mx-auto space-y-8">
            <!-- Data Siswa -->
            <div class="card-gradient rounded-2xl card-shadow card-hover transition-all duration-300 border border-blue-100">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="icon-bg w-12 h-12 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-blue-800">{{ $pkl->siswa->nama }}</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Nama</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->siswa->nama }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">NIS</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->siswa->nis }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Jenis Kelamin</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->siswa->gender }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Rombel</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->siswa->rombel }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400 md:col-span-2">
                            <div class="text-sm text-blue-600 font-medium mb-1">Alamat</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->siswa->alamat }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Kontak</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->siswa->kontak }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400 md:col-span-2">
                            <div class="text-sm text-blue-600 font-medium mb-1">Email</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->siswa->email }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guru Pembimbing -->
            <div class="card-gradient rounded-2xl card-shadow card-hover transition-all duration-300 border border-blue-100">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="icon-bg w-12 h-12 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-blue-800">Guru Pembimbing</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Nama</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->guru->nama }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">NIP</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->guru->nip }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Jenis Kelamin</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->guru->gender }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400 md:col-span-2">
                            <div class="text-sm text-blue-600 font-medium mb-1">Alamat</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->guru->alamat }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Kontak</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->guru->kontak }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400 md:col-span-2">
                            <div class="text-sm text-blue-600 font-medium mb-1">Email</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->guru->email }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Industri -->
            <div class="card-gradient rounded-2xl card-shadow card-hover transition-all duration-300 border border-blue-100">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="icon-bg w-12 h-12 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-blue-800">Data Industri</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Nama</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->industri->nama }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400 md:col-span-2">
                            <div class="text-sm text-blue-600 font-medium mb-1">Bidang Usaha</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->industri->bidang_usaha }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400 md:col-span-3">
                            <div class="text-sm text-blue-600 font-medium mb-1">Alamat</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->industri->alamat }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Kontak</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->industri->kontak }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Email</div>
                            <div class="text-gray-800 font-semibold">{{ $pkl->industri->email }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-l-4 border-blue-400">
                            <div class="text-sm text-blue-600 font-medium mb-1">Website</div>
                            <div class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                                <a href="{{ $pkl->industri->website }}" target="_blank" class="flex items-center">
                                    {{ $pkl->industri->website }}
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer decorative element -->
        <div class="text-center mt-16">
            <a href="{{ route('pkl') }}" 
            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full shadow-lg text-white hover:from-blue-500 hover:to-blue-700 transition-colors duration-200">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        </div>
    </div>
</body>
</html>
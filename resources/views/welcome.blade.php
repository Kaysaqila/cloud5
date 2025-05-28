<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UKK PKL SIJA</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* Tailwind CSS styles would be here */
            </style>
        @endif
    </head>
    <body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-xl font-bold text-indigo-600">PKL<span class="text-gray-800">SMK</span></a>
                            <img src="{{ asset('image/logo.png') }}" alt="Logo" width="40" class="ml-2">
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative bg-cover bg-center h-screen text-white" style="background-image: url('{{ asset('image/landing_page.jpeg') }}')">
            <!-- Overlay hitam transparan -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Konten -->
            <main class="relative z-10 flex items-center justify-center h-full">
                <div class="max-w-4xl mx-auto p-6 bg-white bg-opacity-90 rounded-lg shadow-lg text-center">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Sistem Monitoring PKL Siswa</h1>
                    
                    <p class="text-lg text-gray-600 mb-6">
                        Platform digital untuk memantau dan mengelola Praktik Kerja Lapangan (PKL) siswa SMK secara efektif dan terintegrasi.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                        <a href="{{ route('login') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-300 text-center">
                            Masuk Sekarang
                        </a>
                        <a href="{{ route('register') }}" class="px-6 py-3 border border-indigo-600 text-indigo-600 hover:bg-indigo-50 font-medium rounded-lg transition duration-300 text-center">
                            Daftar Akun
                        </a>
                    </div>
                </div>
            </main>
        </section>

            <!-- Features Section -->
            <div class="bg-white py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900">Fitur Unggulan</h2>
                        <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                            Solusi lengkap untuk manajemen PKL siswa SMK
                        </p>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="text-indigo-600 mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Pendataan Terpusat</h3>
                            <p class="text-gray-600">
                                Kelola data siswa, industri, dan pembimbing dalam satu platform terintegrasi.
                            </p>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="text-indigo-600 mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Monitoring Real-time</h3>
                            <p class="text-gray-600">
                                Pantau perkembangan PKL siswa secara langsung dengan laporan berkala.
                            </p>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="text-indigo-600 mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Sertifikasi Digital</h3>
                            <p class="text-gray-600">
                                Generate sertifikat PKL digital yang dapat diverifikasi secara online.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <a href="/" class="text-xl font-bold text-white">PKL<span class="text-indigo-300">SMK</span></a>
                        <p class="text-gray-400 mt-2">Sistem Monitoring PKL Siswa</p>
                    </div>
                    <div class="text-gray-400 text-sm">
                        &copy; {{ date('Y') }} Kaysa UKK SIJA. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
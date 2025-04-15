<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan Masyarakat</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-gradient-to-br from-indigo-50 to-blue-50 text-gray-900 antialiased">
    <nav class="bg-gradient-to-r from-indigo-700 to-blue-700 bg-opacity-90 backdrop-blur-md py-4 shadow-md sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">

            <a href="{{ route('login') }}" class="flex items-center space-x-2">
                <img src="{{ asset('https://i.pinimg.com/736x/c6/38/44/c63844abe5ebb683ef75fd21af69b2ec.jpg') }}" alt="Logo" class="h-8 w-8 rounded-full object-cover border-2 border-white shadow">
                <span class="text-lg font-semibold text-white tracking-tight hidden sm:inline">Pengaduan</span>
            </a>

            <div class="hidden sm:flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-white hover:text-indigo-100 px-3 py-2 text-sm font-medium rounded-lg transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg text-sm font-medium ml-2 transition-all">
                        Daftar
                    </a>
                @endguest

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center focus:outline-none transition duration-150 ease-in-out">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-white">{{ Auth::user()->name }}</span>
                                    <img class="h-8 w-8 rounded-full object-cover border-2 border-white" 
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=4f46e5" 
                                        alt="User Avatar">
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Dropdown content -->
                            <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100">
                                <div class="px-4 py-3">
                                    <p class="text-sm text-gray-900 font-medium">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>
        </div>
    </nav>

    <section class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 py-24 md:py-32 flex flex-col items-center justify-center text-center">
            <div class="relative z-10 w-full">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6 text-gray-900">
                    Keluhan Anda <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-600">Didengar</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-700 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Laporkan masalah di lingkungan Anda dengan mudah. Kami memastikan setiap pengaduan mendapat respon cepat dan solusi nyata.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-base">
                        Buat Laporan Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="{{ route('dashboard.guest.reports.index') }}" class="border-2 border-indigo-600/20 text-indigo-600 hover:bg-indigo-600/10 px-8 py-4 rounded-xl font-semibold transition-all duration-300 text-base">
                        Lihat Laporan
                    </a>
                </div>
            </div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-indigo-400 rounded-full opacity-10 blur-3xl"></div>
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-blue-400 rounded-full opacity-10 blur-3xl"></div>
        </div>
    </section>

    <section id="layanan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 text-xs font-semibold tracking-wider text-indigo-600 uppercase bg-indigo-100 rounded-full">
                    Layanan Unggulan
                </span>
                <h2 class="mt-4 text-3xl font-bold text-gray-900 sm:text-4xl">Solusi Pengaduan Modern</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                    Kami menyediakan platform pengaduan masyarakat yang cepat, transparan, dan efektif.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-2">
                    <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center mb-6 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4 text-gray-900">Proses Mudah</h3>
                    <p class="text-gray-600 text-center">Hanya butuh 2 menit untuk mengisi formulir laporan secara online dengan panduan langkah demi langkah.</p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-2">
                    <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center mb-6 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4 text-gray-900">Respon Cepat</h3>
                    <p class="text-gray-600 text-center">Tim kami merespon dalam 24 jam kerja setelah laporan diterima dengan update real-time.</p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-2">
                    <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center mb-6 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4 text-gray-900">Transparan</h3>
                    <p class="text-gray-600 text-center">Pantau perkembangan laporan Anda dari awal hingga selesai melalui dashboard pribadi.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br from-indigo-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 text-xs font-semibold tracking-wider text-indigo-600 uppercase bg-indigo-100 rounded-full">
                    Cara Kerja
                </span>
                <h2 class="mt-4 text-3xl font-bold text-gray-900 sm:text-4xl">Langkah Mudah Melapor</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                    Hanya perlu 3 langkah sederhana untuk menyampaikan keluhan Anda.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center transform hover:-translate-y-2 transition-all duration-300">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-600 flex items-center justify-center font-bold text-2xl mx-auto mb-6">1</div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Daftar Akun</h3>
                    <p class="text-gray-600">Buat akun gratis dengan email atau nomor telepon Anda dalam waktu kurang dari 1 menit.</p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center transform hover:-translate-y-2 transition-all duration-300">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-600 flex items-center justify-center font-bold text-2xl mx-auto mb-6">2</div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Isi Formulir</h3>
                    <p class="text-gray-600">Deskripsikan masalah dengan jelas, tambahkan lokasi dan lampirkan foto pendukung.</p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center transform hover:-translate-y-2 transition-all duration-300">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-600 flex items-center justify-center font-bold text-2xl mx-auto mb-6">3</div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Pantau Perkembangan</h3>
                    <p class="text-gray-600">Cek status laporan Anda kapan saja dan dapatkan notifikasi saat ada perkembangan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Siap Melaporkan Masalah di Lingkungan Anda?</h2>
            <p class="text-xl text-gray-600 mb-10 max-w-3xl mx-auto">
                Bergabunglah dengan ribuan warga yang telah menggunakan layanan kami untuk perbaikan lingkungan.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-lg">
                    Daftar Sekarang - Gratis
                </a>
                <a href="{{ route('login') }}" class="border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-600/10 px-10 py-4 rounded-xl font-semibold transition-all duration-300 text-lg">
                    Masuk ke Akun
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-gradient-to-br from-indigo-700 to-blue-700 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Brand Column -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="bg-white p-1.5 rounded-full shadow-md">
                            <img src="{{ asset('https://i.pinimg.com/736x/c6/38/44/c63844abe5ebb683ef75fd21af69b2ec.jpg') }}" 
                                alt="Logo" 
                                class="h-10 w-10 rounded-full object-cover border-2 border-white">
                        </div>
                        <span class="text-xl font-bold">Pengaduan</span>
                    </div>
                    <p class="text-indigo-200 text-sm mb-6">
                        Layanan pengaduan masyarakat modern untuk perbaikan lingkungan yang lebih baik.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-indigo-300 hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-300 hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-300 hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041.058h-.08c-2.597 0-2.917-.01-3.96-.058-.976-.045-1.505-.207-1.858-.344-.466-.182-.8-.398-1.15-.748-.35-.35-.566-.683-.748-1.15-.137-.353-.3-.882-.344-1.857-.048-1.054-.058-1.37-.058-4.041zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation Column -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Navigasi</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-indigo-200 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#layanan" class="text-indigo-200 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                                Layanan
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-200 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Tentang Kami
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Column -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Kontak Kami</h4>
                    <ul class="space-y-3 text-indigo-200 text-sm">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            info@cepulinaja.id
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            (021) 1234-5678
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Jl. Pengaduan No. 123, Jakarta
                        </li>
                    </ul>
                </div>

                <!-- Newsletter Column -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Berlangganan</h4>
                    <p class="text-indigo-200 text-sm mb-4">
                        Dapatkan update terbaru tentang layanan kami langsung ke email Anda.
                    </p>
                    <form class="flex">
                        <input type="email" placeholder="Email Anda" 
                            class="px-4 py-2 w-full rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900 text-sm">
                        <button type="submit" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-r-lg text-sm font-medium transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-indigo-800 mt-12 pt-8 text-center">
                <p class="text-indigo-400 text-sm">
                    &copy; 2025 Pengaduan. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
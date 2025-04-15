<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            Laporan Pengaduan Publik
        </h2>
    </x-slot>

    <div class="py-6">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8 bg-white p-4 rounded-lg shadow-md">
                <form method="GET" action="{{ route('dashboard.guest.reports.index') }}">
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cari Deskripsi</label>
                            <input type="text" name="search" placeholder="Cari laporan..."
                                class="w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Laporan</label>
                            <select name="type" class="w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Semua Jenis</option>
                                <option value="KEJAHATAN" >Kejahatan</option>
                                <option value="PEMBANGUNAN" >Pembangunan</option>
                                <option value="SOSIAL" >Sosial</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Urutkan</label>
                            <select name="sort" class="w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="desc" >Terbaru</option>
                                <option value="asc" >Terlama</option>
                            </select>
                        </div>

                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition duration-200">
                                <div class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    Filter
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Laporan Terbaru
            </h3>
            {{-- {{ dd($reports) }} --}}

            @if ($reports->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($reports as $report)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition duration-200">
                            
                            @if ($report->image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $report->image) }}" alt="Gambar Laporan" class="w-full object-cover rounded-t-md">
                                </div>
                            @endif
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                        {{ $report->type }}
                                    </span>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                        {{ ucfirst(strtolower($report->status)) }}
                                    </span>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ Str::limit($report->title, 50) }}</h4>
                                <p class="text-gray-700 text-sm mb-4">{{ Str::limit($report->description, 100) }}</p>
                                <div class="border-t border-gray-100 pt-3">
                                    <div class="flex items-center text-sm text-gray-600 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $report->village }}, {{ $report->subdistrict }}
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-500">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $report->created_at->translatedFormat('d M Y, H:i') }}
                                        </div>
                                        <a href="{{ route('dashboard.guest.reports.show', $report) }}" class="text-indigo-600 hover:underline">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6">
                    {{ $reports->withQueryString()->links() }}
                </div>
            @else
                <p class="text-gray-600">Tidak ada laporan ditemukan.</p>
            @endif
        </div>
    </div>
</x-app-layout>


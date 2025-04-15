<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Detail Laporan
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-6">
        <div>
            <a href="{{ route('dashboard.staff') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 transition">
                <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar Laporan
            </a>
        </div>
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-xl font-bold text-gray-900">{{ $report->title }}</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Deskripsi</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $report->description }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Pelapor</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $report->user->name }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Status</h4>
                        <span class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $report->status === 'SELESAI' ? 'bg-green-100 text-green-800' :
                               ($report->status === 'DITOLAK' ? 'bg-red-100 text-red-800' :
                               'bg-yellow-100 text-yellow-800') }}">
                            {{ $report->status }}
                        </span>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Dibuat Pada</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $report->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900 flex items-center">
                    <svg class="h-5 w-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    Progress Penanganan
                </h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                @forelse ($report->progress as $progress)
                    <div class="border-l-4 border-indigo-200 pl-4 py-3 mb-4">
                        <p class="text-sm text-gray-800">{{ $progress->description }}</p>
                        <div class="mt-1 flex items-center text-xs text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            Ditambahkan oleh {{ $progress->staff->name }} · {{ $progress->created_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <div class="text-center py-4">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada progress</h3>
                        <p class="mt-1 text-sm text-gray-500">Tambahkan progress penanganan laporan ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
        @if ($report->status !== 'SELESAI')
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 flex items-center">
                        <svg class="h-5 w-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Progress
                    </h3>
                </div>
                <form action="{{ route('staff.reports.progress.store', $report) }}" method="POST" class="px-4 py-5 sm:p-6">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Progress</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Kirim Progress
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @if ($report->progress->isNotEmpty())
                <div class="flex justify-end">
                    <form action="{{ route('staff.reports.complete', $report) }}" method="POST" onsubmit="return confirm('Tandai laporan ini sebagai SELESAI?')">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Tandai SELESAI
                        </button>
                    </form>
                </div>
            @else
                <div class="flex justify-end">
                    <button disabled class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm bg-gray-300 text-gray-600 cursor-not-allowed">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Tambahkan Progress terlebih dahulu
                    </button>
                </div>
            @endif
        @endif
    </div>
</x-app-layout>


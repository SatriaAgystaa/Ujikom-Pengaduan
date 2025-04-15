<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            Dashboard Staff
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 overflow-hidden shadow-lg rounded-lg mb-6">
                <div class="p-6 text-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-lg">Selamat datang, <span class="font-bold">{{ auth()->user()->name }}</span>!</p>
                            <p class="text-sm opacity-90 mt-1">Tinjau laporan yang sedang diproses</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <a href="{{ route('staff.reports.export.all') }}" class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-[1.02]">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Export Semua Laporan
                </a>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Kelola Laporan
            </h3>
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($reports as $report)
                    <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition duration-200">
                        @if ($report->image)
                            <img src="{{ asset('storage/' . $report->image) }}" alt="Gambar Laporan" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif
           
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                    {{ $report->type }}
                                </span>
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $report->status === 'PROSES' ? 'bg-yellow-100 text-yellow-800' :
                                            ($report->status === 'DITOLAK' ? 'bg-red-100 text-red-800' :
                                            ($report->status === 'SELESAI' ? 'bg-green-100 text-green-800' :
                                            'bg-gray-100 text-gray-800')) }}">
                                    {{ ucfirst(strtolower($report->status)) }}
                                </span>
                            </div>
           
                            <p class="text-gray-700 text-sm mb-4">{{ Str::limit($report->description, 100) }}</p>
           
                            <div class="mt-4 flex justify-between items-start gap-4">
                                <div>
                                    @if ($report->status === 'PROSES')
                                        <button onclick="showModal({{ $report->id }})"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                            Tindak Lanjut
                                        </button>
                                    @elseif ($report->status === 'DITOLAK')
                                        <span class="text-sm text-red-500">
                                            Tidak ditindaklanjuti (Ditolak)
                                        </span>
                                    @else
                                        <span class="text-sm text-gray-500">
                                            Ditindaklanjuti oleh {{ $report->responseProgress?->staff?->name ?? 'Staff tidak dikenal' }}
                                        </span>
                                    @endif
                                </div>
                                <div class="flex flex-row sm:flex-row gap-1">
                                    <a href="{{ route('staff.reports.export.single', $report->id) }}"
                                        class="inline-flex items-center px-2 py-1.5 border border-transparent text-xs font-medium rounded text-green-600">
                                        <svg class="-ml-0.5 mr-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="#16a34a">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Export
                                    </a>
                                    @if (in_array($report->status, ['SELESAI', 'DITOLAK']))
                                        <form action="{{ route('staff.reports.destroy', $report->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-2 py-1.5 border border-transparent text-xs font-medium rounded text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="#dc2626">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>                        
                        </div>
                    </div>
                @endforeach
            </div>              
        </div>
        <div id="modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden w-full max-w-md">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 flex items-center">
                        <svg class="h-5 w-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                        Tindak Lanjut Laporan
                    </h3>
                </div>
                <form id="modalForm" method="POST" class="px-6 py-4">
                    @csrf
                    <input type="hidden" name="redirect_to_detail" value="1">
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Pilih Tindakan</label>
                            <select name="status" id="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="PROSES">Proses Penyelesaian</option>
                                <option value="DITOLAK">Tolak Laporan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="hideModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Batal
                        </button>
                        <button type="submit" class="inline-flex justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function showModal(reportId) {
            const form = document.getElementById('modalForm');
            form.action = `/staff/reports/${reportId}/status`;
            document.getElementById('modal').classList.remove('hidden');
        }

        function hideModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</x-app-layout>
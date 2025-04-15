<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">Detail Laporan</h2>
    </x-slot>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 transition">
            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="rounded-lg overflow-hidden shadow">
                    @if ($report->image)
                        <img src="{{ asset('storage/' . $report->image) }}" alt="Laporan">
                        @else
                        <div class="w-full h-96 bg-gray-100 flex items-center justify-center rounded-lg text-gray-400">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $report->type }}</h3>
                        <p class="text-gray-600 mb-4">{{ $report->description }}</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $report->village }}, {{ $report->subdistrict }}, {{ $report->regency }}, {{ $report->province }}</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>
                                <span>Dilaporkan oleh: {{ $report->user->name }}</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Total View: {{ $report->views ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
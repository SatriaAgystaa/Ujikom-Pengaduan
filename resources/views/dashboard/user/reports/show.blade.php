<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 leading-tight">Detail Laporan</h2>
    </x-slot>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('dashboard.user') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 transition">
            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                    <div class="rounded-lg overflow-hidden">
                        @if ($report->image)
                            <img src="{{ asset('storage/' . $report->image) }}" alt="Gambar Laporan"
                                class="w-full h-96 object-cover rounded-lg transition duration-300 hover:scale-105">
                        @else
                            <div class="w-full h-96 bg-gray-100 flex items-center justify-center rounded-lg text-gray-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
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
                            <div>
                                <button 
                                    type="button" 
                                    id="like-button" 
                                    data-report-id="{{ $report->id }}" 
                                    class="flex items-center text-indigo-600 hover:text-indigo-800 transition">
                                    @if ($report->isLikedBy(auth()->user()))
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    @endif
                                    <span class="ml-1" id="like-count">({{ $report->likes->count() }})</span>
                                </button>
                            </div>
                            @if ($report->progress->isNotEmpty())
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-6">
                                    <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        Progress Penanganan
                                    </h3>
                                    <div class="space-y-4">
                                        @foreach ($report->progress as $progress)
                                            <div class="border-l-4 border-indigo-200 pl-4 py-2">
                                                <p class="text-sm text-gray-700 font-medium">
                                                    <span class="text-indigo-600">Ditindaklanjuti oleh:</span> {{ $progress->staff->name ?? 'N/A' }}
                                                </p>
                                                <p class="text-gray-600 text-sm mt-1">{{ $progress->description }}</p>
                                                <p class="text-xs text-gray-400 mt-1">{{ $progress->created_at->diffForHumans() }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $report->status === 'PROSES' ? 'bg-yellow-100 text-yellow-800' :
                               ($report->status === 'DITOLAK' ? 'bg-red-100 text-red-800' :
                               ($report->status === 'SELESAI' ? 'bg-green-100 text-green-800' :
                               'bg-gray-100 text-gray-800')) }}">
                                {{ ucfirst(strtolower($report->status)) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 flex items-center">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                        Komentar
                    </h3>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('user.comments.store', $report->id) }}" class="space-y-4">
                        @csrf
                        <div>
                            <textarea name="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Tulis komentar Anda...">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Kirim Komentar
                        </button>
                    </form>
                    <div class="mt-8 space-y-6">
                        @forelse ($comments as $comment)
                            <div class="border-b border-gray-200 pb-4 last:border-b-0 last:pb-0">
                                <div class="flex justify-between items-start">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $comment->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    @if (auth()->id() === $comment->user_id)
                                        <div class="flex space-x-2">
                                            <button onclick="document.getElementById('edit-{{ $comment->id }}').classList.toggle('hidden')" class="text-xs text-indigo-600 hover:text-indigo-900">Edit</button>
                                            <form method="POST" action="{{ route('user.comments.destroy', $comment) }}" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs text-red-600 hover:text-red-900" onclick="return confirm('Hapus komentar ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-2 ml-11">
                                    <p class="text-sm text-gray-700">{{ $comment->content }}</p>
                                    <div id="edit-{{ $comment->id }}" class="mt-3 hidden">
                                        <form method="POST" action="{{ route('user.comments.update', $comment) }}" class="space-y-2">
                                            @csrf
                                            @method('PUT')
                                            <textarea name="content" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $comment->content }}</textarea>
                                            <div class="flex justify-end space-x-2">
                                                <button type="button" onclick="document.getElementById('edit-{{ $comment->id }}').classList.add('hidden')" class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                                    Batal
                                                </button>
                                                <button type="submit" class="px-3 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-6">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada komentar</h3>
                                <p class="mt-1 text-sm text-gray-500">Jadilah yang pertama berkomentar!</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('like-button').addEventListener('click', function () {
        const reportId = this.dataset.reportId;

        fetch(`/reports/${reportId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Optional: update jumlah like langsung
            if (data.likes !== undefined) {
                document.getElementById('like-count').innerText = `(${data.likes})`;
            }

            // Optional: ganti icon love kalau kamu mau
            // location.reload(); // Kalau kamu tetap ingin reload manual
        })
        .catch(error => {
            console.error('Error liking report:', error);
        });
    });
</script>

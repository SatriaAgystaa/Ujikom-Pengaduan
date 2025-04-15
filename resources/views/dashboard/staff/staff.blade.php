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
                            <p class="text-sm opacity-90 mt-1">Apa yang ingin Anda laporkan hari ini?</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
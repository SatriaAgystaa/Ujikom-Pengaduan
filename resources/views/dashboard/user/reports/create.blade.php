<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">Buat Laporan</h2>
    </x-slot>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('dashboard.user') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 transition">
            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Kembali ke Dashboard User
        </a>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900 flex items-center">
                    <svg class="h-5 w-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                    </svg>
                    Formulir Laporan
                </h3>
                <p class="mt-1 text-sm text-gray-500">Silakan isi formulir berikut untuk membuat laporan baru.</p>
            </div>


            <form action="{{ route('user.reports.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 px-4 py-5 sm:p-6">
                @csrf
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Laporan</label>
                    <div class="mt-1">
                        <textarea id="description" name="description" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Jelaskan laporan Anda secara detail.</p>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Jenis Laporan</label>
                    <select id="type" name="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="KEJAHATAN">Kejahatan</option>
                        <option value="PEMBANGUNAN">Pembangunan</option>
                        <option value="SOSIAL">Sosial</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <select id="province" name="province" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></select>
                    </div>


                    <div>
                        <label for="regency" class="block text-sm font-medium text-gray-700">Kabupaten/Kota</label>
                        <select id="regency" name="regency" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></select>
                    </div>


                    <div>
                        <label for="subdistrict" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                        <select id="subdistrict" name="subdistrict" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></select>
                    </div>


                    <div>
                        <label for="village" class="block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
                        <select id="village" name="village" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF maksimal 2MB</p>
                        </div>
                    </div>
                </div>


                {{-- Submit Button --}}
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                        </svg>
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        // Fetch wilayah dari API EMSIFA
        async function fetchWilayah(endpoint, targetSelect, parentId = null) {
            const url = parentId
                ? `https://www.emsifa.com/api-wilayah-indonesia/api/${endpoint}/${parentId}.json`
                : `https://www.emsifa.com/api-wilayah-indonesia/api/${endpoint}.json`;


            const response = await fetch(url);
            const data = await response.json();
            const select = document.getElementById(targetSelect);
            select.innerHTML = '<option value="">Pilih</option>';
            data.forEach(item => {
                select.innerHTML += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
            });
        }


        document.addEventListener('DOMContentLoaded', () => {
            fetchWilayah('provinces', 'province');


            document.getElementById('province').addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                if (selected.dataset.id) {
                    fetchWilayah('regencies', 'regency', selected.dataset.id);
                } else {
                    document.getElementById('regency').innerHTML = '<option value="">Pilih</option>';
                }
                document.getElementById('subdistrict').innerHTML = '<option value="">Pilih</option>';
                document.getElementById('village').innerHTML = '<option value="">Pilih</option>';
            });


            document.getElementById('regency').addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                if (selected.dataset.id) {
                    fetchWilayah('districts', 'subdistrict', selected.dataset.id);
                } else {
                    document.getElementById('subdistrict').innerHTML = '<option value="">Pilih</option>';
                }
                document.getElementById('village').innerHTML = '<option value="">Pilih</option>';
            });


            document.getElementById('subdistrict').addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                if (selected.dataset.id) {
                    fetchWilayah('villages', 'village', selected.dataset.id);
                } else {
                    document.getElementById('village').innerHTML = '<option value="">Pilih</option>';
                }
            });
        });
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">Edit Laporan</h2>
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
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Formulir Edit Laporan
                </h3>
                <p class="mt-1 text-sm text-gray-500">Perbarui informasi laporan Anda.</p>
            </div>
            <form action="{{ route('user.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data" class="px-4 py-5 sm:p-6 space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Laporan</label>
                    <div class="mt-1">
                        <textarea id="description" name="description" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('description', $report->description) }}</textarea>
                    </div>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Jenis Laporan</label>
                    <select id="type" name="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="KEJAHATAN" {{ $report->type == 'KEJAHATAN' ? 'selected' : '' }}>Kejahatan</option>
                        <option value="PEMBANGUNAN" {{ $report->type == 'PEMBANGUNAN' ? 'selected' : '' }}>Pembangunan</option>
                        <option value="SOSIAL" {{ $report->type == 'SOSIAL' ? 'selected' : '' }}>Sosial</option>
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
                    <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                    @if($report->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $report->image) }}" alt="Current Image" class="h-32 object-cover rounded-md">
                        </div>
                    @else
                        <p class="mt-2 text-sm text-gray-500">Tidak ada gambar</p>
                    @endif
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Upload Gambar Baru (opsional)</label>
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
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Update Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        const selectedProvince = @json($report->province);
        const selectedRegency = @json($report->regency);
        const selectedSubdistrict = @json($report->subdistrict);
        const selectedVillage = @json($report->village);


        async function fetchWilayah(endpoint, targetSelect, parentId = null, selectedValue = null) {
            const url = parentId
                ? `https://www.emsifa.com/api-wilayah-indonesia/api/${endpoint}/${parentId}.json`
                : `https://www.emsifa.com/api-wilayah-indonesia/api/${endpoint}.json`;
           
            try {
                const response = await fetch(url);
                const data = await response.json();
                const select = document.getElementById(targetSelect);
                select.innerHTML = '<option value="">Pilih</option>';
               
                data.forEach(item => {
                    const selected = item.name === selectedValue ? 'selected' : '';
                    select.innerHTML += `<option value="${item.name}" data-id="${item.id}" ${selected}>${item.name}</option>`;
                });
            } catch (error) {
                console.error('Error fetching wilayah:', error);
            }
        }


        document.addEventListener('DOMContentLoaded', async () => {
            // Load initial data
            await fetchWilayah('provinces', 'province', null, selectedProvince);
           
            // If province is selected, load regencies
            const provinceSelect = document.getElementById('province');
            const provinceId = provinceSelect.querySelector('option:checked')?.dataset?.id;
           
            if (provinceId) {
                await fetchWilayah('regencies', 'regency', provinceId, selectedRegency);
               
                // If regency is selected, load districts
                const regencySelect = document.getElementById('regency');
                const regencyId = regencySelect.querySelector('option:checked')?.dataset?.id;
               
                if (regencyId) {
                    await fetchWilayah('districts', 'subdistrict', regencyId, selectedSubdistrict);
                   
                    // If district is selected, load villages
                    const subdistrictSelect = document.getElementById('subdistrict');
                    const subdistrictId = subdistrictSelect.querySelector('option:checked')?.dataset?.id;
                   
                    if (subdistrictId) {
                        await fetchWilayah('villages', 'village', subdistrictId, selectedVillage);
                    }
                }
            }


            // Event listeners for dynamic loading
            provinceSelect.addEventListener('change', async function() {
                const selected = this.options[this.selectedIndex];
                if (selected.dataset.id) {
                    await fetchWilayah('regencies', 'regency', selected.dataset.id);
                    document.getElementById('subdistrict').innerHTML = '<option value="">Pilih</option>';
                    document.getElementById('village').innerHTML = '<option value="">Pilih</option>';
                }
            });


            document.getElementById('regency').addEventListener('change', async function() {
                const selected = this.options[this.selectedIndex];
                if (selected.dataset.id) {
                    await fetchWilayah('districts', 'subdistrict', selected.dataset.id);
                    document.getElementById('village').innerHTML = '<option value="">Pilih</option>';
                }
            });


            document.getElementById('subdistrict').addEventListener('change', async function() {
                const selected = this.options[this.selectedIndex];
                if (selected.dataset.id) {
                    await fetchWilayah('villages', 'village', selected.dataset.id);
                }
            });
        });
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">Preview Arsip Fisik {{ $tahun }}</h2>
                <p class="text-xs text-gray-500 mt-0.5">Kategori: {{ $category->category_name }} | File: {{ $fileName }}</p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('category.manageArsipFisik', $category->id) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-gray-700 text-xs font-semibold rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>

                <a href="{{ route('category.downloadArsipFisik', [$category->id, $tahun]) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white text-xs font-semibold rounded-xl shadow-md hover:bg-emerald-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Unduh File Excel
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-200 overflow-hidden">
                <div id="loading" class="text-center py-12">
                    <p class="text-sm font-semibold text-gray-500">Membaca dan memuat data Excel...</p>
                </div>
                
                <div id="excel-container" class="overflow-x-auto hidden">
                    <table id="excel-table" class="min-w-full divide-y divide-gray-200 border text-xs"></table>
                </div>
            </div>

        </div>
    </div>

    <!-- SheetJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileUrl = "{{ route('category.streamArsipFisik', [$category->id, $tahun]) }}";

            fetch(fileUrl)
                .then(response => response.arrayBuffer())
                .then(data => {
                    const workbook = XLSX.read(data, { type: 'array' });
                    const firstSheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[firstSheetName];
                    
                    const htmlTable = XLSX.utils.sheet_to_html(worksheet, { id: 'excel-table', editable: false });
                    
                    document.getElementById('loading').classList.add('hidden');
                    const container = document.getElementById('excel-container');
                    container.innerHTML = htmlTable;
                    container.classList.remove('hidden');

                    const table = container.querySelector('table');
                    if(table) {
                        table.className = "w-full border-collapse border border-gray-300 text-xs text-gray-700";
                        const cells = table.querySelectorAll('th, td');
                        cells.forEach(cell => {
                            cell.className += " border border-gray-200 px-3 py-2";
                        });
                    }
                })
                .catch(error => {
                    console.error("Error reading excel:", error);
                    document.getElementById('loading').innerHTML = '<p class="text-red-500 font-semibold text-sm">Gagal membaca berkas Excel.</p>';
                });
        });
    </script>
</x-app-layout>
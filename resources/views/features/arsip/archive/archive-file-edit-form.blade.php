<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('folder.show', $file->folder_id) }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-3 py-2 rounded-full border border-gray-200
                shadow-sm transition-all duration-200 hover:bg-gray-200 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="hidden sm:inline text-sm font-medium">Kembali</span>
            </a>             
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-md p-8 border border-gray-200">

                {{-- HEADER FORM --}}
                <div class="mb-8 pb-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Form Edit Arsip</h3>
                    <p class="text-sm text-gray-600 mt-1">Lengkapi informasi dengan benar dan teliti.</p>
                </div>

                {{-- FORM --}}
                <form action="{{ route('archive.update', $file->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-2 sm:p-4">
                    @csrf
                    @method('PUT')

                    {{-- Nama File --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Nama Arsip</p>
                        <input type="text" name="file_name" value="{{ old('file_name', $file->file_name) }}"
                            class="w-full text-lg font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition"
                            placeholder="Nama File Arsip">
                    </div>

                    {{-- KODE, INDEKS, NO ITEM --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        {{-- Kode Klasifikasi --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Kode Klasifikasi</p>
                            <input type="text" name="kode_klasifikasi" value="{{ old('kode_klasifikasi', $file->kode_klasifikasi) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Kode Klasifikasi">
                        </div>

                        {{-- Indeks 1 --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Indeks 1</p>
                            <input type="text" name="indeks1" value="{{ old('indeks1', $file->indeks1) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Indeks 1">
                        </div>

                        {{-- Indeks 2 --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Indeks 2</p>
                            <input type="text" name="indeks2" value="{{ old('indeks2', $file->indeks2) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Indeks 2">
                        </div>

                        {{-- No Item --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">No Item</p>
                            <input type="number" name="no_item" value="{{ old('no_item', $file->no_item) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="No Item">
                        </div>
                    </div>

                    {{-- URAIAN --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Uraian</p>
                        <textarea name="uraian" rows="2" placeholder="Uraian"
                            class="w-full font-semibold text-gray-900 bg-transparent border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 px-3 py-2 transition">{{ old('uraian', $file->uraian) }}</textarea>
                    </div>

                    {{-- SPBY, SPM, JENIS SPM, NILAI SP2D --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        {{-- No SPBy --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">No SPBy</p>
                            <input type="text" name="no_spby" value="{{ old('no_spby', $file->no_spby) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="No SPBy">
                        </div>

                        {{-- No SPM --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">No SPM</p>
                            <input type="text" name="no_spm" value="{{ old('no_spm', $file->no_spm) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="No SPM">
                        </div>

                        {{-- Jenis SPM --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Jenis SPM</p>
                            <input type="text" name="jenis_spm" value="{{ old('jenis_spm', $file->jenis_spm) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Jenis SPM">
                        </div>

                        {{-- Nilai SP2D --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Nilai SP2D</p>
                            <input type="text" name="nilai_sp2d" value="{{ old('nilai_sp2d', $file->nilai_sp2d) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Nilai SP2D">
                        </div>
                    </div>

                    {{-- TANGGAL --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        {{-- Tanggal SP2D --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Tanggal SP2D</p>
                            <input type="date" name="tgl_sp2d" value="{{ old('tgl_sp2d', $file->tgl_sp2d) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition">
                        </div>

                        {{-- Tanggal Selesai SP2D --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Tanggal Selesai SP2D</p>
                            <input type="date" name="tgl_selesai_sp2d" value="{{ old('tgl_selesai_sp2d', $file->tgl_selesai_sp2d) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition">
                        </div>   

                        {{-- Tanggal Invoice --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Tanggal Invoice</p>
                            <input type="date" name="tgl_invoice" value="{{ old('tgl_invoice', $file->tgl_invoice) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition">
                        </div>

                        {{-- Tanggal Terima --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Tanggal Terima</p>
                            <input type="date" name="tgl_terima" value="{{ old('tgl_terima', $file->tgl_terima) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition">
                        </div>
                    </div>

                    {{-- INVOICE & INFO DOKUMEN --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- No Invoice --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">No Invoice</p>
                            <input type="text" name="no_invoice" value="{{ old('no_invoice', $file->no_invoice) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="No Invoice">
                        </div>
                    
                        {{-- Tingkat Pertimbangan --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Tingkat Pertimbangan</p>
                            <input type="text" name="tingkat_pertimbangan" value="{{ old('tingkat_pertimbangan', $file->tingkat_pertimbangan) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Tingkat Pertimbangan">
                        </div>

                        {{-- Jumlah Halaman --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Jumlah Halaman</p>
                            <input type="number" name="jumlah_halaman" value="{{ old('jumlah_halaman', $file->jumlah_halaman) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Jumlah Halaman">
                        </div>
                    </div>

                    {{-- RETENSI --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        {{-- Retensi Arsip Aktif --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Retensi Arsip Aktif</p>
                            <input type="number" name="retensi_arsip_aktif" value="{{ old('retensi_arsip_aktif', $file->retensi_arsip_aktif) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Retensi Arsip Aktif">
                        </div>

                        {{-- Retensi Arsip Inaktif --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Retensi Arsip Inaktif</p>
                            <input type="number" name="retensi_arsip_inaktif" value="{{ old('retensi_arsip_inaktif', $file->retensi_arsip_inaktif) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Retensi Arsip Inaktif">
                        </div>

                        {{-- Nasib Akhir Arsip --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Nasib Akhir Arsip</p>
                            <input type="text" name="nasib_akhir_arsip" value="{{ old('nasib_akhir_arsip', $file->nasib_akhir_arsip) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Nasib Akhir Arsip">
                        </div>

                        {{-- Klasifikasi Keamanan --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Klasifikasi Keamanan</p>
                            <input type="text" name="klasifikasi_keamanan" value="{{ old('klasifikasi_keamanan', $file->klasifikasi_keamanan) }}"
                                class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                                placeholder="Klasifikasi Keamanan">
                        </div>
                    </div>

                    {{-- STATUS --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Status</p>
                        <input type="text" name="status" value="{{ old('status', $file->status) }}"
                            class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                            placeholder="Status">
                    </div>  

                    {{-- KETERANGAN --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Keterangan / Deskripsi</p>
                        <input type="text" name="keterangan" value="{{ old('keterangan', $file->keterangan) }}"
                            class="w-full font-semibold text-gray-900 bg-transparent border-b border-gray-300 focus:border-indigo-500 focus:ring-0 transition" 
                            placeholder="Keterangan">
                    </div>


                    {{-- ===================================================== --}}
                    {{-- UPLOAD FILE (PDF & EXCEL) --}}
                    {{-- ===================================================== --}}

                    <div class="pt-4">

                        {{-- Judul Section --}}
                        <div class="mb-4">
                            <h4 class="text-base font-semibold text-gray-800">
                                File Lampiran Arsip
                            </h4>
                            <p class="text-sm text-gray-500 mt-1">
                                Pilih file baru jika ingin mengganti dokumen PDF atau Excel yang sudah ada.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- ================= PDF ================= --}}
                            <div class="border border-gray-200 rounded-xl p-5 bg-gray-50 hover:border-red-300 hover:shadow-sm transition">
                                <div class="flex items-start gap-4">

                                    {{-- ICON PDF --}}
                                    <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 18H6a2 2 0 01-2-2V6a2 2 0 012-2h8l4 4v8a2 2 0 01-2 2h-1M14 4v4h4M8 13h2a1.5 1.5 0 010 3H8v-3zm0 0v-2h2a1.5 1.5 0 010 3H8m6-1h2m-2 0v3m0-3v-3h2"/>
                                        </svg>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <label class="block text-sm font-semibold text-gray-800">
                                            File PDF Arsip
                                        </label>

                                        {{-- Informasi File PDF Saat Ini --}}
                                        @if ($file->file_path)
                                            <div class="mt-2 text-xs text-green-700 bg-green-50 border border-green-200 p-2 rounded-lg truncate">
                                                <span class="font-semibold">📄 File Saat Ini:</span> {{ basename($file->file_path) }}
                                            </div>
                                        @else
                                            <p class="text-xs text-amber-600 mt-1">Belum ada file PDF yang diunggah.</p>
                                        @endif

                                        {{-- BUTTON UPLOAD PDF --}}
                                        <label for="file_archive"
                                            class="mt-3 inline-flex items-center justify-center gap-2 cursor-pointer px-4 py-2 rounded-lg bg-white border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:border-gray-400 transition shadow-sm">
                                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16V4m0 0l-4 4m4-4l4 4M5 20h14"/>
                                            </svg>
                                            Ganti File PDF
                                        </label>

                                        <input type="file" id="file_archive" name="file_archive" class="hidden" accept=".pdf,application/pdf">

                                        {{-- FILE INFO SELECTION --}}
                                        <p id="pdf-file-info" class="mt-2 text-xs text-gray-500 truncate max-w-full block" title="Tidak ada file baru dipilih.">
                                            Tidak ada file baru dipilih.
                                        </p>
                                    </div>
                                </div>

                                {{-- INFO FORMAT --}}
                                <div class="mt-4 pt-3 border-t border-gray-200">
                                    <p class="text-xs text-gray-500">
                                        <span class="font-medium">Format:</span> PDF <span class="mx-1">•</span> <span class="font-medium">Maks:</span> 20MB
                                    </p>
                                </div>
                            </div>


                            {{-- ================= EXCEL ================= --}}
                            <div class="border border-gray-200 rounded-xl p-5 bg-gray-50 hover:border-green-300 hover:shadow-sm transition">
                                <div class="flex items-start gap-4">

                                    {{-- ICON EXCEL --}}
                                    <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 17l3-3 3 3m-3-3V8m0 0l-3 3m3-3l3 3M5 4h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5a1 1 0 011-1z"/>
                                        </svg>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <label class="block text-sm font-semibold text-gray-800">
                                            File Excel (Arsip Fisik)
                                        </label>

                                        {{-- Informasi File Excel Saat Ini --}}
                                        @if ($file->excel_path)
                                            <div class="mt-2 text-xs text-green-700 bg-green-50 border border-green-200 p-2 rounded-lg truncate">
                                                <span class="font-semibold">📊 File Saat Ini:</span> {{ basename($file->excel_path) }}
                                            </div>
                                        @else
                                            <p class="text-xs text-amber-600 mt-1">Belum ada file Excel yang diunggah.</p>
                                        @endif

                                        {{-- BUTTON UPLOAD EXCEL --}}
                                        <label for="file_excel"
                                            class="mt-3 inline-flex items-center justify-center gap-2 cursor-pointer px-4 py-2 rounded-lg bg-white border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:border-gray-400 transition shadow-sm">
                                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16V4m0 0l-4 4m4-4l4 4M5 20h14"/>
                                            </svg>
                                            {{ $file->excel_path ? 'Ganti File Excel' : 'Upload File Excel' }}
                                        </label>

                                        <input type="file" id="file_excel" name="file_excel" class="hidden" accept=".xlsx,.xls,.csv">

                                        {{-- FILE INFO SELECTION --}}
                                        <p id="excel-file-info" class="mt-2 text-xs text-gray-500 truncate max-w-full block" title="Tidak ada file baru dipilih.">
                                            Tidak ada file baru dipilih.
                                        </p>
                                    </div>
                                </div>

                                {{-- INFO FORMAT --}}
                                <div class="mt-4 pt-3 border-t border-gray-200">
                                    <p class="text-xs text-gray-500">
                                        <span class="font-medium">Format:</span> XLSX, XLS, CSV <span class="mx-1">•</span> <span class="font-medium">Maks:</span> 20MB
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- ACTION BUTTONS --}}
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856"/>
                            </svg>
                            Perubahan akan tersimpan permanen
                        </p>

                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="submit"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-2.5 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                Update
                            </button>

                            <a href="{{ route('folder.show', $file->folder_id) }}"
                                class="flex-1 sm:flex-none px-6 py-2.5 rounded-lg font-semibold text-gray-700 bg-gray-200 hover:bg-gray-300 shadow-sm hover:shadow-md text-center transition">
                                Batal
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{-- ===================================================== --}}
    {{-- JAVASCRIPT FILE UPLOAD PREVIEW --}}
    {{-- ===================================================== --}}

    <script>
        // PDF PREVIEW
        document.getElementById('file_archive').addEventListener('change', function () {
            const info = document.getElementById('pdf-file-info');
            const file = this.files[0];

            if (!file) {
                info.textContent = 'Tidak ada file baru dipilih.';
                info.title = 'Tidak ada file baru dipilih.';
                return;
            }

            info.textContent = 'Baru dipilih: ' + file.name;
            info.title = file.name;
        });

        // EXCEL PREVIEW
        document.getElementById('file_excel').addEventListener('change', function () {
            const info = document.getElementById('excel-file-info');
            const file = this.files[0];

            if (!file) {
                info.textContent = 'Tidak ada file baru dipilih.';
                info.title = 'Tidak ada file baru dipilih.';
                return;
            }

            info.textContent = 'Baru dipilih: ' + file.name;
            info.title = file.name;
        });
    </script>

</x-app-layout>
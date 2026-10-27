<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    {{-- CONTAINER UTAMA --}}
    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- BAR NAVIGASI KEMBALI (LEGA & JELAS) --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
                <a href="{{ route('folder.show', $folders->id) }}"
                    class="inline-flex items-center gap-2.5 bg-white text-slate-800 px-4 py-2.5 rounded-xl border-2 border-slate-200
                    shadow-sm hover:border-blue-600 hover:text-blue-700 hover:shadow-md hover:-translate-y-0.5 active:scale-95 transition-all duration-200 w-fit">
                    <div class="w-6 h-6 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <span class="text-sm font-bold">Kembali ke Folder</span>
                </a>

                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl border border-slate-200 shadow-sm text-xs text-slate-700 font-semibold w-fit">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Target Folder: <span class="text-blue-800 font-black text-sm ml-1">{{ $folders->folder_name ?? 'Arsip' }}</span></span>
                </div>
            </div>

            {{-- HERO BANNER BIRU TVRI DENGAN INLINE GRADIENT (PASTI JELAS & TIDAK AKAN PUTIH/NYARU) --}}
            <div class="relative overflow-hidden rounded-3xl p-7 sm:p-9 shadow-xl border border-blue-900/30"
                 style="background: linear-gradient(120deg, #002766 0%, #003A8F 52%, #0056C7 100%) !important; color: #ffffff !important;">

                {{-- Ambient Light 3D --}}
                <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 shadow-inner shrink-0">
                            <svg class="w-9 h-9 text-amber-300 drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full mb-1.5 border border-white/30"
                                  style="background: rgba(255, 255, 255, 0.2) !important; color: #ffffff !important;">
                                TVRI Kalsel • Input Arsip Baru
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white tracking-tight drop-shadow-sm" style="color: #ffffff !important;">
                                Form Perekaman Dokumen
                            </h3>
                            <p class="text-sm mt-1 font-medium" style="color: #dbeafe !important;">
                                Lengkapi data arsip berikut. Setiap bagian telah disusun terpisah agar mudah dibaca dan diisi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FORM INPUT UTAMA --}}
            <form action="{{ route('archive.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-7">

                @csrf
                <input type="hidden" name="folder_id" value="{{ $folders->id }}">

                {{-- ======================================================== --}}
                {{-- CARD 1: IDENTITAS UTAMA ARSIP (LEGA & LAPANG)           --}}
                {{-- ======================================================== --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border-2 border-slate-200 space-y-6">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-700 text-white flex items-center justify-center font-black text-base shadow-md shadow-blue-700/30">
                            1
                        </div>
                        <div>
                            <h4 class="text-lg font-extrabold text-slate-900">Identitas Utama Dokumen</h4>
                            <p class="text-xs font-medium text-slate-500">Judul arsip, nomor urut item, dan ringkasan isi berkas</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        {{-- Nama Arsip --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">
                                Nama File / Judul Arsip <span class="text-xs font-medium text-slate-500">(Opsional jika ingin otomatis memakai nama file asli)</span>
                            </label>
                            <input type="text"
                                name="file_name"
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-bold text-base border-2 border-slate-300 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                placeholder="Masukkan nama berkas arsip...">
                        </div>

                        {{-- No Item & Kode Klasifikasi (Sejajar Rapi) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    No. Item Berkas
                                </label>
                                <input type="number"
                                    name="no_item"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Contoh: 1">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Kode Klasifikasi
                                </label>
                                <input type="text"
                                    name="kode_klasifikasi"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Contoh: KU.01.02 / RT.02.01">
                            </div>
                        </div>

                        {{-- Uraian (1 Baris Penuh, Tidak Sempit Lagi) --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">
                                Uraian / Keterangan Isi Dokumen
                            </label>
                            <textarea name="uraian"
                                rows="3"
                                placeholder="Tuliskan uraian ringkasan isi dokumen ini..."
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-semibold text-sm border-2 border-slate-300 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal"></textarea>
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- CARD 2: PENGINDEKSAN & KEAMANAN                         --}}
                {{-- ======================================================== --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border-2 border-slate-200 space-y-6">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-700 text-white flex items-center justify-center font-black text-base shadow-md shadow-blue-700/30">
                            2
                        </div>
                        <div>
                            <h4 class="text-lg font-extrabold text-slate-900">Klasifikasi & Pengindeksan</h4>
                            <p class="text-xs font-medium text-slate-500">Kata kunci indeks dan tingkat keamanan berkas</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        {{-- Indeks 1 --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">
                                Indeks 1 (Utama)
                            </label>
                            <input type="text"
                                name="indeks1"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                placeholder="Indeks 1">
                        </div>

                        {{-- Indeks 2 --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">
                                Indeks 2 (Sub)
                            </label>
                            <input type="text"
                                name="indeks2"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                placeholder="Indeks 2">
                        </div>

                        {{-- Klasifikasi Keamanan --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">
                                Tingkat Keamanan
                            </label>
                            <input type="text"
                                name="klasifikasi_keamanan"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                placeholder="Biasa / Terbatas / Rahasia">
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- CARD 3: DOKUMEN TRANSAKSI & KEUANGAN (2-3 KOLOM RAPI)   --}}
                {{-- ======================================================== --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border-2 border-slate-200 space-y-6">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-700 text-white flex items-center justify-center font-black text-base shadow-md shadow-blue-700/30">
                            3
                        </div>
                        <div>
                            <h4 class="text-lg font-extrabold text-slate-900">Data Transaksi & Keuangan (SP2D / SPM / SPBy)</h4>
                            <p class="text-xs font-medium text-slate-500">Nomor berkas transaksi keuangan, nominal, dan tanggal pembukuan</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        {{-- Baris 1: No SPBy, No SPM, Jenis SPM --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    No. SPBy
                                </label>
                                <input type="text"
                                    name="no_spby"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Nomor SPBy">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    No. SPM
                                </label>
                                <input type="text"
                                    name="no_spm"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Nomor SPM">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Jenis SPM
                                </label>
                                <input type="text"
                                    name="jenis_spm"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="UP / TUP / LS / GU">
                            </div>
                        </div>

                        {{-- Baris 2: Nilai SP2D & No Invoice (2 Kolom Lega) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Nilai SP2D (Rupiah)
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-sm font-black text-slate-400">Rp</span>
                                    <input type="text"
                                        name="nilai_sp2d"
                                        class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-white text-slate-900 font-black text-base border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                        placeholder="0">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    No. Invoice / Faktur
                                </label>
                                <input type="text"
                                    name="no_invoice"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Nomor Faktur / Kuitansi">
                            </div>
                        </div>

                        {{-- Baris 3: Tanggal SP2D & Selesai (2 Kolom) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-1">
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Tanggal SP2D
                                </label>
                                <input type="date"
                                    name="tgl_sp2d"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Tanggal Selesai SP2D
                                </label>
                                <input type="date"
                                    name="tgl_selesai_sp2d"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all">
                            </div>
                        </div>

                        {{-- Baris 4: Tanggal Invoice & Tanggal Terima (2 Kolom) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Tanggal Invoice
                                </label>
                                <input type="date"
                                    name="tgl_invoice"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Tanggal Terima Berkas
                                </label>
                                <input type="date"
                                    name="tgl_terima"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- CARD 4: RETENSI, SPESIFIKASI & STATUS                    --}}
                {{-- ======================================================== --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border-2 border-slate-200 space-y-6">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-700 text-white flex items-center justify-center font-black text-base shadow-md shadow-blue-700/30">
                            4
                        </div>
                        <div>
                            <h4 class="text-lg font-extrabold text-slate-900">Masa Retensi & Status Berkas</h4>
                            <p class="text-xs font-medium text-slate-500">Masa simpan berkas aktif/inaktif dan kondisi fisik dokumen</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Tingkat Pertimbangan --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Tingkat Pertimbangan
                                </label>
                                <input type="text"
                                    name="tingkat_pertimbangan"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Asli / Tembusan / Salinan">
                            </div>

                            {{-- Jumlah Halaman --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Jumlah Halaman
                                </label>
                                <div class="relative">
                                    <input type="number"
                                        name="jumlah_halaman"
                                        class="w-full pr-16 pl-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                        placeholder="0">
                                    <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-500 pointer-events-none">Lembar</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Retensi Aktif --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Retensi Aktif (Tahun)
                                </label>
                                <div class="relative">
                                    <input type="number"
                                        name="retensi_arsip_aktif"
                                        class="w-full pr-16 pl-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                        placeholder="Jumlah tahun">
                                    <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-500 pointer-events-none">Tahun</span>
                                </div>
                            </div>

                            {{-- Retensi Inaktif --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Retensi Inaktif (Tahun)
                                </label>
                                <div class="relative">
                                    <input type="number"
                                        name="retensi_arsip_inaktif"
                                        class="w-full pr-16 pl-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                        placeholder="Jumlah tahun">
                                    <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-500 pointer-events-none">Tahun</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Nasib Akhir --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Nasib Akhir Arsip
                                </label>
                                <input type="text"
                                    name="nasib_akhir_arsip"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Musnah / Permanen">
                            </div>

                            {{-- Status Dokumen --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-800 mb-2">
                                    Status Dokumen
                                </label>
                                <input type="text"
                                    name="status"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Tersedia / Dipinjam">
                            </div>
                        </div>

                        {{-- Keterangan / Deskripsi (1 Baris Penuh) --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">
                                Keterangan Tambahan / Lokasi Fisik
                            </label>
                            <input type="text"
                                name="keterangan"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-semibold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                placeholder="Catatan fisik dokumen jika ada...">
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- CARD 5: UPLOAD BERKAS DIGITAL (PDF & EXCEL)              --}}
                {{-- ======================================================== --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border-2 border-slate-200 space-y-6">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-700 text-white flex items-center justify-center font-black text-base shadow-md shadow-blue-700/30">
                            5
                        </div>
                        <div>
                            <h4 class="text-lg font-extrabold text-slate-900">Unggah Berkas Digital (Scan PDF & Excel)</h4>
                            <p class="text-xs font-medium text-slate-500">Pilih lampiran dokumen PDF dan file Excel pendukung</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- ================= CARD UPLOAD PDF ================= --}}
                        <div class="rounded-2xl p-6 bg-red-50/50 border-2 border-dashed border-red-300 hover:border-red-600 transition-all duration-200">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-red-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-red-600/30">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h5 class="text-base font-extrabold text-slate-900">
                                        Upload Berkas PDF
                                    </h5>
                                    <p class="text-xs font-semibold text-slate-600 mt-0.5">Dapat memilih hingga 100 file PDF</p>

                                    <label for="file_archive"
                                        class="mt-3.5 inline-flex items-center gap-2 cursor-pointer px-4 py-2 rounded-xl bg-red-600 text-white font-bold text-xs shadow-md hover:bg-red-700 active:scale-95 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Pilih Berkas PDF
                                    </label>

                                    <input type="file"
                                        id="file_archive"
                                        name="file_archive[]"
                                        class="hidden"
                                        multiple
                                        accept=".pdf,application/pdf">

                                    <div class="mt-3 p-3 rounded-xl bg-white border border-red-200">
                                        <p id="pdf-file-info" class="text-xs font-bold text-slate-700 truncate block">
                                            Belum ada file dipilih
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ================= CARD UPLOAD EXCEL ================= --}}
                        <div class="rounded-2xl p-6 bg-emerald-50/50 border-2 border-dashed border-emerald-300 hover:border-emerald-600 transition-all duration-200">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-emerald-600/30">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h5 class="text-base font-extrabold text-slate-900">
                                        Upload Berkas Excel
                                    </h5>
                                    <p class="text-xs font-semibold text-slate-600 mt-0.5">Opsional (1 berkas spreadsheet)</p>

                                    <label for="file_excel"
                                        class="mt-3.5 inline-flex items-center gap-2 cursor-pointer px-4 py-2 rounded-xl bg-emerald-600 text-white font-bold text-xs shadow-md hover:bg-emerald-700 active:scale-95 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Pilih Berkas Excel
                                    </label>

                                    <input type="file"
                                        id="file_excel"
                                        name="file_excel"
                                        class="hidden"
                                        accept=".xlsx,.xls,.csv">

                                    <div class="mt-3 p-3 rounded-xl bg-white border border-emerald-200">
                                        <p id="excel-file-info" class="text-xs font-bold text-slate-700 truncate block">
                                            Belum ada file dipilih
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- FLOATING ACTION BAR 3D (TEGAS & TIDAK TERTUTUPI)         --}}
                {{-- ======================================================== --}}
                <div class="sticky bottom-6 z-20 bg-white rounded-2xl p-5 shadow-2xl border-2 border-slate-300 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 text-slate-700 text-xs font-bold">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span>Pastikan data arsip telah terisi dengan benar sebelum menekan tombol simpan.</span>
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto shrink-0">
                        {{-- Tombol Batal --}}
                        <a href="{{ route('folder.show', $folders->id) }}"
                            class="flex-1 sm:flex-none px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-slate-700 bg-slate-200 hover:bg-slate-300 border border-slate-300 active:scale-95 transition-all text-center">
                            Batal
                        </a>

                        {{-- Tombol Simpan 3D --}}
                        <button type="submit"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl text-white font-extrabold text-xs uppercase tracking-wider
                            bg-emerald-600 hover:bg-emerald-700 shadow-lg shadow-emerald-600/40 hover:-translate-y-0.5 active:scale-95 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Simpan Arsip</span>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    {{-- ===================================================== --}}
    {{-- JAVASCRIPT FILE UPLOAD --}}
    {{-- ===================================================== --}}

    <script>
        // ==============================
        // PDF
        // ==============================
        document.getElementById('file_archive').addEventListener('change', function () {

            const info = document.getElementById('pdf-file-info');
            const files = this.files;

            if (files.length === 0) {
                info.textContent = 'Belum ada file yang dipilih.';
                info.title = 'Belum ada file yang dipilih.';
                return;
            }

            if (files.length === 1) {
                info.textContent = files[0].name;
                info.title = files[0].name;
            } else {
                const names = Array.from(files).map(f => f.name).join(', ');
                info.textContent = files.length + ' file PDF dipilih (' + names + ')';
                info.title = names;
            }
        });


        // ==============================
        // EXCEL
        // ==============================
        document.getElementById('file_excel').addEventListener('change', function () {

            const info = document.getElementById('excel-file-info');
            const file = this.files[0];

            if (!file) {
                info.textContent = 'Belum ada file yang dipilih.';
                info.title = 'Belum ada file yang dipilih.';
                return;
            }

            info.textContent = file.name;
            info.title = file.name;
        });
    </script>

</x-app-layout>
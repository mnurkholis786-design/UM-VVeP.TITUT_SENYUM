<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Arsip') }}
        </h2>
    </x-slot>

    {{-- CONTAINER UTAMA --}}
    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- BAR NAVIGASI KEMBALI 3D --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
                <a href="{{ route('folder.show', $file->folder_id) }}"
                    class="inline-flex items-center gap-2.5 bg-white text-slate-800 px-4 py-2.5 rounded-xl border-2 border-slate-200
                    shadow-sm hover:border-amber-600 hover:text-amber-700 hover:shadow-md hover:-translate-y-0.5 active:scale-95 transition-all duration-200 w-fit">
                    <div class="w-6 h-6 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <span class="text-sm font-bold">Kembali ke Folder</span>
                </a>

                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl border border-slate-200 shadow-sm text-xs text-slate-700 font-semibold w-fit">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></span>
                    <span>Status: <span class="text-amber-800 font-black text-sm ml-1">Mode Edit Arsip</span></span>
                </div>
            </div>

            {{-- HERO BANNER TVRI DENGAN GRADASI 3D --}}
            <div class="relative overflow-hidden rounded-3xl p-7 sm:p-9 shadow-xl border border-blue-900/30"
                 style="background: linear-gradient(120deg, #002766 0%, #003A8F 52%, #0056C7 100%) !important; color: #ffffff !important;">

                {{-- Ambient Light 3D --}}
                <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 shadow-inner shrink-0">
                            <svg class="w-9 h-9 text-amber-300 drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full mb-1.5 border border-white/30"
                                  style="background: rgba(255, 255, 255, 0.2) !important; color: #ffffff !important;">
                                TVRI Kalsel • Perbarui Berkas Fisik
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black tracking-tight drop-shadow-sm text-white">
                                Edit Arsip Fisik
                            </h3>
                            <p class="text-blue-100 text-sm mt-0.5">
                                Sesuaikan data metadata, kode klasifikasi, serta ganti dokumen digital bila diperlukan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FORM CARD 3D --}}
            <form action="{{ route('archive.update', $file->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- ================= SECTION 1: IDENTITAS UTAMA ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-blue-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-blue-500/30">
                            1
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Identitas & Deskripsi Arsip</h4>
                            <p class="text-xs text-slate-500">Nama berkas utama serta ringkasan uraian isi dokumen</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 mt-6">
                        {{-- Nama Arsip --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Nama Arsip <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="file_name" value="{{ old('file_name', $file->file_name) }}" required
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-bold text-base border-2 border-slate-300 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal shadow-sm"
                                placeholder="Contoh: SPJ Honorarium Pengisi Acara...">
                        </div>

                        {{-- Uraian --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Uraian Informasi Arsip
                            </label>
                            <textarea name="uraian" rows="3"
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-semibold text-sm border-2 border-slate-300 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal shadow-sm"
                                placeholder="Tuliskan uraian ringkas mengenai isi arsip ini...">{{ old('uraian', $file->uraian) }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 2: KODE & INDEKS ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-indigo-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-indigo-500/30">
                            2
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Klasifikasi & Penomoran</h4>
                            <p class="text-xs text-slate-500">Kode klasifikasi, indeks arsip, dan nomor item dokumen</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-6">
                        {{-- Kode Klasifikasi --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Kode Klasifikasi
                            </label>
                            <input type="text" name="kode_klasifikasi" value="{{ old('kode_klasifikasi', $file->kode_klasifikasi) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Contoh: KU.02.03">
                        </div>

                        {{-- Indeks 1 --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Indeks 1
                            </label>
                            <input type="text" name="indeks1" value="{{ old('indeks1', $file->indeks1) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Indeks Primer">
                        </div>

                        {{-- Indeks 2 --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Indeks 2
                            </label>
                            <input type="text" name="indeks2" value="{{ old('indeks2', $file->indeks2) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Indeks Sekunder">
                        </div>

                        {{-- No Item --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                No Item
                            </label>
                            <input type="number" name="no_item" value="{{ old('no_item', $file->no_item) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="1, 2, ...">
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 3: INFORMASI KEUANGAN ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-emerald-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-emerald-500/30">
                            3
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Informasi Keuangan & SP2D</h4>
                            <p class="text-xs text-slate-500">Nomor berkas SPBY, SPM, dan nominal SP2D</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-6">
                        {{-- No SPBy --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                No SPBy
                            </label>
                            <input type="text" name="no_spby" value="{{ old('no_spby', $file->no_spby) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="No SPBy">
                        </div>

                        {{-- No SPM --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                No SPM
                            </label>
                            <input type="text" name="no_spm" value="{{ old('no_spm', $file->no_spm) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="No SPM">
                        </div>

                        {{-- Jenis SPM --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Jenis SPM
                            </label>
                            <input type="text" name="jenis_spm" value="{{ old('jenis_spm', $file->jenis_spm) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Jenis SPM">
                        </div>

                        {{-- Nilai SP2D --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Nilai SP2D
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-sm font-black text-slate-400 pointer-events-none">Rp</span>
                                <input type="text" name="nilai_sp2d" value="{{ old('nilai_sp2d', $file->nilai_sp2d) }}"
                                    class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-white text-slate-900 font-black text-base border-2 border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100 transition-all placeholder:text-slate-400 shadow-sm"
                                    placeholder="0">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 4: TANGGAL & INVOICE ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-cyan-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-cyan-500/30">
                            4
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Penanggalan & Invoice</h4>
                            <p class="text-xs text-slate-500">Rentang tanggal penyelesaian, invoice, dan penerimaan arsip</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-6">
                        {{-- Tanggal SP2D --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Tanggal SP2D
                            </label>
                            <input type="date" name="tgl_sp2d" value="{{ old('tgl_sp2d', $file->tgl_sp2d) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-cyan-600 focus:ring-4 focus:ring-cyan-100 transition-all shadow-sm">
                        </div>

                        {{-- Tanggal Selesai SP2D --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Tanggal Selesai SP2D
                            </label>
                            <input type="date" name="tgl_selesai_sp2d" value="{{ old('tgl_selesai_sp2d', $file->tgl_selesai_sp2d) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-cyan-600 focus:ring-4 focus:ring-cyan-100 transition-all shadow-sm">
                        </div>

                        {{-- Tanggal Invoice --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Tanggal Invoice
                            </label>
                            <input type="date" name="tgl_invoice" value="{{ old('tgl_invoice', $file->tgl_invoice) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-cyan-600 focus:ring-4 focus:ring-cyan-100 transition-all shadow-sm">
                        </div>

                        {{-- Tanggal Terima --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Tanggal Terima
                            </label>
                            <input type="date" name="tgl_terima" value="{{ old('tgl_terima', $file->tgl_terima) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-cyan-600 focus:ring-4 focus:ring-cyan-100 transition-all shadow-sm">
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 5: MANAJEMEN RETENSI ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-amber-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-amber-500/30">
                            5
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Retensi & Keamanan Arsip</h4>
                            <p class="text-xs text-slate-500">Masa simpan aktif/inaktif, nasib akhir, serta status arsip</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-6">
                        {{-- No Invoice --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                No Invoice
                            </label>
                            <input type="text" name="no_invoice" value="{{ old('no_invoice', $file->no_invoice) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="No Invoice">
                        </div>

                        {{-- Tingkat Pertimbangan --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Tingkat Pertimbangan
                            </label>
                            <input type="text" name="tingkat_pertimbangan" value="{{ old('tingkat_pertimbangan', $file->tingkat_pertimbangan) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Contoh: Asli / Salinan">
                        </div>

                        {{-- Jumlah Halaman --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Jumlah Halaman
                            </label>
                            <div class="relative">
                                <input type="number" name="jumlah_halaman" value="{{ old('jumlah_halaman', $file->jumlah_halaman) }}"
                                    class="w-full pr-16 pl-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                    placeholder="0">
                                <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-400 pointer-events-none">Lembar</span>
                            </div>
                        </div>

                        {{-- Retensi Arsip Aktif --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Retensi Aktif
                            </label>
                            <div class="relative">
                                <input type="number" name="retensi_arsip_aktif" value="{{ old('retensi_arsip_aktif', $file->retensi_arsip_aktif) }}"
                                    class="w-full pr-16 pl-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                    placeholder="2">
                                <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-400 pointer-events-none">Tahun</span>
                            </div>
                        </div>

                        {{-- Retensi Arsip Inaktif --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Retensi Inaktif
                            </label>
                            <div class="relative">
                                <input type="number" name="retensi_arsip_inaktif" value="{{ old('retensi_arsip_inaktif', $file->retensi_arsip_inaktif) }}"
                                    class="w-full pr-16 pl-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                    placeholder="5">
                                <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-400 pointer-events-none">Tahun</span>
                            </div>
                        </div>

                        {{-- Nasib Akhir Arsip --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Nasib Akhir Arsip
                            </label>
                            <input type="text" name="nasib_akhir_arsip" value="{{ old('nasib_akhir_arsip', $file->nasib_akhir_arsip) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Musnah / Permanen">
                        </div>

                        {{-- Klasifikasi Keamanan --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Klasifikasi Keamanan
                            </label>
                            <input type="text" name="klasifikasi_keamanan" value="{{ old('klasifikasi_keamanan', $file->klasifikasi_keamanan) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Terbatas / Rahasia">
                        </div>

                        {{-- Status Dokumen --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Status Dokumen
                            </label>
                            <input type="text" name="status" value="{{ old('status', $file->status) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Tersedia / Dipinjam">
                        </div>

                        {{-- Keterangan --}}
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-2">
                                Keterangan Tambahan
                            </label>
                            <input type="text" name="keterangan" value="{{ old('keterangan', $file->keterangan) }}"
                                class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-bold border-2 border-slate-300 focus:border-amber-600 focus:ring-4 focus:ring-amber-100 transition-all placeholder:text-slate-400 shadow-sm"
                                placeholder="Catatan fisik jika ada...">
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 6: UPLOAD FILE 3D ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-purple-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-purple-500/30">
                            6
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Perbarui Lampiran Berkas</h4>
                            <p class="text-xs text-slate-500">Pilih berkas baru jika ingin mengganti dokumen scan PDF atau file Excel</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                        {{-- ================= CARD PDF ================= --}}
                        <div class="rounded-2xl p-7 bg-red-50/50 border-2 border-dashed border-red-300 hover:border-red-600 transition-all duration-200 shadow-sm hover:shadow-md">
                            <div class="flex items-start gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-red-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-red-600/30">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 flex flex-col gap-3.5">
                                    <div>
                                        <h5 class="text-base font-extrabold text-slate-900 leading-tight">
                                            File PDF Arsip
                                        </h5>
                                        <p class="text-xs text-slate-500 mt-0.5">Dokumen scan fisik berkas arsip</p>
                                    </div>
                                    
                                    {{-- Info File Saat Ini --}}
                                    @if ($file->file_path)
                                        <div class="text-xs text-emerald-800 bg-emerald-50 border border-emerald-200 py-2.5 px-3 rounded-xl truncate font-bold shadow-sm">
                                            📄 File Saat Ini: <span class="font-normal">{{ basename($file->file_path) }}</span>
                                        </div>
                                    @else
                                        <p class="text-xs font-semibold text-amber-600 py-1">Belum ada file PDF yang tersimpan.</p>
                                    @endif

                                    <div>
                                        <label for="file_archive"
                                            class="inline-flex items-center gap-2 cursor-pointer px-4 py-2.5 rounded-xl bg-red-600 text-white font-bold text-xs shadow-md hover:bg-red-700 active:scale-95 transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                            </svg>
                                            Ganti Berkas PDF
                                        </label>
                                    </div>

                                    <input type="file" id="file_archive" name="file_archive" class="hidden" accept=".pdf,application/pdf">

                                    <div class="p-3 rounded-xl bg-white border border-red-200 shadow-inner">
                                        <p id="pdf-file-info" class="text-xs font-bold text-slate-700 truncate block">
                                            Tidak ada file baru dipilih
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ================= CARD EXCEL ================= --}}
                        <div class="rounded-2xl p-7 bg-emerald-50/50 border-2 border-dashed border-emerald-300 hover:border-emerald-600 transition-all duration-200 shadow-sm hover:shadow-md">
                            <div class="flex items-start gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-emerald-600/30">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 flex flex-col gap-3.5">
                                    <div>
                                        <h5 class="text-base font-extrabold text-slate-900 leading-tight">
                                            File Excel Pendukung
                                        </h5>
                                        <p class="text-xs text-slate-500 mt-0.5">Lampiran spreadsheet dokumen jika ada</p>
                                    </div>

                                    {{-- Info File Saat Ini --}}
                                    @if ($file->excel_path)
                                        <div class="text-xs text-emerald-800 bg-emerald-50 border border-emerald-200 py-2.5 px-3 rounded-xl truncate font-bold shadow-sm">
                                            📊 File Saat Ini: <span class="font-normal">{{ basename($file->excel_path) }}</span>
                                        </div>
                                    @else
                                        <p class="text-xs font-semibold text-amber-600 py-1">Belum ada file Excel yang diunggah.</p>
                                    @endif

                                    <div>
                                        <label for="file_excel"
                                            class="inline-flex items-center gap-2 cursor-pointer px-4 py-2.5 rounded-xl bg-emerald-600 text-white font-bold text-xs shadow-md hover:bg-emerald-700 active:scale-95 transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                            </svg>
                                            {{ $file->excel_path ? 'Ganti File Excel' : 'Upload File Excel' }}
                                        </label>
                                    </div>

                                    <input type="file" id="file_excel" name="file_excel" class="hidden" accept=".xlsx,.xls,.csv">

                                    <div class="p-3 rounded-xl bg-white border border-emerald-200 shadow-inner">
                                        <p id="excel-file-info" class="text-xs font-bold text-slate-700 truncate block">
                                            Tidak ada file baru dipilih
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================= FOOTER / ACTION BAR 3D ================= --}}
                <div class="bg-white rounded-2xl p-5 shadow-lg border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 text-slate-600 text-xs font-bold">
                        <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856" />
                            </svg>
                        </div>
                        <span>Pastikan perubahan data telah benar sebelum menekan tombol update.</span>
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <a href="{{ route('folder.show', $file->folder_id) }}"
                            class="flex-1 sm:flex-none px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-slate-700 bg-slate-200 hover:bg-slate-300 border border-slate-300 active:scale-95 transition-all text-center">
                            Batal
                        </a>

                        {{-- Tombol Update 3D --}}
                        <button type="submit"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl text-white font-extrabold text-xs uppercase tracking-wider
                            bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 shadow-lg shadow-amber-500/40 hover:-translate-y-0.5 active:scale-95 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Update Arsip</span>
                        </button>
                    </div>
                </div>

            </form>
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
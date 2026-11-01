<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Detail Arsip') }}
        </h2>
    </x-slot>

    {{-- CONTAINER UTAMA --}}
    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- BAR NAVIGASI KEMBALI 3D --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
                <a href="{{ route('folder.show', $archives->folder_id) }}"
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
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600 animate-pulse"></span>
                    <span>Status: <span class="text-blue-800 font-black text-sm ml-1">Detail Berkas Fisik</span></span>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full mb-1.5 border border-white/30"
                                  style="background: rgba(255, 255, 255, 0.2) !important; color: #ffffff !important;">
                                TVRI Kalsel • Berkas Arsip Fisik
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black tracking-tight drop-shadow-sm text-white">
                                Informasi Lengkap Arsip
                            </h3>
                            <p class="text-blue-100 text-sm mt-0.5">
                                Seluruh informasi metadata, masa retensi, dan lampiran berkas yang tersimpan di sistem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">

                {{-- ================= SECTION 1: IDENTITAS & URAIAN ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-blue-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-blue-500/30">
                            1
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Identitas & Deskripsi Berkas</h4>
                            <p class="text-xs text-slate-500">Nama berkas fisik dan ringkasan isi dokumen</p>
                        </div>
                    </div>

                    <div class="space-y-4 mt-6">
                        {{-- Nama File --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-500 mb-1.5">
                                Nama Arsip
                            </label>
                            <div class="px-5 py-3.5 bg-slate-50/80 rounded-2xl border-2 border-slate-200/80 text-base font-black text-slate-900 shadow-sm leading-relaxed break-words">
                                {{ $archives->file_name ?? '-' }}
                            </div>
                        </div>

                        {{-- Uraian --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-500 mb-1.5">
                                Uraian Informasi Arsip
                            </label>
                            <div class="px-5 py-3.5 bg-slate-50/80 rounded-2xl border-2 border-slate-200/80 text-sm font-semibold text-slate-800 shadow-sm leading-relaxed min-h-[70px]">
                                {{ $archives->uraian ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 2: KLASIFIKASI & PENOMORAN ================= --}}
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

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                        {{-- Kode Klasifikasi --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Kode Klasifikasi</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->kode_klasifikasi ?? '-' }}</span>
                        </div>

                        {{-- Indeks 1 --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Indeks 1</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->indeks1 ?? '-' }}</span>
                        </div>

                        {{-- Indeks 2 --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Indeks 2</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->indeks2 ?? '-' }}</span>
                        </div>

                        {{-- No Item --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">No Item</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->no_item ?? '-' }}</span>
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
                            <p class="text-xs text-slate-500">Nomor berkas SPBY, SPM, jenis serta nilai nominal pembayaran</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                        {{-- No SPBy --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">No SPBy</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->no_spby ?? '-' }}</span>
                        </div>

                        {{-- No SPM --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">No SPM</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->no_spm ?? '-' }}</span>
                        </div>

                        {{-- Jenis SPM --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Jenis SPM</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->jenis_spm ?? '-' }}</span>
                        </div>

                        {{-- No SP2D --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">No SP2D</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->no_sp2d ?? '-' }}</span>
                        </div>

                        {{-- Jenis SP2D --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Jenis SP2D</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->jenis_sp2d ?? '-' }}</span>
                        </div>

                        {{-- Nilai SP2D --}}
                        <div class="p-4 bg-emerald-50/60 rounded-2xl border border-emerald-200 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-emerald-700 mb-1">Nilai SP2D</span>
                            <span class="text-base font-black text-emerald-800">
                                {{ $archives->nilai_sp2d ? (is_numeric($archives->nilai_sp2d) ? 'Rp ' . number_format($archives->nilai_sp2d, 0, ',', '.') : $archives->nilai_sp2d) : '-' }}
                            </span>
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
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Kronologi Tanggal & Invoice</h4>
                            <p class="text-xs text-slate-500">Tanggal penerbitan SP2D, nomor invoice, dan tanggal terima berkas</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                        {{-- Tanggal SP2D --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Tanggal SP2D</span>
                            <span class="text-sm font-extrabold text-slate-900">
                                {{ $archives->tgl_sp2d ? \Carbon\Carbon::parse($archives->tgl_sp2d)->format('d F Y') : '-' }}
                            </span>
                        </div>

                        {{-- Tanggal Selesai SP2D --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Tanggal Selesai SP2D</span>
                            <span class="text-sm font-extrabold text-slate-900">
                                {{ $archives->tgl_selesai_sp2d ? \Carbon\Carbon::parse($archives->tgl_selesai_sp2d)->format('d F Y') : '-' }}
                            </span>
                        </div>

                        {{-- Tanggal Invoice --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Tanggal Invoice</span>
                            <span class="text-sm font-extrabold text-slate-900">
                                {{ $archives->tgl_invoice ? \Carbon\Carbon::parse($archives->tgl_invoice)->format('d F Y') : '-' }}
                            </span>
                        </div>

                        {{-- Tanggal Terima --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Tanggal Terima</span>
                            <span class="text-sm font-extrabold text-slate-900">
                                {{ $archives->tgl_terima ? \Carbon\Carbon::parse($archives->tgl_terima)->format('d F Y') : '-' }}
                            </span>
                        </div>

                        {{-- No Invoice --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm sm:col-span-2 lg:col-span-4">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">No Invoice</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->no_invoice ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 5: RETENSI & MANAJEMEN ARSIP ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-amber-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-amber-500/30">
                            5
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Retensi & Status Arsip</h4>
                            <p class="text-xs text-slate-500">Masa simpan dokumen, klasifikasi keamanan, dan kondisi fisik</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                        {{-- Tingkat Pertimbangan --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Tingkat Pertimbangan</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->tingkat_pertimbangan ?? '-' }}</span>
                        </div>

                        {{-- Jumlah Halaman --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Jumlah Halaman</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->jumlah_halaman ? $archives->jumlah_halaman . ' lembar' : '-' }}</span>
                        </div>

                        {{-- Status --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Status Dokumen</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-blue-100 text-blue-800">
                                {{ $archives->status ?? '-' }}
                            </span>
                        </div>

                        {{-- Retensi Aktif --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Retensi Aktif</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->retensi_arsip_aktif ? $archives->retensi_arsip_aktif . ' tahun' : '-' }}</span>
                        </div>

                        {{-- Retensi Inaktif --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Retensi Inaktif</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->retensi_arsip_inaktif ? $archives->retensi_arsip_inaktif . ' tahun' : '-' }}</span>
                        </div>

                        {{-- Nasib Akhir --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Nasib Akhir Arsip</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->nasib_akhir_arsip ?? '-' }}</span>
                        </div>

                        {{-- Klasifikasi Keamanan --}}
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/80 shadow-sm sm:col-span-2 lg:col-span-3">
                            <span class="block text-[11px] font-black uppercase tracking-wider text-slate-500 mb-1">Klasifikasi Keamanan</span>
                            <span class="text-sm font-extrabold text-slate-900">{{ $archives->klasifikasi_keamanan ?? '-' }}</span>
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="mt-5 pt-4 border-t border-slate-100">
                        <label class="block text-xs font-black uppercase tracking-wider text-slate-500 mb-1.5">
                            Keterangan Tambahan / Lokasi Fisik
                        </label>
                        <div class="px-5 py-3.5 bg-slate-50/80 rounded-2xl border border-slate-200/80 text-sm font-semibold text-slate-800 shadow-sm min-h-[60px]">
                            {{ $archives->keterangan ?? '-' }}
                        </div>
                    </div>
                </div>

                {{-- ================= SECTION 6: FILE LAMPIRAN DIGITAL 3D ================= --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-lg shadow-slate-200/60 border border-slate-200/80 transition-all hover:shadow-xl duration-300">
                    <div class="flex items-center gap-3.5 pb-4 border-b-2 border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-purple-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-purple-500/30">
                            6
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-slate-800 tracking-tight">Dokumen Lampiran Digital</h4>
                            <p class="text-xs text-slate-500">Berkas scan PDF, file Excel pendukung, dan link cloud storage</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        {{-- FILE PDF --}}
                        <div class="rounded-2xl p-6 bg-red-50/50 border-2 border-red-200/80 shadow-sm hover:shadow-md transition-all duration-200">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-red-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-red-600/30">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h5 class="text-base font-extrabold text-slate-900 leading-tight">Dokumen PDF Arsip</h5>
                                    @if ($archives->file_path)
                                        <p class="text-xs text-slate-600 truncate mt-1.5 font-bold" title="{{ basename($archives->file_path) }}">
                                            📄 {{ basename($archives->file_path) }}
                                        </p>
                                        <div class="flex flex-wrap gap-2.5 mt-4">
                                            <a href="{{ route('archive.stream', $archives->id) }}" target="_blank"
                                                class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                Lihat
                                            </a>
                                            <a href="{{ route('archive.download', $archives->id) }}"
                                                class="inline-flex items-center gap-1.5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl shadow-md shadow-indigo-500/20 active:scale-95 transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                </svg>
                                                Download
                                            </a>
                                        </div>
                                    @else
                                        <p class="text-xs font-semibold text-rose-600 mt-2">File PDF belum diunggah</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- FILE EXCEL --}}
                        <div class="rounded-2xl p-6 bg-emerald-50/50 border-2 border-emerald-200/80 shadow-sm hover:shadow-md transition-all duration-200">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-emerald-600/30">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h5 class="text-base font-extrabold text-slate-900 leading-tight">File Excel Arsip Fisik</h5>
                                    @if ($archives->excel_path)
                                        <p class="text-xs text-slate-600 truncate mt-1.5 font-bold" title="{{ basename($archives->excel_path) }}">
                                            📊 {{ basename($archives->excel_path) }}
                                        </p>
                                        <div class="flex flex-wrap gap-2.5 mt-4">
                                            <a href="{{ route('archive.excel.view', $archives->id) }}" target="_blank"
                                                class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                Lihat
                                            </a>
                                            <a href="{{ route('archive.excel.download', $archives->id) }}"
                                                class="inline-flex items-center gap-1.5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl shadow-md shadow-indigo-500/20 active:scale-95 transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                </svg>
                                                Download
                                            </a>
                                        </div>
                                    @else
                                        <p class="text-xs font-semibold text-amber-600 mt-2">File Excel belum diunggah</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- KARTU GOOGLE DRIVE --}}
                        @if ($archives->link_arsip)
                            <div class="rounded-2xl p-6 bg-blue-50/70 border-2 border-blue-200/80 shadow-sm md:col-span-2">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-blue-600/30">
                                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM19 18H6c-2.21 0-4-1.79-4-4 0-2.05 1.53-3.76 3.56-3.97l1.07-.11.5-.95C8.08 7.14 9.94 6 12 6c2.62 0 4.88 1.86 5.39 4.43l.3 1.5 1.53.11c1.56.1 2.78 1.41 2.78 2.96 0 1.65-1.35 3-3 3z"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <h5 class="text-base font-extrabold text-slate-900 leading-tight">Berkas Cloud Storage (Google Drive)</h5>
                                            <p class="text-xs text-slate-500 mt-1 truncate max-w-md">{{ $archives->link_arsip }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ $archives->link_arsip }}" target="_blank"
                                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                                        <span>Buka Google Drive</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- ================= ACTION BUTTONS 3D ================= --}}
                <div class="bg-white rounded-2xl p-5 shadow-lg border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <span class="text-xs font-bold text-slate-500">Kelola dan lakukan perubahan pada berkas arsip ini jika diperlukan.</span>

                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        {{-- Edit --}}
                        <a href="{{ route('archive.edit', $archives->id) }}"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-7 py-3 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-amber-500/30 hover:-translate-y-0.5 active:scale-95 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Edit Arsip</span>
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('archive.destroy', $archives->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus arsip ini?')" class="flex-1 sm:flex-none">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 px-7 py-3 bg-gradient-to-r from-rose-600 to-red-600 hover:from-rose-700 hover:to-red-700 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-rose-600/30 hover:-translate-y-0.5 active:scale-95 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
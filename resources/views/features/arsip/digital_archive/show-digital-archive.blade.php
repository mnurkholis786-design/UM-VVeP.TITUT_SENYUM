<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg shadow-blue-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M4 6a2 2 0 012-2h7l5 5v9a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M13 4v5h5" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Detail Arsip Digital') }}
                </h2>
                <p class="text-sm text-gray-500 mt-0.5">
                    Informasi lengkap arsip digital yang tersimpan di sistem
                </p>
            </div>
        </div>
    </x-slot>

    @php
        $archiveFiles = $archive->file_path_archive ?? [];

        if (!is_array($archiveFiles)) {
            $archiveFiles = $archiveFiles ? [$archiveFiles] : [];
        }

        $kategori = $archive->kategori ?? '-';
        $status = $archive->status ?? '-';
    @endphp

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/50 py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ========================================================= --}}
            {{-- TOP ACTION --}}
            {{-- ========================================================= --}}

            <div class="flex flex-wrap items-center justify-between gap-4 mb-6">

                <a href="{{ route('year.show', $archive->category_id) }}"
                    class="group inline-flex items-center gap-2 px-4 py-2.5 bg-white/90 backdrop-blur border border-gray-200
                    text-gray-700 rounded-xl shadow-sm hover:shadow-md hover:-translate-y-0.5
                    hover:border-blue-300 hover:text-blue-700 transition-all duration-200">

                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>

                    <span class="font-semibold text-sm">
                        Kembali ke Arsip
                    </span>
                </a>

                <a href="{{ route('digital.export', $archive->id) }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                    bg-gradient-to-r from-emerald-500 to-green-600
                    text-white text-sm font-bold shadow-lg shadow-emerald-200
                    hover:from-emerald-600 hover:to-green-700
                    hover:-translate-y-0.5 active:scale-95 transition-all duration-200">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3M5 20h14a2 2 0 002-2V8.828a2 2 0 00-.586-1.414l-4.828-4.828A2 2 0 0014.172 2H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>

                    Export Excel
                </a>

            </div>


            {{-- ========================================================= --}}
            {{-- HERO --}}
            {{-- ========================================================= --}}

            <div class="relative overflow-hidden rounded-3xl mb-7
                bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-700
                shadow-2xl shadow-blue-200">

                <div class="absolute -top-24 -right-24 w-72 h-72 bg-white/10 rounded-full"></div>
                <div class="absolute -bottom-28 -left-20 w-80 h-80 bg-indigo-400/20 rounded-full"></div>

                <div class="relative p-7 sm:p-9">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="min-w-0">

                            <div class="inline-flex items-center gap-2 px-3 py-1.5 mb-4
                                rounded-full bg-white/15 border border-white/20 text-white text-xs font-bold">

                                <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>

                                ARSIP DIGITAL
                            </div>

                            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white break-words">
                                {{ $archive->archive_name ?? 'Nama Arsip Tidak Tersedia' }}
                            </h1>

                            <div class="flex flex-wrap items-center gap-3 mt-4">

                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                                    bg-white/15 border border-white/20 text-white text-sm">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M3 3h6l12 12a2 2 0 010 3l-3 3a2 2 0 01-3 0L3 9V3z" />
                                    </svg>

                                    {{ $archive->archive_code ?? 'Tanpa kode arsip' }}
                                </span>

                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                                    bg-white/15 border border-white/20 text-white text-sm">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>

                                    {{ $kategori }}
                                </span>

                            </div>

                        </div>

                        <div class="flex-shrink-0">

                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl
                                bg-white/15 border border-white/20 backdrop-blur-sm
                                flex items-center justify-center shadow-xl">

                                <svg class="w-14 h-14 sm:w-16 sm:h-16 text-white/90"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                                        d="M7 3h7l5 5v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                                        d="M14 3v5h5M8 13h8M8 17h6" />

                                </svg>

                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- STATUS SUMMARY --}}
            {{-- ========================================================= --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-7">

                {{-- Kategori --}}
                <div class="group bg-white rounded-2xl border border-gray-200 p-5 shadow-sm
                    hover:shadow-lg hover:-translate-y-1 transition-all duration-200">

                    <div class="flex items-center justify-between mb-4">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </div>

                        <span class="text-xs font-bold text-gray-400">
                            KATEGORI
                        </span>

                    </div>

                    <p class="text-sm font-bold text-gray-800 break-words">
                        {{ $kategori }}
                    </p>

                </div>


                {{-- File --}}
                <div class="group bg-white rounded-2xl border border-gray-200 p-5 shadow-sm
                    hover:shadow-lg hover:-translate-y-1 transition-all duration-200">

                    <div class="flex items-center justify-between mb-4">

                        <div class="w-11 h-11 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 3h7l5 5v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM14 3v5h5" />
                            </svg>
                        </div>

                        <span class="text-xs font-bold text-gray-400">
                            DOKUMEN
                        </span>

                    </div>

                    <p class="text-2xl font-black text-gray-800">
                        {{ count($archiveFiles) }}
                    </p>

                    <p class="text-xs text-gray-500 mt-1">
                        File PDF tersimpan
                    </p>

                </div>


                {{-- Status --}}
                <div class="group bg-white rounded-2xl border border-gray-200 p-5 shadow-sm
                    hover:shadow-lg hover:-translate-y-1 transition-all duration-200">

                    <div class="flex items-center justify-between mb-4">

                        <div class="w-11 h-11 rounded-xl bg-indigo-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>

                        <span class="text-xs font-bold text-gray-400">
                            STATUS
                        </span>

                    </div>

                    <span class="inline-flex items-center px-3 py-1.5 rounded-full
                        bg-indigo-50 text-indigo-700 border border-indigo-200
                        text-xs font-bold">

                        {{ $status }}
                    </span>

                </div>


                {{-- Nominal --}}
                <div class="group bg-white rounded-2xl border border-gray-200 p-5 shadow-sm
                    hover:shadow-lg hover:-translate-y-1 transition-all duration-200">

                    <div class="flex items-center justify-between mb-4">

                        <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-2.21 0-4 1.343-4 3s1.79 3 4 3 4 1.343 4 3-1.79 3-4 3m0-14V4m0 16v-2" />
                            </svg>
                        </div>

                        <span class="text-xs font-bold text-gray-400">
                            NOMINAL
                        </span>

                    </div>

                    <p class="text-lg font-black text-gray-800">
                        {{ $archive->nominal ? 'Rp ' . number_format($archive->nominal, 0, ',', '.') : '-' }}
                    </p>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- MAIN INFORMATION --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl overflow-hidden mb-7">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100
                    bg-gradient-to-r from-white to-blue-50/60">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 016 0M9 5h6" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-black text-gray-800">
                                Informasi Arsip
                            </h3>

                            <p class="text-sm text-gray-500">
                                Informasi klasifikasi dan identitas arsip
                            </p>
                        </div>

                    </div>

                </div>


                <div class="p-6 sm:p-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Nama --}}
                        <div class="md:col-span-2">
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Nama Archive
                            </label>

                            <div class="mt-2 p-4 rounded-xl bg-blue-50/70 border border-blue-100">
                                <p class="font-bold text-gray-800 break-words">
                                    {{ $archive->archive_name ?? '-' }}
                                </p>
                            </div>
                        </div>


                        {{-- Kode --}}
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Kode Arsip
                            </label>

                            <div class="info-box">
                                {{ $archive->archive_code ?? '-' }}
                            </div>
                        </div>


                        {{-- Divisi --}}
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Divisi Asal
                            </label>

                            <div class="info-box">
                                {{ $archive->from_division ?? ($archive->category_archive->divisi_name ?? '-') }}
                            </div>
                        </div>


                        {{-- Klasifikasi --}}
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Kode Klasifikasi
                            </label>

                            <div class="info-box">
                                {{ $archive->kode_klasifikasi ?? '-' }}
                            </div>
                        </div>


                        {{-- Indeks 1 --}}
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Indeks 1
                            </label>

                            <div class="info-box">
                                {{ $archive->indeks1 ?? '-' }}
                            </div>
                        </div>


                        {{-- Indeks 2 --}}
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Indeks 2
                            </label>

                            <div class="info-box">
                                {{ $archive->indeks2 ?? '-' }}
                            </div>
                        </div>


                        {{-- No Item --}}
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                No Item
                            </label>

                            <div class="info-box">
                                {{ $archive->no_item ?? '-' }}
                            </div>
                        </div>


                        {{-- Uraian --}}
                        <div class="md:col-span-2">
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Uraian
                            </label>

                            <div class="info-box min-h-[90px] whitespace-pre-line">
                                {{ $archive->uraian ?? '-' }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- FINANCIAL INFORMATION --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl overflow-hidden mb-7">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100
                    bg-gradient-to-r from-white to-emerald-50/60">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-2.21 0-4 1.343-4 3s1.79 3 4 3 4 1.343 4 3-1.79 3-4 3m0-14V4m0 16v-2M7 11H5m14 0h-2" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-black text-gray-800">
                                Informasi Keuangan
                            </h3>

                            <p class="text-sm text-gray-500">
                                Informasi SPBy, SPM dan SP2D
                            </p>
                        </div>

                    </div>

                </div>


                <div class="p-6 sm:p-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="field-label">No SPBy</label>
                            <div class="info-box">
                                {{ $archive->no_spby ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">No SPM</label>
                            <div class="info-box">
                                {{ $archive->no_spm ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Jenis SPM</label>
                            <div class="info-box">
                                {{ $archive->jenis_spm ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">No SP2D</label>
                            <div class="info-box">
                                {{ $archive->no_sp2d ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Nilai SP2D</label>
                            <div class="info-box font-bold text-emerald-700">
                                {{ $archive->nilai_sp2d ? 'Rp ' . number_format($archive->nilai_sp2d, 0, ',', '.') : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Jenis SP2D</label>
                            <div class="info-box">
                                {{ $archive->jenis_sp2d ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Tanggal SP2D</label>
                            <div class="info-box">
                                {{ $archive->tgl_sp2d ? \Carbon\Carbon::parse($archive->tgl_sp2d)->format('d F Y') : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Tanggal Selesai SP2D</label>
                            <div class="info-box">
                                {{ $archive->tgl_selesai_sp2d ? \Carbon\Carbon::parse($archive->tgl_selesai_sp2d)->format('d F Y') : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">No Invoice</label>
                            <div class="info-box">
                                {{ $archive->no_invoice ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Tanggal Invoice</label>
                            <div class="info-box">
                                {{ $archive->tgl_invoice ? \Carbon\Carbon::parse($archive->tgl_invoice)->format('d F Y') : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Tanggal Terima</label>
                            <div class="info-box">
                                {{ $archive->tgl_terima ? \Carbon\Carbon::parse($archive->tgl_terima)->format('d F Y') : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Nominal</label>
                            <div class="info-box font-bold text-emerald-700">
                                {{ $archive->nominal ? 'Rp ' . number_format($archive->nominal, 0, ',', '.') : '-' }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- ARCHIVE MANAGEMENT --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl overflow-hidden mb-7">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100
                    bg-gradient-to-r from-white to-purple-50/60">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-purple-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 7h14M5 11h14M5 15h9M5 19h14" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-black text-gray-800">
                                Manajemen Arsip
                            </h3>

                            <p class="text-sm text-gray-500">
                                Retensi, keamanan dan status arsip
                            </p>
                        </div>

                    </div>

                </div>


                <div class="p-6 sm:p-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="field-label">Tingkat Pertimbangan</label>
                            <div class="info-box">
                                {{ $archive->tingkat_pertimbangan ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Jumlah Halaman</label>
                            <div class="info-box">
                                {{ $archive->jumlah_halaman ? $archive->jumlah_halaman . ' lembar' : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Retensi Arsip Aktif</label>
                            <div class="info-box">
                                {{ $archive->retensi_arsip_aktif ? $archive->retensi_arsip_aktif . ' tahun' : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Retensi Arsip Inaktif</label>
                            <div class="info-box">
                                {{ $archive->retensi_arsip_inaktif ? $archive->retensi_arsip_inaktif . ' tahun' : '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Nasib Akhir Arsip</label>
                            <div class="info-box">
                                {{ $archive->nasib_akhir_arsip ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Klasifikasi Keamanan</label>
                            <div class="info-box">
                                {{ $archive->klasifikasi_keamanan ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Status</label>
                            <div class="info-box">
                                {{ $archive->status ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="field-label">Tanggal Pembuangan</label>
                            <div class="info-box">
                                {{ $archive->disposal_date ? \Carbon\Carbon::parse($archive->disposal_date)->format('d F Y') : '-' }}
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="field-label">Lokasi Simpan Server</label>
                            <div class="info-box">
                                {{ $archive->lokasi_simpan_server ?? '-' }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- PETUGAS --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl overflow-hidden mb-7">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100
                    bg-gradient-to-r from-white to-cyan-50/60">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-cyan-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-5a4 4 0 100-8 4 4 0 000 8zm6 2a3 3 0 10-6 0" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-black text-gray-800">
                                Informasi Petugas
                            </h3>

                            <p class="text-sm text-gray-500">
                                Pihak yang berkaitan dengan arsip
                            </p>
                        </div>

                    </div>

                </div>


                <div class="p-6 sm:p-8">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        <div class="rounded-2xl p-5 bg-purple-50 border border-purple-100
                            hover:shadow-md hover:-translate-y-0.5 transition-all">

                            <p class="text-xs font-bold text-purple-600 uppercase tracking-wide mb-2">
                                Pengaju
                            </p>

                            <p class="font-bold text-gray-800 break-words">
                                {{ $archive->submiter_name ?? ($archive->user->name ?? '-') }}
                            </p>

                        </div>


                        <div class="rounded-2xl p-5 bg-teal-50 border border-teal-100
                            hover:shadow-md hover:-translate-y-0.5 transition-all">

                            <p class="text-xs font-bold text-teal-600 uppercase tracking-wide mb-2">
                                Divisi Keuangan
                            </p>

                            <p class="font-bold text-gray-800 break-words">
                                {{ $archive->finance_officer_name ?? ($archive->finance_officer->name ?? '-') }}
                            </p>

                        </div>


                        <div class="rounded-2xl p-5 bg-blue-50 border border-blue-100
                            hover:shadow-md hover:-translate-y-0.5 transition-all">

                            <p class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-2">
                                Bendahara
                            </p>

                            <p class="font-bold text-gray-800 break-words">
                                {{ $archive->revenue_officer_name ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- FILE ARSIP --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl overflow-hidden mb-7">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100
                    bg-gradient-to-r from-white to-emerald-50/60">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-xl bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 3h7l5 5v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM14 3v5h5" />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-black text-gray-800">
                                    File Arsip Digital
                                </h3>

                                <p class="text-sm text-gray-500">
                                    {{ count($archiveFiles) }} file tersimpan
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="p-6 sm:p-8">

                    @if (count($archiveFiles) > 0)

                        <div class="space-y-4">

                            @foreach ($archiveFiles as $index => $filePath)

                                <div class="group rounded-2xl border border-emerald-100
                                    bg-gradient-to-r from-emerald-50 to-white
                                    p-5 hover:shadow-lg hover:border-emerald-200
                                    transition-all duration-200">

                                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                                        <div class="flex items-start gap-4 min-w-0">

                                            <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-emerald-100
                                                flex items-center justify-center">

                                                <svg class="w-6 h-6 text-emerald-600"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.8"
                                                        d="M7 3h7l5 5v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM14 3v5h5" />

                                                </svg>

                                            </div>


                                            <div class="min-w-0">

                                                <div class="flex flex-wrap items-center gap-2">

                                                    <span class="text-sm font-black text-gray-800">
                                                        File {{ $index + 1 }}
                                                    </span>

                                                    <span class="px-2.5 py-1 rounded-full
                                                        bg-emerald-100 text-emerald-700
                                                        text-[11px] font-bold">

                                                        PDF
                                                    </span>

                                                </div>

                                                <p class="text-xs text-gray-500 mt-1 break-all">
                                                    {{ basename($filePath) }}
                                                </p>

                                            </div>

                                        </div>


                                        <div class="flex flex-wrap items-center gap-2">

                                            <a href="{{ route('archive.digital.stream', [$archive->id, $index]) }}"
                                                target="_blank"
                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl
                                                bg-gradient-to-r from-blue-600 to-indigo-600
                                                text-white text-xs font-bold shadow-md shadow-blue-200
                                                hover:from-blue-700 hover:to-indigo-700
                                                hover:-translate-y-0.5 transition-all">

                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>

                                                Lihat
                                            </a>


                                            <a href="{{ route('archive.digital.download', [$archive->id, $index]) }}"
                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl
                                                bg-gradient-to-r from-slate-700 to-gray-800
                                                text-white text-xs font-bold shadow-md
                                                hover:from-slate-800 hover:to-gray-900
                                                hover:-translate-y-0.5 transition-all">

                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>

                                                Download
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="rounded-2xl border border-red-100 bg-red-50 p-6">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-red-100 flex items-center justify-center">

                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m6-2a8 8 0 11-16 0 8 8 0 0116 0z" />
                                    </svg>

                                </div>

                                <div>
                                    <p class="font-bold text-red-700">
                                        File belum tersedia
                                    </p>

                                    <p class="text-sm text-red-600 mt-1">
                                        Belum ada dokumen PDF yang tersimpan pada arsip ini.
                                    </p>
                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- Link Eksternal --}}
                    @if($archive->link_arsip)

                        <div class="mt-5 rounded-2xl border border-blue-100 bg-blue-50 p-5">

                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">

                                        <svg class="w-5 h-5 text-blue-600"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.828 10.172a4 4 0 010 5.656l-2 2a4 4 0 01-5.656-5.656l1-1" />

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.172 13.828a4 4 0 010-5.656l2-2a4 4 0 015.656 5.656l-1 1" />

                                        </svg>

                                    </div>

                                    <div>
                                        <p class="font-bold text-gray-800">
                                            Link Arsip Eksternal
                                        </p>

                                        <p class="text-xs text-gray-500">
                                            Arsip tersedia pada lokasi eksternal
                                        </p>
                                    </div>

                                </div>

                                <a href="{{ $archive->link_arsip }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5
                                    rounded-xl bg-blue-600 text-white text-sm font-bold
                                    shadow-md hover:bg-blue-700 hover:-translate-y-0.5 transition-all">

                                    Buka Link

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>

                                </a>

                            </div>

                        </div>

                    @endif

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- KETERANGAN --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl overflow-hidden mb-7">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100
                    bg-gradient-to-r from-white to-amber-50/60">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center">

                            <svg class="w-5 h-5 text-amber-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h8M8 14h5m-9 6h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-black text-gray-800">
                                Keterangan
                            </h3>

                            <p class="text-sm text-gray-500">
                                Catatan tambahan mengenai arsip
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-6 sm:p-8">

                    <div class="rounded-2xl bg-gray-50 border border-gray-200 p-5 min-h-[100px]">

                        <p class="text-sm leading-7 text-gray-700 whitespace-pre-line">
                            {{ $archive->keterangan ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- TIMESTAMP --}}
            {{-- ========================================================= --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-7">

                <div class="bg-white rounded-2xl border border-gray-200 shadow-lg p-5">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">

                            <svg class="w-5 h-5 text-blue-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                        <div>

                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">
                                Dibuat Pada
                            </p>

                            <p class="text-sm font-bold text-gray-800 mt-1">
                                {{ $archive->created_at ? $archive->created_at->format('d F Y, H:i') : '-' }}
                            </p>

                        </div>

                    </div>

                </div>


                <div class="bg-white rounded-2xl border border-gray-200 shadow-lg p-5">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-indigo-100 flex items-center justify-center">

                            <svg class="w-5 h-5 text-indigo-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                        <div>

                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">
                                Diperbarui Pada
                            </p>

                            <p class="text-sm font-bold text-gray-800 mt-1">
                                {{ $archive->updated_at ? $archive->updated_at->format('d F Y, H:i') : '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- ACTION BUTTON --}}
            {{-- ========================================================= --}}

            @if(Route::has('digital.archive.edit') && Route::has('digital.archive.destroy'))

                <div class="bg-white rounded-3xl border border-gray-200 shadow-xl p-6 mb-8">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                        <div>

                            <h3 class="font-black text-gray-800">
                                Kelola Arsip
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Ubah informasi atau hapus arsip digital ini.
                            </p>

                        </div>


                        <div class="flex flex-wrap items-center gap-3">

                            <a href="{{ route('digital.archive.edit', $archive->id) }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5
                                rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600
                                text-white text-sm font-bold shadow-lg shadow-blue-200
                                hover:from-blue-700 hover:to-indigo-700
                                hover:-translate-y-0.5 transition-all">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>

                                Edit
                            </a>


                            <form action="{{ route('digital.archive.destroy', $archive->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus arsip digital ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-5 py-2.5
                                    rounded-xl bg-gradient-to-r from-red-500 to-rose-600
                                    text-white text-sm font-bold shadow-lg shadow-red-200
                                    hover:from-red-600 hover:to-rose-700
                                    hover:-translate-y-0.5 active:scale-95 transition-all">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>

                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- STYLE --}}
    {{-- ========================================================= --}}

    <style>

        .info-box {
            margin-top: 0.5rem;
            padding: 0.9rem 1rem;
            min-height: 48px;
            display: flex;
            align-items: center;
            border-radius: 0.85rem;
            border: 1px solid #e5e7eb;
            background: linear-gradient(to right, #f8fafc, #ffffff);
            color: #374151;
            font-size: 0.875rem;
            font-weight: 600;
            word-break: break-word;
            transition: all 0.2s ease;
        }

        .info-box:hover {
            border-color: #bfdbfe;
            background: linear-gradient(to right, #eff6ff, #ffffff);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
        }

        .field-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 800;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        @media (max-width: 640px) {

            .info-box {
                font-size: 0.8rem;
            }

        }

    </style>

</x-app-layout>

<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#003A8F] via-[#0052CC] to-indigo-700 flex items-center justify-center shadow-lg shadow-blue-900/25">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Laporan & Rekapitulasi') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Monitoring rekapitulasi data arsip dan cetak laporan resmi PDF TVRI Kalsel
                </p>
            </div>
        </div>
    </x-slot>

    {{-- STYLE HALAMAN LAPORAN --}}
    <style>
        .report-3d-card {
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .report-3d-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px -10px rgba(15, 45, 90, .16);
        }

        /* BANNER: warna dibuat solid agar teks putih terbaca */
        .report-hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            color: #ffffff !important;
            background: linear-gradient(115deg, #082c69 0%, #0645a2 55%, #0875db 100%) !important;
            opacity: 1 !important;
        }

        .report-hero h1,
        .report-hero p,
        .report-hero span,
        .report-hero svg {
            opacity: 1;
        }

        .report-hero h1 {
            color: #ffffff !important;
        }

        .report-hero .hero-description {
            color: #eaf3ff !important;
        }

        .report-hero .hero-eyebrow {
            color: #ffffff !important;
            background: rgba(255, 255, 255, .13);
            border: 1px solid rgba(255, 255, 255, .30);
        }

        .report-hero .hero-total {
            color: #ffffff !important;
            background: rgba(4, 27, 75, .32) !important;
            border: 1px solid rgba(255, 255, 255, .28);
        }

        .report-hero .hero-total p {
            color: #ffffff !important;
        }

        /* FILTER TANGGAL */
        .report-filter-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr) auto;
            align-items: end;
            gap: 16px;
            width: 100%;
        }

        .report-filter-field {
            min-width: 0;
            width: 100%;
        }

        .report-filter-label {
            display: block;
            margin-bottom: 9px;
            color: #334155;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .report-filter-input {
            display: block;
            box-sizing: border-box;
            width: 100%;
            min-width: 0;
            height: 48px;
            padding: 0 14px;
            border: 1px solid #d8e1ef;
            border-radius: 12px;
            background: #f8fafc;
            color: #243247;
            font-family: inherit;
            font-size: 14px;
            font-weight: 500;
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .report-filter-input:focus {
            border-color: #3974ef;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
        }

        .report-filter-actions {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .report-filter-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 48px;
            padding: 0 18px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(120deg, #2563eb, #4f46e5);
            color: #ffffff !important;
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
            cursor: pointer;
            box-shadow: 0 5px 12px rgba(37, 99, 235, .20);
            transition: transform .2s, box-shadow .2s, background .2s;
        }

        .report-filter-button:hover {
            background: linear-gradient(120deg, #1d4ed8, #4338ca);
            box-shadow: 0 8px 18px rgba(37, 99, 235, .26);
            transform: translateY(-1px);
        }

        .report-filter-button:active {
            transform: scale(.98);
        }

        .report-reset-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 48px;
            padding: 0 14px;
            border: 1px solid #dbe3ef;
            border-radius: 12px;
            background: #f1f5f9;
            color: #475569 !important;
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
            text-decoration: none;
            transition: all .2s ease;
        }

        .report-reset-button:hover {
            background: #fff1f2;
            border-color: #fecdd3;
            color: #be123c !important;
        }

        @media (max-width: 900px) {
            .report-filter-grid {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            }

            .report-filter-actions {
                grid-column: 1 / -1;
                justify-content: flex-end;
            }
        }

        @media (max-width: 560px) {
            .report-filter-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 14px;
            }

            .report-filter-actions {
                grid-column: auto;
                justify-content: flex-start;
            }

            .report-filter-button,
            .report-reset-button {
                flex: 0 0 auto;
            }
        }
    </style>

    <div class="py-8 min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-7">

            {{-- HERO BANNER --}}
            <div class="report-hero rounded-3xl p-7 md:p-8 shadow-2xl shadow-blue-900/20 border border-blue-900/10">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="max-w-2xl">
                        <div class="hero-eyebrow inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase mb-3">
                            <span class="w-2 h-2 rounded-full bg-cyan-300"></span>
                            TVRI Kalimantan Selatan • Pusat Laporan
                        </div>

                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight leading-snug">
                            Laporan Eksekutif Kearsipan
                        </h1>

                        <p class="hero-description text-sm md:text-base mt-3 leading-relaxed">
                            Pilih rentang tanggal untuk memfilter arsip dan unduh laporan resmi dalam format PDF ber-watermark.
                        </p>
                    </div>

                    <div class="hero-total shrink-0 px-5 sm:px-6 py-4 rounded-2xl shadow-lg flex items-center gap-4">
                        <div class="w-12 h-12 shrink-0 rounded-xl bg-white/10 flex items-center justify-center border border-white/25">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider">Hasil Ditemukan</p>
                            <p class="text-3xl font-black mt-1 tracking-tight">
                                {{ method_exists($arsip, 'total') ? $arsip->total() : $arsip->count() }}
                            </p>
                            <p class="text-xs mt-1">Dokumen Arsip</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FILTER RENTANG TANGGAL --}}
            <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-7 shadow-lg shadow-slate-200/60">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-11 h-11 shrink-0 rounded-xl bg-blue-50 border border-blue-200 text-blue-700 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a2 2 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-lg font-extrabold text-slate-800">
                            Saring Berdasarkan Periode
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Tentukan tanggal awal dan akhir untuk menampilkan data
                        </p>
                    </div>
                </div>

                <form
                    method="GET"
                    action="{{ route('kepala.report') }}"
                    class="report-filter-grid"
                >
                    {{-- DARI TANGGAL --}}
                    <div class="report-filter-field">
                        <label for="from_date" class="report-filter-label">
                            Dari Tanggal
                        </label>
                        <input
                            type="date"
                            id="from_date"
                            name="from_date"
                            value="{{ request('from_date') }}"
                            max="{{ request('target_date') }}"
                            class="report-filter-input"
                        >
                    </div>

                    {{-- SAMPAI TANGGAL --}}
                    <div class="report-filter-field">
                        <label for="target_date" class="report-filter-label">
                            Sampai Tanggal
                        </label>
                        <input
                            type="date"
                            id="target_date"
                            name="target_date"
                            value="{{ request('target_date') }}"
                            min="{{ request('from_date') }}"
                            class="report-filter-input"
                        >
                    </div>

                    {{-- TOMBOL AKSI --}}
                    <div class="report-filter-actions">
                        <button type="submit" class="report-filter-button">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Terapkan
                        </button>

                        @if(request()->filled('from_date') || request()->filled('target_date'))
                            <a
                                href="{{ route('kepala.report') }}"
                                class="report-reset-button"
                                title="Hapus filter tanggal"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- KARTU CETAK LAPORAN PDF --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- LAPORAN ARSIP AKTIF --}}
                <a
                    href="{{ route('kepala.report_aktif', ['from_date' => request('from_date'), 'target_date' => request('target_date')]) }}"
                    target="_blank"
                    class="report-3d-card group relative overflow-hidden bg-white rounded-3xl border border-slate-200 p-6 sm:p-7 shadow-lg hover:border-blue-300 flex items-center justify-between gap-5"
                >
                    <div class="absolute left-0 top-3 bottom-3 w-1.5 bg-gradient-to-b from-blue-500 to-indigo-600 rounded-r-full"></div>

                    <div class="flex items-center gap-5 min-w-0 pl-1">
                        <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-700 text-white flex items-center justify-center shadow-lg shadow-blue-600/30 group-hover:scale-105 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <span class="inline-flex px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200 uppercase mb-1">
                                Dokumen PDF
                            </span>
                            <h4 class="font-extrabold text-base sm:text-lg text-slate-900 group-hover:text-blue-700">
                                Laporan Arsip Aktif
                            </h4>
                            <p class="text-sm text-slate-500 mt-1">
                                Cetak seluruh arsip yang berstatus aktif dalam sistem
                            </p>
                        </div>
                    </div>

                    <div class="w-11 h-11 shrink-0 rounded-xl bg-slate-50 group-hover:bg-blue-600 border border-slate-200 flex items-center justify-center transition-colors">
                        <svg class="w-5 h-5 text-slate-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </div>
                </a>

                {{-- LAPORAN ARSIP DISETUJUI --}}
                <a
                    href="{{ route('kepala.report_approved', ['from_date' => request('from_date'), 'target_date' => request('target_date')]) }}"
                    target="_blank"
                    class="report-3d-card group relative overflow-hidden bg-white rounded-3xl border border-slate-200 p-6 sm:p-7 shadow-lg hover:border-emerald-300 flex items-center justify-between gap-5"
                >
                    <div class="absolute left-0 top-3 bottom-3 w-1.5 bg-gradient-to-b from-emerald-400 to-teal-600 rounded-r-full"></div>

                    <div class="flex items-center gap-5 min-w-0 pl-1">
                        <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-700 text-white flex items-center justify-center shadow-lg shadow-emerald-600/30 group-hover:scale-105 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <span class="inline-flex px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200 uppercase mb-1">
                                Terverifikasi Sah
                            </span>
                            <h4 class="font-extrabold text-base sm:text-lg text-slate-900 group-hover:text-emerald-700">
                                Laporan Arsip Disetujui
                            </h4>
                            <p class="text-sm text-slate-500 mt-1">
                                Cetak arsip dengan kode klasifikasi lengkap yang disahkan
                            </p>
                        </div>
                    </div>

                    <div class="w-11 h-11 shrink-0 rounded-xl bg-slate-50 group-hover:bg-emerald-600 border border-slate-200 flex items-center justify-center transition-colors">
                        <svg class="w-5 h-5 text-slate-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </div>
                </a>

            </div>

            {{-- DAFTAR DOKUMEN ARSIP --}}
            <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-lg shadow-slate-200/50">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 mb-6 border-b border-slate-100 gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-indigo-50 border border-indigo-200 text-indigo-700 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold text-slate-800 tracking-tight">
                                Rincian Dokumen Arsip
                            </h3>
                            <p class="text-sm text-slate-500 mt-1">
                                Daftar arsip yang masuk dalam kriteria laporan
                            </p>
                        </div>
                    </div>

                    <span class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs border border-slate-200">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        Total: {{ method_exists($arsip, 'total') ? $arsip->total() : $arsip->count() }} Dokumen
                    </span>
                </div>

                <div class="space-y-3.5">
                    @php
                        $no = method_exists($arsip, 'firstItem')
                            ? ($arsip->firstItem() ?? 1)
                            : 1;
                    @endphp

                    @forelse ($arsip as $ar)
                        <div class="report-3d-card group relative bg-white rounded-2xl border border-slate-200 p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                            <div class="flex items-center gap-4 flex-1 min-w-0">
                                <div class="w-11 h-11 shrink-0 flex items-center justify-center rounded-xl bg-gradient-to-br from-[#003A8F] via-[#0056C7] to-indigo-700 text-white font-extrabold text-sm shadow-md">
                                    {{ $no++ }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <a
                                        href="{{ route('digital.show', $ar->id) }}"
                                        class="block text-base font-extrabold text-slate-800 hover:text-blue-700 transition-colors break-words"
                                    >
                                        {{ $ar->archive_name ?? 'Tanpa Nama Arsip' }}
                                    </a>

                                    <div class="flex flex-wrap items-center gap-2.5 mt-2 text-xs">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 font-semibold">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            {{ $ar->from_division ?? 'Umum' }}
                                        </span>

                                        <span class="inline-flex items-center gap-1.5 text-slate-500 font-medium">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            Dibuat: {{ $ar->created_at ? $ar->created_at->format('d M Y') : '-' }}
                                        </span>

                                        <span class="inline-flex items-center gap-1.5 text-slate-500 font-medium">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Status:
                                            <strong class="text-slate-700">{{ $ar->status ?? 'Aktif' }}</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="shrink-0 self-end sm:self-center">
                                <a
                                    href="{{ route('digital.show', $ar->id) }}"
                                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold text-xs shadow-md transition-all"
                                >
                                    <span>Lihat Detail</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16 bg-slate-50 border border-dashed border-slate-200 rounded-2xl">
                            <div class="w-16 h-16 bg-slate-200 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <p class="text-base font-bold text-slate-700">
                                Tidak Ada Data Ditemukan
                            </p>
                            <p class="text-sm text-slate-500 mt-1">
                                Coba sesuaikan rentang tanggal pada filter di atas untuk menemukan data.
                            </p>
                        </div>
                    @endforelse

                    @if (method_exists($arsip, 'links'))
                        <div class="pt-5 border-t border-slate-100">
                            {{ $arsip->withQueryString()->links() }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#003A8F] via-[#0052CC] to-indigo-700 flex items-center justify-center shadow-lg shadow-blue-900/25">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Dashboard Kepala Kantor') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Monitoring dan Pengawasan Sistem Pengarsipan TVRI Stasiun Kalimantan Selatan
                </p>
            </div>
        </div>
    </x-slot>

    {{-- STYLE TAMBAHAN --}}
    <style>
        .dashboard-3d-card {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .dashboard-3d-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 35px -5px rgba(0, 58, 143, 0.12),
                        0 10px 15px -5px rgba(0, 58, 143, 0.06);
        }

        /* Memastikan Hero Banner tetap memiliki kontras yang kuat */
        .kepala-hero-banner {
            background: linear-gradient(
                120deg,
                #002766 0%,
                #003A8F 52%,
                #0056C7 100%
            ) !important;
            color: #ffffff !important;
            isolation: isolate;
        }

        .kepala-hero-banner .hero-title {
            color: #ffffff !important;
        }

        .kepala-hero-banner .hero-description {
            color: #eaf2ff !important;
        }

        .kepala-hero-banner .hero-date {
            color: #e0ecff !important;
        }

        .kepala-hero-banner .hero-date svg {
            color: #bfdbfe !important;
        }

        .kepala-hero-banner .hero-total-card {
            background: rgba(255, 255, 255, 0.14) !important;
            border: 1px solid rgba(255, 255, 255, 0.30) !important;
            color: #ffffff !important;
        }

        .kepala-hero-banner .hero-total-label {
            color: #eaf2ff !important;
        }

        .kepala-hero-banner .hero-total-number {
            color: #ffffff !important;
        }

        .kepala-hero-banner .hero-total-caption {
            color: #e0ecff !important;
        }
    </style>

    <div class="py-8 min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-7">

            {{-- =========================================================
                 HERO BANNER 3D - KONTRAS DIPERBAIKI
            ========================================================== --}}
            <div class="kepala-hero-banner relative overflow-hidden rounded-3xl p-7 md:p-9 shadow-2xl shadow-blue-900/25 border border-blue-900/20">

                {{-- Ambient Light Background --}}
                <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-blue-400/15 blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 -left-20 w-80 h-80 rounded-full bg-indigo-400/15 blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="max-w-2xl">

                        {{-- Tag Badge --}}
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/25 text-xs font-bold tracking-wide uppercase mb-3 shadow-inner">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-white">TVRI Kalimantan Selatan • Eksekutif</span>
                        </div>

                        <h1 class="hero-title text-2xl sm:text-3xl md:text-4xl font-black tracking-tight leading-snug">
                            Selamat Datang, Kepala Kantor
                        </h1>

                        <p class="hero-description text-sm md:text-base mt-3 leading-relaxed">
                            Panel pengawasan terpadu untuk monitoring kelengkapan dokumen arsip fisik dan digital secara real-time.
                        </p>

                        {{-- Tanggal Hari Ini --}}
                        <div class="hero-date flex items-center gap-2 mt-5 text-xs font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ now()->isoFormat('dddd, D MMMM YYYY') }}</span>
                        </div>
                    </div>

                    {{-- Widget Ringkasan Total --}}
                    <div class="hero-total-card shrink-0 backdrop-blur-md p-5 md:p-6 rounded-2xl shadow-xl flex items-center gap-4 md:min-w-[265px]">
                        <div class="w-12 h-12 shrink-0 rounded-xl bg-white/15 flex items-center justify-center border border-white/25 shadow-inner">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>

                        <div>
                            <p class="hero-total-label text-xs font-bold uppercase tracking-wider">
                                Total Seluruh Arsip
                            </p>
                            <p class="hero-total-number text-3xl font-black mt-1 tracking-tight">
                                {{ $total_arsip ?? 0 }}
                            </p>
                            <p class="hero-total-caption text-xs mt-1">
                                Berkas tersimpan
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =========================================================
                 STATISTIK CARDS
            ========================================================== --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- CARD 1: ARSIP LENGKAP --}}
                <div class="dashboard-3d-card group relative bg-white/95 backdrop-blur-md rounded-2xl border border-slate-200/80 p-6 shadow-[0_8px_25px_-5px_rgba(16,185,129,0.08)] hover:border-emerald-300">
                    <div class="absolute left-0 top-3 bottom-3 w-1.5 bg-gradient-to-b from-emerald-400 to-teal-600 rounded-r-full"></div>

                    <div class="flex items-start justify-between">
                        <div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold mb-3 shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Terdata Rapi
                            </span>
                            <h3 class="text-sm font-bold text-slate-500">Arsip Lengkap</h3>
                            <p class="text-3xl sm:text-4xl font-black text-slate-800 mt-1 tracking-tight">
                                {{ $arsip_lengkap ?? 0 }}
                            </p>
                            <p class="text-xs text-slate-400 mt-1.5">Arsip dengan metadata klasifikasi lengkap</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-600 text-white flex items-center justify-center shadow-lg shadow-emerald-500/25 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- CARD 2: ARSIP BELUM LENGKAP --}}
                <div class="dashboard-3d-card group relative bg-white/95 backdrop-blur-md rounded-2xl border border-slate-200/80 p-6 shadow-[0_8px_25px_-5px_rgba(245,158,11,0.08)] hover:border-amber-300">
                    <div class="absolute left-0 top-3 bottom-3 w-1.5 bg-gradient-to-b from-amber-400 to-orange-500 rounded-r-full"></div>

                    <div class="flex items-start justify-between">
                        <div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-xs font-bold mb-3 shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-ping"></span>
                                Perlu Dilengkapi
                            </span>
                            <h3 class="text-sm font-bold text-slate-500">Arsip Belum Lengkap</h3>
                            <p class="text-3xl sm:text-4xl font-black text-slate-800 mt-1 tracking-tight">
                                {{ $arsip_belum_lengkap ?? 0 }}
                            </p>
                            <p class="text-xs text-slate-400 mt-1.5">Menunggu pengisian nomor & kode klasifikasi</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 text-white flex items-center justify-center shadow-lg shadow-amber-500/25 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- CARD 3: TOTAL ARSIP --}}
                <div class="dashboard-3d-card group relative bg-white/95 backdrop-blur-md rounded-2xl border border-slate-200/80 p-6 shadow-[0_8px_25px_-5px_rgba(0,58,143,0.08)] hover:border-blue-300">
                    <div class="absolute left-0 top-3 bottom-3 w-1.5 bg-gradient-to-b from-[#003A8F] to-[#0052CC] rounded-r-full"></div>

                    <div class="flex items-start justify-between">
                        <div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-bold mb-3 shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                                Total Arsip
                            </span>
                            <h3 class="text-sm font-bold text-slate-500">Semua Arsip Terdata</h3>
                            <p class="text-3xl sm:text-4xl font-black text-slate-800 mt-1 tracking-tight">
                                {{ $total_arsip ?? 0 }}
                            </p>
                            <p class="text-xs text-slate-400 mt-1.5">Jumlah seluruh arsip digital pada sistem</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#0052CC] text-white flex items-center justify-center shadow-lg shadow-blue-900/25 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =========================================================
                 DAFTAR ARSIP DIGITAL
            ========================================================== --}}
            <div class="bg-white/95 backdrop-blur-md rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-xl shadow-slate-200/50">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 mb-6 border-b border-slate-100 gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-blue-50 border border-blue-200 text-[#003A8F] flex items-center justify-center shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold text-slate-800 tracking-tight">Daftar Arsip Terbaru</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Monitoring arsip digital yang masuk ke dalam sistem</p>
                        </div>
                    </div>

                    <a href="{{ route('cabinet.index') }}" class="group inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 hover:bg-blue-50 text-slate-600 hover:text-[#003A8F] font-bold text-xs border border-slate-200/80 hover:border-blue-200 transition-all duration-200 shadow-sm">
                        <span>Buka Kabinet Arsip</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <div class="space-y-3.5">
                    @php $no = 1; @endphp

                    @forelse ($arsip as $ar)
                        <div class="dashboard-3d-card group relative bg-white rounded-2xl border border-slate-200/90 p-4 sm:p-5 shadow-[0_4px_15px_-3px_rgba(0,58,143,0.04)] hover:border-blue-300 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                            <div class="flex items-center gap-4 flex-1 min-w-0">
                                <div class="w-11 h-11 shrink-0 flex items-center justify-center rounded-xl bg-gradient-to-br from-[#003A8F] via-[#0056C7] to-indigo-700 text-white font-extrabold text-sm shadow-[0_6px_14px_rgba(0,58,143,0.25),inset_0_1px_1px_rgba(255,255,255,0.4)] group-hover:scale-105 transition-transform duration-200">
                                    {{ $no++ }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <a href="{{ route('digital.show', $ar->id) }}" class="block text-base font-extrabold text-slate-800 hover:text-[#003A8F] transition-colors truncate">
                                        {{ $ar->archive_name ?? 'Tanpa Nama Arsip' }}
                                    </a>

                                    <div class="flex flex-wrap items-center gap-2 mt-1.5 text-xs">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-lg bg-slate-100 text-slate-600 font-semibold">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            {{ $ar->from_division ?? 'Umum' }}
                                        </span>

                                        <span class="inline-flex items-center gap-1 text-slate-400 font-medium">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $ar->created_at ? $ar->created_at->format('d M Y') : '-' }}
                                        </span>

                                        @if (!empty($ar->kode_klasifikasi))
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 font-semibold text-[11px] border border-emerald-200">
                                                Lengkap
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-amber-50 text-amber-700 font-semibold text-[11px] border border-amber-200">
                                                Belum Lengkap
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="shrink-0 self-end sm:self-center">
                                <a href="{{ route('digital.show', $ar->id) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold text-xs shadow-md shadow-blue-600/20 hover:shadow-lg hover:shadow-blue-600/30 hover:-translate-y-0.5 active:scale-95 transition-all duration-200">
                                    <span>Lihat Detail</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16 bg-slate-50/70 border border-dashed border-slate-200 rounded-2xl">
                            <div class="w-16 h-16 bg-slate-200/70 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-inner">
                                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                            </div>
                            <p class="text-base font-bold text-slate-700">Belum Ada Arsip</p>
                            <p class="text-xs text-slate-400 mt-1">Data arsip yang masuk akan langsung muncul pada daftar ini.</p>
                        </div>
                    @endforelse

                    {{-- Paginasi --}}
                    @if (method_exists($arsip, 'links'))
                        <div class="pt-5 border-t border-slate-100">
                            {{ $arsip->links() }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- =========================================================
                 AKSES CEPAT PENGAWASAN
            ========================================================== --}}
            <div class="bg-white/95 backdrop-blur-md rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-9 h-9 rounded-xl bg-indigo-50 border border-indigo-200 text-indigo-700 flex items-center justify-center shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-800">Akses Cepat Pengawasan</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Shortcut Laporan --}}
                    <a href="{{ route('kepala.report') }}" class="group relative overflow-hidden p-5 rounded-2xl bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white shadow-lg shadow-blue-900/20 hover:shadow-xl hover:shadow-blue-900/30 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-base">Laporan & Rekapitulasi</h4>
                                <p class="text-xs text-blue-100 mt-0.5">Lihat dan cetak rekap data arsip</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:text-white group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    {{-- Shortcut Kabinet --}}
                    <a href="{{ route('cabinet.index') }}" class="group relative overflow-hidden p-5 rounded-2xl bg-gradient-to-br from-sky-50 via-blue-50 to-indigo-100 text-slate-900 border border-blue-200 shadow-lg shadow-blue-900/10 hover:from-sky-100 hover:via-blue-100 hover:to-indigo-200 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-900/15 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between focus:outline-none focus:ring-4 focus:ring-blue-300/60">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-white border border-blue-200 text-blue-700 flex items-center justify-center shadow-sm group-hover:scale-110 group-hover:bg-blue-100 transition-all duration-300">
                                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-base text-slate-900">Jelajahi Kabinet Arsip</h4>
                                <p class="text-xs text-blue-800 font-medium mt-0.5">Telusuri arsip berdasarkan kategori & tahun</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-blue-700 group-hover:text-indigo-900 group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

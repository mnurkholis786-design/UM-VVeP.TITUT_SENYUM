<x-app-layout>
    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0066CC] flex items-center justify-center shadow-lg shadow-blue-900/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-900 leading-tight">
                    Verifikasi Pengajuan (PPSPM)
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Pemeriksaan berkas dan pengesahan Surat Perintah Membayar (LS SPM)
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        .ppspm-page-bg {
            background:
                radial-gradient(circle at 10% 10%, rgba(0, 58, 143, .07), transparent 30%),
                radial-gradient(circle at 90% 20%, rgba(0, 102, 204, .06), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #f3f6fb 100%);
        }
        .ppspm-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #003A8F 0%, #0056B8 55%, #0074D9 100%);
            box-shadow: 0 20px 40px rgba(0, 58, 143, .20), inset 0 1px 0 rgba(255,255,255,.18);
        }
        .ppspm-hero::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 9999px;
            background: rgba(255,255,255,.08);
            top: -130px;
            right: -60px;
        }
        .ppspm-glass {
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.2);
            backdrop-filter: blur(8px);
        }
        .ppspm-card {
            background: rgba(255,255,255,.98);
            border: 1px solid rgba(226,232,240,.9);
            box-shadow: 0 6px 20px rgba(15,23,42,.04);
        }
        .ppspm-item {
            transition: all .2s ease;
        }
        .ppspm-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(15,23,42,.07);
            border-color: rgba(0,58,143,.3);
            background: #ffffff;
        }
        .ppspm-tab {
            position: relative;
            transition: all .2s ease;
        }
        .ppspm-tab.active::after {
            content: "";
            position: absolute;
            left: 8px;
            right: 8px;
            bottom: -1px;
            height: 3px;
            border-radius: 9999px 9999px 0 0;
            background: linear-gradient(90deg, #003A8F, #0074D9);
        }
    </style>

    <div class="ppspm-page-bg min-h-screen py-7" x-data="{ tab: '{{ request()->get('tab', 'semua') }}' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ================= HERO BANNER ================= --}}
            <div class="ppspm-hero rounded-3xl p-7 md:p-8 text-white">
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 ppspm-glass rounded-full px-3 py-1 mb-3">
                            <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
                            <span class="text-xs font-semibold tracking-wide uppercase">
                                MEJA KERJA PPSPM
                            </span>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight">
                            Daftar Pengajuan Anggaran
                        </h1>
                        <p class="text-white/85 text-sm md:text-base mt-2 max-w-2xl leading-relaxed">
                            Pilih berkas pengajuan bertipe <strong>LS SPM</strong> untuk diperiksa dan disahkan penerbitan Surat Perintah Membayar.
                        </p>
                    </div>

                    <div class="hidden sm:flex w-16 h-16 rounded-2xl ppspm-glass items-center justify-center shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- ================= SEARCH & FILTER ================= --}}
            <div class="ppspm-card rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-[#003A8F] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm md:text-base">Pencarian & Filter Pengajuan</h3>
                        <p class="text-xs text-gray-500">Cari berdasarkan kata kunci judul pengajuan atau rentang tanggal</p>
                    </div>
                </div>

                <form method="GET" action="{{ route('validation.search') }}" class="space-y-4">
                    {{-- Search Input --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">
                            Kata Kunci Pengajuan
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:bg-white focus:ring-2 focus:ring-[#003A8F]/20 focus:border-[#003A8F] transition"
                                placeholder="Contoh: Gaji Pegawai, Honor Narasumber, Kegiatan...">
                        </div>
                    </div>

                    {{-- Date Filter & Buttons --}}
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-3 items-end">
                        <div class="lg:col-span-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">
                                Mulai Tanggal
                            </label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="block w-full px-3.5 py-2.5 border border-gray-200 rounded-xl bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-[#003A8F]/20 focus:border-[#003A8F] transition">
                        </div>

                        <div class="lg:col-span-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">
                                Sampai Tanggal
                            </label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                class="block w-full px-3.5 py-2.5 border border-gray-200 rounded-xl bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-[#003A8F]/20 focus:border-[#003A8F] transition">
                        </div>

                        <div class="lg:col-span-6 flex gap-2">
                            <a href="{{ url()->current() }}"
                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset
                            </a>

                            <button type="submit"
                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-5 py-2.5 bg-gradient-to-r from-[#003A8F] to-[#0066CC] hover:from-[#002f73] hover:to-[#005bb8] text-white font-semibold rounded-xl shadow-md shadow-blue-900/20 transition text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Terapkan Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- ================= CARD TABS UTAMA ================= --}}
            <div class="ppspm-card rounded-2xl overflow-hidden">
                
                {{-- BILAH 4 TABS --}}
                <div class="overflow-x-auto border-b border-gray-200 bg-gray-50/60 px-4">
                    <nav class="flex min-w-max gap-2" aria-label="Tabs">
                        
                        {{-- 0. Tab Semua Pengajuan --}}
                        <button type="button" @click="tab = 'semua'"
                            :class="tab === 'semua' ? 'text-[#003A8F] active font-bold' : 'text-gray-500 hover:text-gray-800'"
                            class="ppspm-tab flex items-center gap-2 px-4 py-4 text-xs md:text-sm whitespace-nowrap">
                            <span class="w-8 h-8 rounded-xl flex items-center justify-center"
                                :class="tab === 'semua' ? 'bg-blue-100 text-[#003A8F]' : 'bg-gray-100 text-gray-500'">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </span>
                            <span>Semua Pengajuan</span>
                            <span class="px-2 py-0.5 rounded-full text-xs font-bold"
                                :class="tab === 'semua' ? 'bg-blue-100 text-[#003A8F]' : 'bg-gray-200 text-gray-600'">
                                {{ $semua->total() }}
                            </span>
                        </button>

                        {{-- 1. Tab Menunggu Validasi (LS SPM) --}}
                        <button type="button" @click="tab = 'menunggu'"
                            :class="tab === 'menunggu' ? 'text-[#003A8F] active font-bold' : 'text-gray-500 hover:text-gray-800'"
                            class="ppspm-tab flex items-center gap-2 px-4 py-4 text-xs md:text-sm whitespace-nowrap">
                            <span class="w-8 h-8 rounded-xl flex items-center justify-center"
                                :class="tab === 'menunggu' ? 'bg-amber-100 text-amber-600' : 'bg-gray-100 text-gray-500'">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <span>Menunggu Validasi</span>
                            <span class="px-2 py-0.5 rounded-full text-xs font-bold"
                                :class="tab === 'menunggu' ? 'bg-amber-100 text-amber-700' : 'bg-gray-200 text-gray-600'">
                                {{ $pengajuans->total() }}
                            </span>
                        </button>

                        {{-- 2. Tab Telah Disahkan --}}
                        <button type="button" @click="tab = 'selesai'"
                            :class="tab === 'selesai' ? 'text-[#003A8F] active font-bold' : 'text-gray-500 hover:text-gray-800'"
                            class="ppspm-tab flex items-center gap-2 px-4 py-4 text-xs md:text-sm whitespace-nowrap">
                            <span class="w-8 h-8 rounded-xl flex items-center justify-center"
                                :class="tab === 'selesai' ? 'bg-blue-100 text-[#003A8F]' : 'bg-gray-100 text-gray-500'">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <span>Telah Disahkan</span>
                            <span class="px-2 py-0.5 rounded-full text-xs font-bold"
                                :class="tab === 'selesai' ? 'bg-blue-100 text-[#003A8F]' : 'bg-gray-200 text-gray-600'">
                                {{ $my_proses->total() }}
                            </span>
                        </button>

                        {{-- 3. Tab Sudah Diarsipkan --}}
                        <button type="button" @click="tab = 'arsip'"
                            :class="tab === 'arsip' ? 'text-[#003A8F] active font-bold' : 'text-gray-500 hover:text-gray-800'"
                            class="ppspm-tab flex items-center gap-2 px-4 py-4 text-xs md:text-sm whitespace-nowrap">
                            <span class="w-8 h-8 rounded-xl flex items-center justify-center"
                                :class="tab === 'arsip' ? 'bg-emerald-100 text-emerald-600' : 'bg-gray-100 text-gray-500'">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </span>
                            <span>Sudah Diarsipkan</span>
                            <span class="px-2 py-0.5 rounded-full text-xs font-bold"
                                :class="tab === 'arsip' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-200 text-gray-600'">
                                {{ $diarsipkan->total() }}
                            </span>
                        </button>

                    </nav>
                </div>

                {{-- ISI KONTEN TAB --}}
                <div class="p-5 md:p-6">
                    
                    {{-- ================= TAB 0: SEMUA PENGAJUAN ================= --}}
                    <div x-show="tab === 'semua'" x-transition.opacity>
                        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
                            <div>
                                <h3 class="text-base font-bold text-gray-900">Semua Pengajuan Anggaran</h3>
                                <p class="text-xs text-gray-500">Seluruh dokumen yang tercatat dalam perbendaharaan</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-[#003A8F] border border-blue-200">
                                Total: {{ $semua->total() }}
                            </span>
                        </div>

                        <div class="space-y-3">
                            @php 
                                $no = ($semua->currentPage() - 1) * $semua->perPage() + 1; 
                            @endphp
                            @forelse ($semua as $item)
                                @php
                                    $isLS = $item->payment_method && str_contains(strtoupper($item->payment_method->payment_method_name), 'LS');
                                @endphp
                                <a href="{{ route('validation.show', $item->id) }}"
                                   class="ppspm-item flex flex-col md:flex-row md:items-center gap-4 p-4 bg-white rounded-2xl border border-gray-200 block">
                                    
                                    {{-- Nomor --}}
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center text-white font-extrabold text-base shadow-md" style="background: linear-gradient(135deg, #003A8F, #0066CC);">
                                        {{ $no++ }}
                                    </div>

                                    {{-- Detail Pengajuan --}}
                                    <div class="flex-1 min-w-0">
                                        <div class="font-bold text-gray-900 hover:text-[#003A8F] transition truncate">
                                            {{ $item->budget_submission_name }}
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 mt-1 text-xs text-gray-500">
                                            <div>Diajukan oleh: <strong class="text-gray-700">{{ $item->user->name ?? '-' }}</strong> ({{ $item->user->role ?? '-' }})</div>
                                            <div>Nominal: <strong class="text-gray-900">{{ $item->nominal ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '-' }}</strong></div>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-2 mt-2.5">
                                            {{-- Badge Metode --}}
                                            @if ($isLS)
                                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                                    📄 LS SPM
                                                </span>
                                            @else
                                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                    💵 UP Bendahara
                                                </span>
                                            @endif

                                            {{-- Status Berkas Lengkap --}}
                                            @if($item->requirements_status === 'Lengkap')
                                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-100 text-emerald-700">✓ Berkas Lengkap</span>
                                            @elseif($item->requirements_status === 'Belum Lengkap')
                                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-rose-100 text-rose-700">Belum Lengkap</span>
                                            @else
                                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-600">Belum Diperiksa</span>
                                            @endif

                                            {{-- Status Alur PPSPM --}}
                                            @if ($item->is_archive == 1)
                                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-100 text-emerald-800">✓ Selesai & Diarsipkan</span>
                                            @elseif ($item->verification_status == 1)
                                                @if ($isLS)
                                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-100 text-[#003A8F]">✓ Disahkan PPSPM</span>
                                                @else
                                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-teal-100 text-teal-800">Siap Dicairkan (UP)</span>
                                                @endif
                                            @elseif ($item->requirements_status === 'Lengkap' && $item->verification_status == 0)
                                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800 animate-pulse">Menunggu Validasi PPSPM</span>
                                            @endif

                                            <span class="text-[11px] text-gray-400">
                                                {{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Arrow Icon --}}
                                    <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 group-hover:bg-[#003A8F] group-hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                    <p class="text-sm font-semibold text-gray-500">Tidak ada data pengajuan ditemukan.</p>
                                </div>
                            @endforelse

                            <div class="mt-4">
                                {{ $semua->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>

                    {{-- ================= TAB 1: MENUNGGU VALIDASI (LS SPM) ================= --}}
                    <div x-show="tab === 'menunggu'" x-transition.opacity>
                        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
                            <div>
                                <h3 class="text-base font-bold text-gray-900">Pengajuan Siap Divalidasi</h3>
                                <p class="text-xs text-gray-500">Dokumen LS SPM yang telah lengkap diperiksa Keuangan dan menanti SPM</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                                {{ $pengajuans->total() }} Menunggu
                            </span>
                        </div>

                        <div class="space-y-3">
                            @php 
                                $no = ($pengajuans->currentPage() - 1) * $pengajuans->perPage() + 1; 
                            @endphp
                            @forelse ($pengajuans as $pengajuan)
                                <a href="{{ route('validation.show', $pengajuan->id) }}"
                                   class="ppspm-item flex flex-col md:flex-row md:items-center gap-4 p-4 bg-amber-50/40 rounded-2xl border border-amber-200 block">
                                    
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center text-white font-extrabold text-base shadow-md" style="background: linear-gradient(135deg, #d97706, #b45309);">
                                        {{ $no++ }}
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <div class="font-bold text-gray-900 hover:text-amber-700 transition truncate">
                                            {{ $pengajuan->budget_submission_name }}
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 mt-1 text-xs text-gray-500">
                                            <div>Diajukan oleh: <strong class="text-gray-700">{{ $pengajuan->user->name ?? '-' }}</strong> ({{ $pengajuan->user->role ?? '-' }})</div>
                                            <div>Nominal: <strong class="text-gray-900">{{ $pengajuan->nominal ? 'Rp ' . number_format($pengajuan->nominal, 0, ',', '.') : '-' }}</strong></div>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-2 mt-2.5">
                                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                                📄 LS SPM
                                            </span>
                                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800 animate-pulse">
                                                Siap Divalidasi PPSPM
                                            </span>
                                            <span class="text-[11px] text-gray-400">
                                                {{ $pengajuan->created_at ? $pengajuan->created_at->diffForHumans() : '-' }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 inline-flex items-center gap-1.5 px-4 py-2 bg-[#003A8F] hover:bg-[#002f73] text-white text-xs font-bold rounded-xl shadow-sm transition">
                                        Periksa Berkas
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                    <div class="w-12 h-12 mx-auto mb-2 text-emerald-500 bg-emerald-50 rounded-2xl flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-bold text-gray-700">Semua Beres!</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Tidak ada antrean dokumen LS SPM yang menunggu tanda tangan PPSPM.</p>
                                </div>
                            @endforelse

                            <div class="mt-4">
                                {{ $pengajuans->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>

                    {{-- ================= TAB 2: TELAH DISAHKAN ================= --}}
                    <div x-show="tab === 'selesai'" x-transition.opacity>
                        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
                            <div>
                                <h3 class="text-base font-bold text-gray-900">Dokumen Telah Disahkan (Menunggu Pencairan)</h3>
                                <p class="text-xs text-gray-500">SPM telah diterbitkan dan saat ini berada di meja Bendahara untuk pencairan</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-[#003A8F]">
                                {{ $my_proses->total() }} Dokumen
                            </span>
                        </div>

                        <div class="space-y-3">
                            @php 
                                $no = ($my_proses->currentPage() - 1) * $my_proses->perPage() + 1; 
                            @endphp
                            @forelse ($my_proses as $selesai)
                                <a href="{{ route('validation.show', $selesai->id) }}"
                                   class="ppspm-item flex flex-col md:flex-row md:items-center gap-4 p-4 bg-gray-50/70 rounded-2xl border border-gray-200 block">
                                    
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center text-white font-extrabold text-base shadow-md" style="background: linear-gradient(135deg, #003A8F, #0066CC);">
                                        {{ $no++ }}
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <div class="font-bold text-gray-900 hover:text-[#003A8F] transition truncate">
                                            {{ $selesai->budget_submission_name }}
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 mt-1 text-xs text-gray-500">
                                            <div>Diajukan oleh: <strong class="text-gray-700">{{ $selesai->user->name ?? '-' }}</strong> ({{ $selesai->user->role ?? '-' }})</div>
                                            <div>Nominal: <strong class="text-gray-900">{{ $selesai->nominal ? 'Rp ' . number_format($selesai->nominal, 0, ',', '.') : '-' }}</strong></div>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-2 mt-2.5">
                                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                                📄 LS SPM
                                            </span>
                                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                                                ✓ Disahkan PPSPM
                                            </span>
                                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-amber-100 text-amber-800">
                                                Menunggu Tindakan Bendahara
                                            </span>
                                            <span class="text-[11px] text-gray-400">
                                                {{ $selesai->updated_at ? $selesai->updated_at->diffForHumans() : '-' }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 group-hover:bg-[#003A8F] group-hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                    <p class="text-sm font-semibold text-gray-500">Belum ada dokumen yang disahkan.</p>
                                </div>
                            @endforelse

                            <div class="mt-4">
                                {{ $my_proses->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>

                    {{-- ================= TAB 3: SUDAH DIARSIPKAN ================= --}}
                    <div x-show="tab === 'arsip'" x-transition.opacity>
                        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
                            <div>
                                <h3 class="text-base font-bold text-gray-900">Dokumen Selesai & Diarsipkan</h3>
                                <p class="text-xs text-gray-500">Telah dicairkan dan disimpan ke dalam arsip resmi oleh Bendahara</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                {{ $diarsipkan->total() }} Selesai
                            </span>
                        </div>

                        <div class="space-y-3">
                            @php 
                                $no = ($diarsipkan->currentPage() - 1) * $diarsipkan->perPage() + 1; 
                            @endphp
                            @forelse ($diarsipkan as $arsip)
                                <a href="{{ route('validation.show', $arsip->id) }}"
                                   class="ppspm-item flex flex-col md:flex-row md:items-center gap-4 p-4 bg-emerald-50/20 rounded-2xl border border-emerald-200 block">
                                    
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center text-white font-extrabold text-base shadow-md" style="background: linear-gradient(135deg, #059669, #047857);">
                                        {{ $no++ }}
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <div class="font-bold text-gray-900 hover:text-emerald-700 transition truncate">
                                            {{ $arsip->budget_submission_name }}
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 mt-1 text-xs text-gray-500">
                                            <div>Diajukan oleh: <strong class="text-gray-700">{{ $arsip->user->name ?? '-' }}</strong> ({{ $arsip->user->role ?? '-' }})</div>
                                            <div>Nominal: <strong class="text-gray-900">{{ $arsip->nominal ? 'Rp ' . number_format($arsip->nominal, 0, ',', '.') : '-' }}</strong></div>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-2 mt-2.5">
                                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                                                ✓ Selesai & Diarsipkan
                                            </span>
                                            <span class="text-[11px] text-gray-400">
                                                {{ $arsip->updated_at ? $arsip->updated_at->diffForHumans() : '-' }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 group-hover:bg-emerald-600 group-hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                    <p class="text-sm font-semibold text-gray-500">Belum ada berkas yang diarsipkan.</p>
                                </div>
                            @endforelse

                            <div class="mt-4">
                                {{ $diarsipkan->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
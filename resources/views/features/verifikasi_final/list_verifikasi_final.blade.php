<x-app-layout>

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0066CC] flex items-center justify-center shadow-lg shadow-blue-900/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.5-5.5A9 9 0 1112 3a9 9 0 018.5 5.5z" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-900 leading-tight">
                    Pengajuan Terverifikasi
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola tanda tangan, verifikasi final, dan arsip pengajuan
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        .final-page-bg {
            background:
                radial-gradient(circle at 10% 10%, rgba(0, 58, 143, .08), transparent 30%),
                radial-gradient(circle at 90% 20%, rgba(0, 102, 204, .07), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #f3f6fb 100%);
        }

        .final-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #003A8F 0%, #0056B8 55%, #0074D9 100%);
            box-shadow:
                0 20px 45px rgba(0, 58, 143, .22),
                inset 0 1px 0 rgba(255,255,255,.18);
        }

        .final-hero::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 9999px;
            background: rgba(255,255,255,.08);
            top: -150px;
            right: -70px;
        }

        .final-hero::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 9999px;
            background: rgba(255,255,255,.06);
            bottom: -120px;
            left: 18%;
        }

        .final-glass {
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.18);
            backdrop-filter: blur(10px);
        }

        .final-card {
            background: rgba(255,255,255,.96);
            border: 1px solid rgba(226,232,240,.9);
            box-shadow:
                0 8px 25px rgba(15,23,42,.05),
                0 2px 5px rgba(15,23,42,.03);
        }

        .final-card-hover {
            transition:
                transform .22s ease,
                box-shadow .22s ease,
                border-color .22s ease;
        }

        .final-card-hover:hover {
            transform: translateY(-3px);
            box-shadow:
                0 18px 35px rgba(15,23,42,.10),
                0 4px 10px rgba(15,23,42,.04);
            border-color: rgba(0,58,143,.22);
        }

        .final-item {
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                border-color .2s ease,
                background .2s ease;
        }

        .final-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(15,23,42,.08);
            border-color: rgba(0,58,143,.25);
            background: #ffffff;
        }

        .final-number {
            background: linear-gradient(145deg, #003A8F, #0066CC);
            box-shadow:
                0 7px 15px rgba(0,58,143,.25),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        .final-tab {
            position: relative;
            transition: all .2s ease;
        }

        .final-tab.active::after {
            content: "";
            position: absolute;
            left: 8px;
            right: 8px;
            bottom: -1px;
            height: 3px;
            border-radius: 9999px 9999px 0 0;
            background: linear-gradient(90deg, #003A8F, #0074D9);
        }

        .final-input {
            transition: all .2s ease;
        }

        .final-input:focus {
            box-shadow: 0 0 0 4px rgba(0,58,143,.08);
        }

        .final-section-title {
            background: linear-gradient(135deg, #f8fafc, #eef4fb);
        }

        .final-empty {
            background:
                radial-gradient(circle at center, rgba(0,58,143,.05), transparent 55%),
                #f8fafc;
        }

        .final-action {
            transition: all .2s ease;
        }

        .final-action:hover {
            transform: translateY(-1px);
        }

        .final-info {
            background:
                linear-gradient(135deg, rgba(0,58,143,.06), rgba(0,116,217,.03)),
                #f8fbff;
        }

        @media (max-width: 640px) {
            .final-item-content {
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>

    <div
        class="final-page-bg min-h-screen py-7"
        x-data="{ tab: '{{ request()->get('tab', 'belum') }}' }"
    >

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- =====================================================
                HERO
            ====================================================== --}}
            <div class="final-hero rounded-3xl p-7 md:p-9 text-white">

                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                    <div>
                        <div class="inline-flex items-center gap-2 final-glass rounded-full px-3 py-1.5 mb-4">
                            <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
                            <span class="text-xs font-semibold tracking-wide">
                                VERIFIKASI FINAL
                            </span>
                        </div>

                        <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight">
                            Dashboard Bendahara
                        </h1>

                        <p class="text-white/80 text-sm md:text-base mt-2 max-w-2xl">
                            Kelola tanda tangan, verifikasi, dan arsip pengajuan keuangan
                            dalam satu halaman.
                        </p>
                    </div>

                    <div class="hidden sm:flex w-20 h-20 rounded-2xl final-glass items-center justify-center shadow-xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m5.5-5.5A9 9 0 1112 3a9 9 0 018.5 5.5z" />
                        </svg>
                    </div>

                </div>
            </div>


            {{-- =====================================================
                TABS
            ====================================================== --}}
            <div class="final-card rounded-2xl overflow-hidden">

                <div class="overflow-x-auto">
                    <nav
                        class="flex min-w-max px-3 sm:px-5"
                        aria-label="Tabs"
                    >

                        {{-- TAB BELUM --}}
                        <button
                            type="button"
                            @click="tab = 'belum'"
                            :class="tab === 'belum'
                                ? 'text-[#003A8F] active font-bold'
                                : 'text-gray-500 hover:text-gray-800'"
                            class="final-tab flex items-center gap-2 px-4 sm:px-6 py-4 text-sm whitespace-nowrap"
                        >
                            <span
                                class="w-9 h-9 rounded-xl flex items-center justify-center"
                                :class="tab === 'belum'
                                    ? 'bg-blue-100 text-[#003A8F]'
                                    : 'bg-gray-100 text-gray-500'"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>

                            <span>Belum Ditandatangani</span>

                            <span
                                class="px-2.5 py-1 rounded-full text-xs font-bold"
                                :class="tab === 'belum'
                                    ? 'bg-blue-100 text-[#003A8F]'
                                    : 'bg-gray-100 text-gray-600'"
                            >
                                {{ isset($submit_sign) ? $submit_sign->total() : 0 }}
                            </span>
                        </button>


                        {{-- TAB TERVERIFIKASI --}}
                        <button
                            type="button"
                            @click="tab = 'terverifikasi'"
                            :class="tab === 'terverifikasi'
                                ? 'text-[#003A8F] active font-bold'
                                : 'text-gray-500 hover:text-gray-800'"
                            class="final-tab flex items-center gap-2 px-4 sm:px-6 py-4 text-sm whitespace-nowrap"
                        >
                            <span
                                class="w-9 h-9 rounded-xl flex items-center justify-center"
                                :class="tab === 'terverifikasi'
                                    ? 'bg-blue-100 text-[#003A8F]'
                                    : 'bg-gray-100 text-gray-500'"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>

                            <span>Pengajuan Terverifikasi</span>

                            <span
                                class="px-2.5 py-1 rounded-full text-xs font-bold"
                                :class="tab === 'terverifikasi'
                                    ? 'bg-blue-100 text-[#003A8F]'
                                    : 'bg-gray-100 text-gray-600'"
                            >
                                {{ isset($pengajuans) ? $pengajuans->total() : 0 }}
                            </span>
                        </button>


                        {{-- TAB ARSIP --}}
                        <button
                            type="button"
                            @click="tab = 'arsip'"
                            :class="tab === 'arsip'
                                ? 'text-[#003A8F] active font-bold'
                                : 'text-gray-500 hover:text-gray-800'"
                            class="final-tab flex items-center gap-2 px-4 sm:px-6 py-4 text-sm whitespace-nowrap"
                        >
                            <span
                                class="w-9 h-9 rounded-xl flex items-center justify-center"
                                :class="tab === 'arsip'
                                    ? 'bg-blue-100 text-[#003A8F]'
                                    : 'bg-gray-100 text-gray-500'"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7h18M5 7v12h14V7M8 7V4h8v3" />
                                </svg>
                            </span>

                            <span>Diarsipkan</span>

                            <span
                                class="px-2.5 py-1 rounded-full text-xs font-bold"
                                :class="tab === 'arsip'
                                    ? 'bg-blue-100 text-[#003A8F]'
                                    : 'bg-gray-100 text-gray-600'"
                            >
                                {{ isset($arsip_submissions) ? $arsip_submissions->total() : 0 }}
                            </span>
                        </button>

                    </nav>
                </div>
            </div>


            {{-- =====================================================
                SEARCH & FILTER
            ====================================================== --}}
            <div class="final-card rounded-2xl p-5 md:p-6">

                <div class="flex items-center gap-3 mb-5">

                    <div class="w-11 h-11 rounded-xl bg-blue-100 text-[#003A8F] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-bold text-gray-900">
                            Cari Pengajuan
                        </h3>
                        <p class="text-xs text-gray-500">
                            Gunakan kata kunci atau rentang tanggal
                        </p>
                    </div>

                </div>

                <form
                    method="GET"
                    action="{{ route('final.search') }}"
                    class="space-y-5"
                >

                    {{-- SEARCH --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wide text-gray-500 mb-2">
                            Nama Pengajuan
                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="final-input block w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:bg-white focus:ring-0 focus:border-[#003A8F]"
                                placeholder="Cari nama pengajuan..."
                            >

                        </div>
                    </div>


                    {{-- DATE + BUTTON --}}
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-end">

                        <div class="lg:col-span-3">
                            <label class="block text-xs font-bold uppercase tracking-wide text-gray-500 mb-2">
                                Mulai Tanggal
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                value="{{ request('start_date') }}"
                                class="final-input block w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 text-gray-900 focus:bg-white focus:ring-0 focus:border-[#003A8F]"
                            >
                        </div>

                        <div class="lg:col-span-3">
                            <label class="block text-xs font-bold uppercase tracking-wide text-gray-500 mb-2">
                                Sampai Tanggal
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                value="{{ request('end_date') }}"
                                class="final-input block w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 text-gray-900 focus:bg-white focus:ring-0 focus:border-[#003A8F]"
                            >
                        </div>

                        <div class="lg:col-span-6 flex flex-col sm:flex-row gap-3">

                            <a
                                href="{{ url()->current() }}"
                                class="final-action flex-1 inline-flex items-center justify-center gap-2 px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset
                            </a>

                            <button
                                type="submit"
                                class="final-action flex-1 inline-flex items-center justify-center gap-2 px-5 py-3 bg-gradient-to-r from-[#003A8F] to-[#0066CC] hover:from-[#002f73] hover:to-[#005bb8] text-white font-semibold rounded-xl shadow-lg shadow-blue-900/20 transition"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Cari Pengajuan
                            </button>

                        </div>

                    </div>

                </form>
            </div>


            {{-- =====================================================
                TAB 1 : BELUM DITANDATANGANI
            ====================================================== --}}
            <div
                x-show="tab === 'belum'"
                x-transition.opacity
                class="final-card rounded-2xl overflow-hidden"
            >

                <div class="final-section-title px-6 py-5 border-b border-gray-200">

                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-900">
                                    Pengajuan Belum Ditandatangani
                                </h3>

                                <p class="text-xs text-gray-500 mt-0.5">
                                    Pengajuan lengkap yang menunggu tanda tangan bendahara
                                </p>
                            </div>

                        </div>

                        <div class="hidden sm:block px-3 py-1.5 rounded-full bg-orange-100 text-orange-700 text-xs font-bold">
                            {{ isset($submit_sign) ? $submit_sign->total() : 0 }} Pengajuan
                        </div>

                    </div>

                </div>


                <div class="p-5 md:p-6">

                    @php
                        $no = isset($submit_sign)
                            ? ($submit_sign->currentPage() - 1) * $submit_sign->perPage() + 1
                            : 1;
                    @endphp

                    @forelse ($submit_sign ?? [] as $sign)

                        @if ($sign->requirements_status == 'Lengkap' && $sign->verification_status == 1)

                            <div class="group mb-4 last:mb-0">

                                <a
                                    href="{{ route('final.show', $sign->id) }}"
                                    class="final-item flex flex-col md:flex-row md:items-center gap-4 p-4 md:p-5 bg-gray-50 rounded-2xl border border-gray-200"
                                >

                                    {{-- NUMBER --}}
                                    <div class="final-number flex-shrink-0 w-12 h-12 flex items-center justify-center text-white font-extrabold rounded-xl">
                                        {{ $no++ }}
                                    </div>


                                    {{-- CONTENT --}}
                                    <div class="flex-1 min-w-0 final-item-content">

                                        <div class="font-bold text-base md:text-lg text-gray-900 truncate">
                                            {{ $sign->budget_submission_name }}
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 mt-2 text-xs text-gray-500">

                                            <div>
                                                Diajukan oleh:
                                                <span class="font-semibold text-gray-700">
                                                    {{ $sign->user->name ?? '-' }}
                                                </span>
                                            </div>

                                            <div>
                                                Divisi:
                                                <span class="font-semibold text-gray-700">
                                                    {{ $sign->user->role ?? '-' }}
                                                </span>
                                            </div>

                                        </div>

                                        <div class="flex flex-wrap items-center gap-2 mt-3">

                                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[11px] font-bold">
                                                ✓ Lengkap
                                            </span>

                                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-[11px] font-bold">
                                                ✓ Diverifikasi
                                            </span>

                                            <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-[11px] font-bold">
                                                Menunggu Arsip
                                            </span>

                                            <span class="text-[11px] text-gray-400">
                                                {{ $sign->created_at->diffForHumans() }}
                                            </span>

                                        </div>

                                    </div>


                                    {{-- ARROW --}}
                                    <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-white border border-gray-200 flex items-center justify-center group-hover:bg-[#003A8F] group-hover:border-[#003A8F] transition-all">
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>

                                </a>

                            </div>

                        @endif

                    @empty

                        <div class="final-empty rounded-2xl border border-dashed border-gray-200 py-14 text-center">

                            <div class="w-16 h-16 mx-auto rounded-2xl bg-white shadow-sm border border-gray-200 flex items-center justify-center mb-4">
                                <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z" />
                                </svg>
                            </div>

                            <p class="font-bold text-gray-700">
                                Tidak Ada Pengajuan
                            </p>

                            <p class="text-sm text-gray-400 mt-1">
                                Belum ada pengajuan yang perlu ditandatangani
                            </p>

                        </div>

                    @endforelse


                    <div class="mt-5">
                        {{ isset($submit_sign) ? $submit_sign->appends(array_merge(request()->query(), ['tab' => 'belum']))->links() : '' }}
                    </div>

                </div>

            </div>


            {{-- =====================================================
                TAB 2 : TERVERIFIKASI
            ====================================================== --}}
            <div
                x-show="tab === 'terverifikasi'"
                x-transition.opacity
                style="display: none;"
                class="final-card rounded-2xl overflow-hidden"
            >

                <div class="final-section-title px-6 py-5 border-b border-gray-200">

                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-xl bg-blue-100 text-[#003A8F] flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-900">
                                    Pengajuan Terverifikasi
                                </h3>

                                <p class="text-xs text-gray-500 mt-0.5">
                                    Pengajuan yang telah lengkap dan diverifikasi
                                </p>
                            </div>

                        </div>

                        <div class="hidden sm:block px-3 py-1.5 rounded-full bg-blue-100 text-[#003A8F] text-xs font-bold">
                            {{ isset($pengajuans) ? $pengajuans->total() : 0 }} Pengajuan
                        </div>

                    </div>

                </div>


                <div class="p-5 md:p-6">

                    @php
                        $no = isset($pengajuans)
                            ? ($pengajuans->currentPage() - 1) * $pengajuans->perPage() + 1
                            : 1;
                    @endphp

                    @forelse ($pengajuans ?? [] as $pengajuan)

                        @if ($pengajuan->requirements_status == 'Lengkap' && $pengajuan->verification_status == 1)

                            <div class="group mb-4 last:mb-0">

                                <a
                                    href="{{ route('final.show', $pengajuan->id) }}"
                                    class="final-item flex flex-col md:flex-row md:items-center gap-4 p-4 md:p-5 bg-gray-50 rounded-2xl border border-gray-200"
                                >

                                    <div class="final-number flex-shrink-0 w-12 h-12 flex items-center justify-center text-white font-extrabold rounded-xl">
                                        {{ $no++ }}
                                    </div>


                                    <div class="flex-1 min-w-0">

                                        <div class="font-bold text-base md:text-lg text-gray-900 truncate">
                                            {{ $pengajuan->budget_submission_name }}
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 mt-2 text-xs text-gray-500">

                                            <div>
                                                Diajukan oleh:
                                                <span class="font-semibold text-gray-700">
                                                    {{ $pengajuan->user->name ?? '-' }}
                                                </span>
                                            </div>

                                            <div>
                                                Divisi:
                                                <span class="font-semibold text-gray-700">
                                                    {{ $pengajuan->user->role ?? '-' }}
                                                </span>
                                            </div>

                                        </div>


                                        <div class="flex flex-wrap items-center gap-2 mt-3">

                                            @if ($pengajuan->is_archive == 1)
                                                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[11px] font-bold">
                                                    ✓ Selesai
                                                </span>
                                            @endif

                                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[11px] font-bold">
                                                ✓ Lengkap
                                            </span>

                                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-[11px] font-bold">
                                                ✓ Diverifikasi
                                            </span>

                                            @if ($pengajuan->is_archive == 1)
                                                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[11px] font-bold">
                                                    ✓ Diarsipkan
                                                </span>
                                            @else
                                                <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-[11px] font-bold">
                                                    Menunggu Arsip
                                                </span>
                                            @endif

                                            <span class="text-[11px] text-gray-400">
                                                {{ $pengajuan->created_at->diffForHumans() }}
                                            </span>

                                        </div>

                                    </div>


                                    <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-white border border-gray-200 flex items-center justify-center group-hover:bg-[#003A8F] group-hover:border-[#003A8F] transition-all">

                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>

                                    </div>

                                </a>

                            </div>

                        @endif

                    @empty

                        <div class="final-empty rounded-2xl border border-dashed border-gray-200 py-14 text-center">

                            <div class="w-16 h-16 mx-auto rounded-2xl bg-white shadow-sm border border-gray-200 flex items-center justify-center mb-4">
                                <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z" />
                                </svg>
                            </div>

                            <p class="font-bold text-gray-700">
                                Tidak Ada Pengajuan
                            </p>

                            <p class="text-sm text-gray-400 mt-1">
                                Belum ada pengajuan terverifikasi
                            </p>

                        </div>

                    @endforelse


                    <div class="mt-5">
                        {{ isset($pengajuans) ? $pengajuans->appends(array_merge(request()->query(), ['tab' => 'terverifikasi']))->links() : '' }}
                    </div>

                </div>

            </div>


            {{-- =====================================================
                TAB 3 : DIARSIPKAN
            ====================================================== --}}
            <div
                x-show="tab === 'arsip'"
                x-transition.opacity
                style="display: none;"
                class="final-card rounded-2xl overflow-hidden"
            >

                <div class="final-section-title px-6 py-5 border-b border-gray-200">

                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7h18M5 7v12h14V7M8 7V4h8v3" />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-900">
                                    Pengajuan Diarsipkan
                                </h3>

                                <p class="text-xs text-gray-500 mt-0.5">
                                    Pengajuan yang telah selesai diproses dan diarsipkan
                                </p>
                            </div>

                        </div>

                        <div class="hidden sm:block px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">
                            {{ isset($arsip_submissions) ? $arsip_submissions->total() : 0 }} Pengajuan
                        </div>

                    </div>

                </div>


                <div class="p-5 md:p-6">

                    @php
                        $no = isset($arsip_submissions)
                            ? ($arsip_submissions->currentPage() - 1) * $arsip_submissions->perPage() + 1
                            : 1;
                    @endphp

                    @forelse ($arsip_submissions ?? [] as $arsip)

                        <div class="group mb-4 last:mb-0">

                            <a
                                href="{{ route('final.show', $arsip->id) }}"
                                class="final-item flex flex-col md:flex-row md:items-center gap-4 p-4 md:p-5 bg-gray-50 rounded-2xl border border-gray-200"
                            >

                                <div class="final-number flex-shrink-0 w-12 h-12 flex items-center justify-center text-white font-extrabold rounded-xl">
                                    {{ $no++ }}
                                </div>


                                <div class="flex-1 min-w-0">

                                    <div class="font-bold text-base md:text-lg text-gray-900 truncate">
                                        {{ $arsip->budget_submission_name }}
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 mt-2 text-xs text-gray-500">

                                        <div>
                                            Diajukan oleh:
                                            <span class="font-semibold text-gray-700">
                                                {{ $arsip->user->name ?? '-' }}
                                            </span>
                                        </div>

                                        <div>
                                            Divisi:
                                            <span class="font-semibold text-gray-700">
                                                {{ $arsip->user->role ?? '-' }}
                                            </span>
                                        </div>

                                    </div>


                                    <div class="flex flex-wrap items-center gap-2 mt-3">

                                        <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[11px] font-bold">
                                            ✓ Diarsipkan
                                        </span>

                                        <span class="text-[11px] text-gray-400">
                                            {{ $arsip->created_at->diffForHumans() }}
                                        </span>

                                    </div>

                                </div>


                                <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-white border border-gray-200 flex items-center justify-center group-hover:bg-[#003A8F] group-hover:border-[#003A8F] transition-all">

                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>

                                </div>

                            </a>

                        </div>

                    @empty

                        <div class="final-empty rounded-2xl border border-dashed border-gray-200 py-14 text-center">

                            <div class="w-16 h-16 mx-auto rounded-2xl bg-white shadow-sm border border-gray-200 flex items-center justify-center mb-4">
                                <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7h18M5 7v12h14V7M8 7V4h8v3" />
                                </svg>
                            </div>

                            <p class="font-bold text-gray-700">
                                Tidak Ada Pengajuan
                            </p>

                            <p class="text-sm text-gray-400 mt-1">
                                Belum ada pengajuan yang diarsipkan
                            </p>

                        </div>

                    @endforelse


                    <div class="mt-5">
                        {{ isset($arsip_submissions) ? $arsip_submissions->appends(array_merge(request()->query(), ['tab' => 'arsip']))->links() : '' }}
                    </div>

                </div>

            </div>


            {{-- =====================================================
                INFO
            ====================================================== --}}
            <div class="final-info rounded-2xl border border-blue-100 p-5 md:p-6">

                <div class="flex items-start gap-4">

                    <div class="w-11 h-11 flex-shrink-0 rounded-xl bg-[#003A8F] text-white flex items-center justify-center shadow-lg shadow-blue-900/15">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                    </div>


                    <div class="flex-1">

                        <h4 class="font-bold text-gray-900">
                            Informasi Verifikasi Final
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">

                            <div class="bg-white rounded-xl p-4 border border-blue-100">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-xs font-bold text-gray-800">
                                        Verifikasi
                                    </span>
                                </div>

                                <p class="text-xs leading-relaxed text-gray-500">
                                    Verifikasi pengajuan yang telah diperiksa kelengkapannya.
                                </p>
                            </div>


                            <div class="bg-white rounded-xl p-4 border border-blue-100">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                                    <span class="text-xs font-bold text-gray-800">
                                        Arsip
                                    </span>
                                </div>

                                <p class="text-xs leading-relaxed text-gray-500">
                                    Setelah proses final, pengajuan dapat dilanjutkan ke proses arsip.
                                </p>
                            </div>


                            <div class="bg-white rounded-xl p-4 border border-blue-100">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    <span class="text-xs font-bold text-gray-800">
                                        Kelengkapan
                                    </span>
                                </div>

                                <p class="text-xs leading-relaxed text-gray-500">
                                    Pastikan seluruh dokumen telah lengkap sebelum melakukan verifikasi final.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
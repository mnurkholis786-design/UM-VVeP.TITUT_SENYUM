<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3 animate-header-slide">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#003A8F] shadow-lg shadow-blue-900/20">
                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2z" />
                </svg>
            </div>

            <div>
                <h2 class="text-xl font-bold tracking-tight text-gray-800">
                    {{ __('Report') }}
                </h2>
                <p class="text-xs text-gray-500">
                    Pusat laporan dan rekapitulasi pengajuan
                </p>
            </div>
        </div>
    </x-slot>

    {{-- =========================================================
        STYLE & KEYFRAME ANIMATIONS
    ========================================================= --}}
    <style>
        @keyframes slideInFromTop {
            0% { opacity: 0; transform: translateY(-15px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInFromBottom {
            0% { opacity: 0; transform: translateY(25px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-header-slide {
            animation: slideInFromTop 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-hero-enter {
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-filter-enter {
            opacity: 0;
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.15s forwards;
        }

        .animate-content-enter {
            opacity: 0;
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-white py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-7">

            {{-- =========================================================
                HERO SECTION
            ========================================================== --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#003A8F] via-[#0056B8] to-[#0074D9] shadow-2xl shadow-blue-900/20 animate-hero-enter">

                {{-- Decorative background elements --}}
                <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute -bottom-32 left-1/3 h-80 w-80 rounded-full bg-cyan-300/10 blur-3xl"></div>

                <div class="relative px-6 py-8 sm:px-8 sm:py-10">

                    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                        <div class="flex items-start gap-4">

                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/15 ring-1 ring-white/20 backdrop-blur-sm shadow-lg">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2z" />
                                </svg>
                            </div>

                            <div>
                                <div class="mb-2 flex flex-wrap items-center gap-2">
                                    <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/20">
                                        ADMINISTRATOR
                                    </span>

                                    @if(request('from_date') && request('target_date'))
                                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-medium text-blue-50 ring-1 ring-white/20">
                                            Filter Aktif
                                        </span>
                                    @endif
                                </div>

                                <h1 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                                    Pusat Laporan
                                </h1>

                                <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100 sm:text-base">
                                    Kelola, filter, dan akses laporan pengajuan secara terstruktur dalam satu halaman.
                                </p>
                            </div>

                        </div>

                        {{-- Total Badge --}}
                        <div class="w-full lg:w-auto">
                            <div class="rounded-2xl border border-white/15 bg-white/10 px-5 py-4 backdrop-blur-md shadow-lg">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wider text-blue-100">
                                            Pengajuan Ditampilkan
                                        </p>
                                        <p class="mt-0.5 text-2xl font-extrabold text-white">
                                            {{ $submission->count() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            {{-- =========================================================
                FILTER SECTION
            ========================================================== --}}
            <div class="overflow-hidden rounded-3xl border border-blue-100 bg-white shadow-xl shadow-blue-900/5 animate-filter-enter">

                <div class="border-b border-gray-100 bg-gradient-to-r from-blue-50/80 to-white px-6 py-5 sm:px-7">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#003A8F] shadow-lg shadow-blue-900/20">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-gray-800 sm:text-lg">
                                Filter Laporan
                            </h3>
                            <p class="text-xs text-gray-500 sm:text-sm">
                                Tentukan rentang tanggal untuk menampilkan data pengajuan
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-7">
                    <form method="GET"
                          action="{{ route('admin.report') }}"
                          class="grid grid-cols-1 gap-5 lg:grid-cols-[1fr_1fr_auto] lg:items-end">

                        {{-- Dari Tanggal --}}
                        <div>
                            <label for="from_date" class="mb-2 block text-sm font-semibold text-gray-700">
                                Dari Tanggal
                            </label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                    <svg class="h-5 w-5 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input id="from_date"
                                       type="date"
                                       name="from_date"
                                       value="{{ request('from_date') }}"
                                       class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3 pl-12 pr-4 text-sm font-medium text-gray-700 outline-none transition-all duration-200 focus:border-[#0056B8] focus:bg-white focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>

                        {{-- Sampai Tanggal --}}
                        <div>
                            <label for="target_date" class="mb-2 block text-sm font-semibold text-gray-700">
                                Sampai Tanggal
                            </label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                    <svg class="h-5 w-5 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input id="target_date"
                                       type="date"
                                       name="target_date"
                                       value="{{ request('target_date') }}"
                                       class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3 pl-12 pr-4 text-sm font-medium text-gray-700 outline-none transition-all duration-200 focus:border-[#0056B8] focus:bg-white focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>

                        {{-- Action Buttons (Terapkan & Reset - Selalu Tampil) --}}
                        <div class="flex flex-wrap items-center gap-3">
                            <button type="submit"
                                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#003A8F] to-[#0066CC] px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-900/20 transition-all duration-200 hover:-translate-y-0.5 hover:from-[#002E73] hover:to-[#0056B8] hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 lg:flex-initial">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Terapkan
                            </button>

                            <a href="{{ route('admin.report') }}"
                               class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-bold text-gray-700 shadow-sm transition-all duration-200 hover:bg-gray-50 hover:text-gray-900 lg:flex-initial"
                               title="Reset Filter Tanggal">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Reset
                            </a>
                        </div>

                    </form>

                    {{-- Filter Info Alert --}}
                    @if(request('from_date') || request('target_date'))
                        <div class="mt-5 flex flex-wrap items-center gap-2 rounded-xl border border-blue-100 bg-blue-50 px-4 py-3">
                            <svg class="h-4 w-4 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-8h.01M12 20.5a8.5 8.5 0 100-17 8.5 8.5 0 000 17z" />
                            </svg>
                            <span class="text-xs font-medium text-blue-800 sm:text-sm">
                                Menampilkan laporan berdasarkan rentang tanggal
                                @if(request('from_date'))
                                    <strong>{{ \Carbon\Carbon::parse(request('from_date'))->format('d M Y') }}</strong>
                                @endif
                                @if(request('from_date') && request('target_date'))
                                    sampai
                                @endif
                                @if(request('target_date'))
                                    <strong>{{ \Carbon\Carbon::parse(request('target_date'))->format('d M Y') }}</strong>
                                @endif
                            </span>
                        </div>
                    @endif

                </div>
            </div>

            {{-- =========================================================
                MAIN CONTENT (REPORT ACTIONS & LIST)
            ========================================================= --}}
            <div class="space-y-7 animate-content-enter">

                {{-- REPORT ACTIONS CARDS --}}
                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100">
                            <svg class="h-5 w-5 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">
                                Pilihan Laporan
                            </h3>
                            <p class="text-sm text-gray-500">
                                Buka laporan dalam format yang tersedia
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- Report Account Card --}}
                        <a href="{{ route('admin.report_account', ['from_date' => request('from_date'), 'target_date' => request('target_date')]) }}"
                           target="_blank"
                           class="group relative overflow-hidden rounded-2xl border border-blue-100 bg-white p-6 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-900/10">
                            <div class="absolute right-0 top-0 h-24 w-24 translate-x-8 -translate-y-8 rounded-full bg-blue-50 transition-transform duration-300 group-hover:scale-150"></div>
                            <div class="relative flex items-start gap-4">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#0074D9] text-white shadow-lg shadow-blue-900/20 transition-transform duration-300 group-hover:scale-105">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.707.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <h4 class="font-bold text-gray-800 transition-colors group-hover:text-[#0056B8]">
                                                Laporan Pengajuan Per Akun
                                            </h4>
                                            <p class="mt-1.5 text-sm leading-5 text-gray-500">
                                                Rekap jumlah pengajuan yang dibuat oleh masing-masing akun.
                                            </p>
                                        </div>
                                        <div class="shrink-0">
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 transition-all duration-200 group-hover:bg-[#003A8F]">
                                                <svg class="h-4 w-4 text-[#0056B8] transition-colors group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-[#0056B8]">
                                        <span>Lihat laporan</span>
                                        <svg class="h-3.5 w-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-5-5l5 5-5 5" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>

                        {{-- Report Status Card --}}
                        <a href="{{ route('admin.report_status', ['from_date' => request('from_date'), 'target_date' => request('target_date')]) }}"
                           target="_blank"
                           class="group relative overflow-hidden rounded-2xl border border-blue-100 bg-white p-6 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-900/10">
                            <div class="absolute right-0 top-0 h-24 w-24 translate-x-8 -translate-y-8 rounded-full bg-cyan-50 transition-transform duration-300 group-hover:scale-150"></div>
                            <div class="relative flex items-start gap-4">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0056B8] to-[#00AEEF] text-white shadow-lg shadow-blue-900/20 transition-transform duration-300 group-hover:scale-105">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 016 0m-6 7h6m-6 4h4m-4-8h.01M9 16h.01" />
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <h4 class="font-bold text-gray-800 transition-colors group-hover:text-[#0056B8]">
                                                Laporan Status Pengajuan
                                            </h4>
                                            <p class="mt-1.5 text-sm leading-5 text-gray-500">
                                                Rekap jumlah pengajuan, verifikasi, tanda tangan, dan arsip.
                                            </p>
                                        </div>
                                        <div class="shrink-0">
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 transition-all duration-200 group-hover:bg-[#0056B8]">
                                                <svg class="h-4 w-4 text-[#0056B8] transition-colors group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-[#0056B8]">
                                        <span>Lihat laporan</span>
                                        <svg class="h-3.5 w-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-5-5l5 5-5 5" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                {{-- DAFTAR PENGAJUAN SECTION --}}
                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-xl shadow-blue-900/5">

                    <div class="border-b border-gray-100 bg-gradient-to-r from-white via-blue-50/30 to-white px-6 py-5 sm:px-7">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#003A8F] shadow-lg shadow-blue-900/20">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-gray-800 sm:text-lg">
                                        Daftar Pengajuan
                                    </h3>
                                    <p class="text-xs text-gray-500 sm:text-sm">
                                        Pengajuan yang telah melalui proses verifikasi
                                    </p>
                                </div>
                            </div>

                            <div class="inline-flex w-fit items-center gap-2 rounded-full bg-blue-50 px-4 py-2 text-sm font-bold text-[#003A8F]">
                                <span class="h-2 w-2 rounded-full bg-[#00AEEF]"></span>
                                {{ $submission->count() }} Item
                            </div>
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        @php
                            $no = 1;
                        @endphp

                        <div class="space-y-3">
                            @forelse ($submission as $submit)
                                <a href="{{ route('pengajuan.show', $submit->id) }}"
                                   class="group flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:bg-blue-50/30 hover:shadow-lg hover:shadow-blue-900/5 sm:p-5">

                                    {{-- Number Badge --}}
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0066CC] text-sm font-extrabold text-white shadow-md shadow-blue-900/20 transition-transform duration-200 group-hover:scale-105">
                                        {{ $no++ }}
                                    </div>

                                    {{-- Content Details --}}
                                    <div class="min-w-0 flex-1">
                                        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                                            <div class="min-w-0">
                                                <h4 class="truncate pr-2 text-sm font-bold text-gray-800 transition-colors group-hover:text-[#0056B8] sm:text-base">
                                                    {{ $submit->budget_submission_name }}
                                                </h4>

                                                <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-2">
                                                    {{-- Created At --}}
                                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 sm:text-sm">
                                                        <svg class="h-4 w-4 shrink-0 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        <span>
                                                            Dibuat:
                                                            <span class="font-medium text-gray-700">
                                                                {{ $submit->created_at->format('d M Y') }}
                                                            </span>
                                                        </span>
                                                    </div>

                                                    {{-- Updated At --}}
                                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 sm:text-sm">
                                                        <svg class="h-4 w-4 shrink-0 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span>
                                                            Diperbarui:
                                                            <span class="font-medium text-gray-700">
                                                                {{ $submit->updated_at->diffForHumans() }}
                                                            </span>
                                                        </span>
                                                    </div>

                                                    {{-- Divisi / Role --}}
                                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 sm:text-sm">
                                                        <svg class="h-4 w-4 shrink-0 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M17 20h5V4H2v16h5m5-7v7m-5-7h10M7 8h10" />
                                                        </svg>
                                                        <span>
                                                            Divisi:
                                                            <span class="font-semibold text-gray-700">
                                                                {{ $submit->user->role }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Arrow Icon --}}
                                            <div class="hidden shrink-0 sm:block">
                                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 transition-all duration-200 group-hover:bg-[#003A8F]">
                                                    <svg class="h-4 w-4 text-[#0056B8] transition-all duration-200 group-hover:translate-x-0.5 group-hover:text-white"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </a>
                            @empty
                                {{-- Empty State --}}
                                <div class="rounded-2xl border border-dashed border-blue-200 bg-gradient-to-br from-blue-50/60 to-white px-6 py-14 text-center">
                                    <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-100">
                                        <svg class="h-8 w-8 text-[#0056B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                    </div>
                                    <h4 class="text-base font-bold text-gray-700">
                                        Belum Ada Pengajuan
                                    </h4>
                                    <p class="mx-auto mt-1 max-w-md text-sm text-gray-500">
                                        Pengajuan yang telah melalui proses verifikasi akan muncul di halaman ini.
                                    </p>
                                </div>
                            @endforelse
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
<x-app-layout>

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-lg shadow-blue-500/20">

                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                    </path>

                </svg>

            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard Bendahara') }}
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola verifikasi dan arsip pengajuan keuangan
                </p>
            </div>
        </div>
    </x-slot>


    {{-- =========================================================
        CUSTOM STYLE
    ========================================================== --}}
    <style>
        .bendahara-bg {
            background:
                radial-gradient(circle at 8% 8%, rgba(37, 99, 235, 0.08), transparent 25%),
                radial-gradient(circle at 92% 15%, rgba(79, 70, 229, 0.07), transparent 25%),
                linear-gradient(180deg, #f8fafc 0%, #eef4fb 100%);
        }

        .hero-bendahara {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 88% 15%, rgba(96, 165, 250, 0.28), transparent 22%),
                radial-gradient(circle at 75% 100%, rgba(37, 99, 235, 0.20), transparent 30%),
                linear-gradient(135deg, #003A8F 0%, #002d73 52%, #001d4d 100%);
            box-shadow:
                0 20px 45px rgba(0, 58, 143, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.12);
        }

        .hero-bendahara::before {
            content: "";
            position: absolute;
            width: 270px;
            height: 270px;
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 9999px;
            right: -85px;
            top: -125px;
        }

        .hero-bendahara::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 9999px;
            right: 35px;
            bottom: -130px;
        }

        .hero-icon {
            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.25);
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 9999px;
            right: -40px;
            top: -40px;
            background: rgba(255, 255, 255, 0.55);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.11);
        }

        .dashboard-card {
            transition: all 0.25s ease;
        }

        .dashboard-card:hover {
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.09);
        }

        .quick-action {
            transition: all 0.25s ease;
        }

        .quick-action:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.10);
        }

        .quick-action-icon {
            transition: all 0.25s ease;
        }

        .quick-action:hover .quick-action-icon {
            transform: scale(1.08);
        }

        .progress-track {
            background: #e5e7eb;
            box-shadow: inset 0 2px 4px rgba(15, 23, 42, 0.07);
        }

        .progress-fill {
            background: linear-gradient(90deg, #10b981, #059669);
            box-shadow: 0 3px 10px rgba(16, 185, 129, 0.30);
            transition: width 0.5s ease;
        }

        .section-icon {
            box-shadow: 0 7px 15px rgba(59, 130, 246, 0.14);
        }

        .info-card {
            transition: all 0.25s ease;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.08);
        }

        @media (max-width: 640px) {
            .stat-card:hover,
            .quick-action:hover,
            .info-card:hover {
                transform: none;
            }
        }
    </style>


    {{-- =========================================================
        MAIN
    ========================================================== --}}
    <div class="bendahara-bg min-h-screen py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="space-y-7">


                {{-- =====================================================
                    HERO
                ====================================================== --}}
                <div class="hero-bendahara rounded-2xl">

                    <div class="relative z-10 p-7 sm:p-9">

                        <div class="flex items-center justify-between gap-6">

                            <div class="min-w-0">

                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1.5 mb-4 rounded-full bg-white/10 border border-white/15 backdrop-blur-sm">

                                    <span class="w-2 h-2 rounded-full bg-green-400"></span>

                                    <span class="text-xs font-medium text-blue-100">
                                        Panel Bendahara
                                    </span>

                                </div>


                                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">
                                    Dashboard Bendahara
                                </h1>


                                <p class="text-blue-100 text-sm sm:text-base max-w-xl leading-relaxed">
                                    Verifikasi, kelola, dan arsipkan pengajuan keuangan
                                    yang telah disetujui.
                                </p>

                            </div>


                            <div class="hidden sm:flex shrink-0">

                                <div
                                    class="hero-icon w-20 h-20 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-md flex items-center justify-center">

                                    <svg class="w-10 h-10 text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.6"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    STATISTIK
                ====================================================== --}}
                <div>

                    <div class="flex items-center gap-3 mb-4">

                        <div
                            class="section-icon w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center">

                            <svg class="w-5 h-5 text-blue-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="font-bold text-gray-800">
                                Ringkasan Pengajuan
                            </h3>

                            <p class="text-xs text-gray-500">
                                Statistik pengajuan yang perlu dikelola
                            </p>

                        </div>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">


                        {{-- TOTAL TERVERIFIKASI --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-purple-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Total Terverifikasi
                                    </p>

                                    <p class="text-3xl font-bold text-purple-600">
                                        {{ $total_terverifikasi ?? 0 }}
                                    </p>

                                    <p class="text-xs text-purple-600 font-medium mt-2">
                                        Pengajuan terverifikasi
                                    </p>

                                </div>


                                <div
                                    class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-purple-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>


                        {{-- MENUNGGU VERIFIKASI --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-orange-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Menunggu Verifikasi
                                    </p>

                                    <p class="text-3xl font-bold text-orange-600">
                                        {{ $menunggu_verifikasi ?? 0 }}
                                    </p>

                                    <p class="text-xs text-orange-600 font-medium mt-2">
                                        Perlu diproses
                                    </p>

                                </div>


                                <div
                                    class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-orange-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>


                        {{-- DIARSIPKAN --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-green-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Sudah Diarsipkan
                                    </p>

                                    <p class="text-3xl font-bold text-green-600">
                                        {{ $sudah_diarsipkan ?? 0 }}
                                    </p>

                                    <p class="text-xs text-green-600 font-medium mt-2">
                                        Berhasil diarsipkan
                                    </p>

                                </div>


                                <div
                                    class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-green-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>


                        {{-- SELESAI HARI INI --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-blue-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Selesai Hari Ini
                                    </p>

                                    <p class="text-3xl font-bold text-blue-600">
                                        {{ $selesai_hari_ini ?? 0 }}
                                    </p>

                                    <p class="text-xs text-blue-600 font-medium mt-2">
                                        Aktivitas hari ini
                                    </p>

                                </div>


                                <div
                                    class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-blue-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    PROGRESS ARSIP
                ====================================================== --}}
                <div
                    class="dashboard-card bg-white rounded-2xl border border-gray-200 shadow-sm p-6">

                    <div class="flex items-center justify-between gap-4 mb-6">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">

                                <svg class="w-5 h-5 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                    </path>

                                </svg>

                            </div>

                            <div>

                                <h3 class="text-lg font-bold text-gray-800">
                                    Progress Diarsipkan
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Persentase pengajuan yang telah masuk arsip
                                </p>

                            </div>

                        </div>


                        <div
                            class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-100">

                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                            <span class="text-xs font-semibold text-emerald-700">
                                {{ $progress ?? 0 }}%
                            </span>

                        </div>

                    </div>


                    {{-- TOTAL --}}
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 mb-5 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-100">

                        <div>

                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                                Total Pengajuan Terverifikasi
                            </p>

                            <p class="text-3xl font-bold text-emerald-600 mt-1">
                                {{ $total_terverifikasi ?? 0 }}
                            </p>

                        </div>


                        <div class="text-left sm:text-right">

                            <p class="text-xs text-gray-500">
                                Sudah diarsipkan
                            </p>

                            <p class="text-lg font-bold text-gray-800">
                                {{ $sudah_diarsipkan ?? 0 }}
                            </p>

                        </div>

                    </div>


                    {{-- PROGRESS --}}
                    <div class="w-full progress-track rounded-full h-4 overflow-hidden">

                        <div
                            class="progress-fill h-4 rounded-full"
                            style="width: {{ min(max((float) ($progress ?? 0), 0), 100) }}%;">
                        </div>

                    </div>


                    <div class="flex items-center justify-between mt-3">

                        <div class="flex items-center gap-2">

                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>

                            <span class="text-sm text-gray-600">
                                {{ $sudah_diarsipkan ?? 0 }} diarsipkan
                            </span>

                        </div>


                        <span class="text-sm font-bold text-emerald-600">
                            {{ $progress ?? 0 }}%
                        </span>

                    </div>

                </div>


                {{-- =====================================================
                    AKSI CEPAT
                ====================================================== --}}
                <div
                    class="dashboard-card bg-white rounded-2xl border border-gray-200 shadow-sm p-6">

                    <div class="flex items-center gap-3 mb-6 pb-5 border-b border-gray-100">

                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center shadow-md">

                            <svg class="w-5 h-5 text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z">
                                </path>

                            </svg>

                        </div>


                        <div>

                            <h3 class="text-lg font-bold text-gray-800">
                                Aksi Cepat
                            </h3>

                            <p class="text-xs text-gray-500">
                                Akses fitur yang sering digunakan
                            </p>

                        </div>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                        {{-- SEMUA PENGAJUAN --}}
                        <a href="{{ route('final.index') }}"
                            class="quick-action group flex items-center gap-4 p-5 rounded-2xl bg-gradient-to-br from-purple-50 to-purple-100/50 border border-purple-200">

                            <div
                                class="quick-action-icon w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center shadow-md">

                                <svg class="w-6 h-6 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>

                                </svg>

                            </div>


                            <div class="min-w-0">

                                <p class="font-bold text-gray-800">
                                    Semua Pengajuan
                                </p>

                                <p class="text-xs text-gray-600 mt-1">
                                    Kelola pengajuan Anda
                                </p>

                            </div>


                            <svg class="w-5 h-5 ml-auto text-purple-400 group-hover:text-purple-600 transition"
                                fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>

                            </svg>

                        </a>


                        {{-- INPUT ARSIP --}}
                        <a href="{{ url('/cabinet') }}"
                            class="quick-action group flex items-center gap-4 p-5 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100/50 border border-blue-200">

                            <div
                                class="quick-action-icon w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-md">

                                <svg class="w-6 h-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v11a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0">
                                    </path>

                                </svg>

                            </div>


                            <div class="min-w-0">

                                <p class="font-bold text-gray-800">
                                    Input Arsip
                                </p>

                                <p class="text-xs text-gray-600 mt-1">
                                    Kelola input arsip
                                </p>

                            </div>


                            <svg class="w-5 h-5 ml-auto text-blue-400 group-hover:text-blue-600 transition"
                                fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>

                            </svg>

                        </a>


                       {{-- DIGITAL ARSIP --}}
                            <a href="{{ url('/cabinet') }}"
                                class="quick-action group flex items-center gap-4 p-5 rounded-2xl bg-gradient-to-br from-cyan-50 to-blue-100/50 border border-cyan-200">

                                <div
                                    class="quick-action-icon w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-md">

                                    <svg class="w-6 h-6 text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                        </path>

                                    </svg>

                                </div>

                                <div class="min-w-0">
                                    <p class="font-bold text-gray-800">
                                        Digital Arsip
                                    </p>
                                    <p class="text-xs text-gray-600 mt-1">
                                        Lihat arsip dokumen digital
                                    </p>
                                </div>

                                <svg class="w-5 h-5 ml-auto text-cyan-400 group-hover:text-cyan-600 transition"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>







                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>

                            </svg>

                        </a>

                    </div>

                </div>


                {{-- =====================================================
                    INFO BENDahara
                ====================================================== --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


                    {{-- ALUR KERJA --}}
                    <div
                        class="info-card bg-gradient-to-br from-blue-50 via-indigo-50 to-white rounded-2xl p-6 border border-blue-200 shadow-sm">

                        <div class="flex items-center gap-3 mb-5">

                            <div
                                class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md">

                                <svg class="w-5 h-5 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>

                                </svg>

                            </div>


                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Alur Pengajuan
                                </h4>

                                <p class="text-xs text-gray-500">
                                    Tahapan pengelolaan pengajuan
                                </p>

                            </div>

                        </div>


                        <div class="space-y-3">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                    1
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-gray-700">
                                        Pengajuan Terverifikasi
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        Pengajuan telah melewati proses verifikasi
                                    </p>
                                </div>

                            </div>


                            <div class="flex items-center gap-3">

                                <div
                                    class="w-8 h-8 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center text-xs font-bold">
                                    2
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-gray-700">
                                        Verifikasi Final
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        Pengajuan diproses oleh bendahara
                                    </p>
                                </div>

                            </div>


                            <div class="flex items-center gap-3">

                                <div
                                    class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center text-xs font-bold">
                                    3
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-gray-700">
                                        Pengarsipan
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        Pengajuan disimpan ke dalam arsip
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div
                        class="info-card bg-gradient-to-br from-emerald-50 via-green-50 to-white rounded-2xl p-6 border border-emerald-200 shadow-sm">

                        <div class="flex items-center gap-3 mb-5">

                            <div
                                class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">

                                <svg class="w-5 h-5 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>

                                </svg>

                            </div>


                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Ringkasan Status
                                </h4>

                                <p class="text-xs text-gray-500">
                                    Kondisi pengajuan yang sedang dikelola
                                </p>

                            </div>

                        </div>


                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                            <div
                                class="p-3 rounded-xl bg-white/80 border border-purple-100">

                                <p class="text-xs text-gray-500">
                                    Terverifikasi
                                </p>

                                <p class="text-xl font-bold text-purple-600 mt-1">
                                    {{ $total_terverifikasi ?? 0 }}
                                </p>

                            </div>


                            <div
                                class="p-3 rounded-xl bg-white/80 border border-orange-100">

                                <p class="text-xs text-gray-500">
                                    Menunggu
                                </p>

                                <p class="text-xl font-bold text-orange-600 mt-1">
                                    {{ $menunggu_verifikasi ?? 0 }}
                                </p>

                            </div>


                            <div
                                class="p-3 rounded-xl bg-white/80 border border-green-100">

                                <p class="text-xs text-gray-500">
                                    Diarsipkan
                                </p>

                                <p class="text-xl font-bold text-green-600 mt-1">
                                    {{ $sudah_diarsipkan ?? 0 }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    FOOTER
                ====================================================== --}}
                <div class="text-center pt-1 pb-4">

                    <p class="text-xs text-gray-400">
                        Dashboard Bendahara • Sistem Pengajuan Keuangan
                    </p>

                </div>


            </div>

        </div>

    </div>

</x-app-layout>
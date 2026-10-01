<x-app-layout>

    {{-- ================= HEADER ================= --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-lg shadow-blue-500/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Ringkasan pengajuan keuangan Anda
                </p>
            </div>
        </div>
    </x-slot>


    {{-- ================= CUSTOM STYLE ================= --}}
    <style>
        .dashboard-bg {
            background:
                radial-gradient(circle at 10% 10%, rgba(59, 130, 246, 0.08), transparent 25%),
                radial-gradient(circle at 90% 20%, rgba(99, 102, 241, 0.07), transparent 25%),
                linear-gradient(180deg, #f8fafc 0%, #eef4fb 100%);
        }

        .dashboard-card {
            transition: all 0.25s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.10);
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            width: 110px;
            height: 110px;
            border-radius: 9999px;
            right: -45px;
            top: -45px;
            background: rgba(255, 255, 255, 0.55);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.12);
        }

        .hero-dashboard {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 85% 20%, rgba(96, 165, 250, 0.28), transparent 22%),
                radial-gradient(circle at 70% 100%, rgba(37, 99, 235, 0.20), transparent 30%),
                linear-gradient(135deg, #003A8F 0%, #002766 55%, #001d4d 100%);
            box-shadow:
                0 20px 45px rgba(0, 58, 143, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.12);
        }

        .hero-dashboard::before {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 50%;
            right: -70px;
            top: -100px;
        }

        .hero-dashboard::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            right: 40px;
            bottom: -120px;
        }

        .hero-icon {
            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.30);
        }

        .quick-action {
            transition: all 0.25s ease;
        }

        .quick-action:hover {
            transform: translateY(-4px);
        }

        .quick-action .action-icon {
            transition: all 0.25s ease;
        }

        .quick-action:hover .action-icon {
            transform: scale(1.08) rotate(-3deg);
        }

        .submission-item {
            transition: all 0.22s ease;
        }

        .submission-item:hover {
            transform: translateX(4px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
        }

        .number-box {
            box-shadow:
                0 8px 16px rgba(37, 99, 235, 0.20),
                inset 0 1px 0 rgba(255, 255, 255, 0.25);
        }

        .info-card {
            transition: all 0.25s ease;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.08);
        }

        .section-title-icon {
            box-shadow: 0 7px 15px rgba(59, 130, 246, 0.14);
        }

        .dashboard-scroll {
            scrollbar-width: thin;
        }

        @media (max-width: 640px) {
            .hero-dashboard {
                border-radius: 18px;
            }

            .stat-card:hover,
            .dashboard-card:hover,
            .info-card:hover {
                transform: none;
            }
        }
    </style>


    {{-- ================= MAIN ================= --}}
    <div class="dashboard-bg min-h-screen py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="space-y-7">


                {{-- ========================================================= --}}
                {{-- HERO SECTION --}}
                {{-- ========================================================= --}}
                <div class="hero-dashboard rounded-2xl">

                    <div class="relative z-10 p-7 sm:p-9">

                        <div class="flex items-center justify-between gap-6">

                            {{-- TEXT --}}
                            <div class="min-w-0">

                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1.5 mb-4 rounded-full bg-white/10 border border-white/15 backdrop-blur-sm">
                                    <span class="w-2 h-2 rounded-full bg-green-400"></span>

                                    <span class="text-xs font-medium text-blue-100">
                                        Sistem Pengajuan Keuangan
                                    </span>
                                </div>

                                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">
                                    Halo, {{ Auth::user()->name }}! 👋
                                </h1>

                                <p class="text-blue-100 text-sm sm:text-base max-w-xl leading-relaxed">
                                    Selamat datang di dashboard Anda.
                                    Pantau pengajuan keuangan dan status dokumen dengan mudah.
                                </p>

                            </div>


                            {{-- ICON --}}
                            <div class="hidden sm:flex shrink-0">

                                <div
                                    class="hero-icon w-20 h-20 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-md flex items-center justify-center">

                                    <svg class="w-10 h-10 text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- STATISTIK --}}
                {{-- ========================================================= --}}
                <div>

                    <div class="flex items-center gap-3 mb-4">

                        <div
                            class="section-title-icon w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center">

                            <svg class="w-5 h-5 text-blue-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>

                            </svg>

                        </div>

                        <div>
                            <h3 class="font-bold text-gray-800">
                                Ringkasan Pengajuan
                            </h3>

                            <p class="text-xs text-gray-500">
                                Status pengajuan Anda saat ini
                            </p>
                        </div>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">


                        {{-- TOTAL --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-blue-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Total Pengajuan
                                    </p>

                                    <p class="text-3xl font-bold text-gray-800">
                                        {{ $all_submit ?? 0 }}
                                    </p>

                                    <p class="text-xs text-blue-600 mt-2 font-medium">
                                        Semua pengajuan
                                    </p>

                                </div>

                                <div
                                    class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-blue-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>


                        {{-- BELUM LENGKAP --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-yellow-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Belum Lengkap
                                    </p>

                                    <p class="text-3xl font-bold text-yellow-600">
                                        {{ $belum_lengkap ?? 0 }}
                                    </p>

                                    <p class="text-xs text-yellow-600 mt-2 font-medium">
                                        Perlu dilengkapi
                                    </p>

                                </div>

                                <div
                                    class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-yellow-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>


                        {{-- BELUM DIVERIFIKASI --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-red-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Belum Diverifikasi
                                    </p>

                                    <p class="text-3xl font-bold text-red-600">
                                        {{ $belum_diverifikasi ?? 0 }}
                                    </p>

                                    <p class="text-xs text-red-600 mt-2 font-medium">
                                        Menunggu verifikasi
                                    </p>

                                </div>

                                <div
                                    class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-red-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>


                        {{-- SELESAI --}}
                        <div
                            class="stat-card bg-white rounded-2xl border border-green-100 shadow-sm p-5">

                            <div class="relative z-10 flex items-start justify-between">

                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-2">
                                        Selesai
                                    </p>

                                    <p class="text-3xl font-bold text-green-600">
                                        {{ $selesai ?? 0 }}
                                    </p>

                                    <p class="text-xs text-green-600 mt-2 font-medium">
                                        Pengajuan selesai
                                    </p>

                                </div>

                                <div
                                    class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-green-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- AKSI CEPAT --}}
                {{-- ========================================================= --}}
                <div
                    class="dashboard-card bg-white rounded-2xl border border-gray-200 shadow-sm p-6">

                    <div class="flex items-center justify-between gap-4 mb-6">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center shadow-md">

                                <svg class="w-5 h-5 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                        {{-- BUAT PENGAJUAN --}}
                        <a href="{{ route('submit.index') }}"
                            class="quick-action group flex items-center gap-4 p-5 rounded-2xl border border-blue-200 bg-gradient-to-br from-blue-50 to-blue-100/40 hover:border-blue-300 hover:shadow-lg">

                            <div
                                class="action-icon w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-md">

                                <svg class="w-6 h-6 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4">
                                    </path>

                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="font-bold text-gray-800">
                                    Buat Pengajuan
                                </p>

                                <p class="text-xs text-gray-600 mt-1">
                                    Ajukan keuangan baru
                                </p>

                            </div>

                            <svg class="w-5 h-5 ml-auto text-blue-400 group-hover:text-blue-600 transition"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>

                            </svg>

                        </a>


                        {{-- MONITORING --}}
                        <a href="{{ route('user.monitoring') }}"
                            class="quick-action group flex items-center gap-4 p-5 rounded-2xl border border-purple-200 bg-gradient-to-br from-purple-50 to-purple-100/40 hover:border-purple-300 hover:shadow-lg">

                            <div
                                class="action-icon w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center shadow-md">

                                <svg class="w-6 h-6 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 016 0">
                                    </path>

                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="font-bold text-gray-800">
                                    Lihat Pengajuan
                                </p>

                                <p class="text-xs text-gray-600 mt-1">
                                    Kelola pengajuan Anda
                                </p>

                            </div>

                            <svg class="w-5 h-5 ml-auto text-purple-400 group-hover:text-purple-600 transition"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>

                            </svg>

                        </a>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- PENGAJUAN TERBARU --}}
                {{-- ========================================================= --}}
                <div
                    class="dashboard-card bg-white rounded-2xl border border-gray-200 shadow-sm p-6">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6 pb-5 border-b border-gray-100">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center shadow-md">

                                <svg class="w-5 h-5 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>

                                </svg>

                            </div>

                            <div>

                                <h3 class="text-lg font-bold text-gray-800">
                                    Pengajuan Terbaru
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Aktivitas pengajuan terbaru Anda
                                </p>

                            </div>

                        </div>


                        <a href="{{ route('user.monitoring') }}"
                            class="inline-flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800 font-semibold transition">

                            Lihat Semua

                            <svg class="w-4 h-4" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>

                            </svg>

                        </a>

                    </div>


                    @forelse ($submission_new ?? [] as $submit)

                        <div
                            class="submission-item flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 mb-3 last:mb-0 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-200">

                            {{-- KIRI --}}
                            <div class="flex items-start gap-4 flex-1 min-w-0">

                                <div
                                    class="number-box w-10 h-10 shrink-0 flex items-center justify-center bg-gradient-to-br from-blue-500 to-blue-700 text-white font-bold text-sm rounded-xl">

                                    {{ $loop->iteration }}

                                </div>


                                <div class="flex-1 min-w-0">

                                    <p class="font-semibold text-gray-800 leading-snug break-words">
                                        {{ $submit->budget_submission_name }}
                                    </p>


                                    <div class="flex flex-wrap items-center gap-2 mt-2">

                                        <span class="inline-flex items-center gap-1 text-xs text-gray-500">

                                            <svg class="w-3.5 h-3.5" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>

                                            </svg>

                                            {{ $submit->created_at->diffForHumans() }}

                                        </span>


                                        @if ($submit->requirements_status == 'Lengkap')

                                            <span
                                                class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">

                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>

                                                Lengkap

                                            </span>

                                        @elseif ($submit->requirements_status == 'Belum Lengkap')

                                            <span
                                                class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">

                                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>

                                                Belum Lengkap

                                            </span>

                                        @else

                                            <span
                                                class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">

                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>

                                                Belum Diperiksa

                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </div>


                            {{-- DETAIL --}}
                            <a href="{{ route('pengajuan.show', $submit->id) }}"
                                class="shrink-0 inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-semibold rounded-xl hover:from-blue-600 hover:to-blue-700 shadow-sm hover:shadow-md transition">

                                Detail

                                <svg class="w-4 h-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>

                                </svg>

                            </a>

                        </div>

                    @empty

                        <div class="text-center py-12">

                            <div
                                class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-4">

                                <svg class="w-9 h-9 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-3-3v6m-2 10h4a2 2 0 002-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>

                                </svg>

                            </div>

                            <h4 class="font-semibold text-gray-700 mb-1">
                                Belum Ada Pengajuan
                            </h4>

                            <p class="text-gray-500 text-sm mb-5">
                                Anda belum memiliki pengajuan keuangan.
                            </p>


                            <a href="{{ route('pengajuan.index') }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-semibold rounded-xl hover:from-blue-600 hover:to-blue-700 shadow-md transition">

                                <svg class="w-4 h-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4">
                                    </path>

                                </svg>

                                Buat Pengajuan Pertama

                            </a>

                        </div>

                    @endforelse


                    {{-- PAGINATION --}}
                    @if ($submission_new instanceof \Illuminate\Pagination\AbstractPaginator)

                        <div class="mt-6 pt-5 border-t border-gray-100">
                            {{ $submission_new->links() }}
                        </div>

                    @endif

                </div>


                {{-- ========================================================= --}}
                {{-- INFO & BANTUAN --}}
                {{-- ========================================================= --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


                    {{-- TIPS --}}
                    <div
                        class="info-card bg-gradient-to-br from-green-50 via-emerald-50 to-white rounded-2xl p-6 border border-green-200 shadow-sm">

                        <div class="flex items-center gap-3 mb-5">

                            <div
                                class="w-11 h-11 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-md">

                                <svg class="w-5 h-5 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                    </path>

                                </svg>

                            </div>

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Tips Pengajuan
                                </h4>

                                <p class="text-xs text-gray-500">
                                    Agar proses pengajuan berjalan lancar
                                </p>

                            </div>

                        </div>


                        <ul class="space-y-3 text-sm text-gray-700">

                            <li class="flex items-start gap-3">

                                <span
                                    class="w-5 h-5 shrink-0 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs font-bold mt-0.5">
                                    ✓
                                </span>

                                <span>
                                    Pastikan dokumen lengkap sebelum mengajukan.
                                </span>

                            </li>

                            <li class="flex items-start gap-3">

                                <span
                                    class="w-5 h-5 shrink-0 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs font-bold mt-0.5">
                                    ✓
                                </span>

                                <span>
                                    Gunakan format PDF untuk file pengajuan.
                                </span>

                            </li>

                            <li class="flex items-start gap-3">

                                <span
                                    class="w-5 h-5 shrink-0 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs font-bold mt-0.5">
                                    ✓
                                </span>

                                <span>
                                    Periksa status pengajuan secara berkala.
                                </span>

                            </li>

                        </ul>

                    </div>


                    {{-- STATUS --}}
                    <div
                        class="info-card bg-gradient-to-br from-blue-50 via-indigo-50 to-white rounded-2xl p-6 border border-blue-200 shadow-sm">

                        <div class="flex items-center gap-3 mb-5">

                            <div
                                class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md">

                                <svg class="w-5 h-5 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>

                                </svg>

                            </div>

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Tentang Status
                                </h4>

                                <p class="text-xs text-gray-500">
                                    Arti status pengajuan Anda
                                </p>

                            </div>

                        </div>


                        <ul class="space-y-3 text-sm text-gray-700">

                            <li class="flex items-center gap-3">

                                <span
                                    class="shrink-0 px-2.5 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                    Belum Lengkap
                                </span>

                                <span>
                                    Dokumen perlu dilengkapi
                                </span>

                            </li>

                            <li class="flex items-center gap-3">

                                <span
                                    class="shrink-0 px-2.5 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                    Belum Diverifikasi
                                </span>

                                <span>
                                    Menunggu proses verifikasi
                                </span>

                            </li>

                            <li class="flex items-center gap-3">

                                <span
                                    class="shrink-0 px-2.5 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                    Selesai
                                </span>

                                <span>
                                    Pengajuan telah selesai
                                </span>

                            </li>

                        </ul>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- FOOTER DASHBOARD --}}
                {{-- ========================================================= --}}
                <div class="text-center pt-2 pb-4">

                    <p class="text-xs text-gray-400">
                        Sistem Pengajuan Keuangan
                    </p>

                </div>


            </div>

        </div>

    </div>

</x-app-layout>
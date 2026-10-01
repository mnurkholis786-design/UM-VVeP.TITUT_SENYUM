<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    Hasil Pencarian Pengajuan
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Pencarian pengajuan terverifikasi
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        .search-page-bg {
            background:
                radial-gradient(circle at top left, rgba(0, 58, 143, .08), transparent 32%),
                radial-gradient(circle at bottom right, rgba(37, 99, 235, .06), transparent 30%),
                #f5f8fc;
            min-height: calc(100vh - 64px);
        }

        .search-hero {
            background:
                radial-gradient(circle at 90% 10%, rgba(96, 165, 250, .28), transparent 28%),
                radial-gradient(circle at 10% 90%, rgba(255, 255, 255, .12), transparent 25%),
                linear-gradient(135deg, #003A8F 0%, #0056c7 52%, #0074d9 100%);
            box-shadow:
                0 20px 45px rgba(0, 58, 143, .20),
                inset 0 1px 0 rgba(255,255,255,.15);
        }

        .glass-card {
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,.7);
            box-shadow:
                0 12px 30px rgba(15, 23, 42, .07),
                0 3px 10px rgba(15, 23, 42, .04);
        }

        .search-icon-box {
            background: linear-gradient(145deg, #ffffff, #dcecff);
            box-shadow:
                0 10px 25px rgba(0, 58, 143, .16),
                inset 0 1px 0 rgba(255,255,255,.9);
        }

        .search-input {
            transition: all .25s ease;
            background: #f8fafc;
        }

        .search-input:hover {
            background: #ffffff;
            border-color: #93c5fd;
        }

        .search-input:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37,99,235,.10);
            outline: none;
        }

        .search-btn {
            background: linear-gradient(135deg, #003A8F, #0056c7);
            box-shadow:
                0 8px 18px rgba(0,58,143,.22),
                inset 0 1px 0 rgba(255,255,255,.15);
            transition: all .25s ease;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 12px 24px rgba(0,58,143,.28),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        .reset-btn {
            transition: all .25s ease;
        }

        .reset-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(15,23,42,.08);
        }

        .result-item {
            position: relative;
            background: linear-gradient(145deg, #ffffff, #f8fbff);
            border: 1px solid #e5eaf2;
            box-shadow: 0 5px 15px rgba(15,23,42,.045);
            transition: all .28s ease;
        }

        .result-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 12px;
            bottom: 12px;
            width: 4px;
            border-radius: 0 8px 8px 0;
            background: linear-gradient(to bottom, #003A8F, #3b82f6);
            opacity: .75;
        }

        .result-item:hover {
            transform: translateY(-3px);
            border-color: #bfdbfe;
            box-shadow:
                0 14px 28px rgba(0,58,143,.10),
                0 4px 10px rgba(15,23,42,.05);
        }

        .number-box {
            background: linear-gradient(145deg, #003A8F, #0064d8);
            box-shadow:
                0 8px 16px rgba(0,58,143,.22),
                inset 0 1px 0 rgba(255,255,255,.18);
        }

        .result-link {
            transition: all .2s ease;
        }

        .result-link:hover .result-title {
            color: #003A8F;
        }

        .result-title {
            transition: color .2s ease;
        }

        .status-badge {
            border: 1px solid transparent;
            box-shadow: 0 2px 5px rgba(15,23,42,.04);
        }

        .time-badge {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
        }

        .arrow-box {
            transition: all .25s ease;
        }

        .result-item:hover .arrow-box {
            transform: translateX(4px);
            background: #eaf2ff;
            color: #003A8F;
        }

        .section-title-line {
            position: relative;
        }

        .section-title-line::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -12px;
            width: 55px;
            height: 3px;
            border-radius: 999px;
            background: linear-gradient(90deg, #003A8F, #3b82f6);
        }

        .empty-box {
            background:
                radial-gradient(circle at 50% 0%, rgba(59,130,246,.08), transparent 35%),
                #f8fafc;
            border: 1px dashed #cbd5e1;
        }

        .empty-icon {
            background: linear-gradient(145deg, #eef5ff, #dbeafe);
            box-shadow:
                0 10px 20px rgba(37,99,235,.10),
                inset 0 1px 0 rgba(255,255,255,.9);
        }

        .back-btn {
            transition: all .25s ease;
        }

        .back-btn:hover {
            transform: translateX(-3px);
            box-shadow: 0 8px 18px rgba(15,23,42,.08);
        }

        @media (max-width: 640px) {
            .result-item {
                padding: 1rem !important;
            }

            .result-item::before {
                display: none;
            }
        }
    </style>

    <div class="search-page-bg py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ========================================================= --}}
            {{-- HERO --}}
            {{-- ========================================================= --}}
            <div class="search-hero rounded-3xl overflow-hidden mb-7 relative">

                <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute -bottom-24 -left-20 w-72 h-72 rounded-full bg-blue-300/10 blur-3xl"></div>

                <div class="relative p-7 sm:p-9">

                    <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                        {{-- ICON --}}
                        <div class="search-icon-box w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0">

                            <svg class="w-8 h-8 text-[#003A8F]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M21 21l-5.2-5.2m2.2-5.3a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />

                            </svg>

                        </div>

                        {{-- TITLE --}}
                        <div class="flex-1">

                            <div class="flex flex-wrap items-center gap-2 mb-2">

                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/15 border border-white/20 text-white/90 text-xs font-semibold backdrop-blur-sm">
                                    PENCARIAN PENGAJUAN
                                </span>

                                @if(request('search'))
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 border border-white/15 text-white/80 text-xs">
                                        "{{ request('search') }}"
                                    </span>
                                @endif

                            </div>

                            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                                Hasil Pencarian
                            </h1>

                            <p class="text-blue-100 mt-2 text-sm sm:text-base">
                                Temukan pengajuan yang telah diverifikasi berdasarkan nama dan rentang tanggal.
                            </p>

                        </div>

                        {{-- TOTAL --}}
                        <div class="bg-white/10 border border-white/15 backdrop-blur-md rounded-2xl px-5 py-4 text-center min-w-[120px]">

                            <div class="text-3xl font-extrabold text-white">
                                {{ $submit->count() }}
                            </div>

                            <div class="text-xs text-blue-100 mt-1">
                                Pengajuan ditemukan
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- TOMBOL KEMBALI --}}
            {{-- ========================================================= --}}
            <div class="mb-5">

                <a href="{{ route('final.index') }}"
                    class="back-btn inline-flex items-center gap-2 px-4 py-2.5 bg-white text-gray-700 border border-gray-200 rounded-xl shadow-sm hover:text-[#003A8F] hover:border-blue-200">

                    <svg class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                    </svg>

                    <span class="font-semibold">
                        Kembali ke Verifikasi Final
                    </span>

                </a>

            </div>


            {{-- ========================================================= --}}
            {{-- FILTER / SEARCH CARD --}}
            {{-- ========================================================= --}}
            <div class="glass-card rounded-3xl p-6 sm:p-7 mb-7">

                <div class="flex items-center gap-3 mb-6">

                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">

                        <svg class="w-5 h-5 text-[#003A8F]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />

                        </svg>

                    </div>

                    <div>
                        <h3 class="font-bold text-gray-800 text-lg">
                            Cari Pengajuan
                        </h3>

                        <p class="text-sm text-gray-500">
                            Gunakan kata kunci atau rentang tanggal untuk mempersempit hasil.
                        </p>
                    </div>

                </div>


                <form method="GET" action="{{ route('final.search') }}">

                    {{-- SEARCH --}}
                    <div class="mb-5">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Pengajuan
                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">

                                <svg class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />

                                </svg>

                            </div>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="search-input block w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400"
                                placeholder="Masukkan nama pengajuan...">

                        </div>

                    </div>


                    {{-- DATE + BUTTON --}}
                    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr_auto] gap-4 items-end">

                        {{-- START DATE --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Mulai Tanggal
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                value="{{ request('start_date') }}"
                                class="search-input block w-full px-4 py-3.5 border border-gray-200 rounded-xl text-gray-800">

                        </div>


                        {{-- END DATE --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Sampai Tanggal
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                value="{{ request('end_date') }}"
                                class="search-input block w-full px-4 py-3.5 border border-gray-200 rounded-xl text-gray-800">

                        </div>


                        {{-- BUTTONS --}}
                        <div class="flex gap-3">

                            <a href="{{ route('final.index') }}"
                                class="reset-btn inline-flex items-center justify-center gap-2 px-5 py-3.5 bg-white border border-gray-200 text-gray-700 font-semibold rounded-xl">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />

                                </svg>

                                Reset

                            </a>


                            <button
                                type="submit"
                                class="search-btn inline-flex items-center justify-center gap-2 px-6 py-3.5 text-white font-bold rounded-xl">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />

                                </svg>

                                Cari

                            </button>

                        </div>

                    </div>

                </form>

            </div>


            {{-- ========================================================= --}}
            {{-- HASIL PENCARIAN --}}
            {{-- ========================================================= --}}
            <div class="glass-card rounded-3xl p-6 sm:p-7">

                {{-- HEADER --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-7">

                    <div>

                        <div class="section-title-line inline-block">

                            <h3 class="text-xl font-extrabold text-gray-800">
                                Hasil Pencarian Pengajuan
                            </h3>

                        </div>

                        <p class="text-sm text-gray-500 mt-4">
                            Menampilkan
                            <span class="font-bold text-[#003A8F]">
                                {{ $submit->count() }}
                            </span>
                            pengajuan yang sesuai dengan pencarian.
                        </p>

                    </div>


                    {{-- SEARCH SUMMARY --}}
                    @if(request('search') || request('start_date') || request('end_date'))

                        <div class="flex flex-wrap gap-2">

                            @if(request('search'))
                                <span class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-blue-50 text-[#003A8F] border border-blue-100 text-xs font-semibold">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />

                                    </svg>

                                    {{ request('search') }}

                                </span>
                            @endif


                            @if(request('start_date'))
                                <span class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-slate-50 text-slate-600 border border-slate-200 text-xs font-semibold">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                    </svg>

                                    {{ request('start_date') }}

                                </span>
                            @endif


                            @if(request('end_date'))
                                <span class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-slate-50 text-slate-600 border border-slate-200 text-xs font-semibold">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                    </svg>

                                    {{ request('end_date') }}

                                </span>
                            @endif

                        </div>

                    @endif

                </div>


                {{-- LIST --}}
                <div class="space-y-4">

                    @php
                        $no = 1;
                    @endphp

                    @forelse ($submit as $result)

                        <div class="result-item rounded-2xl p-4 sm:p-5">

                            <div class="flex items-start gap-4">

                                {{-- NUMBER --}}
                                <div class="number-box flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center text-white font-extrabold text-sm">
                                    {{ $no++ }}
                                </div>


                                {{-- CONTENT --}}
                                <a href="{{ route('final.show', $result->id) }}"
                                    class="result-link flex-1 min-w-0">

                                    {{-- TITLE --}}
                                    <div class="result-title text-base sm:text-lg font-extrabold text-gray-800 mb-2 pr-2">

                                        {{ $result->budget_submission_name }}

                                    </div>


                                    {{-- META --}}
                                    <div class="flex flex-col sm:flex-row sm:flex-wrap gap-x-5 gap-y-1.5 text-xs text-gray-500 mb-3">

                                        <div class="flex items-center gap-1.5">

                                            <svg class="w-4 h-4 text-blue-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />

                                            </svg>

                                            <span>
                                                Diajukan oleh:
                                                <strong class="text-gray-700">
                                                    {{ $result->user->name }}
                                                </strong>
                                            </span>

                                        </div>


                                        <div class="flex items-center gap-1.5">

                                            <svg class="w-4 h-4 text-indigo-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6" />

                                            </svg>

                                            <span>
                                                Divisi:
                                                <strong class="text-gray-700">
                                                    {{ $result->user->role }}
                                                </strong>
                                            </span>

                                        </div>

                                    </div>


                                    {{-- STATUS --}}
                                    <div class="flex flex-wrap items-center gap-2">

                                        {{-- SEDANG PROSES --}}
                                        @if (
                                            ($result->requirements_status == 'Belum Lengkap' ||
                                                $result->requirements_status == 'Belum Diperiksa') &&
                                                $result->verification_status == 0
                                        )

                                            <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-amber-50 text-amber-700 border-amber-100">

                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

                                                Sedang Proses

                                            </span>

                                        @endif


                                        {{-- KELENGKAPAN --}}
                                        @if ($result->requirements_status == 'Belum Lengkap')

                                            <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-amber-50 text-amber-700 border-amber-100">

                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

                                                Belum Lengkap

                                            </span>

                                        @elseif($result->requirements_status == 'Lengkap')

                                            <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-emerald-50 text-emerald-700 border-emerald-100">

                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                                                Lengkap

                                            </span>

                                        @else

                                            <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-red-50 text-red-700 border-red-100">

                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>

                                                Belum Diperiksa

                                            </span>

                                        @endif


                                        {{-- VERIFIKASI --}}
                                        @if ($result->verification_status == 1)

                                            <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-emerald-50 text-emerald-700 border-emerald-100">

                                                <svg class="w-3.5 h-3.5"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 13l4 4L19 7" />

                                                </svg>

                                                Diverifikasi

                                            </span>

                                        @else

                                            <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-red-50 text-red-700 border-red-100">

                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>

                                                Belum Diverifikasi

                                            </span>

                                        @endif


                                        {{-- ARSIP --}}
                                        @if ($result->is_archive == 1)

                                            <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-blue-50 text-blue-700 border-blue-100">

                                                <svg class="w-3.5 h-3.5"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 8h14M5 8l1 12h12l1-12M9 8V5h6v3" />

                                                </svg>

                                                Diarsipkan

                                            </span>

                                        @endif

                                    </div>

                                </a>


                                {{-- TIME --}}
                                <div class="hidden md:flex flex-col items-end gap-2 flex-shrink-0">

                                    <span class="time-badge inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-gray-500">

                                        <svg class="w-3.5 h-3.5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M12 8v4l2.5 2.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                        {{ $result->updated_at->diffForHumans() }}

                                    </span>

                                </div>


                                {{-- ARROW --}}
                                <div class="arrow-box flex-shrink-0 w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 bg-gray-50">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7" />

                                    </svg>

                                </div>

                            </div>

                        </div>

                    @empty

                        {{-- EMPTY --}}
                        <div class="empty-box rounded-3xl py-16 px-6 text-center">

                            <div class="empty-icon w-20 h-20 rounded-3xl flex items-center justify-center mx-auto mb-5">

                                <svg class="w-10 h-10 text-[#003A8F]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />

                                </svg>

                            </div>

                            <h4 class="text-lg font-extrabold text-gray-700">
                                Tidak Ada Pengajuan
                            </h4>

                            <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">
                                {{ request('search') || request('status')
                                    ? 'Tidak ada pengajuan yang sesuai dengan filter pencarian.'
                                    : 'Belum ada pengajuan yang perlu diperiksa.' }}
                            </p>

                            <a href="{{ route('final.index') }}"
                                class="inline-flex items-center gap-2 mt-6 px-5 py-2.5 rounded-xl bg-[#003A8F] text-white font-semibold shadow-lg shadow-blue-900/20 hover:bg-[#0056c7] transition">

                                <svg class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                                </svg>

                                Kembali ke Daftar

                            </a>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
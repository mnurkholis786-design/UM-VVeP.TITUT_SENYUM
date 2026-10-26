<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Pencarian Pengajuan') }}
        </h2>
    </x-slot>

    {{-- ===================== STYLE ===================== --}}
    <style>
        /* Background */
        .search-bg {
            background: linear-gradient(
                135deg,
                #f0f4ff 0%,
                #e8f0fe 25%,
                #f5f0ff 50%,
                #e8f4f8 75%,
                #f0fff4 100%
            );
            background-size: 400% 400%;
            animation: gradientShift 12s ease infinite;
        }

        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glass card */
        .glass-card {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.75);
            box-shadow:
                0 8px 32px rgba(0, 58, 143, 0.10),
                0 2px 8px rgba(0, 0, 0, 0.04);
        }

        /* Header icon */
        .search-heading-icon {
            flex: 0 0 44px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: linear-gradient(135deg, #003A8F, #2563eb);
            border: 1px solid rgba(255, 255, 255, 0.65);
            border-radius: 14px;
            box-shadow: 0 8px 18px rgba(0, 58, 143, 0.22);
        }

        .search-heading-icon svg {
            width: 21px;
            height: 21px;
            display: block;
        }

        /* Input umum */
        .search-input-3d {
            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .search-input-3d:focus {
            outline: none;
            border-color: #003A8F;
            box-shadow:
                0 5px 18px rgba(0, 58, 143, 0.10),
                0 0 0 3px rgba(0, 58, 143, 0.08);
        }

        /* Label pencarian: tetap di atas input */
        .search-field-label {
            display: block;
            margin-bottom: 9px;
            color: #596579;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.5;
        }

        /* Wrapper input pencarian */
        .search-name-wrapper {
            position: relative;
            width: 100%;
        }

        /* Kolom nama pengajuan */
        .search-name-input {
            display: block;
            width: 100%;
            min-height: 52px;
            padding: 13px 18px 13px 51px;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            background: #ffffff;
            color: #1f2937;
            font-size: 14px;
            line-height: 1.5;
        }

        .search-name-input::placeholder {
            color: #9ca3af;
            opacity: 1;
        }

        /* Ikon di dalam input */
        .search-name-icon {
            position: absolute;
            top: 50%;
            left: 17px;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            pointer-events: none;
        }

        .search-name-icon svg {
            width: 20px;
            height: 20px;
        }

        /* Input tanggal */
        .date-input {
            display: block;
            width: 100%;
            min-width: 0;
            min-height: 46px;
            padding: 11px 13px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #ffffff;
            color: #1f2937;
            font-size: 14px;
        }

        .date-input:focus {
            outline: none;
            border-color: #003A8F;
            box-shadow: 0 0 0 3px rgba(0, 58, 143, 0.08);
        }

        /* Tombol Cari */
        .btn-search {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
                135deg,
                #003A8F 0%,
                #1e40af 50%,
                #003A8F 100%
            );
            background-size: 200% 200%;
            box-shadow: 0 4px 14px rgba(0, 58, 143, 0.30);
            transition: all 0.25s ease;
        }

        .btn-search:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(0, 58, 143, 0.32);
        }

        .btn-search:active {
            transform: translateY(0);
        }

        @keyframes shimmer {
            0%   { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        .btn-search::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.14),
                transparent
            );
            background-size: 200% 100%;
            animation: shimmer 2.5s infinite;
            border-radius: inherit;
            pointer-events: none;
        }

        /* Tombol Reset */
        .btn-reset {
            transition: all 0.25s ease;
        }

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.10);
        }

        /* Tombol kembali */
        .btn-back {
            transition: all 0.25s ease;
        }

        .btn-back:hover {
            transform: translateX(-3px);
        }

        /* Indikator mengetik */
        .typing-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #003A8F;
            animation: pulse 1.4s infinite ease-in-out;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes pulse {
            0%, 80%, 100% {
                transform: scale(0.6);
                opacity: 0.4;
            }

            40% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Kartu hasil */
        .result-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
            will-change: transform;
        }

        .result-card:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 58, 143, 0.20);
            box-shadow: 0 12px 28px rgba(0, 58, 143, 0.12);
        }

        /* Nomor urut */
        .num-badge {
            background: linear-gradient(135deg, #003A8F, #1e40af);
            box-shadow:
                0 4px 10px rgba(0, 58, 143, 0.30),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
            transition: transform 0.25s ease;
        }

        .result-card:hover .num-badge {
            transform: scale(1.06);
        }

        /* Dekorasi background */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.25;
            pointer-events: none;
            animation: floatOrb 8s ease-in-out infinite;
        }

        @keyframes floatOrb {
            0%, 100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-20px) scale(1.05);
            }
        }

        /* Animasi hasil */
        .result-item {
            animation: fadeInUp 0.4s ease both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result-item:nth-child(1)  { animation-delay: 0.05s; }
        .result-item:nth-child(2)  { animation-delay: 0.10s; }
        .result-item:nth-child(3)  { animation-delay: 0.15s; }
        .result-item:nth-child(4)  { animation-delay: 0.20s; }
        .result-item:nth-child(5)  { animation-delay: 0.25s; }
        .result-item:nth-child(6)  { animation-delay: 0.30s; }
        .result-item:nth-child(7)  { animation-delay: 0.35s; }
        .result-item:nth-child(8)  { animation-delay: 0.40s; }
        .result-item:nth-child(9)  { animation-delay: 0.45s; }
        .result-item:nth-child(10) { animation-delay: 0.50s; }

        /* Tampilan layar kecil */
        @media (max-width: 640px) {
            .search-heading-icon {
                flex-basis: 40px;
                width: 40px;
                height: 40px;
            }

            .search-name-input {
                min-height: 49px;
                padding-left: 46px;
                padding-right: 12px;
            }

            .search-name-icon {
                left: 14px;
            }

            .glass-card {
                border-radius: 22px;
            }

            .result-card {
                gap: 12px;
                padding: 12px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .search-bg,
            .orb,
            .typing-dot,
            .result-item,
            .btn-search::after {
                animation: none !important;
            }

            .result-card,
            .search-input-3d,
            .btn-search,
            .btn-reset,
            .btn-back {
                transition: none !important;
            }
        }
    </style>

    {{-- ===================== KONTEN UTAMA ===================== --}}
    <div class="search-bg min-h-screen py-8 relative overflow-hidden">

        {{-- Dekorasi background --}}
        <div class="orb w-96 h-96 bg-blue-400 top-[-80px] right-[-60px]"></div>

        <div class="orb w-72 h-72 bg-indigo-300 bottom-[10%] left-[-40px]"
             style="animation-delay: 3s;"></div>

        <div class="orb w-56 h-56 bg-purple-300 top-[40%] right-[5%]"
             style="animation-delay: 5s;"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- ===================== TOMBOL KEMBALI ===================== --}}
            <div class="mb-6">
                <a href="{{ route('validation.index') }}"
                   class="btn-back inline-flex items-center gap-2 px-4 py-2.5
                          bg-white/80 backdrop-blur border border-white/60
                          text-gray-700 font-medium rounded-xl shadow-sm
                          hover:bg-white hover:text-blue-700 hover:border-blue-200">

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"
                         aria-hidden="true">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>

                    Kembali
                </a>
            </div>

            {{-- ===================== FORM PENCARIAN ===================== --}}
            <div class="glass-card rounded-3xl p-6 sm:p-8 mb-6">

                {{-- Header pencarian --}}
                <div class="flex items-center gap-3 mb-7">

                    <div class="search-heading-icon">
                        <svg fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             aria-hidden="true">
                            <circle cx="11" cy="11" r="7"
                                    stroke-width="2" />
                            <path d="m16 16 4.5 4.5"
                                  stroke-width="2"
                                  stroke-linecap="round" />
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <h3 class="text-lg font-black text-gray-800">
                            Cari Pengajuan
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            Filter berdasarkan nama atau rentang tanggal
                        </p>
                    </div>
                </div>

                <form method="GET"
                      action="{{ route('validation.search') }}"
                      class="space-y-5"
                      id="searchForm">

                    {{-- ===================== INPUT NAMA ===================== --}}
                    <div class="w-full">

                        <label for="searchInput"
                               class="search-field-label">
                            Nama Pengajuan
                        </label>

                        <div class="search-name-wrapper">

                            {{-- Ikon pencarian --}}
                            <div class="search-name-icon">
                                <svg fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24"
                                     aria-hidden="true">
                                    <circle cx="11" cy="11" r="7"
                                            stroke-width="2" />
                                    <path d="m16 16 4.5 4.5"
                                          stroke-width="2"
                                          stroke-linecap="round" />
                                </svg>
                            </div>

                            <input
                                type="text"
                                name="search"
                                id="searchInput"
                                value="{{ request('search') }}"
                                placeholder="Masukkan nama pengajuan..."
                                autocomplete="off"
                                class="search-input-3d search-name-input"
                            >

                            {{-- Indikator mengetik --}}
                            <div id="typingIndicator"
                                 class="absolute inset-y-0 right-4 hidden items-center gap-1"
                                 style="display: none;"
                                 aria-hidden="true">
                                <span class="typing-dot"></span>
                                <span class="typing-dot"></span>
                                <span class="typing-dot"></span>
                            </div>
                        </div>
                    </div>

                    {{-- ===================== TANGGAL DAN TOMBOL ===================== --}}
                    <div class="flex flex-col md:flex-row md:items-end
                                md:justify-between gap-5">

                        {{-- Filter tanggal --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2
                                    gap-4 w-full md:flex-1">

                            <div class="min-w-0">
                                <label for="start_date"
                                       class="block text-xs font-bold
                                              text-gray-500 uppercase
                                              tracking-wide mb-2">
                                    Mulai Tanggal
                                </label>

                                <input
                                    type="date"
                                    id="start_date"
                                    name="start_date"
                                    value="{{ request('start_date') }}"
                                    class="search-input-3d date-input"
                                >
                            </div>

                            <div class="min-w-0">
                                <label for="end_date"
                                       class="block text-xs font-bold
                                              text-gray-500 uppercase
                                              tracking-wide mb-2">
                                    Sampai Tanggal
                                </label>

                                <input
                                    type="date"
                                    id="end_date"
                                    name="end_date"
                                    value="{{ request('end_date') }}"
                                    class="search-input-3d date-input"
                                >
                            </div>
                        </div>

                        {{-- Tombol Reset dan Cari --}}
                        <div class="flex items-center gap-3 w-full md:w-auto">

                            {{-- Reset --}}
                            <a href="{{ route('validation.index') }}"
                               class="btn-reset inline-flex flex-1 md:flex-none
                                      items-center justify-center gap-2
                                      px-4 sm:px-5 py-3
                                      bg-white border border-gray-200
                                      hover:bg-gray-50 text-gray-700
                                      font-semibold rounded-2xl
                                      shadow-sm text-sm whitespace-nowrap">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24"
                                     aria-hidden="true">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M4 4v5h.582m15.356 2A8.001
                                             8.001 0 004.582 9m0 0H9m11
                                             11v-5h-.581m0 0a8.003 8.003
                                             0 01-15.357-2m15.357 2H15" />
                                </svg>

                                Reset
                            </a>

                            {{-- Cari --}}
                            <button
                                type="submit"
                                class="btn-search inline-flex flex-1 md:flex-none
                                       items-center justify-center gap-2
                                       px-6 sm:px-7 py-3 text-white
                                       font-bold rounded-2xl text-sm
                                       whitespace-nowrap">

                                <svg class="w-4 h-4 relative z-10"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24"
                                     aria-hidden="true">
                                    <circle cx="11" cy="11" r="7"
                                            stroke-width="2" />
                                    <path d="m16 16 4.5 4.5"
                                          stroke-width="2"
                                          stroke-linecap="round" />
                                </svg>

                                <span class="relative z-10">Cari</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- ===================== HASIL PENCARIAN ===================== --}}
            <div class="glass-card rounded-3xl p-6 sm:p-8">

                {{-- Header hasil --}}
                <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between
                            gap-4 mb-6">

                    <div class="flex items-center gap-3 min-w-0">

                        <div class="w-10 h-10 flex-shrink-0 rounded-xl
                                    bg-gradient-to-br from-emerald-500
                                    to-teal-600 flex items-center
                                    justify-center shadow-lg shadow-emerald-100">

                            <svg class="w-5 h-5 text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 aria-hidden="true">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2
                                         0 002 2h10a2 2 0 002-2V7a2
                                         2 0 00-2-2h-2M9 5a2 2 0
                                         002 2h2a2 2 0 002-2M9 5a2
                                         2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <h3 class="text-lg font-black text-gray-800">
                                Hasil Pencarian
                            </h3>

                            <p class="text-sm text-gray-500">
                                Total:
                                <span class="font-bold text-blue-700">
                                    {{ $submit->count() }}
                                </span>
                                pengajuan ditemukan
                            </p>
                        </div>
                    </div>

                    @if(request('search'))
                        <div class="self-start sm:self-auto
                                    px-3 py-1.5 bg-blue-50
                                    border border-blue-100 rounded-xl
                                    max-w-full">

                            <span class="text-xs text-blue-700 font-semibold
                                         break-words">
                                🔍 "{{ request('search') }}"
                            </span>
                        </div>
                    @endif
                </div>

                {{-- Daftar hasil --}}
                <div class="space-y-3">
                    @php $no = 1; @endphp

                    @forelse ($submit as $result)

                        <div class="result-card result-item p-4
                                    flex items-center gap-4"
                             style="animation-delay: {{ ($no - 1) * 0.06 }}s">

                            {{-- Nomor urut --}}
                            <div class="num-badge flex-shrink-0
                                        w-11 h-11 flex items-center
                                        justify-center text-white
                                        font-black text-sm rounded-xl">
                                {{ $no++ }}
                            </div>

                            {{-- Informasi pengajuan --}}
                            <a href="{{ route('validation.show', $result->id) }}"
                               class="flex-1 min-w-0">

                                <div class="font-bold text-gray-800 mb-1 truncate">
                                    {{ $result->budget_submission_name }}
                                </div>

                                <div class="text-xs text-gray-500 mb-1">
                                    Diajukan oleh:
                                    <span class="font-semibold text-gray-700">
                                        {{ $result->user->name }}
                                    </span>
                                </div>

                                <div class="text-xs text-gray-500 mb-2">
                                    Divisi:
                                    <span class="font-semibold text-gray-700">
                                        {{ $result->user->role }}
                                    </span>
                                </div>

                                {{-- Status kelengkapan --}}
                                <div class="flex flex-wrap items-center gap-1.5">

                                    @if(
                                        (
                                            $result->requirements_status == 'Belum Lengkap'
                                            || $result->requirements_status == 'Belum Diperiksa'
                                        )
                                        && $result->verification_status == 0
                                    )
                                        <span class="inline-flex items-center
                                                     px-2 py-0.5 text-xs
                                                     font-semibold rounded-lg
                                                     bg-amber-100 text-amber-700
                                                     border border-amber-200">
                                            ⏳ Sedang Proses
                                        </span>
                                    @endif

                                    @if($result->requirements_status == 'Belum Lengkap')

                                        <span class="inline-flex items-center
                                                     px-2 py-0.5 text-xs
                                                     font-semibold rounded-lg
                                                     bg-orange-100 text-orange-700
                                                     border border-orange-200">
                                            ⚠ Belum Lengkap
                                        </span>

                                    @elseif($result->requirements_status == 'Lengkap')

                                        <span class="inline-flex items-center
                                                     px-2 py-0.5 text-xs
                                                     font-semibold rounded-lg
                                                     bg-emerald-100 text-emerald-700
                                                     border border-emerald-200">
                                            ✓ Lengkap
                                        </span>

                                    @else

                                        <span class="inline-flex items-center
                                                     px-2 py-0.5 text-xs
                                                     font-semibold rounded-lg
                                                     bg-red-100 text-red-700
                                                     border border-red-200">
                                            ✗ Belum Diperiksa
                                        </span>

                                    @endif

                                    {{-- Status verifikasi --}}
                                    @if($result->verification_status == 1)

                                        <span class="inline-flex items-center
                                                     px-2 py-0.5 text-xs
                                                     font-semibold rounded-lg
                                                     bg-blue-100 text-blue-700
                                                     border border-blue-200">
                                            ✓ Diverifikasi
                                        </span>

                                    @else

                                        <span class="inline-flex items-center
                                                     px-2 py-0.5 text-xs
                                                     font-semibold rounded-lg
                                                     bg-slate-100 text-slate-600
                                                     border border-slate-200">
                                            ✗ Belum Diverifikasi
                                        </span>

                                    @endif

                                    {{-- Status arsip --}}
                                    @if($result->is_archive == 1)

                                        <span class="inline-flex items-center
                                                     px-2 py-0.5 text-xs
                                                     font-semibold rounded-lg
                                                     bg-indigo-100 text-indigo-700
                                                     border border-indigo-200">
                                            📁 Diarsipkan
                                        </span>

                                    @endif
                                </div>
                            </a>

                            {{-- Waktu dan tombol detail --}}
                            <div class="flex-shrink-0 flex flex-col
                                        items-end gap-2">

                                <span class="text-xs text-gray-400 whitespace-nowrap">
                                    {{ $result->updated_at->diffForHumans() }}
                                </span>

                                <div class="w-8 h-8 rounded-xl
                                            bg-gray-50 border border-gray-100
                                            flex items-center justify-center">

                                    <svg class="w-4 h-4 text-gray-400"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24"
                                         aria-hidden="true">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                    @empty

                        {{-- Jika hasil kosong --}}
                        <div class="text-center py-16">

                            <div class="w-20 h-20
                                        bg-gradient-to-br from-gray-100
                                        to-gray-200 rounded-3xl
                                        flex items-center justify-center
                                        mx-auto mb-4 shadow-inner">

                                <svg class="w-10 h-10 text-gray-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24"
                                     aria-hidden="true">
                                    <circle cx="11" cy="11" r="7"
                                            stroke-width="1.5" />
                                    <path d="m16 16 4.5 4.5"
                                          stroke-width="1.5"
                                          stroke-linecap="round" />
                                </svg>
                            </div>

                            <p class="text-gray-700 font-bold text-lg">
                                Tidak Ada Hasil
                            </p>

                            <p class="text-gray-400 text-sm mt-1">
                                {{ request('search')
                                    ? 'Tidak ditemukan pengajuan yang cocok dengan "' . request('search') . '"'
                                    : 'Belum ada pengajuan yang perlu diperiksa'
                                }}
                            </p>
                        </div>

                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== SCRIPT ===================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const typingIndicator = document.getElementById('typingIndicator');

            // Indikator mengetik
            if (searchInput && typingIndicator) {
                let typingTimer;

                searchInput.addEventListener('input', function () {
                    clearTimeout(typingTimer);

                    if (this.value.length > 0) {
                        typingIndicator.style.display = 'flex';
                    } else {
                        typingIndicator.style.display = 'none';
                    }

                    typingTimer = setTimeout(function () {
                        typingIndicator.style.display = 'none';
                    }, 800);
                });
            }

            // Efek kartu hasil
            document.querySelectorAll('.result-card').forEach(function (card) {
                card.addEventListener('mousemove', function (event) {
                    // Nonaktifkan efek 3D pada layar sentuh.
                    if (window.matchMedia('(hover: none)').matches) {
                        return;
                    }

                    const rect = this.getBoundingClientRect();
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    if (centerX === 0 || centerY === 0) {
                        return;
                    }

                    const x = event.clientX - rect.left;
                    const y = event.clientY - rect.top;

                    const rotateX = ((y - centerY) / centerY) * -2;
                    const rotateY = ((x - centerX) / centerX) * 2;

                    this.style.transform =
                        `perspective(1000px)
                         rotateX(${rotateX}deg)
                         rotateY(${rotateY}deg)
                         translateY(-2px)`;
                });

                card.addEventListener('mouseleave', function () {
                    this.style.transform = '';
                });
            });
        });
    </script>
</x-app-layout>
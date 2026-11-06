<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Daftar Arsip') }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola arsip fisik dan arsip digital berdasarkan kategori dan tahun.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 border border-blue-100">
                <svg class="w-5 h-5 text-blue-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 8h14M5 8a2 2 0 100-4h14a2 2 0 110 4M5 8v12a2 2 0 002 2h10a2 2 0 002-2V8M9 12h6"/>
                </svg>

                <span class="text-sm font-semibold text-blue-700">
                    Arsip
                </span>
            </div>
        </div>
    </x-slot>


    {{-- ========================================================= --}}
    {{-- GLOBAL STYLE & 3D TAB ENHANCEMENTS --}}
    {{-- ========================================================= --}}

    <style>
        .archive-card {
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .archive-card:hover {
            transform: translateY(-2px);
            box-shadow:
                0 12px 28px rgba(15, 23, 42, .08),
                0 4px 10px rgba(37, 99, 235, .04);
        }

        .archive-item {
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background-color .2s ease,
                border-color .2s ease;
        }

        .archive-item:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 20px rgba(15, 23, 42, .06);
        }

        .category-dropdown summary {
            list-style: none;
        }

        .category-dropdown summary::-webkit-details-marker {
            display: none;
        }

        .category-dropdown[open] summary .arrow-icon {
            transform: rotate(180deg);
        }

        .arrow-icon {
            transition: transform .2s ease;
        }

        .glass-card {
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .soft-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .soft-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 999px;
        }

        .soft-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        /* 3D INTERACTIVE TAB STYLES */
        .tab-container-3d {
            background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06), 0 1px 3px rgba(255, 255, 255, 0.8);
        }

        .tab-btn-3d {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .tab-btn-3d.active-tab {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            color: #003A8F;
            font-weight: 800;
            box-shadow: 0 10px 25px -5px rgba(0, 58, 143, 0.15), 
                        0 8px 10px -6px rgba(0, 58, 143, 0.1), 
                        inset 0 1px 0 rgba(255, 255, 255, 1),
                        inset 0 -2px 0 rgba(0, 58, 143, 0.15);
            transform: translateY(-2px);
        }

        .tab-btn-3d.inactive-tab {
            color: #64748B;
            font-weight: 600;
            background: transparent;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }

        .tab-btn-3d.inactive-tab:hover {
            color: #0F172A;
            background: rgba(255, 255, 255, 0.6);
            transform: translateY(-1px);
        }
    </style>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen bg-slate-50/70 py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ========================================================= --}}
            {{-- TOMBOL KEMBALI + HERO --}}
            {{-- ========================================================= --}}

            <div class="mb-5">

                @php
                    if (!empty($category->sub_category)) {
                        $backUrl = route('subcategory.show', $category->id);
                        $backText = 'Kembali ke Sub Kategori';
                    } else {
                        $backUrl = route('cabinet.show', $category->cabinet_id);
                        $backText = 'Kembali ke Kabinet';
                    }
                @endphp

                <a
                    href="{{ $backUrl }}"
                    class="inline-flex items-center gap-2 px-3.5 py-2
                           bg-white text-gray-700 rounded-xl
                           border border-gray-200 shadow-sm text-sm
                           hover:bg-blue-50 hover:text-blue-700
                           hover:border-blue-200 hover:shadow-md
                           transition-all duration-200"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>

                    <span class="font-medium">
                        {{ $backText }}
                    </span>
                </a>

            </div>


            {{-- HERO --}}
            <div
                class="relative overflow-hidden rounded-2xl
                       bg-gradient-to-br from-[#003A8F] via-[#0057B8] to-[#172554]
                       shadow-xl shadow-blue-900/10
                       border border-blue-400/20
                       mb-6"
            >

                {{-- dekorasi --}}
                <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-white/10 pointer-events-none"></div>
                <div class="absolute right-20 -bottom-24 w-72 h-72 rounded-full bg-cyan-300/10 pointer-events-none"></div>
                <div class="absolute left-1/3 -top-24 w-52 h-52 rounded-full bg-blue-300/10 pointer-events-none"></div>

                <div class="relative z-10 p-6 sm:p-7">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-start gap-4">

                            <div
                                class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14
                                       rounded-2xl bg-white/15
                                       border border-white/20
                                       flex items-center justify-center
                                       shadow-lg backdrop-blur-sm"
                            >
                                <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                          d="M4 7a2 2 0 012-2h3l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                          d="M8 12h8M8 16h5"/>
                                </svg>
                            </div>


                            <div class="min-w-0">

                                <p class="text-blue-100 text-xs uppercase tracking-wider font-semibold mb-1">
                                    Kategori Arsip
                                </p>

                                <h1 class="text-2xl sm:text-3xl font-bold text-white leading-tight break-words">
                                    {{ $category->category_name ?? 'Kategori Arsip' }}
                                </h1>

                                @if (!empty($category->sub_category))
                                    <p class="mt-1 text-blue-100 text-sm">
                                        {{ $category->sub_category }}
                                    </p>
                                @endif

                                @if (!empty($category->year))
                                    <div class="mt-2.5 inline-flex items-center gap-2
                                                px-3 py-1 rounded-full
                                                bg-white/15 border border-white/20
                                                text-white text-xs font-semibold">

                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>

                                        Tahun {{ $category->year }}
                                    </div>
                                @endif

                            </div>

                        </div>


                        {{-- STAT --}}
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">

                            <div class="min-w-[120px] px-4 py-3 rounded-xl bg-white/10 border border-white/15 backdrop-blur-sm cursor-pointer hover:bg-white/20 transition shadow-sm" onclick="switchTab('fisik')">
                                <p class="text-blue-100 text-xs font-medium">
                                    Arsip Fisik
                                </p>

                                <p class="text-xl font-bold text-white mt-0.5">
                                    {{ $racks->count() }}
                                </p>

                                <p class="text-blue-100 text-[11px] mt-0.5">
                                    Rak tersedia
                                </p>
                            </div>


                            <div class="min-w-[120px] px-4 py-3 rounded-xl bg-white/10 border border-white/15 backdrop-blur-sm cursor-pointer hover:bg-white/20 transition shadow-sm" onclick="switchTab('digital')">
                                <p class="text-blue-100 text-xs font-medium">
                                    Arsip Digital
                                </p>

                                <p class="text-xl font-bold text-white mt-0.5">
                                    {{ $digitalarchive->total() }}
                                </p>

                                <p class="text-blue-100 text-[11px] mt-0.5">
                                    Dokumen
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- 3D INTERACTIVE TAB SWITCHER NAVIGATION --}}
            {{-- ========================================================= --}}
            <div class="tab-container-3d flex items-center gap-1.5 p-1.5 rounded-2xl mb-6 w-full sm:w-fit border border-slate-300/60 shadow-inner">
                <button
                    id="btn-tab-digital"
                    type="button"
                    onclick="switchTab('digital')"
                    class="tab-btn-3d active-tab flex-1 sm:flex-initial flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-xs sm:text-sm cursor-pointer"
                >
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 8h8M8 12h8M8 16h5"/>
                    </svg>
                    <span>Arsip Digital</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] bg-blue-600 text-white font-black shadow-sm ml-1">{{ $digitalarchive->total() }}</span>
                </button>

                <button
                    id="btn-tab-fisik"
                    type="button"
                    onclick="switchTab('fisik')"
                    class="tab-btn-3d inactive-tab flex-1 sm:flex-initial flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-xs sm:text-sm cursor-pointer"
                >
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7a2 2 0 012-2h3l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"/>
                    </svg>
                    <span>Arsip Fisik (Rak)</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] bg-blue-600 text-white font-black shadow-sm ml-1">{{ $racks->count() }}</span>
                </button>
            </div>



            {{-- ========================================================= --}}
            {{-- TAB CONTENT 1: SECTION ARSIP DIGITAL --}}
            {{-- ========================================================= --}}

            <div
                id="tab-content-digital"
                class="archive-card bg-white rounded-2xl
                       border border-gray-200/80
                       shadow-sm
                       p-5 sm:p-6"
            >

                {{-- HEADER DIGITAL --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-5 pb-4 border-b border-gray-100">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-xl
                                   bg-gradient-to-br from-blue-500 to-indigo-600
                                   flex items-center justify-center
                                   shadow-md shadow-blue-500/10"
                        >
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M8 8h8M8 12h8M8 16h5"/>
                            </svg>
                        </div>


                        <div>

                            <h3 class="text-lg font-bold text-gray-800">
                                Arsip Digital
                            </h3>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Kelola dokumen digital dan pencarian arsip
                            </p>

                        </div>

                    </div>


                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                    {{-- TAMBAH DIGITAL --}}
                    <form action="{{ route('digital.create') }}" method="GET">

                        <input type="hidden" name="category_id" value="{{ $category->id }}">

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center
                                   justify-center gap-2 px-4 py-2
                                   bg-gradient-to-r from-blue-600 to-indigo-600
                                   hover:from-blue-700 hover:to-indigo-700
                                   text-white text-xs font-semibold rounded-xl
                                   shadow-md shadow-blue-500/15
                                   hover:shadow-lg transition-all duration-200"
                        >

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>

                            Tambah Arsip Digital

                        </button>

                    </form>
                    @endif

                </div>


                {{-- ========================================================= --}}
                {{-- SEARCH DIGITAL --}}
                {{-- ========================================================= --}}

                <form
                    method="GET"
                    action="{{ url()->current() }}"
                    class="mb-5 p-4 rounded-xl
                           bg-slate-50/80
                           border border-slate-200/80"
                >
                    <!-- Menjaga parameter tanggal & klasifikasi agar tidak mereset saat cari/filter divisi -->
                    @if(request('tanggal_mulai'))
                        <input type="hidden" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
                    @endif
                    @if(request('tanggal_selesai'))
                        <input type="hidden" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}">
                    @endif
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">

                        {{-- SEARCH --}}
                        <div>

                            <label class="flex items-center gap-1.5 text-xs font-bold text-gray-700 mb-1.5">
                                <span class="w-5 h-5 rounded bg-blue-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                                    </svg>
                                </span>

                                Cari Arsip Digital
                            </label>


                            <input
                                type="text"
                                name="search_digital"
                                value="{{ request('search_digital') }}"
                                placeholder="Cari nama arsip atau pengaju..."
                                class="w-full px-3.5 py-2 text-xs
                                       border border-gray-200
                                       rounded-xl bg-white
                                       shadow-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500/30
                                       focus:border-blue-500"
                            >

                        </div>


                        {{-- DIVISI --}}
                        <div>

                            <label class="flex items-center gap-1.5 text-xs font-bold text-gray-700 mb-1.5">
                                <span class="w-5 h-5 rounded bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h10"/>
                                    </svg>
                                </span>

                                Filter Divisi
                            </label>


                            <select
                                name="divisi"
                                onchange="this.form.submit()"
                                class="w-full px-3.5 py-2 text-xs
                                       border border-gray-200
                                       rounded-xl bg-white
                                       shadow-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500/30
                                       focus:border-blue-500"
                            >

                                <option value="">Semua Divisi</option>

                                <option value="Berita" {{ request('divisi') == 'Berita' ? 'selected' : '' }}>
                                    Berita
                                </option>

                                <option value="Umum" {{ request('divisi') == 'Umum' ? 'selected' : '' }}>
                                    Umum
                                </option>

                                <option value="Program" {{ request('divisi') == 'Program' ? 'selected' : '' }}>
                                    Program
                                </option>

                                <option value="KMB" {{ request('divisi') == 'KMB' ? 'selected' : '' }}>
                                    KMB
                                </option>

                                <option value="Teknik" {{ request('divisi') == 'Teknik' ? 'selected' : '' }}>
                                    Teknik
                                </option>

                                <option value="Pengembangan usaha" {{ request('divisi') == 'Pengembangan usaha' ? 'selected' : '' }}>
                                    Pengembangan usaha
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="flex flex-wrap items-center gap-2 mt-3.5 pt-3 border-t border-gray-200/60">

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-1.5
                                   px-4 py-2
                                   bg-blue-600 hover:bg-blue-700
                                   text-white text-xs font-semibold
                                   rounded-xl shadow-md shadow-blue-500/15
                                   transition"
                        >
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>

                            Cari
                        </button>


                        <a
                            href="{{ url()->current() }}"
                            class="inline-flex items-center justify-center
                                   px-4 py-2
                                   bg-white hover:bg-gray-100
                                   text-gray-700 text-xs font-semibold
                                   rounded-xl border border-gray-200
                                   transition"
                        >
                            Reset
                        </a>

                    </div>

                </form>



                {{-- ========================================================= --}}
                {{-- KATEGORI DIGITAL --}}
                {{-- ========================================================= --}}

                @php
                    $activeCategory = request('category');

                    $isAecActive = $activeCategory === 'AEC.001';
                    $isBahActive = in_array($activeCategory, ['BAH.001', 'BAH.002', 'BAH.003']);
                    $isCbrActive = $activeCategory === 'CBR.001';
                    $isCbtActive = $activeCategory === 'CBT.002';
                    $isCdsActive = in_array($activeCategory, ['CDS.001', 'CDS.002', 'CDS.003']);
                    $isEbaActive = $activeCategory === 'EBA.994';
                    $isWaActive = $activeCategory === 'WA.4376';

                    // Buat query string helper agar parameter lain (tanggal, divisi, dll) tetap terbawa
                    $queryParams = request()->except('category', 'page');
                @endphp


                <div class="mb-6">

                    <div class="flex items-center justify-between gap-3 mb-3">

                        <div>

                            <h4 class="text-sm font-bold text-gray-800">
                                Klasifikasi Arsip Digital
                            </h4>

                            <p class="text-[11px] text-gray-500 mt-0.5">
                                Pilih klasifikasi untuk memfilter arsip.
                            </p>

                        </div>


                        @if ($activeCategory)

                            <a
                                href="{{ url()->current() . '?' . http_build_query($queryParams) }}"
                                class="hidden sm:inline-flex items-center gap-1
                                       text-xs font-semibold text-blue-600
                                       hover:text-blue-800"
                            >
                                Hapus filter
                            </a>

                        @endif

                    </div>


                    <div
                        id="category-dropdowns"
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2.5"
                    >

                        {{-- SEMUA --}}
                        <a
                            href="{{ url()->current() . ($queryParams ? '?' . http_build_query($queryParams) : '') }}"
                            class="flex items-center justify-between
                                   px-3.5 py-2.5 rounded-xl
                                   text-xs font-bold
                                   border transition-all duration-200
                                   {{ !$activeCategory
                                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                        : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                        >

                            <span>SEMUA</span>

                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                            </svg>

                        </a>


                        {{-- AEC --}}
                        <details class="category-dropdown relative" {{ $isAecActive ? 'open' : '' }}>

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-3.5 py-2.5 rounded-xl
                                       text-xs font-bold
                                       border transition-all duration-200
                                       {{ $isAecActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">AEC - Kerja Sama</span>

                                <svg class="arrow-icon w-3.5 h-3.5 flex-shrink-0 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                            </summary>


                            <div class="absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5">

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'AEC.001'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'AEC.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    AEC.001 Kerja Sama Jasa Siaran dan Digitalisasi Penyiaran Daerah
                                </a>

                            </div>

                        </details>


                        {{-- BAH --}}
                        <details class="category-dropdown relative" {{ $isBahActive ? 'open' : '' }}>

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-3.5 py-2.5 rounded-xl
                                       text-xs font-bold
                                       border transition-all duration-200
                                       {{ $isBahActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">BAH - Pelayanan Publik Lainnya</span>

                                <svg class="arrow-icon w-3.5 h-3.5 flex-shrink-0 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                            </summary>


                            <div class="absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5">

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'BAH.001'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'BAH.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    BAH.001 Siaran Berita, Current Affairs dan Olahraga
                                </a>

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'BAH.002'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'BAH.002'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    BAH.002 Siaran Program dan Promosi Acara
                                </a>

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'BAH.003'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'BAH.003'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    BAH.003 Siaran Konten Media Baru
                                </a>

                            </div>

                        </details>


                        {{-- CBR --}}
                        <details class="category-dropdown relative" {{ $isCbrActive ? 'open' : '' }}>

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-3.5 py-2.5 rounded-xl
                                       text-xs font-bold
                                       border transition-all duration-200
                                       {{ $isCbrActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">CBR - Dukungan Teknis</span>

                                <svg class="arrow-icon w-3.5 h-3.5 flex-shrink-0 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                            </summary>


                            <div class="absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5">

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'CBR.001'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'CBR.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CBR.001 Dukungan Teknis Kinerja Transmisi, Multipleksing dan Fasilitas Teknik
                                </a>

                            </div>

                        </details>


                        {{-- CBT --}}
                        <details class="category-dropdown relative" {{ $isCbtActive ? 'open' : '' }}>

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-3.5 py-2.5 rounded-xl
                                       text-xs font-bold
                                       border transition-all duration-200
                                       {{ $isCbtActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">CBT - Prasarana TIK</span>

                                <svg class="arrow-icon w-3.5 h-3.5 flex-shrink-0 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                            </summary>


                            <div class="absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5">

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'CBT.002'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'CBT.002'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CBT.002 Sarana dan Prasarana Teknik Produksi dan Penyiaran
                                </a>

                            </div>

                        </details>


                        {{-- CDS --}}
                        <details class="category-dropdown relative" {{ $isCdsActive ? 'open' : '' }}>

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-3.5 py-2.5 rounded-xl
                                       text-xs font-bold
                                       border transition-all duration-200
                                       {{ $isCdsActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">CDS OP - Prasarana Bidang Teknologi</span>

                                <svg class="arrow-icon w-3.5 h-3.5 flex-shrink-0 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                            </summary>


                            <div class="absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5">

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'CDS.001'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'CDS.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CDS.001 Pemeliharaan Transmisi, Multipleksing dan Fasilitas Teknik
                                </a>

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'CDS.002'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'CDS.002'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CDS.002 Pemeliharaan Peralatan Teknik Produksi dan Penyiaran
                                </a>

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'CDS.003'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'CDS.003'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CDS.003 Pemeliharaan Infrastruktur Teknologi Informatika dan Media Baru
                                </a>

                            </div>

                        </details>


                        {{-- EBA --}}
                        <details class="category-dropdown relative" {{ $isEbaActive ? 'open' : '' }}>

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-3.5 py-2.5 rounded-xl
                                       text-xs font-bold
                                       border transition-all duration-200
                                       {{ $isEbaActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">EBA - Layanan Dukungan Manajemen</span>

                                <svg class="arrow-icon w-3.5 h-3.5 flex-shrink-0 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                            </summary>


                            <div class="absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5">

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'EBA.994'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'EBA.994'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    EBA.994 Layanan Perkantoran
                                </a>

                            </div>

                        </details>


                        {{-- WA --}}
                        <details class="category-dropdown relative" {{ $isWaActive ? 'open' : '' }}>

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-3.5 py-2.5 rounded-xl
                                       text-xs font-bold
                                       border transition-all duration-200
                                       {{ $isWaActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-sm'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">WA - Dukungan Manajemen</span>

                                <svg class="arrow-icon w-3.5 h-3.5 flex-shrink-0 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                            </summary>


                            <div
                                class="absolute right-0 top-full mt-1.5
                                       bg-white border border-gray-200
                                       rounded-xl shadow-xl z-50 p-1.5
                                       w-full sm:w-auto sm:min-w-[300px]"
                            >

                                <a
                                    href="{{ url()->current() . '?' . http_build_query(array_merge($queryParams, ['category' => 'WA.4376'])) }}"
                                    class="block px-3 py-2 rounded-lg text-xs transition
                                    {{ $activeCategory === 'WA.4376'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    WA.4376 Pelaksanaan Dukungan Manajemen dan Tugas Teknis Lainnya Stasiun Penyiaran TV Publik Lokal dan Regional
                                </a>

                            </div>

                        </details>

                    </div>

                </div>



                {{-- ========================================================= --}}
                {{-- PERIODE + EXPORT PDF & EXCEL --}}
                {{-- ========================================================= --}}

                <div
                    class="mb-6 rounded-xl
                           bg-slate-50/80
                           border border-slate-200/80 p-4 sm:p-5"
                >

                    <div class="flex items-start gap-2.5 mb-4">

                        <div class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>


                        <div>

                            <h3 class="text-sm font-bold text-gray-800">
                                Periode Laporan Pengajuan
                            </h3>

                            <p class="text-[11px] text-gray-500 mt-0.5">
                                Tentukan rentang tanggal berdasarkan tanggal dibuatnya pengajuan.
                            </p>

                        </div>

                    </div>


                    {{-- FORM MENGGUNAKAN METHOD GET KE HALAMAN SAAT INI --}}
                    <form method="GET" action="{{ url()->current() }}">

                        <!-- Menjaga parameter pencarian, divisi, dan klasifikasi agar tidak hilang -->
                        @if(request('search_digital'))
                            <input type="hidden" name="search_digital" value="{{ request('search_digital') }}">
                        @endif
                        @if(request('divisi'))
                            <input type="hidden" name="divisi" value="{{ request('divisi') }}">
                        @endif
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                            {{-- 1. PILIH SUB KATEGORI (SEMUA ATAU 1 SUB KATEGORI) --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">
                                    Sub Kategori Arsip
                                </label>
                                <select
                                    id="filter_sub_category"
                                    name="sub_category_id"
                                    class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-xs bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 cursor-pointer"
                                >
                                    <option value="all" {{ request('sub_category_id') === 'all' ? 'selected' : '' }}>
                                        📑 Semua Sub Kategori (Gabungan)
                                    </option>
                                    @if(isset($subcategories))
                                        @foreach($subcategories as $sub)
                                            <option value="{{ $sub->id }}" {{ (request('sub_category_id') == $sub->id) || (!request('sub_category_id') && $sub->id == $category->id) ? 'selected' : '' }}>
                                                {{ $sub->sub_category }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            {{-- 2. MULAI TANGGAL --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">
                                    Mulai Tanggal
                                </label>
                                <input
                                    type="date"
                                    id="input_tanggal_mulai"
                                    name="tanggal_mulai"
                                    value="{{ request('tanggal_mulai') }}"
                                    class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-xs bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
                                >
                            </div>

                            {{-- 3. SAMPAI TANGGAL --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">
                                    Sampai Tanggal
                                </label>
                                <input
                                    type="date"
                                    id="input_tanggal_selesai"
                                    name="tanggal_selesai"
                                    value="{{ request('tanggal_selesai') }}"
                                    class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-xs bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
                                >
                            </div>

                        </div>

                        <div class="flex flex-wrap items-center gap-2 mt-4 pt-3.5 border-t border-gray-200/60">

                            <!-- TOMBOL SUBMIT UNTUK MEMFILTER DATA TANGGAL PADA WEB -->
                            <button
                                type="submit"
                                class="inline-flex items-center gap-1.5
                                       px-4 py-2
                                       bg-blue-600 hover:bg-blue-700
                                       text-white text-xs font-semibold
                                       rounded-xl shadow-md
                                       shadow-blue-500/15
                                       transition"
                            >

                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414V19l-4 2v-5.293L2.293 7.293A1 1 0 012 6.586V4z"/>
                                </svg>

                                Terapkan Periode

                            </button>


                            <a
                                href="{{ url()->current() }}"
                                class="inline-flex items-center
                                       px-4 py-2
                                       bg-white hover:bg-gray-100
                                       text-gray-700
                                       text-xs font-semibold
                                       rounded-xl border border-gray-200
                                       transition"
                            >
                                Reset Periode
                            </a>


                            {{-- EXPORT PDF --}}
                            <button
                                type="button"
                                onclick="openPdfPreviewModal('{{ route('digital.report.pdf', ['id' => $category->id]) }}')"
                                class="inline-flex items-center gap-1.5
                                       px-4 py-2
                                       bg-gradient-to-r from-red-500 to-rose-600
                                       hover:from-red-600 hover:to-rose-700
                                       text-white text-xs font-semibold
                                       rounded-xl shadow-md
                                       shadow-red-500/15
                                       transition ml-auto"
                            >

                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 18h10M7 14h10M7 10h4m-4 8V4h10v14"/>
                                </svg>

                                Export PDF

                            </button>


                            {{-- EXPORT EXCEL --}}
                            <button
                                type="button"
                                onclick="openExcelPreviewModal('{{ route('digital.report.excel', ['id' => $category->id]) }}')"
                                class="inline-flex items-center gap-1.5
                                       px-4 py-2
                                       bg-gradient-to-r from-emerald-600 to-teal-600
                                       hover:from-emerald-700 hover:to-teal-700
                                       text-white text-xs font-semibold
                                       rounded-xl shadow-md
                                       shadow-emerald-500/15
                                       transition"
                            >

                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>

                                Export Excel

                            </button>

                        </div>

                    </form>

                </div>



                {{-- ========================================================= --}}
                {{-- DAFTAR ARSIP DIGITAL --}}
                {{-- ========================================================= --}}

                @if ($digitalarchive->count() > 0)

                    <div class="space-y-2.5">

                        @php
                            $noDigital = ($digitalarchive->currentPage() - 1)
                                * $digitalarchive->perPage() + 1;
                        @endphp


                        @foreach ($digitalarchive as $archive)

                            <div
                                class="archive-item group
                                       flex flex-col sm:flex-row
                                       sm:items-center sm:justify-between
                                       gap-3 p-3.5 sm:p-4
                                       bg-white
                                       border border-gray-200
                                       rounded-xl hover:border-blue-300"
                            >

                                <a
                                    href="{{ route('digital.show', array_merge(['id' => $archive->id], (request('category') ?: $archive->kategori) ? ['category' => (request('category') ?: $archive->kategori)] : [])) }}"
                                    onclick="saveScrollPosition()"
                                    class="flex items-center gap-3.5 flex-1 min-w-0"
                                >

                                    {{-- NOMOR --}}
                                    <div
                                        class="flex-shrink-0 w-9 h-9
                                               flex items-center justify-center
                                               rounded-lg
                                               bg-gradient-to-br
                                               from-[#003A8F] to-[#002766]
                                               text-white text-xs font-bold
                                               shadow-md shadow-blue-900/15
                                               group-hover:scale-105
                                               transition"
                                    >
                                        {{ $noDigital++ }}
                                    </div>


                                    <div class="min-w-0 flex-1">

                                        <p
                                            class="text-gray-900 font-bold
                                                   text-sm
                                                   leading-tight
                                                   break-words
                                                   group-hover:text-blue-700
                                                   transition"
                                        >
                                            {{ $archive->archive_name }}
                                        </p>


                                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5 text-xs">

                                            <span class="inline-flex items-center gap-1 text-gray-600">

                                                <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21a8 8 0 0116 0"/>
                                                </svg>

                                                <span class="text-gray-400">Diajukan:</span>

                                                <span class="font-semibold text-gray-700">
                                                    {{ $archive->submiter_name }}
                                                </span>

                                            </span>


                                            <span class="hidden sm:inline text-gray-300">•</span>


                                            <span class="inline-flex items-center gap-1 text-gray-600">

                                                <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 3c-2.755 0-5.29.926-7.13 2.484A11.95 11.95 0 003 12c0 2.755.926 5.29 2.484 7.13A11.95 11.95 0 0012 21c2.755 0 5.29-.926 7.13-2.484A11.95 11.95 0 0021 12c0-2.755-.926-5.29-2.484-7.13z"/>
                                                </svg>

                                                <span class="text-gray-400">Ditandatangani:</span>

                                                <span class="font-semibold text-gray-700">
                                                    {{ $archive->revenue_officer_name }}
                                                </span>

                                            </span>

                                        </div>


                                        @if (!empty($archive->kategori))

                                            <div class="mt-1.5">

                                                <span
                                                    class="inline-flex items-center
                                                           px-2 py-0.5
                                                           rounded-md
                                                           bg-blue-50
                                                           text-blue-700
                                                           border border-blue-100
                                                           text-[10px] font-semibold"
                                                >
                                                    {{ $archive->kategori }}
                                                </span>

                                            </div>

                                        @endif

                                    </div>

                                </a>


                                {{-- AKSI --}}
                                <div class="flex items-center gap-1.5 sm:ml-2 self-end sm:self-center">

                                    <a
                                        href="{{ route('digital.show', array_merge(['id' => $archive->id], (request('category') ?: $archive->kategori) ? ['category' => (request('category') ?: $archive->kategori)] : [])) }}"
                                        onclick="saveScrollPosition()"
                                        class="hidden sm:inline-flex items-center gap-1
                                               px-2.5 py-1.5
                                               bg-blue-50 hover:bg-blue-100
                                               text-blue-700
                                               rounded-lg text-xs font-semibold
                                               transition"
                                    >
                                        Buka
                                    </a>


                                     @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                                    {{-- TOMBOL EDIT ARSIP DIGITAL (ICON PENSIL) --}}
                                    <a
                                        href="{{ route('digital.edit', array_merge(['id' => $archive->id], (request('category') ?: $archive->kategori) ? ['category' => (request('category') ?: $archive->kategori)] : [])) }}"
                                        onclick="saveScrollPosition()"
                                        class="inline-flex items-center justify-center
                                               w-8 h-8
                                               bg-amber-500 hover:bg-amber-600
                                               text-white rounded-lg
                                               shadow-sm hover:shadow transition"
                                        title="Edit"
                                    >

                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"
                                            />
                                        </svg>

                                    </a>


                                    @php
                                        $isAdmin = strtolower(trim(Auth::user()->role ?? '')) === 'admin';
                                        $isPendingDelete = ($archive->status === 'menunggu_persetujuan_hapus');
                                    @endphp

                                    @if($isPendingDelete)
                                        {{-- JIKA SEDANG MENUNGGU PERSETUJUAN --}}
                                        @if($isAdmin)
                                            {{-- KHUSUS ADMIN: TAMPILKAN TOMBOL SETUJUI / TOLAK --}}
                                            <div class="flex items-center gap-1 bg-amber-50 border border-amber-200 px-2 py-1 rounded-lg shadow-sm">
                                                <span class="text-[11px] text-amber-700 font-bold hidden sm:inline" title="{{ $archive->keterangan }}">
                                                    ⏳ Menunggu Persetujuan
                                                </span>

                                                {{-- Tombol Setujui Hapus (Admin) --}}
                                                <button
                                                    type="button"
                                                    onclick="openApproveModal('{{ route('digital.destroy', $archive->id) }}', '{{ addslashes($archive->archive_name) }}', '{{ $archive->archive_code ?? '-' }}')"
                                                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded transition cursor-pointer"
                                                    title="Setujui Hapus Permanen"
                                                >
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                </button>

                                                {{-- Tombol Tolak Permohonan (Admin) --}}
                                                <button
                                                    type="button"
                                                    onclick="openRejectModal('{{ route('digital.rejectDelete', $archive->id) }}', '{{ addslashes($archive->archive_name) }}', '{{ $archive->archive_code ?? '-' }}')"
                                                    class="p-1 bg-gray-500 hover:bg-gray-600 text-white rounded transition cursor-pointer"
                                                    title="Tolak Permohonan"
                                                >
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        @else
                                            {{-- BUKAN ADMIN: TAMPILKAN BADGE MENUNGGU ADMIN --}}
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-amber-100 border border-amber-300 text-amber-800 rounded-lg text-[11px] font-semibold shadow-sm"
                                                  title="{{ $archive->keterangan }}">
                                                <svg class="w-3.5 h-3.5 text-amber-600 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                                </svg>
                                                Menunggu Admin
                                            </span>
                                        @endif
                                    @else
                                        @if($isAdmin)
                                            {{-- ADMIN: HAPUS LANGSUNG SECARA PERMANEN --}}
                                            <button
                                                type="button"
                                                onclick="openAdminDirectDeleteModal('{{ route('digital.destroy', $archive->id) }}', '{{ addslashes($archive->archive_name) }}', '{{ $archive->archive_code ?? '-' }}')"
                                                class="inline-flex items-center justify-center
                                                       w-8 h-8
                                                       bg-red-500 hover:bg-red-600
                                                       text-white rounded-lg
                                                       shadow-sm hover:shadow transition cursor-pointer"
                                                title="Hapus Arsip Permanen (Admin)"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M6 7h12M9 7V4h6v3m-7 0l1 13h6l1-13M10 11v6m4-6v6"/>
                                                </svg>
                                            </button>
                                        @else
                                            {{-- BUKAN ADMIN: AJUKAN PERMOHONAN HAPUS --}}
                                            <button
                                                type="button"
                                                onclick="openDeleteRequestModal({{ $archive->id }}, '{{ addslashes($archive->archive_name) }}', '{{ $archive->archive_code ?? '-' }}')"
                                                class="inline-flex items-center justify-center
                                                       w-8 h-8
                                                       bg-red-500 hover:bg-red-600
                                                       text-white rounded-lg
                                                       shadow-sm hover:shadow transition cursor-pointer"
                                                title="Ajukan Permohonan Hapus ke Admin"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M6 7h12M9 7V4h6v3m-7 0l1 13h6l1-13M10 11v6m4-6v6"/>
                                                </svg>
                                            </button>
                                        @endif
                                     @endif
                                     @endif

                                 </div>

                             </div>

                         @endforeach

                     </div>

                     {{-- TOMBOL HALAMAN SELANJUTNYA (PAGINASI) --}}
                     @if (method_exists($digitalarchive, 'links'))
                         <div class="pt-5 mt-5 border-t border-gray-100 flex items-center justify-between">
                             {{ $digitalarchive->withQueryString()->links() }}
                         </div>
                     @endif

                 @endif

            </div>


            {{-- ========================================================= --}}
            {{-- TAB CONTENT 2: SECTION ARSIP FISIK --}}
            {{-- ========================================================= --}}

            <div
                id="tab-content-fisik"
                class="hidden archive-card bg-white rounded-2xl
                       border border-gray-200/80
                       shadow-sm
                       p-5 sm:p-6 mb-7"
            >

                {{-- HEADER --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-5 pb-4 border-b border-gray-100">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-xl
                                   bg-gradient-to-br from-blue-600 to-indigo-700
                                   flex items-center justify-center
                                   shadow-md shadow-blue-500/10"
                        >
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M4 7a2 2 0 012-2h3l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"/>
                            </svg>
                        </div>


                        <div>

                            <h3 class="text-lg font-bold text-gray-800">
                                Arsip Fisik
                            </h3>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Kelola rak dan dokumen fisik
                            </p>

                        </div>

                    </div>


                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                    {{-- TAMBAH RAK --}}
                    <form action="{{ route('rack.create') }}">

                        <input type="hidden" name="category_id" value="{{ $category->id }}">

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center
                                   justify-center gap-2 px-4 py-2
                                   bg-gradient-to-r from-blue-600 to-indigo-600
                                   hover:from-blue-700 hover:to-indigo-700
                                   text-white text-xs font-semibold rounded-xl
                                   shadow-md shadow-blue-500/15
                                   hover:shadow-lg transition-all duration-200"
                        >

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>

                            Tambah Rak Arsip

                        </button>

                    </form>
                    @endif

                </div>


                {{-- SEARCH FISIK --}}
                <form
                    method="GET"
                    action="{{ url()->current() }}"
                    class="mb-5 p-4 rounded-xl
                           bg-slate-50/80
                           border border-slate-200/80"
                >

                    <div class="flex items-center gap-2 mb-3">

                        <div class="w-7 h-7 rounded-lg bg-blue-100 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="text-xs font-bold text-gray-800">
                                Cari Rak Arsip
                            </p>

                            <p class="text-[11px] text-gray-500">
                                Cari berdasarkan nama rak
                            </p>
                        </div>

                    </div>


                    <div class="flex flex-col sm:flex-row gap-2.5">

                        <input
                            type="text"
                            name="search_fisik"
                            value="{{ request('search_fisik') }}"
                            placeholder="Contoh: Rak A, Rak 01..."
                            class="flex-1 px-3.5 py-2 text-xs
                                   border border-gray-200
                                   rounded-xl bg-white
                                   shadow-sm
                                   focus:outline-none
                                   focus:ring-2 focus:ring-blue-500/30
                                   focus:border-blue-500"
                        >


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-1.5
                                   px-5 py-2 bg-blue-600 hover:bg-blue-700
                                   text-white text-xs font-semibold
                                   rounded-xl shadow-md shadow-blue-500/15
                                   transition"
                        >

                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>

                            Cari

                        </button>


                        <a
                            href="{{ url()->current() }}"
                            class="inline-flex items-center justify-center
                                   px-5 py-2 bg-white
                                   hover:bg-gray-100
                                   text-gray-700 text-xs font-semibold
                                   rounded-xl border border-gray-200
                                   transition"
                        >
                            Reset
                        </a>

                    </div>

                </form>


                {{-- LIST RAK (KEBAWAH / 1 KOLOM STACKED) --}}
                @if ($racks->count() > 0)

                    <div class="flex flex-col space-y-3">

                        @php
                            $no = 1;
                        @endphp

                        @foreach ($racks as $rak)

                            <div
                                class="archive-item group
                                       flex items-center justify-between
                                       gap-3 p-3.5 sm:p-4
                                       bg-white
                                       border border-gray-200
                                       rounded-xl hover:border-blue-300"
                            >

                                <a
                                    href="{{ route('rack.show', $rak->id) }}"
                                    onclick="saveScrollPosition()"
                                    class="flex items-center gap-3.5 flex-1 min-w-0"
                                >

                                    {{-- NOMOR --}}
                                    <div
                                        class="flex-shrink-0 w-9 h-9
                                               flex items-center justify-center
                                               rounded-lg
                                               bg-gradient-to-br
                                               from-[#003A8F] to-[#002766]
                                               text-white text-xs font-bold
                                               shadow-md shadow-blue-900/15
                                               group-hover:scale-105
                                               transition"
                                    >
                                        {{ $no++ }}
                                    </div>


                                    {{-- INFO --}}
                                    <div class="min-w-0 flex-1">

                                        <p
                                            class="text-gray-900 font-bold
                                                   text-sm
                                                   truncate
                                                   group-hover:text-blue-700
                                                   transition"
                                        >
                                            {{ $rak->rack_name }}
                                        </p>


                                        <div class="flex flex-wrap items-center gap-1.5 mt-1">

                                            <span
                                                class="inline-flex items-center gap-1
                                                       px-2 py-0.5
                                                       rounded-md
                                                       bg-indigo-50
                                                       text-indigo-700
                                                       border border-indigo-100
                                                       text-[10px] font-semibold"
                                            >
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M5 5h14M5 12h14M5 19h14"/>
                                                </svg>

                                                {{ $rak->category->category_name ?? '-' }}
                                            </span>


                                            <span class="text-[10px] text-gray-400">
                                                Rak Arsip Fisik
                                            </span>

                                        </div>

                                    </div>

                                </a>


                                {{-- AKSI --}}
                                <div class="flex items-center gap-1.5 sm:ml-2">

                                    <a
                                        href="{{ route('rack.show', $rak->id) }}"
                                        onclick="saveScrollPosition()"
                                        class="hidden sm:inline-flex items-center gap-1
                                               px-2.5 py-1.5
                                               bg-blue-50 hover:bg-blue-100
                                               text-blue-700
                                               rounded-lg text-xs font-semibold
                                               transition"
                                    >
                                        Buka
                                    </a>


                                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                                    {{-- TOMBOL EDIT RAK (ICON PENSIL) --}}
                                    <a
                                        href="{{ route('rack.edit', $rak->id) }}"
                                        onclick="saveScrollPosition()"
                                        class="inline-flex items-center justify-center
                                               w-8 h-8
                                               bg-amber-500 hover:bg-amber-600
                                               text-white rounded-lg
                                               shadow-sm hover:shadow transition"
                                        title="Edit"
                                    >

                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"
                                            />
                                        </svg>

                                    </a>


                                    <form
                                        action="{{ route('rack.destroy', $rak->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus rak ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center
                                                   w-8 h-8
                                                   bg-red-500 hover:bg-red-600
                                                   text-white rounded-lg
                                                   shadow-sm hover:shadow transition"
                                            title="Hapus"
                                        >

                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 7h12M9 7V4h6v3m-7 0l1 13h6l1-13M10 11v6m4-6v6"/>
                                            </svg>

                                        </button>

                                    </form>
                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    {{-- EMPTY FISIK --}}
                    <div
                        class="text-center py-8 px-4
                               rounded-xl
                               bg-slate-50/60
                               border border-dashed border-gray-200"
                    >

                        <div class="mx-auto w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center mb-3 border border-gray-100">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                      d="M4 7a2 2 0 012-2h3l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"/>
                            </svg>
                        </div>

                        <h4 class="text-sm font-bold text-gray-700">
                            Belum Ada Rak Arsip
                        </h4>

                        <p class="text-xs text-gray-500 mt-1 max-w-md mx-auto">
                            Belum terdapat rak arsip fisik pada kategori ini.
                            Tambahkan rak untuk mulai mengelola dokumen fisik.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SCRIPT JAVASCRIPT --}}
    {{-- ========================================================= --}}

    <script>
        // Nonaktifkan pemulihan scroll otomatis bawaan browser agar tidak meloncat ke atas
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }

        // FUNGSI MENYIMPAN POSISI SCROLL SEBELUM PINDAH HALAMAN
        function saveScrollPosition() {
            const currentY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;
            const exactKey = 'archive_scroll_pos_' + window.location.pathname + window.location.search;
            localStorage.setItem(exactKey, String(currentY));

            // Simpan juga state general untuk fallback yang akurat
            const scrollState = {
                pathname: window.location.pathname,
                search: window.location.search,
                category: new URLSearchParams(window.location.search).get('category') || '',
                scrollY: currentY,
                timestamp: Date.now()
            };
            localStorage.setItem('archive_scroll_pos_latest', JSON.stringify(scrollState));
        }

        // Otomatis tangkap klik pada seluruh link arsip (digital/rack) untuk menyimpan posisi scroll
        document.addEventListener('click', function (e) {
            const link = e.target.closest('a');
            if (!link) return;
            const href = link.getAttribute('href') || '';
            if (href.includes('/digital/') || href.includes('/rack/') || link.closest('.archive-item')) {
                saveScrollPosition();
            }
        }, true);

        // FUNGSI MEMULIHKAN POSISI SCROLL DARI LOCALSTORAGE
        function restoreScrollPosition() {
            const exactKey = 'archive_scroll_pos_' + window.location.pathname + window.location.search;
            let savedPos = localStorage.getItem(exactKey);

            if (savedPos === null) {
                try {
                    const raw = localStorage.getItem('archive_scroll_pos_latest');
                    if (raw) {
                        const latest = JSON.parse(raw);
                        if (latest && latest.pathname === window.location.pathname && (Date.now() - latest.timestamp < 30 * 60 * 1000)) {
                            savedPos = latest.scrollY;
                        }
                    }
                } catch (e) {}
            }

            if (savedPos !== null) {
                const y = parseInt(savedPos, 10);
                if (!isNaN(y) && y > 0) {
                    window.scrollTo({ top: y, behavior: 'instant' });
                    requestAnimationFrame(function () {
                        window.scrollTo({ top: y, behavior: 'instant' });
                    });
                    setTimeout(function () {
                        window.scrollTo({ top: y, behavior: 'instant' });
                    }, 60);
                    setTimeout(function () {
                        window.scrollTo({ top: y, behavior: 'instant' });
                        localStorage.removeItem(exactKey);
                        localStorage.removeItem('archive_scroll_pos_latest');
                    }, 250);
                }
            }
        }

        // FUNGSI SWITCH TAB ARSIP DIGITAL & FISIK DENGAN EFEK 3D
        function switchTab(tabName) {
            const digitalContent = document.getElementById('tab-content-digital');
            const fisikContent = document.getElementById('tab-content-fisik');
            const btnDigital = document.getElementById('btn-tab-digital');
            const btnFisik = document.getElementById('btn-tab-fisik');

            if (tabName === 'digital') {
                digitalContent.classList.remove('hidden');
                fisikContent.classList.add('hidden');

                btnDigital.classList.add('active-tab');
                btnDigital.classList.remove('inactive-tab');

                btnFisik.classList.add('inactive-tab');
                btnFisik.classList.remove('active-tab');

                localStorage.setItem('active_archive_tab', 'digital');
            } else {
                fisikContent.classList.remove('hidden');
                digitalContent.classList.add('hidden');

                btnFisik.classList.add('active-tab');
                btnFisik.classList.remove('inactive-tab');

                btnDigital.classList.add('inactive-tab');
                btnDigital.classList.remove('active-tab');

                localStorage.setItem('active_archive_tab', 'fisik');
            }
        }

        // Fungsi untuk Export PDF / Excel dengan membawa filter tanggal dan pilihan sub kategori
        function exportReport(baseUrl) {
            const tMulai = document.getElementById('input_tanggal_mulai')?.value;
            const tSelesai = document.getElementById('input_tanggal_selesai')?.value;
            const subKategoriId = document.getElementById('filter_sub_category')?.value;
            let url = baseUrl;

            const params = new URLSearchParams();
            if (tMulai) params.append('tanggal_mulai', tMulai);
            if (tSelesai) params.append('tanggal_selesai', tSelesai);
            if (subKategoriId) params.append('sub_category_id', subKategoriId);

            const queryString = params.toString();
            if (queryString) {
                url += (url.includes('?') ? '&' : '?') + queryString;
            }

            window.open(url, '_blank');
        }

        // Fungsi untuk Buka Modal Preview Laporan PDF
        function openPdfPreviewModal(baseUrl) {
            const tMulai = document.getElementById('input_tanggal_mulai')?.value;
            const tSelesai = document.getElementById('input_tanggal_selesai')?.value;
            const subKategoriId = document.getElementById('filter_sub_category')?.value;

            const params = new URLSearchParams();
            if (tMulai) params.append('tanggal_mulai', tMulai);
            if (tSelesai) params.append('tanggal_selesai', tSelesai);
            if (subKategoriId) params.append('sub_category_id', subKategoriId);

            const queryString = params.toString();
            const streamUrl = baseUrl + (queryString ? (baseUrl.includes('?') ? '&' : '?') + queryString : '');

            // Download URL (menggunakan query param download=1)
            const downloadParams = new URLSearchParams(params);
            downloadParams.append('download', '1');
            const downloadUrl = baseUrl + (baseUrl.includes('?') ? '&' : '?') + downloadParams.toString();

            // Set link tombol download & buka tab baru
            const btnDownload = document.getElementById('btnDownloadPdf');
            if (btnDownload) {
                btnDownload.href = downloadUrl;
            }

            const btnOpenTab = document.getElementById('btnOpenNewTabPdf');
            if (btnOpenTab) {
                btnOpenTab.href = streamUrl;
            }

            // Tampilkan loading spinner
            const spinner = document.getElementById('pdfLoadingIndicator');
            if (spinner) {
                spinner.style.display = 'flex';
            }

            // Set iframe src
            const iframe = document.getElementById('pdfPreviewIframe');
            if (iframe) {
                iframe.src = streamUrl;
            }

            // Buka modal
            const modal = document.getElementById('pdfPreviewModal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function onPdfIframeLoaded() {
            const iframe = document.getElementById('pdfPreviewIframe');
            if (iframe && iframe.src && iframe.src !== 'about:blank') {
                const spinner = document.getElementById('pdfLoadingIndicator');
                if (spinner) {
                    spinner.style.display = 'none';
                }
            }
        }

        function closePdfPreviewModal() {
            const modal = document.getElementById('pdfPreviewModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }

            const iframe = document.getElementById('pdfPreviewIframe');
            if (iframe) {
                iframe.src = 'about:blank';
            }
        }

        // Fungsi untuk Buka Modal Preview Laporan Excel
        function openExcelPreviewModal(baseUrl) {
            const tMulai = document.getElementById('input_tanggal_mulai')?.value;
            const tSelesai = document.getElementById('input_tanggal_selesai')?.value;
            const subKategoriId = document.getElementById('filter_sub_category')?.value;

            const params = new URLSearchParams();
            if (tMulai) params.append('tanggal_mulai', tMulai);
            if (tSelesai) params.append('tanggal_selesai', tSelesai);
            if (subKategoriId) params.append('sub_category_id', subKategoriId);

            const queryString = params.toString();
            const streamUrl = baseUrl + (queryString ? (baseUrl.includes('?') ? '&' : '?') + queryString : '');

            // Download URL (menggunakan query param download=1)
            const downloadParams = new URLSearchParams(params);
            downloadParams.append('download', '1');
            const downloadUrl = baseUrl + (baseUrl.includes('?') ? '&' : '?') + downloadParams.toString();

            const btnDownload = document.getElementById('btnDownloadExcel');
            if (btnDownload) {
                btnDownload.href = downloadUrl;
            }

            const btnOpenTab = document.getElementById('btnOpenNewTabExcel');
            if (btnOpenTab) {
                btnOpenTab.href = streamUrl;
            }

            const spinner = document.getElementById('excelLoadingIndicator');
            if (spinner) {
                spinner.style.display = 'flex';
            }

            const iframe = document.getElementById('excelPreviewIframe');
            if (iframe) {
                iframe.src = streamUrl;
            }

            const modal = document.getElementById('excelPreviewModal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function onExcelIframeLoaded() {
            const iframe = document.getElementById('excelPreviewIframe');
            if (iframe && iframe.src && iframe.src !== 'about:blank') {
                const spinner = document.getElementById('excelLoadingIndicator');
                if (spinner) {
                    spinner.style.display = 'none';
                }
            }
        }

        function closeExcelPreviewModal() {
            const modal = document.getElementById('excelPreviewModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }

            const iframe = document.getElementById('excelPreviewIframe');
            if (iframe) {
                iframe.src = 'about:blank';
            }
        }

        // Listener tombol ESC untuk menutup modal preview PDF & Excel
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closePdfPreviewModal();
                closeExcelPreviewModal();
            }
        });

        document.addEventListener('DOMContentLoaded', function () {

            // Pulihkan posisi scroll
            restoreScrollPosition();

            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('search_fisik')) {
                switchTab('fisik');
            } else {
                const savedTab = localStorage.getItem('active_archive_tab') || 'digital';
                switchTab(savedTab);
            }

            const dropdownContainer = document.getElementById('category-dropdowns');
            if (dropdownContainer) {
                const dropdowns = dropdownContainer.querySelectorAll('details');
                const activeCat = urlParams.get('category');

                // Pastikan details kategori yang aktif otomatis terbuka & tersorot
                if (activeCat) {
                    dropdowns.forEach(function (dropdown) {
                        const matchingLink = dropdown.querySelector(`a[href*="category=${encodeURIComponent(activeCat)}"]`);
                        if (matchingLink) {
                            dropdown.open = true;
                            matchingLink.classList.add('bg-blue-100', 'text-blue-700', 'font-bold', 'ring-2', 'ring-blue-400');
                        }
                    });
                }

                // Accordion behavior: jika satu dropdown dibuka manual, tutup yang lain
                dropdowns.forEach(function (dropdown) {
                    dropdown.addEventListener('toggle', function () {
                        if (dropdown.open) {
                            dropdowns.forEach(function (otherDropdown) {
                                if (otherDropdown !== dropdown) {
                                    otherDropdown.open = false;
                                }
                            });
                        }
                    });
                });
            }

        });

        // Pulihkan scroll juga saat seluruh window selesai memuat gambar dan font
        window.addEventListener('load', function () {
            restoreScrollPosition();
        });
    </script>

    {{-- ========================================================================= --}}
    {{-- MODAL POPUP VERIFIKASI 2 LANGKAH HAPUS ARSIP DIGITAL                      --}}
    {{-- ========================================================================= --}}
    <div id="deleteRequestModal" class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" onclick="closeDeleteRequestModal()"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all sm:w-full sm:max-w-lg" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 20px; border: 1px solid #E2E8F0;">
                
                {{-- Header Modal Solid Merah Bergradasi --}}
                <div style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%) !important; padding: 18px 24px; color: #FFFFFF !important; display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; border-radius: 12px; background-color: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg style="width: 22px; height: 22px; color: #FFFFFF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 style="color: #FFFFFF !important; font-size: 16px; font-weight: 800; margin: 0; line-height: 1.3;" id="modalHeaderTitle">Permohonan Penghapusan Arsip</h3>
                            <p style="color: #FEE2E2 !important; font-size: 12px; margin: 2px 0 0 0;">Verifikasi 2 langkah untuk keamanan data</p>
                        </div>
                    </div>
                    <button type="button" onclick="closeDeleteRequestModal()" style="color: #FFFFFF !important; font-size: 26px; font-weight: bold; line-height: 1; background: none; border: none; cursor: pointer; padding: 4px; opacity: 0.9;" aria-label="Tutup">&times;</button>
                </div>

                {{-- Form Permohonan --}}
                <form id="deleteRequestForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" id="deleteFormMethod" value="POST">

                    <div style="padding: 22px; display: flex; flex-direction: column; gap: 18px;">
                        
                        {{-- Ringkasan Arsip --}}
                        <div style="background-color: #F8FAFC !important; border: 1.5px solid #E2E8F0 !important; border-radius: 14px; padding: 14px 16px; text-align: left;">
                            <p style="color: #64748B !important; font-weight: 700; font-size: 12px; margin: 0 0 4px 0;">Arsip yang akan dihapus:</p>
                            <p style="color: #0F172A !important; font-weight: 900; font-size: 15px; margin: 0; line-height: 1.4;" id="modalArchiveName">-</p>
                            <p style="color: #64748B !important; font-size: 12px; margin: 6px 0 0 0;">Kode Arsip: <span style="color: #003A8F !important; font-weight: 800;" id="modalArchiveCode">-</span></p>
                        </div>

                        {{-- LANGKAH 1 --}}
                        <div style="display: flex; flex-direction: column; gap: 6px; text-align: left;">
                            <label style="color: #0F172A !important; font-size: 13px; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                                <span style="background-color: #FEE2E2 !important; color: #DC2626 !important; width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11.5px; font-weight: 900; flex-shrink: 0;">1</span>
                                Alasan Penghapusan <span style="color: #DC2626 !important;">*</span>
                            </label>
                            <textarea 
                                name="reason" 
                                id="deleteReasonInput" 
                                rows="3" 
                                required 
                                placeholder="Jelaskan alasan mengapa arsip ini perlu dihapus (contoh: berkas double, salah unggah lampiran, revisi nomor SPJ)..."
                                style="width: 100%; font-size: 13px; color: #0F172A !important; background-color: #FFFFFF !important; border: 1.5px solid #CBD5E1 !important; border-radius: 14px; padding: 12px 14px; outline: none; box-sizing: border-box;"
                                onfocus="this.style.borderColor='#DC2626'"
                                onblur="this.style.borderColor='#CBD5E1'"
                                oninput="checkDeleteFormValidity()"
                            ></textarea>
                        </div>

                        {{-- LANGKAH 2 --}}
                        <div style="background-color: #FFFBEB !important; border: 1.5px solid #FCD34D !important; border-radius: 14px; padding: 14px 16px; text-align: left;">
                            <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer; margin: 0;">
                                <input 
                                    type="checkbox" 
                                    id="deleteAgreementCheckbox" 
                                    style="width: 18px; height: 18px; margin-top: 2px; accent-color: #DC2626; cursor: pointer; flex-shrink: 0;"
                                    onchange="checkDeleteFormValidity()"
                                >
                                <span style="color: #78350F !important; font-size: 12.5px; line-height: 1.5;">
                                    <strong style="color: #92400E !important; font-weight: 900;">Langkah 2:</strong> Saya menyatakan bertanggung jawab atas pengajuan ini dan memahami bahwa arsip <strong style="color: #B45309 !important; font-weight: 900;">tidak langsung terhapus sampai disetujui oleh Admin</strong>.
                                </span>
                            </label>
                        </div>

                    </div>

                    {{-- Footer Modal --}}
                    <div style="background-color: #F8FAFC !important; border-top: 1px solid #E2E8F0 !important; padding: 16px 24px; display: flex; align-items: center; justify-content: flex-end; gap: 12px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                        <button 
                            type="button" 
                            onclick="closeDeleteRequestModal()" 
                            style="padding: 11px 22px; font-size: 13.5px; font-weight: 700; border-radius: 14px; background-color: #FFFFFF !important; color: #475569 !important; border: 1.5px solid #CBD5E1 !important; min-height: 44px; cursor: pointer;"
                            class="hover:bg-slate-100 transition shadow-sm"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit" 
                            id="submitDeleteRequestBtn" 
                            disabled 
                            style="padding: 11px 24px; font-size: 13.5px; font-weight: 800; border-radius: 14px; min-height: 44px; background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%) !important; color: #FFFFFF !important; border: none !important; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35); cursor: pointer;"
                            class="disabled:opacity-40 disabled:cursor-not-allowed transition flex items-center gap-2"
                        >
                            <svg style="width: 16px; height: 16px; color: #FFFFFF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                            <span id="submitBtnText" style="color: #FFFFFF !important;">Kirim Permohonan ke Admin</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Script Kontrol Modal --}}
    <script>
        // FUNGSI KHUSUS ADMIN: HAPUS ARSIP LANGSUNG SECARA PERMANEN
        function openAdminDirectDeleteModal(actionUrl, archiveName, archiveCode) {
            const modal = document.getElementById('adminActionModal');
            const form = document.getElementById('adminActionForm');
            const methodInput = document.getElementById('adminActionMethod');
            const iconBg = document.getElementById('actionModalIconBg');
            const icon = document.getElementById('actionModalIcon');
            const title = document.getElementById('actionModalTitle');
            const desc = document.getElementById('actionModalDesc');
            const archiveNameEl = document.getElementById('actionModalArchiveName');
            const archiveCodeEl = document.getElementById('actionModalArchiveCode');
            const codeRow = document.getElementById('actionModalCodeRow');
            const submitBtn = document.getElementById('adminActionSubmitBtn');
            const submitText = document.getElementById('adminActionSubmitText');

            form.action = actionUrl;
            methodInput.value = 'DELETE';
            
            iconBg.style.backgroundColor = '#FEF2F2';
            icon.innerHTML = `<svg style="width: 32px; height: 32px; color: #DC2626;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>`;
            
            title.textContent = 'Hapus Arsip Permanen?';
            desc.textContent = 'Sebagai Admin, Anda memiliki wewenang penuh untuk langsung menghapus arsip ini beserta seluruh berkas fisiknya secara permanen.';
            archiveNameEl.textContent = archiveName;
            
            if (archiveCode && archiveCode !== '-') {
                archiveCodeEl.textContent = archiveCode;
                codeRow.style.display = 'flex';
            } else {
                codeRow.style.display = 'none';
            }
            
            submitBtn.style.background = 'linear-gradient(135deg, #DC2626 0%, #B91C1C 100%)';
            submitText.textContent = 'Ya, Hapus Permanen Sekarang';

            modal.classList.remove('hidden');
        }

        // FUNGSI KHUSUS NON-ADMIN (BENDAHARA/STAF): AJUKAN PERMOHONAN HAPUS DENGAN VERIFIKASI 2 LANGKAH
        function openDeleteRequestModal(archiveId, archiveName, archiveCode) {
            const modal = document.getElementById('deleteRequestModal');
            const form = document.getElementById('deleteRequestForm');
            const nameEl = document.getElementById('modalArchiveName');
            const codeEl = document.getElementById('modalArchiveCode');
            const methodInput = document.getElementById('deleteFormMethod');
            const headerTitle = document.getElementById('modalHeaderTitle');
            const submitBtnText = document.getElementById('submitBtnText');
            const reasonInput = document.getElementById('deleteReasonInput');
            const agreementCb = document.getElementById('deleteAgreementCheckbox');

            nameEl.textContent = archiveName;
            codeEl.textContent = archiveCode;
            reasonInput.value = '';
            agreementCb.checked = false;

            form.action = '/digital/' + archiveId + '/request-delete';
            methodInput.value = 'POST';
            headerTitle.textContent = 'Permohonan Penghapusan Arsip';
            submitBtnText.textContent = 'Kirim Permohonan ke Admin';

            checkDeleteFormValidity();
            modal.classList.remove('hidden');
        }

        function closeDeleteRequestModal() {
            document.getElementById('deleteRequestModal').classList.add('hidden');
        }

        function checkDeleteFormValidity() {
            const reason = document.getElementById('deleteReasonInput').value.trim();
            const agreed = document.getElementById('deleteAgreementCheckbox').checked;
            const submitBtn = document.getElementById('submitDeleteRequestBtn');

            if (reason.length >= 5 && agreed) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        function openApproveModal(actionUrl, archiveName, archiveCode) {
            const modal = document.getElementById('adminActionModal');
            const form = document.getElementById('adminActionForm');
            const methodInput = document.getElementById('adminActionMethod');
            const iconBg = document.getElementById('actionModalIconBg');
            const icon = document.getElementById('actionModalIcon');
            const title = document.getElementById('actionModalTitle');
            const desc = document.getElementById('actionModalDesc');
            const archiveNameEl = document.getElementById('actionModalArchiveName');
            const archiveCodeEl = document.getElementById('actionModalArchiveCode');
            const codeRow = document.getElementById('actionModalCodeRow');
            const submitBtn = document.getElementById('adminActionSubmitBtn');
            const submitText = document.getElementById('adminActionSubmitText');

            form.action = actionUrl;
            methodInput.value = 'DELETE';
            
            iconBg.style.backgroundColor = '#FEF2F2';
            icon.innerHTML = `<svg style="width: 32px; height: 32px; color: #DC2626;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>`;
            
            title.textContent = 'Setujui & Hapus Permanen?';
            desc.textContent = 'Permohonan penghapusan akan disetujui. Arsip beserta seluruh berkas PDF di server akan langsung dihapus permanen.';
            archiveNameEl.textContent = archiveName;
            
            if (archiveCode && archiveCode !== '-') {
                archiveCodeEl.textContent = archiveCode;
                codeRow.style.display = 'flex';
            } else {
                codeRow.style.display = 'none';
            }
            
            submitBtn.style.background = 'linear-gradient(135deg, #DC2626 0%, #B91C1C 100%)';
            submitText.textContent = 'Ya, Setujui & Hapus';

            modal.classList.remove('hidden');
        }

        function openRejectModal(actionUrl, archiveName, archiveCode) {
            const modal = document.getElementById('adminActionModal');
            const form = document.getElementById('adminActionForm');
            const methodInput = document.getElementById('adminActionMethod');
            const iconBg = document.getElementById('actionModalIconBg');
            const icon = document.getElementById('actionModalIcon');
            const title = document.getElementById('actionModalTitle');
            const desc = document.getElementById('actionModalDesc');
            const archiveNameEl = document.getElementById('actionModalArchiveName');
            const archiveCodeEl = document.getElementById('actionModalArchiveCode');
            const codeRow = document.getElementById('actionModalCodeRow');
            const submitBtn = document.getElementById('adminActionSubmitBtn');
            const submitText = document.getElementById('adminActionSubmitText');

            form.action = actionUrl;
            methodInput.value = 'POST';
            
            iconBg.style.backgroundColor = '#F1F5F9';
            icon.innerHTML = `<svg style="width: 32px; height: 32px; color: #475569;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>`;
            
            title.textContent = 'Tolak Permohonan Hapus?';
            desc.textContent = 'Permohonan penghapusan ini akan ditolak dan status arsip akan dikembalikan normal.';
            archiveNameEl.textContent = archiveName;
            
            if (archiveCode && archiveCode !== '-') {
                archiveCodeEl.textContent = archiveCode;
                codeRow.style.display = 'flex';
            } else {
                codeRow.style.display = 'none';
            }
            
            submitBtn.style.background = '#475569';
            submitText.textContent = 'Ya, Tolak Permohonan';

            modal.classList.remove('hidden');
        }

        function closeAdminActionModal() {
            const modal = document.getElementById('adminActionModal');
            if (modal) modal.classList.add('hidden');
        }
    </script>

    {{-- MODAL KONFIRMASI TINDAKAN ADMIN (SETUJUI / TOLAK) --}}
    <div id="adminActionModal" class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" onclick="closeAdminActionModal()"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all sm:w-full sm:max-w-lg p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">
                <div id="actionModalIconBg" class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl mb-4 shadow-inner">
                    <div id="actionModalIcon"></div>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-black text-gray-900" id="actionModalTitle">Konfirmasi Tindakan</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed" id="actionModalDesc">
                        Apakah Anda yakin ingin melanjutkan tindakan ini?
                    </p>
                    
                    {{-- KOTAK INFORMASI ARSIP (LEGA & TIDAK NUMPUK) --}}
                    <div class="mt-5 p-4 bg-slate-50 border border-slate-200 rounded-2xl text-left" style="background-color: #F8FAFC !important; border: 1.5px solid #E2E8F0 !important;">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Arsip:</p>
                        <p class="text-sm font-bold text-slate-900 leading-relaxed break-words" id="actionModalArchiveName">
                            -
                        </p>
                        <div id="actionModalCodeRow" class="mt-3 pt-2.5 border-t border-slate-200 flex items-center justify-between text-xs">
                            <span class="text-slate-500 font-medium">Kode Arsip:</span>
                            <span class="font-black text-blue-700 px-2.5 py-0.5 bg-blue-50 border border-blue-200 rounded-md" id="actionModalArchiveCode">-</span>
                        </div>
                    </div>
                </div>
                <form id="adminActionForm" method="POST" action="" class="mt-7 w-full">
                    @csrf
                    <input type="hidden" name="_method" id="adminActionMethod" value="POST">
                    <div class="grid grid-cols-2 gap-4 w-full">
                        <button
                            type="button"
                            onclick="closeAdminActionModal()"
                            style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                            class="w-full transition hover:bg-slate-100 cursor-pointer flex items-center justify-center text-center"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            id="adminActionSubmitBtn"
                            style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%) !important; color: #FFFFFF !important; padding: 13px 20px; font-size: 13.5px; font-weight: 800; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35); min-height: 48px;"
                            class="w-full transition hover:brightness-110 cursor-pointer flex items-center justify-center gap-2 text-center"
                        >
                            <span id="adminActionSubmitText">Konfirmasi</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- MODAL PREVIEW LAPORAN PDF ARSIP DIGITAL                                   --}}
    {{-- ========================================================================= --}}
    <div id="pdfPreviewModal" class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" aria-labelledby="pdfModalTitle" role="dialog" aria-modal="true">
        {{-- Backdrop Gelap & Blur --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.75); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" onclick="closePdfPreviewModal()"></div>

        <div class="flex min-h-screen items-center justify-center p-2 sm:p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all w-full max-w-6xl" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 20px; border: 1px solid #E2E8F0;">
                
                {{-- Header Modal --}}
                <div style="background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%) !important; padding: 14px 20px; color: #FFFFFF !important; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #334155;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);">
                            <svg style="width: 20px; height: 20px; color: #FFFFFF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 18h10M7 14h10M7 10h4m-4 8V4h10v14" />
                            </svg>
                        </div>
                        <div>
                            <h3 style="color: #FFFFFF !important; font-size: 15px; font-weight: 800; margin: 0; line-height: 1.2;" id="pdfModalTitle">Preview Laporan Arsip Digital</h3>
                            <p style="color: #94A3B8 !important; font-size: 11px; margin: 2px 0 0 0;" id="pdfModalSubtitle">Periksa tampilan laporan sebelum mengunduh</p>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 10px;">
                        {{-- Tombol Buka Tab Baru --}}
                        <a id="btnOpenNewTabPdf" href="#" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-gray-200 bg-slate-800 hover:bg-slate-700 hover:text-white border border-slate-700 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Buka di Tab Baru
                        </a>

                        {{-- Tombol Download PDF --}}
                        <a id="btnDownloadPdf" href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 shadow-md shadow-red-500/25 transition active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download PDF
                        </a>

                        {{-- Tombol Tutup --}}
                        <button type="button" onclick="closePdfPreviewModal()" style="color: #94A3B8; font-size: 26px; font-weight: bold; line-height: 1; background: none; border: none; cursor: pointer; padding: 2px 8px; border-radius: 8px;" class="hover:text-white hover:bg-slate-800 transition" aria-label="Tutup">&times;</button>
                    </div>
                </div>

                {{-- Body Modal (Iframe PDF + Loading Indicator) --}}
                <div style="position: relative; height: 80vh; background-color: #525659; overflow: hidden; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    {{-- Spinner Loading --}}
                    <div id="pdfLoadingIndicator" style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: #F8FAFC; z-index: 10;">
                        <div class="w-12 h-12 border-4 border-rose-200 border-t-rose-600 rounded-full animate-spin mb-3"></div>
                        <p class="text-sm font-bold text-gray-700">Memuat Preview Laporan PDF...</p>
                        <p class="text-xs text-gray-500 mt-1">Menyiapkan dokumen arsip digital</p>
                    </div>

                    {{-- Iframe --}}
                    <iframe id="pdfPreviewIframe" src="about:blank" style="width: 100%; height: 100%; border: none;" onload="onPdfIframeLoaded()"></iframe>
                </div>

            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- MODAL PREVIEW LAPORAN EXCEL ARSIP DIGITAL                                 --}}
    {{-- ========================================================================= --}}
    <div id="excelPreviewModal" class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" aria-labelledby="excelModalTitle" role="dialog" aria-modal="true">
        {{-- Backdrop Gelap & Blur --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.75); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" onclick="closeExcelPreviewModal()"></div>

        <div class="flex min-h-screen items-center justify-center p-2 sm:p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all w-full max-w-6xl" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 20px; border: 1px solid #E2E8F0;">
                
                {{-- Header Modal (Emerald Theme) --}}
                <div style="background: linear-gradient(135deg, #0F172A 0%, #064E3B 100%) !important; padding: 14px 20px; color: #FFFFFF !important; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #065F46;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #10B981 0%, #059669 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);">
                            <svg style="width: 20px; height: 20px; color: #FFFFFF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 style="color: #FFFFFF !important; font-size: 15px; font-weight: 800; margin: 0; line-height: 1.2;" id="excelModalTitle">Preview Laporan Excel Arsip Digital</h3>
                            <p style="color: #A7F3D0 !important; font-size: 11px; margin: 2px 0 0 0;" id="excelModalSubtitle">Periksa tampilan spreadsheet sebelum mengunduh</p>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 10px;">
                        {{-- Tombol Buka Tab Baru --}}
                        <a id="btnOpenNewTabExcel" href="#" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-gray-200 bg-slate-800 hover:bg-slate-700 hover:text-white border border-slate-700 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Buka di Tab Baru
                        </a>

                        {{-- Tombol Download Excel --}}
                        <a id="btnDownloadExcel" href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-500/25 transition active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download Excel
                        </a>

                        {{-- Tombol Tutup --}}
                        <button type="button" onclick="closeExcelPreviewModal()" style="color: #94A3B8; font-size: 26px; font-weight: bold; line-height: 1; background: none; border: none; cursor: pointer; padding: 2px 8px; border-radius: 8px;" class="hover:text-white hover:bg-slate-800 transition" aria-label="Tutup">&times;</button>
                    </div>
                </div>

                {{-- Body Modal (Iframe Excel HTML + Loading Indicator) --}}
                <div style="position: relative; height: 80vh; background-color: #F8FAFC; overflow: hidden; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    {{-- Spinner Loading --}}
                    <div id="excelLoadingIndicator" style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: #F8FAFC; z-index: 10;">
                        <div class="w-12 h-12 border-4 border-emerald-200 border-t-emerald-600 rounded-full animate-spin mb-3"></div>
                        <p class="text-sm font-bold text-gray-700">Memuat Preview Laporan Excel...</p>
                        <p class="text-xs text-gray-500 mt-1">Menyiapkan lembar spreadsheet arsip</p>
                    </div>

                    {{-- Iframe --}}
                    <iframe id="excelPreviewIframe" src="about:blank" style="width: 100%; height: 100%; border: none;" onload="onExcelIframeLoaded()"></iframe>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3 animate-header-slide">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0056C7] flex items-center justify-center shadow-lg shadow-blue-900/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Input Arsip') }}
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola kabinet penyimpanan arsip
                </p>
            </div>
        </div>
    </x-slot>


    <style>
        /* =========================================================
            ENTRANCE ANIMATIONS (ANIMASI MASUK HALAMAN)
        ========================================================= */
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

        .animate-search-enter {
            opacity: 0;
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.15s forwards;
        }

        .animate-cabinet-header {
            opacity: 0;
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
        }

        .animate-cabinet-list {
            opacity: 0;
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.45s forwards;
        }

        /* =========================================================
            STYLE ASLI + 3D INTERACTIVE POLISH
        ========================================================= */
        .cabinet-page {
            background:
                radial-gradient(circle at 0% 0%, rgba(0, 58, 143, .08), transparent 30%),
                radial-gradient(circle at 100% 10%, rgba(0, 86, 199, .07), transparent 25%),
                #f5f7fb;
        }

        .cabinet-hero {
            background:
                radial-gradient(circle at 90% 10%, rgba(255, 255, 255, .18), transparent 25%),
                radial-gradient(circle at 10% 100%, rgba(255, 255, 255, .10), transparent 25%),
                linear-gradient(135deg, #003A8F 0%, #0056C7 55%, #0074D9 100%);
            box-shadow:
                0 20px 45px rgba(0, 58, 143, .18),
                inset 0 1px 0 rgba(255,255,255,.18);
        }

        .cabinet-card {
            background: rgba(255, 255, 255, .97);
            border: 1px solid rgba(226, 232, 240, .95);
            box-shadow:
                0 12px 30px rgba(15, 23, 42, .06),
                0 2px 8px rgba(15, 23, 42, .04);
            transition: all .25s ease;
        }

        .cabinet-card:hover {
            box-shadow:
                0 20px 45px rgba(15, 23, 42, .09),
                0 5px 15px rgba(15, 23, 42, .05);
        }

        .search-card {
            background: rgba(255, 255, 255, .97);
            border: 1px solid rgba(226, 232, 240, .9);
            box-shadow:
                0 10px 28px rgba(15, 23, 42, .05),
                0 2px 7px rgba(15, 23, 42, .03);
        }

        .search-input {
            transition: all .2s ease;
        }

        .search-input:focus {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
        }

        .cabinet-item {
            transition: all .25s ease;
        }

        .cabinet-item:hover {
            transform: translateY(-2px);
            background: linear-gradient(
                135deg,
                rgba(239, 246, 255, .95),
                rgba(248, 250, 252, .95)
            );
            box-shadow: inset 4px 0 0 #0056C7;
        }

        .number-box {
            background: linear-gradient(145deg, #003A8F, #0056C7);
            box-shadow:
                0 8px 18px rgba(0, 58, 143, .25),
                inset 0 1px 0 rgba(255,255,255,.18);
        }

        .number-box:hover {
            transform: scale(1.05);
        }

        .code-badge {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border: 1px solid #bfdbfe;
        }

        .action-button {
            transition: all .2s ease;
        }

        .action-button:hover {
            transform: translateY(-2px) scale(1.03);
        }

        .add-button {
            background: linear-gradient(135deg, #059669, #10b981);
            box-shadow:
                0 10px 25px rgba(5, 150, 105, .22),
                inset 0 1px 0 rgba(255,255,255,.2);
            transition: all .25s ease;
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 15px 30px rgba(5, 150, 105, .30),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        .search-button {
            background: linear-gradient(135deg, #003A8F, #0056C7);
            box-shadow: 0 8px 20px rgba(0, 58, 143, .20);
            transition: all .2s ease;
        }

        .search-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0, 58, 143, .28);
        }

        .reset-button {
            transition: all .2s ease;
        }

        .reset-button:hover {
            transform: translateY(-2px);
            background: #f8fafc;
        }

        .section-title {
            background: linear-gradient(135deg, #f8fafc, #eef4fb);
            border-bottom: 1px solid #e5e7eb;
        }

        .empty-state {
            background:
                radial-gradient(circle at 50% 0%, rgba(59,130,246,.08), transparent 35%),
                #ffffff;
        }
    </style>


    <div class="cabinet-page min-h-screen py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =========================================================
                HERO (Dengan Animasi Masuk)
            ========================================================== --}}
            <div class="cabinet-hero rounded-3xl overflow-hidden mb-6 relative animate-hero-enter">

                <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-white/10 blur-2xl"></div>

                <div class="absolute -bottom-24 -left-20 w-80 h-80 rounded-full bg-blue-300/10 blur-3xl"></div>

                <div class="relative px-6 py-7 md:px-8 md:py-8">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center shadow-xl">

                                <svg class="w-7 h-7 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                </svg>

                            </div>


                            <div>

                                <div class="flex items-center gap-2 mb-2">

                                    <span class="px-3 py-1 rounded-full bg-white/15 border border-white/20 text-white text-xs font-semibold backdrop-blur-sm">
                                        ARSIP DIGITAL
                                    </span>

                                </div>


                                <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                                    Daftar Kabinet Arsip
                                </h1>


                                <p class="text-blue-100 text-sm mt-2 max-w-2xl">
                                    Kelola dan akses kabinet penyimpanan dokumen arsip secara terstruktur.
                                </p>

                            </div>

                        </div>


                        <div class="flex items-center gap-3">

                            <div class="px-5 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md">

                                <p class="text-blue-100 text-xs font-semibold">
                                    Total Kabinet
                                </p>

                                <p class="text-white text-2xl font-extrabold mt-0.5">
                                    {{ $cabinets->count() }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =========================================================
                SEARCH (Dengan Animasi Masuk Berjenjang)
            ========================================================== --}}
            <div class="search-card rounded-3xl overflow-hidden mb-6 animate-search-enter">

                <div class="section-title px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 text-[#003A8F] flex items-center justify-center">

                            <svg class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />

                            </svg>

                        </div>


                        <div>

                            <h3 class="text-lg font-bold text-gray-900">
                                Cari Pengajuan
                            </h3>

                            <p class="text-sm text-gray-500">
                                Gunakan pencarian untuk menemukan pengajuan berdasarkan nama dan tanggal.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-6">

                    <form method="GET"
                        action="{{ route('admin.search') }}"
                        class="space-y-5">


                        {{-- SEARCH INPUT --}}
                        <div>

                            <label class="block text-sm font-bold text-gray-700 mb-2">
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


                                <input type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="search-input block w-full pl-11 pr-4 py-3.5 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                    placeholder="Cari nama pengajuan...">

                            </div>

                        </div>



                        {{-- DATE + BUTTON --}}
                        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">


                            {{-- DATE --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 flex-1">

                                <div>

                                    <label class="block text-sm font-bold text-gray-700 mb-2">
                                        Mulai Tanggal
                                    </label>

                                    <input type="date"
                                        name="start_date"
                                        value="{{ request('start_date') }}"
                                        class="search-input block w-full px-4 py-3 border border-gray-300 rounded-xl text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                </div>


                                <div>

                                    <label class="block text-sm font-bold text-gray-700 mb-2">
                                        Sampai Tanggal
                                    </label>

                                    <input type="date"
                                        name="end_date"
                                        value="{{ request('end_date') }}"
                                        class="search-input block w-full px-4 py-3 border border-gray-300 rounded-xl text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                </div>

                            </div>



                            {{-- BUTTON --}}
                            <div class="flex flex-col sm:flex-row gap-3 lg:pb-0">

                                <a href="{{ url()->current() }}"
                                    class="reset-button inline-flex items-center justify-center gap-2 px-5 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-bold rounded-xl shadow-sm">

                                    <svg class="w-4 h-4"
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


                                <button type="submit"
                                    class="search-button inline-flex items-center justify-center gap-2 px-6 py-3 text-white font-bold rounded-xl">

                                    <svg class="w-4 h-4"
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

            </div>



            {{-- =========================================================
                CABINET HEADER (Dengan Animasi Masuk)
            ========================================================== --}}
            <div class="cabinet-card rounded-3xl overflow-hidden mb-5 animate-cabinet-header">

                <div class="section-title px-6 py-5">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0056C7] flex items-center justify-center shadow-lg">

                                <svg class="w-6 h-6 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                </svg>

                            </div>


                            <div>

                                <h3 class="text-xl font-extrabold text-gray-900">
                                    Daftar Kabinet
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">

                                    Total

                                    <span class="font-extrabold text-[#003A8F]">
                                        {{ $cabinets->count() }}
                                    </span>

                                    kabinet tersedia

                                </p>

                            </div>

                        </div>


                        <a href="{{ route('cabinet.create') }}"
                            class="add-button inline-flex items-center justify-center gap-2 text-white font-bold px-6 py-3 rounded-xl group">

                            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 5v14M5 12h14" />

                            </svg>

                            Tambah Kabinet

                        </a>

                    </div>

                </div>

            </div>



            {{-- =========================================================
                DAFTAR KABINET (Dengan Animasi Masuk)
            ========================================================== --}}
            @if ($cabinets->count() > 0)

                <div class="cabinet-card rounded-3xl overflow-hidden animate-cabinet-list">

                    @php
                        $no = 1;
                    @endphp


                    @foreach ($cabinets as $cabinet)

                        <div class="cabinet-item group relative flex flex-col lg:flex-row lg:items-center lg:justify-between p-5 md:p-6 gap-5 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">


                            {{-- =================================================
                                LINK UTAMA
                            ================================================== --}}
                            <a href="{{ route('cabinet.show', $cabinet->id) }}"
                                class="flex items-center gap-4 md:gap-5 flex-1 min-w-0">


                                {{-- NUMBER --}}
                                <div class="relative flex-shrink-0">

                                    <div class="number-box w-12 h-12 md:w-14 md:h-14 flex items-center justify-center rounded-2xl text-white font-extrabold text-lg md:text-xl transition-transform duration-200">

                                        {{ $no++ }}

                                    </div>


                                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-400 rounded-full border-2 border-white shadow-sm"></div>

                                </div>



                                {{-- INFO --}}
                                <div class="min-w-0 flex-1">

                                    <div class="flex items-center gap-2">

                                        <p class="text-gray-900 font-extrabold text-base md:text-lg group-hover:text-[#003A8F] transition-colors duration-200 truncate">

                                            {{ $cabinet->cabinet_name }}

                                        </p>

                                    </div>


                                    <div class="flex flex-wrap items-center gap-2 mt-2">


                                        {{-- CODE --}}
                                        <span class="code-badge inline-flex items-center gap-2 px-3 py-1.5 rounded-xl text-xs md:text-sm font-bold text-blue-800">

                                            <svg class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 6.414V19a2 2 0 01-2 2z" />

                                            </svg>

                                            {{ $cabinet->cabinet_code ?? 'Tidak ada kode' }}

                                        </span>



                                        {{-- STATUS --}}
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-bold">

                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                                            Aktif

                                        </span>


                                        {{-- ACCESS --}}
                                        <span class="inline-flex items-center gap-1.5 text-xs text-gray-400 font-medium">

                                            <svg class="w-3.5 h-3.5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                            </svg>

                                            Terakhir diakses: Hari ini

                                        </span>

                                    </div>

                                </div>



                                {{-- ARROW --}}
                                <div class="hidden sm:flex w-10 h-10 rounded-xl bg-gray-50 group-hover:bg-blue-100 items-center justify-center flex-shrink-0 transition-all duration-200">

                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-[#003A8F] group-hover:translate-x-1 transition-all duration-200"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7" />

                                    </svg>

                                </div>

                            </a>



                            {{-- =================================================
                                ACTION BUTTON
                            ================================================== --}}
                            <div class="flex items-center gap-2 ml-16 lg:ml-4">


                                {{-- EDIT --}}
                                <a href="{{ route('cabinet.edit', $cabinet->id) }}"
                                    class="action-button flex items-center justify-center w-11 h-11 bg-gradient-to-br from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 rounded-xl shadow-md hover:shadow-lg"
                                    title="Edit Kabinet">

                                    <svg class="w-5 h-5 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19.5 7.125L16.875 4.5" />

                                    </svg>

                                </a>



                                {{-- DELETE --}}
                                <form action="{{ route('cabinet.destroy', $cabinet->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kabinet ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="action-button flex items-center justify-center w-11 h-11 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-xl shadow-md hover:shadow-lg"
                                        title="Hapus Kabinet">

                                        <svg class="w-5 h-5 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 7h12M9 7V4h6v3m-7 4v5m4-5v5m4-5v5M7 7l1 13h8l1-13" />

                                        </svg>

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>



                {{-- =========================================================
                    PAGINATION
                ========================================================== --}}
                @if(method_exists($cabinets, 'links'))

                    <div class="mt-6">
                        {{ $cabinets->links() }}
                    </div>

                @endif


            @else

                {{-- =========================================================
                    EMPTY STATE
                ========================================================== --}}
                <div class="cabinet-card empty-state rounded-3xl p-10 md:p-16 text-center animate-cabinet-list">

                    <div class="w-24 h-24 rounded-3xl bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-100 flex items-center justify-center mx-auto mb-6 shadow-sm">

                        <svg class="w-12 h-12 text-[#003A8F]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                        </svg>

                    </div>


                    <h3 class="text-2xl font-extrabold text-gray-800 mb-3">
                        Belum Ada Kabinet
                    </h3>


                    <p class="text-gray-500 mb-8 max-w-md mx-auto leading-relaxed">
                        Belum ada kabinet arsip yang tersedia.
                        Tambahkan kabinet baru untuk mulai mengatur penyimpanan dokumen.
                    </p>


                    <a href="{{ route('cabinet.create') }}"
                        class="add-button inline-flex items-center gap-2 px-6 py-3 text-white font-bold rounded-xl">

                        <svg class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 5v14M5 12h14" />

                        </svg>

                        Tambah Kabinet

                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
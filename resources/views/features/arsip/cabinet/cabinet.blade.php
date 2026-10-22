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


                        {{-- Tombol Tambah hanya untuk Admin & Bendahara --}}
                        @if(Auth::user()->role !== 'Kepala Kantor TVRI')
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
                        @endif

                    </div>

                </div>

            </div>



            {{-- =========================================================
                DAFTAR KABINET (Dengan Animasi Masuk)
            ========================================================== --}}
            @if ($cabinets->count() > 0)

                <div class="space-y-4 animate-cabinet-list">

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($cabinets as $cabinet)

                        <div class="group relative bg-white/95 backdrop-blur-md rounded-2xl border border-slate-200/80 p-5 md:p-6 shadow-[0_8px_25px_-5px_rgba(0,58,143,0.08),0_4px_10px_-4px_rgba(0,58,143,0.04)] hover:shadow-[0_20px_35px_-5px_rgba(0,58,143,0.16)] hover:border-blue-300 hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                            {{-- AKSEN GLOW 3D DI KIRI --}}
                            <div class="absolute left-0 top-3 bottom-3 w-1.5 bg-gradient-to-b from-[#003A8F] via-blue-500 to-indigo-600 rounded-r-full opacity-80 group-hover:opacity-100 group-hover:scale-y-105 transition-all duration-300"></div>

                            {{-- LINK UTAMA --}}
                            <a href="{{ route('cabinet.show', $cabinet->id) }}"
                                class="flex items-center gap-4 md:gap-5 flex-1 min-w-0 pl-1">

                                {{-- NOMOR 3D CUBE GLOSSY --}}
                                <div class="relative shrink-0">
                                    <div class="w-13 h-13 md:w-14 md:h-14 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#003A8F] via-[#0056C7] to-indigo-700 text-white font-black text-lg md:text-xl shadow-[0_8px_16px_rgba(0,58,143,0.3),inset_0_1px_1px_rgba(255,255,255,0.4)] group-hover:scale-105 group-hover:rotate-1 transition-all duration-300">
                                        {{ $no++ }}
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-400 rounded-full border-2 border-white shadow-sm ring-2 ring-emerald-400/20"></div>
                                </div>

                                {{-- INFORMASI KABINET --}}
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-gray-900 font-extrabold text-base md:text-lg tracking-tight group-hover:text-[#003A8F] transition-colors duration-200 truncate">
                                        {{ $cabinet->cabinet_name }}
                                    </h4>

                                    <div class="flex flex-wrap items-center gap-2 mt-2">
                                        {{-- KODE KABINET --}}
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-blue-50/80 border border-blue-200/80 text-xs md:text-sm font-bold text-blue-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 6.414V19a2 2 0 01-2 2z" />
                                            </svg>
                                            {{ $cabinet->cabinet_code ?? 'Tanpa Kode' }}
                                        </span>

                                        {{-- STATUS AKTIF --}}
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-bold shadow-sm">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                            Aktif
                                        </span>

                                        {{-- TERAKHIR DIAKSES --}}
                                        <span class="hidden md:inline-flex items-center gap-1.5 text-xs text-slate-400 font-medium">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Terakhir diakses: Hari ini
                                        </span>
                                    </div>
                                </div>

                                {{-- ARROW INTERAKTIF --}}
                                <div class="hidden sm:flex w-10 h-10 rounded-xl bg-slate-50 group-hover:bg-blue-600 items-center justify-center shrink-0 border border-slate-100 group-hover:border-blue-600 shadow-sm transition-all duration-300">
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-white group-hover:translate-x-0.5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            {{-- TOMBOL AKSI SEPERTI GAMBAR 2 --}}
                            @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                            <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                                {{-- EDIT --}}
                                <a href="{{ route('cabinet.edit', $cabinet->id) }}"
                                    class="w-10 h-10 inline-flex items-center justify-center bg-amber-50/70 border border-amber-300 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 rounded-xl transition duration-200 shadow-sm active:scale-95"
                                    title="Edit Kabinet">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('cabinet.destroy', $cabinet->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kabinet ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-10 h-10 inline-flex items-center justify-center bg-red-50/70 border border-red-200 text-red-500 hover:bg-red-500 hover:text-white hover:border-red-500 rounded-xl transition duration-200 shadow-sm active:scale-95"
                                        title="Hapus Kabinet">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif

                        </div>{{-- PENUTUP TAG cabinet-item --}}

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


                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
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
                    @endif

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
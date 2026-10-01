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
    {{-- GLOBAL STYLE --}}
    {{-- ========================================================= --}}

    <style>
        .archive-card {
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .archive-card:hover {
            transform: translateY(-3px);
            box-shadow:
                0 18px 35px rgba(15, 23, 42, .10),
                0 6px 12px rgba(37, 99, 235, .06);
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
                0 12px 25px rgba(15, 23, 42, .09);
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
    </style>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/40">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">


            {{-- ========================================================= --}}
            {{-- TOMBOL KEMBALI + HERO --}}
            {{-- ========================================================= --}}

            <div class="mb-6">

                <a
                    href="{{ route('cabinet.show', $category->cabinet_id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5
                           bg-white text-gray-700 rounded-xl
                           border border-gray-200 shadow-sm
                           hover:bg-blue-50 hover:text-blue-700
                           hover:border-blue-200 hover:shadow-md
                           transition-all duration-200"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"
                        />
                    </svg>

                    <span class="font-medium">
                        Kembali ke Kategori
                    </span>
                </a>

            </div>


            {{-- HERO --}}
            <div
                class="relative overflow-hidden rounded-3xl
                       bg-gradient-to-br from-[#003A8F] via-[#0057B8] to-[#172554]
                       shadow-2xl shadow-blue-900/20
                       border border-blue-400/20
                       mb-7"
            >

                {{-- dekorasi --}}
                <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-white/10"></div>
                <div class="absolute right-20 -bottom-24 w-72 h-72 rounded-full bg-cyan-300/10"></div>
                <div class="absolute left-1/3 -top-24 w-52 h-52 rounded-full bg-blue-300/10"></div>

                <div class="relative z-10 p-6 sm:p-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-start gap-4">

                            <div
                                class="flex-shrink-0 w-14 h-14 sm:w-16 sm:h-16
                                       rounded-2xl bg-white/15
                                       border border-white/20
                                       flex items-center justify-center
                                       shadow-lg backdrop-blur-sm"
                            >
                                <svg
                                    class="w-8 h-8 sm:w-9 sm:h-9 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.7"
                                        d="M4 7a2 2 0 012-2h3l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.7"
                                        d="M8 12h8M8 16h5"
                                    />
                                </svg>
                            </div>


                            <div class="min-w-0">

                                <p class="text-blue-100 text-sm font-medium mb-1">
                                    Kategori Arsip
                                </p>

                                <h1
                                    class="text-2xl sm:text-3xl font-bold
                                           text-white leading-tight break-words"
                                >
                                    {{ $category->category_name ?? 'Kategori Arsip' }}
                                </h1>

                                @if (!empty($category->sub_category))
                                    <p class="mt-2 text-blue-100 text-sm sm:text-base">
                                        {{ $category->sub_category }}
                                    </p>
                                @endif

                                @if (!empty($category->year))
                                    <div class="mt-3 inline-flex items-center gap-2
                                                px-3 py-1.5 rounded-full
                                                bg-white/15 border border-white/20
                                                text-white text-sm font-semibold">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                        </svg>

                                        Tahun {{ $category->year }}
                                    </div>
                                @endif

                            </div>

                        </div>


                        {{-- STAT --}}
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">

                            <div
                                class="min-w-[130px] px-5 py-4
                                       rounded-2xl bg-white/10
                                       border border-white/15
                                       backdrop-blur-sm"
                            >
                                <p class="text-blue-100 text-xs font-medium">
                                    Arsip Fisik
                                </p>

                                <p class="text-2xl font-bold text-white mt-1">
                                    {{ $racks->count() }}
                                </p>

                                <p class="text-blue-100 text-xs mt-1">
                                    Rak tersedia
                                </p>
                            </div>


                            <div
                                class="min-w-[130px] px-5 py-4
                                       rounded-2xl bg-white/10
                                       border border-white/15
                                       backdrop-blur-sm"
                            >
                                <p class="text-blue-100 text-xs font-medium">
                                    Arsip Digital
                                </p>

                                <p class="text-2xl font-bold text-white mt-1">
                                    {{ $digitalarchive->total() }}
                                </p>

                                <p class="text-blue-100 text-xs mt-1">
                                    Dokumen
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- SECTION ARSIP FISIK --}}
            {{-- ========================================================= --}}

            <div
                class="archive-card bg-white/95 rounded-3xl
                       border border-gray-200/80
                       shadow-xl shadow-slate-200/50
                       p-5 sm:p-7 mb-7"
            >

                {{-- HEADER --}}
                <div
                    class="flex flex-col sm:flex-row sm:items-center
                           sm:justify-between gap-4 mb-6"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-12 h-12 rounded-2xl
                                   bg-gradient-to-br from-emerald-500 to-teal-600
                                   flex items-center justify-center
                                   shadow-lg shadow-emerald-500/20"
                        >
                            <svg
                                class="w-6 h-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M4 7a2 2 0 012-2h3l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"
                                />
                            </svg>
                        </div>


                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                Arsip Fisik
                            </h3>

                            <p class="text-sm text-gray-500 mt-0.5">
                                Kelola rak dan dokumen fisik
                            </p>

                        </div>

                    </div>


                    {{-- TAMBAH RAK --}}
                    <form action="{{ route('rack.create') }}">

                        <input
                            type="hidden"
                            name="category_id"
                            value="{{ $category->id }}"
                        >

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center
                                   justify-center gap-2 px-5 py-2.5
                                   bg-gradient-to-r from-emerald-500 to-teal-600
                                   hover:from-emerald-600 hover:to-teal-700
                                   text-white font-semibold rounded-xl
                                   shadow-lg shadow-emerald-500/20
                                   hover:shadow-xl hover:-translate-y-0.5
                                   transition-all duration-200"
                        >

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4"
                                />
                            </svg>

                            Tambah Rak Arsip

                        </button>

                    </form>

                </div>


                {{-- SEARCH FISIK --}}
                <form
                    method="GET"
                    action="{{ url()->current() }}"
                    class="mb-6 p-5 rounded-2xl
                           bg-gradient-to-br from-slate-50 to-blue-50/50
                           border border-blue-100"
                >

                    <div class="flex items-center gap-2 mb-4">

                        <div
                            class="w-8 h-8 rounded-lg bg-blue-100
                                   flex items-center justify-center"
                        >
                            <svg
                                class="w-4 h-4 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>
                        </div>

                        <div>
                            <p class="text-sm font-bold text-gray-800">
                                Cari Rak Arsip
                            </p>

                            <p class="text-xs text-gray-500">
                                Cari berdasarkan nama rak
                            </p>
                        </div>

                    </div>


                    <div class="flex flex-col sm:flex-row gap-3">

                        <input
                            type="text"
                            name="search_fisik"
                            value="{{ request('search_fisik') }}"
                            placeholder="Contoh: Rak A, Rak 01..."
                            class="flex-1 px-4 py-3 text-sm
                                   border border-gray-200
                                   rounded-xl bg-white
                                   shadow-sm
                                   focus:outline-none
                                   focus:ring-2 focus:ring-blue-500/30
                                   focus:border-blue-500"
                        >


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2
                                   px-6 py-3 bg-blue-600 hover:bg-blue-700
                                   text-white text-sm font-semibold
                                   rounded-xl shadow-lg shadow-blue-500/20
                                   transition"
                        >

                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>

                            Cari

                        </button>


                        <a
                            href="{{ url()->current() }}"
                            class="inline-flex items-center justify-center
                                   px-6 py-3 bg-white
                                   hover:bg-gray-100
                                   text-gray-700 text-sm font-semibold
                                   rounded-xl border border-gray-200
                                   transition"
                        >
                            Reset
                        </a>

                    </div>

                </form>


                {{-- LIST RAK --}}
                @if ($racks->count() > 0)

                    <div class="space-y-3">

                        @php
                            $no = 1;
                        @endphp

                        @foreach ($racks as $rak)

                            <div
                                class="archive-item group
                                       flex flex-col sm:flex-row
                                       sm:items-center sm:justify-between
                                       gap-4 p-4 sm:p-5
                                       bg-white
                                       border border-gray-200
                                       rounded-2xl"
                            >

                                <a
                                    href="{{ route('rack.show', $rak->id) }}"
                                    class="flex items-center gap-4 flex-1 min-w-0"
                                >

                                    {{-- NOMOR --}}
                                    <div
                                        class="flex-shrink-0 w-11 h-11
                                               flex items-center justify-center
                                               rounded-xl
                                               bg-gradient-to-br
                                               from-[#003A8F] to-[#002766]
                                               text-white font-bold
                                               shadow-lg shadow-blue-900/20
                                               group-hover:scale-105
                                               transition"
                                    >
                                        {{ $no++ }}
                                    </div>


                                    {{-- INFO --}}
                                    <div class="min-w-0">

                                        <p
                                            class="text-gray-900 font-bold
                                                   text-base sm:text-lg
                                                   truncate
                                                   group-hover:text-blue-700
                                                   transition"
                                        >
                                            {{ $rak->rack_name }}
                                        </p>


                                        <div class="flex flex-wrap items-center gap-2 mt-2">

                                            <span
                                                class="inline-flex items-center gap-1.5
                                                       px-2.5 py-1
                                                       rounded-lg
                                                       bg-indigo-50
                                                       text-indigo-700
                                                       border border-indigo-100
                                                       text-xs font-semibold"
                                            >
                                                <svg
                                                    class="w-3.5 h-3.5"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 5h14M5 12h14M5 19h14"
                                                    />
                                                </svg>

                                                {{ $rak->category->category_name ?? '-' }}
                                            </span>


                                            <span class="text-xs text-gray-400">
                                                Rak Arsip Fisik
                                            </span>

                                        </div>

                                    </div>

                                </a>


                                {{-- AKSI --}}
                                <div class="flex items-center gap-2 sm:ml-4">

                                    <a
                                        href="{{ route('rack.show', $rak->id) }}"
                                        class="hidden sm:inline-flex items-center gap-1.5
                                               px-3 py-2
                                               bg-blue-50 hover:bg-blue-100
                                               text-blue-700
                                               rounded-lg text-xs font-semibold
                                               transition"
                                    >
                                        Buka
                                    </a>


                                    <a
                                        href="{{ route('rack.edit', $rak->id) }}"
                                        class="inline-flex items-center justify-center
                                               w-10 h-10
                                               bg-amber-500 hover:bg-amber-600
                                               text-white rounded-xl
                                               shadow-sm hover:shadow-md
                                               transition"
                                        title="Edit"
                                    >

                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-9-5l9-9m0 0l3 3m-3-3v5"
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
                                                   w-10 h-10
                                                   bg-red-500 hover:bg-red-600
                                                   text-white rounded-xl
                                                   shadow-sm hover:shadow-md
                                                   transition"
                                            title="Hapus"
                                        >

                                            <svg
                                                class="w-5 h-5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M6 7h12M9 7V4h6v3m-7 0l1 13h6l1-13M10 11v6m4-6v6"
                                                />
                                            </svg>

                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    {{-- EMPTY FISIK --}}
                    <div
                        class="text-center py-12 px-5
                               rounded-2xl
                               bg-gradient-to-br from-slate-50 to-blue-50/40
                               border border-dashed border-gray-300"
                    >

                        <div
                            class="mx-auto w-20 h-20 rounded-3xl
                                   bg-white
                                   shadow-lg
                                   flex items-center justify-center mb-5"
                        >
                            <svg
                                class="w-10 h-10 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.6"
                                    d="M4 7a2 2 0 012-2h3l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"
                                />
                            </svg>
                        </div>

                        <h4 class="text-lg font-bold text-gray-700">
                            Belum Ada Rak Arsip
                        </h4>

                        <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">
                            Belum terdapat rak arsip fisik pada kategori ini.
                            Tambahkan rak untuk mulai mengelola dokumen fisik.
                        </p>

                    </div>

                @endif

            </div>



            {{-- ========================================================= --}}
            {{-- SECTION ARSIP DIGITAL --}}
            {{-- ========================================================= --}}

            <div
                class="archive-card bg-white/95 rounded-3xl
                       border border-gray-200/80
                       shadow-xl shadow-slate-200/50
                       p-5 sm:p-7"
            >

                {{-- HEADER DIGITAL --}}
                <div
                    class="flex flex-col sm:flex-row sm:items-center
                           sm:justify-between gap-4 mb-6"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-12 h-12 rounded-2xl
                                   bg-gradient-to-br from-blue-500 to-indigo-600
                                   flex items-center justify-center
                                   shadow-lg shadow-blue-500/20"
                        >
                            <svg
                                class="w-6 h-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 8h8M8 12h8M8 16h5"
                                />
                            </svg>
                        </div>


                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                Arsip Digital
                            </h3>

                            <p class="text-sm text-gray-500 mt-0.5">
                                Kelola dokumen digital dan pencarian arsip
                            </p>

                        </div>

                    </div>


                    {{-- TAMBAH DIGITAL --}}
                    <form
                        action="{{ route('digital.create') }}"
                        method="GET"
                    >

                        <input
                            type="hidden"
                            name="category_id"
                            value="{{ $category->id }}"
                        >

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center
                                   justify-center gap-2 px-5 py-2.5
                                   bg-gradient-to-r from-blue-600 to-indigo-600
                                   hover:from-blue-700 hover:to-indigo-700
                                   text-white font-semibold rounded-xl
                                   shadow-lg shadow-blue-500/20
                                   hover:shadow-xl hover:-translate-y-0.5
                                   transition-all duration-200"
                        >

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4"
                                />
                            </svg>

                            Tambah Arsip Digital

                        </button>

                    </form>

                </div>


                {{-- ========================================================= --}}
                {{-- SEARCH DIGITAL --}}
                {{-- ========================================================= --}}

                <form
                    method="GET"
                    action="{{ url()->current() }}"
                    class="mb-6 p-5 rounded-2xl
                           bg-gradient-to-br from-slate-50
                           via-blue-50/40 to-indigo-50/50
                           border border-blue-100"
                >

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                        {{-- SEARCH --}}
                        <div>

                            <label
                                class="flex items-center gap-2
                                       text-sm font-bold text-gray-700 mb-2"
                            >
                                <span
                                    class="w-7 h-7 rounded-lg bg-blue-100
                                           flex items-center justify-center"
                                >
                                    <svg
                                        class="w-4 h-4 text-blue-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                        />
                                    </svg>
                                </span>

                                Cari Arsip Digital
                            </label>


                            <input
                                type="text"
                                name="search_digital"
                                value="{{ request('search_digital') }}"
                                placeholder="Cari nama arsip atau pengaju..."
                                class="w-full px-4 py-3 text-sm
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

                            <label
                                class="flex items-center gap-2
                                       text-sm font-bold text-gray-700 mb-2"
                            >
                                <span
                                    class="w-7 h-7 rounded-lg bg-indigo-100
                                           flex items-center justify-center"
                                >
                                    <svg
                                        class="w-4 h-4 text-indigo-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h10"
                                        />
                                    </svg>
                                </span>

                                Filter Divisi
                            </label>


                            <select
                                name="divisi"
                                onchange="this.form.submit()"
                                class="w-full px-4 py-3 text-sm
                                       border border-gray-200
                                       rounded-xl bg-white
                                       shadow-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500/30
                                       focus:border-blue-500"
                            >

                                <option value="">
                                    Semua Divisi
                                </option>

                                <option
                                    value="Berita"
                                    {{ request('divisi') == 'Berita' ? 'selected' : '' }}
                                >
                                    Berita
                                </option>

                                <option
                                    value="Umum"
                                    {{ request('divisi') == 'Umum' ? 'selected' : '' }}
                                >
                                    Umum
                                </option>

                                <option
                                    value="Program"
                                    {{ request('divisi') == 'Program' ? 'selected' : '' }}
                                >
                                    Program
                                </option>

                                <option
                                    value="KMB"
                                    {{ request('divisi') == 'KMB' ? 'selected' : '' }}
                                >
                                    KMB
                                </option>

                                <option
                                    value="Teknik"
                                    {{ request('divisi') == 'Teknik' ? 'selected' : '' }}
                                >
                                    Teknik
                                </option>

                                <option
                                    value="Pengembangan usaha"
                                    {{ request('divisi') == 'Pengembangan usaha' ? 'selected' : '' }}
                                >
                                    Pengembangan usaha
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="flex flex-wrap items-center gap-2 mt-5 pt-5 border-t border-blue-100">

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2
                                   px-6 py-2.5
                                   bg-blue-600 hover:bg-blue-700
                                   text-white text-sm font-semibold
                                   rounded-xl shadow-lg shadow-blue-500/20
                                   transition"
                        >
                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>

                            Cari
                        </button>


                        <a
                            href="{{ url()->current() }}"
                            class="inline-flex items-center justify-center
                                   px-6 py-2.5
                                   bg-white hover:bg-gray-100
                                   text-gray-700 text-sm font-semibold
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
                @endphp


                <div class="mb-7">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <div>

                            <h4 class="text-base font-bold text-gray-800">
                                Klasifikasi Arsip Digital
                            </h4>

                            <p class="text-xs text-gray-500 mt-1">
                                Pilih klasifikasi untuk memfilter arsip.
                            </p>

                        </div>


                        @if ($activeCategory)

                            <a
                                href="{{ url()->current() }}"
                                class="hidden sm:inline-flex items-center gap-1.5
                                       text-xs font-semibold text-blue-600
                                       hover:text-blue-800"
                            >
                                Hapus filter
                            </a>

                        @endif

                    </div>


                    <div
                        id="category-dropdowns"
                        class="grid grid-cols-1 sm:grid-cols-2
                               lg:grid-cols-4 gap-3"
                    >

                        {{-- SEMUA --}}
                        <a
                            href="{{ url()->current() }}"
                            class="flex items-center justify-between
                                   px-4 py-3 rounded-xl
                                   text-sm font-bold
                                   border transition-all duration-200
                                   {{ !$activeCategory
                                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg shadow-blue-500/20'
                                        : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                        >

                            <span>
                                SEMUA
                            </span>

                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 12h14"
                                />
                            </svg>

                        </a>


                        {{-- AEC --}}
                        <details class="category-dropdown relative">

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-4 py-3 rounded-xl
                                       text-sm font-bold
                                       border transition-all duration-200

                                       {{ $isAecActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">
                                    AEC - Kerja Sama
                                </span>

                                <svg
                                    class="arrow-icon w-4 h-4 flex-shrink-0 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </summary>


                            <div
                                class="absolute left-0 right-0 top-full mt-2
                                       bg-white border border-gray-200
                                       rounded-2xl shadow-2xl z-50 p-2"
                            >

                                <a
                                    href="{{ url()->current() }}?category=AEC.001"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'AEC.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    AEC.001 Kerja Sama Jasa Siaran dan Digitalisasi Penyiaran Daerah
                                </a>

                            </div>

                        </details>


                        {{-- BAH --}}
                        <details class="category-dropdown relative">

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-4 py-3 rounded-xl
                                       text-sm font-bold
                                       border transition-all duration-200

                                       {{ $isBahActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">
                                    BAH - Pelayanan Publik Lainnya
                                </span>

                                <svg
                                    class="arrow-icon w-4 h-4 flex-shrink-0 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </summary>


                            <div
                                class="absolute left-0 right-0 top-full mt-2
                                       bg-white border border-gray-200
                                       rounded-2xl shadow-2xl z-50 p-2"
                            >

                                <a
                                    href="{{ url()->current() }}?category=BAH.001"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'BAH.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    BAH.001 Siaran Berita, Current Affairs dan Olahraga
                                </a>

                                <a
                                    href="{{ url()->current() }}?category=BAH.002"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'BAH.002'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    BAH.002 Siaran Program dan Promosi Acara
                                </a>

                                <a
                                    href="{{ url()->current() }}?category=BAH.003"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'BAH.003'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    BAH.003 Siaran Konten Media Baru
                                </a>

                            </div>

                        </details>


                        {{-- CBR --}}
                        <details class="category-dropdown relative">

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-4 py-3 rounded-xl
                                       text-sm font-bold
                                       border transition-all duration-200

                                       {{ $isCbrActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">
                                    CBR - Dukungan Teknis
                                </span>

                                <svg
                                    class="arrow-icon w-4 h-4 flex-shrink-0 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </summary>


                            <div
                                class="absolute left-0 right-0 top-full mt-2
                                       bg-white border border-gray-200
                                       rounded-2xl shadow-2xl z-50 p-2"
                            >

                                <a
                                    href="{{ url()->current() }}?category=CBR.001"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'CBR.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CBR.001 Dukungan Teknis Kinerja Transmisi, Multipleksing dan Fasilitas Teknik
                                </a>

                            </div>

                        </details>


                        {{-- CBT --}}
                        <details class="category-dropdown relative">

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-4 py-3 rounded-xl
                                       text-sm font-bold
                                       border transition-all duration-200

                                       {{ $isCbtActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">
                                    CBT - Prasarana TIK
                                </span>

                                <svg
                                    class="arrow-icon w-4 h-4 flex-shrink-0 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </summary>


                            <div
                                class="absolute left-0 right-0 top-full mt-2
                                       bg-white border border-gray-200
                                       rounded-2xl shadow-2xl z-50 p-2"
                            >

                                <a
                                    href="{{ url()->current() }}?category=CBT.002"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'CBT.002'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CBT.002 Sarana dan Prasarana Teknik Produksi dan Penyiaran
                                </a>

                            </div>

                        </details>


                        {{-- CDS --}}
                        <details class="category-dropdown relative">

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-4 py-3 rounded-xl
                                       text-sm font-bold
                                       border transition-all duration-200

                                       {{ $isCdsActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">
                                    CDS OP - Prasarana Bidang Teknologi
                                </span>

                                <svg
                                    class="arrow-icon w-4 h-4 flex-shrink-0 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </summary>


                            <div
                                class="absolute left-0 right-0 top-full mt-2
                                       bg-white border border-gray-200
                                       rounded-2xl shadow-2xl z-50 p-2"
                            >

                                <a
                                    href="{{ url()->current() }}?category=CDS.001"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'CDS.001'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CDS.001 Pemeliharaan Transmisi, Multipleksing dan Fasilitas Teknik
                                </a>

                                <a
                                    href="{{ url()->current() }}?category=CDS.002"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'CDS.002'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CDS.002 Pemeliharaan Peralatan Teknik Produksi dan Penyiaran
                                </a>

                                <a
                                    href="{{ url()->current() }}?category=CDS.003"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'CDS.003'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    CDS.003 Pemeliharaan Infrastruktur Teknologi Informatika dan Media Baru
                                </a>

                            </div>

                        </details>


                        {{-- EBA --}}
                        <details class="category-dropdown relative">

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-4 py-3 rounded-xl
                                       text-sm font-bold
                                       border transition-all duration-200

                                       {{ $isEbaActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">
                                    EBA - Layanan Dukungan Manajemen
                                </span>

                                <svg
                                    class="arrow-icon w-4 h-4 flex-shrink-0 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </summary>


                            <div
                                class="absolute left-0 right-0 top-full mt-2
                                       bg-white border border-gray-200
                                       rounded-2xl shadow-2xl z-50 p-2"
                            >

                                <a
                                    href="{{ url()->current() }}?category=EBA.994"
                                    class="block px-3 py-3 rounded-xl text-sm transition
                                    {{ $activeCategory === 'EBA.994'
                                        ? 'bg-blue-100 text-blue-700 font-bold'
                                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}"
                                >
                                    EBA.994 Layanan Perkantoran
                                </a>

                            </div>

                        </details>


                        {{-- WA --}}
                        <details class="category-dropdown relative">

                            <summary
                                class="cursor-pointer
                                       flex items-center justify-between
                                       px-4 py-3 rounded-xl
                                       text-sm font-bold
                                       border transition-all duration-200

                                       {{ $isWaActive
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-blue-600 shadow-lg'
                                            : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700' }}"
                            >

                                <span class="truncate">
                                    WA - Dukungan Manajemen
                                </span>

                                <svg
                                    class="arrow-icon w-4 h-4 flex-shrink-0 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </summary>


                            <div
                                class="absolute right-0 top-full mt-2
                                       bg-white border border-gray-200
                                       rounded-2xl shadow-2xl z-50 p-2
                                       w-full sm:w-auto sm:min-w-[320px]"
                            >

                                <a
                                    href="{{ url()->current() }}?category=WA.4376"
                                    class="block px-3 py-3 rounded-xl text-sm transition
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
                {{-- PERIODE + EXPORT PDF --}}
                {{-- ========================================================= --}}

                <div
                    class="mb-7 rounded-2xl
                           bg-gradient-to-br from-slate-50 to-gray-50
                           border border-gray-200 p-5 sm:p-6"
                >

                    <div class="flex items-start gap-3 mb-5">

                        <div
                            class="w-10 h-10 rounded-xl
                                   bg-red-100
                                   flex items-center justify-center"
                        >
                            <svg
                                class="w-5 h-5 text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                        </div>


                        <div>

                            <h3 class="text-base font-bold text-gray-800">
                                Periode Laporan Pengajuan
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                Tentukan rentang tanggal berdasarkan tanggal dibuatnya pengajuan.
                            </p>

                        </div>

                    </div>


                    <form
                        id="form-export-pdf"
                        action="{{ route('digital.report.pdf', ['id' => $category->id]) }}"
                        method="GET"
                        target="_blank"
                    >

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>

                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Mulai Tanggal
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_mulai"
                                    value="{{ request('tanggal_mulai', now()->startOfYear()->format('Y-m-d')) }}"
                                    class="w-full px-4 py-3
                                           border border-gray-200
                                           rounded-xl text-sm
                                           bg-white shadow-sm
                                           focus:outline-none
                                           focus:ring-2 focus:ring-blue-500/30
                                           focus:border-blue-500"
                                    required
                                >

                            </div>


                            <div>

                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Sampai Tanggal
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_selesai"
                                    value="{{ request('tanggal_selesai', now()->endOfYear()->format('Y-m-d')) }}"
                                    class="w-full px-4 py-3
                                           border border-gray-200
                                           rounded-xl text-sm
                                           bg-white shadow-sm
                                           focus:outline-none
                                           focus:ring-2 focus:ring-blue-500/30
                                           focus:border-blue-500"
                                    required
                                >

                            </div>

                        </div>


                        <div
                            class="flex flex-wrap items-center gap-2
                                   mt-5 pt-5 border-t border-gray-200"
                        >

                            <button
                                type="submit"
                                class="inline-flex items-center gap-2
                                       px-5 py-2.5
                                       bg-blue-600 hover:bg-blue-700
                                       text-white text-sm font-semibold
                                       rounded-xl shadow-lg
                                       shadow-blue-500/20
                                       transition"
                            >

                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414V19l-4 2v-5.293L2.293 7.293A1 1 0 012 6.586V4z"
                                    />
                                </svg>

                                Terapkan Periode

                            </button>


                            <a
                                href="{{ url()->current() }}"
                                class="inline-flex items-center
                                       px-5 py-2.5
                                       bg-white hover:bg-gray-100
                                       text-gray-700
                                       text-sm font-semibold
                                       rounded-xl border border-gray-200
                                       transition"
                            >
                                Reset Periode
                            </a>


                            <button
                                type="submit"
                                formtarget="_blank"
                                formaction="{{ route('digital.report.pdf', ['id' => $category->id]) }}"
                                class="inline-flex items-center gap-2
                                       px-5 py-2.5
                                       bg-gradient-to-r from-red-500 to-rose-600
                                       hover:from-red-600 hover:to-rose-700
                                       text-white text-sm font-semibold
                                       rounded-xl shadow-lg
                                       shadow-red-500/20
                                       transition"
                            >

                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 18h10M7 14h10M7 10h4m-4 8V4h10v14"
                                    />
                                </svg>

                                Export PDF

                            </button>

                        </div>

                    </form>

                </div>



                {{-- ========================================================= --}}
                {{-- DAFTAR ARSIP DIGITAL --}}
                {{-- ========================================================= --}}

                @if ($digitalarchive->count() > 0)

                    <div class="space-y-3">

                        @php
                            $noDigital = ($digitalarchive->currentPage() - 1)
                                * $digitalarchive->perPage() + 1;
                        @endphp


                        @foreach ($digitalarchive as $archive)

                            <div
                                class="archive-item group
                                       flex flex-col sm:flex-row
                                       sm:items-center sm:justify-between
                                       gap-4 p-4 sm:p-5
                                       bg-white
                                       border border-gray-200
                                       rounded-2xl"
                            >

                                <a
                                    href="{{ route('digital.show', $archive->id) }}"
                                    class="flex items-center gap-4 flex-1 min-w-0"
                                >

                                    {{-- NOMOR --}}
                                    <div
                                        class="flex-shrink-0 w-11 h-11
                                               flex items-center justify-center
                                               rounded-xl
                                               bg-gradient-to-br
                                               from-[#003A8F] to-[#002766]
                                               text-white font-bold
                                               shadow-lg shadow-blue-900/20
                                               group-hover:scale-105
                                               transition"
                                    >
                                        {{ $noDigital++ }}
                                    </div>


                                    <div class="min-w-0 flex-1">

                                        <p
                                            class="text-gray-900 font-bold
                                                   text-base sm:text-lg
                                                   leading-tight
                                                   break-words
                                                   group-hover:text-blue-700
                                                   transition"
                                        >
                                            {{ $archive->archive_name }}
                                        </p>


                                        <div
                                            class="flex flex-wrap items-center
                                                   gap-x-4 gap-y-2 mt-3
                                                   text-xs sm:text-sm"
                                        >

                                            <span
                                                class="inline-flex items-center gap-1.5
                                                       text-gray-600"
                                            >

                                                <svg
                                                    class="w-4 h-4 text-blue-500"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21a8 8 0 0116 0"
                                                    />
                                                </svg>

                                                <span class="text-gray-400">
                                                    Diajukan:
                                                </span>

                                                <span class="font-semibold text-gray-700">
                                                    {{ $archive->submiter_name }}
                                                </span>

                                            </span>


                                            <span class="hidden sm:inline text-gray-300">
                                                •
                                            </span>


                                            <span
                                                class="inline-flex items-center gap-1.5
                                                       text-gray-600"
                                            >

                                                <svg
                                                    class="w-4 h-4 text-indigo-500"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 3c-2.755 0-5.29.926-7.13 2.484A11.95 11.95 0 003 12c0 2.755.926 5.29 2.484 7.13A11.95 11.95 0 0012 21c2.755 0 5.29-.926 7.13-2.484A11.95 11.95 0 0021 12c0-2.755-.926-5.29-2.484-7.13z"
                                                    />
                                                </svg>

                                                <span class="text-gray-400">
                                                    Ditandatangani:
                                                </span>

                                                <span class="font-semibold text-gray-700">
                                                    {{ $archive->revenue_officer_name }}
                                                </span>

                                            </span>

                                        </div>


                                        @if (!empty($archive->kategori))

                                            <div class="mt-3">

                                                <span
                                                    class="inline-flex items-center
                                                           px-2.5 py-1
                                                           rounded-lg
                                                           bg-blue-50
                                                           text-blue-700
                                                           border border-blue-100
                                                           text-xs font-semibold"
                                                >
                                                    {{ $archive->kategori }}
                                                </span>

                                            </div>

                                        @endif

                                    </div>

                                </a>


                                {{-- AKSI --}}
                                <div
                                    class="flex items-center gap-2
                                           sm:ml-4 self-end sm:self-center"
                                >

                                    <a
                                        href="{{ route('digital.show', $archive->id) }}"
                                        class="hidden sm:inline-flex items-center gap-1.5
                                               px-3 py-2
                                               bg-blue-50 hover:bg-blue-100
                                               text-blue-700
                                               rounded-lg text-xs font-semibold
                                               transition"
                                    >
                                        Buka
                                    </a>


                                    <a
                                        href="{{ route('digital.edit', $archive->id) }}"
                                        class="inline-flex items-center justify-center
                                               w-10 h-10
                                               bg-amber-500 hover:bg-amber-600
                                               text-white rounded-xl
                                               shadow-sm hover:shadow-md
                                               transition"
                                        title="Edit"
                                    >

                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-9-5l9-9m0 0l3 3m-3-3v5"
                                            />
                                        </svg>

                                    </a>


                                    <form
                                        action="{{ route('digital.destroy', $archive->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus arsip digital ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center
                                                   w-10 h-10
                                                   bg-red-500 hover:bg-red-600
                                                   text-white rounded-xl
                                                   shadow-sm hover:shadow-md
                                                   transition"
                                            title="Hapus"
                                        >

                                            <svg
                                                class="w-5 h-5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M6 7h12M9 7V4h6v3m-7 0l1 13h6l1-13M10 11v6m4-6v6"
                                                />
                                            </svg>

                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach


                        {{-- PAGINATION --}}
                        <div class="pt-5">
                            {{ $digitalarchive->links() }}
                        </div>

                    </div>

                @else

                    {{-- EMPTY DIGITAL --}}
                    <div
                        class="text-center py-12 px-5
                               rounded-2xl
                               bg-gradient-to-br from-slate-50 to-blue-50/40
                               border border-dashed border-gray-300"
                    >

                        <div
                            class="mx-auto w-20 h-20 rounded-3xl
                                   bg-white
                                   shadow-lg
                                   flex items-center justify-center mb-5"
                        >

                            <svg
                                class="w-10 h-10 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.6"
                                    d="M4 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.6"
                                    d="M8 13h8"
                                />

                            </svg>

                        </div>


                        <h4 class="text-lg font-bold text-gray-700">
                            Belum Ada Arsip Digital
                        </h4>


                        <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">
                            Belum terdapat arsip digital pada kategori ini.
                            Silakan tambahkan arsip digital untuk mulai menyimpan dokumen.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- DROPDOWN SCRIPT --}}
    {{-- ========================================================= --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const dropdownContainer =
                document.getElementById('category-dropdowns');

            if (!dropdownContainer) {
                return;
            }

            const dropdowns =
                dropdownContainer.querySelectorAll('details');

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

        });
    </script>

</x-app-layout>
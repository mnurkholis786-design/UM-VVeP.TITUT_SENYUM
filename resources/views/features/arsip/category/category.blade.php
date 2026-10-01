<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0056C7] flex items-center justify-center shadow-lg shadow-blue-900/20">
                <svg class="w-5 h-5 text-white"
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
                <h2 class="font-bold text-xl text-gray-800 tracking-tight">
                    Input Arsip
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola kategori arsip
                </p>
            </div>
        </div>
    </x-slot>


    <style>
        .category-page {
            background:
                radial-gradient(circle at 0% 0%, rgba(0, 58, 143, .08), transparent 30%),
                radial-gradient(circle at 100% 10%, rgba(0, 86, 199, .07), transparent 28%),
                #f5f7fb;
        }

        .category-hero {
            background:
                radial-gradient(circle at 90% 10%, rgba(255, 255, 255, .18), transparent 25%),
                radial-gradient(circle at 10% 100%, rgba(255, 255, 255, .10), transparent 28%),
                linear-gradient(135deg, #003A8F 0%, #0056C7 55%, #0074D9 100%);
            box-shadow:
                0 20px 45px rgba(0, 58, 143, .18),
                inset 0 1px 0 rgba(255, 255, 255, .18);
        }

        .category-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border: 1px solid rgba(226, 232, 240, .9);
            box-shadow:
                0 12px 30px rgba(15, 23, 42, .07),
                0 3px 8px rgba(15, 23, 42, .04);
            transition:
                transform .3s ease,
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .category-card:hover {
            transform: translateY(-7px);
            border-color: rgba(59, 130, 246, .35);
            box-shadow:
                0 24px 50px rgba(15, 23, 42, .12),
                0 8px 20px rgba(0, 58, 143, .08);
        }

        .category-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #003A8F, #0056C7, #38bdf8);
            opacity: .9;
        }

        .category-icon {
            background:
                linear-gradient(145deg, #eff6ff, #dbeafe);
            border: 1px solid #bfdbfe;
            box-shadow:
                0 10px 25px rgba(37, 99, 235, .10),
                inset 0 1px 0 rgba(255,255,255,.9);
            transition: all .3s ease;
        }

        .category-card:hover .category-icon {
            transform: translateY(-3px) scale(1.06);
            box-shadow:
                0 15px 30px rgba(37, 99, 235, .17),
                inset 0 1px 0 rgba(255,255,255,.9);
        }

        .edit-button {
            background: linear-gradient(135deg, #059669, #10b981);
            box-shadow:
                0 10px 24px rgba(5, 150, 105, .22),
                inset 0 1px 0 rgba(255,255,255,.2);
            transition: all .25s ease;
        }

        .edit-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 15px 30px rgba(5, 150, 105, .30),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        .back-button {
            transition: all .2s ease;
        }

        .back-button:hover {
            transform: translateX(-3px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, .10);
        }

        .arrow-button {
            transition: all .25s ease;
        }

        .category-card:hover .arrow-button {
            transform: translateX(4px);
            background: #dbeafe;
            color: #003A8F;
        }

        .empty-state {
            background:
                radial-gradient(circle at 50% 0%, rgba(59,130,246,.08), transparent 35%),
                #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow:
                0 15px 35px rgba(15, 23, 42, .06);
        }
    </style>


    <div class="category-page min-h-screen py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =========================================================
                TOMBOL KEMBALI
            ========================================================== --}}
            <div class="mb-5">

                <a href="{{ route('cabinet.index') }}"
                    class="back-button inline-flex items-center gap-2 px-4 py-2.5 bg-white text-gray-700 rounded-xl border border-gray-200 shadow-md hover:bg-gray-50">

                    <svg class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                    </svg>

                    <span class="font-semibold text-sm">
                        Kembali ke Kabinet
                    </span>

                </a>

            </div>



            {{-- =========================================================
                HERO CABINET
            ========================================================== --}}
            <div class="category-hero rounded-3xl overflow-hidden mb-6 relative">

                <div class="absolute -top-24 -right-20 w-80 h-80 rounded-full bg-white/10 blur-3xl"></div>

                <div class="absolute -bottom-28 -left-20 w-80 h-80 rounded-full bg-blue-300/10 blur-3xl"></div>


                <div class="relative px-6 py-7 md:px-8 md:py-8">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">


                        {{-- INFO CABINET --}}
                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center shadow-xl flex-shrink-0">

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


                            <div class="min-w-0">

                                <div class="flex flex-wrap items-center gap-2 mb-2">

                                    <span class="px-3 py-1 rounded-full bg-white/15 border border-white/20 text-white text-xs font-bold backdrop-blur-sm">
                                        KABINET ARSIP
                                    </span>

                                    @if($cabinet->cabinet_code)

                                        <span class="px-3 py-1 rounded-full bg-white/10 border border-white/15 text-blue-50 text-xs font-semibold backdrop-blur-sm">
                                            {{ $cabinet->cabinet_code }}
                                        </span>

                                    @endif

                                </div>


                                <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight break-words">

                                    {{ $cabinet->cabinet_name }}

                                </h1>


                                <p class="text-blue-100 text-sm mt-2">
                                    Pilih kategori arsip yang ingin dibuka.
                                </p>

                            </div>

                        </div>



                        {{-- TOTAL CATEGORY --}}
                        <div class="flex-shrink-0">

                            <div class="px-5 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md">

                                <p class="text-blue-100 text-xs font-semibold">
                                    Total Kategori
                                </p>

                                <p class="text-white text-2xl font-extrabold mt-0.5">
                                    {{ $categories->count() }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =========================================================
                HEADER KATEGORI
            ========================================================== --}}
            <div class="bg-white/95 backdrop-blur-xl rounded-3xl border border-gray-200 shadow-lg mb-6 overflow-hidden">

                <div class="p-5 md:p-6">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">


                        {{-- TITLE --}}
                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-100 flex items-center justify-center shadow-sm">

                                <svg class="w-6 h-6 text-[#003A8F]"
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
                                    Daftar Kategori Arsip
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Kelompokkan dan akses arsip berdasarkan kategori.
                                </p>

                            </div>

                        </div>



                        {{-- EDIT KATEGORI --}}
                        <form action="{{ route('category.index') }}"
                            method="GET">

                            <input type="hidden"
                                name="id_cabinet"
                                value="{{ $cabinet->id }}">


                            <button type="submit"
                                class="edit-button inline-flex items-center justify-center gap-2 px-5 py-3 text-white font-bold rounded-xl">

                                <svg class="w-5 h-5"
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

                                Edit Kategori

                            </button>

                        </form>

                    </div>

                </div>

            </div>



            {{-- =========================================================
                GRID KATEGORI
            ========================================================== --}}
            @if ($categories->count() > 0)

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-6">

                    @foreach ($categories as $category)

                        <div class="category-card group rounded-3xl">


                            {{-- DECORATIVE GLOW --}}
                            <div class="absolute -top-20 -right-20 w-40 h-40 bg-blue-400/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>


                            {{-- CARD LINK --}}
                            <a href="{{ route('category.show', $category->id) }}"
                                class="relative block p-6 md:p-7">


                                <div class="flex flex-col items-center">


                                    {{-- ICON --}}
                                    <div class="category-icon w-20 h-20 md:w-22 md:h-22 rounded-2xl flex items-center justify-center mb-5">

                                        @if ($category->url_icon)

                                            <img src="{{ $category->url_icon }}"
                                                class="w-11 h-11 md:w-12 md:h-12 object-contain"
                                                alt="{{ $category->category_name }}">

                                        @else

                                            <svg class="w-11 h-11 text-[#003A8F]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M8 11h8M8 15h5" />

                                            </svg>

                                        @endif

                                    </div>



                                    {{-- CATEGORY LABEL --}}
                                    <div class="mb-3">

                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-[#003A8F] text-[11px] font-bold uppercase tracking-wide">

                                            Kategori Arsip

                                        </span>

                                    </div>



                                    {{-- CATEGORY NAME --}}
                                    <p class="text-base md:text-lg font-extrabold text-gray-800 text-center leading-snug group-hover:text-[#003A8F] transition-colors duration-200 min-h-[48px] flex items-center">

                                        {{ $category->category_name }}

                                    </p>



                                    {{-- OPEN INDICATOR --}}
                                    <div class="mt-5 w-full flex items-center justify-center gap-2 text-sm font-semibold text-gray-400 group-hover:text-[#003A8F] transition-colors">

                                        <span>
                                            Buka kategori
                                        </span>


                                        <div class="arrow-button w-7 h-7 rounded-lg bg-gray-100 flex items-center justify-center">

                                            <svg class="w-4 h-4"
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

                            </a>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- =====================================================
                    EMPTY STATE
                ====================================================== --}}
                <div class="empty-state rounded-3xl p-10 md:p-16 text-center">


                    <div class="w-24 h-24 rounded-3xl bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-100 flex items-center justify-center mx-auto mb-6 shadow-sm">

                        <svg class="w-12 h-12 text-[#003A8F]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M8 11h8M8 15h5" />

                        </svg>

                    </div>


                    <h3 class="text-2xl font-extrabold text-gray-800 mb-3">
                        Belum Ada Kategori
                    </h3>


                    <p class="text-gray-500 max-w-md mx-auto leading-relaxed">
                        Belum ada kategori arsip yang tersedia pada kabinet ini.
                        Silakan tambahkan atau atur kategori terlebih dahulu.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
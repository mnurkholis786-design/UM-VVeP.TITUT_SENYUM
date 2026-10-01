<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center
                bg-gradient-to-br from-[#003A8F] to-[#0074D9]
                shadow-lg shadow-blue-900/20">

                <svg class="w-5 h-5 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 7.5A2.5 2.5 0 015.5 5h13A2.5 2.5 0 0121 7.5v9a2.5 2.5 0 01-2.5 2.5h-13A2.5 2.5 0 013 16.5v-9z" />

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 9.5h8M8 13h5" />

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


    {{-- ========================================================= --}}
    {{-- CUSTOM STYLE --}}
    {{-- ========================================================= --}}

    <style>

        .category-page {
            background:
                radial-gradient(circle at 10% 0%, rgba(0, 116, 217, 0.10), transparent 28%),
                radial-gradient(circle at 90% 15%, rgba(0, 58, 143, 0.08), transparent 25%),
                linear-gradient(180deg, #f7fbff 0%, #eef5fc 100%);
        }

        .category-hero {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, #002b70 0%, #003A8F 42%, #0074D9 100%);
            box-shadow:
                0 24px 55px rgba(0, 58, 143, 0.22),
                inset 0 1px 0 rgba(255,255,255,0.18);
        }

        .category-hero::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 9999px;
            background: rgba(255,255,255,0.07);
            top: -150px;
            right: -50px;
        }

        .category-hero::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 9999px;
            border: 1px solid rgba(255,255,255,0.12);
            bottom: -100px;
            left: 35%;
        }

        .glass-box {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .category-container {
            background: rgba(255,255,255,0.94);
            border: 1px solid rgba(148,163,184,0.18);
            box-shadow:
                0 20px 50px rgba(15,23,42,0.08),
                0 4px 14px rgba(15,23,42,0.04);
        }

        .category-row {
            position: relative;
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .category-row:hover {
            background: linear-gradient(
                90deg,
                rgba(239,246,255,0.95),
                rgba(255,255,255,1)
            );
            transform: translateY(-2px);
            box-shadow:
                0 10px 25px rgba(0,58,143,0.08);
        }

        .number-badge {
            background: linear-gradient(
                145deg,
                #003A8F,
                #0066CC,
                #0089E8
            );

            box-shadow:
                0 7px 16px rgba(0,58,143,0.25),
                inset 0 1px 1px rgba(255,255,255,0.25);
        }

        .category-link {
            transition: color 0.2s ease;
        }

        .category-link:hover .category-name {
            color: #0056C7;
        }

        .category-name {
            transition: color 0.2s ease;
        }

        .open-arrow {
            transition:
                transform 0.2s ease,
                background 0.2s ease;
        }

        .category-link:hover .open-arrow {
            transform: translateX(4px);
            background: #dbeafe;
        }

        .add-button {
            background: linear-gradient(
                135deg,
                #003A8F,
                #0066CC,
                #0089E8
            );

            box-shadow:
                0 10px 22px rgba(0,58,143,0.25),
                inset 0 1px 0 rgba(255,255,255,0.20);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 15px 30px rgba(0,58,143,0.30),
                inset 0 1px 0 rgba(255,255,255,0.25);
        }

        .back-button {
            background: rgba(255,255,255,0.90);
            border: 1px solid #dbeafe;
            color: #003A8F;
            box-shadow: 0 6px 16px rgba(15,23,42,0.06);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .back-button:hover {
            background: #eff6ff;
            transform: translateX(-3px);
            box-shadow: 0 10px 22px rgba(0,58,143,0.10);
        }

        .edit-button {
            background: linear-gradient(
                135deg,
                #0f766e,
                #0d9488
            );

            box-shadow:
                0 8px 18px rgba(13,148,136,0.20);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .edit-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 12px 24px rgba(13,148,136,0.28);
        }

        .action-edit {
            background: linear-gradient(
                135deg,
                #f59e0b,
                #d97706
            );

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .action-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(217,119,6,0.25);
        }

        .action-delete {
            background: linear-gradient(
                135deg,
                #ef4444,
                #dc2626
            );

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .action-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(220,38,38,0.25);
        }

        .empty-box {
            background:
                radial-gradient(
                    circle at center,
                    rgba(219,234,254,0.7),
                    rgba(255,255,255,0.9) 55%
                );
        }

        .empty-icon {
            background: linear-gradient(
                135deg,
                #dbeafe,
                #eff6ff
            );

            box-shadow:
                inset 0 1px 2px rgba(255,255,255,0.8),
                0 10px 25px rgba(0,58,143,0.08);
        }

        @media (max-width: 640px) {

            .category-row {
                align-items: flex-start;
            }

            .category-actions {
                flex-direction: column;
            }

            .category-actions a,
            .category-actions button {
                width: 38px;
                height: 38px;
            }

        }

    </style>


    {{-- ========================================================= --}}
    {{-- PAGE --}}
    {{-- ========================================================= --}}

    <div class="category-page min-h-screen py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ========================================================= --}}
            {{-- TOMBOL KEMBALI --}}
            {{-- ========================================================= --}}

            <div class="mb-5">

                <a href="{{ route('cabinet.show', $cabinet->id) }}"
                    class="back-button inline-flex items-center gap-2
                    px-4 py-2.5 rounded-xl font-semibold text-sm">

                    <svg class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                    </svg>

                    <span>Kembali</span>

                </a>

            </div>


            {{-- ========================================================= --}}
            {{-- HERO --}}
            {{-- ========================================================= --}}

            <div class="category-hero rounded-3xl mb-6">

                <div class="relative z-10 px-6 py-7 md:px-8 md:py-8">

                    <div class="flex flex-col lg:flex-row
                        lg:items-center lg:justify-between gap-6">

                        <div class="flex items-start gap-4">

                            {{-- ICON --}}

                            <div class="w-14 h-14 md:w-16 md:h-16
                                rounded-2xl flex items-center justify-center
                                bg-white/15 border border-white/20
                                shadow-xl backdrop-blur-sm shrink-0">

                                <svg class="w-8 h-8 md:w-9 md:h-9 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.7"
                                        d="M3 7.5A2.5 2.5 0 015.5 5h4.2l2 2H18.5A2.5 2.5 0 0121 9.5v7A2.5 2.5 0 0118.5 19h-13A2.5 2.5 0 013 16.5v-9z" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.7"
                                        d="M8 12h8M8 15h5" />

                                </svg>

                            </div>


                            {{-- TEXT --}}

                            <div>

                                <div class="flex flex-wrap items-center gap-2 mb-2">

                                    <span class="inline-flex items-center
                                        px-3 py-1 rounded-full
                                        bg-white/15 border border-white/20
                                        text-white text-xs font-bold
                                        uppercase tracking-wider">

                                        Kabinet Arsip

                                    </span>

                                    @if($cabinet->cabinet_code)

                                        <span class="inline-flex items-center
                                            px-3 py-1 rounded-full
                                            bg-white/10 border border-white/15
                                            text-blue-50 text-xs font-semibold">

                                            {{ $cabinet->cabinet_code }}

                                        </span>

                                    @endif

                                </div>


                                <h1 class="text-2xl md:text-3xl font-black
                                    text-white tracking-tight">

                                    {{ $cabinet->cabinet_name }}

                                </h1>


                                <p class="mt-2 text-blue-100 text-sm md:text-base">

                                    Pilih kategori arsip yang ingin kamu buka.

                                </p>

                            </div>

                        </div>


                        {{-- TOTAL CATEGORY --}}

                        <div class="glass-box rounded-2xl px-5 py-4
                            min-w-[150px]">

                            <p class="text-blue-100 text-xs font-semibold
                                uppercase tracking-wider">

                                Total Kategori

                            </p>

                            <div class="flex items-end gap-2 mt-1">

                                <p class="text-white text-3xl font-black">

                                    {{ $categories->count() }}

                                </p>

                                <span class="text-blue-100 text-sm mb-1">

                                    kategori

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- HEADER DAFTAR --}}
            {{-- ========================================================= --}}

            <div class="category-container rounded-3xl overflow-hidden mb-5">

                <div class="p-5 md:p-6">

                    <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                        <div>

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl
                                    bg-blue-50 flex items-center justify-center">

                                    <svg class="w-5 h-5 text-[#003A8F]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />

                                    </svg>

                                </div>

                                <div>

                                    <h2 class="text-lg md:text-xl font-bold
                                        text-gray-800">

                                        Daftar Kategori

                                    </h2>

                                    <p class="text-sm text-gray-500">

                                        Kategori arsip pada kabinet ini

                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- TAMBAH CATEGORY --}}

                        <form action="{{ route('category.create') }}"
                            method="GET">

                            <input type="hidden"
                                name="cabinet_id"
                                value="{{ $cabinet->id }}">

                            <button type="submit"
                                class="add-button inline-flex items-center
                                justify-center gap-2
                                px-5 py-3 rounded-xl
                                text-white font-bold text-sm">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />

                                </svg>

                                Tambah Kategori

                            </button>

                        </form>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- DAFTAR CATEGORY --}}
            {{-- ========================================================= --}}

            @if ($categories->count() > 0)

                <div class="category-container rounded-3xl overflow-hidden">

                    {{-- HEADER TABLE --}}

                    <div class="hidden md:grid grid-cols-[70px_1fr_150px]
                        items-center gap-4
                        px-6 py-4
                        bg-gradient-to-r from-[#003A8F] to-[#0066CC]
                        text-white">

                        <div class="text-xs font-bold uppercase tracking-wider">
                            No
                        </div>

                        <div class="text-xs font-bold uppercase tracking-wider">
                            Nama Kategori
                        </div>

                        <div class="text-xs font-bold uppercase tracking-wider text-center">
                            Aksi
                        </div>

                    </div>


                    {{-- ROW --}}

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($categories as $category)

                        <div class="category-row
                            flex flex-col md:grid
                            md:grid-cols-[70px_1fr_150px]
                            md:items-center
                            gap-4
                            px-5 md:px-6 py-5
                            border-b border-gray-100
                            last:border-b-0">


                            {{-- NOMOR --}}

                            <div class="flex items-center">

                                <div class="number-badge
                                    w-10 h-10 rounded-xl
                                    flex items-center justify-center
                                    text-white font-black text-sm">

                                    {{ $no++ }}

                                </div>

                            </div>


                            {{-- CATEGORY --}}

                            <a href="{{ route('category.show', $category->id) }}"
                                class="category-link flex items-center gap-4 min-w-0">

                                <div class="w-11 h-11 rounded-xl
                                    bg-blue-50
                                    border border-blue-100
                                    flex items-center justify-center
                                    shrink-0">

                                    <svg class="w-5 h-5 text-[#0066CC]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 6.5A2.5 2.5 0 016.5 4H10l2 2h5.5A2.5 2.5 0 0120 8.5v9A2.5 2.5 0 0117.5 20h-11A2.5 2.5 0 014 17.5v-11z" />

                                    </svg>

                                </div>


                                <div class="min-w-0">

                                    <p class="category-name
                                        text-gray-800 font-bold
                                        text-base md:text-lg
                                        truncate">

                                        {{ $category->category_name }}

                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">

                                        Klik untuk membuka kategori

                                    </p>

                                </div>


                                <div class="open-arrow
                                    hidden sm:flex
                                    ml-auto
                                    w-9 h-9
                                    rounded-full
                                    bg-gray-50
                                    items-center justify-center
                                    shrink-0">

                                    <svg class="w-4 h-4 text-[#003A8F]"
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


                            {{-- AKSI --}}

                            <div class="category-actions
                                flex items-center gap-2 md:justify-center
                                ml-0 md:ml-0">

                                {{-- EDIT --}}

                                <a href="{{ route('category.edit', $category->id) }}"
                                    class="action-edit
                                    w-10 h-10 rounded-xl
                                    flex items-center justify-center
                                    shadow-md"
                                    title="Edit kategori">

                                    <svg class="w-5 h-5 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16.862 4.487a2.25 2.25 0 013.182 3.182L8.25 19.463 4 20l.537-4.25L16.862 4.487z" />

                                    </svg>

                                </a>


                                {{-- DELETE --}}

                                <form action="{{ route('category.destroy', $category->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus category ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="action-delete
                                        w-10 h-10 rounded-xl
                                        flex items-center justify-center
                                        shadow-md"
                                        title="Hapus kategori">

                                        <svg class="w-5 h-5 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 7h12M9 7V5.5A1.5 1.5 0 0110.5 4h3A1.5 1.5 0 0115 5.5V7m-7 0l.7 12a1.5 1.5 0 001.5 1.5h3.6a1.5 1.5 0 001.5-1.5L16 7M10 11v5M14 11v5" />

                                        </svg>

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- ========================================================= --}}
                {{-- EMPTY STATE --}}
                {{-- ========================================================= --}}

                <div class="category-container empty-box
                    rounded-3xl overflow-hidden">

                    <div class="px-6 py-16 text-center">

                        <div class="empty-icon
                            w-20 h-20 rounded-3xl
                            mx-auto mb-5
                            flex items-center justify-center">

                            <svg class="w-10 h-10 text-[#003A8F]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.6"
                                    d="M4 7.5A2.5 2.5 0 016.5 5H10l2 2h5.5A2.5 2.5 0 0120 9.5v8A2.5 2.5 0 0117.5 20h-11A2.5 2.5 0 014 17.5v-10z" />

                            </svg>

                        </div>


                        <h3 class="text-xl font-bold text-gray-800">

                            Belum Ada Kategori

                        </h3>


                        <p class="text-gray-500 text-sm mt-2 max-w-md mx-auto">

                            Belum ada kategori arsip yang tersedia pada
                            kabinet ini. Tambahkan kategori untuk mulai
                            mengelola arsip.

                        </p>


                        <form action="{{ route('category.create') }}"
                            method="GET"
                            class="mt-6">

                            <input type="hidden"
                                name="cabinet_id"
                                value="{{ $cabinet->id }}">

                            <button type="submit"
                                class="add-button inline-flex items-center
                                gap-2 px-5 py-3 rounded-xl
                                text-white font-bold text-sm">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />

                                </svg>

                                Tambah Kategori

                            </button>

                        </form>

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl
                bg-gradient-to-br from-[#003A8F] to-[#0074D9]
                flex items-center justify-center
                shadow-lg shadow-blue-900/20">

                <svg class="w-5 h-5 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6v12m6-6H6" />

                </svg>

            </div>

            <div>

                <h2 class="font-bold text-xl text-gray-800 tracking-tight">
                    Tambah Kategori Arsip
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Buat kategori baru untuk pengelolaan arsip
                </p>

            </div>

        </div>

    </x-slot>


    {{-- ========================================================= --}}
    {{-- CUSTOM STYLE --}}
    {{-- ========================================================= --}}

    <style>

        .category-create-page {

            background:
                radial-gradient(
                    circle at 8% 0%,
                    rgba(0, 116, 217, 0.10),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 92% 12%,
                    rgba(0, 58, 143, 0.08),
                    transparent 25%
                ),
                linear-gradient(
                    180deg,
                    #f7fbff 0%,
                    #eef5fc 100%
                );

        }

        .back-button {

            background: rgba(255,255,255,0.94);

            border: 1px solid #dbeafe;

            color: #003A8F;

            box-shadow:
                0 7px 18px rgba(15,23,42,0.06);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;

        }

        .back-button:hover {

            background: #eff6ff;

            transform: translateX(-3px);

            box-shadow:
                0 10px 24px rgba(0,58,143,0.12);

        }


        .main-card {

            background: rgba(255,255,255,0.96);

            border: 1px solid rgba(148,163,184,0.18);

            box-shadow:
                0 25px 60px rgba(15,23,42,0.10),
                0 5px 18px rgba(15,23,42,0.05);

        }


        .hero {

            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #002b70 0%,
                    #003A8F 45%,
                    #0074D9 100%
                );

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.18);

        }

        .hero::before {

            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            border-radius: 9999px;

            background: rgba(255,255,255,0.07);

            top: -150px;
            right: -60px;

        }

        .hero::after {

            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 9999px;

            border: 1px solid rgba(255,255,255,0.10);

            bottom: -110px;
            left: 42%;

        }


        .glass-info {

            background: rgba(255,255,255,0.12);

            border: 1px solid rgba(255,255,255,0.18);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

        }


        .form-section {

            background: #ffffff;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 8px 24px rgba(15,23,42,0.04);

        }


        .input-field {

            border: 2px solid #e2e8f0;

            background: #f8fafc;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;

        }

        .input-field:focus {

            background: #ffffff;

            border-color: #0066CC;

            box-shadow:
                0 0 0 4px rgba(0,102,204,0.10);

            outline: none;

        }


        .select-field {

            border: 2px solid #e2e8f0;

            background: #ffffff;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;

        }

        .select-field:focus {

            border-color: #0066CC;

            box-shadow:
                0 0 0 4px rgba(0,102,204,0.10);

            outline: none;

        }


        .option-card {

            border: 1px solid #e2e8f0;

            background:
                linear-gradient(
                    180deg,
                    #ffffff,
                    #f8fbff
                );

            transition:
                transform 0.2s ease,
                border-color 0.2s ease,
                box-shadow 0.2s ease;

        }

        .option-card:hover {

            transform: translateY(-2px);

            border-color: #93c5fd;

            box-shadow:
                0 10px 25px rgba(0,58,143,0.07);

        }


        .guide-box {

            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #f8fbff
                );

            border: 1px solid #bfdbfe;

        }


        .guide-number {

            background:
                linear-gradient(
                    135deg,
                    #003A8F,
                    #0066CC
                );

            box-shadow:
                0 5px 12px rgba(0,58,143,0.18);

        }


        .submit-button {

            background:
                linear-gradient(
                    135deg,
                    #003A8F,
                    #0066CC,
                    #0089E8
                );

            box-shadow:
                0 12px 25px rgba(0,58,143,0.24),
                inset 0 1px 0 rgba(255,255,255,0.20);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;

        }

        .submit-button:hover {

            transform: translateY(-2px);

            box-shadow:
                0 17px 32px rgba(0,58,143,0.30),
                inset 0 1px 0 rgba(255,255,255,0.25);

        }


        .info-card {

            background: rgba(255,255,255,0.95);

            border: 1px solid #e2e8f0;

            box-shadow:
                0 12px 28px rgba(15,23,42,0.06);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;

        }

        .info-card:hover {

            transform: translateY(-4px);

            box-shadow:
                0 18px 35px rgba(0,58,143,0.10);

        }


        .error-box {

            background: #fef2f2;

            border: 1px solid #fecaca;

            color: #b91c1c;

        }

    </style>


    {{-- ========================================================= --}}
    {{-- PAGE --}}
    {{-- ========================================================= --}}

    <div class="category-create-page min-h-screen py-6">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ========================================================= --}}
            {{-- BACK --}}
            {{-- ========================================================= --}}

            <div class="mb-5">

                <form action="{{ route('category.index') }}"
                    method="GET">

                    <input type="hidden"
                        name="id_cabinet"
                        value="{{ $cabinet->id }}">

                    <button type="submit"
                        class="back-button inline-flex items-center
                        gap-2 px-4 py-2.5 rounded-xl
                        font-semibold text-sm">

                        <svg class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                        </svg>

                        Kembali ke Kategori

                    </button>

                </form>

            </div>


            {{-- ========================================================= --}}
            {{-- MAIN CARD --}}
            {{-- ========================================================= --}}

            <div class="main-card rounded-3xl overflow-hidden">


                {{-- ===================================================== --}}
                {{-- HERO --}}
                {{-- ===================================================== --}}

                <div class="hero">

                    <div class="relative z-10
                        px-6 py-7 md:px-8 md:py-8">

                        <div class="flex flex-col
                            lg:flex-row
                            lg:items-center
                            lg:justify-between
                            gap-6">


                            {{-- LEFT --}}

                            <div class="flex items-start gap-4">

                                <div class="w-14 h-14 md:w-16 md:h-16
                                    rounded-2xl
                                    bg-white/15
                                    border border-white/20
                                    flex items-center justify-center
                                    shadow-xl
                                    backdrop-blur-sm
                                    shrink-0">

                                    <svg class="w-8 h-8 md:w-9 md:h-9 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M4 7.5A2.5 2.5 0 016.5 5H10l2 2h7.5A2.5 2.5 0 0122 9.5v8A2.5 2.5 0 0119.5 20h-13A2.5 2.5 0 014 17.5v-10z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M8 12h8M8 15h5" />

                                    </svg>

                                </div>


                                <div>

                                    <div class="flex flex-wrap
                                        items-center gap-2 mb-2">

                                        <span class="inline-flex
                                            items-center
                                            px-3 py-1 rounded-full
                                            bg-white/15
                                            border border-white/20
                                            text-white text-xs
                                            font-bold uppercase
                                            tracking-wider">

                                            Kategori Arsip

                                        </span>


                                        @if($cabinet->cabinet_code)

                                            <span class="inline-flex
                                                items-center
                                                px-3 py-1 rounded-full
                                                bg-white/10
                                                border border-white/15
                                                text-blue-50 text-xs
                                                font-semibold">

                                                {{ $cabinet->cabinet_code }}

                                            </span>

                                        @endif

                                    </div>


                                    <h1 class="text-2xl md:text-3xl
                                        font-black text-white
                                        tracking-tight">

                                        Buat Kategori Baru

                                    </h1>


                                    <p class="mt-2 text-blue-100
                                        text-sm md:text-base">

                                        Tambahkan kategori arsip ke kabinet
                                        <span class="font-bold text-white">
                                            {{ $cabinet->cabinet_name }}
                                        </span>

                                    </p>

                                </div>

                            </div>


                            {{-- CABINET INFO --}}

                            <div class="glass-info
                                rounded-2xl px-5 py-4
                                min-w-[220px]">

                                <p class="text-blue-100 text-xs
                                    font-semibold uppercase
                                    tracking-wider">

                                    Kabinet Aktif

                                </p>

                                <p class="text-white font-bold
                                    text-base mt-1">

                                    {{ $cabinet->cabinet_name }}

                                </p>

                                @if($cabinet->cabinet_code)

                                    <p class="text-blue-100 text-xs mt-1">

                                        Kode: {{ $cabinet->cabinet_code }}

                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- FORM --}}
                {{-- ===================================================== --}}

                <form action="{{ route('category.store') }}"
                    method="POST"
                    class="p-5 md:p-8">

                    @csrf


                    {{-- CABINET ID --}}

                    <input type="hidden"
                        name="cabinet_id"
                        value="{{ $cabinet->id }}">


                    {{-- ERROR --}}

                    @if ($errors->any())

                        <div class="error-box rounded-2xl p-4 mb-6">

                            <div class="flex items-start gap-3">

                                <svg class="w-5 h-5 mt-0.5 shrink-0"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 9v3m0 4h.01M10.29 3.86l-7.1 12.28A2 2 0 004.92 19h14.16a2 2 0 001.73-2.86l-7.1-12.28a2 2 0 00-3.42 0z" />

                                </svg>

                                <div>

                                    <p class="font-bold text-sm">
                                        Periksa kembali data yang diisi.
                                    </p>

                                    <ul class="mt-2 text-sm space-y-1">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                • {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif


                    <div class="space-y-7">


                        {{-- ================================================= --}}
                        {{-- NAMA KATEGORI --}}
                        {{-- ================================================= --}}

                        <div class="form-section rounded-2xl p-5 md:p-6">

                            <div class="flex items-center gap-3 mb-4">

                                <div class="w-10 h-10 rounded-xl
                                    bg-blue-50
                                    flex items-center justify-center">

                                    <svg class="w-5 h-5 text-[#003A8F]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 6.5A2.5 2.5 0 016.5 4H10l2 2h7.5A2.5 2.5 0 0122 8.5v9A2.5 2.5 0 0119.5 20h-13A2.5 2.5 0 014 17.5v-11z" />

                                    </svg>

                                </div>

                                <div>

                                    <label for="name"
                                        class="block text-gray-800
                                        font-bold">

                                        Nama Kategori Arsip
                                        <span class="text-red-500">*</span>

                                    </label>

                                    <p class="text-xs text-gray-500 mt-0.5">

                                        Gunakan nama yang jelas dan mudah
                                        dikenali.

                                    </p>

                                </div>

                            </div>


                            <div class="relative">

                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    class="input-field w-full
                                    rounded-xl px-5 py-3.5
                                    text-gray-800
                                    placeholder-gray-400"
                                    placeholder="Contoh: Surat Masuk, Laporan Keuangan, Dokumen Legal"
                                    required>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- JENIS KATEGORI --}}
                        {{-- ================================================= --}}

                        <div class="form-section rounded-2xl p-5 md:p-6">

                            <div class="flex items-center gap-3 mb-4">

                                <div class="w-10 h-10 rounded-xl
                                    bg-blue-50
                                    flex items-center justify-center">

                                    <svg class="w-5 h-5 text-[#0066CC]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 6h16M4 12h16M4 18h16" />

                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-800">

                                        Jenis Kategori

                                    </h3>

                                    <p class="text-xs text-gray-500 mt-0.5">

                                        Pilih metode pembayaran atau sumber
                                        dana jika diperlukan.

                                    </p>

                                </div>

                            </div>


                            {{-- INFO --}}

                            <div class="mb-5 rounded-xl
                                bg-blue-50 border border-blue-200
                                px-4 py-3">

                                <div class="flex items-start gap-3">

                                    <svg class="w-5 h-5 text-[#0066CC]
                                        shrink-0 mt-0.5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z" />

                                    </svg>

                                    <p class="text-xs md:text-sm
                                        text-blue-900 leading-relaxed">

                                        <strong>Opsional.</strong>
                                        Pilih salah satu jenis kategori jika
                                        kategori ini sudah spesifik.
                                        Kosongkan keduanya jika kategori akan
                                        memiliki sub-kategori.

                                    </p>

                                </div>

                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2
                                gap-5">


                                {{-- PAYMENT --}}

                                <div class="option-card rounded-2xl p-5">

                                    <div class="flex items-center gap-3 mb-4">

                                        <div class="w-10 h-10 rounded-xl
                                            bg-blue-50
                                            flex items-center justify-center">

                                            <svg class="w-5 h-5 text-[#0066CC]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M3 10h18M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M7 15h3" />

                                            </svg>

                                        </div>

                                        <div>

                                            <h4 class="font-bold text-gray-800
                                                text-sm">

                                                Metode Pembayaran

                                            </h4>

                                            <p class="text-xs text-gray-400">
                                                Opsional
                                            </p>

                                        </div>

                                    </div>


                                    <select name="payment_method"
                                        class="select-field w-full
                                        rounded-xl px-4 py-3
                                        text-sm text-gray-700">

                                        <option value="">
                                            -- Tidak dipilih --
                                        </option>

                                        @foreach ($payment as $pay)

                                            <option
                                                value="{{ $pay->id }}"
                                                {{ old('payment_method') == $pay->id ? 'selected' : '' }}>

                                                {{ $pay->payment_method_name }}

                                                @if($pay->sub_category)
                                                    → {{ $pay->sub_category }}
                                                @endif

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- FUNDING --}}

                                <div class="option-card rounded-2xl p-5">

                                    <div class="flex items-center gap-3 mb-4">

                                        <div class="w-10 h-10 rounded-xl
                                            bg-blue-50
                                            flex items-center justify-center">

                                            <svg class="w-5 h-5 text-[#003A8F]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M4 7h16M4 7a2 2 0 01-2-2m2 2v10a2 2 0 002 2h12a2 2 0 002-2V7m-16 0a2 2 0 002-2h12a2 2 0 002 2" />

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M8 13h3" />

                                            </svg>

                                        </div>

                                        <div>

                                            <h4 class="font-bold text-gray-800
                                                text-sm">

                                                Sumber Dana

                                            </h4>

                                            <p class="text-xs text-gray-400">
                                                Opsional
                                            </p>

                                        </div>

                                    </div>


                                    <select name="funding_source"
                                        class="select-field w-full
                                        rounded-xl px-4 py-3
                                        text-sm text-gray-700">

                                        <option value="">
                                            -- Tidak dipilih --
                                        </option>

                                        @foreach ($funding as $fun)

                                            <option
                                                value="{{ $fun->id }}"
                                                {{ old('funding_source') == $fun->id ? 'selected' : '' }}>

                                                {{ $fun->funding_source_name }}

                                                @if($fun->sub_category)
                                                    → {{ $fun->sub_category }}
                                                @endif

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- DESKRIPSI --}}
                        {{-- ================================================= --}}

                        <div class="form-section rounded-2xl p-5 md:p-6">

                            <div class="flex items-center gap-3 mb-4">

                                <div class="w-10 h-10 rounded-xl
                                    bg-blue-50
                                    flex items-center justify-center">

                                    <svg class="w-5 h-5 text-[#003A8F]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M6 3h8l4 4v14H6V3z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M9 13h6M9 17h6M13 3v5h5" />

                                    </svg>

                                </div>

                                <div>

                                    <label for="deskripsi"
                                        class="block text-gray-800 font-bold">

                                        Deskripsi

                                    </label>

                                    <p class="text-xs text-gray-500 mt-0.5">

                                        Jelaskan isi atau cakupan kategori.

                                    </p>

                                </div>

                            </div>


                            <textarea name="deskripsi"
                                id="deskripsi"
                                rows="5"
                                class="input-field w-full
                                rounded-xl px-5 py-4
                                text-gray-800
                                placeholder-gray-400
                                resize-none"
                                placeholder="Contoh: Kategori untuk menyimpan dokumen surat masuk dari instansi eksternal.">{{ old('deskripsi') }}</textarea>

                        </div>


                        {{-- ================================================= --}}
                        {{-- URL ICON --}}
                        {{-- ================================================= --}}

                        <div class="form-section rounded-2xl p-5 md:p-6">

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-10 h-10 rounded-xl
                                    bg-blue-50
                                    flex items-center justify-center">

                                    <svg class="w-5 h-5 text-[#0066CC]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M8 15l2.5-3 2 2 1.5-2 2 3M8 8h.01" />

                                    </svg>

                                </div>

                                <div>

                                    <label for="url"
                                        class="block text-gray-800 font-bold">

                                        URL Icon

                                    </label>

                                    <p class="text-xs text-gray-500 mt-0.5">

                                        Opsional — gunakan URL PNG dari Icons8.

                                    </p>

                                </div>

                            </div>


                            {{-- GUIDE --}}

                            <div class="guide-box rounded-2xl p-5 mb-5">

                                <div class="flex items-start gap-3">

                                    <div class="w-10 h-10 rounded-xl
                                        bg-blue-100
                                        flex items-center justify-center
                                        shrink-0">

                                        <svg class="w-5 h-5 text-[#0066CC]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z" />

                                        </svg>

                                    </div>

                                    <div class="min-w-0">

                                        <h4 class="font-bold text-blue-900">

                                            Panduan URL Icon dari Icons8

                                        </h4>

                                        <ol class="mt-4 space-y-3">

                                            <li class="flex items-start gap-3">

                                                <span class="guide-number
                                                    w-6 h-6 rounded-full
                                                    text-white text-xs
                                                    font-bold
                                                    flex items-center
                                                    justify-center
                                                    shrink-0">

                                                    1

                                                </span>

                                                <p class="text-sm text-blue-900">

                                                    Buka
                                                    <a href="https://icons8.com"
                                                        target="_blank"
                                                        rel="noopener noreferrer"
                                                        class="font-bold underline
                                                        text-[#003A8F]
                                                        hover:text-[#0074D9]">

                                                        icons8.com

                                                    </a>
                                                    lalu cari icon yang
                                                    diinginkan.

                                                </p>

                                            </li>


                                            <li class="flex items-start gap-3">

                                                <span class="guide-number
                                                    w-6 h-6 rounded-full
                                                    text-white text-xs
                                                    font-bold
                                                    flex items-center
                                                    justify-center
                                                    shrink-0">

                                                    2

                                                </span>

                                                <p class="text-sm text-blue-900">

                                                    Buka detail icon dan salin
                                                    <strong>link to PNG</strong>.

                                                </p>

                                            </li>


                                            <li class="flex items-start gap-3">

                                                <span class="guide-number
                                                    w-6 h-6 rounded-full
                                                    text-white text-xs
                                                    font-bold
                                                    flex items-center
                                                    justify-center
                                                    shrink-0">

                                                    3

                                                </span>

                                                <p class="text-sm text-blue-900">

                                                    Jika diperlukan, ubah
                                                    parameter warna menjadi:

                                                    <code class="bg-white
                                                        border border-blue-200
                                                        px-2 py-1 rounded-lg
                                                        text-xs font-semibold">

                                                        color=ffffff

                                                    </code>

                                                </p>

                                            </li>


                                            <li class="flex items-start gap-3">

                                                <span class="guide-number
                                                    w-6 h-6 rounded-full
                                                    text-white text-xs
                                                    font-bold
                                                    flex items-center
                                                    justify-center
                                                    shrink-0">

                                                    4

                                                </span>

                                                <p class="text-sm text-blue-900">

                                                    Ukuran icon dapat diatur
                                                    melalui parameter
                                                    <code class="bg-white
                                                        border border-blue-200
                                                        px-2 py-1 rounded-lg
                                                        text-xs font-semibold">

                                                        size=100

                                                    </code>

                                                </p>

                                            </li>

                                        </ol>

                                    </div>

                                </div>


                                <div class="mt-5 pt-4
                                    border-t border-blue-200">

                                    <p class="text-xs font-bold
                                        text-blue-900 mb-2">

                                        Contoh URL:

                                    </p>

                                    <div class="bg-white rounded-xl
                                        border border-blue-200
                                        p-3 shadow-sm">

                                        <code class="text-xs text-gray-600
                                            break-all">

                                            https://img.icons8.com/?size=100&id=2HU1G5leSjOg&format=png&color=ffffff

                                        </code>

                                    </div>

                                </div>

                            </div>


                            {{-- URL INPUT --}}

                            <div>

                                <input type="text"
                                    name="url"
                                    id="url"
                                    value="{{ old('url') }}"
                                    class="input-field w-full
                                    rounded-xl px-5 py-3.5
                                    text-gray-800
                                    placeholder-gray-400"
                                    placeholder="https://img.icons8.com/?size=100&id=...&format=png&color=ffffff">

                                <div class="flex items-center gap-2 mt-2">

                                    <svg class="w-4 h-4 text-amber-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 9v3m0 4h.01M10.3 3.8l-7 12A2 2 0 005 19h14a2 2 0 001.7-3.2l-7-12a2 2 0 00-3.4 0z" />

                                    </svg>

                                    <p class="text-xs text-gray-500">

                                        Kosongkan jika tidak ingin menggunakan
                                        icon.

                                    </p>

                                </div>

                            </div>

                        </div>


                    </div>


                    {{-- ================================================= --}}
                    {{-- ACTION --}}
                    {{-- ================================================= --}}

                    <div class="flex flex-col-reverse sm:flex-row
                        sm:items-center sm:justify-end
                        gap-3 mt-8 pt-6
                        border-t border-gray-200">


                        {{-- BATAL --}}

                        <a href="{{ route('category.index', ['id_cabinet' => $cabinet->id]) }}"
                            class="inline-flex items-center
                            justify-center gap-2
                            px-5 py-3
                            rounded-xl
                            border border-gray-300
                            bg-white
                            text-gray-700
                            font-semibold text-sm
                            hover:bg-gray-50
                            hover:border-gray-400
                            transition-all duration-200">

                            <svg class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />

                            </svg>

                            Batal

                        </a>


                        {{-- SUBMIT --}}

                        <button type="submit"
                            class="submit-button
                            inline-flex items-center
                            justify-center gap-2
                            px-6 py-3
                            rounded-xl
                            text-white
                            font-bold text-sm">

                            <svg class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4" />

                            </svg>

                            Buat Kategori

                        </button>

                    </div>

                </form>

            </div>


            {{-- ========================================================= --}}
            {{-- INFO CARDS --}}
            {{-- ========================================================= --}}

            <div class="grid grid-cols-1 md:grid-cols-3
                gap-5 mt-6">


                {{-- CARD 1 --}}

                <div class="info-card rounded-2xl p-5">

                    <div class="flex items-start gap-3">

                        <div class="w-10 h-10 rounded-xl
                            bg-blue-50
                            flex items-center justify-center
                            shrink-0">

                            <svg class="w-5 h-5 text-[#003A8F]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M4 7.5A2.5 2.5 0 016.5 5H10l2 2h7.5A2.5 2.5 0 0122 9.5v8A2.5 2.5 0 0119.5 20h-13A2.5 2.5 0 014 17.5v-10z" />

                            </svg>

                        </div>

                        <div>

                            <h4 class="font-bold text-gray-800 text-sm">
                                Kategori Spesifik
                            </h4>

                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                Gunakan nama kategori yang jelas agar dokumen
                                mudah diklasifikasikan.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- CARD 2 --}}

                <div class="info-card rounded-2xl p-5">

                    <div class="flex items-start gap-3">

                        <div class="w-10 h-10 rounded-xl
                            bg-blue-50
                            flex items-center justify-center
                            shrink-0">

                            <svg class="w-5 h-5 text-[#0066CC]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 3h8l4 4v14H6V3z" />

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M9 13h6M9 17h6M13 3v5h5" />

                            </svg>

                        </div>

                        <div>

                            <h4 class="font-bold text-gray-800 text-sm">
                                Deskripsi
                            </h4>

                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                Tambahkan keterangan supaya cakupan kategori
                                mudah dipahami.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- CARD 3 --}}

                <div class="info-card rounded-2xl p-5">

                    <div class="flex items-start gap-3">

                        <div class="w-10 h-10 rounded-xl
                            bg-blue-50
                            flex items-center justify-center
                            shrink-0">

                            <svg class="w-5 h-5 text-[#0074D9]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" />

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 15l2.5-3 2 2 1.5-2 2 3M8 8h.01" />

                            </svg>

                        </div>

                        <div>

                            <h4 class="font-bold text-gray-800 text-sm">
                                Icon Visual
                            </h4>

                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                Gunakan icon untuk membantu identifikasi
                                kategori secara visual.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
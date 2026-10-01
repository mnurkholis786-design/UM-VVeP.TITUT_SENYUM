<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Kategori Arsip') }}
        </h2>
    </x-slot>

    {{-- BACK BUTTON --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <form action="{{ route('category.index') }}" method="GET">
                <input type="hidden" name="id_cabinet" value="{{ $cabinet->id }}">

                <button type="submit"
                    class="group inline-flex items-center justify-center w-11 h-11
                    bg-white text-[#003A8F] rounded-full
                    border border-blue-100 shadow-md
                    hover:bg-[#003A8F] hover:text-white hover:shadow-xl
                    hover:-translate-x-1 active:scale-95
                    transition-all duration-200">

                    <svg class="w-5 h-5 transition-transform duration-200 group-hover:-translate-x-0.5"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    {{-- MAIN BACKGROUND --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/60 to-white py-6 sm:py-8">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- MAIN CARD --}}
            <div class="relative overflow-hidden rounded-3xl
                bg-white border border-blue-100
                shadow-[0_20px_60px_-15px_rgba(0,58,143,0.20)]">

                {{-- DECORATIVE TOP GLOW --}}
                <div class="absolute -top-24 -right-24 w-64 h-64
                    bg-blue-300/20 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="absolute -bottom-28 -left-28 w-72 h-72
                    bg-sky-300/15 rounded-full blur-3xl pointer-events-none">
                </div>

                {{-- HEADER --}}
                <div class="relative overflow-hidden
                    bg-gradient-to-br from-[#003A8F] via-[#0056B8] to-[#0074D9]
                    px-6 sm:px-8 py-7">

                    {{-- Decorative circles --}}
                    <div class="absolute -top-16 -right-10 w-44 h-44
                        rounded-full bg-white/10">
                    </div>

                    <div class="absolute -bottom-20 right-32 w-40 h-40
                        rounded-full bg-cyan-300/10">
                    </div>

                    <div class="absolute top-8 right-8 w-3 h-3
                        rounded-full bg-white/30">
                    </div>

                    <div class="absolute top-16 right-20 w-2 h-2
                        rounded-full bg-white/20">
                    </div>

                    <div class="relative z-10 flex items-center gap-4">

                        {{-- ICON --}}
                        <div class="flex-shrink-0 w-14 h-14 sm:w-16 sm:h-16
                            rounded-2xl
                            bg-white/15 backdrop-blur-md
                            border border-white/20
                            shadow-lg
                            flex items-center justify-center">

                            <svg class="w-8 h-8 sm:w-9 sm:h-9 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                                    m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />

                            </svg>
                        </div>

                        {{-- TITLE --}}
                        <div class="min-w-0">

                            <div class="flex items-center gap-2 mb-1">

                                <span class="inline-flex items-center
                                    px-2.5 py-1 rounded-full
                                    bg-white/15 border border-white/20
                                    text-[11px] font-semibold text-white
                                    uppercase tracking-wider">

                                    Input Arsip
                                </span>

                            </div>

                            <h3 class="text-xl sm:text-2xl font-bold text-white">
                                Edit Kategori Arsip
                            </h3>

                            <p class="text-blue-100 text-sm mt-1 truncate">
                                Mengubah kategori:
                                <span class="font-semibold text-white">
                                    {{ $category->category_name }}
                                </span>
                            </p>

                        </div>

                    </div>
                </div>

                {{-- FORM BODY --}}
                <div class="relative z-10 p-5 sm:p-8 lg:p-10">

                    <form action="{{ route('category.update', $category->id) }}"
                        method="POST"
                        class="space-y-8">

                        @csrf
                        @method('PUT')

                        {{-- ERROR VALIDATION --}}
                        @if ($errors->any())
                            <div class="rounded-2xl border border-red-200
                                bg-red-50 p-4">

                                <div class="flex items-start gap-3">

                                    <div class="flex-shrink-0 w-9 h-9
                                        rounded-xl bg-red-100
                                        flex items-center justify-center">

                                        <svg class="w-5 h-5 text-red-600"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">

                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-5a1 1 0 112 0v.01a1 1 0 01-2 0V13zm1-8a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />

                                        </svg>

                                    </div>

                                    <div>
                                        <p class="font-semibold text-red-800">
                                            Ada data yang perlu diperiksa
                                        </p>

                                        <ul class="mt-1 text-sm text-red-700 list-disc list-inside">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        @endif

                        {{-- NAMA KATEGORI --}}
                        <div class="group">

                            <label for="name"
                                class="flex items-center gap-2
                                text-gray-800 font-bold mb-3">

                                <span class="flex items-center justify-center
                                    w-9 h-9 rounded-xl
                                    bg-blue-50 text-[#0056B8]">

                                    <svg class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 20 20">

                                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7z
                                            M4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1z
                                            M2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />

                                    </svg>

                                </span>

                                <span>
                                    Nama Kategori Arsip
                                    <span class="text-red-500">*</span>
                                </span>

                            </label>

                            <div class="relative">

                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name', $category->category_name) }}"
                                    class="w-full px-5 py-3.5 pr-12
                                    rounded-2xl
                                    border-2 border-gray-200
                                    bg-gray-50
                                    text-gray-800 font-medium
                                    placeholder-gray-400
                                    shadow-sm
                                    hover:border-blue-200
                                    focus:bg-white
                                    focus:border-[#0056B8]
                                    focus:ring-4 focus:ring-blue-100
                                    transition-all duration-200"
                                    placeholder="Contoh: Dokumen Keuangan"
                                    required>

                                <div class="absolute inset-y-0 right-4
                                    flex items-center pointer-events-none">

                                    <svg class="w-5 h-5 text-gray-400
                                        transition-colors"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536
                                            m-2.036-5.036a2.5 2.5 0 113.536 3.536
                                            L6.5 21.036H3v-3.572L16.732 3.732z" />

                                    </svg>

                                </div>

                            </div>

                            <p class="mt-2 text-xs text-gray-500 flex items-center gap-1.5">

                                <svg class="w-4 h-4 text-blue-500"
                                    fill="currentColor"
                                    viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0z
                                        M9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />

                                </svg>

                                Masukkan nama kategori yang jelas dan deskriptif.

                            </p>

                        </div>

                        {{-- JENIS KATEGORI --}}
                        <div>

                            <div class="flex items-center gap-3 mb-3">

                                <div class="flex items-center justify-center
                                    w-9 h-9 rounded-xl
                                    bg-blue-50 text-[#0056B8]">

                                    <svg class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 20 20">

                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1
                                            zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1
                                            zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1
                                            zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />

                                    </svg>

                                </div>

                                <div>
                                    <h3 class="font-bold text-gray-800">
                                        Jenis Kategori
                                    </h3>

                                    <p class="text-xs text-gray-500">
                                        Tentukan sumber kategori arsip.
                                    </p>
                                </div>

                            </div>

                            {{-- INFO BOX --}}
                            <div class="mb-5 rounded-2xl
                                bg-gradient-to-r from-blue-50 to-sky-50
                                border border-blue-200
                                p-4">

                                <div class="flex items-start gap-3">

                                    <div class="flex-shrink-0 w-9 h-9
                                        rounded-xl bg-blue-100
                                        flex items-center justify-center">

                                        <svg class="w-5 h-5 text-[#0056B8]"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">

                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0z
                                                M9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd" />

                                        </svg>

                                    </div>

                                    <p class="text-sm text-blue-800 leading-relaxed">

                                        <strong>Pilih salah satu</strong> jenis kategori atau
                                        <strong>kosongkan keduanya</strong> jika kategori ini
                                        akan memiliki sub-kategori.

                                    </p>

                                </div>

                            </div>

                            {{-- SELECTION GRID --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                {{-- PAYMENT METHOD --}}
                                <div class="group rounded-2xl
                                    border border-gray-200
                                    bg-white p-5
                                    shadow-sm
                                    hover:border-blue-300
                                    hover:shadow-lg
                                    transition-all duration-200">

                                    <div class="flex items-center gap-3 mb-4">

                                        <div class="w-10 h-10 rounded-xl
                                            bg-blue-50
                                            flex items-center justify-center">

                                            <svg class="w-5 h-5 text-[#0056B8]"
                                                fill="currentColor"
                                                viewBox="0 0 20 20">

                                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />

                                                <path fill-rule="evenodd"
                                                    d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9
                                                    M4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                                    clip-rule="evenodd" />

                                            </svg>

                                        </div>

                                        <div>
                                            <h4 class="font-bold text-gray-800 text-sm">
                                                Metode Pembayaran
                                            </h4>

                                            <p class="text-xs text-gray-500">
                                                Pilih metode pembayaran.
                                            </p>
                                        </div>

                                    </div>

                                    <select name="payment_method"
                                        class="w-full px-4 py-3
                                        text-sm
                                        border-2 border-gray-200
                                        rounded-xl
                                        bg-gray-50
                                        focus:bg-white
                                        focus:border-[#0056B8]
                                        focus:ring-4 focus:ring-blue-100
                                        transition-all">

                                        <option value="">
                                            -- Kosongkan jika tidak dipilih --
                                        </option>

                                        @foreach ($payment as $pay)

                                            <option value="{{ $pay->id }}"
                                                {{ old('payment_method', $category->payment_method_id) == $pay->id ? 'selected' : '' }}>

                                                {{ $pay->payment_method_name }}
                                                {{ $pay->sub_category ? ' → ' . $pay->sub_category : '' }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- FUNDING SOURCE --}}
                                <div class="group rounded-2xl
                                    border border-gray-200
                                    bg-white p-5
                                    shadow-sm
                                    hover:border-sky-300
                                    hover:shadow-lg
                                    transition-all duration-200">

                                    <div class="flex items-center gap-3 mb-4">

                                        <div class="w-10 h-10 rounded-xl
                                            bg-sky-50
                                            flex items-center justify-center">

                                            <svg class="w-5 h-5 text-[#0074D9]"
                                                fill="currentColor"
                                                viewBox="0 0 20 20">

                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd" />

                                            </svg>

                                        </div>

                                        <div>
                                            <h4 class="font-bold text-gray-800 text-sm">
                                                Sumber Dana
                                            </h4>

                                            <p class="text-xs text-gray-500">
                                                Pilih sumber dana.
                                            </p>
                                        </div>

                                    </div>

                                    <select name="funding_source"
                                        class="w-full px-4 py-3
                                        text-sm
                                        border-2 border-gray-200
                                        rounded-xl
                                        bg-gray-50
                                        focus:bg-white
                                        focus:border-[#0074D9]
                                        focus:ring-4 focus:ring-sky-100
                                        transition-all">

                                        <option value="">
                                            -- Kosongkan jika tidak dipilih --
                                        </option>

                                        @foreach ($funding as $fun)

                                            <option value="{{ $fun->id }}"
                                                {{ old('funding_source', $category->funding_source_id) == $fun->id ? 'selected' : '' }}>

                                                {{ $fun->funding_source_name }}
                                                {{ $fun->sub_category ? ' → ' . $fun->sub_category : '' }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                        {{-- URL ICON --}}
                        <div>

                            <div class="flex items-center gap-3 mb-3">

                                <div class="w-9 h-9 rounded-xl
                                    bg-blue-50
                                    flex items-center justify-center">

                                    <svg class="w-5 h-5 text-[#0056B8]"
                                        fill="currentColor"
                                        viewBox="0 0 20 20">

                                        <path fill-rule="evenodd"
                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                            clip-rule="evenodd" />

                                    </svg>

                                </div>

                                <div>
                                    <h3 class="font-bold text-gray-800">
                                        URL Icon
                                        <span class="text-red-500">*</span>
                                    </h3>

                                    <p class="text-xs text-gray-500">
                                        Atur icon yang digunakan untuk kategori.
                                    </p>
                                </div>

                            </div>

                            {{-- INSTRUCTION CARD --}}
                            <div class="mb-5 rounded-2xl
                                bg-gradient-to-br from-blue-50 via-sky-50 to-white
                                border border-blue-200
                                p-5 shadow-sm">

                                <div class="flex items-start gap-3">

                                    <div class="flex-shrink-0 w-10 h-10
                                        rounded-xl bg-blue-100
                                        flex items-center justify-center">

                                        <svg class="w-5 h-5 text-[#0056B8]"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">

                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0z
                                                M9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd" />

                                        </svg>

                                    </div>

                                    <div class="min-w-0">

                                        <h5 class="font-bold text-[#003A8F] mb-3">
                                            Panduan Memasukkan URL Icon dari Icons8
                                        </h5>

                                        <ol class="text-sm text-blue-800 space-y-3">

                                            <li class="flex items-start gap-3">

                                                <span class="flex-shrink-0
                                                    inline-flex items-center justify-center
                                                    w-6 h-6 rounded-full
                                                    bg-[#0056B8]
                                                    text-white text-xs font-bold">
                                                    1
                                                </span>

                                                <div>
                                                    Buka situs
                                                    <a href="https://icons8.com"
                                                        target="_blank"
                                                        rel="noopener noreferrer"
                                                        class="font-bold text-[#0056B8] hover:text-[#003A8F] underline">
                                                        icons8.com
                                                    </a>
                                                    dan cari icon yang diinginkan.
                                                </div>

                                            </li>

                                            <li class="flex items-start gap-3">

                                                <span class="flex-shrink-0
                                                    inline-flex items-center justify-center
                                                    w-6 h-6 rounded-full
                                                    bg-[#0056B8]
                                                    text-white text-xs font-bold">
                                                    2
                                                </span>

                                                <span>
                                                    Buka halaman detail icon lalu pilih
                                                    <strong>Copy link to PNG</strong>.
                                                </span>

                                            </li>

                                            <li class="flex items-start gap-3">

                                                <span class="flex-shrink-0
                                                    inline-flex items-center justify-center
                                                    w-6 h-6 rounded-full
                                                    bg-[#0056B8]
                                                    text-white text-xs font-bold">
                                                    3
                                                </span>

                                                <span>
                                                    Gunakan warna putih:
                                                    <code class="px-2 py-1 rounded-lg
                                                        bg-blue-100 text-[#003A8F] text-xs font-semibold">
                                                        color=ffffff
                                                    </code>
                                                </span>

                                            </li>

                                            <li class="flex items-start gap-3">

                                                <span class="flex-shrink-0
                                                    inline-flex items-center justify-center
                                                    w-6 h-6 rounded-full
                                                    bg-[#0056B8]
                                                    text-white text-xs font-bold">
                                                    4
                                                </span>

                                                <span>
                                                    Gunakan ukuran:
                                                    <code class="px-2 py-1 rounded-lg
                                                        bg-blue-100 text-[#003A8F] text-xs font-semibold">
                                                        size=100
                                                    </code>
                                                </span>

                                            </li>

                                        </ol>

                                    </div>

                                </div>

                            </div>

                            {{-- CURRENT ICON --}}
                            @if ($category->url_icon)

                                <div class="mb-5 rounded-2xl
                                    border border-blue-100
                                    bg-slate-50
                                    p-5">

                                    <div class="flex items-center justify-between mb-3">

                                        <p class="text-sm font-bold text-gray-700">
                                            Icon Saat Ini
                                        </p>

                                        <span class="px-2.5 py-1 rounded-full
                                            bg-blue-100 text-[#0056B8]
                                            text-xs font-semibold">
                                            Preview
                                        </span>

                                    </div>

                                    <div class="flex items-center gap-4">

                                        <div class="w-20 h-20 rounded-2xl
                                            bg-gradient-to-br from-[#003A8F] to-[#0074D9]
                                            flex items-center justify-center
                                            shadow-lg">

                                            <img src="{{ $category->url_icon }}"
                                                alt="Current Icon"
                                                class="w-12 h-12 object-contain">

                                        </div>

                                        <div>
                                            <p class="text-sm text-gray-600">
                                                Icon yang sedang digunakan.
                                            </p>

                                            <p class="text-xs text-gray-400 mt-1">
                                                Kosongkan URL jika ingin menghapus icon.
                                            </p>
                                        </div>

                                    </div>

                                </div>

                            @endif

                            {{-- URL INPUT --}}
                            <div class="relative">

                                <input type="text"
                                    name="url"
                                    id="url"
                                    value="{{ old('url', $category->url_icon) }}"
                                    class="w-full px-5 py-3.5 pl-12
                                    border-2 border-gray-200
                                    rounded-2xl
                                    bg-gray-50
                                    focus:bg-white
                                    focus:ring-4 focus:ring-blue-100
                                    focus:border-[#0056B8]
                                    transition-all duration-200"
                                    placeholder="https://img.icons8.com/?size=100&id=...&format=png&color=ffffff">

                                <svg class="absolute left-4 top-1/2
                                    -translate-y-1/2 w-5 h-5
                                    text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                        d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0
                                        1 1 0 00-1.414 1.414
                                        4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5
                                        a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0
                                        1 1 0 101.414-1.414
                                        4 4 0 00-5.656 0l-3 3a4 4 0 104.656 5.656l1.5-1.5
                                        a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 112.828-2.828l3-3z"
                                        clip-rule="evenodd" />

                                </svg>

                            </div>

                            @error('url')
                                <p class="mt-2 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-xs text-gray-500 flex items-center gap-1.5">

                                <svg class="w-4 h-4 text-blue-500"
                                    fill="currentColor"
                                    viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0z
                                        m-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />

                                </svg>

                                Format:
                                <span class="font-mono">
                                    https://img.icons8.com/?size=100&id=xxx&format=png&color=ffffff
                                </span>

                            </p>

                        </div>

                        {{-- FOOTER --}}
                        <div class="pt-7 border-t border-gray-100">

                            <div class="flex flex-col sm:flex-row
                                items-stretch sm:items-center
                                justify-between gap-4">

                                {{-- WARNING --}}
                                <div class="flex items-start gap-3">

                                    <div class="w-9 h-9 flex-shrink-0
                                        rounded-xl bg-blue-50
                                        flex items-center justify-center">

                                        <svg class="w-5 h-5 text-[#0056B8]"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">

                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 102 0v.01a1 1 0 00-2 0V14zm1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />

                                        </svg>

                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">
                                            Perubahan akan disimpan
                                        </p>

                                        <p class="text-xs text-gray-500 mt-0.5">
                                            Pastikan data sudah benar sebelum melakukan update.
                                        </p>
                                    </div>

                                </div>

                                {{-- BUTTONS --}}
                                <div class="flex flex-col sm:flex-row gap-3
                                    w-full sm:w-auto">

                                    {{-- UPDATE --}}
                                    <button type="submit"
                                        class="group flex-1 sm:flex-none
                                        inline-flex items-center justify-center gap-2
                                        px-8 py-3.5
                                        rounded-2xl
                                        bg-gradient-to-r
                                        from-[#003A8F] to-[#0074D9]
                                        hover:from-[#002766] hover:to-[#0056B8]
                                        text-white font-bold
                                        shadow-lg shadow-blue-900/20
                                        hover:shadow-xl hover:shadow-blue-900/30
                                        hover:-translate-y-1
                                        active:translate-y-0
                                        transition-all duration-200">

                                        <svg class="w-5 h-5
                                            group-hover:rotate-6
                                            transition-transform duration-200"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 13l4 4L19 7" />

                                        </svg>

                                        Update

                                    </button>

                                    {{-- CANCEL --}}
                                    <a href="{{ route('cabinet.show', $cabinet->id) }}"
                                        class="flex-1 sm:flex-none
                                        inline-flex items-center justify-center gap-2
                                        px-7 py-3.5
                                        rounded-2xl
                                        bg-gray-100
                                        hover:bg-gray-200
                                        text-gray-700 font-bold
                                        border border-gray-200
                                        shadow-sm hover:shadow-md
                                        hover:-translate-y-0.5
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

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            {{-- WARNING CARD --}}
            <div class="mt-6 rounded-3xl
                border border-amber-200
                bg-gradient-to-r from-amber-50 to-orange-50
                p-5 sm:p-6
                shadow-lg shadow-amber-900/5">

                <div class="flex items-start gap-4">

                    <div class="flex-shrink-0 w-11 h-11
                        rounded-2xl bg-amber-100
                        flex items-center justify-center">

                        <svg class="w-6 h-6 text-amber-600"
                            fill="currentColor"
                            viewBox="0 0 20 20">

                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92
                                c.75 1.334-.213 2.98-1.742 2.98H4.42
                                c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92z
                                M11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8
                                a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />

                        </svg>

                    </div>

                    <div>

                        <h4 class="font-bold text-amber-900 mb-1">
                            Perhatian Penting
                        </h4>

                        <p class="text-sm text-amber-800 leading-relaxed">
                            Mengubah <strong>Nama Kategori</strong> akan mempengaruhi
                            <strong>semua sub-kategori dan tahun</strong> yang terkait
                            dengan kategori ini di cabinet yang sama.
                            Pastikan Anda yakin sebelum menyimpan perubahan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
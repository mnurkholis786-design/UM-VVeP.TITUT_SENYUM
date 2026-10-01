<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl
                bg-gradient-to-br from-blue-600 to-indigo-700
                flex items-center justify-center shadow-lg">

                <svg class="w-5 h-5 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </div>

            <div>

                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Input Arsip') }}
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Tambahkan rak penyimpanan arsip
                </p>

            </div>

        </div>
    </x-slot>


    <div class="min-h-screen
        bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/60
        py-8">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- BACK --}}
            <div class="mb-6">

                <a href="{{ route('year.show', $category->id) }}"
                    class="group inline-flex items-center gap-2
                    px-4 py-2.5
                    bg-white/90 backdrop-blur
                    text-gray-700
                    border border-gray-200
                    rounded-xl
                    shadow-sm hover:shadow-md
                    hover:-translate-x-1
                    transition-all duration-200">

                    <svg class="w-5 h-5
                        group-hover:-translate-x-0.5 transition-transform"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"/>

                    </svg>

                    <span class="text-sm font-semibold">
                        Kembali
                    </span>

                </a>

            </div>


            {{-- MAIN CARD --}}
            <div class="bg-white/95 backdrop-blur
                rounded-3xl
                shadow-2xl
                border border-white/80
                overflow-hidden">


                {{-- HERO --}}
                <div class="relative overflow-hidden">

                    <div class="absolute inset-0
                        bg-gradient-to-br
                        from-blue-700
                        via-blue-800
                        to-indigo-900">
                    </div>

                    <div class="absolute -top-24 -right-24
                        w-72 h-72
                        bg-blue-400/20
                        rounded-full
                        blur-3xl">
                    </div>

                    <div class="absolute -bottom-28 -left-20
                        w-72 h-72
                        bg-indigo-400/20
                        rounded-full
                        blur-3xl">
                    </div>


                    <div class="relative
                        px-6 sm:px-10
                        py-8">

                        <div class="flex items-center gap-5">


                            {{-- ICON --}}
                            <div class="w-16 h-16 rounded-2xl
                                bg-white/15 backdrop-blur-md
                                border border-white/20
                                flex items-center justify-center
                                shadow-xl">

                                <svg class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>

                                </svg>

                            </div>


                            <div>

                                <span class="inline-flex items-center gap-2
                                    px-3 py-1
                                    rounded-full
                                    bg-white/15
                                    border border-white/20
                                    text-white
                                    text-xs font-semibold
                                    mb-2">

                                    <span class="w-1.5 h-1.5
                                        bg-emerald-300
                                        rounded-full">
                                    </span>

                                    Penyimpanan Arsip
                                </span>


                                <h1 class="text-2xl sm:text-3xl
                                    font-bold text-white">

                                    Tambah Rak Arsip Baru

                                </h1>


                                <p class="text-sm text-blue-100 mt-1">

                                    Tentukan lokasi penyimpanan untuk arsip

                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <div class="p-6 sm:p-10">


                    <form action="{{ route('rack.store') }}"
                        method="POST"
                        class="space-y-8">

                        @csrf


                        {{-- CATEGORY / YEAR ID --}}
                        <input type="hidden"
                            value="{{ $category->id }}"
                            name="year_id">


                        {{-- INFO CATEGORY --}}
                        <div class="p-5 rounded-2xl
                            bg-blue-50/70
                            border border-blue-100">

                            <div class="flex items-start gap-4">

                                <div class="w-11 h-11 rounded-xl
                                    bg-blue-100
                                    text-blue-700
                                    flex items-center justify-center
                                    shrink-0">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z"/>

                                    </svg>

                                </div>


                                <div>

                                    <p class="text-sm font-bold text-blue-800">
                                        Lokasi Kategori Arsip
                                    </p>

                                    <p class="text-sm text-blue-700 mt-1">
                                        Rak yang dibuat akan ditempatkan pada
                                        kategori arsip yang sedang dipilih.
                                    </p>

                                    <div class="mt-3 inline-flex items-center gap-2
                                        px-3 py-1.5
                                        rounded-lg
                                        bg-white
                                        border border-blue-100
                                        text-xs font-semibold
                                        text-blue-700">

                                        Kategori ID:
                                        <span class="font-bold">
                                            {{ $category->id }}
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- FORM FIELD --}}
                        <div>

                            <label for="name"
                                class="block text-sm font-bold
                                text-gray-700 mb-3">

                                <span class="inline-flex items-center gap-2">

                                    <span class="w-8 h-8 rounded-lg
                                        bg-indigo-100
                                        text-indigo-600
                                        flex items-center justify-center">

                                        <svg class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>

                                        </svg>

                                    </span>

                                    Nama Rak Arsip

                                    <span class="text-red-500">*</span>

                                </span>

                            </label>


                            <input type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                class="w-full
                                rounded-xl
                                border border-gray-200
                                bg-gray-50
                                px-4 py-3.5
                                text-gray-800
                                placeholder-gray-400
                                shadow-sm
                                focus:bg-white
                                focus:border-blue-500
                                focus:ring-4
                                focus:ring-blue-100
                                transition-all duration-200"
                                placeholder="Contoh: Rak 1"
                                required>


                            <p class="text-xs text-gray-500 mt-2">
                                Masukkan nama rak beserta nomor rak,
                                misalnya <strong>Rak 1</strong>,
                                <strong>Rak 2</strong>, dan seterusnya.
                            </p>


                            @error('name')
                                <p class="text-red-500 text-xs mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- =================================================
                            FIELD LAMA DISEDIAKAN TAPI TETAP NONAKTIF
                        ================================================== --}}

                        {{--
                        <div>
                            <label for="kode_rack"
                                class="block text-sm font-medium text-gray-700 mb-2">
                                Kode Rak Arsip
                            </label>

                            <input type="text"
                                name="kode_rack"
                                id="kode_rack"
                                class="w-full rounded-xl border-gray-300
                                focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan kode rak"
                                required>
                        </div>

                        <div>
                            <label for="keterangan"
                                class="block text-sm font-medium text-gray-700 mb-2">
                                Keterangan
                            </label>

                            <input type="text"
                                name="keterangan"
                                id="keterangan"
                                class="w-full rounded-xl border-gray-300
                                focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan keterangan"
                                required>
                        </div>
                        --}}


                        {{-- DIVIDER --}}
                        <div class="border-t border-gray-100"></div>


                        {{-- ACTION --}}
                        <div class="flex flex-col sm:flex-row
                            items-center
                            justify-between
                            gap-5">


                            {{-- INFO --}}
                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9 rounded-xl
                                    bg-emerald-100
                                    text-emerald-600
                                    flex items-center justify-center
                                    shrink-0">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"/>

                                    </svg>

                                </div>


                                <div>

                                    <p class="text-sm font-semibold
                                        text-gray-700">

                                        Nama rak wajib diisi

                                    </p>

                                    <p class="text-xs text-gray-500 mt-0.5">

                                        Pastikan nama rak mudah dikenali.

                                    </p>

                                </div>

                            </div>


                            {{-- BUTTONS --}}
                            <div class="flex flex-col sm:flex-row
                                gap-3
                                w-full sm:w-auto">


                                {{-- BATAL --}}
                                <a href="{{ route('year.show', $category->id) }}"
                                    class="inline-flex justify-center
                                    items-center gap-2
                                    px-6 py-3
                                    rounded-xl
                                    bg-gray-100
                                    hover:bg-gray-200
                                    text-gray-700
                                    font-semibold
                                    border border-gray-200
                                    transition-all duration-200">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"/>

                                    </svg>

                                    Batal

                                </a>


                                {{-- SIMPAN --}}
                                <button type="submit"
                                    class="inline-flex justify-center
                                    items-center gap-2
                                    px-7 py-3
                                    rounded-xl
                                    text-white
                                    font-bold
                                    bg-gradient-to-r
                                    from-blue-600
                                    to-indigo-700
                                    hover:from-blue-700
                                    hover:to-indigo-800
                                    shadow-lg
                                    hover:shadow-xl
                                    hover:-translate-y-0.5
                                    active:translate-y-0
                                    transition-all duration-200">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"/>

                                    </svg>

                                    Simpan Rak

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center
                rounded-xl bg-gradient-to-br from-[#003A8F] to-[#00AEEF]
                shadow-lg shadow-blue-200">

                <svg class="h-5 w-5 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                </svg>

            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Tambahkan Kabinet') }}
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola kabinet untuk pengorganisasian arsip
                </p>
            </div>

        </div>
    </x-slot>


    {{-- BACK BUTTON --}}
    <div class="bg-white border-b border-gray-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

            <a href="{{ route('cabinet.index') }}"
                class="group inline-flex items-center gap-2
                px-4 py-2.5
                bg-white text-[#003A8F]
                rounded-xl
                border border-blue-100
                shadow-sm
                hover:shadow-md
                hover:border-blue-300
                hover:bg-blue-50
                transition-all duration-200">

                <svg class="w-5 h-5 transition-transform duration-200
                    group-hover:-translate-x-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                </svg>

                <span class="text-sm font-semibold">
                    Kembali
                </span>

            </a>

        </div>

    </div>


    {{-- MAIN CONTENT --}}
    <div class="min-h-screen
        bg-gradient-to-br from-slate-50 via-blue-50/40 to-white
        py-8 sm:py-12">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- PAGE INTRO --}}
            <div class="mb-6">

                <div class="flex items-center gap-2 mb-2">

                    <span class="inline-flex items-center gap-1.5
                        px-3 py-1
                        rounded-full
                        bg-blue-100
                        text-[#003A8F]
                        text-xs font-bold
                        border border-blue-200">

                        <svg class="w-3.5 h-3.5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                        </svg>

                        MANAJEMEN ARSIP

                    </span>

                </div>


                <h1 class="text-2xl sm:text-3xl font-black text-gray-800">
                    Tambahkan Kabinet
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Buat kabinet baru untuk mengorganisir dan menyimpan arsip secara terstruktur.
                </p>

            </div>


            {{-- MAIN CARD --}}
            <div class="bg-white rounded-3xl
                border border-blue-100
                shadow-[0_20px_60px_-20px_rgba(0,58,143,0.20)]
                overflow-hidden">


                {{-- CARD HEADER --}}
                <div class="relative overflow-hidden
                    bg-gradient-to-br from-[#003A8F]
                    via-[#0066CC]
                    to-[#00AEEF]
                    px-6 sm:px-8 py-7">


                    {{-- DECORATIVE CIRCLES --}}
                    <div class="absolute -right-12 -top-16
                        w-52 h-52
                        rounded-full
                        bg-white/10">
                    </div>

                    <div class="absolute -right-2 -bottom-20
                        w-44 h-44
                        rounded-full
                        bg-white/10">
                    </div>

                    <div class="absolute left-1/2 -top-20
                        w-36 h-36
                        rounded-full
                        bg-white/5">
                    </div>


                    {{-- HEADER CONTENT --}}
                    <div class="relative flex items-center gap-4">


                        {{-- ICON --}}
                        <div class="flex-shrink-0
                            w-14 h-14
                            rounded-2xl
                            bg-white/15
                            border border-white/25
                            backdrop-blur-md
                            flex items-center justify-center
                            shadow-lg">

                            <svg class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 9h18" />

                            </svg>

                        </div>


                        {{-- TITLE --}}
                        <div>

                            <div class="flex items-center gap-2 mb-1">

                                <span class="text-[11px]
                                    uppercase
                                    tracking-wider
                                    font-bold
                                    text-blue-100">

                                    ARCHIVE CABINET

                                </span>

                                <span class="w-1.5 h-1.5
                                    rounded-full
                                    bg-cyan-300">
                                </span>

                                <span class="text-[11px]
                                    font-semibold
                                    text-blue-100">

                                    Data Baru

                                </span>

                            </div>


                            <h3 class="text-xl sm:text-2xl
                                font-black
                                text-white">

                                Buat Kabinet Baru

                            </h3>


                            <p class="text-sm
                                text-blue-100
                                mt-1">

                                Tambahkan kabinet arsip untuk mengorganisir dokumen.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <form action="{{ route('cabinet.store') }}"
                    method="POST"
                    class="p-6 sm:p-8 lg:p-10">

                    @csrf


                    <div class="space-y-7">


                        {{-- NAMA KABINET --}}
                        <div>

                            <label for="name"
                                class="flex items-center gap-2
                                text-sm font-bold
                                text-gray-700
                                mb-2.5">

                                <span class="flex h-8 w-8
                                    items-center justify-center
                                    rounded-xl
                                    bg-blue-50
                                    text-[#0066CC]">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                    </svg>

                                </span>

                                <span>
                                    Nama Kabinet
                                    <span class="text-red-500">*</span>
                                </span>

                            </label>


                            <div class="relative">

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    required
                                    class="w-full
                                    rounded-2xl
                                    border-2
                                    border-gray-200
                                    bg-gray-50/70
                                    px-5 py-4 pl-12
                                    text-gray-800
                                    font-medium
                                    placeholder-gray-400
                                    focus:bg-white
                                    focus:border-[#0066CC]
                                    focus:ring-4
                                    focus:ring-blue-100
                                    focus:outline-none
                                    transition-all duration-200
                                    @error('name')
                                        border-red-400
                                        bg-red-50
                                        focus:border-red-500
                                        focus:ring-red-100
                                    @enderror"
                                    placeholder="Contoh: Kabinet Keuangan 2024">


                                <svg class="absolute left-4 top-1/2
                                    -translate-y-1/2
                                    w-5 h-5
                                    text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                </svg>

                            </div>


                            @error('name')

                                <div class="flex items-center gap-2 mt-2
                                    text-sm text-red-600">

                                    <svg class="w-4 h-4 flex-shrink-0"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                    {{ $message }}

                                </div>

                            @else

                                <p class="mt-2 text-xs text-gray-500">
                                    Gunakan nama yang deskriptif dan mudah dikenali.
                                </p>

                            @enderror

                        </div>


                        {{-- KODE KABINET --}}
                        <div>

                            <label for="code"
                                class="flex items-center gap-2
                                text-sm font-bold
                                text-gray-700
                                mb-2.5">

                                <span class="flex h-8 w-8
                                    items-center justify-center
                                    rounded-xl
                                    bg-blue-50
                                    text-[#0066CC]">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />

                                    </svg>

                                </span>

                                <span>
                                    Kode Kabinet
                                    <span class="text-red-500">*</span>
                                </span>

                            </label>


                            <div class="relative">

                                <input
                                    type="text"
                                    name="code"
                                    id="code"
                                    value="{{ old('code') }}"
                                    required
                                    class="w-full
                                    rounded-2xl
                                    border-2
                                    border-gray-200
                                    bg-gray-50/70
                                    px-5 py-4 pl-12
                                    text-gray-800
                                    font-medium
                                    placeholder-gray-400
                                    uppercase
                                    focus:bg-white
                                    focus:border-[#0066CC]
                                    focus:ring-4
                                    focus:ring-blue-100
                                    focus:outline-none
                                    transition-all duration-200
                                    @error('code')
                                        border-red-400
                                        bg-red-50
                                        focus:border-red-500
                                        focus:ring-red-100
                                    @enderror"
                                    placeholder="Contoh: KAB-FIN-001">


                                <svg class="absolute left-4 top-1/2
                                    -translate-y-1/2
                                    w-5 h-5
                                    text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />

                                </svg>

                            </div>


                            @error('code')

                                <div class="flex items-center gap-2 mt-2
                                    text-sm text-red-600">

                                    <svg class="w-4 h-4 flex-shrink-0"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                    {{ $message }}

                                </div>

                            @else

                                {{-- CODE INFO --}}
                                <div class="mt-3 flex items-start gap-3
                                    p-4
                                    rounded-2xl
                                    border border-blue-200
                                    bg-gradient-to-r
                                    from-blue-50
                                    to-cyan-50">

                                    <div class="flex-shrink-0
                                        w-9 h-9
                                        rounded-xl
                                        bg-white
                                        text-[#0066CC]
                                        flex items-center justify-center
                                        shadow-sm">

                                        <svg class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 01-18 0z" />

                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-sm
                                            font-bold
                                            text-[#003A8F]">

                                            Kode Kabinet

                                        </p>

                                        <p class="text-xs
                                            text-blue-700
                                            mt-1
                                            leading-relaxed">

                                            Kode kabinet harus unik.
                                            Gunakan format yang konsisten,
                                            misalnya
                                            <strong>KATEGORI-DEPT-NOMOR</strong>.

                                        </p>

                                    </div>

                                </div>

                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}
                        <div>

                            <label for="deskripsi"
                                class="flex items-center gap-2
                                text-sm font-bold
                                text-gray-700
                                mb-2.5">

                                <span class="flex h-8 w-8
                                    items-center justify-center
                                    rounded-xl
                                    bg-blue-50
                                    text-[#0066CC]">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 5h16M4 12h16M4 19h10" />

                                    </svg>

                                </span>

                                <span>
                                    Deskripsi
                                    <span class="text-red-500">*</span>
                                </span>

                            </label>


                            <div class="relative">

                                <textarea
                                    name="deskripsi"
                                    id="deskripsi"
                                    rows="5"
                                    required
                                    class="w-full
                                    rounded-2xl
                                    border-2
                                    border-gray-200
                                    bg-gray-50/70
                                    px-5 py-4 pl-12
                                    text-gray-800
                                    font-medium
                                    placeholder-gray-400
                                    focus:bg-white
                                    focus:border-[#0066CC]
                                    focus:ring-4
                                    focus:ring-blue-100
                                    focus:outline-none
                                    transition-all duration-200
                                    resize-none
                                    @error('deskripsi')
                                        border-red-400
                                        bg-red-50
                                        focus:border-red-500
                                        focus:ring-red-100
                                    @enderror"
                                    placeholder="Jelaskan fungsi atau isi dari kabinet ini. Contoh: Kabinet untuk menyimpan dokumen keuangan, laporan tahunan, dan bukti transaksi tahun 2024">{{ old('deskripsi') }}</textarea>


                                <svg class="absolute left-4 top-4
                                    w-5 h-5
                                    text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 5h16M4 12h16M4 19h10" />

                                </svg>

                            </div>


                            @error('deskripsi')

                                <div class="flex items-center gap-2 mt-2
                                    text-sm text-red-600">

                                    <svg class="w-4 h-4 flex-shrink-0"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                    {{ $message }}

                                </div>

                            @else

                                <p class="mt-2 text-xs text-gray-500">
                                    Berikan deskripsi yang jelas mengenai isi,
                                    fungsi, atau tujuan kabinet.
                                </p>

                            @enderror

                        </div>

                    </div>


                    {{-- ACTION BUTTONS --}}
                    <div class="flex flex-col-reverse sm:flex-row
                        sm:items-center sm:justify-end
                        gap-3
                        mt-8 pt-6
                        border-t border-gray-100">


                        {{-- BATAL --}}
                        <a href="{{ route('cabinet.index') }}"
                            class="inline-flex items-center justify-center
                            gap-2
                            px-6 py-3.5
                            bg-gray-100
                            text-gray-700
                            rounded-2xl
                            font-bold
                            border border-gray-200
                            hover:bg-gray-200
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


                        {{-- BUAT KABINET --}}
                        <button type="submit"
                            class="group
                            inline-flex
                            items-center
                            justify-center
                            gap-2
                            px-7 py-3.5
                            bg-gradient-to-r
                            from-[#003A8F]
                            via-[#0066CC]
                            to-[#00AEEF]
                            text-white
                            rounded-2xl
                            font-bold
                            shadow-lg
                            shadow-blue-200
                            hover:shadow-xl
                            hover:-translate-y-0.5
                            active:translate-y-0
                            transition-all duration-200">

                            <svg class="w-5 h-5
                                transition-transform
                                duration-300
                                group-hover:rotate-90"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 5v14M5 12h14" />

                            </svg>

                            Buat Kabinet

                        </button>

                    </div>

                </form>

            </div>


            {{-- INFORMATION CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">


                {{-- CARD 1 --}}
                <div class="group
                    bg-white
                    p-5
                    rounded-2xl
                    border border-blue-100
                    shadow-md
                    hover:shadow-xl
                    hover:-translate-y-1
                    transition-all duration-300">

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0
                            w-11 h-11
                            rounded-xl
                            bg-blue-50
                            text-[#0066CC]
                            flex items-center justify-center
                            group-hover:bg-[#0066CC]
                            group-hover:text-white
                            transition-all duration-300">

                            <svg class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 01-18 0z" />

                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold
                                text-gray-800
                                text-sm
                                mb-1">

                                Penamaan Jelas

                            </h4>

                            <p class="text-xs
                                text-gray-500
                                leading-relaxed">

                                Gunakan nama yang mudah dipahami
                                dan mencerminkan isi kabinet.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- CARD 2 --}}
                <div class="group
                    bg-white
                    p-5
                    rounded-2xl
                    border border-blue-100
                    shadow-md
                    hover:shadow-xl
                    hover:-translate-y-1
                    transition-all duration-300">

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0
                            w-11 h-11
                            rounded-xl
                            bg-blue-50
                            text-[#0066CC]
                            flex items-center justify-center
                            group-hover:bg-[#0066CC]
                            group-hover:text-white
                            transition-all duration-300">

                            <svg class="w-5 h-5"
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

                            <h4 class="font-bold
                                text-gray-800
                                text-sm
                                mb-1">

                                Kode Unik

                            </h4>

                            <p class="text-xs
                                text-gray-500
                                leading-relaxed">

                                Pastikan kode kabinet berbeda
                                agar tidak terjadi duplikasi.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- CARD 3 --}}
                <div class="group
                    bg-white
                    p-5
                    rounded-2xl
                    border border-blue-100
                    shadow-md
                    hover:shadow-xl
                    hover:-translate-y-1
                    transition-all duration-300">

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0
                            w-11 h-11
                            rounded-xl
                            bg-blue-50
                            text-[#0066CC]
                            flex items-center justify-center
                            group-hover:bg-[#0066CC]
                            group-hover:text-white
                            transition-all duration-300">

                            <svg class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 5h16M4 12h16M4 19h10" />

                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold
                                text-gray-800
                                text-sm
                                mb-1">

                                Deskripsi Detail

                            </h4>

                            <p class="text-xs
                                text-gray-500
                                leading-relaxed">

                                Jelaskan fungsi dan isi kabinet
                                untuk memudahkan pencarian arsip.

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- EXAMPLE BOX --}}
            <div class="mt-6
                relative overflow-hidden
                bg-gradient-to-r
                from-blue-50
                via-cyan-50
                to-white
                border border-blue-200
                rounded-3xl
                p-6
                shadow-md">


                <div class="absolute
                    -right-10
                    -top-10
                    w-32 h-32
                    rounded-full
                    bg-blue-100/50">
                </div>


                <div class="relative flex items-start gap-4">


                    {{-- ICON --}}
                    <div class="flex-shrink-0
                        w-12 h-12
                        rounded-2xl
                        bg-white
                        text-[#0066CC]
                        flex items-center justify-center
                        shadow-sm
                        border border-blue-100">

                        <svg class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />

                        </svg>

                    </div>


                    {{-- CONTENT --}}
                    <div>

                        <h4 class="font-black
                            text-[#003A8F]
                            mb-3
                            text-lg">

                            Contoh Penamaan Kabinet

                        </h4>


                        <div class="space-y-2
                            text-sm
                            text-blue-800">


                            <div class="flex items-start gap-2">

                                <span class="mt-1.5
                                    inline-block
                                    w-2 h-2
                                    bg-[#0066CC]
                                    rounded-full
                                    flex-shrink-0">
                                </span>

                                <div>
                                    <strong>Nama:</strong>
                                    Kabinet Surat Masuk 2024
                                </div>

                            </div>


                            <div class="flex items-start gap-2">

                                <span class="mt-1.5
                                    inline-block
                                    w-2 h-2
                                    bg-[#0066CC]
                                    rounded-full
                                    flex-shrink-0">
                                </span>

                                <div>
                                    <strong>Kode:</strong>
                                    KAB-SM-2024
                                </div>

                            </div>


                            <div class="flex items-start gap-2">

                                <span class="mt-1.5
                                    inline-block
                                    w-2 h-2
                                    bg-[#0066CC]
                                    rounded-full
                                    flex-shrink-0">
                                </span>

                                <div>
                                    <strong>Deskripsi:</strong>
                                    Menyimpan seluruh dokumen surat masuk
                                    tahun 2024 dari berbagai instansi.
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
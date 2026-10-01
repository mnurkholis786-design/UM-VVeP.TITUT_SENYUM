<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#003A8F] to-[#00AEEF] shadow-lg shadow-blue-200">
                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Tambah Sumber Dana') }}
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Tambahkan sumber dana baru
                </p>
            </div>
        </div>
    </x-slot>


    {{-- BACK BUTTON --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

            <a href="{{ route('admin.envi') }}"
                class="group inline-flex items-center gap-2 px-4 py-2.5
                bg-white text-[#003A8F] rounded-xl
                border border-blue-100
                shadow-sm hover:shadow-md hover:border-blue-300
                hover:bg-blue-50
                transition-all duration-200">

                <svg class="w-5 h-5 transition-transform duration-200 group-hover:-translate-x-1"
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
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-white py-8 sm:py-12">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- PAGE INTRO --}}
            <div class="mb-6">

                <div class="flex items-center gap-2 mb-2">

                    <span class="inline-flex items-center gap-1.5 px-3 py-1
                        rounded-full bg-blue-100 text-[#003A8F]
                        text-xs font-bold border border-blue-200">

                        <svg class="w-3.5 h-3.5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>

                        PENGATURAN ENVIRONMENT

                    </span>

                </div>

                <h1 class="text-2xl sm:text-3xl font-black text-gray-800">
                    Tambah Sumber Dana
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Tambahkan data sumber dana baru ke dalam sistem.
                </p>

            </div>


            {{-- MAIN CARD --}}
            <div class="bg-white rounded-3xl border border-blue-100
                shadow-[0_20px_60px_-20px_rgba(0,58,143,0.20)]
                overflow-hidden">


                {{-- CARD HEADER --}}
                <div class="relative overflow-hidden
                    bg-gradient-to-br from-[#003A8F] via-[#0066CC] to-[#00AEEF]
                    px-6 sm:px-8 py-7">

                    {{-- Decorative circles --}}
                    <div class="absolute -right-10 -top-16 w-48 h-48
                        rounded-full bg-white/10">
                    </div>

                    <div class="absolute -right-2 -bottom-20 w-40 h-40
                        rounded-full bg-white/10">
                    </div>

                    <div class="absolute left-1/2 -top-20 w-32 h-32
                        rounded-full bg-white/5">
                    </div>


                    <div class="relative flex items-center gap-4">

                        {{-- Icon --}}
                        <div class="flex-shrink-0 w-14 h-14
                            rounded-2xl bg-white/15
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
                                    d="M12 4v16m8-8H4" />

                            </svg>

                        </div>


                        {{-- Title --}}
                        <div>

                            <div class="flex items-center gap-2 mb-1">

                                <span class="text-[11px] uppercase tracking-wider
                                    font-bold text-blue-100">
                                    Funding Source
                                </span>

                                <span class="w-1.5 h-1.5 rounded-full bg-cyan-300"></span>

                                <span class="text-[11px] font-semibold text-blue-100">
                                    Tambah Data
                                </span>

                            </div>

                            <h3 class="text-xl sm:text-2xl font-black text-white">
                                Tambah Sumber Dana
                            </h3>

                            <p class="text-sm text-blue-100 mt-1">
                                Masukkan informasi sumber dana yang akan digunakan.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <form action="{{ route('funding.store') }}"
                    method="POST"
                    class="p-6 sm:p-8 lg:p-10">

                    @csrf


                    {{-- FORM SECTION --}}
                    <div class="space-y-6">


                        {{-- Funding Source Name --}}
                        <div>

                            <label for="funding_source_name"
                                class="flex items-center gap-2 text-sm font-bold text-gray-700 mb-2">

                                <span class="flex h-7 w-7 items-center justify-center
                                    rounded-lg bg-blue-50 text-[#0066CC]">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 2a10 10 0 100 20 10 10 0 000-20zM12 6v6l4 2" />

                                    </svg>

                                </span>

                                <span>
                                    Nama Sumber Dana
                                    <span class="text-red-500">*</span>
                                </span>

                            </label>


                            <input
                                type="text"
                                name="funding_source_name"
                                id="funding_source_name"
                                value="{{ old('funding_source_name') }}"
                                required
                                class="w-full rounded-2xl border-2 border-gray-200
                                bg-gray-50/70 px-4 py-3.5
                                text-gray-800 font-medium
                                placeholder-gray-400
                                focus:bg-white
                                focus:border-[#0066CC]
                                focus:ring-4 focus:ring-blue-100
                                focus:outline-none
                                transition-all duration-200
                                @error('funding_source_name')
                                    border-red-400 bg-red-50
                                    focus:border-red-500 focus:ring-red-100
                                @enderror"
                                placeholder="Contoh: APBN">


                            @error('funding_source_name')

                                <div class="flex items-center gap-2 mt-2 text-sm text-red-600">

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

                            @enderror

                        </div>


                        {{-- Sub Category --}}
                        <div>

                            <label for="sub_category"
                                class="flex items-center gap-2 text-sm font-bold text-gray-700 mb-2">

                                <span class="flex h-7 w-7 items-center justify-center
                                    rounded-lg bg-blue-50 text-[#0066CC]">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h10" />

                                    </svg>

                                </span>

                                <span>
                                    Sub Kategori
                                </span>

                            </label>


                            <input
                                type="text"
                                name="sub_category"
                                id="sub_category"
                                value="{{ old('sub_category') }}"
                                class="w-full rounded-2xl border-2 border-gray-200
                                bg-gray-50/70 px-4 py-3.5
                                text-gray-800 font-medium
                                placeholder-gray-400
                                focus:bg-white
                                focus:border-[#0066CC]
                                focus:ring-4 focus:ring-blue-100
                                focus:outline-none
                                transition-all duration-200
                                @error('sub_category')
                                    border-red-400 bg-red-50
                                    focus:border-red-500 focus:ring-red-100
                                @enderror"
                                placeholder="Contoh: Operasional">


                            @error('sub_category')

                                <div class="flex items-center gap-2 mt-2 text-sm text-red-600">

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

                            @enderror

                        </div>


                        {{-- Description --}}
                        <div>

                            <label for="description"
                                class="flex items-center gap-2 text-sm font-bold text-gray-700 mb-2">

                                <span class="flex h-7 w-7 items-center justify-center
                                    rounded-lg bg-blue-50 text-[#0066CC]">

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
                                    Deskripsi / Keterangan
                                </span>

                            </label>


                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                class="w-full rounded-2xl border-2 border-gray-200
                                bg-gray-50/70 px-4 py-3.5
                                text-gray-800 font-medium
                                placeholder-gray-400
                                focus:bg-white
                                focus:border-[#0066CC]
                                focus:ring-4 focus:ring-blue-100
                                focus:outline-none
                                transition-all duration-200
                                resize-none
                                @error('description')
                                    border-red-400 bg-red-50
                                    focus:border-red-500 focus:ring-red-100
                                @enderror"
                                placeholder="Jelaskan detail atau keterangan sumber dana ini...">{{ old('description') }}</textarea>


                            @error('description')

                                <div class="flex items-center gap-2 mt-2 text-sm text-red-600">

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

                            @enderror

                        </div>


                        {{-- INFORMATION BOX --}}
                        <div class="relative overflow-hidden
                            rounded-2xl border border-blue-200
                            bg-gradient-to-r from-blue-50 to-cyan-50
                            p-5">

                            <div class="absolute -right-5 -top-5
                                w-20 h-20 rounded-full bg-blue-100/50">
                            </div>

                            <div class="relative flex items-start gap-3">

                                <div class="flex h-10 w-10 flex-shrink-0
                                    items-center justify-center rounded-xl
                                    bg-white text-[#0066CC]
                                    shadow-sm">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                </div>


                                <div>

                                    <p class="font-bold text-[#003A8F]">
                                        Informasi
                                    </p>

                                    <p class="text-sm text-blue-700 mt-1 leading-relaxed">
                                        Data sumber dana akan tersimpan setelah tombol
                                        <strong>Simpan</strong> ditekan.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ACTION BUTTONS --}}
                    <div class="flex flex-col-reverse sm:flex-row
                        sm:items-center sm:justify-end gap-3
                        mt-8 pt-6 border-t border-gray-100">

                        <a href="{{ route('admin.envi') }}"
                            class="inline-flex items-center justify-center gap-2
                            px-6 py-3.5
                            bg-gray-100 text-gray-700
                            rounded-2xl font-bold
                            border border-gray-200
                            hover:bg-gray-200 hover:-translate-y-0.5
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


                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2
                            px-7 py-3.5
                            bg-gradient-to-r from-[#003A8F] via-[#0066CC] to-[#00AEEF]
                            text-white rounded-2xl font-bold
                            shadow-lg shadow-blue-200
                            hover:shadow-xl hover:-translate-y-0.5
                            active:translate-y-0
                            transition-all duration-200">

                            <svg class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7" />

                            </svg>

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
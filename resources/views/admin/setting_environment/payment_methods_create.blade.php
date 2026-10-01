<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-xl md:text-2xl text-gray-800 leading-tight">
                    {{ __('Tambah Metode Pembayaran') }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Tambahkan metode pembayaran baru ke dalam sistem.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-xl
                        bg-blue-50 border border-blue-100">

                <svg class="w-5 h-5 text-[#0066CC]"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />

                </svg>

                <span class="text-sm font-semibold text-[#0056B3]">
                    Metode Pembayaran
                </span>

            </div>
        </div>
    </x-slot>


    {{-- MAIN --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-white py-8 md:py-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- BACK BUTTON --}}
            <div class="mb-5">

                <a href="{{ route('admin.envi') }}"
                    class="group inline-flex items-center gap-2 px-4 py-2.5
                           bg-white text-[#0056B3]
                           rounded-xl border border-blue-100
                           shadow-md shadow-blue-900/5
                           hover:bg-blue-50
                           hover:border-blue-200
                           hover:-translate-x-1
                           transition-all duration-200">

                    <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                    </svg>

                    <span class="text-sm font-semibold">
                        Kembali ke Pengaturan
                    </span>

                </a>

            </div>


            {{-- HERO --}}
            <div class="relative overflow-hidden rounded-3xl shadow-2xl mb-7"
                style="background: linear-gradient(135deg, #003A8F 0%, #0066CC 55%, #00AEEF 100%);">

                {{-- Decorative --}}
                <div class="absolute -top-24 -right-20 w-64 h-64 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-28 right-28 w-72 h-72 rounded-full bg-white/5"></div>

                <div class="relative z-10 p-7 md:p-8">

                    <div class="flex items-center gap-5">

                        <div class="flex-shrink-0 w-16 h-16 rounded-2xl
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
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />

                            </svg>

                        </div>

                        <div>

                            <span class="inline-flex items-center px-3 py-1 rounded-full
                                         bg-white/15 border border-white/20
                                         text-white text-xs font-semibold
                                         backdrop-blur-sm mb-2">

                                <span class="w-1.5 h-1.5 rounded-full bg-white mr-2"></span>

                                KONFIGURASI SISTEM

                            </span>

                            <h1 class="text-2xl md:text-3xl font-extrabold text-white">
                                Tambah Metode Pembayaran
                            </h1>

                            <p class="text-blue-100 mt-1.5 text-sm md:text-base">
                                Isi formulir berikut untuk menambahkan metode pembayaran baru.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FORM CARD --}}
            <div class="bg-white rounded-3xl border border-blue-100
                        shadow-xl shadow-blue-900/5 overflow-hidden">


                {{-- FORM HEADER --}}
                <div class="px-6 md:px-8 py-5 border-b border-blue-50 bg-blue-50/40">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100 text-[#0066CC]
                                    flex items-center justify-center">

                            <svg class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4" />

                            </svg>

                        </div>

                        <div>

                            <h3 class="font-bold text-gray-800">
                                Informasi Metode Pembayaran
                            </h3>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Lengkapi data yang diperlukan di bawah ini.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <form action="{{ route('payment.store') }}"
                    method="POST"
                    class="p-6 md:p-8">

                    @csrf


                    <div class="space-y-6">


                        {{-- PAYMENT METHOD NAME --}}
                        <div>

                            <label for="payment_method_name"
                                class="block text-sm font-bold text-gray-700 mb-2">

                                Nama Metode Pembayaran
                                <span class="text-red-500">*</span>

                            </label>

                            <div class="relative">

                                <div class="absolute left-4 top-1/2 -translate-y-1/2
                                            text-[#0066CC] pointer-events-none">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />

                                    </svg>

                                </div>

                                <input type="text"
                                    name="payment_method_name"
                                    id="payment_method_name"
                                    value="{{ old('payment_method_name') }}"
                                    class="w-full pl-12 pr-4 py-3.5
                                           bg-gray-50
                                           border-2 border-gray-200
                                           rounded-xl
                                           text-gray-800 font-medium
                                           placeholder-gray-400
                                           focus:bg-white
                                           focus:ring-4 focus:ring-blue-100
                                           focus:border-[#0066CC]
                                           focus:outline-none
                                           transition-all duration-200
                                           @error('payment_method_name') border-red-500 bg-red-50 @enderror"
                                    placeholder="Contoh: Transfer Bank">

                            </div>

                            @error('payment_method_name')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <span>•</span>
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- SUB CATEGORY --}}
                        <div>

                            <label for="sub_category"
                                class="block text-sm font-bold text-gray-700 mb-2">

                                Sub Kategori
                                <span class="text-red-500">*</span>

                            </label>

                            <div class="relative">

                                <div class="absolute left-4 top-1/2 -translate-y-1/2
                                            text-[#0066CC] pointer-events-none">

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

                                <input type="text"
                                    name="sub_category"
                                    id="sub_category"
                                    value="{{ old('sub_category') }}"
                                    class="w-full pl-12 pr-4 py-3.5
                                           bg-gray-50
                                           border-2 border-gray-200
                                           rounded-xl
                                           text-gray-800 font-medium
                                           placeholder-gray-400
                                           focus:bg-white
                                           focus:ring-4 focus:ring-blue-100
                                           focus:border-[#0066CC]
                                           focus:outline-none
                                           transition-all duration-200
                                           @error('sub_category') border-red-500 bg-red-50 @enderror"
                                    placeholder="Contoh: BCA, Mandiri, BNI">

                            </div>

                            @error('sub_category')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <span>•</span>
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- DESCRIPTION --}}
                        <div>

                            <label for="description"
                                class="block text-sm font-bold text-gray-700 mb-2">

                                Deskripsi / Keterangan

                                <span class="text-gray-400 font-normal">
                                    (Opsional)
                                </span>

                            </label>

                            <textarea name="description"
                                id="description"
                                rows="5"
                                class="w-full px-4 py-3.5
                                       bg-gray-50
                                       border-2 border-gray-200
                                       rounded-xl
                                       text-gray-800 font-medium
                                       placeholder-gray-400
                                       focus:bg-white
                                       focus:ring-4 focus:ring-blue-100
                                       focus:border-[#0066CC]
                                       focus:outline-none
                                       transition-all duration-200
                                       resize-none
                                       @error('description') border-red-500 bg-red-50 @enderror"
                                placeholder="Jelaskan detail atau kepanjangan dari metode pembayaran ini...">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <span>•</span>
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- INFO BOX --}}
                        <div class="relative overflow-hidden
                                    flex items-start gap-4
                                    p-5 rounded-2xl
                                    bg-blue-50
                                    border border-blue-100">

                            <div class="w-10 h-10 flex-shrink-0 rounded-xl
                                        bg-white border border-blue-100
                                        flex items-center justify-center">

                                <svg class="w-5 h-5 text-[#0066CC]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01
                                           M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                </svg>

                            </div>

                            <div class="text-sm text-blue-900">

                                <p class="font-bold mb-2">
                                    Catatan Pengisian
                                </p>

                                <ul class="space-y-1.5 text-xs text-blue-800">

                                    <li class="flex gap-2">
                                        <span>•</span>
                                        <span>Field yang bertanda (*) wajib diisi.</span>
                                    </li>

                                    <li class="flex gap-2">
                                        <span>•</span>
                                        <span>Pastikan nama metode pembayaran jelas dan mudah dipahami.</span>
                                    </li>

                                    <li class="flex gap-2">
                                        <span>•</span>
                                        <span>Sub kategori digunakan untuk pengelompokan yang lebih spesifik.</span>
                                    </li>

                                </ul>

                            </div>

                        </div>


                        {{-- ACTION --}}
                        <div class="flex flex-col-reverse sm:flex-row
                                    items-stretch sm:items-center
                                    justify-end gap-3
                                    pt-6 border-t border-gray-100">

                            <a href="{{ route('admin.envi') }}"
                                class="inline-flex items-center justify-center gap-2
                                       px-6 py-3.5
                                       bg-gray-100 text-gray-700
                                       rounded-xl
                                       font-bold text-sm
                                       border border-gray-200
                                       hover:bg-gray-200
                                       hover:-translate-y-0.5
                                       transition-all duration-200">

                                <svg class="w-4 h-4"
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
                                       text-white
                                       rounded-xl
                                       font-bold text-sm
                                       shadow-lg shadow-blue-500/20
                                       hover:shadow-xl
                                       hover:-translate-y-0.5
                                       active:scale-95
                                       transition-all duration-200"
                                style="background: linear-gradient(135deg, #003A8F, #0066CC);">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7" />

                                </svg>

                                Simpan Metode Pembayaran

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
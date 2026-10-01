<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#00AEEF] flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl leading-tight text-gray-800">
                    {{ __('Edit Kabinet') }}
                </h2>
                <p class="text-sm text-gray-500 mt-0.5">
                    Perbarui informasi kabinet arsip
                </p>
            </div>
        </div>
    </x-slot>

    {{-- ============================= --}}
    {{-- TOMBOL KEMBALI --}}
    {{-- ============================= --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

            <a href="{{ route('cabinet.index') }}"
                class="group inline-flex items-center gap-2
                       bg-white text-[#003A8F]
                       px-4 py-2.5 rounded-xl
                       border border-blue-100
                       shadow-sm
                       hover:bg-[#003A8F] hover:text-white
                       hover:border-[#003A8F]
                       hover:shadow-lg
                       transition-all duration-300">

                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>

                <span class="font-semibold text-sm">
                    Kembali ke Daftar Kabinet
                </span>
            </a>

        </div>
    </div>


    {{-- ============================= --}}
    {{-- MAIN --}}
    {{-- ============================= --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-white py-8">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ============================= --}}
            {{-- MAIN CARD --}}
            {{-- ============================= --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-blue-100">

                {{-- ============================= --}}
                {{-- HEADER --}}
                {{-- ============================= --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-[#003A8F] via-[#0066CC] to-[#00AEEF] px-6 sm:px-8 py-7">

                    {{-- Decorative circles --}}
                    <div class="absolute -right-12 -top-16 w-48 h-48 rounded-full bg-white/10"></div>
                    <div class="absolute -right-6 -bottom-20 w-56 h-56 rounded-full bg-white/5"></div>
                    <div class="absolute left-1/3 -bottom-16 w-32 h-32 rounded-full bg-white/5"></div>

                    <div class="relative z-10 flex items-center gap-4">

                        <div class="w-14 h-14 flex-shrink-0 rounded-2xl
                                    bg-white/15 border border-white/25
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
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>

                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-bold text-white">
                                Edit Informasi Kabinet
                            </h3>

                            <p class="text-blue-100 mt-1.5 text-sm sm:text-base">
                                Perbarui data kabinet:
                                <span class="font-bold text-white">
                                    {{ $cabinet->cabinet_name }}
                                </span>
                            </p>
                        </div>

                    </div>
                </div>


                {{-- ============================= --}}
                {{-- CURRENT INFO --}}
                {{-- ============================= --}}
                <div class="p-5 sm:p-6 bg-gradient-to-r from-blue-50 via-white to-cyan-50 border-b border-blue-100">

                    <div class="flex items-start gap-4">

                        <div class="flex-shrink-0 w-11 h-11 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center">

                            <svg class="w-6 h-6 text-[#0066CC]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 7h5l2 2h11v10a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                            </svg>

                        </div>

                        <div class="flex-1 min-w-0">

                            <div class="flex items-center justify-between gap-3 mb-4">

                                <div>
                                    <h4 class="font-bold text-gray-800">
                                        Informasi Kabinet Saat Ini
                                    </h4>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Data yang sedang tersimpan di sistem
                                    </p>
                                </div>

                                <span class="hidden sm:inline-flex items-center gap-1.5
                                             px-3 py-1.5 rounded-full
                                             bg-blue-100 text-[#003A8F]
                                             text-xs font-bold">

                                    <span class="w-2 h-2 rounded-full bg-[#00AEEF]"></span>
                                    Aktif
                                </span>

                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                                {{-- Nama --}}
                                <div class="bg-white border border-blue-100 rounded-xl p-3.5
                                            shadow-sm hover:shadow-md transition-shadow">

                                    <div class="flex items-center gap-2 mb-1.5">

                                        <svg class="w-4 h-4 text-[#0066CC]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 7h5l2 2h11v10a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                        </svg>

                                        <span class="text-xs font-semibold text-gray-500">
                                            Nama Kabinet
                                        </span>

                                    </div>

                                    <p class="font-bold text-gray-800 truncate">
                                        {{ $cabinet->cabinet_name }}
                                    </p>

                                </div>


                                {{-- Kode --}}
                                <div class="bg-white border border-blue-100 rounded-xl p-3.5
                                            shadow-sm hover:shadow-md transition-shadow">

                                    <div class="flex items-center gap-2 mb-1.5">

                                        <svg class="w-4 h-4 text-[#0066CC]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16"/>
                                        </svg>

                                        <span class="text-xs font-semibold text-gray-500">
                                            Kode Kabinet
                                        </span>

                                    </div>

                                    <p class="font-bold text-gray-800">
                                        {{ $cabinet->cabinet_code }}
                                    </p>

                                </div>


                                {{-- ID --}}
                                <div class="bg-white border border-blue-100 rounded-xl p-3.5
                                            shadow-sm hover:shadow-md transition-shadow">

                                    <div class="flex items-center gap-2 mb-1.5">

                                        <svg class="w-4 h-4 text-[#0066CC]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 7h6m-6 4h6m-6 4h4M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                                        </svg>

                                        <span class="text-xs font-semibold text-gray-500">
                                            ID Kabinet
                                        </span>

                                    </div>

                                    <p class="font-bold text-gray-800">
                                        #{{ $cabinet->id }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>


                {{-- ============================= --}}
                {{-- FORM --}}
                {{-- ============================= --}}
                <form action="{{ route('cabinet.update', $cabinet->id) }}"
                    method="POST"
                    class="p-6 sm:p-8">

                    @method('PUT')
                    @csrf


                    {{-- Validation --}}
                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">

                            <div class="flex items-start gap-3">

                                <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-red-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 9v3m0 4h.01M10.29 3.86l-7.4 12.8A2 2 0 004.63 20h14.74a2 2 0 001.74-3.34l-7.4-12.8a2 2 0 00-3.42 0z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="font-bold text-red-800">
                                        Periksa kembali data yang dimasukkan
                                    </p>

                                    <ul class="mt-2 text-sm text-red-700 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>
                    @endif


                    <div class="space-y-6">

                        {{-- ============================= --}}
                        {{-- NAMA KABINET --}}
                        {{-- ============================= --}}
                        <div>

                            <label for="name"
                                class="flex items-center gap-2 text-gray-800 font-bold mb-2.5">

                                <span class="w-7 h-7 rounded-lg bg-blue-100 text-[#0066CC]
                                             flex items-center justify-center">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 7h5l2 2h11v10a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                    </svg>

                                </span>

                                Nama Kabinet
                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name', $cabinet->cabinet_name) }}"
                                    class="w-full px-5 py-3.5 pl-12
                                           border-2 border-gray-200
                                           rounded-2xl
                                           focus:ring-4 focus:ring-blue-100
                                           focus:border-[#0066CC]
                                           transition-all duration-300
                                           bg-gray-50 focus:bg-white
                                           text-gray-800
                                           placeholder-gray-400"
                                    placeholder="Masukkan nama kabinet"
                                    required>

                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#0066CC]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 7h5l2 2h11v10a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                </svg>

                            </div>

                            <p class="mt-2 text-xs text-gray-500 ml-1">
                                Gunakan nama yang mudah dikenali untuk kabinet arsip.
                            </p>

                        </div>


                        {{-- ============================= --}}
                        {{-- KODE KABINET --}}
                        {{-- ============================= --}}
                        <div>

                            <label for="code"
                                class="flex items-center gap-2 text-gray-800 font-bold mb-2.5">

                                <span class="w-7 h-7 rounded-lg bg-blue-100 text-[#0066CC]
                                             flex items-center justify-center">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>

                                </span>

                                Kode Kabinet
                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <input type="text"
                                    name="code"
                                    id="code"
                                    value="{{ old('code', $cabinet->cabinet_code) }}"
                                    class="w-full px-5 py-3.5 pl-12
                                           border-2 border-gray-200
                                           rounded-2xl
                                           focus:ring-4 focus:ring-blue-100
                                           focus:border-[#0066CC]
                                           transition-all duration-300
                                           bg-gray-50 focus:bg-white
                                           text-gray-800
                                           uppercase
                                           placeholder-gray-400"
                                    placeholder="Masukkan kode kabinet"
                                    required>

                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#0066CC]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>

                            </div>

                            <p class="mt-2 text-xs text-gray-500 ml-1">
                                Kode digunakan sebagai identitas singkat kabinet.
                            </p>

                        </div>


                        {{-- ============================= --}}
                        {{-- DESKRIPSI --}}
                        {{-- ============================= --}}
                        <div>

                            <label for="deskripsi"
                                class="flex items-center gap-2 text-gray-800 font-bold mb-2.5">

                                <span class="w-7 h-7 rounded-lg bg-blue-100 text-[#0066CC]
                                             flex items-center justify-center">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2zm3 4h6M9 12h6M9 16h4"/>
                                    </svg>

                                </span>

                                Deskripsi
                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <textarea name="deskripsi"
                                    id="deskripsi"
                                    rows="5"
                                    class="w-full px-5 py-4 pl-12
                                           border-2 border-gray-200
                                           rounded-2xl
                                           focus:ring-4 focus:ring-blue-100
                                           focus:border-[#0066CC]
                                           transition-all duration-300
                                           bg-gray-50 focus:bg-white
                                           text-gray-800
                                           placeholder-gray-400
                                           resize-none"
                                    placeholder="Jelaskan fungsi atau isi dari kabinet ini"
                                    required>{{ old('deskripsi', $cabinet->description) }}</textarea>

                                <svg class="absolute left-4 top-5 w-5 h-5 text-[#0066CC]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2zm3 4h6M9 12h6M9 16h4"/>
                                </svg>

                            </div>

                            <p class="mt-2 text-xs text-gray-500 ml-1">
                                Perbarui deskripsi untuk mencerminkan fungsi atau isi kabinet.
                            </p>

                        </div>

                    </div>


                    {{-- ============================= --}}
                    {{-- ACTION BUTTONS --}}
                    {{-- ============================= --}}
                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3
                                pt-6 mt-8 border-t border-gray-200">

                        {{-- BATAL --}}
                        <a href="{{ route('cabinet.index') }}"
                            class="inline-flex items-center justify-center gap-2
                                   px-5 py-3
                                   bg-white
                                   text-gray-700
                                   font-bold
                                   rounded-xl
                                   border-2 border-gray-200
                                   hover:bg-gray-50
                                   hover:border-gray-300
                                   hover:shadow-md
                                   transition-all duration-300">

                            <svg class="w-5 h-5"
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


                        {{-- UPDATE --}}
                        <button type="submit"
                            class="group inline-flex items-center justify-center gap-2
                                   px-6 py-3
                                   bg-gradient-to-r from-[#003A8F] via-[#0066CC] to-[#00AEEF]
                                   hover:from-[#002E73] hover:via-[#0055AA] hover:to-[#0099D6]
                                   text-white
                                   font-bold
                                   rounded-xl
                                   shadow-lg shadow-blue-200
                                   hover:shadow-xl hover:shadow-blue-300
                                   hover:-translate-y-0.5
                                   active:translate-y-0
                                   transition-all duration-300">

                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"/>
                            </svg>

                            Update Kabinet
                        </button>

                    </div>

                </form>

            </div>


            {{-- ============================= --}}
            {{-- RIWAYAT KABINET --}}
            {{-- ============================= --}}
            <div class="mt-6 bg-white rounded-3xl border border-blue-100 shadow-lg overflow-hidden">

                <div class="p-5 sm:p-6">

                    <div class="flex items-start gap-4">

                        <div class="flex-shrink-0 w-11 h-11 rounded-xl
                                    bg-gradient-to-br from-blue-100 to-cyan-100
                                    flex items-center justify-center">

                            <svg class="w-6 h-6 text-[#0066CC]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                        </div>


                        <div class="flex-1 min-w-0">

                            <h4 class="font-bold text-gray-800 text-lg">
                                Riwayat Kabinet
                            </h4>

                            <p class="text-sm text-gray-500 mt-1 mb-5">
                                Informasi waktu pembuatan dan perubahan data kabinet.
                            </p>


                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                                {{-- ID --}}
                                <div class="rounded-xl bg-blue-50 border border-blue-100 p-4">

                                    <p class="text-xs font-semibold text-[#0066CC] mb-1">
                                        ID Kabinet
                                    </p>

                                    <p class="font-bold text-gray-800">
                                        #{{ $cabinet->id }}
                                    </p>

                                </div>


                                {{-- CREATED --}}
                                <div class="rounded-xl bg-blue-50 border border-blue-100 p-4">

                                    <p class="text-xs font-semibold text-[#0066CC] mb-1">
                                        Dibuat
                                    </p>

                                    <p class="font-bold text-gray-800">
                                        {{ $cabinet->created_at ? $cabinet->created_at->format('d M Y') : '-' }}
                                    </p>

                                </div>


                                {{-- UPDATED --}}
                                <div class="rounded-xl bg-blue-50 border border-blue-100 p-4">

                                    <p class="text-xs font-semibold text-[#0066CC] mb-1">
                                        Terakhir Update
                                    </p>

                                    <p class="font-bold text-gray-800">
                                        {{ $cabinet->updated_at ? $cabinet->updated_at->format('d M Y H:i') : '-' }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ============================= --}}
            {{-- INFO BOX --}}
            {{-- ============================= --}}
            <div class="mt-6 rounded-2xl
                        bg-gradient-to-r from-[#003A8F] to-[#0066CC]
                        p-5 sm:p-6
                        shadow-lg">

                <div class="flex items-start gap-4">

                    <div class="flex-shrink-0 w-10 h-10 rounded-xl
                                bg-white/15
                                flex items-center justify-center">

                        <svg class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                        </svg>

                    </div>

                    <div>

                        <h4 class="font-bold text-white">
                            Perubahan Data Kabinet
                        </h4>

                        <p class="text-sm text-blue-100 mt-1 leading-relaxed">
                            Pastikan nama, kode, dan deskripsi kabinet sudah sesuai
                            sebelum menyimpan perubahan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
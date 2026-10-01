<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-xl md:text-2xl text-gray-800 leading-tight">
                    {{ __('Pengaturan Environment') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola konfigurasi metode pembayaran dan sumber dana sistem.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 border border-blue-100">
                <svg class="w-5 h-5 text-[#0066CC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.04-.133-2.049-.382-3.016z" />
                </svg>
                <span class="text-sm font-semibold text-[#0056B3]">
                    Pengaturan Sistem
                </span>
            </div>
        </div>
    </x-slot>


    {{-- MAIN --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-white py-8 md:py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ========================================================= --}}
            {{-- HERO --}}
            {{-- ========================================================= --}}
            <div class="relative overflow-hidden rounded-3xl shadow-2xl mb-8"
                style="background: linear-gradient(135deg, #003A8F 0%, #0066CC 55%, #00AEEF 100%);">

                {{-- Decorative circles --}}
                <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-32 right-32 w-80 h-80 rounded-full bg-white/5"></div>
                <div class="absolute top-8 right-1/3 w-20 h-20 rounded-full bg-white/5"></div>

                <div class="relative z-10 p-7 md:p-9">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        <div class="flex items-start gap-5">

                            {{-- Icon --}}
                            <div class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 rounded-2xl
                                        bg-white/15 backdrop-blur-md border border-white/20
                                        flex items-center justify-center shadow-xl">

                                <svg class="w-9 h-9 md:w-10 md:h-10 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0
                                           a1.724 1.724 0 002.573 1.066
                                           c1.543-.94 3.31.826 2.37 2.37
                                           a1.724 1.724 0 001.065 2.572
                                           c1.756.426 1.756 2.924 0 3.35
                                           a1.724 1.724 0 00-1.066 2.573
                                           c.94 1.543-.826 3.31-2.37 2.37
                                           a1.724 1.724 0 00-2.572 1.065
                                           c-.426 1.756-2.924 1.756-3.35 0
                                           a1.724 1.724 0 00-2.573-1.066
                                           c-1.543.94-3.31-.826-2.37-2.37
                                           a1.724 1.724 0 00-1.065-2.572
                                           c-1.756-.426-1.756-2.924 0-3.35
                                           a1.724 1.724 0 001.066-2.573
                                           c-.94-1.543.826-3.31 2.37-2.37
                                           .996.608 2.296.07 2.572-1.065z" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>

                            </div>


                            {{-- Text --}}
                            <div>
                                <div class="flex items-center gap-2 mb-2">

                                    <span class="inline-flex items-center px-3 py-1 rounded-full
                                                 bg-white/15 border border-white/20
                                                 text-white text-xs font-semibold backdrop-blur-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white mr-2"></span>
                                        SYSTEM SETTINGS
                                    </span>

                                </div>

                                <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                                    Pengaturan Sistem
                                </h1>

                                <p class="text-blue-100 mt-2 max-w-2xl text-sm md:text-base">
                                    Kelola metode pembayaran dan sumber dana yang digunakan
                                    dalam proses pengajuan anggaran.
                                </p>
                            </div>

                        </div>


                        {{-- Summary --}}
                        <div class="flex flex-row md:flex-col gap-3 md:min-w-[170px]">

                            <div class="bg-white/10 backdrop-blur-md border border-white/15
                                        rounded-2xl px-4 py-3 text-white">

                                <div class="text-xs text-blue-100">
                                    Total Konfigurasi
                                </div>

                                <div class="text-2xl font-extrabold mt-1">
                                    {{ count($payment_method) + count($funding_source) }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- SUMMARY CARDS --}}
            {{-- ========================================================= --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-8">

                {{-- Payment Summary --}}
                <div class="group bg-white rounded-2xl border border-blue-100
                            shadow-lg shadow-blue-900/5 p-5
                            hover:-translate-y-1 hover:shadow-xl
                            transition-all duration-300">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center
                                    shadow-lg shadow-blue-500/20"
                            style="background: linear-gradient(135deg, #003A8F, #0066CC);">

                            <svg class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />

                            </svg>

                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Metode Pembayaran
                            </p>

                            <p class="text-3xl font-extrabold text-gray-800 mt-0.5">
                                {{ count($payment_method) }}
                            </p>

                            <p class="text-xs text-blue-600 font-medium mt-1">
                                Metode tersedia
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Funding Summary --}}
                <div class="group bg-white rounded-2xl border border-blue-100
                            shadow-lg shadow-blue-900/5 p-5
                            hover:-translate-y-1 hover:shadow-xl
                            transition-all duration-300">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center
                                    shadow-lg shadow-cyan-500/20"
                            style="background: linear-gradient(135deg, #0066CC, #00AEEF);">

                            <svg class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2
                                       3 .895 3 2-1.343 2-3 2
                                       m0-8c1.11 0 2.08.402 2.599 1
                                       M12 8V7m0 1v8m0 0v1
                                       m0-1c-1.11 0-2.08-.402-2.599-1
                                       M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Sumber Dana
                            </p>

                            <p class="text-3xl font-extrabold text-gray-800 mt-0.5">
                                {{ count($funding_source) }}
                            </p>

                            <p class="text-xs text-[#008ED6] font-medium mt-1">
                                Sumber tersedia
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- MAIN GRID --}}
            {{-- ========================================================= --}}
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-7">


                {{-- ===================================================== --}}
                {{-- METODE PEMBAYARAN --}}
                {{-- ===================================================== --}}
                <div class="bg-white rounded-3xl shadow-xl shadow-blue-900/5
                            border border-blue-100 overflow-hidden">

                    {{-- Card Header --}}
                    <div class="relative overflow-hidden"
                        style="background: linear-gradient(135deg, #003A8F, #0066CC);">

                        <div class="absolute -right-8 -top-12 w-40 h-40 rounded-full bg-white/10"></div>

                        <div class="relative z-10 px-6 py-5">

                            <div class="flex items-center justify-between gap-4">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-2xl
                                                bg-white/15 backdrop-blur-md
                                                border border-white/20
                                                flex items-center justify-center">

                                        <svg class="w-6 h-6 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />

                                        </svg>

                                    </div>

                                    <div>
                                        <h3 class="text-lg font-bold text-white">
                                            Metode Pembayaran
                                        </h3>

                                        <p class="text-xs text-blue-100 mt-0.5">
                                            {{ count($payment_method) }} metode tersedia
                                        </p>
                                    </div>

                                </div>


                                <a href="{{ route('payment.create') }}"
                                    class="inline-flex items-center gap-2 px-4 py-2.5
                                           bg-white text-[#003A8F]
                                           rounded-xl text-sm font-bold
                                           shadow-lg shadow-black/10
                                           hover:bg-blue-50 hover:scale-105
                                           transition-all duration-200">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4" />

                                    </svg>

                                    <span class="hidden sm:inline">
                                        Tambah
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>


                    @php
                        $no = 1;
                    @endphp


                    {{-- Content --}}
                    <div class="p-5 md:p-6">

                        @if (count($payment_method) > 0)

                            <div class="space-y-3">

                                @foreach ($payment_method as $payment)

                                    <div class="group relative overflow-hidden
                                                bg-slate-50 rounded-2xl
                                                border border-gray-200
                                                p-4
                                                hover:bg-blue-50
                                                hover:border-blue-200
                                                hover:shadow-md
                                                transition-all duration-300">

                                        {{-- Blue accent --}}
                                        <div class="absolute left-0 top-0 bottom-0 w-1
                                                    opacity-0 group-hover:opacity-100
                                                    transition-opacity duration-300"
                                            style="background: linear-gradient(to bottom, #003A8F, #00AEEF);">
                                        </div>


                                        <div class="flex items-center gap-4">

                                            {{-- Number --}}
                                            <div class="flex-shrink-0 w-10 h-10 rounded-xl
                                                        flex items-center justify-center
                                                        text-sm font-extrabold text-[#003A8F]
                                                        bg-blue-100 border border-blue-200">

                                                {{ $no++ }}

                                            </div>


                                            {{-- Information --}}
                                            <div class="flex-1 min-w-0">

                                                <h4 class="font-bold text-gray-800 truncate">
                                                    {{ $payment->payment_method_name }}
                                                </h4>

                                                <div class="flex flex-wrap items-center gap-2 mt-1.5">

                                                    <span class="inline-flex items-center
                                                                 px-2.5 py-1 rounded-lg
                                                                 text-xs font-semibold
                                                                 bg-blue-100 text-[#0056B3]">

                                                        {{ $payment->sub_category }}

                                                    </span>

                                                </div>

                                                @if ($payment->description)

                                                    <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                                                        {{ $payment->description }}
                                                    </p>

                                                @endif

                                            </div>


                                            {{-- Actions --}}
                                            <div class="flex items-center gap-1 flex-shrink-0">

                                                <a href="{{ route('payment.edit', $payment->id) }}"
                                                    class="w-9 h-9 flex items-center justify-center
                                                           rounded-xl text-[#0066CC]
                                                           hover:bg-blue-100
                                                           transition-all duration-200"
                                                    title="Edit">

                                                    <svg class="w-4 h-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                                                               m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />

                                                    </svg>

                                                </a>


                                                <form action="{{ route('payment.destroy', $payment->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus metode pembayaran ini?')"
                                                    class="inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="w-9 h-9 flex items-center justify-center
                                                               rounded-xl text-red-500
                                                               hover:bg-red-50 hover:text-red-600
                                                               transition-all duration-200"
                                                        title="Hapus">

                                                        <svg class="w-4 h-4"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                                                   a2 2 0 01-1.995-1.858L5 7
                                                                   m5 4v6m4-6v6m1-10V4
                                                                   a1 1 0 00-1-1h-4
                                                                   a1 1 0 00-1 1v3M4 7h16" />

                                                        </svg>

                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            {{-- Empty State --}}
                            <div class="text-center py-14">

                                <div class="w-20 h-20 rounded-3xl
                                            bg-blue-50 border border-blue-100
                                            flex items-center justify-center
                                            mx-auto mb-5">

                                    <svg class="w-9 h-9 text-[#0066CC]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7
                                               m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5
                                               m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414
                                               a1 1 0 01-.707.293h-3.172
                                               a1 1 0 01-.707-.293l-2.414-2.414
                                               A1 1 0 006.586 13H4" />

                                    </svg>

                                </div>

                                <h4 class="font-bold text-gray-700">
                                    Belum Ada Metode Pembayaran
                                </h4>

                                <p class="text-sm text-gray-400 mt-1">
                                    Tambahkan metode pembayaran untuk mulai digunakan.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>



                {{-- ===================================================== --}}
                {{-- SUMBER DANA --}}
                {{-- ===================================================== --}}
                <div class="bg-white rounded-3xl shadow-xl shadow-blue-900/5
                            border border-blue-100 overflow-hidden">

                    {{-- Card Header --}}
                    <div class="relative overflow-hidden"
                        style="background: linear-gradient(135deg, #0066CC, #00AEEF);">

                        <div class="absolute -right-8 -top-12 w-40 h-40 rounded-full bg-white/10"></div>

                        <div class="relative z-10 px-6 py-5">

                            <div class="flex items-center justify-between gap-4">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-2xl
                                                bg-white/15 backdrop-blur-md
                                                border border-white/20
                                                flex items-center justify-center">

                                        <svg class="w-6 h-6 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2
                                                   3 .895 3 2-1.343 2-3 2
                                                   m0-8c1.11 0 2.08.402 2.599 1
                                                   M12 8V7m0 1v8m0 0v1
                                                   m0-1c-1.11 0-2.08-.402-2.599-1
                                                   M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                    </div>

                                    <div>
                                        <h3 class="text-lg font-bold text-white">
                                            Sumber Dana
                                        </h3>

                                        <p class="text-xs text-blue-50 mt-0.5">
                                            {{ count($funding_source) }} sumber tersedia
                                        </p>
                                    </div>

                                </div>


                                <a href="{{ route('funding.create') }}"
                                    class="inline-flex items-center gap-2 px-4 py-2.5
                                           bg-white text-[#0066CC]
                                           rounded-xl text-sm font-bold
                                           shadow-lg shadow-black/10
                                           hover:bg-blue-50 hover:scale-105
                                           transition-all duration-200">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4" />

                                    </svg>

                                    <span class="hidden sm:inline">
                                        Tambah
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>


                    @php
                        $no = 1;
                    @endphp


                    {{-- Content --}}
                    <div class="p-5 md:p-6">

                        @if (count($funding_source) > 0)

                            <div class="space-y-3">

                                @foreach ($funding_source as $funding)

                                    <div class="group relative overflow-hidden
                                                bg-slate-50 rounded-2xl
                                                border border-gray-200
                                                p-4
                                                hover:bg-blue-50
                                                hover:border-blue-200
                                                hover:shadow-md
                                                transition-all duration-300">

                                        {{-- Blue accent --}}
                                        <div class="absolute left-0 top-0 bottom-0 w-1
                                                    opacity-0 group-hover:opacity-100
                                                    transition-opacity duration-300"
                                            style="background: linear-gradient(to bottom, #0066CC, #00AEEF);">
                                        </div>


                                        <div class="flex items-center gap-4">

                                            {{-- Number --}}
                                            <div class="flex-shrink-0 w-10 h-10 rounded-xl
                                                        flex items-center justify-center
                                                        text-sm font-extrabold text-[#0066CC]
                                                        bg-blue-100 border border-blue-200">

                                                {{ $no++ }}

                                            </div>


                                            {{-- Information --}}
                                            <div class="flex-1 min-w-0">

                                                <h4 class="font-bold text-gray-800 truncate">
                                                    {{ $funding->funding_source_name }}
                                                </h4>

                                                <div class="flex flex-wrap items-center gap-2 mt-1.5">

                                                    <span class="inline-flex items-center
                                                                 px-2.5 py-1 rounded-lg
                                                                 text-xs font-semibold
                                                                 bg-blue-100 text-[#0056B3]">

                                                        {{ $funding->sub_category }}

                                                    </span>

                                                </div>

                                                @if ($funding->description)

                                                    <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                                                        {{ $funding->description }}
                                                    </p>

                                                @endif

                                            </div>


                                            {{-- Actions --}}
                                            <div class="flex items-center gap-1 flex-shrink-0">

                                                <a href="{{ route('funding.edit', $funding->id) }}"
                                                    class="w-9 h-9 flex items-center justify-center
                                                           rounded-xl text-[#0066CC]
                                                           hover:bg-blue-100
                                                           transition-all duration-200"
                                                    title="Edit">

                                                    <svg class="w-4 h-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11
                                                               a2 2 0 002-2v-5
                                                               m-1.414-9.414a2 2 0 112.828 2.828
                                                               L11.828 15H9v-2.828l8.586-8.586z" />

                                                    </svg>

                                                </a>


                                                <form action="{{ route('funding.destroy', $funding->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus sumber dana ini?')"
                                                    class="inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="w-9 h-9 flex items-center justify-center
                                                               rounded-xl text-red-500
                                                               hover:bg-red-50 hover:text-red-600
                                                               transition-all duration-200"
                                                        title="Hapus">

                                                        <svg class="w-4 h-4"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                                                   a2 2 0 01-1.995-1.858L5 7
                                                                   m5 4v6m4-6v6m1-10V4
                                                                   a1 1 0 00-1-1h-4
                                                                   a1 1 0 00-1 1v3M4 7h16" />

                                                        </svg>

                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            {{-- Empty State --}}
                            <div class="text-center py-14">

                                <div class="w-20 h-20 rounded-3xl
                                            bg-blue-50 border border-blue-100
                                            flex items-center justify-center
                                            mx-auto mb-5">

                                    <svg class="w-9 h-9 text-[#0066CC]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2
                                               3 .895 3 2-1.343 2-3 2
                                               m0-8c1.11 0 2.08.402 2.599 1
                                               M12 8V7m0 1v8m0 0v1
                                               m0-1c-1.11 0-2.08-.402-2.599-1
                                               M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                </div>

                                <h4 class="font-bold text-gray-700">
                                    Belum Ada Sumber Dana
                                </h4>

                                <p class="text-sm text-gray-400 mt-1">
                                    Tambahkan sumber dana untuk mulai digunakan.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- FOOTER INFO --}}
            {{-- ========================================================= --}}
            <div class="mt-7 rounded-2xl border border-blue-100 bg-white
                        shadow-lg shadow-blue-900/5 p-5">

                <div class="flex items-start gap-4">

                    <div class="w-10 h-10 flex-shrink-0 rounded-xl
                                bg-blue-50 border border-blue-100
                                flex items-center justify-center">

                        <svg class="w-5 h-5 text-[#0066CC]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01
                                   M12 20a8 8 0 100-16 8 8 0 000 16z" />

                        </svg>

                    </div>

                    <div>
                        <h4 class="font-bold text-gray-800">
                            Informasi Pengaturan
                        </h4>

                        <p class="text-sm text-gray-500 mt-1 leading-relaxed">
                            Metode pembayaran dan sumber dana yang tersedia di halaman ini
                            dapat digunakan pada proses pengajuan anggaran.
                            Pastikan data yang ditambahkan sesuai dengan kebutuhan sistem.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- ANIMATION --}}
    {{-- ========================================================= --}}
    <style>
        @keyframes environmentFadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .group,
        .bg-white {
            animation: environmentFadeIn .45s ease-out both;
        }
    </style>

</x-app-layout>
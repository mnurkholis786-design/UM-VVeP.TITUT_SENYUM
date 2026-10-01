<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl
                        bg-gradient-to-br from-blue-600 to-indigo-700
                        flex items-center justify-center
                        shadow-lg shadow-blue-600/20">

                <svg class="w-5 h-5 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 002 2v12a2 2 0 002 2z" />

                </svg>

            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    Input Arsip
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola tahun arsip
                </p>
            </div>
        </div>
    </x-slot>


    {{-- BACK BUTTON --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5">

            <a href="{{ url('/cabinet') }}"
                title="Kembali ke Sub Kategori"
                class="group inline-flex items-center justify-center
                       w-11 h-11
                       bg-white/90 backdrop-blur-xl
                       text-gray-600
                       rounded-xl
                       border border-gray-200
                       shadow-md
                       hover:bg-blue-600
                       hover:text-white
                       hover:border-blue-600
                       hover:shadow-lg
                       hover:-translate-y-0.5
                       active:scale-95
                       transition-all duration-200">

                <svg class="w-5 h-5 transition-transform duration-200
                            group-hover:-translate-x-0.5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                </svg>

            </a>

        </div>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 pb-12">


            {{-- ========================================================= --}}
            {{-- HERO HEADER --}}
            {{-- ========================================================= --}}

            <div class="relative overflow-hidden
                        rounded-3xl
                        bg-gradient-to-br from-[#003A8F] via-blue-700 to-indigo-700
                        shadow-2xl shadow-blue-900/20
                        mb-7">

                {{-- Decorative circles --}}
                <div class="absolute -top-24 -right-20
                            w-72 h-72
                            bg-white/10
                            rounded-full
                            blur-2xl">
                </div>

                <div class="absolute -bottom-28 -left-20
                            w-80 h-80
                            bg-indigo-400/20
                            rounded-full
                            blur-3xl">
                </div>

                {{-- Background calendar --}}
                <div class="absolute right-8 top-4
                            opacity-[0.08]">

                    <svg class="w-44 h-44 text-white"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-width="1"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                    </svg>

                </div>


                <div class="relative p-6 sm:p-8">

                    <div class="flex flex-col lg:flex-row
                                lg:items-center
                                lg:justify-between
                                gap-7">


                        {{-- TITLE --}}
                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 shrink-0
                                        rounded-2xl
                                        bg-white/15
                                        border border-white/20
                                        backdrop-blur-md
                                        flex items-center justify-center
                                        shadow-lg">

                                <svg class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                </svg>

                            </div>


                            <div class="min-w-0">

                                <p class="text-blue-100
                                          text-xs sm:text-sm
                                          font-medium
                                          uppercase
                                          tracking-wider">

                                    Sub Kategori Arsip

                                </p>


                                <h1 class="text-2xl sm:text-3xl
                                           font-bold
                                           text-white
                                           mt-1
                                           break-words">

                                    {{ $category->sub_category_name ?? $category->sub_category }}

                                </h1>


                                <p class="text-blue-100
                                          text-sm
                                          mt-2
                                          max-w-2xl">

                                    Kelola daftar tahun arsip pada sub kategori ini.

                                </p>

                            </div>

                        </div>


                        {{-- TOTAL --}}
                        @php
                            $validYears = $years->whereNotNull('year');
                        @endphp

                        <div class="flex items-center gap-3">

                            <div class="bg-white/10
                                        border border-white/20
                                        backdrop-blur-md
                                        rounded-2xl
                                        px-5 py-4
                                        min-w-[150px]">

                                <p class="text-blue-100 text-xs font-medium">
                                    Total Tahun
                                </p>

                                <div class="flex items-end gap-2 mt-1">

                                    <span class="text-3xl font-bold text-white">
                                        {{ $validYears->count() }}
                                    </span>

                                    <span class="text-blue-100 text-sm mb-1">
                                        tahun
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- MAIN CARD --}}
            {{-- ========================================================= --}}

            <div class="bg-white/90
                        backdrop-blur-xl
                        border border-white/80
                        rounded-3xl
                        shadow-xl shadow-gray-200/50
                        overflow-hidden">


                {{-- CARD HEADER --}}
                <div class="px-6 sm:px-8 py-6
                            border-b border-gray-100
                            bg-gradient-to-r
                            from-white
                            to-blue-50/40">

                    <div class="flex flex-col sm:flex-row
                                sm:items-center
                                sm:justify-between
                                gap-4">


                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-blue-100
                                        flex items-center justify-center">

                                <svg class="w-5 h-5 text-blue-700"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                </svg>

                            </div>


                            <div>

                                <h3 class="text-lg font-bold text-gray-800">
                                    Daftar Tahun
                                </h3>

                                <p class="text-sm text-gray-500 mt-0.5">
                                    Pilih tahun untuk melihat detail arsip.
                                </p>

                            </div>

                        </div>


                        {{-- ACTION BUTTONS --}}
                        <div class="flex flex-col sm:flex-row gap-3">


                            {{-- TAMBAH SUB CATEGORY --}}
                            @if ($category->sub_category == null)

                                <a href="{{ route('subcategory.create', ['category_id' => $category->id]) }}"
                                    class="group inline-flex
                                           items-center
                                           justify-center
                                           gap-2
                                           px-4 py-2.5
                                           bg-gradient-to-r
                                           from-emerald-500
                                           to-teal-600
                                           hover:from-emerald-600
                                           hover:to-teal-700
                                           text-white
                                           font-semibold
                                           rounded-xl
                                           shadow-lg
                                           shadow-emerald-500/20
                                           hover:shadow-xl
                                           hover:-translate-y-0.5
                                           active:scale-95
                                           transition-all duration-200">

                                    <svg class="w-5 h-5
                                                transition-transform
                                                duration-200
                                                group-hover:rotate-90"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4" />

                                    </svg>

                                    Tambah Sub Category

                                </a>

                            @endif


                            {{-- TAMBAH TAHUN --}}
                            <form action="{{ route('year.create') }}"
                                method="GET">

                                <input type="hidden"
                                    name="category_id"
                                    value="{{ $category->id }}">

                                <button type="submit"
                                    class="group w-full
                                           inline-flex
                                           items-center
                                           justify-center
                                           gap-2
                                           px-4 py-2.5
                                           bg-gradient-to-r
                                           from-blue-600
                                           to-indigo-600
                                           hover:from-blue-700
                                           hover:to-indigo-700
                                           text-white
                                           font-semibold
                                           rounded-xl
                                           shadow-lg
                                           shadow-blue-600/20
                                           hover:shadow-xl
                                           hover:-translate-y-0.5
                                           active:scale-95
                                           transition-all duration-200">

                                    <svg class="w-5 h-5
                                                transition-transform
                                                duration-200
                                                group-hover:rotate-90"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4" />

                                    </svg>

                                    Tambah Tahun

                                </button>

                            </form>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- YEAR LIST --}}
                {{-- ========================================================= --}}

                <div class="p-6 sm:p-8">

                    @if ($validYears->count() > 0)

                        @php
                            $no = 1;
                        @endphp


                        <div class="grid grid-cols-1
                                    sm:grid-cols-2
                                    lg:grid-cols-3
                                    gap-5">


                            @foreach ($validYears as $year)

                                <div class="group relative
                                            overflow-hidden
                                            bg-white
                                            border border-gray-200
                                            rounded-2xl
                                            shadow-sm
                                            hover:shadow-xl
                                            hover:shadow-blue-100/60
                                            hover:border-blue-200
                                            hover:-translate-y-1
                                            transition-all duration-300">


                                    {{-- TOP ACCENT --}}
                                    <div class="absolute
                                                top-0 left-0 right-0
                                                h-1
                                                bg-gradient-to-r
                                                from-blue-600
                                                via-indigo-600
                                                to-purple-600">
                                    </div>


                                    <a href="{{ route('year.show', $year->id) }}"
                                        class="block p-5">


                                        <div class="flex items-start
                                                    justify-between
                                                    gap-4">


                                            {{-- YEAR ICON --}}
                                            <div class="w-12 h-12
                                                        shrink-0
                                                        rounded-xl
                                                        bg-gradient-to-br
                                                        from-blue-600
                                                        to-indigo-700
                                                        flex items-center
                                                        justify-center
                                                        text-white
                                                        shadow-lg
                                                        shadow-blue-600/20
                                                        group-hover:scale-105
                                                        transition-transform
                                                        duration-200">

                                                <svg class="w-6 h-6"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                                </svg>

                                            </div>


                                            {{-- NUMBER --}}
                                            <span class="inline-flex
                                                         items-center
                                                         justify-center
                                                         min-w-[34px]
                                                         h-8
                                                         px-2
                                                         rounded-lg
                                                         bg-blue-50
                                                         text-blue-700
                                                         text-xs
                                                         font-bold">

                                                {{ $no++ }}

                                            </span>

                                        </div>


                                        <div class="mt-5">

                                            <p class="text-xs
                                                      font-semibold
                                                      uppercase
                                                      tracking-wider
                                                      text-gray-400">

                                                Tahun Arsip

                                            </p>


                                            <h4 class="text-2xl
                                                       font-bold
                                                       text-gray-800
                                                       mt-1
                                                       group-hover:text-blue-700
                                                       transition-colors">

                                                {{ $year->year }}

                                            </h4>


                                            <div class="flex items-center
                                                        gap-2
                                                        mt-3
                                                        text-sm
                                                        text-gray-500">

                                                <span>
                                                    Klik untuk melihat detail
                                                </span>

                                                <svg class="w-4 h-4
                                                            text-blue-500
                                                            transition-transform
                                                            duration-200
                                                            group-hover:translate-x-1"
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

                                    </a>


                                    {{-- ACTIONS --}}
                                    <div class="px-5 pb-5">

                                        <div class="flex items-center
                                                    gap-2
                                                    pt-4
                                                    border-t border-gray-100">


                                            {{-- EDIT --}}
                                            <form action="{{ route('year.edit', $year->id) }}"
                                                method="GET"
                                                class="flex-1">

                                                @csrf

                                                <input type="hidden"
                                                    name="category_id"
                                                    value="{{ $category->id }}">

                                                <button type="submit"
                                                    title="Edit Tahun"
                                                    class="w-full
                                                           inline-flex
                                                           items-center
                                                           justify-center
                                                           gap-2
                                                           px-3 py-2
                                                           bg-amber-50
                                                           border border-amber-200
                                                           text-amber-600
                                                           rounded-xl
                                                           font-semibold
                                                           text-sm
                                                           hover:bg-amber-500
                                                           hover:text-white
                                                           hover:border-amber-500
                                                           hover:shadow-lg
                                                           active:scale-95
                                                           transition-all duration-200">

                                                    <svg class="w-4 h-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />

                                                    </svg>

                                                    Edit

                                                </button>

                                            </form>


                                            {{-- DELETE --}}
                                            <form action="{{ route('year.destroy', $year->id) }}"
                                                method="POST"
                                                class="flex-1"
                                                onsubmit="return confirm('Yakin ingin menghapus tahun ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    title="Hapus Tahun"
                                                    class="w-full
                                                           inline-flex
                                                           items-center
                                                           justify-center
                                                           gap-2
                                                           px-3 py-2
                                                           bg-red-50
                                                           border border-red-200
                                                           text-red-500
                                                           rounded-xl
                                                           font-semibold
                                                           text-sm
                                                           hover:bg-red-500
                                                           hover:text-white
                                                           hover:border-red-500
                                                           hover:shadow-lg
                                                           active:scale-95
                                                           transition-all duration-200">

                                                    <svg class="w-4 h-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10" />

                                                    </svg>

                                                    Hapus

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>


                    @else

                        {{-- ================================================= --}}
                        {{-- EMPTY STATE --}}
                        {{-- ================================================= --}}

                        <div class="py-16 sm:py-20 text-center">

                            <div class="mx-auto
                                        w-24 h-24
                                        rounded-3xl
                                        bg-gradient-to-br
                                        from-blue-50
                                        to-indigo-100
                                        flex items-center
                                        justify-center
                                        shadow-inner">

                                <svg class="w-12 h-12 text-blue-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                </svg>

                            </div>


                            <h3 class="mt-6
                                       text-xl
                                       font-bold
                                       text-gray-700">

                                Belum Ada Tahun

                            </h3>


                            <p class="mt-2
                                      text-sm
                                      text-gray-500
                                      max-w-md
                                      mx-auto">

                                Belum terdapat tahun pada sub kategori ini.
                                Silakan tambahkan tahun terlebih dahulu agar arsip
                                dapat dikelola dengan rapi.

                            </p>


                            <div class="mt-7">

                                <form action="{{ route('year.create') }}"
                                    method="GET">

                                    <input type="hidden"
                                        name="category_id"
                                        value="{{ $category->id }}">

                                    <button type="submit"
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-5 py-2.5
                                               bg-gradient-to-r
                                               from-blue-600
                                               to-indigo-600
                                               hover:from-blue-700
                                               hover:to-indigo-700
                                               text-white
                                               font-semibold
                                               rounded-xl
                                               shadow-lg
                                               shadow-blue-600/20
                                               hover:shadow-xl
                                               hover:-translate-y-0.5
                                               active:scale-95
                                               transition-all duration-200">

                                        <svg class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 4v16m8-8H4" />

                                        </svg>

                                        Tambah Tahun

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
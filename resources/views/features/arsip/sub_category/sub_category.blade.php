<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700
                        flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7h18M5 7v12a2 2 0 002 2h10a2 2 0 002-2V7M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    Input Arsip
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola sub kategori arsip
                </p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/50">

        {{-- BACK BUTTON --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5">

            <a href="{{ url('/cabinet') }}"
                class="group inline-flex items-center justify-center w-11 h-11
                       bg-white/90 backdrop-blur-xl
                       text-gray-600 rounded-xl
                       border border-gray-200/80
                       shadow-md
                       hover:bg-blue-600 hover:text-white
                       hover:border-blue-600
                       hover:shadow-lg
                       hover:-translate-y-0.5
                       active:scale-95
                       transition-all duration-200"
                title="Kembali">

                <svg class="w-5 h-5 transition-transform duration-200 group-hover:-translate-x-0.5"
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

            {{-- HERO / CATEGORY HEADER --}}
            <div class="relative overflow-hidden rounded-3xl
                        bg-gradient-to-br from-[#003A8F] via-blue-700 to-indigo-700
                        shadow-2xl shadow-blue-900/20
                        mb-7">

                {{-- Decorative Background --}}
                <div class="absolute -top-24 -right-20 w-72 h-72
                            bg-white/10 rounded-full blur-2xl"></div>

                <div class="absolute -bottom-28 -left-20 w-80 h-80
                            bg-indigo-400/20 rounded-full blur-3xl"></div>

                <div class="absolute right-8 top-8 opacity-10">
                    <svg class="w-40 h-40 text-white"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-width="1"
                            d="M3 7h18M5 7v12a2 2 0 002 2h10a2 2 0 002-2V7M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2" />
                    </svg>
                </div>

                <div class="relative p-6 sm:p-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        {{-- TITLE --}}
                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 shrink-0 rounded-2xl
                                        bg-white/15 border border-white/20
                                        backdrop-blur-md
                                        flex items-center justify-center
                                        shadow-lg">

                                @if ($category->url_icon)
                                    <img src="{{ $category->url_icon }}"
                                        class="w-9 h-9 object-contain"
                                        alt="Icon kategori">
                                @else
                                    <svg class="w-7 h-7 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 7h5l2 2h11v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                                    </svg>
                                @endif

                            </div>

                            <div>

                                <p class="text-blue-100 text-xs sm:text-sm font-medium uppercase tracking-wider">
                                    Kategori Arsip
                                </p>

                                <h1 class="text-2xl sm:text-3xl font-bold text-white mt-1">
                                    {{ $category->category_name }}
                                </h1>

                                <p class="text-blue-100 text-sm mt-2 max-w-2xl">
                                    Kelola daftar sub kategori yang tersedia pada kategori arsip ini.
                                </p>

                            </div>

                        </div>


                        {{-- TOTAL --}}
                        <div class="flex items-center gap-3">

                            <div class="bg-white/10 border border-white/20
                                        backdrop-blur-md
                                        rounded-2xl px-5 py-4
                                        min-w-[150px]">

                                <p class="text-blue-100 text-xs font-medium">
                                    Total Sub Kategori
                                </p>

                                <div class="flex items-end gap-2 mt-1">

                                    <span class="text-3xl font-bold text-white">
                                        {{ $subcategories->count() }}
                                    </span>

                                    <span class="text-blue-100 text-sm mb-1">
                                        item
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- CONTENT CARD --}}
            <div class="bg-white/90 backdrop-blur-xl
                        border border-white/80
                        rounded-3xl
                        shadow-xl shadow-gray-200/50
                        overflow-hidden">

                {{-- HEADER --}}
                <div class="px-6 sm:px-8 py-6
                            border-b border-gray-100
                            bg-gradient-to-r from-white to-blue-50/40">

                    <div class="flex flex-col sm:flex-row
                                sm:items-center sm:justify-between gap-4">

                        <div>

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl
                                            bg-blue-100
                                            flex items-center justify-center">

                                    <svg class="w-5 h-5 text-blue-700"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 7h18M5 7v12a2 2 0 002 2h10a2 2 0 002-2V7" />

                                    </svg>

                                </div>

                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">
                                        Daftar Sub Kategori
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-0.5">
                                        Pilih sub kategori untuk melihat arsip di dalamnya.
                                    </p>
                                </div>

                            </div>

                        </div>


                        {{-- ADD BUTTON --}}
                        <form action="{{ route('subcategory.create') }}" method="GET">

                            @csrf

                            <input type="hidden"
                                name="category_id"
                                value="{{ $category->id }}">

                            <button type="submit"
                                class="group inline-flex items-center justify-center gap-2
                                       px-5 py-2.5
                                       bg-gradient-to-r from-emerald-500 to-teal-600
                                       hover:from-emerald-600 hover:to-teal-700
                                       text-white font-semibold
                                       rounded-xl
                                       shadow-lg shadow-emerald-500/20
                                       hover:shadow-xl hover:shadow-emerald-500/30
                                       hover:-translate-y-0.5
                                       active:scale-95
                                       transition-all duration-200">

                                <svg class="w-5 h-5 transition-transform duration-200 group-hover:rotate-90"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />

                                </svg>

                                <span>
                                    Tambah Sub Kategori
                                </span>

                            </button>

                        </form>

                    </div>

                </div>


                {{-- LIST --}}
                <div class="p-6 sm:p-8">

                    @if ($subcategories->count() > 0)

                        @php
                            $no = 1;
                        @endphp

                        <div class="grid grid-cols-1 gap-4">

                            @foreach ($subcategories as $subcategory)

                                @continue(is_null($subcategory->sub_category))

                                <div class="group relative overflow-hidden
                                            bg-white
                                            border border-gray-200
                                            rounded-2xl
                                            shadow-sm
                                            hover:shadow-xl hover:shadow-blue-100/60
                                            hover:border-blue-200
                                            hover:-translate-y-0.5
                                            transition-all duration-300">

                                    {{-- Hover Accent --}}
                                    <div class="absolute left-0 top-0 bottom-0
                                                w-1
                                                bg-gradient-to-b from-blue-600 to-indigo-600
                                                opacity-0 group-hover:opacity-100
                                                transition-opacity duration-300">
                                    </div>


                                    <div class="flex flex-col sm:flex-row
                                                sm:items-center
                                                justify-between
                                                gap-4 p-4 sm:p-5">

                                        {{-- MAIN LINK --}}
                                        <a href="{{ route('subcategory.show', $subcategory->id) }}"
                                            class="flex items-center gap-4 min-w-0 flex-1">

                                            {{-- NUMBER --}}
                                            <div class="w-11 h-11 shrink-0
                                                        flex items-center justify-center
                                                        rounded-xl
                                                        bg-gradient-to-br from-[#003A8F] to-indigo-700
                                                        text-white
                                                        font-bold
                                                        shadow-md shadow-blue-900/20
                                                        group-hover:scale-105
                                                        transition-transform duration-200">

                                                {{ $no++ }}

                                            </div>


                                            {{-- NAME --}}
                                            <div class="min-w-0">

                                                <div class="flex items-center gap-2">

                                                    <p class="text-base sm:text-lg
                                                              text-gray-800
                                                              font-bold
                                                              truncate
                                                              group-hover:text-blue-700
                                                              transition-colors duration-200">

                                                        {{ $subcategory->sub_category }}

                                                    </p>

                                                </div>

                                                <p class="text-xs text-gray-400 mt-1">
                                                    Klik untuk melihat detail arsip
                                                </p>

                                            </div>

                                        </a>


                                        {{-- ACTION BUTTONS --}}
                                        <div class="flex items-center gap-2 sm:ml-4">

                                            {{-- EDIT --}}
                                            <form action="{{ route('subcategory.edit', $subcategory->id) }}">

                                                <input type="hidden"
                                                    name="category_id"
                                                    value="{{ $category->id }}">

                                                <button type="submit"
                                                    title="Edit Sub Kategori"
                                                    class="w-10 h-10
                                                           inline-flex items-center justify-center
                                                           bg-amber-50
                                                           border border-amber-200
                                                           text-amber-600
                                                           rounded-xl
                                                           hover:bg-amber-500
                                                           hover:text-white
                                                           hover:border-amber-500
                                                           hover:shadow-lg hover:shadow-amber-500/20
                                                           active:scale-95
                                                           transition-all duration-200">

                                                    <svg class="w-5 h-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />

                                                    </svg>

                                                </button>

                                            </form>


                                            {{-- DELETE --}}
                                            <form action="{{ route('subcategory.destroy', $subcategory->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus sub kategori ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    title="Hapus Sub Kategori"
                                                    class="w-10 h-10
                                                           inline-flex items-center justify-center
                                                           bg-red-50
                                                           border border-red-200
                                                           text-red-500
                                                           rounded-xl
                                                           hover:bg-red-500
                                                           hover:text-white
                                                           hover:border-red-500
                                                           hover:shadow-lg hover:shadow-red-500/20
                                                           active:scale-95
                                                           transition-all duration-200">

                                                    <svg class="w-5 h-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10" />

                                                    </svg>

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        {{-- EMPTY STATE --}}
                        <div class="py-16 text-center">

                            <div class="mx-auto w-20 h-20
                                        rounded-3xl
                                        bg-gradient-to-br from-blue-50 to-indigo-100
                                        flex items-center justify-center
                                        shadow-inner">

                                <svg class="w-10 h-10 text-blue-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 7h5l2 2h11v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                </svg>

                            </div>

                            <h3 class="mt-5 text-lg font-bold text-gray-700">
                                Belum Ada Sub Kategori
                            </h3>

                            <p class="mt-2 text-sm text-gray-500 max-w-md mx-auto">
                                Belum terdapat sub kategori pada kategori
                                <span class="font-semibold text-gray-700">
                                    {{ $category->category_name }}
                                </span>.
                            </p>

                            <div class="mt-6">

                                <form action="{{ route('subcategory.create') }}" method="GET">

                                    @csrf

                                    <input type="hidden"
                                        name="category_id"
                                        value="{{ $category->id }}">

                                    <button type="submit"
                                        class="inline-flex items-center gap-2
                                               px-5 py-2.5
                                               bg-blue-600 hover:bg-blue-700
                                               text-white font-semibold
                                               rounded-xl
                                               shadow-lg shadow-blue-600/20
                                               hover:shadow-xl
                                               hover:-translate-y-0.5
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

                                        Tambah Sub Kategori

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
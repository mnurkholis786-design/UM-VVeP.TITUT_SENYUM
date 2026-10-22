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

            <a href="{{ route('cabinet.show', $category->cabinet_id) }}"
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
                        overflow-hidden mb-6">

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


                        {{-- TAMBAH SUB CATEGORY (HANYA MUNCUL UNTUK ADMIN & BENDAHARA) --}}
                        @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                        <form action="{{ route('subcategory.create') }}"
                            method="GET">

                            <input type="hidden"
                                name="category_id"
                                value="{{ $category->id }}">

                            <button type="submit"
                                class="group relative inline-flex items-center gap-2
                                       px-5 py-2.5
                                       bg-emerald-600 hover:bg-emerald-700
                                       text-white text-sm font-semibold
                                       rounded-xl shadow-md shadow-emerald-600/20
                                       hover:shadow-lg hover:shadow-emerald-600/30
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
                        @endif

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

                                <div class="group relative overflow-hidden bg-white/95 backdrop-blur-md rounded-2xl border border-slate-200/80 p-4 sm:p-5 shadow-[0_8px_20px_-4px_rgba(0,58,143,0.06),0_4px_8px_-4px_rgba(0,58,143,0.03)] hover:shadow-[0_16px_30px_-4px_rgba(0,58,143,0.14)] hover:border-blue-300 hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                                    {{-- AKSEN GLOW 3D DI KIRI --}}
                                    <div class="absolute left-0 top-3 bottom-3 w-1.5 bg-gradient-to-b from-[#003A8F] via-blue-500 to-indigo-600 rounded-r-full opacity-70 group-hover:opacity-100 group-hover:scale-y-105 transition-all duration-300"></div>

                                    {{-- LINK UTAMA --}}
                                    <a href="{{ route('subcategory.show', $subcategory->id) }}"
                                        class="flex items-center gap-4 min-w-0 flex-1 pl-1">

                                        {{-- NOMOR 3D CUBE GLOSSY --}}
                                        <div class="w-12 h-12 shrink-0 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#003A8F] via-blue-700 to-indigo-800 text-white font-black text-base shadow-[0_6px_14px_rgba(0,58,143,0.28),inset_0_1px_1px_rgba(255,255,255,0.4)] group-hover:scale-105 transition-all duration-300">
                                            {{ $no++ }}
                                        </div>

                                        {{-- INFORMASI SUB KATEGORI --}}
                                        <div class="min-w-0">
                                            <p class="text-base sm:text-lg text-gray-900 font-extrabold tracking-tight truncate group-hover:text-[#003A8F] transition-colors duration-200">
                                                {{ $subcategory->sub_category }}
                                            </p>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="text-xs text-slate-400 font-medium">Klik untuk membuka daftar tahun & arsip</span>
                                                <svg class="w-3.5 h-3.5 text-blue-500 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                </svg>
                                            </div>
                                        </div>
                                    </a>

                                    {{-- TOMBOL AKSI SEPERTI GAMBAR 2 --}}
                                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                                    <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">

                                         {{-- EDIT OUTLINE --}}
                                         <form action="{{ route('subcategory.edit', $subcategory->id) }}" method="GET">
                                             <input type="hidden" name="category_id" value="{{ $category->id }}">
                                             <button type="submit"
                                                 title="Edit Sub Kategori"
                                                 class="w-10 h-10 inline-flex items-center justify-center bg-amber-50/70 border border-amber-300 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 rounded-xl transition duration-200 shadow-sm active:scale-95">
                                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                 </svg>
                                             </button>
                                         </form>

                                         {{-- DELETE OUTLINE --}}
                                         <form action="{{ route('subcategory.destroy', $subcategory->id) }}"
                                             method="POST"
                                             onsubmit="return confirm('Yakin ingin menghapus sub kategori ini?')">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit"
                                                 title="Hapus Sub Kategori"
                                                 class="w-10 h-10 inline-flex items-center justify-center bg-red-50/70 border border-red-200 text-red-500 hover:bg-red-500 hover:text-white hover:border-red-500 rounded-xl transition duration-200 shadow-sm active:scale-95">
                                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10" />
                                                 </svg>
                                             </button>
                                         </form>

                                     </div>
                                     @endif

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

            {{-- KARTU KELOLA ARSIP FISIK TAHUN TERDAHULU (LEBARNYA MENGIKUTI KARTU UTAMA DI ATAS) --}}
            <div class="bg-white/90 backdrop-blur-xl border border-white/80 rounded-3xl shadow-xl shadow-gray-200/50 p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center shrink-0 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-gray-800">Kelola Arsip Fisik Tahun Terdahulu</h3>
                        <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Buka halaman tersendiri untuk melakukan Upload, Lihat, Unduh, Edit, dan Hapus berkas Excel.</p>
                    </div>
                </div>
                
                <a href="{{ route('category.manageArsipFisik', $category->id) }}" 
                   class="shrink-0 group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold text-xs rounded-xl shadow-lg shadow-blue-600/20 hover:shadow-xl hover:-translate-y-0.5 active:scale-95 transition duration-200">
                    <span>Buka Kelola Arsip Fisik</span>
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

        </div>

    </div>

</x-app-layout>
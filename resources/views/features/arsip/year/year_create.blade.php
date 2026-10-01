<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4 anim-fade-in">
            <div class="hidden sm:flex w-12 h-12 rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#002766] items-center justify-center text-white shadow-lg shadow-blue-900/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-800 tracking-tight">
                    {{ __('Input Arsip') }}
                </h2>
                <p class="text-sm text-gray-500 mt-0.5">
                    Mengelompokkan arsip berdasarkan tahun dengan mudah
                </p>
            </div>
        </div>
    </x-slot>

    {{-- TOMBOL KEMBALI 3D --}}
    <div class="anim-fade-in">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <a href="{{ route('subcategory.show', $category->id) }}"
               class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-xl bg-white text-gray-700 font-bold text-sm border border-gray-200 shadow-md shadow-gray-200/50 hover:bg-gray-50 hover:text-blue-600 hover:-translate-x-1 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>            
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="py-6 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

            {{-- CARD UTAMA DENGAN PADDING YANG PAS --}}
            <div class="card-3d relative bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 anim-fade-in anim-delay-1 overflow-hidden">
                
                {{-- HEADER CARD MENYATU --}}
                <div class="relative px-8 py-6 bg-gradient-to-r from-[#003A8F] via-blue-800 to-[#002766]">
                    <div class="relative flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">
                                Tambah Tahun Baru
                            </h3>
                            <p class="text-sm text-blue-100 mt-0.5">
                                Mengelompokkan arsip berdasarkan tahun
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FORM --}}
                <div class="p-8 sm:p-10">
                    <form action="{{ route('year.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $category->id }}">

                        {{-- INPUT TAHUN --}}
                        <div class="space-y-2">
                            <label for="year" class="block text-base font-bold text-gray-800">
                                Masukkan Tahun
                            </label>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="number" name="year" id="year"
                                    min="1900" max="2100" value="{{ date('Y') }}"
                                    class="w-full rounded-2xl border-2 border-gray-200 focus:border-blue-600
                                    focus:ring-4 focus:ring-blue-100 pl-14 pr-4 py-3.5 text-lg font-semibold
                                    text-gray-900 transition shadow-inner bg-gray-50/50"
                                    placeholder="2026" required>
                            </div>

                            <p class="text-xs text-gray-500 pl-1">
                                Pastikan tahun sesuai dengan dokumen arsip
                            </p>
                        </div>

                        {{-- AKSI --}}
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-gray-100">
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <span>Data akan tersimpan dengan aman</span>
                            </div>

                            <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3
                                bg-emerald-600 hover:bg-emerald-700
                                text-white font-bold rounded-xl shadow-lg shadow-emerald-600/20
                                hover:shadow-xl hover:-translate-y-0.5 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Tambahkan Tahun
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- STYLING TAMBAHAN --}}
    <style>
        @keyframes pageFadeIn {
            0% { opacity: 0; transform: translateY(15px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .anim-fade-in {
            animation: pageFadeIn 0.45s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        .anim-delay-1 { animation-delay: 0.1s; }
    </style>
</x-app-layout>
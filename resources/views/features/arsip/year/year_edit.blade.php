<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4 anim-fade-in">
            <div class="hidden sm:flex w-12 h-12 rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#002766] items-center justify-center text-white shadow-lg shadow-blue-900/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-800 tracking-tight">
                    {{ __('Edit Tahun Arsip') }}
                </h2>
                <p class="text-sm text-gray-500 mt-0.5">
                    Perbarui informasi tahun untuk organisasi arsip
                </p>
            </div>
        </div>
    </x-slot>

    {{-- TOMBOL KEMBALI 3D --}}
    <div class="anim-fade-in">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <a href="{{ route('subcategory.show', $year->id) }}"
               class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-xl bg-white text-gray-700 font-bold text-sm border border-gray-200 shadow-md shadow-gray-200/50 hover:bg-gray-50 hover:text-blue-600 hover:-translate-x-1 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>            
        </div>
    </div>

    <div class="py-6 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- CARD UTAMA DENGAN EFEK 3D DEPTH & GLASSMORPHISM --}}
            <div class="card-3d relative overflow-hidden bg-white/95 backdrop-blur-xl rounded-3xl border border-white/80 shadow-2xl shadow-blue-900/10 anim-fade-in anim-delay-1">
                
                {{-- Aksen Garis Atas 3D Gradient --}}
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>

                {{-- HEADER GRADIENT (MENYATU) --}}
                <div class="relative bg-gradient-to-r from-[#003A8F] via-blue-800 to-[#002766] px-8 py-7 overflow-hidden shadow-lg">
                    <div class="absolute -top-12 -right-12 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-16 -left-16 w-56 h-56 bg-cyan-400/10 rounded-full blur-2xl"></div>

                    <div class="relative flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center shadow-inner">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold text-white tracking-wide">
                                Edit Tahun Arsip
                            </h3>
                            <p class="text-blue-100 text-xs sm:text-sm mt-0.5 opacity-90">
                                Perbarui tahun untuk organisasi arsip
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FORM --}}
                <div class="p-8 sm:p-8">
                    <form action="{{ route('year.update', $year->id) }}" method="POST" class="space-y-6">
                        @method('PUT')
                        @csrf

                        {{-- Tahun Info Box 3D Minimalis --}}
                        <div class="bg-gradient-to-r from-amber-50/90 to-orange-50/90 border border-amber-200/80 rounded-2xl p-4 shadow-sm flex items-start gap-3.5">
                            <div class="w-8 h-8 rounded-xl bg-amber-100 flex items-center justify-center flex-shrink-0 text-amber-600 font-bold mt-0.5 shadow-inner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="text-sm">
                                <p class="font-bold text-amber-900 uppercase tracking-wider text-xs">Informasi Status</p>
                                <p class="text-amber-800 mt-0.5">
                                    Anda sedang mengedit: <span class="font-extrabold underline decoration-amber-400">Tahun: {{ $year->year }}</span>
                                </p>
                            </div>
                        </div>

                        {{-- INPUT TAHUN --}}
                        <div class="space-y-2">
                            <label for="year" class="block text-sm font-bold text-gray-700">
                                Perbarui Tahun
                            </label>

                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>

                                <input type="number" name="year" id="year"
                                    min="1900" max="2100"
                                    value="{{ old('year', $year->year) }}"
                                    class="w-full pl-12 pr-4 py-3.5 rounded-2xl border border-gray-200 bg-gray-50/50 text-gray-800 font-semibold text-base focus:bg-white focus:ring-4 focus:ring-blue-500/15 focus:border-blue-600 transition-all shadow-inner"
                                    placeholder="2025" required>
                            </div>
                            <p class="text-xs text-gray-400 font-medium pl-1">
                                * Masukkan 4 digit angka tahun yang valid.
                            </p>
                        </div>

                        {{-- AKSI --}}
                        <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div class="text-xs font-semibold text-gray-500 flex items-center gap-2.5">
                                <div class="w-7 h-7 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856"/>
                                    </svg>
                                </div>
                                <span>Perubahan akan tersimpan permanen ke dalam sistem.</span>
                            </div>

                            <div class="flex items-center gap-3 w-full sm:w-auto">
                                <a href="{{ route('cabinet.show', $year->cabinet_id) }}"
                                    class="flex-1 sm:flex-none px-6 py-3 rounded-xl font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 shadow-sm active:scale-95 transition-all text-center">
                                    Batal
                                </a>

                                <button type="submit"
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl font-extrabold text-white bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 hover:from-amber-600 hover:to-orange-700 shadow-lg shadow-orange-500/30 hover:shadow-xl hover:shadow-orange-500/40 hover:-translate-y-0.5 active:translate-y-0 active:scale-95 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- STYLING TAMBAHAN UNTUK EFEK 3D & ANIMASI --}}
    <style>
        @keyframes pageFadeIn {
            0% {
                opacity: 0;
                transform: translateY(15px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anim-fade-in {
            animation: pageFadeIn 0.45s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .anim-delay-1 {
            animation-delay: 0.1s;
        }

        .card-3d {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-3d:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 58, 143, 0.15);
        }
    </style>
</x-app-layout>
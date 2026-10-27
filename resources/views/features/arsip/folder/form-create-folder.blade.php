<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    {{-- CONTAINER UTAMA --}}
    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- BAR NAVIGASI KEMBALI (LEGA & RAPI) --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-1">
                <a href="{{ route('rack.show', $rack->id) }}"
                    class="inline-flex items-center gap-2.5 bg-white text-slate-800 px-4 py-2.5 rounded-xl border-2 border-slate-200
                    shadow-sm hover:border-blue-600 hover:text-blue-700 hover:shadow-md hover:-translate-y-0.5 active:scale-95 transition-all duration-200 w-fit">
                    <div class="w-6 h-6 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <span class="text-sm font-bold">Kembali ke Rak</span>
                </a>

                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl border border-slate-200 shadow-sm text-xs text-slate-700 font-semibold w-fit">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Menambahkan ke: <span class="text-blue-900 font-black text-sm ml-1">{{ $rack->rack_name ?? 'Rak Arsip' }}</span></span>
                </div>
            </div>

            {{-- CARD UTAMA 3D (ELEVATED & LUXURY) --}}
            <div class="overflow-hidden rounded-3xl shadow-xl shadow-slate-300/60 border-2 border-slate-200 bg-white transition-all">

                {{-- HEADER CARD BIRU TVRI DENGAN INLINE GRADIENT --}}
                <div class="relative px-7 sm:px-9 py-7 overflow-hidden border-b border-blue-900/30"
                     style="background: linear-gradient(120deg, #002766 0%, #003A8F 52%, #0056C7 100%) !important; color: #ffffff !important;">

                    {{-- Ambient Light 3D --}}
                    <div class="absolute -right-8 -bottom-8 w-44 h-44 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="relative z-10 flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 shadow-inner shrink-0">
                            <svg class="w-7 h-7 text-cyan-300 drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-0.5 text-[11px] font-bold uppercase tracking-wider rounded-full mb-1 border border-white/30"
                                  style="background: rgba(255, 255, 255, 0.2) !important; color: #ffffff !important;">
                                Pembuatan Folder Baru
                            </span>
                            <h3 class="text-2xl font-black text-white tracking-tight drop-shadow-sm" style="color: #ffffff !important;">
                                Tambah Folder Arsip
                            </h3>
                            <p class="text-xs sm:text-sm mt-0.5 font-medium" style="color: #dbeafe !important;">
                                Lengkapi data folder berikut untuk mengelompokkan dokumen arsip.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FORM INPUT --}}
                <div class="p-7 sm:p-9">
                    <form action="{{ route('folder.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="rack_id" value="{{ $rack->id }}">

                        {{-- NAMA FOLDER ARSIP --}}
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                </svg>
                                <span>Nama Folder Arsip</span>
                            </label>

                            <div class="relative">
                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-bold text-base border-2 @error('name') border-rose-500 @else border-slate-300 @enderror focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal"
                                    placeholder="Contoh: Berkas SP2D Januari 2026..."
                                    required>

                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </div>
                            </div>

                            @error('name')
                                <p class="text-rose-600 text-xs font-bold mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="text-xs font-semibold text-slate-500">Tentukan nama folder arsip sesuai kelompok berkas yang akan disimpan.</p>
                        </div>

                        {{-- DESKRIPSI / KETERANGAN --}}
                        <div class="space-y-2">
                            <label for="deskripsi" class="block text-sm font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span>Deskripsi / Keterangan Folder</span>
                            </label>

                            <textarea name="deskripsi"
                                id="deskripsi"
                                rows="3"
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-semibold text-sm border-2 @error('deskripsi') border-rose-500 @else border-slate-300 @enderror focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition-all placeholder:text-slate-400 placeholder:font-normal resize-none"
                                placeholder="Tuliskan keterangan rentang bulan, tahun, atau rincian isi dokumen..."
                                required>{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
                                <p class="text-rose-600 text-xs font-bold mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="text-xs font-semibold text-slate-500">Informasi tambahan untuk mempermudah identifikasi isi folder fisik di rak.</p>
                        </div>

                        {{-- TOMBOL AKSI 3D --}}
                        <div class="flex items-center justify-between gap-3.5 pt-4 border-t-2 border-slate-100">
                            <span class="text-xs font-semibold text-slate-500 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                Semua field wajib diisi
                            </span>

                            <div class="flex items-center gap-3">
                                {{-- Tombol Batal --}}
                                <a href="{{ route('rack.show', $rack->id) }}"
                                    class="px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-slate-700 bg-slate-200 hover:bg-slate-300 border border-slate-300 active:scale-95 transition-all text-center">
                                    Batal
                                </a>

                                {{-- Tombol Simpan 3D --}}
                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl font-extrabold text-xs uppercase tracking-wider shadow-lg shadow-emerald-700/30 hover:shadow-xl hover:-translate-y-0.5 active:scale-95 transition-all duration-200"
                                    style="background: linear-gradient(135deg, #059669 0%, #047857 100%) !important; color: #ffffff !important;">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Simpan Folder</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

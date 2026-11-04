<x-app-layout>

    {{-- =========================
        HEADER
    ========================== --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 tracking-tight flex items-center gap-2.5">
                    Dashboard Administrator
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Panel pengawasan terpadu untuk monitoring arsip digital, pengguna, dan aktivitas sistem.
                </p>
            </div>

            <div
                class="hidden sm:flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200/80 rounded-2xl text-blue-700 text-xs font-bold shadow-sm shadow-blue-100"
            >
                <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                <svg
                    class="w-4 h-4 text-blue-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955
                           11.955 0 0112 2.944a11.955 11.955
                           0 01-8.618 3.04A12.02 12.02
                           0 003 9c0 5.591 3.824 10.29
                           9 11.622C17.176 19.29 21 14.591
                           21 9c0-1.042-.133-2.052-.382-3.016z"
                    />
                </svg>

                Administrator Sistem
            </div>
        </div>
    </x-slot>


    {{-- =========================
        MAIN CONTENT
    ========================== --}}
    <div class="py-8 bg-gradient-to-b from-slate-50/70 via-blue-50/30 to-slate-100/80 min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">


            {{-- =========================
                WELCOME HERO (3D LAYERED)
            ========================== --}}
            <div class="relative overflow-hidden rounded-3xl p-7 md:p-9 text-white shadow-[0_20px_50px_rgba(0,39,102,0.28)] border border-blue-400/20"
                 style="background: linear-gradient(130deg, #001B44 0%, #00337C 35%, #004FA8 70%, #0072FF 100%) !important;">

                {{-- 3D Ambient Glowing Orbs Background --}}
                <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-cyan-400/20 blur-3xl pointer-events-none animate-pulse" style="animation-duration: 6s;"></div>
                <div class="absolute -bottom-24 -left-20 w-80 h-80 rounded-full bg-blue-500/25 blur-3xl pointer-events-none animate-pulse" style="animation-duration: 8s;"></div>
                <div class="absolute top-1/2 left-1/3 w-64 h-64 rounded-full bg-indigo-500/15 blur-2xl pointer-events-none"></div>


                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-7">
                    <div class="max-w-2xl">

                        {{-- Tag Badge dengan Live Pulse Dot --}}
                        <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-xs font-bold tracking-wider uppercase mb-3.5 shadow-inner">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-[0_0_8px_#34D399] animate-pulse"></span>
                            <span class="text-white drop-shadow-sm">TVRI Kalimantan Selatan &bull; Administrator Sistem</span>
                        </div>

                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight leading-snug text-white drop-shadow-md">
                            Selamat Datang di Dashboard Admin
                        </h1>

                        <p class="text-blue-100 text-sm md:text-base mt-2.5 leading-relaxed font-normal max-w-xl">
                            Panel pengawasan terpadu untuk monitoring berkas arsip digital, verifikasi berkas, dan pengelolaan sistem secara real-time.
                        </p>

                        {{-- Tanggal Hari Ini & Status Server --}}
                        <div class="flex flex-wrap items-center gap-4 mt-6 text-xs font-semibold text-blue-100">
                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/10 border border-white/15 backdrop-blur-sm">
                                <svg class="w-4 h-4 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ now()->isoFormat('dddd, D MMMM YYYY') }}</span>
                            </div>

                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-emerald-500/20 border border-emerald-400/30 text-emerald-200">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                                <span>Sistem Berjalan Normal</span>
                            </div>
                        </div>
                    </div>

                    {{-- Widget Ringkasan Kanan (3D Glassmorphism Card) --}}
                    <div class="shrink-0 bg-white/10 hover:bg-white/15 border border-white/25 hover:border-white/40 backdrop-blur-xl p-5 sm:p-6 rounded-3xl shadow-[0_15px_35px_rgba(0,0,0,0.2)] flex items-center gap-4 md:min-w-[275px] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(0,0,0,0.3)]">
                        <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-white/25 to-white/10 flex items-center justify-center border border-white/30 shadow-inner">
                            <svg class="w-7 h-7 text-white drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[11px] font-extrabold uppercase tracking-widest text-cyan-200">
                                Total Seluruh Arsip
                            </p>
                            <p class="text-3xl sm:text-4xl font-black mt-0.5 tracking-tight text-white drop-shadow">
                                {{ number_format($arsip ?? 0, 0, ',', '.') }}
                            </p>
                            <p class="text-xs mt-1 text-blue-200 font-medium">
                                Berkas digital tersimpan
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($jumlahPermohonanHapus) && $jumlahPermohonanHapus > 0)
                {{-- BANNER 3D PERINGATAN PERMOHONAN HAPUS --}}
                <div style="background: linear-gradient(135deg, #FEF2F2 0%, #FFF5F5 100%); border: 2px solid #FCA5A5; box-shadow: 0 10px 25px -5px rgba(220, 38, 38, 0.15);"
                     class="p-5 sm:p-6 rounded-3xl flex flex-col sm:flex-row sm:items-center justify-between gap-5 transition-all hover:shadow-[0_15px_30px_rgba(220,38,38,0.22)]">
                    <div class="flex items-center gap-4">
                        <div style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%); color: #FFFFFF;" class="w-13 h-13 rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-red-500/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex flex-wrap items-center gap-2.5">
                                <h4 class="text-base sm:text-lg font-black text-red-950">
                                    Perhatian: Ada {{ $jumlahPermohonanHapus }} Permohonan Hapus Arsip
                                </h4>
                                <span style="background-color: #DC2626; color: #FFFFFF;" class="px-2.5 py-0.5 rounded-full text-xs font-black shadow-sm flex items-center gap-1.5 animate-pulse">
                                    <span class="w-2 h-2 rounded-full bg-white"></span>
                                    Menunggu Tindakan
                                </span>
                            </div>
                            <p class="text-xs sm:text-sm text-red-700 mt-1 font-medium leading-relaxed">
                                Pengguna telah mengajukan penghapusan berkas arsip digital. Periksa alasan pemohon dan verifikasi tindakan persetujuan Anda.
                            </p>
                        </div>
                    </div>
                    <button
                        type="button"
                        onclick="switchAdminTab('permohonan')"
                        style="background: linear-gradient(135deg, #DC2626 0%, #991B1B 100%); color: #FFFFFF; padding: 12px 22px; font-size: 13px; font-weight: 800; border-radius: 16px; border: none; box-shadow: 0 6px 18px rgba(220, 38, 38, 0.4);"
                        class="cursor-pointer transition-all hover:scale-105 active:scale-95 whitespace-nowrap self-start sm:self-auto flex items-center gap-2"
                    >
                        <span>Buka Permohonan</span>
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>
            @endif


            {{-- =========================================================
                3D INTERACTIVE STATISTICS CARDS
            ========================================================== --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- CARD 1: JUMLAH ARSIP --}}
                <div class="admin-stat-card group bg-white rounded-3xl p-6 border border-slate-200/80 shadow-[0_10px_25px_-5px_rgba(0,58,143,0.08),0_8px_10px_-6px_rgba(0,58,143,0.03)] hover:shadow-[0_22px_35px_-8px_rgba(0,58,143,0.18)] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                    
                    {{-- Ambient Background Glow --}}
                    <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-blue-100/60 group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>

                    <div class="relative z-10 flex items-start justify-between">
                        <div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 text-[#003A8F] text-[11px] font-extrabold uppercase tracking-wider mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#003A8F]"></span>
                                Data Arsip
                            </span>
                            <p class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mt-1">
                                {{ number_format($arsip ?? 0, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-slate-500 mt-2 font-medium flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Berkas arsip digital tersimpan
                            </p>
                        </div>

                        {{-- 3D Icon Box --}}
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#0066CC] text-white flex items-center justify-center shadow-[0_10px_20px_-3px_rgba(0,58,143,0.35),inset_0_2px_4px_rgba(255,255,255,0.4)] group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 002 2h10a2 2 0 002-2V8.828a2 2 0 00-.586-1.414l-4.828-4.828A2 2 0 0012.172 2H7a2 2 0 00-2 2v15z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3v5h5"/>
                            </svg>
                        </div>
                    </div>

                    {{-- 3D Bottom Accent Bar --}}
                    <div class="absolute bottom-0 left-0 h-1.5 w-full bg-gradient-to-r from-[#003A8F] via-[#0066CC] to-[#00AEEF]"></div>
                </div>


                {{-- CARD 2: JUMLAH PENGAJUAN --}}
                <div class="admin-stat-card group bg-white rounded-3xl p-6 border border-slate-200/80 shadow-[0_10px_25px_-5px_rgba(0,174,239,0.08),0_8px_10px_-6px_rgba(0,174,239,0.03)] hover:shadow-[0_22px_35px_-8px_rgba(0,174,239,0.18)] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                    
                    {{-- Ambient Background Glow --}}
                    <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-cyan-100/60 group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>

                    <div class="relative z-10 flex items-start justify-between">
                        <div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-cyan-50 text-[#0080B8] text-[11px] font-extrabold uppercase tracking-wider mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#00AEEF]"></span>
                                Pengajuan Anggaran
                            </span>
                            <p class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mt-1">
                                {{ number_format($pengajuan ?? 0, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-slate-500 mt-2 font-medium flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Total proses pengajuan
                            </p>
                        </div>

                        {{-- 3D Icon Box --}}
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#0066CC] to-[#00AEEF] text-white flex items-center justify-center shadow-[0_10px_20px_-3px_rgba(0,174,239,0.35),inset_0_2px_4px_rgba(255,255,255,0.4)] group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>

                    {{-- 3D Bottom Accent Bar --}}
                    <div class="absolute bottom-0 left-0 h-1.5 w-full bg-gradient-to-r from-[#0066CC] to-[#00D4FF]"></div>
                </div>


                {{-- CARD 3: JUMLAH USER --}}
                <div class="admin-stat-card group bg-white rounded-3xl p-6 border border-slate-200/80 shadow-[0_10px_25px_-5px_rgba(99,102,241,0.08),0_8px_10px_-6px_rgba(99,102,241,0.03)] hover:shadow-[0_22px_35px_-8px_rgba(99,102,241,0.18)] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                    
                    {{-- Ambient Background Glow --}}
                    <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-indigo-100/60 group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>

                    <div class="relative z-10 flex items-start justify-between">
                        <div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-indigo-50 text-[#4338CA] text-[11px] font-extrabold uppercase tracking-wider mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#4F46E5]"></span>
                                Akun Terdaftar
                            </span>
                            <p class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mt-1">
                                {{ number_format($akun ?? 0, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-slate-500 mt-2 font-medium flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Pengguna sistem aktif
                            </p>
                        </div>

                        {{-- 3D Icon Box --}}
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#0056B3] to-[#4F46E5] text-white flex items-center justify-center shadow-[0_10px_20px_-3px_rgba(79,70,229,0.35),inset_0_2px_4px_rgba(255,255,255,0.4)] group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>

                    {{-- 3D Bottom Accent Bar --}}
                    <div class="absolute bottom-0 left-0 h-1.5 w-full bg-gradient-to-r from-[#0056B3] to-[#4F46E5]"></div>
                </div>

            </div>


            {{-- =========================================================
                MAIN CONTAINER: ARSIP DIGITAL & TABS
            ========================================================== --}}
            <div class="bg-white rounded-3xl border border-slate-200/90 shadow-[0_20px_50px_rgba(0,58,143,0.07)] overflow-hidden">

                {{-- HEADER SECTION --}}
                <div class="px-6 sm:px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 via-white to-blue-50/40">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#00AEEF] text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">
                                    Arsip Digital
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 mt-0.5">
                                    Daftar arsip digital terbaru yang tersimpan di dalam sistem.
                                </p>
                            </div>
                        </div>

                        {{-- Total Badge --}}
                        <div class="inline-flex items-center gap-2 self-start sm:self-auto px-4 py-2 rounded-2xl bg-white border border-slate-200 text-[#003A8F] font-black text-xs shadow-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#00AEEF] shadow-[0_0_6px_#00AEEF]"></span>
                            <span>{{ number_format($arsip ?? 0, 0, ',', '.') }} Total Arsip</span>
                        </div>
                    </div>
                </div>

                {{-- 3D SEGMENTED TAB SWITCHER --}}
                <div class="px-6 sm:px-8 py-4 bg-slate-50/70 border-b border-slate-200/80 flex items-center justify-start overflow-x-auto">
                    <div class="p-1.5 bg-slate-200/70 rounded-2xl border border-slate-300/60 inline-flex items-center gap-1.5 shadow-inner">
                        
                        {{-- Tab 1: Semua Arsip --}}
                        <button
                            type="button"
                            id="tabBtnSemua"
                            onclick="switchAdminTab('semua')"
                            style="background-color: #FFFFFF; color: #003A8F; box-shadow: 0 4px 14px rgba(0, 58, 143, 0.12);"
                            class="tab-btn px-4 py-2.5 text-xs sm:text-sm font-black rounded-xl transition-all duration-200 flex items-center gap-2.5 whitespace-nowrap cursor-pointer"
                        >
                            <svg class="w-4 h-4 text-[#003A8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <span>Semua Arsip Digital</span>
                            <span id="badgeCountSemua" style="background-color: #DBEAFE; color: #003A8F;" class="px-2.5 py-0.5 rounded-full text-xs font-black">
                                {{ $arsip }}
                            </span>
                        </button>

                        {{-- Tab 2: Permohonan Hapus --}}
                        <button
                            type="button"
                            id="tabBtnPermohonan"
                            onclick="switchAdminTab('permohonan')"
                            style="background-color: transparent; color: #64748B; box-shadow: none;"
                            class="tab-btn px-4 py-2.5 text-xs sm:text-sm font-bold rounded-xl transition-all duration-200 flex items-center gap-2.5 whitespace-nowrap cursor-pointer hover:text-slate-900"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span>Permohonan Hapus Arsip</span>
                            @if(($jumlahPermohonanHapus ?? 0) > 0)
                                <span style="background-color: #DC2626 !important; color: #FFFFFF !important;" class="px-2.5 py-0.5 rounded-full text-xs font-black shadow-sm animate-pulse">
                                    {{ $jumlahPermohonanHapus }} Menunggu
                                </span>
                            @else
                                <span style="background-color: #E2E8F0; color: #64748B;" class="px-2.5 py-0.5 rounded-full text-xs font-bold">
                                    0
                                </span>
                            @endif
                        </button>

                    </div>
                </div>

                {{-- TAB CONTENT 1: SEMUA ARSIP DIGITAL --}}
                <div id="tabContentSemua" class="p-5 sm:p-8 space-y-3.5">

                    @forelse ($arsiplist as $ar)

                        <div
                            class="group bg-white rounded-2xl border border-slate-200/80 p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-[0_12px_28px_rgba(0,58,143,0.1)] hover:border-blue-300 hover:-translate-y-1 transition-all duration-300"
                        >

                            <div class="flex items-start sm:items-center gap-4 flex-1 min-w-0">

                                {{-- 3D NUMBER BADGE --}}
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#00AEEF] text-white font-black text-sm flex items-center justify-center shrink-0 shadow-md shadow-blue-500/25 group-hover:scale-105 group-hover:shadow-blue-500/40 transition-all duration-300">
                                    {{ $arsiplist->firstItem() + $loop->index }}
                                </div>

                                {{-- INFORMASI ARSIP --}}
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <a href="{{ route('digital.show', $ar->id) }}" class="font-extrabold text-slate-900 group-hover:text-[#003A8F] transition-colors text-base truncate block max-w-xl">
                                            {{ $ar->archive_name }}
                                        </a>

                                        @if(!empty($ar->kategori))
                                            <span style="background-color: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE;" class="px-2.5 py-0.5 rounded-lg text-[11px] font-bold">
                                                {{ $ar->kategori }}
                                            </span>
                                        @else
                                            <span style="background-color: #F1F5F9; color: #475569; border: 1px solid #E2E8F0;" class="px-2.5 py-0.5 rounded-lg text-[11px] font-semibold">
                                                Arsip Digital
                                            </span>
                                        @endif
                                    </div>

                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-slate-500 font-medium">
                                        <span class="flex items-center gap-1 text-slate-600">
                                            <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                            Kode: <strong class="text-slate-800">{{ $ar->archive_code ?: '-' }}</strong>
                                        </span>

                                        <span>&bull;</span>

                                        <span class="flex items-center gap-1 text-slate-600">
                                            <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            Divisi: <strong class="text-slate-800">{{ $ar->from_division ?: 'Umum' }}</strong>
                                        </span>

                                        <span>&bull;</span>

                                        <span class="flex items-center gap-1 text-slate-400">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $ar->created_at ? $ar->created_at->diffForHumans() : '-' }}
                                        </span>
                                    </div>
                                </div>

                            </div>

                            {{-- 3D ACTION BUTTON --}}
                            <div class="flex items-center justify-end shrink-0 pt-2 sm:pt-0">
                                <a
                                    href="{{ route('digital.show', $ar->id) }}"
                                    style="background: linear-gradient(135deg, #003A8F 0%, #0066CC 100%); color: #FFFFFF; padding: 10px 20px; font-size: 13px; font-weight: 800; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(0, 58, 143, 0.28);"
                                    class="cursor-pointer transition-all duration-200 hover:brightness-110 hover:scale-105 active:scale-95 inline-flex items-center gap-2 group-hover:shadow-[0_6px_20px_rgba(0,58,143,0.38)]"
                                >
                                    <span>Lihat</span>
                                    <svg class="w-4 h-4 text-white transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                        </div>

                    @empty

                        {{-- EMPTY STATE --}}
                        <div class="py-20 text-center">
                            <div class="mx-auto w-20 h-20 rounded-3xl bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-200/80 flex items-center justify-center text-[#0066CC] mb-4 shadow-inner">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6"/>
                                </svg>
                            </div>

                            <h4 class="text-lg font-black text-slate-800">
                                Belum Ada Arsip
                            </h4>

                            <p class="text-sm text-slate-400 mt-1 max-w-sm mx-auto">
                                Belum terdapat berkas arsip digital yang tersimpan di dalam sistem.
                            </p>
                        </div>

                    @endforelse

                    @if ($arsiplist->hasPages())
                        <div class="mt-8 pt-4 border-t border-slate-100 flex items-center justify-between">
                            {{ $arsiplist->links() }}
                        </div>
                    @endif

                </div>

                {{-- TAB CONTENT 2: PERMOHONAN HAPUS ARSIP --}}
                <div id="tabContentPermohonan" class="hidden p-5 sm:p-8">
                    @if(($jumlahPermohonanHapus ?? 0) === 0)
                        {{-- EMPTY STATE: TIDAK ADA PERMOHONAN --}}
                        <div class="text-center py-20 px-4">
                            <div class="w-20 h-20 mx-auto rounded-3xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600 shadow-sm mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h4 class="text-lg font-black text-slate-800">Tidak Ada Permohonan Hapus</h4>
                            <p class="text-xs sm:text-sm text-slate-500 mt-1.5 max-w-md mx-auto">
                                Semua berkas arsip digital dalam kondisi aman. Tidak ada permintaan penghapusan arsip yang menunggu verifikasi Anda saat ini.
                            </p>
                        </div>
                    @else
                        {{-- DAFTAR PERMOHONAN HAPUS --}}
                        <div class="mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-4">
                            <div>
                                <h4 class="text-base font-black text-slate-900">Menunggu Persetujuan Admin</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Terdapat <strong class="text-red-600 font-bold">{{ $jumlahPermohonanHapus }} arsip</strong> yang diajukan untuk dihapus. Periksa alasan pemohon dan tentukan tindakan.</p>
                            </div>
                            <span class="px-3.5 py-1.5 rounded-xl bg-red-50 text-red-700 border border-red-200 text-xs font-black self-start sm:self-auto flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                                {{ $jumlahPermohonanHapus }} Permohonan Aktif
                            </span>
                        </div>

                        <div class="space-y-4">
                            @foreach($permohonanHapus as $idx => $reqArchive)
                                <div class="bg-white border-2 border-red-100 hover:border-red-300 rounded-3xl p-5 sm:p-6 shadow-[0_4px_16px_rgba(220,38,38,0.06)] hover:shadow-[0_12px_28px_rgba(220,38,38,0.12)] transition-all duration-300">
                                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
                                        
                                        {{-- INFO ARSIP --}}
                                        <div class="flex items-start gap-4">
                                            <div style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%); color: #FFFFFF;" class="w-12 h-12 rounded-2xl font-black text-sm flex items-center justify-center shrink-0 shadow-md shadow-red-500/30">
                                                {{ $idx + 1 }}
                                            </div>

                                            <div class="space-y-1.5 flex-1 min-w-0">
                                                <div class="flex flex-wrap items-center gap-2">
                                                    <h4 class="text-base font-extrabold text-slate-900">
                                                        {{ $reqArchive->archive_name }}
                                                    </h4>
                                                    <span style="background-color: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE;" class="px-2.5 py-0.5 rounded-lg text-[11px] font-bold">
                                                        {{ $reqArchive->kategori ?? 'Tanpa Kategori' }}
                                                    </span>
                                                    <span style="background-color: #FEF3C7; color: #92400E; border: 1px solid #FDE68A;" class="px-2.5 py-0.5 rounded-lg text-[11px] font-bold">
                                                        ⏳ Menunggu Persetujuan
                                                    </span>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-slate-600 font-medium">
                                                    <span>Kode Arsip: <strong class="text-slate-900">{{ $reqArchive->archive_code ?: '-' }}</strong></span>
                                                    <span>&bull;</span>
                                                    <span>Diajukan: <strong class="text-slate-900">{{ $reqArchive->submiter_name ?: ($reqArchive->archive_by ?: 'Pengguna') }}</strong></span>
                                                    <span>&bull;</span>
                                                    <span>Tanggal Kuitansi: <strong class="text-slate-900">{{ $reqArchive->tanggal_kuitansi_display }}</strong></span>
                                                </div>

                                                {{-- KOTAK ALASAN PENGHAPUSAN --}}
                                                <div style="background-color: #FEF2F2; border: 1.5px solid #FECACA;" class="mt-3 p-3.5 rounded-2xl">
                                                    <div class="flex items-center gap-2 text-xs font-bold text-red-900 mb-1">
                                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                                        </svg>
                                                        <span class="font-bold text-red-950">Alasan Penghapusan dari Pemohon:</span>
                                                    </div>
                                                    <p class="text-xs text-slate-800 leading-relaxed font-semibold pl-6">
                                                        {{ $reqArchive->keterangan ?: 'Tidak ada alasan tertulis' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- TOMBOL AKSI ADMIN --}}
                                        <div class="flex flex-wrap items-center gap-2.5 shrink-0 pt-3 lg:pt-0 border-t lg:border-t-0 border-slate-100 justify-end">
                                            {{-- Tombol Lihat Berkas --}}
                                            <a
                                                href="{{ route('digital.show', $reqArchive->id) }}"
                                                target="_blank"
                                                style="background-color: #F8FAFC; color: #1E293B; border: 1.5px solid #CBD5E1; padding: 10px 18px; font-size: 12.5px; font-weight: 700; border-radius: 12px;"
                                                class="transition hover:bg-slate-100 shadow-sm flex items-center gap-1.5 cursor-pointer"
                                                title="Lihat Detail & Berkas"
                                            >
                                                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                <span class="text-slate-800 font-bold">Lihat Berkas</span>
                                            </a>

                                            {{-- Tombol Tolak Permohonan --}}
                                            <button
                                                type="button"
                                                onclick="openRejectModal('{{ route('digital.rejectDelete', $reqArchive->id) }}', '{{ addslashes($reqArchive->archive_name) }}')"
                                                style="background-color: #475569; color: #FFFFFF; border: none; padding: 10px 18px; font-size: 12.5px; font-weight: 700; border-radius: 12px; box-shadow: 0 4px 10px rgba(71, 85, 105, 0.25);"
                                                class="transition hover:bg-slate-700 flex items-center gap-1.5 cursor-pointer active:scale-95"
                                                title="Tolak Permohonan Hapus"
                                            >
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                                <span class="text-white font-bold">Tolak</span>
                                            </button>

                                            {{-- Tombol Setujui Hapus Permanen --}}
                                            <button
                                                type="button"
                                                onclick="openApproveModal('{{ route('digital.destroy', $reqArchive->id) }}', '{{ addslashes($reqArchive->archive_name) }}')"
                                                style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%); color: #FFFFFF; border: none; padding: 10px 18px; font-size: 12.5px; font-weight: 700; border-radius: 12px; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35);"
                                                class="transition hover:brightness-110 flex items-center gap-1.5 cursor-pointer active:scale-95"
                                                title="Setujui Hapus Permanen"
                                            >
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                <span class="text-white font-bold">Setujui Hapus</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        MODAL KONFIRMASI TINDAKAN ADMIN (SETUJUI / TOLAK)
    ========================================================== --}}
    <div id="adminActionModal" class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" onclick="closeAdminActionModal()"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all sm:w-full sm:max-w-lg p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">
                
                {{-- Icon Container --}}
                <div id="actionModalIconBg" class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl mb-4 shadow-inner">
                    <div id="actionModalIcon"></div>
                </div>

                {{-- Content --}}
                <div class="text-center">
                    <h3 class="text-xl font-black text-gray-900" id="actionModalTitle">Konfirmasi Tindakan</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed" id="actionModalDesc">
                        Apakah Anda yakin ingin melanjutkan tindakan ini?
                    </p>
                    <div class="mt-4 p-3.5 border rounded-xl text-sm font-bold text-slate-800 line-clamp-2" id="actionModalArchiveName" style="background-color: #F8FAFC !important; border: 1px solid #E2E8F0;">
                        -
                    </div>
                </div>

                {{-- Form Aksi --}}
                <form id="adminActionForm" method="POST" action="" class="mt-7 w-full">
                    @csrf
                    <input type="hidden" name="_method" id="adminActionMethod" value="POST">

                    <div class="grid grid-cols-2 gap-4 w-full">
                        <button
                            type="button"
                            onclick="closeAdminActionModal()"
                            style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                            class="w-full transition hover:bg-slate-100 cursor-pointer flex items-center justify-center text-center"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            id="adminActionSubmitBtn"
                            style="background-color: #DC2626; color: #FFFFFF; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35); min-height: 48px;"
                            class="w-full transition hover:brightness-110 cursor-pointer flex items-center justify-center gap-2 text-center"
                        >
                            <span id="adminActionSubmitText">Konfirmasi</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Script Tab Switcher & Modal Aksi --}}
    <script>
        function switchAdminTab(tabName) {
            const tabBtnSemua = document.getElementById('tabBtnSemua');
            const tabBtnPermohonan = document.getElementById('tabBtnPermohonan');
            const contentSemua = document.getElementById('tabContentSemua');
            const contentPermohonan = document.getElementById('tabContentPermohonan');

            if (!tabBtnSemua || !tabBtnPermohonan || !contentSemua || !contentPermohonan) return;

            if (tabName === 'permohonan') {
                contentSemua.classList.add('hidden');
                contentPermohonan.classList.remove('hidden');

                // Tab Permohonan Active (3D Card)
                tabBtnPermohonan.style.backgroundColor = '#FFFFFF';
                tabBtnPermohonan.style.color = '#DC2626';
                tabBtnPermohonan.style.boxShadow = '0 4px 14px rgba(220, 38, 38, 0.15)';
                tabBtnPermohonan.classList.add('font-black');

                // Tab Semua Inactive
                tabBtnSemua.style.backgroundColor = 'transparent';
                tabBtnSemua.style.color = '#64748B';
                tabBtnSemua.style.boxShadow = 'none';
                tabBtnSemua.classList.remove('font-black');
            } else {
                contentPermohonan.classList.add('hidden');
                contentSemua.classList.remove('hidden');

                // Tab Semua Active (3D Card)
                tabBtnSemua.style.backgroundColor = '#FFFFFF';
                tabBtnSemua.style.color = '#003A8F';
                tabBtnSemua.style.boxShadow = '0 4px 14px rgba(0, 58, 143, 0.12)';
                tabBtnSemua.classList.add('font-black');

                // Tab Permohonan Inactive
                tabBtnPermohonan.style.backgroundColor = 'transparent';
                tabBtnPermohonan.style.color = '#64748B';
                tabBtnPermohonan.style.boxShadow = 'none';
                tabBtnPermohonan.classList.remove('font-black');
            }
        }

        function openApproveModal(actionUrl, archiveName) {
            const modal = document.getElementById('adminActionModal');
            const form = document.getElementById('adminActionForm');
            const methodInput = document.getElementById('adminActionMethod');
            const iconBg = document.getElementById('actionModalIconBg');
            const icon = document.getElementById('actionModalIcon');
            const title = document.getElementById('actionModalTitle');
            const desc = document.getElementById('actionModalDesc');
            const archiveNameEl = document.getElementById('actionModalArchiveName');
            const submitBtn = document.getElementById('adminActionSubmitBtn');
            const submitText = document.getElementById('adminActionSubmitText');

            form.action = actionUrl;
            methodInput.value = 'DELETE';
            
            iconBg.style.backgroundColor = '#FEF2F2';
            icon.innerHTML = `<svg style="width: 32px; height: 32px; color: #DC2626;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>`;
            
            title.textContent = 'Setujui & Hapus Permanen?';
            desc.textContent = 'Arsip beserta seluruh berkas PDF fisiknya di server akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.';
            archiveNameEl.textContent = archiveName;
            
            submitBtn.style.backgroundColor = '#DC2626';
            submitText.textContent = 'Ya, Setujui & Hapus';

            modal.classList.remove('hidden');
        }

        function openRejectModal(actionUrl, archiveName) {
            const modal = document.getElementById('adminActionModal');
            const form = document.getElementById('adminActionForm');
            const methodInput = document.getElementById('adminActionMethod');
            const iconBg = document.getElementById('actionModalIconBg');
            const icon = document.getElementById('actionModalIcon');
            const title = document.getElementById('actionModalTitle');
            const desc = document.getElementById('actionModalDesc');
            const archiveNameEl = document.getElementById('actionModalArchiveName');
            const submitBtn = document.getElementById('adminActionSubmitBtn');
            const submitText = document.getElementById('adminActionSubmitText');

            form.action = actionUrl;
            methodInput.value = 'POST';
            
            iconBg.style.backgroundColor = '#F1F5F9';
            icon.innerHTML = `<svg style="width: 32px; height: 32px; color: #475569;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>`;
            
            title.textContent = 'Tolak Permohonan Hapus?';
            desc.textContent = 'Permohonan penghapusan ini akan ditolak dan status arsip akan dikembalikan normal.';
            archiveNameEl.textContent = archiveName;
            
            submitBtn.style.backgroundColor = '#475569';
            submitText.textContent = 'Ya, Tolak Permohonan';

            modal.classList.remove('hidden');
        }

        function closeAdminActionModal() {
            const modal = document.getElementById('adminActionModal');
            if (modal) modal.classList.add('hidden');
        }
    </script>

</x-app-layout>

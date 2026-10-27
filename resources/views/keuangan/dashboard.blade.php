<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-4 animate-fade-in">

            {{-- Ikon di sebelah kiri --}}
            <div
                class="hidden sm:flex w-12 h-12
                       rounded-2xl
                       bg-gradient-to-br from-blue-500 to-indigo-600
                       items-center justify-center
                       text-white
                       shadow-lg shadow-blue-200">

                <svg class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>

                </svg>

            </div>

            {{-- Judul dan Sub-teks --}}
            <div>
                <h2 class="font-extrabold text-2xl text-gray-800 tracking-tight">
                    {{ __('Dashboard Keuangan') }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Monitoring dan verifikasi pengajuan keuangan
                </p>
            </div>

        </div>
    </x-slot>


    <div class="py-8 min-h-screen
                bg-gradient-to-br
                from-slate-50
                via-blue-50/30
                to-indigo-50/20">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="space-y-7">


                {{-- ========================================================= --}}
                {{-- HERO --}}
                {{-- ========================================================= --}}

                {{-- HERO BANNER ROYAL BLUE TVRI --}}
                <div class="relative overflow-hidden rounded-3xl p-7 md:p-9 shadow-2xl shadow-blue-900/25 border border-blue-900/20 text-white animate-fade-in"
                     style="background: linear-gradient(120deg, #002766 0%, #003A8F 52%, #0056C7 100%) !important;">

                    {{-- Ambient Light Background --}}
                    <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-blue-400/15 blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-24 -left-20 w-80 h-80 rounded-full bg-indigo-400/15 blur-3xl pointer-events-none"></div>

                    <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div class="max-w-2xl">

                            {{-- Tag Badge --}}
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/25 text-xs font-bold tracking-wide uppercase mb-3 shadow-inner">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="text-white">TVRI Kalimantan Selatan • Verifikator Keuangan</span>
                            </div>

                            <h1 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight leading-snug text-white">
                                Selamat Datang, Verifikator Keuangan
                            </h1>

                            <p class="text-blue-100 text-sm md:text-base mt-2.5 leading-relaxed font-normal">
                                Panel verifikasi pengajuan anggaran belanja secara terpadu, cepat, dan transparan.
                            </p>

                            {{-- Tanggal Hari Ini --}}
                            <div class="flex items-center gap-2 mt-5 text-xs font-semibold text-blue-100">
                                <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ now()->isoFormat('dddd, D MMMM YYYY') }}</span>
                            </div>
                        </div>

                        {{-- Widget Ringkasan Kanan (Kaca 3D) --}}
                        <div class="shrink-0 bg-white/15 border border-white/30 backdrop-blur-md p-5 md:p-6 rounded-2xl shadow-xl flex items-center gap-4 md:min-w-[265px]">
                            <div class="w-12 h-12 shrink-0 rounded-xl bg-white/15 flex items-center justify-center border border-white/25 shadow-inner">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-blue-100">
                                    Total Pengajuan
                                </p>
                                <p class="text-3xl font-black mt-1 tracking-tight text-white">
                                    {{ $total_pengajuan ?? 0 }}
                                </p>
                                <p class="text-xs mt-1 text-blue-200 font-medium">
                                    Berkas terdaftar
                                </p>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- ========================================================= --}}
                {{-- STATISTIK --}}
                {{-- ========================================================= --}}

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 animate-fade-in animate-delay-1">


                    {{-- Total --}}
                    <div class="stat-card group">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-semibold text-gray-500">
                                    Total Pengajuan
                                </p>

                                <p class="text-3xl font-extrabold text-gray-800 mt-2">
                                    {{ $total_pengajuan ?? 0 }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    Seluruh pengajuan
                                </p>

                            </div>


                            <div
                                class="stat-icon
                                       bg-gradient-to-br
                                       from-slate-100 to-gray-200
                                       text-gray-600">

                                <svg class="w-7 h-7"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- Perlu diperiksa --}}
                    <div class="stat-card group">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-semibold text-gray-500">
                                    Perlu Diperiksa
                                </p>

                                <p class="text-3xl font-extrabold text-orange-600 mt-2">
                                    {{ $perlu_diperiksa ?? 0 }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    Menunggu pemeriksaan
                                </p>

                            </div>


                            <div
                                class="stat-icon
                                       bg-gradient-to-br
                                       from-orange-100 to-amber-100
                                       text-orange-600">

                                <svg class="w-7 h-7"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- Belum diverifikasi --}}
                    <div class="stat-card group">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-semibold text-gray-500">
                                    Belum Diverifikasi
                                </p>

                                <p class="text-3xl font-extrabold text-red-600 mt-2">
                                    {{ $belum_diverifikasi ?? 0 }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    Menunggu verifikasi
                                </p>

                            </div>


                            <div
                                class="stat-icon
                                       bg-gradient-to-br
                                       from-red-100 to-rose-100
                                       text-red-600">

                                <svg class="w-7 h-7"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- Sudah diverifikasi --}}
                    <div class="stat-card group">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-semibold text-gray-500">
                                    Sudah Diverifikasi
                                </p>

                                <p class="text-3xl font-extrabold text-emerald-600 mt-2">
                                    {{ $sudah_diverifikasi ?? 0 }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    Pengajuan selesai diverifikasi
                                </p>

                            </div>


                            <div
                                class="stat-icon
                                       bg-gradient-to-br
                                       from-emerald-100 to-green-100
                                       text-emerald-600">

                                <svg class="w-7 h-7"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>

                                </svg>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- ========================================================= --}}
                {{-- PROGRESS --}}
                {{-- ========================================================= --}}

                @php
                    $total = $total_pengajuan ?? 0;
                    $sudah = $sudah_diverifikasi ?? 0;
                    $progress = $total > 0 ? ($sudah / $total) * 100 : 0;
                    $formattedProgress = number_format($progress, 1);
                @endphp


                <div class="relative overflow-hidden bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7 shadow-[0_10px_30px_-5px_rgba(0,58,143,0.06)] hover:shadow-xl transition-all duration-300 animate-fade-in animate-delay-2">

                    {{-- Ambient Light Halus --}}
                    <div class="absolute -top-16 -right-16 w-52 h-52 bg-blue-100/40 rounded-full blur-3xl pointer-events-none"></div>

                    {{-- Bagian Header: Judul + Persentase Besar --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-5 relative z-10">
                        <div class="flex items-center gap-4">
                            {{-- Ikon Royal Blue TVRI 3D --}}
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-900/25 shrink-0"
                                 style="background: linear-gradient(135deg, #003A8F 0%, #0056C7 100%);">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="text-lg font-black text-gray-900 tracking-tight">
                                        Progress Verifikasi Berkas
                                    </h3>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Real-time
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 mt-0.5">
                                    Tingkat penyelesaian pemeriksaan pengajuan anggaran keuangan
                                </p>
                            </div>
                        </div>

                        {{-- Persentase Besar & Gagah --}}
                        <div class="text-left sm:text-right">
                            <div class="flex items-baseline sm:justify-end gap-1">
                                <span class="text-3xl sm:text-4xl font-black text-gray-900 tracking-tight">
                                    {{ $formattedProgress }}
                                </span>
                                <span class="text-xl font-black text-[#003A8F]">%</span>
                            </div>
                            <span class="text-xs font-semibold text-emerald-600 block mt-0.5">
                                ✓ Hampir Selesai Seluruhnya
                            </span>
                        </div>
                    </div>

                    {{-- Progress Bar Padat & Gagah (Gradasi TVRI Blue ke Emerald) --}}
                    <div class="relative w-full bg-slate-100 rounded-full h-4 overflow-hidden border border-slate-200/80 shadow-inner my-5">
                        <div class="h-full rounded-full transition-all duration-1000 ease-out shadow-sm"
                             style="width: {{ $progress }}%; background: linear-gradient(90deg, #003A8F 0%, #0066CC 55%, #10b981 100%);">
                            {{-- Kilau Kaca Halus Atas --}}
                            <div class="w-full h-1/2 bg-white/30 rounded-t-full"></div>
                        </div>
                    </div>

                    {{-- 3 Mini KPI Cards 3D di Bagian Bawah (Mengisi Ruang Secara Proporsional) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 mt-5 pt-4 border-t border-slate-100 relative z-10">

                        {{-- 1. Sudah Diverifikasi --}}
                        <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-gradient-to-br from-emerald-50/60 to-white border border-emerald-100/90 shadow-sm">
                            <div class="w-9 h-9 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0 shadow-md shadow-emerald-500/20">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-emerald-800">Telah Diverifikasi</p>
                                <p class="text-lg font-black text-gray-900 leading-tight mt-0.5">{{ $sudah }} <span class="text-xs font-normal text-gray-500">berkas</span></p>
                            </div>
                        </div>

                        {{-- 2. Menunggu Verifikasi --}}
                        <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-gradient-to-br from-amber-50/60 to-white border border-amber-100/90 shadow-sm">
                            <div class="w-9 h-9 rounded-xl bg-amber-500 text-white flex items-center justify-center shrink-0 shadow-md shadow-amber-500/20">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-amber-800">Menunggu Tindakan</p>
                                <p class="text-lg font-black text-gray-900 leading-tight mt-0.5">{{ max(0, $total - $sudah) }} <span class="text-xs font-normal text-gray-500">berkas</span></p>
                            </div>
                        </div>

                        {{-- 3. Total Keseluruhan --}}
                        <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-gradient-to-br from-blue-50/60 to-white border border-blue-100/90 shadow-sm">
                            <div class="w-9 h-9 rounded-xl text-white flex items-center justify-center shrink-0 shadow-md shadow-blue-900/20"
                                 style="background: #003A8F;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-blue-900">Total Pengajuan</p>
                                <p class="text-lg font-black text-gray-900 leading-tight mt-0.5">{{ $total }} <span class="text-xs font-normal text-gray-500">berkas</span></p>
                            </div>
                        </div>

                    </div>

                </div>

                {{-- ========================================================= --}}
                {{-- AKSI CEPAT --}}
                {{-- ========================================================= --}}

                <div
                    class="bg-white/95
                           rounded-3xl
                           border border-gray-100
                           shadow-xl shadow-gray-200/50
                           p-6 sm:p-7
                           animate-fade-in animate-delay-3">

                    <div
                        class="flex items-center gap-3
                               mb-5
                               pb-5
                               border-b border-gray-100">

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-gradient-to-br
                                   from-violet-100 to-purple-100
                                   flex items-center justify-center">

                            <svg class="w-5 h-5 text-violet-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-extrabold text-gray-800">
                                Aksi Cepat
                            </h3>

                            <p class="text-xs text-gray-500">
                                Akses menu yang sering digunakan
                            </p>

                        </div>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <a
                            href="{{ route('verification.index') }}"
                            class="quick-action group">

                            <div
                                class="quick-icon
                                       bg-gradient-to-br
                                       from-violet-500 to-purple-600">

                                <svg class="w-5 h-5 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>

                                </svg>

                            </div>

                            <div class="flex-1">

                                <p class="font-extrabold text-gray-800
                                      group-hover:text-violet-600
                                      transition-colors">

                                    Lihat Pengajuan

                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Verifikasi pengajuan yang diajukan
                                </p>

                            </div>

                            <svg
                                class="w-5 h-5 text-gray-300
                                       group-hover:text-violet-500
                                       group-hover:translate-x-1
                                       transition-all"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>

                            </svg>

                        </a>

                    </div>

                </div>



                {{-- ========================================================= --}}
                {{-- FILTER / SEARCH --}}
                {{-- ========================================================= --}}

                <div
                    class="bg-white/95
                           rounded-3xl
                           border border-gray-100
                           shadow-xl shadow-gray-200/50
                           p-6 sm:p-7">

                    <div class="flex items-center gap-3 mb-6">

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-gradient-to-br
                                   from-blue-100 to-indigo-100
                                   flex items-center justify-center">

                            <svg class="w-5 h-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-extrabold text-gray-800">
                                Cari & Filter Pengajuan
                            </h3>

                            <p class="text-xs text-gray-500">
                                Gunakan filter untuk menemukan data tertentu
                            </p>

                        </div>

                    </div>


                    <form
                        method="GET"
                        action="{{ route('keuangan.dashboard') }}"
                        class="space-y-5">

                        <input
                            type="hidden"
                            name="tab"
                            value="{{ $tab ?? 'all' }}">


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- Search --}}
                            <div>

                                <label
                                    class="block text-sm font-bold text-gray-700 mb-2">

                                    Cari Pengajuan

                                </label>

                                <div class="relative">

                                    <div
                                        class="absolute inset-y-0 left-0
                                               pl-3
                                               flex items-center
                                               pointer-events-none">

                                        <svg class="w-5 h-5 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                            </path>

                                        </svg>

                                    </div>

                                    <input
                                        type="text"
                                        name="search"
                                        value="{{ request('search') }}"
                                        placeholder="Cari nama pengajuan..."
                                        class="w-full
                                               pl-10 pr-4 py-3
                                               rounded-xl
                                               border border-gray-200
                                               bg-gray-50
                                               focus:bg-white
                                               focus:ring-2
                                               focus:ring-blue-500/20
                                               focus:border-blue-500
                                               transition-all">

                                </div>

                            </div>


                            {{-- Divisi --}}
                            <div>

                                <label
                                    class="block text-sm font-bold text-gray-700 mb-2">

                                    Filter Divisi

                                </label>

                                <select
                                    name="divisi"
                                    class="w-full
                                           px-4 py-3
                                           rounded-xl
                                           border border-gray-200
                                           bg-gray-50
                                           text-gray-700
                                           focus:bg-white
                                           focus:ring-2
                                           focus:ring-blue-500/20
                                           focus:border-blue-500
                                           transition-all">

                                    <option value="">
                                        Semua Divisi
                                    </option>

                                    <option value="Berita"
                                        {{ request('divisi') == 'Berita' ? 'selected' : '' }}>
                                        Berita
                                    </option>

                                    <option value="Umum"
                                        {{ request('divisi') == 'Umum' ? 'selected' : '' }}>
                                        Umum
                                    </option>

                                    <option value="Program"
                                        {{ request('divisi') == 'Program' ? 'selected' : '' }}>
                                        Program
                                    </option>

                                    <option value="KMB"
                                        {{ request('divisi') == 'KMB' ? 'selected' : '' }}>
                                        KMB
                                    </option>

                                    <option value="Keuangan"
                                        {{ request('divisi') == 'Keuangan' ? 'selected' : '' }}>
                                        Keuangan
                                    </option>

                                    <option value="Bendahara"
                                        {{ request('divisi') == 'Bendahara' ? 'selected' : '' }}>
                                        Bendahara
                                    </option>

                                    <option value="Teknik"
                                        {{ request('divisi') == 'Teknik' ? 'selected' : '' }}>
                                        Teknik
                                    </option>

                                    <option value="Pengembangan usaha"
                                        {{ request('divisi') == 'Pengembangan usaha' ? 'selected' : '' }}>
                                        Pengembangan usaha
                                    </option>

                                    <option value="PPSPM"
                                        {{ request('divisi') == 'PPSPM' ? 'selected' : '' }}>
                                        PPSPM
                                    </option>

                                    <option value="Admin"
                                        {{ request('divisi') == 'Admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                </select>

                            </div>

                        </div>


                        <div class="flex flex-wrap gap-3">

                            <button
                                type="submit"
                                class="inline-flex items-center gap-2
                                       px-5 py-3
                                       rounded-xl
                                       bg-gradient-to-r
                                       from-blue-500 to-indigo-600
                                       text-white
                                       font-bold
                                       shadow-lg shadow-blue-200
                                       hover:shadow-xl
                                       hover:-translate-y-0.5
                                       transition-all">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                    </path>

                                </svg>

                                Cari Pengajuan

                            </button>


                            <a
                                href="{{ route('keuangan.dashboard') }}"
                                class="inline-flex items-center gap-2
                                       px-5 py-3
                                       rounded-xl
                                       bg-gray-100
                                       border border-gray-200
                                       text-gray-700
                                       font-bold
                                       hover:bg-gray-200
                                       transition-all">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>

                                </svg>

                                Reset

                            </a>

                        </div>

                    </form>

                </div>



                {{-- ========================================================= --}}
                {{-- TABS --}}
                {{-- ========================================================= --}}

                <div
                    class="bg-white/95
                           rounded-3xl
                           border border-gray-100
                           shadow-xl shadow-gray-200/50
                           overflow-hidden">

                    <div class="px-5 sm:px-7 pt-5">

                        <div
                            class="flex gap-2
                                   overflow-x-auto
                                   border-b border-gray-100
                                   scrollbar-hide">

                            {{-- Semua --}}
                            <a
                                href="{{ request()->fullUrlWithQuery(['tab' => 'all']) }}"
                                class="dashboard-tab
                                       {{ ($tab ?? 'all') == 'all'
                                            ? 'active'
                                            : '' }}">

                                <span>Semua</span>

                                <span
                                    class="tab-count
                                           {{ ($tab ?? 'all') == 'all'
                                                ? 'active-count'
                                                : '' }}">

                                    {{ $total_pengajuan }}

                                </span>

                            </a>


                            {{-- Perlu diperiksa --}}
                            <a
                                href="{{ request()->fullUrlWithQuery(['tab' => 'perlu_diperiksa']) }}"
                                class="dashboard-tab
                                       {{ ($tab ?? 'all') == 'perlu_diperiksa'
                                            ? 'active'
                                            : '' }}">

                                <span>Perlu Diperiksa</span>

                                <span
                                    class="tab-count
                                           {{ ($tab ?? 'all') == 'perlu_diperiksa'
                                                ? 'active-count'
                                                : '' }}">

                                    {{ $perlu_diperiksa }}

                                </span>

                            </a>


                            {{-- Sudah diverifikasi --}}
                            <a
                                href="{{ request()->fullUrlWithQuery(['tab' => 'sudah_diverifikasi']) }}"
                                class="dashboard-tab
                                       {{ ($tab ?? 'all') == 'sudah_diverifikasi'
                                            ? 'active'
                                            : '' }}">

                                <span>Sudah Diverifikasi</span>

                                <span
                                    class="tab-count
                                           {{ ($tab ?? 'all') == 'sudah_diverifikasi'
                                                ? 'active-count'
                                                : '' }}">

                                    {{ $sudah_diverifikasi }}

                                </span>

                            </a>

                        </div>

                    </div>



                    {{-- ========================================================= --}}
                    {{-- LIST PENGAJUAN --}}
                    {{-- ========================================================= --}}

                    <div class="p-5 sm:p-7">

                        <div class="flex items-center justify-between mb-5">

                            <div>

                                <h3 class="text-xl font-extrabold text-gray-800">
                                    Daftar Pengajuan
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Data pengajuan berdasarkan filter yang dipilih
                                </p>

                            </div>

                            <div
                                class="hidden sm:flex
                                       items-center gap-2
                                       px-3 py-2
                                       rounded-full
                                       bg-blue-50
                                       border border-blue-100
                                       text-blue-700
                                       text-xs font-bold">

                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>

                                {{ $pengajuans->total() }} Data

                            </div>

                        </div>


                        <div class="space-y-3">

                            @forelse ($pengajuans as $item)

                                <div
                                    class="submission-card group">

                                    {{-- Icon --}}
                                    <div
                                        class="submission-icon">

                                        <svg class="w-6 h-6 text-blue-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.7"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>

                                        </svg>

                                    </div>


                                    {{-- Content --}}
                                    <div class="flex-1 min-w-0">

                                        <h4
                                            class="font-extrabold
                                                   text-gray-800
                                                   text-base
                                                   break-words
                                                   group-hover:text-blue-700
                                                   transition-colors">

                                            {{ $item->pengajuan_name ?? $item->budget_submission_name ?? 'Nama Kegiatan Tidak Ada' }}

                                        </h4>


                                        <div
                                            class="flex flex-wrap
                                                   items-center
                                                   gap-x-5 gap-y-2
                                                   mt-2
                                                   text-xs sm:text-sm
                                                   text-gray-500">

                                            <span class="inline-flex items-center gap-1.5">

                                                <svg class="w-4 h-4 text-gray-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>

                                                </svg>

                                                Diajukan oleh:

                                                <strong class="text-gray-700">
                                                    {{ $item->user->name ?? '-' }}
                                                </strong>

                                            </span>


                                            <span class="inline-flex items-center gap-1.5">

                                                <svg class="w-4 h-4 text-blue-500"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 4h.01">
                                                    </path>

                                                </svg>

                                                Divisi:

                                                <strong class="text-blue-600">
                                                    {{ $item->divisi ?? $item->user->role ?? '-' }}
                                                </strong>

                                            </span>

                                        </div>

                                    </div>


                                    {{-- Status --}}
                                    <div class="flex-shrink-0">

                                        <span
                                            class="inline-flex items-center gap-2
                                                   px-3 py-2
                                                   text-xs
                                                   font-extrabold
                                                   rounded-full
                                                   {{ ($item->verification_status ?? 0) == 1
                                                        ? 'bg-emerald-50 text-emerald-700 border border-emerald-100'
                                                        : 'bg-orange-50 text-orange-700 border border-orange-100' }}">

                                            <span
                                                class="w-2 h-2 rounded-full
                                                       {{ ($item->verification_status ?? 0) == 1
                                                            ? 'bg-emerald-500'
                                                            : 'bg-orange-500' }}">
                                            </span>

                                            {{ ($item->verification_status ?? 0) == 1
                                                ? 'Sudah Diverifikasi'
                                                : 'Belum Diverifikasi' }}

                                        </span>

                                    </div>

                                </div>

                            @empty

                                <div
                                    class="text-center
                                           py-16 px-6
                                           rounded-2xl
                                           bg-gradient-to-br
                                           from-gray-50
                                           to-blue-50/50
                                           border border-dashed
                                           border-gray-200">

                                    <div
                                        class="w-20 h-20
                                               rounded-3xl
                                               bg-gradient-to-br
                                               from-gray-100 to-blue-100
                                               flex items-center justify-center
                                               mx-auto mb-5">

                                        <svg class="w-10 h-10 text-blue-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>

                                        </svg>

                                    </div>

                                    <p class="text-lg font-extrabold text-gray-700">
                                        Tidak ada pengajuan ditemukan
                                    </p>

                                    <p class="text-sm text-gray-400 mt-2">
                                        Coba ubah filter atau kata pencarian Anda.
                                    </p>

                                </div>

                            @endforelse

                        </div>


                        {{-- Pagination --}}
                        <div class="mt-7 pt-5 border-t border-gray-100">

                            {{ $pengajuans->appends(request()->query())->links() }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- CUSTOM STYLE & ANIMATIONS --}}
    {{-- ========================================================= --}}

    <style>

        /* ========================================================= */
        /* 1. KEYFRAMES & 3D ANIMASI                                */
        /* ========================================================= */

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(18px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Efek Kilau Sapuan Kaca 3D */
        @keyframes shimmerSweep {
            0% {
                transform: translateX(-150%) skewX(-20deg);
            }
            100% {
                transform: translateX(250%) skewX(-20deg);
            }
        }

        /* Animasi garis mengalir & kilau 3D pada Progress Bar */
        .progress-bar-animated {
            background-size: 30px 30px;
            background-image: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.22) 25%,
                transparent 25%,
                transparent 50%,
                rgba(255, 255, 255, 0.22) 50%,
                rgba(255, 255, 255, 0.22) 75%,
                transparent 75%,
                transparent
            );
            animation: moveStripes 2s linear infinite;
        }

        @keyframes moveStripes {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 60px 0;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.55s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-delay-1 {
            animation-delay: 0.1s;
        }

        .animate-delay-2 {
            animation-delay: 0.2s;
        }

        .animate-delay-3 {
            animation-delay: 0.3s;
        }


        /* ========================================================= */
        /* 2. STAT CARD 3D & EFEK GLOSS                             */
        /* ========================================================= */

        .stat-card {
            position: relative;
            overflow: hidden;
            padding: 24px;
            border-radius: 24px;
            background: linear-gradient(145deg, #ffffff 0%, #f9fafb 100%);
            border: 1px solid rgba(226, 232, 240, 0.85);
            perspective: 1000px;
            transform: perspective(1000px) translateZ(0);
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.04),
                0 10px 20px -3px rgba(15, 23, 42, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.95),
                inset 0 -2px 4px rgba(0, 0, 0, 0.02);
            transition:
                transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
                border-color 0.3s ease;
            will-change: transform, box-shadow;
        }

        /* Garis kilau atas dengan gradasi 3D glow */
        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(
                90deg,
                #2563eb,
                #4f46e5,
                #06b6d4
            );
            opacity: 0;
            transform: translateY(-2px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* Efek Shimmer Kilau Kaca saat di-hover */
        .stat-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 60%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.45),
                transparent
            );
            transform: translateX(-150%) skewX(-20deg);
            pointer-events: none;
        }

        /* Hover 3D: Terangkat maju ke arah pengguna + bayangan bertingkat */
        .stat-card:hover {
            transform: perspective(1000px) translateY(-8px) translateZ(10px) rotateX(2deg);
            border-color: rgba(191, 219, 254, 0.9);
            box-shadow:
                0 20px 35px -8px rgba(37, 99, 235, 0.16),
                0 10px 18px -4px rgba(15, 23, 42, 0.08),
                0 0 0 1px rgba(37, 99, 235, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 1);
        }

        .stat-card:hover::before {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-card:hover::after {
            animation: shimmerSweep 0.85s ease-out;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 6px 14px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            transition:
                transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.4s ease;
        }

        /* Ikon melayang 3D & berputar dinamis */
        .stat-card:hover .stat-icon {
            transform: perspective(600px) scale(1.14) rotate(-6deg) translateZ(15px);
            box-shadow:
                0 12px 24px rgba(37, 99, 235, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }


        /* ========================================================= */
        /* 3. QUICK ACTION 3D TACTILE BUTTONS                        */
        /* ========================================================= */

        .quick-action {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            border-radius: 20px;
            border: 1px solid #e5e7eb;
            background: linear-gradient(135deg, #ffffff 0%, #fbfcfe 60%, #f5f3ff 100%);
            box-shadow:
                0 4px 10px rgba(0, 0, 0, 0.03),
                0 1px 3px rgba(0, 0, 0, 0.02),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transform: perspective(800px) translateZ(0);
            transition:
                transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
                border-color 0.25s ease;
            will-change: transform;
        }

        .quick-action:hover {
            transform: perspective(800px) translateY(-6px) translateZ(12px);
            border-color: #c4b5fd;
            box-shadow:
                0 18px 32px -6px rgba(124, 58, 237, 0.16),
                0 8px 16px -4px rgba(0, 0, 0, 0.06),
                inset 0 1px 0 rgba(255, 255, 255, 1);
        }

        /* Feedback fisik saat tombol ditekan */
        .quick-action:active {
            transform: perspective(800px) translateY(1px) translateZ(2px) scale(0.985);
            box-shadow: 0 4px 10px rgba(124, 58, 237, 0.12);
        }

        .quick-icon {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 8px 18px rgba(124, 58, 237, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            transition:
                transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.35s ease;
        }

        .quick-action:hover .quick-icon {
            transform: scale(1.12) rotate(-5deg) translateZ(10px);
            box-shadow:
                0 14px 26px rgba(124, 58, 237, 0.32),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }


        /* ========================================================= */
        /* 4. DASHBOARD TABS 3D                                      */
        /* ========================================================= */

        .dashboard-tab {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 18px;
            margin-bottom: -1px;
            white-space: nowrap;
            border-bottom: 3px solid transparent;
            color: #6b7280;
            font-size: 14px;
            font-weight: 800;
            border-radius: 12px 12px 0 0;
            transition:
                color 0.25s ease,
                border-color 0.25s ease,
                background-color 0.25s ease,
                transform 0.25s ease;
        }

        .dashboard-tab:hover {
            color: #2563eb;
            background: rgba(37, 99, 235, 0.03);
            transform: translateY(-2px);
        }

        .dashboard-tab.active {
            color: #1d4ed8;
            border-color: #2563eb;
            background: linear-gradient(180deg, rgba(239, 246, 255, 0.6) 0%, rgba(255, 255, 255, 0) 100%);
        }

        .tab-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 28px;
            height: 26px;
            padding: 0 8px;
            border-radius: 999px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 11px;
            font-weight: 900;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
        }

        .active-count {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
            transform: scale(1.05);
        }


        /* ========================================================= */
        /* 5. SUBMISSION CARD 3D LIST                                */
        /* ========================================================= */

        .submission-card {
            position: relative;
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px;
            border-radius: 22px;
            border: 1px solid #eef2f7;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow:
                0 4px 10px rgba(15, 23, 42, 0.03),
                0 1px 3px rgba(15, 23, 42, 0.02),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transform: perspective(1000px) translateZ(0);
            transition:
                transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
                border-color 0.25s ease;
            will-change: transform;
        }

        .submission-card:hover {
            transform: perspective(1000px) translateY(-5px) translateZ(8px);
            border-color: #bfdbfe;
            box-shadow:
                0 18px 30px -8px rgba(37, 99, 235, 0.12),
                0 8px 16px -4px rgba(15, 23, 42, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 1);
        }

        .submission-card:active {
            transform: perspective(1000px) translateY(-1px) scale(0.995);
        }

        .submission-icon {
            width: 54px;
            height: 54px;
            flex-shrink: 0;
            border-radius: 18px;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 6px 14px rgba(37, 99, 235, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            transition:
                transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.35s ease;
        }

        .submission-card:hover .submission-icon {
            transform: scale(1.1) rotate(-3deg);
            box-shadow:
                0 10px 20px rgba(37, 99, 235, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 1);
        }


        /* ========================================================= */
        /* 6. MOBILE & UTILITIES                                     */
        /* ========================================================= */

        @media (max-width: 640px) {
            .submission-card {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

    </style>

</x-app-layout>
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

                <div
                    class="relative overflow-hidden
                           rounded-3xl
                           bg-gradient-to-br
                           from-blue-600
                           via-indigo-600
                           to-blue-900
                           shadow-2xl
                           shadow-blue-200/60
                           animate-fade-in">

                    {{-- Decorative circles --}}
                    <div
                        class="absolute -top-24 -right-20
                               w-80 h-80
                               bg-white/10
                               rounded-full">
                    </div>

                    <div
                        class="absolute -bottom-32 -left-20
                               w-96 h-96
                               bg-cyan-400/10
                               rounded-full">
                    </div>

                    <div
                        class="absolute top-10 right-64
                               w-20 h-20
                               bg-white/5
                               rounded-full
                               blur-sm">
                    </div>


                    <div class="relative p-7 sm:p-9">

                        <div class="flex flex-col md:flex-row
                                    md:items-center
                                    md:justify-between
                                    gap-7">

                            <div class="flex items-center gap-5">

                                <div
                                    class="flex-shrink-0
                                           w-16 h-16
                                           rounded-2xl
                                           bg-white/15
                                           backdrop-blur-md
                                           border border-white/20
                                           flex items-center justify-center
                                           shadow-xl">

                                    <svg class="w-8 h-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>

                                    </svg>

                                </div>


                                <div>

                                    <p class="text-blue-100 text-sm font-semibold mb-1">
                                        Sistem Keuangan
                                    </p>

                                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white">
                                        Dashboard Verifikasi Keuangan
                                    </h1>

                                    <p class="text-blue-100 text-sm sm:text-base mt-2">
                                        Kelola dan verifikasi pengajuan keuangan dengan mudah
                                    </p>

                                </div>

                            </div>


                            {{-- Total --}}
                            <div
                                class="flex items-center gap-4
                                       px-5 py-4
                                       rounded-2xl
                                       bg-white/10
                                       backdrop-blur-md
                                       border border-white/20
                                       shadow-xl">

                                <div
                                    class="w-12 h-12
                                           rounded-xl
                                           bg-white/15
                                           flex items-center justify-center">

                                    <svg class="w-6 h-6 text-white"
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

                                <div>

                                    <p class="text-xs text-blue-100">
                                        Total Pengajuan
                                    </p>

                                    <p class="text-2xl font-extrabold text-white">
                                        {{ $total_pengajuan ?? 0 }}
                                    </p>

                                </div>

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


                <div
                    class="bg-white/95
                           rounded-3xl
                           border border-gray-100
                           shadow-xl shadow-gray-200/50
                           p-6 sm:p-7
                           animate-fade-in animate-delay-2">

                    <div class="flex flex-col sm:flex-row
                                sm:items-center
                                sm:justify-between
                                gap-4 mb-5">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-11 h-11
                                       rounded-xl
                                       bg-gradient-to-br
                                       from-emerald-100 to-green-100
                                       flex items-center justify-center">

                                <svg class="w-5 h-5 text-emerald-600"
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
                                    Progress Verifikasi
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Persentase pengajuan yang telah diverifikasi
                                </p>

                            </div>

                        </div>


                        <div
                            class="px-4 py-2
                                   rounded-full
                                   bg-emerald-50
                                   border border-emerald-100
                                   text-emerald-700
                                   font-extrabold text-sm">

                            {{ $formattedProgress }}%

                        </div>

                    </div>


                    <div
                        class="w-full
                               bg-gray-100
                               rounded-full
                               h-4
                               overflow-hidden
                               shadow-inner">

                        <div
                            class="h-4
                                   rounded-full
                                   bg-gradient-to-r
                                   from-emerald-400
                                   via-green-500
                                   to-emerald-600
                                   transition-all duration-700
                                   shadow-sm"
                            style="width: {{ $progress }}%;">
                        </div>

                    </div>


                    <div
                        class="flex flex-col sm:flex-row
                               sm:justify-between
                               gap-2
                               mt-4
                               text-sm text-gray-500">

                        <span>

                            <strong class="text-gray-800">
                                {{ $sudah }}
                            </strong>

                            dari

                            <strong class="text-gray-800">
                                {{ $total }}
                            </strong>

                            pengajuan telah diverifikasi

                        </span>

                        <span class="font-semibold text-emerald-600">
                            {{ $formattedProgress }}% selesai
                        </span>

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

        /* Keyframes untuk Animasi Masuk (Fade In + Slide Up) */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
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


        .stat-card {
            position: relative;
            overflow: hidden;
            padding: 24px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid #eef2f7;
            box-shadow:
                0 10px 25px rgba(15, 23, 42, 0.05),
                0 3px 8px rgba(15, 23, 42, 0.03);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

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
                #4f46e5
            );
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: #dbeafe;
            box-shadow:
                0 20px 35px rgba(37, 99, 235, 0.10),
                0 8px 15px rgba(15, 23, 42, 0.05);
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.07) rotate(-2deg);
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.10);
        }


        /* Quick action */

        .quick-action {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background:
                linear-gradient(
                    135deg,
                    #faf5ff,
                    #ffffff
                );
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .quick-action:hover {
            transform: translateY(-4px);
            border-color: #c4b5fd;
            box-shadow:
                0 15px 30px rgba(124, 58, 237, 0.10);
        }

        .quick-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 8px 16px rgba(124, 58, 237, 0.18);
            transition: transform 0.3s ease;
        }

        .quick-action:hover .quick-icon {
            transform: scale(1.08) rotate(-3deg);
        }


        /* Tabs */

        .dashboard-tab {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 13px 16px;
            margin-bottom: -1px;
            white-space: nowrap;
            border-bottom: 3px solid transparent;
            color: #6b7280;
            font-size: 14px;
            font-weight: 800;
            transition:
                color 0.2s ease,
                border-color 0.2s ease;
        }

        .dashboard-tab:hover {
            color: #2563eb;
        }

        .dashboard-tab.active {
            color: #1d4ed8;
            border-color: #2563eb;
        }

        .tab-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 27px;
            height: 25px;
            padding: 0 7px;
            border-radius: 999px;
            background: #f3f4f6;
            color: #6b7280;
            font-size: 11px;
            font-weight: 900;
        }

        .active-count {
            background: #dbeafe;
            color: #1d4ed8;
        }


        /* Submission */

        .submission-card {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 18px;
            border-radius: 20px;
            border: 1px solid #eef2f7;
            background:
                linear-gradient(
                    135deg,
                    #ffffff,
                    #f8fafc
                );
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .submission-card:hover {
            transform: translateY(-3px);
            border-color: #bfdbfe;
            box-shadow:
                0 15px 30px rgba(37, 99, 235, 0.08);
        }

        .submission-icon {
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            border-radius: 16px;
            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #dbeafe
                );
            display: flex;
            align-items: center;
            justify-content: center;
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .submission-card:hover .submission-icon {
            transform: scale(1.06);
            box-shadow:
                0 8px 16px rgba(37, 99, 235, 0.12);
        }


        /* Mobile */

        @media (max-width: 640px) {

            .submission-card {
                align-items: flex-start;
                flex-direction: column;
            }

        }


        /* Hide scrollbar */

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

    </style>

</x-app-layout>
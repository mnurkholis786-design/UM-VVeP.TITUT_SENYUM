<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-bold text-2xl text-gray-800 tracking-tight">
                    {{ __('Report') }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola dan lihat laporan pengajuan berdasarkan periode
                </p>
            </div>

            <div
                class="hidden sm:flex w-12 h-12 rounded-2xl
                       bg-gradient-to-br from-blue-500 to-indigo-600
                       items-center justify-center
                       text-white shadow-lg shadow-blue-200">

                <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l3.414 3.414A1 1 0 0119 7.414V19a2 2 0 01-2 2z">
                    </path>

                </svg>

            </div>

        </div>

    </x-slot>


    <div
        class="py-8
               bg-gradient-to-br
               from-slate-50
               via-blue-50/30
               to-indigo-50/20
               min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            {{-- ========================================================= --}}
            {{-- HERO --}}
            {{-- ========================================================= --}}

            <div
                class="relative overflow-hidden
                       rounded-3xl
                       bg-gradient-to-br
                       from-blue-600
                       via-indigo-600
                       to-blue-800
                       shadow-2xl
                       shadow-blue-200/60
                       mb-7">

                {{-- Decorative --}}

                <div
                    class="absolute -top-24 -right-16
                           w-72 h-72
                           bg-white/10
                           rounded-full">
                </div>

                <div
                    class="absolute -bottom-28 -left-20
                           w-80 h-80
                           bg-cyan-400/10
                           rounded-full">
                </div>

                <div
                    class="absolute top-8 right-40
                           w-20 h-20
                           bg-white/5
                           rounded-full
                           blur-sm">
                </div>


                <div class="relative px-6 py-8 sm:px-8 sm:py-10">

                    <div
                        class="flex flex-col
                               md:flex-row
                               md:items-center
                               md:justify-between
                               gap-6">


                        {{-- Hero title --}}

                        <div class="flex items-center gap-4">

                            <div
                                class="flex-shrink-0
                                       w-16 h-16
                                       rounded-2xl
                                       bg-white/15
                                       backdrop-blur-md
                                       border border-white/20
                                       flex items-center justify-center
                                       shadow-xl">

                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.7"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l3.414 3.414A1 1 0 0119 7.414V19a2 2 0 01-2 2z">
                                    </path>

                                </svg>

                            </div>


                            <div>

                                <p class="text-blue-100 text-sm font-medium mb-1">
                                    Pusat Laporan
                                </p>

                                <h1
                                    class="text-2xl sm:text-3xl
                                           font-extrabold
                                           text-white">

                                    Report

                                </h1>

                                <p class="text-blue-100 text-sm mt-1">
                                    Buat dan akses laporan pengajuan dengan mudah
                                </p>

                            </div>

                        </div>


                        {{-- Jumlah pengajuan --}}

                        <div
                            class="flex items-center gap-4
                                   bg-white/10
                                   backdrop-blur-md
                                   border border-white/20
                                   rounded-2xl
                                   px-5 py-4
                                   shadow-xl">

                            <div
                                class="w-11 h-11
                                       rounded-xl
                                       bg-white/15
                                       flex items-center justify-center">

                                <svg
                                    class="w-5 h-5 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>

                                </svg>

                            </div>

                            <div>

                                <p class="text-xs text-blue-100">
                                    Data Pengajuan
                                </p>

                                <p class="text-2xl font-extrabold text-white">
                                    {{ $submission->count() }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- FILTER --}}
            {{-- ========================================================= --}}

            <div
                class="relative overflow-hidden
                       bg-white/95
                       backdrop-blur-sm
                       rounded-3xl
                       border border-gray-100
                       shadow-xl
                       shadow-gray-200/50
                       mb-7">

                <div class="p-5 sm:p-7">

                    <div class="flex items-center gap-3 mb-6">

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-gradient-to-br
                                   from-blue-100
                                   to-indigo-100
                                   flex items-center justify-center">

                            <svg
                                class="w-5 h-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                </path>

                            </svg>

                        </div>


                        <div>

                            <h3
                                class="text-lg
                                       font-extrabold
                                       text-gray-800">

                                Filter Laporan

                            </h3>

                            <p class="text-sm text-gray-500">
                                Tentukan rentang tanggal laporan yang ingin ditampilkan
                            </p>

                        </div>

                    </div>


                    <form
                        method="GET"
                        action="{{ route('user.report') }}"
                        class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">


                        {{-- Dari tanggal --}}

                        <div>

                            <label
                                class="block
                                       text-sm
                                       font-bold
                                       text-gray-700
                                       mb-2">

                                Dari Tanggal

                            </label>

                            <div class="relative">

                                <div
                                    class="absolute
                                           inset-y-0
                                           left-0
                                           pl-3
                                           flex
                                           items-center
                                           pointer-events-none">

                                    <svg
                                        class="w-5 h-5 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>

                                    </svg>

                                </div>


                                <input
                                    type="date"
                                    name="from_date"
                                    value="{{ request('from_date') }}"
                                    class="w-full
                                           pl-10
                                           pr-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-gray-200
                                           bg-gray-50
                                           text-gray-700
                                           focus:bg-white
                                           focus:ring-2
                                           focus:ring-blue-500/20
                                           focus:border-blue-500
                                           transition-all">

                            </div>

                        </div>


                        {{-- Sampai tanggal --}}

                        <div>

                            <label
                                class="block
                                       text-sm
                                       font-bold
                                       text-gray-700
                                       mb-2">

                                Sampai Tanggal

                            </label>

                            <div class="relative">

                                <div
                                    class="absolute
                                           inset-y-0
                                           left-0
                                           pl-3
                                           flex
                                           items-center
                                           pointer-events-none">

                                    <svg
                                        class="w-5 h-5 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>

                                    </svg>

                                </div>


                                <input
                                    type="date"
                                    name="target_date"
                                    value="{{ request('target_date') }}"
                                    class="w-full
                                           pl-10
                                           pr-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-gray-200
                                           bg-gray-50
                                           text-gray-700
                                           focus:bg-white
                                           focus:ring-2
                                           focus:ring-blue-500/20
                                           focus:border-blue-500
                                           transition-all">

                            </div>

                        </div>


                        {{-- Button --}}

                        <button
                            type="submit"
                            class="group
                                   w-full
                                   px-5
                                   py-3
                                   rounded-xl
                                   bg-gradient-to-r
                                   from-blue-500
                                   to-indigo-600
                                   text-white
                                   font-bold
                                   shadow-lg
                                   shadow-blue-200
                                   hover:shadow-xl
                                   hover:shadow-blue-300
                                   hover:-translate-y-0.5
                                   active:translate-y-0
                                   transition-all
                                   duration-200
                                   flex
                                   items-center
                                   justify-center
                                   gap-2">

                            <svg
                                class="w-5 h-5
                                       transition-transform
                                       group-hover:scale-110"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                </path>

                            </svg>

                            Terapkan Filter

                        </button>

                    </form>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- REPORT OPTIONS --}}
            {{-- ========================================================= --}}

            <div class="mb-7">

                <div class="flex items-center gap-3 mb-5">

                    <div
                        class="w-10 h-10
                               rounded-xl
                               bg-gradient-to-br
                               from-indigo-100
                               to-blue-100
                               flex items-center justify-center">

                        <svg
                            class="w-5 h-5 text-indigo-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l3.414 3.414A1 1 0 0119 7.414V19a2 2 0 01-2 2z">
                            </path>

                        </svg>

                    </div>


                    <div>

                        <h3
                            class="text-xl
                                   font-extrabold
                                   text-gray-800">

                            Pilihan Laporan

                        </h3>

                        <p class="text-sm text-gray-500">
                            Pilih jenis laporan yang ingin Anda buka
                        </p>

                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- ================================================= --}}
                    {{-- SEMUA PENGAJUAN --}}
                    {{-- ================================================= --}}

                    <a
                        href="{{ route('laporan.user.pengajuan', [
                            'from_date' => request('from_date'),
                            'target_date' => request('target_date'),
                        ]) }}"
                        target="blank"
                        class="report-card report-card-blue group">

                        <div
                            class="report-icon
                                   bg-gradient-to-br
                                   from-blue-500
                                   to-indigo-600">

                            <svg
                                class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>

                            </svg>

                        </div>


                        <div class="flex-1">

                            <div
                                class="flex
                                       items-start
                                       justify-between
                                       gap-3">

                                <h4
                                    class="text-base
                                           font-extrabold
                                           text-gray-800
                                           group-hover:text-blue-600
                                           transition-colors">

                                    Laporan Semua Pengajuan

                                </h4>


                                <svg
                                    class="w-5 h-5
                                           flex-shrink-0
                                           text-gray-300
                                           group-hover:text-blue-500
                                           group-hover:translate-x-1
                                           transition-all"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>

                                </svg>

                            </div>


                            <p
                                class="text-sm
                                       text-gray-500
                                       leading-relaxed
                                       mt-2">

                                Lihat detail semua pengajuan yang telah Anda buat.

                            </p>

                        </div>


                        <div class="report-footer text-blue-600">

                            Buka laporan

                            <span>→</span>

                        </div>

                    </a>



                    {{-- ================================================= --}}
                    {{-- TOTAL BIAYA --}}
                    {{-- ================================================= --}}

                    <a
                        href="{{ route('laporan.user.pengajuan_nominal', [
                            'from_date' => request('from_date'),
                            'target_date' => request('target_date'),
                        ]) }}"
                        target="blank"
                        class="report-card report-card-green group">

                        <div
                            class="report-icon
                                   bg-gradient-to-br
                                   from-emerald-500
                                   to-green-600">

                            <svg
                                class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>

                            </svg>

                        </div>


                        <div class="flex-1">

                            <div
                                class="flex
                                       items-start
                                       justify-between
                                       gap-3">

                                <h4
                                    class="text-base
                                           font-extrabold
                                           text-gray-800
                                           group-hover:text-emerald-600
                                           transition-colors">

                                    Laporan Total Biaya

                                </h4>


                                <svg
                                    class="w-5 h-5
                                           flex-shrink-0
                                           text-gray-300
                                           group-hover:text-emerald-500
                                           group-hover:translate-x-1
                                           transition-all"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>

                                </svg>

                            </div>


                            <p
                                class="text-sm
                                       text-gray-500
                                       leading-relaxed
                                       mt-2">

                                Ringkasan biaya dari semua pengajuan yang disetujui.

                            </p>

                        </div>


                        <div class="report-footer text-emerald-600">

                            Buka laporan

                            <span>→</span>

                        </div>

                    </a>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- DAFTAR PENGAJUAN --}}
            {{-- ========================================================= --}}

            <div
                class="bg-white/95
                       backdrop-blur-sm
                       rounded-3xl
                       border border-gray-100
                       shadow-xl
                       shadow-gray-200/50
                       overflow-hidden">


                {{-- Header daftar --}}

                <div
                    class="px-5
                           py-5
                           sm:px-7
                           border-b
                           border-gray-100
                           bg-gradient-to-r
                           from-gray-50
                           via-white
                           to-blue-50/40">

                    <div
                        class="flex
                               flex-col
                               sm:flex-row
                               sm:items-center
                               sm:justify-between
                               gap-3">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-11 h-11
                                       rounded-xl
                                       bg-gradient-to-br
                                       from-gray-100
                                       to-blue-100
                                       flex
                                       items-center
                                       justify-center">

                                <svg
                                    class="w-5 h-5 text-blue-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16">
                                    </path>

                                </svg>

                            </div>


                            <div>

                                <h3
                                    class="text-lg
                                           font-extrabold
                                           text-gray-800">

                                    Daftar Pengajuan

                                </h3>

                                <p class="text-xs text-gray-500 mt-0.5">
                                    Data pengajuan yang telah Anda buat
                                </p>

                            </div>

                        </div>


                        <span
                            class="inline-flex
                                   items-center
                                   gap-2
                                   self-start
                                   sm:self-auto
                                   px-4
                                   py-2
                                   rounded-full
                                   bg-blue-50
                                   border
                                   border-blue-100
                                   text-blue-700
                                   text-sm
                                   font-extrabold">

                            <span
                                class="w-2 h-2
                                       rounded-full
                                       bg-blue-500">
                            </span>

                            {{ $submission->count() }} Item

                        </span>

                    </div>

                </div>


                {{-- List --}}

                <div class="p-5 sm:p-7">

                    <div class="space-y-3">

                        @php
                            $no = 1;
                        @endphp


                        @forelse ($submission as $submit)

                            <div
                                class="submission-card
                                       group
                                       relative
                                       flex
                                       flex-col
                                       sm:flex-row
                                       sm:items-center
                                       gap-4
                                       p-4
                                       sm:p-5
                                       rounded-2xl
                                       border
                                       border-gray-100
                                       bg-gradient-to-r
                                       from-white
                                       to-gray-50/70
                                       hover:from-blue-50/50
                                       hover:to-indigo-50/40
                                       hover:border-blue-200
                                       hover:shadow-lg
                                       hover:shadow-blue-100/50
                                       hover:-translate-y-0.5
                                       transition-all
                                       duration-300">


                                {{-- Number --}}

                                <div
                                    class="flex-shrink-0
                                           w-11 h-11
                                           rounded-xl
                                           bg-gradient-to-br
                                           from-blue-500
                                           to-indigo-600
                                           text-white
                                           flex
                                           items-center
                                           justify-center
                                           font-extrabold
                                           shadow-md
                                           shadow-blue-200">

                                    {{ $no++ }}

                                </div>


                                {{-- Content --}}

                                <a
                                    href="{{ route('pengajuan.show', $submit->id) }}"
                                    class="flex-1 min-w-0">

                                    <div
                                        class="font-extrabold
                                               text-gray-800
                                               group-hover:text-blue-700
                                               transition-colors
                                               mb-3
                                               break-words">

                                        {{ $submit->budget_submission_name }}

                                    </div>


                                    <div
                                        class="flex
                                               flex-wrap
                                               items-center
                                               gap-x-5
                                               gap-y-2
                                               text-xs
                                               sm:text-sm
                                               text-gray-500">


                                        {{-- Created --}}

                                        <div
                                            class="flex
                                                   items-center
                                                   gap-1.5">

                                            <svg
                                                class="w-4 h-4 text-blue-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>

                                            </svg>


                                            <span>

                                                Dibuat:

                                                <span
                                                    class="font-semibold
                                                           text-gray-600">

                                                    {{ $submit->created_at->format('d M Y') }}

                                                </span>

                                            </span>

                                        </div>


                                        {{-- Updated --}}

                                        <div
                                            class="flex
                                                   items-center
                                                   gap-1.5">

                                            <svg
                                                class="w-4 h-4 text-indigo-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>

                                            </svg>


                                            <span>

                                                Diperbarui:

                                                <span
                                                    class="font-semibold
                                                           text-gray-600">

                                                    {{ $submit->updated_at->diffForHumans() }}

                                                </span>

                                            </span>

                                        </div>

                                    </div>

                                </a>


                                {{-- Arrow --}}

                                <div
                                    class="flex-shrink-0
                                           w-10 h-10
                                           rounded-xl
                                           bg-gray-50
                                           border
                                           border-gray-100
                                           flex
                                           items-center
                                           justify-center
                                           group-hover:bg-blue-100
                                           group-hover:border-blue-200
                                           transition-all">

                                    <svg
                                        class="w-5 h-5
                                               text-gray-400
                                               group-hover:text-blue-600
                                               group-hover:translate-x-0.5
                                               transition-all"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7">
                                        </path>

                                    </svg>

                                </div>

                            </div>

                        @empty


                            {{-- Empty state --}}

                            <div
                                class="relative
                                       overflow-hidden
                                       text-center
                                       py-16
                                       px-6
                                       rounded-2xl
                                       bg-gradient-to-br
                                       from-gray-50
                                       to-blue-50/50
                                       border
                                       border-dashed
                                       border-gray-200">

                                <div
                                    class="w-20 h-20
                                           rounded-3xl
                                           bg-gradient-to-br
                                           from-gray-100
                                           to-blue-100
                                           flex
                                           items-center
                                           justify-center
                                           mx-auto
                                           mb-5
                                           shadow-inner">

                                    <svg
                                        class="w-10 h-10 text-blue-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>

                                    </svg>

                                </div>


                                <p
                                    class="text-lg
                                           font-extrabold
                                           text-gray-700">

                                    Belum ada pengajuan

                                </p>


                                <p
                                    class="text-sm
                                           text-gray-400
                                           mt-2">

                                    Pengajuan yang Anda buat akan muncul di sini

                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- CUSTOM STYLE --}}
    {{-- ========================================================= --}}

    <style>

        /* =========================================================
           REPORT CARD
        ========================================================= */

        .report-card {

            position: relative;

            display: flex;

            flex-direction: column;

            min-height: 250px;

            padding: 24px;

            border-radius: 24px;

            background: rgba(255, 255, 255, 0.95);

            border: 1px solid #e5e7eb;

            box-shadow:
                0 10px 25px rgba(15, 23, 42, 0.06),
                0 3px 8px rgba(15, 23, 42, 0.04);

            overflow: hidden;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;

        }


        .report-card::before {

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


        .report-card:hover {

            transform: translateY(-6px);

            border-color: #bfdbfe;

            box-shadow:
                0 20px 40px rgba(37, 99, 235, 0.12),
                0 8px 15px rgba(15, 23, 42, 0.06);

        }


        .report-card:hover::before {

            opacity: 1;

        }



        /* =========================================================
           REPORT ICON
        ========================================================= */

        .report-icon {

            width: 58px;

            height: 58px;

            border-radius: 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 20px;

            box-shadow:
                0 8px 16px rgba(37, 99, 235, 0.18);

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;

        }


        .report-card:hover .report-icon {

            transform:
                scale(1.06)
                rotate(-2deg);

            box-shadow:
                0 12px 24px rgba(37, 99, 235, 0.25);

        }



        /* =========================================================
           REPORT FOOTER
        ========================================================= */

        .report-footer {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: 20px;

            padding-top: 14px;

            border-top: 1px solid #f1f5f9;

            font-size: 12px;

            font-weight: 800;

        }


        .report-footer span {

            font-size: 18px;

            transition:
                transform 0.2s ease;

        }


        .report-card:hover
        .report-footer span {

            transform:
                translateX(4px);

        }



        /* =========================================================
           SUBMISSION CARD
        ========================================================= */

        .submission-card {

            animation:
                reportFadeIn
                0.45s
                ease-out
                both;

        }


        .submission-card:nth-child(2) {

            animation-delay:
                0.05s;

        }


        .submission-card:nth-child(3) {

            animation-delay:
                0.10s;

        }


        .submission-card:nth-child(4) {

            animation-delay:
                0.15s;

        }


        .submission-card:nth-child(5) {

            animation-delay:
                0.20s;

        }



        /* =========================================================
           ANIMATION
        ========================================================= */

        @keyframes reportFadeIn {

            from {

                opacity: 0;

                transform:
                    translateY(12px);

            }

            to {

                opacity: 1;

                transform:
                    translateY(0);

            }

        }



        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 640px) {

            .report-card {

                min-height: auto;

            }

        }

    </style>

</x-app-layout>
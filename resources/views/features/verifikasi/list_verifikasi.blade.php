<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3 anim-fade-in">
            <div class="relative w-11 h-11 rounded-2xl bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 flex items-center justify-center shadow-lg shadow-blue-200/60 overflow-hidden">
                <div class="absolute inset-0 bg-white/10"></div>

                <svg class="relative w-6 h-6 text-white"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-slate-800 leading-tight">
                    Daftar Pengajuan
                </h2>

                <p class="text-xs text-slate-500 mt-0.5">
                    Kelola dan pantau pengajuan verifikasi
                </p>
            </div>
        </div>
    </x-slot>


    <style>

        /* =========================================================
            ANIMATIONS (PAGE LOAD)
        ========================================================= */
        @keyframes pageFadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anim-fade-in {
            animation: pageFadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .anim-delay-1 {
            animation-delay: 0.1s;
        }

        .anim-delay-2 {
            animation-delay: 0.2s;
        }

        .anim-delay-3 {
            animation-delay: 0.3s;
        }

        /* =========================================================
            GLOBAL
        ========================================================= */

        .verification-page {
            background:
                radial-gradient(circle at 0% 0%, rgba(59,130,246,.08), transparent 25%),
                radial-gradient(circle at 100% 20%, rgba(37,99,235,.06), transparent 25%),
                #f8fafc;
        }

        /* =========================================================
            FILTER CARD
        ========================================================= */

        .verification-filter-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(226,232,240,.95);
            background:
                radial-gradient(circle at 100% 0%, rgba(59,130,246,.14), transparent 28%),
                radial-gradient(circle at 0% 100%, rgba(37,99,235,.07), transparent 28%),
                rgba(255,255,255,.96);

            box-shadow:
                0 20px 45px rgba(15,23,42,.07),
                0 5px 12px rgba(15,23,42,.04),
                inset 0 1px 0 rgba(255,255,255,.9);

            transition: all .3s ease;
        }

        .verification-filter-card:hover {
            transform: translateY(-1px);

            box-shadow:
                0 25px 55px rgba(15,23,42,.09),
                0 8px 18px rgba(37,99,235,.05),
                inset 0 1px 0 rgba(255,255,255,.95);
        }

        .filter-decoration-one {
            position: absolute;
            width: 210px;
            height: 210px;
            border-radius: 999px;
            right: -100px;
            top: -110px;

            background:
                linear-gradient(
                    135deg,
                    rgba(37,99,235,.15),
                    rgba(96,165,250,.02)
                );

            pointer-events: none;
        }

        .filter-decoration-two {
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 999px;
            right: 80px;
            bottom: -65px;

            border: 14px solid rgba(59,130,246,.05);

            pointer-events: none;
        }

        .filter-decoration-three {
            position: absolute;
            width: 70px;
            height: 70px;
            border-radius: 20px;
            left: -30px;
            bottom: 20px;

            background: linear-gradient(
                135deg,
                rgba(37,99,235,.05),
                transparent
            );

            transform: rotate(25deg);
            pointer-events: none;
        }

        /* =========================================================
            FILTER HEADER
        ========================================================= */

        .filter-icon-box {
            width: 48px;
            height: 48px;
            flex-shrink: 0;

            border-radius: 15px;

            background:
                linear-gradient(
                    145deg,
                    #eff6ff,
                    #dbeafe
                );

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.95),
                0 8px 18px rgba(37,99,235,.10);
        }

        /* =========================================================
            INPUT
        ========================================================= */

        .modern-input {
            width: 100%;

            border: 1px solid #dbe3ef;

            background:
                linear-gradient(
                    180deg,
                    rgba(255,255,255,.98),
                    rgba(248,250,252,.96)
                );

            border-radius: 13px;

            color: #1e293b;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease;

            box-shadow:
                inset 0 1px 2px rgba(15,23,42,.025),
                0 3px 8px rgba(15,23,42,.025);
        }

        .modern-input:hover {
            border-color: #bfdbfe;
        }

        .modern-input:focus {
            outline: none;

            border-color: #3b82f6;

            box-shadow:
                0 0 0 4px rgba(59,130,246,.10),
                0 8px 20px rgba(37,99,235,.08);
        }

        /* =========================================================
            SEARCH
        ========================================================= */

        .search-wrapper {
            position: relative;
        }

        .search-wrapper .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            z-index: 2;

            color: #94a3b8;

            transition: color .2s ease;

            pointer-events: none;
        }

        .search-wrapper:focus-within .search-icon {
            color: #2563eb;
        }

        .search-wrapper input {
            padding-left: 45px;
        }

        /* =========================================================
            SELECT
        ========================================================= */

        .modern-select-wrapper {
            position: relative;
        }

        .modern-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;

            cursor: pointer;

            padding-right: 45px;
        }

        .select-icon {
            position: absolute;
            right: 15px;
            top: 50%;

            transform: translateY(-50%);

            pointer-events: none;

            color: #64748b;

            transition: all .2s ease;
        }

        .modern-select-wrapper:focus-within .select-icon {
            color: #2563eb;
            transform: translateY(-50%) rotate(180deg);
        }

        /* =========================================================
            BUTTON
        ========================================================= */

        .modern-btn {
            position: relative;
            overflow: hidden;

            transition: all .25s ease;
        }

        .modern-btn::before {
            content: "";

            position: absolute;

            top: 0;
            left: -120%;

            width: 100%;
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,.25),
                    transparent
                );

            transition: left .55s ease;
        }

        .modern-btn:hover::before {
            left: 120%;
        }

        .modern-btn:hover {
            transform: translateY(-2px);
        }

        .modern-btn:active {
            transform: translateY(0);
        }

        .btn-search {
            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8 60%,
                    #1e40af
                );

            box-shadow:
                0 10px 22px rgba(37,99,235,.24),
                inset 0 1px 0 rgba(255,255,255,.22);
        }

        .btn-search:hover {
            box-shadow:
                0 15px 30px rgba(37,99,235,.32),
                inset 0 1px 0 rgba(255,255,255,.22);
        }

        .btn-reset {
            background: rgba(255,255,255,.96);

            border: 1px solid #dbe3ef;

            box-shadow:
                0 5px 12px rgba(15,23,42,.04);
        }

        .btn-reset:hover {
            background: #f8fafc;
            border-color: #cbd5e1;

            box-shadow:
                0 9px 18px rgba(15,23,42,.07);
        }

        /* =========================================================
            TABS
        ========================================================= */

        .tabs-card {
            position: relative;

            background:
                linear-gradient(
                    180deg,
                    rgba(255,255,255,.98),
                    rgba(248,250,252,.96)
                );

            border: 1px solid #e2e8f0;

            box-shadow:
                0 12px 30px rgba(15,23,42,.055),
                0 3px 8px rgba(15,23,42,.025),
                inset 0 1px 0 rgba(255,255,255,.9);
        }

        .verification-tab {
            position: relative;

            transition:
                color .25s ease,
                background .25s ease,
                transform .25s ease;
        }

        .verification-tab:hover {
            color: #2563eb;
            background: rgba(239,246,255,.65);
        }

        .verification-tab.active {
            color: #1d4ed8;

            background:
                linear-gradient(
                    180deg,
                    rgba(239,246,255,.72),
                    rgba(255,255,255,.2)
                );
        }

        .verification-tab.active::after {
            content: "";

            position: absolute;

            left: 12px;
            right: 12px;
            bottom: -1px;

            height: 3px;

            border-radius: 999px 999px 0 0;

            background:
                linear-gradient(
                    90deg,
                    #2563eb,
                    #60a5fa
                );

            box-shadow:
                0 2px 8px rgba(37,99,235,.28);
        }

        .tab-icon {
            transition: all .25s ease;
        }

        .verification-tab:hover .tab-icon {
            transform: translateY(-2px) scale(1.05);
        }

        /* =========================================================
            LIST CONTAINER
        ========================================================= */

        .submission-container {
            position: relative;

            background:
                linear-gradient(
                    180deg,
                    rgba(255,255,255,.99),
                    rgba(248,250,252,.98)
                );

            border: 1px solid #e2e8f0;

            box-shadow:
                0 15px 35px rgba(15,23,42,.055),
                0 4px 10px rgba(15,23,42,.025),
                inset 0 1px 0 rgba(255,255,255,.95);
        }

        .section-icon {
            width: 42px;
            height: 42px;

            border-radius: 13px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    145deg,
                    #eff6ff,
                    #dbeafe
                );

            color: #2563eb;

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.9),
                0 6px 14px rgba(37,99,235,.08);
        }

        /* =========================================================
            SUBMISSION CARD
        ========================================================= */

        .submission-card {
            position: relative;

            border: 1px solid #e5e7eb;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,.99),
                    rgba(248,250,252,.96)
                );

            border-radius: 17px;

            transition:
                transform .25s ease,
                border-color .25s ease,
                box-shadow .25s ease;

            box-shadow:
                0 4px 10px rgba(15,23,42,.025),
                inset 0 1px 0 rgba(255,255,255,.9);
        }

        .submission-card::before {
            content: "";

            position: absolute;

            left: 0;
            top: 12px;
            bottom: 12px;

            width: 3px;

            border-radius: 0 5px 5px 0;

            background:
                linear-gradient(
                    180deg,
                    #2563eb,
                    #60a5fa
                );

            opacity: 0;

            transition: opacity .25s ease;
        }

        .submission-card:hover {
            transform: translateY(-3px);

            border-color: #bfdbfe;

            box-shadow:
                0 16px 30px rgba(15,23,42,.075),
                0 5px 12px rgba(37,99,235,.06),
                inset 0 1px 0 rgba(255,255,255,.95);
        }

        .submission-card:hover::before {
            opacity: 1;
        }

        .submission-link {
            transition: all .2s ease;
        }

        .submission-link:hover .submission-title {
            color: #2563eb;
        }

        .submission-title {
            transition: color .2s ease;
        }

        /* =========================================================
            NUMBER
        ========================================================= */

        .number-box {
            position: relative;

            background:
                linear-gradient(
                    145deg,
                    #2563eb,
                    #1e40af
                );

            box-shadow:
                0 8px 18px rgba(37,99,235,.22),
                inset 0 1px 0 rgba(255,255,255,.22);

            transition: all .25s ease;
        }

        .submission-card:hover .number-box {
            transform: scale(1.04);

            box-shadow:
                0 10px 22px rgba(37,99,235,.28),
                inset 0 1px 0 rgba(255,255,255,.25);
        }

        /* =========================================================
            STATUS
        ========================================================= */

        .status-badge {
            box-shadow:
                0 2px 5px rgba(15,23,42,.035);

            transition: all .2s ease;
        }

        .status-badge:hover {
            transform: translateY(-1px);
        }

        /* =========================================================
            EMPTY STATE
        ========================================================= */

        .empty-state {
            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(59,130,246,.07),
                    transparent 35%
                ),
                #f8fafc;
        }

        .empty-icon {
            width: 60px;
            height: 60px;

            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 14px;

            background:
                linear-gradient(
                    145deg,
                    #eff6ff,
                    #dbeafe
                );

            color: #3b82f6;

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.9),
                0 8px 18px rgba(37,99,235,.08);
        }

        /* =========================================================
            MOBILE
        ========================================================= */

        @media (max-width: 768px) {

            .verification-filter-card {
                padding: 1rem !important;
            }

            .filter-decoration-one,
            .filter-decoration-two,
            .filter-decoration-three {
                display: none;
            }

            .action-buttons {
                width: 100%;
            }

            .action-buttons a,
            .action-buttons button {
                flex: 1;
            }

            .submission-card {
                align-items: flex-start;
            }

            .number-box {
                width: 40px;
                height: 40px;
                border-radius: 12px;
            }
        }

    </style>


    <div class="verification-page min-h-screen py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =====================================================
                 SEARCH & FILTER
            ====================================================== --}}

            <div class="verification-filter-card rounded-3xl p-6 md:p-7 mb-6 anim-fade-in anim-delay-1">

                <div class="filter-decoration-one"></div>
                <div class="filter-decoration-two"></div>
                <div class="filter-decoration-three"></div>

                <form method="GET"
                      action="{{ url()->current() }}"
                      class="relative z-10">

                    {{-- Pertahankan tab aktif --}}
                    <input type="hidden"
                           name="tab"
                           value="{{ request('tab', 'my_proses') }}">


                    {{-- HEADER --}}
                    <div class="flex items-center gap-4 mb-7">

                        <div class="filter-icon-box">

                            <svg class="w-6 h-6 text-blue-600"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L14 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 018 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>

                            </svg>

                        </div>

                        <div>
                            <h3 class="text-lg md:text-xl font-bold text-slate-800">
                                Cari & Filter Pengajuan
                            </h3>

                            <p class="text-sm text-slate-500 mt-1">
                                Gunakan kata kunci, divisi, dan rentang tanggal
                                untuk mempermudah pencarian.
                            </p>
                        </div>

                    </div>


                    {{-- SEARCH + DIVISI --}}
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                        {{-- SEARCH --}}
                        <div class="lg:col-span-2">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Cari Pengajuan
                            </label>

                            <div class="search-wrapper">

                                <svg class="search-icon w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>

                                </svg>

                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       class="modern-input py-3.5 px-4 text-sm"
                                       placeholder="Cari nama pengajuan...">

                            </div>

                        </div>


                        {{-- DIVISI --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Filter Divisi
                            </label>

                            <div class="modern-select-wrapper">

                                <select name="divisi"
                                        onchange="this.form.submit()"
                                        class="modern-input modern-select py-3.5 px-4 text-sm">

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

                                </select>

                                <svg class="select-icon w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- DATE + BUTTON --}}
                    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5 mt-5">

                        <div class="flex flex-col sm:flex-row gap-4">

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Mulai Tanggal
                                </label>

                                <input type="date"
                                       name="start_date"
                                       value="{{ request('start_date') }}"
                                       class="modern-input py-3.5 px-4 text-sm sm:w-52">

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Sampai Tanggal
                                </label>

                                <input type="date"
                                       name="end_date"
                                       value="{{ request('end_date') }}"
                                       class="modern-input py-3.5 px-4 text-sm sm:w-52">

                            </div>

                        </div>


                        <div class="action-buttons flex gap-3">

                            {{-- RESET --}}
                            <a href="{{ url()->current() }}"
                               class="modern-btn btn-reset inline-flex items-center justify-center gap-2
                                     px-5 py-3.5 rounded-xl text-sm font-semibold text-slate-600">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>

                                </svg>

                                Reset

                            </a>


                            {{-- CARI --}}
                            <button type="submit"
                                    class="modern-btn btn-search inline-flex items-center justify-center gap-2
                                           px-6 py-3.5 rounded-xl text-sm font-semibold text-white">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>

                                </svg>

                                Cari

                            </button>

                        </div>

                    </div>

                </form>

            </div>


            {{-- =====================================================
                 TABS
            ====================================================== --}}

            @php
                $activeTab = request('tab', 'my_proses');
            @endphp


            <div class="tabs-card rounded-3xl px-4 md:px-5 pt-2 mb-6 overflow-hidden anim-fade-in anim-delay-2">

                <div class="flex gap-1 overflow-x-auto border-b border-slate-200">

                    {{-- SEDANG DIPROSES --}}
                    <a href="{{ request()->fullUrlWithQuery(['tab' => 'my_proses']) }}"
                       class="verification-tab flex items-center gap-2.5 px-4 md:px-5 py-4
                             text-sm font-semibold whitespace-nowrap
                             {{ $activeTab == 'my_proses'
                                 ? 'active'
                                 : 'text-slate-500' }}">

                        <span class="tab-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h7"/>
                            </svg>
                        </span>

                        Sedang Diproses

                        <span class="inline-flex items-center justify-center min-w-7 h-6 px-2 rounded-full
                                     bg-blue-50 text-blue-700 text-xs font-bold">
                            {{ $my_proses->total() }}
                        </span>

                    </a>


                    {{-- BELUM DIPERIKSA --}}
                    <a href="{{ request()->fullUrlWithQuery(['tab' => 'not_check']) }}"
                       class="verification-tab flex items-center gap-2.5 px-4 md:px-5 py-4
                             text-sm font-semibold whitespace-nowrap
                             {{ $activeTab == 'not_check'
                                 ? 'active'
                                 : 'text-slate-500' }}">

                        <span class="tab-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>

                        Belum Diperiksa

                        <span class="inline-flex items-center justify-center min-w-7 h-6 px-2 rounded-full
                                     bg-amber-50 text-amber-700 text-xs font-bold">
                            {{ $not_check_submit->total() }}
                        </span>

                    </a>


                    {{-- SEMUA --}}
                    <a href="{{ request()->fullUrlWithQuery(['tab' => 'all_submit']) }}"
                       class="verification-tab flex items-center gap-2.5 px-4 md:px-5 py-4
                             text-sm font-semibold whitespace-nowrap
                             {{ $activeTab == 'all_submit'
                                 ? 'active'
                                 : 'text-slate-500' }}">

                        <span class="tab-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </span>

                        Semua Pengajuan

                        <span class="inline-flex items-center justify-center min-w-7 h-6 px-2 rounded-full
                                     bg-slate-100 text-slate-600 text-xs font-bold">
                            {{ $all_submit->total() }}
                        </span>

                    </a>

                </div>

            </div>


            {{-- CONTAINER ISI TAB (DENGAN ANIMASI) --}}
            <div class="anim-fade-in anim-delay-3">

                {{-- =====================================================
                     TAB SEDANG DIPROSES
                ====================================================== --}}

                @if($activeTab == 'my_proses')

                    <div class="submission-container rounded-3xl p-5 md:p-6 mb-6">

                        <div class="flex items-center gap-4 mb-6 pb-5 border-b border-slate-100">

                            <div class="section-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Pengajuan yang sedang anda proses
                                </h3>

                                <p class="text-sm text-slate-500 mt-1">
                                    Total: {{ $my_proses->total() }} pengajuan
                                </p>
                            </div>

                        </div>


                        <div class="space-y-3">

                            @php
                                $no = 1 + (($my_proses->currentPage() - 1) * $my_proses->perPage());
                            @endphp


                            @forelse ($my_proses as $proses)

                                <div class="submission-card flex items-center p-4">

                                    <div class="number-box flex-shrink-0 w-11 h-11
                                                flex items-center justify-center
                                                text-white font-bold text-sm rounded-xl">
                                        {{ $no++ }}
                                    </div>


                                    <a href="{{ route('verification.show', $proses->id) }}"
                                       class="submission-link flex-1 px-4 min-w-0">

                                        <div class="submission-title font-bold text-slate-800 mb-2 truncate">
                                            {{ $proses->budget_submission_name }}
                                        </div>


                                        <div class="text-xs text-slate-500 mb-2">
                                            Diajukan oleh:
                                            <span class="font-semibold text-slate-700">
                                                {{ $proses->user->name ?? '-' }}
                                            </span>
                                        </div>


                                        <div class="text-xs text-slate-500 mb-3">
                                            Divisi:
                                            <span class="font-semibold text-slate-700">
                                                {{ $proses->divisi ?? $proses->user->role ?? '-' }}
                                            </span>
                                        </div>


                                        <div class="flex flex-wrap items-center gap-2">

                                            @if (
                                                ($proses->requirements_status == 'Belum Lengkap'
                                                || $proses->requirements_status == 'Belum Diperiksa')
                                                && $proses->verification_status == 0
                                            )
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-yellow-50 text-yellow-700 border border-yellow-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                    Sedang Proses
                                                </span>
                                            @endif


                                            @if ($proses->requirements_status == 'Belum Lengkap')
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-yellow-50 text-yellow-700 border border-yellow-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                    Belum Lengkap
                                                </span>
                                            @elseif($proses->requirements_status == 'Lengkap')
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-green-50 text-green-700 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Lengkap
                                                </span>
                                            @else
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-red-50 text-red-700 border border-red-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Belum Diperiksa
                                                </span>
                                            @endif


                                            @if ($proses->verification_status == 1)
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-green-50 text-green-700 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Diverifikasi
                                                </span>
                                            @else
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-red-50 text-red-700 border border-red-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Belum Diverifikasi
                                                </span>
                                            @endif


                                            @if ($proses->is_archive == 1)
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-blue-50 text-blue-700 border border-blue-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                    Diarsipkan
                                                </span>
                                            @endif

                                        </div>

                                    </a>


                                    <span class="hidden sm:block text-xs text-slate-400 whitespace-nowrap">
                                        {{ $proses->created_at->diffForHumans() }}
                                    </span>


                                    <div class="flex-shrink-0 ml-4">
                                        <svg class="w-5 h-5 text-slate-300 transition-transform duration-200 group-hover:translate-x-1"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </div>

                                </div>

                            @empty

                                <div class="empty-state text-center py-16 rounded-2xl border border-dashed border-slate-200">
                                    <div class="empty-icon">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>

                                    <p class="text-slate-700 font-bold">
                                        Tidak Ada Pengajuan
                                    </p>

                                    <p class="text-slate-400 text-sm mt-1">
                                        Belum ada pengajuan yang sedang Anda proses
                                    </p>
                                </div>

                            @endforelse


                            <div class="mt-6">
                                {{ $my_proses->appends(request()->query())->links() }}
                            </div>

                        </div>

                    </div>

                @endif


                {{-- =====================================================
                     TAB BELUM DIPERIKSA
                ====================================================== --}}

                @if($activeTab == 'not_check')

                    <div class="submission-container rounded-3xl p-5 md:p-6 mb-6">

                        <div class="flex items-center gap-4 mb-6 pb-5 border-b border-slate-100">

                            <div class="section-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Pengajuan Belum Diperiksa
                                </h3>

                                <p class="text-sm text-slate-500 mt-1">
                                    Total: {{ $not_check_submit->total() }} pengajuan
                                </p>
                            </div>

                        </div>


                        <div class="space-y-3">

                            @php
                                $no = 1 + (($not_check_submit->currentPage() - 1) * $not_check_submit->perPage());
                            @endphp


                            @forelse ($not_check_submit as $submit)

                                <div class="submission-card flex items-center p-4">

                                    <div class="number-box flex-shrink-0 w-11 h-11
                                                flex items-center justify-center
                                                text-white font-bold text-sm rounded-xl">
                                        {{ $no++ }}
                                    </div>


                                    <a href="{{ route('verification.show', $submit->id) }}"
                                       class="submission-link flex-1 px-4 min-w-0">

                                        <div class="submission-title font-bold text-slate-800 mb-2 truncate">
                                            {{ $submit->budget_submission_name }}
                                        </div>


                                        <div class="text-xs text-slate-500 mb-2">
                                            Diajukan oleh:
                                            <span class="font-semibold text-slate-700">
                                                {{ $submit->user->name ?? '-' }}
                                            </span>
                                        </div>


                                        <div class="text-xs text-slate-500 mb-3">
                                            Divisi:
                                            <span class="font-semibold text-slate-700">
                                                {{ $submit->divisi ?? $submit->user->role ?? '-' }}
                                            </span>
                                        </div>


                                        <div class="flex flex-wrap items-center gap-2">

                                            @if (
                                                ($submit->requirements_status == 'Belum Lengkap'
                                                || $submit->requirements_status == 'Belum Diperiksa')
                                                && $submit->verification_status == 0
                                            )
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-yellow-50 text-yellow-700 border border-yellow-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                    Sedang Proses
                                                </span>
                                            @endif


                                            @if ($submit->requirements_status == 'Belum Lengkap')
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-yellow-50 text-yellow-700 border border-yellow-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                    Belum Lengkap
                                                </span>
                                            @elseif($submit->requirements_status == 'Lengkap')
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-green-50 text-green-700 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Lengkap
                                                </span>
                                            @else
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-red-50 text-red-700 border border-red-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Belum Diperiksa
                                                </span>
                                            @endif


                                            @if ($submit->verification_status == 1)
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-green-50 text-green-700 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Diverifikasi
                                                </span>
                                            @else
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-red-50 text-red-700 border border-red-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Belum Diverifikasi
                                                </span>
                                            @endif


                                            @if ($submit->is_archive == 1)
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-blue-50 text-blue-700 border border-blue-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                    Diarsipkan
                                                </span>
                                            @endif

                                        </div>

                                    </a>


                                    <span class="hidden sm:block text-xs text-slate-400 whitespace-nowrap">
                                        {{ $submit->created_at->diffForHumans() }}
                                    </span>


                                    <div class="flex-shrink-0 ml-4">
                                        <svg class="w-5 h-5 text-slate-300"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </div>

                                </div>

                            @empty

                                <div class="empty-state text-center py-16 rounded-2xl border border-dashed border-slate-200">
                                    <div class="empty-icon">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>

                                    <p class="text-slate-700 font-bold">
                                        Tidak Ada Pengajuan
                                    </p>

                                    <p class="text-slate-400 text-sm mt-1">
                                        Belum ada pengajuan yang perlu diperiksa
                                    </p>
                                </div>

                            @endforelse


                            <div class="mt-6">
                                {{ $not_check_submit->appends(request()->query())->links() }}
                            </div>

                        </div>

                    </div>

                @endif


                {{-- =====================================================
                     TAB SEMUA PENGAJUAN
                ====================================================== --}}

                @if($activeTab == 'all_submit')

                    <div class="submission-container rounded-3xl p-5 md:p-6 mb-6">

                        <div class="flex items-center gap-4 mb-6 pb-5 border-b border-slate-100">

                            <div class="section-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Semua Pengajuan
                                </h3>

                                <p class="text-sm text-slate-500 mt-1">
                                    Total: {{ $all_submit->total() }} pengajuan
                                </p>
                            </div>

                        </div>


                        <div class="space-y-3">

                            @php
                                $no = 1 + (($all_submit->currentPage() - 1) * $all_submit->perPage());
                            @endphp


                            @forelse ($all_submit as $all)

                                <div class="submission-card flex items-center p-4">

                                    <div class="number-box flex-shrink-0 w-11 h-11
                                                flex items-center justify-center
                                                text-white font-bold text-sm rounded-xl">
                                        {{ $no++ }}
                                    </div>


                                    <a href="{{ route('verification.show', $all->id) }}"
                                       class="submission-link flex-1 px-4 min-w-0">

                                        <div class="submission-title font-bold text-slate-800 mb-2 truncate">
                                            {{ $all->budget_submission_name }}
                                        </div>


                                        <div class="text-xs text-slate-500 mb-2">
                                            Diajukan oleh:
                                            <span class="font-semibold text-slate-700">
                                                {{ $all->user->name ?? '-' }}
                                            </span>
                                        </div>


                                        <div class="text-xs text-slate-500 mb-3">
                                            Divisi:
                                            <span class="font-semibold text-slate-700">
                                                {{ $all->divisi ?? $all->user->role ?? '-' }}
                                            </span>
                                        </div>


                                        <div class="flex flex-wrap items-center gap-2">

                                            @if (
                                                ($all->requirements_status == 'Belum Lengkap'
                                                || $all->requirements_status == 'Belum Diperiksa')
                                                && $all->verification_status == 0
                                            )
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-yellow-50 text-yellow-700 border border-yellow-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                    Sedang Proses
                                                </span>
                                            @endif


                                            @if ($all->requirements_status == 'Belum Lengkap')
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-yellow-50 text-yellow-700 border border-yellow-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                    Belum Lengkap
                                                </span>
                                            @elseif($all->requirements_status == 'Lengkap')
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-green-50 text-green-700 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Lengkap
                                                </span>
                                            @else
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-red-50 text-red-700 border border-red-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Belum Diperiksa
                                                </span>
                                            @endif


                                            @if ($all->verification_status == 1)
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-green-50 text-green-700 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Diverifikasi
                                                </span>
                                            @else
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-red-50 text-red-700 border border-red-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Belum Diverifikasi
                                                </span>
                                            @endif


                                            @if ($all->is_archive == 1)
                                                <span class="status-badge inline-flex items-center gap-1.5 px-2.5 py-1
                                                             text-xs font-semibold rounded-lg
                                                             bg-blue-50 text-blue-700 border border-blue-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                    Diarsipkan
                                                </span>
                                            @endif

                                        </div>

                                    </a>


                                    <span class="hidden sm:block text-xs text-slate-400 whitespace-nowrap">
                                        {{ $all->created_at->diffForHumans() }}
                                    </span>


                                    <div class="flex-shrink-0 ml-4">
                                        <svg class="w-5 h-5 text-slate-300"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </div>

                                </div>

                            @empty

                                <div class="empty-state text-center py-16 rounded-2xl border border-dashed border-slate-200">
                                    <div class="empty-icon">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>

                                    <p class="text-slate-700 font-bold">
                                        Tidak Ada Pengajuan
                                    </p>

                                    <p class="text-slate-400 text-sm mt-1">
                                        Belum ada pengajuan ditemukan
                                    </p>
                                </div>

                            @endforelse


                            <div class="mt-6">
                                {{ $all_submit->appends(request()->query())->links() }}
                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>
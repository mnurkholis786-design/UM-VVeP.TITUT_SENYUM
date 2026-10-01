<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white shadow-lg shadow-blue-500/30">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 3v5h5" />
                </svg>
            </div>

            <div>
                <h2 class="text-xl font-black tracking-tight text-slate-800 sm:text-2xl">
                    {{ __('Detail Pengajuan') }}
                </h2>
                <p class="mt-0.5 text-xs font-medium text-slate-500">
                    Informasi lengkap mengenai pengajuan anggaran
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        /* =========================================================
           DETAIL PENGAJUAN - MODERN 3D UI
        ========================================================== */

        .detail-page {
            position: relative;
            overflow: hidden;
            min-height: calc(100vh - 80px);
            background:
                radial-gradient(circle at 10% 10%, rgba(59, 130, 246, .12), transparent 28%),
                radial-gradient(circle at 90% 20%, rgba(99, 102, 241, .12), transparent 30%),
                radial-gradient(circle at 50% 100%, rgba(14, 165, 233, .08), transparent 35%),
                linear-gradient(135deg, #f8fbff 0%, #eef4ff 45%, #f8fafc 100%);
        }

        .detail-orb {
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(1px);
            opacity: .65;
        }

        .detail-orb-1 {
            width: 280px;
            height: 280px;
            top: 80px;
            right: -100px;
            background: radial-gradient(circle, rgba(59, 130, 246, .18), transparent 68%);
        }

        .detail-orb-2 {
            width: 260px;
            height: 260px;
            left: -100px;
            bottom: 300px;
            background: radial-gradient(circle, rgba(99, 102, 241, .14), transparent 68%);
        }

        .detail-grid {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .3;
            background-image:
                linear-gradient(rgba(59, 130, 246, .035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, .035) 1px, transparent 1px);
            background-size: 35px 35px;
        }

        .detail-card {
            position: relative;
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(255, 255, 255, .9);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            box-shadow:
                0 20px 60px rgba(30, 64, 175, .08),
                0 4px 15px rgba(15, 23, 42, .04),
                inset 0 1px 0 rgba(255, 255, 255, .9);
        }

        .detail-card-hover {
            transition:
                transform .35s cubic-bezier(.2,.8,.2,1),
                box-shadow .35s ease,
                border-color .35s ease;
        }

        .detail-card-hover:hover {
            transform: translateY(-4px);
            box-shadow:
                0 28px 70px rgba(30, 64, 175, .13),
                0 8px 20px rgba(15, 23, 42, .06);
            border-color: rgba(147, 197, 253, .75);
        }

        .hero-card {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(255,255,255,.96), rgba(239,246,255,.92));
            border: 1px solid rgba(191, 219, 254, .65);
            box-shadow:
                0 30px 80px rgba(30, 64, 175, .12),
                inset 0 1px 0 rgba(255,255,255,.95);
        }

        .hero-card::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            right: -150px;
            top: -190px;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(59,130,246,.18), transparent 68%);
            pointer-events: none;
        }

        .hero-card::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            right: 120px;
            bottom: -200px;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(99,102,241,.12), transparent 68%);
            pointer-events: none;
        }

        .hero-icon {
            box-shadow:
                0 15px 30px rgba(37, 99, 235, .28),
                inset 0 1px 0 rgba(255,255,255,.4);
        }

        .status-pill {
            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .status-pill:hover {
            transform: translateY(-2px) scale(1.015);
        }

        .info-card {
            transition:
                transform .3s cubic-bezier(.2,.8,.2,1),
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 18px 40px rgba(30,64,175,.10),
                0 5px 12px rgba(15,23,42,.04);
            border-color: rgba(147,197,253,.8);
        }

        .icon-box {
            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }

        .info-card:hover .icon-box {
            transform: rotate(-4deg) scale(1.07);
            box-shadow: 0 10px 24px rgba(37,99,235,.18);
        }

        .section-title-line {
            width: 5px;
            border-radius: 9999px;
            background: linear-gradient(to bottom, #2563eb, #6366f1);
            box-shadow: 0 4px 14px rgba(37,99,235,.3);
        }

        .file-card {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(248,250,252,.95), rgba(239,246,255,.75));
        }

        .file-card::before {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            right: -60px;
            top: -80px;
            border-radius: 9999px;
            background: rgba(59,130,246,.08);
        }

        /* =========================================================
           LIHAT FILE - BIRU/INDIGO
        ========================================================== */

        .view-file-btn {
            color: #ffffff !important;

            background:
                linear-gradient(
                    135deg,
                    #2563eb 0%,
                    #4f46e5 100%
                ) !important;

            transition:
                transform .25s ease,
                box-shadow .25s ease,
                filter .25s ease;

            box-shadow:
                0 10px 24px rgba(37, 99, 235, .22),
                0 4px 10px rgba(79, 70, 229, .10);
        }

        .view-file-btn span,
        .view-file-btn svg {
            color: #ffffff !important;
        }

        .view-file-btn:hover {
            color: #ffffff !important;
            transform: translateY(-3px);
            filter: brightness(1.05);

            box-shadow:
                0 16px 32px rgba(37, 99, 235, .30),
                0 6px 14px rgba(79, 70, 229, .18);
        }

        .table-wrapper {
            box-shadow:
                0 18px 50px rgba(15,23,42,.08),
                inset 0 1px 0 rgba(255,255,255,.8);
        }

        .check-row {
            transition:
                background .25s ease,
                transform .25s ease,
                box-shadow .25s ease;
        }

        .check-row:hover {
            background: linear-gradient(
                90deg,
                rgba(239,246,255,.85),
                rgba(248,250,252,.95)
            );
            box-shadow: inset 4px 0 0 #3b82f6;
        }

        .check-row:hover td:first-child {
            color: #2563eb;
            font-weight: 900;
        }

        .custom-radio {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 9999px;
            background: #fff;
            border: 2px solid #cbd5e1;
            position: relative;
            opacity: 1;
            cursor: default;
            box-shadow:
                0 2px 5px rgba(15,23,42,.08),
                inset 0 1px 2px rgba(15,23,42,.04);
        }

        .custom-radio:checked {
            border-color: #2563eb;
            background: #2563eb;
        }

        .custom-radio:checked::after {
            content: "";
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 9999px;
            background: #fff;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .radio-green:checked {
            background: #10b981;
            border-color: #10b981;
        }

        .radio-red:checked {
            background: #ef4444;
            border-color: #ef4444;
        }

        .radio-yellow:checked {
            background: #f59e0b;
            border-color: #f59e0b;
        }

        .radio-blue:checked {
            background: #2563eb;
            border-color: #2563eb;
        }

        .radio-slate:checked {
            background: #64748b;
            border-color: #64748b;
        }

        .back-button {
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                background .25s ease;
        }

        .back-button:hover {
            transform: translateX(-3px) translateY(-2px);
            box-shadow: 0 12px 28px rgba(37,99,235,.16);
        }

        .floating-dot {
            animation: floatingDot 4s ease-in-out infinite;
        }

        @keyframes floatingDot {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-7px);
            }
        }

        .pulse-soft {
            animation: pulseSoft 2.2s ease-in-out infinite;
        }

        @keyframes pulseSoft {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(37,99,235,.16);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(37,99,235,0);
            }
        }

        @media (max-width: 768px) {
            .detail-card,
            .hero-card {
                border-radius: 20px;
            }

            .table-wrapper {
                border-radius: 16px;
            }
        }
    </style>

    <div class="detail-page py-7 sm:py-9">

        {{-- BACKGROUND DECORATION --}}
        <div class="detail-grid"></div>
        <div class="detail-orb detail-orb-1"></div>
        <div class="detail-orb detail-orb-2"></div>

        <div class="relative z-10 mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">

            {{-- BACK BUTTON --}}
            <div>
                <a href="{{ url('/keuangan/report') }}"
                    class="back-button group inline-flex items-center gap-2.5 rounded-2xl border border-white/80 bg-white/85 px-5 py-3 text-sm font-black text-blue-700 shadow-lg shadow-blue-900/5 backdrop-blur-xl">

                    <span class="flex h-7 w-7 items-center justify-center rounded-xl bg-blue-50 transition-all duration-300 group-hover:bg-blue-600 group-hover:text-white">
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:-translate-x-0.5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </span>

                    Kembali
                </a>
            </div>

            {{-- HERO / DETAIL UTAMA --}}
            <section class="hero-card rounded-[28px] p-5 sm:p-7 lg:p-8">

                <div class="relative z-10 flex flex-col gap-5 border-b border-blue-100/80 pb-6 lg:flex-row lg:items-start lg:justify-between">

                    <div class="flex min-w-0 items-start gap-4">

                        <div class="hero-icon floating-dot flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 via-blue-600 to-indigo-700 text-white">

                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 3v5h5" />
                            </svg>

                        </div>

                        <div class="min-w-0">

                            <div class="mb-2 flex flex-wrap items-center gap-2">

                                <span class="rounded-full bg-blue-50 px-3 py-1 text-[10px] font-black uppercase tracking-[.18em] text-blue-700">
                                    Pengajuan Anggaran
                                </span>

                                <span class="h-1.5 w-1.5 rounded-full bg-blue-400"></span>

                                <span class="text-xs font-bold text-slate-400">
                                    ID #{{ $pengajuan->id }}
                                </span>

                            </div>

                            <h3 class="break-words text-xl font-black leading-tight tracking-tight text-slate-900 sm:text-2xl lg:text-3xl">
                                {{ $pengajuan->budget_submission_name }}
                            </h3>

                            <p class="mt-2 text-sm font-medium text-slate-500">
                                Informasi dan status lengkap pengajuan anggaran
                            </p>

                        </div>

                    </div>

                    <div class="status-pill inline-flex w-fit items-center gap-2 rounded-2xl border border-blue-200/80 bg-white/80 px-4 py-3 text-xs font-black text-blue-700 shadow-lg shadow-blue-500/10 backdrop-blur-xl">

                        <span class="pulse-soft flex h-7 w-7 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 6v6l4 2" />
                            </svg>

                        </span>

                        {{ $pengajuan->verification_status ? 'Sudah Diverifikasi' : 'Sedang Diproses' }}

                    </div>

                </div>

                {{-- TIMESTAMP --}}
                <div class="relative z-10 mt-6 flex flex-wrap gap-3">

                    <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-white/80 px-4 py-3 text-xs font-medium text-slate-500 shadow-sm backdrop-blur-xl">

                        <span class="flex h-7 w-7 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 4h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>

                        </span>

                        <span>
                            Dibuat:
                            <strong class="font-black text-slate-800">
                                {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                            </strong>
                        </span>

                    </div>

                    <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-white/80 px-4 py-3 text-xs font-medium text-slate-500 shadow-sm backdrop-blur-xl">

                        <span class="flex h-7 w-7 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </span>

                        <span>
                            Update:
                            <strong class="font-black text-slate-800">
                                {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                            </strong>
                        </span>

                    </div>

                </div>

                {{-- PAYMENT & FUNDING --}}
                <div class="relative z-10 mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">

                    <div class="info-card rounded-2xl border border-blue-100 bg-gradient-to-br from-white to-blue-50/60 p-5 shadow-md">

                        <div class="flex items-center gap-4">

                            <div class="icon-box flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/20">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h2m2 0h2m2 0h2M5 6h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="text-[10px] font-black uppercase tracking-[.18em] text-slate-400">
                                    Metode Pembayaran
                                </p>

                                <p class="mt-1 break-words text-base font-black text-slate-800">
                                    {{ $pengajuan->payment_method->payment_method_name . ' - ' ?? '-' }}
                                    {{ $pengajuan->payment_method->sub_category ?? '' }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="info-card rounded-2xl border border-emerald-100 bg-gradient-to-br from-white to-emerald-50/50 p-5 shadow-md">

                        <div class="flex items-center gap-4">

                            <div class="icon-box flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-lg shadow-emerald-500/20">

                                <span class="text-lg font-black">
                                    Rp
                                </span>

                            </div>

                            <div class="min-w-0">

                                <p class="text-[10px] font-black uppercase tracking-[.18em] text-slate-400">
                                    Sumber Dana
                                </p>

                                <p class="mt-1 break-words text-base font-black text-slate-800">
                                    {{ $pengajuan->funding_source->funding_source_name . ' - ' ?? '-' }}
                                    {{ $pengajuan->funding_source->sub_category ?? '' }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- STATUS --}}
                <div class="relative z-10 mt-6 flex flex-wrap gap-3 border-t border-blue-100/80 pt-5">

                    @if ($pengajuan->requirements_status == 'Belum Lengkap' && $pengajuan->requirements_status == 0)

                        <div class="status-pill inline-flex items-center gap-2 rounded-2xl border border-blue-200 bg-blue-50 px-4 py-2.5 text-xs font-black text-blue-700 shadow-sm">

                            <span class="relative flex h-2.5 w-2.5">

                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-400 opacity-75"></span>

                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-blue-500"></span>

                            </span>

                            Tahapan: Dalam Proses

                        </div>

                    @endif

                    <div class="status-pill inline-flex items-center gap-2 rounded-2xl border px-4 py-2.5 text-xs font-black shadow-sm
                        {{ $pengajuan->requirements_status == 'Lengkap'
                            ? 'border-emerald-200 bg-emerald-50 text-emerald-700'
                            : 'border-amber-200 bg-amber-50 text-amber-700' }}">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full
                            {{ $pengajuan->requirements_status == 'Lengkap'
                                ? 'bg-emerald-500 text-white'
                                : 'bg-amber-500 text-white' }}">

                            @if ($pengajuan->requirements_status == 'Lengkap')
                                ✓
                            @else
                                !
                            @endif

                        </span>

                        Kelengkapan:
                        {{ ucfirst($pengajuan->requirements_status) }}

                    </div>

                    <div class="status-pill inline-flex items-center gap-2 rounded-2xl border px-4 py-2.5 text-xs font-black shadow-sm
                        {{ $pengajuan->verification_status
                            ? 'border-blue-200 bg-blue-50 text-blue-700'
                            : 'border-rose-200 bg-rose-50 text-rose-700' }}">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full
                            {{ $pengajuan->verification_status
                                ? 'bg-blue-500 text-white'
                                : 'bg-rose-500 text-white' }}">

                            @if ($pengajuan->verification_status)
                                ✓
                            @else
                                !
                            @endif

                        </span>

                        {{ $pengajuan->verification_status ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}

                    </div>

                    <div class="status-pill inline-flex items-center gap-2 rounded-2xl border px-4 py-2.5 text-xs font-black shadow-sm
                        {{ $pengajuan->is_archive
                            ? 'border-purple-200 bg-purple-50 text-purple-700'
                            : 'border-slate-200 bg-slate-100 text-slate-600' }}">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full
                            {{ $pengajuan->is_archive
                                ? 'bg-purple-500 text-white'
                                : 'bg-slate-400 text-white' }}">

                            @if ($pengajuan->is_archive)
                                ✓
                            @else
                                —
                            @endif

                        </span>

                        {{ $pengajuan->is_archive ? 'Diarsipkan' : 'Belum Diarsipkan' }}

                    </div>

                </div>

                {{-- INSPECTOR --}}
                <div class="relative z-10 mt-6 grid grid-cols-1 gap-4 border-t border-blue-100/80 pt-6 md:grid-cols-2">

                    {{-- Finance Officer --}}
                    <div class="info-card rounded-2xl border border-blue-100 bg-white/80 p-5 shadow-lg backdrop-blur-xl">

                        <div class="mb-5 flex items-center gap-3">

                            <div class="icon-box flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7-7h14a7 7 0 00-7-7z" />
                                </svg>

                            </div>

                            <div>

                                <p class="text-[10px] font-black uppercase tracking-[.18em] text-blue-600">
                                    Diperiksa Oleh
                                </p>

                                <p class="text-sm font-black text-slate-800">
                                    Petugas Keuangan
                                </p>

                            </div>

                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2">

                            <div class="rounded-xl bg-slate-50/80 p-3">

                                <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">
                                    Nama
                                </p>

                                <p class="mt-1 break-words text-sm font-black text-slate-800">
                                    {{ $pengajuan->finance_officer->name ?? '-' }}
                                </p>

                            </div>

                            <div class="rounded-xl bg-blue-50/50 p-3">

                                <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">
                                    Email
                                </p>

                                <p class="mt-1 break-all text-sm font-bold text-blue-600">
                                    {{ $pengajuan->finance_officer->email ?? '-' }}
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- Revenue Officer --}}
                    <div class="info-card rounded-2xl border border-indigo-100 bg-white/80 p-5 shadow-lg backdrop-blur-xl">

                        <div class="mb-5 flex items-center gap-3">

                            <div class="icon-box flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 00-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>

                            </div>

                            <div>

                                <p class="text-[10px] font-black uppercase tracking-[.18em] text-indigo-600">
                                    Diperiksa Oleh Bendahara
                                </p>

                                <p class="text-sm font-black text-slate-800">
                                    Bendahara
                                </p>

                            </div>

                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2">

                            <div class="rounded-xl bg-slate-50/80 p-3">

                                <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">
                                    Nama
                                </p>

                                <p class="mt-1 break-words text-sm font-black text-slate-800">
                                    {{ $pengajuan->revenue_officer->name ?? '-' }}
                                </p>

                            </div>

                            <div class="rounded-xl bg-indigo-50/50 p-3">

                                <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">
                                    Email
                                </p>

                                <p class="mt-1 break-all text-sm font-bold text-indigo-600">
                                    {{ $pengajuan->revenue_officer->email ?? '-' }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            {{-- PESAN KRITIK & SARAN --}}
            <section class="detail-card detail-card-hover rounded-[26px] p-5 sm:p-7">

                <div class="mb-5 flex items-center gap-3">

                    <span class="section-title-line h-8"></span>

                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 text-white shadow-lg shadow-amber-400/20">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>

                    </div>

                    <div>

                        <h3 class="text-base font-black uppercase tracking-wider text-slate-800">
                            Pesan Kritik dan Saran
                        </h3>

                        <p class="text-xs font-medium text-slate-400">
                            Catatan dari proses pemeriksaan pengajuan
                        </p>

                    </div>

                </div>

                @if (isset($pengajuan->message) && !empty($pengajuan->message))

                    <div class="rounded-2xl border border-amber-200 bg-gradient-to-r from-amber-50 to-yellow-50 p-5 shadow-inner">

                        <div class="flex items-start gap-3.5">

                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 012-2h-3l-4 4z" />
                                </svg>

                            </div>

                            <p class="flex-1 whitespace-pre-line text-sm font-bold leading-relaxed text-slate-700">
                                {{ $pengajuan->message }}
                            </p>

                        </div>

                    </div>

                @else

                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-5 shadow-inner">

                        <div class="flex items-center gap-3">

                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-white text-slate-400 shadow-sm">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>

                            <p class="text-sm font-medium italic text-slate-400">
                                Tidak ada pesan kritik dan saran
                            </p>

                        </div>

                    </div>

                @endif

            </section>

            {{-- FILE PENGAJUAN --}}
            <section class="detail-card detail-card-hover rounded-[26px] p-5 sm:p-7">

                <div class="mb-5 flex items-center gap-3">

                    <span class="section-title-line h-8 bg-gradient-to-b from-blue-500 to-indigo-600"></span>

                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white shadow-lg shadow-blue-500/20">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>

                    </div>

                    <div>

                        <h3 class="text-base font-black uppercase tracking-wider text-slate-800">
                            File Pengajuan
                        </h3>

                        <p class="text-xs font-medium text-slate-400">
                            Dokumen utama pengajuan anggaran
                        </p>

                    </div>

                </div>

                <div class="file-card rounded-2xl border border-blue-100 p-5 shadow-md">

                    <div class="relative z-10 flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                        <div class="flex min-w-0 items-center gap-4">

                            <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-red-500 to-rose-600 text-white shadow-lg shadow-red-500/20">

                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 3h7l5 5v13a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 3v6h6" />
                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="text-[10px] font-black uppercase tracking-[.18em] text-slate-400">
                                    File Saat Ini
                                </p>

                                <p class="mt-1 break-all text-sm font-black text-slate-800">
                                    {{ $pengajuan->path_file_submission ? basename($pengajuan->path_file_submission) : '-' }}
                                </p>

                                <div class="mt-2 flex items-center gap-2">

                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                                    <span class="text-[11px] font-bold text-slate-400">
                                        Dokumen PDF
                                    </span>

                                </div>

                            </div>

                        </div>

                        {{-- BUTTON LIHAT FILE --}}
                        <a href="{{ asset('storage/' . $pengajuan->path_file_submission) }}"
                            target="_blank"
                            class="view-file-btn inline-flex flex-shrink-0 items-center justify-center gap-2.5 rounded-2xl px-6 py-3.5 text-sm font-black text-white">

                            <svg class="h-5 w-5 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2.5"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2.5"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                            </svg>

                            <span class="text-white">
                                Lihat File
                            </span>

                        </a>

                    </div>

                </div>

                {{-- FORM UPLOAD PERBAIKAN --}}
                @if (!$pengajuan->verification_status && !$pengajuan->is_archive)

                    <form action="{{ route('keuangan.perbaiki', $pengajuan->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mt-6 space-y-5 border-t border-slate-100 pt-6">

                        @method('PUT')
                        @csrf

                        <div class="rounded-2xl border border-blue-100 bg-blue-50/40 p-5">

                            <div class="mb-5 flex items-center gap-3">

                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-500/20">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2.5"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>

                                </div>

                                <div>

                                    <h4 class="text-sm font-black text-slate-800">
                                        Perbaiki Pengajuan
                                    </h4>

                                    <p class="text-xs font-medium text-slate-500">
                                        Upload dokumen baru apabila diperlukan perbaikan.
                                    </p>

                                </div>

                            </div>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                {{-- Payment --}}
                                <div class="space-y-2">

                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-600">
                                        Metode Pembayaran
                                        <span class="text-rose-500">*</span>
                                    </label>

                                    <select name="payment_method"
                                        id="payment_method"
                                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 font-bold text-slate-900 shadow-sm outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/15"
                                        required>

                                        <option value="">
                                            Pilih metode pembayaran
                                        </option>

                                        @foreach ($payment_method as $payment)

                                            <option value="{{ $payment->id }}"
                                                {{ $pengajuan->payment_method_id == $payment->id ? 'selected' : '' }}>

                                                {{ $payment->payment_method_name }} -
                                                {{ $payment->sub_category }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- Funding --}}
                                <div class="space-y-2">

                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-600">
                                        Sumber Dana
                                        <span class="text-rose-500">*</span>
                                    </label>

                                    <select name="funding_source"
                                        id="funding_source"
                                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 font-bold text-slate-900 shadow-sm outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/15"
                                        required>

                                        <option value="">
                                            Pilih sumber dana
                                        </option>

                                        @foreach ($funding_source as $funding)

                                            <option value="{{ $funding->id }}"
                                                {{ $pengajuan->funding_source_id == $funding->id ? 'selected' : '' }}>

                                                {{ $funding->funding_source_name }} -
                                                {{ $funding->sub_category }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            {{-- File --}}
                            <div class="mt-5 space-y-2">

                                <label class="block text-xs font-black uppercase tracking-wider text-slate-600">
                                    File Pengajuan (PDF)
                                    <span class="text-rose-500">*</span>
                                </label>

                                <input type="file"
                                    name="file_pengajuan"
                                    accept="application/pdf"
                                    class="w-full cursor-pointer rounded-2xl border border-slate-200 bg-white px-4 py-3 font-medium text-slate-900 shadow-sm outline-none transition-all file:mr-4 file:rounded-xl file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-xs file:font-black file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/15"
                                    required>

                                <p class="text-xs font-bold text-slate-400">
                                    Format: PDF · Maksimal: 50MB
                                </p>

                            </div>

                            <button type="submit"
                                class="mt-5 inline-flex items-center gap-2.5 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 px-7 py-3.5 text-sm font-black text-white shadow-xl shadow-emerald-500/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-emerald-500/30">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2.5"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>

                                Upload Perbaikan

                            </button>

                        </div>

                    </form>

                @else

                    <div class="mt-6 rounded-2xl border border-blue-200 bg-gradient-to-r from-blue-50 to-indigo-50 p-5 shadow-inner">

                        <div class="flex items-start gap-3.5">

                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 01-9-9 9 9 0 019 9z" />
                                </svg>

                            </div>

                            <div>

                                <p class="text-sm font-black text-blue-900">
                                    File Tidak Dapat Diperbarui
                                </p>

                                <p class="mt-1 text-xs font-bold text-blue-700">

                                    @if ($pengajuan->status_verifikasi && $pengajuan->status_diarsipkan)

                                        File pengajuan sudah diverifikasi dan diarsipkan.

                                    @elseif ($pengajuan->status_verifikasi)

                                        File pengajuan sudah diverifikasi.

                                    @elseif ($pengajuan->status_diarsipkan)

                                        File pengajuan sudah diarsipkan.

                                    @endif

                                </p>

                            </div>

                        </div>

                    </div>

                @endif

            </section>

            {{-- CHECKLIST DOKUMEN --}}
            <section class="detail-card rounded-[26px] p-5 sm:p-7">

                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div class="flex items-center gap-3">

                        <span class="section-title-line h-8 bg-gradient-to-b from-indigo-500 to-blue-600"></span>

                        <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-600 text-white shadow-lg shadow-indigo-500/20">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2.3"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2" />
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2.3"
                                    d="M9 5a3 3 0 006 0M9 12h6m-6 4h6" />
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-base font-black uppercase tracking-wider text-slate-800">
                                Checklist Dokumen
                            </h3>

                            <p class="text-xs font-medium text-slate-400">
                                Status kelengkapan dokumen pengajuan
                            </p>

                        </div>

                    </div>

                </div>

                <div class="table-wrapper overflow-x-auto rounded-2xl border border-slate-200 bg-white">

                    <table class="min-w-[1000px] w-full border-collapse text-sm">

                        <thead>

                            <tr class="bg-gradient-to-r from-slate-100 via-blue-50 to-slate-100">

                                <th rowspan="2"
                                    class="border-b border-r border-slate-200 px-4 py-4 text-center text-[10px] font-black uppercase tracking-widest text-slate-600">
                                    No
                                </th>

                                <th rowspan="2"
                                    class="border-b border-r border-slate-200 px-5 py-4 text-left text-[10px] font-black uppercase tracking-widest text-slate-600">
                                    Nama Dokumen & TTD
                                </th>

                                <th colspan="3"
                                    class="border-b border-r border-slate-200 bg-blue-100/60 px-4 py-4 text-center text-[10px] font-black uppercase tracking-widest text-blue-900">
                                    Dokumen
                                </th>

                                <th colspan="2"
                                    class="border-b border-r border-slate-200 bg-emerald-100/50 px-4 py-4 text-center text-[10px] font-black uppercase tracking-widest text-emerald-900">
                                    Tanda Tangan
                                </th>

                                <th rowspan="2"
                                    class="border-b border-slate-200 px-5 py-4 text-center text-[10px] font-black uppercase tracking-widest text-slate-600">
                                    Keterangan
                                </th>

                            </tr>

                            <tr class="bg-slate-50">

                                <th class="border-b border-r border-slate-200 px-3 py-3 text-center text-[9px] font-black uppercase tracking-wider text-emerald-700">
                                    Ada
                                </th>

                                <th class="border-b border-r border-slate-200 px-3 py-3 text-center text-[9px] font-black uppercase tracking-wider text-rose-700">
                                    Tidak Ada
                                </th>

                                <th class="border-b border-r border-slate-200 px-3 py-3 text-center text-[9px] font-black uppercase tracking-wider text-amber-700">
                                    Tidak Diperlukan
                                </th>

                                <th class="border-b border-r border-slate-200 px-3 py-3 text-center text-[9px] font-black uppercase tracking-wider text-blue-700">
                                    Lengkap
                                </th>

                                <th class="border-b border-r border-slate-200 px-3 py-3 text-center text-[9px] font-black uppercase tracking-wider text-slate-600">
                                    Belum
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-200">

                            @php
                                $no = 1;
                            @endphp

                            @foreach ($syaratDoc as $index => $dokumen)

                                @if (trim($dokumen) == 'Routing Slip')
                                    @continue
                                @endif

                                <tr class="check-row group">

                                    {{-- NOMOR --}}
                                    <td class="border-r border-slate-200 px-4 py-3.5 text-center text-xs font-black text-slate-500">
                                        {{ $no++ }}
                                    </td>

                                    {{-- NAMA DOKUMEN --}}
                                    <td class="border-r border-slate-200 px-5 py-3.5">

                                        <span class="font-bold leading-snug text-slate-700 group-hover:text-slate-900">
                                            {{ $dokumen }}
                                        </span>

                                    </td>

                                    {{-- ADA --}}
                                    <td class="border-r border-slate-200 px-3 py-3.5 text-center">

                                        <input type="radio"
                                            class="custom-radio radio-green"
                                            disabled
                                            {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}>

                                    </td>

                                    {{-- TIDAK ADA --}}
                                    <td class="border-r border-slate-200 px-3 py-3.5 text-center">

                                        <input type="radio"
                                            class="custom-radio radio-red"
                                            disabled
                                            {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}>

                                    </td>

                                    {{-- TIDAK DIPERLUKAN --}}
                                    <td class="border-r border-slate-200 px-3 py-3.5 text-center">

                                        <input type="radio"
                                            class="custom-radio radio-yellow"
                                            disabled
                                            {{ isset($tidakperlu[$index]) && $tidakperlu[$index] ? 'checked' : '' }}>

                                    </td>

                                    {{-- LENGKAP --}}
                                    <td class="border-r border-slate-200 px-3 py-3.5 text-center">

                                        <input type="radio"
                                            class="custom-radio radio-blue"
                                            disabled
                                            {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}>

                                    </td>

                                    {{-- BELUM --}}
                                    <td class="border-r border-slate-200 px-3 py-3.5 text-center">

                                        <input type="radio"
                                            class="custom-radio radio-slate"
                                            disabled
                                            {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}>

                                    </td>

                                    {{-- KETERANGAN --}}
                                    <td class="px-5 py-3.5 text-center">

                                        @if (!empty($keterangan[$index]) && $keterangan[$index] !== '-')

                                            <span class="inline-flex max-w-[220px] items-center rounded-xl bg-amber-50 px-3 py-2 text-left text-xs font-bold text-amber-700">
                                                {{ $keterangan[$index] }}
                                            </span>

                                        @else

                                            <span class="text-xs font-bold text-slate-400">
                                                -
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </section>

            {{-- FOOTER DECORATION --}}
            <div class="flex items-center justify-center gap-3 pb-5 pt-1">

                <span class="h-1 w-12 rounded-full bg-blue-200"></span>

                <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-white/80 text-blue-500 shadow-sm">

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h14M12 5l7 7-7 7" />
                    </svg>

                </span>

                <span class="h-1 w-12 rounded-full bg-indigo-200"></span>

            </div>

        </div>

    </div>

</x-app-layout>
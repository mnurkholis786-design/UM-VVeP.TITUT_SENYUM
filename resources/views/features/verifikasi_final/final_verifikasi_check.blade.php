<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0056C7] flex items-center justify-center shadow-lg shadow-blue-900/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Verifikasi Final Pengajuan') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Pemeriksaan akhir dan pengarsipan pengajuan
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        .final-detail-bg {
            background:
                radial-gradient(circle at 0% 0%, rgba(0, 58, 143, .08), transparent 30%),
                radial-gradient(circle at 100% 10%, rgba(0, 86, 199, .07), transparent 25%),
                #f5f7fb;
        }

        .detail-hero {
            background:
                radial-gradient(circle at 90% 10%, rgba(255, 255, 255, .18), transparent 25%),
                radial-gradient(circle at 10% 100%, rgba(255, 255, 255, .10), transparent 25%),
                linear-gradient(135deg, #003A8F 0%, #0056C7 55%, #0074D9 100%);
            box-shadow:
                0 20px 45px rgba(0, 58, 143, .18),
                inset 0 1px 0 rgba(255,255,255,.18);
        }

        .detail-card {
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(226, 232, 240, .95);
            box-shadow:
                0 10px 30px rgba(15, 23, 42, .06),
                0 2px 8px rgba(15, 23, 42, .04);
            transition: all .25s ease;
        }

        .detail-card:hover {
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .09),
                0 4px 12px rgba(15, 23, 42, .05);
        }

        .section-head {
            background: linear-gradient(135deg, #f8fafc, #eef4fb);
            border-bottom: 1px solid #e5e7eb;
        }

        .info-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border: 1px solid #e5e7eb;
            transition: all .2s ease;
        }

        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, .06);
            border-color: #cbd5e1;
        }

        .form-card {
            background: linear-gradient(145deg, #f8fafc, #ffffff);
            border: 1px solid #e5e7eb;
            transition: all .2s ease;
        }

        .form-card:focus-within {
            border-color: rgba(0, 86, 199, .45);
            box-shadow: 0 8px 25px rgba(0, 58, 143, .08);
        }

        .back-btn {
            transition: all .2s ease;
        }

        .back-btn:hover {
            transform: translateX(-3px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, .08);
        }

        .file-box {
            background:
                linear-gradient(135deg, rgba(254, 242, 242, .9), rgba(239, 246, 255, .9));
            border: 1px solid #e5e7eb;
            transition: all .25s ease;
        }

        .file-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(15, 23, 42, .07);
        }

        .action-btn {
            transition: all .2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .verify-btn {
            background: linear-gradient(135deg, #059669, #10b981);
            box-shadow:
                0 10px 25px rgba(5, 150, 105, .22),
                inset 0 1px 0 rgba(255,255,255,.2);
            transition: all .25s ease;
        }

        .verify-btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 15px 30px rgba(5, 150, 105, .30),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        .input-modern {
            transition: all .2s ease;
        }

        .input-modern:focus {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .45rem .75rem;
            border-radius: 9999px;
            font-size: .72rem;
            font-weight: 700;
            border: 1px solid transparent;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 9999px;
            display: inline-block;
        }

        .upload-area {
            border: 2px dashed #cbd5e1;
            background: linear-gradient(145deg, #f8fafc, #ffffff);
            transition: all .25s ease;
        }

        .upload-area:hover {
            border-color: #3b82f6;
            background: #eff6ff;
        }
    </style>

    <div class="final-detail-bg min-h-screen py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- =========================================================
                HERO
            ========================================================== --}}
            <div class="detail-hero rounded-3xl overflow-hidden mb-6 relative">

                <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute -bottom-24 -left-20 w-80 h-80 rounded-full bg-blue-300/10 blur-3xl"></div>

                <div class="relative px-6 py-7 md:px-8 md:py-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center shadow-xl">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-3 py-1 rounded-full bg-white/15 border border-white/20 text-white text-xs font-semibold backdrop-blur-sm">
                                        VERIFIKASI FINAL
                                    </span>

                                    <span class="text-blue-100 text-xs">
                                        ID #{{ $pengajuan->id }}
                                    </span>
                                </div>

                                <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                                    {{ $pengajuan->budget_submission_name }}
                                </h1>

                                <p class="text-blue-100 text-sm mt-2">
                                    Pemeriksaan akhir sebelum pengajuan diproses menjadi arsip.
                                </p>
                            </div>

                        </div>

                        <div class="flex-shrink-0">
                            <a href="{{ route('final.index') }}"
                                class="back-btn inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white/15 hover:bg-white/25 border border-white/20 text-white font-semibold text-sm backdrop-blur-md shadow-lg">

                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>

                                Kembali
                            </a>
                        </div>

                    </div>

                </div>
            </div>


            {{-- =========================================================
                MAIN CARD
            ========================================================== --}}
            <div class="detail-card rounded-3xl overflow-hidden">

                <div class="p-5 md:p-8 space-y-7">


                    {{-- =================================================
                        SECTION 1 - INFORMASI PENGAJUAN
                    ================================================== --}}
                    <div class="detail-card rounded-2xl overflow-hidden">

                        <div class="section-head px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-blue-100 text-[#003A8F] flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>

                                <div>
                                    <h3 class="text-lg md:text-xl font-bold text-gray-900">
                                        Informasi Pengajuan
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Detail data pengajuan dan status proses.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="p-6 space-y-6">

                            {{-- PEMOHON --}}
                            <div>

                                <div class="flex items-center gap-2 mb-4">

                                    <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>

                                    <h4 class="font-bold text-gray-800">
                                        Informasi Pemohon
                                    </h4>

                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                    <div class="info-card rounded-xl p-4">
                                        <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                            Nama Pemohon
                                        </p>

                                        <p class="text-sm font-bold text-gray-900">
                                            {{ $pengajuan->user->name }}
                                        </p>
                                    </div>

                                    <div class="info-card rounded-xl p-4">
                                        <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                            Email
                                        </p>

                                        <p class="text-sm font-semibold text-gray-900 break-all">
                                            {{ $pengajuan->user->email }}
                                        </p>
                                    </div>

                                    <div class="info-card rounded-xl p-4">
                                        <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                            Divisi
                                        </p>

                                        <p class="text-sm font-semibold text-gray-900 capitalize">
                                            {{ $pengajuan->user->role }}
                                        </p>
                                    </div>

                                </div>

                            </div>


                            {{-- PAYMENT + FUNDING --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div class="info-card rounded-xl p-5">

                                    <div class="flex items-center gap-3 mb-3">

                                        <div class="w-9 h-9 rounded-lg bg-indigo-50 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-indigo-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>

                                        <h4 class="font-bold text-gray-800">
                                            Metode Pembayaran
                                        </h4>

                                    </div>

                                    <p class="text-sm font-semibold text-gray-900 ml-12">
                                        {{ $pengajuan->payment_method->payment_method_name . ' - ' ?? '-' }}{{ $pengajuan->payment_method->sub_category }}
                                    </p>

                                </div>


                                <div class="info-card rounded-xl p-5">

                                    <div class="flex items-center gap-3 mb-3">

                                        <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>

                                        <h4 class="font-bold text-gray-800">
                                            Sumber Dana
                                        </h4>

                                    </div>

                                    <p class="text-sm font-semibold text-gray-900 ml-12">
                                        {{ $pengajuan->funding_source->funding_source_name . ' - ' ?? '-' }}{{ $pengajuan->funding_source->sub_category }}
                                    </p>

                                </div>

                            </div>


                            {{-- DATE --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div class="info-card rounded-xl p-5">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>

                                        <div>
                                            <p class="text-xs text-gray-500 font-semibold">
                                                Tanggal Dibuat
                                            </p>

                                            <p class="text-sm font-bold text-gray-900 mt-1">
                                                {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                                            </p>
                                        </div>

                                    </div>

                                </div>


                                <div class="info-card rounded-xl p-5">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>

                                        <div>
                                            <p class="text-xs text-gray-500 font-semibold">
                                                Terakhir Diupdate
                                            </p>

                                            <p class="text-sm font-bold text-gray-900 mt-1">
                                                {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                                            </p>
                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- STATUS --}}
                            <div class="rounded-2xl p-5 bg-gradient-to-br from-slate-50 to-blue-50 border border-blue-100">

                                <div class="flex items-center gap-3 mb-4">

                                    <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center">
                                        <svg class="w-5 h-5 text-[#003A8F]" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h4 class="font-bold text-gray-900">
                                            Status Pengajuan
                                        </h4>

                                        <p class="text-xs text-gray-500">
                                            Status proses pengajuan saat ini
                                        </p>
                                    </div>

                                </div>


                                <div class="flex flex-wrap gap-2">

                                    @if ($pengajuan->requirements_status == 'Belum Lengkap' && $pengajuan->verification_status == 0)

                                        <span class="status-badge bg-blue-100 text-blue-700 border-blue-200">
                                            <span class="status-dot bg-blue-500"></span>
                                            Dalam Proses
                                        </span>

                                    @endif


                                    <span class="status-badge
                                        {{ $pengajuan->requirements_status == 'Lengkap'
                                            ? 'bg-emerald-100 text-emerald-700 border-emerald-200'
                                            : 'bg-amber-100 text-amber-700 border-amber-200' }}">

                                        <span class="status-dot
                                            {{ $pengajuan->requirements_status == 'Lengkap'
                                                ? 'bg-emerald-500'
                                                : 'bg-amber-500' }}">
                                        </span>

                                        {{ ucfirst($pengajuan->requirements_status) }}

                                    </span>


                                    <span class="status-badge
                                        {{ $pengajuan->verification_status
                                            ? 'bg-emerald-100 text-emerald-700 border-emerald-200'
                                            : 'bg-red-100 text-red-700 border-red-200' }}">

                                        <span class="status-dot
                                            {{ $pengajuan->verification_status
                                                ? 'bg-emerald-500'
                                                : 'bg-red-500' }}">
                                        </span>

                                        {{ $pengajuan->verification_status ? 'Terverifikasi' : 'Belum Diverifikasi' }}

                                    </span>


                                    <span class="status-badge
                                        {{ $pengajuan->is_archive
                                            ? 'bg-cyan-100 text-cyan-700 border-cyan-200'
                                            : 'bg-gray-100 text-gray-700 border-gray-200' }}">

                                        <span class="status-dot
                                            {{ $pengajuan->is_archive
                                                ? 'bg-cyan-500'
                                                : 'bg-gray-500' }}">
                                        </span>

                                        {{ $pengajuan->is_archive ? 'Diarsipkan' : 'Belum Diarsipkan' }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        SECTION 2 - PEMERIKSA
                    ================================================== --}}
                    <div class="detail-card rounded-2xl overflow-hidden">

                        <div class="section-head px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>

                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">
                                        Diperiksa Oleh
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Petugas yang melakukan pemeriksaan pengajuan
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="p-6">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                <div class="info-card rounded-xl p-4">
                                    <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                        Nama
                                    </p>

                                    <p class="text-sm font-bold text-gray-900">
                                        {{ $pengajuan->finance_officer->name ?? '-' }}
                                    </p>
                                </div>

                                <div class="info-card rounded-xl p-4">
                                    <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                        Email
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 break-all">
                                        {{ $pengajuan->finance_officer->email ?? '-' }}
                                    </p>
                                </div>

                                <div class="info-card rounded-xl p-4">
                                    <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                        Divisi
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 capitalize">
                                        {{ $pengajuan->finance_officer->role ?? '-' }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        SECTION 3 - PEMERIKSA BENDAHARA
                    ================================================== --}}
                    <div class="detail-card rounded-2xl overflow-hidden">

                        <div class="section-head px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>

                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">
                                        Diperiksa Oleh Bendahara
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Informasi bendahara yang memproses pengajuan
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="p-6">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                <div class="info-card rounded-xl p-4">
                                    <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                        Nama
                                    </p>

                                    <p class="text-sm font-bold text-gray-900">
                                        {{ $pengajuan->revenue_officer->name ?? '-' }}
                                    </p>
                                </div>

                                <div class="info-card rounded-xl p-4">
                                    <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                        Email
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 break-all">
                                        {{ $pengajuan->revenue_officer->email ?? '-' }}
                                    </p>
                                </div>

                                <div class="info-card rounded-xl p-4">
                                    <p class="text-[11px] uppercase tracking-wide text-gray-500 font-bold mb-2">
                                        Divisi
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 capitalize">
                                        {{ $pengajuan->revenue_officer->role ?? '-' }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        SECTION 4 - FILE PENGAJUAN
                    ================================================== --}}
                    <div class="detail-card rounded-2xl overflow-hidden">

                        <div class="section-head px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>

                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">
                                        File Pengajuan
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Dokumen yang akan digunakan dalam proses verifikasi final
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="p-6 space-y-6">

                            {{-- NOTICE --}}
                            <div class="rounded-2xl p-4 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100">

                                <div class="flex items-start gap-3">

                                    <div class="w-9 h-9 rounded-xl bg-white flex items-center justify-center shadow-sm flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <p class="text-sm font-bold text-blue-900">
                                            Perhatian
                                        </p>

                                        <p class="text-sm text-blue-800 mt-1">
                                            Mohon untuk
                                            <span class="font-bold">
                                                menandatangani dokumen pengajuan
                                            </span>
                                            sebelum dilakukan proses verifikasi final.
                                        </p>
                                    </div>

                                </div>

                            </div>


                            {{-- FILE --}}
                            <div class="file-box rounded-2xl p-5">

                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                                    <div class="flex items-center gap-4 min-w-0">

                                        <div class="w-14 h-14 rounded-2xl bg-white shadow-md border border-red-100 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-7 h-7 text-red-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </div>

                                        <div class="min-w-0">
                                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wide">
                                                Nama File
                                            </p>

                                            <p class="text-sm md:text-base font-bold text-gray-900 truncate mt-1">
                                                {{ basename($pengajuan->path_file_submission) ?? '-' }}
                                            </p>

                                            <div class="flex items-center gap-2 mt-2">
                                                <span class="status-badge bg-red-50 text-red-600 border-red-100">
                                                    PDF
                                                </span>

                                                <span class="text-xs text-gray-500">
                                                    Dokumen pengajuan
                                                </span>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="flex flex-col sm:flex-row gap-2 flex-shrink-0">

                                        <a href="{{ route('file.stream', $pengajuan->id) }}"
                                            target="_blank"
                                            class="action-btn inline-flex items-center justify-center gap-2 px-5 py-3 bg-[#003A8F] hover:bg-[#0056C7] text-white text-sm font-bold rounded-xl shadow-md">

                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>

                                            Lihat
                                        </a>


                                        <a href="{{ route('file.download', $pengajuan->id) }}"
                                            class="action-btn inline-flex items-center justify-center gap-2 px-5 py-3 bg-white hover:bg-gray-100 text-gray-700 text-sm font-bold rounded-xl border border-gray-200 shadow-sm">

                                            <svg class="w-4 h-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>

                                            Download
                                        </a>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                FORM VERIFIKASI
                            ================================================== --}}
                            <form action="{{ route('final.update', $pengajuan->id) }}"
                                method="POST"
                                enctype="multipart/form-data"
                                class="space-y-5">

                                @method('PUT')
                                @csrf


                                @if (!$pengajuan->requirements_status || !$pengajuan->is_archive)

                                    {{-- UPLOAD --}}
                                    <div class="form-card rounded-2xl p-5">

                                        <div class="flex items-center gap-3 mb-5">

                                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                            </div>

                                            <div>
                                                <label class="font-bold text-gray-900">
                                                    Upload File Bertanda Tangan
                                                </label>

                                                <p class="text-xs text-gray-500 mt-0.5">
                                                    Upload dokumen PDF yang sudah ditandatangani.
                                                </p>
                                            </div>

                                        </div>


                                        <label class="upload-area block rounded-2xl p-6 cursor-pointer">

                                            <div class="text-center">

                                                <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center mx-auto mb-3">
                                                    <svg class="w-7 h-7" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                </div>

                                                <p class="text-sm font-bold text-gray-800">
                                                    Klik untuk memilih file PDF
                                                </p>

                                                <p class="text-xs text-gray-500 mt-1">
                                                    Maksimal ukuran file 50MB
                                                </p>

                                                <input type="file"
                                                    name="file_pengajuan"
                                                    accept="application/pdf"
                                                    required
                                                    class="mt-4 block w-full text-sm text-gray-700
                                                        file:mr-4 file:py-2.5 file:px-5
                                                        file:rounded-xl file:border-0
                                                        file:text-sm file:font-bold
                                                        file:bg-[#003A8F] file:text-white
                                                        hover:file:bg-[#0056C7]
                                                        file:shadow-md cursor-pointer">

                                            </div>

                                        </label>

                                    </div>


                                    {{-- BIAYA --}}
                                    <div class="form-card rounded-2xl p-5">

                                        <div class="flex items-center gap-3 mb-4">

                                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>

                                            <div>
                                                <label class="font-bold text-gray-900">
                                                    Biaya yang Dibayarkan
                                                </label>

                                                <p class="text-xs text-gray-500 mt-0.5">
                                                    Masukkan nominal sesuai dokumen pengajuan.
                                                </p>
                                            </div>

                                        </div>


                                        <div class="relative">

                                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500 font-bold">
                                                Rp
                                            </span>

                                            <input type="number"
                                                name="biaya"
                                                value="{{ $pengajuan->biaya ?? '' }}"
                                                placeholder="0"
                                                min="0"
                                                required
                                                class="input-modern w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                        </div>

                                    </div>


                                    {{-- KUITANSI / SPM --}}
                                    <div class="form-card rounded-2xl p-5">

                                        <div class="flex items-center gap-3 mb-4">

                                            <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                            </div>

                                            <div>
                                                <label class="font-bold text-gray-900">
                                                    {{ Auth::user()->name === 'Bendahara 1' ? 'Nomor Kuitansi' : 'Nomor SPM' }}
                                                </label>

                                                <p class="text-xs text-gray-500 mt-0.5">
                                                    Gunakan format nomor sesuai standar institusi.
                                                </p>
                                            </div>

                                        </div>


                                        <input type="text"
                                            name="kuitansi"
                                            value="{{ $kuitansi ?? '' }}"
                                            placeholder="{{ Auth::user()->name === 'Bendahara 1' ? 'Contoh: KUI/2024/001' : 'Contoh: SPM/2024/001' }}"
                                            class="input-modern w-full px-4 py-3 border border-gray-300 rounded-xl text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                    </div>


                                    {{-- SP2D --}}
                                    @if (Auth::user()->name === 'Bendahara 2')

                                        <div class="form-card rounded-2xl p-5">

                                            <div class="flex items-center gap-3 mb-4">

                                                <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center">
                                                    <svg class="w-5 h-5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>

                                                <div>
                                                    <label class="font-bold text-gray-900">
                                                        Nomor SP2D
                                                    </label>

                                                    <p class="text-xs text-gray-500">
                                                        Nomor Surat Perintah Pencairan Dana.
                                                    </p>
                                                </div>

                                            </div>


                                            <input type="text"
                                                name="no_sp2d"
                                                value="{{ old('no_sp2d') }}"
                                                placeholder="Contoh: SP2D/2024/001"
                                                class="input-modern w-full px-4 py-3 border border-gray-300 rounded-xl text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                        </div>

                                    @endif


                                    {{-- SPBY --}}
                                    @if (Auth::user()->name !== 'Bendahara 2')

                                        <div class="form-card rounded-2xl p-5">

                                            <div class="flex items-center gap-3 mb-4">

                                                <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">
                                                    <svg class="w-5 h-5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>

                                                <div>
                                                    <label class="font-bold text-gray-900">
                                                        Nomor SPBy
                                                    </label>

                                                    <p class="text-xs text-gray-500">
                                                        Nomor Surat Perintah Bayar.
                                                    </p>
                                                </div>

                                            </div>


                                            <input type="text"
                                                name="no_spby"
                                                value="{{ $no_spm ?? '' }}"
                                                placeholder="Contoh: SPBy/2024/001"
                                                class="input-modern w-full px-4 py-3 border border-gray-300 rounded-xl text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                        </div>

                                    @endif


                                    {{-- PAYMENT + FUNDING --}}
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                        <div class="form-card rounded-2xl p-5">

                                            <div class="flex items-center gap-3 mb-4">

                                                <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                                    <svg class="w-5 h-5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                    </svg>
                                                </div>

                                                <label class="font-bold text-gray-900">
                                                    Metode Pembayaran
                                                </label>

                                            </div>


                                            <select name="payment_method"
                                                required
                                                class="input-modern w-full border border-gray-300 rounded-xl px-4 py-3 text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                                <option value="" disabled selected>
                                                    --- Pilih metode pembayaran ---
                                                </option>

                                                @foreach ($payment_method as $payment)

                                                    <option value="{{ $payment->id }}">
                                                        {{ $payment->payment_method_name }} -
                                                        {{ $payment->sub_category }}
                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>


                                        <div class="form-card rounded-2xl p-5">

                                            <div class="flex items-center gap-3 mb-4">

                                                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                                    <svg class="w-5 h-5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 3 3 3 3-.895 3-2-1.343-2-3-2m0 0c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>

                                                <label class="font-bold text-gray-900">
                                                    Sumber Dana
                                                </label>

                                            </div>


                                            <select name="funding_source"
                                                required
                                                class="input-modern w-full border border-gray-300 rounded-xl px-4 py-3 text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                                <option value="" disabled selected>
                                                    --- Pilih sumber dana ---
                                                </option>

                                                @foreach ($funding_source as $funding)

                                                    <option value="{{ $funding->id }}">
                                                        {{ $funding->funding_source_name }} -
                                                        {{ $funding->sub_category }}
                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>


                                    {{-- =================================================
                                        CABINET + KATEGORI ARSIP (SEJAJAR)
                                    ================================================== --}}
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                        {{-- CABINET --}}
                                        <div class="form-card rounded-2xl p-5">

                                            <div class="flex items-center gap-3 mb-4">

                                                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-5 h-5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                    </svg>
                                                </div>

                                                <div>
                                                    <label class="font-bold text-gray-900">
                                                        Cabinet Arsip
                                                    </label>

                                                    <p class="text-xs text-gray-500 mt-0.5">
                                                        Pilih cabinet sesuai kategori arsip.
                                                    </p>
                                                </div>

                                            </div>


                                            <select name="cabinet_id"
                                                required
                                                class="input-modern w-full border border-gray-300 rounded-xl px-4 py-3 text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                                <option value="" disabled selected>
                                                    — Pilih cabinet arsip —
                                                </option>

                                                @foreach ($cabinets as $cabinet)

                                                    <option value="{{ $cabinet->id }}"
                                                        {{ (string) old('cabinet_id') === (string) $cabinet->id ? 'selected' : '' }}>
                                                        {{ $cabinet->cabinet_name }}
                                                    </option>

                                                @endforeach

                                            </select>

                                            @error('cabinet_id')
                                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                            @enderror

                                        </div>


                                        {{-- KATEGORI ARSIP --}}
                                        <div class="form-card rounded-2xl p-5">

                                            <div class="flex items-center gap-3 mb-4">

                                                <div class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-5 h-5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                                    </svg>
                                                </div>

                                                <div>
                                                    <label class="font-bold text-gray-900">
                                                        Kategori Arsip
                                                    </label>

                                                    <p class="text-xs text-gray-500 mt-0.5">
                                                        Pilih klasifikasi arsip (kode kategori).
                                                    </p>
                                                </div>

                                            </div>


                                            <select name="kategori"
                                                required
                                                class="input-modern w-full border border-gray-300 rounded-xl px-4 py-3 text-sm text-gray-800 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                                <option value="" disabled selected>
                                                    — Pilih kategori arsip —
                                                </option>

                                                @foreach (\App\Models\DigitalArchive::KATEGORI_SUB as $groupKey => $items)

                                                    <optgroup label="{{ \App\Models\DigitalArchive::KATEGORI_GROUP[$groupKey] ?? $groupKey }}">

                                                        @foreach ($items as $kode => $nama)

                                                            <option value="{{ $kode }}"
                                                                {{ old('kategori') === $kode ? 'selected' : '' }}>
                                                                {{ $kode }} {{ $nama }}
                                                            </option>

                                                        @endforeach

                                                    </optgroup>

                                                @endforeach

                                            </select>

                                            @error('kategori')
                                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                            @enderror

                                        </div>

                                    </div>


                                    {{-- SUBMIT --}}
                                    <div class="pt-2">

                                        <button type="submit"
                                            class="verify-btn w-full px-8 py-4 text-white font-extrabold rounded-2xl flex items-center justify-center gap-3">

                                            <span class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">

                                                <svg class="w-5 h-5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>

                                            </span>

                                            <span>
                                                Upload dan Verifikasi Final
                                            </span>

                                        </button>

                                        <p class="text-center text-xs text-gray-500 mt-3">
                                            Pastikan seluruh data dan dokumen sudah benar sebelum melakukan verifikasi final.
                                        </p>

                                    </div>


                                @else

                                    {{-- =================================================
                                        LOCKED
                                    ================================================== --}}
                                    <div class="rounded-2xl p-8 text-center bg-gradient-to-br from-gray-50 to-slate-100 border border-gray-200">

                                        <div class="w-16 h-16 rounded-2xl bg-white shadow-md border border-gray-200 flex items-center justify-center mx-auto mb-4">

                                            <svg class="w-8 h-8 text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />

                                            </svg>

                                        </div>

                                        <h4 class="text-lg font-extrabold text-gray-800">
                                            File Sudah Diarsipkan
                                        </h4>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Pengajuan ini sudah selesai diproses dan tidak dapat diperbarui lagi.
                                        </p>

                                        <div class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">

                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                                            Pengajuan Selesai

                                        </div>

                                    </div>

                                @endif

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
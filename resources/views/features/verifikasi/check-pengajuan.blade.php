<x-app-layout>

    <x-slot name="header">
        <h2 class="verification-header-title">
            <span class="verification-header-icon">✓</span>
            <span><strong>Periksa Kelengkapan Pengajuan</strong><small>Kelola dan verifikasi kelengkapan dokumen pengajuan</small></span>
        </h2>
    </x-slot>

    <style>
        /* ================================================================
           VERIFICATION UI — VVeP BLUE / INTERACTIVE 3D
           UI ONLY. DATA, FORM, ROUTE, LOOP, RADIO, VALUE TIDAK DIUBAH.
        ================================================================= */
        :root {
            --vvep-blue: #0758c9;
            --vvep-blue-dark: #073b82;
            --vvep-blue-light: #eaf3ff;
            --vvep-text: #14213d;
            --vvep-muted: #71809a;
            --vvep-border: #dce6f2;
            --vvep-shadow: 0 18px 45px rgba(25, 74, 135, .10);
        }

        .verification-header-title {
            display:flex; align-items:center; gap:14px;
            color:var(--vvep-text); font-size:20px; line-height:1.15;
            letter-spacing:-.02em;
        }
        .verification-header-title strong { display:block; font-weight:800; }
        .verification-header-title small { display:block; margin-top:4px; color:#7a879d; font-size:12px; font-weight:500; }
        .verification-header-icon {
            width:42px; height:42px; display:grid; place-items:center; flex:none;
            border-radius:13px; color:white; font-weight:900; font-size:20px;
            background:linear-gradient(145deg,#0b66db,#06499f);
            box-shadow:0 8px 18px rgba(5,83,190,.25), inset 0 1px 0 rgba(255,255,255,.3);
        }

        #verification-page {
            position:relative;
            min-height:100vh;
            padding-bottom:70px;
            background:
                radial-gradient(circle at 90% 4%, rgba(38,129,235,.13), transparent 27%),
                radial-gradient(circle at 8% 18%, rgba(11,88,201,.08), transparent 25%),
                linear-gradient(180deg,#f3f7fc 0%,#eef4fb 100%);
        }
        #verification-page:before {
            content:""; position:absolute; inset:0 0 auto; height:260px; pointer-events:none;
            background:linear-gradient(135deg,rgba(255,255,255,.8),rgba(219,235,255,.35));
        }
        #verification-page > .max-w-7xl { position:relative; z-index:1; }

        #verification-page .py-4 { padding-top:26px; padding-bottom:18px; }
        #verification-page a[class*="bg-white"] {
            border:1px solid #d9e4f1 !important; border-radius:12px !important;
            box-shadow:0 7px 18px rgba(28,69,116,.07) !important;
            transition:.22s ease !important;
        }
        #verification-page a[class*="bg-white"]:hover { transform:translateY(-2px); box-shadow:0 12px 24px rgba(28,69,116,.12) !important; }

        /* semua card utama */
        #verification-page .bg-white.rounded-md,
        #verification-page .bg-white.overflow-hidden.shadow-sm {
            border:1px solid var(--vvep-border) !important;
            border-radius:22px !important;
            box-shadow:var(--vvep-shadow) !important;
            background:rgba(255,255,255,.96) !important;
            transition:transform .25s ease, box-shadow .25s ease;
        }
        #verification-page .bg-white.rounded-md:hover {
            transform:translateY(-2px);
            box-shadow:0 22px 52px rgba(25,74,135,.13) !important;
        }

        /* header setiap section */
        #verification-page .bg-gradient-to-r.from-gray-50.to-gray-100 {
            position:relative;
            background:linear-gradient(135deg,#f8fbff 0%,#eaf3ff 100%) !important;
            border-bottom:1px solid #dce8f5 !important;
        }
        #verification-page .bg-gradient-to-r.from-gray-50.to-gray-100:after {
            content:""; position:absolute; left:0; bottom:-1px; width:95px; height:3px;
            border-radius:0 5px 5px 0; background:linear-gradient(90deg,#0758c9,#39a0ff);
        }
        #verification-page h3 { color:var(--vvep-text); letter-spacing:-.02em; }

        /* info tiles */
        #verification-page .bg-gray-50.rounded-md {
            background:linear-gradient(145deg,#fbfdff,#f1f6fc) !important;
            border:1px solid #dfe8f3 !important;
            border-radius:15px !important;
            transition:.22s ease;
        }
        #verification-page .bg-gray-50.rounded-md:hover {
            transform:translateY(-3px);
            border-color:#b9d2ef !important;
            box-shadow:0 10px 24px rgba(20,75,135,.09);
        }

        /* file row */
        #verification-page .bg-gradient-to-r.from-gray-50.to-red-50\/30 {
            background:linear-gradient(135deg,#f8fbff,#eef6ff) !important;
            border-color:#d8e6f5 !important; border-radius:16px !important;
        }

        /* buttons */
        #verification-page a[class*="bg-blue-600"],
        #verification-page button[class*="bg-blue-600"] {
            background:linear-gradient(135deg,#0866d8,#0649a7) !important;
            box-shadow:0 7px 16px rgba(5,82,184,.20) !important;
        }
        #verification-page a[class*="bg-emerald-600"],
        #verification-page button[class*="bg-emerald-600"] {
            box-shadow:0 7px 16px rgba(16,145,105,.18) !important;
        }
        #verification-page button[class*="bg-purple-600"] {
            background:linear-gradient(135deg,#0866d8,#0649a7) !important;
            box-shadow:0 7px 16px rgba(5,82,184,.20) !important;
        }
        #verification-page a[class*="bg-blue-600"]:hover,
        #verification-page button[class*="bg-blue-600"]:hover,
        #verification-page button[class*="bg-purple-600"]:hover { transform:translateY(-2px); }

        /* action icon buttons - transparent / borderless */
        #verification-page .vvep-action-icon {
            width:34px !important;
            height:34px !important;
            min-width:34px;
            padding:0 !important;
            display:inline-flex !important;
            align-items:center;
            justify-content:center;
            border-radius:9px !important;
            border:none !important;
            outline:none !important;
            background:transparent !important;
            box-shadow:none !important;
            transition:transform .18s ease, color .18s ease, background .18s ease;
            cursor:pointer;
        }

        #verification-page .vvep-action-icon:hover {
            transform:translateY(-2px) scale(1.08);
            background:rgba(37,99,235,.08) !important;
        }

        #verification-page .vvep-action-icon:active {
            transform:translateY(0) scale(.96);
            background:rgba(37,99,235,.13) !important;
        }

        #verification-page .vvep-action-icon:focus {
            outline:none !important;
            box-shadow:none !important;
        }

        #verification-page .vvep-action-edit {
            color:#0751ad !important;
        }

        #verification-page .vvep-action-edit:hover {
            color:#0b70df !important;
        }

        #verification-page .vvep-action-delete {
            color:#dc3545 !important;
        }

        #verification-page .vvep-action-delete:hover {
            color:#b91c1c !important;
            background:rgba(220,53,69,.08) !important;
        }
        #verification-page td:last-child {
            width:96px;
        }

        /* checklist table */
        #verification-page .overflow-x-auto.rounded-md {
            border:1px solid #d9e5f2 !important; border-radius:16px !important;
            box-shadow:0 8px 24px rgba(22,65,115,.06);
        }
        #verification-page table { border-collapse:separate; border-spacing:0; }
        #verification-page thead { background:linear-gradient(135deg,#0a55b8,#083d82) !important; color:white !important; }
        #verification-page thead th {
            color:white !important; background:transparent !important;
            border-color:rgba(255,255,255,.18) !important; font-weight:700 !important;
            letter-spacing:.03em;
        }
        #verification-page tbody tr { transition:.18s ease; }
        #verification-page tbody tr:hover { background:#f0f7ff !important; transform:scale(1.001); }
        #verification-page tbody td { border-color:#e1e9f2 !important; }
        #verification-page tbody tr:nth-child(even) { background:#fbfdff; }
        #verification-page input[type="radio"] { accent-color:#0758c9; cursor:pointer; transform:scale(1.05); }
        #verification-page input[type="text"],
        #verification-page textarea {
            border-color:#d7e1ed !important; border-radius:11px !important;
            transition:.2s ease; background:#fff !important;
        }
        #verification-page input[type="text"]:focus,
        #verification-page textarea:focus {
            border-color:#2d80df !important; box-shadow:0 0 0 4px rgba(25,111,215,.10) !important;
        }

        /* section metadata */
        #verification-page .bg-blue-50 { background:linear-gradient(135deg,#eef6ff,#e4f0ff) !important; border-color:#c7ddf8 !important; border-radius:16px !important; }
        #verification-page .bg-yellow-50 { background:linear-gradient(135deg,#fffaf0,#fff5dc) !important; border-radius:16px !important; box-shadow:0 8px 20px rgba(181,127,20,.06); }

        /* submit area */
        #verification-page button[name="aksi"] {
            border-radius:14px !important; padding-left:30px !important; padding-right:30px !important;
            background:linear-gradient(135deg,#0a64d2,#063e87) !important;
            box-shadow:0 12px 24px rgba(4,75,164,.22) !important;
            transition:.22s ease !important;
        }
        #verification-page button[name="aksi"]:hover { transform:translateY(-3px); box-shadow:0 17px 30px rgba(4,75,164,.28) !important; }

        /* modal */
        #verification-page ~ #modalTambah,
        #verification-page ~ #modalEdit,
        #verification-page ~ #modalHapus { }
        #modalTambah > div > div:last-child,
        #modalEdit > div > div:last-child,
        #modalHapus > div > div:last-child {
            border:1px solid #d8e5f3 !important; border-radius:20px !important;
            box-shadow:0 28px 70px rgba(12,52,100,.25) !important;
        }

        @media (max-width: 768px) {
            .verification-header-title small { display:none; }
            #verification-page .p-6, #verification-page .md\\:p-8 { padding:16px !important; }
            #verification-page .overflow-x-auto { -webkit-overflow-scrolling:touch; }
            #verification-page .flex.items-center.justify-between { flex-wrap:wrap; }
        }
    </style>

    <div id="verification-page">
    {{-- =========================================================
         TOMBOL KEMBALI
    ========================================================== --}}
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <a href="{{ route('verification.index') }}"
                class="inline-flex items-center gap-2 bg-white text-gray-700 px-4 py-2 rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">

                <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                </svg>

                <span class="font-medium">
                    Kembali
                </span>

            </a>

        </div>
    </div>


    <div class="min-h-screen pb-12">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">

                <div class="p-6 md:p-8 space-y-6">


                    {{-- =========================================================
                         INFORMASI PENGAJUAN
                    ========================================================== --}}
                    <div class="bg-white rounded-md shadow-sm border border-gray-200 overflow-hidden">

                        {{-- HEADER --}}
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-5 border-b border-gray-200">

                            <div class="flex items-start gap-4">

                                <div class="p-3 bg-white rounded-md shadow-sm border border-gray-200">

                                    <svg class="w-6 h-6 text-gray-700"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />

                                    </svg>

                                </div>

                                <div>

                                    <h3 class="text-xl font-bold text-gray-900 mb-1">
                                        {{ $pengajuan->budget_submission_name }}
                                    </h3>

                                    <p class="text-sm text-gray-600">
                                        Dokumen Pengajuan Resmi
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="p-6 space-y-6">

                            {{-- INFO PENGAJU --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                {{-- PENGAJU --}}
                                <div class="bg-gray-50 rounded-md p-4 border border-gray-200">

                                    <div class="flex items-center gap-2 mb-2">

                                        <svg class="w-4 h-4 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />

                                        </svg>

                                        <p class="text-xs text-gray-600 font-medium">
                                            Pengaju
                                        </p>

                                    </div>

                                    <p class="text-sm font-semibold text-gray-900">
                                        {{ $pengajuan->user->name }}
                                    </p>

                                </div>


                                {{-- EMAIL --}}
                                <div class="bg-gray-50 rounded-md p-4 border border-gray-200">

                                    <div class="flex items-center gap-2 mb-2">

                                        <svg class="w-4 h-4 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5v12a2 2 0 002 2z" />

                                        </svg>

                                        <p class="text-xs text-gray-600 font-medium">
                                            Email
                                        </p>

                                    </div>

                                    <p class="text-sm font-medium text-gray-900 break-all">
                                        {{ $pengajuan->user->email }}
                                    </p>

                                </div>


                                {{-- DIVISI --}}
                                <div class="bg-gray-50 rounded-md p-4 border border-gray-200">

                                    <div class="flex items-center gap-2 mb-2">

                                        <svg class="w-4 h-4 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />

                                        </svg>

                                        <p class="text-xs text-gray-600 font-medium">
                                            Divisi
                                        </p>

                                    </div>

                                    <p class="text-sm font-medium text-gray-900">
                                        {{ $pengajuan->user->role }}
                                    </p>

                                </div>

                            </div>


                            {{-- METODE PEMBAYARAN & SUMBER DANA --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                {{-- METODE PEMBAYARAN --}}
                                <div class="bg-gray-50 rounded-md p-4 border border-gray-200">

                                    <div class="flex items-center gap-2 mb-3">

                                        <svg class="w-4 h-4 text-gray-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />

                                        </svg>

                                        <h4 class="text-sm font-semibold text-gray-700">
                                            Metode Pembayaran
                                        </h4>

                                    </div>

                                    <p class="text-sm font-medium text-gray-900 pl-6">

                                        {{ $pengajuan->payment_method->payment_method_name ?? '-' }}

                                        @if ($pengajuan->payment_method)
                                            - {{ $pengajuan->payment_method->sub_category }}
                                        @endif

                                    </p>

                                </div>


                                {{-- SUMBER DANA --}}
                                <div class="bg-gray-50 rounded-md p-4 border border-gray-200">

                                    <div class="flex items-center gap-2 mb-3">

                                        <svg class="w-4 h-4 text-gray-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                        <h4 class="text-sm font-semibold text-gray-700">
                                            Sumber Dana
                                        </h4>

                                    </div>

                                    <p class="text-sm font-medium text-gray-900 pl-6">

                                        {{ $pengajuan->funding_source->funding_source_name ?? '-' }}

                                        @if ($pengajuan->funding_source)
                                            - {{ $pengajuan->funding_source->sub_category }}
                                        @endif

                                    </p>

                                </div>

                            </div>


                            {{-- TIMESTAMP --}}
                            <div class="flex flex-wrap items-center gap-6 pt-4 border-t border-gray-200">

                                <div class="flex items-center gap-2 text-gray-600">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5v12a2 2 0 002 2a2 2 0 002-2z" />

                                    </svg>

                                    <span class="text-sm">

                                        Dibuat:

                                        <span class="font-semibold text-gray-900">

                                            {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}

                                        </span>

                                    </span>

                                </div>


                                <div class="flex items-center gap-2 text-gray-600">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                    <span class="text-sm">

                                        Update:

                                        <span class="font-semibold text-gray-900">

                                            {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}

                                        </span>

                                    </span>

                                </div>

                            </div>


                            {{-- DIPERIKSA OLEH --}}
                            <div>

                                <p class="text-sm font-semibold text-gray-700 mb-3">
                                    Diperiksa Oleh
                                </p>

                                <div class="bg-gray-50 rounded-md p-4 border border-gray-200">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                        <div>

                                            <p class="text-xs text-gray-500 mb-1 font-medium">
                                                Nama
                                            </p>

                                            <p class="text-sm font-semibold text-gray-800">
                                                {{ $pengajuan->finance_officer->name ?? '-' }}
                                            </p>

                                        </div>

                                        <div>

                                            <p class="text-xs text-gray-500 mb-1 font-medium">
                                                Email
                                            </p>

                                            <p class="text-sm font-semibold text-gray-800 break-all">
                                                {{ $pengajuan->finance_officer->email ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- DIPERIKSA OLEH BENDAHARA --}}
                            <div>

                                <p class="text-sm font-semibold text-gray-700 mb-3 mt-3">
                                    Diperiksa Oleh Bendahara
                                </p>

                                <div class="bg-gray-50 rounded-md p-4 border border-gray-200">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                        <div>

                                            <p class="text-xs text-gray-500 mb-1 font-medium">
                                                Nama
                                            </p>

                                            <p class="text-sm font-semibold text-gray-800">
                                                {{ $pengajuan->revenue_officer->name ?? '-' }}
                                            </p>

                                        </div>

                                        <div>

                                            <p class="text-xs text-gray-500 mb-1 font-medium">
                                                Email
                                            </p>

                                            <p class="text-sm font-semibold text-gray-800 break-all">
                                                {{ $pengajuan->revenue_officer->email ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =========================================================
                         FILE PENGAJUAN
                    ========================================================== --}}
                    <div class="bg-white rounded-md shadow-sm border border-gray-200 overflow-hidden">

                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">

                            <div class="flex items-center gap-3">

                                <div class="p-2 bg-white rounded-md shadow-sm border border-gray-200">

                                    <svg class="w-5 h-5 text-red-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />

                                    </svg>

                                </div>

                                <h3 class="font-semibold text-lg text-gray-900">
                                    File Pengajuan
                                </h3>

                            </div>

                        </div>


                        <div class="p-6">

                            <div class="flex items-center justify-between bg-gradient-to-r from-gray-50 to-red-50/30 rounded-md p-4 border border-gray-200">

                                <div class="flex items-center gap-4 flex-1 min-w-0">

                                    <div class="p-3 bg-white rounded-md shadow-sm border border-gray-200">

                                        <svg class="w-7 h-7 text-red-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />

                                        </svg>

                                    </div>


                                    <div class="flex-1 min-w-0">

                                        <p class="text-xs text-gray-500 mb-1 font-medium">
                                            Nama File
                                        </p>

                                        <p class="text-sm font-semibold text-gray-900 truncate">

                                            {{ basename($pengajuan->path_file_submission) }}

                                        </p>

                                    </div>

                                </div>


                                <div class="flex gap-2 flex-shrink-0 ml-4">

                                    {{-- LIHAT --}}
                                    <a href="{{ route('file.stream', $pengajuan->id) }}"
                                        target="_blank"
                                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-md shadow-sm transition-all duration-200">

                                        <svg class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7z" />

                                        </svg>

                                        Lihat

                                    </a>


                                    {{-- DOWNLOAD --}}
                                    <a href="{{ route('file.download', $pengajuan->id) }}"
                                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md shadow-sm transition-all duration-200">

                                        <svg class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />

                                        </svg>

                                        Download

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =========================================================
                         FORM CHECKLIST
                    ========================================================== --}}
                    <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                        method="POST">

                        @method('PUT')
                        @csrf


                        {{-- =====================================================
                             CHECKLIST DOKUMEN
                        ====================================================== --}}
                        <div class="bg-white rounded-md shadow-sm border border-gray-200 overflow-hidden">

                            {{-- HEADER CHECKLIST --}}
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">

                                <div class="flex items-center justify-between gap-3">

                                    <div class="flex items-center gap-3">

                                        <div class="p-2 bg-white rounded-md shadow-sm border border-gray-200">

                                            <svg class="w-5 h-5 text-purple-600"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 12h3m-3 4h3m3-4h.01M15 16h.01" />

                                            </svg>

                                        </div>

                                        <h3 class="font-semibold text-lg text-gray-900">
                                            Checklist Dokumen & Tanda Tangan
                                        </h3>

                                    </div>


                                    {{-- TAMBAH DOKUMEN --}}
                                    @if (Auth::user()->role === 'Keuangan')

                                        <button type="button"
                                            onclick="openTambahModal()"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-md shadow-sm transition">

                                            <svg class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 4v16m8-8H4" />

                                            </svg>

                                            Tambah Dokumen

                                        </button>

                                    @endif

                                </div>

                            </div>


                            {{-- TABEL --}}
                            <div class="p-6">

                                <div class="overflow-x-auto rounded-md border border-gray-200">

                                    <table class="min-w-full bg-white text-sm">

                                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">

                                            <tr>

                                                <th rowspan="2"
                                                    class="px-4 py-3 border border-gray-300 text-center">
                                                    No
                                                </th>

                                                <th rowspan="2"
                                                    class="px-4 py-3 border border-gray-300">
                                                    Nama Dokumen & TTD
                                                </th>

                                                <th colspan="3"
                                                    class="px-4 py-3 border border-gray-300 text-center">
                                                    Dokumen
                                                </th>

                                                <th colspan="2"
                                                    class="px-4 py-3 border border-gray-300 text-center">
                                                    Tanda Tangan
                                                </th>

                                                <th rowspan="2"
                                                    class="px-4 py-3 border border-gray-300 text-center">
                                                    Keterangan
                                                </th>

                                                @if (Auth::user()->role === 'Keuangan')

                                                    <th rowspan="2"
                                                        class="px-4 py-3 border border-gray-300 text-center">
                                                        Aksi
                                                    </th>

                                                @endif

                                            </tr>


                                            <tr>

                                                <th class="px-4 py-2 border border-gray-300 text-center">
                                                    Ada
                                                </th>

                                                <th class="px-4 py-2 border border-gray-300 text-center">
                                                    Tidak Ada
                                                </th>

                                                <th class="px-4 py-2 border border-gray-300 text-center">
                                                    Tidak Diperlukan
                                                </th>

                                                <th class="px-4 py-2 border border-gray-300 text-center">
                                                    Lengkap
                                                </th>

                                                <th class="px-4 py-2 border border-gray-300 text-center">
                                                    Belum
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            @foreach ($checklistRows as $index => $item)

                                                @php

                                                    $dokumen = $item['dokumen'];
                                                    $excelRow = $item['row'];

                                                    $isSection = preg_match(
                                                        '/^[IVX]+\.\d+/',
                                                        $dokumen
                                                    );

                                                    $isSubDocument = preg_match(
                                                        '/^\d+\.\d+/',
                                                        $dokumen
                                                    );

                                                @endphp


                                                <tr class="hover:bg-gray-50 transition-colors">


                                                    {{-- NO --}}
                                                    <td class="px-4 py-3 border border-gray-300 text-center font-medium text-gray-900">

                                                        {{ $index + 1 }}

                                                        {{-- NOMOR BARIS EXCEL ASLI --}}
                                                        <input type="hidden"
                                                            name="row[{{ $index }}]"
                                                            value="{{ $excelRow }}">

                                                    </td>


                                                    {{-- NAMA DOKUMEN --}}
                                                    <td class="px-4 py-3 border border-gray-300 text-gray-900">

                                                        @if ($isSection)

                                                            <span class="font-bold text-blue-700">
                                                                {{ $dokumen }}
                                                            </span>

                                                        @elseif ($isSubDocument)

                                                            <span class="pl-6 text-gray-800">
                                                                {{ $dokumen }}
                                                            </span>

                                                        @else

                                                            <span class="text-gray-800">
                                                                {{ $dokumen }}
                                                            </span>

                                                        @endif

                                                    </td>


                                                    {{-- ADA --}}
                                                    <td class="px-4 py-3 border border-gray-300 text-center">

                                                        <input type="radio"
                                                            name="ada[{{ $index }}]"
                                                            value="1"
                                                            {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}
                                                            class="w-5 h-5 text-green-600 focus:ring-green-500">

                                                    </td>


                                                    {{-- TIDAK ADA --}}
                                                    <td class="px-4 py-3 border border-gray-300 text-center">

                                                        <input type="radio"
                                                            name="ada[{{ $index }}]"
                                                            value="0"
                                                            {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}
                                                            class="w-5 h-5 text-red-600 focus:ring-red-500">

                                                    </td>


                                                    {{-- TIDAK DIPERLUKAN --}}
                                                    <td class="px-4 py-3 border border-gray-300 text-center">

                                                        <input type="radio"
                                                            name="ada[{{ $index }}]"
                                                            value="2"
                                                            {{ isset($tidakperlu[$index]) && $tidakperlu[$index] ? 'checked' : '' }}
                                                            class="w-5 h-5 text-yellow-600 focus:ring-yellow-500">

                                                    </td>


                                                    {{-- LENGKAP --}}
                                                    <td class="px-4 py-3 border border-gray-300 text-center">

                                                        <input type="radio"
                                                            name="ttd[{{ $index }}]"
                                                            value="1"
                                                            {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}
                                                            class="w-5 h-5 text-blue-600 focus:ring-blue-500">

                                                    </td>


                                                    {{-- BELUM --}}
                                                    <td class="px-4 py-3 border border-gray-300 text-center">

                                                        <input type="radio"
                                                            name="ttd[{{ $index }}]"
                                                            value="0"
                                                            {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}
                                                            class="w-5 h-5 text-gray-600 focus:ring-gray-500">

                                                    </td>


                                                    {{-- KETERANGAN --}}
                                                    <td class="px-4 py-3 border border-gray-300">

                                                        <input type="text"
                                                            name="keterangan[{{ $index }}]"
                                                            value="{{ $item['keterangan'] ?? ($keterangan[$index] ?? '') }}"
                                                            class="w-full border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                                            placeholder="Catatan...">

                                                    </td>


                                                    {{-- AKSI --}}
                                                    @if (Auth::user()->role === 'Keuangan')

                                                        <td class="px-4 py-3 border border-gray-300 text-center">

                                                            <div class="flex items-center justify-center gap-2">

                                                                {{-- EDIT --}}
                                                                <button type="button"
                                                                    onclick='openEditModal(
                                                                        @json($excelRow),
                                                                        @json($dokumen)
                                                                    )'
                                                                    class="vvep-action-icon vvep-action-edit"
                                                                    title="Edit dokumen"
                                                                    aria-label="Edit dokumen">

                                                                    <svg class="w-4 h-4"
                                                                        fill="none"
                                                                        stroke="currentColor"
                                                                        viewBox="0 0 24 24">

                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 7.5-7.5z" />

                                                                    </svg>

                                                                </button>


                                                                {{-- HAPUS --}}
                                                                <button type="button"
                                                                    onclick='openHapusModal(
                                                                        @json($excelRow),
                                                                        @json($dokumen)
                                                                    )'
                                                                    class="vvep-action-icon vvep-action-delete"
                                                                    title="Hapus dokumen"
                                                                    aria-label="Hapus dokumen">

                                                                    <svg class="w-4 h-4"
                                                                        fill="none"
                                                                        stroke="currentColor"
                                                                        viewBox="0 0 24 24">

                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M6 7h12M9 7V4h6v3m-8 0l1 13h8l1-13M10 11v5m4-5v5" />

                                                                    </svg>

                                                                </button>

                                                            </div>

                                                        </td>

                                                    @endif

                                                </tr>

                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>


                        {{-- =====================================================
                             FILE METADATA
                        ====================================================== --}}
                        <div class="bg-blue-50 border border-blue-200 rounded-md p-5 my-4">

                            <div class="flex items-start gap-3">

                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                </svg>


                                <div class="flex-1">

                                    <p class="text-sm font-semibold text-blue-900 mb-1">
                                        Informasi Tambahan
                                    </p>

                                    <p class="text-xs text-blue-700 mb-3">
                                        File metadata excel kelengkapan pengajuan
                                        (opsional)
                                    </p>


                                    <a href="{{ route('file.access.metadata', $pengajuan->id) }}"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-sm transition-all duration-200 font-medium text-sm">

                                        <svg class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />

                                        </svg>

                                        Download File Metadata

                                    </a>

                                </div>

                            </div>

                        </div>


                        {{-- =====================================================
                             CATATAN PENGEMBALIAN
                        ====================================================== --}}
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-md p-5 mb-4">

                            <div class="flex items-start gap-3 mb-3">

                                <div class="text-2xl">
                                    📝
                                </div>

                                <div class="flex-1">

                                    <h3 class="text-base font-semibold text-yellow-900 mb-1">
                                        Catatan Jika Belum Lengkap
                                    </h3>

                                    <p class="text-xs text-yellow-700">
                                        Tuliskan alasan pengembalian jika dokumen
                                        belum lengkap atau saran perbaikan
                                    </p>

                                </div>

                            </div>


                            <textarea name="catatan"
                                rows="4"
                                class="w-full p-3 border border-yellow-200 rounded-md bg-white shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-sm"
                                placeholder="Contoh: Dokumen tanda tangan kepala divisi belum lengkap...">{{ $pengajuan->message }}</textarea>

                        </div>


                        {{-- =====================================================
                             TOMBOL SUBMIT
                        ====================================================== --}}
                        @if ($pengajuan->is_archive == 1)

                            <div class="flex justify-end">

                                <div class="inline-flex items-center gap-2 px-8 py-3 border border-gray-300 bg-gray-100 text-gray-500 font-semibold rounded-md shadow-sm text-base cursor-not-allowed">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7" />

                                    </svg>

                                    File Sudah Diarsipkan

                                </div>

                            </div>

                        @else

                            <div class="flex justify-end">

                                <button type="submit"
                                    name="aksi"
                                    value="lengkap"
                                    class="inline-flex items-center gap-2 px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-md shadow-sm transition-all duration-200 text-base">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7" />

                                    </svg>

                                    Selesaikan Pemeriksaan

                                </button>

                            </div>

                        @endif

                    </form>

                </div>

            </div>

        </div>

    </div>


    </div>

    {{-- ================================================================
         MODAL TAMBAH DOKUMEN
    ================================================================= --}}
    @if (Auth::user()->role === 'Keuangan')

        <div id="modalTambah"
            class="hidden fixed inset-0 z-50 overflow-y-auto">

            <div class="flex items-center justify-center min-h-screen px-4">

                {{-- BACKGROUND --}}
                <div class="fixed inset-0 bg-black bg-opacity-50"
                    onclick="closeTambahModal()">
                </div>


                {{-- MODAL --}}
                <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6">

                    <div class="flex items-center justify-between mb-5">

                        <h3 class="text-lg font-bold text-gray-900">
                            Tambah Dokumen
                        </h3>

                        <button type="button"
                            onclick="closeTambahModal()"
                            class="text-gray-400 hover:text-gray-600 text-2xl">
                            &times;
                        </button>

                    </div>


                    <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <input type="hidden"
                            name="aksi"
                            value="tambah_dokumen">


                        <div class="mb-5">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Dokumen & TTD
                            </label>

                            <input type="text"
                                name="nama_dokumen"
                                required
                                autocomplete="off"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                                placeholder="Masukkan nama dokumen">

                        </div>


                        <div class="flex justify-end gap-2">

                            <button type="button"
                                onclick="closeTambahModal()"
                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md font-medium">
                                Batal
                            </button>


                            <button type="submit"
                                class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-md font-medium">
                                Tambah
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- ================================================================
             MODAL EDIT DOKUMEN
        ================================================================= --}}
        <div id="modalEdit"
            class="hidden fixed inset-0 z-50 overflow-y-auto">

            <div class="flex items-center justify-center min-h-screen px-4">

                <div class="fixed inset-0 bg-black bg-opacity-50"
                    onclick="closeEditModal()">
                </div>


                <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6">

                    <div class="flex items-center justify-between mb-5">

                        <h3 class="text-lg font-bold text-gray-900">
                            Edit Dokumen
                        </h3>

                        <button type="button"
                            onclick="closeEditModal()"
                            class="text-gray-400 hover:text-gray-600 text-2xl">
                            &times;
                        </button>

                    </div>


                    <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <input type="hidden"
                            name="aksi"
                            value="edit_dokumen">


                        <input type="hidden"
                            name="row"
                            id="editRow">


                        <div class="mb-5">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Dokumen & TTD
                            </label>

                            <input type="text"
                                name="nama_dokumen"
                                id="editNamaDokumen"
                                required
                                autocomplete="off"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                        </div>


                        <div class="flex justify-end gap-2">

                            <button type="button"
                                onclick="closeEditModal()"
                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md font-medium">
                                Batal
                            </button>


                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium">
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- ================================================================
             MODAL HAPUS DOKUMEN
        ================================================================= --}}
        <div id="modalHapus"
            class="hidden fixed inset-0 z-50 overflow-y-auto">

            <div class="flex items-center justify-center min-h-screen px-4">

                <div class="fixed inset-0 bg-black bg-opacity-50"
                    onclick="closeHapusModal()">
                </div>


                <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6">

                    <div class="flex items-center justify-between mb-5">

                        <h3 class="text-lg font-bold text-gray-900">
                            Hapus Dokumen
                        </h3>

                        <button type="button"
                            onclick="closeHapusModal()"
                            class="text-gray-400 hover:text-gray-600 text-2xl">
                            &times;
                        </button>

                    </div>


                    <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <input type="hidden"
                            name="aksi"
                            value="hapus_dokumen">


                        <input type="hidden"
                            name="row"
                            id="hapusRow">


                        <p class="text-sm text-gray-600 mb-2">
                            Yakin ingin menghapus dokumen berikut?
                        </p>


                        <div class="bg-gray-50 border border-gray-200 rounded-md p-3 mb-5">

                            <p id="hapusNamaDokumen"
                                class="font-semibold text-gray-900">
                            </p>

                        </div>


                        <div class="flex justify-end gap-2">

                            <button type="button"
                                onclick="closeHapusModal()"
                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md font-medium">
                                Batal
                            </button>


                            <button type="submit"
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md font-medium">
                                Ya, Hapus
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    @endif


    {{-- ================================================================
         JAVASCRIPT MODAL
    ================================================================= --}}
    @if (Auth::user()->role === 'Keuangan')

        <script>

            /* ==========================================================
               TAMBAH
            ========================================================== */

            function openTambahModal() {

                const modal = document.getElementById('modalTambah');

                if (modal) {
                    modal.classList.remove('hidden');
                }

            }


            function closeTambahModal() {

                const modal = document.getElementById('modalTambah');

                if (modal) {
                    modal.classList.add('hidden');
                }

            }


            /* ==========================================================
               EDIT
            ========================================================== */

            function openEditModal(row, nama) {

                const rowInput = document.getElementById('editRow');
                const namaInput = document.getElementById('editNamaDokumen');
                const modal = document.getElementById('modalEdit');

                if (rowInput) {
                    rowInput.value = row;
                }

                if (namaInput) {
                    namaInput.value = nama;
                }

                if (modal) {
                    modal.classList.remove('hidden');
                }

            }


            function closeEditModal() {

                const modal = document.getElementById('modalEdit');

                if (modal) {
                    modal.classList.add('hidden');
                }

            }


            /* ==========================================================
               HAPUS
            ========================================================== */

            function openHapusModal(row, nama) {

                const rowInput = document.getElementById('hapusRow');
                const namaElement = document.getElementById('hapusNamaDokumen');
                const modal = document.getElementById('modalHapus');

                if (rowInput) {
                    rowInput.value = row;
                }

                if (namaElement) {
                    namaElement.textContent = nama;
                }

                if (modal) {
                    modal.classList.remove('hidden');
                }

            }


            function closeHapusModal() {

                const modal = document.getElementById('modalHapus');

                if (modal) {
                    modal.classList.add('hidden');
                }

            }


            /* ==========================================================
               ESC UNTUK TUTUP MODAL
            ========================================================== */

            document.addEventListener('keydown', function(event) {

                if (event.key === 'Escape') {

                    closeTambahModal();
                    closeEditModal();
                    closeHapusModal();

                }

            });

        </script>

    @endif

</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-800 text-white flex items-center justify-center shadow-lg shadow-blue-500/30">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h8.586a2 2 0 011.414.586l3.414 3.414A2 2 0 0121 8.414V19a2 2 0 01-2 2z" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl leading-tight text-gray-800">
                    {{ __('Pengajuan Keuangan') }}
                </h2>

                <p class="text-xs text-gray-500">
                    Buat dan kirim pengajuan keuangan
                </p>
            </div>
        </div>
    </x-slot>


    <style>
        /* =========================================================
           PENGAJUAN PAGE
        ========================================================= */

        .pengajuan-bg {
            background:
                radial-gradient(circle at 8% 8%, rgba(37, 99, 235, .08), transparent 28%),
                radial-gradient(circle at 92% 15%, rgba(59, 130, 246, .07), transparent 25%),
                radial-gradient(circle at 50% 100%, rgba(99, 102, 241, .05), transparent 30%),
                #f5f7fb;
        }

        .pengajuan-main-card {
            border: 1px solid rgba(226, 232, 240, .9);
            box-shadow:
                0 20px 45px rgba(15, 23, 42, .07),
                0 5px 12px rgba(15, 23, 42, .04);
        }

        /* =========================================================
           HERO
        ========================================================= */

        .pengajuan-hero {
            position: relative;
            overflow: hidden;

            background:
                radial-gradient(circle at 88% 12%, rgba(96, 165, 250, .28), transparent 25%),
                radial-gradient(circle at 10% 90%, rgba(37, 99, 235, .18), transparent 30%),
                linear-gradient(135deg, #003a8f 0%, #0754c7 55%, #0b63e5 100%);

            box-shadow:
                0 18px 35px rgba(0, 58, 143, .22),
                inset 0 1px 0 rgba(255, 255, 255, .15);
        }

        .pengajuan-hero::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .06);
            right: -90px;
            top: -140px;
        }

        .pengajuan-hero::after {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .05);
            left: -70px;
            bottom: -100px;
        }

        .hero-document-icon {
            box-shadow:
                0 12px 28px rgba(0, 0, 0, .16),
                inset 0 1px 0 rgba(255, 255, 255, .25);
        }

        .hero-decoration {
            box-shadow:
                0 12px 30px rgba(0, 0, 0, .10),
                inset 0 1px 0 rgba(255, 255, 255, .10);
        }

        /* =========================================================
           NOTE BOX
        ========================================================= */

        .important-note {
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(145deg, #fffbeb, #fff7d6);

            border: 1px solid #fcd34d;

            box-shadow:
                0 8px 18px rgba(245, 158, 11, .08),
                inset 0 1px 0 rgba(255, 255, 255, .7);
        }

        .important-note::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background: linear-gradient(180deg, #f59e0b, #fbbf24);
        }

        /* =========================================================
           FORM SECTION
        ========================================================= */

        .form-section {
            border: 1px solid #e5e7eb;
            background: linear-gradient(145deg, #ffffff, #fafcff);

            box-shadow:
                0 5px 14px rgba(15, 23, 42, .035),
                inset 0 1px 0 rgba(255, 255, 255, .8);

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease;
        }

        .form-section:hover {
            border-color: #dbeafe;

            box-shadow:
                0 10px 24px rgba(37, 99, 235, .06),
                inset 0 1px 0 rgba(255, 255, 255, .9);
        }

        .field-label {
            color: #374151;
        }

        .modern-input,
        .modern-select {
            border: 1px solid #d1d5db;
            background: #ffffff;

            box-shadow:
                0 2px 5px rgba(15, 23, 42, .025),
                inset 0 1px 2px rgba(15, 23, 42, .02);

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease;
        }

        .modern-input:hover,
        .modern-select:hover {
            border-color: #93c5fd;
        }

        .modern-input:focus,
        .modern-select:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 4px rgba(37, 99, 235, .10),
                0 6px 14px rgba(37, 99, 235, .06);

            outline: none;
        }

        /* =========================================================
           SELECT
        ========================================================= */

        .select-icon-box {
            box-shadow:
                0 5px 12px rgba(37, 99, 235, .16),
                inset 0 1px 0 rgba(255, 255, 255, .25);
        }

        /* =========================================================
           FILE UPLOAD
        ========================================================= */

        .file-upload-box {
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(145deg, #ffffff, #f8fbff);

            border: 1.5px dashed #bfdbfe;

            box-shadow:
                0 7px 18px rgba(15, 23, 42, .035),
                inset 0 1px 0 rgba(255, 255, 255, .8);

            transition:
                border-color .25s ease,
                background .25s ease,
                transform .25s ease,
                box-shadow .25s ease;
        }

        .file-upload-box:hover {
            border-color: #2563eb;
            background: #eff6ff;

            transform: translateY(-2px);

            box-shadow:
                0 12px 24px rgba(37, 99, 235, .08),
                inset 0 1px 0 rgba(255, 255, 255, .9);
        }

        .upload-icon {
            background: linear-gradient(145deg, #0b63e5, #003a8f);

            box-shadow:
                0 9px 18px rgba(0, 58, 143, .20),
                inset 0 1px 0 rgba(255, 255, 255, .2);
        }

        .browse-button {
            box-shadow:
                0 5px 12px rgba(37, 99, 235, .10),
                inset 0 1px 0 rgba(255, 255, 255, .3);
        }

        /* =========================================================
           BUTTON
        ========================================================= */

        .cancel-button {
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .cancel-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 7px 15px rgba(15, 23, 42, .07);
        }

        .submit-button {
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(135deg, #16a34a, #15803d);

            box-shadow:
                0 9px 20px rgba(22, 163, 74, .20),
                inset 0 1px 0 rgba(255, 255, 255, .18);

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }

        .submit-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;

            background: linear-gradient(
                90deg,
                transparent,
                rgba(255,255,255,.18),
                transparent
            );

            transition: left .55s ease;
        }

        .submit-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 13px 26px rgba(22, 163, 74, .26),
                inset 0 1px 0 rgba(255, 255, 255, .18);
        }

        .submit-button:hover::before {
            left: 120%;
        }

        .submit-button:active {
            transform: translateY(0);
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 640px) {

            .pengajuan-hero {
                border-radius: 1rem;
            }

            .hero-decoration {
                display: none;
            }

            .form-section {
                padding: 1rem;
            }
        }
    </style>


    {{-- =========================================================
         PAGE BACKGROUND
    ========================================================== --}}
    <div class="py-8 md:py-10 min-h-screen pengajuan-bg">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- =====================================================
                 MAIN CARD
            ====================================================== --}}
            <div class="pengajuan-main-card bg-white/90 backdrop-blur-sm rounded-2xl overflow-hidden">

                <div class="p-5 md:p-8 space-y-7">

                    {{-- =================================================
                         HERO HEADER
                    ================================================== --}}
                    <div class="pengajuan-hero rounded-2xl p-6 md:p-8">

                        <div class="relative z-10 flex items-center justify-between gap-5">

                            <div class="flex items-center gap-5">

                                {{-- ICON --}}
                                <div
                                    class="hero-document-icon w-14 h-14 md:w-16 md:h-16 rounded-2xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center flex-shrink-0">

                                    <svg
                                        class="w-7 h-7 md:w-8 md:h-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h8.586A2 2 0 0117 3.586l3.414 3.414A2 2 0 0121 8.414V19a2 2 0 01-2 2z"
                                        />
                                    </svg>

                                </div>


                                {{-- TITLE --}}
                                <div>

                                    <h2 class="text-2xl md:text-3xl font-bold text-white tracking-tight">
                                        Buat Pengajuan Keuangan
                                    </h2>

                                    <p class="text-blue-100 text-sm md:text-base mt-1">
                                        Lengkapi formulir untuk mengajukan keuangan
                                    </p>

                                </div>

                            </div>


                            {{-- DECORATION --}}
                            <div
                                class="hero-decoration hidden md:flex w-20 h-20 rounded-full bg-white/10 border border-white/10 items-center justify-center">

                                <svg
                                    class="w-10 h-10 text-white/80"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M12 6v12m6-6H6m14 0a8 8 0 11-16 0 8 8 0 0116 0z"
                                    />
                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         FORM
                    ================================================== --}}
                    <form
                        action="{{ route('submit.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-6"
                    >

                        @csrf


                        {{-- =================================================
                             NOTE
                        ================================================== --}}
                        <div class="important-note rounded-2xl p-5 md:p-6">

                            <div class="flex items-start gap-4">

                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-xl bg-yellow-400 text-yellow-900 flex items-center justify-center shadow-md">

                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <div class="font-bold text-yellow-800">
                                        Perhatian
                                    </div>

                                    <div class="text-xs md:text-sm text-yellow-700 mt-1 leading-relaxed">

                                        Jika ingin mengajukan dokumen untuk PPSPM, silahkan berikan nama pengajuan
                                        dengan kata kunci yang jelas.

                                        Misalkan kata kunci
                                        <strong>Gaji</strong>.

                                        Contohnya:
                                        <strong>Gaji Divisi Program April 2026</strong>.

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             NAMA PENGAJUAN
                        ================================================== --}}
                        <div class="form-section rounded-2xl p-5 md:p-6">

                            <div class="flex items-start gap-4">

                                {{-- NUMBER --}}
                                <div
                                    class="hidden sm:flex flex-shrink-0 w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-blue-800 text-white items-center justify-center font-bold text-sm shadow-lg shadow-blue-500/20">

                                    1

                                </div>


                                <div class="flex-1 space-y-3">

                                    <div>

                                        <label class="block text-sm font-bold field-label">
                                            Nama Pengajuan
                                            <span class="text-red-500">*</span>
                                        </label>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Gunakan nama yang jelas dan spesifik agar mudah diidentifikasi.
                                        </p>

                                    </div>


                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        class="modern-input w-full rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400"
                                        placeholder="Contoh: Pengajuan Pembelian Laptop untuk Tim IT"
                                        required
                                    >


                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1 font-medium flex items-center gap-1">
                                            <span>⚠️</span>
                                            <span>{{ $message }}</span>
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             METODE & SUMBER DANA
                        ================================================== --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- METODE PEMBAYARAN --}}
                            <div class="form-section rounded-2xl p-5">

                                <div class="flex items-start gap-4">

                                    <div
                                        class="select-icon-box flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-800 text-white flex items-center justify-center">

                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M3 10h18M7 15h1m3 0h1m3 0h1m-8 4h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"
                                            />
                                        </svg>

                                    </div>


                                    <div class="flex-1">

                                        <label class="block text-sm font-bold field-label mb-1">
                                            Metode Pembayaran
                                            <span class="text-red-500">*</span>
                                        </label>

                                        <p class="text-xs text-gray-500 mb-3">
                                            Pilih metode pembayaran yang digunakan.
                                        </p>

                                    </div>

                                </div>


                                <select
                                    name="payment_method"
                                    id="payment_method"
                                    class="modern-select w-full rounded-xl px-4 py-3 text-gray-900"
                                    required
                                >

                                    <option value="" selected disabled>
                                        Pilih metode pembayaran
                                    </option>

                                    @foreach ($payment_method as $payment)

                                        <option
                                            value="{{ $payment->id }}"
                                            {{ old('payment_method') == $payment->id ? 'selected' : '' }}
                                        >
                                            {{ $payment->payment_method_name }} - {{ $payment->sub_category }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('payment_method')
                                    <p class="text-red-500 text-xs mt-2 font-medium">
                                        ⚠️ {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- SUMBER DANA --}}
                            <div class="form-section rounded-2xl p-5">

                                <div class="flex items-start gap-4">

                                    <div
                                        class="select-icon-box flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-800 text-white flex items-center justify-center">

                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M12 8c-2.21 0-4 1.343-4 3s1.79 3 4 3 4 1.343 4 3-1.79 3-4 3m0-14v2m0 12v2M5 12H3m18 0h-2"
                                            />
                                        </svg>

                                    </div>


                                    <div class="flex-1">

                                        <label class="block text-sm font-bold field-label mb-1">
                                            Sumber Dana
                                            <span class="text-red-500">*</span>
                                        </label>

                                        <p class="text-xs text-gray-500 mb-3">
                                            Pilih sumber dana pengajuan.
                                        </p>

                                    </div>

                                </div>


                                <select
                                    name="funding_source"
                                    id="funding_source"
                                    class="modern-select w-full rounded-xl px-4 py-3 text-gray-900"
                                    required
                                >

                                    <option value="" selected disabled>
                                        Pilih sumber dana
                                    </option>

                                    @foreach ($funding_source as $funding)

                                        <option
                                            value="{{ $funding->id }}"
                                            {{ old('funding_source') == $funding->id ? 'selected' : '' }}
                                        >
                                            {{ $funding->funding_source_name }} - {{ $funding->sub_category }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('funding_source')
                                    <p class="text-red-500 text-xs mt-2 font-medium">
                                        ⚠️ {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        {{-- =================================================
                             FILE UPLOAD
                        ================================================== --}}
                        <div class="form-section rounded-2xl p-5 md:p-6">

                            <div class="flex items-start gap-4 mb-5">

                                <div
                                    class="hidden sm:flex flex-shrink-0 w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-blue-800 text-white items-center justify-center font-bold text-sm shadow-lg shadow-blue-500/20">

                                    2

                                </div>


                                <div>

                                    <label class="block text-sm font-bold field-label">
                                        Dokumen PDF Pengajuan
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Upload dokumen pengajuan dalam format PDF.
                                    </p>

                                </div>

                            </div>


                            <label
                                for="file"
                                class="file-upload-box flex flex-col sm:flex-row items-center gap-4 p-5 rounded-2xl cursor-pointer"
                            >

                                {{-- ICON --}}
                                <div
                                    class="upload-icon flex-shrink-0 w-14 h-14 rounded-2xl flex items-center justify-center"
                                >

                                    <svg
                                        class="w-7 h-7 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                        />
                                    </svg>

                                </div>


                                {{-- FILE INFO --}}
                                <div class="flex-1 text-center sm:text-left min-w-0">

                                    <p
                                        id="filename"
                                        class="text-sm font-bold text-gray-700 truncate"
                                    >
                                        Pilih berkas pengajuan...
                                    </p>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Format: PDF
                                        <span class="mx-1">•</span>
                                        Maksimal: 50MB
                                    </p>

                                </div>


                                {{-- BROWSE --}}
                                <span
                                    class="browse-button flex-shrink-0 text-sm font-bold text-blue-700 bg-blue-50 border border-blue-100 px-5 py-2.5 rounded-xl"
                                >
                                    Browse
                                </span>

                            </label>


                            <input
                                id="file"
                                name="file"
                                type="file"
                                accept="application/pdf"
                                class="hidden"
                                onchange="document.getElementById('filename').innerText = this.files[0]?.name ?? 'Pilih berkas pengajuan...'"
                            >


                            @error('file')
                                <p class="text-red-500 text-xs mt-2 font-medium flex items-center gap-1">
                                    <span>⚠️</span>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror

                        </div>


                        {{-- =================================================
                             DIVIDER
                        ================================================== --}}
                        <div class="flex items-center gap-4">

                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

                            <div
                                class="w-2 h-2 rounded-full bg-blue-400 shadow-sm"
                            ></div>

                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

                        </div>


                        {{-- =================================================
                             BUTTON
                        ================================================== --}}
                        <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-3">

                            {{-- BATAL --}}
                            <a
                                href="{{ route('user.dashboard') }}"
                                class="cancel-button inline-flex items-center justify-center gap-2 px-6 py-3 border border-gray-300 bg-white rounded-xl text-gray-700 font-semibold text-sm"
                            >

                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>

                                Batal

                            </a>


                            {{-- KIRIM --}}
                            <button
                                type="submit"
                                class="submit-button inline-flex items-center justify-center gap-2 px-7 py-3 text-white rounded-xl font-bold text-sm"
                            >

                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                    />
                                </svg>

                                <span>Kirim Pengajuan</span>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
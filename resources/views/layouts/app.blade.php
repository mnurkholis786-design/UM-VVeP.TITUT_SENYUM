<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- =========================================================
         GLOBAL APP CSS
    ========================================================== -->
    <style>

        /* =========================================================
           GLOBAL RESET
        ========================================================== */

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            font-family: 'Poppins', sans-serif !important;
        }

        body {
            background: #f3f6fb;
            color: #17233c;
            overflow-x: hidden;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }


        /* =========================================================
           APP WRAPPER
        ========================================================== */

        .app-wrapper {
            min-height: 100vh;
            width: 100%;
            position: relative;
        }


        /* =========================================================
           SIDEBAR
        ========================================================== */

        .app-sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 240px;
            height: 100vh;

            z-index: 100;

            overflow-y: auto;
            overflow-x: hidden;

            background: #ffffff;

            border-right: 1px solid #e3eaf3;

            box-shadow:
                4px 0 20px rgba(25, 63, 110, 0.05);
        }


        /* =========================================================
           MAIN AREA
        ========================================================== */

        .app-main {
            margin-left: 240px;

            min-height: 100vh;
            width: calc(100% - 240px);

            display: flex;
            flex-direction: column;

            background:
                linear-gradient(
                    180deg,
                    #f7faff 0%,
                    #f3f6fb 100%
                );
        }


        /* =========================================================
           GLOBAL TOP NAVIGATION
           
           DIBUAT LEBIH TINGGI AGAR:
           - judul tidak mepet
           - subtitle punya ruang
           - icon tidak terasa berhimpitan
        ========================================================== */

        .app-topnav {
            position: sticky;

            top: 0;
            left: 0;

            z-index: 90;

            width: 100%;

            min-height: 86px;

            background: rgba(255, 255, 255, 0.97);

            border-bottom: 1px solid #e3eaf3;

            box-shadow:
                0 5px 18px rgba(29, 66, 112, 0.07);

            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);

            display: flex;
            align-items: stretch;
        }


        /*
        Navigation dari layouts.navigation harus
        memenuhi seluruh area header.
        */

        .app-topnav > * {
            width: 100% !important;
            min-width: 0;
            min-height: 86px;
        }


        /*
        Kalau navigation menggunakan elemen nav,
        tetap dibuat full width.
        */

        .app-topnav nav {
            width: 100% !important;
            min-height: 86px;
        }


        /*
        Container utama navigation juga diberi
        ruang kiri/kanan yang lebih lega.
        */

        .app-topnav nav > div {
            min-height: 86px;
        }


        /* =========================================================
           GLOBAL HEADER TEXT

           Berlaku untuk title halaman seperti:
           - Notifikasi
           - Input Arsip
           - Pengajuan
           - Periksa Kelengkapan Pengajuan
           - Report
           ========================================================== */

        .app-topnav h1,
        .app-topnav h2,
        .app-topnav h3 {
            line-height: 1.25 !important;
        }


        .app-topnav h1 {
            font-size: 23px !important;
            font-weight: 800 !important;
        }


        .app-topnav h2 {
            font-size: 21px !important;
            font-weight: 800 !important;
        }


        .app-topnav h3 {
            font-size: 19px !important;
            font-weight: 700 !important;
        }


        /*
        Subtitle/header description.
        */

        .app-topnav p,
        .app-topnav small {
            line-height: 1.45 !important;
        }


        /* =========================================================
           HEADER CONTENT SPACING

           Mencegah title/icon terlalu mepet ke atas-bawah.
        ========================================================== */

        .app-topnav .flex {
            align-items: center;
        }


        .app-topnav [class*="items-center"] {
            align-items: center;
        }


        /* =========================================================
           ICON HEADER

           Icon halaman dibuat sedikit lebih besar.
        ========================================================== */

        .app-topnav svg {
            flex-shrink: 0;
        }


        /*
        Icon kotak di sebelah judul.
        Tidak mengubah icon kecil yang berada di
        dalam tombol biasa secara agresif.
        */

        .app-topnav [class*="rounded-lg"] svg,
        .app-topnav [class*="rounded-xl"] svg {
            flex-shrink: 0;
        }


        /* =========================================================
           AREA KANAN HEADER

           Membantu elemen kanan tidak ikut bergeser
           karena title panjang.
        ========================================================== */

        .app-topnav .ml-auto {
            margin-left: auto !important;
        }


        .app-topnav .ms-auto {
            margin-inline-start: auto !important;
        }


        /*
        Jika navigation memakai justify-between,
        pertahankan jaraknya.
        */

        .app-topnav .justify-between {
            justify-content: space-between !important;
        }


        /* =========================================================
           NOTIFICATION AREA

           Memberi ruang lebih luas untuk lonceng + badge.
        ========================================================== */

        .app-topnav button,
        .app-topnav a {
            flex-shrink: 0;
        }


        /*
        Badge angka notifikasi tidak terlalu mepet
        dengan icon.
        */

        .app-topnav [class*="badge"],
        .app-topnav [class*="notification"] span {
            line-height: 1;
        }


        /* =========================================================
           CONTENT
        ========================================================== */

        .app-content {
            flex: 1;

            position: relative;

            width: 100%;

            padding: 28px !important;

            background:
                radial-gradient(
                    circle at 92% 0%,
                    rgba(43, 122, 229, 0.06),
                    transparent 25%
                ),
                linear-gradient(
                    180deg,
                    #f5f8fd 0%,
                    #f1f5fa 100%
                );
        }


        /* =========================================================
           MAIN CONTENT CONTAINER

           Memberi ruang agar halaman tidak terasa
           menempel ke header.
        ========================================================== */

        .app-content > * {
            width: 100%;
        }


        /* =========================================================
           SMOOTH SCROLL
        ========================================================== */

        html {
            scroll-behavior: smooth;
        }


        /* =========================================================
           SCROLLBAR
        ========================================================== */

        .app-sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .app-sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .app-sidebar::-webkit-scrollbar-thumb {
            background: #cbd8e8;
            border-radius: 999px;
        }

        .app-sidebar::-webkit-scrollbar-thumb:hover {
            background: #9eb2cc;
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 1024px) {

            .app-sidebar {
                width: 220px;
            }

            .app-main {
                margin-left: 220px;
                width: calc(100% - 220px);
            }

            .app-topnav,
            .app-topnav > *,
            .app-topnav nav {
                min-height: 82px;
            }

            .app-content {
                padding: 22px !important;
            }
        }


        @media (max-width: 768px) {

            .app-sidebar {
                width: 0;
                border-right: none;
                box-shadow: none;
            }

            .app-main {
                margin-left: 0;
                width: 100%;
            }

            .app-topnav {
                min-height: 78px;
            }

            .app-topnav > *,
            .app-topnav nav {
                min-height: 78px;
            }

            .app-content {
                padding: 18px !important;
            }

            .app-topnav h1 {
                font-size: 20px !important;
            }

            .app-topnav h2 {
                font-size: 19px !important;
            }
        }


        @media (max-width: 480px) {

            .app-topnav {
                min-height: 72px;
            }

            .app-topnav > *,
            .app-topnav nav {
                min-height: 72px;
            }

            .app-content {
                padding: 14px !important;
            }

            .app-topnav h1 {
                font-size: 18px !important;
            }

            .app-topnav h2 {
                font-size: 18px !important;
            }
        }

    </style>
</head>


<body class="font-sans antialiased">


    {{-- =========================================================
        APP WRAPPER
    ========================================================== --}}

    <div class="app-wrapper">


        {{-- =========================================================
            SIDEBAR
        ========================================================== --}}

        <aside class="app-sidebar">

            @include('layouts.sidebar')

        </aside>


        {{-- =========================================================
            MAIN CONTENT AREA
        ========================================================== --}}

        <div class="app-main">


            {{-- =====================================================
                GLOBAL TOP NAVIGATION

                BAGIAN INI DIPAKAI SEMUA HALAMAN.
            ====================================================== --}}

            <header class="app-topnav">

                @include('layouts.navigation')

            </header>


            {{-- =====================================================
                PAGE CONTENT
            ====================================================== --}}

            <main class="app-content">

                {{ $slot }}

            </main>


        </div>

    </div>


    {{-- =========================================================
        SWEETALERT 3D THEME & NOTIFIKASI
    ========================================================== --}}
    <style>
        .swal2-popup {
            border-radius: 24px !important;
            padding: 28px !important;
            border: 1px solid #E2E8F0 !important;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.4) !important;
            font-family: inherit !important;
            background-color: #FFFFFF !important;
        }
        .swal2-title {
            font-size: 20px !important;
            font-weight: 900 !important;
            color: #0F172A !important;
        }
        .swal2-html-container {
            font-size: 13.5px !important;
            color: #64748B !important;
            line-height: 1.5 !important;
        }
        .swal2-confirm {
            border-radius: 14px !important;
            padding: 12px 24px !important;
            font-size: 13.5px !important;
            font-weight: 800 !important;
            min-height: 46px !important;
            box-shadow: 0 4px 14px rgba(0, 58, 143, 0.3) !important;
        }
        .swal2-cancel {
            border-radius: 14px !important;
            padding: 12px 22px !important;
            font-size: 13.5px !important;
            font-weight: 700 !important;
            min-height: 46px !important;
            background-color: #F8FAFC !important;
            color: #475569 !important;
            border: 1.5px solid #CBD5E1 !important;
        }
    </style>

    <script>

        @if (session('success'))

            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });

        @endif


        @if (session('error'))

            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}"
            });

        @endif


        @if (session('warning'))

            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: "{{ session('warning') }}"
            });

        @endif


        @if (session('info'))

            Swal.fire({
                icon: 'info',
                title: 'Informasi',
                text: "{{ session('info') }}"
            });

        @endif

    </script>

    {{-- =========================================================
        MODAL KONFIRMASI LOGOUT GLOBAL
    ========================================================== --}}
    <div id="globalLogoutModal" class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" onclick="closeGlobalLogoutModal()"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all w-full max-w-md p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">
                
                {{-- Close Button X --}}
                <button
                    type="button"
                    onclick="closeGlobalLogoutModal()"
                    style="position: absolute; top: 18px; right: 18px; width: 34px; height: 34px; border-radius: 50%; background-color: #F1F5F9; color: #64748B; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer;"
                    class="hover:bg-slate-200 hover:text-slate-800 transition"
                    aria-label="Tutup"
                >
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{-- Icon Badge --}}
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl mb-4 shadow-inner" style="background-color: #FEF2F2; color: #DC2626;">
                    <svg style="width: 30px; height: 30px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </div>

                {{-- Content --}}
                <div class="text-center">
                    <h3 class="text-xl font-black text-gray-900">
                        Konfirmasi Logout
                    </h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">
                        Apakah Anda yakin ingin keluar dari sistem? Sesi akun Anda saat ini akan diakhiri.
                    </p>

                    @auth
                    {{-- User Card Preview --}}
                    <div class="mt-4 p-3.5 border rounded-2xl flex items-center gap-3 text-left" style="background-color: #F8FAFC !important; border: 1px solid #E2E8F0;">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#00AEEF] text-white font-black text-base flex items-center justify-center shadow-sm flex-shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs font-bold text-gray-900 truncate">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-[11px] text-gray-500 truncate">
                                {{ Auth::user()->email }} &bull; <span class="font-semibold text-blue-600">{{ Auth::user()->role }}</span>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>

                {{-- Form Logout --}}
                <form id="globalLogoutModalForm" method="POST" action="{{ route('logout') }}" class="mt-6 w-full">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 w-full">
                        <button
                            type="button"
                            onclick="closeGlobalLogoutModal()"
                            style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                            class="w-full transition hover:bg-slate-100 cursor-pointer flex items-center justify-center text-center"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            style="background-color: #DC2626; color: #FFFFFF; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35); min-height: 48px;"
                            class="w-full transition hover:brightness-110 cursor-pointer flex items-center justify-center gap-2 text-center"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                            </svg>
                            <span>Ya, Logout</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- =========================================================
        MODAL KONFIRMASI GLOBAL (PENGGANTI POPUP BAWAAN BROWSER)
    ========================================================== --}}
    <div id="globalConfirmModal" class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" onclick="closeGlobalConfirmModal()"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all w-full max-w-md p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">
                
                {{-- Close Button X --}}
                <button
                    type="button"
                    onclick="closeGlobalConfirmModal()"
                    style="position: absolute; top: 18px; right: 18px; width: 34px; height: 34px; border-radius: 50%; background-color: #F1F5F9; color: #64748B; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer;"
                    class="hover:bg-slate-200 hover:text-slate-800 transition"
                    aria-label="Tutup"
                >
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{-- Icon Badge --}}
                <div id="globalConfirmIconBg" class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl mb-4 shadow-inner" style="background-color: #FEF2F2; color: #DC2626;">
                    <svg id="globalConfirmIconDanger" style="width: 30px; height: 30px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <svg id="globalConfirmIconInfo" class="hidden" style="width: 30px; height: 30px; color: #003A8F;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                {{-- Content --}}
                <div class="text-center">
                    <h3 class="text-xl font-black text-gray-900" id="globalConfirmModalTitle">
                        Konfirmasi Tindakan
                    </h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed" id="globalConfirmModalDesc">
                        Apakah Anda yakin ingin melanjutkan tindakan ini?
                    </p>
                </div>

                {{-- Action Buttons --}}
                <div class="grid grid-cols-2 gap-4 w-full mt-7">
                    <button
                        type="button"
                        onclick="closeGlobalConfirmModal()"
                        style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                        class="w-full transition hover:bg-slate-100 cursor-pointer flex items-center justify-center text-center"
                    >
                        Batal
                    </button>
                    <button
                        type="button"
                        id="globalConfirmSubmitBtn"
                        style="background-color: #DC2626; color: #FFFFFF; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35); min-height: 48px;"
                        class="w-full transition hover:brightness-110 cursor-pointer flex items-center justify-center gap-2 text-center"
                    >
                        <span id="globalConfirmSubmitText">Ya, Lanjutkan</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script>
        // ========================================================
        // KONTROL MODAL LOGOUT
        // ========================================================
        function openGlobalLogoutModal() {
            const modal = document.getElementById('globalLogoutModal');
            if (modal) modal.classList.remove('hidden');
        }

        function closeGlobalLogoutModal() {
            const modal = document.getElementById('globalLogoutModal');
            if (modal) modal.classList.add('hidden');
        }

        // ========================================================
        // KONTROL MODAL KONFIRMASI GLOBAL (PENGGANTI CONFIRM NATIVE)
        // ========================================================
        let pendingConfirmCallback = null;

        function openGlobalConfirmModal(options = {}) {
            const modal = document.getElementById('globalConfirmModal');
            const titleEl = document.getElementById('globalConfirmModalTitle');
            const descEl = document.getElementById('globalConfirmModalDesc');
            const submitBtn = document.getElementById('globalConfirmSubmitBtn');
            const submitText = document.getElementById('globalConfirmSubmitText');
            const iconBg = document.getElementById('globalConfirmIconBg');
            const iconDanger = document.getElementById('globalConfirmIconDanger');
            const iconInfo = document.getElementById('globalConfirmIconInfo');

            if (!modal) return;

            titleEl.textContent = options.title || 'Konfirmasi Tindakan';
            descEl.textContent = options.message || 'Apakah Anda yakin ingin melanjutkan tindakan ini?';
            submitText.textContent = options.confirmText || 'Ya, Lanjutkan';

            const isDanger = options.isDanger !== false;
            if (isDanger) {
                iconBg.style.backgroundColor = '#FEF2F2';
                iconBg.style.color = '#DC2626';
                submitBtn.style.backgroundColor = '#DC2626';
                submitBtn.style.boxShadow = '0 4px 14px rgba(220, 38, 38, 0.35)';
                iconDanger.classList.remove('hidden');
                iconInfo.classList.add('hidden');
            } else {
                iconBg.style.backgroundColor = '#EFF6FF';
                iconBg.style.color = '#003A8F';
                submitBtn.style.backgroundColor = '#003A8F';
                submitBtn.style.boxShadow = '0 4px 14px rgba(0, 58, 143, 0.35)';
                iconDanger.classList.add('hidden');
                iconInfo.classList.remove('hidden');
            }

            pendingConfirmCallback = typeof options.onConfirm === 'function' ? options.onConfirm : null;

            submitBtn.onclick = function() {
                closeGlobalConfirmModal();
                if (pendingConfirmCallback) {
                    pendingConfirmCallback();
                    pendingConfirmCallback = null;
                }
            };

            modal.classList.remove('hidden');
        }

        function closeGlobalConfirmModal() {
            const modal = document.getElementById('globalConfirmModal');
            if (modal) modal.classList.add('hidden');
            pendingConfirmCallback = null;
        }

        // Tutup modal jika tombol ESC ditekan
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeGlobalLogoutModal();
                closeGlobalConfirmModal();
            }
        });

        // ========================================================
        // INTERCEPTOR OTOMATIS: UBAH SEMUA CONFIRM() MENJADI MODAL 3D
        // ========================================================
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Tangkap form logout
            const logoutForms = document.querySelectorAll('form[action="{{ route('logout') }}"]');
            logoutForms.forEach(function(form) {
                if (form.id === 'globalLogoutModalForm') return;
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    openGlobalLogoutModal();
                });
            });

            // 2. Tangkap semua form dengan onsubmit confirm(...) bawaan JS
            document.addEventListener('submit', function(e) {
                const form = e.target;
                if (!form || form.dataset.modalConfirmed === 'true') return;

                const onsubmitAttr = form.getAttribute('onsubmit');
                if (onsubmitAttr && onsubmitAttr.includes('confirm(')) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    let msg = 'Apakah Anda yakin ingin melanjutkan tindakan ini?';
                    const match = onsubmitAttr.match(/confirm\s*\(\s*['"`](.*?)['"`]\s*\)/);
                    if (match && match[1]) {
                        msg = match[1];
                    }

                    const isHapus = msg.toLowerCase().includes('hapus') || msg.toLowerCase().includes('delete');

                    openGlobalConfirmModal({
                        title: isHapus ? 'Konfirmasi Hapus' : 'Konfirmasi Tindakan',
                        message: msg,
                        confirmText: isHapus ? 'Ya, Hapus' : 'Ya, Lanjutkan',
                        isDanger: isHapus,
                        onConfirm: function() {
                            form.dataset.modalConfirmed = 'true';
                            form.submit();
                        }
                    });
                }
            }, true);
        });
    </script>

</body>

</html>
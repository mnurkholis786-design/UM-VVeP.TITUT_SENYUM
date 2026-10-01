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
        SWEETALERT
    ========================================================== --}}

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

</body>

</html>
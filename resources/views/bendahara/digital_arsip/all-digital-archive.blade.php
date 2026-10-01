<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Arsip Digital') }}
        </h2>
    </x-slot>

    {{-- =========================================================
         HALAMAN ARSIP DIGITAL
         KLASIFIKASI ARSIP
    ========================================================== --}}

    <div class="py-8 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- =================================================
                 HEADER
            ================================================== --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

                <div class="flex items-center gap-4">

                    <div class="p-3 bg-blue-500 rounded-xl shadow-md">

                        <svg
                            class="w-7 h-7 text-white"
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

                        <h3 class="text-2xl font-bold text-gray-800">
                            Daftar Arsip Digital
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Arsip digital berdasarkan klasifikasi
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 KLASIFIKASI ARSIP
            ================================================== --}}

            @php

                $klasifikasi = [

                    'AEC' => [
                        'nama' => 'Kerja Sama',
                        'items' => [
                            'AEC.001' => 'Kerja Sama Jasa Siaran dan Digitalisasi Penyiaran Daerah',
                        ],
                    ],

                    'BAH' => [
                        'nama' => 'Pelayanan Publik Lainnya',
                        'items' => [
                            'BAH.001' => 'Siaran Berita, Current Affairs dan Olahraga',
                            'BAH.002' => 'Siaran Program dan Promosi Acara',
                            'BAH.003' => 'Siaran Konten Media Baru',
                        ],
                    ],

                    'CBR' => [
                        'nama' => 'Dukungan Teknis',
                        'items' => [
                            'CBR.001' => 'Dukungan Teknis Kinerja Transmisi, Multipleksing dan Fasilitas Teknik',
                        ],
                    ],

                    'CBT' => [
                        'nama' => 'Prasarana Bidang Teknologi Informasi dan Komunikasi',
                        'items' => [
                            'CBT.002' => 'Sarana dan Prasarana Teknik Produksi dan Penyiaran',
                        ],
                    ],

                    'CDS OP' => [
                        'nama' => 'Prasarana Bidang Teknologi Informasi dan Komunikasi',
                        'items' => [
                            'CDS.001' => 'Pemeliharaan Transmisi, Multipleksing dan Fasilitas Teknik',
                            'CDS.002' => 'Pemeliharaan Peralatan Teknik Produksi dan Penyiaran',
                            'CDS.003' => 'Pemeliharaan Infrastruktur Teknologi Informatika dan Media Baru',
                        ],
                    ],

                    'EBA' => [
                        'nama' => 'Layanan Dukungan Manajemen Internal',
                        'items' => [
                            'EBA.994' => 'Layanan Perkantoran',
                        ],
                    ],

                    'WA' => [
                        'nama' => 'Program Dukungan Manajemen',
                        'items' => [
                            'WA.4376' => 'Pelaksanaan Dukungan Manajemen dan Tugas Teknis Lainnya Stasiun Penyiaran TV Publik Lokal dan Regional',
                        ],
                    ],

                ];

            @endphp


            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">

                <div class="p-6">

                    <h3 class="font-bold text-lg text-gray-800 mb-4">
                        Kategori Arsip Digital
                    </h3>


                    {{-- =================================================
                         TAB KLASIFIKASI
                    ================================================== --}}

                    <div class="klasifikasi-wrapper">

                        {{-- SEMUA --}}
                        <a
                            href="{{ request()->url() }}"
                            class="klasifikasi-tab
                                {{ !request('kode_klasifikasi') ? 'active' : '' }}">

                            SEMUA

                        </a>


                        {{-- TAB KLASIFIKASI --}}
                        @foreach ($klasifikasi as $kode => $data)

                            @php
                                $isActive = false;

                                if (request('kode_klasifikasi')) {
                                    foreach ($data['items'] as $itemKode => $itemNama) {
                                        if (request('kode_klasifikasi') === $itemKode) {
                                            $isActive = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp


                            <div class="klasifikasi-dropdown">

                                <button
                                    type="button"
                                    class="klasifikasi-tab
                                        {{ $isActive ? 'active' : '' }}">

                                    {{ $kode }} – {{ $data['nama'] }}

                                    <svg
                                        class="dropdown-icon"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7">
                                        </path>

                                    </svg>

                                </button>


                                {{-- DROPDOWN --}}
                                <div class="klasifikasi-menu">

                                    @foreach ($data['items'] as $itemKode => $itemNama)

                                        <a
                                            href="{{ request()->fullUrlWithQuery([
                                                'kode_klasifikasi' => $itemKode
                                            ]) }}"
                                            class="klasifikasi-item
                                                {{ request('kode_klasifikasi') === $itemKode ? 'selected' : '' }}">

                                            <span class="kode-klasifikasi">
                                                {{ $itemKode }}
                                            </span>

                                            <span>
                                                {{ $itemNama }}
                                            </span>

                                        </a>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>


            {{-- =================================================
                 INFORMASI KLASIFIKASI YANG DIPILIH
            ================================================== --}}

            @if (request('kode_klasifikasi'))

                @php

                    $kodeAktif = request('kode_klasifikasi');

                    $namaAktif = null;

                    foreach ($klasifikasi as $data) {

                        if (isset($data['items'][$kodeAktif])) {

                            $namaAktif = $data['items'][$kodeAktif];

                            break;

                        }

                    }

                @endphp


                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0">

                            <div class="w-9 h-9 bg-blue-600 text-white rounded-lg flex items-center justify-center">

                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z">
                                    </path>

                                </svg>

                            </div>

                        </div>


                        <div>

                            <p class="text-sm font-semibold text-blue-800">
                                Klasifikasi Dipilih
                            </p>

                            <p class="text-sm text-blue-700 mt-1">

                                <strong>
                                    {{ $kodeAktif }}
                                </strong>

                                –
                                {{ $namaAktif }}

                            </p>

                        </div>

                    </div>

                </div>

            @endif


            {{-- =================================================
                 DAFTAR ARSIP
            ================================================== --}}

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200">

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="font-bold text-lg text-gray-800">
                                Daftar Arsip Digital
                            </h3>

                            @if (request('kode_klasifikasi'))

                                <p class="text-sm text-gray-500 mt-1">

                                    Menampilkan arsip dengan kode klasifikasi:

                                    <strong>
                                        {{ request('kode_klasifikasi') }}
                                    </strong>

                                </p>

                            @else

                                <p class="text-sm text-gray-500 mt-1">
                                    Menampilkan seluruh arsip digital
                                </p>

                            @endif

                        </div>

                    </div>

                </div>


                <div class="p-6">

                    {{-- =================================================
                         CATATAN:
                         Variabel $archives harus dikirim dari controller
                    ================================================== --}}

                    @if (isset($archives) && $archives->count() > 0)

                        <div class="space-y-3">

                            @foreach ($archives as $no => $archive)

                                <a
                                    href="{{ route('digital.show', $archive->id) }}"
                                    class="flex items-center gap-4 p-4 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition">


                                    {{-- NOMOR --}}

                                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-blue-600 text-white font-bold">

                                        {{ $no + 1 }}

                                    </div>


                                    {{-- DATA ARSIP --}}

                                    <div class="flex-1 min-w-0">

                                        <p class="font-semibold text-gray-800 truncate">

                                            {{ $archive->archive_name }}

                                        </p>


                                        <div class="flex flex-wrap gap-3 mt-1 text-sm text-gray-500">

                                            <span>

                                                Kode:

                                                {{ $archive->archive_code ?: '-' }}

                                            </span>


                                            <span>

                                                Klasifikasi:

                                                {{ $archive->kode_klasifikasi ?: '-' }}

                                            </span>


                                            <span>

                                                Pengaju:

                                                {{ $archive->submiter_name ?: '-' }}

                                            </span>

                                        </div>

                                    </div>


                                    {{-- PANAH --}}

                                    <div class="w-9 h-9 flex-shrink-0 flex items-center justify-center rounded-lg bg-gray-100">

                                        <svg
                                            class="w-5 h-5 text-gray-500"
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

                                </a>

                            @endforeach

                        </div>


                    @else

                        {{-- TIDAK ADA ARSIP --}}

                        <div class="text-center py-12">

                            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">

                                <svg
                                    class="w-8 h-8 text-gray-400"
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


                            @if (request('kode_klasifikasi'))

                                <p class="font-medium text-gray-500">

                                    Belum ada arsip dengan klasifikasi
                                    <strong>
                                        {{ request('kode_klasifikasi') }}
                                    </strong>

                                </p>

                            @else

                                <p class="font-medium text-gray-500">
                                    Belum ada arsip digital
                                </p>

                            @endif

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         CSS
    ========================================================== --}}

    <style>

        /* =====================================================
           WRAPPER TAB
        ===================================================== */

        .klasifikasi-wrapper {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            align-items: flex-start;

        }


        /* =====================================================
           TAB
        ===================================================== */

        .klasifikasi-tab {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-height: 44px;

            padding: 10px 16px;

            border: 1px solid #e5e7eb;

            border-radius: 8px;

            background: #f3f4f6;

            color: #1f2937;

            font-size: 14px;

            font-weight: 600;

            text-decoration: none;

            cursor: pointer;

            transition:
                background-color 0.2s ease,
                color 0.2s ease,
                border-color 0.2s ease;

        }


        .klasifikasi-tab:hover {

            background: #e5e7eb;

            border-color: #d1d5db;

        }


        .klasifikasi-tab.active {

            background: #2563eb;

            color: white;

            border-color: #2563eb;

        }


        .dropdown-icon {

            width: 16px;

            height: 16px;

            flex-shrink: 0;

        }


        /* =====================================================
           DROPDOWN CONTAINER
        ===================================================== */

        .klasifikasi-dropdown {

            position: relative;

            display: inline-block;

        }


        /* =====================================================
           DROPDOWN MENU
        ===================================================== */

        .klasifikasi-menu {

            display: none;

            position: absolute;

            top: calc(100% + 6px);

            left: 0;

            min-width: 340px;

            max-width: 520px;

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 10px;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.12);

            z-index: 9999;

            overflow: hidden;

        }


        /* Tampilkan dropdown saat hover */

        .klasifikasi-dropdown:hover .klasifikasi-menu {

            display: block;

        }


        /* =====================================================
           ITEM DROPDOWN
        ===================================================== */

        .klasifikasi-item {

            display: block;

            padding: 12px 15px;

            color: #374151;

            text-decoration: none;

            font-size: 14px;

            line-height: 1.5;

            border-bottom: 1px solid #f0f0f0;

            background: white;

            transition:
                background-color 0.2s ease,
                color 0.2s ease;

        }


        .klasifikasi-item:last-child {

            border-bottom: none;

        }


        .klasifikasi-item:hover {

            background: #eff6ff;

            color: #2563eb;

        }


        .klasifikasi-item.selected {

            background: #dbeafe;

            color: #1d4ed8;

        }


        /* =====================================================
           KODE KLASIFIKASI
        ===================================================== */

        .kode-klasifikasi {

            font-weight: 700;

            margin-right: 4px;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .klasifikasi-wrapper {

                display: grid;

                grid-template-columns: 1fr;

            }


            .klasifikasi-dropdown {

                width: 100%;

            }


            .klasifikasi-dropdown .klasifikasi-tab {

                width: 100%;

                justify-content: space-between;

            }


            .klasifikasi-menu {

                position: static;

                width: 100%;

                max-width: none;

                margin-top: 5px;

            }


            .klasifikasi-dropdown:hover .klasifikasi-menu {

                display: block;

            }

        }

    </style>

</x-app-layout>
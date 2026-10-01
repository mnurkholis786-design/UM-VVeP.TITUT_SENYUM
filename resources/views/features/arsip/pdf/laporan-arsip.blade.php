<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Laporan Arsip</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 20px 15px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 8px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header h1 {
            font-size: 16px;
            margin: 0 0 8px 0;
        }

        .header p {
            margin: 3px 0;
            font-size: 10px;
        }

        .header .unit {
            font-weight: bold;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        th {
            text-align: center;
            font-weight: bold;
            background-color: #f2f2f2;
        }

        td {
            font-size: 8px;
        }

        .archive-header td {
            vertical-align: middle;
            font-weight: bold;
        }

        .item-row td {
            vertical-align: top;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .empty {
            text-align: center;
            font-style: italic;
        }

        /* Lebar kolom */

        .col-no {
            width: 5%;
        }

        .col-kode {
            width: 18%;
        }

        .col-nama {
            width: 27%;
        }

        .col-total {
            width: 10%;
        }

        .col-no-item {
            width: 10%;
        }

        .col-uraian {
            width: 25%;
        }

        .col-tanggal-item {
            width: 10%;
        }

        .col-keterangan {
            width: 12%;
        }

        .col-lokasi {
            width: 12%;
        }
    </style>
</head>

<body>

    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="header">

        <h1>Laporan</h1>

        <p class="unit">
            UNIT PENGOLAH: TVRI STASIUN KALIMANTAN SELATAN
        </p>

        <p>
            PERIODE:
            {{ $periodeMulai }}
            -
            {{ $periodeSelesai }}
        </p>

    </div>


    {{-- =========================================================
         TABEL
    ========================================================== --}}

    <table>

        <thead>

            <tr>

                <th class="col-no">
                    NO
                </th>

                <th class="col-kode">
                    KODE KLASIFIKASI /
                    <br>
                    NOMOR BERKAS
                </th>

                <th class="col-nama">
                    NAMA BERKAS
                </th>

                <th class="col-total">
                    TOTAL
                    <br>
                    ITEM
                </th>

                <th class="col-no-item">
                    NO ITEM
                    <br>
                    ARSIP
                </th>

                <th class="col-uraian">
                    URAIAN INFORMASI ARSIP
                </th>

                <th class="col-tanggal-item">
                    TANGGAL
                    <br>
                    ITEM
                </th>

                <th class="col-keterangan">
                    KETERANGAN
                </th>

                <th class="col-lokasi">
                    LOKASI SERVER
                </th>

            </tr>

        </thead>


        <tbody>

            @php

                /*
                |--------------------------------------------------------------------------
                | URUTAN KLASIFIKASI
                |--------------------------------------------------------------------------
                */

                $klasifikasiUrutan = [
                    'AEC' => 'Kerja Sama',
                    'BAH' => 'Pelayanan Publik Lainnya',
                    'CBR' => 'Dukungan Teknis',
                    'CBT' => 'Prasarana Bidang Teknologi Informasi dan Komunikasi',
                    'CDS OP' => 'Prasarana Bidang Teknologi Informasi dan Komunikasi',
                    'EBA' => 'Layanan Dukungan Manajemen Internal',
                    'WA' => 'Program Dukungan Manajemen',
                ];

                /*
                |--------------------------------------------------------------------------
                | SUB KATEGORI PER KLASIFIKASI
                |--------------------------------------------------------------------------
                |
                | Mapping ini HARUS sama persis dengan $categoryChildren di
                | YearController@show, karena field yang benar-benar diisi
                | otomatis pada setiap arsip adalah "kategori" (mis. CBR.001,
                | CBT.002, CDS.001), BUKAN "kode_klasifikasi" (field teks
                | bebas yang sering kosong).
                |--------------------------------------------------------------------------
                */

                $subKategoriPerKlasifikasi = [

                    'AEC' => [
                        'AEC.001',
                    ],

                    'BAH' => [
                        'BAH.001',
                        'BAH.002',
                        'BAH.003',
                    ],

                    'CBR' => [
                        'CBR.001',
                    ],

                    'CBT' => [
                        'CBT.002',
                    ],

                    'CDS OP' => [
                        'CDS.001',
                        'CDS.002',
                        'CDS.003',
                    ],

                    'EBA' => [
                        'EBA.994',
                    ],

                    'WA' => [
                        'WA.4376',
                    ],

                ];

                /*
                |--------------------------------------------------------------------------
                | NOMOR BERKAS
                |--------------------------------------------------------------------------
                |
                | Sekarang penomoran berjalan per KLASIFIKASI, bukan per arsip.
                |--------------------------------------------------------------------------
                */

                $nomorBerkas = 1;

            @endphp


            {{-- =================================================
                 LOOP KLASIFIKASI
            ================================================== --}}

            @foreach ($klasifikasiUrutan as $kodeKlasifikasi => $namaKlasifikasi)

                @php

                    /*
                    |--------------------------------------------------------------------------
                    | AMBIL DATA BERDASARKAN KATEGORI (bukan kode_klasifikasi)
                    |--------------------------------------------------------------------------
                    */

                    $subKategoriList =
                        array_map(
                            'strtoupper',
                            $subKategoriPerKlasifikasi[$kodeKlasifikasi] ?? []
                        );

                    $dataKlasifikasi = $archives->filter(function ($archive) use ($subKategoriList) {

                        return in_array(
                            strtoupper(trim($archive->kategori ?? '')),
                            $subKategoriList
                        );

                    })->values();

                    $totalItem = $dataKlasifikasi->count();

                @endphp


                {{-- =================================================
                     BARIS HEADER KLASIFIKASI
                     (NO, KODE, NAMA BERKAS = nama klasifikasi, TOTAL ITEM
                     di baris ini saja; kolom item dikosongkan. Tidak ada
                     lagi baris abu-abu terpisah untuk nama klasifikasi.)
                ================================================== --}}

                <tr class="archive-header">

                    {{-- NO --}}
                    <td class="center">
                        {{ $nomorBerkas }}
                    </td>

                    {{-- KODE KLASIFIKASI --}}
                    <td class="center">
                        {{ $kodeKlasifikasi }}
                    </td>

                    {{-- NAMA BERKAS (= nama klasifikasi) --}}
                    <td class="left">
                        {{ $namaKlasifikasi }}
                    </td>

                    {{-- TOTAL ITEM --}}
                    <td class="center">
                        {{ $totalItem }}
                    </td>

                    {{-- NO ITEM ARSIP (kosong) --}}
                    <td class="center">&nbsp;</td>

                    {{-- URAIAN (kosong) --}}
                    <td class="left">&nbsp;</td>

                    {{-- TANGGAL ITEM (kosong) --}}
                    <td class="center">&nbsp;</td>

                    {{-- KETERANGAN (kosong) --}}
                    <td class="left">&nbsp;</td>

                    {{-- LOKASI SERVER (kosong) --}}
                    <td class="left">&nbsp;</td>

                </tr>


                {{-- =================================================
                     BARIS-BARIS ITEM
                     Satu baris per ARSIP di klasifikasi ini.
                     URAIAN INFORMASI ARSIP diisi dari field "uraian" arsip.
                ================================================== --}}

                @if ($totalItem > 0)

                    @foreach ($dataKlasifikasi as $index => $archive)

                        @php

                            $uraianArsip =
                                $archive->uraian
                                ?? '-';

                            if (
                                trim((string) $uraianArsip) === ''
                            ) {

                                $uraianArsip = '-';

                            }

                            $tanggalItem = '-';

                            if ($archive->created_at) {

                                $tanggalItem =
                                    \Carbon\Carbon::parse(
                                        $archive->created_at
                                    )->format('d-m-Y');

                            }

                            $keterangan =
                                $archive->keterangan
                                ?? '-';

                            $lokasiServer =
                                $archive->lokasi_simpan_server
                                ?? '-';

                        @endphp

                        <tr class="item-row">

                            {{-- NO (kosong) --}}
                            <td class="center">&nbsp;</td>

                            {{-- KODE (kosong) --}}
                            <td class="center">&nbsp;</td>

                            {{-- NAMA BERKAS (kosong) --}}
                            <td class="left">&nbsp;</td>

                            {{-- TOTAL ITEM (kosong) --}}
                            <td class="center">&nbsp;</td>

                            {{-- NO ITEM --}}
                            <td class="center">
                                {{ $index + 1 }}
                            </td>

                            {{-- URAIAN = isi field uraian --}}
                            <td class="left">
                                {{ $uraianArsip }}
                            </td>

                            {{-- TANGGAL ITEM = tanggal buat berkas --}}
                            <td class="center">
                                {{ $tanggalItem }}
                            </td>

                            {{-- KETERANGAN --}}
                            <td class="left">
                                {{ $keterangan }}
                            </td>

                            {{-- LOKASI SERVER --}}
                            <td class="left">
                                {{ $lokasiServer }}
                            </td>

                        </tr>

                    @endforeach

                @else

                    {{-- =================================================
                         BELUM ADA DATA
                    ================================================== --}}

                    <tr>

                        <td
                            colspan="9"
                            class="empty"
                        >
                            Belum ada data arsip
                        </td>

                    </tr>

                @endif


                @php
                    $nomorBerkas++;
                @endphp


            @endforeach

        </tbody>

    </table>

</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Arsip</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 15px 10px;
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
            padding: 4px 2px;
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

        /* Lebar Kolom Dioptimalkan */
        .col-no { width: 3%; }
        .col-kode { width: 9%; }
        .col-nama { width: 17%; }
        .col-total { width: 5%; }
        .col-no-item { width: 5%; }
        .col-uraian { width: 15%; }
        .col-tanggal-item { width: 8%; }
        .col-jumlah { width: 7.5%; }
        
        /* Kolom Retensi Diperlebar Agar Teks INAKTIF Tidak Terpotong */
        .col-retensi { 
            width: 8.5%; 
            white-space: nowrap; 
            font-size: 7.5px;
        }
        
        .col-keterangan { width: 8%; }
        .col-lokasi { width: 8.5%; }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <h1>Laporan</h1>
        <p class="unit">Daftar Arsip Uang Pertanggung Jawaban Bendahara</p>
        <p>PERIODE: {{ $periodeMulai }} - {{ $periodeSelesai }}</p>
    </div>

    {{-- TABEL --}}
    <table>
        <thead>
            <tr>
                <th rowspan="2" class="col-no">NO</th>
                <th rowspan="2" class="col-kode">KODE KLASIFIKASI /<br>NOMOR BERKAS</th>
                <th rowspan="2" class="col-nama">NAMA BERKAS</th>
                <th rowspan="2" class="col-total">TOTAL<br>ITEM</th>
                <th rowspan="2" class="col-no-item">NO ITEM<br>ARSIP</th>
                <th rowspan="2" class="col-uraian">URAIAN INFORMASI ARSIP</th>
                <th rowspan="2" class="col-tanggal-item">TANGGAL<br>ITEM</th>
                <th rowspan="2" class="col-jumlah">JUMLAH</th>
                <th colspan="2">RETENSI ARSIP</th>
                <th rowspan="2" class="col-keterangan">KETERANGAN</th>
                <th rowspan="2" class="col-lokasi">LOKASI SERVER</th>
            </tr>
            <tr>
                <th class="col-retensi">AKTIF</th>
                <th class="col-retensi">INAKTIF</th>
            </tr>
        </thead>

        <tbody>
            @php
                $kodeKlasifikasiDefault = 'KU.02.03';

                $klasifikasiUrutan = [
                    'AEC' => 'AEC - Kerja Sama',
                    'BAH' => 'BAH - Pelayanan Publik Lainnya',
                    'CBR' => 'CBR - Dukungan Teknis',
                    'CBT' => 'CBT - Prasarana Bidang Teknologi Informasi dan Komunikasi',
                    'CDS OP' => 'CDS OP - Prasarana Bidang Teknologi Informasi dan Komunikasi',
                    'EBA' => 'EBA - Layanan Dukungan Manajemen Internal',
                    'WA' => 'WA - Program Dukungan Manajemen',
                ];

                $subKategoriPerKlasifikasi = [
                    'AEC' => ['AEC.001'],
                    'BAH' => ['BAH.001', 'BAH.002', 'BAH.003'],
                    'CBR' => ['CBR.001'],
                    'CBT' => ['CBT.002'],
                    'CDS OP' => ['CDS.001', 'CDS.002', 'CDS.003'],
                    'EBA' => ['EBA.994'],
                    'WA' => ['WA.4376'],
                ];

                $nomorBerkas = 1;
            @endphp

            @foreach ($klasifikasiUrutan as $keyKlasifikasi => $namaKlasifikasi)
                @php
                    $subKategoriList = array_map(
                        'strtoupper',
                        $subKategoriPerKlasifikasi[$keyKlasifikasi] ?? []
                    );

                    $dataKlasifikasi = $archives->filter(function ($archive) use ($subKategoriList) {
                        return in_array(
                            strtoupper(trim($archive->kategori ?? '')),
                            $subKategoriList
                        );
                    })->values();

                    $totalItem = $dataKlasifikasi->count();
                @endphp

                {{-- BARIS HEADER KLASIFIKASI --}}
                <tr class="archive-header">
                    <td class="center">{{ $nomorBerkas }}</td>
                    <td class="center">{{ $kodeKlasifikasiDefault }}</td>
                    <td class="left">{{ $namaKlasifikasi }}</td>
                    <td class="center">{{ $totalItem }}</td>
                    <td class="center">&nbsp;</td>
                    <td class="left">&nbsp;</td>
                    <td class="center">&nbsp;</td>
                    <td class="center">&nbsp;</td>
                    <td class="center">&nbsp;</td>
                    <td class="center">&nbsp;</td>
                    <td class="left">&nbsp;</td>
                    <td class="left">Server Arsip Keuangan</td>
                </tr>

                {{-- BARIS ITEM ARSIP --}}
                @if ($totalItem > 0)
                    @foreach ($dataKlasifikasi as $index => $archive)
                        @php
                            $uraianArsip = $archive->uraian ?? '-';
                            if (trim((string) $uraianArsip) === '') {
                                $uraianArsip = '-';
                            }

                            $tanggalItem = '-';
                            if ($archive->created_at) {
                                $tanggalItem = \Carbon\Carbon::parse($archive->created_at)->format('d-m-Y');
                            }

                            $keterangan = $archive->keterangan ?? '-';

                            /*
                            |--------------------------------------------------------------------------
                            | MENGHITUNG HALAMAN PDF
                            |--------------------------------------------------------------------------
                            */
                            $totalHalaman = 0;
                            $rawFiles = $archive->file_path_archive;
                            if (is_string($rawFiles)) {
                                $decoded = json_decode($rawFiles, true);
                                $files = is_array($decoded) ? $decoded : [$rawFiles];
                            } elseif (is_array($rawFiles)) {
                                $files = $rawFiles;
                            } else {
                                $files = [];
                            }

                            foreach ($files as $filePath) {
                                if (empty($filePath)) continue;

                                $possiblePaths = [
                                    storage_path('app/private/' . $filePath),
                                    storage_path('app/public/' . $filePath),
                                    storage_path('app/' . $filePath),
                                    public_path('storage/' . $filePath),
                                    public_path($filePath),
                                ];

                                $fullPath = null;
                                foreach ($possiblePaths as $path) {
                                    if (file_exists($path) && is_file($path)) {
                                        $fullPath = $path;
                                        break;
                                    }
                                }

                                if ($fullPath) {
                                    $content = @file_get_contents($fullPath);
                                    if ($content) {
                                        if (preg_match_all("/\/Count\s+(\d+)/", $content, $matches)) {
                                            $totalHalaman += (int) max($matches[1]);
                                        } else {
                                            $pageCount = preg_match_all("/\/Type\s*\/Page\b/", $content, $dummy);
                                            $totalHalaman += $pageCount > 0 ? $pageCount : 1;
                                        }
                                    }
                                }
                            }

                            if ($totalHalaman > 0) {
                                $jumlahFile = $totalHalaman . ' Lembar';
                            } elseif (!empty($archive->jumlah_halaman) && trim((string)$archive->jumlah_halaman) !== '-' && trim((string)$archive->jumlah_halaman) !== '') {
                                $jumlahFile = is_numeric($archive->jumlah_halaman) ? $archive->jumlah_halaman . ' Lembar' : $archive->jumlah_halaman;
                            } else {
                                $jumlahFile = '-';
                            }

                            /*
                            |--------------------------------------------------------------------------
                            | RETENSI ARSIP (AKTIF & INAKTIF)
                            |--------------------------------------------------------------------------
                            */
                            // Retensi Aktif
                            $rawAktif = trim((string)($archive->retensi_arsip_aktif ?? ''));
                            if (!empty($rawAktif) && $rawAktif !== '-') {
                                if (is_numeric($rawAktif)) {
                                    $val = (int)$rawAktif;
                                    if ($val > 1900) {
                                        $durasi = abs($val - 2000);
                                        $retensiAktif = ($durasi > 0 ? $durasi : 1) . ' Tahun';
                                    } else {
                                        $retensiAktif = $val . ' Tahun';
                                    }
                                } else {
                                    $retensiAktif = str_ireplace('Tahun', '', $rawAktif) . ' Tahun';
                                }
                            } else {
                                $retensiAktif = '-';
                            }

                            // Retensi Inaktif
                            $rawInaktif = trim((string)($archive->retensi_arsip_inaktif ?? ''));
                            if (!empty($rawInaktif) && $rawInaktif !== '-') {
                                if (is_numeric($rawInaktif)) {
                                    $val = (int)$rawInaktif;
                                    if ($val > 1900) {
                                        $durasi = abs($val - 2000);
                                        $retensiInaktif = ($durasi > 0 ? $durasi : 1) . ' Tahun';
                                    } else {
                                        $retensiInaktif = $val . ' Tahun';
                                    }
                                } else {
                                    $retensiInaktif = str_ireplace('Tahun', '', $rawInaktif) . ' Tahun';
                                }
                            } else {
                                $retensiInaktif = '-';
                            }
                        @endphp

                        <tr class="item-row">
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="left">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">{{ $index + 1 }}</td>
                            <td class="left">{{ $uraianArsip }}</td>
                            <td class="center">{{ $tanggalItem }}</td>
                            
                            {{-- KOLOM JUMLAH DAN RETENSI ARSIP --}}
                            <td class="center">{{ $jumlahFile }}</td>
                            <td class="center col-retensi">{{ $retensiAktif }}</td>
                            <td class="center col-retensi">{{ $retensiInaktif }}</td>
                            <td class="left">{{ $keterangan }}</td>
                            <td class="left">&nbsp;</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12" class="empty">Belum ada data arsip</td>
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
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
            margin-bottom: 12px;
        }

        .header h1 {
            font-size: 16px;
            margin: 0 0 4px 0;
            text-transform: uppercase;
        }

        .header p {
            margin: 3px 0;
            font-size: 10px;
        }

        .header .unit {
            font-weight: bold;
            font-size: 11px;
        }

        .header .periode {
            font-weight: bold;
            font-size: 10px;
            margin-top: 4px;
        }


        
        .sub-kategori-container {
            width: 100%;
            margin-bottom: 5px;
            text-align: left;
            font-size: 10px;
            font-weight: bold;
        }

        table.main-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table.main-table th,
        table.main-table td {
            border: 1px solid #000;
            padding: 4px 2px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        table.main-table th {
            text-align: center;
            font-weight: bold;
        }

        table.main-table td {
            font-size: 8px;
        }

        .archive-header td {
            vertical-align: middle;
            font-weight: bold;
        }

        .item-row td {
            vertical-align: top;
        }

        .center { text-align: center; }
        .left { text-align: left; }
        .empty { text-align: center; font-style: italic; }

        .col-no { width: 3%; }
        .col-kode { width: 9%; }
        .col-nama { width: 17%; }
        .col-total { width: 5%; }
        .col-no-item { width: 5%; }
        .col-uraian { width: 15%; }
        .col-tanggal-item { width: 8%; }
        .col-jumlah { width: 7.5%; }
        
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

    <div class="header">
        <h1>{{ $judulLaporan ?? 'LAPORAN UP BENDAHARA' }}</h1>
        <p class="unit">Daftar Arsip Uang Pertanggung Jawaban Bendahara</p>
        <p class="periode">PERIODE: {{ $periodeMulai }} - {{ $periodeSelesai }}</p>
    </div>

     @php
        $displaySubKategori = null;

        // 1. Ambil dari variabel controller
        if (!empty($subKategoriNama) && $subKategoriNama !== '-') {
            $displaySubKategori = $subKategoriNama;
        }

        // 2. Ambil dari properti sub_category pada data kategori terpilih
        if (!$displaySubKategori && !empty($category->sub_category)) {
            $displaySubKategori = $category->sub_category;
        }

        // 3. Jika masih kosong, cari dari relasi folder di koleksi archives
        if (!$displaySubKategori && isset($archives) && $archives->count() > 0) {
            foreach ($archives as $arc) {
                if (!empty($arc->folder)) {
                    $displaySubKategori = $arc->folder->name ?? $arc->folder->folder_name ?? $arc->folder->nama_folder ?? null;
                    if ($displaySubKategori) break;
                } elseif (!empty($arc->folder_id)) {
                    $f = \App\Models\DocumentFolder::find($arc->folder_id);
                    if ($f) {
                        $displaySubKategori = $f->name ?? $f->folder_name ?? $f->nama_folder ?? null;
                        if ($displaySubKategori) break;
                    }
                }
            }
        }

        // 4. Fallback ke category name jika memang tidak memiliki sub kategori
        if (!$displaySubKategori && isset($category)) {
            $displaySubKategori = $category->category_name ?? $category->name ?? '-';
        }
    @endphp

    {{-- Menampilkan Sub Kategori secara dinamis --}}
    <div class="sub-kategori-container">
        Sub Kategori: {{ $displaySubKategori ?? '-' }}
    </div>

    <table class="main-table">
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
                    $subKategoriList = array_map('strtoupper', $subKategoriPerKlasifikasi[$keyKlasifikasi] ?? []);

                    $dataKlasifikasi = $archives->filter(function ($archive) use ($subKategoriList, $keyKlasifikasi) {
                        $kat = strtoupper(trim($archive->kategori ?? ''));
                        if (empty($kat)) return false;

                        foreach ($subKategoriList as $subKat) {
                            if ($kat === $subKat || \Illuminate\Support\Str::startsWith($kat, $subKat) || \Illuminate\Support\Str::startsWith($kat, $keyKlasifikasi)) {
                                return true;
                            }
                        }
                        return false;
                    })->values();

                    $totalItem = $dataKlasifikasi->count();
                @endphp

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

                @if ($totalItem > 0)
                    @foreach ($dataKlasifikasi as $index => $archive)
                        @php
                            $uraianArsip = !empty(trim((string)($archive->uraian ?? ''))) ? $archive->uraian : '-';

                            $tanggalItem = '-';
                            if ($archive->created_at) {
                                $tanggalItem = \Carbon\Carbon::parse($archive->created_at)->format('d-m-Y');
                            }

                            $keterangan = !empty(trim((string)($archive->keterangan ?? ''))) ? $archive->keterangan : '-';

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

                            $rawAktif = trim((string)($archive->retensi_arsip_aktif ?? ''));
                            if (!empty($rawAktif) && $rawAktif !== '-') {
                                if (is_numeric($rawAktif)) {
                                    $val = (int)$rawAktif;
                                    $retensiAktif = ($val > 1900 ? max(abs($val - 2000), 1) : $val) . ' Tahun';
                                } else {
                                    $retensiAktif = str_ireplace('Tahun', '', $rawAktif) . ' Tahun';
                                }
                            } else {
                                $retensiAktif = '-';
                            }

                            $rawInaktif = trim((string)($archive->retensi_arsip_inaktif ?? ''));
                            if (!empty($rawInaktif) && $rawInaktif !== '-') {
                                if (is_numeric($rawInaktif)) {
                                    $val = (int)$rawInaktif;
                                    $retensiInaktif = ($val > 1900 ? max(abs($val - 2000), 1) : $val) . ' Tahun';
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
                            <td class="center">{{ $jumlahFile }}</td>
                            <td class="center col-retensi">{{ $retensiAktif }}</td>
                            <td class="center col-retensi">{{ $retensiInaktif }}</td>
                            <td class="left">{{ $keterangan }}</td>
                            <td class="left">&nbsp;</td>
                        </tr>
                    @endforeach
                @endif

                @php
                    $nomorBerkas++;
                @endphp
            @endforeach
        </tbody>
    </table>

</body>
</html>
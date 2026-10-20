<?php

namespace App\Services;

use App\Models\ArchiveFile;
use App\Models\Category;
use App\Models\DocumentFolder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

class ArsipImportService
{
    /**
     * Membaca file Excel dan mengimpor setiap baris menjadi 1 record ArchiveFile secara adaptif.
     */
    public function importFromExcel(string $filePath, Category $baseCategory, string $tahun): int
    {
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        if (empty($rows)) {
            return 0;
        }

        // 1. Deteksi Baris Header Kolom
        $headerRowIndex = null;
        $columnMap = [];

         foreach ($rows as $rowIndex => $row) {
            $rowString = strtolower(implode(' ', array_filter($row)));
            if (str_contains($rowString, 'uraian') || str_contains($rowString, 'perihal') || str_contains($rowString, 'kode') || str_contains($rowString, 'item')) {
                $headerRowIndex = $rowIndex;
                $nextRow = $rows[$rowIndex + 1] ?? [];

                // Gabungkan baris 8 dan baris 9 (sub-header seperti Aktif, Inaktif, Rak, Folder)
                $mergedHeaders = [];
                foreach ($row as $colLetter => $cellVal) {
                    $subVal = $nextRow[$colLetter] ?? '';
                    $mergedHeaders[$colLetter] = strtolower(trim((string)$cellVal . ' ' . (string)$subVal));
                }

                foreach ($mergedHeaders as $colLetter => $header) {
                    if (empty(trim($header))) continue;

                    // 1. Klasifikasi Keamanan vs Kode Klasifikasi
                    if (str_contains($header, 'keamanan')) {
                        $columnMap['klasifikasi_keamanan'] = $colLetter;
                    } elseif (str_contains($header, 'kode') || (str_contains($header, 'klasifikasi') && !str_contains($header, 'keamanan'))) {
                        $columnMap['kode_klasifikasi'] = $colLetter;
                    }

                    // 2. Indeks
                    if (str_contains($header, 'indeks 1') || str_contains($header, 'indeks1')) $columnMap['indeks1'] = $colLetter;
                    elseif (str_contains($header, 'indeks 2') || str_contains($header, 'indeks2')) $columnMap['indeks2'] = $colLetter;

                    // 3. No Item
                    if (str_contains($header, 'item')) {
                        $columnMap['no_item'] = $colLetter;
                    } elseif ($header === 'no' || $header === 'nomor') {
                        if (!isset($columnMap['no_item'])) $columnMap['no_item'] = $colLetter;
                    }

                    // 4. Uraian
                    if (str_contains($header, 'uraian') || str_contains($header, 'perihal') || str_contains($header, 'deskripsi') || str_contains($header, 'tentang')) {
                        $columnMap['uraian'] = $colLetter;
                    }

                    // 5. SPM & Invoice (Dahulukan Jenis SPM agar tidak tertukar dengan No SPM)
                    if (str_contains($header, 'jenis spm')) {
                        $columnMap['jenis_spm'] = $colLetter;
                    } elseif (str_contains($header, 'jenis sp2d')) {
                        $columnMap['jenis_sp2d'] = $colLetter;
                    } elseif (str_contains($header, 'no spm') || str_contains($header, 'nomor spm') || str_contains($header, 'no surat') || str_contains($header, 'invoice') || str_contains($header, 'invoce')) {
                        $columnMap['no_invoice'] = $colLetter;
                    }

                    // 6. SP2D (Nilai, Tanggal Selesai, Tanggal SP2D, dan Nomor SP2D)
                    if (str_contains($header, 'nilai') || str_contains($header, 'nominal') || str_contains($header, 'rupiah') || str_contains($header, 'biaya')) {
                        $columnMap['nilai_sp2d'] = $colLetter;
                    } elseif (str_contains($header, 'tanggal selesai') || str_contains($header, 'tgl selesai')) {
                        $columnMap['tgl_selesai_sp2d'] = $colLetter;
                    } elseif (str_contains($header, 'tgl sp2d') || str_contains($header, 'tanggal sp2d')) {
                        $columnMap['tgl_sp2d'] = $colLetter;
                    } elseif (str_contains($header, 'sp2d') && !str_contains($header, 'jenis') && !str_contains($header, 'nilai') && !str_contains($header, 'tgl') && !str_contains($header, 'tanggal')) {
                        $columnMap['no_sp2d'] = $colLetter;
                    }

                    // 7. Kolom Pelengkap Lainnya
                    if (str_contains($header, 'tgl terima') || str_contains($header, 'tanggal terima') || str_contains($header, 'kurun waktu')) $columnMap['tgl_terima'] = $colLetter;
                    if (str_contains($header, 'tingkat perkembangan') || str_contains($header, 'perkembangan')) $columnMap['tingkat_pertimbangan'] = $colLetter;
                    if (str_contains($header, 'jumlah') || str_contains($header, 'lembar')) $columnMap['jumlah_halaman'] = $colLetter;
                    if (str_contains($header, 'aktif') && !str_contains($header, 'inaktif')) $columnMap['retensi_arsip_aktif'] = $colLetter;
                    if (str_contains($header, 'inaktif')) $columnMap['retensi_arsip_inaktif'] = $colLetter;
                    if (str_contains($header, 'nasib akhir')) $columnMap['nasib_akhir_arsip'] = $colLetter;
                    if (str_contains($header, 'rak') || str_contains($header, 'box') || str_contains($header, 'boks')) $columnMap['rak'] = $colLetter;
                    if (str_contains($header, 'folder') && !str_contains($header, 'link')) $columnMap['folder'] = $colLetter;
                    if (str_contains($header, 'link') || str_contains($header, 'drive') || str_contains($header, 'url')) $columnMap['link_arsip'] = $colLetter;
                    if (str_contains($header, 'keterangan') || str_contains($header, 'catatan')) $columnMap['keterangan'] = $colLetter;
                }
                break;
            }
        }

        if (!$headerRowIndex) {
            $headerRowIndex = 8;
        }

        // Variabel penampung carry-forward (auto-fill jika sel di-merge/kosong)
        $lastKodeKlasifikasi = 'KU.02.03';
        $lastIndeks1 = 'Dokumen Keuangan';
        $lastIndeks2 = 'Berkas ' . $tahun;
        $lastRak = '1';
        $lastFolder = '1';

        // Cache category untuk sub kategori berbeda agar hemat query
        $categoryCache = [];

        // Simpan path relatif bersih untuk kolom excel_path
        $relativeExcelPath = 'arsip_fisik/' . $tahun . '/' . basename($filePath);

        $importedCount = 0;

        // 2. Looping baris data
        for ($i = $headerRowIndex + 1; $i <= count($rows); $i++) {
            $row = $rows[$i] ?? [];
            if (empty(array_filter($row))) continue;

             $uraianRaw = trim((string)($row[$columnMap['uraian'] ?? ''] ?? ''));
            $keteranganRaw = trim((string)($row[$columnMap['keterangan'] ?? ''] ?? ''));

            if (empty($uraianRaw) || strlen($uraianRaw) < 3) {
                continue;
            }

            // Lewati baris catatan penutup / footer (misal: "TAHUN 2025" atau ada tulisan "CATATAN:")
            if (
                preg_match('/^TAHUN\s*\d{4}$/i', $uraianRaw) ||
                str_contains(strtoupper($keteranganRaw), 'CATATAN:') ||
                str_contains(strtoupper($uraianRaw), 'CATATAN:')
            ) {
                continue;
            }

            // Auto-Inherit Indeks & Kode Klasifikasi
            if (isset($columnMap['kode_klasifikasi']) && !empty(trim((string)$row[$columnMap['kode_klasifikasi']]))) {
                $lastKodeKlasifikasi = trim((string)$row[$columnMap['kode_klasifikasi']]);
            }
            if (isset($columnMap['indeks1']) && !empty(trim((string)$row[$columnMap['indeks1']]))) {
                $lastIndeks1 = trim((string)$row[$columnMap['indeks1']]);
            }
            if (isset($columnMap['indeks2']) && !empty(trim((string)$row[$columnMap['indeks2']]))) {
                $lastIndeks2 = trim((string)$row[$columnMap['indeks2']]);
            }

            // Auto-Inherit Rak & Folder
            if (isset($columnMap['rak']) && !empty(trim((string)$row[$columnMap['rak']]))) {
                $lastRak = trim((string)$row[$columnMap['rak']]);
            }
            if (isset($columnMap['folder']) && !empty(trim((string)$row[$columnMap['folder']]))) {
                $lastFolder = trim((string)$row[$columnMap['folder']]);
            }

            // 3. LOGIKA ADAPTIF SUB KATEGORI
            $combinedText = strtoupper($uraianRaw . ' ' . $keteranganRaw);
            $jenisSpmVal = isset($columnMap['jenis_spm']) ? strtoupper(trim((string)($row[$columnMap['jenis_spm']] ?? ''))) : '';
            $targetSubCategory = null;

            if ($baseCategory->category_name === 'LS SPM') {
                // === A. PEMILAHAN OTOMATIS UNTUK LS SPM (BERDASARKAN KOLOM JENIS SPM) ===
                $isPnbp = str_contains($combinedText, 'PNBP') || str_contains($jenisSpmVal, 'PNBP');

                if (str_contains($jenisSpmVal, 'GUP NIHIL') || str_contains($combinedText, 'GUP NIHIL')) {
                    $targetSubCategory = $isPnbp ? 'GUP Nihil PNBP' : 'GUP Nihil RM';
                } elseif (str_contains($jenisSpmVal, 'KKP') || str_contains($combinedText, 'KKP')) {
                    $targetSubCategory = 'KKP RM';
                } elseif (str_contains($jenisSpmVal, 'GUP')) {
                    $targetSubCategory = $isPnbp ? 'GUP PNBP' : 'GUP RM';
                } elseif (str_contains($jenisSpmVal, 'KONTRAK') || str_contains($combinedText, 'KONTRAK')) {
                    $targetSubCategory = $isPnbp ? 'Kontrak PNBP' : 'Kontrak RM';
                } elseif (str_contains($jenisSpmVal, 'NON GAJI') || str_contains($jenisSpmVal, 'NONGAJI') || str_contains($jenisSpmVal, 'GAJI')) {
                    $targetSubCategory = $isPnbp ? 'Non Kontrak PNBP' : 'Non Kontrak RM';
                } else {
                    $targetSubCategory = $baseCategory->sub_category ?: 'Non Kontrak RM';
                }
            } else {
                // === B. PEMILAHAN OTOMATIS UNTUK UP BENDAHARA (BERDASARKAN TEKS KUITANSI) ===
                if (str_contains($combinedText, 'TUP PNBP')) {
                    $targetSubCategory = 'TUP PNBP';
                } elseif (str_contains($combinedText, 'TUP RM') || str_contains($combinedText, '- TUP')) {
                    $targetSubCategory = 'TUP RM';
                } elseif (str_contains($combinedText, 'PNBP')) {
                    $targetSubCategory = 'UP Non Tunai PNBP';
                } elseif (str_contains($combinedText, 'KKP')) {
                    $targetSubCategory = 'KKP RM';
                } else {
                    $targetSubCategory = 'UP Non Tunai RM';
                }
            }

            // Dapatkan Category target untuk sub kategori ini di tahun bersangkutan
            if (!isset($categoryCache[$targetSubCategory])) {
                $targetCat = Category::where('category_name', $baseCategory->category_name)
                    ->where('sub_category', $targetSubCategory)
                    ->where('year', $tahun)
                    ->first();

                if (!$targetCat) {
                    $targetCat = Category::create([
                        'cabinet_id'    => $baseCategory->cabinet_id,
                        'category_name' => $baseCategory->category_name,
                        'sub_category'  => $targetSubCategory,
                        'year'          => $tahun,
                    ]);
                }
                $categoryCache[$targetSubCategory] = $targetCat;
            }

            $currentCategory = $categoryCache[$targetSubCategory];

            // 4. Buat / Cari DocumentFolder otomatis
            $docFolder = DocumentFolder::firstOrCreate([
                'category_id' => $currentCategory->id,
                'rack_name'   => 'Rak ' . $lastRak,
                'folder_name' => 'Folder ' . $lastFolder,
            ], [
                'description' => "Arsip Fisik Tahun $tahun",
            ]);

             // Ekstrak angka No Item
            $noItemRaw = isset($columnMap['no_item']) ? trim((string)($row[$columnMap['no_item']] ?? '')) : '';
            preg_match('/\d+/', $noItemRaw, $mItem);
            $noItemInt = !empty($mItem[0]) ? (int)$mItem[0] : null;

            // Fallback: Jika di kolom item tetap kosong, ekstrak nomor dari teks uraian (contoh: "Kuintansi No : 988...")
            if (empty($noItemInt)) {
                if (preg_match('/(?:Kuintansi|Kuitansi)\s*(?:No\.?|Nomor)?\s*[:\s]*(\d+)/i', $uraianRaw, $mKwt)) {
                    $noItemInt = (int)$mKwt[1];
                }
            }

            // Ekstrak angka Jumlah Halaman
            $jumlahRaw = isset($columnMap['jumlah_halaman']) ? trim((string)($row[$columnMap['jumlah_halaman']] ?? '')) : '';
            preg_match('/\d+/', $jumlahRaw, $mJml);
            $jumlahHalaman = !empty($mJml[0]) ? (int)$mJml[0] : null;

            // Ekstrak angka Retensi (Hanya angka agar tidak truncate)
            $retensiAktifRaw = isset($columnMap['retensi_arsip_aktif']) ? trim((string)($row[$columnMap['retensi_arsip_aktif']] ?? '2')) : '2';
            preg_match('/\d+/', $retensiAktifRaw, $mAktif);
            $retensiAktif = !empty($mAktif[0]) ? (int)$mAktif[0] : 2;

            $retensiInaktifRaw = isset($columnMap['retensi_arsip_inaktif']) ? trim((string)($row[$columnMap['retensi_arsip_inaktif']] ?? '3')) : '3';
            preg_match('/\d+/', $retensiInaktifRaw, $mInaktif);
            $retensiInaktif = !empty($mInaktif[0]) ? (int)$mInaktif[0] : 3;

            // Tangkap Link Google Drive
            $linkArsip = null;
            if (isset($columnMap['link_arsip']) && !empty($row[$columnMap['link_arsip']])) {
                $linkArsip = trim((string)$row[$columnMap['link_arsip']]);
            } else {
                foreach ($row as $val) {
                    if (str_contains((string)$val, 'drive.google.com') || str_starts_with((string)$val, 'http')) {
                        $linkArsip = trim((string)$val);
                        break;
                    }
                }
            }

            // Susun nama berkas ringkas
            $fileName = $this->extractFileName($uraianRaw, $noItemInt, $tahun);

            // 5. Simpan ke Database
            ArchiveFile::create([
                'folder_id'             => $docFolder->id,
                'file_name'             => mb_substr($fileName, 0, 250),
                'file_path'             => null,
                'excel_path'            => $relativeExcelPath,
                'kode_klasifikasi'     => $lastKodeKlasifikasi,
                'indeks1'               => $lastIndeks1,
                'indeks2'               => $lastIndeks2,
                'no_item'               => $noItemInt,
                'uraian'                => mb_substr($uraianRaw, 0, 255),
                'no_spby'               => null,
                'no_spm'                => isset($columnMap['no_invoice']) ? trim((string)($row[$columnMap['no_invoice']] ?? '')) : null,
                'jenis_spm'             => isset($columnMap['jenis_spm']) ? trim((string)($row[$columnMap['jenis_spm']] ?? '')) : null,
                'no_sp2d'              => isset($columnMap['no_sp2d']) ? trim((string)($row[$columnMap['no_sp2d']] ?? '')) : null,
                'nilai_sp2d'            => isset($columnMap['nilai_sp2d']) ? trim((string)($row[$columnMap['nilai_sp2d']] ?? '')) : null,
                'jenis_sp2d'            => isset($columnMap['jenis_sp2d']) ? trim((string)($row[$columnMap['jenis_sp2d']] ?? '')) : null,
                'tgl_sp2d'              => isset($columnMap['tgl_sp2d']) ? $this->parseFlexibleDate($row[$columnMap['tgl_sp2d']] ?? '') : null,
                'tgl_selesai_sp2d'      => isset($columnMap['tgl_selesai_sp2d']) ? $this->parseFlexibleDate($row[$columnMap['tgl_selesai_sp2d']] ?? '') : null,
                'no_invoice'            => isset($columnMap['no_invoice']) ? trim((string)($row[$columnMap['no_invoice']] ?? '')) : null,
                'tgl_invoice'           => null,
                'tgl_terima'            => isset($columnMap['tgl_terima']) ? $this->parseFlexibleDate($row[$columnMap['tgl_terima']] ?? '') : null,
                'tingkat_pertimbangan'  => trim((string)($row[$columnMap['tingkat_pertimbangan'] ?? ''] ?? 'Asli')),
                'jumlah_halaman'        => $jumlahHalaman,
                'retensi_arsip_aktif'   => $retensiAktif,
                'retensi_arsip_inaktif' => $retensiInaktif,
                'nasib_akhir_arsip'     => 'Musnah',
                'klasifikasi_keamanan'  => 'Terbatas',
                'status'                => 'Tersedia',
                'keterangan'            => !empty($keteranganRaw) ? mb_substr($keteranganRaw, 0, 255) : null,
                'link_arsip'            => $linkArsip,
            ]);

            $importedCount++;
        }

        return $importedCount;
    }

    private function extractFileName(string $uraian, ?int $noItem, string $tahun): string
    {
        if (preg_match('/(Kuintansi|Kuitansi|SP2D|SPM)\s*(No\.?|Nomor)?\s*[:\s]*([^\n,]+)/i', $uraian, $matches)) {
            return trim($matches[0]);
        }

        if (!empty($noItem)) {
            return "Berkas Item {$noItem} ({$tahun})";
        }

        return mb_substr($uraian, 0, 45) . '...';
    }

    private function parseFlexibleDate($rawDate): ?string
    {
        if (empty($rawDate)) return null;

        // Tangani jika format angka serial Excel bawaan
        if (is_numeric($rawDate) && $rawDate > 30000 && $rawDate < 60000) {
            try {
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((float)$rawDate)->format('Y-m-d');
            } catch (\Exception $e) {}
        }

        $str = trim((string)$rawDate, "' \t\n\r\0\x0B");

        // Ganti garis miring '/' menjadi '-' agar format seperti 16/Dec/2024 terbaca sebagai 16-Dec-2024
        $str = str_replace('/', '-', $str);

        $bulanIndo = [
            'januari' => '01', 'februari' => '02', 'maret' => '03', 'april' => '04',
            'mei' => '05', 'juni' => '06', 'juli' => '07', 'agustus' => '08',
            'september' => '09', 'oktober' => '10', 'november' => '11', 'desember' => '12',
            'jan' => '01', 'feb' => '02', 'mar' => '03', 'apr' => '04', 'agu' => '08',
            'sep' => '09', 'okt' => '10', 'nov' => '11', 'des' => '12'
        ];

        if (preg_match('/(\d{1,2})[\s\-]+([a-zA-Z]+)[\s\-]+(\d{4})/', $str, $m)) {
            $bln = strtolower($m[2]);
            if (isset($bulanIndo[$bln])) {
                return "{$m[3]}-{$bulanIndo[$bln]}-" . str_pad($m[1], 2, '0', STR_PAD_LEFT);
            }
        }

        try {
            return Carbon::parse($str)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
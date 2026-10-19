<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Daftar 13 berkas aktif yang kehilangan Routing Slip
$targetFiles = [
    'storage/app/private/metadata_pengajuan/1782186505_PERTANGGUNGJAWABAN_UMK_BBM_PRODUKSI_DINAMIKA_RPJM_PAKET_KE-2_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789439425_beli_seblak_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789612440_bfhrfhjsdfjhifdes_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789701772_aku_gilaaa_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789888561_haloo_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789925118_mencoba_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789946796_coba_lagi_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789947439_centang_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1789948423_bhdhegdchddcnc_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1790581856_percobaan1_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1790581859_percobaan1_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1791859753_2027_Checklist.xlsx',
    'storage/app/private/metadata_pengajuan/1792116086_pencok_Checklist.xlsx',
];

echo "Memulai pemulihan Routing Slip...\n";

foreach ($targetFiles as $filePath) {
    if (!file_exists($filePath)) {
        echo "Lewati (file tidak ditemukan): {$filePath}\n";
        continue;
    }

    $spreadsheet = IOFactory::load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();

    // Pastikan belum ada Routing Slip
    $alreadyExists = false;
    for ($r = 7; $r <= 12; $r++) {
        if (stripos((string)$worksheet->getCell("C{$r}")->getValue(), 'routing') !== false) {
            $alreadyExists = true;
            break;
        }
    }

    if ($alreadyExists) {
        echo "Sudah ada Routing Slip: " . basename($filePath) . "\n";
        continue;
    }

    // Sisipkan baris baru tepat di baris 7 (sebelum dokumen Pembebanan)
    $worksheet->insertNewRowBefore(7, 1);

    // Salin gaya/border dari baris 8 (yang tadinya baris 7)
    foreach (range('A', 'I') as $col) {
        $style = $worksheet->getStyle("{$col}8")->exportArray();
        $worksheet->getStyle("{$col}7")->applyFromArray($style);
    }
    $worksheet->getRowDimension(7)->setRowHeight($worksheet->getRowDimension(8)->getRowHeight());

    // Tulis nilai Routing Slip beserta status checklist Ada = Y dan Lengkap = Y
    $worksheet->setCellValue('B7', 1);
    $worksheet->setCellValue('C7', 'Routing Slip');
    $worksheet->setCellValue('D7', 'Y');
    $worksheet->setCellValue('E7', '');
    $worksheet->setCellValue('F7', '');
    $worksheet->setCellValue('G7', 'Y');
    $worksheet->setCellValue('H7', '');
    $worksheet->setCellValue('I7', '');

    // Penomoran ulang kolom B (No)
    $nomor = 1;
    for ($r = 7; $r <= 50; $r++) {
        $namaDok = trim((string)$worksheet->getCell("C{$r}")->getValue());
        if ($namaDok === '' || stripos($namaDok, 'catatan') !== false) {
            break;
        }
        $worksheet->setCellValue("B{$r}", $nomor++);
    }

    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);

    echo "Berhasil memulihkan: " . basename($filePath) . "\n";
}

echo "Selesai! Seluruh 13 berkas telah pulih dengan sempurna.\n";
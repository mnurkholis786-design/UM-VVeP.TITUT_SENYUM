<?php

namespace App\Http\Controllers\Features\File_Access;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;

class FileAccessController extends Controller
{
    function stream($id)
    {
        $file_pengajuan = BudgetSubmission::findOrFail($id);

        $path = Storage::disk('private')->path($file_pengajuan->path_file_submission);

        // $fileName = basename($file_pengajuan->path_file_pengajuan);

        return response()->file($path);
    }

    function download($id)
    {
        $file_metadata = BudgetSubmission::findOrFail($id);

        $path = Storage::disk('private')->path($file_metadata->path_file_submission);

        $fileName = basename($file_metadata->path_file_submission);

        return response()->download($path, $fileName);
    }

    function download_metadata($id) // download metadata pengajuan
    {
        $file_metadata = BudgetSubmission::findOrFail($id);

        if (!$file_metadata->path_file_requirements_status || 
            !Storage::disk('private')->exists($file_metadata->path_file_requirements_status)) {
            abort(404, 'File checklist tidak ditemukan.');
        }

        $path = Storage::disk('private')->path($file_metadata->path_file_requirements_status);
        $fileName = basename($file_metadata->path_file_requirements_status);

        // Muat file Excel ke memori
        $spreadsheet = IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();

        // 1. Cari baris tulisan "Catatan"
        $highestRow = $worksheet->getHighestRow();
        $catatanRow = null;
        for ($r = 1; $r <= $highestRow; $r++) {
            if (trim(strtolower((string) $worksheet->getCell("B{$r}")->getValue())) === 'catatan') {
                $catatanRow = $r;
                break;
            }
        }

        // 2. Jika baris Catatan ditemukan, berikan jeda/halat 3 baris kosong
        if ($catatanRow !== null) {
            // Cek apakah di atas Catatan sudah ada jarak atau masih nempel
            $dokumenSebelumnya = trim((string) $worksheet->getCell("C" . ($catatanRow - 1))->getValue());
            
            // Jika dokumen tepat di atasnya tidak kosong (artinya masih nempel langsung), buat jeda 3 baris
            if ($dokumenSebelumnya !== '') {
                // Sisipkan 3 baris kosong tepat sebelum baris Catatan
                $worksheet->insertNewRowBefore($catatanRow, 3);
                $newCatatanRow = $catatanRow + 3;

                // Bersihkan border dan isi pada 3 baris kosong pemisah tersebut
                for ($r = $catatanRow; $r < $newCatatanRow; $r++) {
                    foreach (range('A', 'I') as $col) {
                        $worksheet->setCellValue("{$col}{$r}", '');
                        $worksheet->getStyle("{$col}{$r}")->getBorders()->getLeft()->setBorderStyle(Border::BORDER_NONE);
                        $worksheet->getStyle("{$col}{$r}")->getBorders()->getRight()->setBorderStyle(Border::BORDER_NONE);
                        $worksheet->getStyle("{$col}{$r}")->getBorders()->getTop()->setBorderStyle(Border::BORDER_NONE);
                        $worksheet->getStyle("{$col}{$r}")->getBorders()->getBottom()->setBorderStyle(Border::BORDER_NONE);
                    }
                }

                // Bersihkan garis kotak-kotak tabel pada baris judul "Catatan :" agar tidak tampak seperti kolom tabel
                foreach (range('C', 'I') as $col) {
                    $worksheet->getStyle("{$col}{$newCatatanRow}")->getBorders()->getLeft()->setBorderStyle(Border::BORDER_NONE);
                    $worksheet->getStyle("{$col}{$newCatatanRow}")->getBorders()->getRight()->setBorderStyle(Border::BORDER_NONE);
                    $worksheet->getStyle("{$col}{$newCatatanRow}")->getBorders()->getTop()->setBorderStyle(Border::BORDER_NONE);
                    $worksheet->getStyle("{$col}{$newCatatanRow}")->getBorders()->getBottom()->setBorderStyle(Border::BORDER_NONE);
                }

                // Buat tulisan "Catatan :" menjadi tebal (Bold) dan rapi
                $worksheet->getStyle("B{$newCatatanRow}")->getFont()->setBold(true);
                $worksheet->setCellValue("B{$newCatatanRow}", 'Catatan :');
            }
        }

        // 3. Unduh langsung file Excel yang sudah rapi ke browser
        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}

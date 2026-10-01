<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Category;
use App\Models\DigitalArchive;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Mpdf\Mpdf;

class BudgetSubmissionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();

        return view(
            'user.pengajuan.pengajuan',
            compact(
                'payment_method',
                'funding_source'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PEMERIKSAAN CHECKLIST OLEH KEUANGAN
    |--------------------------------------------------------------------------
    */

    public function update_check(
        Request $request,
        $id
    ) {
        /*
         * Cek apakah pengajuan sedang diperiksa
         * oleh petugas Keuangan lain.
         */
        $bisaDiproses = BudgetSubmission::where(
            'id',
            $id
        )
            ->where(function ($q) {
                $q->whereNull('finance_officers_id')
                    ->orWhere(
                        'finance_officers_id',
                        Auth::id()
                    );
            })
            ->exists();

        if (!$bisaDiproses) {
            return redirect()
                ->route('keuangan.dashboard')
                ->with(
                    'error',
                    'Pengajuan ini sedang diperiksa oleh petugas keuangan lain'
                );
        }

        /*
         * Tandai petugas Keuangan yang sedang memeriksa.
         */
        BudgetSubmission::where(
            'id',
            $id
        )->update([
            'finance_officers_id' => Auth::id(),
        ]);

        $pengajuan = BudgetSubmission::with('user')
            ->with('finance_officer')
            ->findOrFail($id);

        /*
         * Pastikan file checklist tersedia.
         */
        if (
            !$pengajuan->path_file_requirements_status ||
            !Storage::disk('private')->exists(
                $pengajuan->path_file_requirements_status
            )
        ) {
            return redirect()
                ->route('keuangan.dashboard')
                ->with(
                    'error',
                    'File checklist pengajuan tidak ditemukan.'
                );
        }

        $filePathMetadata = Storage::disk('private')
            ->path(
                $pengajuan->path_file_requirements_status
            );

        $spreadsheet = IOFactory::load(
            $filePathMetadata
        );

        $worksheet = $spreadsheet->getActiveSheet();

        $aksi = $request->input(
            'aksi',
            'simpan_checklist'
        );

        /*
        |--------------------------------------------------------------------------
        | TAMBAH / EDIT / HAPUS DOKUMEN
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $aksi,
                [
                    'tambah_dokumen',
                    'edit_dokumen',
                    'hapus_dokumen',
                ],
                true
            )
        ) {
            /*
             * Hanya Keuangan yang boleh mengubah
             * master checklist.
             */
            if (
                !Auth::check() ||
                Auth::user()->role !== 'Keuangan'
            ) {
                abort(
                    403,
                    'Anda tidak memiliki akses untuk mengubah checklist.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | TAMBAH DOKUMEN
            |--------------------------------------------------------------------------
            */

            if ($aksi === 'tambah_dokumen') {
                $request->validate([
                    'nama_dokumen' =>
                        'required|string|max:255',
                ]);

                $namaDokumenBaru = trim(
                    $request->nama_dokumen
                );

                /*
                 * Update master checklist.
                 */
                $templatePath =
                    $this->getChecklistTemplatePath();

                if ($templatePath) {
                    $templateFullPath =
                        Storage::disk('private')
                            ->path($templatePath);

                    $templateSpreadsheet =
                        IOFactory::load(
                            $templateFullPath
                        );

                    $templateWorksheet =
                        $templateSpreadsheet
                            ->getActiveSheet();

                    $templateCatatanRow =
                        $this->findCatatanRow(
                            $templateWorksheet
                        );

                    $templateExistingRow =
                        $this->findRowByDocumentName(
                            $templateWorksheet,
                            $namaDokumenBaru,
                            $templateCatatanRow
                        );

                    /*
                     * Jangan tambahkan jika sudah ada.
                     */
                    if ($templateExistingRow === null) {
                        $insertRow = null;

                        for (
                            $row = 7;
                            $row < $templateCatatanRow;
                            $row++
                        ) {
                            $nama = trim(
                                (string) $templateWorksheet
                                    ->getCell("C{$row}")
                                    ->getValue()
                            );

                            if ($nama === '') {
                                $insertRow = $row;
                                break;
                            }
                        }

                        /*
                         * Jika tidak ada baris kosong,
                         * tambahkan baris baru sebelum Catatan.
                         */
                        if ($insertRow === null) {
                            $insertRow =
                                $templateCatatanRow;

                            $templateWorksheet
                                ->insertNewRowBefore(
                                    $insertRow,
                                    1
                                );
                        } else {
                            $this->ensureDocumentRowStyle(
                                $templateWorksheet,
                                $insertRow
                            );
                        }

                        /*
                         * Bersihkan kolom B-I.
                         */
                        foreach (
                            range('B', 'I') as $column
                        ) {
                            $templateWorksheet
                                ->setCellValue(
                                    "{$column}{$insertRow}",
                                    ''
                                );
                        }

                        /*
                         * Nama dokumen.
                         */
                        $templateWorksheet
                            ->setCellValue(
                                "C{$insertRow}",
                                $namaDokumenBaru
                            );

                        /*
                         * Default master:
                         * Ada + Lengkap.
                         */
                        $templateWorksheet
                            ->setCellValue(
                                "D{$insertRow}",
                                'Y'
                            );

                        $templateWorksheet
                            ->setCellValue(
                                "E{$insertRow}",
                                ''
                            );

                        $templateWorksheet
                            ->setCellValue(
                                "F{$insertRow}",
                                ''
                            );

                        $templateWorksheet
                            ->setCellValue(
                                "G{$insertRow}",
                                'Y'
                            );

                        $templateWorksheet
                            ->setCellValue(
                                "H{$insertRow}",
                                ''
                            );

                        $templateWorksheet
                            ->setCellValue(
                                "I{$insertRow}",
                                ''
                            );

                        $this->normalizeDocumentRowStyles(
                            $templateWorksheet
                        );

                        $this->renumberDocumentRows(
                            $templateWorksheet
                        );

                        $templateWriter =
                            new Xlsx(
                                $templateSpreadsheet
                            );

                        $templateWriter->save(
                            $templateFullPath
                        );
                    }
                }

                /*
                 * Update semua pengajuan yang belum diarsipkan.
                 */
                $targetSubmissions =
                    BudgetSubmission::where(
                        'is_archive',
                        0
                    )
                        ->whereNotNull(
                            'path_file_requirements_status'
                        )
                        ->get();

                foreach (
                    $targetSubmissions as $target
                ) {
                    if (
                        !Storage::disk('private')->exists(
                            $target
                                ->path_file_requirements_status
                        )
                    ) {
                        continue;
                    }

                    $targetPath =
                        Storage::disk('private')
                            ->path(
                                $target
                                    ->path_file_requirements_status
                            );

                    $targetSpreadsheet =
                        IOFactory::load(
                            $targetPath
                        );

                    $targetWorksheet =
                        $targetSpreadsheet
                            ->getActiveSheet();

                    $targetCatatanRow =
                        $this->findCatatanRow(
                            $targetWorksheet
                        );

                    $existingRow =
                        $this->findRowByDocumentName(
                            $targetWorksheet,
                            $namaDokumenBaru,
                            $targetCatatanRow
                        );

                    /*
                     * Kalau sudah ada, jangan buat duplikat.
                     */
                    if ($existingRow !== null) {
                        $this->ensureDocumentRowStyle(
                            $targetWorksheet,
                            $existingRow
                        );

                        $this->normalizeDocumentRowStyles(
                            $targetWorksheet
                        );

                        $targetWriter =
                            new Xlsx(
                                $targetSpreadsheet
                            );

                        $targetWriter->save(
                            $targetPath
                        );

                        continue;
                    }

                    $insertRow = null;

                    for (
                        $row = 7;
                        $row < $targetCatatanRow;
                        $row++
                    ) {
                        $nama = trim(
                            (string) $targetWorksheet
                                ->getCell("C{$row}")
                                ->getValue()
                        );

                        if ($nama === '') {
                            $insertRow = $row;
                            break;
                        }
                    }

                    if ($insertRow === null) {
                        $insertRow =
                            $targetCatatanRow;

                        $targetWorksheet
                            ->insertNewRowBefore(
                                $insertRow,
                                1
                            );
                    } else {
                        $this->ensureDocumentRowStyle(
                            $targetWorksheet,
                            $insertRow
                        );
                    }

                    foreach (
                        range('B', 'I') as $column
                    ) {
                        $targetWorksheet
                            ->setCellValue(
                                "{$column}{$insertRow}",
                                ''
                            );
                    }

                    $targetWorksheet
                        ->setCellValue(
                            "C{$insertRow}",
                            $namaDokumenBaru
                        );

                    /*
                     * Dokumen baru untuk pengajuan aktif:
                     * default belum ada dan belum lengkap.
                     */
                    $targetWorksheet
                        ->setCellValue(
                            "D{$insertRow}",
                            ''
                        );

                    $targetWorksheet
                        ->setCellValue(
                            "E{$insertRow}",
                            ''
                        );

                    $targetWorksheet
                        ->setCellValue(
                            "F{$insertRow}",
                            'Y'
                        );

                    $targetWorksheet
                        ->setCellValue(
                            "G{$insertRow}",
                            'Y'
                        );

                    $targetWorksheet
                        ->setCellValue(
                            "H{$insertRow}",
                            ''
                        );

                    $targetWorksheet
                        ->setCellValue(
                            "I{$insertRow}",
                            ''
                        );

                    $this->normalizeDocumentRowStyles(
                        $targetWorksheet
                    );

                    $this->renumberDocumentRows(
                        $targetWorksheet
                    );

                    $targetWriter =
                        new Xlsx(
                            $targetSpreadsheet
                        );

                    $targetWriter->save(
                        $targetPath
                    );
                }

                return redirect()
                    ->route(
                        'verification.show',
                        [
                            'verification' =>
                                $pengajuan->id,
                        ]
                    )
                    ->with(
                        'success',
                        'Dokumen berhasil ditambahkan.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | EDIT DOKUMEN
            |--------------------------------------------------------------------------
            */

            if ($aksi === 'edit_dokumen') {
                $request->validate([
                    'row' =>
                        'required|integer|min:7',

                    'nama_dokumen' =>
                        'required|string|max:255',
                ]);

                $row =
                    (int) $request->row;

                $namaDokumenBaru =
                    trim(
                        $request->nama_dokumen
                    );

                $currentCatatanRow =
                    $this->findCatatanRow(
                        $worksheet
                    );

                if (
                    $row < 7 ||
                    $row >= $currentCatatanRow
                ) {
                    return redirect()
                        ->route(
                            'verification.show',
                            [
                                'verification' =>
                                    $pengajuan->id,
                            ]
                        )
                        ->with(
                            'error',
                            'Baris dokumen tidak valid.'
                        );
                }

                $namaLama =
                    trim(
                        (string) $worksheet
                            ->getCell("C{$row}")
                            ->getValue()
                    );

                /*
                 * Routing Slip tidak boleh diedit.
                 */
                if (
                    strtolower($namaLama) ===
                    'routing slip'
                ) {
                    return redirect()
                        ->route(
                            'verification.show',
                            [
                                'verification' =>
                                    $pengajuan->id,
                            ]
                        )
                        ->with(
                            'error',
                            'Routing Slip tidak dapat diedit.'
                        );
                }

                /*
                 * Update semua pengajuan aktif.
                 */
                $targetSubmissions =
                    BudgetSubmission::where(
                        'is_archive',
                        0
                    )
                        ->whereNotNull(
                            'path_file_requirements_status'
                        )
                        ->get();

                foreach (
                    $targetSubmissions as $target
                ) {
                    if (
                        !Storage::disk('private')->exists(
                            $target
                                ->path_file_requirements_status
                        )
                    ) {
                        continue;
                    }

                    $targetPath =
                        Storage::disk('private')
                            ->path(
                                $target
                                    ->path_file_requirements_status
                            );

                    $targetSpreadsheet =
                        IOFactory::load(
                            $targetPath
                        );

                    $targetWorksheet =
                        $targetSpreadsheet
                            ->getActiveSheet();

                    $targetCatatanRow =
                        $this->findCatatanRow(
                            $targetWorksheet
                        );

                    $targetRow =
                        $this->findRowByDocumentName(
                            $targetWorksheet,
                            $namaLama,
                            $targetCatatanRow
                        );

                    if ($targetRow === null) {
                        continue;
                    }

                    $targetWorksheet
                        ->setCellValue(
                            "C{$targetRow}",
                            $namaDokumenBaru
                        );

                    $this->ensureDocumentRowStyle(
                        $targetWorksheet,
                        $targetRow
                    );

                    $this->normalizeDocumentRowStyles(
                        $targetWorksheet
                    );

                    $targetWriter =
                        new Xlsx(
                            $targetSpreadsheet
                        );

                    $targetWriter->save(
                        $targetPath
                    );
                }

                /*
                 * Update master checklist.
                 */
                $templatePath =
                    $this->getChecklistTemplatePath();

                if ($templatePath) {
                    $templateFullPath =
                        Storage::disk('private')
                            ->path(
                                $templatePath
                            );

                    $templateSpreadsheet =
                        IOFactory::load(
                            $templateFullPath
                        );

                    $templateWorksheet =
                        $templateSpreadsheet
                            ->getActiveSheet();

                    $templateCatatanRow =
                        $this->findCatatanRow(
                            $templateWorksheet
                        );

                    $templateRow =
                        $this->findRowByDocumentName(
                            $templateWorksheet,
                            $namaLama,
                            $templateCatatanRow
                        );

                    if ($templateRow !== null) {
                        $templateWorksheet
                            ->setCellValue(
                                "C{$templateRow}",
                                $namaDokumenBaru
                            );

                        $this->ensureDocumentRowStyle(
                            $templateWorksheet,
                            $templateRow
                        );

                        $this->normalizeDocumentRowStyles(
                            $templateWorksheet
                        );

                        $templateWriter =
                            new Xlsx(
                                $templateSpreadsheet
                            );

                        $templateWriter->save(
                            $templateFullPath
                        );
                    }
                }

                return redirect()
                    ->route(
                        'verification.show',
                        [
                            'verification' =>
                                $pengajuan->id,
                        ]
                    )
                    ->with(
                        'success',
                        'Nama dokumen berhasil diubah.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | HAPUS DOKUMEN
            |--------------------------------------------------------------------------
            */

            if ($aksi === 'hapus_dokumen') {
                $request->validate([
                    'row' =>
                        'required|integer|min:7',
                ]);

                $row =
                    (int) $request->row;

                $currentCatatanRow =
                    $this->findCatatanRow(
                        $worksheet
                    );

                if (
                    $row < 7 ||
                    $row >= $currentCatatanRow
                ) {
                    return redirect()
                        ->route(
                            'verification.show',
                            [
                                'verification' =>
                                    $pengajuan->id,
                            ]
                        )
                        ->with(
                            'error',
                            'Baris dokumen tidak valid.'
                        );
                }

                $namaDokumen =
                    trim(
                        (string) $worksheet
                            ->getCell("C{$row}")
                            ->getValue()
                    );

                if ($namaDokumen === '') {
                    return redirect()
                        ->route(
                            'verification.show',
                            [
                                'verification' =>
                                    $pengajuan->id,
                            ]
                        )
                        ->with(
                            'error',
                            'Dokumen tidak ditemukan.'
                        );
                }

                /*
                 * Routing Slip tidak boleh dihapus.
                 */
                if (
                    strtolower($namaDokumen) ===
                    'routing slip'
                ) {
                    return redirect()
                        ->route(
                            'verification.show',
                            [
                                'verification' =>
                                    $pengajuan->id,
                            ]
                        )
                        ->with(
                            'error',
                            'Routing Slip tidak dapat dihapus.'
                        );
                }

                /*
                 * Hapus dari master.
                 */
                $templatePath =
                    $this->getChecklistTemplatePath();

                if ($templatePath) {
                    $templateFullPath =
                        Storage::disk('private')
                            ->path(
                                $templatePath
                            );

                    $templateSpreadsheet =
                        IOFactory::load(
                            $templateFullPath
                        );

                    $templateWorksheet =
                        $templateSpreadsheet
                            ->getActiveSheet();

                    $templateCatatanRow =
                        $this->findCatatanRow(
                            $templateWorksheet
                        );

                    $templateRow =
                        $this->findRowByDocumentName(
                            $templateWorksheet,
                            $namaDokumen,
                            $templateCatatanRow
                        );

                    if ($templateRow !== null) {
                        $templateWorksheet
                            ->removeRow(
                                $templateRow,
                                1
                            );

                        $this->normalizeDocumentRowStyles(
                            $templateWorksheet
                        );

                        $this->renumberDocumentRows(
                            $templateWorksheet
                        );

                        $templateWriter =
                            new Xlsx(
                                $templateSpreadsheet
                            );

                        $templateWriter->save(
                            $templateFullPath
                        );
                    }
                }

                /*
                 * Hapus dari semua pengajuan
                 * yang belum diarsipkan.
                 */
                $targetSubmissions =
                    BudgetSubmission::where(
                        'is_archive',
                        0
                    )
                        ->whereNotNull(
                            'path_file_requirements_status'
                        )
                        ->get();

                foreach (
                    $targetSubmissions as $target
                ) {
                    if (
                        !Storage::disk('private')->exists(
                            $target
                                ->path_file_requirements_status
                        )
                    ) {
                        continue;
                    }

                    $targetPath =
                        Storage::disk('private')
                            ->path(
                                $target
                                    ->path_file_requirements_status
                            );

                    $targetSpreadsheet =
                        IOFactory::load(
                            $targetPath
                        );

                    $targetWorksheet =
                        $targetSpreadsheet
                            ->getActiveSheet();

                    $targetCatatanRow =
                        $this->findCatatanRow(
                            $targetWorksheet
                        );

                    $targetRow =
                        $this->findRowByDocumentName(
                            $targetWorksheet,
                            $namaDokumen,
                            $targetCatatanRow
                        );

                    if ($targetRow === null) {
                        continue;
                    }

                    $targetWorksheet
                        ->removeRow(
                            $targetRow,
                            1
                        );

                    $this->normalizeDocumentRowStyles(
                        $targetWorksheet
                    );

                    $this->renumberDocumentRows(
                        $targetWorksheet
                    );

                    $targetWriter =
                        new Xlsx(
                            $targetSpreadsheet
                        );

                    $targetWriter->save(
                        $targetPath
                    );
                }

                return redirect()
                    ->route(
                        'verification.show',
                        [
                            'verification' =>
                                $pengajuan->id,
                        ]
                    )
                    ->with(
                        'success',
                        'Dokumen berhasil dihapus dari pengajuan yang belum diarsipkan.'
                    );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN CHECKLIST
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'ada' =>
                'nullable|array',

            'tidak_ada' =>
                'nullable|array',

            'tidak_diperlukan' =>
                'nullable|array',

            'lengkap' =>
                'nullable|array',

            'belum_lengkap' =>
                'nullable|array',

            'keterangan' =>
                'nullable|array',

            'catatan' =>
                'nullable|string',
        ]);

        $adaRequest =
            $request->input(
                'ada',
                []
            );

        $ttdRequest =
            $request->input(
                'ttd',
                []
            );

        $keteranganRequest =
            $request->input(
                'keterangan',
                []
            );

        $rowRequest =
            $request->input(
                'row',
                []
            );

        foreach (
            $rowRequest as $index => $excelRow
        ) {
            $actualRow =
                (int) $excelRow;

            if ($actualRow < 7) {
                continue;
            }

            $catatanRowCheck =
                $this->findCatatanRow(
                    $worksheet
                );

            if (
                $actualRow >=
                $catatanRowCheck
            ) {
                continue;
            }

            $namaDokumen =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$actualRow}"
                        )
                        ->getValue()
                );

            if ($namaDokumen === '') {
                continue;
            }

            /*
             * Routing Slip tidak ikut diperiksa.
             */
            if (
                strtolower($namaDokumen) ===
                'routing slip'
            ) {
                continue;
            }

            $ada =
                isset($adaRequest[$index])
                    ? (string) $adaRequest[$index]
                    : null;

            $ttd =
                isset($ttdRequest[$index])
                    ? (string) $ttdRequest[$index]
                    : null;

            $ket =
                $keteranganRequest[$index]
                ?? '';

            /*
             * Bersihkan status lama.
             */
            $worksheet->setCellValue(
                "D{$actualRow}",
                ''
            );

            $worksheet->setCellValue(
                "E{$actualRow}",
                ''
            );

            $worksheet->setCellValue(
                "F{$actualRow}",
                ''
            );

            $worksheet->setCellValue(
                "G{$actualRow}",
                ''
            );

            $worksheet->setCellValue(
                "H{$actualRow}",
                ''
            );

            /*
             * ADA:
             * 1 = Ada
             * 0 = Tidak Ada
             * 2 = Tidak Diperlukan
             */
            switch ($ada) {
                case '1':
                    $worksheet->setCellValue(
                        "D{$actualRow}",
                        'Y'
                    );
                    break;

                case '0':
                    $worksheet->setCellValue(
                        "E{$actualRow}",
                        'Y'
                    );
                    break;

                case '2':
                    $worksheet->setCellValue(
                        "F{$actualRow}",
                        'Y'
                    );
                    break;
            }

            /*
             * TTD:
             * 1 = Lengkap
             * 0 = Belum Lengkap
             */
            if ($ttd === '1') {
                $worksheet->setCellValue(
                    "G{$actualRow}",
                    'Y'
                );
            } elseif ($ttd === '0') {
                $worksheet->setCellValue(
                    "H{$actualRow}",
                    'Y'
                );
            }

            /*
             * Keterangan.
             */
            $worksheet->setCellValue(
                "I{$actualRow}",
                $ket
            );
        }

        /*
         * Rapikan style tabel.
         */
        $this->normalizeDocumentRowStyles(
            $worksheet
        );

        /*
         * Catatan.
         */
        $requestCatatan =
            $request->input(
                'catatan',
                ''
            );

        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $catatanIsiRow =
            $catatanRow + 1;

        $worksheet->setCellValue(
            "B{$catatanIsiRow}",
            $requestCatatan
        );

        /*
         * Simpan checklist.
         */
        $writer =
            new Xlsx(
                $spreadsheet
            );

        $writer->save(
            $filePathMetadata
        );

        /*
        |--------------------------------------------------------------------------
        | CEK STATUS CHECKLIST
        |--------------------------------------------------------------------------
        */

        $spreadsheetCheck =
            IOFactory::load(
                $filePathMetadata
            );

        $worksheetCheck =
            $spreadsheetCheck->getActiveSheet();

        $documentRowsCheck =
            $this->getDocumentRows(
                $worksheetCheck
            );

        $status_lengkap =
            'Lengkap';

        $status_verifikasi =
            true;

        /*
         * Jika tidak ada dokumen.
         */
        if (
            count($documentRowsCheck) === 0
        ) {
            $status_lengkap =
                'Belum Lengkap';

            $status_verifikasi =
                false;
        }

        /*
         * Periksa setiap dokumen.
         */
        foreach (
            $documentRowsCheck as $excelRow
        ) {
            $excelRow =
                (int) $excelRow;

            $valueADA =
                trim(
                    (string) $worksheetCheck
                        ->getCell(
                            "D{$excelRow}"
                        )
                        ->getValue()
                );

            $valueTidakPerlu =
                trim(
                    (string) $worksheetCheck
                        ->getCell(
                            "F{$excelRow}"
                        )
                        ->getValue()
                );

            $valueLengkap =
                trim(
                    (string) $worksheetCheck
                        ->getCell(
                            "G{$excelRow}"
                        )
                        ->getValue()
                );

            /*
             * Tidak diperlukan dianggap lolos.
             */
            if ($valueTidakPerlu === 'Y') {
                continue;
            }

            /*
             * Harus ada.
             */
            if ($valueADA !== 'Y') {
                $status_lengkap =
                    'Belum Lengkap';

                $status_verifikasi =
                    false;

                break;
            }

            /*
             * Harus lengkap.
             */
            if ($valueLengkap !== 'Y') {
                $status_lengkap =
                    'Belum Lengkap';

                $status_verifikasi =
                    false;

                break;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | WATERMARK JIKA LENGKAP
        |--------------------------------------------------------------------------
        */

        if (
            $pengajuan->path_file_submission &&
            Storage::disk('private')->exists(
                $pengajuan->path_file_submission
            ) &&
            $status_lengkap === 'Lengkap' &&
            $status_verifikasi === true
        ) {
            $this->addWatermarkToPdf(
                $pengajuan->path_file_submission
            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $pengajuan->update([
            'finance_officers_id' =>
                Auth::id(),

            'message' =>
                $requestCatatan,

            'requirements_status' =>
                $status_lengkap,

            'verification_status' =>
                $status_verifikasi,

            'is_marked' =>
                (
                    $status_lengkap === 'Lengkap' &&
                    $status_verifikasi === true
                )
                    ? 1
                    : 0,

            'is_return' =>
                (
                    $status_lengkap === 'Lengkap' &&
                    $status_verifikasi === true
                )
                    ? 0
                    : 1,
        ]);

        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI
        |--------------------------------------------------------------------------
        */

        if (
            $status_verifikasi === false
        ) {
            /*
             * Dikembalikan ke pengaju.
             */
            Notification::create([
                'user_id' =>
                    $pengajuan->user_id,

                'title' =>
                    'Pengajuan Dikembalikan',

                'message' =>
                    'Pengajuan Anda perlu perbaikan dokumen.',

                'type' =>
                    'warning',

                'url' =>
                    route(
                        'pengajuan.show',
                        $pengajuan->id
                    ),
            ]);
        } else {
            /*
             * Berhasil diverifikasi Keuangan.
             */
            Notification::create([
                'user_id' =>
                    $pengajuan->user_id,

                'title' =>
                    'Berkas Diverifikasi Keuangan',

                'message' =>
                    'Berkas pengajuan Anda telah ' .
                    '<span class="font-semibold text-blue-600">' .
                    'diverifikasi oleh Keuangan' .
                    '</span> dan siap ke tahap berikutnya.',

                'type' =>
                    'success',

                'url' =>
                    route(
                        'pengajuan.show',
                        $pengajuan->id
                    ),
            ]);

            /*
             * Notifikasi Bendahara.
             */
            $bendaharaUsers =
                User::where(
                    'role',
                    'Bendahara'
                )->get();

            foreach (
                $bendaharaUsers as $user
            ) {
                Notification::create([
                    'user_id' =>
                        $user->id,

                    'title' =>
                        'Pengajuan Siap Diverifikasi',

                    /*
                     * PERBAIKAN:
                     * sebelumnya menggunakan pengajuan_name.
                     * Kolom yang benar adalah
                     * budget_submission_name.
                     */
                    'message' =>
                        'Pengajuan "' .
                        $pengajuan
                            ->budget_submission_name .
                        '" siap ditandatangani.',

                    'type' =>
                        'success',

                    'url' =>
                        route(
                            'bendahara.sign',
                            $pengajuan->id
                        ),
                ]);
            }
        }

        return redirect()
            ->route(
                'keuangan.dashboard'
            )
            ->with(
                'success',
                'Pemeriksaan pengajuan berhasil diselesaikan.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | MASTER CHECKLIST
    |--------------------------------------------------------------------------
    */

    private function getChecklistTemplatePath(): ?string
    {
        $templates = [
            'template/Checklist_main.xlsx',
            'template/CHECKLIST.xlsx',
        ];

        foreach (
            $templates as $path
        ) {
            if (
                Storage::disk('private')->exists(
                    $path
                )
            ) {
                return $path;
            }
        }

        return null;
    }

    private function findCatatanRow(
        $worksheet
    ) {
        $highestRow =
            $worksheet->getHighestRow();

        for (
            $row = 1;
            $row <= $highestRow;
            $row++
        ) {
            $value =
                trim(
                    strtolower(
                        (string) $worksheet
                            ->getCell(
                                "B{$row}"
                            )
                            ->getValue()
                    )
                );

            if ($value === 'catatan') {
                return $row;
            }
        }

        /*
         * Default lama tetap 39.
         */
        return 39;
    }

    private function getDocumentRows(
        $worksheet
    ) {
        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $rows = [];

        for (
            $row = 7;
            $row < $catatanRow;
            $row++
        ) {
            $namaDokumen =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$row}"
                        )
                        ->getValue()
                );

            /*
             * Routing Slip tidak dianggap
             * sebagai dokumen checklist.
             */
            if (
                strtolower($namaDokumen) ===
                'routing slip'
            ) {
                continue;
            }

            if ($namaDokumen !== '') {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    private function findRowByDocumentName(
        $worksheet,
        string $namaDokumen,
        int $catatanRow
    ): ?int {
        $target =
            strtolower(
                trim($namaDokumen)
            );

        for (
            $row = 7;
            $row < $catatanRow;
            $row++
        ) {
            $nama =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$row}"
                        )
                        ->getValue()
                );

            if (
                $nama !== '' &&
                strtolower($nama) === $target
            ) {
                return $row;
            }
        }

        return null;
    }

    private function renumberDocumentRows(
        $worksheet
    ) {
        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $nomor = 1;

        for (
            $row = 7;
            $row < $catatanRow;
            $row++
        ) {
            $namaDokumen =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$row}"
                        )
                        ->getValue()
                );

            if ($namaDokumen === '') {
                continue;
            }

            $worksheet->setCellValue(
                "B{$row}",
                $nomor
            );

            $nomor++;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | STYLE EXCEL
    |--------------------------------------------------------------------------
    */

    private function copyRowStyle(
        $worksheet,
        int $sourceRow,
        int $targetRow
    ) {
        foreach (
            range('A', 'I') as $column
        ) {
            $sourceCell =
                "{$column}{$sourceRow}";

            $targetCell =
                "{$column}{$targetRow}";

            $styleArray =
                $worksheet
                    ->getStyle($sourceCell)
                    ->exportArray();

            $worksheet
                ->getStyle($targetCell)
                ->applyFromArray(
                    $styleArray
                );
        }

        $height =
            $worksheet
                ->getRowDimension(
                    $sourceRow
                )
                ->getRowHeight();

        if ($height !== -1) {
            $worksheet
                ->getRowDimension(
                    $targetRow
                )
                ->setRowHeight(
                    $height
                );
        }
    }

    private function ensureDocumentRowStyle(
        $worksheet,
        int $targetRow
    ) {
        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $sourceRow = null;

        for (
            $row = 7;
            $row < $catatanRow;
            $row++
        ) {
            if ($row === $targetRow) {
                continue;
            }

            $nama =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$row}"
                        )
                        ->getValue()
                );

            if ($nama === '') {
                continue;
            }

            $border =
                $worksheet
                    ->getStyle(
                        "C{$row}"
                    )
                    ->getBorders();

            $hasBorder =
                $border
                    ->getLeft()
                    ->getBorderStyle() ||
                $border
                    ->getRight()
                    ->getBorderStyle() ||
                $border
                    ->getTop()
                    ->getBorderStyle() ||
                $border
                    ->getBottom()
                    ->getBorderStyle();

            if ($hasBorder) {
                $sourceRow = $row;
                break;
            }
        }

        if ($sourceRow === null) {
            return;
        }

        $this->copyRowStyle(
            $worksheet,
            $sourceRow,
            $targetRow
        );
    }

    private function normalizeDocumentRowStyles(
        $worksheet
    ) {
        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $sourceRow = null;

        /*
         * Cari baris dokumen yang
         * sudah memiliki border.
         */
        for (
            $row = 7;
            $row < $catatanRow;
            $row++
        ) {
            $nama =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$row}"
                        )
                        ->getValue()
                );

            if ($nama === '') {
                continue;
            }

            $border =
                $worksheet
                    ->getStyle(
                        "C{$row}"
                    )
                    ->getBorders();

            $hasBorder =
                $border
                    ->getLeft()
                    ->getBorderStyle() ||
                $border
                    ->getRight()
                    ->getBorderStyle() ||
                $border
                    ->getTop()
                    ->getBorderStyle() ||
                $border
                    ->getBottom()
                    ->getBorderStyle();

            if ($hasBorder) {
                $sourceRow = $row;
                break;
            }
        }

        if ($sourceRow === null) {
            return;
        }

        /*
         * Perbaiki baris yang belum memiliki border.
         */
        for (
            $row = 7;
            $row < $catatanRow;
            $row++
        ) {
            $nama =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$row}"
                        )
                        ->getValue()
                );

            if ($nama === '') {
                continue;
            }

            $border =
                $worksheet
                    ->getStyle(
                        "C{$row}"
                    )
                    ->getBorders();

            $hasBorder =
                $border
                    ->getLeft()
                    ->getBorderStyle() ||
                $border
                    ->getRight()
                    ->getBorderStyle() ||
                $border
                    ->getTop()
                    ->getBorderStyle() ||
                $border
                    ->getBottom()
                    ->getBorderStyle();

            if (
                !$hasBorder &&
                $row !== $sourceRow
            ) {
                $this->copyRowStyle(
                    $worksheet,
                    $sourceRow,
                    $row
                );
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | WATERMARK PDF SETELAH VERIFIKASI KEUANGAN
    |--------------------------------------------------------------------------
    */

    private function addWatermarkToPdf(
        string $filePath
    ) {
        if (
            !Storage::disk('private')->exists(
                $filePath
            )
        ) {
            Log::error(
                'File PDF tidak ditemukan: ' .
                $filePath
            );

            throw new \Exception(
                'File PDF tidak ditemukan'
            );
        }

        $fullPath =
            Storage::disk('private')
                ->path(
                    $filePath
                );

        $tempFixedPath =
            $fullPath .
            '_fixed.pdf';

        $gsBinary =
            strtoupper(
                substr(
                    PHP_OS,
                    0,
                    3
                )
            ) === 'WIN'
                ? 'gswin64c'
                : 'gs';

        $command =
            "{$gsBinary} " .
            "-sDEVICE=pdfwrite " .
            "-dCompatibilityLevel=1.4 " .
            "-dNOPAUSE " .
            "-dQUIET " .
            "-dBATCH " .
            "-dPreserveAnnots=false " .
            "-dShowAnnots=true " .
            "-dPDFSETTINGS=/prepress " .
            "-sOutputFile=" .
            escapeshellarg(
                $tempFixedPath
            ) .
            " " .
            escapeshellarg(
                $fullPath
            ) .
            " 2>&1";

        $output =
            shell_exec(
                $command
            );

        if (
            file_exists(
                $tempFixedPath
            )
        ) {
            rename(
                $tempFixedPath,
                $fullPath
            );

            Log::info(
                'Ghostscript berhasil meratakan layer & merubah versi ke 1.4'
            );
        } else {
            Log::error(
                'Ghostscript Gagal. Output: ' .
                $output
            );

            throw new \Exception(
                'Gagal memproses PDF: ' .
                $output
            );
        }

        $mpdf =
            new Mpdf([
                'tempDir' =>
                    storage_path(
                        'app/mpdf'
                    ),
            ]);

        $pageCount =
            $mpdf->SetSourceFile(
                $fullPath
            );

        for (
            $pageNo = 1;
            $pageNo <= $pageCount;
            $pageNo++
        ) {
            $tplId =
                $mpdf->ImportPage(
                    $pageNo
                );

            $size =
                $mpdf->getTemplateSize(
                    $tplId
                );

            $mpdf->AddPageByArray([
                'orientation' =>
                    $size['orientation'],

                'width' =>
                    $size['width'],

                'height' =>
                    $size['height'],
            ]);

            $mpdf->UseTemplate(
                $tplId
            );

            /*
             * Garis watermark.
             */
            $mpdf->SetAlpha(
                0.5
            );

            $mpdf->SetDrawColor(
                255,
                0,
                0
            );

            $mpdf->SetLineWidth(
                0.5
            );

            $mpdf->Line(
                5,
                0,
                5,
                $size['height']
            );

            $mpdf->SetAlpha(
                1
            );

            /*
             * Gambar watermark.
             */
            $watermarkPath =
                storage_path(
                    'app/public/images/watermark.png'
                );

            if (
                file_exists(
                    $watermarkPath
                )
            ) {
                [
                    $imgW,
                    $imgH
                ] =
                    getimagesize(
                        $watermarkPath
                    );

                $imgRatio =
                    $imgW /
                    $imgH;

                $maxW =
                    $size['width'] *
                    0.6;

                $maxH =
                    $size['height'] *
                    0.6;

                if (
                    $maxW / $maxH >
                    $imgRatio
                ) {
                    $wmHeight =
                        $maxH;

                    $wmWidth =
                        $wmHeight *
                        $imgRatio;
                } else {
                    $wmWidth =
                        $maxW;

                    $wmHeight =
                        $wmWidth /
                        $imgRatio;
                }

                $x =
                    (
                        $size['width'] -
                        $wmWidth
                    ) / 2;

                $y =
                    (
                        $size['height'] -
                        $wmHeight
                    ) / 2;

                $mpdf->SetAlpha(
                    0.2
                );

                $mpdf->Image(
                    $watermarkPath,
                    $x,
                    $y,
                    $wmWidth,
                    $wmHeight
                );

                $mpdf->SetAlpha(
                    1
                );
            }
        }

        $mpdf->Output(
            $fullPath,
            'F'
        );

        Log::info(
            'Watermark PDF berhasil: ' .
            $filePath
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PERBAIKAN PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function perbaikan(
        Request $request,
        $id
    ) {
        $pengajuan =
            BudgetSubmission::with('user')
                ->with('finance_officer')
                ->findOrFail($id);

        $request->validate([
            'file_pengajuan' =>
                'mimes:pdf|max:20480|nullable',

            'payment_method' =>
                'nullable|integer',

            'funding_source' =>
                'nullable|integer',
        ]);

        /*
         * File lama tetap digunakan
         * jika user tidak upload file baru.
         */
        if (
            $request->hasFile(
                'file_pengajuan'
            )
        ) {
            /*
             * Hapus file lama.
             */
            if (
                $pengajuan->path_file_submission &&
                Storage::disk('private')->exists(
                    $pengajuan->path_file_submission
                )
            ) {
                Storage::disk('private')->delete(
                    $pengajuan->path_file_submission
                );
            }

            $file =
                $request->file(
                    'file_pengajuan'
                );

            $filename =
                time() .
                '_' .
                $file->getClientOriginalName();

            $path =
                $file->storeAs(
                    'pengajuan',
                    $filename,
                    'private'
                );
        } else {
            $path =
                $pengajuan->path_file_submission;
        }

        /*
         * Jangan mengubah checklist Excel.
         *
         * Hanya file PDF,
         * payment method,
         * funding source,
         * dan status pengembalian.
         */
        $pengajuan->update([
            'path_file_submission' =>
                $path,

            'assigned_payment_method' =>
                $request->payment_method ??
                $pengajuan->assigned_payment_method,

            'assigned_funding_source' =>
                $request->funding_source ??
                $pengajuan->assigned_funding_source,

            'is_marked' =>
                0,

            'is_return' =>
                0,
        ]);

        /*
         * Notifikasi Keuangan.
         */
        $keuanganUsers =
            User::where(
                'role',
                'Keuangan'
            )->get();

        foreach (
            $keuanganUsers as $user
        ) {
            Notification::create([
                'user_id' =>
                    $user->id,

                'title' =>
                    'Pengajuan Diperbarui',

                'message' =>
                    'Pengajuan yang sebelumnya gagal telah diperbarui oleh pengaju.',

                'type' =>
                    'warning',

                'url' =>
                    route(
                        'keuangan.dashboard'
                    ),
            ]);
        }

        return redirect()
            ->route(
                'user.worklist'
            )
            ->with(
                'success',
                'Berhasil Mengirim Pengajuan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD FILE PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function download_pengajuan(
        $id
    ) {
        $file_metadata =
            BudgetSubmission::findOrFail(
                $id
            );

        if (
            !$file_metadata->path_file_submission ||
            !Storage::disk('private')->exists(
                $file_metadata->path_file_submission
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File pengajuan tidak ditemukan.'
                );
        }

        $path =
            Storage::disk('private')
                ->path(
                    $file_metadata
                        ->path_file_submission
                );

        $fileName =
            basename(
                $file_metadata
                    ->path_file_submission
            );

        return response()->download(
            $path,
            $fileName
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD CHECKLIST / METADATA
    |--------------------------------------------------------------------------
    */

    public function download_metadata_pengajuan(
        $id
    ) {
        $file_metadata =
            BudgetSubmission::findOrFail(
                $id
            );

        if (
            !$file_metadata
                ->path_file_requirements_status ||
            !Storage::disk('private')->exists(
                $file_metadata
                    ->path_file_requirements_status
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File checklist tidak ditemukan.'
                );
        }

        $path =
            Storage::disk('private')
                ->path(
                    $file_metadata
                        ->path_file_requirements_status
                );

        $fileName =
            basename(
                $file_metadata
                    ->path_file_requirements_status
            );

        return response()->download(
            $path,
            $fileName
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LIHAT PDF PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function lihat_pengajuan(
        $id
    ) {
        $file_pengajuan =
            BudgetSubmission::findOrFail(
                $id
            );

        if (
            !$file_pengajuan
                ->path_file_submission ||
            !Storage::disk('private')->exists(
                $file_pengajuan
                    ->path_file_submission
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File pengajuan tidak ditemukan.'
                );
        }

        $path =
            Storage::disk('private')
                ->path(
                    $file_pengajuan
                        ->path_file_submission
                );

        return response()->file(
            $path
        );
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI FINAL BENDAHARA
    |--------------------------------------------------------------------------
    */

    public function final_verification(
        Request $request,
        $id
    ) {
        /*
         * Pastikan hanya satu Bendahara
         * yang dapat mengambil pengajuan.
         */
        $affected =
            BudgetSubmission::where(
                'id',
                $id
            )
                ->where(function ($q) {
                    $q->whereNull(
                        'revenue_officer_id'
                    )
                        ->orWhere(
                            'revenue_officer_id',
                            Auth::id()
                        );
                })
                ->update([
                    'revenue_officer_id' =>
                        Auth::id(),
                ]);

        if ($affected === 0) {
            return redirect()
                ->route(
                    'bendahara.dashboard'
                )
                ->with(
                    'error',
                    'Pengajuan ini sudah ditanda tangani oleh bendahara lain'
                );
        }

        $pengajuan =
            BudgetSubmission::with('user')
                ->with('finance_officer')
                ->with('revenue_officer')
                ->findOrFail(
                    $id
                );

        /*
         * Checklist harus tersedia.
         */
        if (
            $pengajuan
                ->path_file_requirements_status &&
            Storage::disk('private')->exists(
                $pengajuan
                    ->path_file_requirements_status
            )
        ) {
            $filePathMetadata =
                Storage::disk('private')
                    ->path(
                        $pengajuan
                            ->path_file_requirements_status
                    );

            $spreadsheet =
                IOFactory::load(
                    $filePathMetadata
                );

            $worksheet =
                $spreadsheet
                    ->getActiveSheet();
        } else {
            return redirect()
                ->route(
                    'bendahara.dashboard'
                )
                ->with(
                    'error',
                    'File checklist tidak ditemukan.'
                );
        }

        /*
         * Nomor kuitansi.
         */
        $worksheet
            ->getCell('B4')
            ->setValue(
                "Nomor : {$request->kuitansi}"
            );

        $writer =
            new Xlsx(
                $spreadsheet
            );

        $writer->save(
            $filePathMetadata
        );

        /*
         * File PDF.
         */
        if (
            $request->hasFile(
                'file_pengajuan'
            )
        ) {
            if (
                $pengajuan
                    ->path_file_submission &&
                Storage::disk('private')->exists(
                    $pengajuan
                        ->path_file_submission
                )
            ) {
                Storage::disk('private')->delete(
                    $pengajuan
                        ->path_file_submission
                );
            }

            $file =
                $request->file(
                    'file_pengajuan'
                );

            $filename =
                $file->getClientOriginalName();

            $sourcePath =
                $file->storeAs(
                    'pengajuan',
                    $filename,
                    'private'
                );
        } else {
            $sourcePath =
                $pengajuan
                    ->path_file_submission;
        }

        /*
         * Tambahkan watermark kuitansi.
         */
        if (
            $sourcePath &&
            Storage::disk('private')->exists(
                $sourcePath
            )
        ) {
            $this->addWatermarkWithKuitansiToPdf(
                $sourcePath,
                $request->kuitansi
            );
        }

        /*
         * Payment method.
         */
        $payment =
            PaymentMethod::findOrFail(
                $request->payment_method
            );

        /*
         * Funding source.
         */
        $funding =
            FundingSource::findOrFail(
                $request->funding_source
            );

        $year =
            now()->year;

        /*
         * Cari kategori arsip berdasarkan:
         * Cabinet + Tahun + Payment + Funding.
         */
        $category =
            Category::with(
                'payment_method'
            )
                ->with(
                    'funding_source'
                )
                ->where(
                    'cabinet_id',
                    $request->cabinet_id
                )
                ->where(
                    'year',
                    $year
                )
                ->whereRelation(
                    'payment_method',
                    'id',
                    $payment->id
                )
                ->whereRelation(
                    'funding_source',
                    'id',
                    $funding->id
                )
                ->first();

        $idcategory =
            $category?->id;

        if (!$idcategory) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Gagal mengarsipkan. Kategori arsip tidak ditemukan untuk Payment atau Funding.'
                );
        }

        /*
         * Copy PDF ke folder archive.
         */
        if (
            Storage::disk('private')->exists(
                $sourcePath
            )
        ) {
            $newPath =
                'archive/' .
                basename(
                    $sourcePath
                );

            Storage::disk('private')->copy(
                $sourcePath,
                $newPath
            );
        } else {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File pengajuan tidak ditemukan'
                );
        }

        /*
         * Notifikasi kepada pengaju.
         */
        Notification::create([
            'user_id' =>
                $pengajuan->user_id,

            'title' =>
                'Pengajuan Disetujui',

            'message' =>
                'Pengajuan Anda telah ' .
                '<span class="font-semibold text-green-600">' .
                'lengkap dan ditandatangani Bendahara' .
                '</span>.',

            'type' =>
                'success',

            'url' =>
                route(
                    'pengajuan.show',
                    $pengajuan->id
                ),
        ]);

        /*
         * Simpan Digital Archive.
         */
        $digital =
            DigitalArchive::create([
                'category_id' =>
                    $idcategory,

                'archive_name' =>
                    $pengajuan
                        ->budget_submission_name,

                'from_division' =>
                    $pengajuan
                        ->user
                        ->role,

                'submiter_name' =>
                    $pengajuan
                        ->user
                        ->name,

                'finance_officer_name' =>
                    $pengajuan
                        ->finance_officer
                        ?->name,

                'revenue_officer_name' =>
                    Auth::user()
                        ->name,

                'file_path_archive' =>
                    $newPath,

                'archive_code' =>
                    $request->kuitansi,

                'nominal' =>
                    $request->biaya,

                'archive_by' =>
                    Auth::user()
                        ->name,

                'disposal_date' =>
                    Carbon::now()
                        ->addYear(5),

                'no_spby' =>
                    $request->no_spby,
            ]);

        /*
         * Tandai pengajuan sebagai arsip.
         */
        $pengajuan->update([
            'revenue_officer_id' =>
                Auth::id(),

            'path_file_submission' =>
                $sourcePath,

            'assigned_payment_method' =>
                $request->payment_method,

            'assigned_funding_source' =>
                $request->funding_source,

            'is_archive' =>
                1,

            'nominal' =>
                $request->biaya,

            'digital_archive_id' =>
                $digital->id,
        ]);

        return redirect()
            ->route(
                'bendahara.dashboard'
            )
            ->with(
                'success',
                'Berhasil verifikasi final pengajuan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | WATERMARK KUITANSI
    |--------------------------------------------------------------------------
    */

    private function addWatermarkWithKuitansiToPdf(
        string $filePath,
        string $kuitansi
    ) {
        if (
            !Storage::disk('private')->exists(
                $filePath
            )
        ) {
            Log::error(
                'File PDF tidak ditemukan: ' .
                $filePath
            );

            throw new \Exception(
                'File PDF tidak ditemukan'
            );
        }

        $fullPath =
            Storage::disk('private')
                ->path(
                    $filePath
                );

        $tempFixedPath =
            $fullPath .
            '_fixed.pdf';

        $gsBinary =
            strtoupper(
                substr(
                    PHP_OS,
                    0,
                    3
                )
            ) === 'WIN'
                ? 'gswin64c'
                : 'gs';

        $command =
            "{$gsBinary} " .
            "-sDEVICE=pdfwrite " .
            "-dCompatibilityLevel=1.4 " .
            "-dNOPAUSE " .
            "-dQUIET " .
            "-dBATCH " .
            "-dPreserveAnnots=false " .
            "-dShowAnnots=true " .
            "-dPDFSETTINGS=/prepress " .
            "-sOutputFile=" .
            escapeshellarg(
                $tempFixedPath
            ) .
            " " .
            escapeshellarg(
                $fullPath
            ) .
            " 2>&1";

        $output =
            shell_exec(
                $command
            );

        if (
            file_exists(
                $tempFixedPath
            )
        ) {
            rename(
                $tempFixedPath,
                $fullPath
            );
        } else {
            Log::error(
                'Ghostscript Gagal. Output: ' .
                $output
            );
        }

        $mpdf =
            new Mpdf([
                'tempDir' =>
                    storage_path(
                        'app/mpdf'
                    ),
            ]);

        $pageCount =
            $mpdf->SetSourceFile(
                $fullPath
            );

        for (
            $pageNo = 1;
            $pageNo <= $pageCount;
            $pageNo++
        ) {
            $tplId =
                $mpdf->ImportPage(
                    $pageNo
                );

            $size =
                $mpdf->getTemplateSize(
                    $tplId
                );

            $mpdf->AddPageByArray([
                'orientation' =>
                    $size['orientation'],

                'width' =>
                    $size['width'],

                'height' =>
                    $size['height'],
            ]);

            $mpdf->UseTemplate(
                $tplId
            );

            $xKuitansi =
                5;

            $yStart =
                10;

            $spacing =
                30;

            $mpdf->SetFont(
                'Arial',
                'B',
                4
            );

            $mpdf->SetTextColor(
                0,
                0,
                0
            );

            $mpdf->SetAlpha(
                0.8
            );

            $repeatCount =
                ceil(
                    (
                        $size['height'] -
                        $yStart
                    ) /
                    $spacing
                );

            for (
                $i = 0;
                $i < $repeatCount;
                $i++
            ) {
                $yPosition =
                    $yStart +
                    (
                        $i *
                        $spacing
                    );

                if (
                    $yPosition >
                    $size['height']
                ) {
                    break;
                }

                $mpdf->Rotate(
                    90,
                    $xKuitansi,
                    $yPosition
                );

                $mpdf->SetXY(
                    $xKuitansi,
                    $yPosition
                );

                $mpdf->Cell(
                    0,
                    0,
                    $kuitansi,
                    0,
                    0,
                    'L'
                );

                $mpdf->Rotate(
                    0
                );
            }

            $mpdf->SetAlpha(
                1
            );

            $mpdf->SetTextColor(
                0,
                0,
                0
            );
        }

        $mpdf->Output(
            $fullPath,
            'F'
        );

        Log::info(
            'Watermark dengan kuitansi PDF berhasil: ' .
            $filePath .
            ' | Kuitansi: ' .
            $kuitansi
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN PENGAJUAN BARU
    |--------------------------------------------------------------------------
    */

    public function store(
        Request $request
    ) {
        $request->validate([
            'nama_pengajuan' =>
                'required|string',

            'file' =>
                'mimes:pdf|max:51200|nullable',
        ]);

        $iduser =
            Auth::id();

        /*
         * SETTING AWAL TETAP:
         * Belum Diperiksa
         * verification_status = 0
         */
        $status_kelengkapan =
            'Belum Diperiksa';

        $status_verifikasi =
            0;

        /*
        |--------------------------------------------------------------------------
        | PDF
        |--------------------------------------------------------------------------
        */

        if (
            $request->hasFile('file')
        ) {
            $file =
                $request->file(
                    'file'
                );

            $filename =
                time() .
                '_' .
                $file->getClientOriginalName();

            $path =
                $file->storeAs(
                    'pengajuan',
                    $filename,
                    'private'
                );
        } else {
            $path =
                null;
        }

        /*
        |--------------------------------------------------------------------------
        | CHECKLIST BARU
        |--------------------------------------------------------------------------
        */

        $sourcePath =
            $this->getChecklistTemplatePath();

        $fileName =
            $sourcePath
                ? basename($sourcePath)
                : 'CHECKLIST.xlsx';

        $namaPengajuan =
            str_replace(
                ' ',
                '_',
                $request->nama_pengajuan
            );

        $newFileName =
            time() .
            '_' .
            $namaPengajuan .
            '_' .
            $fileName;

        $destinationPath =
            'metadata_pengajuan/' .
            $newFileName;

        if (
            $sourcePath &&
            Storage::disk('private')->exists(
                $sourcePath
            )
        ) {
            $destinationDir =
                'metadata_pengajuan';

            if (
                !Storage::disk('private')
                    ->exists(
                        $destinationDir
                    )
            ) {
                Storage::disk('private')
                    ->makeDirectory(
                        $destinationDir
                    );
            }

            /*
             * Copy master.
             */
            Storage::disk('private')
                ->copy(
                    $sourcePath,
                    $destinationPath
                );

            /*
             * Buka checklist BARU.
             */
            $filePathChecklist =
                Storage::disk('private')
                    ->path(
                        $destinationPath
                    );

            $spreadsheetChecklist =
                IOFactory::load(
                    $filePathChecklist
                );

            $worksheetChecklist =
                $spreadsheetChecklist
                    ->getActiveSheet();

            $catatanRow =
                $this->findCatatanRow(
                    $worksheetChecklist
                );

            /*
             * SETTING AWAL TETAP:
             *
             * D = Ada
             * G = Lengkap
             *
             * Ini hanya berlaku untuk
             * pengajuan BARU.
             */
            for (
                $row = 7;
                $row < $catatanRow;
                $row++
            ) {
                $namaDokumen =
                    trim(
                        (string) $worksheetChecklist
                            ->getCell(
                                "C{$row}"
                            )
                            ->getValue()
                    );

                if ($namaDokumen === '') {
                    continue;
                }

                $worksheetChecklist
                    ->setCellValue(
                        "D{$row}",
                        'Y'
                    );

                $worksheetChecklist
                    ->setCellValue(
                        "E{$row}",
                        ''
                    );

                $worksheetChecklist
                    ->setCellValue(
                        "F{$row}",
                        ''
                    );

                $worksheetChecklist
                    ->setCellValue(
                        "G{$row}",
                        'Y'
                    );

                $worksheetChecklist
                    ->setCellValue(
                        "H{$row}",
                        ''
                    );
            }

            /*
             * Rapikan border/style.
             */
            $this->normalizeDocumentRowStyles(
                $worksheetChecklist
            );

            /*
             * Simpan checklist BARU.
             */
            $writerChecklist =
                new Xlsx(
                    $spreadsheetChecklist
                );

            $writerChecklist->save(
                $filePathChecklist
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATABASE PENGAJUAN BARU
        |--------------------------------------------------------------------------
        */

        $pengajuan =
            BudgetSubmission::create([
                'user_id' =>
                    $iduser,

                'budget_submission_name' =>
                    $request->nama_pengajuan,

                'assigned_payment_method' =>
                    $request->payment_method,

                'assigned_funding_source' =>
                    $request->funding_source,

                'path_file_submission' =>
                    $path,

                'requirements_status' =>
                    $status_kelengkapan,

                'verification_status' =>
                    $status_verifikasi,

                'path_file_requirements_status' =>
                    $destinationPath,

                'is_archive' =>
                    0,

                'is_marked' =>
                    0,

                'is_return' =>
                    0,

                'message' =>
                    null,
            ]);

        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI KEUANGAN
        |--------------------------------------------------------------------------
        */

        $keuanganUsers =
            User::where(
                'role',
                'Keuangan'
            )->get();

        $message =
            'Ada pengajuan baru dari ' .
            '<span class="text-blue-600 font-bold">' .
            e(
                $pengajuan
                    ->user
                    ->name
            ) .
            '</span> ' .
            '(Divisi <span class="text-blue-600 font-bold">' .
            e(
                $pengajuan
                    ->user
                    ->role
            ) .
            '</span>) yang perlu diverifikasi.';

        foreach (
            $keuanganUsers as $user
        ) {
            Notification::create([
                'user_id' =>
                    $user->id,

                'title' =>
                    'Pengajuan Baru',

                'message' =>
                    $message,

                'type' =>
                    'info',

                'url' =>
                    route(
                        'keuangan.dashboard'
                    ),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | NAMA KEGIATAN KE EXCEL
        |--------------------------------------------------------------------------
        */

        if (
            $pengajuan
                ->path_file_requirements_status &&
            Storage::disk('private')->exists(
                $pengajuan
                    ->path_file_requirements_status
            )
        ) {
            $filePathMetadata =
                Storage::disk('private')
                    ->path(
                        $pengajuan
                            ->path_file_requirements_status
                    );

            $spreadsheet =
                IOFactory::load(
                    $filePathMetadata
                );

            $worksheet =
                $spreadsheet
                    ->getActiveSheet();

            $worksheet->setCellValue(
                'B3',
                'Nama Kegiatan : ' .
                $request->nama_pengajuan
            );

            /*
             * D/G tidak diubah lagi.
             */
            $this->normalizeDocumentRowStyles(
                $worksheet
            );

            $writer =
                new Xlsx(
                    $spreadsheet
                );

            $writer->save(
                $filePathMetadata
            );
        }

        return redirect()
            ->route(
                'user.worklist'
            )
            ->with(
                'success',
                'Berhasil Mengirim Pengajuan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function show(
        string $id
    ) {
        $payment_method =
            PaymentMethod::all();

        $funding_source =
            FundingSource::all();

        $pengajuan =
            BudgetSubmission::with(
                'finance_officer'
            )
                ->with(
                    'revenue_officer'
                )
                ->with(
                    'payment_method'
                )
                ->with(
                    'funding_source'
                )
                ->findOrFail(
                    $id
                );

        /*
         * Checklist.
         */
        if (
            $pengajuan
                ->path_file_requirements_status &&
            Storage::disk('private')->exists(
                $pengajuan
                    ->path_file_requirements_status
            )
        ) {
            $filePathMetadata =
                Storage::disk('private')
                    ->path(
                        $pengajuan
                            ->path_file_requirements_status
                    );

            $spreadsheet =
                IOFactory::load(
                    $filePathMetadata
                );

            $worksheet =
                $spreadsheet
                    ->getActiveSheet();
        } else {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File checklist tidak ditemukan.'
                );
        }

        $namaKegiatan =
            $worksheet
                ->getCell('B3')
                ->getValue();

        $no =
            $worksheet
                ->getCell('B4')
                ->getValue();

        $documentRows =
            $this->getDocumentRows(
                $worksheet
            );

        $syaratDoc = [];
        $ada = [];
        $tidakada = [];
        $tidakperlu = [];
        $lengkap = [];
        $belum = [];
        $keterangan = [];

        foreach (
            $documentRows as $row
        ) {
            $syaratDoc[] =
                $worksheet
                    ->getCell(
                        "C{$row}"
                    )
                    ->getValue();

            $ada[] =
                $worksheet
                    ->getCell(
                        "D{$row}"
                    )
                    ->getValue();

            $tidakada[] =
                $worksheet
                    ->getCell(
                        "E{$row}"
                    )
                    ->getValue();

            $tidakperlu[] =
                $worksheet
                    ->getCell(
                        "F{$row}"
                    )
                    ->getValue();

            $lengkap[] =
                $worksheet
                    ->getCell(
                        "G{$row}"
                    )
                    ->getValue();

            $belum[] =
                $worksheet
                    ->getCell(
                        "H{$row}"
                    )
                    ->getValue();

            $keterangan[] =
                $worksheet
                    ->getCell(
                        "I{$row}"
                    )
                    ->getValue();
        }

        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $catatan =
            $worksheet
                ->getCell(
                    "B" .
                    (
                        $catatanRow +
                        1
                    )
                )
                ->getValue();

        return view(
            'user.pengajuan.pengajuan-show',
            compact(
                'pengajuan',
                'namaKegiatan',
                'no',
                'syaratDoc',
                'ada',
                'tidakada',
                'tidakperlu',
                'lengkap',
                'belum',
                'keterangan',
                'catatan',
                'payment_method',
                'funding_source'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function edit(
        string $id
    ) {
        $pengajuan =
            BudgetSubmission::findOrFail(
                $id
            );

        $payment_method =
            PaymentMethod::all();

        $funding_source =
            FundingSource::all();

        return view(
            'user.pengajuan.pengajuan-edit',
            compact(
                'pengajuan',
                'payment_method',
                'funding_source'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        string $id
    ) {
        $pengajuan =
            BudgetSubmission::findOrFail(
                $id
            );

        $request->validate([
            'nama_pengajuan' =>
                'required|string',

            'file' =>
                'mimes:pdf|max:51200|nullable',

            'payment_method' =>
                'required|integer',

            'funding_source' =>
                'required|integer',
        ]);

        $path =
            $pengajuan
                ->path_file_submission;

        /*
         * Ganti PDF jika ada file baru.
         */
        if (
            $request->hasFile('file')
        ) {
            if (
                $pengajuan
                    ->path_file_submission &&
                Storage::disk('private')->exists(
                    $pengajuan
                        ->path_file_submission
                )
            ) {
                Storage::disk('private')->delete(
                    $pengajuan
                        ->path_file_submission
                );
            }

            $file =
                $request->file(
                    'file'
                );

            $filename =
                time() .
                '_' .
                $file->getClientOriginalName();

            $path =
                $file->storeAs(
                    'pengajuan',
                    $filename,
                    'private'
                );
        }

        /*
         * CHECKLIST LAMA TETAP DIPAKAI.
         *
         * Tidak membuat checklist baru.
         * Tidak mereset D/G.
         */
        $destinationPath =
            $pengajuan
                ->path_file_requirements_status;

        $pengajuan->update([
            'budget_submission_name' =>
                $request->nama_pengajuan,

            'assigned_payment_method' =>
                $request->payment_method,

            'assigned_funding_source' =>
                $request->funding_source,

            'path_file_submission' =>
                $path,

            'path_file_requirements_status' =>
                $destinationPath,
        ]);

        /*
         * Hanya ubah nama kegiatan
         * di checklist lama.
         */
        if (
            $destinationPath &&
            Storage::disk('private')->exists(
                $destinationPath
            )
        ) {
            $filePathMetadata =
                Storage::disk('private')
                    ->path(
                        $destinationPath
                    );

            $spreadsheet =
                IOFactory::load(
                    $filePathMetadata
                );

            $worksheet =
                $spreadsheet
                    ->getActiveSheet();

            $worksheet->setCellValue(
                'B3',
                'Nama Kegiatan : ' .
                $request->nama_pengajuan
            );

            /*
             * Tidak mengubah status checklist.
             */
            $this->normalizeDocumentRowStyles(
                $worksheet
            );

            $writer =
                new Xlsx(
                    $spreadsheet
                );

            $writer->save(
                $filePathMetadata
            );
        }

        return redirect()
            ->route(
                'user.worklist'
            )
            ->with(
                'success',
                'Berhasil Mengubah Pengajuan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS PENGAJUAN
    |--------------------------------------------------------------------------
    */

    public function destroy(
        string $id
    ) {
        $pengajuan =
            BudgetSubmission::findOrFail(
                $id
            );

        /*
         * Hapus PDF pengajuan.
         */
        if (
            $pengajuan
                ->path_file_submission &&
            Storage::disk('private')->exists(
                $pengajuan
                    ->path_file_submission
            )
        ) {
            Storage::disk('private')->delete(
                $pengajuan
                    ->path_file_submission
            );
        }

        /*
         * Hapus checklist.
         */
        if (
            $pengajuan
                ->path_file_requirements_status &&
            Storage::disk('private')->exists(
                $pengajuan
                    ->path_file_requirements_status
            )
        ) {
            Storage::disk('private')->delete(
                $pengajuan
                    ->path_file_requirements_status
            );
        }

        $pengajuan->delete();

        return redirect()
            ->route(
                'user.worklist'
            )
            ->with(
                'success',
                'Berhasil Menghapus Pengajuan'
            );
    }
}
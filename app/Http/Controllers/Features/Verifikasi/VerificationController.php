<?php

namespace App\Http\Controllers\Features\Verifikasi;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Notification;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VerificationController extends Controller
{
    /**
     * ==================================================
     * DAFTAR PENGAJUAN VERIFIKASI
     * ==================================================
     */
    public function index(Request $request)
    {
        $applyFilters = function ($query) use ($request) {
            return $query
                ->when($request->filled('search'), function ($q) use ($request) {
                    $q->where(
                        'budget_submission_name',
                        'LIKE',
                        '%' . $request->search . '%'
                    );
                })

                ->when($request->filled('divisi'), function ($q) use ($request) {
                    $q->whereHas('user', function ($q3) use ($request) {
                        $q3->where(
                            'role',
                            $request->divisi
                        );
                    });
                })

                ->when(
                    $request->filled('start_date') &&
                    $request->filled('end_date'),
                    function ($q) use ($request) {
                        $q->whereBetween('created_at', [
                            $request->start_date . ' 00:00:00',
                            $request->end_date . ' 23:59:59',
                        ]);
                    }
                );
        };

        $all_submit = $applyFilters(
            BudgetSubmission::query()
        )
            ->latest()
            ->paginate(
                10,
                ['*'],
                'all_submit'
            )
            ->appends(
                $request->query()
            );

        $not_check_submit = $applyFilters(
            BudgetSubmission::where(
                'requirements_status',
                'Belum Diperiksa'
            )
        )
            ->latest()
            ->paginate(
                10,
                ['*'],
                'not_check'
            )
            ->appends(
                $request->query()
            );

        $my_proses = $applyFilters(
            BudgetSubmission::where(
                'requirements_status',
                'Belum Lengkap'
            )
                ->where(
                    'verification_status',
                    0
                )
                ->whereNotNull(
                    'finance_officers_id'
                )
        )
            ->latest()
            ->paginate(
                5,
                ['*'],
                'my_proses'
            )
            ->appends(
                $request->query()
            );

        return view(
            'features.verifikasi.list_verifikasi',
            compact(
                'all_submit',
                'not_check_submit',
                'my_proses'
            )
        );
    }

    /**
     * ==================================================
     * CREATE
     * ==================================================
     */
    public function create()
    {
        //
    }

    /**
     * ==================================================
     * STORE
     * ==================================================
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * ==================================================
     * MENAMPILKAN CHECKLIST VERIFIKASI
     * ==================================================
     */
    public function show(string $id)
    {
        $pengajuan = BudgetSubmission::with([
            'user',
            'finance_officer',
            'revenue_officer',
            'payment_method',
            'funding_source',
        ])->findOrFail($id);

        /**
         * ==================================================
         * DATA METODE PEMBAYARAN
         * ==================================================
         *
         * INI PERBAIKAN ERROR:
         *
         * Blade menggunakan:
         * $payment_method
         *
         * Maka variabel tersebut wajib dikirim ke view.
         */
        $payment_method = PaymentMethod::orderBy(
            'payment_method_name'
        )->get();

        /**
         * ==================================================
         * CEK FILE CHECKLIST
         * ==================================================
         */
        if (
            !$pengajuan->path_file_requirements_status ||
            !Storage::disk('private')->exists(
                $pengajuan->path_file_requirements_status
            )
        ) {
            abort(
                404,
                'File checklist tidak ditemukan.'
            );
        }

        $filePathMetadata =
            Storage::disk('private')->path(
                $pengajuan->path_file_requirements_status
            );

        /**
         * ==================================================
         * LOAD EXCEL
         * ==================================================
         */
        $spreadsheet = IOFactory::load(
            $filePathMetadata
        );

        $worksheet =
            $spreadsheet->getActiveSheet();

        /**
         * ==================================================
         * PERBAIKAN NAMA DOKUMEN LAMA
         * ==================================================
         */
        $changedNamaDokumen =
            $this->updateChecklistDocumentNames(
                $worksheet
            );

        /**
         * ==================================================
         * TAMBAH BERITA ACARA
         * ==================================================
         */
        $changedDokumenBaru =
            $this->addBeritaAcaraPenyelesaianProduksiSurat(
                $worksheet
            );

        /**
         * ==================================================
         * NORMALISASI STYLE
         * ==================================================
         */
        $this->normalizeDocumentRowStyles(
            $worksheet
        );

        /**
         * ==================================================
         * SIMPAN PERUBAHAN OTOMATIS
         * ==================================================
         */
        if (
            $changedNamaDokumen ||
            $changedDokumenBaru
        ) {
            $writer = new Xlsx(
                $spreadsheet
            );

            $writer->save(
                $filePathMetadata
            );

            $spreadsheet =
                IOFactory::load(
                    $filePathMetadata
                );

            $worksheet =
                $spreadsheet->getActiveSheet();
        }

        /**
         * ==================================================
         * DATA PENGAJUAN
         * ==================================================
         */
        $namaKegiatan =
            $worksheet
                ->getCell('B3')
                ->getValue();

        $noKuitansi =
            $worksheet
                ->getCell('B4')
                ->getValue();

        /**
         * ==================================================
         * CARI CATATAN
         * ==================================================
         */
        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        /**
         * ==================================================
         * AMBIL DOKUMEN
         * ==================================================
         */
        $documentRows =
            $this->getDocumentRows(
                $worksheet
            );

        /**
         * ==================================================
         * DEFAULT STATUS DOKUMEN KOSONG
         * ==================================================
         *
         * Jika semua D-H kosong:
         *
         * D = Y
         * G = Y
         */
        $adaPerubahan = false;

        foreach (
            $documentRows as $excelRow
        ) {
            $namaDokumen =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$excelRow}"
                        )
                        ->getValue()
                );

            if ($namaDokumen === '') {
                continue;
            }

            if (
                strtolower($namaDokumen) ===
                'routing slip'
            ) {
                continue;
            }

            $valueD =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "D{$excelRow}"
                        )
                        ->getValue()
                );

            $valueE =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "E{$excelRow}"
                        )
                        ->getValue()
                );

            $valueF =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "F{$excelRow}"
                        )
                        ->getValue()
                );

            $valueG =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "G{$excelRow}"
                        )
                        ->getValue()
                );

            $valueH =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "H{$excelRow}"
                        )
                        ->getValue()
                );

            if (
                $valueD === '' &&
                $valueE === '' &&
                $valueF === '' &&
                $valueG === '' &&
                $valueH === ''
            ) {
                $worksheet->setCellValue(
                    "D{$excelRow}",
                    'Y'
                );

                $worksheet->setCellValue(
                    "E{$excelRow}",
                    ''
                );

                $worksheet->setCellValue(
                    "F{$excelRow}",
                    ''
                );

                $worksheet->setCellValue(
                    "G{$excelRow}",
                    'Y'
                );

                $worksheet->setCellValue(
                    "H{$excelRow}",
                    ''
                );

                $adaPerubahan = true;
            }
        }

        /**
         * ==================================================
         * SIMPAN DEFAULT
         * ==================================================
         */
        if ($adaPerubahan) {
            $writer = new Xlsx(
                $spreadsheet
            );

            $writer->save(
                $filePathMetadata
            );

            $spreadsheet =
                IOFactory::load(
                    $filePathMetadata
                );

            $worksheet =
                $spreadsheet->getActiveSheet();

            $catatanRow =
                $this->findCatatanRow(
                    $worksheet
                );

            $documentRows =
                $this->getDocumentRows(
                    $worksheet
                );
        }

        /**
         * ==================================================
         * ARRAY DATA CHECKLIST
         * ==================================================
         */
        $syaratDoc = [];
        $ada = [];
        $tidakada = [];
        $tidakperlu = [];
        $lengkap = [];
        $belum = [];
        $keterangan = [];
        $excelRows = [];
        $checklistRows = [];

        foreach (
            $documentRows as $index => $excelRow
        ) {
            $namaDokumen =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$excelRow}"
                        )
                        ->getValue()
                );

            $adaValue =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "D{$excelRow}"
                        )
                        ->getValue()
                );

            $tidakAdaValue =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "E{$excelRow}"
                        )
                        ->getValue()
                );

            $tidakPerluValue =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "F{$excelRow}"
                        )
                        ->getValue()
                );

            $lengkapValue =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "G{$excelRow}"
                        )
                        ->getValue()
                );

            $belumValue =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "H{$excelRow}"
                        )
                        ->getValue()
                );

            $keteranganValue =
                (string) $worksheet
                    ->getCell(
                        "I{$excelRow}"
                    )
                    ->getValue();

            $excelRows[] =
                $excelRow;

            $syaratDoc[] =
                $namaDokumen;

            $ada[] =
                $adaValue;

            $tidakada[] =
                $tidakAdaValue;

            $tidakperlu[] =
                $tidakPerluValue;

            $lengkap[] =
                $lengkapValue;

            $belum[] =
                $belumValue;

            $keterangan[] =
                $keteranganValue;

            /**
             * PENTING:
             * no = nomor tampilan.
             * row = nomor baris Excel.
             *
             * JANGAN gunakan row sebagai nomor tampilan.
             */
            $checklistRows[] = [
                'index' =>
                    $index,

                'row' =>
                    $excelRow,

                'no' =>
                    $index + 1,

                'nama_dokumen' =>
                    $namaDokumen,

                'dokumen' =>
                    $namaDokumen,

                'nama' =>
                    $namaDokumen,

                'ada' =>
                    $adaValue,

                'tidakada' =>
                    $tidakAdaValue,

                'tidak_ada' =>
                    $tidakAdaValue,

                'tidakperlu' =>
                    $tidakPerluValue,

                'tidak_diperlukan' =>
                    $tidakPerluValue,

                'lengkap' =>
                    $lengkapValue,

                'belum' =>
                    $belumValue,

                'keterangan' =>
                    $keteranganValue,
            ];
        }

        /**
         * ==================================================
         * CATATAN
         * ==================================================
         */
        $catatan =
            $worksheet
                ->getCell(
                    "B" . ($catatanRow + 1)
                )
                ->getValue();

        /**
         * ==================================================
         * RETURN VIEW
         * ==================================================
         *
         * payment_method WAJIB dimasukkan.
         */
        return view(
            'features.verifikasi.check-pengajuan',
            compact(
                'pengajuan',
                'namaKegiatan',
                'noKuitansi',
                'syaratDoc',
                'ada',
                'tidakada',
                'tidakperlu',
                'lengkap',
                'belum',
                'keterangan',
                'catatan',
                'excelRows',
                'checklistRows',
                'payment_method'
            )
        );
    }

    /**
     * ==================================================
     * EDIT
     * ==================================================
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * ==================================================
     * UPDATE CHECKLIST
     * ==================================================
     */
    public function update(
        Request $request,
        string $id
    ) {
        /**
         * ==================================================
         * CLAIM PENGAJUAN
         * ==================================================
         */
        $affected =
            BudgetSubmission::where(
                'id',
                $id
            )
                ->where(function ($q) {
                    $q->whereNull(
                        'finance_officers_id'
                    )
                        ->orWhere(
                            'finance_officers_id',
                            Auth::id()
                        );
                })
                ->update([
                    'finance_officers_id' =>
                        Auth::id(),
                ]);

        if ($affected === 0) {
            return redirect()
                ->route(
                    'keuangan.dashboard'
                )
                ->with(
                    'error',
                    'Pengajuan ini sedang diperiksa oleh petugas keuangan lain'
                );
        }

        $pengajuan =
            BudgetSubmission::with([
                'user',
                'finance_officer',
                'revenue_officer',
                'payment_method',
                'funding_source',
            ])->findOrFail($id);

        if (
            !$pengajuan->path_file_requirements_status ||
            !Storage::disk('private')->exists(
                $pengajuan->path_file_requirements_status
            )
        ) {
            return redirect()
                ->route(
                    'keuangan.dashboard'
                )
                ->with(
                    'error',
                    'File checklist pengajuan tidak ditemukan.'
                );
        }

        $filePathMetadata =
            Storage::disk('private')->path(
                $pengajuan->path_file_requirements_status
            );

        $spreadsheet =
            IOFactory::load(
                $filePathMetadata
            );

        $worksheet =
            $spreadsheet->getActiveSheet();

        /**
         * ==================================================
         * VALIDASI
         * ==================================================
         */
        $request->validate([
            'ada' =>
                'nullable|array',

            'ttd' =>
                'nullable|array',

            'keterangan' =>
                'nullable|array',

            'row' =>
                'nullable|array',

            'catatan' =>
                'nullable|string',

            'aksi' =>
                'nullable|string',

            'nama_dokumen' =>
                'nullable|string|max:255',

            'nama_dokumen_lama' =>
                'nullable|string|max:255',
        ]);

        /**
         * ==================================================
         * CRUD DOKUMEN
         * ==================================================
         */
        $aksi =
            $request->input(
                'aksi'
            );

        if (
            $aksi === 'tambah_dokumen'
        ) {
            return $this->tambahDokumen(
                $request,
                $pengajuan
            );
        }

        if (
            $aksi === 'edit_dokumen'
        ) {
            return $this->editDokumen(
                $request,
                $pengajuan
            );
        }

        if (
            $aksi === 'hapus_dokumen'
        ) {
            return $this->hapusDokumen(
                $request,
                $pengajuan
            );
        }

        /**
         * ==================================================
         * DATA CHECKLIST
         * ==================================================
         */
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

        /**
         * ==================================================
         * SIMPAN CHECKLIST
         * ==================================================
         */
        foreach (
            $rowRequest as $index => $excelRow
        ) {
            $excelRow =
                (int) $excelRow;

            if ($excelRow < 7) {
                continue;
            }

            $catatanRow =
                $this->findCatatanRow(
                    $worksheet
                );

            if (
                $excelRow >= $catatanRow
            ) {
                continue;
            }

            $namaDokumen =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$excelRow}"
                        )
                        ->getValue()
                );

            if ($namaDokumen === '') {
                continue;
            }

            if (
                strtolower(
                    $namaDokumen
                ) === 'routing slip'
            ) {
                continue;
            }

            $adaValue =
                $adaRequest[$index] ??
                null;

            $ttdValue =
                $ttdRequest[$index] ??
                null;

            $ketValue =
                $keteranganRequest[$index] ??
                '';

            /**
             * Reset status lama.
             */
            foreach (
                ['D', 'E', 'F', 'G', 'H'] as $column
            ) {
                $worksheet->setCellValue(
                    "{$column}{$excelRow}",
                    ''
                );
            }

            /**
             * DOKUMEN
             */
            if (
                (string) $adaValue === '1'
            ) {
                $worksheet->setCellValue(
                    "D{$excelRow}",
                    'Y'
                );
            } elseif (
                (string) $adaValue === '0'
            ) {
                $worksheet->setCellValue(
                    "E{$excelRow}",
                    'Y'
                );
            } elseif (
                (string) $adaValue === '2'
            ) {
                $worksheet->setCellValue(
                    "F{$excelRow}",
                    'Y'
                );
            }

            /**
             * TANDA TANGAN
             */
            if (
                (string) $ttdValue === '1'
            ) {
                $worksheet->setCellValue(
                    "G{$excelRow}",
                    'Y'
                );
            } elseif (
                (string) $ttdValue === '0'
            ) {
                $worksheet->setCellValue(
                    "H{$excelRow}",
                    'Y'
                );
            }

            /**
             * KETERANGAN
             */
            $worksheet->setCellValue(
                "I{$excelRow}",
                $ketValue
            );
        }

        /**
         * ==================================================
         * NORMALISASI STYLE
         * ==================================================
         */
        $this->normalizeDocumentRowStyles(
            $worksheet
        );

        /**
         * ==================================================
         * CATATAN
         * ==================================================
         */
        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $catatanIsiRow =
            $catatanRow + 1;

        $requestCatatan =
            $request->input(
                'catatan',
                ''
            );

        $worksheet->setCellValue(
            "B{$catatanIsiRow}",
            $requestCatatan
        );

        /**
         * ==================================================
         * SIMPAN EXCEL
         * ==================================================
         */
        $writer =
            new Xlsx(
                $spreadsheet
            );

        $writer->save(
            $filePathMetadata
        );

        /**
         * ==================================================
         * LOAD ULANG
         * ==================================================
         */
        $spreadsheet =
            IOFactory::load(
                $filePathMetadata
            );

        $worksheet =
            $spreadsheet->getActiveSheet();

        /**
         * ==================================================
         * CEK KELENGKAPAN
         * ==================================================
         */
        $documentRowsCheck =
            $this->getDocumentRows(
                $worksheet
            );

        $status_lengkap =
            'Lengkap';

        $status_verifikasi =
            true;

        if (
            count($documentRowsCheck) === 0
        ) {
            $status_lengkap =
                'Belum Lengkap';

            $status_verifikasi =
                false;
        }

        foreach (
            $documentRowsCheck as $excelRow
        ) {
            $valueADA =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "D{$excelRow}"
                        )
                        ->getValue()
                );

            $valueTidakPerlu =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "F{$excelRow}"
                        )
                        ->getValue()
                );

            $valueLengkap =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "G{$excelRow}"
                        )
                        ->getValue()
                );

            if (
                $valueTidakPerlu === 'Y'
            ) {
                continue;
            }

            if (
                $valueADA === ''
            ) {
                $status_lengkap =
                    'Belum Lengkap';

                $status_verifikasi =
                    false;

                break;
            }

            if (
                $valueLengkap === ''
            ) {
                $status_lengkap =
                    'Belum Lengkap';

                $status_verifikasi =
                    false;

                break;
            }
        }

        /**
         * ==================================================
         * WATERMARK
         * ==================================================
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

        /**
         * ==================================================
         * UPDATE DATABASE
         * ==================================================
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

        /**
         * ==================================================
         * NOTIFIKASI
         * ==================================================
         */
        if (
            $status_verifikasi === false
        ) {
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
                        'submit.show',
                        $pengajuan->id
                    ),
            ]);
        } else {
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
                        'submit.show',
                        $pengajuan->id
                    ),
            ]);

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

                    'message' =>
                        'Pengajuan "' .
                        $pengajuan->budget_submission_name .
                        '" siap ditandatangani.',

                    'type' =>
                        'success',

                    'url' =>
                        route(
                            'final.show',
                            $pengajuan->id
                        ),
                ]);
            }
        }

        return redirect()
            ->route(
                'verification.index'
            )
            ->with(
                'success',
                'Berhasil kirim tanggapan'
            );
    }

    /**
     * ==================================================
     * TAMBAH DOKUMEN
     * ==================================================
     */
    private function tambahDokumen(
        Request $request,
        BudgetSubmission $pengajuan
    ) {
        $namaDokumenBaru =
            trim(
                (string) $request->input(
                    'nama_dokumen'
                )
            );

        if ($namaDokumenBaru === '') {
            return back()
                ->with(
                    'error',
                    'Nama dokumen wajib diisi.'
                );
        }

        if (
            strtolower(
                $namaDokumenBaru
            ) === 'routing slip'
        ) {
            return back()
                ->with(
                    'error',
                    'Routing Slip tidak dapat ditambahkan.'
                );
        }

        $templatePath =
            $this->getChecklistTemplatePath();

        if (!$templatePath) {
            return back()
                ->with(
                    'error',
                    'Template Checklist tidak ditemukan.'
                );
        }

        $templateFullPath =
            Storage::disk('private')->path(
                $templatePath
            );

        $templateSpreadsheet =
            IOFactory::load(
                $templateFullPath
            );

        $templateWorksheet =
            $templateSpreadsheet->getActiveSheet();

        $templateCatatanRow =
            $this->findCatatanRow(
                $templateWorksheet
            );

        $templateExistingRow =
            $this->findRowByDocumentName(
                $templateWorksheet,
                $namaDokumenBaru
            );

        /**
         * TAMBAH KE MASTER
         */
        if (
            $templateExistingRow === null
        ) {
            $insertRow = null;

            for (
                $row = 7;
                $row < $templateCatatanRow;
                $row++
            ) {
                $nama =
                    trim(
                        (string) $templateWorksheet
                            ->getCell(
                                "C{$row}"
                            )
                            ->getValue()
                    );

                if ($nama === '') {
                    $insertRow =
                        $row;

                    break;
                }
            }

            if (
                $insertRow === null
            ) {
                $insertRow =
                    $templateCatatanRow;

                $templateWorksheet
                    ->insertNewRowBefore(
                        $insertRow,
                        1
                    );

                $styleSourceRow =
                    $insertRow > 7
                        ? $insertRow - 1
                        : 7;

                if (
                    $styleSourceRow !==
                    $insertRow
                ) {
                    $this->copyRowStyle(
                        $templateWorksheet,
                        $styleSourceRow,
                        $insertRow
                    );
                }
            } else {
                $this->ensureDocumentRowStyle(
                    $templateWorksheet,
                    $insertRow
                );
            }

            foreach (
                range('B', 'I') as $column
            ) {
                $templateWorksheet
                    ->setCellValue(
                        "{$column}{$insertRow}",
                        ''
                    );
            }

            $templateWorksheet
                ->setCellValue(
                    "C{$insertRow}",
                    $namaDokumenBaru
                );

            $templateWorksheet
                ->setCellValue(
                    "D{$insertRow}",
                    'Y'
                );

            $templateWorksheet
                ->setCellValue(
                    "G{$insertRow}",
                    'Y'
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

        /**
         * ==================================================
         * TAMBAHKAN KE SEMUA PENGAJUAN AKTIF
         * ==================================================
         */
        $activeSubmissions =
            BudgetSubmission::where(
                'is_archive',
                0
            )
                ->whereNotNull(
                    'path_file_requirements_status'
                )
                ->get();

        foreach (
            $activeSubmissions as $submission
        ) {
            if (
                !Storage::disk('private')->exists(
                    $submission->path_file_requirements_status
                )
            ) {
                continue;
            }

            $targetPath =
                Storage::disk('private')->path(
                    $submission->path_file_requirements_status
                );

            $targetSpreadsheet =
                IOFactory::load(
                    $targetPath
                );

            $targetWorksheet =
                $targetSpreadsheet->getActiveSheet();

            $targetCatatanRow =
                $this->findCatatanRow(
                    $targetWorksheet
                );

            $existingRow =
                $this->findRowByDocumentName(
                    $targetWorksheet,
                    $namaDokumenBaru
                );

            if (
                $existingRow !== null
            ) {
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
                $nama =
                    trim(
                        (string) $targetWorksheet
                            ->getCell(
                                "C{$row}"
                            )
                            ->getValue()
                    );

                if ($nama === '') {
                    $insertRow =
                        $row;

                    break;
                }
            }

            if (
                $insertRow === null
            ) {
                $insertRow =
                    $targetCatatanRow;

                $targetWorksheet
                    ->insertNewRowBefore(
                        $insertRow,
                        1
                    );

                $styleSourceRow =
                    $insertRow > 7
                        ? $insertRow - 1
                        : 7;

                if (
                    $styleSourceRow !==
                    $insertRow
                ) {
                    $this->copyRowStyle(
                        $targetWorksheet,
                        $styleSourceRow,
                        $insertRow
                    );
                }
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

        return back()
            ->with(
                'success',
                'Dokumen berhasil ditambahkan.'
            );
    }

    /**
     * ==================================================
     * EDIT DOKUMEN
     * ==================================================
     */
    private function editDokumen(
        Request $request,
        BudgetSubmission $pengajuan
    ) {
        $namaLama =
            trim(
                (string) $request->input(
                    'nama_dokumen_lama'
                )
            );

        $namaBaru =
            trim(
                (string) $request->input(
                    'nama_dokumen'
                )
            );

        if (
            $namaLama === '' ||
            $namaBaru === ''
        ) {
            return back()
                ->with(
                    'error',
                    'Nama dokumen tidak boleh kosong.'
                );
        }

        if (
            strtolower($namaLama) ===
            'routing slip'
        ) {
            return back()
                ->with(
                    'error',
                    'Routing Slip tidak dapat diedit.'
                );
        }

        if (
            strtolower($namaBaru) ===
            'routing slip'
        ) {
            return back()
                ->with(
                    'error',
                    'Nama Routing Slip tidak diperbolehkan.'
                );
        }

        /**
         * MASTER
         */
        $templatePath =
            $this->getChecklistTemplatePath();

        if ($templatePath) {
            $templateFullPath =
                Storage::disk('private')->path(
                    $templatePath
                );

            $templateSpreadsheet =
                IOFactory::load(
                    $templateFullPath
                );

            $templateWorksheet =
                $templateSpreadsheet->getActiveSheet();

            $templateRow =
                $this->findRowByDocumentName(
                    $templateWorksheet,
                    $namaLama
                );

            if (
                $templateRow !== null
            ) {
                $templateWorksheet
                    ->setCellValue(
                        "C{$templateRow}",
                        $namaBaru
                    );

                $this->normalizeDocumentRowStyles(
                    $templateWorksheet
                );

                $this->renumberDocumentRows(
                    $templateWorksheet
                );

                $writer =
                    new Xlsx(
                        $templateSpreadsheet
                    );

                $writer->save(
                    $templateFullPath
                );
            }
        }

        /**
         * SEMUA PENGAJUAN AKTIF
         */
        $activeSubmissions =
            BudgetSubmission::where(
                'is_archive',
                0
            )
                ->whereNotNull(
                    'path_file_requirements_status'
                )
                ->get();

        foreach (
            $activeSubmissions as $submission
        ) {
            if (
                !Storage::disk('private')->exists(
                    $submission->path_file_requirements_status
                )
            ) {
                continue;
            }

            $path =
                Storage::disk('private')->path(
                    $submission->path_file_requirements_status
                );

            $spreadsheet =
                IOFactory::load(
                    $path
                );

            $worksheet =
                $spreadsheet->getActiveSheet();

            $row =
                $this->findRowByDocumentName(
                    $worksheet,
                    $namaLama
                );

            if (
                $row === null
            ) {
                continue;
            }

            $worksheet->setCellValue(
                "C{$row}",
                $namaBaru
            );

            $this->normalizeDocumentRowStyles(
                $worksheet
            );

            $this->renumberDocumentRows(
                $worksheet
            );

            $writer =
                new Xlsx(
                    $spreadsheet
                );

            $writer->save(
                $path
            );
        }

        return back()
            ->with(
                'success',
                'Nama dokumen berhasil diubah.'
            );
    }

    /**
     * ==================================================
     * HAPUS DOKUMEN
     * ==================================================
     */
    private function hapusDokumen(
        Request $request,
        BudgetSubmission $pengajuan
    ) {
        $namaDokumen =
            trim(
                (string) $request->input(
                    'nama_dokumen'
                )
            );

        if (
            $namaDokumen === ''
        ) {
            return back()
                ->with(
                    'error',
                    'Nama dokumen tidak ditemukan.'
                );
        }

        if (
            strtolower($namaDokumen) ===
            'routing slip'
        ) {
            return back()
                ->with(
                    'error',
                    'Routing Slip tidak dapat dihapus.'
                );
        }

        /**
         * MASTER
         */
        $templatePath =
            $this->getChecklistTemplatePath();

        if ($templatePath) {
            $templateFullPath =
                Storage::disk('private')->path(
                    $templatePath
                );

            $templateSpreadsheet =
                IOFactory::load(
                    $templateFullPath
                );

            $templateWorksheet =
                $templateSpreadsheet->getActiveSheet();

            $templateRow =
                $this->findRowByDocumentName(
                    $templateWorksheet,
                    $namaDokumen
                );

            if (
                $templateRow !== null
            ) {
                $templateWorksheet
                    ->removeRow(
                        $templateRow,
                        1
                    );

                $this->renumberDocumentRows(
                    $templateWorksheet
                );

                $this->normalizeDocumentRowStyles(
                    $templateWorksheet
                );

                $writer =
                    new Xlsx(
                        $templateSpreadsheet
                    );

                $writer->save(
                    $templateFullPath
                );
            }
        }

        /**
         * PENGAJUAN AKTIF
         */
        $activeSubmissions =
            BudgetSubmission::where(
                'is_archive',
                0
            )
                ->whereNotNull(
                    'path_file_requirements_status'
                )
                ->get();

        foreach (
            $activeSubmissions as $submission
        ) {
            if (
                !Storage::disk('private')->exists(
                    $submission->path_file_requirements_status
                )
            ) {
                continue;
            }

            $path =
                Storage::disk('private')->path(
                    $submission->path_file_requirements_status
                );

            $spreadsheet =
                IOFactory::load(
                    $path
                );

            $worksheet =
                $spreadsheet->getActiveSheet();

            $row =
                $this->findRowByDocumentName(
                    $worksheet,
                    $namaDokumen
                );

            if (
                $row === null
            ) {
                continue;
            }

            $worksheet->removeRow(
                $row,
                1
            );

            $this->renumberDocumentRows(
                $worksheet
            );

            $this->normalizeDocumentRowStyles(
                $worksheet
            );

            $writer =
                new Xlsx(
                    $spreadsheet
                );

            $writer->save(
                $path
            );
        }

        return back()
            ->with(
                'success',
                'Dokumen berhasil dihapus.'
            );
    }

    /**
     * ==================================================
     * CARI TEMPLATE CHECKLIST
     * ==================================================
     */
    private function getChecklistTemplatePath(): ?string
    {
        $paths = [
            'template/Checklist_main.xlsx',
            'template/CHECKLIST.xlsx',
        ];

        foreach (
            $paths as $path
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

    /**
     * ==================================================
     * CARI BARIS BERDASARKAN NAMA DOKUMEN
     * ==================================================
     */
    private function findRowByDocumentName(
        $worksheet,
        string $namaDokumen
    ): ?int {
        $catatanRow =
            $this->findCatatanRow(
                $worksheet
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
                strtolower($nama) ===
                strtolower(
                    trim($namaDokumen)
                )
            ) {
                return $row;
            }
        }

        return null;
    }

    /**
     * ==================================================
     * NOMOR DOKUMEN
     * ==================================================
     */
    private function renumberDocumentRows(
        $worksheet
    ): void {
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

            $worksheet->setCellValue(
                "B{$row}",
                $nomor
            );

            $nomor++;
        }
    }

    /**
     * ==================================================
     * COPY STYLE SATU BARIS
     * ==================================================
     */
    private function copyRowStyle(
        $worksheet,
        int $sourceRow,
        int $targetRow
    ): void {
        if (
            $sourceRow === $targetRow
        ) {
            return;
        }

        foreach (
            range('A', 'I') as $column
        ) {
            $sourceCell =
                "{$column}{$sourceRow}";

            $targetCell =
                "{$column}{$targetRow}";

            $styleArray =
                $worksheet
                    ->getStyle(
                        $sourceCell
                    )
                    ->exportArray();

            $worksheet
                ->getStyle(
                    $targetCell
                )
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

        if (
            $height !== -1
        ) {
            $worksheet
                ->getRowDimension(
                    $targetRow
                )
                ->setRowHeight(
                    $height
                );
        }
    }

    /**
     * ==================================================
     * PASTIKAN STYLE BARIS DOKUMEN
     * ==================================================
     */
    private function ensureDocumentRowStyle(
        $worksheet,
        int $row
    ): void {
        $border =
            $worksheet
                ->getStyle(
                    "C{$row}"
                )
                ->getBorders();

        $hasBorder =
            $border
                ->getLeft()
                ->getBorderStyle()
            ||
            $border
                ->getRight()
                ->getBorderStyle()
            ||
            $border
                ->getTop()
                ->getBorderStyle()
            ||
            $border
                ->getBottom()
                ->getBorderStyle();

        if ($hasBorder) {
            return;
        }

        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

        $sourceRow = null;

        for (
            $checkRow = 7;
            $checkRow < $catatanRow;
            $checkRow++
        ) {
            if (
                $checkRow === $row
            ) {
                continue;
            }

            $nama =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "C{$checkRow}"
                        )
                        ->getValue()
                );

            if ($nama === '') {
                continue;
            }

            $checkBorder =
                $worksheet
                    ->getStyle(
                        "C{$checkRow}"
                    )
                    ->getBorders();

            $checkHasBorder =
                $checkBorder
                    ->getLeft()
                    ->getBorderStyle()
                ||
                $checkBorder
                    ->getRight()
                    ->getBorderStyle()
                ||
                $checkBorder
                    ->getTop()
                    ->getBorderStyle()
                ||
                $checkBorder
                    ->getBottom()
                    ->getBorderStyle();

            if ($checkHasBorder) {
                $sourceRow =
                    $checkRow;

                break;
            }
        }

        if (
            $sourceRow !== null
        ) {
            $this->copyRowStyle(
                $worksheet,
                $sourceRow,
                $row
            );
        }
    }

    /**
     * ==================================================
     * NORMALISASI STYLE
     * ==================================================
     */
    private function normalizeDocumentRowStyles(
        $worksheet
    ): void {
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
                    ->getBorderStyle()
                ||
                $border
                    ->getRight()
                    ->getBorderStyle()
                ||
                $border
                    ->getTop()
                    ->getBorderStyle()
                ||
                $border
                    ->getBottom()
                    ->getBorderStyle();

            if ($hasBorder) {
                $sourceRow =
                    $row;

                break;
            }
        }

        if (
            $sourceRow === null
        ) {
            return;
        }

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
                $nama === '' ||
                $row === $sourceRow
            ) {
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
                    ->getBorderStyle()
                ||
                $border
                    ->getRight()
                    ->getBorderStyle()
                ||
                $border
                    ->getTop()
                    ->getBorderStyle()
                ||
                $border
                    ->getBottom()
                    ->getBorderStyle();

            if (!$hasBorder) {
                $this->copyRowStyle(
                    $worksheet,
                    $sourceRow,
                    $row
                );
            }
        }
    }

    /**
     * ==================================================
     * UPDATE NAMA DOKUMEN LAMA
     * ==================================================
     */
    private function updateChecklistDocumentNames(
        $worksheet
    ): bool {
        $changed = false;

        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

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

            if (
                strtolower($namaDokumen) ===
                strtolower(
                    'Bukti Kuitansi BBM'
                )
            ) {
                $worksheet->setCellValue(
                    "C{$row}",
                    'Bukti Kuitansi Belanja Bahan'
                );

                $changed = true;
            }
        }

        return $changed;
    }

    /**
     * ==================================================
     * TAMBAH BERITA ACARA
     * ==================================================
     */
    private function addBeritaAcaraPenyelesaianProduksiSurat(
        $worksheet
    ): bool {
        $namaDokumenBaru =
            'Berita Acara Penyelesaian Produksi Surat';

        $namaDokumenSebelumnya =
            'Penunjukan Pengisi Acara';

        $highestRow =
            $worksheet->getHighestRow();

        for (
            $row = 7;
            $row <= $highestRow;
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
                strtolower($nama) ===
                strtolower(
                    $namaDokumenBaru
                )
            ) {
                return false;
            }
        }

        $targetRow = null;

        for (
            $row = 7;
            $row <= $highestRow;
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
                strtolower($nama) ===
                strtolower(
                    $namaDokumenSebelumnya
                )
            ) {
                $targetRow =
                    $row;

                break;
            }
        }

        if (
            $targetRow === null
        ) {
            return false;
        }

        $newRow =
            $targetRow + 1;

        $worksheet
            ->insertNewRowBefore(
                $newRow,
                1
            );

        $this->copyRowStyle(
            $worksheet,
            $targetRow,
            $newRow
        );

        foreach (
            range('B', 'I') as $column
        ) {
            $worksheet
                ->setCellValue(
                    "{$column}{$newRow}",
                    ''
                );
        }

        $worksheet->setCellValue(
            "C{$newRow}",
            $namaDokumenBaru
        );

        $worksheet->setCellValue(
            "D{$newRow}",
            'Y'
        );

        $worksheet->setCellValue(
            "G{$newRow}",
            'Y'
        );

        $this->normalizeDocumentRowStyles(
            $worksheet
        );

        $this->renumberDocumentRows(
            $worksheet
        );

        return true;
    }

    /**
     * ==================================================
     * CARI BARIS CATATAN
     * ==================================================
     */
    private function findCatatanRow(
        $worksheet
    ): int {
        $highestRow =
            $worksheet->getHighestRow();

        for (
            $row = 1;
            $row <= $highestRow;
            $row++
        ) {
            $value =
                trim(
                    (string) $worksheet
                        ->getCell(
                            "B{$row}"
                        )
                        ->getValue()
                );

            if (
                strtolower($value) ===
                'catatan'
            ) {
                return $row;
            }
        }

        return 39;
    }

    /**
     * ==================================================
     * AMBIL BARIS DOKUMEN
     * ==================================================
     */
    private function getDocumentRows(
        $worksheet
    ): array {
        $rows = [];

        $catatanRow =
            $this->findCatatanRow(
                $worksheet
            );

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

            if (
                strtolower(
                    $namaDokumen
                ) === 'routing slip'
            ) {
                continue;
            }

            if (
                $namaDokumen !== ''
            ) {
                $rows[] =
                    $row;
            }
        }

        return $rows;
    }

    /**
     * ==================================================
     * WATERMARK PDF
     * ==================================================
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
            (
                strtoupper(
                    substr(
                        PHP_OS,
                        0,
                        3
                    )
                ) === 'WIN'
            )
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
                'Ghostscript berhasil meratakan layer dan mengubah versi ke 1.4'
            );
        } else {
            Log::error(
                'Ghostscript gagal. Output: ' .
                $output
            );

            throw new \Exception(
                'Gagal memproses PDF: ' .
                $output
            );
        }

        $mpdf =
            new \Mpdf\Mpdf([
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

    /**
     * ==================================================
     * DESTROY
     * ==================================================
     */
    public function destroy(string $id)
    {
        //
    }
}
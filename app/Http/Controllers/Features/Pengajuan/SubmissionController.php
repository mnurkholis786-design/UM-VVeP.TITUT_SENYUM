<?php

namespace App\Http\Controllers\Features\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\FundingSource;
use App\Models\Notification;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SubmissionController extends Controller
{
    /**
     * ============================================================
     * HALAMAN PENGAJUAN
     * ============================================================
     */
    public function index()
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();

        return view(
            'features.pengajuan.pengajuan',
            compact(
                'payment_method',
                'funding_source'
            )
        );
    }


    /**
     * ============================================================
     * MONITORING PENGAJUAN USER
     * ============================================================
     */
    public function monitor()
    {
        $userId = Auth::id();

        $all_submissions = BudgetSubmission::where('user_id', $userId)
            ->latest()
            ->paginate(10, ['*'], 'all_page');

        $proses_submissions = BudgetSubmission::where('user_id', $userId)
            ->where('verification_status', 0)
            ->where(function ($query) {
                $query->whereNull('requirements_status')
                    ->orWhere('requirements_status', '!=', 'Lengkap');
            })
            ->latest()
            ->paginate(10, ['*'], 'proses_page');

        $archive_submit = BudgetSubmission::where('user_id', $userId)
            ->where('requirements_status', 'Lengkap')
            ->where('verification_status', 1)
            ->latest()
            ->paginate(10, ['*'], 'selesai_page');

        $arsip_submissions = BudgetSubmission::where('user_id', $userId)
            ->where('is_archive', 1)
            ->latest()
            ->paginate(10, ['*'], 'arsip_page');

        return view(
            'features.pengajuan.submit_monitoring',
            compact(
                'all_submissions',
                'proses_submissions',
                'archive_submit',
                'arsip_submissions'
            )
        );
    }


    public function create()
    {
        //
    }


    /**
     * ============================================================
     * SIMPAN PENGAJUAN BARU
     * ============================================================
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'file' => 'required|mimes:pdf|max:51200',
                'payment_method' => 'required|integer',
                'funding_source' => 'required|integer',
            ],
            [
                'file.required' => 'Dokumen PDF pengajuan wajib diunggah!',
                'file.mimes' => 'Format file harus berupa PDF.',
                'file.max' => 'Ukuran file maksimal adalah 50MB.',
            ]
        );

        $iduser = Auth::id();
        $status_kelengkapan = 'Belum Diperiksa';

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('pengajuan', $filename, 'private');

        $fileName = 'Checklist_main.xlsx';
        $sourcePath = 'template/' . $fileName;
        $namaPengajuan = str_replace(' ', '_', $request->name);
        $checkName = str_replace('_main', '', $fileName);
        $newFileName = time() . '_' . $namaPengajuan . '_' . $checkName;
        $destinationPath = 'metadata_pengajuan/' . $newFileName;

        if (Storage::disk('private')->exists($sourcePath)) {
            $destinationDir = 'metadata_pengajuan';

            if (!Storage::disk('private')->exists($destinationDir)) {
                Storage::disk('private')->makeDirectory($destinationDir);
            }

            Storage::disk('private')->copy($sourcePath, $destinationPath);
        }

        $pengajuan = BudgetSubmission::create([
            'user_id' => $iduser,
            'budget_submission_name' => $request->name,
            'assigned_payment_method' => $request->payment_method,
            'assigned_funding_source' => $request->funding_source,
            'path_file_submission' => $path,
            'requirements_status' => $status_kelengkapan,
            'verification_status' => 0,
            'path_file_requirements_status' => $destinationPath,
            'is_archive' => 0,
            'is_marked' => 0,
            'is_return' => 0,
            'message' => null,
        ]);

        $keuanganUsers = User::where('role', 'Keuangan')->get();

        $message =
            'Ada pengajuan baru dari
            <span class="text-blue-600 font-bold">' .
            e($pengajuan->user->name) .
            '</span>
            (Divisi
            <span class="text-blue-600 font-bold">' .
            e($pengajuan->user->role) .
            '</span>)
            yang perlu diverifikasi.';

        foreach ($keuanganUsers as $user) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Pengajuan Baru',
                'message' => $message,
                'type' => 'info',
                'url' => route('verification.show', $pengajuan->id),
            ]);
        }

        if (
            $pengajuan->path_file_requirements_status &&
            Storage::disk('private')->exists($pengajuan->path_file_requirements_status)
        ) {
            $filePathMetadata = Storage::disk('private')->path($pengajuan->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();

            $worksheet->setCellValue('B3', 'Nama Kegiatan : ' . $request->name);

            $writer = new Xlsx($spreadsheet);
            $writer->save($filePathMetadata);
        }

        return redirect()
            ->route('user.monitoring')
            ->with('success', 'Berhasil Mengirim Pengajuan');
    }


    /**
     * ============================================================
     * DETAIL PENGAJUAN
     * ============================================================
     */
    public function show(string $id)
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();

        $pengajuan = BudgetSubmission::with('finance_officer')
            ->with('revenue_officer')
            ->with('payment_method')
            ->with('funding_source')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $namaKegiatan = '-';
        $no = '-';
        $syaratDoc = [];
        $ada = [];
        $tidakada = [];
        $tidakperlu = [];
        $lengkap = [];
        $belum = [];
        $keterangan = [];
        $catatan = '-';

        if (
            $pengajuan->path_file_requirements_status &&
            Storage::disk('private')->exists($pengajuan->path_file_requirements_status)
        ) {
            $filePathMetadata = Storage::disk('private')->path($pengajuan->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();

            $namaKegiatan = $worksheet->getCell('B3')->getValue();
            $no = $worksheet->getCell('B4')->getValue();

            $catatanRow = $this->findCatatanRow($worksheet);

            $documentRows = [];
            for ($row = 7; $row < $catatanRow; $row++) {
                $namaDokumen = trim((string) $worksheet->getCell("C{$row}")->getValue());

                if (strtolower($namaDokumen) === 'routing slip') {
                    continue;
                }

                if ($namaDokumen !== '') {
                    $documentRows[] = $row;
                }
            }

            foreach ($documentRows as $row) {
                $syaratDoc[] = $worksheet->getCell("C{$row}")->getValue();
                $ada[] = $worksheet->getCell("D{$row}")->getValue();
                $tidakada[] = $worksheet->getCell("E{$row}")->getValue();
                $tidakperlu[] = $worksheet->getCell("F{$row}")->getValue();
                $lengkap[] = $worksheet->getCell("G{$row}")->getValue();
                $belum[] = $worksheet->getCell("H{$row}")->getValue();
                $keterangan[] = $worksheet->getCell("I{$row}")->getValue();
            }

            $catatan = $worksheet->getCell("B" . ($catatanRow + 1))->getValue();
        }

        return view(
            'features.pengajuan.pengajuan-show',
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


    /**
     * ============================================================
     * EDIT PENGAJUAN
     * ============================================================
     */
    public function edit(string $id)
    {
        $pengajuan = BudgetSubmission::where('user_id', Auth::id())->findOrFail($id);
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();

        return view(
            'features.pengajuan.pengajuan-edit',
            compact('pengajuan', 'payment_method', 'funding_source')
        );
    }


    /**
     * ============================================================
     * UPDATE PENGAJUAN
     * ============================================================
     */
    public function update(Request $request, string $id)
    {
        $pengajuan = BudgetSubmission::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'file' => 'mimes:pdf|max:50000|nullable',
            'payment_method' => 'required|integer',
            'funding_source' => 'required|integer',
        ]);

        $path = $pengajuan->path_file_submission;

        if ($request->hasFile('file')) {
            if ($path && Storage::disk('private')->exists($path)) {
                Storage::disk('private')->delete($path);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('pengajuan', $filename, 'private');
        }

        $pengajuan->update([
            'budget_submission_name' => $request->name,
            'assigned_payment_method' => $request->payment_method,
            'assigned_funding_source' => $request->funding_source,
            'path_file_submission' => $path,
        ]);

        if (
            $pengajuan->path_file_requirements_status &&
            Storage::disk('private')->exists($pengajuan->path_file_requirements_status)
        ) {
            $filePathMetadata = Storage::disk('private')->path($pengajuan->path_file_requirements_status);
            $spreadsheet = IOFactory::load($filePathMetadata);
            $worksheet = $spreadsheet->getActiveSheet();

            $worksheet->setCellValue('B3', 'Nama Kegiatan : ' . $request->name);

            $writer = new Xlsx($spreadsheet);
            $writer->save($filePathMetadata);
        }

        return redirect()
            ->route('user.monitoring')
            ->with('success', 'Berhasil Mengupdate Pengajuan');
    }


    /**
     * ============================================================
     * CARI BARIS "CATATAN" DI FILE CHECKLIST
     * ============================================================
     */
    private function findCatatanRow($worksheet)
    {
        $highestRow = $worksheet->getHighestRow();

        for ($row = 1; $row <= $highestRow; $row++) {
            $value = trim(
                strtolower(
                    (string) $worksheet->getCell("B{$row}")->getValue()
                )
            );

            if ($value === 'catatan') {
                return $row;
            }
        }

        return 39;
    }


    /**
     * ============================================================
     * HAPUS PENGAJUAN
     * ============================================================
     */
    public function destroy(string $id)
    {
        $pengajuan = BudgetSubmission::where('user_id', Auth::id())->findOrFail($id);

        if (
            $pengajuan->path_file_submission &&
            Storage::disk('private')->exists($pengajuan->path_file_submission)
        ) {
            Storage::disk('private')->delete($pengajuan->path_file_submission);
        }

        if (
            $pengajuan->path_file_requirements_status &&
            Storage::disk('private')->exists($pengajuan->path_file_requirements_status)
        ) {
            Storage::disk('private')->delete($pengajuan->path_file_requirements_status);
        }

        $pengajuan->delete();

        return redirect()
            ->route('user.monitoring')
            ->with('success', 'Berhasil Menghapus Pengajuan');
    }
}
<?php

namespace App\Http\Controllers\Features\Arsip\DigitalArchive;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Category;
use App\Models\DigitalArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use function Symfony\Component\Clock\now;

class DigitalArchiveController extends Controller
{
    /**
     * ============================================================
     * HALAMAN UTAMA ARSIP DIGITAL
     * ============================================================
     */
    public function index()
    {
        $categoryNames = [
            'PERJALANAN DINAS',
            'PRODUKSI',
            'PENGADAAN BARANG DAN JASA',
            'BELANJA PEGAWAI',
        ];

        $categories = Category::whereIn('category_name', $categoryNames)
            ->get()
            ->keyBy('category_name');

        $archivesPerjalananDinas = collect();
        $archivesProduksi = collect();
        $archivesPengadaan = collect();
        $archivesBelanjaPegawai = collect();

        if ($categories->has('PERJALANAN DINAS')) {
            $archivesPerjalananDinas = DigitalArchive::where(
                'category_id',
                $categories['PERJALANAN DINAS']->id
            )
                ->latest()
                ->get();
        }

        if ($categories->has('PRODUKSI')) {
            $archivesProduksi = DigitalArchive::where(
                'category_id',
                $categories['PRODUKSI']->id
            )
                ->latest()
                ->get();
        }

        if ($categories->has('PENGADAAN BARANG DAN JASA')) {
            $archivesPengadaan = DigitalArchive::where(
                'category_id',
                $categories['PENGADAAN BARANG DAN JASA']->id
            )
                ->latest()
                ->get();
        }

        if ($categories->has('BELANJA PEGAWAI')) {
            $archivesBelanjaPegawai = DigitalArchive::where(
                'category_id',
                $categories['BELANJA PEGAWAI']->id
            )
                ->latest()
                ->get();
        }

        return view(
            'features.arsip.digital_archive.all-digital-archive',
            compact(
                'archivesPerjalananDinas',
                'archivesProduksi',
                'archivesPengadaan',
                'archivesBelanjaPegawai'
            )
        );
    }

    /**
     * ============================================================
     * HALAMAN KATEGORI - PERJALANAN DINAS
     * ============================================================
     */
    public function perjalananDinas()
    {
        $category = Category::where(
            'category_name',
            'PERJALANAN DINAS'
        )->first();

        $allArchive = $category
            ? DigitalArchive::where('category_id', $category->id)
                ->latest()
                ->get()
            : collect();

        return view(
            'features.arsip.digital_archive.all-digital-archive',
            compact('allArchive', 'category')
        );
    }

    /**
     * ============================================================
     * HALAMAN KATEGORI - PRODUKSI
     * ============================================================
     */
    public function produksi()
    {
        $category = Category::where(
            'category_name',
            'PRODUKSI'
        )->first();

        $allArchive = $category
            ? DigitalArchive::where('category_id', $category->id)
                ->latest()
                ->get()
            : collect();

        return view(
            'features.arsip.digital_archive.all-digital-archive',
            compact('allArchive', 'category')
        );
    }

    /**
     * ============================================================
     * HALAMAN KATEGORI - PENGADAAN BARANG DAN JASA
     * ============================================================
     */
    public function pengadaanBarangJasa()
    {
        $category = Category::where(
            'category_name',
            'PENGADAAN BARANG DAN JASA'
        )->first();

        $allArchive = $category
            ? DigitalArchive::where('category_id', $category->id)
                ->latest()
                ->get()
            : collect();

        return view(
            'features.arsip.digital_archive.all-digital-archive',
            compact('allArchive', 'category')
        );
    }

    /**
     * ============================================================
     * HALAMAN KATEGORI - BELANJA PEGAWAI
     * ============================================================
     */
    public function belanjaPegawai()
    {
        $category = Category::where(
            'category_name',
            'BELANJA PEGAWAI'
        )->first();

        $allArchive = $category
            ? DigitalArchive::where('category_id', $category->id)
                ->latest()
                ->get()
            : collect();

        return view(
            'features.arsip.digital_archive.all-digital-archive',
            compact('allArchive', 'category')
        );
    }

    /**
     * ============================================================
     * FORM TAMBAH ARSIP DIGITAL
     * ============================================================
     */
    public function create(Request $request)
    {
        $category = Category::findOrFail($request->category_id);

        return view(
            'features.arsip.digital_archive.digital_archives_form_create',
            compact('category')
        );
    }

    /**
     * ============================================================
     * SIMPAN ARSIP DIGITAL
     * ============================================================
     */
    public function store(Request $request)
    {
        $category = Category::findOrFail($request->category_id);

        $validated = $request->validate([
            'digital_name' => 'required|string|max:255',
            'digital_code' => 'nullable|string|max:100',
            'from_division' => 'nullable|string|max:255',

            'kode_klasifikasi' => 'nullable|string|max:100',
            'indeks1' => 'nullable|string|max:100',
            'indeks2' => 'nullable|string|max:100',
            'no_item' => 'nullable|string|max:100',

            'nominal' => 'nullable|numeric|min:0',
            'uraian' => 'nullable|string',

            'no_spby' => 'nullable|string|max:100',
            'no_spm' => 'nullable|string|max:100',
            'jenis_spm' => 'nullable|string|max:100',

            'no_sp2d' => 'nullable|string|max:100',
            'nilai_sp2d' => 'nullable|numeric|min:0',
            'jenis_sp2d' => 'nullable|string|max:100',
            'tgl_sp2d' => 'nullable|date',
            'tgl_selesai_sp2d' =>
                'nullable|date|after_or_equal:tgl_sp2d',

            'no_invoice' => 'nullable|string|max:100',
            'tgl_invoice' => 'nullable|string|max:100',
            'tgl_terima' => 'nullable|date',

            'tingkat_pertimbangan' => 'nullable|string|max:100',
            'jumlah_halaman' => 'nullable|integer|min:0',
            'retensi_arsip_aktif' => 'nullable|integer|min:0',
            'retensi_arsip_inaktif' => 'nullable|integer|min:0',
            'nasib_akhir_arsip' => 'nullable|string|max:100',
            'klasifikasi_keamanan' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:100',
            'disposal_date' => 'nullable|date',

            'submiter_name' => 'nullable|string|max:255',
            'finance_officer_name' => 'nullable|string|max:255',
            'revenue_officer_name' => 'nullable|string|max:255',

            // MAKSIMAL 5 FILE
            'file_path_digital' => 'nullable|array|max:5',
            'file_path_digital.*' => 'file|mimes:pdf|max:20480',

            'link_arsip' => 'nullable|url|max:500',

            'keterangan' => 'nullable|string',

            // LOKASI SIMPAN SERVER
            'lokasi_simpan_server' => 'nullable|string|max:255',
        ], [
            'file_path_digital.max' =>
                'Maksimal 5 file PDF yang bisa diupload.',

            'file_path_digital.*.mimes' =>
                'File harus berformat PDF.',

            'file_path_digital.*.max' =>
                'Ukuran setiap file maksimal 20MB.',
        ]);

        $filePaths = [];

        if ($request->hasFile('file_path_digital')) {
            foreach ($request->file('file_path_digital') as $file) {

                $fileName =
                    time() .
                    '_' .
                    uniqid() .
                    '_' .
                    $file->getClientOriginalName();

                $filePaths[] = $file->storeAs(
                    'archive',
                    $fileName,
                    'private'
                );
            }
        }

        DigitalArchive::create([
            'category_id' => $category->id,

            'archive_name' =>
                $validated['digital_name'],

            'from_division' =>
                $validated['from_division'] ?? '',

            'submiter_name' =>
                $validated['submiter_name'] ?? '',

            'finance_officer_name' =>
                $validated['finance_officer_name'] ?? '',

            'revenue_officer_name' =>
                $validated['revenue_officer_name'] ?? '',

            'file_path_archive' =>
                $filePaths,

            'archive_code' =>
                $validated['digital_code'] ?? '',

            'nominal' =>
                $validated['nominal'] ?? 0,

            'archive_by' =>
                $validated['revenue_officer_name']
                ?? Auth::user()->name,

            'disposal_date' =>
                $validated['disposal_date'] ?? now(),

            'kode_klasifikasi' =>
                $validated['kode_klasifikasi'] ?? null,

            'indeks1' =>
                $validated['indeks1'] ?? null,

            'indeks2' =>
                $validated['indeks2'] ?? null,

            'no_item' =>
                $validated['no_item'] ?? null,

            'uraian' =>
                $validated['uraian'] ?? null,

            'no_spby' =>
                $validated['no_spby'] ?? null,

            'no_spm' =>
                $validated['no_spm'] ?? null,

            'jenis_spm' =>
                $validated['jenis_spm'] ?? null,

            'no_sp2d' =>
                $validated['no_sp2d'] ?? null,

            'nilai_sp2d' =>
                $validated['nilai_sp2d'] ?? null,

            'jenis_sp2d' =>
                $validated['jenis_sp2d'] ?? null,

            'tgl_sp2d' =>
                $validated['tgl_sp2d'] ?? null,

            'tgl_selesai_sp2d' =>
                $validated['tgl_selesai_sp2d'] ?? null,

            'no_invoice' =>
                $validated['no_invoice'] ?? null,

            'tgl_invoice' =>
                $validated['tgl_invoice'] ?? null,

            'tgl_terima' =>
                $validated['tgl_terima'] ?? null,

            'tingkat_pertimbangan' =>
                $validated['tingkat_pertimbangan'] ?? null,

            'jumlah_halaman' =>
                $validated['jumlah_halaman'] ?? null,

            'retensi_arsip_aktif' =>
                $validated['retensi_arsip_aktif'] ?? null,

            'retensi_arsip_inaktif' =>
                $validated['retensi_arsip_inaktif'] ?? null,

            'nasib_akhir_arsip' =>
                $validated['nasib_akhir_arsip'] ?? null,

            'klasifikasi_keamanan' =>
                $validated['klasifikasi_keamanan'] ?? null,

            'status' =>
                $validated['status'] ?? null,

            'keterangan' =>
                $validated['keterangan'] ?? null,

            // LOKASI SIMPAN SERVER
            'lokasi_simpan_server' =>
                $validated['lokasi_simpan_server'] ?? null,

            'link_arsip' =>
                $validated['link_arsip'] ?? null,

            'jenis_rak' => '',
            'folder' => '',
        ]);

        return redirect()
            ->route('year.show', $category->id)
            ->with(
                'success',
                'Arsip digital berhasil ditambahkan!'
            );
    }

    /**
     * ============================================================
     * DETAIL ARSIP DIGITAL
     * ============================================================
     */
    public function show(string $id)
    {
        $archive = DigitalArchive::findOrFail($id);

        return view(
            'features.arsip.digital_archive.show-digital-archive',
            compact('archive')
        );
    }

    /**
     * ============================================================
     * FORM EDIT
     * ============================================================
     */
    public function edit(string $id)
    {
        $digital = DigitalArchive::findOrFail($id);

        return view(
            'features.arsip.digital_archive.digital_archives_form_edit',
            compact('digital')
        );
    }

    /**
     * ============================================================
     * UPDATE ARSIP DIGITAL
     * ============================================================
     */
    public function update(Request $request, string $id)
    {
        $archive = DigitalArchive::findOrFail($id);

        $validated = $request->validate([
            'digital_name' => 'required|string|max:255',
            'digital_code' => 'nullable|string|max:100',
            'from_division' => 'nullable|string|max:255',

            'kode_klasifikasi' => 'nullable|string|max:100',
            'indeks1' => 'nullable|string|max:100',
            'indeks2' => 'nullable|string|max:100',
            'no_item' => 'nullable|string|max:100',

            'nominal' => 'nullable|numeric|min:0',
            'uraian' => 'nullable|string',

            'no_spby' => 'nullable|string|max:100',
            'no_spm' => 'nullable|string|max:100',
            'jenis_spm' => 'nullable|string|max:100',

            'no_sp2d' => 'nullable|string|max:100',
            'nilai_sp2d' => 'nullable|numeric|min:0',
            'jenis_sp2d' => 'nullable|string|max:100',
            'tgl_sp2d' => 'nullable|date',
            'tgl_selesai_sp2d' =>
                'nullable|date|after_or_equal:tgl_sp2d',

            'no_invoice' => 'nullable|string|max:100',
            'tgl_invoice' => 'nullable|string|max:100',
            'tgl_terima' => 'nullable|date',

            'tingkat_pertimbangan' => 'nullable|string|max:100',
            'jumlah_halaman' => 'nullable|integer|min:0',
            'retensi_arsip_aktif' => 'nullable|integer|min:0',
            'retensi_arsip_inaktif' => 'nullable|integer|min:0',
            'nasib_akhir_arsip' => 'nullable|string|max:100',
            'klasifikasi_keamanan' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:100',
            'disposal_date' => 'nullable|date',

            'submiter_name' => 'nullable|string|max:255',
            'finance_officer_name' => 'nullable|string|max:255',
            'revenue_officer_name' => 'nullable|string|max:255',

            'file_path_digital' => 'nullable|array',
            'file_path_digital.*' =>
                'file|mimes:pdf|max:20480',

            'delete_files' => 'nullable|array',
            'delete_files.*' => 'integer',

            'link_arsip' => 'nullable|url|max:500',

            'keterangan' => 'nullable|string',

            // LOKASI SIMPAN SERVER
            'lokasi_simpan_server' => 'nullable|string|max:255',
        ], [
            'file_path_digital.*.mimes' =>
                'File harus berformat PDF.',

            'file_path_digital.*.max' =>
                'Ukuran setiap file maksimal 20MB.',
        ]);

        /**
         * FILE LAMA
         */
        $existingFiles =
            $archive->file_path_archive ?? [];

        if (!is_array($existingFiles)) {
            $existingFiles =
                $existingFiles
                ? [$existingFiles]
                : [];
        }

        /**
         * HAPUS FILE YANG DIPILIH
         */
        $deleteIndexes =
            $request->input('delete_files', []);

        foreach ($deleteIndexes as $idx) {

            if (isset($existingFiles[$idx])) {

                if (
                    Storage::disk('private')
                        ->exists($existingFiles[$idx])
                ) {
                    Storage::disk('private')
                        ->delete($existingFiles[$idx]);
                }

                unset($existingFiles[$idx]);
            }
        }

        $existingFiles =
            array_values($existingFiles);

        /**
         * FILE BARU
         */
        $newFiles = [];

        if ($request->hasFile('file_path_digital')) {

            foreach (
                $request->file('file_path_digital')
                as $file
            ) {

                $fileName =
                    time() .
                    '_' .
                    uniqid() .
                    '_' .
                    $file->getClientOriginalName();

                $newFiles[] =
                    $file->storeAs(
                        'archive',
                        $fileName,
                        'private'
                    );
            }
        }

        /**
         * GABUNG FILE LAMA + BARU
         */
        $allFiles =
            array_merge(
                $existingFiles,
                $newFiles
            );

        /**
         * MAKSIMAL 5 FILE
         */
        if (count($allFiles) > 5) {

            foreach ($newFiles as $newFile) {

                if (
                    Storage::disk('private')
                        ->exists($newFile)
                ) {
                    Storage::disk('private')
                        ->delete($newFile);
                }
            }

            return back()
                ->withErrors([
                    'file_path_digital' =>
                        'Total file PDF maksimal 5 (termasuk file yang sudah ada).'
                ])
                ->withInput();
        }

        /**
         * UPDATE DATABASE
         */
        $archive->update([

            'archive_name' =>
                $validated['digital_name'],

            'from_division' =>
                $validated['from_division'] ?? '',

            'submiter_name' =>
                $validated['submiter_name'] ?? '',

            'finance_officer_name' =>
                $validated['finance_officer_name'] ?? '',

            'revenue_officer_name' =>
                $validated['revenue_officer_name'] ?? '',

            'file_path_archive' =>
                $allFiles,

            'archive_code' =>
                $validated['digital_code'] ?? '',

            'nominal' =>
                $validated['nominal'] ?? 0,

            'archive_by' =>
                $validated['revenue_officer_name']
                ?? Auth::user()->name,

            'disposal_date' =>
                $validated['disposal_date'] ?? now(),

            'kode_klasifikasi' =>
                $validated['kode_klasifikasi'] ?? null,

            'indeks1' =>
                $validated['indeks1'] ?? null,

            'indeks2' =>
                $validated['indeks2'] ?? null,

            'no_item' =>
                $validated['no_item'] ?? null,

            'uraian' =>
                $validated['uraian'] ?? null,

            'no_spby' =>
                $validated['no_spby'] ?? null,

            'no_spm' =>
                $validated['no_spm'] ?? null,

            'jenis_spm' =>
                $validated['jenis_spm'] ?? null,

            'no_sp2d' =>
                $validated['no_sp2d'] ?? null,

            'nilai_sp2d' =>
                $validated['nilai_sp2d'] ?? null,

            'jenis_sp2d' =>
                $validated['jenis_sp2d'] ?? null,

            'tgl_sp2d' =>
                $validated['tgl_sp2d'] ?? null,

            'tgl_selesai_sp2d' =>
                $validated['tgl_selesai_sp2d'] ?? null,

            'no_invoice' =>
                $validated['no_invoice'] ?? null,

            'tgl_invoice' =>
                $validated['tgl_invoice'] ?? null,

            'tgl_terima' =>
                $validated['tgl_terima'] ?? null,

            'tingkat_pertimbangan' =>
                $validated['tingkat_pertimbangan'] ?? null,

            'jumlah_halaman' =>
                $validated['jumlah_halaman'] ?? null,

            'retensi_arsip_aktif' =>
                $validated['retensi_arsip_aktif'] ?? null,

            'retensi_arsip_inaktif' =>
                $validated['retensi_arsip_inaktif'] ?? null,

            'nasib_akhir_arsip' =>
                $validated['nasib_akhir_arsip'] ?? null,

            'klasifikasi_keamanan' =>
                $validated['klasifikasi_keamanan'] ?? null,

            'status' =>
                $validated['status'] ?? null,

            'keterangan' =>
                $validated['keterangan'] ?? null,

            // LOKASI SIMPAN SERVER
            'lokasi_simpan_server' =>
                $validated['lokasi_simpan_server'] ?? null,

            'link_arsip' =>
                $validated['link_arsip'] ?? null,

            'jenis_rak' => '',
            'folder' => '',
        ]);

        return redirect()
            ->route(
                'year.show',
                $archive->category_id
            )
            ->with(
                'success',
                'Arsip digital berhasil diperbarui!'
            );
    }

    /**
     * ============================================================
     * HAPUS ARSIP DIGITAL
     * ============================================================
     */
    public function destroy(string $id)
    {
        $archive =
            DigitalArchive::findOrFail($id);

        $categoryId =
            $archive->category_id;

        /**
         * Cari pengajuan yang berhubungan
         */
        $pengajuan =
            BudgetSubmission::where(
                'digital_archive_id',
                $archive->id
            )->first();

        /**
         * Hapus file pengajuan
         */
        if ($pengajuan) {

            if (
                $pengajuan->path_file_requirements_status &&
                Storage::disk('private')->exists(
                    $pengajuan->path_file_requirements_status
                )
            ) {
                Storage::disk('private')->delete(
                    $pengajuan->path_file_requirements_status
                );
            }

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
        }

        /**
         * Hapus semua file arsip digital
         */
        $filesToDelete =
            $archive->file_path_archive ?? [];

        if (!is_array($filesToDelete)) {
            $filesToDelete =
                $filesToDelete
                ? [$filesToDelete]
                : [];
        }

        foreach ($filesToDelete as $filePath) {

            if (
                Storage::disk('private')
                    ->exists($filePath)
            ) {
                Storage::disk('private')
                    ->delete($filePath);
            }
        }

        /**
         * Hapus data pengajuan
         */
        if ($pengajuan) {
            $pengajuan->delete();
        }

        /**
         * Hapus arsip
         */
        $archive->delete();

        return redirect()
            ->route('year.show', $categoryId)
            ->with(
                'success',
                'Arsip digital berhasil dihapus!'
            );
    }

    /**
     * ============================================================
     * EXPORT EXCEL
     * ============================================================
     */
    public function export(string $id)
    {
        $archive =
            DigitalArchive::findOrFail($id);

        $spreadsheet =
            new Spreadsheet();

        $sheet =
            $spreadsheet->getActiveSheet();

        $sheet->setTitle(
            'Detail Arsip Digital'
        );

        $rows = [

            ['Nama Archive',
                $archive->archive_name ?? '-'],

            ['Kode Arsip',
                $archive->archive_code ?? '-'],

            ['Divisi Asal',
                $archive->from_division ?? '-'],

            ['Kode Klasifikasi',
                $archive->kode_klasifikasi ?? '-'],

            ['Indeks 1',
                $archive->indeks1 ?? '-'],

            ['Indeks 2',
                $archive->indeks2 ?? '-'],

            ['No Item',
                $archive->no_item ?? '-'],

            ['Nominal',
                $archive->nominal
                    ? 'Rp ' .
                    number_format(
                        $archive->nominal,
                        0,
                        ',',
                        '.'
                    )
                    : '-'],

            ['Uraian',
                $archive->uraian ?? '-'],

            ['No SPBy',
                $archive->no_spby ?? '-'],

            ['No SPM',
                $archive->no_spm ?? '-'],

            ['Jenis SPM',
                $archive->jenis_spm ?? '-'],

            ['No SP2D',
                $archive->no_sp2d ?? '-'],

            ['Nilai SP2D',
                $archive->nilai_sp2d
                    ? 'Rp ' .
                    number_format(
                        $archive->nilai_sp2d,
                        0,
                        ',',
                        '.'
                    )
                    : '-'],

            ['Jenis SP2D',
                $archive->jenis_sp2d ?? '-'],

            ['Tanggal SP2D',
                $archive->tgl_sp2d
                    ? \Carbon\Carbon::parse(
                        $archive->tgl_sp2d
                    )->format('d F Y')
                    : '-'],

            ['Tanggal Selesai SP2D',
                $archive->tgl_selesai_sp2d
                    ? \Carbon\Carbon::parse(
                        $archive->tgl_selesai_sp2d
                    )->format('d F Y')
                    : '-'],

            ['No Invoice',
                $archive->no_invoice ?? '-'],

            ['Tanggal Invoice',
                $archive->tgl_invoice
                    ? \Carbon\Carbon::parse(
                        $archive->tgl_invoice
                    )->format('d F Y')
                    : '-'],

            ['Tanggal Terima',
                $archive->tgl_terima
                    ? \Carbon\Carbon::parse(
                        $archive->tgl_terima
                    )->format('d F Y')
                    : '-'],

            ['Tingkat Pertimbangan',
                $archive->tingkat_pertimbangan ?? '-'],

            ['Jumlah Halaman',
                $archive->jumlah_halaman
                    ? $archive->jumlah_halaman .
                    ' lembar'
                    : '-'],

            ['Retensi Arsip Aktif',
                $archive->retensi_arsip_aktif
                    ? $archive->retensi_arsip_aktif .
                    ' tahun'
                    : '-'],

            ['Retensi Arsip Inaktif',
                $archive->retensi_arsip_inaktif
                    ? $archive->retensi_arsip_inaktif .
                    ' tahun'
                    : '-'],

            ['Nasib Akhir Arsip',
                $archive->nasib_akhir_arsip ?? '-'],

            ['Klasifikasi Keamanan',
                $archive->klasifikasi_keamanan ?? '-'],

            ['Status',
                $archive->status ?? '-'],

            ['Tanggal Pembuangan',
                $archive->disposal_date
                    ? \Carbon\Carbon::parse(
                        $archive->disposal_date
                    )->format('d F Y')
                    : '-'],

            ['Pengaju',
                $archive->submiter_name ?? '-'],

            ['Divisi Keuangan',
                $archive->finance_officer_name ?? '-'],

            ['Bendahara',
                $archive->revenue_officer_name ?? '-'],

            ['Keterangan',
                $archive->keterangan ?? '-'],

            // LOKASI SIMPAN SERVER
            ['Lokasi Simpan Server',
                $archive->lokasi_simpan_server ?? '-'],
        ];

        $sheet->setCellValue(
            'A1',
            'Field'
        );

        $sheet->setCellValue(
            'B1',
            'Nilai'
        );

        $sheet
            ->getStyle('A1:B1')
            ->getFont()
            ->setBold(true);

        $rowNumber = 2;

        foreach ($rows as $row) {

            $sheet->setCellValue(
                'A' . $rowNumber,
                $row[0]
            );

            $sheet->setCellValue(
                'B' . $rowNumber,
                $row[1]
            );

            $rowNumber++;
        }

        $sheet
            ->getColumnDimension('A')
            ->setWidth(25);

        $sheet
            ->getColumnDimension('B')
            ->setWidth(40);

        $safeCode =
            $archive->archive_code
            ? str_replace(
                ['/', '\\'],
                '-',
                $archive->archive_code
            )
            : $archive->id;

        $fileName =
            'arsip-digital-' .
            $safeCode .
            '.xlsx';

        $writer =
            new Xlsx($spreadsheet);

        return response()
            ->streamDownload(
                function () use ($writer) {
                    $writer->save(
                        'php://output'
                    );
                },
                $fileName,
                [
                    'Content-Type' =>
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                ]
            );
    }
}
<?php

namespace App\Http\Controllers\Features\Arsip\DigitalArchive;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Category;
use App\Models\DigitalArchive;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DigitalArchiveController extends Controller
{
    /**
     * Halaman utama Digital Archive.
     */
    public function index()
    {
        $kategoriList = DigitalArchive::KATEGORI_LIST;

        $counts = DigitalArchive::selectRaw(
            'kategori, COUNT(*) as total'
        )
            ->whereNotNull('kategori')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        return view(
            'features.arsip.digital_archive.digital_archive_dashboard',
            compact('kategoriList', 'counts')
        );
    }

    /**
     * Helper internal untuk menampilkan arsip berdasarkan kategori.
     */
    private function listByKategori(
        string $kategori,
        string $judul
    ) {
        $archives = DigitalArchive::where(
            'kategori',
            $kategori
        )
            ->latest()
            ->paginate(10);

        return view(
            'features.arsip.digital_archive.digital_archive_list',
            [
                'archives' => $archives,
                'kategoriAktif' => $kategori,
                'judul' => $judul,
            ]
        );
    }

    /**
     * Perjalanan Dinas.
     */
    public function perjalananDinas()
    {
        return $this->listByKategori(
            'PERJALANAN DINAS',
            'Perjalanan Dinas'
        );
    }

    /**
     * Produksi.
     */
    public function produksi()
    {
        return $this->listByKategori(
            'PRODUKSI',
            'Produksi'
        );
    }

    /**
     * Pengadaan Barang dan Jasa.
     */
    public function pengadaanBarangJasa()
    {
        return $this->listByKategori(
            'PENGADAAN BARANG DAN JASA',
            'Pengadaan Barang dan Jasa'
        );
    }

    /**
     * Belanja Pegawai.
     */
    public function belanjaPegawai()
    {
        return $this->listByKategori(
            'BELANJA PEGAWAI',
            'Belanja Pegawai'
        );
    }

    /**
     * Form create.
     */
    public function create(Request $request)
    {
        $category = Category::findOrFail(
            $request->category_id
        );

        $kategoriList = DigitalArchive::KATEGORI_LIST;

        $folders = \App\Models\DocumentFolder::where(
            'category_id',
            $category->id
        )->get();

        return view(
            'features.arsip.digital_archive.digital_archives_form_create',
            compact(
                'category',
                'kategoriList',
                'folders'
            )
        );
    }

    /**
     * Store digital archive.
     */
    public function store(Request $request)
    {
        $category = Category::findOrFail(
            $request->category_id
        );

        $validated = $request->validate([
            'folder_id' => 'nullable|exists:document_folders,id',
            'digital_name' => 'required|string|max:255',
            'digital_code' => 'nullable|string|max:100',
            'from_division' => 'nullable|string|max:255',
            'kategori' => 'required|in:' . implode(',', DigitalArchive::KATEGORI_LIST),
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
            'tgl_selesai_sp2d' => 'nullable|date|after_or_equal:tgl_sp2d',
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
            'file_path_digital' => 'nullable|array|max:5',
            'file_path_digital.*' => 'file|mimes:pdf|max:20480',
            'link_arsip' => 'nullable|url|max:500',
            'keterangan' => 'nullable|string',
            'lokasi_simpan_server' => 'nullable|string|max:255',
        ], [
            'folder_id.exists' => 'Sub kategori yang dipilih tidak valid.',
            'kategori.required' => 'Kategori arsip wajib dipilih.',
            'kategori.in' => 'Kategori arsip tidak valid.',
            'file_path_digital.max' => 'Maksimal 5 file PDF yang bisa diupload.',
            'file_path_digital.*.mimes' => 'File harus berformat PDF.',
            'file_path_digital.*.max' => 'Ukuran setiap file maksimal 20MB.',
        ]);

        $filePaths = [];

        if ($request->hasFile('file_path_digital')) {
            foreach ($request->file('file_path_digital') as $file) {
                $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $filePaths[] = $file->storeAs('archive', $fileName, 'private');
            }
        }

        DigitalArchive::create([
            'category_id' => $category->id,
            'folder_id' => $validated['folder_id'] ?? null,
            'kategori' => $validated['kategori'],
            'archive_name' => $validated['digital_name'],
            'from_division' => $validated['from_division'] ?? '',
            'submiter_name' => $validated['submiter_name'] ?? '',
            'finance_officer_name' => $validated['finance_officer_name'] ?? '',
            'revenue_officer_name' => $validated['revenue_officer_name'] ?? '',
            'file_path_archive' => $filePaths,
            'archive_code' => $validated['digital_code'] ?? '',
            'nominal' => $validated['nominal'] ?? 0,
            'archive_by' => $validated['revenue_officer_name'] ?? Auth::user()->name,
            'disposal_date' => $validated['disposal_date'] ?? now(),
            'kode_klasifikasi' => $validated['kode_klasifikasi'] ?? null,
            'indeks1' => $validated['indeks1'] ?? null,
            'indeks2' => $validated['indeks2'] ?? null,
            'no_item' => $validated['no_item'] ?? null,
            'uraian' => $validated['uraian'] ?? null,
            'no_spby' => $validated['no_spby'] ?? null,
            'no_spm' => $validated['no_spm'] ?? null,
            'jenis_spm' => $validated['jenis_spm'] ?? null,
            'no_sp2d' => $validated['no_sp2d'] ?? null,
            'nilai_sp2d' => $validated['nilai_sp2d'] ?? null,
            'jenis_sp2d' => $validated['jenis_sp2d'] ?? null,
            'tgl_sp2d' => $validated['tgl_sp2d'] ?? null,
            'tgl_selesai_sp2d' => $validated['tgl_selesai_sp2d'] ?? null,
            'no_invoice' => $validated['no_invoice'] ?? null,
            'tgl_invoice' => $validated['tgl_invoice'] ?? null,
            'tgl_terima' => $validated['tgl_terima'] ?? null,
            'tingkat_pertimbangan' => $validated['tingkat_pertimbangan'] ?? null,
            'jumlah_halaman' => $validated['jumlah_halaman'] ?? null,
            'retensi_arsip_aktif' => $validated['retensi_arsip_aktif'] ?? null,
            'retensi_arsip_inaktif' => $validated['retensi_arsip_inaktif'] ?? null,
            'nasib_akhir_arsip' => $validated['nasib_akhir_arsip'] ?? null,
            'klasifikasi_keamanan' => $validated['klasifikasi_keamanan'] ?? null,
            'status' => $validated['status'] ?? null,
            'keterangan' => $validated['keterangan'] ?? null,
            'lokasi_simpan_server' => $validated['lokasi_simpan_server'] ?? null,
            'link_arsip' => $validated['link_arsip'] ?? null,
            'jenis_rak' => '',
            'folder' => '',
        ]);

        return redirect()
            ->route('year.show', $category->id)
            ->with('success', 'Arsip digital berhasil ditambahkan!');
    }

    /**
     * Show detail archive.
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
     * Edit.
     */
    public function edit(string $id)
    {
        $digital = DigitalArchive::findOrFail($id);
        $kategoriList = DigitalArchive::KATEGORI_LIST;

        return view(
            'features.arsip.digital_archive.digital_archives_form_edit',
            compact('digital', 'kategoriList')
        );
    }

    /**
     * Update.
     */
    public function update(Request $request, string $id)
    {
        $archive = DigitalArchive::findOrFail($id);

        $validated = $request->validate([
            'folder_id' => 'nullable|exists:document_folders,id',
            'digital_name' => 'required|string|max:255',
            'digital_code' => 'nullable|string|max:100',
            'from_division' => 'nullable|string|max:255',
            'kategori' => 'required|in:' . implode(',', DigitalArchive::KATEGORI_LIST),
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
            'tgl_selesai_sp2d' => 'nullable|date|after_or_equal:tgl_sp2d',
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
            'file_path_digital.*' => 'file|mimes:pdf|max:20480',
            'delete_files' => 'nullable|array',
            'delete_files.*' => 'integer',
            'link_arsip' => 'nullable|url|max:500',
            'keterangan' => 'nullable|string',
            'lokasi_simpan_server' => 'nullable|string|max:255',
        ], [
            'folder_id.exists' => 'Sub kategori yang dipilih tidak valid.',
            'kategori.required' => 'Kategori arsip wajib dipilih.',
            'kategori.in' => 'Kategori arsip tidak valid.',
            'file_path_digital.*.mimes' => 'File harus berformat PDF.',
            'file_path_digital.*.max' => 'Ukuran setiap file maksimal 20MB.',
        ]);

        $existingFiles = $archive->file_path_archive ?? [];

        if (!is_array($existingFiles)) {
            $existingFiles = $existingFiles ? [$existingFiles] : [];
        }

        $deleteIndexes = $request->input('delete_files', []);

        foreach ($deleteIndexes as $idx) {
            if (isset($existingFiles[$idx])) {
                if (Storage::disk('private')->exists($existingFiles[$idx])) {
                    Storage::disk('private')->delete($existingFiles[$idx]);
                }
                unset($existingFiles[$idx]);
            }
        }

        $existingFiles = array_values($existingFiles);
        $newFiles = [];

        if ($request->hasFile('file_path_digital')) {
            foreach ($request->file('file_path_digital') as $file) {
                $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $newFiles[] = $file->storeAs('archive', $fileName, 'private');
            }
        }

        $allFiles = array_merge($existingFiles, $newFiles);

        if (count($allFiles) > 5) {
            return back()
                ->withErrors([
                    'file_path_digital' => 'Total file PDF maksimal 5 (termasuk yang sudah ada).'
                ])
                ->withInput();
        }

        $archive->update([
            'category_id' => $archive->category_id,
            'folder_id' => $validated['folder_id'] ?? null,
            'kategori' => $validated['kategori'],
            'archive_name' => $validated['digital_name'],
            'from_division' => $validated['from_division'] ?? '',
            'submiter_name' => $validated['submiter_name'] ?? '',
            'finance_officer_name' => $validated['finance_officer_name'] ?? '',
            'revenue_officer_name' => $validated['revenue_officer_name'] ?? '',
            'file_path_archive' => $allFiles,
            'archive_code' => $validated['digital_code'] ?? '',
            'nominal' => $validated['nominal'] ?? 0,
            'archive_by' => $validated['revenue_officer_name'] ?? Auth::user()->name,
            'disposal_date' => $validated['disposal_date'] ?? now(),
            'kode_klasifikasi' => $validated['kode_klasifikasi'] ?? null,
            'indeks1' => $validated['indeks1'] ?? null,
            'indeks2' => $validated['indeks2'] ?? null,
            'no_item' => $validated['no_item'] ?? null,
            'uraian' => $validated['uraian'] ?? null,
            'no_spby' => $validated['no_spby'] ?? null,
            'no_spm' => $validated['no_spm'] ?? null,
            'jenis_spm' => $validated['jenis_spm'] ?? null,
            'no_sp2d' => $validated['no_sp2d'] ?? null,
            'nilai_sp2d' => $validated['nilai_sp2d'] ?? null,
            'jenis_sp2d' => $validated['jenis_sp2d'] ?? null,
            'tgl_sp2d' => $validated['tgl_sp2d'] ?? null,
            'tgl_selesai_sp2d' => $validated['tgl_selesai_sp2d'] ?? null,
            'no_invoice' => $validated['no_invoice'] ?? null,
            'tgl_invoice' => $validated['tgl_invoice'] ?? null,
            'tgl_terima' => $validated['tgl_terima'] ?? null,
            'tingkat_pertimbangan' => $validated['tingkat_pertimbangan'] ?? null,
            'jumlah_halaman' => $validated['jumlah_halaman'] ?? null,
            'retensi_arsip_aktif' => $validated['retensi_arsip_aktif'] ?? null,
            'retensi_arsip_inaktif' => $validated['retensi_arsip_inaktif'] ?? null,
            'nasib_akhir_arsip' => $validated['nasib_akhir_arsip'] ?? null,
            'klasifikasi_keamanan' => $validated['klasifikasi_keamanan'] ?? null,
            'status' => $validated['status'] ?? null,
            'keterangan' => $validated['keterangan'] ?? null,
            'lokasi_simpan_server' => $validated['lokasi_simpan_server'] ?? null,
            'link_arsip' => $validated['link_arsip'] ?? null,
            'jenis_rak' => '',
            'folder' => '',
        ]);

        return redirect()
            ->route('year.show', $archive->category_id)
            ->with('success', 'Arsip digital berhasil diperbarui!');
    }

    /**
     * Destroy.
     */
    public function destroy(string $id)
    {
        $archive = DigitalArchive::findOrFail($id);

        $pengajuan = BudgetSubmission::where(
            'digital_archive_id',
            $archive->id
        )->first();

        if (isset($pengajuan)) {
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

            $filesToDelete = $archive->file_path_archive ?? [];

            if (!is_array($filesToDelete)) {
                $filesToDelete = $filesToDelete ? [$filesToDelete] : [];
            }

            foreach ($filesToDelete as $filePath) {
                if (Storage::disk('private')->exists($filePath)) {
                    Storage::disk('private')->delete($filePath);
                }
            }

            $pengajuan->delete();
        }

        $categoryId = $archive->category_id;
        $archive->delete();

        return redirect()
            ->route('year.show', $categoryId)
            ->with('success', 'Arsip digital berhasil dihapus!');
    }

    /**
     * Export laporan arsip digital ke bentuk PDF.
     */
    public function exportReportPdf(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $query = DigitalArchive::where('category_id', $category->id);

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        if ($request->filled('search_digital')) {
            $query->where('archive_name', 'like', '%' . $request->search_digital . '%');
        }

        if ($request->filled('divisi')) {
            $query->where('submiter_name', 'like', '%' . $request->divisi . '%');
        }

        $archives = $query->orderBy('kategori')->orderBy('created_at')->get();
        
        $periodeMulai = $request->filled('tanggal_mulai') ? \Carbon\Carbon::parse($request->tanggal_mulai)->format('d/m/Y') : 'Awal';
        $periodeSelesai = $request->filled('tanggal_selesai') ? \Carbon\Carbon::parse($request->tanggal_selesai)->format('d/m/Y') : 'Sekarang';
        $judulLaporan = 'LAPORAN UP BENDAHARA';
        $subKategoriNama = '-';

        // Menggunakan view laporan-arsip yang sudah ada di folder resources/views/features/arsip/pdf/
        $pdf = Pdf::loadView('features.arsip.pdf.laporan-arsip', compact('archives', 'category', 'periodeMulai', 'periodeSelesai', 'judulLaporan', 'subKategoriNama'));
        
        $pdf->setPaper('a4', 'landscape');

        $categoryName = $category->category_name ?? $category->name ?? 'arsip';
        $fileName = 'Daftar-Arsip-Aktif-' . str_replace(' ', '-', strtolower($categoryName)) . '.pdf';

        return $pdf->download($fileName);
    }

    /**
     * Export laporan arsip digital sesuai layout Daftar Arsip Aktif (Excel).
     */
    public function exportReportExcel(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $query = DigitalArchive::where('category_id', $category->id);

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        if ($request->filled('search_digital')) {
            $query->where('archive_name', 'like', '%' . $request->search_digital . '%');
        }

        if ($request->filled('divisi')) {
            $query->where('submiter_name', 'like', '%' . $request->divisi . '%');
        }

        $archives = $query->orderBy('kategori')->orderBy('created_at')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Daftar Arsip');

        // Header Judul Atas
        $sheet->setCellValue('A2', 'ARSIP AKTIF');
        $sheet->getStyle('A2')->getFont()->setBold(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED));

        $tahun = $category->year ?? date('Y');
        $sheet->setCellValue('A4', 'TAHUN ' . $tahun);
        $sheet->getStyle('A4')->getFont()->setBold(true);

        // Keterangan Informasi
        $sheet->setCellValue('A6', 'Pencipta Arsip');
        $sheet->setCellValue('B6', ': Tim Perencanaan dan Pengendalian Anggaran');
        $sheet->setCellValue('A7', 'Unit Kearsipan');
        $sheet->setCellValue('B7', ': Unit Kearsipan II, TVRI Stasiun Kalimantan Selatan');

        // Layout Header Tabel (Baris 8 & 9)
        $sheet->setCellValue('A8', 'No');
        $sheet->setCellValue('B8', "Kode\nKlasifikasi");
        $sheet->setCellValue('C8', 'Indeks 1');
        $sheet->setCellValue('D8', 'Indeks 2');
        $sheet->setCellValue('E8', "No\nItem");
        $sheet->setCellValue('F8', 'Uraian');
        $sheet->setCellValue('G8', 'Tgl Terima');
        $sheet->setCellValue('H8', "Tingkat\nPerkembangan");
        $sheet->setCellValue('I8', 'Jumlah');
        $sheet->setCellValue('J8', 'Retensi Arsip');
        $sheet->setCellValue('J9', 'Aktif');
        $sheet->setCellValue('K9', 'Inaktif');
        $sheet->setCellValue('L8', "Nasib Akhir\nArsip");
        $sheet->setCellValue('M8', "Klasifikasi\nKeamanan");
        $sheet->setCellValue('N8', 'Lokasi Simpan');
        $sheet->setCellValue('O8', 'Keterangan');

        // Merge Header
        $sheet->mergeCells('A8:A9');
        $sheet->mergeCells('B8:B9');
        $sheet->mergeCells('C8:C9');
        $sheet->mergeCells('D8:D9');
        $sheet->mergeCells('E8:E9');
        $sheet->mergeCells('F8:F9');
        $sheet->mergeCells('G8:G9');
        $sheet->mergeCells('H8:H9');
        $sheet->mergeCells('I8:I9');
        $sheet->mergeCells('J8:K8');
        $sheet->mergeCells('L8:L9');
        $sheet->mergeCells('M8:M9');
        $sheet->mergeCells('N8:N9');
        $sheet->mergeCells('O8:O9');

        // Style Header Tabel
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ]
        ];
        $sheet->getStyle('A8:O9')->applyFromArray($headerStyle);

        // Isi Data Tabel
        $rowNumber = 10;
        foreach ($archives as $index => $archive) {
            $uraianVal = !empty(trim((string)($archive->uraian ?? ''))) 
                ? $archive->uraian 
                : '-';

            // Logika Format Retensi Aktif
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

            // Logika Format Retensi Inaktif
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

            $sheet->setCellValue('A' . $rowNumber, $index + 1);
            $sheet->setCellValue('B' . $rowNumber, $archive->kode_klasifikasi ?? '-');
            $sheet->setCellValue('C' . $rowNumber, $archive->indeks1 ?? '-');
            $sheet->setCellValue('D' . $rowNumber, $archive->indeks2 ?? '-');
            $sheet->setCellValue('E' . $rowNumber, $archive->no_item ?? ($index + 1));
            $sheet->setCellValue('F' . $rowNumber, $uraianVal);
            $sheet->setCellValue('G' . $rowNumber, $archive->tgl_terima ? \Carbon\Carbon::parse($archive->tgl_terima)->translatedFormat('d F Y') : '-');
            $sheet->setCellValue('H' . $rowNumber, $archive->tingkat_pertimbangan ?? 'Asli');
            $sheet->setCellValue('I' . $rowNumber, $archive->jumlah_halaman ? $archive->jumlah_halaman . ' Lembar' : '-');
            $sheet->setCellValue('J' . $rowNumber, $retensiAktif);
            $sheet->setCellValue('K' . $rowNumber, $retensiInaktif);
            $sheet->setCellValue('L' . $rowNumber, $archive->nasib_akhir_arsip ?? 'Musnah');
            $sheet->setCellValue('M' . $rowNumber, $archive->klasifikasi_keamanan ?? 'Terbatas');
            
            // Lokasi Simpan (N) Otomatis Keuangan
            $sheet->setCellValue('N' . $rowNumber, 'Server Arsip Keuangan');
            
            $sheet->setCellValue('O' . $rowNumber, $archive->keterangan ?? '-');

            $rowNumber++;
        }

        // Apply Border & Alignment ke Seluruh Data
        $lastRow = $rowNumber - 1;
        if ($lastRow >= 10) {
            $sheet->getStyle('A10:O' . $lastRow)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ]
                ],
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ]
            ]);

            $sheet->getStyle('A10:E' . $lastRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('G10:M' . $lastRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('N10:N' . $lastRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        }

        foreach (range('A', 'O') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $categoryName = $category->category_name ?? $category->name ?? 'arsip';
        $fileName = 'Daftar-Arsip-Aktif-' . str_replace(' ', '-', strtolower($categoryName)) . '.xlsx';

        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(
            function () use ($writer) {
                $writer->save('php://output');
            },
            $fileName,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]
        );
    }
}
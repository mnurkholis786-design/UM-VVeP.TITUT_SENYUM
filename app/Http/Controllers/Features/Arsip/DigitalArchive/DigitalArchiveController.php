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
    public function index(Request $request)
    {
        $kategoriList = DigitalArchive::KATEGORI_LIST;

        $counts = DigitalArchive::selectRaw(
            'kategori, COUNT(*) as total'
        )
            ->whereNotNull('kategori')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // Tangkap kategori yang dipilih saat kartu diklik
        $selectedKategori = $request->input('kategori');
        $archives = null;

        if ($selectedKategori && in_array($selectedKategori, $kategoriList)) {
            $query = DigitalArchive::where('kategori', $selectedKategori);

            // Fitur pencarian dokumen dalam kategori
            if ($request->filled('search')) {
                $query->where('archive_name', 'like', '%' . $request->search . '%');
            }

            $archives = $query->latest()->paginate(10)->appends($request->query());
        }

        return view(
            'features.arsip.digital_archive.digital_archive_dashboard',
            compact('kategoriList', 'counts', 'selectedKategori', 'archives')
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

        // Hitung otomatis jumlah lembar PDF jika belum diisi manual
        $jumlahHalaman = $validated['jumlah_halaman'] ?? null;
        if (empty($jumlahHalaman) && !empty($filePaths)) {
            try {
                $pdf = new \setasign\Fpdi\Fpdi();
                $calcTotal = 0;
                foreach ($filePaths as $f) {
                    $p = Storage::disk('private')->path($f);
                    if (file_exists($p)) {
                        $calcTotal += $pdf->setSourceFile($p);
                    }
                }
                if ($calcTotal > 0) {
                    $jumlahHalaman = $calcTotal;
                }
            } catch (\Throwable $e) {
                // Abaikan jika ada kegagalan membaca
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
            'jumlah_halaman' => $jumlahHalaman,
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
        // Blokir: Hanya Kepala Kantor TVRI yang dilarang mengedit arsip digital
        if (Auth::user()->role === 'Kepala Kantor TVRI') {
            return redirect()->route('digital.show', $id)
                ->with('error', 'Akses ditolak: Anda hanya memiliki hak membaca (read-only) arsip.');
        }

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

        // Hitung otomatis jumlah lembar PDF jika belum diisi manual
        $jumlahHalaman = $validated['jumlah_halaman'] ?? null;
        if (empty($jumlahHalaman) && !empty($allFiles)) {
            try {
                $pdf = new \setasign\Fpdi\Fpdi();
                $calcTotal = 0;
                foreach ($allFiles as $f) {
                    $p = Storage::disk('private')->path($f);
                    if (file_exists($p)) {
                        $calcTotal += $pdf->setSourceFile($p);
                    }
                }
                if ($calcTotal > 0) {
                    $jumlahHalaman = $calcTotal;
                }
            } catch (\Throwable $e) {
                // Abaikan jika ada kegagalan membaca
            }
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
            'jumlah_halaman' => $jumlahHalaman,
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

        // ================= LOGIKA PILIH SEMUA ATAU 1 SUB KATEGORI =================
        if ($request->input('sub_category_id') === 'all') {
            // Ambil semua ID sub kategori yang ada di bawah kategori dan tahun ini
            $allCategoryIds = Category::where('category_name', $category->category_name)
                ->where('year', $category->year)
                ->pluck('id');

            $query = DigitalArchive::whereIn('category_id', $allCategoryIds);
            $subKategoriNama = 'Semua Sub Kategori (' . ($category->category_name ?? 'UP Bendahara') . ')';
        } elseif ($request->filled('sub_category_id')) {
            // Ambil 1 sub kategori spesifik yang dipilih dari dropdown (KKP RM / TUP RM / dll)
            $selectedSub = Category::find($request->sub_category_id);
            $targetId = $selectedSub ? $selectedSub->id : $category->id;

            $query = DigitalArchive::where('category_id', $targetId);
            $subKategoriNama = $selectedSub ? $selectedSub->sub_category : ($category->sub_category ?? '-');
        } else {
            // Default (hanya sub kategori aktif saat ini)
            $query = DigitalArchive::where('category_id', $category->id);
            $subKategoriNama = $category->sub_category ?? '-';
        }
        // ===========================================================================

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
        $judulLaporan = 'LAPORAN ' . strtoupper($category->category_name ?? 'UP BENDAHARA');

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
        // Hilangkan batas waktu eksekusi agar tidak timeout saat export data banyak
        set_time_limit(0);
        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '512M');

        $category = Category::findOrFail($id);

        // Dukung export Semua Sub Kategori atau per Sub Kategori pada Excel
        if ($request->input('sub_category_id') === 'all') {
            $allCategoryIds = Category::where('category_name', $category->category_name)
                ->where('year', $category->year)
                ->pluck('id');
            $query = DigitalArchive::whereIn('category_id', $allCategoryIds);
            $subKategoriNama = 'Semua Sub Kategori (' . ($category->category_name ?? 'UP Bendahara') . ')';
        } elseif ($request->filled('sub_category_id')) {
            $selectedSub = Category::find($request->sub_category_id);
            $targetId = $selectedSub ? $selectedSub->id : $category->id;
            $query = DigitalArchive::where('category_id', $targetId);
            $subKategoriNama = $selectedSub ? $selectedSub->sub_category : ($category->sub_category ?? '-');
        } else {
            $query = DigitalArchive::where('category_id', $category->id);
            $subKategoriNama = $category->sub_category ?? '-';
        }

        $periodeMulai = $request->filled('tanggal_mulai') ? \Carbon\Carbon::parse($request->tanggal_mulai)->format('d/m/Y') : 'Awal';
        $periodeSelesai = $request->filled('tanggal_selesai') ? \Carbon\Carbon::parse($request->tanggal_selesai)->format('d/m/Y') : 'Sekarang';

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

        // --- TAMBAHKAN KODE INI DI SINI ---
        $categoryChildren = [
            'AEC'    => ['AEC.001'],
            'BAH'    => ['BAH.001', 'BAH.002', 'BAH.003'],
            'CBR'    => ['CBR.001'],
            'CBT'    => ['CBT.002'],
            'CDS OP' => ['CDS.001', 'CDS.002', 'CDS.003'],
            'EBA'    => ['EBA.994'],
            'WA'     => ['WA.4376'],
        ];

        if ($request->filled('sub_category')) {
            $query->where('kategori', $request->sub_category);
        } elseif ($request->filled('category')) {
            $selectedCat = $request->category;
            if (isset($categoryChildren[$selectedCat])) {
                $query->whereIn('kategori', $categoryChildren[$selectedCat]);
            } else {
                $query->where('kategori', $selectedCat);
            }
        }
        // ----------------------------------

        $archives = $query->orderBy('kategori')->orderBy('created_at')->get();

        // Deteksi apakah konteks ini adalah UP Bendahara (sama seperti logika halaman detail)
        $isUpBendahara = str_contains(strtoupper($category->category_name ?? ''), 'UP')
            || str_contains(strtoupper($category->sub_category ?? ''), 'UP');

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
        $sheet->setCellValue('D6', 'Sub Kategori');
        $sheet->setCellValue('E6', ': ' . ($subKategoriNama ?? '-'));
        $sheet->setCellValue('D7', 'Periode');
        $sheet->setCellValue('E7', ': ' . $periodeMulai . ' s/d ' . $periodeSelesai);
        $sheet->getStyle('D6:D7')->getFont()->setBold(true);

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
                $retensiAktif = '2 Tahun';
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
                $retensiInaktif = '5 Tahun';
            }

            // Fallback sama persis dengan halaman detail arsip digital
            $kodeKlasifikasiRow = trim($archive->kode_klasifikasi ?? '') ?: ($isUpBendahara ? 'KU.02.03' : '-');
            $indeks1Row = trim($archive->indeks1 ?? '') ?: ($isUpBendahara ? 'Dokumen Keuangan' : '-');

            $sheet->setCellValue('A' . $rowNumber, $index + 1);
            $sheet->setCellValue('B' . $rowNumber, $kodeKlasifikasiRow);
            $sheet->setCellValue('C' . $rowNumber, $indeks1Row);
            $sheet->setCellValue('D' . $rowNumber, $archive->indeks2 ?? '-');
            $sheet->setCellValue('E' . $rowNumber, $archive->no_item ?? ($index + 1));
            $sheet->setCellValue('F' . $rowNumber, $uraianVal);
            // Tanggal Terima: prioritas tgl_terima → tgl_invoice → created_at (sama seperti halaman detail)
            $tglTerimaExcel = '-';
            $rawTglTerima = $archive->getRawOriginal('tgl_terima');
            $rawTglInvoice = $archive->getRawOriginal('tgl_invoice');
            if (!empty($rawTglTerima)) {
                try {
                    $tglTerimaExcel = \Carbon\Carbon::parse($rawTglTerima)->translatedFormat('d F Y');
                } catch (\Throwable $e) {
                    $tglTerimaExcel = $rawTglTerima;
                }
            } elseif (!empty($rawTglInvoice)) {
                try {
                    $tglTerimaExcel = \Carbon\Carbon::parse($rawTglInvoice)->translatedFormat('d F Y');
                } catch (\Throwable $e) {
                    $tglTerimaExcel = $rawTglInvoice;
                }
            } elseif ($archive->created_at) {
                $tglTerimaExcel = \Carbon\Carbon::parse($archive->created_at)->translatedFormat('d F Y');
            }
            $sheet->setCellValue('G' . $rowNumber, $tglTerimaExcel);
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
        $safeSubNama = str_replace([' ', '/', '\\', '(', ')'], '-', strtolower($subKategoriNama ?? ''));
        $fileName = 'Daftar-Arsip-Aktif-' . str_replace(' ', '-', strtolower($categoryName)) . ($safeSubNama ? '-' . $safeSubNama : '') . '.xlsx';
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

    /**
     * Export detail arsip digital satuan ke Excel.
     */
    public function export(string $id)
    {
        $archive = DigitalArchive::findOrFail($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Detail Arsip Digital');

        // Deteksi apakah arsip termasuk UP Bendahara agar nilai standar otomatis terisi
        $isUpBendahara = ($archive->category && str_contains(strtoupper($archive->category->category_name), 'UP'))
            || !empty($archive->no_spby)
            || (isset($archive->category_archive) && str_contains(strtoupper($archive->category_archive->category_name ?? ''), 'UP'));

        // Nilai fallback disesuaikan persis dengan tampilan Detail Arsip
        $kodeKlasifikasi = trim($archive->kode_klasifikasi ?? '') ?: ($isUpBendahara ? 'KU.02.03' : '-');
        $indeks1 = trim($archive->indeks1 ?? '') ?: ($isUpBendahara ? 'Dokumen Keuangan' : '-');
        $tingkatPerkembangan = trim($archive->tingkat_pertimbangan ?? '') ?: ($isUpBendahara ? 'asli' : '-');
        
        $jmlHalamanVal = $archive->jumlah_halaman ?: ($archive->jumlah_halaman_pdf ?? null);
        $jumlahHalaman = $jmlHalamanVal ? $jmlHalamanVal . ' lembar' : '-';

        $retensiAktifVal = $archive->retensi_arsip_aktif ?: ($isUpBendahara ? 2 : null);
        $retensiAktif = $retensiAktifVal ? $retensiAktifVal . ' tahun' : '-';

        $retensiInaktifVal = $archive->retensi_arsip_inaktif ?: ($isUpBendahara ? 5 : null);
        $retensiInaktif = $retensiInaktifVal ? $retensiInaktifVal . ' tahun' : '-';

        $nasibAkhir = trim($archive->nasib_akhir_arsip ?? '') ?: ($isUpBendahara ? 'musnah' : '-');
        $klasifikasiKeamanan = trim($archive->klasifikasi_keamanan ?? '') ?: ($isUpBendahara ? 'terbatas' : '-');
        $status = trim($archive->status ?? '') ?: ($isUpBendahara ? 'terbatas' : 'terbatas');
        $lokasiSimpanServer = trim($archive->lokasi_simpan_server ?? '') ?: 'Keuangan';

        $rows = [
            ['Nama Archive', $archive->archive_name ?? '-'],
            ['Kode Arsip', $archive->archive_code ?? '-'],
            ['Divisi Asal', $archive->from_division ?? '-'],
            ['Kode Klasifikasi', $kodeKlasifikasi],
            ['Indeks 1', $indeks1],
            ['Indeks 2', $archive->indeks2 ?? '-'],
            ['No Item', $archive->no_item ?? '-'],
            ['Nominal', $archive->nominal ? 'Rp ' . number_format($archive->nominal, 0, ',', '.') : '-'],
            ['Uraian', $archive->uraian ?? '-'],
            ['No SPBy', $archive->no_spby ?? '-'],
            ...(!$isUpBendahara ? [
                ['No SPM', $archive->no_spm ?? '-'],
                ['Jenis SPM', $archive->jenis_spm ?? '-'],
            ] : []),
            ['No SP2D', $archive->no_sp2d ?? '-'],
            ['Nilai SP2D', $archive->nilai_sp2d ? 'Rp ' . number_format($archive->nilai_sp2d, 0, ',', '.') : '-'],
            ['Jenis SP2D', $archive->jenis_sp2d ?? '-'],
            ['Tanggal SP2D', $archive->tgl_sp2d ? \Carbon\Carbon::parse($archive->tgl_sp2d)->format('d F Y') : '-'],
            ['Tanggal Selesai SP2D', $archive->tgl_selesai_sp2d ? \Carbon\Carbon::parse($archive->tgl_selesai_sp2d)->format('d F Y') : '-'],
            ['No Kuitansi', $archive->no_kuitansi_display ?? '-'],
            ['Tanggal Kuitansi', $archive->tanggal_kuitansi_display ?? '-'],
            ['No Invoice', $archive->no_invoice ?? '-'],
            ['Tanggal Invoice', $archive->tgl_invoice ? \Carbon\Carbon::parse($archive->tgl_invoice)->format('d F Y') : '-'],
            ['Tanggal Terima', $archive->tanggal_terima_display ?? '-'],
            ['Tingkat Perkembangan', $tingkatPerkembangan],
            ['Jumlah Halaman', $jumlahHalaman],
            ['Retensi Arsip Aktif', $retensiAktif],
            ['Retensi Arsip Inaktif', $retensiInaktif],
            ['Nasib Akhir Arsip', $nasibAkhir],
            ['Klasifikasi Keamanan', $klasifikasiKeamanan],
            ['Status', $status],
            ['Tanggal Pembuangan', $archive->disposal_date ? \Carbon\Carbon::parse($archive->disposal_date)->format('d F Y') : '-'],
            ['Pengaju', $archive->submiter_name ?? '-'],
            ['Divisi Keuangan', $archive->finance_officer_name ?? '-'],
            ['Bendahara', $archive->revenue_officer_name ?? '-'],
            ['Keterangan', $archive->keterangan ?? '-'],
            ['Lokasi Simpan Server', $lokasiSimpanServer],
        ];

        $sheet->setCellValue('A1', 'Field');
        $sheet->setCellValue('B1', 'Nilai');
        $sheet->getStyle('A1:B1')->getFont()->setBold(true);

        $rowNumber = 2;
        foreach ($rows as $row) {
            $sheet->setCellValue('A' . $rowNumber, $row[0]);
            $sheet->setCellValue('B' . $rowNumber, $row[1]);
            $rowNumber++;
        }

        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(40);

        $safeCode = $archive->archive_code
            ? str_replace(['/', '\\'], '-', $archive->archive_code)
            : $archive->id;

        $fileName = 'arsip-digital-' . $safeCode . '.xlsx';
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
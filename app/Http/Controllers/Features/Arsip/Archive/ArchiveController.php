<?php

namespace App\Http\Controllers\Features\Arsip\Archive;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\DocumentFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Html;

class ArchiveController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $folders = DocumentFolder::findOrFail($request->folder_id);
        return view('features.arsip.archive.form-create-file', compact('folders'));
    }

    public function store(Request $request)
    {
        // 1. Proses Upload File Excel
        $excelPath = null;
        $excelOriginalName = null;

        if ($request->hasFile('file_excel')) {
            $excelFile = $request->file('file_excel');
            $excelOriginalName = $excelFile->getClientOriginalName();
            $excelName = time() . '_excel_' . uniqid() . '.' . $excelFile->getClientOriginalExtension();
            $excelFile->storeAs('archive_excel', $excelName, 'private');
            $excelPath = 'archive_excel/' . $excelName;
        }

        // Tentukan status default berdasarkan keberadaan file
        // Jika ada PDF atau ada Excel -> 'Tersedia', jika tidak keduanya -> 'Belum Upload'
        $statusValue = $request->status ?? (($request->hasFile('file_archive') || $excelPath) ? 'Tersedia' : 'Belum Upload');

        // 2. Jika ada file PDF yang diunggah
        if ($request->hasFile('file_archive')) {
            $files = $request->file('file_archive');

            if (is_array($files)) {
                foreach ($files as $file) {
                    $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                    $file->storeAs('archive', $filename, 'private');
                    $path = 'archive/' . $filename;

                    $fileNameValue = $request->file_name 
                        ? $request->file_name . ' - ' . $file->getClientOriginalName() 
                        : $file->getClientOriginalName();

                    ArchiveFile::create([
                        'folder_id'             => $request->folder_id,
                        'file_name'             => $fileNameValue,
                        'file_path'             => $path,
                        'excel_path'            => $excelPath,
                        'kode_klasifikasi'     => $request->kode_klasifikasi,
                        'indeks1'               => $request->indeks1,
                        'indeks2'               => $request->indeks2,
                        'no_item'               => $request->no_item,
                        'uraian'                => $request->uraian,
                        'no_spby'               => $request->no_spby,
                        'no_spm'                => $request->no_spm,
                        'jenis_spm'             => $request->jenis_spm,
                        'no_sp2d'              => $request->no_sp2d,
                        'nilai_sp2d'            => $request->nilai_sp2d,
                        'jenis_sp2d'            => $request->jenis_sp2d,
                        'tgl_sp2d'              => $request->tgl_sp2d,
                        'tgl_selesai_sp2d'      => $request->tgl_selesai_sp2d,
                        'no_invoice'            => $request->no_invoice,
                        'tgl_invoice'           => $request->tgl_invoice,
                        'tgl_terima'            => $request->tgl_terima,
                        'tingkat_pertimbangan'  => $request->tingkat_pertimbangan,
                        'jumlah_halaman'        => $request->jumlah_halaman,
                        'retensi_arsip_aktif'   => $request->retensi_arsip_aktif,
                        'retensi_arsip_inaktif' => $request->retensi_arsip_inaktif,
                        'nasib_akhir_arsip'     => $request->nasib_akhir_arsip,
                        'klasifikasi_keamanan'  => $request->klasifikasi_keamanan,
                        'status'                => $statusValue,
                        'keterangan'            => $request->keterangan,
                        'link_arsip'            => $request->link_arsip,
                    ]);
                }
            } else {
                $filename = time() . '_' . $files->getClientOriginalName();
                $files->storeAs('archive', $filename, 'private');
                $path = 'archive/' . $filename;

                ArchiveFile::create([
                    'folder_id'             => $request->folder_id,
                    'file_name'             => $request->file_name ?? $files->getClientOriginalName(),
                    'file_path'             => $path,
                    'excel_path'            => $excelPath,
                    'kode_klasifikasi'     => $request->kode_klasifikasi,
                    'indeks1'               => $request->indeks1,
                    'indeks2'               => $request->indeks2,
                    'no_item'               => $request->no_item,
                    'uraian'                => $request->uraian,
                    'no_spby'               => $request->no_spby,
                    'no_spm'                => $request->no_spm,
                    'jenis_spm'             => $request->jenis_spm,
                    'no_sp2d'              => $request->no_sp2d,
                    'nilai_sp2d'            => $request->nilai_sp2d,
                    'jenis_sp2d'            => $request->jenis_sp2d,
                    'tgl_sp2d'              => $request->tgl_sp2d,
                    'tgl_selesai_sp2d'      => $request->tgl_selesai_sp2d,
                    'no_invoice'            => $request->no_invoice,
                    'tgl_invoice'           => $request->tgl_invoice,
                    'tgl_terima'            => $request->tgl_terima,
                    'tingkat_pertimbangan'  => $request->tingkat_pertimbangan,
                    'jumlah_halaman'        => $request->jumlah_halaman,
                    'retensi_arsip_aktif'   => $request->retensi_arsip_aktif,
                    'retensi_arsip_inaktif' => $request->retensi_arsip_inaktif,
                    'nasib_akhir_arsip'     => $request->nasib_akhir_arsip,
                    'klasifikasi_keamanan'  => $request->klasifikasi_keamanan,
                    'status'                => $statusValue,
                    'keterangan'            => $request->keterangan,
                    'link_arsip'            => $request->link_arsip,
                ]);
            }
        } else {
            // Jika disimpan tanpa file PDF
            $fallbackFileName = $request->file_name 
                ?? $excelOriginalName 
                ?? ($request->uraian ? 'Arsip - ' . substr($request->uraian, 0, 30) : 'Dokumen Arsip');

            ArchiveFile::create([
                'folder_id'             => $request->folder_id,
                'file_name'             => $fallbackFileName,
                'file_path'             => null,
                'excel_path'            => $excelPath,
                'kode_klasifikasi'     => $request->kode_klasifikasi,
                'indeks1'               => $request->indeks1,
                'indeks2'               => $request->indeks2,
                'no_item'               => $request->no_item,
                'uraian'                => $request->uraian,
                'no_spby'               => $request->no_spby,
                'no_spm'                => $request->no_spm,
                'jenis_spm'             => $request->jenis_spm,
                'no_sp2d'              => $request->no_sp2d,
                'nilai_sp2d'            => $request->nilai_sp2d,
                'jenis_sp2d'            => $request->jenis_sp2d,
                'tgl_sp2d'              => $request->tgl_sp2d,
                'tgl_selesai_sp2d'      => $request->tgl_selesai_sp2d,
                'no_invoice'            => $request->no_invoice,
                'tgl_invoice'           => $request->tgl_invoice,
                'tgl_terima'            => $request->tgl_terima,
                'tingkat_pertimbangan'  => $request->tingkat_pertimbangan,
                'jumlah_halaman'        => $request->jumlah_halaman,
                'retensi_arsip_aktif'   => $request->retensi_arsip_aktif,
                'retensi_arsip_inaktif' => $request->retensi_arsip_inaktif,
                'nasib_akhir_arsip'     => $request->nasib_akhir_arsip,
                'klasifikasi_keamanan'  => $request->klasifikasi_keamanan,
                'status'                => $statusValue,
                'keterangan'            => $request->keterangan,
                'link_arsip'            => $request->link_arsip,
            ]);
        }

        return redirect()->route('folder.show', ['folder' => $request->folder_id])->with('success', 'Berhasil Upload file');
    }

    public function show(string $id)
    {
        $archives = ArchiveFile::where('id', $id)->first();
        return view('features.arsip.archive.archive-show-file', compact('archives'));
    }

    public function edit(string $id)
    {
        $file = ArchiveFile::findOrFail($id);
        return view('features.arsip.archive.archive-file-edit-form', compact('file'));
    }

    public function update(Request $request, string $id)
    {
        $file = ArchiveFile::findOrFail($id);

        $pdfPath = $file->file_path;
        $excelPath = $file->excel_path;

        if ($request->hasFile('file_archive')) {
            if ($file->file_path && Storage::disk('private')->exists($file->file_path)) {
                Storage::disk('private')->delete($file->file_path);
            }

            $uploadedPdf = $request->file('file_archive');
            $pdfFilename = time() . '_' . $uploadedPdf->getClientOriginalName();
            $uploadedPdf->storeAs('archive', $pdfFilename, 'private');

            $pdfPath = 'archive/' . $pdfFilename;
        }

        if ($request->hasFile('file_excel')) {
            if ($file->excel_path && Storage::disk('private')->exists($file->excel_path)) {
                Storage::disk('private')->delete($file->excel_path);
            }

            $uploadedExcel = $request->file('file_excel');
            $excelFilename = time() . '_excel_' . uniqid() . '.' . $uploadedExcel->getClientOriginalExtension();
            $uploadedExcel->storeAs('archive_excel', $excelFilename, 'private');

            $excelPath = 'archive_excel/' . $excelFilename;
        }

        // Tentukan status saat update
        $statusValue = ($pdfPath || $excelPath) ? 'Tersedia' : 'Belum Upload';
        if ($request->filled('status')) {
            $statusValue = $request->status;
        }

        $file->update([
            'folder_id'             => $file->folder_id,
            'file_name'             => $request->file_name ?? $file->file_name,
            'file_path'             => $pdfPath,
            'excel_path'            => $excelPath,
            'kode_klasifikasi'     => $request->kode_klasifikasi,
            'indeks1'               => $request->indeks1,
            'indeks2'               => $request->indeks2,
            'no_item'               => $request->no_item,
            'uraian'                => $request->uraian,
            'no_spby'               => $request->no_spby,
            'no_spm'                => $request->no_spm,
            'jenis_spm'             => $request->jenis_spm,
            'no_sp2d'              => $request->no_sp2d,
            'nilai_sp2d'            => $request->nilai_sp2d,
            'jenis_sp2d'            => $request->jenis_sp2d,
            'tgl_sp2d'              => $request->tgl_sp2d,
            'tgl_selesai_sp2d'      => $request->tgl_selesai_sp2d,
            'no_invoice'            => $request->no_invoice,
            'tgl_invoice'           => $request->tgl_invoice,
            'tgl_terima'            => $request->tgl_terima,
            'tingkat_pertimbangan'  => $request->tingkat_pertimbangan,
            'jumlah_halaman'        => $request->jumlah_halaman,
            'retensi_arsip_aktif'   => $request->retensi_arsip_aktif,
            'retensi_arsip_inaktif' => $request->retensi_arsip_inaktif,
            'nasib_akhir_arsip'     => $request->nasib_akhir_arsip,
            'klasifikasi_keamanan'  => $request->klasifikasi_keamanan,
            'status'                => $statusValue,
            'keterangan'            => $request->keterangan,
            'link_arsip'            => $request->link_arsip,
        ]);

        return redirect()->route('folder.show', ['folder' => $file->folder_id])->with('success', 'File berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $archive = ArchiveFile::findOrFail($id);

        if ($archive->file_path && Storage::disk('private')->exists($archive->file_path)) {
            Storage::disk('private')->delete($archive->file_path);
        }

        if ($archive->excel_path && Storage::disk('private')->exists($archive->excel_path)) {
            Storage::disk('private')->delete($archive->excel_path);
        }

        $archive->delete();

        return redirect()->route('folder.show', ['folder' => $archive->folder_id])->with('success', 'File berhasil Dihapus!');
    }

    /**
     * Helper untuk menemukan lokasi file Excel yang valid (mendukung path relatif, absolut, dan file re-upload).
     */
    private function resolveExcelPath(ArchiveFile $archive): ?string
    {
        if (empty($archive->excel_path)) {
            return null;
        }

        $path = $archive->excel_path;

        // 1. Cek path relatif di disk private
        if (Storage::disk('private')->exists($path)) {
            return Storage::disk('private')->path($path);
        }

        // 2. Cek jika tersimpan path absolut langsung
        if (file_exists($path)) {
            return $path;
        }

        // 3. Jika path absolut Windows, ambil bagian relatifnya
        if (str_contains($path, 'arsip_fisik')) {
            $parts = explode('arsip_fisik', $path);
            $relPath = 'arsip_fisik' . end($parts);
            $relPath = ltrim(str_replace('\\', '/', $relPath), '/');

            if (Storage::disk('private')->exists($relPath)) {
                return Storage::disk('private')->path($relPath);
            }

            // Fallback: cari file excel terbaru di folder tahun tersebut jika file lama ter-replace
            if (preg_match('/arsip_fisik[\/\\\\](\d{4})/', $path, $mYear)) {
                $year = $mYear[1];
                $files = Storage::disk('private')->files('arsip_fisik/' . $year);
                if (!empty($files)) {
                    $categoryFiles = array_filter($files, function ($f) use ($archive) {
                        return str_contains($f, 'category_' . ($archive->folder->category_id ?? ''));
                    });
                    $chosenFile = !empty($categoryFiles) ? end($categoryFiles) : end($files);
                    return Storage::disk('private')->path($chosenFile);
                }
            }
        }

        return null;
    }

    public function downloadExcel(string $id)
    {
        $archive = ArchiveFile::findOrFail($id);
        $fullPath = $this->resolveExcelPath($archive);

        if (!$fullPath || !file_exists($fullPath)) {
            return back()->with('error', 'File Excel tidak ditemukan.');
        }

        return response()->download($fullPath, basename($fullPath));
    }

    public function viewExcel(string $id)
    {
        $archive = ArchiveFile::findOrFail($id);
        $fullPath = $this->resolveExcelPath($archive);

        if (!$fullPath || !file_exists($fullPath)) {
            return back()->with('error', 'File Excel tidak ditemukan.');
        }

        try {
            $spreadsheet = IOFactory::load($fullPath);
            $writer = new Html($spreadsheet);

            return response()->stream(function () use ($writer) {
                echo "<!DOCTYPE html>
                <html>
                <head>
                    <meta charset='utf-8'>
                    <title>Preview Excel Arsip</title>
                    <style>
                        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; padding: 20px; background-color: #f8f9fa; color: #333; }
                        table { border-collapse: collapse; width: 100%; background: #fff; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
                        td, th { border: 1px solid #e2e8f0; text-align: left; padding: 8px 12px; }
                        tr:nth-child(even) { background-color: #f8fafc; }
                    </style>
                </head>
                <body>";
                $writer->save('php://output');
                echo "</body></html>";
            }, 200, [
                'Content-Type' => 'text/html; charset=UTF-8',
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses preview Excel: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers\Features\PPSPM_Verification;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\DigitalArchive;
use App\Models\FundingSource;
use App\Models\Notification;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;
use App\Models\User;

class PPSPMVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // Tab 0: Semua Pengajuan (tanpa filter status)
     $semua = BudgetSubmission::with(['user', 'payment_method'])
         ->latest()
         ->paginate(10, ['*'], 'semua');

        // 1. Tab 1: Dokumen Menunggu Validasi PPSPM (HANYA jenis LS SPM)
        $pengajuans = BudgetSubmission::where('requirements_status', 'Lengkap')
            ->where('verification_status', 0)
            ->whereHas('payment_method', function ($q) {
                $q->where('payment_method_name', 'LIKE', '%LS%');
            })
            ->latest()
            ->paginate(10, ['*'], 'all_submit');

        // 2. Tab 2: Dokumen Telah Disahkan (HANYA riwayat LS SPM yang disahkan PPSPM)
        $my_proses = BudgetSubmission::where('verification_status', 1)
            ->where('is_archive', 0)
            ->whereHas('payment_method', function ($q) {
                $q->where('payment_method_name', 'LIKE', '%LS%');
            })
            ->latest()
            ->paginate(10, ['*'], 'my_proses');

        // 3. Tab 3: Dokumen Sudah Selesai & Diarsipkan
        $diarsipkan = BudgetSubmission::where('is_archive', 1)
            ->latest()
            ->paginate(10, ['*'], 'diarsipkan');

        return view('features.verifikasi_ppspm.list_verifikasi_ppspm', compact('semua', 'pengajuans', 'my_proses', 'diarsipkan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doc = BudgetSubmission::with(['user', 'finance_officer', 'revenue_officer', 'payment_method', 'funding_source'])->findOrFail($id);
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        $cabinets = Cabinet::all();
        return view('features.verifikasi_ppspm.ppspm_verifikasi_check', compact('doc', 'payment_method', 'funding_source', 'cabinets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // untuk pengesahan SPM oleh PPSPM
    {
        $doc = BudgetSubmission::with('payment_method')->findOrFail($id);

        // Blokir: Hanya dokumen LS SPM yang boleh disahkan oleh PPSPM
        $isLS = $doc->payment_method && str_contains(strtoupper($doc->payment_method->payment_method_name), 'LS');
        if (!$isLS) {
            return redirect()
                ->route('validation.index')
                ->with('error', 'Pengajuan dengan metode pembayaran UP tidak memerlukan pengesahan PPSPM dan sudah langsung diteruskan ke Bendahara.');
        }

        // Simpan file baru jika PPSPM mengunggah file bertanda tangan
        if ($request->hasFile('file_pengajuan')) {
            $request->validate([
                'file_pengajuan' => 'mimes:pdf|max:51200|nullable',
            ]);

            if ($doc->path_file_submission && Storage::disk('private')->exists($doc->path_file_submission)) {
                Storage::disk('private')->delete($doc->path_file_submission);
            }

            $file = $request->file('file_pengajuan');
            $fileName = time() . ' ' . $file->getClientOriginalName();
            $path = $file->storeAs('pengajuan', $fileName, 'private');
        } else {
            $path = $doc->path_file_submission;
        }

        // 1. Fitur Stempel TTE & QR dinonaktifkan (menggunakan QR bawaan dokumen Simkeu)
        // if ($path && Storage::disk('private')->exists($path)) {
        //     $this->addQrCodeSignatureToPdf($path, $doc, Auth::user()->name);
        // }

        // 2. Update status: Pengesahan SPM resmi oleh PPSPM (verification_status = 1)
        $doc->update([
            'path_file_submission'    => $path,
            'assigned_payment_method' => $request->payment_method ?? $doc->assigned_payment_method,
            'assigned_funding_source' => $request->funding_source ?? $doc->assigned_funding_source,
            'nominal'                 => $request->biaya ?? $doc->nominal,
            'verification_status'     => 1, // DISAHKAN OLEH PPSPM
        ]);

        // 1. Notifikasi ke Pengaju bahwa SPM telah disahkan
        Notification::create([
            'user_id' => $doc->user_id,
            'title'   => 'SPM Disahkan PPSPM',
            'message' => 'Pengajuan Anda telah <span class="font-semibold text-green-600">disahkan oleh PPSPM</span> dan siap dicairkan oleh Bendahara.',
            'type'    => 'success',
            'url'     => route('submit.show', $doc->id),
        ]);

        // 2. Notifikasi ke Bendahara untuk Pencairan Dana
        $bendaharaUsers = User::where('role', 'Bendahara')->get();
        foreach ($bendaharaUsers as $bendahara) {
            Notification::create([
                'user_id' => $bendahara->id,
                'title'   => 'Pengajuan Siap Dicairkan',
                'message' => 'Pengajuan "' . e($doc->budget_submission_name) . '" telah disahkan PPSPM dan siap diproses.',
                'type'    => 'info',
                'url'     => route('final.show', $doc->id),
            ]);
        }

        return redirect()->route('validation.index')->with('success', 'Dokumen berhasil disahkan dan SPM diteruskan ke Bendahara.');
    }

    public function return(Request $request, string $id) // kembalikan dokumen dengan catatan
    {
        $request->validate([
            'catatan' => 'required|string|max:500',
        ]);

        $doc = BudgetSubmission::findOrFail($id);

        // Update status pengembalian berkas revisi oleh PPSPM
        $doc->update([
            'message'             => $request->catatan, // Simpan catatan revisi dari PPSPM
            'requirements_status' => 'Belum Lengkap',
            'verification_status' => 0,
            'is_marked'           => 0,
            'is_return'           => 1,                 // Tandai sebagai status revisi/dikembalikan
        ]);

        // Kirim notifikasi ke Unit Pengaju
        Notification::create([
            'user_id' => $doc->user_id,
            'title'   => 'Dokumen Perlu Revisi dari PPSPM',
            'message' => 'Catatan dari PPSPM: "' . e($request->catatan) . '"',
            'type'    => 'warning',
            'url'     => route('submit.show', $doc->id),
        ]);

        return redirect()->route('validation.index')->with('success', 'Dokumen berhasil dikembalikan ke pengaju dengan catatan revisi.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function addWatermarkWithKuitansiToPdf(string $filePath, string $kuitansi)
    {
        if (!Storage::disk('private')->exists($filePath)) {
            Log::error('File PDF tidak ditemukan: ' . $filePath);
            throw new \Exception('File PDF tidak ditemukan');
        }

        $fullPath = Storage::disk('private')->path($filePath);

        // --- PROSES GHOSTSCRIPT (START) ---
        $tempFixedPath = $fullPath . '_fixed.pdf';
        $gsBinary = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'gswin64c' : 'gs';

        // Gunakan command yang sama agar coretan tetap muncul
        $command = "{$gsBinary} -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH " .
            "-dPreserveAnnots=false " .
            "-dShowAnnots=true " .
            "-dPDFSETTINGS=/prepress " .
            "-sOutputFile=" . escapeshellarg($tempFixedPath) . " " .
            escapeshellarg($fullPath) . " 2>&1";

        $output = shell_exec($command);

        if (file_exists($tempFixedPath)) {
            rename($tempFixedPath, $fullPath);
        } else {
            Log::error("Ghostscript Gagal. Output: " . $output);
        }
        // --- PROSES GHOSTSCRIPT (END) ---

        $mpdf = new Mpdf([
            'tempDir' => storage_path('app/mpdf'),
        ]);

        // === LOAD FILE PDF ASLI ===
        $pageCount = $mpdf->SetSourceFile($fullPath);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

            $tplId = $mpdf->ImportPage($pageNo);
            $size  = $mpdf->getTemplateSize($tplId);

            $mpdf->AddPageByArray([
                'orientation' => $size['orientation'],
                'width'       => $size['width'],
                'height'      => $size['height'],
            ]);

            $mpdf->UseTemplate($tplId);

            // === GARIS MERAH SOLID DI KIRI ===
            // $mpdf->SetAlpha(0.5);
            // $mpdf->SetDrawColor(255, 0, 0);
            // $mpdf->SetLineWidth(0.5);
            // $mpdf->Line(5, 0, 5, $size['height']);
            // $mpdf->SetAlpha(1);

            // === GARIS MERAH SOLID DI KIRI (LEBIH TIPIS + OPACITY 50%) ===
            $mpdf->SetAlpha(0.5); // Opacity 50%
            $mpdf->SetDrawColor(255, 0, 0); // Merah
            $mpdf->SetLineWidth(0.5); // Lebih tipis (dari 2 jadi 0.5)
            $mpdf->Line(5, 0, 5, $size['height']);
            $mpdf->SetAlpha(1); // Reset opacity

            // === NOMOR KUITANSI VERTIKAL BERULANG (90° ROTASI) DI ATAS GARIS MERAH ===
            $xKuitansi = 5; // Tepat di posisi garis merah (ditimpa)
            $yStart = 10;   // Mulai dari atas
            $spacing = 30;  // Jarak antar teks kuitansi (dalam mm)

            $mpdf->SetFont('Arial', 'B', 4); // Lebih kecil (dari 10 jadi 8)
            $mpdf->SetTextColor(0, 0, 0); // Hitam (dari merah jadi hitam)
            $mpdf->SetAlpha(0.8); // Opacity 80% (dari 0.7 jadi 0.8)

            // Hitung berapa kali perlu diulang berdasarkan tinggi halaman
            $repeatCount = ceil(($size['height'] - $yStart) / $spacing);

            for ($i = 0; $i < $repeatCount; $i++) {
                $yPosition = $yStart + ($i * $spacing);

                // Pastikan tidak melebihi tinggi halaman
                if ($yPosition > $size['height']) {
                    break;
                }

                // Rotate text 90 derajat
                $mpdf->Rotate(90, $xKuitansi, $yPosition);
                $mpdf->SetXY($xKuitansi, $yPosition);
                $mpdf->Cell(0, 0, $kuitansi, 0, 0, 'L');
                $mpdf->Rotate(0); // Reset rotation
            }

            // === WATERMARK GAMBAR (60% HALAMAN, CENTER, OPACITY 50%) ===
            $watermarkPath = storage_path('app/public/images/watermark.png');

            if (file_exists($watermarkPath)) {

                [$imgW, $imgH] = getimagesize($watermarkPath);
                $imgRatio = $imgW / $imgH;

                // Target maksimum 60% halaman (dari 80% jadi 60%)
                $maxW = $size['width'] * 0.6;
                $maxH = $size['height'] * 0.6;

                // Hitung ukuran dengan menjaga rasio
                if ($maxW / $maxH > $imgRatio) {
                    // tinggi pembatas
                    $wmHeight = $maxH;
                    $wmWidth  = $wmHeight * $imgRatio;
                } else {
                    // lebar pembatas
                    $wmWidth  = $maxW;
                    $wmHeight = $wmWidth / $imgRatio;
                }

                // Center posisi
                $x = ($size['width']  - $wmWidth)  / 2;
                $y = ($size['height'] - $wmHeight) / 2;

                $mpdf->SetAlpha(0.2); // Opacity 50% (dari 0.2 jadi 0.5)
                $mpdf->Image($watermarkPath, $x, $y, $wmWidth, $wmHeight);
                $mpdf->SetAlpha(1); // Reset opacity
            }

            $mpdf->SetAlpha(1);
            $mpdf->SetTextColor(0, 0, 0); // Reset warna
        }

        $mpdf->Output($fullPath, 'F');

        Log::info('Watermark dengan kuitansi PDF berhasil: ' . $filePath . ' | Kuitansi: ' . $kuitansi);
    }
        /**
     * Menampilkan halaman publik info keaslian dokumen saat QR Code di-scan kamera HP
     */
    public function verify_public(string $id)
    {
        $doc = BudgetSubmission::with(['user', 'finance_officer'])->findOrFail($id);
        return view('features.verifikasi_ppspm.verify_public', compact('doc'));
    }

    /**
     * Menempelkan Stempel TTE Digital & QR Code resmi di sudut kanan bawah halaman terakhir PDF
     */
    private function addQrCodeSignatureToPdf(string $filePath, BudgetSubmission $doc, string $ppspmName): void
    {
        $fullPath = Storage::disk('private')->path($filePath);
        $tempFixedPath = $fullPath . '_fixed.pdf';

        // Ratakan layer PDF dengan Ghostscript agar kompatibel dengan mPDF
        $gsBinary = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? 'gswin64c' : 'gs';
        $command = "{$gsBinary} -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -dPreserveAnnots=false -dShowAnnots=true -dPDFSETTINGS=/prepress -sOutputFile=" . escapeshellarg($tempFixedPath) . " " . escapeshellarg($fullPath) . " 2>&1";
        shell_exec($command);

        if (file_exists($tempFixedPath)) {
            rename($tempFixedPath, $fullPath);
        }

        // Dapatkan gambar QR Code dari URL verifikasi
        $verifyUrl = route('spm.verify', $doc->id);
        $qrApiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($verifyUrl);

        $ch = curl_init($qrApiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $qrBinary = curl_exec($ch);
        curl_close($ch);

        $tempQrPath = sys_get_temp_dir() . '/qr_' . $doc->id . '.png';
        if ($qrBinary) {
            file_put_contents($tempQrPath, $qrBinary);
        }

        // Buka PDF dan tempelkan stempel TTE
        $mpdf = new Mpdf([
            'tempDir' => storage_path('app/mpdf'),
        ]);

        $pageCount = $mpdf->SetSourceFile($fullPath);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $tplId = $mpdf->ImportPage($pageNo);
            $size = $mpdf->GetTemplateSize($tplId);

            $mpdf->AddPageByArray([
                'orientation' => $size['orientation'],
                'width'       => $size['width'],
                'height'      => $size['height'],
            ]);
            $mpdf->UseTemplate($tplId);

            // Tempelkan kotak stempel TTE HANYA di halaman terakhir
            if ($pageNo === $pageCount && file_exists($tempQrPath)) {
                $stampWidth = 65;
                $stampHeight = 22;
                $x = $size['width'] - $stampWidth - 10;
                $y = $size['height'] - $stampHeight - 12;

                // Box Border Biru Navy TVRI
                $mpdf->SetDrawColor(0, 58, 143);
                $mpdf->SetLineWidth(0.3);
                $mpdf->Rect($x, $y, $stampWidth, $stampHeight, 'D');

                // Gambar QR Code
                $qrSize = 18;
                $mpdf->Image($tempQrPath, $x + 2, $y + 2, $qrSize, $qrSize, 'png');

                // Teks Pengesahan Digital
                $mpdf->SetFont('Arial', 'B', 6);
                $mpdf->SetTextColor(0, 58, 143);
                $mpdf->SetXY($x + $qrSize + 4, $y + 3);
                $mpdf->Cell($stampWidth - $qrSize - 5, 3, 'DIVERIFIKASI ELEKTRONIK', 0, 1, 'L');

                $mpdf->SetFont('Arial', '', 5);
                $mpdf->SetTextColor(50, 50, 50);
                $mpdf->SetX($x + $qrSize + 4);
                $mpdf->Cell($stampWidth - $qrSize - 5, 3, 'PPSPM TVRI KALSEL', 0, 1, 'L');

                $mpdf->SetX($x + $qrSize + 4);
                $mpdf->Cell($stampWidth - $qrSize - 5, 3, 'Oleh: ' . substr($ppspmName, 0, 22), 0, 1, 'L');

                $mpdf->SetX($x + $qrSize + 4);
                $mpdf->Cell($stampWidth - $qrSize - 5, 3, 'Tgl: ' . now()->translatedFormat('d/m/Y H:i') . ' WITA', 0, 1, 'L');

                $mpdf->SetFont('Arial', 'I', 4.5);
                $mpdf->SetTextColor(120, 120, 120);
                $mpdf->SetX($x + $qrSize + 4);
                $mpdf->Cell($stampWidth - $qrSize - 5, 3, 'Scan QR cek keaslian berkas', 0, 1, 'L');
            }
        }

        $mpdf->Output($fullPath, 'F');

        if (file_exists($tempQrPath)) {
            @unlink($tempQrPath);
        }
    }
}

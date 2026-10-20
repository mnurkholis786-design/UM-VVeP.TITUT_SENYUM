<?php

use App\Http\Controllers\Admin\AccountManageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArchiveFileController;
use App\Http\Controllers\Admin\FundingSourceController;
use App\Http\Controllers\Admin\PaymentMethodController;

use App\Http\Controllers\Bendahara\BendaharaController;
use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Features\Arsip\Archive\ArchiveController;
use App\Http\Controllers\Features\Arsip\ArsipController;
use App\Http\Controllers\Features\Arsip\Cabinet\CabinetController;
use App\Http\Controllers\Features\Arsip\Category\CategoryController;
use App\Http\Controllers\Features\Arsip\DigitalArchive\DigitalArchiveController;
use App\Http\Controllers\Features\Arsip\Folder\FolderController;
use App\Http\Controllers\Features\Arsip\Rack\RackController;
use App\Http\Controllers\Features\Arsip\SubCategory\SubCategoryController;
use App\Http\Controllers\Features\Arsip\Year\YearController;

use App\Http\Controllers\Features\File_Access\ArchiveFileAccessController;
use App\Http\Controllers\Features\File_Access\FileAccessController;

use App\Http\Controllers\Features\Final_Verification\FinalVerificationController;
use App\Http\Controllers\Features\Final_Verification\SearchFinalVerificationController;

use App\Http\Controllers\Features\Pengajuan\ReturnSubmissionController;
use App\Http\Controllers\Features\Pengajuan\SubmissionController;

use App\Http\Controllers\Features\PPSPM_Verification\PPSPMVerificationController;
use App\Http\Controllers\Features\PPSPM_Verification\SearchPPSPMController;

use App\Http\Controllers\Features\Verifikasi\SearchVerificationController;
use App\Http\Controllers\Features\Verifikasi\VerificationController;

use App\Http\Controllers\Kepala\KepalaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PPSPM\PPSPMController;

use App\Http\Controllers\User\BudgetSubmissionController;

use App\Models\BudgetSubmission;
use App\Models\DigitalArchive;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/*
|--------------------------------------------------------------------------
| ARSIP FISIK EXCEL (MANAGE, PREVIEW, DOWNLOAD & DELETE)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Halaman Khusus Manajemen CRUD Arsip Fisik
    Route::get(
        '/category/{id}/arsip-fisik',
        [CategoryController::class, 'manageArsipFisik']
    )->name('category.manageArsipFisik');

    Route::get(
    '/category/{id}/arsip-fisik-files/{tahun}',
    [CategoryController::class, 'arsipFisikFiles']
)->name('category.arsipFisikFiles');

    // Upload / Replace Arsip Fisik
    Route::post(
        '/category/{id}/upload-arsip-fisik',
        [CategoryController::class, 'uploadArsipFisik']
    )->name('category.uploadArsipFisik');

    // Update / Ganti Nama Tahun Arsip
    Route::put(
        '/category/{id}/update-tahun-arsip-fisik/{tahun}',
        [CategoryController::class, 'updateTahunArsip']
    )->name('category.updateTahunArsip');

   // Preview Halaman
    Route::get(
        '/category/preview-arsip-fisik/{id}/{tahun}',
        [CategoryController::class, 'previewArsipFisik']
    )->name('category.previewArsipFisik');

    // Stream Raw File untuk JavaScript
    Route::get(
        '/category/stream-arsip-fisik/{id}/{tahun}',
        [CategoryController::class, 'streamArsipFisik']
    )->name('category.streamArsipFisik');

    // Download Arsip Fisik
    Route::get(
        '/category/download-arsip-fisik/{id}/{tahun}',
        [CategoryController::class, 'downloadArsipFisik']
    )->name('category.downloadArsipFisik');

    // Delete Arsip Fisik (Hapus Berkas & Kartu Tahun)
    Route::delete(
        '/category/delete-arsip-fisik/{id}/{tahun}',
        [CategoryController::class, 'deleteArsipFisik']
    )->name('category.deleteArsipFisik');

});

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| HALAMAN WELCOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {

    $role = Auth::user()->role;

    if ($role == "Admin") {

        return redirect()->route('admin.dashboard');

    } elseif ($role == "Keuangan") {

        return redirect()->route('keuangan.dashboard');

    } elseif ($role == "Bendahara") {

        return redirect()->route('bendahara.dashboard');

    } elseif ($role == "PPSPM") {

        return redirect()->route('PPSPM.dashboard');

    } elseif ($role == "Kepala Kantor TVRI") {

        return redirect()->route('kepala.dashboard');

     } elseif ($role == "kosong" || empty($role)) {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')
            ->withErrors(['email' => 'Akun Anda sedang menunggu penetapan Role/Divisi oleh Administrator.']);

    } else {

        return redirect()->route('user.dashboard');

    }

})->name('dashboard');


/*
|--------------------------------------------------------------------------
| DASHBOARD BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
    '/admin/dashboard',
    [AdminController::class, 'index']
)->middleware('role:Admin')->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | KEUANGAN DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/keuangan/dashboard',
        [KeuanganController::class, 'index']
    )->name('keuangan.dashboard');


    /*
    |--------------------------------------------------------------------------
    | BENDAHARA DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/bendahara/dashboard',
        [BendaharaController::class, 'index']
    )->name('bendahara.dashboard');


    /*
    |--------------------------------------------------------------------------
    | PPSPM DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/ppspm/dashboard',
        [PPSPMController::class, 'index']
    )->name('PPSPM.dashboard');


    /*
    |--------------------------------------------------------------------------
    | USER DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/user/dashboard',
        [UserController::class, 'index']
    )->name('user.dashboard');


    /*
    |--------------------------------------------------------------------------
    | KEPALA DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/kepala/dashboard',
        [KepalaController::class, 'index']
    )->name('kepala.dashboard');

});


/*
|--------------------------------------------------------------------------
| PROFILE & NOTIFICATION
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | NOTIFICATION
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/notifications',
        [NotificationController::class, 'index']
    )->name('notifications.index');

    Route::post(
        '/notifications/{id}/read',
        [NotificationController::class, 'markAsRead']
    )->name('notifications.read');

    Route::post(
        '/notifications/read-all',
        [NotificationController::class, 'markAllAsRead']
    )->name('notifications.readAll');

    Route::delete(
        '/notifications/{id}',
        [NotificationController::class, 'destroy']
    )->name('notifications.delete');

    Route::delete(
        '/notifications/read/clear',
        [NotificationController::class, 'deleteRead']
    )->name('notifications.deleteRead');

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| FITUR UTAMA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PENGAJUAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/submit',
        SubmissionController::class
    );

    Route::put(
        '/submit/fixing/{id}',
        [ReturnSubmissionController::class, 'fixing']
    )->name('submit.fixing');

    Route::put(
        '/keuangan/perbaiki/{id}',
        [ReturnSubmissionController::class, 'fixing']
    )->name('keuangan.perbaiki');


    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/verification/search',
        [SearchVerificationController::class, 'search']
    )->name('verification.search');

    Route::resource(
        '/verification',
        VerificationController::class
    );


    /*
    |--------------------------------------------------------------------------
    | FINAL VERIFICATION
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/final/search',
        [SearchFinalVerificationController::class, 'search']
    )->name('final.search');

    Route::resource(
        '/final',
        FinalVerificationController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PPSPM VALIDATION
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/validation/search',
        [SearchPPSPMController::class, 'search']
    )->name('validation.search');

    Route::put(
        '/validation/return/{id}',
        [PPSPMVerificationController::class, 'return']
    )->name('validation.return');

    Route::resource(
        '/validation',
        PPSPMVerificationController::class
    );


    /*
    |--------------------------------------------------------------------------
    | FILE ACCESS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/file/stream/{id}',
        [FileAccessController::class, 'stream']
    )->name('file.stream');

    Route::get(
        '/file/download/{id}',
        [FileAccessController::class, 'download']
    )->name('file.download');

    Route::get(
        '/file/metadata/{id}',
        [FileAccessController::class, 'download_metadata']
    )->name('file.access.metadata');


    /*
    |--------------------------------------------------------------------------
    | DIGITAL ARCHIVE FILE ACCESS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/file/stream/digital/{id}/{index?}',
        [ArchiveFileAccessController::class, 'stream_digital_archive']
    )->name('archive.digital.stream');

    Route::get(
        '/file/download/digital/{id}/{index?}',
        [ArchiveFileAccessController::class, 'download_digital_archive']
    )->name('archive.digital.download');


    /*
    |--------------------------------------------------------------------------
    | ARCHIVE FILE ACCESS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/file/stream/archive/{id}',
        [ArchiveFileAccessController::class, 'stream_archive']
    )->name('archive.stream');

    Route::get(
        '/file/download/archive/{id}',
        [ArchiveFileAccessController::class, 'download_archive']
    )->name('archive.download');

    Route::get(
        '/archive/{id}/excel-view',
        [ArchiveController::class, 'viewExcel']
    )->name('archive.excel.view');

    Route::get(
        '/archive/{id}/excel-download',
        [ArchiveController::class, 'downloadExcel']
    )->name('archive.excel.download');


    /*
    |--------------------------------------------------------------------------
    | ARSIP
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/arsip',
        ArsipController::class
    );

    Route::resource(
        '/cabinet',
        CabinetController::class
    );

    Route::resource(
        '/category',
        CategoryController::class
    );

    Route::resource(
        '/subcategory',
        SubCategoryController::class
    );

    Route::resource(
        '/year',
        YearController::class
    );

    Route::resource(
        '/rack',
        RackController::class
    );

    Route::resource(
        '/folder',
        FolderController::class
    );


    /*
    |--------------------------------------------------------------------------
    | DIGITAL ARCHIVE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/digital',
        [DigitalArchiveController::class, 'index']
    )->name('digital.index');

    Route::get(
        '/digital/create',
        [DigitalArchiveController::class, 'create']
    )->name('digital.create');

    Route::post(
        '/digital',
        [DigitalArchiveController::class, 'store']
    )->name('digital.store');

    Route::get(
        '/digital/export/{id}',
        [DigitalArchiveController::class, 'export']
    )->name('digital.export');

    Route::get(
        '/year/{id}/export-pdf',
        [DigitalArchiveController::class, 'exportReportPdf']
    )->name('digital.report.pdf');

    Route::get(
        '/digital-archive/report-excel/{id}',
        [DigitalArchiveController::class, 'exportReportExcel']
    )->name('digital.report.excel');

    Route::get(
        '/digital/{id}/edit',
        [DigitalArchiveController::class, 'edit']
    )->name('digital.edit');

    Route::get(
        '/digital/{id}',
        [DigitalArchiveController::class, 'show']
    )->name('digital.show');

    Route::put(
        '/digital/{id}',
        [DigitalArchiveController::class, 'update']
    )->name('digital.update');

    Route::delete(
        '/digital/{id}',
        [DigitalArchiveController::class, 'destroy']
    )->name('digital.destroy');

    Route::resource(
        '/archive',
        ArchiveController::class
    );

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {

    Route::get(
        '/admin/search',
        [AdminController::class, 'search_archive']
    )->name('admin.search');

    Route::get(
        '/input/archive',
        [AdminController::class, 'input_archive']
    )->name('admin.archive');

    Route::get(
        '/kelola/user',
        [AdminController::class, 'kelola_user']
    )->name('admin.kelola');

    Route::get(
        '/setting/environment',
        [AdminController::class, 'environment']
    )->name('admin.envi');

    Route::get(
        '/administrator/report',
        [AdminController::class, 'report']
    )->name('admin.report');

    Route::get(
        '/administrator/report_account',
        [AdminController::class, 'report_account_submission']
    )->name('admin.report_account');

    Route::get(
        '/administrator/report_status',
        [AdminController::class, 'report_count_status']
    )->name('admin.report_status');

});

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::get(
    '/user/monitor',
    [SubmissionController::class, 'monitor']
)->name('user.monitoring');

Route::get(
    '/user/report',
    [UserController::class, 'report']
)->name('user.report');

Route::get(
    '/user/report/laporan_pengajuan',
    [UserController::class, 'report_submission']
)->name('laporan.user.pengajuan');

Route::get(
    '/user/report/laporan_pengajuan_nominal',
    [UserController::class, 'report_submit_nominal']
)->name('laporan.user.pengajuan_nominal');


/*
|--------------------------------------------------------------------------
| KEUANGAN
|--------------------------------------------------------------------------
*/

Route::get(
    '/keuangan/input',
    [KeuanganController::class, 'input_arsip']
)->name('keuangan.input');

Route::put(
    '/keuangan/update/{id}',
    [BudgetSubmissionController::class, 'update_check']
)->name('keuangan.checkandupate');

Route::get(
    '/keuangan/report',
    [KeuanganController::class, 'report']
)->name('keuangan.report');

Route::get(
    '/keuangan/report/all_submission',
    [KeuanganController::class, 'report_all_submission']
)->name('keuangan.report.semua_pengajuan');

Route::get(
    '/keuangan/report/verify_submission',
    [KeuanganController::class, 'report_verification_submission']
)->name('keuangan.report.pengajuan_diverifikasi');


/*
|--------------------------------------------------------------------------
| BENDAHARA
|--------------------------------------------------------------------------
*/

Route::get(
    '/bendahara/sign/{id}',
    [BendaharaController::class, 'document_sign']
)->name('bendahara.sign');

Route::put(
    '/bendahara/verifikasi/{id}',
    [BudgetSubmissionController::class, 'final_verification']
)->name('bendahara.verification');

Route::get(
    '/bendahara/report',
    [BendaharaController::class, 'report']
)->name('bendahara.report');

Route::get(
    '/bendahara/report_sign',
    [BendaharaController::class, 'report_sign_submission']
)->name('bendahara.report_sign');

Route::get(
    '/bendahara/report_sign_nominal',
    [BendaharaController::class, 'report_sign_submission_nominal']
)->name('bendahara.report_sign_nominal');

Route::get(
    '/bendahara/report_sign_all',
    [BendaharaController::class, 'report_all_sign_submission']
)->name('bendahara.report_sign_all');


/*
|--------------------------------------------------------------------------
| KEPALA
|--------------------------------------------------------------------------
*/

Route::get(
    '/kepala/report',
    [KepalaController::class, 'report']
)->name('kepala.report');

Route::get(
    '/kepala/report_aktif',
    [KepalaController::class, 'report_aktif']
)->name('kepala.report_aktif');

Route::get(
    '/kepala/report_approved',
    [KepalaController::class, 'report_approved']
)->name('kepala.report_approved');


/*
|--------------------------------------------------------------------------
| DOCUMENT / ACCOUNT / PAYMENT / FUNDING
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {

    Route::resource(
        '/account',
        AccountManageController::class
    );

    Route::resource(
        '/payment',
        PaymentMethodController::class
    );

    Route::resource(
        '/funding',
        FundingSourceController::class
    );

});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource(
        '/document/file',
        ArchiveFileController::class
    );

    Route::resource(
        '/pengajuan',
        BudgetSubmissionController::class
    );

});


/*
|--------------------------------------------------------------------------
| FIX EXCEL CHECKLIST
|--------------------------------------------------------------------------
*/

Route::get('/fix-all-excel-checklist', function () {

    $submissions = BudgetSubmission::all();

    $count = 0;

    $standardDocuments = [

        'Pembebanan',
        'SPBy',
        'Kuitansi/Bukti Pembayaran',
        'Kuitansi Rincian Biaya',
        'Verifikasi Realisasi',
        'Rencana Kebutuhan Dana',
        'Surat Tugas',
        'Bukti Potong Pajak',
        'Disposisi Kepala Stasiun',
        'Surat Permohonan Kegiatan',
        'Nota Dinas Permohonan',
        'Daftar Hadir',
        'Notula / Laporan Kegiatan',
        'Dokumentasi Kegiatan',
        'Surat Pernyataan Tanggung Jawab Belanja (SPTJB)',
        'Faktur Pajak / SSP',
        'Billing Pembayaran',
        'Surat Setoran Bukan Pajak (SSBP)',
        'Ringkasan Kontrak / SPK',
        'Berita Acara Serah Terima (BAST)',
        'Berita Acara Pembayaran (BAP)',
        'Surat Permohonan Pembayaran (SPP)',
        'Surat Perintah Membayar (SPM)',
        'Surat Perintah Pencairan Dana (SP2D)',
        'Foto Copy KTP/NPWP',
        'Surat Penunjukan Pengisi Acara',
        'Standar Dokumen Pengadaan B/J',
        'Berita Acara Penyelesaian Pengisi Acara',
        'Dokumentasi Pendukung Lainnya'

    ];


    foreach ($submissions as $item) {

        if (
            $item->path_file_requirements_status &&
            Storage::disk('private')->exists(
                $item->path_file_requirements_status
            )
        ) {

            $filePath = Storage::disk('private')
                ->path($item->path_file_requirements_status);

            $spreadsheet = IOFactory::load($filePath);

            $worksheet = $spreadsheet->getActiveSheet();


            $worksheet->setCellValue(
                'B7',
                'Routing Slip'
            );


            foreach ($standardDocuments as $index => $docName) {

                $rowNumber = 8 + $index;

                $worksheet->setCellValue(
                    'B' . $rowNumber,
                    $docName
                );

            }


            $writer = new Xlsx($spreadsheet);

            $writer->save($filePath);

            $count++;
        }
    }


    return "Berhasil memperbaiki baris 7 sampai 36 untuk $count file Excel pengajuan!";

});


/*
|--------------------------------------------------------------------------
| FIX EXCEL SHIFT BACK
|--------------------------------------------------------------------------
*/

Route::get('/fix-excel-shift-back', function () {

    $submissions = BudgetSubmission::all();

    $count = 0;


    foreach ($submissions as $item) {

        if (
            $item->path_file_requirements_status &&
            Storage::disk('private')->exists(
                $item->path_file_requirements_status
            )
        ) {

            $filePath = Storage::disk('private')
                ->path($item->path_file_requirements_status);

            $spreadsheet = IOFactory::load($filePath);

            $worksheet = $spreadsheet->getActiveSheet();


            for ($i = 7; $i <= 35; $i++) {

                $targetRow = $i + 1;


                $worksheet->setCellValue(
                    'D' . $targetRow,
                    $worksheet->getCell('D' . $i)->getValue()
                );

                $worksheet->setCellValue(
                    'E' . $targetRow,
                    $worksheet->getCell('E' . $i)->getValue()
                );

                $worksheet->setCellValue(
                    'F' . $targetRow,
                    $worksheet->getCell('F' . $i)->getValue()
                );

                $worksheet->setCellValue(
                    'G' . $targetRow,
                    $worksheet->getCell('G' . $i)->getValue()
                );

                $worksheet->setCellValue(
                    'H' . $targetRow,
                    $worksheet->getCell('H' . $i)->getValue()
                );

                $worksheet->setCellValue(
                    'I' . $targetRow,
                    $worksheet->getCell('I' . $i)->getValue()
                );

            }


            /*
            |--------------------------------------------------------------------------
            | DEFAULT ROUTING SLIP
            |--------------------------------------------------------------------------
            */

            $worksheet->setCellValue(
                'B7',
                'Routing Slip'
            );

            $worksheet->setCellValue(
                'D7',
                'Y'
            );

            $worksheet->setCellValue(
                'E7',
                null
            );

            $worksheet->setCellValue(
                'F7',
                null
            );

            $worksheet->setCellValue(
                'G7',
                'Y'
            );

            $worksheet->setCellValue(
                'H7',
                null
            );

            $worksheet->setCellValue(
                'I7',
                null
            );


            $writer = new Xlsx($spreadsheet);

            $writer->save($filePath);

            $count++;

        }

    }


    return "Berhasil merapikan posisi data $count file Excel kembali sinkron!";

});
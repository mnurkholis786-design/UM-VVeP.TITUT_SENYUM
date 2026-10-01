<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class UserController extends Controller
{
    /**
     * DASHBOARD USER
     */
    public function index()
    {
        $userId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | TOTAL PENGAJUAN
        |--------------------------------------------------------------------------
        | Menghitung seluruh pengajuan milik user yang sedang login.
        */
        $all_submit = BudgetSubmission::where('user_id', $userId)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | BELUM LENGKAP
        |--------------------------------------------------------------------------
        | Pengajuan yang:
        | - status kelengkapan = Belum Lengkap
        | - belum diverifikasi
        |
        | Ini disamakan dengan kategori "submit dalam Proses"
        | pada halaman Monitoring.
        */
        $belum_lengkap = BudgetSubmission::where('user_id', $userId)
            ->where('requirements_status', 'Belum Lengkap')
            ->where('verification_status', 0)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | BELUM DIVERIFIKASI
        |--------------------------------------------------------------------------
        | Pengajuan yang:
        | - masih berstatus "Belum Diperiksa"
        | - belum diverifikasi
        |
        | Pada halaman Monitoring, pengajuan baru ditampilkan dengan:
        | "Belum Diperiksa" + "Belum Diverifikasi".
        */
        $belum_diverifikasi = BudgetSubmission::where('user_id', $userId)
            ->where('requirements_status', 'Belum Diperiksa')
            ->where('verification_status', 0)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | SELESAI
        |--------------------------------------------------------------------------
        | Pengajuan yang:
        | - persyaratan sudah Lengkap
        | - sudah diverifikasi
        */
        $selesai = BudgetSubmission::where('user_id', $userId)
            ->where('requirements_status', 'Lengkap')
            ->where('verification_status', 1)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | PENGAJUAN TERBARU
        |--------------------------------------------------------------------------
        | Menampilkan 5 pengajuan terbaru milik user.
        */
        $submission_new = BudgetSubmission::where('user_id', $userId)
            ->latest()
            ->paginate(5, ['*'], 'new_submit');


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN DASHBOARD
        |--------------------------------------------------------------------------
        */
        return view('user.user-dashboard', compact(
            'all_submit',
            'belum_lengkap',
            'belum_diverifikasi',
            'selesai',
            'submission_new'
        ));
    }


    /**
     * WORKLIST
     *
     * Method lama.
     * Tidak dipakai lagi oleh Dashboard.
     */
    public function worklist()
    {
        $proses_submissions = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->get();

        $all_submissions = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(
                10,
                ['*'],
                'all_submit'
            );

        $archive_submit = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->where('is_archive', 1)
            ->paginate(
                10,
                ['*'],
                'archive_submit'
            );

        return view(
            'features.pengajuan.submit_monitoring',
            compact(
                'proses_submissions',
                'all_submissions',
                'archive_submit'
            )
        );
    }


    /**
     * REPORT
     */
    public function report(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | REPORT DENGAN FILTER TANGGAL
        |--------------------------------------------------------------------------
        */
        if (
            isset($request->from_date) &&
            isset($request->target_date)
        ) {
            $submission = BudgetSubmission::with('user')
                ->where('user_id', Auth::id())
                ->whereBetween(
                    'updated_at',
                    [
                        $request->from_date,
                        $request->target_date
                    ]
                )
                ->paginate(
                    10,
                    ['*'],
                    'submit_result_filter'
                );

            return view(
                'user.report.report',
                compact('submission')
            );
        }


        /*
        |--------------------------------------------------------------------------
        | REPORT TANPA FILTER
        |--------------------------------------------------------------------------
        */
        $submission = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->paginate(
                10,
                ['*'],
                'result_no_filter'
            );

        return view(
            'user.report.report',
            compact('submission')
        );
    }


    /**
     * REPORT SEMUA PENGAJUAN
     */
    public function report_submission(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA PENGAJUAN
        |--------------------------------------------------------------------------
        */
        $pengajuan = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->whereBetween(
                'updated_at',
                [
                    $request->from_date,
                    $request->target_date
                ]
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA UNTUK PDF
        |--------------------------------------------------------------------------
        */
        $data = [
            'title' => 'Laporan Semua Pengajuan Divisi ',
            'pengajuan' => $pengajuan,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path(
                'app/public/images/watermark.png'
            ),
        ];


        /*
        |--------------------------------------------------------------------------
        | RENDER VIEW PDF
        |--------------------------------------------------------------------------
        */
        $html = view(
            'user.report.submission_report',
            $data
        )->render();


        /*
        |--------------------------------------------------------------------------
        | GENERATE PDF
        |--------------------------------------------------------------------------
        */
        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);

        return response(
            $mpdf->Output(
                'Laporan Pengajuan.pdf',
                'S'
            )
        )->header(
            'Content-Type',
            'application/pdf'
        );
    }


    /**
     * REPORT NOMINAL
     */
    public function report_submit_nominal(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL PENGAJUAN YANG SUDAH DIARSIPKAN
        |--------------------------------------------------------------------------
        */
        $pengajuan = BudgetSubmission::with('user')
            ->where('user_id', Auth::id())
            ->where('is_archive', 1)
            ->whereBetween(
                'updated_at',
                [
                    $request->from_date,
                    $request->target_date
                ]
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | HITUNG TOTAL NOMINAL
        |--------------------------------------------------------------------------
        */
        $totalNominal = $pengajuan->sum('nominal');


        /*
        |--------------------------------------------------------------------------
        | DATA UNTUK PDF
        |--------------------------------------------------------------------------
        */
        $data = [
            'title' => 'Laporan Semua Pengajuan Divisi ',
            'pengajuan' => $pengajuan,
            'totalNominal' => $totalNominal,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path(
                'app/public/images/watermark.png'
            ),
        ];


        /*
        |--------------------------------------------------------------------------
        | RENDER VIEW PDF
        |--------------------------------------------------------------------------
        */
        $html = view(
            'user.report.submission_nominal_report',
            $data
        )->render();


        /*
        |--------------------------------------------------------------------------
        | GENERATE PDF
        |--------------------------------------------------------------------------
        */
        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);

        return response(
            $mpdf->Output(
                'Laporan Biaya Pengajuan.pdf',
                'S'
            )
        )->header(
            'Content-Type',
            'application/pdf'
        );
    }
}